<?php

namespace App\Http\Controllers;

use App\Models\KhuyenMai;
use Illuminate\Http\Request;

class KhuyenMaiController extends Controller
{
    public function getData()
    {
        $dulieu   = KhuyenMai::select('khuyen_mais.*')
                         ->get();

        return response()->json([
            'data'  =>  $dulieu
        ]);
    }
}
