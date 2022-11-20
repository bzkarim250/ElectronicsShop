<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable=[
        'firstName',
        'lastName',
        'email',
        'phone'
    ];
    public function user(){
        return $this->belongsTo(User::class);
     }
     public function Order(){
        return $this->hasMany(Order::class);
     }
}
