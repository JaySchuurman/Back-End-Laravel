<x-app-layout>
    <x-slot name="header">
        <h1 class="text-center text-gray-800 dark:text-gray-200 text-2xl font-semibold">Create a Message</h1>
    </x-slot>

    <style>
        form {
            max-width: 500px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        form div {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px 14px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .error-message {
            color: #d9534f;
            margin-top: 6px;
            font-size: 14px;
        }
    </style>

    <form method="post" action="{{ route('messages.store') }}">
        @csrf
        @method('post')

        <div>
            <label for="user">User</label>
            <input type="text" name="user" id="user" placeholder="Enter your username" value="{{ old('user') }}" />
            @error('user')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="message">Message</label>
            <input type="text" name="message" id="message" placeholder="Write your message..." value="{{ old('message') }}" />
            @error('message')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input type="submit" value="Send Message" />
        </div>
    </form>
</x-app-layout>
