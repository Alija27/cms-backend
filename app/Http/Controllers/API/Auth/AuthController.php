<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request){

        $request->validate([
            "email"=>"required|email",
            "password"=>"required"
        ]);
        
        $user=User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            throw ValidationException::withMessages([
                "email"=>"The provided email is not correct.",
                "password"=>"The provided password is not correct",
            ]);
        }
        return response()->json([
            "token"=>$user->createToken(Str::random(10))->plainTextToken,
            "user"=>$user,
        ]);
        
    }
}
