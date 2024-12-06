<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QLKhachHang extends Model
{
    use HasFactory;
    protected $table = "q_l_khach_hangs";
    protected $fillable = [
        'email',
        'password',
        'ho_va_ten',
        'so_dien_thoai',
        'dia_chi',
        'tinh_trang',
    ];
}
