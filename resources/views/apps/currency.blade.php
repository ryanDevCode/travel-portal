@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
    <style>
        .skeleton {
            opacity: 0.7;
            animation: skeleton-loading 1s linear infinite alternate;
        }

        .loading-bubble {
            background-color: rgb(255, 255, 255);
            color: white;
            align-self: flex-start;
            border-radius: 10px;
            position: relative;
            width: 30px;
        }

        /* HTML: <div class="loader"></div> */
        .loader {
            width: 40px;
            height: 20px;
            --c: no-repeat radial-gradient(farthest-side, #ffffff 93%, rgb(243, 237, 237));
            background:
                var(--c) 0 0,
                var(--c) 50% 0,
                var(--c) 100% 0;
            background-size: 8px 8px;
            position: relative;
            animation: l4-0 1s linear infinite alternate;
        }

        .loader:before {
            content: "";
            position: absolute;
            width: 8px;
            height: 12px;
            background: #ffffff;
            left: 0;
            top: 0;
            animation:
                l4-1 1s linear infinite alternate,
                l4-2 0.5s cubic-bezier(0, 200, .8, 200) infinite;
        }

        @keyframes l4-0 {
            0% {
                background-position: 0 100%, 50% 0, 100% 0
            }

            8%,
            42% {
                background-position: 0 0, 50% 0, 100% 0
            }

            50% {
                background-position: 0 0, 50% 100%, 100% 0
            }

            58%,
            92% {
                background-position: 0 0, 50% 0, 100% 0
            }

            100% {
                background-position: 0 0, 50% 0, 100% 100%
            }
        }

        @keyframes l4-1 {
            100% {
                left: calc(100% - 8px)
            }
        }

        @keyframes l4-2 {
            100% {
                top: -0.1px
            }
        }
    </style>
@endsection

@section('breadcrumb-title')
    <h3>Currency Convert</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Convert</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container">

            <div class="row">
                <livewire:currency-convert />

            </div>
        </div>

    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')
@endsection
