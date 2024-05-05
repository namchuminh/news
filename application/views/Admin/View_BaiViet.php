<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
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
              <li class="breadcrumb-item active">Quản Lý Bài Viết</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <form class="row" action="<?php echo base_url('admin/binh-luan/tim-kiem/') ?>"> 
                  <div class="col-sm-2">
                    <label>Tên Bài Viết</label>
                    <input type="text" name="tieude" class="form-control" placeholder="Tên bài viết">
                  </div>
                  <div class="col-sm-2">
                    <label>Thời Gian</label>
                    <input type="date" name="thoigian" class="form-control">
                  </div>
                  <div class="col-sm-2">
                    <label style="visibility:hidden;">Tìm Kiếm</label>
                    <br>
                    <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
                  </div>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th style="width: 200px;">Hình Ảnh</th>
                      <th>Tiêu Đề</th>
                      <th>Đường Dẫn</th>
                      <th>Chuyên Mục</th>
                      <th>Loại Thẻ</th>
                      <th>Loại Bài Viết</th>
                      <th>Ngày Đăng</th>
                      <th>Số Lượt Xem</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($list as $key => $value): ?>
                      <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><img src="<?php echo $value['AnhChinh']; ?>" style="width: 200px; height: 150px;"></td>
                        <td>
                          <a href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/') ?>" target="_blank"><?php echo $value['TieuDe']; ?></a>
                        </td>
                        <td><a href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/') ?>"><?php echo $value['DuongDan']; ?></a></td>
                        <td>
                          <?php foreach ($this->Model_BaiViet->getCategoryPost($value['MaBaiViet']) as $key => $category): ?>
                            <li>
                              <a href="<?php echo base_url('chuyen-muc/'.$category['DuongDan'].'/'); ?>"><?php echo $category['TenChuyenMuc']; ?></a>
                            </li>
                          <?php endforeach ?>
                        </td>
                        <td>
                          <?php foreach ($this->Model_BaiViet->getTagPost($value['MaBaiViet']) as $key => $tag): ?>
                            <li><a href="<?php echo base_url('loai-the/'.$tag['DuongDan'].'/'); ?>"><?php echo $tag['TenThe']; ?></a></li>
                          <?php endforeach ?>
                        </td>
                        <td>
                          <?php if($value['LoaiBaiViet'] == 1){ ?>
                            Bình Thường
                          <?php }else if($value['LoaiBaiViet'] == 2){ ?>
                            Xu Hướng
                          <?php }else if($value['LoaiBaiViet'] == 3){ ?>
                            Phổ Biến
                          <?php }else if($value['LoaiBaiViet'] == 4){ ?>
                            Nổi Bật
                          <?php } ?>
                        </td>
                        <td>
                          <?php echo date("H:i:s d/m/Y", strtotime($value['ThoiGian'])); ?>
                        </td>
                        <td>
                          <?php echo $value['LuotXem']; ?> Lượt Xem
                        </td>
                        <td>
                          <a href="<?php echo base_url('admin/bai-viet/'.$value['MaBaiViet'].'/sua/'); ?>" class="btn btn-primary" style="color: white;">
                            <i class="fa-solid fa-pen-to-square"></i>
                              <span>SỬA</span>
                          </a>
                          <a href="<?php echo base_url('admin/bai-viet/'.$value['MaBaiViet'].'/xoa/'); ?>" class="btn btn-danger" style="color: white;">
                              <i class="fas fa-trash"></i>
                              <span>XÓA</span>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                      <li class="page-item"><a class="page-link" href="<?php echo base_url('admin/bai-viet/'.$i.'/trang/') ?>"><?php echo $i; ?></a></li>
                    <?php } ?>      
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <style type="text/css">
    .fa-star{
      color: #F6BC3E;
    }
  </style>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
