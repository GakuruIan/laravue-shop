<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    
}
