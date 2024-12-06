<?php

namespace App\Http\Controllers;

use App\Models\NhapKho;
use Illuminate\Http\Request;

class NhapKhoController extends Controller
{
    public function getData()
    {
        $dulieu   = NhapKho::select('nhap_khos.*')
                         ->get();

        return response()->json([
            'data'  =>  $dulieu
        ]);
    }
}
