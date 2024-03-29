<?php

namespace App\Http\Controllers\API;

use App\Models\Batch;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BatchRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\BatchResource;

class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::all();
        return ApiResponse::success(BatchResource::collection($batches));
    }

   
    public function store(BatchRequest $request)
    {
        $batch = $request->validated();
        $batch=Batch::create($batch);
        return ApiResponse::success($batch, "Batch created successfully");
    }

    
    public function show(Batch $batch)
    {
        return ApiResponse::success(new BatchResource($batch));
    }

    
    public function update(BatchRequest $request, Batch $batch)
    {
        $data = $request->validated();
        $batch->update($data);
        return ApiResponse::success($batch, "Batch updated successfully");
    }

    
    public function destroy(Batch $batch)
    {
        $batch->delete();
        return ApiResponse::success($batch, "Batch deleted successfully");
    }
}
