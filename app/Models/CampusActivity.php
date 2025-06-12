<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusActivity extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'campus_activities';

    // Define which fields are mass assignable (can be set using create() or update())
    protected $fillable = [
        'title',        // Title of the activity
        'description',  // Description or details about the activity
        'start_date',   // Activity start date (DATE type)
        'end_date',     // Activity end date (DATE type)
        'location',     // Where the activity will take place
        'time',         // Specific time of the activity
        'category',     // Category (e.g., seminar, workshop)
        'organizer',    // Name of the organizer or department
        'status',       // Status (e.g., scheduled, postponed, canceled)
    ];
}
