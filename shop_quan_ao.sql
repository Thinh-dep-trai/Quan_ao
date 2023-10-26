-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2023 lúc 07:15 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_quan_ao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `ten`, `mo_ta`) VALUES
(1, 'Quần', 'Quần jack'),
(2, 'HEHE', 'quá đã\r\n'),
(5, '1', '33'),
(6, '1', '3'),
(9, '1', '3'),
(10, '1', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `khach_hang_id` int(11) DEFAULT NULL,
  `san_pham_id` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `tong_gia` int(11) DEFAULT NULL,
  `trang_thai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang_chi_tiet`
--

CREATE TABLE `don_hang_chi_tiet` (
  `id` int(11) NOT NULL,
  `don_hang_id` int(11) DEFAULT NULL,
  `san_pham_id` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(255) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ma_giam_gia`
--

CREATE TABLE `ma_giam_gia` (
  `id` int(11) NOT NULL,
  `ma` varchar(255) NOT NULL,
  `giam_gia` int(11) NOT NULL,
  `thoi_han_su_dung` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `danh_muc_id` int(11) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `gia` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten`, `danh_muc_id`, `mo_ta`, `hinh_anh`, `gia`, `so_luong`) VALUES
(1, 'Quần jack', 1, 'Quần 5tr', 'quan-2.jpg', 5000, 1),
(2, '3', 1, '1', NULL, 1, 0),
(30, 'Áo', 1, 'Hack', '', 100000, 20),
(51, '4', 5, '5', NULL, 3, 1),
(52, 'áo', 1, '3', NULL, 44, 44),
(53, 'Áo jack', 1, 'jack 5tr', NULL, 123, 332),
(57, '1', 1, '2', 'quan-1.jpg', 3, 4),
(58, '1', 1, '1', 'quan-1.jpg', 1, 1),
(59, '1', 1, '3', 'quan-2.jpg', 4, 2),
(60, 'Quần 2', 9, 'Màu xanh', 'quan-2.jpg', 1000, 200);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_khach_hang_id` (`khach_hang_id`),
  ADD KEY `fk_san_pham_id` (`san_pham_id`);

--
-- Chỉ mục cho bảng `don_hang_chi_tiet`
--
ALTER TABLE `don_hang_chi_tiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_don_hang_id` (`don_hang_id`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `ma_giam_gia`
--
ALTER TABLE `ma_giam_gia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma` (`ma`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_danh_muc_id` (`danh_muc_id`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `don_hang_chi_tiet`
--
ALTER TABLE `don_hang_chi_tiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ma_giam_gia`
--
ALTER TABLE `ma_giam_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `fk_khach_hang_id` FOREIGN KEY (`khach_hang_id`) REFERENCES `khach_hang` (`id`),
  ADD CONSTRAINT `fk_san_pham_id` FOREIGN KEY (`san_pham_id`) REFERENCES `san_pham` (`id`);

--
-- Các ràng buộc cho bảng `don_hang_chi_tiet`
--
ALTER TABLE `don_hang_chi_tiet`
  ADD CONSTRAINT `fk_don_hang_id` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hang` (`id`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `fk_danh_muc_id` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_muc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
