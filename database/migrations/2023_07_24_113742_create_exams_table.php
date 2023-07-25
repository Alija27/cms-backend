<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId("subject_id")->constrained("subjects")->onDelete("cascade");
            $table->foreignId("semester_id")->constrained("semesters")->onDelete("cascade");
            $table->foreignId("course_id")->constrained("courses")->onDelete("cascade");
            $table->foreignId("teacher_id")->constrained("departments")->onDelete("cascade");
            $table->date("date");
            $table->time("time");
            $table->string("duration");
            $table->string("total_marks");
            $table->string("pass_marks");
            $table->text("description");
            $table->string("exam_type");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
