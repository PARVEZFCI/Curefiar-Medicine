<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'image',
        'address'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
