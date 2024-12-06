<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    protected $table = "danh_mucs";

    protected $fillable = [
        'ten_san_pham',
        'hinh_anh',
        'mo_ta',
        'so_luong_nhap',
        'gia_ban',
        'gia_khuyen_mai',
        'tinh_trang'
    ];
}
