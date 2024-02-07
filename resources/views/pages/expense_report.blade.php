@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('breadcrumb-title')
    <h3>Expense Report</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Request</li>
@endsection

@section('content')
    {{-- background-color: #00DBDE;
background-image: linear-gradient(90deg, #00DBDE 0%, #FC00FF 100%); --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card o-hidden welcome-card"
                    style="background: rgb(2,0,36);
                background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
                    <div class="card-body">
                        <h4 class="mb-3 mt-1 f-w-500 mb-0 f-22">{{ Auth::user()->name }}<span> <img
                                    src="{{ asset('assets/images/dashboard/hand.svg') }}" alt="hand vector"></span></h4>


                        <h4 class="f-w-400">Total Budget: {{ number_format($travelRequest->estimated_amount, 2) }}</h4>
                        <h5 class="f-w-400">Remaining Balance {{ number_format($remainingBalance, 2) }}</h5>
                    </div><img class="welcome-img" src="{{ asset('assets/images/dashboard/widget.svg') }}"
                        alt="search image">
                </div>
                {{-- <a href="{{route('test')}}" type="button" class="button btn btn-secondary">Test</a> --}}
            </div>

            @if ($errors->any() || session('success'))
                <div class="alert alert-success dark alert-dismissible fade show alert-float" role="alert">
                    <ul>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        @else
                            {{ session('success') }}
                        @endif
                    </ul>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="default-according pb-5" id="accordion">
                <div class="card">
                    <div class="card-header ">
                        <h5 class="mb-0 ">
                            <button class="btn btn-link txt-danger" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">Input your expenses here</button>
                        </h5>
                    </div>
                    <div class="collapse show" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordion">
                        <div class="card-body">
                            <form method="POST" action="{{ route('expense.track.store') }}">
                                @csrf
                                <h5>Track Your Expenses</h5>
                                <div class="row gy-3">
                                    <input class="form-control" hidden name="tr_track_no"
                                        value="{{ $travelRequest->tr_track_no }}">
                                    <div class="col-md-6">
                                        <label for="transportation" class="form-label">Transportation:</label>
                                        <input type="number" class="form-control" id="transportation" name="transportation"
                                            required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="accommodation" class="form-label">Accommodation:</label>
                                        <input type="number" class="form-control" id="accommodation" name="accommodation"
                                            required>
                                    </div>
                                    <input type="text" name="travel_request_id" value="{{$request}}" hidden>

                                    <div class="col-md-6">
                                        <label for="meal" class="form-label">Meal:</label>
                                        <input type="number" class="form-control" id="meal" name="meal" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="other_expenses_amount" class="form-label">Other Expenses Amount:</label>
                                        <input type="number" class="form-control" id="other_expenses_amount"
                                            name="other_expenses_amount">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="other_expenses" class="form-label">Other Expenses Description:</label>
                                        <input type="text" class="form-control" id="other_expenses"
                                            name="other_expenses">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="date" class="form-label">Date:</label>
                                        <input type="date" class="form-control" id="date" name="date" required>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <button class="btn btn-primary" type="submit">Add Expenses</button>
                                    </div>

                                </div>
                                {{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
                                   <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                         <div class="modal-header">
                                            <h5 class="modal-title">Modal title</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body">
                                            <p>Review your input before submitting</p>
                                         </div>
                                         <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                            <button class="btn btn-primary" type="submit">Save changes</button>
                                         </div>
                                      </div>
                                   </div>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>

            </div>


            {{-- //insert table for expenses --}}
            <div class="col-sm-12">
                <div class="">
                    <div class="row card-header p-4 card-no-border">
                        <div class="col-lg-6 col-sm-12 right">
                            <h5 class="f-w-400">{{ $travelRequest->project_title }}</h5>
                            <p><span class="txt-success">Track Code: </span> {{ $travelRequest->tr_track_no }}</p>
                            <p>Duration: {{ date('F j, Y', strtotime($travelRequest->start_date)) }} -
                                {{ date('F j, Y', strtotime($travelRequest->end_date)) }}</p>
                            <p>Travel Purpose: {{ $travelRequest->purpose }}</p>
                        </div>
                        <div class="col-lg-6 left  col-sm-12 border border-top-0 border-end-0 border-bottom-0 ">

                            <p>Amount:</p>

                            <h5>{{ number_format($travelRequest->estimated_amount, 2) }}</h5>
                            <p>Submitted On: {{ date('F j, Y', strtotime($travelRequest->created_at)) }}</p>
                            <div class="float-right">

                                @if (!empty($total))
                                    <form action="{{ route('expenseReport') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <input type="number" value="{{ $total->total_transportation }}" hidden
                                            name="total_transportation">
                                        <input type="number" value="{{ $total->total_meal }}" hidden name="total_meal">
                                        <input type="number" value="{{ $total->total_accommodation }}" hidden
                                            name="total_accommodation">
                                        <input type="number" value="{{ $total->total_other_expenses }}" hidden
                                            name="total_other_expenses">
                                        <input type="number" value="{{ $total->total_expenses }}" hidden
                                            name="total">
                                        <input type="text" value="{{ $travelRequest->tr_track_no }}" hidden
                                            name="tr_track_no">


                                            <button class="btn btn-square btn-outline-secondary" type="button"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Submit Expense
                                                Report</button>
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Modal title</h5>
                                                            <button class="btn-close" type="button"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Review your input before submitting</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button class="btn btn-primary" type="submit">Save
                                                                changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <form
                                            action="{{ route('expenseReport', ['id' => $travelRequest->tr_track_no]) }}"
                                            method="POST">
                                        </form>
                                    @else
                                        <p>There are no expenses to submit at this time.</p>
                                @endif

                                {{-- <form action="{{route('expenseReport' , ['id' => $travelRequest->tr_track_no])}}" method="POST">
                                    <button type="submit">Expense Report</button>
                                </form>
                                <a href="{{route('expenseReport' , ['id' => $travelRequest->tr_track_no])}}">get test</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-6">
                                <thead>
                                    {{-- <tr>
                                        <th rowspan="2">{{$travelRequest->project_title}}</th>
                                        <th colspan="2">Expense Information</th>
                                        <th colspan="3">Contact</th>
                                    </tr> --}}
                                    <tr>
                                        <th>Date</th>
                                        <th>Transportation</th>
                                        <th>Accommodation</th>
                                        <th>Food</th>
                                        <th>Others</th>
                                        <th>Attachment</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expenses as $expense)
                                        <tr>
                                            <td>{{ $expense->date }}</td>
                                            <td>{{ $expense->transportation }}</td>
                                            <td>{{ $expense->accommodation }}</td>
                                            <td>{{ $expense->meal }}</td>
                                            <td>{{ $expense->other_expenses_amount }}</td>
                                            <td class="action"> <a class="pdf" href="sample.pdf') }}"
                                                    target="_blank"><i class="icofont icofont-file-pdf"></i></a></td>
                                            <td>{{ $expense->total }}</td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit"> <a href="#"><i
                                                                class="icon-pencil-alt"></i></a>
                                                    </li>
                                                    <li class="delete"><a href="#"><i class="icon-trash"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                {{-- <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Salary</th>
                                        <th>Office</th>
                                        <th>CV </th>
                                        <th>Status</th>
                                        <th>E-mail</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>






            {{-- <form method="POST" action="{{ route('expense.track.store') }}">
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

            </form> --}}






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
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/height-equal.js') }}"></script>
@endsection
