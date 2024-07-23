@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
    <style>
        .app:hover {
            -webkit-box-shadow: 0px 0px 57px -8px rgba(145, 140, 254, 1);
            -moz-box-shadow: 0px 0px 57px -8px rgba(145, 140, 254, 1);
            box-shadow: 0px 0px 57px -8px rgba(145, 140, 254, 1);
        }

        .box {
            border-radius: 19px;
            background: #ffffff;
            box-shadow: 21px 21px 42px #dedede,
                -21px -21px 42px #ffffff;
        }
    </style>
@endsection

@section('breadcrumb-title')
    <h3>Home</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Request</li>
@endsection

@section('content')
    <div class="container-fluid">

        <div class="container">

            <div class="row">

                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="card profile-box">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <div class="greeting-user">
                                        <h4 class="f-w-600">Welcome {{ Auth::user()->first_name }}</h4>
                                        <p>Request budget and track your expenses here!</p>
                                        <div class="whatsnew-btn"><a class="btn btn-outline-white"
                                                href="{{ route('ExpenseView') }}">Expenses</a></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="clockbox">
                                        <svg id="clock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600">
                                            <g id="face">
                                                <circle class="circle" cx="300" cy="300" r="253.9"></circle>
                                                <path class="hour-marks"
                                                    d="M300.5 94V61M506 300.5h32M300.5 506v33M94 300.5H60M411.3 107.8l7.9-13.8M493 190.2l13-7.4M492.1 411.4l16.5 9.5M411 492.3l8.9 15.3M189 492.3l-9.2 15.9M107.7 411L93 419.5M107.5 189.3l-17.1-9.9M188.1 108.2l-9-15.6">
                                                </path>
                                                <circle class="mid-circle" cx="300" cy="300" r="16.2"></circle>
                                            </g>
                                            <g id="hour">
                                                <path class="hour-hand" d="M300.5 298V142"></path>
                                                <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                                            </g>
                                            <g id="minute">
                                                <path class="minute-hand" d="M300.5 298V67"></path>
                                                <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                                            </g>
                                            <g id="second">
                                                <path class="second-hand" d="M300.5 350V55"></path>
                                                <circle class="sizing-box" cx="300" cy="300" r="253.9">
                                                </circle>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="badge f-10 p-0" id="txt"></div>
                                </div>
                            </div>
                            <div class="cartoon"><img class="img-fluid"
                                    src="{{ asset('assets/images/dashboard/cartoon.svg') }}" alt="vector women with leptop">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <livewire:weather-component />
                </div>
            </div>
        </div>

        <div class="card container col-12 text-white text-center">
            <div class="card-header">
                <h2 class="text-dark mb-3">Apps</h2>

                <div class="row justify-content-center">
                    <a href="{{ route('request.show') }}"
                        class="box col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2 app">
                        <img src="{{ asset('assets/images/icons/money-bag.png') }}" alt="img here"
                            style="height: auto; width:70px;" class="mx-auto pop">
                        <span>Budget Expenses</span>
                    </a>
                    <a href="{{ route('ExpenseView') }}"
                        class="box col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2 app">
                        <img src="{{ asset('assets/images/icons/budget.png') }}" alt="img here"
                            style="height: auto; width:70px;" class="mx-auto pop box">
                        <span>Expense Track</span>
                    </a>
                    <a href="{{ route('Ai') }}"
                        class="box col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2 app">
                        <img src="{{ asset('assets/images/icons/faq.png') }}" alt="img here"
                            style="height: auto; width:70px;" class="mx-auto pop">
                        <span>Ask AI</span>
                    </a>
                    <a href="{{ route('map') }}"
                        class="box col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2 app">
                        <img src="{{ asset('assets/images/icons/map.png') }}" alt="img here"
                            style="height: 100px; width:70px;" class="mx-auto pop">
                        <span>Maps</span>
                    </a>
                    <a href="{{ route('currency') }}"
                        class="box col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2 app">
                        <img src="{{ asset('assets/images/icons/exchange-rate.png') }}" alt="img here"
                            style="height: 100px; width:70px;" class="mx-auto pop">
                        <span>Currency Converter</span>

                    </a>
                    {{-- <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCenter">Vertically centered</button> --}}
                    {{-- <div class="modal fade card" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenter" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <livewire:currency-convert />
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button"
                                        data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <a href="{{ route('Restaurant') }}"
                        class="box col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2 app">
                        <img src="{{ asset('assets/images/icons/restaurant.png') }}" alt="img here"
                            style="height: 100px; width:70px;" class="mx-auto pop">
                        <span>Find Restaurant</span>
                    </a>
                    <hr>
                    <div class="text-dark">
                        <h3>Quick Access</h3>
                        <p>Find your travel needs with google travel</p>
                    </div>


                    <a href="https://www.google.com/travel/flights"
                        class="box col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2 app">
                        <img src="{{ asset('assets/images/icons/flights.svg') }}" alt="img here"
                            style="height: 100px; width:70px;" class="mx-auto pop">
                        <span>Find Flights</span>
                    </a>
                    <a href="https://www.google.com/travel/hotels"
                        class="box col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2 app">
                        <img src="{{ asset('assets/images/icons/hotels.svg') }}" alt="img here"
                            style="height: 100px; width:70px;" class="mx-auto pop">
                        <span>Find Hotels</span>
                    </a>
                    <a href="https://www.google.com/travel/explore"
                        class="box col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2 app">
                        <img src="{{ asset('assets/images/icons/explores.svg') }}" alt="img here"
                            style="height: 100px; width:70px;" class="mx-auto pop">
                        <span>Explore</span>
                    </a>

                </div>

            </div>







        </div>
    </div>
    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')

@endsection
