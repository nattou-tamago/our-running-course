<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class CourseTagController extends Controller
{
    public function index($tag)
    {
        $tag = Tag::findOrFail($tag);

        return view('courses.index', [
            'courses' => $tag->courses()->with('tags')->get(),
        ]);
    }
}
