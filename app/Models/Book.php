<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'name',
        'writer',
        'pages',
        'release_year',
        'is_verificated',
        'user_id'
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
