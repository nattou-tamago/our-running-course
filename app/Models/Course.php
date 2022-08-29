<?php

namespace App\Models;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    use SpatialTrait;

    protected $fillable = [
        'title',
        'location',
        'distance',
        'description',
        'user_id',
    ];

    protected $spatialFields = [
        'position',
    ];

    use HasFactory;

    public function reviews()
    {
        return $this->hasMany(Review::class)->latest();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function scopeLatest(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    }

    public function scopeLatestWithRelations(Builder $query)
    {
        return $query->latest()
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->with('user')
            ->with('tags')
            ->with('images');
    }

    public static function boot()
    {
        parent::boot();
    }
}
