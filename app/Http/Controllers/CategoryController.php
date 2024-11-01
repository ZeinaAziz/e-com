<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories=Category::get();
        return view('categories.index',compact('categories'));

    }
    public function store(Request $request)
    {
        $category= new Category();
        $category->name=$request->name;
        $category->save();
        return redirect()->route('categories.index')->with('messege',"Category Add Successfly");
    }
    public function showproducts($id)
    {
        $category = Category::findOrFail($id);
        $products=$category->products;
        return view('categories.showproducts',compact('products','category'));
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit',compact('category'));
    }


    public function update(Request $request, $id)
    {
        $category= Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index');
    }
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('categories.index');
    }


}


