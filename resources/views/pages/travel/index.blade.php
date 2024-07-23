@extends('layouts.master')

@section('title', 'Default')

@section('css')
@endsection

@section('style')
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
                <a href="{{ route('travel.request') }}" class="button btn btn-primary">Create new request</a>
            </div>
            {{-- <div class="row justify-content-center"> --}}
            @foreach ($travelRequests as $request)
                <div class="row col-lg-12 bg-white m-1 p-3 pb-4">
                    <div class="left col mr-2">
                        <h5 class="card-title txt-primary f-w-400 col">{{ $request->Title }}</h5>

                        <p class="f-w-400">Tracking code: {{ $request->RequestID }}</p>
                        <p>Due: {{ date('F j, Y', strtotime($request->StartDate)) }} -
                            {{ date('F j, Y', strtotime($request->EndDate)) }}</p>
                        <p>Purpose: {{ $request->PurposeOfTravel }}</p>
                        <a href="{{ route('travel.show', ['requestID' => $request->RequestID]) }}"
                            class="btn btn-outline-primary sm btn-sm mb-2">View</a>
                        <p>Admin Notes: {{ $request->Notes ? $request->Notes : 'N/A' }}</p>

                    </div>
                    <div class="right col border border-top-0 border-end-0 border-bottom-0 ">
                        <p>Estimated Amount</p>
                        <h4 class="f-w-400">₱{{ number_format($request->TotalEstimatedBudget, 2) }}</h4>

                        <p
                            class="card-text badge outline {{ $request->Status == 'Approved' ? 'badge-success' : ($request->Status == 'Pending' ? 'badge-warning' : ($request->Status == 'Rejected' ? 'badge-danger' : '')) }}">
                            {{ $request->Status == 'Pending' ? 'Awaiting Approval' : ($request->Status == 'Rejected' ? 'Rejected' : $request->Status) }}
                        </p>

                        @if ($request->Status == 'Approved')
                            <a href="{{ route('expenses-track', ['trackID' => $request->RequestID]) }}"
                                class="btn btn-square btn-outline-success btn-xs mt-1">Create Expense
                                Report</a>
                        @endif

                        <p>Submitted: {{ date('F j, Y', strtotime($request->created_at)) }}</p>
                    </div>
                    @if ($request->Status == 'Approved')
                        <a href="{{ route('document.index', ['request' => $request->RequestID]) }}"
                            class="btn btn-square btn-outline-success btn-sm">Download Authorizarion Letter</a>
                    @endif
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
