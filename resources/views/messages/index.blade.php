<!DOCTYPE html>
<html>
<head>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        padding: 40px;
        color: #333;
    }

    h1 {
        text-align: center;
        color: #444;
    }

    .flash-message {
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
        padding: 10px 15px;
        margin-bottom: 20px;
        border-radius: 5px;
        width: 100%;
        max-width: 600px;
        margin: 20px auto;
    }

    .error-message {
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
        padding: 10px 15px;
        margin-bottom: 20px;
        border-radius: 5px;
        width: 100%;
        max-width: 600px;
        margin: 20px auto;
    }

    .messages-container {
        max-width: 600px;
        margin: 0 auto;
    }

    .message {
        background: #fff;
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    .message h3 {
        margin-top: 0;
        color: #007bff;
    }

    .message p {
        margin-bottom: 0;
    }
</style>

</head>
<body>

    <h1>Messages</h1>

    @if (session('message'))
        <div class="flash-message">
            {{ session('message') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @isset($messages)
        <div class="messages-container">
            @foreach ($messages as $msg)
                <div class="message">
                    <h3>{{ $msg->user }} wrote:</h3>
                    <p>{{ $msg->message }}</p>
                </div>
            @endforeach
        </div>
    @endisset

</body>
</html>
