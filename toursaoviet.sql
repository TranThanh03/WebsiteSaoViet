-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2024 at 03:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toursaoviet`
--

-- --------------------------------------------------------

--
-- Table structure for table `huongdanvien`
--

CREATE TABLE `huongdanvien` (
  `MaHDV` int(11) NOT NULL,
  `TenHDV` varchar(100) NOT NULL,
  `AnhHDV` varchar(100) NOT NULL,
  `GioiTinh` varchar(10) NOT NULL,
  `NgaySinh` date NOT NULL,
  `SDT` int(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `MoTa` text NOT NULL,
  `Gia` varchar(20) NOT NULL,
  `MaTour` int(11) NOT NULL,
  `DanhGia` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `huongdanvien`
--

INSERT INTO `huongdanvien` (`MaHDV`, `TenHDV`, `AnhHDV`, `GioiTinh`, `NgaySinh`, `SDT`, `Email`, `MoTa`, `Gia`, `MaTour`, `DanhGia`) VALUES
(1, 'Trần Văn Thành', 'Screenshot (52).png', 'Nam', '2003-10-22', 123456789, 'thanh@gmail.com', 'afdsghjhvrteyhtuayW$GƯEH', '4.500.000đ', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `TenKH` varchar(50) NOT NULL,
  `SDT` int(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `MaTK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `SDT`, `Email`, `MaTK`) VALUES
(23, 'thanh tran', 825702210, 'thanhhkh3@gmail.com', 29);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTK` int(11) NOT NULL,
  `TenTK` varchar(50) NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `Quyen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `TenTK`, `MatKhau`, `Quyen`) VALUES
