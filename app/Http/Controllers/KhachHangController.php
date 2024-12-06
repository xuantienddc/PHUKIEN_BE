<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function getData()
    {
        $dulieu   = KhachHang::select('khach_hangs.*')
                         ->get();

        return response()->json([
            'data'  =>  $dulieu
        ]);
    }
}
