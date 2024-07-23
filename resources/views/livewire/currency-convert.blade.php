<div>
    <div class="card col-lg-12 p-3 m-2 text-white" style="background: linear-gradient(90deg, #7366FF 0%, #3f34b7 100%)">
        <div class="text-center mb-3">
            <img src="{{ asset('assets/images/icons/exchange.png') }}" alt=""
                style="height: auto; width:50px; padding: 3px;">
        </div>
        {{-- <div class="loading-bubble skeleton" wire:loading> --}}
        <h3>Converted Amount:
            <div class="loader px-2" wire:loading>

            </div>
            <span wire:loading.remove>{{ number_format($converted_amount, 2) }}</span>
        </h3>
        {{-- </div> --}}

        <p>Exchange Rate: <span class="btn btn-outline-light text-white">{{ number_format($conversion_rate, 2) }}</span>
        </p>

    </div>
    {{-- @if ($converted_amount > 0)
        <div class="card col-sm-12 col-lg-5  p-3 m-2 text-white"
            style="background-color: #4158D0;
            background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
            ">
            <div class="text-center">
                <i data-feather="shopping-bag"></i>
            </div>

            <h5>{{ number_format($converted_amount, 2) }} </h5>
            <p>Exchange Rate: <span class="btn btn-outline-info">{{ number_format($conversion_rate, 2) }}</span></p>

        </div>
    @endif --}}
    <div class="card p-3">
        <div class="">
            <div class="mb-5">
                <h5>Convert to any currency</h5>
            </div>

            <div wire:livewire="currency-converter">

                <div class="form-group w-4">
                    <label for="from_currency">From Currency:</label>
                    <select wire:model="from_currency" id="to_currency" class="form-control my-2"
                        wire:change="$this->emit('updated', 'toCurrency')">
                        @foreach ($currencies['supported_codes'] as $currency)
                            <option value="{{ $currency['code'] }}">{{ $currency['name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group w-4">
                    <label for="to_currency">To Currency:</label>
                    <select wire:model="to_currency" id="to_currency" class="form-control my-2"
                        wire:change="$this->emit('updated', 'toCurrency')">
                        @foreach ($currencies['supported_codes'] as $currency)
                            <option value="{{ $currency['code'] }}">{{ $currency['name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="amount">Amount:</label>
                    <input wire:model="amount" type="number" class="form-control my-2" id="amount">
                </div>

                <button wire:click="convert" class="btn btn-primary my-2">Convert</button>

                {{-- @if ($converted_amount > 0)
                    <div class="alert alert-success">
                        {{ number_format($amount, 2) }} {{ $from_currency }} is equal to
                        {{ number_format($converted_amount, 2) }} {{ $to_currency }}
                        at a rate of {{ number_format($conversion_rate, 2) }}.
                    </div>
                @endif --}}

                @error('conversion_error')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

            </div>
        </div>
    </div>
</div>

</div>
