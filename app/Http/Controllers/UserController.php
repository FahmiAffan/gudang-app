<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $data = Users::all();
            return response()->json(
                [
                    "message" =>  "Berhasil Get Data",
                    "data" => $data
                ]
            );
        } catch (Exception $e) {
            return response()->json([
                "message" =>  "Error Get Data",
                "errorMessage" => $e,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {

            $hashingPass = Hash::make($request->input("password"));
            $data = Users::create([
                'nama' => $request->input("nama"),
                'email' => $request->input("email"),
                'password' => $hashingPass
            ]);
            return response()->json(
                [
                    "message" =>  "Berhasil Post Data",
                    "data" => $data
                ]
            );
        } catch (Exception $e) {
            return response()->json([
                "message" =>  "Error Post Data",
                "errorMessage" => $e,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // $data = Users
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {

            $data = Users::find($id)->update([
                "name" => $request->input("name"),
                "email" => $request->input("email")
            ]);

            return response()->json(
                [
                    "message" =>  "Berhasil Put Data",
                    "data" => $data
                ]
            );
        } catch (Exception $e) {
            return response()->json(
                [
                    "message" =>  "Error Put Data",
                    "data" => $e
                ]
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            Users::find($id)->delete();
            return response()->json(
                [
                    "message" =>  "Berhasil Delete Data",
                ]
            );
        } catch (Exception $e) {
            return response()->json(
                [
                    "message" =>  "Error Delete Data",
                    "data" => $e
                ]
            );
        }
    }
}
