<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travel;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\TravelExpense;

class ExpenseController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

        // Fetch total expenses
        $totalExpenses = TravelExpense::where('UserID', $user->id)
            ->groupBy('UserID')
            ->selectRaw('SUM(TotalExpenses) AS total_expenses')
            ->first();
        $overAllExpenses = $totalExpenses->total_expenses ?? 0;

        // Fetch total budget
        $totalBudget = Travel::where('UserID', $user->id)
            ->where('Status', 'Approved')
            ->groupBy('UserID')
            ->selectRaw('SUM(TotalEstimatedBudget) AS total_budget')
            ->first();
        $overAllBudget = $totalBudget->total_budget ?? 0;

        // Calculate the remaining balance
        $remainingBalance = $overAllBudget - $overAllExpenses;

        $expenses = Travel::where("UserID", $user->id)->get();

        return view("pages.expenses.index", compact("expenses", "overAllExpenses", "remainingBalance", "totalExpenses", "overAllBudget"));
    }


    public function show($trackID)
    {
        $user = Auth::user();
        $travel = Travel::where("RequestID", $trackID)->first();
        $expenses = TravelExpense::where("RequestID", $trackID)->get();
        $travelRequest = Travel::where("RequestID", $trackID)->get();

        // Calculate total expenses
        $totalExpenses = TravelExpense::where('RequestID', $trackID)
            ->selectRaw('
            SUM(TransportationCost) AS TransportationCost,
            SUM(AccommodationCost) AS AccommodationCost,
            SUM(DailyAllowance) AS DailyAllowance,
            SUM(MealsAndIncidentals) AS MealsAndIncidentals,
            SUM(ConferenceRegistrationFee) AS ConferenceRegistrationFee,
            SUM(VisaDocumentationFee) AS VisaDocumentationFee,
            SUM(TravelInsuranceCost) AS TravelInsuranceCost,
            SUM(MiscellaneousExpenses) AS MiscellaneousExpenses,
            SUM(TotalExpenses) AS TotalExpenses
        ')
            ->first();

        $totalExpensesAmount = $totalExpenses ? $totalExpenses->TotalExpenses : 0;

        // Calculate the remaining balance
        $remainingBalance = $travel->TotalEstimatedBudget - $totalExpensesAmount;

        return view("pages.expenses.view", compact("travelRequest", "user", "remainingBalance", "expenses", "totalExpenses", "totalExpensesAmount"));
    }


    public function store(Request $request)
    {
        $requestID = $request->input('RequestID');
        $travel = Travel::where("RequestID", $requestID)->first();
        $expenses = TravelExpense::where("RequestID", $requestID)->get();
        $travelRequest = Travel::where("RequestID", $requestID)->get();

        // Calculate total expenses
        $totalExpenses = TravelExpense::where('RequestID', $requestID)
            ->selectRaw('
            SUM(TransportationCost) AS TransportationCost,
            SUM(AccommodationCost) AS AccommodationCost,
            SUM(DailyAllowance) AS DailyAllowance,
            SUM(MealsAndIncidentals) AS MealsAndIncidentals,
            SUM(ConferenceRegistrationFee) AS ConferenceRegistrationFee,
            SUM(VisaDocumentationFee) AS VisaDocumentationFee,
            SUM(TravelInsuranceCost) AS TravelInsuranceCost,
            SUM(MiscellaneousExpenses) AS MiscellaneousExpenses,
            SUM(TotalExpenses) AS TotalExpenses
        ')
            ->first();

        $totalExpensesAmount = $totalExpenses ? $totalExpenses->TotalExpenses : 0;

        // Calculate the remaining balance
        $remainingBalance = $travel->TotalEstimatedBudget - $totalExpensesAmount;

        $validatedData = $request->validate([
            'RequestID' => 'required',
            'Date' => 'required|date',
            'ModeOfTransportation' => 'required',
            // 'TransportationCost' => 'required|numeric',
            // 'AccommodationCost' => 'nullable|numeric',
            // 'DailyAllowance' => 'nullable|numeric',
            // 'MealsAndIncidentals' => 'nullable|numeric',
            // 'ConferenceRegistrationFee' => 'nullable|numeric',
            // 'VisaDocumentationFee' => 'nullable|numeric',
            // 'TravelInsuranceCost' => 'nullable|numeric',
            // 'MiscellaneousExpenses' => 'nullable|numeric',
            'Remarks' => 'nullable|required',
        ]);
        $validatedData['TransportationCost'] = $request->input('TransportationCostNumeric');
        $validatedData['AccommodationCost'] = $request->input('AccommodationCostNumeric');
        $validatedData['DailyAllowance'] = $request->input('DailyAllowanceNumeric');
        $validatedData['ConferenceRegistrationFee'] = $request->input('ConferenceRegistrationFeeNumeric');
        $validatedData['VisaDocumentationFee'] = $request->input('VisaDocumentationFeeNumeric');
        $validatedData['TravelInsuranceCost'] = $request->input('TravelInsuranceCostNumeric');
        $validatedData['MealsAndIncidentals'] = $request->input('MealsAndIncidentalsNumeric');
        $validatedData['MiscellaneousExpenses'] = $request->input('MiscellaneousExpensesNumeric');

        $validatedData['UserID'] = Auth::user()->id;
        $validatedData['TravelerName'] = Auth::user()->first_name . ' ' . Auth::user()->last_name;
        $validatedData['TotalExpenses'] =
            ($validatedData['TransportationCost'] ?? 0) +
            ($validatedData['AccommodationCost'] ?? 0) +
            ($validatedData['MealsAndIncidentals'] ?? 0) +
            ($validatedData['DailyAllowance'] ?? 0) +
            ($validatedData['ConferenceRegistrationFee'] ?? 0) +
            ($validatedData['VisaDocumentationFee'] ?? 0) +
            ($validatedData['TravelInsuranceCost'] ?? 0) +
            ($validatedData['MiscellaneousExpenses'] ?? 0);
        $validatedData['Status'] = "Pending";

        if ($validatedData['TotalExpenses'] > $remainingBalance) {
            return back()->withErrors(['expense_exceed_budget' => 'Expense exceeds the remaining budget. Please review your expenses.']);
        }
        $expenseReport = TravelExpense::create($validatedData);

        return back()->with('success', 'Expense Report Submitted Successfully.');
    }

    public function report(Request $request, $requestID)
    {
        $validatedData = $request->validate([
            'ExpenseApproval' => 'nullable|string|max:255',
        ]);

        // Retrieve the travel record by RequestID
        $travel = Travel::where('RequestID', $requestID);
        // $validatedData['ApprovedBy'] = Auth::user() ? Auth::user()->first_name . ' ' . Auth::user()->last_name : null;


        // Update the travel record with the validated data
        $travel->update($validatedData);

        // Optionally, you can redirect the user to a specific route
        return back()->with('success', 'Expense report submitted successfully.');
    }

}
