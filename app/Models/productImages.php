<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productImages extends Model
{
    use HasFactory;

    public $table = 'productImages';

    public $timestamps = false;
    
    protected $fillable = [
        'image',
        'publicId',
        'product_id'
    ];
    
}
