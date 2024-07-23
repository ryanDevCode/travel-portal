{{-- @extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styless.css') }}">
@endsection

@section('style')

@endsection

@section('breadcrumb-title')
    <h3>Ai Assistant</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Request</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="chat">

            <!-- Header -->
            <div class="top">
                <img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" alt="Avatar">
                <div>
                    <p>Ai Chat</p>
                    <small>Online</small>
                </div>
            </div>
            <!-- End Header -->

            <!-- Chat -->
            <div class="messages">
                <div class="left message">
                    <img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" alt="Avatar">
                    <p>Start chatting with Chat GPT AI below!!</p>
                </div>
            </div>
            <!-- End Chat -->

            <!-- Footer -->
            <div class="bottom">
                <form>
                    <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
                    <button type="submit"></button>
                </form>
            </div>
            <!-- End Footer -->

        </div>





    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';

        //Broadcast messages
        $("form").submit(function(event) {
            event.preventDefault();

            //Stop empty messages
            if ($("form #message").val().trim() === '') {
                return;
            }

            //Disable form
            $("form #message").prop('disabled', true);
            $("form button").prop('disabled', true);

            $.ajax({
                url: "/chat",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                //pede remove na to tas rekta yunng request alanng ireceive ni controller
                data: {
                    "model": "gpt-3.5-turbo",
                    "content": $("form #message").val()
                }
            }).done(function(res) {

                //Populate sending message
                $(".messages > .message").last().after('<div class="right message">' +
                    '<p>' + $("form #message").val() + '</p>' +
                    '<img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" alt="Avatar">' +
                    '</div>');

                //Populate receiving message
                $(".messages > .message").last().after('<div class="left message">' +
                    '<img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" alt="Avatar">' +
                    '<p>' + res + '</p>' +
                    '</div>');

                //Cleanup
                $("form #message").val('');
                $(document).scrollTop($(document).height());

                //Enable form
                $("form #message").prop('disabled', false);
                $("form button").prop('disabled', false);
            });
        });
    </script>
@endsection

@section('script')

@endsection --}}
