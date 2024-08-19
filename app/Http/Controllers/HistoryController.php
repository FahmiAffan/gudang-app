<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Users;
use Exception;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    //
    public function getHistoryByUser()
    {
        try {
            // $data = Users::whereHas('mutasi', function (Builder $query) {
            //     $query->where('id_user', 'id_user');
            // })->get();
            $data = Users::with(['mutasi'])->get();

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

    public function getHistoryByBarang()
    {
        try {
            // $data = Users::whereHas('mutasi', function (Builder $query) {
            //     $query->where('id_user', 'id_user');
            // })->get();
            $data = Barang::with(['mutasi'])->get();

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
}
