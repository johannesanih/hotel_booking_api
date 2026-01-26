<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingRoom extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'booking_id',
        'room_type_id',
        'quantity',
        'price_per_night',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}
