<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Bình Luận</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item active">Quản Lý Bình Luận</li>
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
                      <th>Tên Bài Viết</th>
                      <th>Người Bình Luận</th>
                      <th>Email</th>
                      <th>Nội Dung</th>
                      <th>Thời Gian</th>
                      <th>Xem Bình Luận</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($list as $key => $value): ?>
                      <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td>
                          <a href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/') ?>" target="_blank"><?php echo $value['TieuDe']; ?></a>
                        </td>
                        <td><a href="#"><?php echo $value['HoTen']; ?></a></td>
                        <td><a href="mailto:<?php echo $value['Email']; ?>"><?php echo $value['Email']; ?></a></td>
                        <td>
                          <?php if(strlen($value['NoiDung']) < 50){ ?>
                            <?php echo substr($value['NoiDung'], 0, 50); ?>
                          <?php }else{ ?>
                            <?php echo substr($value['NoiDung'], 0, 50); ?>...
                          <?php } ?>
                        </td>
                        <td>
                          <?php echo date("H:i:s d/m/Y", strtotime($value['ThoiGian'])); ?>
                        </td>
                        <td>
                          <a href="<?php echo base_url('admin/binh-luan/'.$value['MaBinhLuan'].'/xem/'); ?>" class="btn btn-primary" style="color: white;">
                            <i class="fa-solid fa-comment"></i>
                              <span>XEM BÌNH LUẬN</span>
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
                      <li class="page-item"><a class="page-link" href="<?php echo base_url('admin/binh-luan/'.$i.'/trang/') ?>"><?php echo $i; ?></a></li>
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
