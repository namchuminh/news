<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Giao Diện</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/giao-dien/'); ?>">Quản Lý Giao Diện</a></li>
              <li class="breadcrumb-item active">
                <?php if($detail[0]['LoaiGiaoDien'] == 1){ ?>
                  Giao Diện Slide
                <?php }else if($detail[0]['LoaiGiaoDien'] == 2){ ?>
                  Banner Dọc Dưới Slide
                <?php }else if($detail[0]['LoaiGiaoDien'] == 3){ ?>
                  Banner Ngang
                <?php }else if($detail[0]['LoaiGiaoDien'] == 4){ ?>
                  Banner Dọc Cuối Trang
                <?php } ?>
              </li>
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
                    <label for="ten">Đường Dẫn Truy Cập (Mặc Định: <?php echo base_url(); ?>)</label>
                    <input type="text" class="form-control" id="ten" name="duongdan" placeholder="Link đường dẫn khi giao diện được click" value="<?php echo $detail[0]['DuongDan']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Hình Ảnh</label>
                    <input type="file" class="form-control" id="ten" name="hinhanh" onchange="loadFile(event)">
                  </div>
                  <?php if($detail[0]['LoaiGiaoDien'] == 1){ ?>
                    <img id="output" src="<?php echo $detail[0]['HinhAnh']; ?>" style="width: 700px; height: 60px">
                  <?php }else if($detail[0]['LoaiGiaoDien'] == 2){ ?>
                    <img id="output" src="<?php echo $detail[0]['HinhAnh']; ?>" style="width: 1224px; height: 100px">
                  <?php }else{ ?>
                    <img id="output" src="<?php echo $detail[0]['HinhAnh']; ?>" style="width: 288px; height: 350px">
                  <?php } ?>
                  <br>
                  <br>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Loại Giao Diện</label>
                    <select class="form-control" aria-label="Default select example" name="loaigiaodien">
                      <option value="1" <?php if($detail[0]['LoaiGiaoDien'] == 1){ echo "selected"; } ?>>Banner Bên Phải Logo</option>
                      <option value="2" <?php if($detail[0]['LoaiGiaoDien'] == 2){ echo "selected"; } ?>>Banner Ngang Giữa Trang Chủ</option>
                      <option value="3" <?php if($detail[0]['LoaiGiaoDien'] == 3){ echo "selected"; } ?>>Banner Quảng Cáo Dọc</option>
                    </select>
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('admin/giao-dien/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Cập Nhật Giao Diện</button>
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
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
<script>
  $(document).ready(function(){
      $("select").change(function(){
          var selectedValue = $(this).val();
          if(selectedValue === "1") {
            $("#output").css({"width": "700px", "height": "60px"});
          }else if(selectedValue === "2"){
            $("#output").css({"width": "1224px", "height": "100px"});
          }else{
            $("#output").css({"width": "288px", "height": "350px"});
          }
      });
  });
</script>