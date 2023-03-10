<?php

namespace App\Models;

use App\Models\Relationships\UserRelationships;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class User extends Model
{
    use  HasFactory, SoftDeletes, UserRelationships;

    protected $connection = 'mongodb';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'active'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function password(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value,
            set: fn($value) => Hash::make($value,['rounds' => 12])
        );
    }
}
