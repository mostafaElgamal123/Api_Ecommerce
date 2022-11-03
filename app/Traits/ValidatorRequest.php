<?php


namespace App\Traits;


trait ValidatorRequest{


    public function ValidationProducts($required){
        return [
            'name'                =>'required|min:3|max:150',
            'description'         =>'required|min:3|max:100000',
            'image'               =>"$required|image|mimes:webp,jpg,png|max:300",
            'price'               =>'required|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'offer'               =>'required|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'available'           =>'required|',
            'category_id'         =>'required|',
        ];
    }
    public function ValidationFilterProducts(){
        return [
            'name'                =>'|max:150',
            'min_price'           =>'|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'max_price'           =>'|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'offer'               =>'|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'category_id'         =>'|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
        ];
    }
    public function ValidationCategories(){
        return [
            'name'              =>'required|min:3|max:50',
            'description'       =>'min:3|max:1000',
        ];
    }

}