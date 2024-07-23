<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    //
    public function showAPI()
    {
        // Make the API request (replace with your actual API request logic):
        $response = Http::get('https://fbs.rkiveadmin.com/travel-portal/api/travel-data');

        // Check for successful response:
        if ($response->getStatusCode() != 200) {
            return view('error', ['message' => 'Failed to retrieve travel data']);
        }

        // Decode the JSON response:
        $travelData = json_decode($response->getBody(), true);

        return view('pages.api', compact('travelData'));
    }
    public function edit(Request $request, $travelRequest)
    {
        // Implement logic to retrieve and pre-populate the edit form with
        // the travel request data using the $travelRequest ID.

        // ...

        return view('travel-requests.edit', [
        ]);
    }

    public function delete(Request $request, $travelRequest)
    {
        // Implement logic to delete the travel request using the $travelRequest ID.

        // ...

        return redirect()->route('travel-requests.index')->with('success', 'Travel request deleted successfully!');
    }
}
