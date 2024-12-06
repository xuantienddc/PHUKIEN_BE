<?php

use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\KhuyenMaiController;
use App\Http\Controllers\NhapKhoController;
use App\Http\Controllers\PhuKienController;
use App\Http\Controllers\PhuKiendtController;
use App\Http\Controllers\QLKhachHangController;
use App\Http\Controllers\SaLeController;
use App\Models\DonHang;
use App\Models\PhuKien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/phu-kien/data', [PhuKienController::class, 'getData']);
Route::get('/san-pham/{id}', [PhuKienController::class, 'sanPhamChiTiet']);

Route::get('/danh-muc/data', [DanhMucController::class, 'getData']);
Route::delete('/danh-muc/delete/{id}', [DanhMucController::class, 'destroy']);

Route::get('/sale/data', [SaLeController::class, 'getData']);


Route::get('/gio-hang/data', [GioHangController::class, 'getData']);

Route::get('/don-hang-moi/data', [DonHangController::class, 'getData']);



Route::get('/ma-khuyen-mai/data', [KhuyenMaiController::class, 'getDphpata']);


Route::get('/nhap-kho/data', [NhapKhoController::class, 'getData']);


Route::get('/Khach-hang/data', [QLKhachHangController::class, 'getData']);

















