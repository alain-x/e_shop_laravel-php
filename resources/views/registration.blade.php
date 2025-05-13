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
          <p>{{session('message')}}</p>
        @endif
        @if($errors->any())
          <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        @endif
          <h1>Registration Page</h1>
    <form method="post" action="{{route('store_user')}}">
        @csrf
        <input type="text" name="user_name" placeholder="User Name" required/>
        <input type="email" name="email" placeholder="Email" required/>
        <input type="password" name="password" placeholder="Password" required/>
        <button type="submit">Register</button>
    </form>
    <p>
        Already have an account? <a href="{{route('login')}}">Login</a>
    </p>
    </div>
</body>
</html>