<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'client_address',
        'amount',
        'user_id',
        'supplier_id',
        'client_id',
        'quantity'
    ];
    public function Supplier(){
        return $this->belongsTo(Supplier::class);
     }
    public function Product(){
        return $this->hasMany(Product::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
}
