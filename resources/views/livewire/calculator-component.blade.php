<div>
    <div class="calculator">
        <div class="display">
            {{ $result }}
        </div>
        <div class="buttons">
            @foreach (range(0, 9) as $number)
                <button wire:click="addNumber({{ $number }})">{{ $number }}</button>
            @endforeach

            <button wire:click="addOperator('+')">+</button>
            <button wire:click="addOperator('-')">-</button>
            <button wire:click="addOperator('*')">*</button>
            <button wire:click="addOperator('/')">/</button>

            <button wire:click="clear()">C</button>
        </div>
    </div>


</div>
