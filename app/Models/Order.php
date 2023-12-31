<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public $table = 'orders';

    protected $fillable = [
       'amount',
       'tracking_id',
       'shipping_fee',
       'session_id',
       'payment_status',
       'delivery_status'
    ];

    public function orderitems():HasMany{
        return $this->hasMany(OrderItems::class);
    }

    public function delievery() :HasOne{
        return $this->hasOne(DeliveryDetails::class);
    }
}
