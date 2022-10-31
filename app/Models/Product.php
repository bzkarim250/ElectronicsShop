<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'image',
        'color',
        'price',
        'size',
        'categories',
        'price',
        'inStock',
    ];

    public function supplier(){
        return $this->belongsTo(User)
    }
}
