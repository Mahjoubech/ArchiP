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
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'photo',
        'phone',
        'address',
        'city',
        'country',
        'postal_code',
        'birth_date',
        'gender',
        'bio',
        'is_active',
        'is_verified',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'birth_date' => 'date',
        'is_active' => 'boolean',
        'is_verified' => 'boolean',
    ];

    /**
     * Get the client profile associated with the user.
     */
    public function client()
    {
        return $this->hasOne(Client::class);
    }

    /**
     * Get the architect profile associated with the user.
     */
    public function architect()
    {
        return $this->hasOne(Architect::class);
    }

    /**
     * Check if user is an admin.
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user is an architect.
     */
    public function isArchitect()
    {
        return $this->role === 'architect';
    }

    /**
     * Check if user is a client.
     */
    public function isClient()
    {
        return $this->role === 'client';
    }

    /**
     * Get the user's profile data based on their role.
     */
    public function getProfileData()
    {
        switch ($this->role) {
            case 'client':
                return $this->client;
            case 'architect':
                return $this->architect;
            default:
                return null;
        }
    }
}
