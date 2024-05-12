<?php require(APPPATH.'views/Web/layouts/header.php'); ?>
<div class="breadcumb-wrapper">
    <div class="container">
        <ul class="breadcumb-menu">
            <li><a href="<?php echo base_url(); ?>">Trang Chủ</a></li>
            <li>Liên Hệ</li>
        </ul>
    </div>
</div>
<div class="space2">
    <div class="container">
        <div class="row">
            <div class="col-xl-5">
                <div class="pe-xxl-4 me-xl-3 text-center text-xl-start mb-40 mb-lg-0">
                    <div class="title-area mb-32">
                        <h2 class="sec-title2">Thông Tin Liên Hệ</h2>
                        <p class="sec-text">Bạn có thể liên hệ với chúng tôi qua thông tin bên dưới hoặc có thể gửi nội dung cho chúng tôi biết bên form bên phải!</p>
                    </div>
                    <div class="contact-feature-wrap">
                        <div class="contact-feature">
                            <div class="box-icon">
                                <img src="<?php echo base_url('public/web/') ?>assets/img/icon/contact_1_1.svg" alt="icon">
                            </div>
                            <div class="box-content">
                                <h3 class="box-title-22">Địa Chỉ</h3>
                                <p class="box-text"><?php echo $config[0]['DiaChi'] ?></p>
                            </div>
                        </div>
                        <div class="contact-feature">
                            <div class="box-icon">
                                <img src="<?php echo base_url('public/web/') ?>assets/img/icon/contact_1_2.svg" alt="icon">
                            </div>
                            <div class="box-content">
                                <h3 class="box-title-22">Email</h3>
                                <p class="box-text">
                                    <a href="mailto:<?php echo $config[0]['Email'] ?>"><?php echo $config[0]['Email'] ?></a>
                                </p>
                            </div>
                        </div>
                        <div class="contact-feature">
                            <div class="box-icon">
                                <img src="<?php echo base_url('public/web/') ?>assets/img/icon/contact_1_3.svg" alt="icon">
                            </div>
                            <div class="box-content">
                                <h3 class="box-title-22">Số Điện Thoại</h3>
                                <p class="box-text">
                                    <a href="tel:<?php echo $config[0]['SoDienThoai'] ?>"><?php echo $config[0]['SoDienThoai'] ?></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="quote-form-box">
                    <h4 class="form-title">Gửi Liên Hệ</h4>
                    <form method="POST" class="contact-form ajax-contact">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="hoten" id="hoten" placeholder="Họ tên" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="tel" class="form-control" name="sodienthoai" id="sodienthoai" placeholder="Số điện thoại" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="tel" class="form-control" name="tieude" id="tieude" placeholder="Tiêu đề liên hệ" required>
                            </div>
                            <div class="form-group col-12">
                                <textarea name="noidung" id="message" cols="30" rows="3" class="form-control" placeholder="Nội dung"></textarea>
                            </div>
                            <div class="form-btn col-12">
                                <button class="th-btn">Liên Hệ<i class="fas fa-arrow-up-right ms-2"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require(APPPATH.'views/Web/layouts/footer.php'); ?>
