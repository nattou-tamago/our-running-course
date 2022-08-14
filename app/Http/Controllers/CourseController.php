<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourse;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // DB::connection()->enableQueryLog();

        // $courses = Course::with('reviews')->get();

        // foreach ($courses as $course) {
        //     foreach ($course->reviews as $review) {
        //         echo $review->content;
        //     }
        // }

        // dd(DB::getQueryLog());

        // reviews_count
        return view(
            'courses.index',
            ['courses' => Course::latest()->withCount('reviews')->get()]
        );

        // return view('courses.index', ['courses' => Course::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourse $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;

        $course = Course::create($validated);

        $request->session()->flash('status', '新しいランニングコースが登録されました！');

        return redirect()->route('courses.show', ['course' => $course->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('courses.show', [
            'course' => Course::with('reviews')->findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);

        $this->authorize($course);

        return view('courses.edit', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCourse $request, $id)
    {
        $course = Course::findOrFail($id);

        $this->authorize($course);

        $validated = $request->validated();
        $course->fill($validated);
        $course->save();

        $request->session()->flash('status', 'ランニングコースが更新されました！');

        return redirect()->route('courses.show', ['course' => $course->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        $this->authorize($course);

        $course->delete();

        session()->flash('status', 'ランニングコースは削除されました！');

        return redirect()->route('courses.index');
    }
}
