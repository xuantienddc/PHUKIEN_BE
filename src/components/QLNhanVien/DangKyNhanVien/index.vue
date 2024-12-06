
<template>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 ">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Đăng ký</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label>Họ và tên</label>
                                <input tabindex="1" v-model="create_dang_ky.ho_va_ten" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label>Email</label>
                                <input tabindex="2" v-model="create_dang_ky.email" type="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label>Số điện thoại</label>
                                <input tabindex="3" v-model="create_dang_ky.so_dien_thoai" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label>Ngày sinh</label>
                                <input tabindex="4" v-model="create_dang_ky.ngay_sinh" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mt-2">
                                <label>Mật khẩu</label>
                                <input tabindex="5" v-model="create_dang_ky.password" type="password"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mt-2">
                                <label>Nhập Lại Mật khẩu</label>
                                <input tabindex="5" v-model="create_dang_ky.re_password" type="password"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mt-2">
                                <label>Địa chỉ</label>
                                <input tabindex="9" v-model="create_dang_ky.dia_chi" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 m-3">
                    <button class="btn btn-primary" @:click="createDangky()" type="button">Đăng ký</button>
                    <!-- <button v-else class="btn btn-danger" disabled type="button">Đăng ký</button> -->
                    <router-link to="/nhan-vien1/dang-nhap" >
                        <button class="btn btn-secondary" type="button">Quay lại đăng nhập</button>
                    </router-link> 
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
            'so_dien_thoai':'',
            'ngay_sinh':'',
            'password':'',
            'ten_doanh_nghiep':'',
            'ma_so_thue':'',
            'dia_chi':'',
        },
    }
},
mounted() {
    this.Loaddangky();

},
methods: {
    Loaddangky() {
        axios
            .get('http://127.0.0.1:8000/api/admin/nhan-vien1/data')
            .then((res) => {
                this.list_dang_ky = res.data.data;
            });
    },
    createDangky() {
        axios
            .post('http://127.0.0.1:8000/api/admin/nhan-vien1/create', this.create_dang_ky)
            .then((res) => {
                if (res.data.status) {
                    toastr.success(res.data.message, 'Thông báo')
                    this.Loaddangky();
                    this.create_dang_ky = {};
                }
            });
    },

},

}



</script>
<style ></style>