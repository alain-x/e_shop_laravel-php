@extends('layouts.main_layout')
@section('content')
    <h1>Home page</h1>
    <div class="product-grid">
        @foreach($products as $one_product)
        <div class="product-card">
            <img src="{{asset('images/'.$one_product->image)}}" alt="{{$one_product->name}}">
            <h2>{{$one_product->name}}</h2>
            <p>Price: Rwf {{$one_product->price}}</p>
            <p>Qty: {{$one_product->stock_quantity}}</p>
            <br>
            <div class="row" style="display: flex; justify-content: space-between;">
                <p><a style="margin-left:20px; text-decoration:none; color:green;" href="{{route('edit_product',$one_product->id)}}">Edit</a></p>
            <br>
            <p><a style="margin-right:20px; text-decoration:none; color:red;" href="{{route('delete_product',$one_product->id)}}">Delete</a></p>
            </div>
            <br>
        </div>

        @endforeach
    </div>
@endsection