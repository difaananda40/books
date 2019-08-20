<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $fillable = [
        'name', 'password', 'role_id'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }
}
