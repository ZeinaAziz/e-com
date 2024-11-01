<?php

namespace App\Http\Controllers\Api;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{

    public function index()
    {
        $categories=Category::get();

        return response()->json(["categories" =>CategoryResource::collection($categories),
        'messege' => 'success'],200);
    }
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json(["category" => new CategoryResource($category),
        'messege' => 'success'],200);
    }

}
