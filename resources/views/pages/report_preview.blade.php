@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')

@endsection

@section('breadcrumb-title')
    <h3>Home</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Request</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form method="POST" action="{{ route('expense.track.store') }}">
                @csrf
                <h5>Track Your Expenses</h5>
                <div class="row gy-3">
                    <input class="form-control" hidden name="tr_track_no"
                        value="{{$report->transportation}}">
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

            </form>




        </div>
    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')

@endsection
