<?php

namespace App\Http\Controllers\API;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Http\Resources\DepartmentResource;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments=Department::all();
        return response()->json($departments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $department=$request->validated();
        Department::create($department);
        return response()->json(["message"=>"Department created sucessfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return response()->json(new DepartmentResource($department));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        $data=$request->validated();
        $department->update($data);
        return response()->json(["message"=>"Department updated sucessfully"]);
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return response()->json(["message"=>"Department deleted sucessfully"]);
    }
}
