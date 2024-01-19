<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
class HomeController extends Controller
{
    //
    public function test(){
        $city = 'manila';

        $getWeather = Http::get('https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=' . env('OPENWEATHER_API_KEY'));
        $test = Http::get('https://api.openweathermap.org/data/2.5/weather?q=Manila&appid=74dbc403409150f26d159555d26f6a22');
        dd($test);
    }
    // public function getWeather(Request $request){
    //     $defaultCity = 'Manila';
    //     $city = $request->input('city') ?? $this->defaultCity;
    //     $apiKey = env('OPENWEATHER_API_KEY');

    //     $client = new Client();
    //     $response = $client->get('https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=' . env('OPENWEATHER_API_KEY'));


    //     $data = json_decode($response->getBody()->getContents());

    //     $weatherDescription = $data->weather[0]->description;
    //     $temperature = $data->main->temp;

    //     return view('pages.test', [
    //         'weatherDescription' => $weatherDescription ,
    //         'temperature' =>$temperature,
    //         'defaultCity' => $defaultCity,
    //         'city' => $city
    //     ]);
    // }


        public function apiTest()
    {
        // $response = Http::get('https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=' . env('OPENWEATHER_API_KEY'));

        $response = Http::get('https://api.openweathermap.org/data/2.5/weather?lat=44.34&lon=10.99&appid=74dbc403409150f26d159555d26f6a22');
        // https://api.openweathermap.org/data/2.5/weather?q=Manila&appid=74dbc403409150f26d159555d26f6a22
        $apitest = $response->json();

        //make method for searching weather for places
        return view('pages.test', ['api' => $apitest]);
    }
}
