-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 04:22 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ma_ad`, `ten_ad`, `mat_khau`, `avatar`, `email`, `code`, `trang_thai`) VALUES
('zzloveforzz', 'Pham Truong Xuan', '$2y$10$5DtuxuZj.MWr9Hmz0D7qaukY6jBVn9OUqWc/4e4lRslwbtZgktc/O', 'admin.jpg', 'khanhnam03102002@gmail.com', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `bai_viet`
--

CREATE TABLE `bai_viet` (
  `ma_bv` int(5) NOT NULL,
  `tieu_de` varchar(500) NOT NULL,
  `ngay_dang` date NOT NULL,
  `noi_dung_bv` varchar(1000) NOT NULL,
  `anh_bv` varchar(255) NOT NULL,
  `ma_ad` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bai_viet`
--

INSERT INTO `bai_viet` (`ma_bv`, `tieu_de`, `ngay_dang`, `noi_dung_bv`, `anh_bv`, `ma_ad`) VALUES
(23, '16 garden design ideas to make the best of your', '2022-12-13', 'These garden design ideas are key to creating a scheme you\'ll love for years to come. Whether you\'re looking for garden landscaping ideas to overhaul your outdoor space – however big or small – attract more wildlife, or be more sustainable, we\'ve compiled some fabulous garden ideas to help you transform your back garden – and it\'ll even help to boost your property value […]', 'blog1.png', 'zzloveforzz'),
(25, 'How to grow and arrange your own wedding', '2022-12-13', 'These garden design ideas are key to creating a scheme you\'ll love for years to come. Whether you\'re looking for garden landscaping ideas to overhaul your outdoor space – however big or small – attract more wildlife, or be more sustainable, we\'ve compiled some fabulous garden ideas to help you transform your back garden – and it\'ll even help to boost your property value […]\r\n\r\n', 'concac.jpg', 'zzloveforzz'),
(26, 'The top 5 garden renovation trends this', '2022-12-13', 'These garden design ideas are key to creating a scheme you\'ll love for years to come. Whether you\'re looking for garden landscaping ideas to overhaul your outdoor space – however big or small – attract more wildlife, or be more sustainable, we\'ve compiled some fabulous garden ideas to help you transform your back garden – and it\'ll even help to boost your property value […]\r\n\r\n', 'blog4.jpg', 'zzloveforzz');

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
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
-- Table structure for table `chi_tiet_hoa_don`
--

CREATE TABLE `chi_tiet_hoa_don` (
  `ma_hd` int(5) NOT NULL COMMENT 'Mã hóa đơn',
  `ma_hh` int(5) NOT NULL COMMENT 'Mã hàng hóa',
  `so_luong` int(5) NOT NULL COMMENT 'Số lượng sản phẩm',
  `gia_tien` float NOT NULL COMMENT 'Giá tiền '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chi_tiet_hoa_don`
--

INSERT INTO `chi_tiet_hoa_don` (`ma_hd`, `ma_hh`, `so_luong`, `gia_tien`) VALUES
(124, 57, 1, 19),
(125, 55, 1, 40),
(126, 56, 1, 28);

-- --------------------------------------------------------

--
-- Table structure for table `hang_hoa`
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

--
-- Dumping data for table `hang_hoa`
--

INSERT INTO `hang_hoa` (`ma_hh`, `ten_hh`, `don_gia`, `hinh`, `ngay_nhap`, `mo_ta`, `luot_xem`, `dac_biet`, `ma_loai`) VALUES
(55, 'Cacti Plant', 40, 'product1.png', '2022-12-16', 'Cactus spines are produced from specialized structures called areoles, a kind of highly reduced branch. Areoles are an identifying feature of cacti. As well as spines, areoles give rise to flowers, which are usually tubular and multipetaled. Many cacti ha', 9, 2, 100),
(56, 'Aloe Vera Plant', 28, 'product2.png', '2022-12-16', 'loe vera is a stemless or very short-stemmed plant growing to 60–100 centimetres (24–39 inches) tall, spreading by offsets.[4] The leaves are thick and fleshy, green to grey-green, with some varieties showing white flecks on their upper and lower stem sur', 1, 2, 101),
(57, 'Aloe barbadensis', 19, 'product3.png', '2022-12-16', 'The botanical name of Aloe vera is Aloe barbadensis miller. It belongs to Asphodelaceae (Liliaceae) family, and is a shrubby or arborescent, perennial, xerophytic, succulent, pea- green color plant. It grows mainly in the dry regions of Africa, Asia, Euro', 0, 2, 102),
(58, 'Nelumbo nucifera', 95, 'product5.png', '2022-12-16', 'Lotus plants are adapted to grow in the flood plains of slow-moving rivers and delta areas. Stands of lotus drop hundreds of thousands of seeds every year to the bottom of the pond. While some sprout immediately, and most are eaten by wildlife, the remain', 0, 2, 102);

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma_hd` int(5) NOT NULL COMMENT 'Mã hóa đơn',
  `email` varchar(50) NOT NULL COMMENT 'Email người dùng',
  `sdt` varchar(11) NOT NULL COMMENT 'Số điện thoại',
  `dia_chi` varchar(255) NOT NULL COMMENT 'Địa chỉ khách hàng',
  `ngay_dat` date NOT NULL COMMENT 'Ngày đặt hàng',
  `tong_tien` decimal(9,2) NOT NULL COMMENT 'Tổng tiền hóa đơn',
  `ma_kh` varchar(55) NOT NULL COMMENT 'Mã khách hàng',
  `ma_km` int(5) NOT NULL COMMENT 'Mã khuyến mãi',
  `trang_thai` bigint(1) NOT NULL COMMENT 'Trạng thái đơn hàng',
  `code_payment` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`ma_hd`, `email`, `sdt`, `dia_chi`, `ngay_dat`, `tong_tien`, `ma_kh`, `ma_km`, `trang_thai`, `code_payment`) VALUES
