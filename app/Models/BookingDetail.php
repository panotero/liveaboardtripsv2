<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;

    protected $table = 'booking_details';

    protected $fillable = [
        'booking_id',
        'cabin_id',
        'guest_number',
        'schedule_id',
    ];

    public function cabin()
    {
        return $this->belongsTo(Cabin::class, 'cabin_id', 'id');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
