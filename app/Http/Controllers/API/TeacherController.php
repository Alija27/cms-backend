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
                "name" => ["required"],
                "email" => ["required"],
                "address" => ["required"],
                "phonenumber" => ["required"],
                "date_of_birth" => ["required"],
                "password" => ["required", "min:8"]
            ]);
            $user["password"] = bcrypt($request->password);
            $newUser = User::create($user);
            $newUser->assignRole("Teacher");

            $data = $request->validated();
            $teacher = Teacher::create([
                "user_id" => $newUser->id,
            ] + $data);


            $departments = $request->department_id;
            $teacher->departments()->attach($departments);
        });
        return ApiResponse::success(null, "Teacher created successfully");
    }


    public function show(Teacher $teacher)
    {
        return ApiResponse::success(new TeacherResource($teacher));
    }


    public function update(Request $request, Teacher $teacher)
    {
        $data = $request->validate();
        $teacher->update($data);
        return ApiResponse::success($data, "Teacher updated successfully");
    }


    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return ApiResponse::success(null, "Teacher deleted successfully");
    }
}