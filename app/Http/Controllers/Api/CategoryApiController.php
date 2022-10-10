<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class CategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::all();
        return response()->json(['data'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'              =>'required|min:3|max:50',
            'description'       =>'min:3|max:1000',
        ]);
        $category=Category::create($request->all());
        return response()->json(['data'=>$category]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $product=Product::where('category_id',$category->id)->get();
        return response()->json(['data'=>$product]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'              =>'required|min:3|max:50',
            'description'       =>'min:3|max:1000',
        ]);
        $category->update($request->except('token'));
        return response()->json(['data'=>$category]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['data'=>$category]);
    }
}
