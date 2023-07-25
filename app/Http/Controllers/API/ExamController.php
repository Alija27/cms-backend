<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ExamRequest;
use App\Http\Resources\ExamResource;
use App\Models\Exam;
use App\Utils\ApiResponse;

class ExamController extends Controller
{
    public function index(Request $request)
    {
        $exams = $request->user()->exams()->with(["course", "department"]);
        return ApiResponse::success(ExamResource::collection($exams->get()));
    }

    public function store(ExamRequest $request)
    {
        $exam = $request->validated();
        $exam = Exam::create($exam);
        return ApiResponse::success(new ExamResource($exam), "Exam created successfully");
    }

    public function show(Exam $exam)
    {
        $exam->load(["course", "department"]);
        return ApiResponse::success(new ExamResource($exam));
    }

    public function update(ExamRequest $request, Exam $exam)
    {
        $data = $request->validated();
        $exam->update($data);
        return ApiResponse::success(new ExamResource($exam), "Exam updated successfully");
    }
    
    public function destroy(Exam $exam)
    {
        $exam->delete();
        return ApiResponse::success($exam, "Exam deleted successfully");
    }
}
