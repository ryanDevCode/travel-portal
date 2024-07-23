<div>
    <div class="form-group mt-2">
        <label for="text_to_translate">Text to Translate:</label>
        <textarea wire:model="text_to_translate" id="text_to_translate" class="form-control" rows="5"></textarea>
    </div>

    <div class="form-group mt-2">
        <label for="translation">Translation:</label>
        <textarea wire:model="translation" id="translation" class="form-control" rows="5" readonly></textarea>
    </div>

    <div class="form-group mt-2">
        <label for="from_language">From Language:</label>
        <select wire:model="from_language" id="from_language" class="form-control">
            <option value="">Auto Detect</option>
            @foreach ($languages as $language)
                <option value="{{ $language['code'] }}">{{ $language['language'] }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mt-2">
        <label for="to_language">To Language:</label>
        <select wire:model="to_language" id="to_language" class="form-control">
            <option value="">Select Language</option>
            @foreach ($languages as $language)
                <option value="{{ $language['code'] }}">{{ $language['language'] }}</option>
            @endforeach
        </select>
    </div>

    <button type="button" class="btn btn-primary mt-2" wire:click="translate">Translate</button>
</div>
