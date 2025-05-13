<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function product_form(){
        return view('product_fd.product_form');
    }
    public function store_product(Request $request)
    {
        $validation_data = $request->validate([
            'name'=>'required',
            'price'=>'nullable',
            'stock_quantity'=>'required',
            'image'=>'nullable',
        ]);
        Product::create($validation_data);
            return redirect()->back()->with('message', 'Product created successfully');
    }
}
