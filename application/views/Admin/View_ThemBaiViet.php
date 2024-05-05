<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin/plugins/select2/css/select2.min.css'); ?>">
<script src="<?php echo base_url('public/ckeditor5/build/ckeditor.js') ?>"></script>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Bài Viết</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/bai-viet/'); ?>">Quản Lý Bài Viết</a></li>
              <li class="breadcrumb-item active">Thêm Bài Viết</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form method="post" enctype="multipart/form-data" class="row">
          <div class="col-12">
            <div class="card card-default">
              <div class="card-header">
                <h5>Thêm Bài Viết</h5>
              </div>
            </div>
          </div>
          <div class="col-md-8">
              <div class="card card-default">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="ten">Tiêu Đề</label>
                          <input type="text" class="form-control tenchinh" id="ten" placeholder="Tiêu đề bài viết" name="tieude" 
                            <?php if(isset($post)){ echo 'value="'.$post['tieude'].'"'; } ?>
                          >
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="w-100">
                            <label for="ten">Đường Dẫn</label>
                            <span id="taoduongdan" class="float-right" style="cursor: pointer;">Tạo tự động?</span>
                          </div>
                          <input type="text" class="form-control" id="duongdan" placeholder="Đường dẫn" name="duongdan"
                            <?php if(isset($post)){ echo 'value="'.$post['duongdan'].'"'; } ?>
                          >
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="ten">Nội Dung</label>
                          <textarea id="editor" class="form-control editor" name="noidung" placeholder="Nhập nội dung bài viết"><?php if(isset($post)){ echo $post['noidung']; } ?></textarea>
                        </div>
                      </div>
                    </div> 
                </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card card-default">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="ten">Hiển Thị Bài Viết Đầu Trang Chủ?</label>
                          <select class="form-control" aria-label="Default select example" name="hienthitrangchu">
                            <option value="0" selected>Không Hiển Thị</option>
                            <option value="1" <?php if(isset($post) && ($post['hienthitrangchu'] == 1)){ echo "selected"; } ?>>Hiển Thị Đầu Trang Với Kích Thước Lớn</option>
                            <option value="2" <?php if(isset($post) && ($post['hienthitrangchu'] == 2)){ echo "selected"; } ?>>Hiển Thị Đầu Trang Với Kích Thước Nhỏ</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="ten">Loại Bài Viết</label>
                          <select class="form-control" aria-label="Default select example" name="loaibaiviet">
                            <option value="1" selected>Bình Thường</option>
                            <option value="2" <?php if(isset($post) && ($post['loaibaiviet'] == 2)){ echo "selected"; } ?>>Xu Hướng</option>
                            <option value="3" <?php if(isset($post) && ($post['loaibaiviet'] == 3)){ echo "selected"; } ?>>Phổ Biến</option>
                            <option value="4" <?php if(isset($post) && ($post['loaibaiviet'] == 4)){ echo "selected"; } ?>>Nổi Bật</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="ten">Hiển Thị Bài Viết Widget?</label>
                          <select class="form-control" aria-label="Default select example" name="hienthiwidget">
                            <option value="0" selected>Không Hiển Thị</option>
                            <option value="1" <?php if(isset($post) && ($post['hienthiwidget'] == 1)){ echo "selected"; } ?>>Có Hiển Thị</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="ten">Hình Ảnh</label>
                          <input type="file" class="form-control" id="ten" name="anhchinh" onchange="loadFile(event)">
                        </div>
                        <img id="output" src="<?php if(isset($post)){ echo $post['anhchinh']; } ?>" style="display: block; margin-left: auto; margin-right: auto;width: 436px; height: 300px;">
                        <br>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="ten">Chuyên Mục Bài Viết</label>
                          <select class="form-control category" multiple="multiple" name="machuyenmuc[]">
                            <?php foreach ($category as $key => $value): ?>
                              <option value="<?php echo $value['MaChuyenMuc'] ?>"><?php echo $value['TenChuyenMuc'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="ten">Loại Thẻ Bài Viết</label>
                          <select class="form-control category" multiple="multiple" name="mathe[]" placeholder="Chọn loại thẻ">
                            <?php foreach ($tag as $key => $value): ?>
                              <option value="<?php echo $value['MaThe'] ?>"><?php echo $value['TenThe'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                      </div>


                    </div> 
                    <a class="btn btn-success" href="<?php echo base_url('admin/bai-viet/'); ?>">Quay Lại</a>
                    <button class="btn btn-primary">Thêm Bài Viết</button>
                </div>
              </div>
          </form>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
      background-color: #343a40;
      border: 1px solid #343a40;
    }
</style>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
<script type="text/javascript" src="<?php echo base_url('public/ckeditor5/sample/script.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/admin/plugins/select2/js/select2.full.min.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('.tag').select2();
        $('.category').select2();
    });
</script>
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
	            toastr.error('Vui lòng nhập tên bài viết!', 'Thất Bại');
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
<style type="text/css">
  .ck-editor__editable {min-height: 619px;}
</style>
