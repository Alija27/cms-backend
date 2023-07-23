<?php

namespace App\Http\Controllers\API;

use App\Models\Subject;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Http\Resources\SubjectResource;

class SubjectController extends Controller
{

    public function index(Request $request)
    {

        $courses = $request->course_id;
        if(!empty($courses)){
            $subjects = Subject::whereIn("course_id",$courses);
        }else{
        $subjects = Subject::query();
        }
        return ApiResponse::success(SubjectResource::collection($subjects->get()));
    }


    public function store(SubjectRequest $request)
    {
        $subject = $request->validated();
        $student=Subject::create($subject);
        return ApiResponse::success(new SubjectResource($student), "Subject created successfully");
    }


    public function show(Subject $subject)
    {
        return ApiResponse::success(new SubjectResource($subject));
    }


    public function update(SubjectRequest $request, Subject $subject)
    {
        $data = $request->validated();
        $subject->update($data);
        return ApiResponse::success(new SubjectResource($subject),"Subject created successfully");
    }


    public function destroy(Subject $subject)
    {
        $data = $subject;
        $subject->delete();
        return ApiResponse::success($data, "Subject deleted successfully");
    }


    public function filterSubjectBySemester(Request $request)
    {
        $subjects = Subject::where('semester_id', $request->semester_id)->get();
        return ApiResponse::success(SubjectResource::collection($subjects));
    }
}
