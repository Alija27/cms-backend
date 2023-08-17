<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Http\Resources\UserResource;

class UserController extends Controller
{

    public function index(Request $request)
    {
        if(!empty($request->role)){
            $users = User::whereHas("roles",function($query) use ($request){
                $query->where("name",$request->role);
            })->get();
        } else {
            $users = User::all();
        }
        return ApiResponse::success(UserResource::collection($users));
    }


    public function store(Request $request)
    {
        $user = $request->validate([
            "user_name" => ["required"],
            "email" => ["required"],
            "address" => ["required"],
            "phonenumber" => ["required"],
            "date_of_birth" => ["required"],
            "guardian_name" => ["required"],
            "guardian_phonenumber" => ["required"],
            "gender" => ["required"],
            
        ]);
        $user["password"] = bcrypt($request->password);
        User::create($user);
        return ApiResponse::success($user, "User created successfully");
    }


    public function show(User $user)
    {
        return ApiResponse::success($user);
    }


    public function update(Request $request, User $user)
    {
        //
    }


    public function destroy(User $user)
    {
         $user->delete();
         return ApiResponse::success($user,"User deleted successfully");
    }

}
