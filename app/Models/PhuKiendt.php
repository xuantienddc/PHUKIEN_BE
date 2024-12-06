<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhuKiendt extends Model
{
    use HasFactory;
    protected $table = "phu_kiendts";

    protected $fillable = [
        'ten_san_pham',
        'slug_san_pham',
        'so_luong',
        'hinh_anh',
        'tinh_trang',
        'mo_ta_ngan',
        'mo_ta_chi_tiet',
        'gia_ban',
        'gia_khuyen_mai',

    ];
}
