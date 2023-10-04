<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
