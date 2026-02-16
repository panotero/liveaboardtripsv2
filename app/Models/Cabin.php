<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabin extends Model
{
    use HasFactory;
    protected $table = 'cabin_table';
    protected $fillable = [
        'cabin_details_id',
        'vessel_id',
        'schedule_id',
        'partner_id',
        'trip_year',
        'cabin_price',
        'surcharge_percentage',
        'created_at',
        'updated_at',
    ];

    public function details()
    {
        return $this->hasOne(CabindDetails::class, 'id', 'cabin_details_id');
    }
}
