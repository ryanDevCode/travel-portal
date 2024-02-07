<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class FindRestaurant extends Component
{
    public $cityCode = '';
    // '297704'    294197
    public $apiKey = '8fbdd32badmsh8c46f30e16743bcp18a1bajsn9c8e15637e2b';
    public $restaurants = [];
    public $currentPage = 1;
    public $perPage = 15;  // Number of restaurants per page
    public $cityName = '';
    public function mount()
    {
        // $this->findRestaurant();
        // $this->cityCode();
    }

    // public function cityCode(){
    //     $fileContents = file_get_contents(app_path('Livewire/cityCode.json'));
    //     $data = json_decode($fileContents, true);
    //     $this->cityCode = $data['results']['data'][0]['result_object']['location_id'];
    // }

    public function findRestaurant()
    {
        $client = new \GuzzleHttp\Client();
        try {
            $location = $client->request('POST', 'https://worldwide-restaurants.p.rapidapi.com/typeahead', [
                'form_params' => [
                    'q' => $this->cityName,
                    'language' => 'en_US'
                ],
                'headers' => [
                    'X-RapidAPI-Host' => 'worldwide-restaurants.p.rapidapi.com',
                    'X-RapidAPI-Key' => $this->apiKey,
                    'content-type' => 'application/x-www-form-urlencoded',
                ],
            ]);
            $code = json_decode($location->getBody(), true);
            $this->cityCode = $code['results']['data'][0]['result_object']['location_id'];
        } catch (\Exception $e) {
            // Handle unexpected error
            dd($e);
            Log::error('Restaurant find failed: ' . $e->getMessage());
            $this->addError('findRestaurant', 'Failed to find restaurant. Please try again later.');
        }

        try {
            $response = $client->request('POST', 'https://worldwide-restaurants.p.rapidapi.com/search', [
                'form_params' => [
                    'language' => 'en_US',
                    'location_id' => $this->cityCode,
                    'currency' => 'PHP',
                    'offset' => '0'
                ],
                'headers' => [
                    'X-RapidAPI-Host' => 'worldwide-restaurants.p.rapidapi.com',
                    'X-RapidAPI-Key' => $this->apiKey,
                    'content-type' => 'application/x-www-form-urlencoded',
                ],
            ]);

            $data = json_decode($response->getBody(), true);
            $this->restaurants = $data['results']['data'];
        } catch (\Exception $e) {
            // Handle unexpected error
            dd($e);
            Log::error('Restaurant find failed: ' . $e->getMessage());
            $this->addError('findRestaurant', 'Failed to find restaurant. Please try again later.');
        }
    }
    public function render()
    {
        return view('livewire.find-restaurant');
    }
}
