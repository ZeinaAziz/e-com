<?php

namespace App\Http\Controllers\Api;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
class ProductController extends Controller
{
    // لعرض جميع المنتجات
    public function index()
    {
        $products=Product::get();
        return response()->json(
            ["Products" => ProductResource::collection($products),
        'messege' => 'success'],200);
    }
    // ليتمكن اليوزر من رؤية بروداكت
    public function show($id)
    {
        $product = Product::findOrFail($id);
        // return response()->json($product,200);
        return response()->json(["Product" => new ProductResource($product),
        'messege' => 'success'],200);
    }
    // Search For a Product By Name
    public function search($name)
    {
        $pros =Product::where('name','like','%'.$name.'%')->get();
        return response()->json(["Product" => ProductResource::collection($pros),
        'messege' => 'success'],200);
    }
}
