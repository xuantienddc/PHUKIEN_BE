
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
                            <div class="col-lg-6">
                                <div class="mt-2">
                                    <label>Tên doanh nghiệp</label>
                                    <input tabindex="6" v-model="create_dang_ky.ten_doanh_nghiep" type="text"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mt-2">
                                    <label>Mã số thuế</label>
                                    <input tabindex="7" v-model="create_dang_ky.ma_so_thue" type="text"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mt-2">
                                    <label>Loại hình doanh nghiệp</label>
                                    <select class="form-control" name="" id="">
                                        <option value="1">Cá nhân</option>
                                        <option value="">Công ty</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mt-2">
                                    <label>Địa chỉ kinh doanh</label>
                                    <input tabindex="9" v-model="create_dang_ky.dia_chi_kinh_doanh" type="text"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 m-3">
                        <button class="btn btn-primary" @:click="createDangky()" type="button">Đăng ký</button>
                        <!-- <button v-else class="btn btn-danger" disabled type="button">Đăng ký</button> -->
                        <button class="btn btn-secondary" type="button">Quay lại đăng nhập</button>
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
                'dia_chi_kinh_doanh':'',
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
        createDangky() {
            axios
                .post('http://127.0.0.1:8000/api/admin/tai-khoan/create', this.create_dang_ky)
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