<?php

namespace App\Http\Controllers\API;

use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use App\Models\BookTransaction;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookTransactionRequest;
use App\Http\Resources\BookTransactionResource;

class BookTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookTransaction = BookTransaction::All();
        return ApiResponse::success(BookTransaction::collection($bookTransaction));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookTransactionRequest $request)
    {
        $transaction = $request->validated();
        BookTransaction::create($transaction);
        return ApiResponse::success(null, "BookTransaction created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(BookTransaction $bookTransaction)
    {
        return ApiResponse::success(new BookTransactionResource($bookTransaction));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookTransaction $bookTransaction)
    {
        $data = $request->validated();
        $bookTransaction->update($data);
        return ApiResponse::success(null, "BookTransation updated succeessfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookTransaction $bookTransaction)
    {
        $bookTransaction->delete();
        return ApiResponse::success(null,"BookTransaction deleted successfully");
    }
}
