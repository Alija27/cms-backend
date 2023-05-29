<?php

namespace App\Http\Controllers\API;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Http\Resources\CourseResource;
use App\Utils\ApiResponse;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::all();
        return ApiResponse::success(CourseResource::collection($courses));
    }


    public function store(CourseRequest $request)
    {
        $course = $request->validated();
        Course::create($course);
        return APiResponse::success(null, "Course created successfully");
    }


    public function show(Course $course)
    {
        $course->load(["department"]);
        return ApiResponse::success(new CourseResource($course));
    }


    public function update(CourseRequest $request, Course $course)
    {
        $data = $request->validated();
        $course->update($data);
        return ApiResponse::success(null, "Course updated successfully");
    }


    public function destroy(Course $course)
    {
        $course->delete();
        return ApiResponse::success(null, "Course deleted successfully");
    }
}
