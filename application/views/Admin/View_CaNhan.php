<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Cá Nhân</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/ca-nhan/'); ?>">Quản Lý Cá Nhân</a></li>
              <li class="breadcrumb-item active">Cập Nhật Cá Nhân</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <img id="output" src="<?php echo $detail[0]['AnhChinh']; ?>" style="border: 1px solid #afafaf; width: 150px; height: 150px; border-radius: 50%; display: block; margin-left: auto; margin-right: auto;">
                  </div>
                  <label class="form-label w-100 text-center" style="cursor: pointer; font-weight: unset;" for="anhchinh">Chọn Ảnh</label>
                  <input type="file" id="anhchinh" class="form-control" name="anhchinh" accept="image/*" onchange="loadFile(event)" hidden>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Họ Tên</label>
                    <input type="text" class="form-control" placeholder="Họ tên" name="hoten" value="<?php echo $detail[0]['HoTen']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Email</label>
                    <input type="email" class="form-control" id="ten" name="email" placeholder="Email" value="<?php echo $detail[0]['Email']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Số Điện Thoại</label>
                    <input type="text" class="form-control" placeholder="Số điện thoại" name="sodienthoai" value="<?php echo $detail[0]['SoDienThoai']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Tài Khoản</label>
                    <input class="form-control" placeholder="Tài khoản" name="taikhoan" value="<?php echo $detail[0]['TaiKhoan']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Mật Khẩu</label>
                    <input type="password" class="form-control" placeholder="Nhập mật khẩu mới" name="matkhau">
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('admin/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Lưu Thông Tin</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
<style type="text/css">
    .form-control:disabled, .form-control[readonly] {
        background-color: #ffffff;
        opacity: 1;
        cursor: not-allowed;
    }
</style>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
