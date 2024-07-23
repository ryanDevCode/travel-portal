<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
class WeatherComponent extends Component
{
    public $weatherData = [];
    public $searchCity = 'Manila'; // Default city
    public $apiKey = '434a0f6687mshd23a1fd4ee8acc3p16ba60jsnca2708de5e4e';
    public function mount()
    {
        // $this->fetchWeatherData();
    }
    public function fetchWeatherData()
{
    $client = new Client();
    $response = $client->request('GET', 'https://open-weather13.p.rapidapi.com/city/' . urlencode($this->searchCity) . '/EN', [
        'headers' => [
            'X-RapidAPI-Host' => 'open-weather13.p.rapidapi.com',
            'X-RapidAPI-Key' => '9ca90e22ddmshec8195c6d05690cp12fa7fjsne7d580803379',
        ],
    ]);

    $body = $response->getBody()->getContents();
    $this->weatherData = json_decode($body, true);

    // Convert temperature to Celsius:
    $this->weatherData['main']['temp'] = round(($this->weatherData['main']['temp'] - 32) * 5 / 9, 1);
}

    public function render()
    {
        return view('livewire.weather-component');
    }
}
