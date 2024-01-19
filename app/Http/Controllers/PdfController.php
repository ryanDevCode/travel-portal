<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseTrack;
use App\Models\TravelRequest;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
class PdfController extends Controller
{
    //
    // public function generatePDF($request){




    //     $data = TravelRequest::findOrFail($request);

    //     // $pdf = PDF::loadView('pages.authorization_paper', ['approved' => $data]);
    //     // return $pdf->download('pages.authorization_paper');

    //     // return view('pages.expense_report', [
    //     //     'travelRequest' => $travelRequest,
    //     //     'remainingBalance' => $remainingBalance
    //     // ]);
    // }

    public function generatePdf($request){
        $id = $request;
        $info = TravelRequest::where('travel_request_id', $id)->get();
        $data = $info;
        // dd($data);
        // $data = [
        //     'test' => 'name',
        //     'info' => $info
        // ];
        $pdf = Pdf::loadView('pages.authorization_paper', ['data' => $data]);
        Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
    return $pdf->download('athorization.pdf');
    }

}
