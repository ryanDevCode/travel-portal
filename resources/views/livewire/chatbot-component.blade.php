<div class="chat-container">
    <div class="d-flex mt-3">
        <img src="{{ asset('assets/images/chatbot.png') }}" alt="">
        <p class="txt-primary">Ask me anything Travel Related</p>
    </div>
    <div class="chat-history">

        <div class="col-md-3">
            <div class="loader-box">
                <div class="loader-7"></div>
            </div>
        </div>
        @foreach ($chatHistory as $message)
            <div class="chat-bubble {{ $message['role'] == 'user' ? 'user-bubble' : 'ai-bubble' }}">
                {{ $message['content'] }}
            </div>
        @endforeach

    </div>
    <div class="message-form-container">
        <form wire:submit.prevent="sendMessage">
            <input type="text" wire:model.lazy="userMessage" placeholder="Type your message here..."
                class="form-control" id="validationTextarea" autocomplete="off" required>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</div>
