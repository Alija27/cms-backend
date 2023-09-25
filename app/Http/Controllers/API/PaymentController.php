<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\ApiResponse;
use App\Http\Requests\PaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Models\Account;
use App\Models\Payment;


class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('user',  'account')->get();
        return ApiResponse::success(PaymentResource::collection($payments));
    }

    public function store(PaymentRequest $request)
    {
        $payment = Payment::create($request->validated());

        Account::find($request->account_id)->increment('paid_fees', $request->amount);

        return ApiResponse::success(new PaymentResource($payment), "Payment created successfully");
    }

    public function show(Payment $payment)
    {
        return ApiResponse::success(new PaymentResource($payment));
    }

    public function update(PaymentRequest $request, Payment $payment)
    {
        $payment->update($request->validated());
        return ApiResponse::success(new PaymentResource($payment), "Payment updated successfully");
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return ApiResponse::success(null, "Payment deleted successfully");
    }
}
