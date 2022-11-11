<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

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
        'user_id'
    ];
    protected $casts=[
        'color'=>'array',
        'size'=>'array',
        'categories'=>'array',
        'image'=>'array'
    ];

    public function user(){
       return $this->belongsTo(User::class);
    }
}
