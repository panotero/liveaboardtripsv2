<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking_table';

    protected $fillable = [
        'ref_code',
        'user_id',
        'booking_details_id',
        'trip_year',
        'status',
        'booking_date',
        'schedule_id',
        'partner_id',
    ];

    public function bookingDetails()
    {
        return $this->hasMany(BookingDetail::class, 'booking_id');
    }

    public function bookingUserInfo()
    {
        return $this->hasOne(BookingUserInfo::class, 'booking_id');
    }
}
