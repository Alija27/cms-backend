<?php

namespace App\Http\Controllers\API;

use App\Models\Batch;
use Illuminate\Http\Request;
use App\Http\Requests\BatchRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\BatchResource;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batches=Batch::all();
        return response()->json($batches);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BatchRequest $request)
    {
        $batch=$request->validated();
        Batch::create($batch);
        return response()->json(["message"=>"Batch created succesfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BatchResource $batch)
    {
        return response()->json($batch);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BatchRequest $request, Batch $batch)
    {
        $data=$request->validated();
        $batch->update($data);
        return response()->json(["message"=>"Batch updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Batch $batch)
    {
        $batch->delete();
        return response()->json(["message"=>"Batch deleted successfully"]);
    }
}
