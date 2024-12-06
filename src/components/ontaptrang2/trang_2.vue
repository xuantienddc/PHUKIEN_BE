<template >
    <div class="row">
        <div class="card">
            <label class="text-center">Chọn</label>
            <select class="form-control" name="" id="">
            <template v-for="(v, k) in list_tu_lanh" >
                <option>{{ v.ten_san_pham }}</option>
            </template>
        </select>
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