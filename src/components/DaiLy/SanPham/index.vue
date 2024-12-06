<template >
   <div class="row">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        Danh Sách Phòng
                    </div>
                    <div class="col text-end">
                        <button class="btn btn-danger  " data-bs-toggle="modal" data-bs-target="#themmoisanpham">thêm mới</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Danh Mục</th>
                            <th>Hình Ảnh</th>
                            <th>Mô Tả </th>
                            <th>Số Lượng Nhập</th>
                            <th>Giá Bán</th>
                            <th>Giá Khuyến Mãi</th>
                            <th>Tình Trạng</th>
                            <th>AcTion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-for="(v, k) in list_Loai_Phong">
                            <tr>

                                <th>{{ k + 1 }}</th>
                                <th>{{ v.ten_loai_phong }}</th>
                                <th>{{ v.ten_loai_phong }}</th>
                                <th>{{ v.ten_loai_phong }}</th>
                                <th>{{ v.ten_loai_phong }}</th>
                                <th>{{ v.slug_loai_phong }}</th>
                                <th>{{ v.don_gia }}</th>
                                <th>{{ v.loai_phong }}</th>
                                <th>{{ v.so_nguoi }}</th>
                                <th>
                                    <button v-if="v.tinh_trang == 1" class="btn btn-info "> Hoạt Động</button>
                                    <button v-else class="btn btn-primary "> Không Hoạt Động</button>
                                </th>
                                <td class="align-middle text-nowrap text-center d-flex justify-content-around">
                                    <button @:click="Object.assign(update_loai_phong, v)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updatephong">Cập
                                        Nhật</button>
                                    <button class="btn btn-danger">Xóa</button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                    <div class="modal fade" id="updatephong" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg " style="background: white;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1>THÊM MỚI</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mt-2">
                                                <label>Tên Loại Phòng</label>
                                                <input  v-on:change="checkSlugUpdate()" v-on:keyup="createSlugUpdate()" v-model="update_loai_phong.ten_loai_phong" type="text"
                                                    class="form-control">
                                            </div>
                                            <div class="mt-2">
                                                <label>Đơn GIÁ</label>
                                                <input v-model="update_loai_phong.don_gia" type="text" class="form-control">
                                            </div>
                                            <div class="mt-2">
                                                <label>Số Người</label>
                                                <input v-model="update_loai_phong.so_nguoi" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-2">
                                                <label>Slug Loại Phòng</label>
                                                <input v-on:change="checkSlugUpdate()" v-model="update_loai_phong.slug_loai_phong" type="text"
                                                    class="form-control">
                                            </div>
                                            <div class="mt-2">
                                                <label>Loại giường</label>
                                                <input v-model="update_loai_phong.loai_phong" type="text"
                                                    class="form-control">
                                            </div>
                                            <div class="mt-2">
                                                <label>Tình Trạng</label>
                                                <select class="form-control"
                                                    v-model="update_loai_phong.tinh_trang">
                                                        <option value="1">Hiển Thị</option>
                                                        <option value="0">Tạm Tắt</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button @:click="updatePhong()" type="button" data-bs-dismiss="modal"
                                        class="btn btn-info">Xác Nhận</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="themmoisanpham" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg " style="background: white;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1>THÊM MỚI</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mt-2">
                                                <label>Tên Loại Phòng</label>
                                                <input  v-on:change="checkSlugUpdate()" v-on:keyup="createSlug()" v-model="create_loai_phong.ten_loai_phong" type="text"
                                                    class="form-control">
                                            </div>
                                            <div class="mt-2">
                                                <label>Đơn GIÁ</label>
                                                <input v-model="create_loai_phong.don_gia" type="text" class="form-control">
                                            </div>
                                            <div class="mt-2">
                                                <label>Số Người</label>
                                                <input v-model="create_loai_phong.so_nguoi" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-2">
                                                <label>Slug Loại Phòng</label>
                                                <input v-on:change="checkSlugUpdate()" v-model="create_loai_phong.slug_loai_phong" type="text"
                                                    class="form-control">
                                            </div>
                                            <div class="mt-2">
                                                <label>Loại giường</label>
                                                <input v-model="create_loai_phong.loai_phong" type="text"
                                                    class="form-control">
                                            </div>
                                            <div class="mt-2">
                                                <label>Tình Trạng</label>
                                                <select class="form-control"
                                                    v-model="create_loai_phong.tinh_trang">
                                                        <option value="1">Hiển Thị</option>
                                                        <option value="0">Tạm Tắt</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button @:click="createLoaiPhong()" type="button" data-bs-dismiss="modal"
                                        class="btn btn-info">Xác Nhận</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
export default {
   data() {
      return {
         list_san_pham :[],
      }
   },
   methods: {
      load_san_pham
   },
    
}
</script>
<style >
    
</style>