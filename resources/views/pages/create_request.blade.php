@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
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
                        <button type="button" class="btn btn-info terms-and-conditions-button"
                            style="display: none;">Submit</button>

                        <form action={{ route('store') }} method="POST" enctype="multipart/form-data">
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
                                            <input class="form-control" type="text" placeholder=""
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
                                    <div class="date-picker col-md-4 mb-3">
                                        <label class="form-label"> Start Date</label>
                                        <div class="input-group">
                                            <input class="datepicker-here form-control digits" type="text"
                                                data-language="en" data-bs-original-title="" title=""
                                                name="start_date" required />
                                        </div>
                                    </div>
                                    <div class="date-picker col-md-4 mb-3">
                                        <label class="form-label"> End Date</label>
                                        <div class="input-group">
                                            <input class="datepicker-here form-control digits" type="text"
                                                data-language="en" data-bs-original-title="" title="" name="end_date"
                                                required />
                                        </div>
                                    </div>
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
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="attachment">Attachment: (optional)</label>
                                        <div class="">
                                            <div class="custom-file">
                                                <input type="file" class="form-control" id="attachment"
                                                    name="attachment">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <label for="attachment">Attachment:</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="attachment" name="attachment">
                                        <label class="custom-file-label" for="attachment">Choose file</label>
                                    </div>
                                </div> --}}

                                <button class="btn btn-primary float-end" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalLong">Submit</button>
                            </div>


                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Terms and Condition</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body col-12">
                                            <h3>
                                                Travel Budget Request Portal Policy</h3>
                                            <h6>1. Introduction</h6>
                                            <p>This policy outlines the guidelines and procedures for utilizing the
                                                company's travel budget request portal
                                                for submitting and approving travel budget requests.</p>
                                            <h6>2. Eligibility</h6>
                                            <p>All employees employed by [Company Name] who require company-funded travel
                                                for business purposes are eligible
                                                to submit travel budget requests through the portal.</p>
                                            <h6>3. Travel Types Covered</h6>
                                            <p>The portal covers travel requests for:</p>
                                            <ul>
                                                <li>Business trips: attending conferences, meetings, client visits, and
                                                    other work-related travel.</li>
                                                <li>Professional development: training courses, workshops, and seminars
                                                    directly related to employee's job
                                                    duties.</li>
                                                <li>Relocations approved by the company.</li>
                                            </ul>
                                            <h6>4. Exclusions</h6>
                                            <p>The following are not covered by the travel budget request portal:</p>
                                            <ul>
                                                <li>Personal travel.</li>
                                                <li>Travel for family members or guests.</li>
                                                <li>Commutes to and from the employee's regular work location.</li>
                                                <li>Travel expenses already reimbursed through another company program.</li>
                                            </ul>
                                            <h6>5. Budget Limitations</h6>
                                            <p>Travel budget requests are subject to availability and approval based on
                                                departmental budgets and overall
                                                company financial considerations.</p>
                                            <h6>6. Request Process</h6>
                                            <ul>
                                                <li>Employees must submit travel budget requests through the designated
                                                    portal, providing detailed information about the trip, estimated costs,
                                                    and justification for company funding.</li>
                                                <li>Requests should be submitted at least [Number] days prior to the planned
                                                    travel date to allow for proper review and approval.</li>
                                                <li>Department managers or authorized personnel will review the submitted
                                                    requests and make approval decisions based on established criteria.</li>
                                                <li>Applicants will be notified of the approval or denial decision via
                                                    email.</li>
                                            </ul>
                                            <h6>7. Cost Considerations</h6>
                                            <p>Employees are expected to:</p>
                                            <ul>
                                                <li>Choose cost-effective travel options within reasonable limits.</li>
                                                <li>Adhere to company guidelines for airfare, hotels, meals, and other
                                                    expenses.</li>
                                                <li>Document all travel expenditures with receipts for reimbursement.</li>
                                            </ul>
                                            <h6>8. Reimbursement Process</h6>
                                            <p>Approved travel expenses will be reimbursed upon submission of valid receipts
                                                and completion of the designated company reimbursement form.</p>
                                            <h6>9. Policy Violation</h6>
                                            <p>Non-compliance with this policy, including misuse of the portal or violation
                                                of expense guidelines, may result in disciplinary action.</p>
                                            <h6>10. Updates</h6>
                                            <p>This policy is subject to revision at any time as deemed necessary by the
                                                company. All employees are responsible for staying informed about any
                                                updates to the policy.</p>
                                            <h6>11. Contact Information</h6>
                                            <p>For any questions or concerns regarding the travel budget request portal or
                                                this policy, please contact [Department/Person] at [Contact Information].
                                            </p>


                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button"
                                                data-bs-dismiss="modal">Close</button>
                                            <button class="btn btn-primary" type="Submit">Agree and Submit</button>
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
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button"
                                            class="btn btn-primary accept-terms-and-conditions">Accept</button>
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
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
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
