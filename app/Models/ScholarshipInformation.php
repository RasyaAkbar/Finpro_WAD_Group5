<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipInformation extends Model
{
    use HasFactory;
    protected $table = 'scholarship_information';

    protected $fillable = [
        'title',
        'description',
        'eligibility',
        'deadline',
    ];

    protected $casts = [
        'deadline' => 'datetime',
    ];
}