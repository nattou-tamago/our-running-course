<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function url()
    {
        return Storage::url($this->path);
    }
}
