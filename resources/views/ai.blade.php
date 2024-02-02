<!DOCTYPE html>
<html>
<head>
    <title>AJAX Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
    <h1>
        Test Form
    </h1>
    <form action="{{route('aiTestKenme')}}" method="POST">
        @csrf
        @method('POST')
<input type="text" name="message">
<button type="submit">test</button>
    </form>
    <form id="myForm">
        @csrf
        <label for="message">Message:</label>
        <input type="text" id="message" name="message">
        <button type="submit">Submit</button>
    </form>

    <div id="response-container"></div>

    <script>
        $(document).ready(function() {
            $('#myForm').on('submit', function(e) {
                e.preventDefault();
                var message = $('#message').val();

                // Get CSRF token from a meta tag in the HTML
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '/chatbot/process',
                    method: 'POST',
                    data: {
                        message: message
                    },
                    headers: {
                        'X-CSRF-Token': csrfToken // Include CSRF token as a header
                    },
                    success: function(data) {
                        var responseHtml = '<p>' + data.message + '</p>';
                        $('#response-container').html(responseHtml);
                        $('#message').val(''); // Clear input field
                    },
                    error: function(xhr, status, error) {
                        console.log("An error occurred: " + error);
                    }
                });
            });
        });
    </script>
</body>
</html>
