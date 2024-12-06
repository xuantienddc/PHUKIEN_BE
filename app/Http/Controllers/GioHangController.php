<?php

namespace App\Http\Controllers;

use App\Models\GioHang;
use Illuminate\Http\Request;

class GioHangController extends Controller
{
    public function getData()
    {
        $dulieu   = GioHang::select('gio_hangs.*')
                         ->get();

        return response()->json([
            'data'  =>  $dulieu
        ]);
    }
}
