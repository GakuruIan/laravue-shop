<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    public $table = "products";

    protected $fillable = [
        'name',
        'price',
        'color',
        'size',
        'description',
        'stock',
        'images',
        'category_id'
    ];
    
}
