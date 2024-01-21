<?php

namespace App\Http\Controllers;

use App\Models\ExpenseTrack;
use Illuminate\Http\Request;
use App\Models\TravelRequest;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\ExpenseReport;
class ExpenseTrackController extends Controller
{
    public function index()
    {
        return view('pages.expense_report');
    }


    public function show(Request $request)
    {
        $user = $request->user(); // Retrieve authenticated user from request
        $travelBudgetRequests = $user->travelRequests()->paginate(10);

        return view('pages.expense_report', ['travelBudgetRequests' => $travelBudgetRequests]); // Pass data using array syntax
    }




    public function expenseTrack($request)
    {
        // Get the travel request by ID
        $travelRequest = TravelRequest::findOrFail($request);

        // Get the total amount of expenses with the same ID
        // $totalExpenses = ExpenseTrack::where('tr_track_no', $request)->sum('transportation');
        $tr = $travelRequest->tr_track_no;
        // dd($tr);
        $totalexpenses = ExpenseTrack::where('tr_track_no', $tr)
            ->groupBy('tr_track_no')
            ->selectRaw(
                '
        tr_track_no,
        SUM(transportation) AS total_transportation,
        SUM(accommodation) AS total_accommodation,
        SUM(meal) AS total_meal,
        SUM(other_expenses_amount) AS total_other_expenses,
        SUM(transportation + accommodation + meal + other_expenses_amount) AS total_expenses
        '
            )
            ->first();
        $overAllExpenses = $totalexpenses->total_expenses ?? 0;

        // Calculate the remaining balance
        $remainingBalance = $travelRequest->estimated_amount - $overAllExpenses;

        $expenses = ExpenseTrack::where('tr_track_no', $tr)->get();
        return view('pages.expense_report', [
            'travelRequest' => $travelRequest,
            'remainingBalance' => $remainingBalance,
            'expenses' => $expenses,
            'total' => $totalexpenses
        ]);
    }

    public function store(Request $request, ExpenseTrack $report)
    {
        $validatedData = $request->validate([
            'tr_track_no' => ['required'],
            'transportation' => ['required', 'numeric'],
            'accommodation' => ['required', 'numeric'],
            'meal' => ['required', 'numeric'],
            'other_expenses_amount' => ['nullable', 'numeric'],
            'other_expenses' => ['nullable', 'string', 'max:255'],
            'date' => ['required', 'date'],
        ]);
        $validatedData['total'] = $validatedData['transportation'] + $validatedData['accommodation'] + $validatedData['meal'] + ($validatedData['other_expenses_amount'] ?? 0);
        $validatedData['expense_id'] = Str::random(12);
        $validatedData['user_id'] = Auth::user()->id;


        try {

            $expenseTrack = ExpenseTrack::create($validatedData);


            return back()->with('success', 'Expense report submitted successfully!');
        } catch (Exception $e) {
            dd($e);
            Log::error('An error occurred: ' . $e->getMessage());
            Log::error($request->all());
            return back()->withErrors(['error' => 'Something went wrong.']);
        }
    }

