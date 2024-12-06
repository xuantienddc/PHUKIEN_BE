<template >
    <div class="row">
        <div class="card border-top border-0 border-4 border-primary shadow-lg p-3 mb-5 bg-body rounded">
            <div class="card-header">
                <h5>Danh Sách Danh Mục</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
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
                                    Password
                                </th>
                                <th class="text-center align-middle text-nowrap">
                                    Số Điện Thoại
                                </th>
                                <th class="text-center align-middle text-nowrap">
                                    Địa Chỉ
                                </th>
                                <th class="text-center align-middle text-nowrap">
                                    Tình Trạng
                                </th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(v, k) in list_nhan_vien">
                                <tr>
                                    <th class="align-middle text-nowrap text-center">{{ k + 1 }} </th>
                                    <td class="align-middle text-nowrap">{{ v.ho_va_ten }}</td>
                                    <td class="align-middle text-nowrap">{{ v.email }}</td>
                                    <td class="align-middle text-nowrap">{{ v.password }}</td>
                                    <td class="align-middle text-nowrap">{{ v.so_dien_thoai }}</td>

                                    <td class="align-middle text-nowrap">{{ v.dia_chi }}</td>
                                    <td class="align-middle text-nowrap text-center">
                                        <button v-on:click="changeTrangThai(v)" v-if="v.is_active == 1"
                                            class="btn btn-primary me-2">Đang Làm</button>
                                        <button v-on:click="changeTrangThai(v)" v-else class="btn btn-danger ">Thất
                                            Nghiệp</button>
                                    </td>
                                    <td>
                                        <button v-on:click='Object.assign(update_nhan_vien, v)'
                                            class="btn btn-danger text-end" data-bs-toggle="modal"
                                            data-bs-target="#updateModalNV"> Cập Nhật</button>
                                            
                                        <button v-on:click='Object.assign(delete_nhan_vien, v)'
                                            class="btn btn-danger text-end" data-bs-toggle="modal"
                                            data-bs-target="#deletemodal2"> xóa</button>
                                    </td>
                                </tr>
                            </template>
                            <div class="modal fade" id="deletemodal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
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
                                                                delete_nhan_vien.ho_va_ten }}</b> này không?
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button v-on:click="accpectDel1()" type="button" data-bs-dismiss="modal"
                                                class="btn btn-primary">xác nhận</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="updateModalNV" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật nhân viên
                                                này không</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mt-2">
                                                <label>Họ và tên</label>
                                                <input tabindex="1" v-model="update_nhan_vien.ho_va_ten" type="text"
                                                    class="form-control">
                                            </div>
                                            <div class="mt-2">
                                                <label>Email</label>
                                                <input tabindex="2" v-on:keyup="checkEmailNVUpdate()"
                                                    v-model="update_nhan_vien.email" type="email" class="form-control">
                                            </div>
                                            <div class="mt-2">
                                                <label>Password</label>
                                                <input tabindex="3" v-model="update_nhan_vien.password" type="text"
                                                    class="form-control">
                                            </div>
                                            <div class="mt-2">
                                                <label>Số Điện Thoại</label>
                                                <input tabindex="4" v-model="update_nhan_vien.so_dien_thoai" type="number"
                                                    class="form-control">
                                            </div>
                                            <div class="mt-2">
                                                <label>Địa chỉ</label>
                                                <input tabindex="5" v-model="update_nhan_vien.dia_chi" type="text"
                                                    class="form-control">
                                            </div>
                                            <div class="mt-2">
                                                <label>Tình Trạng</label>
                                                <select tabindex="6" v-model="update_nhan_vien.is_active"
                                                    class="form-control mt-1">
                                                    <option value="1">Hoạt động</option>
                                                    <option value="0">Không hoạt động</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button v-if="is_view_updateNV == 0" @:click="update_nhan_vien()" type="button"
                                                data-bs-dismiss="modal" class="btn btn-danger" disabled>Update</button>
                                            <button v-else @:click="accpectUpdate()" type="button" data-bs-dismiss="modal"
                                                class="btn btn-info">Update</button>
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
</template>
<script>
import 'toastr/build/toastr.css';
import toastr from 'toastr';
import axios from 'axios';
export default {
    data() {
        return {
            list_nhan_vien: [],
            create_nhan_vien: {
                'ho_va_ten': '',
                'email': '',
                'password': '',
                'so_dien_thoai': '',
                'dia_chi': '',
                'is_active': 0
            },
            delete_nhan_vien: {
                'ho_va_ten': '',
                'email': '',
                'password': '',
                'so_dien_thoai': '',
                'dia_chi': '',
                'is_active': 0
            },
            update_nhan_vien: {
                'ho_va_ten': '',
                'email': '',
                'password': '',
                'so_dien_thoai': '',
                'dia_chi': '',
                'is_active': 0
            },
            is_tes: 0,
        }
    },
    mounted() {
        this.LoadData();
    },
    methods: {
        LoadData() {
            axios
                .get('http://127.0.0.1:8000/api/admin/nhan-vien1/data')
                .then((res) => {
                    this.list_nhan_vien = res.data.data;
                });
        },
        loadcreate1() {
            axios
                .post('http://127.0.0.1:8000/api/admin/nhan-vien1/create', this.create_nhan_vien)
                .then((res) => {
                    if (res.data.status) {
                        toastr.success(res.data.status, "Thông Báo")
                        this.LoadData();
                    }
                });
        },
        createemail() {
            this.create_nhan_vien.email = this.toSlug(this.create_san_pham.email)
            this.checkmail()
        },
        checkmail() {
            axios
                .post('http://127.0.0.1:8000/apiadmin/nhan-vien1/check-slug', this.create_nhan_vien)
                .then((res) => {
                    if (res.data.status == 1) {
                        this.is_tes = 0;
                        toastr.error("Slug này đã tồn tại", "Thông Báo");
                    } else {
                        this.is_tes = 1;
                        toastr.success("Slug này có thể sử dụng", "Thông Báo");
                    }
                });

        },
        accpectDel1() {
            axios
                .delete('http://127.0.0.1:8000/api/admin/nhan-vien1/delete/' + this.delete_nhan_vien.id)
                .then((res) => {
                    if (res.data.status) {
                        toastr.success(res.data.message, "Thông báo");
                        this.LoadData();
                    } else {
                        toastr.error(); (res.data.message, "Thông báo");
                    }
                });

        },
        accpectUpdate() {
            axios
                .put('http://127.0.0.1:8000/api/nhan-vien1/update', this.update_nhan_vien)
                .then((res) => {
                    if (res.data.status) {
                        toastr.success(res.data.message, 'Thông báo');
                        this.LoadData();
                    } else {
                        toastr.error(res.data.message, 'Thông báo');
                    }
                });
        },

        changeTrangThai(value) {
            axios
                .put('http://127.0.0.1:8000/api/nhan-vien/change-status', value)
                .then((res) => {
                    if (res.data.status) {
                        toastr.success(res.data.message, 'Thông báo');
                        this.LoadData();
                    } else {
                        toastr.error(res.data.message, 'Thông báo');
                    }

                });
        },
    },
}
</script>
<style ></style>