<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Teacher;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Http\Resources\TeacherResource;
use App\Models\Subject;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return ApiResponse::success(TeacherResource::collection($teachers));
    }


    public function store(TeacherRequest $request)
    {

        DB::transaction(function () use ($request) {
            $user = $request->validate([
                "user_name" => ["required"],
                "email" => ["required"],
                "address" => ["required"],
                "phonenumber" => ["required"],
                "date_of_birth" => ["required"],
                "password" => ["required", "min:8"],
                "guardian_name" => ["required"],
                "guardian_phonenumber"=>["required"],
                "gender" => ["required"],
            ]);
            $user["password"] = bcrypt($user["password"]);
            $newUser = User::create($user);
            $newUser->assignRole("Teacher");

            $teacher = Teacher::create([
                "user_id" => $newUser->id,
            ]);

    
            $subjects = $request->subject_id;
            $teacher->subjects()->attach($subjects);
            $departments = $request->department_id;
            $teacher->departments()->attach($departments);
            $courses = $request->course_id;
            $teacher->courses()->attach($courses);
        });
        $teacher = Teacher::latest()->first();
        return ApiResponse::success(new TeacherResource($teacher), "Teacher created successfully");
    }


    public function show(Teacher $teacher)
    {
        return ApiResponse::success(new TeacherResource($teacher));
    }


    public function update(Request $request, Teacher $teacher)
    {
        $data = $request->validate();
        $teacher->update($data);
        return ApiResponse::success(new TeacherResource($data) ,"Teacher updated successfully");
    }


    public function destroy(Teacher $teacher)
    {
        $teacher->user->delete();
        $teacher->delete();
        return ApiResponse::success($teacher, "Teacher deleted successfully");
    }
}
