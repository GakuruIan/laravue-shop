<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    
    public function product(): BelongsTo{
        return $this->belongsTo(product::class);
    }
}
