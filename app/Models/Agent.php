<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'agent_category', 'dossier_id'];

    public function agentCategory(): HasOne
    {
        return $this->hasOne(AgentCategory::class, 'id', 'agent_category');
    }

    // public function invoice(): BelongsTo
    // {
    //     return $this->belongsTo(Invoice::class);
    // }

    // public function dossier(): HasOne
    // {
    //     return $this->hasOne(Dossier::class, 'id', 'dossier_id');
    // }
}
