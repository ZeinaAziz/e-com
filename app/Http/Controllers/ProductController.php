<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::get();
        return view('dashboard',compact('products'));
    }

    public function create()
    {
        $categories=Category::all();
        return view('products.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);
        if($request->has('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename =time().'.'.$extention;
            $path = 'upload/product/';
            $file->move($path,$filename);
        }
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->available	 = 1;
        $product->image=$path.$filename;
        $product->user_id = Auth::id();
        $product->save();
        $product->categories()->sync($request->categories);
        return redirect()->route('products.index')->with('messege','product added successfly');
    }

    public function notAva($id)
    {
        $product= Product::findOrFail($id);
        if( Auth::user()->id == $product->user->id || Auth::user()->isSuperAdmin){
            $product->available=0;
            $product->save();
            return redirect()->back()->with('messege','Modified');

        }
        return redirect()->back()->with('messege','  لا يمكنك التعديل فقط صاحب المنتج و السوبر ادمن');
    }
    public function ava($id)
    {
        $product= Product::findOrFail($id);
        if( Auth::user()->id == $product->user->id || Auth::user()->isSuperAdmin){
            $product->available=1;
            $product->save();
            return redirect()->back()->with('messege','Modified');
        }
        return redirect()->back()->with('messege','لا يمكنك التعديل فقط صاحب المنتج و السوبر ادمن');
        $product->available=1;
        $product->save();
        return redirect()->back()->with('messege','Modified');
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('Products.show',compact('product'));
    }

    public function edit($id)
    {

        $product = Product::findOrFail($id);

        if( Auth::user()->id == $product->user->id || Auth::user()->isSuperAdmin){
            $categories=Category::all();
             return view('Products.edit',compact('product','categories'));
        }
        return redirect()->back()->with('messege','  لا يمكنك التعديل فقط صاحب المنتج و السوبر ادمن');
        $categories=Category::all();
        return view('Products.edit',compact('product','categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->user_id = Auth::id();
        $product->save();
        $product->categories()->sync($request->categories);
        return redirect()->route('products.index')->with('messege','تم تعديل المنتج');
    }
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('messege','Deleted');
    }
     public function forceDelete($id){
        Product::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back()->with('messege','Deleted');
    }
    public function showdelcategories()
    {
        $products=Product::onlyTrashed()->get();
        return view('Products.softdel',compact('products'));
    }
    // public function restore($id){
    //     Product::withTrashed()->where('id',$id)->restore();
    //     return redirect()->back()->with('messege','Restored');
    // }
    public function restore($id)
    {
    $product = Product::withTrashed()->find($id);
    if ($product) {
        $product->restore();
        return redirect()->back()->with('success', 'Product restored successfully.');
    }
    return redirect()->route('products.index')->with('error', 'Product not found.');
}

}
