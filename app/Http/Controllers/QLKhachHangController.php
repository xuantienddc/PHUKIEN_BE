<?php

namespace App\Http\Controllers;

use App\Models\QLKhachHang;
use Illuminate\Http\Request;

class QLKhachHangController extends Controller
{
    public function getData()
    {
        $dulieu   = QLKhachHang::select('q_l_khach_hangs.*')
                         ->get();

        return response()->json([
            'data'  =>  $dulieu
        ]);
    }
}
