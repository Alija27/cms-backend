<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Utils\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request){

        $request->validate([
            "email"=>"required|email",
            "password"=>"required"
        ]);

        $user=User::where('email',$request->email)->with("roles")->first();
        
        if(!$user || !Hash::check($request->password,$user->password)){
            throw ValidationException::withMessages([
                "email"=>"The provided email is not correct.",
                "password"=>"The provided password is not correct",
            ]);
        }
        return response()->json([
            "token"=>$user->createToken(Str::random(10))->plainTextToken,
            "user"=>new UserResource($user),
        ]);
        
    }

    public function getuser(Request $request){
       return ApiResponse::success(new UserResource($request->user()->load('roles')));
    }

    public function register(Request $request){
        $user=$request->validate([
            "name"=>"required",
            "email"=>"required|email",
            "address"=>"required",
            "phonenumber"=>"required|min:10, max:10",
            "date_of_birth"=>"required",
        ]);
        $user["password"]=bcrypt($request->password);
     User::create($user);
     return response()->json(["message"=>"User registered sucessfully"]);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json(["message"=>"Logged out successfully"]);
    }
}
