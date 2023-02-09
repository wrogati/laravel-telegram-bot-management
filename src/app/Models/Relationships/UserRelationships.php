<?php

namespace App\Models\Relationships;

use App\Models\Session;
use Jenssegers\Mongodb\Relations\HasMany;

trait UserRelationships
{
    public function session(): HasMany
    {
        return $this->hasMany(Session::class);
    }
}
