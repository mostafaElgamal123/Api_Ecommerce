<?php

namespace App\Traits;

trait UpdateQuantity{

    public function updatequantityinproduct($product,$item){
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