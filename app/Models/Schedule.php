<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedule_table';

    protected $fillable = [
        'schedule_title',
        'schedule_from',
        'schedule_to',
        'vessel_id',
        'itinerary',
        'destination_id',
        'partner_id',
        'status',
    ];

    protected $casts = [
        'schedule_from' => 'date',
        'schedule_to' => 'date',
    ];
}
