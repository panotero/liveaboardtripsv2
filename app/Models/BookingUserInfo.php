<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingUserInfo extends Model
{
    use HasFactory;

    protected $table = 'booking_userinfo';

    protected $fillable = [
        'booking_id',
        'first_name',
        'last_name',
        'address_1',
        'address_2',
        'country',
        'city',
        'mobile',
        'email',
        'phone',
        'guest_list',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
