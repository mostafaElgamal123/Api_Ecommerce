<?php

namespace App\Traits;
use App\Models\Product;
trait UpdateQuantity{

    public function updatequantityinproduct($item){
        $product=Product::where('id',$item->product_id)->first();
        $product->update([
            'quantity'=>(($product->quantity)-($item->quantity)),
        ]);
        if($product->quantity<=0){
            $product->update([
                'available'=>'no',
            ]);
        }
    }

}