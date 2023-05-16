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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semesters = Semester::all(); 
        return ApiResponse::success(SemesterResource::collection($semesters));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SemesterRequest $request)
    {
        $semester = $request->validated();
        Semester::create($semester);
        //$response=new ApiResponse(true,null,"Semester created succesfully"); 

        return response()->json(["message" => "Semester created successfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SemesterResource $semester)
    {
        return response()->json($semester);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semester $semester)
    {
        $data = $request->validated();
        $semester->update($data);
        return response()->json(["message" => "Semester updated succesfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semester $semester)
    {
        $semester->delete();
        return response()->json(["message" => "Semester deleted successfully."]);
    }
}
