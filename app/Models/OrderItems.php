<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
  
    public function order():BelongsTo{
        return $this->belongsTo(Order::class);
    }

    public function product():BelongsTo{
        return $this->belongsTo(products::class);
    }
}
