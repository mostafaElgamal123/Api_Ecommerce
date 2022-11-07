<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'product_name',
        'quantity',
        'image',
        'price',
        'offer',
        'product_id',
        'user_id'
    ];
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
}
