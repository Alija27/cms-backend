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

    public function index(Request $request)
    {
        $departments = json_decode($request->departments);
        if(!empty($departments)){   
            $courses = Course::whereIn("department_id",$departments);
        }else{
            $courses = Course::query();
        }
        return ApiResponse::success(CourseResource::collection($courses->get()));
    }


    public function store(CourseRequest $request)
    {
        $course = $request->validated();
        $course = Course::create($course);
        return APiResponse::success(new CourseResource($course), "Course created successfully");
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
        return ApiResponse::success($course, "Course updated successfully");
    }


    public function destroy(Course $course)
    {
        $course->delete();
        return ApiResponse::success($course, "Course deleted successfully");
    }
}
