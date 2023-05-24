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
        $department = $request->validated();
        Department::create($department);
        return ApiResponse::success(null, "Department created successfully");
    }


    public function show(Department $department)
    {
        return ApiResponse::success(new DepartmentResource($department));
    }


    public function update(DepartmentRequest $request, Department $department)
    {
        $data = $request->validated();
        $department->update($data);
        return ApiResponse::success(null, "Department updated successfully");
    }


    public function destroy(Department $department)
    {
        $department->delete();
        return ApiResponse::success(null, "Department deleted successfully");
    }
}
