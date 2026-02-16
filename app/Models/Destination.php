<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $table = 'destination_table';

    protected $fillable = [
        'destination_name',
        'destination_country',
        'destination_popularity_points',
        'vessel_id_list',
        'partner_id',
        'destination_photos',
        'destination_thumbnail',
        'description',
    ];

    protected $casts = [
        'vessel_id_list' => 'array',
        'destination_photos' => 'array',
    ];
}
