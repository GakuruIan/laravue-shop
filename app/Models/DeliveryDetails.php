<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryDetails extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
            'firstname',
            'lastname',
            'email' ,
            'phone_number',
            'county',
            'sub_county' ,
            'ward',
            'order_id'
    ];

    public function order():BelongsTo{
        return $this->belongsTo(Order::class);
    }
}
