@extends('layouts.master')

@section('title', 'Default')

@section('css')

@endsection

@section('style')


@endsection

@section('breadcrumb-title')
    <h3>Expenses</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Expense Report</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="d-flex justify-content-center mb-3">
                <div class="card col-sm-12 col-lg-5  p-3 m-2 text-white" style="background-color: #4158D0;
            ">
                    <div class="text-center">
                        <i data-feather="shopping-bag"></i>
                    </div>
                    <h5>Spent</h5>
                    <h1>₱{{ number_format((float) $remainingBalance, 2) }}</h1>
                </div>
                <div class="card col-sm-12 col-lg-5 p-3 m-2 text-white" style="background-color: #0093E9;
">
                    <div class="text-center">
                        <h4>₱</h4>
                    </div>

                    <h5>Total Budget</h5>
                    <h1>₱{{ number_format((float) $overAllBudget, 2) }}</h1>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="">
                    <div class="card-header p-3">
                        <h3 class="f-w-400">List of approved requests</h3>
                    </div>
                    <div class="table-responsive signal-table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Track no</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Budget</th>

                                    <th scope="col">Date Submitted</th>
                                    <th scope="col">Track Expenses</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $item)
                                    <tr>
                                        @if ($item->Status == 'Approved')
                                            <td>{{ $item->RequestID }}</td>
                                            <td>{{ $item->Title }}</td>
                                            <td>₱{{ number_format($item->TotalEstimatedBudget, 2) }}</td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($item->StartDate)->format('F j, Y') }}
                                                —
                                                {{ \Carbon\Carbon::parse($item->EndDate)->format('F j, Y') }}
                                            </td>
                                            <td><a href="{{ route('expenses-track', ['trackID' => $item->RequestID]) }}"
                                                    class="btn btn-primary">Track</a></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

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
