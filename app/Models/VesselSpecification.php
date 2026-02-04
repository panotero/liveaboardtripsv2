<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VesselSpecification extends Model
{
    use HasFactory;
    protected $table = 'vessel_specification';   // ← forces table name
    protected $fillable = [
        'vessel_id',
        'vessel_year_model',
        'vessel_year_renovation',
        'vessel_beam',
        'vessel_fuel_capacity',
        'vessel_cabin_capacity',
        'vessel_bathroom_number',
        'vessel_topspeed',
        'vessel_cruisingspeed',
        'vessel_engines',
        'vessel_max_guest_capacity',
        'vessel_freshwater_maker',
        'vessel_tenders',
        'vessel_water_capacity'
    ];
}
