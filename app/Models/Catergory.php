<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Catergory extends Model
{
    use HasFactory;

    public $table = 'catergory';


    protected  $fillable =[
            'catergory_name',
            'image',
            'publicId'
        ];
    
    public function products () : HasMany{
        return $this->hasMany(products::class,'category_id');
     }
}
