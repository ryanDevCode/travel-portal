@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}"> --}}
@endsection

@section('breadcrumb-title')
    <h3>Expense Report</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Request</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12 col-lg-12">
                <div class="card o-hidden welcome-card"
                    style="background: rgb(2,0,36);
                background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
                    <div class="card-body">
                        <h4 class="mb-3 mt-1 f-w-500 mb-0 f-22">{{ Auth::user()->name }}<span> <img
                                    src="{{ asset('assets/images/dashboard/hand.svg') }}" alt="hand vector"></span></h4>
                        <p>Find the features that fit your needs.
                        </p>

                        <h4>Total Budget: {{ number_format($travelRequest->estimated_amount, 2 )}}</h4>
                        <p>Remaining Bakance {{ number_format($remainingBalance, 2 )}}</p>
                    </div><img class="welcome-img" src="{{ asset('assets/images/dashboard/widget.svg') }}"
                        alt="search image">
                </div>
                {{-- <a href="{{route('test')}}" type="button" class="button btn btn-secondary">Test</a> --}}
            </div>

            @if ($errors->any() || session('success'))
                <div class="alert alert-float" role="alert">
                    <ul>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        @else
                            {{ session('success') }}
                        @endif
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('expense.track.store') }}">
                @csrf
                <h5>Track Your Expenses</h5>
                <div class="row gy-3">
                    <input class="form-control" hidden name="tr_track_no" value="{{ $travelRequest->tr_track_no }}">
                    <div class="col-md-6">
                        <label for="transportation" class="form-label">Transportation:</label>
                        <input type="number" class="form-control" id="transportation" name="transportation" required>
                    </div>

                    <div class="col-md-6">
                        <label for="accommodation" class="form-label">Accommodation:</label>
                        <input type="number" class="form-control" id="accommodation" name="accommodation" required>
                    </div>

                    <div class="col-md-6">
                        <label for="meal" class="form-label">Meal:</label>
                        <input type="number" class="form-control" id="meal" name="meal" required>
                    </div>

                    <div class="col-md-6">
                        <label for="other_expenses_amount" class="form-label">Other Expenses Amount:</label>
                        <input type="number" class="form-control" id="other_expenses_amount" name="other_expenses_amount">
                    </div>

                    <div class="col-md-6">
                        <label for="other_expenses" class="form-label">Other Expenses Description:</label>
                        <input type="text" class="form-control" id="other_expenses" name="other_expenses">
                    </div>

                    <div class="col-md-6">
                        <label for="date" class="form-label">Date:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>

                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary">Submit Expense Report</button>
                    </div>

                </div>

            </form>






            {{--
            @foreach ($travelBudgetRequests as $request)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Destination: {{ $request->destination }}</h5>
                    <p class="card-text">Status: {{ $request->status }} approval</p>
                    @if ($request->status == 'approved')
                        <a href="{{ route('expense_reports.create', $request->id) }}" class="btn btn-primary">Create Expense Report</a>
                        <a href="">Expense Report</a>
                    @endif
                </div>
            </div>
        @endforeach --}}


        </div>
    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection
<script>
    setTimeout(function() {
        $('.alert-float').fadeOut();
    }, 2000);

    $('.alert-float').css({
        position: 'fixed',
        top: '50%',
        left: '50%',
        transform: 'translate(-50%, -50%)',
        zIndex: 9999 // Ensure it floats above other elements
    });
</script>
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
