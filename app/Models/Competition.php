<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    //
     protected $fillable = [
        'title',
        'description',
        'category',
        'organizer',
        'start_date',
        'end_date',
        'link',
        
    ];
        public function user() {
        return $this->belongsTo(User::class);
    }

}
