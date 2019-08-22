<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function books() {
        return $this->hasMany(Book::class);
    }

    public function scopeIsAdmin($query) {
        return $query->with('role')
                     ->whereHas('role', function($q) {
                        $q->where('name', 'admin');
                     });
    }
}
