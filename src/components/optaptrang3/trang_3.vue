<template >
    <div class="row">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        Danh Sách Sản Phẩm
                    </div>
                    <div class="col text-end">
                        <button class="btn btn-danger "> Thêm Mới</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên Sản Phẩm</th>
                            <th class="text-center">Hình ảnh</th>
                            <th class="text-center">Mô Tả</th>
                            <th class="text-center">Số Lượng Nhập</th>
                            <th class="text-center">Gía Bán</th>
                            <th class="text-center">Gía Khuyến Mãi</th>
                            <th class="text-center">Tình Trạng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-for="(v , k) in list_tu_lanh">
                            <tr>
                                <td>{{ k+1 }}</td>
                                <td>{{ v.ten_san_pham }}</td>
                                <td><img v-bind:src="v.hinh_anh" style="width: 100px;" class="card-img-top"  alt="..."></td>
                                <td>{{ v.mo_ta_ngan }}</td>
                                <td>{{ v.so_luong_nhap }}</td>
                                <td>{{ v.gia_ban }}</td>
                                <td>{{ v.gia_khuyen_mai }}</td>
                                <td><button v-if="v.tinh_trang == 0" class="btn btn-danger ">Hoạt động</button>
                                    <button v-else class="btn btn-primary">Tạm Dừng</button>
                                </td>
                            </tr>
                        </template>
                    </tbody>

                </table>
            
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            list_tu_lanh: [],
        }
        
    },
    mounted() {
        this.loadTuLanh();
    },
    methods: {
        loadTuLanh() {
            axios
                .get('https://osm.dzfullstack.com/api/san-pham/data')
                .then((res) => {
                    this.list_tu_lanh = res.data.data;
                });
        },


    },

}
</script>
<style ></style>