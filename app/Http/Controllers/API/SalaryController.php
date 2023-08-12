<?php

namespace App\Http\Controllers\API;

use App\Models\Salary;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SalaryResource;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salaries=Salary::all();
        return response()->json(new SalaryResource($salaries));
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $data=Salary::create($data);
        return ApiResponse::success(new SalaryResource($data), "Salary created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        return ApiResponse::success($salary);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salary $salary)
    {
        $data=$request->all();
        $salary->update($data);
        return ApiResponse::success(new SalaryResource($data), "Salary updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        $salary->delete();
        return ApiResponse::success($salary, "Salary deleted successfully");
    }
}
