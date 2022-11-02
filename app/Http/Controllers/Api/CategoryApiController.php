<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Resources\CategoriesResource;
use App\Http\Resources\CategoriesCollection;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;
class CategoryApiController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category=Category::paginate(6);
        return $this->response(CategoriesResource::collection($category)->response()->getData(true),'');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'              =>'required|min:3|max:50',
            'description'       =>'min:3|max:1000',
        ]);
        if ($validator->fails()) {
            return $this->response('','fail',http_response_code(),$validator->errors());
        }else{
            $category=Category::create($request->all());
            return $this->response(new CategoriesResource($category),'success',200,'');
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
        $product=Product::where('category_id',$category->id)->paginate(6);
        return $this->response(CategoriesResource::collection($product)->response()->getData(true),'');
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
        $validator = Validator::make($request->all(), [
            'name'              =>'required|min:3|max:50',
            'description'       =>'min:3|max:1000',
        ]);
        if ($validator->fails()) {
            return $this->response('','fail',http_response_code(),$validator->errors());
        }else{
            $category->update($request->except('token'));
            return $this->response(new CategoriesResource($category),'success',200,'');
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
