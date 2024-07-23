<?php

namespace App\Livewire;

use Livewire\Component;
use GuzzleHttp\Client;

class CurrencyConvert extends Component
{
    public $from_currency = 'USD';
    public $to_currency = 'PHP';
    public $amount = 100;
    public $converted_amount = 0;
    public $conversion_rate = 0;
    public $currencies = [];
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
        $client = new Client();
        $apiKey = env('CURRENCY_API_KEY'); // Replace with your actual API key

        $url = "https://currency-conversion-and-exchange-rates.p.rapidapi.com/convert?from={$this->from_currency}&to={$this->to_currency}&amount={$this->amount}";

        try {
            $response = $client->get($url, [
                'headers' => [
                    'X-RapidAPI-Host' => 'currency-conversion-and-exchange-rates.p.rapidapi.com',
                    'X-RapidAPI-Key' => $apiKey,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            if ($data['success']) {
                $this->converted_amount = $data['result'];
                $this->conversion_rate = $data['info']['rate'];
            } else {
                $this->addError('conversion_error', 'Conversion failed. Please try again.');
            }
        } catch (\Exception $e) {
            $this->addError('conversion_error', 'An error occurred during conversion.');
        }
    }
    public function render()
    {
        return view('livewire.currency-convert');
    }
}
