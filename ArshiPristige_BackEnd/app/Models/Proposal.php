<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'architect_id',
        'title',
        'description',
        'proposed_budget',
        'estimated_duration',
        'delivery_date',
        'attachments',
        'status',
        'is_accepted',
        'accepted_at',
        'rejection_reason',
        'client_notes',
        'architect_notes',
    ];

    protected $casts = [
        'proposed_budget' => 'decimal:2',
        'estimated_duration' => 'integer',
        'delivery_date' => 'date',
        'attachments' => 'array',
        'is_accepted' => 'boolean',
        'accepted_at' => 'datetime',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function architect()
    {
        return $this->belongsTo(Architect::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
} 