<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="card bg-primary p-2 txt-dark"
        style="background-image: url('/assets/images/gradient.jpg');
                    background-size: cover;">
        @if ($weatherData)
            @php
                $iconCode = $weatherData['weather'][0]['icon'];
            @endphp
        @endif
        @if ($weatherData)
            @php
                $iconCode = $weatherData['weather'][0]['icon'];
            @endphp
            <div class="row rounded d-flex flex-wrap justify-content-center">
                <div class="col-lg-3 col-sm-12 right text-center pt-2">
                    <img src="{{ url('assets/images/weather-icons/' . $iconCode . '.svg') }}" alt="{{ $weatherData['weather'][0]['description'] . $iconCode }}"
                        style="height: 50px; width:auto;" class="mx-auto d-block">
                    <div class="mt-3">
                        <h3>{{ $weatherData['main']['temp'] }}°C</h3>
                        <p>{{ $weatherData['weather'][0]['description'] }}</p>
                    </div>

                </div>
                <div class="col-lg-auto left col-sm-12 border-left border-left-lg-0 mb-3">
                    <p>{{ $weatherData['name'] }} <span>-{{ now()->setTimezone('Asia/Manila')->format('h:i A') }}-</span>
                        <span>{{ now()->format('d-F-l') }}</span>
                    </p>
                    <p>pressure: {{$weatherData['main']['pressure']}}</p>
                    <p>humidity: {{$weatherData['main']['humidity']}}</p>
                    <form action="" class="float float-end d-flex f-w-400">
                        <input type="text" wire:model="searchCity" placeholder="search city"
                            class="form-control form-control-sm">
                        <a wire:click="fetchWeatherData" class="btn btn-primary btn-sm">S</a>
                    </form>
                </div>
            </div>
        @else
            <p>No weather data available.</p>
        @endif

    </div>
