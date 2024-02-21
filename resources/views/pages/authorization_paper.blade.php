<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paper</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

</head>
<style>
    body {
        font-family: 'arial';
    }

    #letter-body {
        margin: auto;
        padding: 2em;
        border: 1px solid black;
    }

    .title {
        text-align: center;
    }

    .letter {
        font-size: 1.2em;
    }

</style>

<body>
    <div id="letter-body">
        <div class="title">
            <h1>Travel Budget Auhorization</h1>
        </div>
        <div class="letter">
            <p>Dear {{ Auth::user()->name }},</p>
            <p>We are pleased to inform you that your travel budget request for [Project Name] has been successfully
                approved by the [Budget Approval Committee/Executive Board/Relevant Entity]. This allocation
                demonstrates
                our confidence in your proposed endeavor and its potential impact on [Company goals/mission].</p>
            <p>The approved budget for your trip totals ₱ {{ $data[0]['estimated_amount'] }}, encompassing the following
                expense
                categories:</p>
            <ul>
                <li>Travel: Airfare, accommodations, ground transportation</li>
                <li>Living: Meals, incidentals</li>
                <li>Project-related expenses: [e.g., conference fees, research materials]</li>
            </ul>
            <p>Please proceed to the Financial Department at [Department Location] on [Date and Time] to finalize your
                travel reimbursement and initiate disbursement of funds. Your presence will be required to present the
                following documents for verification:</p>
            <ul>
                <li>Signed Travel Authorization Form (attached)</li>
                <li>Original receipts for any pre-paid expenses</li>
                <li>[Additional documents if applicable]</li>
            </ul>
            <p>A dedicated representative will be available to assist you with the paperwork and address any questions
                you
                may have regarding the reimbursement process.</p>
            <p>We extend our best wishes for a successful and productive trip. Your dedication to [Project goals] is
                commendable, and we are confident that your efforts will yield valuable results for [Company name].</p>
            <p>For any further inquiries regarding your travel budget or reimbursement process, please do not hesitate
                to
                contact [Contact Person] at [Contact Information].</p>
            <p>On behalf of the Rkive Admin Team,</p>
            <p>Sincerely,</p>
            {{-- <div class="sinature" style="margin-top: 2em;">

                <p>Ryan<br>Admin Department</p>
                <img id="signature-photo" src="{{asset('assets/images/Signature-No-Background.png') }}" alt="signature" style="height: 100px; width: auto; top: -100px; left: 0; position:relative;">

            </div> --}}

        </div>

    </div>
    {{-- <h1>PDF TEST {{Auth::user()->name}}</h1> --}}

</body>

</html>
