<template >
<div class="container">

<div class="alert alert-danger" role="alert">
  <marquee behavior="" direction="">
    <i><b>CHÀO MỪNG CÁC BẠN ĐẾN VỚI PHƯỚC ĐẸP TRAI!!!</b></i>
  </marquee>
</div>
</div>
<div class="container">
    <div class="row">
      <div class="col">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                Đăng Nhập
              </div>
              <div class="card-body">
                <label> Tên đăng nhập</label>
                <form class="d-flex" role="Nhập gmail">
                  <input class="form-control me-2 " type="Nhập gmail" placeholder="Nhập gmail" aria-label="Nhập gmail">
                </form>
                <label> Mật khẩu</label>
                <form class="d-flex" role="Nhập passwod">
                  <input class="form-control me-2 " type="password" placeholder="Nhập passwod"
                    aria-label="Nhập passwod">
                </form>
              </div>

            </div>
            <div class="card">

            </div>
            <div class="row">
              <div class="col">
                <div class="row">
                  <div class="col-lg-6">
                    Ghi Nhớ <input type="checkbox">
                  </div>
                  <div class="col-lg-6 text-end ">
                    quên mật khẩu?
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <button class="btn btn-danger mt3 " data-bs-toggle="modal" data-bs-target="#exampleModal">ĐĂNG
                NHẬP</button><br>
            </div>
            <div>
              <p class="text-center">hoặc</p><br>
            </div>
            
            <div>
              <p class="text-center">bạn có tài khoản chưa? <i>ĐĂNG KÝ</i></p>
            </div>


          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                ĐĂNG KÍ
              </div>
              <div class="card-body">
                <form class="d-flex" role="Nhập gmail">
                  <input class="form-control me-2 " type="Nhập gmail" placeholder="Nhập gmail" aria-label="Nhập gmail">
                </form>

              </div>

            </div>
            <div class="card">
              <div class="card-body">
                <form class="d-flex" role="Nhập số điện thoại">
                  <input class="form-control me-2 " type="Nhập số điện thoại" placeholder="Nhập số điện thoại"
                    aria-label="Nhập số điện thoại">
                </form>
              </div>

            </div>
            <div class="card">
              <div class="card-body">
                <form class="d-flex" role="Nhập địa chỉ">
                  <input class="form-control me-2 " type="Nhập địa chỉ" placeholder="Nhập địa chỉ"
                    aria-label="Nhập địa chỉ">
                </form>
              </div>

            </div>
            <div class="row">
              <div class="col-lg-6">
                <input class="form-control mt-3" type="date">
              </div>
              <div class="col-lg-6 mt-3">
                <select class="form-select" aria-label="Default select example">
                  <option selected>Giới Tính</option>
                  <option value="1">Nam</option>
                  <option value="2">Nữ</option>
                  <option value="3">Bê Đê</option>
                </select>
              </div>
            </div>
            <div class="card">
              <button class="btn btn-danger mt3 " data-bs-toggle="modal" data-bs-target="#exampleModal">ĐĂNG
                Ký</button><br>
            </div>




          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    
}
</script>
<style >
    
</style>