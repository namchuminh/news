-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 07:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `MaBaiViet` int(11) NOT NULL,
  `TieuDe` varchar(500) NOT NULL,
  `NoiDung` text NOT NULL,
  `MaNguoiDung` int(11) NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp(),
  `AnhChinh` text NOT NULL,
  `DuongDan` text NOT NULL,
  `BaiVietNoiBat` int(11) NOT NULL DEFAULT 0,
  `LoaiBaiViet` int(11) NOT NULL DEFAULT 1,
  `LuotXem` int(11) NOT NULL DEFAULT 1,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `baiviet_chuyenmuc`
--

CREATE TABLE `baiviet_chuyenmuc` (
  `MaBaiViet` int(11) NOT NULL,
  `MaChuyenMuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `baiviet_the`
--

CREATE TABLE `baiviet_the` (
  `MaBaiViet` int(11) NOT NULL,
  `MaThe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `MaBinhLuan` int(11) NOT NULL,
  `MaBaiViet` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NoiDung` varchar(500) NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cauhinh`
--

CREATE TABLE `cauhinh` (
  `TenWebsite` varchar(500) NOT NULL,
  `MoTaWebsite` text NOT NULL,
  `Favicon` text NOT NULL,
  `Logo` text NOT NULL,
  `Facebook` text NOT NULL,
  `X` text NOT NULL,
  `Linkedin` text NOT NULL,
  `Instagram` text NOT NULL,
  `Youtube` text NOT NULL,
  `DiaChi` text NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cauhinh`
--

INSERT INTO `cauhinh` (`TenWebsite`, `MoTaWebsite`, `Favicon`, `Logo`, `Facebook`, `X`, `Linkedin`, `Instagram`, `Youtube`, `DiaChi`, `Email`, `SoDienThoai`) VALUES
('Tin tức ABC', 'Cung cấp tin tức', 'http://localhost/news/uploads/65961211.png', 'http://localhost/news/uploads/logo2.png', 'https://www.facebook.com/', 'https://twitter.com/', 'https://vn.linkedin.com/', 'https://www.instagram.com/', 'https://www.youtube.com/', 'Hà Nội', 'tinmoiabc@gmail.com', '0999888999');

-- --------------------------------------------------------

--
-- Table structure for table `chuyenmuc`
--

CREATE TABLE `chuyenmuc` (
  `MaChuyenMuc` int(11) NOT NULL,
  `TenChuyenMuc` varchar(255) NOT NULL,
  `ChuyenMucCha` int(11) DEFAULT NULL,
  `DuongDan` varchar(255) NOT NULL,
  `AnhChinh` text NOT NULL,
  `HienThiMenu` int(11) NOT NULL DEFAULT 0,
  `HienThiTrangChu` int(11) NOT NULL DEFAULT 0,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giaodien`
--

CREATE TABLE `giaodien` (
  `MaGiaoDien` int(11) NOT NULL,
  `LoaiGiaoDien` int(11) NOT NULL DEFAULT 1,
  `DuongDan` text NOT NULL,
  `HinhAnh` text NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `MaLienHe` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `TieuDe` text NOT NULL,
  `NoiDung` varchar(500) NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp(),
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`MaLienHe`, `HoTen`, `Email`, `SoDienThoai`, `TieuDe`, `NoiDung`, `ThoiGian`, `TrangThai`) VALUES
(1, 'Nguyễn Văn An', 'nguyenvanan@gmail.com', '0999888999', 'Liên hệ hợp tác lâu dài', 'Đây là liên hệ mẫu', '2024-05-03 23:57:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `MaNguoiDung` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `AnhChinh` text NOT NULL,
  `TaiKhoan` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`MaNguoiDung`, `HoTen`, `Email`, `SoDienThoai`, `AnhChinh`, `TaiKhoan`, `MatKhau`, `TrangThai`) VALUES
(1, 'Chu Minh Nam', 'admin@gmail.com', '0999888999', 'http://localhost/news/uploads/6596121.png', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `the`
--

CREATE TABLE `the` (
  `MaThe` int(11) NOT NULL,
  `TenThe` varchar(255) NOT NULL,
  `DuongDan` text NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`MaBaiViet`),
  ADD KEY `MaNguoiDung` (`MaNguoiDung`);

--
-- Indexes for table `baiviet_chuyenmuc`
--
ALTER TABLE `baiviet_chuyenmuc`
  ADD PRIMARY KEY (`MaBaiViet`,`MaChuyenMuc`),
  ADD KEY `MaBaiViet` (`MaBaiViet`,`MaChuyenMuc`),
  ADD KEY `MaChuyenMuc` (`MaChuyenMuc`);

--
-- Indexes for table `baiviet_the`
--
ALTER TABLE `baiviet_the`
  ADD PRIMARY KEY (`MaBaiViet`,`MaThe`),
  ADD KEY `MaBaiViet` (`MaBaiViet`,`MaThe`),
  ADD KEY `MaThe` (`MaThe`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`MaBinhLuan`),
  ADD KEY `MaBaiViet` (`MaBaiViet`);

--
-- Indexes for table `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  ADD PRIMARY KEY (`MaChuyenMuc`);

--
-- Indexes for table `giaodien`
--
ALTER TABLE `giaodien`
  ADD PRIMARY KEY (`MaGiaoDien`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`MaLienHe`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`MaNguoiDung`);

--
-- Indexes for table `the`
--
ALTER TABLE `the`
  ADD PRIMARY KEY (`MaThe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `MaBaiViet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `MaBinhLuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  MODIFY `MaChuyenMuc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giaodien`
--
ALTER TABLE `giaodien`
  MODIFY `MaGiaoDien` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `MaLienHe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `MaNguoiDung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `the`
--
ALTER TABLE `the`
  MODIFY `MaThe` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `baiviet_ibfk_1` FOREIGN KEY (`MaNguoiDung`) REFERENCES `nguoidung` (`MaNguoiDung`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `baiviet_chuyenmuc`
--
ALTER TABLE `baiviet_chuyenmuc`
  ADD CONSTRAINT `baiviet_chuyenmuc_ibfk_1` FOREIGN KEY (`MaBaiViet`) REFERENCES `baiviet` (`MaBaiViet`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `baiviet_chuyenmuc_ibfk_2` FOREIGN KEY (`MaChuyenMuc`) REFERENCES `chuyenmuc` (`MaChuyenMuc`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `baiviet_the`
--
ALTER TABLE `baiviet_the`
  ADD CONSTRAINT `baiviet_the_ibfk_1` FOREIGN KEY (`MaThe`) REFERENCES `the` (`MaThe`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `baiviet_the_ibfk_2` FOREIGN KEY (`MaBaiViet`) REFERENCES `baiviet` (`MaBaiViet`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`MaBaiViet`) REFERENCES `baiviet` (`MaBaiViet`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
