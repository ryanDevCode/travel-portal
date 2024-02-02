<div class="chat-container">
    <h5>Make a conversation with arky your travel assistant</h5>
    <div class="chat-history">
        {{-- @if ($isWaitingForResponse)
            <div class="ai-bubble loading-bubble">
                <div class="loading-dots">
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
            </div>
        @endif --}}
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
        {{-- <div class="chat-bubble user-bubble">
            hello
        </div>
        <div class="chat-bubble ai-bubble">
            Hi there lorem50
        </div> --}}
    </div>
    <div class="message-form-container">
        <form wire:submit.prevent="sendMessage">
            <input type="text" wire:model.lazy="userMessage" placeholder="Type your message here..."
                class="form-control" id="validationTextarea" required>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</div>



{{-- <li class="ai-message">Keneme</li>
<li class="user-message">Hello</li>
<li class="ai-message">Hi okay so</li> --}}
