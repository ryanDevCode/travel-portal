<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/images/favicon1.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon7.png') }}" type="image/x-icon">
    <title>PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.min.js"></script>
</head>
<style>
    body{
        margin: 0 20%;
    }
    #letter-body {
        margin: auto;
        border: white;
    }

    .title {
        text-align: center;
    }

    .letter {
        font-size: 0.9em;
    }
    .button{
        background-color: #7365FE ;
        color: white;
    }
    .letter-header{
        display: flex;
        justify-content: space-between;
        line-height:1em;

    }
</style>
<body>
    <nav class="navbar sticky-top navbar-light bg-light">
        <div class="container-fluid">
            <h4>Authorization Preview</h4>
            <button class="btn button float-end" onclick="printer()">Print</button>
        </div>
    </nav>
    @yield('content')
</body>

</html>
