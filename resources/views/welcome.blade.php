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
    <h1>Login Page</h1>
    <form method="post" action="{{route('login_user')}}">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p>
        Don't have an account? <a href="{{route('registration')}}">Register</a>
    </p>
    </div>
   
</body>
</html>