<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psr\Http\Message\RequestInterface;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (Auth::guard('user')->attempt($credentials)) {
                $token = $request->user('user')->createToken('gudang');
                return response()->json(
                    [
                        "message" =>  "Berhasil login",
                        "token" => $token->plainTextToken
                    ]
                );
            }
        } catch (Exception $e) {
            return response()->json([
                "message" =>  "Error Get Data",
                "errorMessage" => $e,
            ]);
        }
    }

    public function checkUser(Request $request)
    {
        try {
            return response()->json([
                "message" =>  "Success Post Data",
                "data" => $request->user(),
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" =>  "Success Post Data",
                "errorMessage" => $e
            ]);
        }
    }
    public function logout(Request $request)
    {
        try {
            $request->user()->tokens()->delete();

            return response()->json(
                [
                    "message" =>  "Berhasil logout",
                ]
            );
        } catch (Exception $e) {
            return response()->json([
                "message" =>  "Error Logout",
                "errorMessage" => $e,
            ]);
        }
    }
}
