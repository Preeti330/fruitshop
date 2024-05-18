<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;
    protected $table = 'order_item';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cart_id',
        'user_id',
        'unit_price',
        'qty',
        'total_price',
        'order_id'
    ];

}
