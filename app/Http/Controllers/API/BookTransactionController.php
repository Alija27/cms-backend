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

    public function index()
    {
        $bookTransaction = BookTransaction::all();
        return ApiResponse::success(BookTransactionResource::collection($bookTransaction));
    }


    public function store(BookTransactionRequest $request)
    {
        $transaction = $request->validated();
        BookTransaction::create($transaction);
        return ApiResponse::success(null, "BookTransaction created successfully");
    }


    public function show(BookTransaction $bookTransaction)
    {
        return ApiResponse::success(new BookTransactionResource($bookTransaction));
    }


    public function update(BookTransactionRequest $request, BookTransaction $bookTransaction)
    {
        $data = $request->validated();
        $bookTransaction->update($data);
        return ApiResponse::success(null, "BookTransation updated succeessfully");
    }


    public function destroy(BookTransaction $bookTransaction)
    {
        $bookTransaction->delete();
        return ApiResponse::success(null, "BookTransaction deleted successfully");
    }
}
