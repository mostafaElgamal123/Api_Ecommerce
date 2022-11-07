<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,Product};
use App\Http\Resources\{ProductsResource,CategoriesResource,CategoriesCollection};
use Illuminate\Support\Facades\Validator;
use App\Traits\{ApiResponse,ValidatorRequest};
class CategoryApiController extends Controller
{
    use ApiResponse;
    use ValidatorRequest;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category=Category::paginate();
        if(empty($category->total())){
            return $this->response('','not found data',404,'');
        }else{
            return $this->response(CategoriesResource::collection($category)->response()->getData(true),'');
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
        $validator = Validator::make($request->all(),$this->ValidationCategories());
        if ($validator->fails()) {
            return $this->response('','fail',422,$validator->errors());
        }else{
            $category=Category::create($request->all());
            return $this->response(new CategoriesResource($category),'success',201,'');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        if(empty($category)){
            return $this->response('','not found data',404,'');
        }else{
            return $this->response(new CategoriesResource($category),'');
        }
    }

    public function ShowCategoriesProducts(Category $category){
        $product=Product::where('category_id',$category->id)->get();
        if(empty($product)){
            return $this->response('','not found data',404,'');
        }else{
            return $this->response(ProductsResource::collection($product)->response()->getData(true),'');
        }
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
        $validator = Validator::make($request->all(),$this->ValidationCategories());
        if ($validator->fails()) {
            return $this->response('','fail',422,$validator->errors());
        }else{
            $category->update($request->except('token'));
            return $this->response(new CategoriesResource($category),'success',202,'');
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
        $category=Category::find($id);
        if($category!=null){
            if($category->delete()){
                return $this->response(new CategoriesResource($category),'deleted',204,'');
            }
        }else{
            return $this->response('','fail',204,'not found this category id');
        }
    }
}
