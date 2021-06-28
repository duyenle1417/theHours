-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 28, 2021 lúc 07:56 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thehours`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `parent_comment_id`, `content`, `create_date`, `update_date`) VALUES
(2, 1, 1, NULL, '<p>Mọi người h&atilde;y cẩn thận nh&eacute;!</p>', '2021-06-26 04:17:51', '2021-06-26 04:17:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `IsPublished` tinyint(1) NOT NULL,
  `views` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `topic_id`, `title`, `content`, `slug`, `image_path`, `IsPublished`, `views`, `create_date`, `update_date`) VALUES
(1, 1, 16, 'Sáng nay có 94 ca mắc Covid-19 lây nhiễm trong nước, 40 ca tại TP.HCM', '&lt;p&gt;&lt;strong&gt;S&amp;aacute;ng nay, 19.6,&amp;nbsp;&lt;a href=&quot;https://thanhnien.vn/bo-y-te-thong-bao/&quot; rel=&quot;&quot;&gt;Bộ Y tế th&amp;ocirc;ng b&amp;aacute;o&lt;/a&gt;&amp;nbsp;94&amp;nbsp;&lt;a href=&quot;https://thanhnien.vn/thoi-su/toi-nay-co-213-ca-mac-covdid-19-moi-them-303-ca-khoi-benh-1399410.html&quot; rel=&quot;&quot; target=&quot;_blank&quot;&gt;ca mắc Covid-19&lt;/a&gt;&amp;nbsp;mới. TP.HCM ghi nhận nhiều nhất với 40 ca.&amp;nbsp;&lt;a href=&quot;https://thanhnien.vn/da-nang/&quot; rel=&quot;&quot;&gt;Đ&amp;agrave; Nẵng&lt;/a&gt;&amp;nbsp;c&amp;oacute; 1 bệnh nh&amp;acirc;n sau hơn 14 ng&amp;agrave;y kh&amp;ocirc;ng c&amp;oacute; ca mắc mới.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;https://image.thanhnien.vn/uploaded/lienchau/2021_06_19/196-tno_gdnm.gif&quot; style=&quot;height:188px; width:300px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Theo th&amp;ocirc;ng b&amp;aacute;o của Bộ Y tế, từ 18 giờ ng&amp;agrave;y 18.6 đến 6 giờ s&amp;aacute;ng nay c&amp;oacute; 94 ca mắc Covid-19 mới do l&amp;acirc;y nhiễm trong nước, l&amp;agrave; c&amp;aacute;c bệnh nh&amp;acirc;n thứ 12.415 - 12.508 tại Việt Nam.&lt;/p&gt;\r\n\r\n&lt;p&gt;Trong đ&amp;oacute;, tại&amp;nbsp;&lt;a href=&quot;https://thanhnien.vn/thoi-su/tphcm-tim-nguoi-tung-den-5-cua-hang-thuoc-he-thong-hnam-mobile-1400761.html&quot; rel=&quot;&quot; target=&quot;_blank&quot;&gt;TP.HCM&lt;/a&gt;&amp;nbsp;c&amp;oacute; 40 ca, Bắc Ninh 15 ca, Nghệ An 13 ca, B&amp;igrave;nh Dương 12 ca, Bắc Giang 9 ca, Tiền Giang 3 ca, H&amp;agrave; Tĩnh 1 ca v&amp;agrave; Đ&amp;agrave; Nẵng 1 ca. 86/94 ca được ph&amp;aacute;t hiện trong khu c&amp;aacute;ch ly hoặc khu đ&amp;atilde; được phong toả, 8 ca được ph&amp;aacute;t hiện trong cộng đồng đang điều tra dịch tễ.&lt;/p&gt;\r\n\r\n&lt;p&gt;Cụ thể, 13 ca tại Nghệ An gồm 1 ca li&amp;ecirc;n quan đến Khu c&amp;ocirc;ng nghiệp Quang Ch&amp;acirc;u (Bắc Giang), 3 ca l&amp;agrave; c&amp;aacute;c trường hợp F1, 4 ca li&amp;ecirc;n quan đến H.Diễn Ch&amp;acirc;u v&amp;agrave; 5 ca đang điều tra dịch tễ.&lt;/p&gt;\r\n\r\n&lt;p&gt;Trong 15 bệnh nh&amp;acirc;n tại Bắc Ninh, 3 ca li&amp;ecirc;n quan đến ổ dịch Khu c&amp;ocirc;ng nghiệp Quế V&amp;otilde;, 5 ca li&amp;ecirc;n quan đến ổ dịch&amp;nbsp;&lt;a href=&quot;https://thanhnien.vn/thoi-su/pho-thu-tuong-khong-de-dich-choc-thung-cac-khu-cong-nghiep-1382539.html&quot; rel=&quot;&quot; target=&quot;_blank&quot;&gt;khu c&amp;ocirc;ng nghiệp&lt;/a&gt;&amp;nbsp;Khắc Niệm, 5 ca li&amp;ecirc;n quan đến ổ dịch Đại Ph&amp;uacute;c, 1 ca l&amp;agrave; F1 v&amp;agrave; 1 ca đang điều tra dịch tễ.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Bệnh nh&amp;acirc;n 12424 ghi nhận tại H&amp;agrave; Tĩnh (nam, 61 tuổi, địa chỉ tại TP.H&amp;agrave; Tĩnh) l&amp;agrave; F1 của c&amp;aacute;c bệnh nh&amp;acirc;n 8425 v&amp;agrave; 8427, đ&amp;atilde; được c&amp;aacute;ch ly. Kết quả x&amp;eacute;t nghiệm ng&amp;agrave;y 18.6 x&amp;aacute;c định bệnh nh&amp;acirc;n dương t&amp;iacute;nh với&amp;nbsp;&lt;a href=&quot;https://thanhnien.vn/sars-cov-2/&quot; rel=&quot;&quot;&gt;SARS-CoV-2&lt;/a&gt;. Hiện, bệnh nh&amp;acirc;n được c&amp;aacute;ch ly, điều trị tại Bệnh viện đa khoa H.Kỳ Anh (H&amp;agrave; Tĩnh).&lt;/p&gt;\r\n\r\n&lt;p&gt;Bệnh nh&amp;acirc;n 12437 ghi nhận tại Đ&amp;agrave; Nẵng (nam, 59 tuổi, địa chỉ tại Q.Thanh Kh&amp;ecirc;, Đ&amp;agrave; Nẵng) đang được điều tra dịch tễ.&lt;/p&gt;\r\n\r\n&lt;p&gt;9 ca tại Bắc Giang đều trong khu c&amp;aacute;ch ly v&amp;agrave; khu vực đ&amp;atilde; được phong tỏa, li&amp;ecirc;n quan đến c&amp;ocirc;ng nh&amp;acirc;n l&amp;agrave;m tại c&amp;aacute;c Khu c&amp;ocirc;ng nghiệp, c&amp;oacute; kết quả x&amp;eacute;t nghiệm dương t&amp;iacute;nh với SARS-CoV-2.&lt;/p&gt;\r\n\r\n&lt;p&gt;12 ca ghi nhận tại B&amp;igrave;nh Dương l&amp;agrave; c&amp;aacute;c trường hợp F1, đ&amp;atilde; được c&amp;aacute;ch ly.&lt;/p&gt;\r\n\r\n&lt;p&gt;3 ca tại Tiền Giang đều ghi nhận trong khu vực phong tỏa, li&amp;ecirc;n quan đến bệnh nh&amp;acirc;n 10630. Kết quả x&amp;eacute;t nghiệm ng&amp;agrave;y 17.6 x&amp;aacute;c định c&amp;aacute;c bệnh nh&amp;acirc;n dương t&amp;iacute;nh với SARS-CoV-2. Hiện, c&amp;aacute;c bệnh nh&amp;acirc;n được c&amp;aacute;ch ly, điều trị tại Bệnh viện Lao v&amp;agrave; bệnh phổi tỉnh Tiền Giang.&lt;/p&gt;\r\n\r\n&lt;p&gt;40 ca tại TP.HCM gồm 38 ca l&amp;agrave; c&amp;aacute;c trường hợp F1 đ&amp;atilde; được c&amp;aacute;ch ly, 1 ca li&amp;ecirc;n quan đến điểm nh&amp;oacute;m Hội th&amp;aacute;nh truyền gi&amp;aacute;o Phục Hưng v&amp;agrave; 1 ca li&amp;ecirc;n quan đến trụ sở UBND Q.7, TP.HCM.&lt;/p&gt;\r\n\r\n&lt;p&gt;Theo Bộ Y tế, trong đợt dịch thứ 4 tại Việt Nam (từ ng&amp;agrave;y 27.4 đến nay) c&amp;oacute; 9.266 ca mắc Covid-19, trong đ&amp;oacute; 1.938 bệnh nh&amp;acirc;n đ&amp;atilde; được c&amp;ocirc;ng bố khỏi bệnh.&lt;/p&gt;\r\n\r\n&lt;p&gt;Từ đầu dịch (th&amp;aacute;ng 1.2020) đến nay, Việt Nam c&amp;oacute; 10.836 ca ghi nhận trong nước v&amp;agrave; 1.672 ca&amp;nbsp;&lt;a href=&quot;https://thanhnien.vn/thoi-su/hai-ca-nhap-canh-trai-phep-duong-tinh-covid-19-tai-hai-phong-va-tpho-chi-minh-1359381.html&quot; rel=&quot;&quot; target=&quot;_blank&quot;&gt;nhập cảnh&lt;/a&gt;.&lt;/p&gt;\r\n\r\n&lt;p&gt;Hiện c&amp;oacute; 23 tỉnh gồm: Y&amp;ecirc;n B&amp;aacute;i, Quảng Ng&amp;atilde;i, Đồng Nai, Quảng Ninh, Quảng Nam, Quảng Trị, Thừa Thi&amp;ecirc;n - Huế, Nam Định, Tuy&amp;ecirc;n Quang, Sơn La, Ninh B&amp;igrave;nh, Thanh H&amp;oacute;a, Th&amp;aacute;i Nguy&amp;ecirc;n, Hưng Y&amp;ecirc;n, Hải Ph&amp;ograve;ng, T&amp;acirc;y Ninh, Gia Lai, Bạc Li&amp;ecirc;u, Điện Bi&amp;ecirc;n, Đắk Lắk, Đồng Th&amp;aacute;p, Tr&amp;agrave; Vinh v&amp;agrave; Th&amp;aacute;i B&amp;igrave;nh đ&amp;atilde; qua 14 ng&amp;agrave;y kh&amp;ocirc;ng ghi nhận trường hợp mắc mới trong cộng đồng.&lt;/p&gt;\r\n\r\n&lt;p&gt;Từ ng&amp;agrave;y 29.4 đến nay hệ thống y tế đ&amp;atilde; thực hiện hơn 2,3 triệu mẫu x&amp;eacute;t nghiệm s&amp;agrave;ng lọc v&amp;agrave; x&amp;aacute;c định ca mắc Covid-19.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;https://image.thanhnien.vn/2048/uploaded/lienchau/2021_06_19/thanhnien2khuyencaotno_ixse.jpg&quot; style=&quot;height:309px; width:300px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:right&quot;&gt;(&lt;em&gt;Nguồn: Li&amp;ecirc;n Ch&amp;acirc;u -&amp;nbsp;Thanh Ni&amp;ecirc;n Online)&lt;/em&gt;&lt;/p&gt;\r\n', 'sang-nay-co-94-ca-mac-covid-19-lay-nhiem-trong-nuoc-40-ca-tai-tphcm', 'https://image.thanhnien.vn/uploaded/lienchau/2021_06_19/196-tno_gdnm.gif', 1, 35, '2021-06-19 08:32:45', '2021-06-27 15:46:20'),
(2, 1, 4, 'TP.HCM: Tìm người đến chợ Bà Chiểu liên quan ca dương tính Covid-19', '<p><strong>UBND P.1, Q.B&igrave;nh Thạnh (TP.HCM) vừa ra th&ocirc;ng b&aacute;o t&igrave;m người đến sạp số 1461 đường Ng&ocirc; Nhơn Tịnh, chợ B&agrave; Chiểu do c&oacute; li&ecirc;n quan ca dương t&iacute;nh&nbsp;<a href=\"https://thanhnien.vn/covid-19/\" rel=\"\">Covid-19</a>.</strong></p>\r\n\r\n<p style=\"text-align:center\"><strong><img alt=\"\" src=\"https://image.thanhnien.vn/2048/uploaded/maipts/2021_06_26/chobachieu_hznc.jpg\" style=\"height:168px; width:300px\" /></strong></p>\r\n\r\n<p>Tối 26.6, đại diện UBND P.1, Q.B&igrave;nh Thạnh cho biết đ&atilde; ra th&ocirc;ng b&aacute;o t&igrave;m người đ&atilde; đến chợ B&agrave; Chiểu do li&ecirc;n quan ca dương t&iacute;nh&nbsp;<a href=\"https://thanhnien.vn/thoi-su/tinh-hinh-covid-19-toi-266-tphcm-ghi-nhan-58-ca-nhiem-moi-nhieu-nhat-ca-nuoc-1404833.html\" rel=\"\" target=\"_blank\">Covid-19&nbsp;</a>tại đ&acirc;y.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Theo th&ocirc;ng b&aacute;o, UBND P.1, Q.B&igrave;nh Thạnh đ&atilde; tạm thời đ&oacute;ng cửa c&aacute;c sạp từ số 1451 đến 1471 tr&ecirc;n đường Ng&ocirc; Nhơn Tịnh, chợ B&agrave; Chiểu từ ng&agrave;y 25.6 cho đến khi c&oacute; th&ocirc;ng&nbsp;<a href=\"https://thanhnien.vn/\" rel=\"nofollow\" target=\"_blank\">b&aacute;o mới</a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Người d&acirc;n từng đến mua sắm tại sạp số 1461 đường Ng&ocirc; Nhơn Tịnh, chợ B&agrave; Chiểu theo khung giờ từ 8 - 16 giờ, từ ng&agrave;y 12 - 25.6 cần li&ecirc;n hệ ngay Trạm y tế P.1, Q.B&igrave;nh Thạnh (địa chỉ số 54&nbsp;<a href=\"https://thanhnien.vn/thoi-su/tphcm-xu-phat-nguoi-mua-lan-nguoi-ban-o-cho-tu-phat-sau-chi-thi-10-1401886.html\" rel=\"\" target=\"_blank\">Vũ T&ugrave;ng</a>, P.1, Q.B&igrave;nh Thạnh)&nbsp;<a href=\"https://thanhnien.vn/thoi-su/tphcm-de-xuat-khai-bao-y-te-dien-tu-toan-dan-tu-ngay-246-1402276.html\" rel=\"\" target=\"_blank\">để khai b&aacute;o y tế</a>&nbsp;v&agrave; lấy mẫu x&eacute;t nghiệm.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Như&nbsp;<em>Thanh Ni&ecirc;n&nbsp;</em>đ&atilde; th&ocirc;ng tin, v&agrave;o chều 26.6, lực lượng chức năng&nbsp;<a href=\"https://thanhnien.vn/thoi-su/lay-mau-xet-nghiem-covid-19-vi-ca-nghi-nhiem-la-nguoi-phu-quan-o-cho-ba-chieu-1404823.html\" rel=\"\" target=\"_blank\">tạm phong tỏa khu vực chợ B&agrave; Chiểu</a>&nbsp;để lấy mẫu x&eacute;t nghiệm Covid-19 tầm so&aacute;t cho tiểu thương, do li&ecirc;n quan 1 ca nghi nhiễm Covid-19.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Đại diện l&atilde;nh đạo UBND P.1 (Q.B&igrave;nh Thạnh) x&aacute;c nhận c&oacute; ca nghi nhiễm Covid-19 (đ&atilde; c&aacute;ch ly tập trung từ trước) ở khu vực chợ B&agrave; Chiểu. Hiện ch&iacute;nh quyền địa phương đang phối hợp lực lượng y tế lấy mẫu x&eacute;t nghiệm tầm so&aacute;t; đồng thời tiến h&agrave;nh điều tra dịch tễ.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Đến tối ng&agrave;y 26.6, đại diện ban quản l&yacute; chợ B&agrave; Chiểu cho biết việc x&eacute;t nghiệm Covid-19 đ&atilde; ho&agrave;n tất l&uacute;c 19 giờ 30 c&ugrave;ng ng&agrave;y với 736 mẫu x&eacute;t nghiệm. Dự kiến, ng&agrave;y mai (27.6), chợ B&agrave; Chiểu vẫn hoạt động b&igrave;nh thường.</p>\r\n', 'tphcm-tim-nguoi-den-cho-ba-chieu-lien-quan-ca-duong-tinh-covid-19', 'https://image.thanhnien.vn/660x370/uploaded/maipts/2021_06_26/chobachieu_hznc.jpg', 1, 12, '2021-06-27 00:27:48', '2021-06-27 18:37:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'author'),
(3, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `parent_topic_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `topics`
--

