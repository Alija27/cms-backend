<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FinalExamReportRequest;
use App\Http\Resources\FinalExamReportResource;
use App\Models\FinalExamReport;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;

class FinalExamReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=FinalExamReport::all();
        return response()->json(new FinalExamReportResource($data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FinalExamReportRequest $request)
    {
        $data=$request->validated();
        $data=FinalExamReport::create($data);
        return ApiResponse::success(new FinalExamReportResource($data), "FinalExamReport created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(FinalExamReport $finalExamReport)
    {
        return ApiResponse::success(new FinalExamReportResource($finalExamReport));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FinalExamReportRequest $request, FinalExamReport $finalExamReport)
    {
        $data=$request->validated();
        $finalExamReport->update($data);
        return ApiResponse::success(new FinalExamReportResource($data), "FinalExamReport updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinalExamReport $finalExamReport)
    {
        $finalExamReport->delete();
        return ApiResponse::success($finalExamReport, "FinalExamReport deleted successfully");
    }
}
