<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

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
