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

    public function index()
    {
        $subjects = Subject::all();
        return ApiResponse::success(SubjectResource::collection($subjects));
    }


    public function store(SubjectRequest $request)
    {
        $subject = $request->validated();
        Subject::create($subject);
        return ApiResponse::success(null, "Subject created successfully");
    }


    public function show(Subject $subject)
    {
        return ApiResponse::success($subject);
    }


    public function update(SubjectRequest $request, Subject $subject)
    {
        $data = $request->validated();
        $subject->update($data);
        return ApiResponse::success(null,"Subject created successfully");
    }


    public function destroy(Subject $subject)
    {
        $subject->delete();
        return ApiResponse::success(null, "Subject deleted successfully");
    }
}
