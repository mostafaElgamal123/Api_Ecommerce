<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order,Product,Cart,Order_Product};
use App\Traits\{ApiResponse,ValidatorRequest,GetTotalPrice,GetData,UpdateQuantity};
use App\Http\Resources\{OrdersCollection,OrdersResource};
use Auth;
use Illuminate\Support\Facades\Validator;
class OrderController extends Controller
{
    use ApiResponse;
    use ValidatorRequest;
    use GetTotalPrice;
    use GetData;
    use UpdateQuantity;


    public function Order(Request $request){
        $cart=Cart::where('user_id',Auth::user()->id)->get();
        if(count($cart)){
            $validator = Validator::make($request->all(),$this->ValidationOrder());
            if ($validator->fails()) {
                return $this->response('','fail',422,$validator->errors());
            }else{
                $order=Order::create($this->getdataorder($request,$cart));
                    $orderid=Order::where('user_id',Auth::user()->id)->first();
                    foreach ($cart as $productId => $item){
                        Order_Product::Create($this->getdataorderproduct($orderid,$item));
                        $this->updatequantityinproduct($item);
                    }
                    $cart->each->delete();
                    return $this->response(new OrdersResource($order),'success',202,'');
            }
        }else{
            return $this->response('','Your cart is empty',422,'');
        }
    }

    public function GetOrderData(){
       $order=Order::with('orderproducts.product')->where('user_id',Auth::user()->id)->paginate();
        if(count($order)>0){
            return $this->response(OrdersResource::Collection($order)->response()->getData(true),'success',202,'');
        }else{
            return $this->response('','not found data',422,'');
        }
    }


}
