{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>
    <form action="{{ route('authenticate') }}" method="POST">
        @csrf

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit">Submit</button>
    </form>
    <hr>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required autofocus>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>

        <button type="submit">Register</button>
    </form>
</body> --}}

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="rkive">
    <link rel="icon" href="{{ asset('assets/images/favicon7.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon7.png') }}" type="image/x-icon">
    <title>Rkive</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    @include('layouts.css')
    <style>
        .right {
            background-color: #dde0fc;
        }

        .left {
            background-color: #312B70;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg fill-opacity='0.99'%3E%3Cpolygon fill='%232c2765' points='1600 160 0 460 0 350 1600 50'/%3E%3Cpolygon fill='%23272259' points='1600 260 0 560 0 450 1600 150'/%3E%3Cpolygon fill='%23211d4c' points='1600 360 0 660 0 550 1600 250'/%3E%3Cpolygon fill='%231a163b' points='1600 460 0 760 0 650 1600 350'/%3E%3Cpolygon fill='%230F0D22' points='1600 800 0 800 0 750 1600 450'/%3E%3C/g%3E%3C/svg%3E");
            background-attachment: fixed;
            background-size: cover;
        }

        .left div {
            margin: 20% 10%;
        }

        .card {
            width: 400px;
        }

        @media (max-width: 700px) {
            .card {
                width: 70%;
            }
        }

        #logo {
            height: 100px;
            width: auto;
            margin: 0;
            /* Set initial position */
            transform: translateY(0);
            /* Define the animation */
            animation: mover 2s infinite alternate;
        }

        #mode {
            height: 75px;
            width: auto;
            margin: 0;
        }

        @keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        @media (max-width: 576px) {

            /* Small screens (sm) */
            h5 {
                font-size: 14px;
            }
        }

        @media (max-width: 768px) {

            /* Medium screens (md) */
            h4 {
                font-size: 16px;
            }

            .right {
                background-color: #312B70;
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg fill-opacity='0.99'%3E%3Cpolygon fill='%232c2765' points='1600 160 0 460 0 350 1600 50'/%3E%3Cpolygon fill='%23272259' points='1600 260 0 560 0 450 1600 150'/%3E%3Cpolygon fill='%23211d4c' points='1600 360 0 660 0 550 1600 250'/%3E%3Cpolygon fill='%231a163b' points='1600 460 0 760 0 650 1600 350'/%3E%3Cpolygon fill='%230F0D22' points='1600 800 0 800 0 750 1600 450'/%3E%3C/g%3E%3C/svg%3E");
                background-attachment: fixed;
                background-size: cover;
            }
        }
    </style>
</head>

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
        <div class="page-body-wrapper">

            <!-- Container-fluid starts-->
            <div class="container-fluid p-0">
                <div class="row m-0">
                    <div class="col-6 left d-none d-md-block d-sm-none text-white">
                        <div>
                            <img src="{{ asset('assets/images/logo/logo1.png') }}" alt="" id="logo">
                            <h1>Rkive</h1>
                            <h4 class="d-lg-none">Administrative Solutions</h4>
                            <p>Your administrative needs in one place</p>
                        </div>
                    </div>


                    <div class="col p-0 right">

                        <div class="login-card">
                            <div class="card">
                                <div class="card-body">
                                    @if (Session::has('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif

                                    @if (Session::has('error'))
                                        <div class="alert alert-danger">
                                            {{ Session::get('error') }}
                                        </div>
                                    @endif

                                    <form class="needs-validation theme-form" novalidate
                                        action="{{ route('authenticate') }}" method="POST">
                                        @csrf
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="col title text-center justify-content-center">
                                                <img src="{{ asset('assets/images/logo/logo1.png') }}" alt=""
                                                    style="height: 50px; width:auto;" class="col-3 d-lg-none">
                                                <h5 class="col text-dark p-2 pt-2 mt-1 text-center">Sign in to your
                                                    account
                                                </h5>
                                            </div>

                                        </div>
                                        <hr>

                                        <div class="form-group">
                                            <label for="email" class="col-form-label">Email
                                                Address</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                required placeholder="Enter your email">
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="password" class="col-form-label">Password</label>
                                            <div class="form-input position-relative">
                                                <input type="password" class="form-control" id="password"
                                                    name="password" required placeholder="*********">
                                            </div>
                                        </div>



                                        <button type="submit" class="btn btn-primary btn-block w-100">Sign
                                            in</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
    @include('layouts.script')
</body>

</html>
