<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function count()
    {
        $data = [
            "students" => \App\Models\Student::count(),
            "teachers" => \App\Models\Teacher::count(),
            "courses" => \App\Models\Course::count(),
            "subjects" => \App\Models\Subject::count(),
            "semesters" => \App\Models\Semester::count(),
            "books" => \App\Models\Book::count(),
        ];
        return response()->json($data);
    }

    //Number of students in each batch
    public function batches_students()
    {
        $data = [];
        $batches = \App\Models\Batch::all();
        foreach ($batches as $batch) {
            $data[] = [
                "batch" => $batch->year,
                "students" => $batch->students->count(),
            ];
        }
        return response()->json($data);
    }

    //Number of students in each course in current year
    public function courses_students()
    {
        $data = [];
        $courses = \App\Models\Course::all();
        foreach ($courses as $course) {
            $data[] = [
                "course" => $course->course_name,
                "students" => $course->students->where("batch_id", \App\Models\Batch::current_batch()->id)->count(),
            ];
        }
        return response()->json($data);
    }

    //Number of students in last five years in each course
    public function courses_students_last_five_years()
    {
        // loop through last five years and get the students count in each course
        $data = [];
        $courses = \App\Models\Course::all();
        $batches = \App\Models\Batch::all();
        
        return response()->json($data);
    }


   
}
