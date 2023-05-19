<?php

namespace App\Http\Controllers\API;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;

class SubjectCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects=Subject::all();
        return response()->json($subjects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubjectRequest $request)
    {
        $subject=$request->validated();
        Subject::create($subject);
        return response()->json(["message"=>"Subject created successfully"]);
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        return response()->json($subject);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubjectRequest $request, Subject $subject)
    {
        $data=$request->validated();
        $subject->update($data);
        return response()->json(["message"=>"Subject created successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return response()->json(["message"=>"Subject deleted successfully"]);
    }
}
