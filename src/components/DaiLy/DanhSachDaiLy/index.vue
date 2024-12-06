<template >
    <div class="row">
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Họ Và Tên</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Ngày Sinh</th>
                    <th>Mật Khẩu</th>
                    <th>Tên Doanh Nghiệp</th>
                    <th>Mã Số Thuế</th>
                    <th>Địa Chỉ Kinh Doanh</th>
                </tr>
            </thead>
            <tbody>
               <template v-for="(v , k) in list_doanh_nghiep">
                <tr>
                <td>{{ k+1 }}</td>
                <td>{{ v.ho_va_ten }}</td>
                <td>{{ v.email }}</td>
                <td>{{ v.so_dien_thoai }}</td>
                <td>{{ v.ngay_sinh }}</td>
                <td>{{ v.password}}</td>
                <td>{{ v.ten_doanh_nghiep}}</td>
                <td>{{ v.ma_so_thue}}</td>
                <td>{{ v.dia_chi_kinh_doanh}}</td>
               </tr>
               </template>
            </tbody>
        </table>
    </div>
   
</template>
<script>
import axios from 'axios';
import 'toastr/build/toastr.css';
import toastr from 'toastr';
export default {
    data() {
        return {
            list_doanh_nghiep:[],
        }
    },
    mounted() {
        this.LoadDoanhNghiep()
    },
    methods: {
        LoadDoanhNghiep()
        {
            axios
              .get('http://127.0.0.1:8000/api/doanh-muc/danh-sach-doanh-nghiep')
              .then((res)=>{
                this.list_doanh_nghiep = res.data.data;
              });
        }
    },
    
}
</script>
<style >
    
</style>