<?php


namespace App\Traits;

trait GetQuantity{

    public function getquantity($request,$product){
        if($request->quantity!=null){
            $quantity=$request->quantity;
        }else{
            $quantity=$product->quantity;
        }
        return $quantity;
    }

}