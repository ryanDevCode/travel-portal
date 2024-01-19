<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    //
    protected $defaultCity = 'Manila'; // Set your default city

    // public function __construct()
    // {
    //     $this->fetchDefaultWeather(); // Optional pre-fetch
    // }

    // protected function fetchDefaultWeather()
    // {
    //     $this->getWeather(new Request(['city' => $this->defaultCity]));
    // }

    public function getWeather(Request $request)
    {
        $defaultCity = 'Manila';
        $city = $request->input('city') ?? $this->defaultCity;
        $apiKey = env('OPENWEATHER_API_KEY');

        $client = new Client();
        $response = $client->get('https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=' . env('OPENWEATHER_API_KEY'));


        $data = json_decode($response->getBody()->getContents());

        $weatherDescription = $data->weather[0]->description;
        $temperature = $data->main->temp;

        return view('pages.test', [
            'weatherDescription' => $weatherDescription ,
            'temperature' =>$temperature,
            'defaultCity' => $defaultCity,
            'city' => $city
        ]);
    }
}
