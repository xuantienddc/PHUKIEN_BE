<?php

namespace App\Http\Controllers;

use App\Models\PhuKiendt;
use Illuminate\Http\Request;

class PhuKiendtController extends Controller
{
    public function getData()
    {
        $dulieu   = PhuKiendt::select('phu_kiendts.*')
                         ->get();

        return response()->json([
            'data'  =>  $dulieu
        ]);
    }
}
