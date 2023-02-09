<?php

namespace App\Models\Relationships;

use App\Models\User;
use Jenssegers\Mongodb\Relations\BelongsTo;

trait SessionRelationships
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
