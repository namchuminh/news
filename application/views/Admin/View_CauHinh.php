<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Cấu Hình</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/cau-hinh/'); ?>">Quản Lý Cấu Hình</a></li>
              <li class="breadcrumb-item active">Cập Nhật Cấu Hình</li>
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
                    <label for="ten">Tên Website</label>
                    <input type="text" class="form-control" placeholder="Tên website" name="tenwebsite" value="<?php echo $detail[0]['TenWebsite']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Mô Tả Website</label>
                    <textarea class="form-control" rows="3" placeholder="Mô tả website" name="motaweb"><?php echo $detail[0]['MoTaWebsite']; ?></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Favicon Website</label>
                    <input type="file" class="form-control" name="favicon" onchange="loadFile(event, 'imgfavicon')">
                  </div>
                  <img id="imgfavicon" src="<?php echo $detail[0]['Favicon']; ?>" style="width: 100px; height: 100px;">
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Logo Website</label>
                    <input type="file" class="form-control" name="logo" onchange="loadFile(event, 'imglogo')">
                  </div>
                  <img id="imglogo" src="<?php echo $detail[0]['Logo']; ?>" style="width: 143px; height: 60px;">
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Địa Chỉ</label>
                    <input type="text" class="form-control" placeholder="Địa chỉ" name="diachi" value="<?php echo $detail[0]['DiaChi']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Email</label>
                    <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $detail[0]['Email']; ?>">
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
                    <label for="ten">Đường Dẫn Facebook</label>
                    <input type="text" class="form-control" placeholder="Đường dẫn Facebook" name="facebook" value="<?php echo $detail[0]['Facebook']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Đường Dẫn Twitter</label>
                    <input type="text" class="form-control" placeholder="Đường dẫn Twitter" name="x" value="<?php echo $detail[0]['X']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Đường Dẫn Linkedin</label>
                    <input type="text" class="form-control" placeholder="Đường dẫn Linkedin" name="linkedin" value="<?php echo $detail[0]['Linkedin']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Đường Dẫn Instagram</label>
                    <input type="text" class="form-control" placeholder="Đường dẫn Instagram" name="instagram" value="<?php echo $detail[0]['Instagram']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Đường Dẫn Youtube</label>
                    <input type="text" class="form-control" placeholder="Đường dẫn Youtube" name="youtube" value="<?php echo $detail[0]['Youtube']; ?>">
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('admin/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Lưu Cấu Hình</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
  var loadFile = function(event,id) {
    var output = document.getElementById(id);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
