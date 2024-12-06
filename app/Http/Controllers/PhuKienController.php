<?php

namespace App\Http\Controllers;

use App\Models\PhuKien;
use Illuminate\Http\Request;

class PhuKienController extends Controller
{
    public function getData()
    {
        $dulieu   = PhuKien::select('phu_kiens.*')
                         ->get();

        return response()->json([
            'data'  =>  $dulieu
        ]);
    }
    public function sanPhamChiTiet($id)
    {
        $phukien = PhuKien::where('id', $id)->first();

        if($phukien) {
            return response()->json([
                'status' => true,
                'data' => $phukien
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Không có sản phẩm!"
            ]);
        }
    }
}
