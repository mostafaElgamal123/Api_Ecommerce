<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Storage;
use App\Http\Requests\Api\ProductRequest;
use App\Http\Requests\Api\ProductUpdateRequest;
use App\Http\Requests\Api\ProductSearchNameRequest;
use App\Http\Requests\Api\ProductFilterRequest;
use Illuminate\Pipeline\Pipeline;
use App\Filters\Name;
use App\Filters\CategoryId;
use App\Filters\MinPriceAndMaxPrice;
use App\Filters\Offer;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\ProductsCollection;
class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::paginate(6);
        return new ProductsCollection($product);
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
        return new ProductsResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductsCollection($product);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProductUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        dd($product);
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
        return new ProductsResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        dd($product->id);
        if(Storage::delete($product->image)) {
            if($product->delete()){
                return response()->json(null, 204);
            }
         }else{
            if($product->delete()){
                return response()->json(null, 204);
            }
         }
    }

    public function SearchProductName(ProductSearchNameRequest $request){
        $request->validated();
        $product=Product::where('name','LIKE', '%'.request()->input('name').'%')->paginate(6);
        return new ProductsCollection($product);
    }
    public function ProductsAccordingCategory($category_id){
        $product=Product::where('category_id',$category_id)->paginate(6);
        return new ProductsCollection($product);
    }
    public function FilterProducts(ProductFilterRequest $request){
        $request->validated();
        $product=app(Pipeline::class)
                ->send(Product::query())
                ->through([
                    CategoryId::class,
                    MinPriceAndMaxPrice::class,
                    Name::class,
                    Offer::class,
                ])
                ->thenReturn()
                ->paginate(6);
        return new ProductsCollection($product);
    }

}


