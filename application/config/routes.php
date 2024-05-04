<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin/dang-nhap'] = 'Admin/DangNhap';
$route['admin/dang-xuat'] = 'Admin/DangXuat';

$route['admin'] = 'Admin/TrangChu';
$route['admin/ca-nhan'] = 'Admin/CaNhan';
$route['admin/cau-hinh'] = 'Admin/CauHinh';


$route['admin/giao-dien'] = 'Admin/GiaoDien';


$route['admin/lien-he'] = 'Admin/LienHe';
$route['admin/lien-he/(:any)/trang'] = 'Admin/LienHe/page/$1';
$route['admin/lien-he/(:any)/xem'] = 'Admin/LienHe/view/$1';


$route['admin/giao-dien'] = 'Admin/GiaoDien';
$route['admin/giao-dien/(:any)/trang'] = 'Admin/GiaoDien/page/$1';
$route['admin/giao-dien/them'] = 'Admin/GiaoDien/add';
$route['admin/giao-dien/(:any)/sua'] = 'Admin/GiaoDien/update/$1';
$route['admin/giao-dien/(:any)/xoa'] = 'Admin/GiaoDien/delete/$1';


$route['admin/binh-luan'] = 'Admin/BinhLuan';
$route['admin/binh-luan/(:any)/trang'] = 'Admin/BinhLuan/page/$1';
$route['admin/binh-luan/(:any)/xem'] = 'Admin/BinhLuan/view/$1';
$route['admin/binh-luan/(:any)/xoa'] = 'Admin/BinhLuan/delete/$1';
$route['admin/binh-luan/tim-kiem'] = 'Admin/BinhLuan/search';
$route['admin/binh-luan/tim-kiem/(:any)/trang'] = 'Admin/BinhLuan/pageSearch/$1';

$route['admin/chuyen-muc'] = 'Admin/ChuyenMuc';
$route['admin/chuyen-muc/(:any)/trang'] = 'Admin/ChuyenMuc/page/$1';
$route['admin/chuyen-muc/them'] = 'Admin/ChuyenMuc/add';
$route['admin/chuyen-muc/(:any)/sua'] = 'Admin/ChuyenMuc/update/$1';
$route['admin/chuyen-muc/(:any)/xoa'] = 'Admin/ChuyenMuc/delete/$1';
$route['admin/chuyen-muc/tim-kiem'] = 'Admin/ChuyenMuc/search';
$route['admin/chuyen-muc/tim-kiem/(:any)/trang'] = 'Admin/ChuyenMuc/pageSearch/$1';

$route['admin/loai-the'] = 'Admin/The';
$route['admin/loai-the/(:any)/trang'] = 'Admin/The/page/$1';
$route['admin/loai-the/them'] = 'Admin/The/add';
$route['admin/loai-the/(:any)/sua'] = 'Admin/The/update/$1';
$route['admin/loai-the/(:any)/xoa'] = 'Admin/The/delete/$1';
$route['admin/loai-the/tim-kiem'] = 'Admin/The/search';
$route['admin/loai-the/tim-kiem/(:any)/trang'] = 'Admin/The/pageSearch/$1';