(1, 'admin', '123', 'admin'),
(29, 'thanh22', '123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `MaTour` int(11) NOT NULL,
  `TenTour` varchar(300) NOT NULL,
  `AnhTour` varchar(100) NOT NULL,
  `MoTa` text NOT NULL,
  `Gia` varchar(50) NOT NULL,
  `GioiThieu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`MaTour`, `TenTour`, `AnhTour`, `MoTa`, `Gia`, `GioiThieu`) VALUES
(2, 'HaLongBay 3 ngay di voi trang', 'Screenshot (52).png', '<p>son y&ecirc;u trang rat nhieu</p>\r\n', '4.500.000đ', 'dsfsdg'),
(6, 'Yeu trang di', 'Screenshot (62).png', '<h1>Vịnh Hạ Long</h1>\r\n\r\n<p><strong>Vịnh Hạ Long</strong>&nbsp;được Unesco nhiều lần c&ocirc;ng nhận l&agrave;&nbsp;<strong>Di sản thi&ecirc;n nhi&ecirc;n của Thế giới</strong>&nbsp;với h&agrave;ng ngh&igrave;n h&ograve;n đảo được l&agrave;m n&ecirc;n bởi tạo ho&aacute; kỳ vĩ v&agrave; sống động. Vịnh Hạ Long c&oacute; phong cảnh tuyệt đẹp n&ecirc;n nơi đ&acirc;y l&agrave; một điểm du lịch rất hấp dẫn với du kh&aacute;ch trong nước v&agrave; quốc tế.</p>\r\n\r\n<p>Mới đ&acirc;y nhất, ng&agrave;y 16/9/2023, tại thủ đ&ocirc; Riyadh, Ả Rập X&ecirc; &Uacute;t,&nbsp;<strong>UNESCO lại một lần nữa vinh danh v&agrave; c&ocirc;ng nhận quần thể vịnh Hạ Long &ndash; quần đảo C&aacute;t B&agrave; l&agrave; Di sản thi&ecirc;n nhi&ecirc;n thế giới</strong>, bởi nơi đ&acirc;y chứa đựng c&aacute;c khu vực c&oacute; vẻ đẹp thi&ecirc;n nhi&ecirc;n bao gồm c&aacute;c đảo đ&aacute; v&ocirc;i c&oacute; thảm thực vật che phủ v&agrave; c&aacute;c đỉnh nhọn n&uacute;i đ&aacute; v&ocirc;i nh&ocirc; l&ecirc;n tr&ecirc;n mặt biển c&ugrave;ng với c&aacute;c đặc điểm karst li&ecirc;n quan như c&aacute;c m&aacute;i v&ograve;m v&agrave; hang động.</p>\r\n\r\n<p><strong><a href=\"https://www.dulichhalong.net/vinh-ha-long/\" target=\"_blank\">Vịnh Hạ Long</a>&nbsp;</strong>l&agrave; một di sản độc đ&aacute;o bởi địa danh n&agrave;y chứa đựng những dấu t&iacute;ch quan trọng trong qu&aacute; tr&igrave;nh h&igrave;nh th&agrave;nh v&agrave; ph&aacute;t triển lịch sử tr&aacute;i đất, l&agrave; c&aacute;i n&ocirc;i cư tr&uacute; của người Việt cổ, đồng thời l&agrave; t&aacute;c phẩm nghệ thuật tạo h&igrave;nh vĩ đại của thi&ecirc;n nhi&ecirc;n với sự hiện diện của h&agrave;ng ngh&igrave;n đảo đ&aacute; mu&ocirc;n h&igrave;nh vạn trạng, với nhiều hang động kỳ th&uacute; quần tụ th&agrave;nh một thế giới vừa sinh động vừa huyền b&iacute;. B&ecirc;n cạnh đ&oacute;, vịnh Hạ Long c&ograve;n l&agrave; nơi tập trung đa dạng sinh học cao với những hệ sinh th&aacute;i điển h&igrave;nh c&ugrave;ng với h&agrave;ng ngh&igrave;n lo&agrave;i động thực vật v&ocirc; c&ugrave;ng phong ph&uacute;, đa dạng. Nơi đ&acirc;y c&ograve;n gắn liền với những gi&aacute; trị văn h&oacute;a &ndash; lịch sử h&agrave;o h&ugrave;ng của d&acirc;n tộc.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong><a href=\"https://www.dulichhalong.net/vinh-ha-long/\" target=\"_blank\">Vịnh Hạ Long</a>&nbsp;</strong>nổi bật với hệ thống đảo đ&aacute; v&agrave; hang động tuyệt đẹp. Đảo ở Hạ Long c&oacute; hai dạng l&agrave; đảo đ&aacute; v&ocirc;i v&agrave; đảo phiến thạch, tập trung ở hai v&ugrave;ng ch&iacute;nh l&agrave; v&ugrave;ng ph&iacute;a đ&ocirc;ng nam&nbsp;<strong><a href=\"https://www.dulichhalong.net/diem-du-lich/vinh-bai-tu-long/\">vịnh B&aacute;i Tử Long</a>&nbsp;</strong>v&agrave; v&ugrave;ng ph&iacute;a t&acirc;y nam vịnh Hạ Long. Đ&acirc;y l&agrave; h&igrave;nh ảnh cổ xưa nhất của địa h&igrave;nh c&oacute; tuổi kiến tạo địa chất từ 250 &ndash; 280 triệu năm, l&agrave; kết quả của qu&aacute; tr&igrave;nh vận động n&acirc;ng l&ecirc;n, hạ xuống nhiều lần từ lục địa th&agrave;nh trũng biển. Qu&aacute; tr&igrave;nh Carxto b&agrave;o m&ograve;n, phong ho&aacute; gần như ho&agrave;n to&agrave;n tạo ra một Hạ Long độc nhất v&ocirc; nhị tr&ecirc;n thế giới.</p>\r\n\r\n<p>H&agrave;ng trăm đảo đ&aacute;, mỗi đảo mang một h&igrave;nh d&aacute;ng kh&aacute;c nhau hết sức sinh động: h&ograve;n Đầu Người, h&ograve;n Rồng, h&ograve;n L&atilde; Vọng, h&ograve;n C&aacute;nh Buồm, h&ograve;n G&agrave; Chọi, h&ograve;n Lư Hương&hellip; Tiềm ẩn trong l&ograve;ng c&aacute;c đảo đ&aacute; ấy l&agrave; những hang động tuyệt đẹp gắn với nhiều truyền thuyết thần kỳ như&nbsp;<strong>động Thi&ecirc;n Cung</strong>,&nbsp;<strong>hang Đầu Gỗ</strong>,&nbsp;<strong>hang Sửng Sốt</strong>,&nbsp;<strong>hang Trinh Nữ, động Tam Cung</strong>&hellip; Đ&oacute; thực sự l&agrave; những l&acirc;u đ&agrave;i của tạo ho&aacute; giữa chốn trần gian. Từ xưa, Hạ Long đ&atilde; được đại thi h&agrave;o d&acirc;n tộc Nguyễn Tr&atilde;i mệnh danh l&agrave; &ldquo;kỳ quan đất dựng giữa trời cao&rdquo;.</p>\r\n', '4.950.000đ', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `huongdanvien`
--
ALTER TABLE `huongdanvien`
  ADD PRIMARY KEY (`MaHDV`),
  ADD KEY `FK_HDV_TOUR` (`MaTour`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`),
  ADD KEY `FK_KH_TK` (`MaTK`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTK`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`MaTour`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `huongdanvien`
--
ALTER TABLE `huongdanvien`
  MODIFY `MaHDV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `MaTour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `huongdanvien`
--
ALTER TABLE `huongdanvien`
  ADD CONSTRAINT `FK_HDV_TOUR` FOREIGN KEY (`MaTour`) REFERENCES `tour` (`MaTour`);

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `FK_KH_TK` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
