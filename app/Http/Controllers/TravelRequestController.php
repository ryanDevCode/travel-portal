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
    public function request(Request $request)
    {


        return view('pages.create_request');
    }
    public function getWeather(Request $request)
    {
        $city = $request['city'];

        $getWeather = Http::get('https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=' . env('OPENWEATHER_API_KEY'));

        $cityWeather = $getWeather->json();
        return view('pages.travel_request', ['cityWeather' => $cityWeather]);
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_title' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:50'],
            'destination' => ['required', 'string', 'max:50'],
            'estimated_amount' => ['required', 'numeric', 'min:0'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'purpose' => ['required', 'string', 'max:255'],

        ]);
        //handle upload

        //add travel_request_id for the documents table

        //add the path on the attachment column
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
