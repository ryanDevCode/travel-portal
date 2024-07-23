<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travel;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TravelController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = $request->user(); // Retrieve authenticated user from request
        $travelRequests = $user->travel()->orderBy('created_at', 'desc')->paginate(10);
        return view('pages.travel.index', compact('travelRequests'));
    }

    public function show(Request $request, $requestID)
    {
        $travel = Travel::where('RequestID', $requestID)->get();
        $user = Auth::user();
        return view('pages.travel.view', compact('travel', 'user'));
    }

    public function request()
    {
        return view('pages.travel.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the incoming request data
        $validatedData = $request->validate([
            'Title' => 'required|string|max:255',
            'Department' => 'required|string|max:255',
            'Destinations' => 'required|string|max:255',
            'PurposeOfTravel' => 'required|string|max:255',
            'NumberOfTravelers' => 'required|integer|min:1',
            'ModeOfTransportation' => 'nullable|string|max:255',
            'TransportationCost' => 'nullable|min:0',
            'TypeOfAccommodation' => 'nullable|string|max:255', // Corrected field name
            'AccommodationCost' => 'nullable|min:0', // Corrected field name
            'DailyAllowance' => 'nullable|min:0',
            'ConferenceRegistrationFee' => 'nullable|min:0',
            'VisaDocumentationFee' => 'nullable|min:0',
            'TravelInsuranceCost' => 'nullable|min:0',
            'MiscellaneousExpenses' => 'nullable|min:0',
            'FoodCost' => 'nullable|min:0',
            'TotalEstimatedBudget' => 'required|min:0',
            'StartDate' => 'required|date',
            'EndDate' => 'required|date|after_or_equal:StartDate',
            'Justification' => 'nullable|string',
            'ExpectedOutcomes' => 'nullable|string',
            'AlternativeOptionsConsidered' => 'nullable|string',
            'QuotesEstimates' => 'nullable|file',
            'Attachments' => 'nullable|file',
            'ExpenseApproval' => 'nullable|string',
        ]);
        // Convert currency values from strings to numbers
        // $currencyFields = [
        //     'TransportationCost',
        //     'AccommodationCost',
        //     'DailyAllowance',
        //     'ConferenceRegistrationFee',
        //     'VisaDocumentationFee',
        //     'TravelInsuranceCost',
        //     'MiscellaneousExpenses',
        //     'TotalEstimatedBudget',
        // ];
        // foreach ($currencyFields as $field) {
        //     if (isset($validatedData[$field])) {
        //         $validatedData[$field] = $this->convertCurrencyToNumber($validatedData[$field]);
        //     }
        // }
        if ($request->has('Attachments')) {
            $file = $request->file('Attachments');
            $extension = $file->getClientOriginalExtension();

            $fileName = uniqid() . '.' . $extension;

            $path = 'uploads/category/budgets/travels';
            $filePath = $file->move($path, $fileName);

            $validatedData['Attachments'] = $fileName;
            $validatedData['AttachmentsPath'] = $filePath;
        }

        if ($request->hasFile('QuotesEstimates')) {
            $quotesFile = $request->file('QuotesEstimates');
            $quotesExtension = $quotesFile->getClientOriginalExtension();

            $quotesFileName = uniqid() . '.' . $quotesExtension;

            $quotesPath = 'uploads/category/budgets/travels';
            $quotesFilePath = $quotesFile->move($quotesPath, $quotesFileName);

            $validatedData['QuotesEstimates'] = $quotesFileName;
            $validatedData['QuotesEstimatesPath'] = $quotesFilePath;
        }


        $validatedData['TransportationCost'] = $request->input('TransportationCostNumeric');
        $validatedData['AccommodationCost'] = $request->input('AccommodationCostNumeric');
        $validatedData['DailyAllowance'] = $request->input('DailyAllowanceNumeric');
        $validatedData['ConferenceRegistrationFee'] = $request->input('ConferenceRegistrationFeeNumeric');
        $validatedData['VisaDocumentationFee'] = $request->input('VisaDocumentationFeeNumeric');
        $validatedData['TravelInsuranceCost'] = $request->input('TravelInsuranceCostNumeric');
        $validatedData['MiscellaneousExpenses'] = $request->input('MiscellaneousExpensesNumeric');
        $validatedData['FoodCost'] = $request->input('FoodCostNumeric');
        $validatedData['TotalEstimatedBudget'] = $request->input('TotalEstimatedBudgetNumeric');
        $validatedData['RequestID'] = Str::random(12);
        $validatedData['UserID'] = Auth::user()->id;
        $validatedData['ExpenseApproval'] = 'Pending';

        // dd($validatedData);
        // dd($request->all());
        // Create a new travel request using the validated data
        $travelRequest = Travel::create($validatedData);



        // Optionally, you can redirect the user to a specific route
        return back()->with('success', 'Travel request created successfully.');
    }


    private function convertCurrencyToNumber($formattedCurrency)
    {
        // Remove currency symbol and commas
        $cleanedValue = str_replace(['₱', ',', '.'], '', $formattedCurrency);

        // Convert to numeric value
        return (float) ($cleanedValue / 100);
    }

    // public function update(Request $request, $requestID)
    // {

    //     try {
    //         $travelRequest = Travel::where('RequestID', $requestID)->firstOrFail();

    //         $travelRequest->update([
    //             'Title' => $request->Title,
    //             'Department' => $request->Department,
    //             'Destinations' => $request->Destinations,
    //             'PurposeOfTravel' => $request->PurposeOfTravel,
    //             'NumberOfTravelers' => $request->NumberOfTravelers,
    //             'ModeOfTransportation' => $request->ModeOfTransportation,
    //             'TransportationCost' => $request->TransportationCost,
    //             'TypeOfAccommodation' => $request->TypeOfAccommodation,
    //             'AccommodationCost' => $request->AccommodationCost,
    //             'FoodCost' => $request->FoodCost,
    //             'DailyAllowance' => $request->DailyAllowance,
    //             'ConferenceRegistrationFee' => $request->ConferenceRegistrationFee,
    //             'VisaDocumentationFee' => $request->VisaDocumentationFee,
    //             'TravelInsuranceCost' => $request->TravelInsuranceCost,
    //             'MiscellaneousExpenses' => $request->MiscellaneousExpenses,
    //             'TotalEstimatedBudget' => $request->TotalEstimatedBudget,
    //             'StartDate' => $request->StartDate,
    //             'EndDate' => $request->EndDate,
    //             'Justification' => $request->Justification,
    //             'ExpectedOutcomes' => $request->ExpectedOutcomes,
    //             'AlternativeOptionsConsidered' => $request->AlternativeOptionsConsidered,
    //         ]);

    //         return back()->with('success', 'Travel request updated successfully.');
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         // Handle validation errors
    //         return back()->withErrors($e->validator)->withInput();
    //     } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
    //         // Handle record not found error
    //         return back()->with('error', 'Travel request not found.');
    //     } catch (\Exception $e) {
    //         // Handle other exceptions (consider more specific types for better handling)
    //         return back()->with('error', 'An error occurred while updating the travel request: ' . $e->getMessage());
    //     }
    // }

    public function update(Request $request, $requestID)
    {
        $validatedData = $request->validate([
            'Title' => 'nullable|string|max:255',
            'Department' => 'nullable|string|max:255',
            'Destinations' => 'nullable|string|max:255',
            'PurposeOfTravel' => 'nullable|string|max:255',
            'NumberOfTravelers' => 'nullable|integer|min:1',
            'ModeOfTransportation' => 'nullable|string|max:255',
            'TransportationCost' => 'nullable|min:0',
            'TypeOfAccommodation' => 'nullable|string|max:255',
            'AccommodationCost' => 'nullable|min:0',
            'DailyAllowance' => 'nullable|min:0',
            'ConferenceRegistrationFee' => 'nullable|min:0',
            'VisaDocumentationFee' => 'nullable|min:0',
            'TravelInsuranceCost' => 'nullable|min:0',
            'MiscellaneousExpenses' => 'nullable|min:0',
            'FoodCost' => 'nullable|min:0',
            'TotalEstimatedBudget' => 'nullable|min:0',
            'StartDate' => 'nullable|date',
            'EndDate' => 'nullable|date',
            'Justification' => 'nullable|string',

        ]);

        // Retrieve the travel record by RequestID
        $travel = Travel::where('RequestID', $requestID);
        // $validatedData['ApprovedBy'] = Auth::user() ? Auth::user()->first_name . ' ' . Auth::user()->last_name : null;


        // Update the travel record with the validated data
        $travel->update($validatedData);

        // Optionally, you can redirect the user to a specific route
        return back()->with('success', 'Travel request updated successfully.');
    }



}
