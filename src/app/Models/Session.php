<?php

namespace App\Models;

use App\Models\Relationships\SessionRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Session extends Model
{
    use HasFactory, SoftDeletes, SessionRelationships;

    protected $collection = 'sessions';

    protected $fillable = [
        'user_id',
        'auth-secure-token',
        'expires_in',
        'disabled_at',
        'disabled_by_session_id',
    ];
}
