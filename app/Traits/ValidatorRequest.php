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
            'quantity'            =>'required|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
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
    public function ValidationLogin(){
       return [
            'email' => 'required|string|email',
            'password' => 'required|string',
       ];
    }
    public function Validationregister(){
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ];
     }
     public function ValidationOrder(){
        return [
            'name'                => 'required|string|max:255',
            'email'               => 'required|string|email|max:255',
            'address'             =>'required|min:3|max:100000',
            'city'                =>'required|min:3|max:500',
            'phone'               =>'required|size:11|regex:/^01[0125][0-9]{8}$/',
        ];
     }
     public function ValidationUpdateProductInCart(){
        return [
            'quantity'            =>'nullable|regex:/^(\d+(,\d{1,2})?)?$/',
        ];
     }
}