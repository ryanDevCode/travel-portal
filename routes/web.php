<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\ExpenseTrackController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TravelRequestController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\AppsController;

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

    //travel Request
    Route::post('request', [TravelRequestController::class, 'store'])->name('store');
    Route::get('request', [TravelRequestController::class, 'show'])->name('request.show');
    Route::get('create-request', [TravelRequestController::class, 'request'])->name('create-request');


    //expense tracking

    Route::get('/expense-track/{request}', [ExpenseTrackController::class, 'expenseTrack'])->name('expense.track');
    Route::post('/expense-track', [ExpenseTrackController::class, 'store'])->name('expense.track.store');
    // Route::view('/expense-track', [ExpenseTrackController::class, 'index'])->name('expense.track.view');

    //expense view
    Route::get('expenses', [ExpenseTrackController::class, 'ExpenseView'])->name('ExpenseView');

    //expense report
    Route::post('expense-report', [ExpenseTrackController::class, 'expenseReport'])->name('expenseReport');
    //api
    Route::view('api', 'pages.test')->name('testApi');
    Route::get('api', [HomeController::class, 'test']);
    Route::get('api/test', [TravelRequestController::class, 'getWeather'])->name('getWeather');





    //PDF GENERATOR
    // Route::view('authorization-paper', 'pages.authorization_paper');
    // Route::get('/authorization-paper/{request}', [ExpenseTrackController::class, 'getLetter'])->name('getLetter');
    // Route::get('generate-pdf/{request}', [PdfController::class, 'generatePDF'])->name(('generate-pdf'));
    Route::view('policy', 'pages.policy')->name('policy');


    //Ai Assistant
    Route::get('assistant', [ChatController::class, 'index'])->name('chat');
    // Route::post('/chat', 'App\Http\Controllers\ChatController');
    Route::view('aitest', 'welcome');
    // Route::post('/chat', [ChatController::class, 'chat'])->name('chat.create');
    Route::get('/chat', [ChatController::class, 'index']);
    Route::get('/ask-question/{question}', [ChatController::class, 'askQuestion']);
    // In your routes/web.php file
    Route::get('/chatbot', [ChatController::class, 'index']);
    Route::post('chatbot/process', [ChatController::class, 'processMessage'])->name('aiTestKenme');


    //apps
    Route::get('maps', [AppsController::class, 'showMaps'])->name('map');
    Route::view('ask-ai', 'apps.chatbot')->name('Ai');
    Route::view('find-restaurant', 'apps.find-restaurant')->name('Restaurant');
    Route::get('currency-converter', [AppsController::class, 'convertCurrency'])->name('convert');


    // pdf
    Route::resource('travel-authorization/print/{request}', PrintController::class)->names('document');







    // Route::get('create-request', [TravelRequestController::class, 'request'])->name('create-request');

    // Route::get('request', [TravelRequestController::class, 'show']);
    // Route::get('request', [TravelRequestController::class,'show'])->name('expense');
    // Route::get('expense', [ExpenseTrackController::class,'store'])->name('ExpenseTrack');

    // Route::get('test', [ExpenseTrackController::class, 'getAggregatedExpensesByTrackNo'])->name('test');


    // Route::get('index', [WeatherController::class, 'getWeather'])->name('getWeather');
});
