@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')

@endsection

@section('breadcrumb-title')
    <h3>Policy</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Support</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row starter-main">
            <h3>
                Travel Budget Request Portal Policy</h3>
            <h6>1. Introduction</h6>
            <p>This policy outlines the guidelines and procedures for utilizing the company's travel budget request portal
                for submitting and approving travel budget requests.</p>
            <h6>2. Eligibility</h6>
            <p>All employees employed by Rkive who require company-funded travel for business purposes are eligible
                to submit travel budget requests through the portal.</p>
            <h6>3. Travel Types Covered</h6>
            <p>The portal covers travel requests for:</p>
            <ul>
                <li>Business trips: attending conferences, meetings, client visits, and other work-related travel.</li>
                <li>Professional development: training courses, workshops, and seminars directly related to employee's job
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
            <p>Travel budget requests are subject to availability and approval based on departmental budgets and overall
                company financial considerations.</p>
            <h6>6. Request Process</h6>
            <ul>
                <li>Employees must submit travel budget requests through the designated portal, providing detailed
                    information about the trip, estimated costs, and justification for company funding.</li>
                <li>Requests should be submitted at least 15 days prior to the planned travel date to allow for proper
                    review and approval.</li>
                <li>Department managers or authorized personnel will review the submitted requests and make approval
                    decisions based on established criteria.</li>
                <li>Applicants will be notified of the approval or denial decision via email.</li>
            </ul>
            <h6>7. Cost Considerations</h6>
            <p>Employees are expected to:</p>
            <ul>
                <li>Choose cost-effective travel options within reasonable limits.</li>
                <li>Adhere to company guidelines for airfare, hotels, meals, and other expenses.</li>
                <li>Document all travel expenditures with receipts for reimbursement.</li>
            </ul>
            <h6>8. Reimbursement Process</h6>
            <p>Approved travel expenses will be reimbursed upon submission of valid receipts and completion of the
                designated company reimbursement form.</p>
            <h6>9. Policy Violation</h6>
            <p>Non-compliance with this policy, including misuse of the portal or violation of expense guidelines, may
                result in disciplinary action.</p>
            <h6>10. Updates</h6>
            <p>This policy is subject to revision at any time as deemed necessary by the company. All employees are
                responsible for staying informed about any updates to the policy.</p>
            <h6>11. Contact Information</h6>
            <p>For any questions or concerns regarding the travel budget request portal or this policy, please contact
                <a href="https://helpdesk.rkiveadmin.com">Help Desk</a> at the "Help Desk Section".
            </p>


        </div>
    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')

@endsection
