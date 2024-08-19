<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Exception;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        //
        try {
            $data = Barang::all();
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
            $data = Barang::create($request->all());
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
        // $data = Barang
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

            $data = Barang::find($id)->update([
                "nama_barang" => $request->input("nama_barang"),
                "kode" => $request->input("kode"),
                "kategori" => $request->input("kategori"),
                "lokasi" => $request->input("lokasi"),
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
            Barang::find($id)->delete();
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
