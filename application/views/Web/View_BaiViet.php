<?php require(APPPATH.'views/Web/layouts/header.php'); ?>
<div class="breadcumb-wrapper">
    <div class="container">
        <ul class="breadcumb-menu">
            <li><a href="<?php echo base_url(); ?>">Trang Chủ</a></li>
            <?php if(isset($_GET['timkiem'])){ ?>
            	<li>Tìm Kiếm</li>
            <?php }else if(isset($_GET['thoigian'])){ ?>
            	<li>Thời Gian</li>
            <?php }else{ ?>
            	<li>Chuyên Mục</li>
            <?php } ?>
            <?php if(isset($_GET['timkiem'])){ ?>
            	<li><?php echo $search; ?></li>
            <?php }else if(isset($_GET['thoigian'])){ ?>
            	<li><?php echo $time; ?></li>
            <?php }else{ ?>
            	<li><?php echo $detail[0]['TenChuyenMuc']; ?></li>
            <?php } ?>
        </ul>
    </div>
</div>
<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xxl-9 col-lg-8">
                <div class="row gy-30">
                	<?php if(count($list) <= 0){ ?>
                		<p>Không tìm thấy bài viết nào!</p>
                	<?php } ?>
                	<?php foreach ($list as $key => $value): ?>
	                    <div class="col-sm-6">
	                        <div class="blog-style7">
	                            <div class="blog-img">
	                                <img style="width: 100%; height: 300px;" src="<?php echo $value['AnhChinh'] ?>" alt="blog image">
	                                <a href="<?php echo base_url('chuyen-muc/'.$value['DuongDanCM'].'/') ?>" class="category" style="--theme-color: #6234AC;"><?php echo $value['TenChuyenMuc'] ?></a>
	                            </div>
	                            <div class="blog-meta">
	                                <a href="#"><i class="far fa-user"></i>Đăng bởi: Admin</a>
	                                <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$value['ThoiGian'])[0]) ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$value['ThoiGian'])[0]; ?></a>
	                            </div>
	                            <h3 class="box-title-24"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/') ?>"><?php echo $value['TieuDe'] ?></a></h3>
	                            <a href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/') ?>	" class="th-btn style2">Đọc Thêm<i class="fas fa-arrow-up-right ms-2"></i></a>
	                        </div>
	                    </div>
                    <?php endforeach ?>
                </div>
                <div class="th-pagination mt-40">
                    <ul>

                    	<?php for($i = 1; $i <= $totalPages; $i++){ ?>
                    		<?php if(isset($_GET['timkiem'])){ ?>
				            	<li><a href="<?php echo base_url('bai-viet/trang/'.$i.'/?timkiem='.$search) ?>"><?php echo $i; ?></a></li>
				            <?php }else if(isset($_GET['thoigian'])){ ?>
				            	<li><a href="<?php echo base_url('bai-viet/trang/'.$i.'/?thoigian='.$time) ?>"><?php echo $i; ?></a></li>
				            <?php }else{ ?>
				            	<li><a href="<?php echo base_url('chuyen-muc/'.$slug.'/trang/'.$i.'/') ?>"><?php echo $i; ?></a></li>
				            <?php } ?>
	                  	<?php } ?>      
                    </ul>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-4 sidebar-wrap">
                <aside class="sidebar-area">
                    <div class="widget widget_search  ">
                        <form action="<?php echo base_url('bai-viet/') ?>" class="search-form">
                            <input name="timkiem" type="text" placeholder="Nhập tên bài viết">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                    <div class="widget widget_categories  ">
                        <h3 class="widget_title">Chuyên Mục</h3>
                        <ul>
                        	<?php foreach ($listRandom as $key => $value): ?>
                        		<li>
	                                <a href="<?php echo base_url('chuyen-muc/'.$value['DuongDan'].'/') ?>" class="background-image" ><?php echo $value['TenChuyenMuc'] ?></a>
	                            </li>
                        	<?php endforeach ?>                      
                        </ul>
                    </div>
                    <div class="widget  ">
                        <h3 class="widget_title">Đăng Gần Đây</h3>
                        <div class="recent-post-wrap">
                        	<?php foreach ($recent as $key => $value): ?>
	                            <div class="recent-post">
	                                <div class="media-img">
	                                    <a href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/') ?>">
	                                    	<img style="width: 100%; height: 80px;" src="<?php echo $value['AnhChinh'] ?>" alt="blog image">
	                                    </a>
	                                </div>
	                                <div class="media-body">
	                                    <h4 class="post-title"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/') ?>"><?php echo $value['TieuDe'] ?></a></h4>
	                                    <div class="recent-post-meta">
	                                        <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$value['ThoiGian'])[0]) ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$value['ThoiGian'])[0]; ?></a>
	                                    </div>
	                                </div>
	                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <?php if(count($bannerWidget) >= 1){ ?>
	                    <div class="widget">
	                        <div class="widget-ads">
	                            <a href="<?php echo $bannerWidget[0]['DuongDan'] ?>">
	                                <img style="height: 350px;" class="w-100" src="<?php echo $bannerWidget[0]['HinhAnh'] ?>" alt="ads">
	                            </a>
	                        </div>
	                    </div>
	                <?php } ?>
                    <div class="widget widget_tag_cloud  ">
                        <h3 class="widget_title">Loại Thẻ</h3>
                        <div class="tagcloud">
                        	<?php foreach ($tagRandom as $key => $value): ?>
                        		<a href="<?php echo base_url('loai-the/'.$value['DuongDan'].'/') ?>"><?php echo $value['TenThe'] ?></a>
                        	<?php endforeach ?>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<?php require(APPPATH.'views/Web/layouts/footer.php'); ?>
