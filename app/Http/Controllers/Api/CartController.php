<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Cart,Product};
use App\Traits\{ApiResponse,ValidatorRequest,GetQuantity,GetData};
use App\Http\Resources\{CartCollection,CartResource};
use Auth;
use Illuminate\Support\Facades\Validator;
class CartController extends Controller
{
    use ApiResponse;
    use ValidatorRequest;
    use GetQuantity;
    use GetData;


    public function index(){
        $cart=Cart::where('user_id',Auth::user()->id)->get();
        if(empty($cart)){
            return $this->response('','not found data',404,'');
        }else{
            return $this->response(CartResource::collection($cart),'');
        }
    }

    public function AddProductToCart(Request $request,Product $product){
        $validator = Validator::make($request->all(),$this->ValidationUpdateProductInCart());
        if ($validator->fails()) {
            return $this->response('','fail',422,$validator->errors());
        }else{
            $cart=Cart::where('user_id',Auth::user()->id)->where('product_id',$product->id)->first();
            if(empty($cart)){
                if($product->available=='yes'){
                    $cart=Cart::create($this->getdatacart($product,$this->getquantity($request,$product)));
                    return $this->response(new CartResource($cart),'success',201,'');
                }else{
                    return $this->response('','data is not available',404,'');
                }
            }else{
                return $this->response('','The product is already in the cart',404,'');
            }
        }
    }


    public function UpdateProductInCart(Request $request,Cart $cart){
        if(!empty($cart)){
            $validator = Validator::make($request->all(),$this->ValidationUpdateProductInCart());
            if ($validator->fails()) {
                return $this->response('','fail',422,$validator->errors());
            }else{
                    $cart->update([
                        'quantity'    =>$request->quantity,
                    ]);
                    return $this->response(new CartResource($cart),'success',202,'');
                }
        }else{
            return $this->response('','The cart is empty',404,'');
        }
    }


    public function DeleteFromCart(Cart $cart){
        if($cart->delete()){
            return $this->response(new CartResource($cart),'deleted',204,'');
        }else{
            return $this->response('','fail',204,'not found this category id');
        }
    }


    public function DeleteFromCartAll(){
        $cart=Cart::where('user_id',Auth::user()->id)->get();
        if($cart->each->delete()){
            return $this->response('','deleted',204,'');
        }else{
            return $this->response('','fail',204,'');
        }
    }
}
