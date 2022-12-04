-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2022 lúc 07:46 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `ma_ad` varchar(55) NOT NULL COMMENT 'Username',
  `ten_ad` varchar(255) NOT NULL COMMENT 'Họ tên',
  `mat_khau` varchar(255) NOT NULL COMMENT 'Mật khẩu',
  `avatar` varchar(255) NOT NULL COMMENT 'Ảnh đại diện',
  `email` varchar(50) NOT NULL COMMENT 'Email admin',
  `code` mediumint(5) NOT NULL COMMENT 'Mã xác nhận',
  `trang_thai` varchar(50) NOT NULL COMMENT 'Trạng thái '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ma_ad`, `ten_ad`, `mat_khau`, `avatar`, `email`, `code`, `trang_thai`) VALUES
('zzloveforzz', 'Pham Truong Xuan', '$2y$10$w/ZQCjHkeDcLrUS.bLni2eOoZPDs2r8puSoW1ojpz0HF8oFISvynO', 'admin.jpg', 'khanhnam03102002@gmail.com', 0, 'verified');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int(5) NOT NULL COMMENT 'Mã bình luận',
  `noi_dung` varchar(255) NOT NULL COMMENT 'Nội dung bình luận',
  `ngay_bl` date NOT NULL COMMENT 'Ngày bình luận',
  `ma_kh` varchar(55) NOT NULL COMMENT 'Mã khách hàng',
  `ma_hh` int(5) NOT NULL COMMENT 'Mã hàng hóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_hoa_don`
--

CREATE TABLE `chi_tiet_hoa_don` (
  `ma_hd` int(5) NOT NULL COMMENT 'Mã hóa đơn',
  `ma_hh` int(5) NOT NULL COMMENT 'Mã hàng hóa',
  `so_luong` int(5) NOT NULL COMMENT 'Số lượng sản phẩm',
  `gia_tien` float NOT NULL COMMENT 'Giá tiền '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_hoa`
--

CREATE TABLE `hang_hoa` (
  `ma_hh` int(5) NOT NULL COMMENT 'Mã hàng hóa',
  `ten_hh` varchar(255) NOT NULL COMMENT 'Tên hàng hóa',
  `don_gia` float NOT NULL COMMENT 'Đơn giá',
  `hinh` varchar(255) NOT NULL COMMENT 'Hình sản phẩm',
  `ngay_nhap` date NOT NULL COMMENT 'Ngày nhập',
  `mo_ta` varchar(255) NOT NULL COMMENT 'Mô tả sản phẩm',
  `luot_xem` int(5) NOT NULL COMMENT 'Lượt xem của sản phẩm',
  `dac_biet` bigint(1) NOT NULL COMMENT 'Sản phẩm đặc biệt',
  `ma_loai` int(5) NOT NULL COMMENT 'Mã loại'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma_hd` int(5) NOT NULL COMMENT 'Mã hóa đơn',
  `email` varchar(50) NOT NULL COMMENT 'Email người dùng',
  `sdt` varchar(11) NOT NULL COMMENT 'Số điện thoại',
  `dia_chi` varchar(255) NOT NULL COMMENT 'Địa chỉ khách hàng',
  `ngay_dat` date NOT NULL COMMENT 'Ngày đặt hàng',
  `tong_tien` float NOT NULL COMMENT 'Tổng tiền hóa đơn',
  `ma_kh` varchar(55) NOT NULL COMMENT 'Mã khách hàng',
  `ma_km` int(5) NOT NULL COMMENT 'Mã khuyến mãi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` varchar(55) NOT NULL COMMENT 'Mã khách hàng',
  `ten_kh` varchar(255) NOT NULL COMMENT 'Tên khách hàng',
  `mat_khau` varchar(50) NOT NULL COMMENT 'Mật khẩu',
  `avatar` varchar(255) NOT NULL COMMENT 'Ảnh đại diện',
  `email` varchar(50) NOT NULL COMMENT 'Email khách hàng',
  `kich_hoat` int(2) NOT NULL COMMENT 'Kích hoạt',
  `code` mediumint(5) NOT NULL COMMENT 'Mã xác nhận '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyen_mai`
--

CREATE TABLE `khuyen_mai` (
  `ma_km` int(5) NOT NULL COMMENT 'Mã khuyến mãi',
  `ten_km` varchar(255) NOT NULL COMMENT 'Tên mã khuyến mãi',
  `mo_ta` varchar(255) NOT NULL COMMENT 'Mô tả',
  `ngay_bat_dau` date NOT NULL COMMENT 'Ngày bắt đầu khuyến mãi',
  `ngay_het_han` date NOT NULL COMMENT 'Ngày kết thúc khuyến mãi',
  `code` varchar(10) NOT NULL COMMENT 'Mã rút gọn '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `ma_loai` int(5) NOT NULL COMMENT 'Mã loại',
  `ten_loai` varchar(100) NOT NULL COMMENT 'Tên loại',
  `trang_thai` bigint(2) NOT NULL COMMENT 'Trạng thái loại'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ma_ad`);

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `fk_binh_luan_khach_hang` (`ma_kh`),
  ADD KEY `fk_ma_hh_trong_binh_luan` (`ma_hh`);

--
-- Chỉ mục cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD KEY `fk_detail` (`ma_hd`),
  ADD KEY `fk_detail_a` (`ma_hh`);

--
-- Chỉ mục cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`ma_hh`),
  ADD KEY `fk_ma_loai` (`ma_loai`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma_hd`),
  ADD KEY `fk_ma_khuyen_mai_hoa_don` (`ma_km`),
  ADD KEY `fk_bills_of_users` (`ma_kh`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Chỉ mục cho bảng `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  ADD PRIMARY KEY (`ma_km`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`ma_loai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Mã bình luận';

--
-- AUTO_INCREMENT cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `ma_hh` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Mã hàng hóa';

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma_hd` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Mã hóa đơn';

--
-- AUTO_INCREMENT cho bảng `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  MODIFY `ma_km` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Mã khuyến mãi';

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `ma_loai` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Mã loại', AUTO_INCREMENT=52;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `fk_binh_luan_khach_hang` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`),
  ADD CONSTRAINT `fk_ma_hh_trong_binh_luan` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`);

--
-- Các ràng buộc cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD CONSTRAINT `fk_detail` FOREIGN KEY (`ma_hd`) REFERENCES `hoa_don` (`ma_hd`),
  ADD CONSTRAINT `fk_detail_a` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`);

--
-- Các ràng buộc cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD CONSTRAINT `fk_ma_loai` FOREIGN KEY (`ma_loai`) REFERENCES `loai` (`ma_loai`);

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `fk_bills_of_users` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`),
  ADD CONSTRAINT `fk_ma_khuyen_mai_hoa_don` FOREIGN KEY (`ma_km`) REFERENCES `khuyen_mai` (`ma_km`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
