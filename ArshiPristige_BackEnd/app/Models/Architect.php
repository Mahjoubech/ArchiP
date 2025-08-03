<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Architect extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'license_number',
        'years_of_experience',
        'specializations',
        'education',
        'certifications',
        'portfolio_url',
        'linkedin',
        'website',
        'hourly_rate',
        'availability_status',
        'languages_spoken',
        'service_areas',
        'verification_documents',
        'is_verified',
        'verification_date',
        'rating',
        'total_projects',
        'completed_projects',
    ];

    protected $casts = [
        'specializations' => 'array',
        'education' => 'array',
        'certifications' => 'array',
        'languages_spoken' => 'array',
        'service_areas' => 'array',
        'is_verified' => 'boolean',
        'verification_date' => 'datetime',
        'rating' => 'decimal:2',
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
        return $this->hasMany(Review::class, 'architect_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'architect_skills');
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
} 