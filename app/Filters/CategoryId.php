<?php

namespace App\Filters;

use Closure;
use App\Models\Category;
class CategoryId {
    public function handle($query,Closure $next){
        if(request()->has('category_id')){
            $category=Category::where('name',request()->input('category_id'))->first();
            if(isset($category)){
                $query->where('category_id',$category->id);
            }
        }
        return $next($query);
    }
}