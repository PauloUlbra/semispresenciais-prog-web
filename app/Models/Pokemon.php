<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pokemon extends Model
{
    protected $fillable = [
        'name',
        'type',
        'power',
        'health',
        'image',
        'trainer_id'
    ];

    public function trainer(): BelongsTo
    {
        return $this->belongsTo(Trainer::class);
    }
}
