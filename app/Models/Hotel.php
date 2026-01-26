<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'hotel_admin_id',
        'name',
        'description',
        'address',
        'city',
        'state',
        'country',
        'is_approved',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'hotel_admin_id');
    }

    public function roomTypes()
    {
        return $this->hasMany(RoomType::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
