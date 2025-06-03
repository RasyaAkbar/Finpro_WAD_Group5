<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;
    
    protected $table = 'internship_opportunities';

    protected $fillable = ['title', 'company_name', 'description', 'requirements', 'deadline'];
}