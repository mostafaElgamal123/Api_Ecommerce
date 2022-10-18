<?php

namespace App\Filters;

use Closure;

class Name {
    public function handle($query,Closure $next){
        if(request()->has('name')){
            $query->where('name','LIKE', '%'.request()->input('name').'%');
        }
        return $next($query);
    }
}