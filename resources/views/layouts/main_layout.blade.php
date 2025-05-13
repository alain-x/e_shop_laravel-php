<html>
    <head>
        <title>My Shop</title>
    <link rel="stylesheet" href="{{ asset('css/layout_style.css') }}">
    </head>

    <body>
        
    <nav class="navbar">
        <div class="container">
            <a class="brand" href="">My Shop</a>
            <ul class="menu">
                <li><a href="{{route('home_page')}}">Home</a></li>
                <li><a href="{{route('product_form')}}">New Product</a></li>
                <li><a href="{{route('registration')}}">Register</a></li>
                <li><a href="{{route('logout')}}">Logout</a></li>
            </ul>
        </div>

    </nav>


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

        @yield('content')
    </div>
    </body>
</html>