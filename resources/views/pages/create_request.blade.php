@extends('layouts.master')

@section('title', 'Default')

@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css') }}"> --}}
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    {{-- <h3>Travel Budget Request</h3> --}}
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Expenses</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row starter-main">

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



            <div class="col-sm-12">
                <div class="card justify-content-center" style="">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Travel Requests Form</h4>
                    </div>

                    <div class="card-body">


                        <div id="form-create">
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
                        </div>
                        <button type="button" class="btn btn-info terms-and-conditions-button" style="display: none;">Submit</button>

                        <form action={{ route('store') }} method="POST">
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
                                    </div>


                                </div>
                                <div class="row">


                                </div>
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
                                </div>

                                <button type="submit" class="btn btn-info">Submit</button>
                                <button type="button" class="btn btn-info terms-and-conditions-button" style="display: none;">Submit</button>
                            </div>
                            <div class="modal" id="terms-and-conditions-modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Terms and Conditions</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary accept-terms-and-conditions">Accept</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </form>
                        <div class="modal" id="terms-and-conditions-modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Terms and Conditions</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary accept-terms-and-conditions">Accept</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

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
    $(document).ready(function() {
    // Hide the original submit button
    $('.btn-info[type="submit"]').hide();

    // Show terms and conditions modal on form submission
    $('form').submit(function(event) {
        event.preventDefault();
        $('#terms-and-conditions-modal').modal('show');
    });

    // Handle accept button in modal
    $('.accept-terms-and-conditions').click(function() {
        $('#terms-and-conditions-modal').modal('hide');
        $('.terms-and-conditions-button').click(); // Trigger original submit button
    });
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
