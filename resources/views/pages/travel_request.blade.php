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
                <a href="{{ route('create-request') }}" class="button btn btn-primary-gradien">Create new request</a>
            </div>
            {{-- <div class="row justify-content-center"> --}}
            @foreach ($travelBudgetRequests as $request)
                <div class="row col-lg-12 bg-white m-1 p-3 pb-4">
                    <div class="left col mr-2">
                            <h5 class="card-title txt-primary f-w-400 col">{{ $request->project_title }}</h5>

                        <p class="f-w-400">Tracking code: {{ $request->tr_track_no }}</p>
                        <p>Due: {{ date('F j, Y', strtotime($request->start_date)) }} - {{ date('F j, Y', strtotime($request->end_date)) }}</p>
                        <p>Purpose: {{$request->purpose}}</p>
                    </div>
                    <div class="right col border border-top-0 border-end-0 border-bottom-0 ">
                        <p>Reimbursement Amount</p>
                        <h4 class="f-w-400">{{ number_format($request->estimated_amount, 2) }}</h4>
                        {{-- <p class="card-text badge {{ $request->status == 'approved' ? 'badge-success' : 'badge-warning' }}">
                        {{ $request->status }}</p> --}}
                        <p
                            class="card-text badge outline {{ $request->status == 'approved' ? 'badge-success' : ($request->status == 'pending' ? 'badge-warning' : '') }}">
                            {{ $request->status == 'pending' ? 'Awaiting Approval' : $request->status }}
                        </p>
                        @if ($request->status == 'approved')
                            <a href="{{ route('expense.track', ['request' => $request]) }}"
                                class="btn btn-square btn-outline-success btn-xs mt-1">Create Expense
                                Report</a>
                        @endif
                        <p>Submitted: {{ date('F j, Y', strtotime($request->created_at)) }}</p>
                    </div>
                    @if ($request->status == 'approved')
                        <a href="{{ route('expense.track', ['request' => $request]) }}"
                            class="btn btn-square btn-outline-success btn-sm">Download Authorizarion Letter</a>
                    @endif
                </div>
                {{-- <div class="card col-lg-12 col-sm-12 m-2 ">
                    <div class="card-body">
                        <h5 class="card-title txt-primary f-w-400">{{ $request->project_title }}</h5>
                        <p><span class="text-bold">Destination: </span>{{ $request->destination }}</p>

                        <p>Date: {{ $request->start_date }} - {{ $request->end_date }}</p>

                        <p class="card-text badge {{ $request->status == 'approved' ? 'badge-success' : 'badge-warning' }}">
                            Status: {{ $request->status }}</p>
                        <div class="row justify-content-center">
                            @if ($request->status == 'approved')
                            <a href="{{ route('generate-pdf', ['request' => $request]) }}" class=" txt-success">Create Expense
                                Report</a>

                                <a href="{{ route('expense.track', ['request' => $request]) }}" class="btn txt-light"
                                    style="background-color: #5934FD">Create Expense
                                    Report</a>
                            @endif
                        </div>

                    </div>
                </div> --}}
            @endforeach
            {{-- </div> --}}
            <!-- Page Sidebar Ends-->
            {{-- @foreach ($travelBudgetRequests as $request)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Destination: {{ $request->destination }}</h5>
                        <p class="card-text">Status: {{ $request->status }} approval</p>
                        <h1>Eto yung id ng travel Request: {{ $request->tr_track_no }}</h1>
                        @if ($request->status == 'approved')
                            ipapass naten sa parameter si ano request id ni travel then next sa routes papuntang controller na parameter
                            <a href="{{ route('expense_reports.create', ['travelBudgetRequestID' => $request->travel_request_id]) }}"
                                class="btn btn-primary">Create Expense Report</a>
                        @endif
                    </div>
                </div>
            @endforeach --}}

            <!-- Container-fluid starts-->
            {{-- @if ($errors->any() || session('success'))
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
            @endif --}}
            {{-- <div class="col-sm-12"> --}}
            {{-- <div class="card justify-content-center" style=""> --}}
            {{-- <div class="card-header d-flex justify-content-between">
                        <h4>Travel Requests</h4>
                        <a href="{{ route('expense.track', ['request' => $request]) }}" class="btn btn-info text-end">Create Request
                            ✅</a>
                    </div> --}}
            {{-- <div class="col-sm-14 col-xl-4">
                        <div class="ribbon-wrapper card">
                            <div class="card-body">
                                <div class="ribbon ribbon-primary">Ribbon</div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-14 col-xl-4">
                        <div class="ribbon-wrapper card">
                            <div class="card-body">
                                <div class="ribbon ribbon-bookmark ribbon-primary">Ribbon</div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text.</p>
                            </div>
                        </div>
                    </div> --}}
            {{-- <div class="row m-2">
                        @foreach ($travelBudgetRequests as $request)
                            <div class="col-sm-14 col-xl-4">
                                <div class="ribbon-wrapper card">
                                    <div class="card-body">
                                        <div
                                            class="ribbon ribbon-bookmark {{ $request->status == 'approved' ? 'ribbon-primary' : 'ribbon-warning' }}">
                                            status:{{ $request->status }}</div>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text.</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div> --}}
            {{-- <div class="card-body"> --}}

            {{-- <div class="row justify-content-center">
                            @foreach ($travelBudgetRequests as $request)
                                <div class="card col-lg-4 col-sm-12 m-2 ">
                                    <div class="card-body m-1">
                                        <p class="card-title">Title: {{ $request->project_title }}</p>
                                        <p><span class="text-bold">Destination: </span>{{ $request->destination }}</p>

                                        <p>{{ $request->start_date }} - {{ $request->end_date }}</p>

                                        <p
                                            class="card-text badge {{ $request->status == 'approved' ? 'badge-primary' : 'badge-warning' }}">
                                            Status: {{ $request->status }}</p>
                                        <div class="row justify-content-center">
                                            @if ($request->status == 'approved')
                                                <a href="{{ route('expense.track', ['request' => $request]) }}"
                                                    class="btn txt-light" style="background-color: #5934FD">Create Expense
                                                    Report</a>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div> --}}
            {{-- <div id="form-create">
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
                        </div> --}}
            {{-- <form action={{ route('store') }} method="POST" class="mt-5">
                            @csrf
                            @method('POST')

                            <div class="form theme-form">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Project Title</label>
                                            <input class="form-control" type="text" placeholder="Project name *"
                                                data-bs-original-title="" title="" name="project_title">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Name</label>
                                            <input class="form-control" type="text" placeholder="John Doe"
                                                data-bs-original-title="" title="" name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Destination</label>
                                            <input class="form-control" type="text" placeholder="John Doe"
                                                data-bs-original-title="" title="" name="destination">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Budget Amount</label>
                                            <input class="form-control" type="number" placeholder=""
                                                name="estimated_amount">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Starting date</label>
                                            <input class="form-control" type="date" name="start_date">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Ending date</label>
                                            <input class="form-control" type="date" name="end_date">
                                        </div>
                                    </div> --}}







            {{-- <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Project Type</label>
                                            <select class="form-select">
                                                <option value="hour">Hourly</option>
                                                <option value="price">Fix price</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <select class="form-select">
                                                <option value="pending">Hourly</option>
                                                <option value="done">Fix price</option>
                                            </select>
                                        </div>
                                    </div> --}}
            {{-- <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Priority</label>
                                            <select class="form-select">
                                                <option value="low">Low</option>
                                                <option value="medium">Medium</option>
                                                <option value="high">High</option>
                                                <option value="urgent">Urgent</option>
                                            </select>
                                        </div>
                                    </div> --}}








            {{-- </div>
                                <div class="row"> --}}
            {{-- <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Project Size</label>
                                            <select class="form-select">
                                                <option>Small</option>
                                                <option>Medium</option>
                                                <option>Big</option>
                                            </select>
                                        </div>
                                    </div> --}}
            {{-- <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Starting date</label>
                                            <input class="form-control" type="date" name="start_date">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Ending date</label>
                                            <input class="form-control" type="date" name="end_date">
                                        </div>
                                    </div> --}}

            {{-- </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Enter some Details</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="purpose"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <label for="attachment">Attachment:</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="attachment"
                                            name="attachment">
                                        <label class="custom-file-label" for="attachment">Choose file</label>
                                    </div>
                                </div> --}}
            {{-- <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Upload project file</label>
                                            <form class="dropzone" id="singleFileUpload" action="/upload.php">
                                                <div class="dz-message needsclick">
                                                    <i class="icon-cloud-up"></i>
                                                    <h6>Drop files here or click to upload.</h6>
                                                    <span class="note needsclick">Include Attachments</span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> --}}
            {{-- <div class="row">
                                    <div class="col">
                                        <div><a class="btn btn-success me-3" href="#" data-bs-original-title=""
                                                title="" type="submit">Add</a>
                                            <a class="btn btn-danger" href="#" data-bs-original-title=""
                                                title="">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form> --}}
            {{-- </div> --}}
            {{-- </div>
            </div> --}}

            <!-- Container-fluid Ends-->
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
    {{-- dashboard 2 --}}
    {{-- <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/dashboard_2.js') }}"></script>
    <script src="{{ asset('assets/js/animation/wow/wow.min.js') }}"></script> --}}

    {{-- form --}}
    {{-- <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone/dropzone-script.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js') }}"></script> --}}
@endsection
