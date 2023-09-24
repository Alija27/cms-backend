<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Course;
use App\Models\Account;
use App\Models\Student;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        if(!empty($request->course_id)){
            $students = Student::where('course_id', $request->course_id)->get();
        }else{
        $students = Student::with("user")->get();
        }

        return ApiResponse::success(StudentResource::collection($students));
    }

    
    public function store(Request $request)
    {
        $data = DB::transaction(function () use ($request) {
            $user = $request->validate([
                "user_name" => ["required"],
                "email" => ["required", "email"],
                "address" => ["required"],
                "phonenumber" => ["required", "min:10", "max:10"],
                "date_of_birth" => ["required"],
                "password" => ["required", "min:8"],
                "guardian_name" => ["required"],
                "guardian_phonenumber"=>["required"],
                "gender" => ["required"],
            ]);

            $user["password"] = bcrypt($request->password);

            $newUser = User::create($user);
            $newUser->assignRole('Student');

            $student = $request->validate([
                "course_id" => ["required"],
                "batch_id" => ["required"],
                "department_id" => ["required"],
            ]);

            
            $newStudent=  Student::create([
                "user_id" => $newUser->id
            ] + $student);
            
            $account=Account::create([
                "user_id" => $newUser->id,
                "total_fees"=> Course::find($request->course_id)->fees,
                "paid_fees"=>"0",
                "course_id"=>$request->course_id,
            ]);

            return [
                "user" => $newUser,
                "student" => $newStudent,
                "account" => $account
            ];
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
        return ApiResponse::success($student, "Student deleted successfully");
    }

    
}
