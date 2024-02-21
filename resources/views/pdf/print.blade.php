@extends('layouts.print')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div id="letter-preview">
                    <div class="card">
                        <div class="card-body col-md-12">
                            <div class="text-center">

                            </div>
                            <div class="container mt-5">
                                <div id="letter-body">
                                    @foreach ($form as $form)
                                    <div class="letter-header">
                                        <img id="signature-photo" src="{{ asset('assets/images/logo/rkive.png') }}" alt="Hello Kitty" style="height: 70px; width: auto;">
                                        <div>
                                            <p>Rkive Travels</p>
                                            <p>Date issued: <span>{{$form->updated_at->format('F d, Y')}}</span></p>
                                        </div>
                                    </div>
                                    <div class="title">
                                        <h4><b>Travel Request Authorization</b></h4>
                                    </div>

                                    <div class="letter">



                                        <p>Dear {{ Auth::user()->name }},</p>
                                        <p>We are pleased to inform you that your travel budget request for [Project Name]
                                            has been successfully
                                            approved by the [Budget Approval Committee/Executive Board/Relevant Entity].
                                            This allocation
                                            demonstrates
                                            our confidence in your proposed endeavor and its potential impact on [Company
                                            goals/mission].</p>
                                        <p>The approved budget for your trip totals ₱{{number_format($form->estimated_amount, 2)}},
                                            encompassing the following expense
                                            categories:</p>
                                        <ul>
                                            <li>Travel: Airfare, accommodations, ground transportation</li>
                                            <li>Living: Meals, incidentals</li>
                                            <li>Project-related expenses: [e.g., conference fees, research materials]</li>
                                        </ul>
                                        <p>Please proceed to the Financial Department at [Department Location] on [Date and
                                            Time] to finalize your
                                            travel reimbursement and initiate disbursement of funds. Your presence will be
                                            required to present the
                                            following documents for verification:</p>
                                        <ul>
                                            <li>Signed Travel Authorization Form (attached)</li>
                                            <li>Original receipts for any pre-paid expenses</li>
                                            <li>[Additional documents if applicable]</li>
                                        </ul>
                                        <p>A dedicated representative will be available to assist you with the paperwork and
                                            address any questions
                                            you
                                            may have regarding the reimbursement process.</p>
                                        <p>We extend our best wishes for a successful and productive trip. Your dedication
                                            to [Project goals] is
                                            commendable, and we are confident that your efforts will yield valuable results
                                            for [Company name].</p>
                                        <p>For any further inquiries regarding your travel budget or reimbursement process,
                                            please do not hesitate
                                            to
                                            contact [Contact Person] at [Contact Information].</p>
                                        <p>On behalf of the Rkive Admin Team,</p>
                                        <p>Sincerely,</p>
                                        <div class="sinature" style="margin-top: 2em;">

                                            <p>Ryan<br>Admin Department</p>
                                            <img id="signature-photo" src="{{asset('assets/images/Signature-No-Background.png') }}" alt="signature" style="height: 100px; width: auto; top: -100px; left: 0; position:relative;">

                                        </div>




@endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function printer() {
                var element = document.getElementById('letter-body');
                var opt = {
                    margin: 0.5,
                    filename: 'Travel-Request-Authorization.pdf',
                    image: {
                        type: 'png',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    }
                };

                // New Promise-based usage:
                html2pdf().set(opt).from(element).save();
            }
        </script>
    @endsection
