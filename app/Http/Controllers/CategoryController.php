<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view("category.index",["categories"=>$categories]);
    }



    public function create(){
        return view("category.create");
}



    public function store(){
        request()->validate([
            "name"=>['required','min:3']
        ]);
        $name=request()->name;
          //methode 1
        // $category=new Category();
        // $category->name=$name;
        // $category->save();

          //methode 2
        Category::create([
            "name"=>$name
        ]);
        return to_route("category.index");
    }




    public function destroy($categoryId){
        $category=Category::find($categoryId);
        $category->delete();
        return to_route('category.index');
    }


    public function edit(Category $category){
        
        return view("category.edit",["category"=>$category]);

    }


    public function update($categoryId){
        $name=request()->name;
        $category=Category::find($categoryId);
        $category->update([
            'name'=>$name
        ]);
        return to_route('category.index');
    }
}
