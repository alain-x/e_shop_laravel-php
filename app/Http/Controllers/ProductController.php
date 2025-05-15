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

        if($request->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imageName);
            $validation_data['image'] = $imageName;

        }
        Product::create($validation_data);
            return redirect()->back()->with('message', 'Product created successfully');
    }

    public function edit_product($product_id)
    {
        $product = Product::where('id',$product_id)->first();
        return view('product_fd.edit_product', ['product' => $product]);
    }

    public function update_product(Request $request, $product_id)
    {
        $validation_data = $request->validate([
            'name'=>'required',
            'price'=>'nullable',
            'stock_quantity'=>'required',
            'image'=>'nullable',
        ]);

        if($request->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imageName);
            $validation_data['image'] = $imageName;

        }
        
        $product = Product::where('id',$product_id)->first();
        $product->update($validation_data);
        return redirect()->back()->with('message', 'Product updated successfully');
    }

    public function delete_product($product_id)
    {
        $product = Product::where('id',$product_id)->first();
        $product->delete();
        return redirect()->back()->with('message', 'Product deleted successfully');
    }


    public function sell_product(Request $request, $product_id){
        $validation_data = $request->validate([
            'quantity'=>'required',
        ]);

        $product = Product::where('id',$product_id)->first();
        if($product->stock_quantity >= $validation_data['quantity']){
            $product->stock_quantity -= $validation_data['quantity'];
            $product->save();
            return redirect()->back()->with('message', 'Product sold successfully');
        }else{
            return redirect()->back()->with('message', 'Not enough stock available');
        }
    }

    public function purchase(Request $request, $product_id)
    {
        $validate_data = $request ->validate([
            'quantity'=>'required'

        ]);

        $product = Product::where('id',$product_id)->first();
        $product ->stock_quantity+= $validate_data['quantity'];
        $product->save();
        return redirect()->back()->with('message','Thank you for purchasing!');
    }
}
