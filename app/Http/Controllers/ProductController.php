<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products=Product::all();
        return view("product.index",["products"=>$products]);
    }


    public function create(){
        $categories=Category::all();
        return view("product.create",["categories"=>$categories]);
    }


    public function store(){
        request()->validate([
            "name"=>['required','min:3'],
            "price"=>['required']
        ]);
        
        $name=request()->name;
        $price=request()->price;
        $category_id=request()->category_id;
        
        Product::create([
            "name"=>$name,
            "price"=>$price,
            "category_id"=>$category_id
        ]);

        return to_route('products.index');
    }

    public function destroy($productId){
        $product=Product::find($productId);
        $product->delete();
        return to_route('products.index');

    }

    public function edit(Product $product){
        $categories=Category::all();
        return view("product.edit",["product"=>$product,"categories"=>$categories]);

    }

    public function update(Product $product){
        $name=request()->name;
        $price=request()->price;
        $category_id=request()->category_id;
        $product->update([
            'name'=>$name,
            'price'=>$price,
            'category_id'=>$category_id,
        ]);
        return to_route('products.index');
        


    }
}
