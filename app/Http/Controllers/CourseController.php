<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourse;
use App\Models\Course;
use App\Models\Image;
use App\Models\Tag;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Js;

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
        $courses = Course::latestWithRelations()->get();

        $coursesGeoJson = $this->getCoursesGeoJson($courses);

        return view('courses.index',[
            'courses' => $courses,
            'coursesGeoJson' => $coursesGeoJson,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('courses.create', ['tags' => $tags]);
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

        $course = Course::make($validated);

        $course->position = $this->getPosition($validated['location']);

        $course->save();

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $path = Storage::disk('public')->putFile('course_images', $file);

                $course->images()->save(
                    Image::create([
                        'path' => $path,
                        'course_id' => $course->id
                    ])
                );
            }
        };

        $course->tags()->attach(request()->tags);

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
            'course' => Course::with('reviews', 'tags', 'user', 'reviews.user')->findOrFail($id),
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
        $course = Course::with('tags')->findOrFail($id);

        $this->authorize($course);

        $tags = Tag::all();

        return view('courses.edit', [
            'course' => $course,
            'tags' => $tags
        ]);
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

        $course->position = $this->getPosition($validated['location']);

        if ($request->hasFile('images')) {
            $files = $request->file('images');

            if (count($course->images) + count($files) - (count($request->input('deleteImages') ?? [])) > 3) {
                return back()->with('number-of-images-error', 'アップロードできる画像は3枚以内です。');
            }

            foreach ($files as $file) {
                $path = Storage::disk('public')->putFile('course_images', $file);

                $course->images()->save(
                    Image::create([
                        'path' => $path,
                        'course_id' => $course->id
                    ])
                );
            }
        }

        if ($request->input('deleteImages')) {
            foreach ($request->input('deleteImages') as $deleteImage) {
                $deleteImageArray = json_decode($deleteImage, true);
                Storage::disk('public')->delete($deleteImageArray['path']);
                Image::where('id', $deleteImageArray['id'])->delete();
            }
        }

        $course->save();

        $course->tags()->sync(request()->tags);

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

    private function getPosition(String $location)
    {
        $mapboxToken = config('my-app.mapbox_token');

        $url = "https://api.mapbox.com/geocoding/v5/mapbox.places/{$location}.json?limit=1&language=ja&access_token={$mapboxToken}";

        $response = Http::get($url);

        $longitude = $response->json()['features'][0]['geometry']['coordinates'][0];
        $latitude = $response->json()['features'][0]['geometry']['coordinates'][1];

        return new Point($latitude, $longitude, 4326);
    }

    private function getCoursesGeoJson($courses)
    {
        $coursesGeoJson = array('type' => 'FeatureCollection', 'features' => array());

        foreach ($courses as $course) {
            $features = array(
                    'type' => 'Feature',
                    'properties' => array(
                        'id' => $course->id,
                        'title' => $course->title,
                        'distance' => $course->distance
                    ),
                    "geometry" => array(
                        'type' => 'Point',
                        'coordinates' => array($course->position->getLng(), $course->position->getLat())
                    )
            );
            array_push($coursesGeoJson['features'], $features);
        }

        return $coursesGeoJson;
    }
}
