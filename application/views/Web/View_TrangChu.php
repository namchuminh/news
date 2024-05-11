<!doctype html>
<html class="no-js" data-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $config[0]['TenWebsite']; ?> - <?php echo $title; ?></title>
    <meta name="author" content="Tnews">
    <meta name="description" content="Tnews - News & Magazine HTML Template">
    <meta name="keywords" content="Tnews - News & Magazine HTML Template">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $config[0]['Favicon']; ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $config[0]['Favicon']; ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $config[0]['Favicon']; ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $config[0]['Favicon']; ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $config[0]['Favicon']; ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $config[0]['Favicon']; ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $config[0]['Favicon']; ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $config[0]['Favicon']; ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $config[0]['Favicon']; ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo $config[0]['Favicon']; ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $config[0]['Favicon']; ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $config[0]['Favicon']; ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $config[0]['Favicon']; ?>">
    <link rel="manifest" href="<?php echo base_url('public/web/'); ?>assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo base_url('public/web/'); ?>assets/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/bootstrap.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/fontawesome.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/magnific-popup.min.css">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/slick.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/style.css">

</head>

<body>

    <div class="sidemenu-wrapper sidemenu-1 d-none d-md-block ">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget  ">
                <div class="th-widget-about">
                    <div class="about-logo">
                        <a href="<?php echo base_url(); ?>"><img class="light-img" style="width: 143px; height: 60px;" src="<?php echo $config[0]['Logo']; ?>" alt="Tnews"></a>
                        <a href="<?php echo base_url(); ?>"><img class="dark-img" style="width: 143px; height: 60px;" src="<?php echo $config[0]['Logo']; ?>" alt="Tnews"></a>
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
            <div class="widget  ">
                <h3 class="widget_title">Bài Đăng Gần Đây</h3>
                <div class="recent-post-wrap">
                    <?php foreach ($recent as $key => $value): ?>
                        <div class="recent-post">
                            <div class="media-img">
                                <a href="<?php echo $value['DuongDan'] ?>"><img width="80" style="height: 80px;" src="<?php echo $value['AnhChinh'] ?>" alt="Blog Image"></a>
                            </div>
                            <div class="media-body">
                                <h4 class="post-title"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TieuDe'] ?></a></h4>
                                <div class="recent-post-meta">
                                    <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$value['ThoiGian'])[0].'/'); ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$value['ThoiGian'])[0]; ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="widget newsletter-widget  ">
                <h3 class="widget_title">Đăng Ký</h3>
                <p class="footer-text">Đăng ký với chúng tôi để nhận các tin tức mới nhất.</p>
                <form class="newsletter-form">
                    <input class="form-control" type="email" placeholder="Nhập Email" required="">
                    <button type="submit" class="icon-btn"><i class="fa-solid fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="popup-search-box">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" placeholder="Bạn đang tìm kiếm thông tin gì?">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div><!--==============================
    Mobile Menu
  ============================== -->
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="home-newspaper.html"><img src="<?php echo base_url('public/web/'); ?>assets/img/logo.svg" alt="Tnews"></a>
            </div>
            <div class="th-mobile-menu">
                <ul>
                    <li>
                        <a href="<?php echo base_url(); ?>">Trang Chủ</a>
                    </li>       
                    <?php foreach ($category as $key => $value): ?>
                        <li>
                            <a href="<?php echo base_url('chuyen-muc/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TenChuyenMuc']; ?></a>
                        </li>
                    <?php endforeach ?>         
                    <li>
                        <a href="<?php echo base_url('lien-he/'); ?>">Liên Hệ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div><!--==============================
	Header Area
