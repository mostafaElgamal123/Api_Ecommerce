<?php

namespace App\Filters;

use Closure;

class Offer {
    public function handle($query,Closure $next){
        if(request()->has('offer')){
            $query->where('offer',request()->input('offer'));
        }
        return $next($query);
    }
}