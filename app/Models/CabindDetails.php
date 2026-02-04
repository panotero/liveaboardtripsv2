<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabindDetails extends Model
{
    use HasFactory;
    protected $table = 'cabin_details';
    protected $fillable = [
        'vessel_id',
        'partner_id',
        'cabin_name',
        'cabin_description',
        'cabin_thumbnail',
        'cabin_photos',
        'guest_capacity',
        'guest_capacity',
        'bed_number',
        'created_at',
        'updated_at',
    ];
}