INSERT INTO `topics` (`id`, `parent_topic_id`, `name`) VALUES
(1, NULL, 'Thời sự'),
(2, NULL, 'Thế giới'),
(3, NULL, 'Kinh doanh'),
(4, NULL, 'Đời sống'),
(5, NULL, 'Du lịch'),
(6, NULL, 'Giáo dục'),
(7, NULL, 'Thể thao'),
(8, NULL, 'Giải trí'),
(9, 1, 'Chính trị'),
(10, 1, 'Pháp luật'),
(11, 1, 'Quốc phòng'),
(12, 2, 'Khám phá'),
(13, 3, 'Ngân hàng'),
(14, 3, 'Chứng khoáng'),
(15, 3, 'Doanh nghiệp'),
(16, 4, 'Cộng đồng'),
(17, 6, 'Tuyển sinh'),
(18, 7, 'Thể thao Việt Nam'),
(19, 7, 'Thể thao quốc tế'),
(20, 8, 'Phim'),
(21, 8, 'Nhạc'),
(22, 8, 'Showbiz');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `verification_hash` varchar(255) NOT NULL,
  `IsActivated` tinyint(1) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `fullname`, `role_id`, `verification_hash`, `IsActivated`, `create_date`, `update_date`) VALUES
(1, '18520680@gm.uit.edu.vn', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Ngọc Mỹ Duyên', 1, '', 1, '2021-06-15 14:01:51', '2021-06-27 16:24:17'),
(4, 'matkinhduyen2000@gmail.com', 'duyenle', 'e10adc3949ba59abbe56e057f20f883e', 'Duyên Lê', 3, '124aedf91e61217ec0d619535ace7dfc', 1, '2021-06-27 18:19:48', '2021-06-27 18:19:48');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_of_post` (`post_id`),
  ADD KEY `author_of_comment` (`user_id`),
  ADD KEY `comment_id_to_parent_comment_id` (`parent_comment_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id_of_post` (`topic_id`),
  ADD KEY `author_of_post` (`user_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id_to_parent_id` (`parent_topic_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_of_user` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `author_of_comment` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comment_id_to_parent_comment_id` FOREIGN KEY (`parent_comment_id`) REFERENCES `comments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comment_of_post` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `author_of_post` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `topic_id_of_post` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topic_id_to_parent_id` FOREIGN KEY (`parent_topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_of_user` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
