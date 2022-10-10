<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Storage;
use App\Http\Requests\Api\ProductRequest;
class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::all();
        return response()->json(['data'=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->validated();
        if($request->hasFile('image')){
            $file= $request->file('image');
            $destination_path='/images/product/';
            $filename=date('YmdHi').$file->getClientOriginalName();
            $path =$request->file('image')->storeAs($destination_path,$filename);
            $product=Product::create($request->all());
            $product->image= $path;
            $product->save();
        }
        $product=Product::create($request->all());
        return response()->json(['data'=>$product]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json(['data'=>$product]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $request->validated();
        $product->update($request->except('token'));
        if($request->hasFile('image')){
            $file= $request->file('image');
            $destination_path='/images/product/';
            $filename=date('YmdHi').$file->getClientOriginalName();
            $path =$request->file('image')->storeAs($destination_path,$filename);
            if(Storage::delete($product->image)){
                $product->update($request->all());
                $product->image= $path;
                $product->save();
            }else{
                $product->update($request->all());
                $product->image= $path;
                $product->save();
            }
        }else{
            $product->update($request->all());
            $product->save();
        }
        return response()->json(['data'=>$product]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(Storage::delete($product->image)) {
            if($product->delete()){
                return response()->json([
                    'success' => 'Record deleted successfully!',
                    'data'=>$product
                ]);
            }
         }else{
            if($product->delete()){
                return response()->json([
                    'success' => 'Record deleted successfully!',
                    'data'=>$product
                ]);
            }
         }
    }
}
