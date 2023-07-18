<?php

namespace App\Http\Controllers\API;

use App\Models\Department;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Http\Resources\DepartmentResource;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::all();
        return ApiResponse::success(DepartmentResource::collection($departments));
    }


    public function store(DepartmentRequest $request)
    {
        $data = $request->validated();
        $department = Department::create($data);
        return ApiResponse::success($department, "Department created successfully");
    }


    public function show(Department $department)
    {
        return ApiResponse::success(new DepartmentResource($department));
    }


    public function update(DepartmentRequest $request, Department $department)
    {
        $data = $request->validated();
        $department->update($data);
        return ApiResponse::success($department, "Department updated successfully");
    }


    public function destroy(Department $department)
    {
        $department->delete();
        return ApiResponse::success($department, "Department deleted successfully");
    }
}
