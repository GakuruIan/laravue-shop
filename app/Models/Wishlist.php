<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    public $table = 'wishlist';

    protected $fillable = [
        'user_id',
        'product_id'
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
}
