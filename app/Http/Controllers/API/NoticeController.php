<?php

namespace App\Http\Controllers\API;

use App\Models\Notice;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NoticeResource;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notices = Notice::all();
        return response()->json(new NoticeResource($notices));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data = Notice::create($data);
        return ApiResponse::success(new NoticeResource($data), "Notice created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Notice $notice)
    {
        return ApiResponse::success(new NoticeResource($notice));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notice $notice)
    {
        $data = $request->all();
        $notice->update($data);
        return ApiResponse::success(new NoticeResource($data), "Notice updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        $notice->delete();
        return ApiResponse::success($notice, "Notice deleted successfully");
    }
}
