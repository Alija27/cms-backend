<?php

namespace App\Http\Controllers\API;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses=Course::all();
        return response()->json($courses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $course=$request->validated();
        Course::create($course);
        return response()->json(["message"=>"Course created sucessfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course->load(["department"]);
        return response()->json($course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $data=$request->validated();
        $course->update($data);
        return response()->json(["message"=>"Course update sucessfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(["message"=>"Course deleted sucessfully"]);
    }
}
