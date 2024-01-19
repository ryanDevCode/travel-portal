<?php

namespace App\Http\Controllers;

use App\Models\TravelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class TravelRequestController extends Controller
{
    //
    public function request(Request $request){


        return view('pages.create_request');
    }
    public function getWeather(Request $request)
    {
        $city = $request['city'];

        $getWeather = Http::get('https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=' . env('OPENWEATHER_API_KEY'));

        $cityWeather = $getWeather->json();
        return view('pages.travel_request', ['cityWeather' => $cityWeather]);
    }
    // https://api.openweathermap.org/data/2.5/weather?lat=44.34&lon=10.99&appid=74dbc403409150f26d159555d26f6a22
    //https://api.openweathermap.org/data/2.5/weather?q={city name}&appid={API key}

    public function apiTest()
    {
        // $response = Http::get('https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=' . env('OPENWEATHER_API_KEY'));

        $response = Http::get('https://api.openweathermap.org/data/2.5/weather?lat=44.34&lon=10.99&appid=74dbc403409150f26d159555d26f6a22');
        // https://api.openweathermap.org/data/2.5/weather?q=Manila&appid=74dbc403409150f26d159555d26f6a22
        $apitest = $response->json();

        //make method for searching weather for places
        return view('pages.test', ['api' => $apitest]);
    }
    // public function getWeather(Request $request)

    //     // $defaultCity = 'Manila';
    //     // $city = $request->input('city') ?? $this->defaultCity;
    //     // $apiKey = env('OPENWEATHER_API_KEY');

    //     // $client = new Client();
    //     // $response = $client->get('https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=' . env('OPENWEATHER_API_KEY'));


    //     // $data = json_decode($response->getBody()->getContents());

    //     // $weatherDescription = $data->weather[0]->description;
    //     // $temperature = $data->main->temp;

    //     // return view('pages.test', [
    //     //     'weatherDescription' => $weatherDescription ,
    //     //     'temperature' =>$temperature,
    //     //     'defaultCity' => $defaultCity,
    //     //     'city' => $city
    //     // ]);
    // }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_title' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:50'],
            'destination' => ['required', 'string', 'max:50'],
            'estimated_amount' => ['required', 'numeric', 'min:0'],
            // 'purpose' => ['required', 'string'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'purpose' => ['required', 'string', 'max:255'],
            // 'attachment' => ['file', 'mimes:pdf,doc,docx,jpg,jpeg,png', 'max:2048'],
            // $validatedData['start_date'] = date('Y-m-d', strtotime($validatedData['start_date']));
            // $validatedData['end_date'] = date('Y-m-d', strtotime($validatedData['end_date']));

        ]);

        // Generate a unique tracking number
        $validatedData['tr_track_no'] = Str::random(12);
        // dd($validatedData);
        $validatedData['status'] = 'pending';
        $validatedData['user_id'] = Auth::user()->id;

        try {
            // Create the budget request
            $travelRequest = TravelRequest::create($validatedData);

            // Redirect to a success page (e.g., budget request list)
            return redirect()->route('request.show')->with('success', 'Budget request created successfully!');
        } catch (Exception $e) {
            dd($e);
            Log::error('An error occurred: ' . $e->getMessage());
            Log::error($request->all());
            return back()->withErrors(['error' => 'Something went wrong.']);
        }
    }

    public function show(Request $request)
    {

        $user = $request->user(); // Retrieve authenticated user from request
        $travelBudgetRequests = $user->travelRequests()->paginate(10);

        return view('pages.travel_request', ['travelBudgetRequests' => $travelBudgetRequests]); // Pass data using array syntax
    }
}
