<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_size',
        'industry',
        'website',
        'linkedin',
        'budget_range',
        'project_preferences',
        'communication_preferences',
        'timezone',
        'preferred_languages',
        'verification_documents',
        'is_verified',
        'verification_date',
    ];

    protected $casts = [
        'project_preferences' => 'array',
        'communication_preferences' => 'array',
        'preferred_languages' => 'array',
        'is_verified' => 'boolean',
        'verification_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
} 