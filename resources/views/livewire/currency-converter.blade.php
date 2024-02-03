<div style="width: 500px;">
    {{-- The whole world belongs to you. --}}
    {{-- <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 cclass="modal-title" id="myLargeModalLabel">Convert Currency</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="f-w-100">Converted: {{ $convertedAmount }}</h5>
                    <form wire:submit.prevent="convert" class="mt-4">
                        <div class="form-group mt-1">
                            <label for="amount">Enter amount</label>
                            <input type="number" wire:model.lazy="amount" id="amount" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="fromCurrency">Convert From</label>
                            <select wire:model="fromCurrency" id="fromCurrency" class="form-control"
                                wire:change="$this->emit('updated', 'fromCurrency')">
                                @foreach ($currencies['supported_codes'] as $currency)
                                    <option value="{{ $currency['code'] }}">{{ $currency['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="toCurrency">Convert To</label>
                            <select wire:model="toCurrency" id="toCurrency" class="form-control"
                                wire:change="$this->emit('updated', 'toCurrency')">
                                @foreach ($currencies['supported_codes'] as $currency)
                                    <option value="{{ $currency['code'] }}">{{ $currency['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Convert</button>
                    </form>

                    @error('conversion')
                        <p class="error">{{ $message }}</p>
                    @enderror



                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button">Save changes</button>
                </div>
            </div>
        </div>
    </div> --}}
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 cclass="modal-title" id="myLargeModalLabel">Convert Currency</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="f-w-100">Converted: {{ $convertedAmount }}</h5>
                    <form wire:submit.prevent="convert" class="mt-4">
                        <div class="form-group mt-1">
                            <label for="amount">Enter amount</label>
                            <input type="number" wire:model.lazy="amount" id="amount" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="fromCurrency">Convert From</label>
                            <select wire:model="fromCurrency" id="fromCurrency" class="form-control"
                                wire:change="$this->emit('updated', 'fromCurrency')">
                                @foreach ($currencies['supported_codes'] as $currency)
                                    <option value="{{ $currency['code'] }}">{{ $currency['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="toCurrency">Convert To</label>
                            <select wire:model="toCurrency" id="toCurrency" class="form-control"
                                wire:change="$this->emit('updated', 'toCurrency')">
                                @foreach ($currencies['supported_codes'] as $currency)
                                    <option value="{{ $currency['code'] }}">{{ $currency['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Convert</button>
                    </form>

                    @error('conversion')
                        <p class="error">{{ $message }}</p>
                    @enderror



                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
