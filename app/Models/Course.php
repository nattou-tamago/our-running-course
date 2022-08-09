<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'location',
        'distance',
        'description',
    ];

    use HasFactory;

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
