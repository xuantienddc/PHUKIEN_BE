<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $table = "gio_hangs";
    protected $fillable = [
        'cho_xac_nhan',
        'cho_lay_hang',
        'cho_giao_hang',
        'da_giao',
        'da_huy',
        'tra_hang'
    ];
}
