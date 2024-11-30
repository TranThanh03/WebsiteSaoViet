-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 06:40 PM
-- Server version: 11.4.3-MariaDB
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
-- Table structure for table `dondat`
--

CREATE TABLE `dondat` (
  `MaLD` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `MaTour` int(11) NOT NULL,
  `TongTien` varchar(100) NOT NULL,
  `ThoiGianDat` datetime DEFAULT NULL,
  `TrangThai` varchar(50) DEFAULT NULL,
  `MaHDV` int(11) DEFAULT NULL,
  `NgayKH` date DEFAULT NULL,
  `NgayKT` date DEFAULT NULL,
  `MaPC` int(10) DEFAULT NULL,
  `GiaTour` varchar(30) DEFAULT NULL,
  `GiaHDV` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `dondat`
--

INSERT INTO `dondat` (`MaLD`, `MaKH`, `MaTour`, `TongTien`, `ThoiGianDat`, `TrangThai`, `MaHDV`, `NgayKH`, `NgayKT`, `MaPC`, `GiaTour`, `GiaHDV`) VALUES
(90, 52, 23, '5.150.000', '2024-11-08 15:07:21', 'Đã xác nhận', 21, '2024-11-17', '2024-11-20', 45, '4.950.000', '200.000'),
(91, 52, 23, '5.200.000', '2024-11-08 15:12:01', 'Đã hủy', 21, '2024-11-17', '2024-11-20', 45, '5.000.000', '200.000'),
(92, 52, 22, '5.500.000', '2024-12-01 00:24:10', 'Đang xử lý', 21, '2024-11-30', '2024-12-01', 46, '5.000.000', '500.000');

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
  `DanhGia` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `huongdanvien`
--

INSERT INTO `huongdanvien` (`MaHDV`, `TenHDV`, `AnhHDV`, `GioiTinh`, `NgaySinh`, `SDT`, `Email`, `MoTa`, `DanhGia`) VALUES
(21, 'Trần Văn Thành', 'Screenshot.png', 'Nam', '2003-10-23', 825702225, 'thanhhkh@gmail.com', '<p>haidgvchhd</p>\r\n', 5);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `TenKH` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `MaTK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `Email`, `MaTK`) VALUES
(44, 'admin', 'admin', 1),
(52, 'Thanh Van Tran', 'thanhhkh@gmail.com', 56),
(53, 'Thanh Tran', 'thanhhkh1@gmail.com', 57),
(56, 'Thanh Tran', 'thanhhkh3@gmail.com', 60),
(57, 'thanh tran', 'thanhhkh4@gmail.com', 61),
(58, 'Phung Thai Son', 'thanhhkh313@gmail.com', 62),
(59, 'Nguyễn Hoàng Sơn', 'tranthanh200322@gmail.com', 63),
(60, 'Dang Cao Tri', 'thanhhkh318@gmail.com', 64),
(61, 'Nguyen The Viet', 'thanhhkh319@gmail.com', 65),
(62, 'Nguyen The Viet', 'thanhhkh3199@gmail.com', 66),
(63, 'Nguyen The Viet', 'thanhhkh3192@gmail.com', 67);

-- --------------------------------------------------------

--
-- Table structure for table `phancong`
--

CREATE TABLE `phancong` (
  `MaPC` int(11) NOT NULL,
  `MaTour` int(11) DEFAULT NULL,
  `MaHDV` int(11) DEFAULT NULL,
  `NgayKH` date DEFAULT NULL,
  `NgayKT` date DEFAULT NULL,
  `TrangThai` varchar(50) DEFAULT NULL,
  `GiaHDV` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `phancong`
--

INSERT INTO `phancong` (`MaPC`, `MaTour`, `MaHDV`, `NgayKH`, `NgayKT`, `TrangThai`, `GiaHDV`) VALUES
(44, 22, 21, '2024-11-04', '2024-11-07', 'Đã kết thúc', '500.000'),
(45, 23, 21, '2024-11-17', '2024-11-20', 'Đã kết thúc', '200.000'),
(46, 22, 21, '2024-11-30', '2024-12-01', 'Đang diễn ra', '500.000');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTK` int(11) NOT NULL,
  `SDT` int(10) DEFAULT NULL,
  `MatKhau` varchar(50) DEFAULT NULL,
  `Quyen` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `SDT`, `MatKhau`, `Quyen`) VALUES
(1, 0, '123', 'admin'),
(56, 825702210, '123', 'user'),
(57, 825702211, '123', 'user'),
(60, 825702213, '234', 'user'),
(61, 825702214, '123', 'user'),
(62, 825702216, '123', 'user'),
(63, 825702217, '123', 'user'),
(64, 825702218, '123', 'user'),
(65, 825702219, '123', 'user'),
(66, 825702221, '123', 'user'),
(67, 825702222, '123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `MaTour` int(11) NOT NULL,
  `TenTour` varchar(300) NOT NULL,
  `AnhTour` varchar(100) NOT NULL,
  `MoTa` text NOT NULL,
  `GiaTour` varchar(50) NOT NULL,
  `GioiThieu` text DEFAULT NULL,
  `MaCD` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`MaTour`, `TenTour`, `AnhTour`, `MoTa`, `GiaTour`, `GioiThieu`, `MaCD`) VALUES
(22, 'SaPa 7 ngày đêm', 'Screenshot 2024-10-24 000221.png', '<p>savgasdg</p>\r\n', '5.000.000', '<p>dbdfshs</p>\r\n', 3),
(23, 'HaLongBay 3 ngay - 3 dem', 'Screenshot 2024-10-24 000100.png', '<p>dafsdgfhgjhk</p>\r\n', '5.000.000', '<p>agbngfhgjhkj</p>\r\n', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dondat`
--
ALTER TABLE `dondat`
  ADD PRIMARY KEY (`MaLD`),
  ADD KEY `FK_LD_KH` (`MaKH`) USING BTREE,
  ADD KEY `FK_LD_PC` (`MaTour`);

--
-- Indexes for table `huongdanvien`
--
ALTER TABLE `huongdanvien`
  ADD PRIMARY KEY (`MaHDV`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`),
  ADD KEY `FK_KH_TK` (`MaTK`);

--
-- Indexes for table `phancong`
--
ALTER TABLE `phancong`
  ADD PRIMARY KEY (`MaPC`),
  ADD KEY `FK_PC_TOUR` (`MaTour`),
  ADD KEY `FK_PC_HDV` (`MaHDV`);

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
-- AUTO_INCREMENT for table `dondat`
--
ALTER TABLE `dondat`
  MODIFY `MaLD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `huongdanvien`
--
ALTER TABLE `huongdanvien`
  MODIFY `MaHDV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `phancong`
--
ALTER TABLE `phancong`
  MODIFY `MaPC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `MaTour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `FK_KH_TK` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`);

--
-- Constraints for table `phancong`
--
ALTER TABLE `phancong`
  ADD CONSTRAINT `FK_PC_HDV` FOREIGN KEY (`MaHDV`) REFERENCES `huongdanvien` (`MaHDV`),
  ADD CONSTRAINT `FK_PC_TOUR` FOREIGN KEY (`MaTour`) REFERENCES `tour` (`MaTour`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
