<template >
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="mb-4 text-center">
                        <img src="../../assets/images/logo-img.png" width="180" alt="" />
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="text-center">
                                </div>
                                <div class="login-separater text-center mb-4"> <span><h1>Đăng Nhập</h1></span>
                                    <hr />
                                </div>
                                <div class="form-body">
                                    <form class="row g-3">
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                                            <input v-model="dang_nhap.email" type="email" class="form-control" id="inputEmailAddress"
                                                placeholder="Email Address">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input v-model="dang_nhap.password" type="password" class="form-control border-end-0"
                                                    id="inputChoosePassword"  placeholder="Enter Password">
                                                <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                        class='bx bx-hide'></i></a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                                    checked>
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-end"> <a href="authentication-forgot-password.html">Forgot
                                                Password ?</a>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button v-on:click="dangnhap()" type="button" class="btn btn-primary"><i
                                                        class="bx bxs-lock-open"></i>Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
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
            dang_nhap:{},
        }
    },
    methods: {
        
        dangnhap()
        {
            axios
            .post('http://127.0.0.1:8000/api/doanh-muc/dang-nhap',this.dang_nhap)
              .then((res)=> {
                if(res.data.status==1){
                        toastr.success(res.data.message);
                        localStorage.setItem('chia_khoa_16',res.data.chia_khoa);
                    }else if(res.data.status == 0){
                        toastr.error(res.data.message);
                    }else{
                        toastr.warning(res.data.message);
                    }
        });
    },
    },

}
</script>
<style>
    
</style>