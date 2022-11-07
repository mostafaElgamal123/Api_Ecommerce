<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'quantity',
        'price',
        'offer',
        'total_price'
    ];
    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function order(){
        return $this->hasOne(Order::class);
    }
}