==============================-->
    <header class="th-header header-layout1">
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                    <div class="col-auto d-none d-lg-block">
                        <div class="header-links">
                            <ul>
                                <li><a href="#">Chính Sách</a></li>
                                <li><a href="#">Giới Thiệu</a></li>
                                <li><a href="#">Liên Hệ</a></li>
                                <li>
                                    <a class="theme-toggler" href="#">
                                        <span class="dark"><i class="fas fa-moon"></i>Chế Độ Sáng</span>
                                        <span class="light"><i class="fas fa-sun-bright"></i>Chế Độ Tối</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-links">
                            <ul>
                                <li>
                                    <div class="social-links">
                                        <a href="<?php echo $config[0]['Facebook']; ?>"><i class="fab fa-facebook-f"></i></a>
                                        <a href="<?php echo $config[0]['X']; ?>"><i class="fab fa-twitter"></i></a>
                                        <a href="<?php echo $config[0]['Linkedin']; ?>"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="<?php echo $config[0]['Instagram']; ?>"><i class="fab fa-instagram"></i></a>
                                        <a href="<?php echo $config[0]['Youtube']; ?>"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-between align-items-center">
                    <div class="col-auto d-none d-lg-block">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="home-newspaper.html"><img class="light-img" src="<?php echo base_url('public/web/'); ?>assets/img/logo.svg" alt="Tnews"></a>
                                <a href="home-newspaper.html"><img class="dark-img" src="<?php echo base_url('public/web/'); ?>assets/img/logo-white.svg" alt="Tnews"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 text-end">
                        <div class="header-ads">
                            <?php if(count($bannerMid) >= 1){ ?>
                                <a href="<?php echo $bannerMid[0]['DuongDan']; ?>">
                                    <img style="height: 60px; width: 700px;" class="light-img" src="<?php echo $bannerMid[0]['HinhAnh']; ?>" alt="ads">
                                    <img style="height: 60px; width: 700px;" class="dark-img" src="<?php echo $bannerMid[0]['HinhAnh']; ?>" alt="ads">
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-wrapper">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto d-lg-none d-block">
                            <div class="header-logo">
                                <a href="home-newspaper.html"><img src="<?php echo base_url('public/web/'); ?>assets/img/logo-white.svg" alt="Tnews"></a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li>
                                        <a style="font-family: system-ui;" href="<?php echo base_url(); ?>">Trang Chủ</a>
                                    </li>       
                                    <?php foreach ($category as $key => $value): ?>
                                        <li>
                                            <a style="font-family: system-ui;" href="<?php echo base_url('chuyen-muc/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TenChuyenMuc']; ?></a>
                                        </li>
                                    <?php endforeach ?>         
                                    <li>
                                        <a style="font-family: system-ui;" href="<?php echo base_url('lien-he/'); ?>">Liên Hệ</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-auto">
                            <div class="header-button">
                                <button type="button" class="simple-icon searchBoxToggler"><i class="far fa-search"></i></button>
                                <a href="#" class="icon-btn sideMenuToggler d-none d-lg-block"><i class="far fa-bars"></i></a>
                                <button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header><!--==============================
News Area 
==============================-->
    <div>
        <div class="container">
            <div class="news-area">
                <div class="title">Breaking News :</div>
                <div class="news-wrap">
                    <div class="row slick-marquee">
                        <div class="col-auto">
                            <a href="blog-details.html" class="breaking-news">Relaxation redefined, your beach resort sanctuary.</a>
                        </div>
                        <div class="col-auto">
                            <a href="blog-details.html" class="breaking-news">From health to fashion, lifestyle news curated.</a>
                        </div>
                        <div class="col-auto">
                            <a href="blog-details.html" class="breaking-news">Sun, sand, and luxury at our resort</a>
                        </div>
                        <div class="col-auto">
                            <a href="blog-details.html" class="breaking-news">Relaxation redefined, your beach resort sanctuary.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--==============================
Blog Area  
==============================-->
<?php if(count($postMain) >= 1){ ?>
    <section class="space">
        <div class="container">
            <div class="row">
                <div class="col-xl-3">
                    <div class="row gy-4">
                        <?php if(count($postSmall) >= 1){ ?>
                            <div class="col-xl-12 col-sm-6 border-blog dark-theme img-overlay2">
                                <div class="blog-style3">
                                    <div class="blog-img">
                                        <img style="width: 288px; height: 288px;" src="<?php echo $postSmall[0]['AnhChinh']; ?>" alt="blog image">
                                    </div>
                                    <div class="blog-content">
                                        <a style="font-family: system-ui;" data-theme-color="#FF9500" href="<?php echo base_url('chuyen-muc/'.$postSmall[0]['DuongDanCM'].'/') ?>" class="category"><?php echo $postSmall[0]['TenChuyenMuc']; ?></a>
                                        <h3 class="box-title-30"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$postSmall[0]['DuongDan'].'/'); ?>"><?php echo $postSmall[0]['TieuDe']; ?></a></h3>
                                        <div class="blog-meta">
                                            <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$postSmall[0]['ThoiGian'])[0]); ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$postSmall[0]['ThoiGian'])[0]; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if(count($postSmall) >= 2){ ?>
                            <div class="col-xl-12 col-sm-6 border-blog dark-theme img-overlay2">
                                <div class="blog-style3">
                                    <div class="blog-img">
                                        <img style="width: 288px; height: 288px;" src="<?php echo $postSmall[1]['AnhChinh']; ?>" alt="blog image">
                                    </div>
                                    <div class="blog-content">
                                        <a style="font-family: system-ui;" data-theme-color="#FF9500" href="<?php echo base_url('chuyen-muc/'.$postSmall[1]['DuongDanCM'].'/') ?>" class="category"><?php echo $postSmall[1]['TenChuyenMuc']; ?></a>
                                        <h3 class="box-title-30"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$postSmall[1]['DuongDan'].'/'); ?>"><?php echo $postSmall[1]['TieuDe']; ?></a></h3>
                                        <div class="blog-meta">
                                            <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$postSmall[1]['ThoiGian'])[0]); ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$postSmall[1]['ThoiGian'])[0]; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xl-6 mt-4 mt-xl-0">
                    <div class="dark-theme img-overlay2">
                        <div class="blog-style3">
                            <div class="blog-img">
                                <img style="width: 600px; height: 625px;" src="<?php echo $postMain[0]['AnhChinh']; ?>" alt="blog image">
                            </div>
                            <div class="blog-content">
                                <a data-theme-color="#FF9500" href="<?php echo base_url('chuyen-muc/'.$postMain[0]['DuongDanCM'].'/') ?>" class="category"><?php echo $postMain[0]['TenChuyenMuc']; ?></a>
                                <h3 class="box-title-30"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$postMain[0]['DuongDan'].'/'); ?>"><?php echo $postMain[0]['TieuDe']; ?></a></h3>
                                <div class="blog-meta">
                                    <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$postMain[0]['ThoiGian'])[0]); ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$postMain[0]['ThoiGian'])[0]; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mt-35 mt-xl-0">
                    <div class="nav tab-menu indicator-active" role="tablist">
                        <button class="tab-btn active" id="nav-one-tab" data-bs-toggle="tab" data-bs-target="#nav-one" type="button" role="tab" aria-controls="nav-one" aria-selected="true">XEM NHIỀU</button>
                        <button class="tab-btn" id="nav-two-tab" data-bs-toggle="tab" data-bs-target="#nav-two" type="button" role="tab" aria-controls="nav-two" aria-selected="false">Gần Đây</button>
                    </div>
                    <div class="tab-content">
                        <!-- Single item -->
                        <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                            <div class="row gy-4">
                                <?php foreach ($top as $key => $value): ?>
                                    <div class="col-xl-12 col-md-6 border-blog">
                                        <div class="blog-style2">
                                            <div class="blog-img">
                                                <img style="width: 100px; height: 100px;" src="<?php echo $value['AnhChinh']; ?>" alt="blog image">
                                            </div>
                                            <div class="blog-content">
                                                <a style="font-family: system-ui;" data-theme-color="#FF9500" href="<?php echo base_url('chuyen-muc/'.$value['DuongDanCM'].'/'); ?>" class="category"><?php echo $value['TenChuyenMuc']; ?></a>
                                                <h3 class="box-title-18"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/') ?>"><?php echo $value['TieuDe']; ?></a></h3>
                                                <div class="blog-meta">
                                                    <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$value['ThoiGian'])[0]) ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$value['ThoiGian'])[0]; ?></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <!-- Single item -->
                        <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
                            <div class="row gy-4">
                                <?php foreach ($recent as $key => $value): ?>
                                    <div class="col-xl-12 col-md-6 border-blog">
                                        <div class="blog-style2">
                                            <div class="blog-img">
                                                <img style="width: 100px; height: 100px;" src="<?php echo $value['AnhChinh']; ?>" alt="blog image">
                                            </div>
                                            <div class="blog-content">
                                                <a style="font-family: system-ui;" data-theme-color="#FF9500" href="<?php echo base_url('chuyen-muc/'.$value['DuongDanCM'].'/'); ?>" class="category"><?php echo $value['TenChuyenMuc']; ?></a>
                                                <h3 class="box-title-18"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/') ?>"><?php echo $value['TieuDe']; ?></a></h3>
                                                <div class="blog-meta">
                                                    <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$value['ThoiGian'])[0]) ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$value['ThoiGian'])[0]; ?></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php endforeach ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }else{ ?>
    <br>
<?php } ?>
    <div class="">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="sec-title has-line">Xu Hướng</h2>
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
            <div class="row th-carousel" id="blog-slide1" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2">
                <?php foreach ($trending as $key => $value): ?>
                    <div class="col-sm-6 col-xl-4">
                        <div class="blog-style1">
                            <div class="blog-img">
                                <img style="width: 288px; height: 187px;" src="<?php echo $value['AnhChinh']; ?>" alt="blog image">
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
    </div><!--==============================
