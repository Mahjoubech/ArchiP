<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'client_id',
        'architect_id',
        'category_id',
        'budget_min',
        'budget_max',
        'deadline',
        'location',
        'project_type',
        'status',
        'is_featured',
        'views_count',
        'proposals_count',
        'requirements',
        'attachments',
        'tags',
    ];

    protected $casts = [
        'budget_min' => 'decimal:2',
        'budget_max' => 'decimal:2',
        'deadline' => 'date',
        'requirements' => 'array',
        'attachments' => 'array',
        'tags' => 'array',
        'is_featured' => 'boolean',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function architect()
    {
        return $this->belongsTo(Architect::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function milestones()
    {
        return $this->hasMany(Milestone::class);
    }
} 