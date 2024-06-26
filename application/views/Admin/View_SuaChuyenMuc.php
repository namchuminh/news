<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<?php   
function generateOptions($categories, $chuyenmuccha, $parentId = NULL, $level = 0) {
    // Lặp qua các chuyên mục và hiển thị các chuyên mục con của chuyên mục cha được chỉ định
    foreach ($categories as $category) {
        if ($category["ChuyenMucCha"] == $parentId) {
            // Thêm khoảng trắng vào trước tên chuyên mục để tạo cấp bậc
            $padding = str_repeat('- ', $level * 4);
            $selected = ($category['MaChuyenMuc'] == $chuyenmuccha) ? 'selected' : '';
            echo '<option value="' . $category['MaChuyenMuc'] . '" ' . $selected . '>' . $padding . $category['TenChuyenMuc'] . '</option>';

            // Gọi đệ quy để hiển thị các chuyên mục con của chuyên mục hiện tại
            generateOptions($categories, $chuyenmuccha, $category['MaChuyenMuc'], $level + 1);
        }
    }
}
?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Chuyên Mục</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/chuyen-muc/'); ?>">Quản Lý Chuyên Mục</a></li>
              <li class="breadcrumb-item active"><?php echo $detail[0]['TenChuyenMuc']; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h5>Thông Tin Chuyên Mục</h5>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Tên Chuyên Mục</label>
                    <input type="text" class="form-control tenchinh" id="ten" placeholder="Tên chuyên mục" name="tenchuyenmuc" value="<?php echo $detail[0]['TenChuyenMuc']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Chuyên Mục Cha</label>
                    <select class="form-control" aria-label="Default select example" name="chuyenmuccha">
                      <option value="" selected>[Không Có Mục Cha]</option>
                      <?php generateOptions($category,$detail[0]['ChuyenMucCha']); ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                  	<div class="w-100">
                  		<label for="ten">Đường Dẫn</label>
                    	<span id="taoduongdan" class="float-right" style="cursor: pointer;">Tạo tự động?</span>
                  	</div>
                    <input type="text" class="form-control" id="duongdan" placeholder="Đường dẫn chuyên mục" name="duongdan" value="<?php echo $detail[0]['DuongDan']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Hình Ảnh</label>
                    <input type="file" class="form-control" id="ten" name="hinhanh" onchange="loadFile(event)">
                  </div>
                  <img id="output" src="<?php echo $detail[0]['AnhChinh']; ?>" style="width: 288px; height: 56px;">
                  <br>
                  <br>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Hiển Thị Trên Menu?</label>
                    <select class="form-control" aria-label="Default select example" name="hienthitrenmenu">
                      <?php if($detail[0]['HienThiMenu'] == 0){ ?>
                        <option value="0" selected>Không Hiển Thị</option>
                        <option value="1">Có Hiển Thị</option>
                      <?php }else{ ?>
                        <option value="0">Không Hiển Thị</option>
                        <option value="1" selected>Có Hiển Thị</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Hiển Thị Bài Viết Trang Chủ?</label>
                    <select class="form-control" aria-label="Default select example" name="hienthitrangchu">
                      <option value="0" <?php if($detail[0]['HienThiTrangChu'] == 0){ echo "selected"; }?>>Không Hiển Thị</option>
                      <option value="1" <?php if($detail[0]['HienThiTrangChu'] == 1){ echo "selected"; }?>>Có Hiển Thị</option>
                      <option value="2" <?php if($detail[0]['HienThiTrangChu'] == 2){ echo "selected"; }?>>Hiển Thị Cả Bài Viết Chuyên Mục Con</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Hiển Thị Chuyên Mục Widget?</label>
                    <select class="form-control" aria-label="Default select example" name="hienthiwidget">
                      <option value="0" <?php if($detail[0]['HienThiWidget'] == 0){ echo "selected"; }?>>Không Hiển Thị</option>
                      <option value="1" <?php if($detail[0]['HienThiWidget'] == 1){ echo "selected"; }?>>Có Hiển Thị</option>
                    </select>
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('admin/chuyen-muc/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Cập Nhật Chuyên Mục</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
<script>
    function createSlug(str) {
        // Chuyển đổi tiếng Việt thành dạng slug
        str = str.toLowerCase().trim();
        str = str.replace(/\s+/g, '-'); // Thay thế khoảng trắng bằng dấu gạch ngang
        str = convertVietnameseToSlug(str); // Xử lý các dấu tiếng Việt

        return str;
    }

    function convertVietnameseToSlug(str) {
        var slug = str;

        // Xử lý dấu tiếng Việt
        slug = slug.replace(/[áàảãạăắằẳẵặâấầẩẫậ]/g, 'a');
        slug = slug.replace(/[éèẻẽẹêếềểễệ]/g, 'e');
        slug = slug.replace(/[íìỉĩị]/g, 'i');
        slug = slug.replace(/[óòỏõọôốồổỗộơớờởỡợ]/g, 'o');
        slug = slug.replace(/[úùủũụưứừửữự]/g, 'u');
        slug = slug.replace(/[ýỳỷỹỵ]/g, 'y');
        slug = slug.replace(/đ/g, 'd');

        return slug;
    }

    $(document).ready(function(){
        $('#taoduongdan').click(function(){
            if($(".tenchinh").val() == ""){
                toastr.options = {
	                closeButton: true,
	                progressBar: true,
	                positionClass: 'toast-top-right', // Vị trí hiển thị
	                timeOut: 5000 // Thời gian tự động đóng
	            };
	            toastr.error('Vui lòng nhập tên chuyên mục!', 'Thất Bại');
            }else{
                $("#duongdan").val(createSlug($(".tenchinh").val()))
            }
        })
    });
</script>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>