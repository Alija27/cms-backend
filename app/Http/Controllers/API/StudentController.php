<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Student;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with("user")->get();
        return ApiResponse::success(StudentResource::collection($students));
    }

    
    public function store(Request $request)
    {
        $data = DB::transaction(function () use ($request) {
            $user = $request->validate([
                "name" => ["required"],
                "email" => ["required", "email"],
                "address" => ["required"],
                "phonenumber" => ["required", "min:10", "max:10"],
                "date_of_birth" => ["required"],
                "password" => ["required", "min:8"]
            ]);

            $user["password"] = bcrypt($request->password);

            $newUser = User::create($user);
            $newUser->assignRole('Teacher');

            $student = $request->validate([
                "course_id" => ["required"],
                "batch_id" => ["required"],
                "department_id" => ["required"],
            ]);

            return  Student::create([
                "user_id" => $newUser->id
            ] + $student);
        });

        return ApiResponse::success($data, "Student created successfully");
    }

    public function show(Student $student)
    {
        return ApiResponse::success(new StudentResource($student));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            "course_id" => ["required"],
            "batch_id" => ["required"],
            "department_id" => ["required"],
        ]);

        $student->update($data);
        return ApiResponse::success($data, "Student updated successfully");
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return ApiResponse::success(null, "Student deleted successfully");
    }
}
