<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use DOTNET;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function getData()
    {
        $dulieu   = DonHang::select('don_hangs.*')
                         ->get();

        return response()->json([
            'data'  =>  $dulieu
        ]);
    }
}
