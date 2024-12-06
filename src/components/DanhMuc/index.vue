<template>
    <div class="row">
        <div class="col-lg-4">
            <div class="card border-top border-0 border-4 border-primary shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h5>Thêm Mới Danh Mục</h5>
                </div>
                <div class="card-body">
                    <div class="mt-2">
                        <label>Tên Danh Mục</label>
                        <input tabindex="1" v-on:change="checkSlug()" v-on:keyup="createSlug()"
                            v-model="create_danh_muc.ten_danh_muc" type="text" class="form-control mt-1">
                    </div>
                    <div class="mt-2">
                        <label>Slug Danh Mục</label>
                        <input v-on:change="checkSlug()" v-model="create_danh_muc.slug_danh_muc" type="text"
                            class="form-control mt-1">
                    </div>
                    <div class="mt-2">
                        <label>Tình Trạng</label>
                        <select tabindex="2" v-model="create_danh_muc.tinh_trang" class="form-control mt-1">
                            <option value="1">Hiển Thị</option>
                            <option value="0">Tạm Tắt</option>
                        </select>
                    </div>
                    <div class="mt-2">
                        <label>Hình Ảnh Danh Mục</label>
                        <input v-model="create_danh_muc.hinh_anh" type="text" class="form-control mt-1">
                    </div>
                    <div class="mt-2">
                        <label>Danh Mục Cha</label>
                        <select tabindex="3" v-model="create_danh_muc.id_danh_muc_cha" class="form-control mt-1">
                            <option value="0">Danh Mục gỐC</option>
                            <template v-for="(v, k) in list_danh_muc">
                                <option v-if="v.id_danh_muc_cha == 0" v-bind:value="v.id">{{ v.ten_danh_muc }}</option>
                            </template>
                        </select>
                    </div>

                </div>
                <div class=" text-end">
                    <button v-if="is_view == 1" @:click="createDanhMuc()" class="btn btn-primary">Thêm Mới</button>
                    <button v-else class="btn btn-danger" disabled>Thêm Mới</button>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
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
                                        Tên Danh Mục
                                    </th>
                                    <th class="text-center align-middle text-nowrap">
                                        Slug Danh Mục
                                    </th>
                                    <th class="text-center align-middle text-nowrap">
                                        Tình Trạng
                                    </th>
                                    <th class="text-center align-middle text-nowrap">
                                        Action
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <template v-for="(v, k) in list_danh_muc">
                                    <tr>
                                        <th class="align-middle text-nowrap text-center">{{ k + 1 }}</th>
                                        <td class="align-middle text-nowrap">{{ v.ten_danh_muc }}</td>
                                        <td class="align-middle text-nowrap">{{ v.slug_danh_muc }}</td>
                                        <td class="align-middle text-nowrap text-center ">
                                            <button v-on:click="changeTrangThai(v)" v-if="v.tinh_trang == 1"
                                                class="btn btn-success">Hiển Thị</button>
                                            <button v-on:click="changeTrangThai(v)" v-else class="btn btn-warning">Tạm
                                                tắt</button>
                                        </td>
                                        <td class="align-middle text-nowrap text-center d-flex justify-content-around">
                                            <button @:click="Object.assign(update_danh_muc, v); is_view_update = 1"
                                                class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#updateModal">Cập Nhật</button>
                                            <button @:click='Object.assign(delete_danh_muc, v)' class="btn btn-danger"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                                        </td>
                                    </tr>
                                </template>
                                <!-- deleteModal -->
                                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Xác nhận xóa danh mục
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
                                                                    delete_danh_muc.ten_danh_muc }}</b> này
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
                                <!-- updateModal -->
                                <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật danh mục
                                                    này không</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mt-2">
                                                    <label>Tên Danh Mục</label>
                                                    <input v-on:change="checkSlugUpdate()" v-on:keyup="createSlugUpdate()"
                                                        v-model="update_danh_muc.ten_danh_muc" tabindex="1" type="text"
                                                        class="form-control mt-1">
                                                </div>
                                                <div class="mt-2">
                                                    <label>Slug Danh Mục</label>
                                                    <input v-on:change="checkSlugUpdate()"
                                                        v-model="update_danh_muc.slug_danh_muc" tabindex="2" type="text"
                                                        class="form-control mt-1">
                                                </div>
                                                <div class="mt-2">
                                                    <label>Tình Trạng</label>
                                                    <select v-model="update_danh_muc.tinh_trang" tabindex="3"
                                                        class="form-control">
                                                        <option value="1">Hiển thị</option>
                                                        <option value="0">Tạm Tắt</option>
                                                    </select>
                                                </div>
                                                <div class="mt-2">
                                                    <label>Hình Ảnh Danh Mục</label>
                                                    <input v-model="update_danh_muc.hinh_anh" type="text"
                                                        class="form-control mt-1">
                                                </div>
                                                <div class="mt-2">
                                                    <label>Danh Mục Cha</label>
                                                    <select tabindex="3" v-model="update_danh_muc.id_danh_muc_cha"
                                                        class="form-control mt-1">
                                                        <option value="0">Danh Mục gỐC</option>
                                                        <template v-for="(v, k) in list_danh_muc">
                                                            <option v-if="v.id_danh_muc_cha == 0" v-bind:value="v.id">{{
                                                                v.ten_danh_muc }}</option>
                                                        </template>
                                                    </select>
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
            list_danh_muc: [],
            create_danh_muc: {
                'ten_danh_muc': '',
                'slug_danh_muc': '',
                'tinh_trang': '',
                'hinh_anh': '',
                'id_danh_muc_cha': 0
            },
            delete_danh_muc: {
                'ten_danh_muc': '',
                'slug_danh_muc': '',
                'tinh_trang': 0,
            },
            update_danh_muc: {
                'ten_danh_muc': '',
                'slug_danh_muc': '',
                'tinh_trang': 0,
            },
            is_view: 0,
            is_view_update: 0,
        }
    },
    mounted() {
        this.loadDanhMuc();
    },
    methods: {
        loadDanhMuc() {
            axios
                .get('http://127.0.0.1:8000/api/admin/danh-muc/data')
                .then((res) => {
                    this.list_danh_muc = res.data.data;
                });
        },
        createDanhMuc() {
            console.log('Lod ở trên');
            console.log(this.create_danh_muc);
            axios
                .post('http://127.0.0.1:8000/api/admin/danh-muc/create', this.create_danh_muc)
                .then((res) => {
                    if (res.data.status) {
                        toastr.success(res.data.message, 'Thông báo')
                        this.loadDanhMuc();
                        this.create_danh_muc = {};
                    }

                });
        },
        createSlug() {
            this.create_danh_muc.slug_danh_muc = this.toSlug(this.create_danh_muc.ten_danh_muc);

        },
        createSlugUpdate() {
            this.update_danh_muc.slug_danh_muc = this.toSlug(this.update_danh_muc.ten_danh_muc);

        },

        toSlug(str) {
            str = str.toLowerCase();
            str = str
                .normalize('NFD') // chuyển chuỗi sang unicode tổ hợp
                .replace(/[\u0300-\u036f]/g, ''); // xóa các ký tự dấu sau khi tách tổ hợp
            str = str.replace(/[đĐ]/g, 'd');
            str = str.replace(/([^0-9a-z-\s])/g, '');
            str = str.replace(/(\s+)/g, '-');
            str = str.replace(/-+/g, '-');
            str = str.replace(/^-+|-+$/g, '');
            return str;
        },
        checkSlug() {
            axios
                .post('http://127.0.0.1:8000/api/admin/danh-muc/check-slug', this.create_danh_muc)
                .then((res) => {

                    if (res.data.status == 1) {
                        this.is_view = 0;
                        toastr.error('Slug này đã tồn tại!', 'Thông báo');
                    } else {
                        this.is_view = 1;
                        toastr.success('Bạn có thể sử dụng slug này!!', 'Thông báo');
                    }
                });
            this.is_view = 1;
        },
        checkSlugUpdate() {
            axios
                .post('http://127.0.0.1:8000/api/admin/danh-muc/check-slug-update', this.update_danh_muc)
                .then((res) => {
                    if (res.data.status == 1) {
                        this.is_view_update = 0;
                        toastr.error('Slug này đã tồn tại!', 'Thông báo');
                    } else {
                        this.is_view_update = 1;
                        toastr.success('Bạn có thể sử dụng slug này!!', 'Thông báo');
                    }
                });
            this.is_view_update = 1;
        },

        accpectDel() {
            axios
                .delete('http://127.0.0.1:8000/api/admin/danh-muc/delete/' + this.delete_danh_muc.id)
                .then((res) => {
                    if (res.data.status) {
                        toastr.success(res.data.message, 'Thông báo');
                        this.loadDanhMuc();
                    } else {
                        toastr.error(res.data.message, 'Thông báo');

                    }
                })
        },
        accpectUpdate() {
            axios
                .put('http://127.0.0.1:8000/api/admin/danh-muc/update', this.update_danh_muc)
                .then((res) => {
                    if (res.data.status) {
                        toastr.success(res.data.message, 'Thông báo');
                        this.loadDanhMuc();
                    } else {
                        toastr.error(res.data.message, 'Thông báo');
                    }
                });
        },
        changeTrangThai(value) {
            axios
                .put('http://127.0.0.1:8000/api/admin/danh-muc/change-status', value)
                .then((res) => {
                    if (res.data.status) {
                        toastr.success(res.data.message, 'Thông báo');
                        this.loadDanhMuc();
                    } else {
                        toastr.error(res.data.message, 'Thông báo');
                    }

                });
        },
    },
}








</script>


<style></style>