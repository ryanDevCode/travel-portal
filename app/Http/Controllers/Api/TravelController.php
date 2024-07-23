<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TravelRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class TravelController extends Controller
{
    //
    public function index()
    {
        $travels = TravelRequest::all();
        return response()->json($travels);
    }
    public function store(Request $request)
    {
        $travel = new TravelRequest;
        $travel->travel_request_id = $request->travel_request_id;
        $travel->user_id = $request->user_id;
        $travel->destination = $request->destination;
        $travel->project_title = $request->project_title;
        $travel->start_date = $request->start_date;
        $travel->end_date = $request->end_date;
        $travel->purpose = $request->purpose;
        $travel->status = $request->status;
        $travel->estimated_amount = $request->estimated_amount;
        $travel->tr_track_no = Str::random(12);
        $travel->save();
        return response()->json([
            "message" => "Travel Request Added Successfully"
        ], 201);
    }

    public function show($id)
    {
        $travels = TravelRequest::where('user_id', $id)->get();
        if ($travels->isEmpty()) {
            return response()->json([
                "message" => "Travel Request not Found"
            ], 404);
        }

        // Return all user's travel requests:
        return response()->json($travels);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'destination' => 'required|max:255',
            'project_title' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'purpose' => 'required',
            'estimated_amount' => 'required|numeric',
        ]);

        // Find the travel request by tr_track_no (not a column name)
        $travel = TravelRequest::where('tr_track_no', $id)->first();

        if (!$travel) {
            return response()->json([
                "message" => "Travel Request not Found"
            ], 404);
        }

        // Update the travel request properties
        $travel->destination = $request->destination;
        $travel->project_title = $request->project_title;
        $travel->start_date = $request->start_date;
        $travel->end_date = $request->end_date;
        $travel->purpose = $request->purpose;
        $travel->status = "pending";
        $travel->estimated_amount = $request->estimated_amount;

        // Save the updated travel request
        $travel->save();

        return response()->json([
            "message" => "Travel Request Updated Successfully"
        ], 200);
    }

    public function destroy($id)
    {
        // Check if a travel request with the given tr_track_no exists
        if (TravelRequest::where("tr_track_no", $id)->exists()) {
            // Find the travel request by tr_track_no
            $travelRequest = TravelRequest::where("tr_track_no", $id)->first();

            // Delete the travel request
            $travelRequest->delete();

            return response()->json([
                "message" => "Record deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Travel Request not found."
            ], 404);
        }
    }

}
