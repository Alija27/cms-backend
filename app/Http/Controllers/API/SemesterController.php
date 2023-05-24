<?php

namespace App\Http\Controllers\API;

use App\Models\Semester;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SemesterRequest;
use App\Http\Resources\SemesterResource;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::all();
        return ApiResponse::success(SemesterResource::collection($semesters));
    }

    
    public function store(SemesterRequest $request)
    {
        $semester = $request->validated();
        Semester::create($semester);

        return ApiResponse::success(null, "Semester Created successfully");
    }

    
    public function show(Semester $semester)
    {
        return ApiResponse::success(new SemesterResource($semester));
    }

    public function update(Request $request, Semester $semester)
    {
        $data = $request->validated();
        $semester->update($data);
        return ApiResponse::success($semester, "Semester updated successfully");
    }

   
    public function destroy(Semester $semester)
    {
        $semester->delete();
        return ApiResponse::success(null, "Semester deleted successfully");
    }
}
