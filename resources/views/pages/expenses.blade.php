@extends('layouts.master')

@section('title', 'Default')

@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}"> --}}

@endsection

@section('style')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}"> --}}

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
            <div class="d-flex justify-content-center">
                <div class="card col-sm-12 col-lg-5  p-3 m-2 text-white"
                    style="background-color: #4158D0;
            background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
            ">
                    <h5>Spent</h5>
                    <h1>10000</h1>
                </div>
                <div class="card col-sm-12 col-lg-5 p-3 m-2 text-white"
                    style="background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
">
                    <h5>Total Balance</h5>
                    <h1>123490</h1>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>List Expenses</h3>
                    </div>
                    <div class="table-responsive signal-table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Purpose</th>
                                    <th scope="col">Meal </th>
                                    <th scope="col">Transportation</th>
                                    <th scope="col">Accomodation</th>
                                    <th scope="col">Others</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $item->expense_id }}</th>
                                        <td class="d-flex align-items-center">{{ $item->purpose }}</span></td>
                                        <td>{{ $item->meal }}</td>
                                        <td>{{ $item->transportation }}</td>
                                        <td>{{ $item->accommodation }}</td>
                                        <td>{{ $item->other_expenses_amount }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td> {{ $item->status }}</td>
                                    </tr>
                                @endforeach

                                {{-- {{$data->links()}} --}}
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>







            {{-- <script>
                var expensesData = @json($expenses); // Pass data from controller
                var pieChartData = {
                    labels: ['Transportation', 'Accommodation', 'Meal', 'Other Expenses'],
                    datasets: [{
                        data: [
                            expensesData[0].total_transportation,
                            expensesData[0].total_accommodation,
                            expensesData[0].total_meal,
                            expensesData[0].total_other_expenses
                        ],
                        backgroundColor: ['#4285F4', '#DB4437', '#F4B400', '#0F9D58'],
                        hoverOffset: 4
                    }]
                };
            </script> --}}
            {{-- <div class="chart-container">
        <canvas id="expensesPieChart" height="200px" width="200px"></canvas>

</div> --}}

            {{-- <script>
    var ctx = document.getElementById('expensesPieChart').getContext('2d');
    var pieChart = new Chart(ctx, {
        type: 'pie',
        data: pieChartData,
        options: {
            legend: {
            position: 'right' // Position the legend on the right
        }
            // Customize chart appearance here (legend, tooltips, etc.)
        }
    });
</script> --}}

            {{-- <div>
                @foreach ($expenses as $expenses)
                    <ul>
                        <li>{{ $expense->total_transportation }}</li>
                    </ul>
                @endforeach
            </div>

            @foreach ($expenses as $expense)
            <p>Track No: {{ $expense->tr_track_no }}</p>
            <p>Total Transportation: {{ $expense->total_transportation }}</p>
            <p>Total Accommodation: {{ $expense->total_accommodation }}</p>
            <p>Total Meal: {{ $expense->total_meal }}</p>
            <p>Total Other Expenses: {{ $expense->total_other_expenses }}</p>
        @endforeach --}}


            {{-- @foreach ($expenses as $expense)
    <p>Track No: {{ $expense->tr_track_no }}</p>
    <p>Total Transportation: {{ $expense->total_transportation }}</p>
    <p>Total Accommodation: {{ $expense->total_accommodation }}</p>
    <p>Total Meal: {{ $expense->total_meal }}</p>
    <p>Total Other Expenses: {{ $expense->total_other_expenses }}</p>
@endforeach --}}

        </div>
    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')
    {{-- dashboard 2 --}}

    {{-- <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/dashboard_2.js') }}"></script>
    <script src="{{ asset('assets/js/animation/wow/wow.min.js') }}"></script> --}}
@endsection
