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
        <form action="<?php echo base_url('bai-viet/') ?>">
            <input type="text" name="timkiem" placeholder="Bạn đang tìm kiếm thông tin gì?">
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
    </header>