<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function getData()
    {
        $dulieu   = DanhMuc::select('danh_mucs.*')
                         ->get();

        return response()->json([
            'data'  =>  $dulieu
        ]);
    }
    public function destroy($id)
    {
        $data   =   DanhMuc::where('id', $id)->first();
        if($data) {
            $data->delete();
            return response()->json([
                'status'    =>   true,
                'message'   =>   'Đã xóa danh mục thành công!'
            ]);
        } else {
            return response()->json([
                'status'    =>   false,
                'message'   =>   'Không tìm được danh mục để xóa!'
            ]);
        }
    }
}
