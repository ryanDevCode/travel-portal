@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')

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
                                        <h4 class="f-w-600">Welcome {{ Auth::user()->name }}</h4>
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
                {{-- background: linear-gradient(90deg, #0700b8 0%, #00ff88 100%); --}}
                <div class="col-sm-12 col-md-6">
                    <livewire:weather-component />
                </div>
            </div>
        </div>









        {{-- cards --}}
        {{-- <div class="card-container container col-12 text-center">
                <div class="row justify-content-center">
                    <div class="card col-3 m-1">1</div>
                    <div class="card col-3 m-1">2</div>
                    <div class="card col-3 m-1">3</div>
                </div>

            </div> --}}
        <div class="card container col-12 text-white text-center">
            <div class="card-header">
                <h2 class="text-secondary">Apps</h2>
                <div class="row justify-content-center">
                    <a href="{{ route('request.show') }}"
                        class="btn btn-outline-primary col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2">
                        <img src="{{ asset('assets/images/dashboard/course/2.svg') }}" alt="img here"
                            style="height: auto; width:70px;" class="mx-auto pop">
                        <span>Budget Expenses</span>
                    </a>
                    <a href="{{ route('ExpenseView') }}"
                        class="btn btn-outline-primary col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2">
                        <img src="{{ asset('assets/images/dashboard/course/1.svg') }}" alt="img here"
                            style="height: auto; width:70px;" class="mx-auto pop">
                        <span>Expense Track</span>
                    </a>
                    <a href="{{ route('Ai') }}"
                        class="btn btn-outline-primary col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2">
                        <img src="{{ asset('assets/images/dashboard/course/3.svg') }}" alt="img here"
                            style="height: auto; width:70px;" class="mx-auto pop">
                        <span>Ask AI</span>
                    </a>
                    <a href="{{ route('request.show') }}"
                        class="btn btn-outline-primary col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2">
                        <img src="{{ asset('assets/images/dashboard/course/4.svg') }}" alt="img here"
                            style="height: auto; width:70px;" class="mx-auto pop">
                        <span>Travel Needs</span>
                    </a>






                    {{-- <a href="{{ route('request.show') }}"
                        class=" btn btn-outline-primary col col-sm-6 col-md-3 mb-3 text-center">
                        <div class="">
                            <div class="card-body d-flex pop">
                                <img src="{{ asset('assets/images/dashboard/course/2.svg') }}" alt="Card icon"
                                    style="height: 70px; width:auto;" class="mx-auto">
                            </div>
                            <span>Budget Expenses</span>

                        </div>
                    </a>

                    <div
                        class="col h-100 col-12 col-sm-6 col-md-3 mb-3 text-center border border-primary bg-danger m-1 p-1">
                        <a href="{{ route('request.show') }}" class=" btn btn-outline-primary">
                            <div class="card-body d-flex pop">
                                <img src="{{ asset('assets/images/dashboard/course/2.svg') }}" alt="Card icon"
                                    style="height: 70px; width:auto;" class="mx-auto">
                            </div>
                            <span>Budget Expenses</span>
                        </a>
                    </div>
                    <div class="col h-100 col-12 col-sm-6 col-md-3 mb-3 text-center">
                        <a href="{{ route('ExpenseView') }}" class=" btn btn-outline-primary">
                            <div class="card-body d-flex pop">
                                <img src="{{ asset('assets/images/dashboard/course/1.svg') }}" alt="Card icon"
                                    style="height: 70px; width:auto;" class="mx-auto">
                            </div>
                            <span>Expense Track</span>
                        </a>
                    </div>
                    <div class="col h-100 col-12 col-sm-6 col-md-3 mb-3 text-center">
                        <a href="{{ route('Ai') }}" class=" btn btn-outline-primary">
                            <div class="card-body d-flex pop">
                                <img src="{{ asset('assets/images/dashboard/course/3.svg') }}" alt="Card icon"
                                    style="height: 70px; width:auto;" class="mx-auto">
                            </div>
                            <span>Ask AI</span>
                        </a>
                    </div>
                    <div class="col h-100 col-12 col-sm-6 col-md-3 mb-3 text-center">
                        <a href="{{ route('request.show') }}" class=" btn btn-outline-primary">
                            <div class="card-body d-flex pop">
                                <img src="{{ asset('assets/images/dashboard/course/4.svg') }}" alt="Card icon"
                                    style="height: 70px; width:auto;" class="mx-auto">
                            </div>
                            <span>Travel Needs</span>
                        </a>
                    </div> --}}

                </div>
            </div>






            {{-- <h3 style="color: rgba(2,0,36,1);" class="text-center mb-3" style="color: rgba(2,0,36,1);">Travel Assistant</h3> --}}
            {{-- <div class="col-sm-12 col-lg-5">
                <div class="card o-hidden welcome-card"
                    style="background: rgb(2,0,36);
                background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
                    <div class="card-body">
                        <h4 class="mb-3 mt-1 f-w-500 mb-0 f-22">{{ Auth::user()->name }}<span> <img
                                    src="{{ asset('assets/images/dashboard/hand.svg') }}" alt="hand vector"></span></h4>
                        <p>Find the features that fit your needs.
                        </p>
                    </div><img class="welcome-img" src="{{ asset('assets/images/dashboard/widget.svg') }}"
                        alt="search image">
                </div>
            </div> --}}



            {{-- <h5 class="f-w-400">{{date('l, F j Y, g:i A', strtotime('now +8 hours'))}}</h5> --}}

            {{-- <div class="card p-0">
                <div class="card-header"
                    style="background: rgb(2,0,36);
                background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
                    <h4 class="text-white">Find what you need</h4>

                </div>
                <div class="card-body pt-4">

                    <div class="course-main-card">
                        <div class="course-wrapper">
                            <div class="course-icon-box">
                                <div class="icon-wrap"><img src="{{ asset('assets/images/dashboard/course/1.svg') }}"
                                        alt="clock vector"></div><img class="arrow-bg"
                                    src="{{ asset('assets/images/dashboard/course/back-arrow/1.png') }}"
                                    alt="sqaure border arrow">
                            </div>
                            <h6 class="f-14">Expenses</h6>
                        </div>
                        <div class="course-wrapper">
                            <div class="course-icon-box">
                                <div class="icon-wrap"><img src="{{ asset('assets/images/dashboard/course/2.svg') }}"
                                        alt="web development vector"></div><img class="arrow-bg"
                                    src="{{ asset('assets/images/dashboard/course/back-arrow/2.png') }}"
                                    alt="sqaure border arrow">
                            </div>
                            <h6 class="f-14">Request</h6>
                        </div>
                        <div class="course-wrapper">
                            <div class="course-icon-box">
                                <div class="icon-wrap"><img src="{{ asset('assets/images/dashboard/course/3.svg') }}"
                                        alt="business vector"></div><img class="arrow-bg"
                                    src="{{ asset('assets/images/dashboard/course/back-arrow/1.png') }}"
                                    alt="sqaure border arrow">
                            </div>
                            <h6 class="f-14">Expense Tracks</h6>
                        </div>

                        <div class="course-wrapper">
                            <a href="https://www.example.com" style="display: block; height: 100%;">
                                <div class="course-icon-box">
                                    <div class="icon-wrap"><img src="{{ asset('assets/images/dashboard/course/4.svg') }}"
                                            alt="marketing vector"></div><img class="arrow-bg"
                                        src="{{ asset('assets/images/dashboard/course/back-arrow/3.png') }}"
                                        alt="sqaure border arrow">
                                </div>
                                <h6 class="f-14" style="color: black">Ai Chatbot</h6>
                            </a>
                        </div>

                    </div>
                </div>
            </div> --}}
            {{-- <div class="card col-6">
                <div class="blog-box blog-list row">
                    <div class="col-sm-5"><img class="img-fluid sm-100-w"
                            src="https://laravel.pixelstrap.com/cuba/assets/images/faq/1.jpg" alt=""></div>
                    <div class="col-sm-7">
                        <div class="blog-details">
                            <div class="blog-date"><span>05</span> January 2022</div>
                            <h6>Java Language </h6>
                            <div class="blog-bottom-content">
                                <ul class="blog-social">
                                    <li>by: Paige Turner</li>
                                    <li>15 Hits</li>
                                </ul>
                                <hr>
                                <p class="mt-0">inventore veritatis et quasi architecto beatae vitae dicta sunt
                                    explicabo. Nemo enim ipsam voluptatem quia voluptas sit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}



        </div>
    </div>
    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';

        // window.addEventListener('load', () => {
        //     const chatBubbles = document.querySelectorAll('.chat-bubble');
        //     chatBubbles.forEach(bubble => {
        //         bubble.style.opacity = 0;
        //         bubble.style.transform = 'translateY(20px)';
        //         setTimeout(() => {
        //             bubble.style.opacity = 1;
        //             bubble.style.transform = 'translateY(0)';
        //         }, 50 * Math.random() * chatBubbles.indexOf(bubble) + 500); // Staggered animation
        //     });
        // });
    </script>
@endsection

@section('script')
    {{-- dashboard 2 --}}
    {{-- <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/dashboard_2.js') }}"></script>
    <script src="{{ asset('assets/js/animation/wow/wow.min.js') }}"></script> --}}
@endsection
