<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
class WeatherComponent extends Component
{
    public $weatherData = [];
    public $searchCity = 'Caloocan'; // Default city
    public $apiKey = '9ca90e22ddmshec8195c6d05690cp12fa7fjsne7d580803379';
    public function mount()
    {
        // $this->fetchWeatherData();
    }
    public function fetchWeatherData()
    {
        $url = "https://open-weather13.p.rapidapi.com/city/{$this->searchCity}";

        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'open-weather13.p.rapidapi.com',
            'X-RapidAPI-Key' => $this->apiKey,
        ])->get($url);

        $this->weatherData = json_decode($response->body(), true);
        // Convert temperature to Celsius:
        $this->weatherData['main']['temp'] = round(($this->weatherData['main']['temp'] - 32) * 5 / 9, 1);
    }
    public function render()
    {
        return view('livewire.weather-component');
    }
}