    public function getLetter($request)
    {
        $request = TravelRequest::findOrFail($request);

        return view('pages.authorization_paper', ['approved' => $request]);
    }
    public function getAggregatedExpenses()
    {
        $expenses = ExpenseTrack::groupBy('tr_track_no')
            ->selectRaw('
            tr_track_no,
            SUM(transportation) AS total_transportation,
            SUM(accommodation) AS total_accommodation,
            SUM(meal) AS total_meal,
            SUM(other_expenses_amount) AS total_other_expenses
        ')
            ->get();

        dd($expenses);
        return $expenses;
    }

    public function getAggregatedExpensesByTrackNo(Request $request, $id)
    {
        $trTrackNo = $id;
        $expenses = ExpenseTrack::where('tr_track_no', $trTrackNo)
            ->groupBy('tr_track_no')
            ->selectRaw('
                tr_track_no,
                SUM(transportation) AS total_transportation,
                SUM(accommodation) AS total_accommodation,
                SUM(meal) AS total_meal,
                SUM(other_expenses_amount) AS total_other_expenses,
                total
            ')
            ->get();
        return $expenses;
    }
//in the expenseTracks i want

public function expenseReport(Request $request){
$id = $request->tr_track_no;

//make variable and store like an array
$validatedData = $request->validate([
    'total_transportation' => ['required', 'numeric', 'min:0'],
    // 'purpose' => ['required', 'string'],
    'total_meal' => ['required', 'numeric', 'min:0'],
    'total_accommodation' => ['required', 'numeric', 'min:0'],
    'total_other_expenses' => ['required', 'numeric', 'min:0'],
    'total' => ['required', 'numeric', 'min:0'],
    // 'attachment' => ['file', 'mimes:pdf,doc,docx,jpg,jpeg,png', 'max:2048'],
    // $validatedData['start_date'] = date('Y-m-d', strtotime($validatedData['start_date']));
    // $validatedData['end_date'] = date('Y-m-d', strtotime($validatedData['end_date']));

]);

// Generate a unique tracking number
$validatedData['tr_track_no'] = $id;
// dd($validatedData);
$validatedData['user_id'] = Auth::user()->id;

try {
    // Create the budget request
    $travelRequest = ExpenseReport::create($validatedData);

    // Redirect to a success page (e.g., budget request list)
    return back()->with('success', 'Expense report submitted successfully!');
} catch (Exception $e) {
    dd($e);
    Log::error('An error occurred: ' . $e->getMessage());
    Log::error($request->all());
    return back()->withErrors(['error' => 'Something went wrong.']);
}
}
    // public function expenseReport(Request $request, $id){
    //     $trTrackNo = $id;
    //     $expenses = ExpenseTrack::where('tr_track_no', $trTrackNo)
    //         ->groupBy('tr_track_no')
    //         ->selectRaw('
    //             tr_track_no,
    //             SUM(transportation) AS total_transportation,
    //             SUM(accommodation) AS total_accommodation,
    //             SUM(meal) AS total_meal,
    //             SUM(other_expenses_amount) AS total_other_expenses,
    //             SUM(total) AS total
    //         ')
    //         ->get();
    //         dd($expenses);
    //         return view('pages.report_preview', ['report' => $expenses]);

    //         $expenseReport = new ExpenseReport();

    //         // Assign data from aggregatedExpenses
    //         $expenseReport->expense_tracks = $expenses->tr_track_no;
    //         $expenseReport->total_transportation = $expenses->total_transportation;
    //         $expenseReport->total_accommodation = $expenses->total_accommodation;
    //         $expenseReport->total_meal = $expenses->total_meal;
    //         $expenseReport->total_other_expenses = $expenses->total_other_expenses;
    //         $expenseReport->total = $expenses->total;

    //     try {

    //         $expenseReport->save();
    //         return back()->with('success', 'Expense report submitted successfully!');
    //     } catch (Exception $e) {
    //         dd($e);
    //         Log::error('An error occurred: ' . $e->getMessage());
    //         Log::error($request->all());
    //         return back()->withErrors(['error' => 'Something went wrong.']);
    //     }
    // }

    //     public function expenseTrack($request)
    //     {
    // //need id ng travel request
    // //sotre sa variable
    // //use that varible compute for the total remaining budget
    //         $travelRequest = TravelRequest::findOrFail($request);


    // // $totalExpenses = TravelRequest::where('tr_track_no' ,$request)->sum('estimated_amount');
    //         return view('pages.expense_report', ['travelRequest' => $travelRequest]);
    //     }



    //remaining Balance  method
    //compute the total amount of all the expenses with the same id
    //minus it in the amount from the travelRequest model
    //ilagay to don sa controller bago sa expenses



    // public function expenseTrack($request)
    // {

    //     $travelRequest = TravelRequest::findOrFail($request);

    //     return view('pages.expense_report', ['travelRequest' => $travelRequest]);
    // }





    // public function create(Request $request, $travelBudgetRequestID)
    // {
    //     dd($travelBudgetRequestID);
    //     //pede den yung id ng mismong request hindi yung tr_track_no;
    //     $validatedData = $request->validate([
    //         // Validation rules for expense report fields
    //     ]);

    //     ExpenseTrack::create([
    //         'travel_budget_request_id' => $travelBudgetRequestID,
    //         'user_id' => auth()->id(),
    //         // Other expense report data
    //     ]);

    //     // Redirect to success page or expense report view
    //     return view('pages.expense_repoort', ['travelBudgetRequestsID' => $travelBudgetRequestID]);
    // }











    //pass the $travelBudgetRequestId via the parameter
    public function saveTest(Request $request, $travelBudgetRequestId)
    {

        $validatedData = $request->validate([
            // Validation rules for expense report fields
        ]);

        ExpenseTrack::create([
            'travel_budget_request_id' => $travelBudgetRequestId,
            'user_id' => auth()->id(),
            // Other expense report data
        ]);

        // Redirect to success page or expense report view
    }

    public function ExpenseView()
    {
        // $user = Auth::user();

        // $expenses = DB::table('travel_expenses')
        //     ->select('tr_track_no', DB::raw('SUM(transportation) as total_transportation'), DB::raw('SUM(accommodation) as total_accommodation'), DB::raw('SUM(meal) as total_meal'), DB::raw('SUM(other_expenses_amount) as total_other_expenses'))
        //     ->where('user_id', $user->id)
        //     ->groupBy('tr_track_no')
        //     ->get();


        // return view('pages.expenses', ['expenses' => $expenses]);


        //total balance of the user


        //remaining balance of the user


        //return to views the table with the user_id and merge it


        //     $expensesTotal = DB::table('travel_requests')
        // ->join('travel_expenses', 'travel_requests.tr_track_no', '=', 'travel_expenses.tr_track_no')
        // ->where('travel_requests.user_id', '=', $user->id)
        // ->selectRaw('SUM(accommodation) + SUM(meal) + SUM(transportation) + SUM(other_expenses_amount) as total')
        // ->first()
        // ->total;


        // $user = Auth::user();
        // $expenses = DB::table('travel_requests')
        //     ->join('travel_expenses', 'travel_requests.tr_track_no', '=', 'travel_expenses.tr_track_no')
        //     ->where('travel_requests.user_id', '=', $user->id)
        //     ->where('travel_requests.status', '=', 'approved')  // Filter for approved requests
        //     ->orderBy('travel_requests.created_at', 'desc')
        //     ->paginate(10);
        // dd($expenses);


        //returning user approved request44
        $user = Auth::user();
        $expenses = DB::table('travel_requests')
            ->where('travel_requests.user_id', '=', $user->id)
            ->where('travel_requests.status', '=', 'approved')  // Filter for approved requests
            ->orderBy('travel_requests.created_at', 'desc')
            ->paginate(10);
        // $expenses = DB::table('travel_requests')
        // ->join('travel_expenses', 'travel_requests.tr_track_no', '=', 'travel_expenses.tr_track_no')
        // ->where('travel_requests.user_id', '=', $user->id)
        // ->orderBy('travel_requests.created_at', 'desc')
        // ->paginate(10);


        //     $user = Auth::user();
        // $travelExpenses = DB::table('travel_expenses')
        //     ->where('user_id', '=', $user->id)
        //     ->get();





        return view('pages.expenses', ['data' => $expenses]);
    }


    // public function ExpenseView()
    // {

    //     $user = Auth::user();


    //     $expenses = ExpenseTrack::where('user_id', $user->id)->get()
    //         ->groupBy('tr_track_no')
    //         ->selectRaw('
    //         tr_track_no,
    //         SUM(transportation) AS total_transportation,
    //         SUM(accommodation) AS total_accommodation,
    //         SUM(meal) AS total_meal,
    //         SUM(other_expenses_amount) AS total_other_expenses
    //     ')
    //         ->get();

    //     return view('pages.expenses', ['expenses' => $expenses]);


    //get the logged in user
    //filter the request with the user_id
    //sum all that have the same tr_track_no
    //then return to views
    // }
    // public function ExpenseView(){
    //     $user = Auth::user();
    //     $expenses = ExpenseTrack::where('user_id', $user->id)->get();
    //     return view('pages.expenses', ['expenses' => $expenses]);
    // }


}
