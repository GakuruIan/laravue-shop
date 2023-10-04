<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
 
    protected $fillable = [
       'amount',
       'tracking_id'
    ];

    public function orderitems():HasMany{
        return $this->hasMany(orderitems::class);
    }

    public function delievery() :HasOne{
        return $this->hasOne(DeliveryDetails::class);
    }
}
