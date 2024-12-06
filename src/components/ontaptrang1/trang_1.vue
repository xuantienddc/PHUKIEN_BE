<template >
    <div class="row row-cols-1 row-cols-sm row-cols-lg-3 row-cols-xl-4 row-cols-xxl-4 product-grid">
    
            <template v-for="(v, k) in list_tu_lanh">
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img v-bind:src="v.hinh_anh" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> {{ v.ten_san_pham }}</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                </div>
                                <div class="col-lg-6">
                                    <del>
                                        <p class="card-text">{{ v.gia_ban }}đ</p>
                                    </del>
                                    <p class="card-text">{{ v.gia_khuyen_mai }}đ</p>
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary">MUA</a>
                        </div>
                    </div>
                </div>
            </template>
    
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