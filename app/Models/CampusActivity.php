<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusActivity extends Model
{
    use HasFactory;

    protected $table = 'campus_activities';

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'location',
        'time',
        'category',
        'organizer',
        'status',   
    ];


    // protected $casts = [
    //     'start_date' => 'date',
    //     'end_date' => 'date',
    // ];
}