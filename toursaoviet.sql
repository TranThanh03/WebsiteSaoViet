-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 12:14 PM
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
(21, 'Trần Văn Thành', 'Screenshot.png', 'Nam', '2003-10-23', 825702225, 'thanhhkh@gmail.com', 'haidgvchhd', 5),
(25, 'Phung Thai Son', 'Screenshot 2024-10-24 000221.png', 'Nam', '2000-12-12', 825702211, 'thanhhkh@gmail.com', 'Lịch trình\r\nNGÀY 01: HÀ NỘI – TP. HÀ GIANG – CỬA KHẨU THANH THỦY (Ăn trưa, tối)\r\nNGÀY 02 | HÀ GIANG – QUẢN BẠ - ĐỒNG VĂN (Ăn sáng, trưa, tối)\r\nNGÀY 03: ĐỒNG VĂN- LŨNG CÚ- MÈO VẠC (Ăn sáng, trưa, tối)\r\nNGÀY 4 | MÈO VẠC – HÀ GIANG – HÀ NỘI (Ăn sáng, trưa)\r\nBao gồm và Điều khoản\r\nTour trọn gói bao gồm\r\nVé Xe giường nằm cabin Hoặc Xe Limousine Cao Cấp 2 chiều Hà Nội - Hà Giang hoặc từ SaPa – Hà Giang và ngược lại.\r\n Hướng dẫn viên chuyên nghiệp, nhiệt tình, tận tâm.\r\nPhương tiện tham quan các điểm từ TP. Hà Giang: Xe ô tô từ 4- 16 chỗ hoặc xe Jeep hoặc xe máy chất lượng tốt và đồ bảo hộ theo từng xe.\r\n Nước uống đóng chai: 02 chai/ngày.\r\n Các bữa ăn bao gồm: 03 bữa sáng + 04 bữa trưa + 03 bữa tối:\r\n           + Menu sáng: Phở Bò, Phở Gà, Bánh Cuốn.\r\n\r\n           + Menu trưa: Cơm Việt.\r\n\r\n           + Menu tối: Lẩu hoặc Cơm Việt.\r\n\r\nVé thắng cảnh: Nhà Pao, Nhà Vương, cột cờ Lũng Cú và vé thuyền sông Nho Quế.\r\n 02 đêm khách sạn tiêu chuẩn (homestay tương đương) hoặc khách sạn 3 sao: 02 người/phòng.\r\nPhí bảo hiểm theo quy định tối đa 2', 1);

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
(57, 'thanh tran', 'thanhhkh4@gmail.com', 61);

-- --------------------------------------------------------

--
-- Table structure for table `lichdat`
--

