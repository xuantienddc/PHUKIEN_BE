<?php

namespace App\Http\Controllers;

use App\Models\SaLe;
use Illuminate\Http\Request;

class SaLeController extends Controller
{
    public function getData()
    {
        $dulieu   = SaLe::select('sa_les.*')
                         ->get();

        return response()->json([
            'data'  =>  $dulieu
        ]);
    }
}
