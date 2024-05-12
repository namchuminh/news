    <footer class="footer-wrapper footer-layout1">
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo">
                                    <a href="<?php echo base_url(); ?>"><img style="width: 142px; height: 36px" src="<?php echo $config[0]['Logo']; ?>" alt="Tnews"></a>
                                </div>
                                <p class="about-text"><?php echo $config[0]['MoTaWebsite']; ?></p>
                                <div class="th-social style-black">
                                    <a href="<?php echo $config[0]['Facebook']; ?>"><i class="fab fa-facebook-f"></i></a>
                                    <a href="<?php echo $config[0]['Youtube']; ?>"><i class="fab fa-youtube"></i></a>
                                    <a href="<?php echo $config[0]['Instagram']; ?>"><i class="fab fa-instagram"></i></a>
                                    <a href="<?php echo $config[0]['X']; ?>"><i class="fab fa-twitter"></i></a>
                                    <a href="<?php echo $config[0]['Linkedin']; ?>"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Chuyên Mục</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <?php foreach ($categoryFooter as $key => $value): ?>
                                        <li><a href="<?php echo base_url('chuyen-muc/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TenChuyenMuc']; ?></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Bài Viết Mới</h3>
                            <div class="recent-post-wrap">
                                <?php foreach ($recent as $key => $value): ?>
                                    <?php if($key == 2){ ?>
                                        <?php break; ?>
                                    <?php } ?>
                                    <div class="recent-post">
                                        <div class="media-img">
                                            <a href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/'); ?>"><img style="height: 80px;" src="<?php echo $value['AnhChinh'] ?>" alt="Blog Image"></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="post-title"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TieuDe'] ?></a></h4>
                                            <div class="recent-post-meta">
                                                <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$value['ThoiGian'])[0]); ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$value['ThoiGian'])[0]; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="widget widget_tag_cloud footer-widget">
                            <h3 class="widget_title">Loại Thẻ</h3>
                            <div class="tagcloud">
                                <?php foreach ($tagFooter as $key => $value): ?>
                                    <a href="<?php echo base_url('loai-the/'.$value['DuongDan'].'/') ?>"><?php echo $value['TenThe'] ?></a>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row jusity-content-between align-items-center">
                    <div class="col-lg-5">
                        <p class="copyright-text">Bản quyền thuộc <i class="fal fa-copyright"></i> <a href="<?php echo base_url(); ?>"><?php echo $config[0]['TenWebsite']; ?></a> | 2024 - 2025 |</p>
                    </div>
                    <div class="col-lg-auto ms-auto d-none d-lg-block">
                        <div class="footer-links">
                            <ul>
                                <li><a href="<?php echo base_url(); ?>">Trang Chủ</a></li>
                                <li><a href="<?php echo base_url(); ?>">Giới Thiệu</a></li>
                                <li><a href="<?php echo base_url(); ?>">Chính Sách</a></li>
                                <li><a href="<?php echo base_url('lien-he/'); ?>">Liên Hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--********************************
			Code End  Here 
	******************************** -->

    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>

    <!--==============================
    All Js File
============================== -->
    <!-- Jquery -->
    <script src="<?php echo base_url('public/web/'); ?>assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- Slick Slider -->
    <script src="<?php echo base_url('public/web/'); ?>assets/js/slick.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('public/web/'); ?>assets/js/bootstrap.min.js"></script>
    <!-- Magnific Popup -->
    <script src="<?php echo base_url('public/web/'); ?>assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Counter Up -->
    <script src="<?php echo base_url('public/web/'); ?>assets/js/jquery.counterup.min.js"></script>
    <!-- Range Slider -->
    <script src="<?php echo base_url('public/web/'); ?>assets/js/jquery-ui.min.js"></script>
    <!-- Isotope Filter -->
    <script src="<?php echo base_url('public/web/'); ?>assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url('public/web/'); ?>assets/js/isotope.pkgd.min.js"></script>
    <!-- Vimeo Player -->
    <script src="<?php echo base_url('public/web/'); ?>assets/js/vimeo_player.js"></script>

    <!-- Main Js File -->
    <script src="<?php echo base_url('public/web/'); ?>assets/js/main.js"></script>
</body>

</html>