<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "name" => "First Semester",
            ],
            [
                "name" => "Second Semester",
            ],
            [
                "name" => "Third Semester",
            ],
            [
                "name" => "Fourth Semester",
            ],
            [
                "name" => "Fifth Semester",
            ],
            [
                "name" => "Sixth Semester",
            ],
            [
                "name" => "Seventh Semester",
            ],
            [
                "name" => "Eighth Semester",
            ],
        ];

        $course_ids = Course::all()->pluck("id")->toArray();

        foreach ($data as $semester) {
            $semester = Semester::updateOrCreate($semester);
            $semester->courses()->sync($course_ids);
        }
    }
}
