<?php

use Illuminate\Support\Facades\Route;
<<<<<<< Updated upstream

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
=======
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TravelRequestController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\ExpenseController;
>>>>>>> Stashed changes

Route::get('/', function () {
    return redirect()->route('index');
})->name('/');
Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/rkive-travels/livewire/update', $handle);
});

<<<<<<< Updated upstream
Route::view('index', 'index')->name('index');
=======
Livewire::setScriptRoute(function ($handle) {
    return Route::get('/rkive-travels/livewire/livewire.js', $handle);
});
// Login routes
Route::view('login', 'login')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('register', [LoginController::class, 'register'])->name('register');
Route::get('super-login', [LoginController::class, 'superLogin'])->name('super-login');

// Protected routes (require authentication)
Route::middleware('auth')->group(function () {
    Route::view('index', 'index')->name('index');

    //travel Request
    Route::post('request', [TravelRequestController::class, 'store'])->name('store');
    Route::get('request', [TravelRequestController::class, 'show'])->name('request.show');
    Route::get('create-request', [TravelRequestController::class, 'request'])->name('create-request');


    //expense tracking

    // Route::get('/expense-track/{request}', [ExpenseTrackController::class, 'expenseTrack'])->name('expense.track');
    // Route::post('/expense-track', [ExpenseTrackController::class, 'store'])->name('expense.track.store');

    // Route::view('/expense-track', [ExpenseTrackController::class, 'index'])->name('expense.track.view');

    //expense view
    // Route::get('expenses', [ExpenseTrackController::class, 'ExpenseView'])->name('ExpenseView');

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
    Route::view('currency-coverter', 'apps.currency')->name('currency');
    Route::view('translator', 'apps.translator')->name('translator');


    // pdf
    // Route::resource('travel-authorization/print/{request}', PrintController::class)->names('document');


    Route::get('api-testing', [HomeController::class, 'showAPI'])->name('');
    Route::get('/travel-requests/{travelRequest}/edit', [HomeController::class, 'edit'])->name('api-edit');
    Route::delete('/travel-requests/{travelRequest}', [HomeController::class, 'delete'])->name('api-delete');


    //NEW CONTROLLERS
    //Travel
    Route::get('travel', [TravelController::class, 'index'])->name('travel');
    Route::get('travel/{requestID}', [TravelController::class, 'show'])->name('travel.show');
    Route::get('travel-request', [TravelController::class, 'request'])->name('travel.request');
    Route::post('make-request', [TravelController::class, 'store'])->name('make.request');
    Route::put('travel/update/{requestID}', [TravelController::class, 'update'])->name('travel-update');


    //Expenses
    Route::get('expenses', [ExpenseController::class, 'index'])->name('expenses');
    Route::get('expenses-track/{trackID}', [ExpenseController::class, 'show'])->name('expenses-track');
    Route::post('expenses-report', [ExpenseController::class, 'store'])->name('expense-report');

    //submit expense report
    Route::put('submit-expense-report/{requestID}', [ExpenseController::class, 'report'])->name('report');

    //Print
    // Route::resource('travel-authorization/print', PrintController::class)->names('document');
    Route::get('travel-authorization/print/{request}', [PrintController::class, 'index'])->name('document.index');


    //Calendar
    Route::view('rkive-calendar', 'pages.events')->name('events');
    // Route::view('rkive-helpdesk', 'pages.helpdesk')->name('helpdesk');

    // Route::get('create-request', [TravelRequestController::class, 'request'])->name('create-request');

    // Route::get('request', [TravelRequestController::class, 'show']);
    // Route::get('request', [TravelRequestController::class,'show'])->name('expense');
    // Route::get('expense', [ExpenseTrackController::class,'store'])->name('ExpenseTrack');

    // Route::get('test', [ExpenseTrackController::class, 'getAggregatedExpensesByTrackNo'])->name('test');


    // Route::get('index', [WeatherController::class, 'getWeather'])->name('getWeather');
});
>>>>>>> Stashed changes
