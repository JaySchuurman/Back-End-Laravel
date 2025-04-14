<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Message</title>
</head>
<body>
    <h1>Create a Message</h1>    
    <form method="post" action="{{ route('messages.store') }}">
        @csrf 
        @method('post')

        <div>
            <label>User</label>
            <input type="text" name="user" placeholder="Enter your username" />
            @error('user')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>        
        <div>
            <label>Message</label>
            <input name="message" placeholder="Write your message..."></>
            @error('message')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input type="submit" value="Send Message" />
        </div>
    </form>
</body>
</html>
