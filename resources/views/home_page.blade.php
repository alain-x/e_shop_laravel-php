@extends('layouts.main_layout')
@section('content')
    <h1>Home page</h1>
    
    <!-- Add search form at the top -->
    <div class="search-container" style="margin-bottom: 20px;">
        <form action="{{ route('search_product') }}" method="GET">
            @csrf
            <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}">
            <button type="submit">Search</button>
            @if(request('search'))
                <a href="{{ route('home') }}" style="margin-left: 10px;">Clear Search</a>
            @endif
        </form>
    </div>

    <div class="product-grid">
        @if($products->count() > 0)
            @foreach($products as $one_product)
            <div class="product-card">
                @if($one_product->image)
                    <img src="{{ asset('images/'.$one_product->image) }}" alt="{{ $one_product->name }}">
                @else
                    <div class="no-image">No Image Available</div>
                @endif
                <h2>{{ $one_product->name }}</h2>
                <p>Price: Rwf {{ number_format($one_product->price, 2) }}</p>
                <p>Qty: {{ $one_product->stock_quantity }}</p>
                <br>
                <div class="row" style="display: flex; justify-content: space-between;">
                    <p><a style="margin-left:20px; text-decoration:none; color:green;" href="{{ route('edit_product', $one_product->id) }}">Edit</a></p>
                    <p><a style="margin-right:20px; text-decoration:none; color:red;" href="{{ route('delete_product', $one_product->id) }}">Delete</a></p>
                </div>
                <br>
                <form action="{{ route('sell_product', $one_product->id) }}" method="post">
                    @csrf
                    <input type="number" name="quantity" placeholder="Enter quantity" min="1" max="{{ $one_product->stock_quantity }}" required/>
                    <button type="submit">Sell</button>
                </form>
                
                <form action="{{ route('purchase', $one_product->id) }}" method="post">
                    @csrf
                    <input type="number" name="quantity" placeholder="Enter purchased quantity" min="1" required/>
                    <button type="submit">Purchase</button>
                </form>
            </div>
            @endforeach
        @else
            <p>No products found.</p>
        @endif
    </div>
@endsection