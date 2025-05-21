<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        @if(session('message'))
        <div class="text-align: center">
            {{session('message')}}
        </div>
        @endif

        @if($errors->any())

        <div class="text-align: center">
            <ul>
                @foreach($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                @endforeach
            </ul>

        @endif



        <h1>Register</h1>
        <form action="{{ route('store_user') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required placeholder="Enter your full name">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>
            <button type="submit">Log In</button>
        </form>
        <div style="text-align: center; margin-top: 1rem;">
            <p>Already have an account? <a href="{{ route('login') }}" style="color: var(--primary-color); text-decoration: none;">Log In</a></p>
        </div>
    </div>
</body>
</body>
</html>