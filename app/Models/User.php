<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens,HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public const ROLE_CUSTOMER = 'customer';
    public const ROLE_HOTEL_ADMIN = 'hotel_admin';
    public const ROLE_SUPER_ADMIN = 'super_admin';

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // 🔐 Role helpers
    public function isCustomer()
    {
        return $this->role === self::ROLE_CUSTOMER;
    }

    public function isHotelAdmin()
    {
        return $this->role === self::ROLE_HOTEL_ADMIN;
    }

    public function isSuperAdmin()
    {
        return $this->role === self::ROLE_SUPER+HOTEL_ADMIN;
    }

    // 📌 Relationships
    public function hotels()
    {
        return $this->hasMany(Hotel::class, 'hotel_admin_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
