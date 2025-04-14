<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Messages</title>
</head>
<body>

    <h1>Messages</h1>

    {{-- Laravel session flash message --}}
    @if (session('message'))
        <div style="color: green;">
            {{ session('message') }}
        </div>
    @endif

    {{-- Error message --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Custom messages passed from controller --}}
    @isset($messages)
        <ul>
            @foreach ($messages as $msg)
                <li>{{ $msg->user }}</li>
                <li>{{ $msg->message }}</li>
            @endforeach
        </ul>
    @endisset

</body>
</html>