(124, 'khanhnam03102002@gmail.com', '0985194780', '31A-Pham Van Nho', '2022-12-16', '15.20', 'user', 27, 0, '642'),
(125, 'khanhnam03102002@gmail.com', '0961518977', 'Hẻm Tổ 7 Phường An Khánh', '2022-12-16', '40.00', 'user', 0, 2, '6834'),
(126, 'khanhnam03102002@gmail.com', '0961518977', 'Hẻm Tổ 7 Phường An Khánh', '2022-12-16', '22.40', 'user', 27, 2, '7681');

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` varchar(55) NOT NULL COMMENT 'Mã khách hàng',
  `ten_kh` varchar(255) NOT NULL COMMENT 'Tên khách hàng',
  `mat_khau` varchar(255) NOT NULL COMMENT 'Mật khẩu',
  `avatar` varchar(255) NOT NULL COMMENT 'Ảnh đại diện',
  `email` varchar(50) NOT NULL COMMENT 'Email khách hàng',
  `trang_thai` varchar(50) NOT NULL COMMENT 'Kích hoạt',
  `code` mediumint(5) NOT NULL COMMENT 'Mã xác nhận ',
  `hoat_dong` bigint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `ten_kh`, `mat_khau`, `avatar`, `email`, `trang_thai`, `code`, `hoat_dong`) VALUES
('user', 'Pham Truong Xuan', '$2y$10$zJGhgG0571t4OOqt6pCLPuJ6zKxKMq6qQKmPeYHXpWn38cqENSaWe', '1f707b02ddf404aa5de5.jpg', 'khanhnam03102002@gmail.com', 'verified', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `khuyen_mai`
--

CREATE TABLE `khuyen_mai` (
  `ma_km` int(5) NOT NULL COMMENT 'Mã khuyến mãi',
  `ten_km` varchar(255) NOT NULL COMMENT 'Tên mã khuyến mãi',
  `mo_ta` varchar(255) NOT NULL COMMENT 'Mô tả',
  `ngay_bat_dau` date NOT NULL COMMENT 'Ngày bắt đầu khuyến mãi',
  `ngay_het_han` date NOT NULL COMMENT 'Ngày kết thúc khuyến mãi',
  `code` varchar(10) NOT NULL COMMENT 'Mã rút gọn ',
  `giam_gia` int(2) NOT NULL COMMENT 'Giảm giá'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khuyen_mai`
--

