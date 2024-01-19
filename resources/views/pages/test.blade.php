<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testing Api</title>
</head>

<body>
    {{-- <h1>This page is for testing</h1>
    <p>{{ $api['weather'][0]['description'] }}</p>
    <p>{{ $api['weather'][0]['main'] }}</p> --}}


    Know the weather
    <form action="{{route('getWeather')}}" method="GET">
        @csrf
        <label for="city">Input City</label>
        <input type="text" name="city">
        <button type="submit">Send</button>
    </form>

    {{-- <h1>The weather in {{$cityWeather['name']}}</h1>
    <p>{{$cityWeather['main']}}</p>
    <p>{{$cityWeather['description']}}</p> --}}
</body>

</html>
