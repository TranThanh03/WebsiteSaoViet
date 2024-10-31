-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2024 at 12:17 PM
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
  `Gia` varchar(20) NOT NULL,
  `DanhGia` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `huongdanvien`
--

INSERT INTO `huongdanvien` (`MaHDV`, `TenHDV`, `AnhHDV`, `GioiTinh`, `NgaySinh`, `SDT`, `Email`, `MoTa`, `Gia`, `DanhGia`) VALUES
(15, 'Phung Thai Son', 'Screenshot 2024-10-24 000100.png', 'Nam', '2000-09-04', 2345645, 'thanhhkh33@gmail.com', '<p>Nhận đi qua đêm sdgrdfhgfdshn tăng thêm 10% 44</p>\r\n', '1.500.000', 5),
(17, 'Nguyen Hoang Son', 'Screenshot 2024-10-24 000221.png', 'Nam', '2003-10-25', 123456789, 'son@gmail.com', 'afasf', '4.500.000', 4);

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
(45, 'thanh', 'thanhhkh3@gmail.com', 49),
(47, 'thanh', 'thanhhkh@gmail.com', 51),
(48, 'thanh tran', 'thanhhkh1@gmail.com', 52);

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
  `NgayKT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `lichdat`
--

INSERT INTO `lichdat` (`MaLD`, `MaKH`, `MaTour`, `TongTien`, `ThoiGianDat`, `TrangThai`, `MaHDV`, `NgayKH`, `NgayKT`) VALUES
(65, 45, 15, '6.500.000', '2024-10-30 02:26:23', 'Đã hủy', 15, '2024-10-20', '2024-10-28'),
(66, 45, 15, '6.500.000', '2024-10-30 13:26:48', 'Đã hủy', 15, '2024-10-20', '2024-10-28'),
(67, 45, 15, '6.500.000', '2024-10-31 17:54:11', 'Đã xác nhận', 15, '2024-10-24', '2024-10-25');

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
  `TrangThai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `phancong`
--

INSERT INTO `phancong` (`MaPC`, `MaTour`, `MaHDV`, `NgayKH`, `NgayKT`, `TrangThai`) VALUES
(12, 15, 15, '2024-10-24', '2024-10-25', 'Đang diễn ra');

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
(49, 825702210, '123', 'user'),
(51, 825702211, '123', 'user'),
(52, 825702212, '123', 'user'),
(53, 825702210, '123', 'user');

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
  `GioiThieu` text DEFAULT NULL,
  `MaCD` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`MaTour`, `TenTour`, `AnhTour`, `MoTa`, `Gia`, `GioiThieu`, `MaCD`) VALUES
