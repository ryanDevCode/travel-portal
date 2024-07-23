@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('style')

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
                        <h4 class="mb-3 mt-1 f-w-500 mb-0 f-22">{{ Auth::user()->first_name }}<span> <img
                                    src="{{ asset('assets/images/dashboard/hand.svg') }}" alt="hand vector"></span></h4>

                        @foreach ($travelRequest as $travelRequest)
                            <h4 class="f-w-400">Total Budget: ₱{{ number_format($travelRequest->TotalEstimatedBudget, 2) }}
                            </h4>
                            <h5 class="f-w-400">Remaining Balance ₱{{ number_format($remainingBalance, 2) }}</h5>
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
                            <form method="POST" action="{{ route('expense-report') }}">
                                @csrf
                                <h5>Track Your Expenses</h5>
                                <div class="row gy-3">
                                    <input class="form-control" hidden name="RequestID"
                                        value="{{ $travelRequest->RequestID }}">
                                    <div class="col-md-6">
                                        <label for="transportation" class="form-label">Mode Of Transportation:</label>
                                        <input type="text" class="form-control" id="transportation"
                                            name="ModeOfTransportation" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="transportation" class="form-label">Transportation Cost:</label>
                                        <input type="text" class="form-control" id="transportation"
                                            name="TransportationCost" required onkeyup="formatPesoOptional(this)">
                                        <input type="hidden" name="TransportationCostNumeric"
                                            id="TransportationCostNumeric">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="accommodation" class="form-label">Accommodation Cost:</label>
                                        <input type="text" class="form-control" id="accommodation"
                                            name="AccommodationCost" required onkeyup="formatPesoOptional(this)">
                                        <input type="hidden" name="AccommodationCostNumeric" id="AccommodationCostNumeric">
                                    </div>
                                    @if (!is_null($travelRequest->DailyAllowance))
                                        <div class="col-md-6">
                                            <label for="daily_allowance" class="form-label">Daily Allowance:</label>
                                            <input type="text" class="form-control" id="daily_allowance"
                                                name="DailyAllowance" onkeyup="formatPesoOptional(this)">
                                            <input type="hidden" name="DailyAllowanceNumeric" id="DailyAllowanceNumeric">
                                        </div>
                                    @endif
                                    @if (!is_null($travelRequest->ConferenceRegistrationFee))
                                        <div class="col-md-6">
                                            <label for="conference_fee" class="form-label">Conference Registration
                                                Fee</label>
                                            <input type="text" class="form-control" id="conference_fee"
                                                name="ConferenceRegistrationFee" onkeyup="formatPesoOptional(this)">
                                            <input type="hidden" name="ConferenceRegistrationFeeNumeric"
                                                id="ConferenceRegistrationFeeNumeric">
                                        </div>
                                    @endif
                                    @if (!is_null($travelRequest->VisaDocumentationFee))
                                        <div class="col-md-6">
                                            <label for="accommodation" class="form-label">Visa Documentation Fee</label>
                                            <input type="text" class="form-control" id="accommodation"
                                                name="VisaDocumentationFee" onkeyup="formatPesoOptional(this)"
                                                autocomplete="off">
                                            <input type="hidden" name="VisaDocumentationFeeNumeric"
                                                id="VisaDocumentationFeeNumeric">
                                        </div>
                                    @endif
                                    @if (!is_null($travelRequest->TravelInsuranceCost))
                                        <div class="col-md-6">
                                            <label for="insurance_cost" class="form-label">Travel Insurance Cost</label>
                                            <input type="text" class="form-control" id="insurance_cost"
                                                name="TravelInsuranceCost" onkeyup="formatPesoOptional(this)">
                                            <input type="hidden" name="TravelInsuranceCostNumeric"
                                                id="TravelInsuranceCostNumeric">
                                        </div>
                                    @endif
                                    {{-- <input type="text" name="travel_request_id" value="{{ $request }}" hidden> --}}

                                    <div class="col-md-6">
                                        <label for="meal" class="form-label">Meal:</label>
                                        <input type="text" class="form-control" id="meal"
                                            name="MealsAndIncidentals" required onkeyup="formatPesoOptional(this)">
                                        <input type="hidden" name="MealsAndIncidentalsNumeric"
                                            id="MealsAndIncidentalsNumeric">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="other_expenses_amount" class="form-label">Other Expenses:</label>
                                        <input type="text" class="form-control" id="other_expenses_amount"
                                            name="MiscellaneousExpenses" onkeyup="formatPesoOptional(this)">
                                        <input type="hidden" name="MiscellaneousExpensesNumeric"
                                            id="MiscellaneousExpensesNumeric">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="other_expenses_amount" class="form-label">Remarks:</label>
                                        <input type="text" class="form-control" id="other_expenses_amount"
                                            name="Remarks" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="date" class="form-label">Date:</label>
                                        <input type="date" class="datepicker-here form-control digits" type="text"
                                            id="date" name="Date" required>
                                    </div>

                                    @if ($travelRequest->Status == 'Finished')
                                        <div class="col-12 mt-4">
                                            <button class="btn btn-primary" type="button" disabled>Add Expenses</button>
                                            <div class="text-danger">Cannot add expenses, Travel is already
                                                finished</div>
                                        </div>
                                    @else
                                        <div class="col-12 mt-4">
                                            <button class="btn btn-primary" type="submit">Add Expenses</button>
                                        </div>
                                    @endif


                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-sm-12">
                <div class="">

                    <div class="row card-header p-4 card-no-border">
                        <div class="col-lg-6 col-sm-12 right">
                            <h5 class="f-w-400">{{ $travelRequest->Title }}</h5>
                            <p><span class="txt-success">Track Code: </span> {{ $travelRequest->RequestID }}</p>
                            <p>Duration: {{ date('F j, Y', strtotime($travelRequest->StartDate)) }} -
                                {{ date('F j, Y', strtotime($travelRequest->EndDate)) }}</p>
                            <p>Travel Purpose: {{ $travelRequest->PurposeOfTravel }}</p>
                            <p>Travel Purpose: <span class="text-success">{{ $travelRequest->Status }}</span></p>
                        </div>
                        <div class="col-lg-6 left  col-sm-12 border border-top-0 border-end-0 border-bottom-0 ">

                            <p>Amount:</p>

                            <h5>₱{{ number_format($travelRequest->TotalEstimatedBudget, 2) }}</h5>
                            <p>Submitted On: {{ date('F j, Y', strtotime($travelRequest->created_at)) }}</p>
                            <div class="float-right">

                                @if (!empty($totalExpensesAmount))
                                    <button class="btn btn-outline-danger" type="button" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalCenter">Submit expense report </button>

                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenter" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Expense Summary</h5>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <p class="txt-danger text-center pt-2">Review expense summary</p>
                                                <div class="table">
                                                    <table class="table">
                                                        <thead>
                                                            <tr class="border-bottom-primary text-center">
                                                                <th scope="col">Expense Type</th>
                                                                <th scope="col">Total Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Transportation</td>
                                                                <td>
                                                                    ₱{{ number_format($totalExpenses->TransportationCost, 2) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Accomodation</td>
                                                                <td>
                                                                    ₱{{ number_format($totalExpenses->AccommodationCost, 2) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Daily Allowance</td>
                                                                <td>₱{{ number_format($totalExpenses->DailyAllowance, 2) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Conference Registration Fee</td>
                                                                <td>₱{{ number_format($totalExpenses->ConferenceRegistrationFee, 2) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Visa Documentation Fee</td>
                                                                <td>₱{{ number_format($totalExpenses->VisaDocumentationFee, 2) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Travel Insurance Cost</td>
                                                                <td>₱{{ number_format($totalExpenses->TravelInsuranceCost, 2) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Other Expenses</td>
                                                                <td>
                                                                    ₱{{ number_format($totalExpenses->MiscellaneousExpenses, 2) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Overall Total</td>
                                                                <td>
                                                                    ₱{{ number_format($totalExpenses->TotalExpenses, 2) }}
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>Remaining Balance</td>
                                                                <td>
                                                                    ₱{{ number_format($remainingBalance, 2) }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-body">

                                                    <form
                                                        action={{ route('report', ['requestID' => $travelRequest->RequestID]) }}
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="text" value="Submitted" hidden
                                                            name="ExpenseApproval">

                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button class="btn btn-primary" type="submit">Save
                                                        changes</button>
                                                </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <p>There are no expenses to submit at this time.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="display" id="basic-6">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Mode of Transportation</th>
                                        <th>Transportation</th>
                                        <th>Accommodation</th>
                                        <th>Daily Allowance</th>
                                        <th>Food</th>
                                        <th>Conference</th>
                                        <th>Visa</th>
                                        <th>Insurance</th>
                                        <th>Mischellaneous</th>
                                        <th>Remarks</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expenses as $expense)
                                        <tr>
                                            <td>{{ $expense->Date }}</td>
                                            <td>₱{{ number_format($expense->TotalExpenses, 2) }}</td>
                                            <td>{{ $expense->ModeOfTransportation }}</td>
                                            <td>₱{{ number_format($expense->TransportationCost, 2) }}</td>
                                            <td>₱{{ number_format($expense->AccommodationCost, 2) }}</td>
                                            <td>₱{{ number_format($expense->DailyAllowance, 2) }}</td>
                                            <td>₱{{ number_format($expense->MealsAndIncidentals, 2) }}</td>
                                            <td>₱{{ number_format($expense->ConferenceRegistrationFee, 2) }}</td>
                                            <td>₱{{ number_format($expense->VisaDocumentationFee, 2) }}</td>
                                            <td>₱{{ number_format($expense->TravelInsuranceCost, 2) }}</td>
                                            <td>₱{{ number_format($expense->MiscellaneousExpenses, 2) }}</td>
                                            <td>{{ $expense->Remarks }}</td>
                                            {{-- <td class="action"> <a class="pdf" href="sample.pdf') }}"
                                                    target="_blank"><i class="icofont icofont-file-pdf"></i></a></td>
                                            <td>{{ $expense->total }}</td> --}}
                                            {{-- <td>
                                                <ul class="action">
                                                    <li class="edit"> <a href="#"><i
                                                                class="icon-pencil-alt"></i></a>
                                                    </li>
                                                    <li class="delete"><a href="#"><i class="icon-trash"></i></a>
                                                    </li>
                                                </ul>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
<script>
    setTimeout(function() {
        $('.alert-float').fadeOut();
    }, 2000);

    $('.alert-float').css({
        position: 'fixed',
        top: '50%',
        left: '50%',
        transform: 'translate(-50%, -50%)',
        zIndex: 9999
    });
    $(document).ready(function() {
        // Get current date
        var currentDate = new Date();
        var day = ("0" + currentDate.getDate()).slice(-2);
        var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
        var today = currentDate.getFullYear() + "-" + (month) + "-" + (day);

        // Initialize datepicker
        $('.datepicker-here').datepicker({
            startDate: today,
            autoclose: true,
            format: 'yyyy-mm-dd'
        });

    });


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

    function formatPesoOptional(input) {
        // Remove non-numeric characters
        let value = input.value.replace(/\D/g, '');

        // Format the number as Philippine peso if not empty
        let formattedValue = '';
        if (value !== '') {
            formattedValue = new Intl.NumberFormat('en-PH', {
                style: 'currency',
                currency: 'PHP'
            }).format(value / 100);
        }

        // Update the visible input field with formatted value
        input.value = formattedValue;

        // Update the corresponding hidden input field with the numeric value
        let numericInputId = input.name + 'Numeric';
        let numericInput = document.getElementById(numericInputId);
        if (numericInput) {
            numericInput.value = value === '' ? '' : value / 100;
        }
    }


    function formatPeso(input) {
        // Get the numeric value
        let value = parseFloat(input.value);

        // Check if value is a valid number
        if (!isNaN(value)) {
            // Update the visible input field with the formatted value
            input.value = value.toLocaleString('en-PH', {
                style: 'currency',
                currency: 'PHP'
            });

            // Update the corresponding hidden input field with the numeric value
            let numericInputId = input.name + 'Numeric';
            document.getElementById(numericInputId).value = value;
        } else {
            // Clear the visible input field if value is not a valid number
            input.value = '';

            // Clear the corresponding hidden input field
            let numericInputId = input.name + 'Numeric';
            document.getElementById(numericInputId).value = '';
        }
    }
</script>
@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/height-equal.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
@endsection
