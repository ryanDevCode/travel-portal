<div class="chat-container">
    <p class="alert alert-warning" wire:offline>
        Whoops, your device has lost connection. The web page you are viewing is offline.
    </p>
    <div class="d-flex mt-3 g-4">
        <img src="{{ asset('assets/images/robot.png') }}" alt="" style="height: 50px; width: auto;">
        <p class="txt-dark p-2">Ask me anything Travel Related</p>
    </div>
    <div class="chat-history">

        {{-- <div class="mx-auto" wire:loading>
            <div class="loader-box">
                <div class="loader-7" style="height: 100px; width: 100px"></div>
            </div>
        </div> --}}

        @foreach ($chatHistory as $message)
            <div class="chat-bubble {{ $message['role'] == 'user' ? 'user-bubble' : 'ai-bubble' }}">
                {{ $message['content'] }}
            </div>
        @endforeach

    </div>
    <div class="loading-bubble skeleton" wire:loading>
    </div>
    <div class="message-form-container">
        <form wire:submit.prevent="sendMessage">
            @csrf
            <input type="text" wire:model.lazy="userMessage" placeholder="Type your message here..."
                class="form-control" id="validationTextarea" autocomplete="off" required wire:loading.attr="disabled">
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</div>
