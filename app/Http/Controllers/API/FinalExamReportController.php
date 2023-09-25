<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Utils\ApiResponse;
use Spatie\FlareClient\Api;
use Illuminate\Http\Request;
use App\Models\FinalExamReport;
use App\Http\Controllers\Controller;
use App\Http\Requests\FinalExamReportRequest;
use App\Http\Resources\FinalExamReportResource;
use App\Jobs\UpdateFeeForTopStudent;

class FinalExamReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data=FinalExamReport::query();
        if($request->course_id){
            $data=$data->where("course_id",$request->course_id);
        }
        if($request->semester_id){
            $data=$data->where("semester_id",$request->semester_id);
        }
        if($request->batch_id){
            $data=$data->where("batch_id",$request->batch_id);
        }

        return ApiResponse::success(FinalExamReportResource::collection($data->get()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FinalExamReportRequest $request)
    {

        $data=$request->validated();
        $data["date"]=Carbon::now();
        $data=FinalExamReport::create($data);

        if($request->position == 1 || $request->position == 2 || $request->position == 3){
            dispatch(new UpdateFeeForTopStudent($data->student_id, $request->position));
        }

        return ApiResponse::success(new FinalExamReportResource($data), "FinalExamReport created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(FinalExamReport $finalExamReport)
    {
         
        return response()->json(new FinalExamReportResource($finalExamReport));
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



