@extends('layouts.main_layout')
@section('content')

<h1>Create New Product</h1>

<form method="post" action="{{route('store_product')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <label for="name">Product Name</label>
        <input type="text"  name="name" class="form-control" placeholder="Enter Name of product" />
    </div>
    <div class="form-row">
        <label for="price">Product Price</label>
        <input type="text"  name="price" class="form-control" placeholder="Enter price of product" />
    </div>
    <div class="form-row">
        <label for="stock_quantity">Product Qty</label>
        <input type="text"  name="stock_quantity" class="form-control" placeholder="Enter stock qty" />
    </div>
    
    <div class="form-row">
        <label for="image">Product Image</label>
        <input type="file"  name="image" class="form-control"/>
    </div>


    
    <div class="form-row">
        <button type="submit" class="btn">Create product</button> 
    </div>
</form>






















@endsection