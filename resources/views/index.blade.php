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
        <div class="row starter-main">
            <div class="col-sm-12 col-lg-5">
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
            </div>
            <div class="card col-lg-4">

            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Find what you need</h4>
                </div>
                {{-- <form action="{{route('getWeather')}}" method="GET">
                    @csrf
                    <input type="text" name="city" placeholder="Enter city name">
                    <button type="submit">Get Weather</button>
                </form>

                @if (!isset($weatherDescription))
                    <p>Weather in {{ $defaultCity }} will be displayed here...</p>
                @else
                    <p>Weather in {{ $city }}: {{ $weatherDescription }}</p>
                    <p>Temperature: {{ round($temperature - 273.15) }}°C</p>
                @endif --}}

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
                        {{-- <div class="course-wrapper">
                            <div class="course-icon-box">
                                <div class="icon-wrap"><img src="{{ asset('assets/images/dashboard/course/4.svg') }}"
                                        alt="marketing vector"></div><img class="arrow-bg"
                                    src="{{ asset('assets/images/dashboard/course/back-arrow/3.png') }}"
                                    alt="sqaure border arrow">
                            </div>
                            <h6 class="f-14">Ai Chatbot</h6>
                        </div> --}}
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
            </div>
            <div class="card col-6">
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
            </div>




        </div>
    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
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
