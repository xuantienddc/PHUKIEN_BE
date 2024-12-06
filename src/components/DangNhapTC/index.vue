<template>
    <div class="row">
        <div class="col">
            <div class="card border-top border-0 border-4 border-primary shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h5>Đã Đăng Nhập</h5>
                </div>
                <div class="card-body">
                    <div >
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle text-nowrap">
                                        #
                                    </th>
                                    <th class="text-center align-middle text-nowrap">
                                        Họ Và Tên
                                    </th>
                                    <th class="text-center align-middle text-nowrap">
                                        Email
                                    </th>
                                    <th class="text-center align-middle text-nowrap">
                                        Số Điện Thoại
                                    </th>
                                    <th class="text-center align-middle text-nowrap">
                                        Ngày Sinh
                                    </th>
                                    <th class="text-center align-middle text-nowrap">
                                        Mật khẩu
                                    </th>
                                    <th class="text-center align-middle text-nowrap">
                                        Tên doanh nghiệp
                                    </th>
                                    <th class="text-center align-middle text-nowrap">
                                        Mã số thuế
                                    </th>
                                    <th class="text-center align-middle text-nowrap">
                                        Địa chỉ kinh doanh
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <template v-for="(v, k) in list_dang_ky">
                                    <tr>
                                        <th class="align-middle text-nowrap text-center">{{ k + 1 }}</th>
                                        <td class="align-middle text-nowrap">{{ v.ho_va_ten }}</td>
                                        <td class="align-middle text-nowrap">{{ v.email }}</td>
                                        <td class="align-middle text-nowrap">{{ v.so_dien_thoai }}</td>
                                        <td class="align-middle text-nowrap">{{ v.ngay_sinh }}</td>
                                        <td class="align-middle text-nowrap">{{ v.password }}</td>
                                        <td class="align-middle text-nowrap">{{ v.ten_doanh_nghiep }}</td>
                                        <td class="align-middle text-nowrap">{{ v.ma_so_thue }}</td>
                                        <td class="align-middle text-nowrap">{{ v.dia_chi_kinh_doanh }}</td>
                                        <td class="align-middle text-nowrap text-center d-flex justify-content-around">
                                            <button @:click="Object.assign(update_dang_ky, v); is_view_update = 1"
                                                class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#updateModal">Cập Nhật</button>
                                            <button @:click='Object.assign(delete_dang_ky, v)' class="btn btn-danger"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal1">Xóa</button>
                                        </td>
                                    </tr>
                                </template>
                                <!-- deleteModal -->
                                <div class="modal fade" id="deleteModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Xác nhận xóa Tài Khoản
                                                    này không</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div
                                                    class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                                                    <div class="d-flex align-items-center">
                                                        <div class="font-35 text-dark"><i class="bx bx-info-circle"></i>
                                                        </div>
                                                        <div class="ms-3">
                                                            <h6 class="mb-0 text-dark">Danger Alerts</h6>
                                                            <div class="text-dark">
                                                                Bạn có chắc chắn muốn xóa danh mục <b>{{
                                                                    delete_dang_ky.ho_va_ten }}</b> này
                                                                không?
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button @:click="accpectDel()" type="button" data-bs-dismiss="modal"
                                                    class="btn btn-danger">Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật Tài Khoản
                                                    này không</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mt-2">
                                                    <label>Họ Và Tên</label>
                                                    <input v-model="update_dang_ky.ho_va_ten" tabindex="1" type="text"
                                                        class="form-control mt-1">
                                                </div>
                                                <div class="mt-2">
                                                    <label>Email</label>
                                                    <input v-model="update_dang_ky.email" tabindex="1" type="text"
                                                        class="form-control mt-1">
                                                </div>
                                                <div class="mt-2">
                                                    <label>Số Điện Thoại</label>
                                                    <input v-model="update_dang_ky.so_dien_thoai" tabindex="1" type="text"
                                                        class="form-control mt-1">
                                                </div>
                                                <div class="mt-2">
                                                    <label>Ngày Sinh</label>
                                                    <input v-model="update_dang_ky.t" tabindex="1" type="date"
                                                        class="form-control mt-1">
                                                </div>
                                                <div class="mt-2">
                                                    <label>Mật Khẩu</label>
                                                    <input v-model="update_dang_ky.password" tabindex="1" type="password"
                                                        class="form-control mt-1">
                                                </div>
                                                <div class="mt-2">
                                                    <label>Tên Doanh Nghiệp</label>
                                                    <input v-model="update_dang_ky.ten_doanh_nghiep" tabindex="1" type="text"
                                                        class="form-control mt-1">
                                                </div>
                                                <div class="mt-2">
                                                    <label>Mã Số Thuế</label>
                                                    <input v-model="update_dang_ky.ma_so_thue" tabindex="1" type="text"
                                                        class="form-control mt-1">
                                                </div>
                                                <div class="mt-2">
                                                    <label>Địa Chỉ Kinh Doanh</label>
                                                    <input v-model="update_dang_ky.dia_chi_kinh_doanh" tabindex="1" type="text"
                                                        class="form-control mt-1">
                                                </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button v-if="is_view_update == 0" @:click="update_danh_muc()" type="button"
                                                    data-bs-dismiss="modal" class="btn btn-danger" disabled>Update</button>
                                                <button v-else @:click="accpectUpdate()" type="button"
                                                    data-bs-dismiss="modal" class="btn btn-info">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import 'toastr/build/toastr.css';
import toastr from 'toastr';

export default {
    data() {
        return {
            list_dang_ky: [],
            create_dang_ky: {
                'ho_va_ten': '',
                'email': '',
                'so_dien_thoai': '',
                'ngay_sinh': '',
                'password': '',
                'ten_doanh_nghiep': '',
                'ma_so_thue': '',
                'dia_chi_kinh_doanh': '',
            },
            delete_dang_ky: {
                'ho_va_ten': '',
                'email': '',
                'so_dien_thoai': '',
                'ngay_sinh': '',
                'password': '',
                'ten_doanh_nghiep': '',
                'ma_so_thue': '',
                'dia_chi_kinh_doanh': '',
            },
            update_dang_ky:{
                'ho_va_ten': '',
                'email': '',
                'so_dien_thoai': '',
                'ngay_sinh': '',
                'password': '',
                'ten_doanh_nghiep': '',
                'ma_so_thue': '',
                'dia_chi_kinh_doanh': '',

            },
        }
    },
    mounted() {
        this.Loaddangky();

    },
    methods: {
        Loaddangky() {
            axios
                .get('http://127.0.0.1:8000/api/admin/tai-khoan/data')
                .then((res) => {
                    this.list_dang_ky = res.data.data;
                });
        },
        accpectDel() {
            axios
                .delete('http://127.0.0.1:8000/api/admin/tai-khoan/delete/' + this.delete_dang_ky.id)
                .then((res) => {
                    if (res.data.status) {
                        toastr.success(res.data.message, 'Thông báo');
                        this.Loaddangky();
                    } else {
                        toastr.error(res.data.message, 'Thông báo');
                    }
                });
        },
        accpectUpdate() {
            axios
                .put('http://127.0.0.1:8000/api/admin/tai-khoan/update', this.update_dang_ky)
                .then((res) => {
                    if (res.data.status) {
                        toastr.success(res.data.message, 'Thông báo');
                        this.Loaddangky();
                    } else {
                        toastr.error(res.data.message, 'Thông báo');
                    }
                });
        },




    },

}









</script>


<style></style>