@extends('layouts.master')

@section('title', 'Default')

@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css') }}"> --}}
@endsection

@section('style')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}"> --}}
@endsection

@section('breadcrumb-title')
    <h3>Travel Budget Request</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Request</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row starter-main">
            {{-- <h1>The weather in {{$cityWeather['name']}}</h1>
    <p>{{$cityWeather['weather'][0]['main']}}</p>
    <p>{{$cityWeather['weather'][0]['description']}}</p>
    <p>{{$cityWeather['name'][0]}}</p> --}}
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
            <div class="text-end mb-2">
                <a href="{{ route('create-request') }}" class="button btn btn-primary">Create new request</a>
            </div>
            {{-- <div class="row justify-content-center"> --}}
            @foreach ($travelBudgetRequests as $request)
                <div class="row col-lg-12 bg-white m-1 p-3 pb-4">
                    <div class="left col mr-2">
                        <h5 class="card-title txt-primary f-w-400 col">{{ $request->project_title }}</h5>

                        <p class="f-w-400">Tracking code: {{ $request->tr_track_no }}</p>
                        <p>Due: {{ date('F j, Y', strtotime($request->start_date)) }} -
                            {{ date('F j, Y', strtotime($request->end_date)) }}</p>
                        <p>Purpose: {{ $request->purpose }}</p>
                        <p>Admin Notes: {{ $request->notes ? $request->notes : 'N/A' }}</p>

                    </div>
                    <div class="right col border border-top-0 border-end-0 border-bottom-0 ">
                        <p>Reimbursement Amount</p>
                        <h4 class="f-w-400">₱{{ number_format($request->estimated_amount, 2) }}</h4>
                        {{-- <p class="card-text badge {{ $request->status == 'approved' ? 'badge-success' : 'badge-warning' }}">
                        {{ $request->status }}</p> --}}
                        <p
                            class="card-text badge outline {{ $request->status == 'Approved' ? 'badge-success' : ($request->status == 'Pending' ? 'badge-warning' : ($request->status == 'rejected' ? 'badge-danger' : '')) }}">
                            {{ $request->status == 'pending' ? 'Awaiting Approval' : ($request->status == 'Rejected' ? 'Rejected' : $request->status) }}
                        </p>

                        @if ($request->status == 'approved')
                            <a href="{{ route('expense.track', ['request' => $request]) }}"
                                class="btn btn-square btn-outline-success btn-xs mt-1">Create Expense
                                Report</a>
                        @endif

                        <p>Submitted: {{ date('F j, Y', strtotime($request->created_at)) }}</p>
                    </div>
                    {{-- @if ($request->status == 'approved')
                        <a href="{{ route('document.index', ['request' => $request->tr_track_no]) }}"
                            class="btn btn-square btn-outline-success btn-sm">Download Authorizarion Letter</a>
                    @endif --}}
                </div>
            @endforeach



        </div>
    </div>
    <!-- footer start-->
    <!-- footer start-->



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

@endsection
