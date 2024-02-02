<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <title>Rkive Travels</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="'assets/css/style.scss">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    @include('layouts.css')
    @yield('style')
</head>
<style>
    .course-wrapper:hover {
        transform: scale(1.05);
        transition: all 0.2s ease-in-out;
    }

    /* #expensesPieChart{
        height: 200px !important;
        width: 200px !important;
        display: flex !important;
    } */
    .pop:hover {
        transform: scale(1.1);
        transition: transform 0.5s ease-in-out;
    }

    .chat-container {
        display: flex;
        flex-direction: column;
        height: 400px;
        /* Adjust height as needed */
        overflow-y: scroll;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10em;
        background-color: white;
    }

    .chat-history {
        list-style: none;
        margin: 0;
        padding: 0;
        flex: 1;
        display: flex;
        flex-direction: column;
        /* Allow messages to fill available space */
    }

    .message-form-container {
        display: flex;
        width: 100%;
        /* Set full width */
        border-top: 1px solid #ccc;
        padding: 5px 10px;
    }

    .message-form-container form {
        display: flex;
        width: 100%;
        gap: 2em;
    }

    .chat-bubble {
        padding: 10px 15px;
        margin-bottom: 5px;
        border-radius: 10px;
        position: relative;
        /* For tail positioning */
    }

    .user-bubble {
        background-color: #82b9eb;
        color: #333;
        align-self: flex-end;
        /* Align to right */
    }

    .user-bubble::after {
        content: "";
        position: absolute;
        bottom: -9px;
        right: -5px;
        width: 0;
        height: 0;
        border: 10px solid transparent;
        border-top-color: #82b9eb;
    }

    .ai-bubble {
        background-color: #7367FF;
        color: white;
        align-self: flex-start;
        /* Align to left */
    }

    .ai-bubble::after {
        content: "";
        position: absolute;
        bottom: -9px;
        left: -5px;
        width: 0;
        height: 0;
        border: 10px solid transparent;
        border-top-color: #7367FF;
    }

    .chat-history li {
        padding: 10px 15px;
        margin-bottom: 5px;

    }

    .user-message {
        text-align: right;
        background-color: #82b9eb;
        width: 50%;
    }

    .ai-message {
        text-align: left;
        background-color: #7367FF;
        color: white;
        width: 50%;
    }

    .user-message li {
        background-color: #82b9eb;
        border-radius: 10px 10px 10px 0;
    }

    .ai-message li {
        background-color: #7367FF;
        color: white;
        border-radius: 10px 10px 0 10px;
    }

    #chat-input {
        width: 100%;
    }


    /* .loading-bubble {
        padding: 10px 15px;
        margin-bottom: 5px;
        border-radius: 10px;
        background-color: #7367FF;
        color: white;
        text-align: center;
        /* Center loading dots */
    /* } */

    .loading-dots {
        display: flex;
        justify-content: space-between;
        animation: loading-dots 1.5s infinite ease-in-out;
    }

    .dot {
        width: 10px;
        height: 10px;
        background-color: #fff;
        border-radius: 50%;
        opacity: 0.5;
        animation: dot-fade 1.5s infinite ease-in-out;
    }

    @keyframes loading-dots {
        0% {
            transform: translateX(0);
        }

        50% {
            transform: translateX(10px);
        }

        100% {
            transform: translateX(0);
        }
    }

    @keyframes dot-fade {
        0% {
            opacity: 0.5;
        }

        25% {
            opacity: 1;
        }

        75% {
            opacity: 0.5;
        }

        100% {
            opacity: 0.5;
        }
    } */
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- @dd(Route::current()->getName()); --}}

<body
    @if (Route::current()->getName() == 'index') onload="startTime()" @elseif (Route::current()->getName() == 'button-builder') class="button-builder" @endif>
    <div class="loader-wrapper">
        <div class="loader-index"><span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
                </fecolormatrix>
            </filter>
        </svg>
    </div>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        @include('layouts.header')
        <!-- Page Header Ends  -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            @include('layouts.sidebar')
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                @yield('breadcrumb-title')
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('/') }}">
                                            <svg class="stroke-icon">
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                            </svg></a></li>
                                    </li>
                                    @yield('breadcrumb-items')
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                @yield('content')
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            @include('layouts.footer')

        </div>
    </div>
    <!-- latest jquery-->
    @include('layouts.script')
    <!-- Plugin used-->

    {{-- <script type="text/javascript">
      if ($(".page-wrapper").hasClass("horizontal-wrapper")) {
            $(".according-menu.other" ).css( "display", "none" );
            $(".sidebar-submenu" ).css( "display", "block" );
      }
    </script> --}}
</body>

</html>
