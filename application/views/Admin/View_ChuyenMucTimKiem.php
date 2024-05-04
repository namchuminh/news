<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
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
              <li class="breadcrumb-item active">Quản Lý Chuyên Mục</li>
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
                <form class="row" action="<?php echo base_url('admin/chuyen-muc/tim-kiem/') ?>"> 
                  <div class="col-sm-2">
                    <label>Tên Chuyên Mục</label>
                    <input type="text" name="tenchuyenmuc" class="form-control" placeholder="Tên chuyên mục" value="<?php echo $post['tenchuyenmuc']; ?>">
                  </div>
                  <div class="col-sm-2">
                    <label>Hiển Thị Menu</label>
                    <select class="form-control" name="hienthitrenmenu">
                      <option value="" selected>--Chọn--</option>
                      <option value="-1" <?php echo $post['hienthitrenmenu'] == -1 ? "selected" : "" ; ?>>Không Hiển Thị</option>
                      <option value="1" <?php echo $post['hienthitrenmenu'] == 1 ? "selected" : "" ; ?>>Có Hiển Thị</option>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <label>Hiển Thị Trang Chủ</label>
                    <select class="form-control" name="hienthitrangchu">
                      <option value="" selected>--Chọn--</option>
                      <option value="-1" <?php echo $post['hienthitrangchu'] == -1 ? "selected" : "" ; ?>>Không Hiển Thị</option>
                      <option value="1" <?php echo $post['hienthitrangchu'] == 1 ? "selected" : "" ; ?>>Có Hiển Thị</option>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <label>Hiển Thị Widget</label>
                    <select class="form-control" name="hienthiwidget">
                      <option value="" selected>--Chọn--</option>
                      <option value="-1" <?php echo $post['hienthiwidget'] == -1 ? "selected" : "" ; ?>>Không Hiển Thị</option>
                      <option value="1" <?php echo $post['hienthiwidget'] == 1 ? "selected" : "" ; ?>>Có Hiển Thị</option>
                    </select>
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
                      <th style="width: 288px;">Hình Ảnh</th>
                      <th>Tên Chuyên Mục</th>
                      <th>Chuyên Mục Cha</th>
                      <th>Đường Dẫn</th>
                      <th>Hiển Thị Menu</th>
                      <th>Hiển Thị Trang Chủ</th>
                      <th>Hiển Thị Widget</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php foreach ($list as $key => $value): ?>
	                    <tr>
	                      <td><?php echo $key + 1; ?></td>
	                      <td><img style="width: 288px; height: 56px" src="<?php echo $value['AnhChinh']; ?>"></td>
	                      <td>
                          <a href="<?php echo base_url('chuyen-muc/'.$value['DuongDan'].'/'); ?>" target="_blank"><?php echo $value['TenChuyenMuc']; ?></a>
                        </td>
                        <td>
                          <?php if(is_numeric($value['ChuyenMucCha'])){ ?>
                            <a href="<?php echo base_url('chuyen-muc/'.$this->Model_ChuyenMuc->getById($value['ChuyenMucCha'])[0]['DuongDan'].'/'); ?>" target="_blank">[<?php echo $this->Model_ChuyenMuc->getById($value['ChuyenMucCha'])[0]['TenChuyenMuc']; ?>]</a>
                          <?php }else{ ?>
                            [Không có]
                          <?php } ?>
                        </td>
	                      <td>
	                      	<a href="<?php echo base_url('chuyen-muc/'.$value['DuongDan'].'/'); ?>" target="_blank"><?php echo $value['DuongDan']; ?></a>
	                      </td>
                        <td><?php echo $value['HienThiMenu'] == 1 ? "Có hiển thị" : "Không hiển thị"; ?></td>
                        <td><?php echo $value['HienThiTrangChu'] == 1 ? "Có hiển thị" : "Không hiển thị"; ?></td>
                        <td><?php echo $value['HienThiWidget'] == 1 ? "Có hiển thị" : "Không hiển thị"; ?></td>
	                      <td>
	                      	<a href="<?php echo base_url('admin/chuyen-muc/'.$value['MaChuyenMuc'].'/sua/'); ?>" class="btn btn-primary" style="color: white;">
	                      		<i class="fas fa-edit"></i>
                            	<span>SỬA</span>
                           	</a>
                           	<a href="<?php echo base_url('admin/chuyen-muc/'.$value['MaChuyenMuc'].'/xoa/'); ?>" class="btn btn-danger" style="color: white;">
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
                  		<li class="page-item"><a class="page-link" href="<?php echo base_url('admin/chuyen-muc/tim-kiem/'.$i.'/trang/?tenchuyenmuc='.$post['tenchuyenmuc'].'&hienthitrenmenu='.$post['hienthitrenmenu'].'&hienthitrangchu='.$post['hienthitrangchu'].'&hienthiwidget='.$post['hienthiwidget']) ?>"><?php echo $i; ?></a></li>
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
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
