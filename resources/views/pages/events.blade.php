@extends('layouts.master')

@section('title', 'Default')

@section('css')

@endsection

@section('style')

@endsection

@section('breadcrumb-title')
    <h3>Calendar</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Calendar</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <iframe src="https://calendar.rkiveadmin.com/calendar" width="100%" height="800px"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')

@endsection
