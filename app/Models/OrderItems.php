<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    public $table = 'orders_items';

    protected $fillable = [
       'quantity',
       'size',
       'color',
       'order_id',
       'product_id'
    ];

}
