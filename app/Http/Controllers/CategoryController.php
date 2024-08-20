<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        // dd($request->all());
        $Category = Category::create($request->all());
        return response()->json($Category);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json($category); 
    }


    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        return response()->json($category);
    }
}