(14, 'SaPa 7 ngày đêm', 'Screenshot (62).png', '<h2>1. Giới thiệu về th&agrave;nh phố Đ&agrave; Lạt</h2>\r\n\r\n<p>Khi&nbsp;<em>giới thiệu về Đ&agrave; Lạt</em>, chắc chắn kh&ocirc;ng thể bỏ qua vị tr&iacute; địa l&yacute;, kh&iacute; hậu, lịch sử h&igrave;nh th&agrave;nh cũng như văn h&oacute;a, con người nơi đ&acirc;y. Bạn h&atilde;y cập nhật c&aacute;c th&ocirc;ng tin chi tiết nhất về th&agrave;nh phố mộng mơ n&oacute;i chung v&agrave; giới thiệu về du lịch Đ&agrave; Lạt n&oacute;i ri&ecirc;ng trong nội dung dưới đ&acirc;y.</p>\r\n\r\n<h3>1.1. Vị tr&iacute; địa l&yacute; Đ&agrave; Lạt</h3>\r\n\r\n<p>Th&agrave;nh phố Đ&agrave; Lạt nằm tr&ecirc;n cao nguy&ecirc;n L&acirc;m Vi&ecirc;n được coi l&agrave; địa điểm du lịch hấp dẫn tại Việt Nam. Diện t&iacute;ch Đ&agrave; Lạt rộng khoảng 400 km2 v&agrave; nơi đ&acirc;y l&agrave; th&agrave;nh phố loại 1 trực thuộc tỉnh ủy L&acirc;m Đồng.</p>\r\n\r\n<p>Nằm ở vị tr&iacute; đắc địa, nơi đ&acirc;y l&agrave; trung t&acirc;m kinh tế lớn nhất của L&acirc;m Đồng v&agrave; gi&aacute;p ranh với nhiều v&ugrave;ng đất phong ph&uacute; kh&aacute;c. Đ&agrave; Lạt c&aacute;ch th&agrave;nh phố Bi&ecirc;n H&ograve;a (Đồng Nai) khoảng 278km, c&aacute;ch Th&agrave;nh phố Hồ Ch&iacute; Minh 293km, Thủ đ&ocirc; H&agrave; Nội 1.481km v&agrave; Nha Trang (Kh&aacute;nh H&ograve;a) 205km.</p>\r\n\r\n<p>Địa h&igrave;nh Đ&agrave; Lạt kh&aacute; phức tạp, sở hữu nhiều kiểu địa h&igrave;nh đặc biệt. Đồi n&uacute;i bao quanh th&agrave;nh phố sương m&ugrave; v&agrave; tạo th&agrave;nh một bức tường vững chắc gi&uacute;p chắn gi&oacute;. Trung t&acirc;m của Đ&agrave; Lạt ch&iacute;nh l&agrave; l&ograve;ng chảo rộng khoảng 1.700m.&nbsp;</p>\r\n\r\n<p><img alt=\"Vị trí địa lý là một trong những thông tin không thể bỏ qua khi giới thiệu về Đà Lạt\" src=\"https://static.vinwonders.com/production/optimize_gioi-thieu-ve-da-lat-2.jpg\" style=\"height:525px; width:841px\" /></p>\r\n\r\n<p>Vị tr&iacute; địa l&yacute; l&agrave; một trong những th&ocirc;ng tin kh&ocirc;ng thể bỏ qua khi giới thiệu về Đ&agrave; Lạt (Ảnh: sưu tầm)</p>\r\n\r\n<h3>1.2. Giới thiệu về Đ&agrave; Lạt &ndash; Kh&iacute; hậu</h3>\r\n\r\n<p>Nằm y&ecirc;n b&igrave;nh ở độ cao 1.500 m&eacute;t so với mực nước biển, Th&agrave;nh phố Đ&agrave; Lạt được bao quanh bởi những c&aacute;nh rừng th&ocirc;ng tươi m&aacute;t, tạo n&ecirc;n một kh&ocirc;ng gian kh&iacute; hậu miền n&uacute;i &ocirc;n h&ograve;a v&agrave; dịu m&aacute;t quanh năm. Thời tiết ở Đ&agrave; Lạt c&oacute; thể được chia th&agrave;nh hai m&ugrave;a ch&iacute;nh, mang đến trải nghiệm đa dạng cho du kh&aacute;ch:</p>\r\n\r\n<ul>\r\n	<li><strong>M&ugrave;a mưa:</strong>&nbsp;Từ th&aacute;ng 4 đến hết th&aacute;ng 10, Đ&agrave; Lạt ch&igrave;m trong m&ugrave;a mưa với kh&ocirc;ng gian phủ đầy sắc hoa tươi mới. Trong m&ugrave;a n&agrave;y, kh&ocirc;ng kh&iacute; lạnh ẩm v&agrave; những cơn mưa thường xuy&ecirc;n l&agrave;m tăng sự hứng th&uacute; v&agrave; cảm nhận về thi&ecirc;n nhi&ecirc;n của du kh&aacute;ch.</li>\r\n	<li><strong>M&ugrave;a kh&ocirc;:&nbsp;</strong>Từ th&aacute;ng 11 đến th&aacute;ng 3 năm sau, Đ&agrave; Lạt chuyển sang m&ugrave;a kh&ocirc; với những ng&agrave;y nắng ấm, kh&ocirc;ng mưa v&agrave; trời &iacute;t m&acirc;y. Ban ng&agrave;y, &aacute;nh nắng dịu nhẹ c&ugrave;ng kh&ocirc;ng kh&iacute; m&aacute;t mẻ. Về đ&ecirc;m, nhiệt độ c&oacute; xu hướng giảm, mang đến một kh&ocirc;ng gian se lạnh đặc trưng của đồng bằng cao nguy&ecirc;n.</li>\r\n</ul>\r\n\r\n<p>Ngo&agrave;i ra,&nbsp;<strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/thoi-tiet-da-lat/\" target=\"_blank\">thời tiết Đ&agrave; Lạt</a></strong>&nbsp;c&ograve;n nổi tiếng với hiện tượng sương m&ugrave; th&uacute; vị. Những th&aacute;ng từ th&aacute;ng 2 đến th&aacute;ng 5 v&agrave; th&aacute;ng 9, th&aacute;ng 10 l&agrave; thời gian sương m&ugrave; xuất hiện nhiều nhất. Bầu kh&ocirc;ng kh&iacute; ẩm ướt v&agrave; mờ mịt của sương m&ugrave; tạo ra một cảm gi&aacute;c b&iacute; ẩn v&agrave; l&atilde;ng mạn gi&uacute;p chuyến du lịch của bạn th&uacute; vị hơn.</p>\r\n\r\n<p><img alt=\"Thời tiết ở Đà Lạt chia thành 2 mùa là mùa khô và mùa mưa\" src=\"https://static.vinwonders.com/production/gioi-thieu-ve-da-lat-3.jpg\" style=\"height:630px; width:841px\" /></p>\r\n\r\n<p>Thời tiết ở Đ&agrave; Lạt chia th&agrave;nh 2 m&ugrave;a l&agrave; m&ugrave;a kh&ocirc; v&agrave; m&ugrave;a mưa (Ảnh: sưu tầm)</p>\r\n\r\n<h3>1.3. Lịch sử Đ&agrave; Lạt</h3>\r\n\r\n<p>V&agrave;o cuối thế kỉ XIX, b&aacute;c sĩ Alexandre Yersin sau những cuộc kh&aacute;m ph&aacute; đầy mạo hiểm tại khu vực Đ&ocirc;ng Nam &Aacute;, đ&atilde; kh&aacute;m ph&aacute; ra th&agrave;nh phố Đ&agrave; Lạt nằm tr&ecirc;n cao nguy&ecirc;n L&acirc;m Vi&ecirc;n. Kh&aacute;m ph&aacute; n&agrave;y đ&atilde; c&oacute; tầm ảnh hưởng lớn v&agrave; l&agrave;m thay đổi lịch sử của cả khu vực.</p>\r\n\r\n<p>Trước đ&oacute;, nơi đ&acirc;y chỉ l&agrave; một v&ugrave;ng đất hoang sơ với đồi th&ocirc;ng trải d&agrave;i. Sau khi Yersin t&igrave;m ra, người Ph&aacute;p đ&atilde; đến v&agrave; x&acirc;y dựng th&agrave;nh phố, biến n&oacute; trở th&agrave;nh một th&agrave;nh phố xinh đẹp, thơ mộng. Nếu du kh&aacute;ch nước ngo&agrave;i quan t&acirc;m th&igrave; c&oacute; thể t&igrave;m hiểu b&agrave;i văn giới thiệu về Đ&agrave; Lạt bằng tiếng anh hoặc video giới thiệu về Đ&agrave; Lạt để tham khảo.&nbsp;</p>\r\n\r\n<p><img alt=\"Đà Lạt được khám phá bởi bác sĩ Alexandre Yersin vào thế kỉ XIX\" src=\"https://static.vinwonders.com/production/gioi-thieu-ve-da-lat-4.jpeg\" style=\"height:473px; width:841px\" /></p>\r\n\r\n<p>Giới thiệu th&agrave;nh phố Đ&agrave; Lạt cho thấy nơi đ&acirc;y được kh&aacute;m ph&aacute; bởi b&aacute;c sĩ Alexandre Yersin v&agrave;o thế kỉ XIX (Ảnh: sưu tầm)</p>\r\n\r\n<p><strong><em>&gt;&gt;&gt; Lưu lại:&nbsp;</em></strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/dia-diem-du-lich-da-lat/\" target=\"_blank\"><strong><em>Top 35 địa điểm du lịch Đ&agrave; Lạt cũ v&agrave; mới nổi &ldquo;kh&ocirc;ng thể phớt lờ&rdquo;</em></strong></a></p>\r\n\r\n<h3>1.4. Giới thiệu chung về Đ&agrave; Lạt &ndash; Văn h&oacute;a v&agrave; con người</h3>\r\n\r\n<p>Đ&agrave; Lạt &ndash; Thi&ecirc;n đường du lịch với vẻ đẹp tuyệt vời v&agrave; đa dạng văn h&oacute;a d&acirc;n tộc T&acirc;y Nguy&ecirc;n. H&ograve;a m&igrave;nh v&agrave;o kh&ocirc;ng kh&iacute; du lịch Đ&agrave; Lạt, du kh&aacute;ch c&oacute; thể thưởng thức c&aacute;c chương tr&igrave;nh &acirc;m nhạc mang n&eacute;t độc đ&aacute;o văn h&oacute;a d&acirc;n tộc, như ca m&uacute;a nhạc v&agrave; tr&igrave;nh diễn c&aacute;c nhạc cụ d&acirc;n tộc độc đ&aacute;o trong c&aacute;c lễ hội.&nbsp;</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, Festival hoa diễn ra 2 năm một lần để t&ocirc;n vinh vẻ đẹp hoa v&agrave; c&aacute;c thương hiệu nổi tiếng của Đ&agrave; Lạt, từ đ&oacute; quảng b&aacute; vẻ đẹp của th&agrave;nh phố n&agrave;y đến mọi người. Ngo&agrave;i ra, nơi đ&acirc;y c&ograve;n nổi tiếng với kiến tr&uacute;c độc đ&aacute;o của những ng&ocirc;i biệt thự cổ từ thời Ph&aacute;p v&agrave; t&ograve;a nh&agrave; ấn tượng.&nbsp;</p>\r\n\r\n<p>Đ&agrave; Lạt l&agrave; một th&agrave;nh phố th&acirc;n thiện, dễ gần v&agrave; mến kh&aacute;ch, điều n&agrave;y l&agrave;m cho du kh&aacute;ch y&ecirc;u th&iacute;ch đến thăm đất nước n&agrave;y. Sống trong một khung cảnh tuyệt đẹp, với kh&ocirc;ng kh&iacute; trong l&agrave;nh v&agrave; m&aacute;t mẻ, người d&acirc;n ở đ&acirc;y tỏ ra th&ocirc;ng th&aacute;i, hiền ho&agrave; v&agrave; ch&acirc;n thật.</p>\r\n\r\n<p>Lối sống của người d&acirc;n Đ&agrave; Lạt kết hợp một c&aacute;ch h&agrave;i h&ograve;a giữa n&eacute;t văn h&oacute;a truyền thống v&agrave; phong c&aacute;ch ph&oacute;ng kho&aacute;ng của phương T&acirc;y. Giọng n&oacute;i của người d&acirc;n nơi đ&acirc;y rất trong trẻo, nhẹ nh&agrave;ng v&agrave; sưởi ấm l&ograve;ng người.&nbsp;</p>\r\n\r\n<p><img alt=\"Tìm hiểu về nét đẹp văn hóa của thành phố ngàn hoa\" src=\"https://static.vinwonders.com/production/gioi-thieu-ve-da-lat-5.jpg\" style=\"height:508px; width:841px\" /></p>\r\n\r\n<p>Du kh&aacute;ch c&oacute; thể tham khảo th&ocirc;ng tin giới thiệu về Đ&agrave; Lạt để t&igrave;m hiểu về n&eacute;t đẹp văn h&oacute;a của th&agrave;nh phố ng&agrave;n hoa n&agrave;y (Ảnh: sưu tầm)</p>\r\n\r\n<h2>2. Giới thiệu về địa điểm du lịch Đ&agrave; Lạt hấp dẫn 2024</h2>\r\n\r\n<p>Khi giới thiệu về Đ&agrave; Lạt, c&aacute;c điểm đến du lịch hấp dẫn l&agrave; một trong những th&ocirc;ng tin kh&ocirc;ng thể bỏ qua. Dưới đ&acirc;y l&agrave; những điểm du lịch nổi tiếng, danh lam thắng cảnh tuyệt đẹp tại th&agrave;nh phố ng&agrave;n hoa.&nbsp;</p>\r\n\r\n<h3>2.1. Giới thiệu về cảnh đẹp Đ&agrave; Lạt nổi tiếng, gần trung t&acirc;m</h3>\r\n\r\n<p>Khi giới thiệu về Đ&agrave; Lạt, chắc hẳn kh&ocirc;ng thể thiếu c&aacute;c cảnh đẹp nổi tiếng ngay gần trung t&acirc;m. Du kh&aacute;ch c&oacute; thể tham quan c&aacute;c địa điểm check-in nổi tiếng v&agrave; mang t&iacute;nh biểu tượng của th&agrave;nh phố, cũng như bắt đầu h&ograve;a m&igrave;nh v&agrave;o bầu kh&ocirc;ng kh&iacute; trong l&agrave;nh m&aacute;t mẻ nơi đ&acirc;y.</p>\r\n\r\n<ul>\r\n	<li>Quảng trường L&acirc;m Vi&ecirc;n với kiến tr&uacute;c độc đ&aacute;o v&agrave; s&acirc;n khấu ngo&agrave;i trời, quảng trường n&agrave;y l&agrave; nơi diễn ra nhiều sự kiện v&agrave; hoạt động văn h&oacute;a.&nbsp;</li>\r\n	<li><strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/ho-xuan-huong-da-lat/\" target=\"_blank\">Hồ Xu&acirc;n Hương Đ&agrave; Lạt</a></strong>&nbsp;l&agrave; địa điểm l&yacute; tưởng để đi dạo, thu&ecirc; thuyền hoặc đơn giản l&agrave; thả hồn trong kh&ocirc;ng kh&iacute; thanh b&igrave;nh v&agrave; trong l&agrave;nh.</li>\r\n	<li><strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/cho-dem-da-lat/\" target=\"_blank\">Chợ đ&ecirc;m Đ&agrave; Lạt</a></strong>&nbsp;l&agrave; một địa điểm phổ biến cho du kh&aacute;ch y&ecirc;u th&iacute;ch mua sắm v&agrave; thưởng thức ẩm thực địa phương.&nbsp;</li>\r\n	<li><strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/ga-xe-lua-da-lat/\" target=\"_blank\">Ga xe lửa Đ&agrave; Lạt</a></strong>&nbsp;thu h&uacute;t du kh&aacute;ch với trải nghiệm cảm gi&aacute;c cổ điển của việc đi t&agrave;u qua những cảnh quan đẹp v&agrave; hấp dẫn nơi đ&acirc;y.&nbsp;</li>\r\n	<li>Nh&agrave; Thờ Domaine De Marie c&oacute; phong c&aacute;ch kiến tr&uacute;c thuộc về Ph&aacute;p v&agrave; được xem l&agrave; một trong c&aacute;c biểu tượng của th&agrave;nh phố.</li>\r\n	<li>C&aacute;c khu&nbsp;<strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/dinh-bao-dai-da-lat/\" target=\"_blank\">dinh Bảo Đại Đ&agrave; Lạt</a></strong>&nbsp;mang trong m&igrave;nh kh&ocirc;ng chỉ gi&aacute; trị lịch sử m&agrave; c&ograve;n vẻ đẹp kiến tr&uacute;c v&agrave; khung cảnh thi&ecirc;n nhi&ecirc;n quanh năm xanh tươi.</li>\r\n	<li>Vườn hoa th&agrave;nh phố tươi đẹp v&agrave; m&ugrave;i hương của h&agrave;ng ng&agrave;n lo&agrave;i hoa đa dạng sẽ.&nbsp;<strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/vuon-hoa-da-lat/\" target=\"_blank\">Vườn hoa Đ&agrave; Lạt</a></strong>&nbsp;sẽ l&agrave; địa điểm check in l&yacute; tưởng cho du kh&aacute;ch.&nbsp;</li>\r\n</ul>\r\n\r\n<p><img alt=\"Điểm du lịch hấp dẫn ngay gần trung tâm thành phố Đà Lạt\" src=\"https://static.vinwonders.com/production/optimize_gioi-thieu-ve-da-lat-6.jpg\" style=\"height:473px; width:841px\" /></p>\r\n\r\n<p>Giới thiệu về Đ&agrave; Lạt kh&ocirc;ng thể bỏ qua c&aacute;c địa điểm du lịch hấp dẫn ngay gần trung t&acirc;m th&agrave;nh phố (Ảnh: sưu tầm)</p>\r\n\r\n<p><strong><em>&gt;&gt;&gt; Xem th&ecirc;m:&nbsp;</em></strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/quang-truong-da-lat/\" target=\"_blank\"><strong><em>Quảng trường Đ&agrave; Lạt &ndash; điểm vui chơi, check in nổi tiếng &ldquo;0 đồng&rdquo;</em></strong></a></p>\r\n\r\n<h3>2.2. Giới thiệu về danh lam thắng cảnh Đ&agrave; Lạt độc đ&aacute;o, th&uacute; vị</h3>\r\n\r\n<p>Với nhiều danh lam thắng cảnh độc đ&aacute;o v&agrave; th&uacute; vị, Đ&agrave; Lạt mang đến sức hấp dẫn kh&ocirc;ng thể cưỡng lại đối với du kh&aacute;ch. Th&agrave;nh phố cao nguy&ecirc;n n&agrave;y nằm tr&ecirc;n một bức tranh thi&ecirc;n nhi&ecirc;n tuyệt đẹp. Từ trung t&acirc;m th&agrave;nh phố đến v&ugrave;ng ngoại &ocirc;, Đ&agrave; Lạt l&agrave; nơi c&oacute; nhiều điểm đến nổi tiếng kh&ocirc;ng thể bỏ qua như sau:&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Tuyệt T&igrave;nh Cốc c&oacute; kh&ocirc;ng gian v&ocirc; c&ugrave;ng thơ mộng như trong c&aacute;c bộ phim, hồ nước xanh ngọc b&iacute;ch nằm giữa c&aacute;c v&aacute;ch đ&aacute; cao h&ugrave;ng vĩ.&nbsp;</li>\r\n	<li>Ch&ugrave;a Linh Quy Ph&aacute;p Ấn c&oacute; khung cảnh tuyệt đẹp v&agrave; m&ecirc; hoặc, được so s&aacute;nh như một chốn bồng lai tr&ecirc;n trần gian.</li>\r\n	<li><strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/langbiang-da-lat/\" target=\"_blank\">Langbiang Đ&agrave; Lạt</a></strong>&nbsp;nổi tiếng với khung cảnh thi&ecirc;n nhi&ecirc;n tuyệt đẹp, đồng cỏ xanh mướt v&agrave; đồi th&ocirc;ng bạt ng&agrave;n.</li>\r\n	<li>Ma Rừng Lữ Qu&aacute;n Đ&agrave; Lạt sở hữu kh&ocirc;ng gian thơ mộng, ma mị đẹp như những bức tranh sơn thuỷ tuyệt đẹp, huyền b&iacute;.&nbsp;</li>\r\n	<li>L&agrave;ng C&ugrave; Lần nổi tiếng với những kiến tr&uacute;c độc lạ v&agrave; kh&ocirc;ng gian gần gũi mang đậm n&eacute;t văn ho&aacute; của c&aacute;c d&acirc;n tộc đồng b&agrave;o.&nbsp;</li>\r\n	<li>Đồi ch&egrave; Cầu Đất c&oacute; khung cảnh h&ugrave;ng vĩ v&agrave; thi&ecirc;n nhi&ecirc;n tươi đẹp v&agrave; đồi ch&egrave; xanh mướt trải d&agrave;i. B&ecirc;n cạnh đ&oacute;, du kh&aacute;ch c&oacute; thể trải nghiệm cảm gi&aacute;c&nbsp;<strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/san-may-da-lat/\" target=\"_blank\">săn m&acirc;y Đ&agrave; Lạt</a></strong>&nbsp;cực th&uacute; vị tại nơi đ&acirc;y.&nbsp;</li>\r\n	<li>Th&aacute;c Datanla l&agrave; một trong những th&aacute;c nước nổi tiếng nhất tại Đ&agrave; Lạt</li>\r\n	<li><strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/thien-vien-truc-lam-da-lat/\" target=\"_blank\">Thiền viện Tr&uacute;c L&acirc;m Đ&agrave; Lạt</a></strong>&nbsp;nổi tiếng với kh&ocirc;ng gian y&ecirc;n tĩnh ph&ugrave; hợp cho du kh&aacute;ch muốn t&igrave;m đến sự b&igrave;nh y&ecirc;n.&nbsp;</li>\r\n</ul>\r\n\r\n<p><img alt=\"Đồi chè ở Đà Lạt\" src=\"https://static.vinwonders.com/production/gioi-thieu-ve-da-lat-7.jpg\" style=\"height:560px; width:841px\" /></p>\r\n\r\n<p>Khi giới thiệu về Đ&agrave; Lạt chắc hẳn kh&ocirc;ng thể bỏ qua những danh lam thắng cảnh cực kỳ nổi tiếng tại nơi đ&acirc;y (Ảnh: sưu tầm)</p>\r\n\r\n<p><strong><em>&gt;&gt;&gt; Kh&aacute;m ph&aacute;:&nbsp;</em></strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/review-da-lat/\" target=\"_blank\"><strong><em>[MỚI NHẤT] Review Đ&agrave; Lạt tất tần tật gi&uacute;p bạn c&oacute; chuyến đi trọn vẹn</em></strong></a></p>\r\n\r\n<h3>2.3. Giới thiệu về Đ&agrave; Lạt c&oacute; qu&aacute;n cafe n&agrave;o đẹp?</h3>\r\n\r\n<p>Kh&aacute;m ph&aacute; th&agrave;nh phố Đ&agrave; Lạt v&agrave; h&ograve;a m&igrave;nh v&agrave;o kh&ocirc;ng gian thơ mộng của sương m&ugrave; v&agrave; cảnh quan, kh&ocirc;ng thể bỏ qua việc tham quan tổ hợp của những qu&aacute;n cafe độc đ&aacute;o v&agrave; đậm chất b&igrave;nh y&ecirc;n. C&aacute;c qu&aacute;n&nbsp;<strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/cafe-da-lat/\" target=\"_blank\">cafe Đ&agrave; Lạt</a></strong>&nbsp;rất đa dạng phong c&aacute;ch v&agrave; cảnh quan.&nbsp;&nbsp;</p>\r\n\r\n<p>Du kh&aacute;ch c&oacute; thể c&oacute; những ph&uacute;t gi&acirc;y thư gi&atilde;n tuyệt vời trong kh&ocirc;ng kh&iacute; b&igrave;nh y&ecirc;n, trong l&agrave;nh b&ecirc;n tr&ecirc;n sườn đồi hoặc giữa rừng th&ocirc;ng, vườn hoa thơm ng&aacute;t, cũng như c&oacute; thể lưu giữ kỷ niệm bằng những bức ảnh đẹp tại những&nbsp;<strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/so-thu-da-lat/\" target=\"_blank\">qu&aacute;n cafe đẹp ở Đ&agrave; Lạt</a></strong>&nbsp;sau:</p>\r\n\r\n<ul>\r\n	<li>An Cafe</li>\r\n	<li>Cafe T&ugrave;ng</li>\r\n	<li>Tiệm Cafe T&uacute;i Mơ To</li>\r\n	<li>Lưng Chừng Cafe</li>\r\n	<li>L&agrave; Việt Cafe</li>\r\n	<li>Kong Cafe</li>\r\n</ul>\r\n\r\n<p><img alt=\"quán cafe đẹp tại Đà Lạt\" src=\"https://static.vinwonders.com/production/gioi-thieu-ve-da-lat-8.jpg\" style=\"height:473px; width:841px\" /></p>\r\n\r\n<p>C&aacute;c qu&aacute;n cafe đẹp tại Đ&agrave; Lạt l&agrave; một trong những th&ocirc;ng tin kh&ocirc;ng thể thiếu khi giới thiệu về Đ&agrave; Lạt (Ảnh: sưu tầm)</p>\r\n\r\n<p><strong><em>&gt;&gt;&gt; Bỏ t&uacute;i:&nbsp;</em></strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/da-lat-co-gi-choi/\" target=\"_blank\"><strong><em>Đ&agrave; Lạt c&oacute; g&igrave; chơi? &ndash; List trải nghiệm hấp dẫn, độc đ&aacute;o nhất định phải thử</em></strong></a></p>\r\n\r\n<h2>3. Ẩm thực Đ&agrave; Lạt c&oacute; g&igrave; đặc biệt?</h2>\r\n\r\n<p>Đ&agrave; Lạt nổi tiếng kh&ocirc;ng chỉ với kh&iacute; hậu m&aacute;t mẻ quanh năm m&agrave; c&ograve;n l&agrave; thi&ecirc;n đường của những m&oacute;n ăn ngon. Với sự đa dạng về cộng đồng d&acirc;n cư v&agrave; điều kiện địa l&yacute; đặc trưng, Đ&agrave; Lạt c&oacute; một nền ẩm thực độc đ&aacute;o, mang đậm bản sắc văn h&oacute;a của địa phương.</p>\r\n\r\n<p>Khi giới thiệu về Đ&agrave; Lạt th&igrave; kh&ocirc;ng thể bỏ qua nền ẩm thực v&agrave; đặc sản nơi đ&acirc;y. Nếu bạn chưa biết&nbsp;<strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/an-gi-o-da-lat/\" target=\"_blank\">ăn g&igrave; ở Đ&agrave; Lạt</a></strong>, th&igrave; c&oacute; thể tham khảo c&aacute;c m&oacute;n ngon nổi nổi tiếng, khiến ai đ&atilde; thử một lần cũng kh&ocirc;ng thể qu&ecirc;n sau đ&acirc;y:&nbsp;</p>\r\n\r\n<ul>\r\n	<li>B&aacute;nh ướt l&ograve;ng g&agrave;&nbsp;</li>\r\n	<li>B&aacute;nh m&igrave; x&iacute;u mại&nbsp;</li>\r\n	<li>B&aacute;nh căn&nbsp;</li>\r\n	<li>Lẩu g&agrave; l&aacute; &eacute;&nbsp;</li>\r\n	<li><strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/kem-bo-da-lat/\" target=\"_blank\">Kem bơ</a></strong>&nbsp;</li>\r\n	<li><strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/banh-trang-nuong-da-lat/\" target=\"_blank\">B&aacute;nh tr&aacute;ng nướng</a></strong>&nbsp;</li>\r\n	<li>Hồng treo gi&oacute;&nbsp;</li>\r\n</ul>\r\n\r\n<p><img alt=\"Kem bơ Đà Lạt\" src=\"https://static.vinwonders.com/production/gioi-thieu-ve-da-lat-9.jpg\" style=\"height:672px; width:841px\" /></p>\r\n\r\n<p>Ẩm thực Đ&agrave; Lạt được rất nhiều du kh&aacute;ch quan t&acirc;m khi t&igrave;m hiểu v&agrave; tham khảo c&aacute;c b&agrave;i giới thiệu về Đ&agrave; Lạt (Ảnh: sưu tầm)</p>\r\n\r\n<p><strong><em>&gt;&gt;&gt; Lưu lại:&nbsp;</em></strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/hong-treo-gio-da-lat/\" target=\"_blank\"><strong><em>Hồng treo gi&oacute; Đ&agrave; Lạt &ndash; Gi&aacute;, địa chỉ mua v&agrave; gợi &yacute; c&aacute;c vườn tham quan</em></strong></a></p>\r\n\r\n<p>Với giao th&ocirc;ng thuận lợi v&agrave; khoảng c&aacute;ch đến Đ&agrave; Lạt kh&ocirc;ng xa, Nha Trang l&agrave; điểm đến phổ biến cho chuyến du lịch kết hợp. Tour du lịch Đ&agrave; Lạt &ndash;&nbsp;<strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/nha-trang-thuoc-tinh-nao/\" target=\"_blank\">Nha Trang</a></strong>&nbsp;sẽ đem đến cho bạn những kỉ niệm đ&aacute;ng nhớ về th&agrave;nh phố ng&agrave;n hoa rực rỡ c&ugrave;ng th&agrave;nh phố biển s&ocirc;i động v&agrave; thơ mộng. Bạn đừng qu&ecirc;n gh&eacute; thăm VinWonders Nha Trang trong chuyến h&agrave;nh tr&igrave;nh n&agrave;y nh&eacute;.&nbsp;</p>\r\n\r\n<p><img alt=\"VinWonders Nha Trang\" src=\"https://static.vinwonders.com/production/gioi-thieu-ve-da-lat-10.jpg\" style=\"height:560px; width:841px\" /></p>\r\n\r\n<p>VinWonders Nha Trang hứa hẹn sẽ đem đến cho bạn v&agrave; gia đ&igrave;nh những ph&uacute;t gi&acirc;y vui vẻ v&agrave; thoải m&aacute;i nhất</p>\r\n\r\n<p><strong><a href=\"https://vinwonders.com/vi/vinwonders-nha-trang/\" target=\"_blank\">VinWonders Nha Trang</a></strong>&nbsp;l&agrave; một c&ocirc;ng vi&ecirc;n giải tr&iacute; đặc biệt, nằm tr&ecirc;n đảo H&ograve;n Tre tuyệt đẹp, với h&agrave;ng trăm trải nghiệm đẳng cấp đang chờ bạn kh&aacute;m ph&aacute;:</p>\r\n\r\n<ul>\r\n	<li>Thưởng thức &ldquo;khu vườn năm ch&acirc;u&rdquo; tại The World Garden với bộ sưu tập thực vật độc đ&aacute;o, sống động.</li>\r\n	<li>Kh&aacute;m ph&aacute; Sky Garden, một khu vườn xanh m&aacute;t với đầy &ldquo;kỳ hoa dị thảo&rdquo;, tạo cảm gi&aacute;c như lạc v&agrave;o một mảnh rừng huyền b&iacute; v&agrave; s&acirc;u thẳm của Nam Mỹ.</li>\r\n	<li>Xem c&aacute;c m&agrave;n tr&igrave;nh diễn thực cảnh tuyệt đẹp, đỉnh cao của&nbsp;<strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/tata-show-vinpearl-nha-trang-sieu-pham-giai-tri-da-phuong-tien/\" target=\"_blank\">Tata show</a></strong>, một si&ecirc;u phẩm triệu đ&ocirc;.</li>\r\n	<li>Đối mặt với thử th&aacute;ch v&agrave; trải nghiệm th&uacute; vị c&ugrave;ng tr&ograve; chơi thuyền nước b&oacute;ng tối Tata World River Adventure.</li>\r\n	<li>Tham quan thủy cung lung linh v&agrave; xem show diễn n&agrave;ng ti&ecirc;n c&aacute; tại Cung điện Hải Vương thuộc ph&acirc;n khu Sea World.</li>\r\n	<li>Thử sức với h&agrave;ng loạt&nbsp;<strong><a href=\"https://vinwonders.com/vi/bai-viet-du-lich/tro-choi-mao-hiem-o-vinpearl-nha-trang-top-10-thu-thach-dinh-cao/\" target=\"_blank\">tr&ograve; chơi cảm gi&aacute;c mạnh</a></strong>&nbsp;hấp dẫn như Zipline Nha Trang, Bungee, Đường lượn nhớ đời, Đu quay lộn đầu, Th&aacute;p rơi tự do&hellip;</li>\r\n</ul>\r\n\r\n<p><img alt=\"VinWonders Nha Trang sẽ đem đến vô vàn những trải nghiệm thú vị cho gia đình của bạn \" src=\"https://static.vinwonders.com/production/gioi-thieu-ve-da-lat-11.jpg\" style=\"height:561px; width:841px\" /></p>\r\n\r\n<p>VinWonders Nha Trang sẽ đem đến v&ocirc; v&agrave;n những trải nghiệm th&uacute; vị cho gia đ&igrave;nh của bạn</p>\r\n\r\n<p>B&agrave;i viết tr&ecirc;n đ&atilde;&nbsp;giới thiệu về Đ&agrave; Lạt&nbsp;một c&aacute;ch chi tiết nhất gi&uacute;p du kh&aacute;ch c&oacute; c&aacute;i nh&igrave;n tổng quan hơn về th&agrave;nh phố xinh đẹp n&agrave;y. Với kh&iacute; hậu m&aacute;t mẻ, cảnh quan hữu t&igrave;nh v&agrave; kiến tr&uacute;c độc đ&aacute;o Đ&agrave; Lạt thực sự l&agrave; một thi&ecirc;n đường giữa l&ograve;ng Việt Nam. Nếu bạn đang t&igrave;m kiếm địa điểm để nghỉ dưỡng th&igrave; h&atilde;y dừng ch&acirc;n tại Đ&agrave; Lạt v&agrave; trải nghiệm vẻ đẹp tuyệt diệu m&agrave; nơi n&agrave;y mang lại.</p>\r\n', '4.950.000', '<p><strong><strong>Du lịch Đ&agrave; Lạt</strong></strong>&nbsp;từ l&acirc;u đ&atilde; trở th&agrave;nh điểm đến kh&ocirc;ng thể bỏ qua của du kh&aacute;ch trong v&agrave; ngo&agrave;i nước.&nbsp;<strong>Giới thiệu về Đ&agrave; Lạt</strong>&nbsp;sẽ gi&uacute;p bạn hiểu về lịch sử qu&aacute; tr&igrave;nh h&igrave;nh th&agrave;nh n&ecirc;n một Đ&agrave; Lạt đẹp như hiện nay. B&ecirc;n cạnh đ&oacute;, du kh&aacute;ch sẽ biết c&aacute;c địa điểm vui chơi, giải tr&iacute; v&agrave; ăn uống khi đến th&agrave;nh phố ng&agrave;n hoa.</p>\n', 1),
(15, 'HaLongBay 3 ngay - 3 dem', 'Screenshot 2024-10-11 171803.png', '<p>fgdfgg</p>\r\n', '5.000.000', '<p>dbfdb</p>\r\n', 2);

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
  MODIFY `MaHDV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `lichdat`
--
ALTER TABLE `lichdat`
  MODIFY `MaLD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `phancong`
--
ALTER TABLE `phancong`
  MODIFY `MaPC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `MaTour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
