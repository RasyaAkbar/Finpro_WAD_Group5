<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Culinary extends Model
{

    protected $table = 'culinaries';

    protected $fillable = ['image','title','detail'];

    
    public function culinary()
    {
        return $this->hasMany(Culinary::class);
    }

}
