@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
@endsection

@section('style')
    <style>
        .input-icon {
            position: relative;
        }

        .currency-symbol {
            position: absolute;
            display: block;
            transform: translate(0, -50%);
            top: 50%;
            left: 10px;
            /* Adjust the position as needed */
            color: #aaa;
            pointer-events: none;
            font-weight: bold;
        }
    </style>
@endsection

@section('breadcrumb-title')
    <h3>Travel Budget Request</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Travel</li>
    <li class="breadcrumb-item active">Request</li>
@endsection

@section('content')
    <div class="container-fluid">


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


        <div class="col-sm-12">
            <div class="card justify-content-center" style="">
                <div class="card-header d-flex justify-content-between">
                    <h4>Travel Requests Form</h4>
                </div>

                <div class="card-body">

                    <button type="button" class="btn btn-info terms-and-conditions-button"
                        style="display: none;">Submit</button>

                    <form action={{ route('make.request') }} method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form theme-form">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Title</label>
                                        <input class="form-control" type="text" placeholder="Project title"
                                            data-bs-original-title="" title="" name="Title" autocomplete="off"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Department</label>
                                        <input class="form-control" type="text" placeholder="" data-bs-original-title=""
                                            title="" name="Department" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Destination</label>
                                        <input class="form-control" type="text" placeholder="" data-bs-original-title=""
                                            title="" name="Destinations" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Purpose</label>
                                        <input class="form-control" type="text" placeholder="" data-bs-original-title=""
                                            title="" name="PurposeOfTravel" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="mb-3">
                                        <label>Number of travelers</label>
                                        <input class="form-control" type="number" placeholder="" name="NumberOfTravelers"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Mode of transportation</label>
                                    <input class="form-control" type="text" placeholder="" data-bs-original-title=""
                                        title="" name="ModeOfTransportation" autocomplete="off">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="mb-3">
                                        <label>Transportation cost</label>
                                        <!-- Hidden input field to store the numeric value -->
                                        <input type="hidden" name="TransportationCostNumeric"
                                            id="TransportationCostNumeric">
                                        <!-- Visible input field for user input -->
                                        <input class="form-control" type="text" placeholder="" name="TransportationCost"
                                            onkeyup="formatPesoOptional(this)" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Type of accommodation</label>
                                    <input class="form-control" type="text" placeholder="" data-bs-original-title=""
                                        title="" name="TypeOfAccommodation" autocomplete="off">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="mb-3">
                                        <label>Accommodation cost</label>
                                        <input class="form-control money-input" type="text" placeholder=""
                                            name="AccommodationCost" onkeyup="formatPesoOptional(this)"
                                            autocomplete="off">
                                        <!-- Hidden input field to store the numeric value -->
                                        <input type="hidden" name="AccommodationCostNumeric"
                                            id="AccommodationCostNumeric">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="mb-3">
                                        <label>Food cost</label>
                                        <input class="form-control money-input" type="text" placeholder=""
                                            name="FoodCost" onkeyup="formatPesoOptional(this)" autocomplete="off">
                                        <!-- Hidden input field to store the numeric value -->
                                        <input type="hidden" name="FoodCostNumeric" id="FoodCostNumeric">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="mb-3">
                                        <label>Daily allowance</label>
                                        <input class="form-control money-input" type="text" placeholder=""
                                            name="DailyAllowance" onkeyup="formatPesoOptional(this)" autocomplete="off">
                                        <!-- Hidden input field to store the numeric value -->
                                        <input type="hidden" name="DailyAllowanceNumeric" id="DailyAllowanceNumeric">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label>Conference registration fee (optional)</label>
                                        <input class="form-control money-input" type="text" placeholder=""
                                            name="ConferenceRegistrationFee" onkeyup="formatPesoOptional(this)"
                                            autocomplete="off">
                                        <!-- Hidden input field to store the numeric value -->
                                        <input type="hidden" name="ConferenceRegistrationFeeNumeric"
                                            id="ConferenceRegistrationFeeNumeric">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label>Visa documentation fee (optional)</label>
                                        <input class="form-control money-input" type="text" placeholder=""
                                            name="VisaDocumentationFee" onkeyup="formatPesoOptional(this)"
                                            autocomplete="off">
                                        <!-- Hidden input field to store the numeric value -->
                                        <input type="hidden" name="VisaDocumentationFeeNumeric"
                                            id="VisaDocumentationFeeNumeric">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label>Travel insurance cost (optional)</label>
                                        <input class="form-control money-input" type="text" placeholder=""
                                            name="TravelInsuranceCost" onkeyup="formatPesoOptional(this)"
                                            autocomplete="off">
                                        <!-- Hidden input field to store the numeric value -->
                                        <input type="hidden" name="TravelInsuranceCostNumeric"
                                            id="TravelInsuranceCostNumeric">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label>Miscellaneous expenses (optional)</label>
                                        <input class="form-control money-input" type="text" placeholder=""
                                            name="MiscellaneousExpenses" onkeyup="formatPesoOptional(this)"
                                            autocomplete="off">
                                        <!-- Hidden input field to store the numeric value -->
                                        <input type="hidden" name="MiscellaneousExpensesNumeric"
                                            id="MiscellaneousExpensesNumeric">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label for="totalBudget">Total estimated budget</label>
                                        <div class="input-icon">
                                            <input class="form-control money-input" type="text" placeholder=""
                                                name="TotalEstimatedBudget" id="totalBudget"
                                                onkeyup="formatPesoOptional(this)" autocomplete="off">
                                            <!-- Hidden input field to store the numeric value -->
                                            <input type="hidden" name="TotalEstimatedBudgetNumeric"
                                                id="TotalEstimatedBudgetNumeric">
                                        </div>
                                    </div>
                                </div>


                                <div class="date-picker col-md-4 mb-3">
                                    <label class="form-label">Start Date</label>
                                    <div class="input-group">
                                        <input class="datepicker-here form-control digits" type="text"
                                            data-language="en" data-bs-original-title="" title="" name="StartDate"
                                            required id='minMaxExample' />
                                    </div>
                                </div>
                                <div class="date-picker col-md-4 mb-3">
                                    <label class="form-label">End Date</label>
                                    <div class="input-group">
                                        <input class="datepicker-here form-control digits date-to" type="text"
                                            data-language="en" data-bs-original-title="" title="" name="EndDate"
                                            required id='minMaxExample1' />
                                    </div>
                                </div>






                            </div>
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label>Justification</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="Justification"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label>Expected outcomes</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="ExpectedOutcomes"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label>Alternative options considered</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="AlternativeOptionsConsidered"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="attachment">Quotes Estimates</label>
                                        <div class="">
                                            <div class="custom-file">
                                                <input type="file" class="form-control" id="attachment"
                                                    name="QuotesEstimates">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="attachment">Attachment: (optional)</label>
                                    <div class="">
                                        <div class="custom-file">
                                            <input type="file" class="form-control" id="attachment"
                                                name="Attachments">
                                        </div>
                                    </div>
                                </div>
                            </div>


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
                                        <p>All employees employed by Rkive who require company-funded travel
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
                                            <li>Requests should be submitted at least 15 days prior to the planned
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
                                            this policy, please contact <a href="https://helpdesk.rkiveadmin.com">Help
                                                Desk</a> at the "Help Desk Section".
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
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>

@endsection
