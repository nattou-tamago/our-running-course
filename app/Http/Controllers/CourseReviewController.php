<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReview;
use App\Models\Course;
use App\Models\Review;
use Illuminate\Http\Request;

class CourseReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store', 'destroy']);
    }

    public function store(Course $course, StoreReview $request)
    {
        $course->reviews()->create([
            'rating' => $request->input('rating'),
            'content' => $request->input('content'),
            'user_id' => $request->user()->id,
        ]);

        $request->session()->flash('status', 'レビューが投稿されました！');

        return redirect()->back();
    }

    public function destroy(Course $course, $reviewId)
    {
        $review = Review::findOrFail($reviewId);

        $review->delete();

        session()->flash('status', 'レビューを削除しました！');

        return redirect()->back();
    }
}
