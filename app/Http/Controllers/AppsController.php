<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppsController extends Controller
{
    //
    public function showMaps(){
        $mapsKey = env('GOOGLE_MAPS');
        return view('pages.maps', compact('mapsKey'));
    }

    public function convertCurrency(){
        return view('apps.currency');
    }
}
