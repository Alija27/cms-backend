<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccountResource;
use App\Http\Requests\AccountRequest;
use App\Models\Account;
use App\Utils\ApiResponse;

use Illuminate\Http\Request;

class AccountController extends Controller
{
     public function index(Request $request)
    {
        if(!empty($request->user_id)){
            $accounts=Account::where("user_id",$request->user_id);
        }
        else{
        $accounts = Account::query();
        }
        return ApiResponse::success(AccountResource::collection($accounts->get()));
    }

    public function store(AccountRequest $request)
    {
        $account = $request->validated();
        $account=Account::create($account);
        return ApiResponse::success( new AccountResource($account), "Account created successfully");
    }

    public function show(Account $account)
    {
        return ApiResponse::success(new AccountResource($account));
    }

    public function update(AccountRequest $request, Account $account)
    {
        $data = $request->validated();
        $account->update($data);
        return ApiResponse::success( new AccountResource($account), "Account updated successfully");
    }

    public function destroy(Account $account)
    {
        $account->delete();
        return ApiResponse::success($account, "Account deleted successfully");
    }

}
