<?php

namespace App\Filters;

use Closure;
use App\Models\Category;
class CategoryId {
    public function handle($query,Closure $next){
        if(request()->has('category_id')){
            $query->where('category_id',request()->input('category_id'));
        }
        return $next($query);
    }
}