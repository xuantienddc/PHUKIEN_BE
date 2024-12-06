<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;
    protected $table = "gio_hangs";
    protected $fillable = [
        'ten_san_pham',
        'don_gia',
        'so_luong',
        'tong_tien',
        'tinh_trang'
    ];
}