CREATE TABLE `lichdat` (
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
-- Dumping data for table `lichdat`
--

INSERT INTO `lichdat` (`MaLD`, `MaKH`, `MaTour`, `TongTien`, `ThoiGianDat`, `TrangThai`, `MaHDV`, `NgayKH`, `NgayKT`, `MaPC`, `GiaTour`, `GiaHDV`) VALUES
(81, 52, 16, '4.900.000', '2024-11-03 04:32:18', 'Đang xử lý', 21, '2024-11-02', '2024-11-05', NULL, NULL, NULL),
(88, 52, 16, '5.050.000', '2024-11-07 16:52:44', 'Đang xử lý', 21, '2024-11-08', '2024-11-09', 40, NULL, NULL);

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
(40, 16, 21, '2024-11-08', '2024-11-09', 'Đang diễn ra', '550.000');

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
(61, 825702214, '123', 'user');

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
(16, 'Da Lat 3 ngay - 2 dem', 'hdv-01.jpg', '<p><strong>Tour du lịch H&agrave; Giang 4 ng&agrave;y 3 đ&ecirc;m</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>4.6 sao / 150 đ&aacute;nh gi&aacute; từ kh&aacute;ch du lịch</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Điểm nổi bật của Tour</p>\r\n\r\n<p><strong>H&agrave;nh tr&igrave;nh</strong></p>\r\n\r\n<p>H&agrave; Nội - H&agrave; Giang - Quản Bạ - Y&ecirc;n Minh - Đồng Văn - M&egrave;o Vạc - Ruộng Bậc Thang Ho&agrave;ng Su Ph&igrave; - X&iacute;u Mần - Đ&egrave;o Gi&oacute; - Th&aacute;c Ti&ecirc;n</p>\r\n\r\n<p><strong>Thời gian</strong></p>\r\n\r\n<p>4 ng&agrave;y 3 đ&ecirc;m</p>\r\n\r\n<p><strong>Lịch tour</strong></p>\r\n\r\n<p>Khởi h&agrave;nh mỗi ng&agrave;y</p>\r\n\r\n<p><strong>Vận chuyển</strong></p>\r\n\r\n<p>Xe du lịch</p>\r\n\r\n<p><strong>Xuất ph&aacute;t</strong></p>\r\n\r\n<p>H&agrave; Nội</p>\r\n\r\n<p><strong>Du Lich H&agrave; Giang</strong> kh&ocirc;ng c&ograve;n l&agrave; c&aacute;i t&ecirc;n xa lạ đối với c&aacute;c t&iacute;n đồ đam m&ecirc; du lịch th&iacute;ch kh&aacute;m ph&aacute;, trải nghiệm v&agrave; nghỉ dưỡng. Hằng năm, nơi đ&acirc;y đ&oacute;n h&agrave;ng triệu lượt kh&aacute;ch du lịch trong v&agrave; ngo&agrave;i nước bởi vẻ đẹp hoang sơ, quyến rũ với những khung cảnh thi&ecirc;n nhi&ecirc;n tuyệt đẹp, c&aacute;c di t&iacute;ch lịch sử, trải nghiệm cuộc sống c&ugrave;ng với người d&acirc;n tộc nơi đ&acirc;y đ&atilde; khiến cho H&agrave; Giang trở th&agrave;nh điểm du lịch nổi tiếng kh&ocirc;ng chỉ ở Việt Nam m&agrave; c&ograve;n ở tr&ecirc;n Thế Giới. <strong>Tour du lịch H&agrave; Giang 4 ng&agrave;y 3 đ&ecirc;m ng&agrave;y trọn g&oacute;i</strong> của Hitour khởi h&agrave;nh từ H&agrave; Nội đ&aacute;p ứng mọi nhu cầu của kh&aacute;ch h&agrave;ng. C&aacute;c điểm tham quan nổi tiếng được sắp xếp hợp l&yacute; v&agrave; đầy đủ, thực đơn đa dạng phong ph&uacute; với những m&oacute;n hải sản đặc trưng của đảo, sự uy t&iacute;n - chuy&ecirc;n nghiệp - tận t&acirc;m n&ecirc;n được qu&yacute; kh&aacute;ch h&agrave;ng y&ecirc;u th&iacute;ch v&agrave; l&agrave; lựa chọn tuyệt vời cho kỳ nghĩ dưỡng của m&igrave;nh. Với tour H&agrave; Giang 4 ng&agrave;y 3 đ&ecirc;m trọn g&oacute;i qu&yacute; kh&aacute;ch được trải nghiệm tham quan theo tr&igrave;nh tự như sau: đền Đ&ocirc;i C&ocirc; Cầu M&aacute;, Cổng trời Quản Bạ, N&uacute;i đ&ocirc;i C&ocirc; Ti&ecirc;n, C&aacute;nh đồng hoa Tam gi&aacute;c mạch, Cao nguy&ecirc;n đ&aacute; Đồng Văn, Phố C&aacute;o, bản Sủng L&agrave;, L&agrave;ng văn h&oacute;a Lũng Cẩm, Nh&agrave; của Pao, Dinh Vua M&egrave;o Vương Ch&iacute;nh Đức, Cột Cờ Lũng C&uacute; , phố cổ Đồng Văn, Đ&egrave;o M&atilde; P&igrave; L&egrave;ng, ruộng bậc thang Ho&agrave;ng Su Ph&igrave;, Đ&egrave;o Gi&oacute;, Th&aacute;c Ti&ecirc;n,...Khi tham gia tour H&agrave; Giang trọn g&oacute;i qu&yacute; kh&aacute;ch kh&ocirc;ng cần lo lắng việc ăn uống - nghỉ ngơi - phương tiện di chuyển v&igrave; đ&atilde; bao gồm trong lịch tr&igrave;nh tour.</p>\r\n\r\n<p>Bảng gi&aacute; Tour du lịch H&agrave; Giang 4 ng&agrave;y 3 đ&ecirc;m</p>\r\n\r\n<p><strong>T&ugrave;y chọn</strong></p>\r\n\r\n<p><strong>Gi&aacute; &aacute;p dụng</strong></p>\r\n\r\n<p><strong>Kh&aacute;ch sạn mini</strong></p>\r\n\r\n<p>từ <strong>13/11/2022</strong> đến <strong>31/12/2024</strong></p>\r\n\r\n<p><strong>4,350,000đ</strong> /Người lớn</p>\r\n\r\n<p><strong>3,260,000đ</strong> /6-11 tuổi</p>\r\n\r\n<p><strong>Kh&aacute;ch sạn 2*</strong></p>\r\n\r\n<p>từ <strong>13/11/2022</strong> đến <strong>31/12/2024</strong></p>\r\n\r\n<p><strong>4,550,000đ</strong> /Người lớn</p>\r\n\r\n<p><strong>3,410,000đ</strong> /6-11 tuổi</p>\r\n\r\n<p><strong>Kh&aacute;ch sạn 3*</strong></p>\r\n\r\n<p>từ <strong>13/11/2022</strong> đến <strong>31/12/2024</strong></p>\r\n\r\n<p><strong>4,850,000đ</strong> /Người lớn</p>\r\n\r\n<p><strong>3,630,000đ</strong> /6-11 tuổi</p>\r\n\r\n<p>Lịch tr&igrave;nh Tour</p>\r\n\r\n<p><strong>Bản đầy đủ</strong> Bản t&oacute;m tắt</p>\r\n\r\n<p><strong>Ng&agrave;y 1 | H&agrave; Nội - H&agrave; Giang - Quản Bạ - Y&ecirc;n Minh (Ăn trưa, tối)</strong></p>\r\n\r\n<p><strong>06:00</strong> Xe v&agrave; hướng dẫn vi&ecirc;n đ&oacute;n Qu&yacute; kh&aacute;ch tại kh&aacute;ch sạn trong khu vực Phố Cổ quận Ho&agrave;n Kiếm v&agrave; Nh&agrave; H&aacute;t Lớn khởi h&agrave;nh bắt đầu chương tr&igrave;nh <strong>Tour du lịch H&agrave; Giang 4 ng&agrave;y 3 đ&ecirc;m</strong>. Tr&ecirc;n đường qu&yacute; kh&aacute;ch sẽ được ngắm cảnh rừng n&uacute;i Đ&ocirc;ng bắc v&ocirc; c&ugrave;ng h&ugrave;ng vĩ v&agrave; hoang sơ. Xe sẽ dừng ch&acirc;n cho qu&yacute; kh&aacute;ch nghỉ ngơi, vệ sinh c&aacute; nh&acirc;n, ăn s&aacute;ng (chi ph&iacute; tự t&uacute;c). chụp h&igrave;nh đồi ch&egrave; Tuy&ecirc;n Quang.</p>\r\n\r\n<p>Du lịch H&agrave; Giang 4 ng&agrave;y 3 đ&ecirc;m - Ảnh: Hitour</p>\r\n\r\n<p><strong>11:00</strong> Đo&agrave;n thưởng thức bữa trưa tại nh&agrave; h&agrave;ng với những m&oacute;n ăn đặc sản của Tuy&ecirc;n Quang. Sau đ&oacute; nghỉ ngơi.</p>\r\n\r\n<p>Thưởng thức c&aacute;c m&oacute;n đặc sản ở H&agrave; Giang - Ảnh: Hitour</p>\r\n\r\n<p><strong>13:30</strong> Tr&ecirc;n đường đi sẽ tham quan <strong>đền Đ&ocirc;i C&ocirc; Cầu M&aacute;</strong> linh thi&ecirc;ng nằm ngay b&ecirc;n bờ <strong>S&ocirc;ng L&ocirc;</strong>. Đến H&agrave; Giang chụp h&igrave;nh kỷ niệm tại KM0 của H&agrave; Giang. Sau đ&oacute; xe sẽ đưa đo&agrave;n tham quan theo tr&igrave;nh tự: <strong>Cổng trời Quản Bạ</strong> chụp những tấm h&igrave;nh lưu niệm &yacute; nghĩa.</p>\r\n\r\n<p>Cổng trời Quản Bạ H&agrave; Giang - Ảnh: Hitour</p>\r\n\r\n<p><strong>N&uacute;i đ&ocirc;i C&ocirc; Ti&ecirc;n</strong> qu&yacute; kh&aacute;ch sẽ được ngắm nh&igrave;n những ruộng l&uacute;a ch&iacute;n v&agrave;ng. N&uacute;i đ&ocirc;i C&ocirc; Ti&ecirc;n đặc biệt bởi n&oacute; mang một h&igrave;nh d&aacute;ng kh&aacute; tr&ograve;n trịa, đỉnh n&uacute;i kh&ocirc;ng nhọn như những ngọn n&uacute;i kế b&ecirc;n v&agrave; n&oacute; c&oacute; hai quả n&uacute;i nằm liền kề nhau v&agrave; được nhiều du kh&aacute;ch v&iacute; như đ&ocirc;i g&ograve; bồng đảo của n&agrave;ng ti&ecirc;n đang ch&igrave;m trong giấc nồng, đ&oacute; quả l&agrave; một t&aacute;c phẩm nghệ thuật rất đặc biệt m&agrave; thi&ecirc;n nhi&ecirc;n đ&atilde; ưu &aacute;i ban tặng cho nơi đ&acirc;y. Q&uacute;y kh&aacute;ch sẽ được thuyết minh về c&acirc;u chuyện truyền thuyết của n&uacute;i đ&ocirc;i C&ocirc; Ti&ecirc;n.</p>\r\n\r\n<p>Ruộng l&uacute;a nơi N&uacute;i Đ&ocirc;i H&agrave; Giang - Ảnh: Hitour</p>\r\n\r\n<p><strong>C&aacute;nh đồng hoa Tam gi&aacute;c mạch</strong> được đắm m&igrave;nh v&agrave;o vẻ đẹp lung linh của c&aacute;nh đồng hoa đủ m&agrave;u sắc: hồng, trắng, đỏ,... tự do tham quan v&agrave; lưu lại cho m&igrave;nh những tấm ảnh đẹp c&ugrave;ng người th&acirc;n, bạn b&egrave;. (cao điểm nhiều hoa từ th&aacute;ng 09 - 12).</p>\r\n\r\n<p>C&aacute;nh đồng Tam Gi&aacute;c Mạch H&agrave; Giang - Ảnh: Hitour</p>\r\n\r\n<p>Sau đ&oacute;, Qu&yacute; kh&aacute;ch sẽ đi qua <strong>rừng th&ocirc;ng</strong> bạt ng&agrave;n đẹp nhất Việt Nam trải d&agrave;i tr&ecirc;n c&aacute;c sườn n&uacute;i cao để đến với đến thị trấn Y&ecirc;n Minh. Qu&yacute; kh&aacute;ch đến kh&aacute;ch sạn nhận ph&ograve;ng nghỉ ngơi.</p>\r\n\r\n<p>Rừng th&ocirc;ng Y&ecirc;n Minh ở H&agrave; Giang - Ảnh: Hitour</p>\r\n\r\n<p><strong>18:30</strong> Đo&agrave;n thưởng thức bữa tối tại nh&agrave; h&agrave;ng ở Y&ecirc;n Minh với những m&oacute;n ngon đặc sản nổi tiếng H&agrave; Giang. Sau đ&oacute; nhận ph&ograve;ng kh&aacute;ch sạn nghỉ ngơi v&agrave; tự do tản bộ, nh&acirc;m nhi ly c&agrave; ph&ecirc;, h&iacute;t thở kh&ocirc;ng kh&iacute; trong l&agrave;nh m&aacute;t mẻ của H&agrave; Giang v&ugrave;ng n&uacute;i miền Bắc.</p>\r\n\r\n<p>Chợ do tản bộ trong phố cổ Đồng Văn - Ảnh: Hitour</p>\r\n\r\n<p><strong>Ng&agrave;y 2 | Y&ecirc;n Minh - Đồng Văn - M&egrave;o Vạc (Ăn s&aacute;ng, trưa, tối)</strong></p>\r\n\r\n<p><strong>06:30</strong> Qu&yacute; kh&aacute;ch thức dậy đ&oacute;n b&igrave;nh minh buổi sớm tr&ecirc;n n&uacute;i, tận hưởng bầu kh&ocirc;ng kh&iacute; trong l&agrave;nh của miền Bắc. Sau đ&oacute; thưởng thức bữa s&aacute;ng v&agrave; l&agrave;m thủ tục trả ph&ograve;ng kh&aacute;ch sạn.</p>\r\n\r\n<p>Đ&oacute;n b&igrave;nh minh tr&ecirc;n n&uacute;i ở H&agrave; Giang - Ảnh: Hitour</p>\r\n\r\n<p>Xe v&agrave; HDV đưa đo&agrave;n du kh&aacute;ch đi tham quan theo tr&igrave;nh tự sau: <strong>Cao nguy&ecirc;n đ&aacute; Đồng Văn</strong> với vẻ đẹp hoang sơ, thơ mộng tựa như một &ldquo;thi&ecirc;n đường x&aacute;m&rdquo; giữa miền sơn cước địa đầu Tổ quốc th&acirc;n y&ecirc;u, cao nguy&ecirc;n đ&aacute; trải rộng tr&ecirc;n bốn huyện Quản Bạ, Y&ecirc;n Minh, Đồng Văn, M&egrave;o Vạc.</p>\r\n\r\n<p>Vẻ đẹp nơi Cao nguy&ecirc;n đ&aacute; Đồng Văn H&agrave; Giang - Ảnh: Hitour</p>\r\n\r\n<p><strong>Phố C&aacute;o</strong> chụp h&igrave;nh với hoa mận hoa đ&agrave;o dịp tết &acirc;m lịch v&agrave; thăm chợ phi&ecirc;n Phố C&aacute;o.</p>\r\n\r\n<p>Thăm chợ phi&ecirc;n Phố C&aacute;o H&agrave; Giang - Ảnh: Hitour</p>\r\n\r\n<p><strong>08:30</strong> Đến <strong>bản Sủng L&agrave;</strong> tham quan ng&ocirc;i nh&agrave; Cổ của người H&#39;m&ocirc;ng với trường tr&igrave;nh bằng đất. <strong>L&agrave;ng văn h&oacute;a Lũng Cẩm</strong> l&agrave; một trong những ng&ocirc;i l&agrave;ng đẹp nhất của người H&#39;mong trắng, với nhiều ng&ocirc;i nh&agrave; cổ k&iacute;nh với bề d&agrave;y l&ecirc;n tới 100 năm tuổi. <strong>Nh&agrave; của Pao</strong> trong bộ phim nổi tiếng &ldquo;Chuyện của Pao&rdquo; đ&atilde; đoạt giải c&aacute;nh Diều v&agrave;ng của Hội Điện ảnh Việt Nam.</p>\r\n\r\n<p>Thăm Thung lũng Sủng L&agrave; ở H&agrave; Giang - Ảnh: Hitour</p>\r\n\r\n<p><strong>Dinh Vua M&egrave;o Vương Ch&iacute;nh Đức</strong> nằm trong thung lũng của x&atilde; S&agrave; Ph&igrave;n, đ&acirc;y l&agrave; d&ograve;ng họ gi&agrave;u c&oacute; v&agrave; quyền uy nhất Ch&acirc;u Đồng Văn v&agrave;o đầu thế kỷ 20 qu&yacute; kh&aacute;ch tự do tham quan, chụp h&igrave;nh hoa tam gi&aacute;c mạch tại khu vực Lũng T&aacute;o v&agrave; nghỉ ngơi.</p>\r\n\r\n<p>Dinh Vua M&egrave;o Vương Ch&iacute;nh Đức - Ảnh: Hitour</p>\r\n\r\n<p><strong>Cột Cờ Lũng C&uacute;</strong> &ndash; điểm cực Bắc địa đầu của tổ quốc. Đứng từ cột cờ Lũng C&uacute; du kh&aacute;ch c&oacute; thể ngắm to&agrave;n bọ cảnh những <strong>thửa rộng bậc thang</strong> với l&uacute;a ch&iacute;n v&agrave;ng, lấp l&aacute;nh dưới &aacute;nh nắng chối chang.</p>\r\n\r\n<p>Chinh phục Cột Cờ Lũng C&uacute; - Ảnh: Hitour</p>\r\n\r\n<p>Vẻ đẹp của ruộng bậc thang ch&iacute;n v&agrave;ng H&agrave; Giang - Ảnh: Hitour</p>\r\n\r\n<p>Thấp tho&aacute;ng xuất hiện những m&aacute;i nh&agrave; của người d&acirc;n, phong cảnh thật y&ecirc;n b&igrave;nh đến lạ. Ngo&agrave;i ra c&oacute; kh&ocirc;ng &iacute;t những <strong>c&aacute;nh đồng hoa Tam gi&aacute; mạch</strong> tr&ecirc;n đường đi l&ecirc;n cột cờ Lũng C&uacute;, du kh&aacute;ch c&oacute; thể thỏa th&iacute;ch ngắm cảnh, chụp h&igrave;nh, quả thật cứ như bạn đang bị lạc v&agrave;o chốn thần ti&ecirc;n vậy.</p>\r\n\r\n<p>C&aacute;nh đồng Tam Gi&aacute;c Mạch H&agrave; Giang - Ảnh: Hitour</p>\r\n\r\n<p><strong>12:30</strong> Qu&yacute; kh&aacute;ch tập trung l&ecirc;n xe đến Đồng Văn d&ugrave;ng cơm trưa với những m&oacute;n ngon đặc sản tại đ&acirc;y.</p>\r\n\r\n<p>Ngắm nh&igrave;n D&ograve;ng s&ocirc;ng Nho Quế từ tr&ecirc;n đ&egrave;o M&atilde; P&iacute; L&egrave;ng - Ảnh: Hitour</p>\r\n\r\n<p><strong>14:00</strong> Tham quan <strong>phố cổ Đồng Văn</strong> đ&atilde; tồn tại c&ugrave;ng thời gian gần 100 năm, ngồi nh&acirc;m nhi thưởng thức một ly cafe tại qu&aacute;n cafe Phố Cổ thơm ngon v&agrave; để cảm nhận cuộc sống b&igrave;nh dị của người d&acirc;n miền n&uacute;i (chi ph&iacute; tự t&uacute;c).</p>\r\n\r\n<p>Tự do tản bộ trong phố cổ Đồng Văn - Ảnh: Hitour</p>\r\n\r\n<p><strong>Đ&egrave;o M&atilde; P&igrave; L&egrave;ng</strong> một trong &ldquo;Tứ Đại Đỉnh Đ&egrave;o&rdquo; nổi tiếng nhất của Việt Nam. Đ&egrave;o M&atilde; P&igrave; L&egrave;ng ở độ cao 2,000 m so với mực nước biển với sự cheo leo c&ugrave;ng những kh&uacute;c cua quanh co uống lượn. Đứng từ tr&ecirc;n đ&egrave;o du kh&aacute;ch c&oacute; thể ngắm <strong>d&ograve;ng s&ocirc;ng Nho Quế</strong> uốn lượn như một dải lụa theo sườn đ&egrave;o, đ&oacute; l&agrave; một trải nghiệm v&ocirc; c&ugrave;ng hấp dẫn v&agrave; th&uacute; vị.</p>\r\n\r\n<p>Khung cảnh h&ugrave;ng vĩ của đ&egrave;o M&atilde; P&iacute; L&egrave;ng - Ảnh: Hitour</p>\r\n\r\n<p>Ngắm nh&igrave;n D&ograve;ng s&ocirc;ng Nho Quế từ tr&ecirc;n đ&egrave;o M&atilde; P&iacute; L&egrave;ng - Ảnh: Hitour</p>\r\n\r\n<p>Đo&agrave;n l&ecirc;n xe về lại Y&ecirc;n Minh sẽ đi qua thị trấn M&egrave;o Vạc, tr&ecirc;n đường được chụp h&igrave;nh với hoa tam gi&aacute;c mạch tại khu vực thung lũng dưới ch&acirc;n đ&egrave;o M&atilde; P&igrave; L&egrave;ng, gh&eacute; tham quan chụp ảnh con <strong>đường đ&egrave;o chữ M</strong> nổi tiếng của M&egrave;o Vạc.</p>\r\n\r\n<p>Đường đ&egrave;o chữ M nổi tiếng của M&egrave;o Vạc - Ảnh: Hitour</p>\r\n\r\n<p><strong>18:30</strong> Đo&agrave;n về đến Y&ecirc;n Minh, thưởng thức bữa tối tại nh&agrave; h&agrave;ng với những m&oacute;n ngon đặc sản H&agrave; Giang. Sau đ&oacute; nhận ph&ograve;ng kh&aacute;ch sạn nghỉ ngơi v&agrave; tự do tản bộ v&agrave; thăm khu phố cổ Đồng Văn mang đậm dấu ấn kiến tr&uacute;c của người Hoa với những ng&ocirc;i nh&agrave; hai tầng lợp ng&oacute;i &acirc;m dương, những chiếc đ&egrave;n lồng đỏ, nh&acirc;m nhi ly c&agrave; ph&ecirc;, h&iacute;t thở kh&ocirc;ng kh&iacute; trong l&agrave;nh m&aacute;t mẻ.</p>\r\n\r\n<p><strong>Ng&agrave;y 3 | Y&ecirc;n Minh - Ruộng Bậc Thang Ho&agrave;ng Su Ph&igrave; (Ăn s&aacute;ng, trưa, tối)</strong></p>\r\n\r\n<p><strong>06:30</strong> Qu&yacute; kh&aacute;ch thức dậy đ&oacute;n b&igrave;nh minh buổi sớm tr&ecirc;n n&uacute;i, tận hưởng bầu kh&ocirc;ng kh&iacute; trong l&agrave;nh của H&agrave; Giang. Sau đ&oacute; thưởng thức bữa s&aacute;ng v&agrave; l&agrave;m thủ tục trả ph&ograve;ng kh&aacute;ch sạn. Xe v&agrave; HDV đưa đo&agrave;n du kh&aacute;ch đi tham quan những danh lam thắng cảnh <strong>ruộng bậc thang Ho&agrave;ng Su Ph&igrave;</strong> được đ&aacute;nh gi&aacute; v&agrave;o loại đẹp nhất Việt Nam với lịch sử h&agrave;ng trăm năm khai hoang của bao thế hệ người La Ch&iacute;, Dao, N&ugrave;ng. B&agrave; con đ&atilde; đổ nhiều mồ h&ocirc;i, xương m&aacute;u để đổi lấy những thửa ruộng kỳ vĩ uốn lượn theo từng thế n&uacute;i, thế s&ocirc;ng.</p>\r\n\r\n<p>ruộng bậc thang Ho&agrave;ng Su Ph&igrave; ở H&agrave; Giang - Ảnh: Hitour</p>\r\n\r\n<p><strong>11:00</strong>Đo&agrave;n d&ugrave;ng cơm trưa tại H&agrave; Giang v&agrave; tiếp tục đi Ho&agrave;ng Su Ph&igrave;. Tr&ecirc;n đường đi qu&yacute; kh&aacute;ch sẽ tận mắt chi&ecirc;m ngưỡng những thửa ruộng bậc thang đ&atilde; được xếp v&agrave;o di t&iacute;ch Quốc gia, th&igrave; <strong>ruộng bậc thang Ho&agrave;ng Su Ph&igrave;</strong> dẫn đầu danh s&aacute;ch. Những ai từng đến Ho&agrave;ng Su Ph&igrave; đều ngạc nhi&ecirc;n v&agrave; th&aacute;n phục khi tận mắt ngắm nh&igrave;n lớp lớp những thửa ruộng bậc thang ngập tr&agrave;n hoặc treo tr&ecirc;n những n&uacute;i đồi mờ sương. Một bức tranh to&agrave;n mỹ được con người vẽ trong kh&ocirc;ng gian bao la v&agrave; h&ugrave;ng vĩ của đất trời, thi&ecirc;n nhi&ecirc;n giữa v&ugrave;ng cao bi&ecirc;n giới.</p>\r\n\r\n<p>Vẻ đẹp h&ugrave;ng vĩ của ruộng bậc thang Ho&agrave;ng Su Ph&igrave; - Ảnh: Hitour</p>\r\n\r\n<p><strong>17:00</strong> Đến thị trấn Vinh Quang (Ho&agrave;ng Su Ph&igrave;) qu&yacute; kh&aacute;ch nhận ph&ograve;ng v&agrave; nghỉ ngơi.</p>\r\n\r\n<p><strong>18:30</strong> Đo&agrave;n thưởng thức bữa tối tại nh&agrave; h&agrave;ng với những m&oacute;n ngon đặc sản H&agrave; Giang. Sau đ&oacute; tự do kh&aacute;m ph&aacute; vẻ đẹp của thị trấn Vinh Quang huyện Ho&agrave;ng Su Ph&igrave; về đ&ecirc;m, c&ugrave;ng t&igrave;m hiểu văn h&oacute;a, cuộc sống b&igrave;nh dị của người bản địa hoặc thưởng thức m&oacute;n nướng thơm ngon tại nơi đ&acirc;y. Trở về kh&aacute;ch sạn nghỉ đ&ecirc;m tại Ho&agrave;ng Su Ph&igrave;.</p>\r\n\r\n<p>Thưởng thức c&aacute;c m&oacute;n đặc sản tại H&agrave; Giang - Ảnh: Hitour</p>\r\n\r\n<p><strong>Ng&agrave;y 4 | Ho&agrave;ng Su Ph&igrave; - X&iacute;u Mần - Đ&egrave;o Gi&oacute; - Th&aacute;c Ti&ecirc;n - H&agrave; Nội (Ăn s&aacute;ng, trưa)</strong></p>\r\n\r\n<p><strong>06:00</strong> Qu&yacute; kh&aacute;ch d&ugrave;ng bữa s&aacute;ng sau đ&oacute; l&agrave;m thủ tục trả ph&ograve;ng kh&aacute;ch sạn. Xe v&agrave; Hướng dẫn vi&ecirc;n đưa Qu&yacute; kh&aacute;ch đi <strong>X&iacute;n Mần</strong> tr&ecirc;n đường đi sẽ được tham quan <strong>Đ&egrave;o Gi&oacute;</strong> với cảnh quang h&ugrave;ng vỹ c&oacute; 1 - 0 - 2. <strong>Th&aacute;c Ti&ecirc;n</strong> th&aacute;c nước đẹp quanh năm đầy nước trắng x&oacute;a bọt tuyết, qu&yacute; kh&aacute;ch sẽ đi bộ tr&ecirc;n con đường m&ograve;n nhỏ dẫn xuống th&aacute;c chi&ecirc;m ngưỡng vẻ đẹp của bốn bề rừng tr&uacute;c xanh mướt đẹp nhưng cảnh trong phim trường.</p>\r\n\r\n<p>Vẻ đẹp h&ugrave;ng vĩ của X&iacute;n Mần H&agrave; Giang - Ảnh: Hitour</p>\r\n\r\n<p><strong>12:00</strong> Qu&yacute; kh&aacute;ch ăn trưa tại nh&agrave; h&agrave;ng Bắc Quang. Sau đ&oacute; l&ecirc;n xe tiếp tục h&agrave;nh tr&igrave;nh về lại H&agrave; Nội</p>\r\n\r\n<p><strong>18:00</strong> Xe đưa đo&agrave;n về đến H&agrave; Nội. Kết th&uacute;c chương tr&igrave;nh Tour H&agrave; Giang. Tạm biệt Qu&yacute; kh&aacute;ch v&agrave; hẹn gặp lại!</p>\r\n\r\n<p>Tour du lịch H&agrave; Giang 4 ng&agrave;y 3 đ&ecirc;m - Ảnh: Hitour</p>\r\n\r\n<p>Ch&iacute;nh s&aacute;ch trẻ em</p>\r\n\r\n<p>Trẻ em 04 tuổi trở xuống: miễn gi&aacute; tour (cha mẹ tự lo cho b&eacute;).</p>\r\n\r\n<p>Trẻ em từ 05 &ndash; 09 tuổi: 75% gi&aacute; tour, bao gồm c&aacute;c dịch vụ ăn uống, ghế ngồi tr&ecirc;n xe nhưng b&eacute; ngủ chung với cha mẹ, kh&ocirc;ng c&oacute; giường ri&ecirc;ng.</p>\r\n\r\n<p>Trẻ em từ 10 tuổi trở l&ecirc;n: 100% gi&aacute; tour như người lớn.</p>\r\n\r\n<p>Kh&aacute;ch đi tour k&egrave;m theo 02 trẻ em từ 04 tuổi trở xuống qu&yacute; kh&aacute;ch mua th&ecirc;m 1 v&eacute; 75% gi&aacute; tour để c&oacute; ti&ecirc;u chuẩn ăn uống, ghế ngồi tr&ecirc;n xe, tham quan cho b&eacute;.</p>\r\n\r\n<p>Tour bao gồm</p>\r\n\r\n<p>Phương tiện: Xe du lịch đời mới 16 chỗ, 29 chỗ v&agrave; 45 chỗ, ghế bật, m&aacute;y lạnh t&ugrave;y theo số lượng thực tế</p>\r\n\r\n<p>Xe 16 chỗ: Ford Transit, Mercedes Transit,...</p>\r\n\r\n<p>Xe 29 chỗ: Samco, Thaco,...</p>\r\n\r\n<p>Xe 45 chỗ: Universe,...</p>\r\n\r\n<p>Kh&aacute;ch sạn /Nh&agrave; nghỉ: Ti&ecirc;u chuẩn Mini - 3 sao, 02 kh&aacute;ch /ph&ograve;ng, trường hợp lẻ ngủ ph&ograve;ng 03 kh&aacute;ch</p>\r\n\r\n<p>Kh&aacute;ch sạn 03 sao: Royal, Ciao, Đinh Gia,...</p>\r\n\r\n<p>Kh&aacute;ch sạn 02 sao: Long, H&agrave; Giang Historic, Thu Huyền, Đức Lan,...</p>\r\n\r\n<p>Kh&aacute;ch sạn Mini: Y&ecirc;n Minh, Golden Jungle, Hương Thảo, Đồng Văn,...</p>\r\n\r\n<p>Ăn uống: Theo chương tr&igrave;nh</p>\r\n\r\n<p>Ăn s&aacute;ng 03 bữa: tại kh&aacute;ch sạn (&aacute;p dụng với dịch vụ bao gồm ph&ograve;ng)</p>\r\n\r\n<p>Ăn trưa 07 bữa: với những đặc sản hấp dẫn tại H&agrave; Giang</p>\r\n\r\n<p>Hướng dẫn vi&ecirc;n thuyết minh v&agrave; phục vụ cho đo&agrave;n suốt tuyến</p>\r\n\r\n<p>Điểm tham quan: V&eacute; v&agrave;o cổng c&aacute;c điểm tham quan theo chương tr&igrave;nh.</p>\r\n\r\n<p>Bảo hiểm: Theo luật bảo hiểm du lịch Việt Nam bồi thường l&ecirc;n đến 20,000,000đ /trường hợp.</p>\r\n\r\n<p>Khăn lạnh, nước uống (01 khăn &amp; 01 chai /kh&aacute;ch /ng&agrave;y).</p>\r\n\r\n<p>Tour chưa bao gồm</p>\r\n\r\n<p>C&aacute;c chi ph&iacute; c&aacute; nh&acirc;n kh&aacute;c như: giặt ủi, điện thoại, thức uống trong minibar v&agrave; trong c&aacute;c bữa ăn</p>\r\n\r\n<p>Thuế V.A.T 10% (đối với Qu&yacute; kh&aacute;ch cần lấy h&oacute;a đơn GTGT)</p>\r\n\r\n<p>Phụ thu lễ, tết</p>\r\n\r\n<p>Phu thu ph&ograve;ng đơn (01 kh&aacute;ch /ph&ograve;ng)</p>\r\n\r\n<p>Phu thu kh&aacute;ch nước ngo&agrave;i (thủ tục khai b&aacute;o với c&ocirc;ng an H&agrave; Giang): 10usd /kh&aacute;ch</p>\r\n\r\n<p>Tiền tip cho HDV, t&agrave;i xế</p>\r\n\r\n<p>Ch&iacute;nh s&aacute;ch hủy Tour du lịch H&agrave; Giang 4 ng&agrave;y 3 đ&ecirc;m</p>\r\n\r\n<p>Trong v&ograve;ng 05 (năm) ng&agrave;y trước ng&agrave;y khởi h&agrave;nh: Ph&iacute; 50% gi&aacute; tour của người hủy chuyến.</p>\r\n\r\n<p>Trong v&ograve;ng 03 (ba) ng&agrave;y trước ng&agrave;y khởi h&agrave;nh: Ph&iacute; 70% gi&aacute; tour của người hủy chuyến.</p>\r\n\r\n<p>Trong v&ograve;ng 24 giờ (hai mươi bốn) trước ng&agrave;y khởi h&agrave;nh: Ph&iacute; 100% gi&aacute; tour của người hủy chuyến.</p>\r\n\r\n<p>Lễ, tết: Ph&iacute; 100% gi&aacute; tour.</p>\r\n\r\n<p>Lưu &yacute; khi tham gia Tour du lịch H&agrave; Giang 4 ng&agrave;y 3 đ&ecirc;m</p>\r\n\r\n<p>Khi tham gia chương tr&igrave;nh tour, qu&yacute; kh&aacute;ch vui l&ograve;ng mang theo giấy tờ t&ugrave;y th&acirc;n (bản ch&iacute;nh đối với kh&aacute;ch Việt Nam l&agrave; CMND (r&otilde; ảnh, c&ograve;n hạn dưới 15 năm) hoặc Giấy ph&eacute;p l&aacute;i xe (r&otilde; ảnh, c&ograve;n hạn sử dụng) hoặc Passport (c&ograve;n hạn tr&ecirc;n 1 th&aacute;ng) hoặc c&aacute;c loại giấy tờ kh&aacute;c theo quy định của h&agrave;ng kh&ocirc;ng Việt Nam.</p>\r\n\r\n<p>Đối với kh&aacute;ch Kiều b&agrave;o &amp; ngoại quốc nhập cảnh bằng visa rời, vui l&ograve;ng mang theo visa, tờ khai hải quan khi đi du lịch v&agrave; passport.</p>\r\n\r\n<p>Phải cung cấp t&ecirc;n ch&iacute;nh x&aacute;c theo CMND, passport, khai sinh (đ/v trẻ em dưới 14 tuổi). Cung cấp ng&agrave;y th&aacute;ng năm sinh của trẻ em dưới 12 tuổi.</p>\r\n\r\n<p>Trẻ em dưới 14 tuổi khi đi du lịch, vui l&ograve;ng mang theo Giấy Khai Sinh (bản ch&iacute;nh hoặc sao y c&oacute; thị thực) để l&agrave;m thủ tục h&agrave;ng kh&ocirc;ng v&agrave; c&aacute;c thủ tục h&agrave;nh ch&iacute;nh kh&aacute;c. Nếu kh&ocirc;ng c&oacute; cha hoặc mẹ đi c&ugrave;ng phải c&oacute; giấy ủy quyền của cha mẹ v&agrave; c&oacute; x&aacute;c nhận của Ch&iacute;nh quyền địa phương (phường, x&atilde;).</p>\r\n\r\n<p>H&atilde;ng lữ h&agrave;nh sẽ kh&ocirc;ng chịu tr&aacute;ch nhiệm nếu h&atilde;ng vận chuyển v&agrave; an ninh từ chối vận chuyển nếu c&oacute; sai s&oacute;t những th&ocirc;ng tin tr&ecirc;n.</p>\r\n\r\n<p>Một số thứ tự v&agrave; chi tiết trong chương tr&igrave;nh c&oacute; thể thay đổi để ph&ugrave; hợp với t&igrave;nh h&igrave;nh thực tế nhưng vẫn đảm bảo đủ c&aacute;c điểm tham quan.</p>\r\n\r\n<p>Thực đơn c&oacute; thể thay đổi theo t&igrave;nh h&igrave;nh thực tế nhưng số lượng v&agrave; chất lượng thức ăn kh&ocirc;ng thay đổi.</p>\r\n\r\n<p>V&igrave; những l&yacute; do bất khả kh&aacute;ng như: thời tiết, thi&ecirc;n tai&hellip; c&ocirc;ng ty sẽ chủ động thay đổi lịch tr&igrave;nh hoặc đổi tour, hủy tour v&igrave; sự an to&agrave;n của qu&yacute; kh&aacute;ch</p>\r\n\r\n<p>Trong trường hợp hủy tour c&ocirc;ng ty sẽ ho&agrave;n một phần chi ph&iacute; cho du kh&aacute;ch đối với những dịch vụ chưa sử dụng cho việc tổ chức tour v&agrave; kh&ocirc;ng bồi thường th&ecirc;m bất k&igrave; khoản ph&iacute; n&agrave;o kh&aacute;c.</p>\r\n\r\n<p>Thực đơn Tour du lịch H&agrave; Giang 4 ng&agrave;y 3 đ&ecirc;m</p>\r\n\r\n<p><strong>Thực đơn 1 (150,000đ)</strong></p>\r\n\r\n<p>NH&Agrave; H&Agrave;NG H&Agrave; GIANG</p>\r\n\r\n<p>Gỏi c&aacute; tr&iacute;ch</p>\r\n\r\n<p>Mực chi&ecirc;n mắm</p>\r\n\r\n<p>Hải sản x&agrave;o thập cẩm</p>\r\n\r\n<p>C&aacute; kho tộ</p>\r\n\r\n<p>Lẩu chua c&aacute; bớp</p>\r\n\r\n<p>Cơm trắng</p>\r\n\r\n<p>Tr&aacute;i c&acirc;y</p>\r\n\r\n<p>Tr&agrave; đ&aacute; &amp; Khăn lạnh</p>\r\n\r\n<p><strong>Thực đơn 2 (150,000đ)</strong></p>\r\n\r\n<p>NH&Agrave; H&Agrave;NG H&Agrave; GIANG</p>\r\n\r\n<p>Mực hấp /chi&ecirc;n</p>\r\n\r\n<p>Gỏi hải sản</p>\r\n\r\n<p>C&aacute; kho tộ</p>\r\n\r\n<p>Hải sản x&agrave;o thập cẩm</p>\r\n\r\n<p>Lẩu ng&oacute;t c&aacute;</p>\r\n\r\n<p>Cơm trắng</p>\r\n\r\n<p>Tr&aacute;i c&acirc;y</p>\r\n\r\n<p>Tr&agrave; đ&aacute; &amp; Khăn lạnh</p>\r\n\r\n<p><strong>Thực đơn 3 (150,000đ)</strong></p>\r\n\r\n<p>NH&Agrave; H&Agrave;NG H&Agrave; GIANG</p>\r\n\r\n<p>Gỏi c&aacute;</p>\r\n\r\n<p>C&aacute; chi&ecirc;n muối ớt</p>\r\n\r\n<p>G&agrave; ram gừng /x&atilde; ớt</p>\r\n\r\n<p>Rau muống x&agrave;o b&ograve;</p>\r\n\r\n<p>Lẩu măng chua nh&aacute;m</p>\r\n\r\n<p>Cơm trắng</p>\r\n\r\n<p>Tr&aacute;i c&acirc;y</p>\r\n\r\n<p>Tr&agrave; đ&aacute; &amp; Khăn lạnh</p>\r\n\r\n<p><strong>Thực đơn 4 (150,000đ)</strong></p>\r\n\r\n<p>NH&Agrave; H&Agrave;NG H&Agrave; GIANG</p>\r\n\r\n<p>S&ograve; quạt nướng</p>\r\n\r\n<p>C&aacute; chi&ecirc;n sốt c&agrave;</p>\r\n\r\n<p>Hải sản x&agrave;o rau</p>\r\n\r\n<p>Thịt x&agrave;o mắm ruốc</p>\r\n\r\n<p>Lẩu sườn la gim</p>\r\n\r\n<p>Cơm trắng</p>\r\n\r\n<p>Tr&aacute;i c&acirc;y</p>\r\n\r\n<p>Tr&agrave; đ&aacute; &amp; Khăn lạnh</p>\r\n\r\n<p><strong>Thực đơn 5 (150,000đ)</strong></p>\r\n\r\n<p>NH&Agrave; H&Agrave;NG H&Agrave; GIANG</p>\r\n\r\n<p>Gỏi hải sản</p>\r\n\r\n<p>H&agrave;o chi&ecirc;n bột</p>\r\n\r\n<p>C&agrave; t&iacute;m mỡ h&agrave;nh</p>\r\n\r\n<p>T&ocirc;m rim thịt</p>\r\n\r\n<p>Lẩu ng&oacute;t c&aacute;</p>\r\n\r\n<p>Cơm trắng</p>\r\n\r\n<p>Tr&aacute;i c&acirc;y</p>\r\n\r\n<p>Tr&agrave; đ&aacute; &amp; Khăn lạnh</p>\r\n\r\n<p><strong>Thực đơn 6 (150,000đ)</strong></p>\r\n\r\n<p>NH&Agrave; H&Agrave;NG H&Agrave; GIANG</p>\r\n\r\n<p>S&ograve; nướng</p>\r\n\r\n<p>Ghẹ sữa chi&ecirc;n bột</p>\r\n\r\n<p>Rau luộc</p>\r\n\r\n<p>C&aacute; b&oacute;p kho tộ</p>\r\n\r\n<p>Lẩu hải sản</p>\r\n\r\n<p>Cơm trắng</p>\r\n\r\n<p>Tr&aacute;i c&acirc;y</p>\r\n\r\n<p>Tr&agrave; đ&aacute; &amp; Khăn lạnh</p>\r\n\r\n<p>Kh&aacute;ch sạn tham khảo</p>\r\n\r\n<p><strong>Royal (Kh&aacute;ch sạn 3*)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Long (Kh&aacute;ch sạn 2*)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Golden Jungle (Kh&aacute;ch sạn MINI)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tour li&ecirc;n quan</p>\r\n\r\n<p>2N1Đ</p>\r\n\r\n<p>Tour du lịch H&agrave; Giang 2 ng&agrave;y 1 đ&ecirc;m</p>\r\n\r\n<p>H&agrave; Nội - H&agrave; Giang - Đồng Văn - Cột Cờ Lũng C&uacute; - Đ&egrave;o M&atilde; P&iacute; L&egrave;ng</p>\r\n\r\n<p>Đ&oacute;n tại H&agrave; Nội</p>\r\n\r\n<p>Khởi h&agrave;nh mỗi ng&agrave;y</p>\r\n\r\n<p><strong>1,750,000đ</strong></p>\r\n\r\n<p>3N2Đ</p>\r\n\r\n<p>Tour du lịch H&agrave; Giang 3 ng&agrave;y 2 đ&ecirc;m</p>\r\n\r\n<p>H&agrave; Nội - H&agrave; Giang - Quản Bạ - Y&ecirc;n Minh - Cao Nguy&ecirc;n Đ&aacute; Đồng Văn - Lũng C&uacute; - Đ&egrave;o M&atilde; P&iacute; L&egrave;ng</p>\r\n\r\n<p>Đ&oacute;n tại H&agrave; Nội</p>\r\n\r\n<p>Khởi h&agrave;nh mỗi ng&agrave;y</p>\r\n\r\n<p><strong>2,450,000đ</strong></p>\r\n\r\n<p>6N5Đ</p>\r\n\r\n<p>Tour du lịch H&agrave; Nội - H&agrave; Giang - Cao Bằng 6 ng&agrave;y 5 đ&ecirc;m</p>\r\n\r\n<p>TP. HCM &ndash; H&agrave; Nội - Ph&uacute; Thọ &ndash; H&agrave; Giang - Quản Bạ - Y&ecirc;n Minh - Đồng Văn - Lũng C&uacute; - M&egrave;o Vạc - Cao Bằng - Th&aacute;c Bản Giốc - Động Ngườm Ngao - Bắc Kạn - Hồ Ba Bể</p>\r\n\r\n<p>Đ&oacute;n tại TPHCM /H&agrave; Nội</p>\r\n\r\n<p>&iacute;t nhất 10 người</p>\r\n\r\n<p><strong>9,990,000đ</strong></p>\r\n\r\n<p><strong>Tour du lịch H&agrave; Giang 4 ng&agrave;y 3 đ&ecirc;m</strong></p>\r\n\r\n<p><strong>M&atilde; tour</strong></p>\r\n\r\n<p>TGHG040303</p>\r\n\r\n<p><strong>Thời gian</strong></p>\r\n\r\n<p>4 ng&agrave;y 3 đ&ecirc;m</p>\r\n\r\n<p><strong>Lịch tour</strong></p>\r\n\r\n<p>Khởi h&agrave;nh mỗi ng&agrave;y</p>\r\n\r\n<p><strong>Vận chuyển</strong></p>\r\n\r\n<p>Xe du lịch</p>\r\n\r\n<p><strong>Xuất ph&aacute;t</strong></p>\r\n\r\n<p>H&agrave; Nội</p>\r\n\r\n<p>gi&aacute; từ: <strong>4,350,000đ</strong></p>\r\n\r\n<p><strong>Điểm Nổi Bật Chương Tr&igrave;nh:</strong></p>\r\n\r\n<p><strong>Du lịch H&agrave; Giang</strong> điểm đến hấp dẫn cho du kh&aacute;ch th&iacute;ch kh&aacute;m ph&aacute;, trải nghiệm v&agrave; nghỉ dưỡng, c&ugrave;ng với c&aacute;c di t&iacute;ch lịch sử khiến cho H&agrave; Giang trở th&agrave;nh điểm du lịch nổi tiếng kh&ocirc;ng chỉ ở Việt Nam m&agrave; c&ograve;n ở cả tr&ecirc;n Thế giới</p>\r\n\r\n<p><strong>Tour du lịch H&agrave; Giang 4 ng&agrave;y 3 đ&ecirc;m trọn g&oacute;i</strong> của Hitour khởi h&agrave;nh từ H&agrave; Nội đ&aacute;p ứng mọi nhu cầu của kh&aacute;ch h&agrave;ng</p>\r\n\r\n<p>C&aacute;c điểm tham quan nổi tiếng được sắp xếp hợp l&yacute; v&agrave; đầy đủ, thực đơn đa dạng phong ph&uacute; với những m&oacute;n hải sản đặc trưng của đảo, uy t&iacute;n - chuy&ecirc;n nghiệp - tận t&acirc;m n&ecirc;n được qu&yacute; kh&aacute;ch h&agrave;ng y&ecirc;u th&iacute;ch v&agrave; l&agrave; lựa chọn tuyệt vời cho kỳ nghĩ dưỡng của m&igrave;nh.</p>\r\n\r\n<p>Với tour H&agrave; Giang 4 ng&agrave;y 3 đ&ecirc;m trọn g&oacute;i qu&yacute; kh&aacute;ch được trải nghiệm tham quan theo tr&igrave;nh tự như sau: đền Đ&ocirc;i C&ocirc; Cầu M&aacute;, Cổng trời Quản Bạ, N&uacute;i đ&ocirc;i C&ocirc; Ti&ecirc;n, C&aacute;nh đồng hoa Tam gi&aacute;c mạch, Cao nguy&ecirc;n đ&aacute; Đồng Văn, Phố C&aacute;o, bản Sủng L&agrave;, L&agrave;ng văn h&oacute;a Lũng Cẩm, Nh&agrave; của Pao, Dinh Vua M&egrave;o Vương Ch&iacute;nh Đức, Cột Cờ Lũng C&uacute; , phố cổ Đồng Văn, Đ&egrave;o M&atilde; P&igrave; L&egrave;ng, ruộng bậc thang Ho&agrave;ng Su Ph&igrave;, Đ&egrave;o Gi&oacute;, Th&aacute;c Ti&ecirc;n,...</p>\r\n\r\n<p>Khi tham gia tour H&agrave; Giang trọn g&oacute;i qu&yacute; kh&aacute;ch kh&ocirc;ng cần lo lắng việc ăn uống - nghỉ ngơi - phương tiện di chuyển v&igrave; đ&atilde; bao gồm trong lịch tr&igrave;nh tour</p>\r\n\r\n<p><strong>Xem th&ecirc;m</strong></p>\r\n\r\n<p>Tư vấn:</p>\r\n\r\n<p><strong>08 6868 4868</strong> (hotline)</p>\r\n\r\n<p>Đặt Tour</p>\r\n\r\n<p>Điểm nổi bật CT TourBảng gi&aacute; TourLịch tr&igrave;nh TourCh&iacute;nh s&aacute;ch trẻ emTour bao gồm v&agrave; kh&ocirc;ng bao gồmCh&iacute;nh s&aacute;ch hủy tourLưu &yacute;Thực đơnKh&aacute;ch sạn tham khảoTour li&ecirc;n quan</p>\r\n\r\n<p><strong>Cty TNHH du lich biển đảo Hitour</strong></p>\r\n\r\n<p>trụ sở: 43 Nguyễn Tu&acirc;n, Vĩnh Quang, Rạch Gi&aacute;, Ki&ecirc;n Giang</p>\r\n\r\n<p>hotline: 08 6868 4868</p>\r\n\r\n<p>website: hitour.vn - hitour.com.vn</p>\r\n\r\n<p>email: hiphuquoc@gmail.com</p>\r\n\r\n<p>G&oacute;c kh&aacute;ch h&agrave;ng</p>\r\n\r\n<p>Th&ocirc;ng tin thanh to&aacute;n</p>\r\n\r\n<p>Ch&iacute;nh s&aacute;ch đặt dịch vụ</p>\r\n\r\n<p>Ch&iacute;nh s&aacute;ch bảo mật</p>\r\n\r\n<p>Chứng nhận</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Đăng k&yacute; nhận khuyến m&atilde;i</p>\r\n\r\n<p>Nhập email để nhận th&ocirc;ng tin về c&aacute;c chương tr&igrave;nh khuyến m&atilde;i của Hitour!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Giấy chứng nhận đăng k&yacute; kinh doanh số GP/no: 1702204052 cấp bởi Sở Kế hoạch v&agrave; Đầu tư Tỉnh Ki&ecirc;n Giang ng&agrave;y 20/08/2020</p>\r\n\r\n<p>Chấp nhận thanh to&aacute;n</p>\r\n\r\n<p>Ng&acirc;n h&agrave;ng /Internet Banking</p>\r\n\r\n<p>Thanh to&aacute;n qua ATM</p>\r\n\r\n<p>Thanh to&aacute;n trực tiếp</p>\r\n\r\n<p>Dự &aacute;n của Hitour</p>\r\n\r\n<p>H&igrave;nh nền điện thoại</p>\r\n\r\n<p>Cẩm nang du lịch Việt</p>\r\n\r\n<p>Trang v&eacute; to&agrave;n quốc</p>\r\n\r\n<p>Bất động sản</p>\r\n\r\n<p>Kết nối với ch&uacute;ng t&ocirc;i</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&copy; Bản quyền <strong>Hitour</strong> - Thiết kế v&agrave; ph&aacute;t triển bởi Phạm Văn Ph&uacute;. Ghi r&otilde; nguồn &quot;Hitour.vn&quot; khi sử dụng th&ocirc;ng tin từ website n&agrave;y!</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n', '4.500.000', '<p>Đ&agrave; Lạt, th&agrave;nh phố ng&agrave;n hoa, nằm tr&ecirc;n cao nguy&ecirc;n L&acirc;m Vi&ecirc;n thuộc tỉnh L&acirc;m Đồng, Việt Nam. Với kh&iacute; hậu m&aacute;t mẻ quanh năm, những rừng th&ocirc;ng bạt ng&agrave;n v&agrave; cảnh quan thi&ecirc;n nhi&ecirc;n thơ mộng, Đ&agrave; Lạt thu h&uacute;t du kh&aacute;ch với vẻ đẹp quyến rũ v&agrave; y&ecirc;n b&igrave;nh. Đ&agrave; Lạt c&ograve;n nổi tiếng với những biệt thự cổ k&iacute;nh kiểu Ph&aacute;p, c&aacute;c thung lũng hoa rực rỡ, c&ugrave;ng những hồ nước trong xanh như hồ Xu&acirc;n Hương, tạo n&ecirc;n kh&ocirc;ng gian l&atilde;ng mạn đặc trưng.</p>\r\n', 3);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `lichdat`
--
ALTER TABLE `lichdat`
  ADD PRIMARY KEY (`MaLD`),
  ADD KEY `FK_LD_KH` (`MaKH`) USING BTREE,
  ADD KEY `FK_LD_PC` (`MaTour`);

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
-- AUTO_INCREMENT for table `huongdanvien`
--
ALTER TABLE `huongdanvien`
  MODIFY `MaHDV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `lichdat`
--
ALTER TABLE `lichdat`
  MODIFY `MaLD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `phancong`
--
ALTER TABLE `phancong`
  MODIFY `MaPC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `MaTour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
