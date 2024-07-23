@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
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
        <div class="row">
            <div class="col-sm-12 border border-primary bg-white card">
                <div class="card-header row">
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
                    <div class="col-6">
                        <h5>Travel Budget Request Overview</h5>
                        {{-- <div> <a href="" class="text-end">Edit</a></div> --}}
                    </div>

                    @foreach ($travel as $view)
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Status:</td>
                            <td>{{ $view->Status }}</td>
                        </tr>
                        <tr>
                            <td>Project Title:</td>
                            <td>{{ $view->Title }}</td>
                        </tr>
                        <tr>
                            <td>Department:</td>
                            <td>{{ $view->Department }}</td>
                        </tr>
                        <tr>
                            <td>Destination:</td>
                            <td>{{ $view->Destinations }}</td>
                        </tr>
                        <tr>
                            <td>Request ID:</td>
                            <td>{{ $view->RequestID }}</td>
                        </tr>
                        <tr>
                            <td>Start Date:</td>
                            <td>{{ date('F d, Y', strtotime($view->StartDate)) }}</td>
                        </tr>
                        <tr>
                            <td>End Date:</td>
                            <td>{{ date('F d, Y', strtotime($view->EndDate)) }}</td>
                        </tr>
                        <tr>
                            <td>Purpose:</td>
                            <td>{{ $view->PurposeOfTravel }}</td>
                        </tr>
                        <tr>
                            <td>Number of Travelers:</td>
                            <td>{{ $view->NumberOfTravelers }}</td>
                        </tr>
                        <tr>
                            <td>Mode of Transportation:</td>
                            <td>{{ $view->ModeOfTransportation }}</td>
                        </tr>
                        <tr>
                            <td>Estimated transportation cost:</td>
                            <td>₱{{ number_format($view->TransportationCost, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Type of Accommodation:</td>
                            <td>{{ $view->TypeOfAccommodation }}</td>
                        </tr>
                        <tr>
                            <td>Estimated accommodation cost:</td>
                            <td>₱{{ number_format($view->AccomodationCost, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Food:</td>
                            <td>{{ $view->FoodCost }}</td>
                        </tr>
                        <tr>
                            <td>Estimated daily allowance:</td>
                            <td>₱{{ number_format($view->DailyAllowance, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Conference registration fee:</td>
                            <td>₱{{ number_format($view->ConferenceRegistrationFee, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Visa documentation fee:</td>
                            <td>₱{{ number_format($view->VisaDocumentationFee, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Travel insurance cost:</td>
                            <td>₱{{ number_format($view->TravelInsuranceCost, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Miscellaneous Expenses:</td>
                            <td>₱{{ number_format($view->MiscellaneousFee, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Total Estimated Budget:</td>
                            <td>₱{{ number_format($view->TotalEstimatedBudget, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Justification:</td>
                            <td>{{ $view->Justification }}</td>
                        </tr>
                        <tr>
                            <td>Expected Outcomes:</td>
                            <td>{{ $view->ExpectedOutcomes }}</td>
                        </tr>
                        {{-- <tr>
                            <td>Travel Policy Compliance:</td>
                            <td>{{ $view->TravelPolicyCompliance }}</td>
                        </tr> --}}
                        <tr>
                            <td>Alternative options considered:</td>
                            <td>{{ $view->AlternativeOptionsConsidered }}</td>
                        </tr>
                        <tr>
                            <td>Date submitted:</td>
                            <td>{{ $view->created_at->format('F d, Y') }}</td>
                        </tr>
                        <tr>
                            <td>Requestor:</td>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        </tr>

                        {{-- <tr>
                            <td>Attachments:</td>
                            <td>{{ $view->attachment }}</td>
                        </tr> --}}
                    </table>
                </div>

                <button class="btn btn-primary p-2 mb-5" type="button" data-bs-toggle="modal"
                    data-bs-target=".bd-example-modal-lg">Edit</button>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Update Info</h4>
                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action={{ route('travel-update', ['requestID' => $view->RequestID]) }}
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form theme-form">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label>Title</label>
                                                    <input class="form-control" type="text" placeholder="Project title"
                                                        data-bs-original-title="" title="" name="Title"
                                                        value="{{ $view->Title }}" autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label>Department</label>
                                                    <input class="form-control" type="text" placeholder=""
                                                        data-bs-original-title="" title="" name="Department"
                                                        value="{{ $view->Department }}" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label>Destination</label>
                                                    <input class="form-control" type="text" placeholder=""
                                                        data-bs-original-title="" title="" name="Destinations"
                                                        value="{{ $view->Destinations }}" autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label>Purpose</label>
                                                    <input class="form-control" type="text" placeholder=""
                                                        data-bs-original-title="" title="" name="PurposeOfTravel"
                                                        value="{{ $view->PurposeOfTravel }}" autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <div class="mb-3">
                                                    <label>Number of travelers</label>
                                                    <input class="form-control" type="number" placeholder=""
                                                        value="{{ $view->NumberOfTravelers }}" name="NumberOfTravelers"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label>Mode of transportation</label>
                                                <input class="form-control" type="text" placeholder=""
                                                    data-bs-original-title="" title="" name="ModeOfTransportation"
                                                    value="{{ $view->ModeOfTransportation }}" autocomplete="off">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="mb-3">
                                                    <label>Transportation cost</label>

                                                    <!-- Visible input field for user input -->
                                                    <input class="form-control" type="text" placeholder=""
                                                        name="TransportationCost" autocomplete="off"
                                                        value="{{ $view->TransportationCost }}">
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label>Type of accommodation</label>
                                                <input class="form-control" type="text" placeholder=""
                                                    data-bs-original-title="" title="" name="TypeOfAccommodation"
                                                    autocomplete="off" value="{{ $view->TypeOfAccomodation }}">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="mb-3">
                                                    <label>Accommodation cost</label>
                                                    <input class="form-control money-input" type="text" placeholder=""
                                                        name="AccommodationCost" autocomplete="off"
                                                        value="{{ $view->AccommodationCost }}">

                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="mb-3">
                                                    <label>Food cost</label>
                                                    <input class="form-control money-input" type="text" placeholder=""
                                                        name="FoodCost" autocomplete="off"
                                                        value="{{ $view->FoodCost }}">

                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="mb-3">
                                                    <label>Daily allowance</label>
                                                    <input class="form-control money-input" type="text" placeholder=""
                                                        name="DailyAllowance" autocomplete="off"
                                                        value="{{ $view->DailyAllowance }}">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label>Conference registration fee (optional)</label>
                                                    <input class="form-control money-input" type="text" placeholder=""
                                                        name="ConferenceRegistrationFee" autocomplete="off"
                                                        value="{{ $view->ConferenceRegistrationFee }}">

                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label>Visa documentation fee (optional)</label>
                                                    <input class="form-control money-input" type="text" placeholder=""
                                                        name="VisaDocumentationFee" autocomplete="off"
                                                        value="{{ $view->VisaDocumentationFee }}">

                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label>Travel insurance cost (optional)</label>
                                                    <input class="form-control money-input" type="text" placeholder=""
                                                        name="TravelInsuranceCost" autocomplete="off"
                                                        value="{{ $view->TravelInsuranceCost }}">

                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label>Miscellaneous expenses (optional)</label>
                                                    <input class="form-control money-input" type="text" placeholder=""
                                                        name="MiscellaneousExpenses" autocomplete="off"
                                                        value="{{ $view->MiscellaneousExpenses }}">

                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="totalBudget">Total estimated budget</label>
                                                    <div class="input-icon">
                                                        <input class="form-control money-input" type="text"
                                                            placeholder="" name="TotalEstimatedBudget" id="totalBudget"
                                                            autocomplete="off" value="{{ $view->TotalEstimatedBudget }}">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            {{-- <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="totalBudget">Total estimated budget</label>
                                                    <div class="input-icon">
                                                        <input class="form-control money-input" type="text"
                                                            placeholder="" name="TotalEstimatedBudget" id="totalBudget"
                                                            autocomplete="off" value="{{ $view->TotalEstimatedBudget }}">

                                                    </div>
                                                </div>
                                            </div> --}}


                                            {{-- <div class="date-picker col-md-4 mb-3">
                                                <label class="form-label">Start Date</label>
                                                <div class="input-group">
                                                    <input class="datepicker-here form-control digits" type="text"
                                                        data-language="en" data-bs-original-title="" title=""
                                                        name="StartDate" id='minMaxExample'
                                                        value="{{ $view->StartDate }}" />
                                                </div>
                                            </div>
                                            <div class="date-picker col-md-4 mb-3">
                                                <label class="form-label">End Date</label>
                                                <div class="input-group">
                                                    <input class="datepicker-here form-control digits date-to"
                                                        type="text" data-language="en" data-bs-original-title=""
                                                        title="" name="EndDate" id='minMaxExample1'
                                                        value={{ $view->EndDate }} />
                                                </div>
                                            </div> --}}

                                        </div>
                                        <div class="row">
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label>Justification</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="Justification">{{ $view->Justification }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label>Expected outcomes</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="ExpectedOutcomes">{{ $view->ExpectedOutcomes }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label>Alternative options considered</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="AlternativeOptionsConsidered">{{ $view->AlternativeOptionsConsidered }}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <button class="btn btn-primary float-end" type="submit">Submit</button>
                                    </div>



                                </form>
                            </div>
                        </div>
                        @endforeach
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
        zIndex: 9999 // Ensure it floats above other elements
    });
</script>
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
@endsection
