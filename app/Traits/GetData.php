<?php


namespace App\Traits;
use Auth;
trait GetData{

    public function getdataorder($request,$cart){
        return [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'city'=>$request->city,
            'total_price'=>$this->TotalPrice($cart),
            'user_id'=>Auth::user()->id,
        ];
    }
    public function getdataorderproduct($orderid,$item){
        return [
            'order_id'=>$orderid->id,
            'product_id'=>$item->product_id,
            'quantity'=>$item->quantity,
            'price'=>$item->price,
            'offer'=>$item->offer,
            'total_price'=>$this->SubTotalPrice($item),
        ];
    }
    public function getdatacart($product,$quantity){
        return [
            'product_name'=>$product->name,
            'quantity'    =>$quantity,
            'image'       =>$product->image,
            'price'       =>$product->price,
            'offer'       =>$product->offer,
            'product_id'  =>$product->id,
            'user_id'     =>Auth::user()->id,
        ];
    }
}