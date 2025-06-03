<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    // Enable mass-assignment for the fields in the array
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
