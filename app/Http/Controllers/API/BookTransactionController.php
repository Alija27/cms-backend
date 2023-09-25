<?php

namespace App\Http\Controllers\API;

use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use App\Models\BookTransaction;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookTransactionRequest;
use App\Http\Resources\BookTransactionResource;
use Illuminate\Support\Carbon;

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
        $transaction["issue_date"] = Carbon::now();
        $transaction['issued'] = "issued";
        $transaction = BookTransaction::create($transaction);
        return ApiResponse::success(new BookTransactionResource($transaction), "BookTransaction created successfully");
    }


    public function show(BookTransaction $bookTransaction)
    {
        return ApiResponse::success(new BookTransactionResource($bookTransaction));
    }


    public function update(BookTransactionRequest $request, BookTransaction $bookTransaction)
    {
        $data = $request->validated();
        $bookTransaction->update($data);
        return ApiResponse::success(
            new BookTransactionResource($bookTransaction),
            "BookTransation updated succeessfully"
        );
    }

    public function destroy(BookTransaction $bookTransaction)
    {
        $bookTransaction->delete();
        return ApiResponse::success($bookTransaction, "BookTransaction deleted successfully");
    }

    public function updateStatus(Request $request, BookTransaction $bookTransaction)
    {
        $data = $request->validate([
            "status" => "required|in:issued,returned",
            "return_date" => "nullable",
        ]);
      
         if($data['status'] == 'returned'){
                $data['return_date'] = Carbon::now();
            }
            else{
                $data['return_date'] = null;
            }

        $bookTransaction->update($data);
        return ApiResponse::success(
            new BookTransactionResource($bookTransaction),
            "Status updated succeessfully"
        );
    }

    
}
