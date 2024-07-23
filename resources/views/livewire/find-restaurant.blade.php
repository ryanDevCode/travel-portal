<div>
    <p class="alert alert-warning" wire:offline>
        Whoops, your device has lost connection. The web page you are viewing is offline. Connect to the internet to
        continue finding restaurants.
    </p>
    @if ($cityCode)
        <p>{{ $cityCode }}</p>
    @endif
    <div class="d-flex">
        <input type="text" wire:model="cityName" class="form-control mr-2">
        <button wire:click="findRestaurant" class="btn btn-primary d-flex">
            <div wire:loading class="spinner-border spinner-border-sm">
            </div>
            Search
        </button>
    </div>

    @if ($restaurants)
        @foreach ($restaurants as $singleRestaurant)
            <div class="pt-4 p-2 border border-primary bg-white rounded mb-2 mt-4">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4 text-center">
                        <img src="{{ htmlspecialchars($singleRestaurant['photo']['images']['medium']['url']) }}"
                            alt="Hotel Image" style="height: auto; width: 200px;">
                        <div class="text-start pt-2 lh-sm">
                            <p>rating: <span class="text-success">{{ $singleRestaurant['rating'] }}</span></p>
                            <p>ranking: <span class="text-danger">{{ $singleRestaurant['ranking'] }}</span></p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-8 bg-warnning row border-lg border-start border-primary">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <h5>{{ $singleRestaurant['name'] }}</h5>
                            <p>price: <span>
                                    @if (isset($singleRestaurant['price']))
                                        <p>{{ $singleRestaurant['price'] }}</p>
                                    @else
                                        no price data available
                                    @endif
                                </span></p>
                            <p>Cuisines:
                                @foreach ($singleRestaurant['cuisine'] as $cuisine)
                                    <span class="btn btn-pill btn-outline-primary btn-xs">{{ $cuisine['name'] }}</span>
                                @endforeach
                            </p>
                            @if ($singleRestaurant['dietary_restrictions'])
                                <p>
                                    Dietary Preferences:
                                    @foreach ($singleRestaurant['dietary_restrictions'] as $restriction)
                                        <span
                                            class="btn btn-pill btn-outline-success btn-xs">{{ $restriction['name'] }}</span>
                                    @endforeach
                                </p>
                            @endif
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 border-lg border-start border-primary">
                            @if (isset($singleRestaurant['phone']))
                                <p>Phone: <span class="text-success">{{ $singleRestaurant['phone'] }}</span></p>
                            @endif

                            @if (isset($singleRestaurant['website']))
                                <p>Website: <span class="text-wrap"><a href="{{ $singleRestaurant['website'] }}">Open in
                                            web -></a></span>
                                </p>
                            @endif

                            @if (isset($singleRestaurant['email']))
                                <p>Email: <span><a
                                            href="mailto:{{ $singleRestaurant['email'] }}">{{ $singleRestaurant['email'] }}</a></span>
                                </p>
                            @endif

                            @if (isset($singleRestaurant['address']))
                                <p>Address: <span>{{ $singleRestaurant['address'] }}</span></p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="text-center mx-auto p-5" wire:loading.remove>
            <p class="text-danger">No Restaurant Found in that area, search for restaurant</p>
        </div>

    @endif

    <div class="mt-4 col-12" wire:loading>
        <div class="pt-4 p-2 border border-primary bg-white rounded mb-2 col-12">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4 text-center">
                    <img class="skeleton" style="height: 150px; width: 90%;">
                    <div class="text-start p-3 lh-sm">
                        <p class="skeleton skeleton-text"></p>
                        <p class="skeleton skeleton-text"></p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-8 bg-warnning row border-lg border-start border-primary">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <h5 class="skeleton skeleton-title"></h5>
                        <p class="skeleton skeleton-text"></p>
                        <p class="skeleton skeleton-cards"></p>
                        <div class="skel">
                            <p class="skeleton skeleton-cards"></p>
                            <p class="skeleton skeleton-cards"></p>
                            <p class="skeleton skeleton-cards"></p>
                        </div>
                        <div class="skel">
                            <p class="skeleton skeleton-cardss"></p>
                            <p class="skeleton skeleton-cardss"></p>
                        </div>


                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 border-lg border-start border-primary address">
                        <p class="skeleton skeleton-text"></p>
                        <p class="skeleton skeleton-text"></p>
                        <p class="skeleton skeleton-text"></p>
                        <p class="skeleton skeleton-text"></p>

                    </div>
                </div>
            </div>
        </div>

        <div class="pt-4 p-2 border border-primary bg-white rounded mb-2">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4 text-center">
                    <img class="skeleton" style="height: 150px; width: 90%;">
                    <div class="text-start p-3 lh-sm">
                        <p class="skeleton skeleton-text"></p>
                        <p class="skeleton skeleton-text"></p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-8 bg-warnning row border-lg border-start border-primary">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <h5 class="skeleton skeleton-title"></h5>
                        <p class="skeleton skeleton-text"></p>
                        <p class="skeleton skeleton-cards"></p>
                        <div class="skel">
                            <p class="skeleton skeleton-cards"></p>
                            <p class="skeleton skeleton-cards"></p>
                            <p class="skeleton skeleton-cards"></p>
                        </div>
                        <div class="skel">
                            <p class="skeleton skeleton-cardss"></p>
                            <p class="skeleton skeleton-cardss"></p>
                        </div>


                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 border-lg border-start border-primary address">
                        <p class="skeleton skeleton-text"></p>
                        <p class="skeleton skeleton-text"></p>
                        <p class="skeleton skeleton-text"></p>
                        <p class="skeleton skeleton-text"></p>

                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="pt-4 p-2 border border-primary bg-white rounded mb-2">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4 text-center">
                    <img class="skeleton" style="height: 150px; width: 90%;">
                    <div class="text-start p-3 lh-sm">
                        <p class="skeleton skeleton-text"></p>
                        <p class="skeleton skeleton-text"></p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-8 bg-warnning row border-lg border-start border-primary">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <h5 class="skeleton skeleton-title"></h5>
                        <p class="skeleton skeleton-text"></p>
                        <p class="skeleton skeleton-cards"></p>
                        <div class="skel">
                            <p class="skeleton skeleton-cards"></p>
                            <p class="skeleton skeleton-cards"></p>
                            <p class="skeleton skeleton-cards"></p>
                        </div>
                        <div class="skel">
                            <p class="skeleton skeleton-cardss"></p>
                            <p class="skeleton skeleton-cardss"></p>
                        </div>


                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 border-lg border-start border-primary address">
                        <p class="skeleton skeleton-text"></p>
                        <p class="skeleton skeleton-text"></p>
                        <p class="skeleton skeleton-text"></p>
                        <p class="skeleton skeleton-text"></p>

                    </div>
                </div>
            </div>
        </div> --}}
    </div>


</div>
