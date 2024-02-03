<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class CurrencyConverter extends Component
{
    public $amount = '';
    public $fromCurrency = '';
    public $toCurrency = '';
    public $convertedAmount = '';
    public $currencies = [];

    public $apiKey = '8fbdd32badmsh8c46f30e16743bcp18a1bajsn9c8e15637e2b';

    public function mount()
    {
        $this->fetchCurrencies();
    }

    public function fetchCurrencies()
    {
        $fileContents = file_get_contents(app_path('Livewire/currencies.json'));
        $this->currencies = json_decode($fileContents, true);
    }

    public function convert()
    {
        try {
            $url = "https://exchange-rate-api1.p.rapidapi.com/convert?base={$this->fromCurrency}&target={$this->toCurrency}";

            $response = Http::withHeaders([
                'X-RapidAPI-Key' => $this->apiKey,
                'X-RapidAPI-Host' => 'exchange-rate-api1.p.rapidapi.com'
            ])->get($url);

            $data = json_decode($response->body(), true);
            if ($response->failed()) {
                // Handle API request failure
                $this->addError('conversion', 'API request failed. Please try again later.');
                Log::error('API request failed: ' . $response->getStatusCode() . ' - ' . $response->body());
                return;
            }

            $this->convertedAmount = $this->amount * $data['convert_result']['rate'];
            if (!isset($data['convert_result'])) {
                // Handle missing 'convert_result' in response
                $this->addError('conversion', 'Conversion for this currency pair is not available.');
                Log::error('API response missing "convert_result" for currency conversion.');
                return;
            }
        } catch (\Exception $e) {
            // Handle unexpected error
            $this->addError('conversion', 'Failed to convert currency. Please try again later.');
            return false; // Prevent form submission and modal closing
            $this->emit('conversionError'); // Emit event to trigger modal update
        }
    }



    public function render()
    {
        return view('livewire.currency-converter');
    }
}