INSERT INTO `khuyen_mai` (`ma_km`, `ten_km`, `mo_ta`, `ngay_bat_dau`, `ngay_het_han`, `code`, `giam_gia`) VALUES
(27, 'Giftcode Noel 2022', 'Saleoff in Holiday', '2022-12-15', '2022-12-31', 'Noel2022', 20);

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `ma_loai` int(5) NOT NULL COMMENT 'Mã loại',
  `ten_loai` varchar(100) NOT NULL COMMENT 'Tên loại',
  `trang_thai` bigint(2) NOT NULL COMMENT 'Trạng thái loại'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`ma_loai`, `ten_loai`, `trang_thai`) VALUES
(100, 'Succulent', 1),
(101, 'Aloe vera', 1),
(102, 'Lotus', 1),
(103, 'Cactus', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phan_hoi`
--

CREATE TABLE `phan_hoi` (
  `id` int(5) NOT NULL COMMENT 'Mã phản hồi',
  `noi_dung_ph` varchar(255) NOT NULL COMMENT 'Nội dung',
  `ngay_ph` date NOT NULL COMMENT 'Ngày phản hồi',
  `ma_kh` varchar(55) NOT NULL COMMENT 'Mã khách hàng',
  `ma_bl` int(5) NOT NULL COMMENT 'Mã bình luận',
  `ma_hh` int(5) NOT NULL COMMENT 'Mã hàng hóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ma_ad`);

--
-- Indexes for table `bai_viet`
--
ALTER TABLE `bai_viet`
  ADD PRIMARY KEY (`ma_bv`),
  ADD KEY `fk_bv` (`ma_ad`);

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `fk_binh_luan_khach_hang` (`ma_kh`),
  ADD KEY `fk_ma_hh_trong_binh_luan` (`ma_hh`);

--
-- Indexes for table `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD KEY `fk_detail` (`ma_hd`),
  ADD KEY `fk_detail_a` (`ma_hh`);

--
-- Indexes for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`ma_hh`),
  ADD KEY `fk_ma_loai` (`ma_loai`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma_hd`),
  ADD KEY `fk_ma_khuyen_mai_hoa_don` (`ma_km`),
  ADD KEY `fk_bills_of_users` (`ma_kh`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Indexes for table `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  ADD PRIMARY KEY (`ma_km`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Indexes for table `phan_hoi`
--
ALTER TABLE `phan_hoi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ma_bl` (`ma_bl`),
  ADD KEY `fk_ma_kh` (`ma_kh`),
  ADD KEY `fk_ma_hh` (`ma_hh`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bai_viet`
--
ALTER TABLE `bai_viet`
  MODIFY `ma_bv` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Mã bình luận', AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `ma_hh` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Mã hàng hóa', AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma_hd` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Mã hóa đơn', AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  MODIFY `ma_km` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Mã khuyến mãi', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `ma_loai` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Mã loại', AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `phan_hoi`
--
ALTER TABLE `phan_hoi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Mã phản hồi', AUTO_INCREMENT=95;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bai_viet`
--
ALTER TABLE `bai_viet`
  ADD CONSTRAINT `fk_bv` FOREIGN KEY (`ma_ad`) REFERENCES `admin` (`ma_ad`);

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `fk_binh_luan_khach_hang` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`),
  ADD CONSTRAINT `fk_ma_hh_trong_binh_luan` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`);

--
-- Constraints for table `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD CONSTRAINT `fk_detail` FOREIGN KEY (`ma_hd`) REFERENCES `hoa_don` (`ma_hd`),
  ADD CONSTRAINT `fk_detail_a` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`);

--
-- Constraints for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD CONSTRAINT `fk_ma_loai` FOREIGN KEY (`ma_loai`) REFERENCES `loai` (`ma_loai`);

--
-- Constraints for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `fk_bills_of_users` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`);

--
-- Constraints for table `phan_hoi`
--
ALTER TABLE `phan_hoi`
  ADD CONSTRAINT `fk_ma_bl` FOREIGN KEY (`ma_bl`) REFERENCES `binh_luan` (`ma_bl`),
  ADD CONSTRAINT `fk_ma_hh` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`),
  ADD CONSTRAINT `fk_ma_kh` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
