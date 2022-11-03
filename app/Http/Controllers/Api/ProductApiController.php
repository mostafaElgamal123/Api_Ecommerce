<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Storage;
use Illuminate\Pipeline\Pipeline;
use App\Filters\{Name,CategoryId,MinPriceAndMaxPrice,Offer};
use App\Http\Resources\{ProductsResource,ProductsCollection};
use Illuminate\Support\Facades\Validator;
use App\Traits\{ApiResponse,UploadFile,ValidatorRequest};
class ProductApiController extends Controller
{
    use ApiResponse;
    use UploadFile;
    use ValidatorRequest;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::paginate();
        if(empty($product->total())){
            return $this->response('','not found data',404,'');
        }else{
            return $this->response(ProductsResource::collection($product)->response()->getData(true),'');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),$this->ValidationProducts('required'));
        if($validator->fails()){
            return $this->response('','fail',422,$validator->errors());
        }else{
            $product=Product::create($request->all());
            $product->image=$this->UploadImage($request->file('image'),'/images/product/');
            $product->save();
            return $this->response(new ProductsResource($product),'success',201,'');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $this->response(new ProductsResource($product),'');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validator=Validator::make($request->all(),$this->ValidationProducts(''));
        if($validator->fails()){
            return $this->response('','fail',422,$validator->errors());
        }else{
            if($request->hasFile('image')){
                if(Storage::delete($product->image)){
                    $product->update($request->all());
                    $product->image=$this->UploadImage($request->file('image'),'/images/product/');
                    $product->save();
                }else{
                    $product->update($request->all());
                    $product->image=$this->UploadImage($request->file('image'),'/images/product/');
                    $product->save();
                }
            }else{
                $product->update($request->all());
            }
            return $this->response(new ProductsResource($product),'success',202,'');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        if($product!=null){
            if(Storage::delete($product->image)) {
                if($product->delete()){
                    return $this->response(new ProductsResource($product),'deleted',204,'');
                }
            }else{
                if($product->delete()){
                    return $this->response(new ProductsResource($product),'deleted',204,'');
                }
            }
        }else{
            return $this->response('','fail',204,'not found this product id');
        }
    }

    public function SearchProductName(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required|min:3|max:150',
        ]);
        if($validator->fails()){
            return $this->response('','fail',422,$validator->errors());
        }else{
            $product=Product::where('name','LIKE', '%'.request()->input('name').'%')->paginate();
            if(empty($product->total())){
                return $this->response('','not found data',404,'');
            }else{
                return $this->response(ProductsResource::collection($product)->response()->getData(true),'success',http_response_code(),'');
            }
        }
    }
    public function ProductsAccordingCategory($category_id){
        $product=Product::where('category_id',$category_id)->paginate();
        if(empty($product->total())){
            return $this->response('','not found data',404,'');
        }else{
            return $this->response(ProductsResource::collection($product)->response()->getData(true),'');
        }
    }
    public function FilterProducts(Request $request){
        $validator=Validator::make($request->all(),$this->ValidationFilterProducts());
        if($validator->fails()){
            return $this->response('','fail',422,$validator->errors());
        }else{
            $product=app(Pipeline::class)
                ->send(Product::query())
                ->through([
                    CategoryId::class,
                    MinPriceAndMaxPrice::class,
                    Name::class,
                    Offer::class,
                ])
                ->thenReturn()
                ->paginate();
            if(empty($product->total())){
                return $this->response('','not found data',404,'');
            }else{
                return $this->response(ProductsResource::collection($product)->response()->getData(true),'success',http_response_code(),'');
            }
        }
    }

}


