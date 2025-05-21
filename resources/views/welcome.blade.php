<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

 
    <div class="container"> 

    
        @if(session('message'))
          <p>{{session('message')}}</p>
        @endif
        @if($errors->any())
          <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        @endif
        <h1>Welcome Back</h1>
        <form action="{{ route('login_user') }}" method="POST">
            @csrf
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
            <p>Don't have an account? <a href="{{ route('registration') }}" style="color: var(--primary-color); text-decoration: none;">Sign Up</a></p>
        </div>
   
</body>
</html>