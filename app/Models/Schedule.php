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
        'schedule_from' => 'date:Y-m-d',
        'schedule_to'   => 'date:Y-m-d',
    ];

    public function VesselInfo()
    {
        return $this->belongsTo(Vessel::class, 'vessel_id', 'id');
    }
    public function DestinationInfo()
    {

        return $this->belongsTo(Destination::class, 'destination_id', 'id');
    }
    public function Schedules()
    {
        return $this->hasMany(Schedule::class, 'destination_id', 'destination_id');
    }
    public function Cabins()
    {
        return $this->hasMany(Cabin::class, 'vessel_id', 'vessel_id');
    }
}
