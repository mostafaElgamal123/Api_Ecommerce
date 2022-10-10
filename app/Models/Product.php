<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'offer',
        'image',
        'available',
        'category_id'
    ];
    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
