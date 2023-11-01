<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class products extends Model
{
    use HasFactory;

    public $table = "products";

    protected $fillable = [
        'name',
        'price',
        'colors',
        'size',
        'description',
        'stock',
        'images',
        'category_id'
    ];
    
    public function category() :BelongsTo{
        return $this->belongsTo(Category::class);
    }
    
    public function images() :HasMany{
        return $this->hasMany(productImages::class,'product_id');
    }

    public function orderitems():HasMany{
        return $this->hasMany(OrderItems::class,'product_id');
    }
}