Blog Area  
==============================-->
<?php $i = 1; ?>
<?php foreach ($categoryHome as $key => $value): ?>
    <?php if($key == 2){ ?>
        <?php break; ?>
    <?php } ?> 
    <?php $chuyenmuccha = $value['MaChuyenMuc']; ?>
    <?php if($key == 0){ ?>
        <?php if(count($this->Model_BaiViet->getByIdCategoryParent($chuyenmuccha)) >= 1){ ?>
            <section class="space">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="sec-title has-line"><?php echo $value['TenChuyenMuc']; ?></h2>
                        </div>
                        <div class="col-auto">
                            <div class="sec-btn">
                                <div class="filter-menu filter-menu-active1">
                                    <button data-filter=".all" class="tab-btn active" type="button">Tất Cả</button>
                                    <?php foreach ($this->Model_ChuyenMuc->getByIdParent($chuyenmuccha) as $key => $value): ?>
                                        <?php $chuyenmuccon = $value['MaChuyenMuc']; ?>
                                        <?php if(count($this->Model_BaiViet->getByIdCategory($chuyenmuccon)) >= 1){ ?>
                                            <button data-filter=".id<?php echo $value['MaChuyenMuc']; ?>" class="tab-btn" type="button"><?php echo $value['TenChuyenMuc']; ?></button>
                                        <?php } ?>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-active-cat1">
                        <div class="row filter-item active-filter all w-100">
                            <?php if(count($this->Model_BaiViet->getByIdCategory($chuyenmuccha)) >= 1){ ?>
                                <?php $postMain = $this->Model_BaiViet->getByIdCategory($chuyenmuccha); ?>
                                <div class="col-xl-6 mb-35 mb-xl-0">
                                    <div class="">
                                        <div class="blog-style1 style-big">
                                            <div class="blog-img">
                                                <img style="width: 100%; height: 490px;" src="<?php echo $postMain[0]['AnhChinh'] ?>" alt="blog image">
                                                <a style="font-family: system-ui;" data-theme-color="#007BFF" href="<?php echo base_url('chuyen-muc/'.$postMain[0]['DuongDanCM'].'/'); ?>" class="category"><?php echo $postMain[0]['TenChuyenMuc'] ?></a>
                                            </div>
                                            <h3 class="box-title-30"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$postMain[0]['DuongDan'].'/'); ?>"><?php echo $postMain[0]['TieuDe'] ?></a></h3>
                                            <div class="blog-meta">
                                                <a href="#" style="font-family: system-ui;"><i class="far fa-user"></i>Đăng bởi: Admin</a>
                                                <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$postSmall[0]['ThoiGian'])[0]); ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$postSmall[0]['ThoiGian'])[0]; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-xl-6">
                                <div class="row gy-4">
                                    <?php foreach ($this->Model_BaiViet->getByIdCategoryParent($chuyenmuccha) as $key => $value): ?>
                                        <div class="col-xl-6 col-sm-6 border-blog two-column">
                                            <div class="blog-style1">
                                                <div class="blog-img">
                                                    <img style="width: 288px; height: 187px;" src="<?php echo $value['AnhChinh'] ?>" alt="blog image">
                                                    <a style="font-family: system-ui;" data-theme-color="#4E4BD0" href="<?php echo base_url('bai-viet/'.$value['DuongDanCM'].'/'); ?>" class="category"><?php echo $value['TenChuyenMuc'] ?></a>
                                                </div>
                                                <h3 class="box-title-22"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TieuDe'] ?></a></h3>
                                                <div class="blog-meta">
                                                    <a href="#" style="font-family: system-ui;"><i class="far fa-user"></i>Đăng bởi: Admin</a>
                                                    <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$value['ThoiGian'])[0]); ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$value['ThoiGian'])[0]; ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>

                        <?php foreach ($this->Model_ChuyenMuc->getByIdParent($chuyenmuccha) as $key => $value): ?>
                            <?php $chuyenmuccon = $value['MaChuyenMuc']; ?>
                            <div class="row filter-item w-100 id<?php echo $value['MaChuyenMuc']; ?>">
                                <?php if(count($this->Model_BaiViet->getByIdCategory($chuyenmuccon)) >= 1){ ?>
                                    <?php $postMain = $this->Model_BaiViet->getByIdCategory($chuyenmuccon); ?>
                                    <div class="col-xl-6 mb-35 mb-xl-0">
                                        <div class="">
                                            <div class="blog-style1 style-big">
                                                <div class="blog-img">
                                                    <img style="width: 100%; height: 490px;" src="<?php echo $postMain[0]['AnhChinh'] ?>" alt="blog image">
                                                    <a style="font-family: system-ui;" data-theme-color="#007BFF" href="<?php echo base_url('chuyen-muc/'.$postMain[0]['DuongDanCM'].'/'); ?>" class="category"><?php echo $postMain[0]['TenChuyenMuc'] ?></a>
                                                </div>
                                                <h3 class="box-title-30"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$postMain[0]['DuongDan'].'/'); ?>"><?php echo $postMain[0]['TieuDe'] ?></a></h3>
                                                <div class="blog-meta">
                                                    <a href="#" style="font-family: system-ui;"><i class="far fa-user"></i>Đăng bởi: Admin</a>
                                                    <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$postSmall[0]['ThoiGian'])[0]); ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$postSmall[0]['ThoiGian'])[0]; ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-xl-6">
                                    <div class="row gy-4">
                                        <?php foreach ($this->Model_BaiViet->getByIdCategory($chuyenmuccon) as $key => $value): ?>
                                            <?php if($key >= 1){ ?>
                                                <div class="col-xl-6 col-sm-6 border-blog two-column">
                                                    <div class="blog-style1">
                                                        <div class="blog-img">
                                                            <img style="width: 288px; height: 187px;" src="<?php echo $value['AnhChinh'] ?>" alt="blog image">
                                                            <a style="font-family: system-ui;" data-theme-color="#4E4BD0" href="<?php echo base_url('bai-viet/'.$value['DuongDanCM'].'/'); ?>" class="category"><?php echo $value['TenChuyenMuc'] ?></a>
                                                        </div>
                                                        <h3 class="box-title-22"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TieuDe'] ?></a></h3>
                                                        <div class="blog-meta">
                                                            <a href="#" style="font-family: system-ui;"><i class="far fa-user"></i>Đăng bởi: Admin</a>
                                                            <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$value['ThoiGian'])[0]); ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$value['ThoiGian'])[0]; ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </section>
        <?php } ?>
    <?php }else{ ?>
        <section class="space">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <h2 class="sec-title has-line"><?php echo $value['TenChuyenMuc']; ?></h2>
                        <div class="row gy-4">
                            <?php foreach ($this->Model_BaiViet->getByIdCategoryParent($chuyenmuccha) as $key => $value): ?>
                                <?php if($key == 2){ ?>
                                    <?php break; ?>
                                <?php } ?>
                                <div class="col-sm-6 border-blog two-column">
                                    <div class="blog-style1">
                                        <div class="blog-img">
                                            <img style="width: 392px; height: 310px;" src="<?php echo $value['AnhChinh'] ?>" alt="blog image">
                                            <a style="font-family: system-ui;" data-theme-color="#4E4BD0" href="<?php echo base_url('bai-viet/'.$value['DuongDanCM'].'/'); ?>" class="category"><?php echo $value['TenChuyenMuc'] ?></a>
                                        </div>
                                        <h3 class="box-title-23"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TieuDe'] ?></a></h3>
                                        <div class="blog-meta">
                                            <a style="font-family: system-ui;" href="#"><i class="far fa-user"></i>Người đăng: Admin</a>
                                            <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$value['ThoiGian'])[0]); ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$value['ThoiGian'])[0]; ?></a>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach ?>

                        </div>
                    </div>
                    <div class="col-xl-4 mt-35 mt-xl-0">
                        <div class="nav tab-menu indicator-active" role="tablist">
                            <button class="tab-btn active" id="nav2-one-tab" data-bs-toggle="tab" data-bs-target="#nav2-one" type="button" role="tab" aria-controls="nav2-one" aria-selected="true">Xem Nhiều</button>
                            <button class="tab-btn" id="nav2-two-tab" data-bs-toggle="tab" data-bs-target="#nav2-two" type="button" role="tab" aria-controls="nav2-two" aria-selected="false">Phổ Biến</button>
                            <button class="tab-btn" id="nav2-three-tab" data-bs-toggle="tab" data-bs-target="#nav2-three" type="button" role="tab" aria-controls="nav2-three" aria-selected="false">Nổi Bật</button>
                        </div>
                        <div class="tab-content">
                            <!-- Single item -->
                            <div class="tab-pane fade show active" id="nav2-one" role="tabpanel" aria-labelledby="nav2-one-tab">
                                <div class="row gy-4">
                                    <?php foreach ($this->Model_BaiViet->getByIdCategoryParentTopView($chuyenmuccha) as $key => $value): ?>
                                        <?php if($key == 3){ ?>
                                            <?php break; ?>
                                        <?php } ?>
                                        <div class="col-xl-12 col-md-6 border-blog">
                                            <div class="blog-style2">
                                                <div class="blog-img">
                                                    <img style="width: 100px; height: 100px;" src="<?php echo $value['AnhChinh'] ?>" alt="blog image">
                                                </div>
                                                <div class="blog-content">
                                                    <a style="font-family: system-ui;" data-theme-color="#4E4BD0" href="<?php echo base_url('bai-viet/'.$value['DuongDanCM'].'/'); ?>" class="category"><?php echo $value['TenChuyenMuc'] ?></a>
                                                    <h3 class="box-title-20"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TieuDe'] ?></a></h3>
                                                    <div class="blog-meta">
                                                        <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$value['ThoiGian'])[0]); ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$value['ThoiGian'])[0]; ?></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <!-- Single item -->
                            <div class="tab-pane fade" id="nav2-two" role="tabpanel" aria-labelledby="nav2-two-tab">
                                <div class="row gy-4">
                                    <?php foreach ($this->Model_BaiViet->getByIdCategoryParentPopular($chuyenmuccha) as $key => $value): ?>
                                        <?php if($key == 3){ ?>
                                            <?php break; ?>
                                        <?php } ?>
                                        <div class="col-xl-12 col-md-6 border-blog">
                                            <div class="blog-style2">
                                                <div class="blog-img">
                                                    <img style="width: 100px; height: 100px;" src="<?php echo $value['AnhChinh'] ?>" alt="blog image">
                                                </div>
                                                <div class="blog-content">
                                                    <a style="font-family: system-ui;" data-theme-color="#4E4BD0" href="<?php echo base_url('bai-viet/'.$value['DuongDanCM'].'/'); ?>" class="category"><?php echo $value['TenChuyenMuc'] ?></a>
                                                    <h3 class="box-title-20"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TieuDe'] ?></a></h3>
                                                    <div class="blog-meta">
                                                        <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$value['ThoiGian'])[0]); ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$value['ThoiGian'])[0]; ?></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <!-- Single item -->
                            <div class="tab-pane fade" id="nav2-three" role="tabpanel" aria-labelledby="nav2-three-tab">
                                <div class="row gy-4">
                                    <?php foreach ($this->Model_BaiViet->getByIdCategoryParentHot($chuyenmuccha) as $key => $value): ?>
                                        <?php if($key == 3){ ?>
                                            <?php break; ?>
                                        <?php } ?>
                                        <div class="col-xl-12 col-md-6 border-blog">
                                            <div class="blog-style2">
                                                <div class="blog-img">
                                                    <img style="width: 100px; height: 100px;" src="<?php echo $value['AnhChinh'] ?>" alt="blog image">
                                                </div>
                                                <div class="blog-content">
                                                    <a style="font-family: system-ui;" data-theme-color="#4E4BD0" href="<?php echo base_url('bai-viet/'.$value['DuongDanCM'].'/'); ?>" class="category"><?php echo $value['TenChuyenMuc'] ?></a>
                                                    <h3 class="box-title-20"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TieuDe'] ?></a></h3>
                                                    <div class="blog-meta">
                                                        <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$value['ThoiGian'])[0]); ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$value['ThoiGian'])[0]; ?></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

