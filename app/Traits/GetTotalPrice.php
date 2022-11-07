<?php


namespace App\Traits;


trait GetTotalPrice{
    public function TotalPrice($cart=[]){
        $total_price=0;
        $count=count($cart);
        for($i=0;$i<$count;$i++){
            $total_price+=(($cart[$i]['price']*$cart[$i]['quantity'])*($cart[$i]['offer']/100));
        }
        return $total_price;
    }
    public function SubTotalPrice($item=[]){
        $total_price=(($item['price']*$item['quantity'])*($item['offer']/100));
        return $total_price;
    }
}