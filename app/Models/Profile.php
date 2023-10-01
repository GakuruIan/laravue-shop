<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public $table = 'profile';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'phone_number',
        'county',
        'sub_county',
        'ward'
    ];

}
