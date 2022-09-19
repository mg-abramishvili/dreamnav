<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $casts = [
        'object' => 'json',
    ];

    public function scheme()
    {
        return $this->belongsTo(Scheme::class);
    }

    public function routes()
    {
        return $this->hasMany(Route::class);
    }
}
