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
                <div class="col-sm-12 col-md-6">
                    <livewire:weather-component />
                </div>
            </div>
        </div>
        <button id="openModalBtn">Open Modal</button>

{{-- <div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Custom Modal</h2>
    <p>This is a custom modal.</p>
  </div>
</div> --}}
        <livewire:currency-converter />
        {{-- <div class="container border border-primary p-4" style="height: 500px; width: 500px;">
            <h5 class="f-w-100">Converted Amount: 12, 000</h5>

            <form wire:submit.prevent="convert" class="mt-4">
                <div class="form-group mt-1">
                    <label for="amount">Enter amount</label>
                    <input type="number" wire:model.lazy="amount" id="amount" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="convertFrom">Convert From</label>
                    <select name="convertFrom" id="convertFrom" class="form-control">
                        <option value="Kenme" class="form-control">Kenemekek</option>
                        <option value="Kenme" class="form-control">Kenemekek</option>
                        <option value="Kenme" class="form-control">Kenemekek</option>
                        <option value="Kenme" class="form-control">Kenemekek</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="convertTo">Convert To</label>
                    <select name="convertTo" id="convertTo" class="form-control">
                        <option value="Kenme">Kenemekek</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Convert</button>
            </form>

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
                    <a href="{{ route('request.show') }}" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg"
                        class="btn btn-outline-primary col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2">
                        <img src="{{ asset('assets/images/dashboard/course/4.svg') }}" alt="img here"
                            style="height: auto; width:70px;" class="mx-auto pop">
                        <span>Currency Converter</span>

                    </a>

                </div>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Large modal</button>
               <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                           <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">...</div>
                     </div>
                  </div>
               </div>
            </div>







        </div>
    </div>
    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
        // Get the modal element
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("openModalBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Open the modal when the button is clicked
btn.onclick = function() {
  modal.style.display = "block";
}

// Close the modal when the <span> element is clicked
span.onclick = function() {
  modal.style.display = "none";
}

// Close the modal when the user clicks outside of it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
    </script>
@endsection

@section('script')

@endsection
