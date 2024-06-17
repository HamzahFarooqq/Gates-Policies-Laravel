<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    // use AuthorizesRequests, ValidatesRequests;


    public function register(Request $request)
    {
        
        $user = User::create($request->all());

       $token = $user->createToken($request->email)->plainTextToken;

       return response()->json([
        'user' => $user,
        'bearer_token' => $token, 
       ]);
    }





}
