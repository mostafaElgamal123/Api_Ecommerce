<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Storage;
use Illuminate\Pipeline\Pipeline;
use App\Filters\Name;
use App\Filters\CategoryId;
use App\Filters\MinPriceAndMaxPrice;
use App\Filters\Offer;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\ProductsCollection;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;
class ProductApiController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::paginate(6);
        return $this->response(ProductsResource::collection($product)->response()->getData(true),'');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'                =>'required|min:3|max:150',
            'description'         =>'required|min:3|max:100000',
            'image'               =>'required|image|mimes:webp,jpg,png|max:300',
            'price'               =>'required|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'offer'               =>'required|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'available'           =>'required|',
            'category_id'         =>'required|',
        ]);
        if($validator->fails()){
            return $this->response('','fail',http_response_code(),$validator->errors());
        }else{
            if($request->hasFile('image')){
                $file= $request->file('image');
                $destination_path='/images/product/';
                $filename=date('YmdHi').$file->getClientOriginalName();
                $path =$request->file('image')->storeAs($destination_path,$filename);
                $product=Product::create($request->all());
                $product->image= $path;
                $product->save();
            }
            return $this->response(new ProductsResource($product),'success',http_response_code(),'');
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
        $validator=Validator::make($request->all(),[
            'name'                =>'required|min:3|max:150',
            'description'         =>'required|min:3|max:100000',
            'image'               =>'|image|mimes:webp,jpg,png|max:300',
            'price'               =>'required|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'offer'               =>'required|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'available'           =>'required|',
            'category_id'         =>'required|',
        ]);
        if($validator->fails()){
            return $this->response('','fail',http_response_code(),$validator->errors());
        }else{
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
            }
            return $this->response(new ProductsResource($product),'success',http_response_code(),'');
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
            return $this->response('','fail',http_response_code(),$validator->errors());
        }else{
            $product=Product::where('name','LIKE', '%'.request()->input('name').'%')->paginate(6);
            return $this->response(ProductsResource::collection($product)->response()->getData(true),'success',http_response_code(),'');
        }
    }
    public function ProductsAccordingCategory($category_id){
        $product=Product::where('category_id',$category_id)->paginate(6);
        return $this->response(ProductsResource::collection($product)->response()->getData(true),'');
    }
    public function FilterProducts(Request $request){
        $validator=Validator::make($request->all(),[
            'name'                =>'|max:150',
            'min_price'           =>'|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'max_price'           =>'|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'offer'               =>'|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'category_id'         =>'|max:250',
        ]);
        if($validator->fails()){
            return $this->response('','fail',http_response_code(),$validator->errors());
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
                ->paginate(6);
            return $this->response(ProductsResource::collection($product)->response()->getData(true),'success',http_response_code(),'');
        }
    }

}


