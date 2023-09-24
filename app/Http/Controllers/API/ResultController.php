<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResultRequest;
use App\Http\Resources\ResultResource;
use App\Models\Result;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public    function index(Request $request)
    {
        $results = Result::all();
        return ApiResponse::success(ResultResource::collection($results));
    }

    public function store(ResultRequest $request)
    {
        $result = $request->validated();
        $result = Result::create($result);
        return ApiResponse::success(new ResultResource($result), "Result created successfully");
    }

    public function show(Result $result)
    {
        $result->load(["exam", "student"]);
        return ApiResponse::success(new ResultResource($result));
    }

    public function update(ResultRequest $request, Result $result)
    {
        $data = $request->validated();
        $result->update($data);
        return ApiResponse::success(new ResultResource($result), "Result updated successfully");
    }

    public function destroy(Result $result)
    {
        $result->delete();
        return ApiResponse::success($result, "Result deleted successfully");
    }

    
}
