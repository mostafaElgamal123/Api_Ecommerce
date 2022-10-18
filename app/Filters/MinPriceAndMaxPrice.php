<?php

namespace App\Filters;

use Closure;

class MinPriceAndMaxPrice {
    public function handle($query,Closure $next){
        if(request()->has('min_price')&&request()->input('min_price')!=null&&request()->has('max_price')&&request()->input('max_price')!=null){
            if(request()->input('min_price')!=request()->input('max_price')){
                $query->whereBetween('price',[request()->input('min_price'),request()->input('max_price')]);
            }else{
                $query->where('price',request()->input('min_price'));
            }
        }elseif(request()->has('min_price')&&request()->input('min_price')!=null){
            $query->where('price',request()->input('min_price'));
        }elseif(request()->has('max_price')&&request()->input('max_price')!=null){
            $query->where('price',request()->input('max_price'));
        }
        return $next($query);
    }
}