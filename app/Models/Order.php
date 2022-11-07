<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'total_price',
        'status',
        'user_id',
    ];
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function orderProducts(){
        return $this->hasMany(Order_Product::class);
    }
}