<?php $i++; ?>
<?php endforeach ?>
<?php if(count($bannerMid) >= 1){ ?>
    <div class="container">
        <a href="<?php echo $bannerMid[0]['DuongDan']; ?>">
            <img src="<?php echo $bannerMid[0]['HinhAnh']; ?>" style="height: 100px;" alt="ads" class="w-100">
        </a>
    </div>
<?php } ?>
<!--==============================
Blog Area  
==============================-->

    <section class="space">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="sec-title has-line">Mới Nhất</h2>
                        </div>
                    </div>
                    <div class="filter-active">
                        <?php foreach ($news as $key => $value): ?>
                            <div class="border-blog2 filter-item cat1">
                                <div class="blog-style4">
                                    <div class="blog-img">
                                        <img style="width: 300px; height: 200px;" src="<?php echo $value['AnhChinh'] ?>" alt="blog image">
                                    </div>
                                    <div class="blog-content">
                                        <a style="font-family: system-ui;" data-theme-color="#4E4BD0" href="<?php echo base_url('bai-viet/'.$value['DuongDanCM'].'/'); ?>" class="category"><?php echo $value['TenChuyenMuc'] ?></a>
                                        <h3 class="box-title-24"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TieuDe'] ?></a></h3>
                                        <p class="blog-text"><?php echo substr(strip_tags($value['NoiDung']), 0, 133); ?></p>
                                        <div class="blog-meta">
                                            <a href="#" style="font-family: system-ui;"><i class="far fa-user"></i>Đăng bởi: Admin</a>
                                            <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$value['ThoiGian'])[0]); ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$value['ThoiGian'])[0]; ?></a>
                                        </div>
                                </div>

                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="col-xl-3 mt-35 mt-xl-0 mb-10 sidebar-wrap">
                    <div class="sidebar-area">
                        <?php if(count($bannerWidget) >= 1){ ?>
                            <div class="widget mb-30">
                                <div class="widget-ads">
                                    <a href="<?php echo $bannerWidget[0]['DuongDan'] ?>">
                                        <img style="height: 350px;" class="w-100" src="<?php echo $bannerWidget[0]['HinhAnh'] ?>" alt="ads">
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="widget newsletter-widget2 mb-30" data-bg-src="<?php echo base_url('public/web/'); ?>assets/img/bg/particle_bg_1.png">
                            <h3 class="box-title-24">Đăng Ký Nhận Tin</h3>
                            <form class="newsletter-form">
                                <input class="form-control" type="email" placeholder="Nhập Email" required="">
                                <button type="submit" class="th-btn btn-fw">Đăng Ký</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div class="space-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="sec-title has-line">Phổ Biến & Nổi Bật</h2>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <div class="icon-box">
                            <button data-slick-prev="#blog-slide3" class="slick-arrow default"><i class="far fa-arrow-left"></i></button>
                            <button data-slick-next="#blog-slide3" class="slick-arrow default"><i class="far fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row th-carousel" id="blog-slide3" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1">
                <?php foreach ($popular as $key => $value): ?>
                    <div class="col-sm-6 col-xl-4">
                        <div class="blog-style1">
                            <div class="blog-img">
                                <img style="width: 392px; height: 310px;" src="<?php echo $value['AnhChinh'] ?>" alt="blog image">
                            </div>
                            <div class="blog-content">
                                <a style="font-family: system-ui;" data-theme-color="#4E4BD0" href="<?php echo base_url('bai-viet/'.$value['DuongDanCM'].'/'); ?>" class="category"><?php echo $value['TenChuyenMuc'] ?></a>
                                <h3 class="box-title-24"><a class="hover-line" href="<?php echo base_url('bai-viet/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TieuDe'] ?></a></h3>
                                <div class="blog-meta">
                                    <a href="#" style="font-family: system-ui;"><i class="far fa-user"></i>Đăng bởi: Admin</a>
                                    <a href="<?php echo base_url('bai-viet/?thoigian='.explode(' ',$value['ThoiGian'])[0]); ?>"><i class="fal fa-calendar-days"></i><?php echo explode(' ',$value['ThoiGian'])[0]; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div><!--==============================
	Footer Area
==============================-->
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
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img src="<?php echo base_url('public/web/'); ?>assets/img/blog/recent-post-2-1.jpg" alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="hover-line" href="blog-details.html">Equality and justice for Every citizen</a></h4>
                                        <div class="recent-post-meta">
                                            <a href="blog.html"><i class="fal fa-calendar-days"></i>21 June, 2023</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img src="<?php echo base_url('public/web/'); ?>assets/img/blog/recent-post-2-2.jpg" alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="hover-line" href="blog-details.html">Key eyes on the latest update of technology</a></h4>
                                        <div class="recent-post-meta">
                                            <a href="blog.html"><i class="fal fa-calendar-days"></i>22 June, 2023</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="widget widget_tag_cloud footer-widget">
                            <h3 class="widget_title">Loại Thẻ</h3>
                            <div class="tagcloud">
                                <a href="blog.html">Sports</a>
                                <a href="blog.html">Politics</a>
                                <a href="blog.html">Business</a>
                                <a href="blog.html">Music</a>
                                <a href="blog.html">Food</a>
                                <a href="blog.html">Technology</a>
                                <a href="blog.html">Travels</a>
                                <a href="blog.html">Health</a>
                                <a href="blog.html">Fashions</a>
                                <a href="blog.html">Animal</a>
                                <a href="blog.html">Weather</a>
                                <a href="blog.html">Movies</a>
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