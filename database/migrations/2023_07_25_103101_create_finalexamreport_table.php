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
        Schema::create('finalexamreport', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId("course_id")->constrained("courses")->onDelete("cascade");
            $table->foreignId("semester_id")->constrained("semesters")->onDelete("cascade");
            $table->foreignId("student_id")->constrained("students")->onDelete("cascade");
            $table->foreignId("batch_id")->constrained("batches")->onDelete("cascade");
            $table->date("date");
            $table->string("position")->nullable();
            $table->string("grade")->nullable();
            $table->string("gpa");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finalexamreport');
    }
};
