<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'agent_category'];

    public function agentCategory(): HasOne
    {
        return $this->hasOne(AgentCategory::class, 'id');
    }
}
