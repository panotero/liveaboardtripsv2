<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vessel extends Model
{
    use HasFactory;

    protected $table = 'vessel_table';
    protected $fillable = [
        'partner_id',
        'vessel_name',
        'vessel_thumbnail',
        'vessel_photos',
        'description'
    ];

    protected $casts = [
        'vessel_photos' => 'array',
    ];

    // ✅ One vessel has one specification
    public function specification()
    {
        return $this->hasOne(VesselSpecification::class, 'vessel_id');
    }

    public function cabins()
    {
        return $this->hasMany(Cabin::class, 'vessel_id');
    }
}
