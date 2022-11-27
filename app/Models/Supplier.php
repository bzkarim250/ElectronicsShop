<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'password',
        'phone',
        'description',
        'id_number',
        'payment_card',
        'id_image',
        'profile_image'
    ];
    public function user(){
        return $this->belongsTo(User::class);
     }
     public function Order(){
        return $this->hasMany(Order::class);
     }
}
