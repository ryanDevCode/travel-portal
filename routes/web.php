<?php

use App\Http\Controllers\ExpenseTrackController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TravelRequestController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\PdfController;


Route::get('/', function () {
    return redirect()->route('login'); // Redirect to login
})->name('/');

// Login routes
Route::view('login', 'login')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('register', [LoginController::class, 'register'])->name('register');


// Protected routes (require authentication)
Route::middleware('auth')->group(function () {
    Route::view('index', 'index')->name('index');
    // Route::view('request', 'pages.travel_request')->name('request');
    Route::post('request', [TravelRequestController::class, 'store'])->name('store');
    Route::get('request',[TravelRequestController::class, 'show'] )->name('request.show');
    Route::get('create-request', [TravelRequestController::class, 'request'])->name('create-request');


    Route::get('/expense-track/{request}', [ExpenseTrackController::class, 'expenseTrack'])->name('expense.track');
    Route::post('/expense-track', [ExpenseTrackController::class, 'store'])->name('expense.track.store');
    Route::view('/expense-track', [ExpenseTrackController::class, 'index'])->name('expense.track.view');

    // Route::get('request', [TravelRequestController::class, 'show']);
    // Route::get('request', [TravelRequestController::class,'show'])->name('expense');
    // Route::get('expense', [ExpenseTrackController::class,'store'])->name('ExpenseTrack');

    // Route::get('test', [ExpenseTrackController::class, 'getAggregatedExpensesByTrackNo'])->name('test');


    // Route::get('index', [WeatherController::class, 'getWeather'])->name('getWeather');
    Route::view('api', 'pages.test')->name('testApi');

    Route::get('api', [HomeController::class, 'test']);
    Route::get('api/test', [TravelRequestController::class, 'getWeather'])->name('getWeather');
    // Route::get('create-request', [TravelRequestController::class, 'request'])->name('create-request');


    Route::get('expenses', [ExpenseTrackController::class, 'ExpenseView'])->name('ExpenseView');


    Route::view('authorization-paper', 'pages.authorization_paper');
    Route::get('/authorization-paper/{request}', [ExpenseTrackController::class, 'getLetter'])->name('getLetter');


    Route::get('generate-pdf/{request}', [PdfController::class, 'generatePDF'])->name(('generate-pdf'));

    Route::view('policy', 'pages.policy')->name('policy');
});
