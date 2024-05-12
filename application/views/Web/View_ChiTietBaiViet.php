<?php require(APPPATH.'views/Web/layouts/header.php'); ?>
<div class="breadcumb-wrapper">
    <div class="container">
        <ul class="breadcumb-menu">
            <li><a href="<?php echo base_url(); ?>">Trang Chủ</a></li>
            <li>Bài Viết</li>
            <li><?php echo $detail[0]['TieuDe']; ?></li>
        </ul>
    </div>
</div>
<section class="th-blog-wrapper blog-details space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xxl-9 col-lg-8">
                <div class="th-blog blog-single">
                	<?php foreach ($this->Model_ChuyenMuc->getByIdPost($detail[0]['MaBaiViet']) as $key => $value): ?>
                		<a href="<?php echo base_url('chuyen-muc/'.$value['DuongDan'].'/') ?>" class="category" style="--theme-color: #4E4BD0;"><?php echo $value['TenChuyenMuc'] ?></a>
                	<?php endforeach ?>
                    <h2 class="blog-title"><?php echo $detail[0]['TieuDe'] ?></h2>
                    <div class="blog-meta">
                        <a class="author" href="#"><i class="far fa-user"></i>Đăng bởi: Admin</a>
                        <a href="blog.html"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$detail[0]['ThoiGian'])[0]; ?></a>
                        <a href="blog-details.html"><i class="far fa-comments"></i>Bình luận (<?php echo count($comment) ?>)</a>
                        <span><i class="far fa-book-open"></i>5 phút đọc</span>
                    </div>
                    <div class="blog-img">
                        <img style="width: 100%; height: 500px;" src="<?php echo $detail[0]['AnhChinh'] ?>" alt="Blog Image">
                    </div>
                    <div class="blog-content-wrap">
                        <div class="share-links-wrap">
                            <div class="share-links">
                                <span class="share-links-title">Chia Sẻ</span>
                                <div class="multi-social">
                                    <a href="https://facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="https://linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://pinterest.com/" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                                </div><!-- End Social Share -->
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-info-wrap">
                                <button class="blog-info print_btn">
                                    Print :
                                    <i class="fas fa-print"></i>
                                </button>
                                <a class="blog-info" href="mailto:<?php echo $config[0]['Email'] ?>">
                                    Email :
                                    <i class="fas fa-envelope"></i>
                                </a>
                                <span class="blog-info"><?php echo $detail[0]['LuotXem'] ?> <i class="fas fa-eye"></i></span>
                            </div>
                            <div class="content">
                            	<?php echo $detail[0]['NoiDung'] ?>
                            </div>
                            <div class="blog-tag">
                                <h6 class="title">Loại Thẻ :</h6>
                                <div class="tagcloud">
                                	<?php foreach ($this->Model_The->getByIdPost($detail[0]['MaBaiViet']) as $key => $value): ?>
                                		<a href="<?php echo base_url('loai-the/'.$value['DuongDan'].'/') ?>"><?php echo $value['TenThe'] ?></a>
                                	<?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-navigation">
                	<?php if(count($prev) >= 1){ ?>
	                    <div class="nav-btn prev">
	                        <div class="img">
	                            <img style="width: 80px; height: 80px;" src="<?php echo $prev[0]['AnhChinh'] ?>" alt="blog img" class="nav-img">
	                        </div>
	                        <div class="media-body">
	                            <h5 class="title">
	                                <a class="hover-line" href="<?php echo base_url('bai-viet/'.$prev[0]['DuongDan'].'/') ?>"><?php echo $prev[0]['TieuDe'] ?></a>
	                            </h5>
	                            <a href="<?php echo base_url('bai-viet/'.$prev[0]['DuongDan'].'/') ?>" class="nav-text"><i class="fas fa-arrow-left me-2"></i>Trước</a>
	                        </div>
	                    </div>
	                <?php } ?>
                    <div class="divider"></div>
                    <?php if(count($next) >= 1){ ?>
	                    <div class="nav-btn next">
	                        <div class="img">
	                            <img style="width: 80px; height: 80px;" src="<?php echo $next[0]['AnhChinh'] ?>" alt="blog img" class="nav-img">
	                        </div>
	                        <div class="media-body">
	                            <h5 class="title">
	                                <a class="hover-line" href="<?php echo base_url('bai-viet/'.$next[0]['DuongDan'].'/') ?>"><?php echo $next[0]['TieuDe'] ?></a>
	                            </h5>
	                            <a href="<?php echo base_url('bai-viet/'.$next[0]['DuongDan'].'/') ?>" class="nav-text"><i class="fas fa-arrow-left me-2"></i>Trước</a>
	                        </div>
	                    </div>
	                <?php } ?>
                </div>
                <div class="blog-author">
                    <div class="auhtor-img">
                        <img style="width: 110px; height: 110px;" src="<?php echo $admin[0]['AnhChinh'] ?>" alt="Blog Author Image">
                    </div>
                    <div class="media-body">
                        <div class="author-top">
                            <div>
                                <h3 class="author-name"><a class="text-inherit" href="#"><?php echo $admin[0]['HoTen'] ?></a></h3>
                                <span class="author-desig">Tác Giả</span>
                            </div>
                            <div class="social-links">
                                <a href="https://facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="https://linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <p class="author-text">Email: <?php echo $admin[0]['Email'] ?></p>
                        <p class="author-text">Số Điện Thoại: <?php echo $admin[0]['SoDienThoai'] ?></p>
                    </div>
                </div>
                <div class="th-comments-wrap ">
                    <h2 class="blog-inner-title h3">Bình luận</h2>
                    <?php if(count($comment) <= 0){ ?>
                    	<p class="cmt-empty">Chưa có bình luận nào được đăng!</p>
                    <?php } ?>
                    <ul class="comment-list">
                    	<?php foreach ($comment as $key => $value): ?>
                    		<li class="th-comment-item">
	                            <div class="th-post-comment">
	                                <div class="comment-avater">
	                                    <img src="https://cdn.pixabay.com/photo/2023/02/18/11/00/icon-7797704_640.png" alt="Comment Author">
	                                </div>
	                                <div class="comment-content">
	                                    <span class="commented-on"><i class="fas fa-calendar-alt"></i><?php echo $value['ThoiGian'] ?></span>
	                                    <h3 class="name"><?php echo $value['HoTen'] ?></h3>
	                                    <p class="text"><?php echo $value['NoiDung'] ?></p>
	                                </div>
	                            </div>
	                        </li>
                    	<?php endforeach ?>
                    </ul>
                </div> <!-- Comment end --> <!-- Comment Form -->
                <div class="th-comment-form ">
                    <div class="form-title">
                        <h3 class="blog-inner-title mb-2">Viết Bình Luận</h3>
                        <p class="form-text">Email của bạn sẽ được chúng tôi giữ bí mật. Yêu cầu nhập đủ nội dung *</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input name="hoten" type="text" placeholder="Họ tên *" class="form-control" required>
                            <i class="far fa-user"></i>
                        </div>
                        <div class="col-md-6 form-group">
                            <input name="email" type="text" placeholder="Email *" class="form-control" required>
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="col-12 form-group">
                            <textarea name="noidung" placeholder="Nội dung *" class="form-control" required></textarea>
                            <i class="far fa-pencil"></i>
                        </div>
                        <div class="col-12 form-group mb-0">
                            <button class="th-btn cmt">Đăng Bình Luận</button>
                        </div>
                    </div>
                </div>
                <?php if(count($related) >= 1){ ?>
                    <div class="related-post-wrapper pt-30 mb-30">
                        <div class="">
    				        <div class="container">
    				            <div class="row align-items-center">
    				                <div class="col">
    				                    <h2 class="sec-title has-line">Bài Viết Liên Quan</h2>
    				                </div>
    				                <div class="col-auto">
    				                    <div class="sec-btn">
    				                        <div class="icon-box">
    				                            <button data-slick-prev="#blog-slide1" class="slick-arrow default"><i class="far fa-arrow-left"></i></button>
    				                            <button data-slick-next="#blog-slide1" class="slick-arrow default"><i class="far fa-arrow-right"></i></button>
    				                        </div>
    				                    </div>
    				                </div>
    				            </div>
    				            <div class="row th-carousel" id="blog-slide1" data-slide-show="3" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2">
    				                <?php foreach ($related as $key => $value): ?>
    				                    <div class="col-sm-4 col-xl-4">
    				                        <div class="blog-style1">
    				                            <div class="blog-img">
    				                                <img style="width: 100%; height: 187px;" src="<?php echo $value['AnhChinh']; ?>" alt="blog image">
    				                                <a style="font-family: system-ui;" data-theme-color="#00D084" href="<?php echo base_url('chuyen-muc/'.$value['DuongDanCM'].'/') ?>" class="category"><?php echo $value['TenChuyenMuc']; ?></a>
    				                            </div>
    				                            <h3 class="box-title-22"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/') ?>"><?php echo $value['TieuDe']; ?></a></h3>
    				                            <div class="blog-meta">
    				                                <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$value['ThoiGian'])[0]) ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$value['ThoiGian'])[0]; ?></a>
    				                            </div>
    				                        </div>
    				                    </div>
    				                <?php endforeach ?>
    				            </div>
    				        </div>
    				    </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-xxl-3 col-lg-4 sidebar-wrap">
                <aside class="sidebar-area">
                    <div class="widget widget_search  ">
                        <form action="<?php echo base_url('bai-viet/'); ?>" class="search-form">
                            <input type="text" name="timkiem" placeholder="Nhập tên bài viết">
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
<script type="text/javascript">
	$(document).ready(function(){
		$(".cmt").click(function(){
			var now = new Date();
			// Lấy thông tin ngày, tháng, năm
			var year = now.getFullYear();
			var month = (now.getMonth() + 1).toString().padStart(2, '0'); // Tháng bắt đầu từ 0 nên cộng thêm 1
			var day = now.getDate().toString().padStart(2, '0');

			// Lấy thông tin giờ, phút, giây
			var hours = now.getHours().toString().padStart(2, '0');
			var minutes = now.getMinutes().toString().padStart(2, '0');
			var seconds = now.getSeconds().toString().padStart(2, '0');

			// Định dạng thời gian theo yêu cầu "năm-tháng-ngày giờ:phút:giây"
			var thoigian = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;

			var hoten = $('[name="hoten"]').val();
			var email = $('[name="email"]').val();
			var noidung = $('[name="noidung"]').val();
			var mabaiviet = '<?php echo $detail[0]['MaBaiViet'] ?>';

			if((hoten == "") || (email == "") || (noidung == "")){
				alert("Vui lòng nhập đủ thông tin bình luận!");
				return;
			}

			$.post("<?php echo base_url('binh-luan/') ?>", {hoten,email,noidung,thoigian,mabaiviet}, function(data){
			    $('.comment-list').append('<li class="th-comment-item"> <div class="th-post-comment"> <div class="comment-avater"> <img src="https://cdn.pixabay.com/photo/2023/02/18/11/00/icon-7797704_640.png" alt="Comment Author"> </div> <div class="comment-content"> <span class="commented-on"><i class="fas fa-calendar-alt"></i>'+thoigian+'</span> <h3 class="name">'+hoten+'</h3> <p class="text">'+noidung+'</p> </div> </div> </li>')
			    $('.cmt-empty').remove();
			    $('[name="hoten"]').val('');
			    $('[name="email"]').val('');
			    $('[name="noidung"]').val('');
			});
		});
	});
</script>
