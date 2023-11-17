

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `danh_muc` (`id`, `ten`, `mo_ta`) VALUES
(1, 'A', 'B\r\n'),
(2, 'C', 'D');



CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `khach_hang_id` int(11) DEFAULT NULL,
  `tong_gia` int(11) DEFAULT NULL,
  `trang_thai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `don_hang` (`id`, `khach_hang_id`, `tong_gia`, `trang_thai`) VALUES
(1, 1, 90, 'Đang xử lý'),
(35, 34, 30, 'Đang xử lý'),
(36, 35, 660, 'Đang xử lý');



CREATE TABLE `don_hang_chi_tiet` (
  `id` int(11) NOT NULL,
  `don_hang_id` int(11) DEFAULT NULL,
  `san_pham_id` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `don_hang_chi_tiet` (`id`, `don_hang_id`, `san_pham_id`, `so_luong`, `gia`) VALUES
(1, 1, 1, 3, 30),
(24, 35, 1, 1, 30),
(25, 36, 1, 2, 30),
(26, 36, 2, 2, 300);



CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(255) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `khach_hang` (`id`, `ten`, `email`, `so_dien_thoai`, `dia_chi`) VALUES
(1, 'A', 'A@gmail.com', '3', '3'),
(34, '1', '1', '1', '1'),
(35, '2', '2', '2', '2');

-- --------------------------------------------------------



CREATE TABLE `ma_giam_gia` (
  `id` int(11) NOT NULL,
  `ma` varchar(255) NOT NULL,
  `giam_gia` int(11) NOT NULL,
  `thoi_han_su_dung` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `quyen` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `danh_muc_id` int(11) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `gia` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `san_pham` (`id`, `ten`, `danh_muc_id`, `mo_ta`, `hinh_anh`, `gia`, `so_luong`) VALUES
(1, 'A', 1, 'A', 'messi-mu.jpg', 30, 3),
(2, 'B', 2, 'B', 'quan-1.jpg', 300, 30);




CREATE TABLE `tai_khoan` (
  `id` int(11) NOT NULL,
  `ten_dang_nhap` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `tai_khoan` (`id`, `ten_dang_nhap`, `PASSWORD`, `role`) VALUES
(1, '3', '3', '1');




ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_khach_hang_id` (`khach_hang_id`);


ALTER TABLE `don_hang_chi_tiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_don_hang_id` (`don_hang_id`);


ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `ma_giam_gia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma` (`ma`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_danh_muc_id` (`danh_muc_id`);


ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_dang_nhap` (`ten_dang_nhap`);




ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;


ALTER TABLE `don_hang_chi_tiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;


ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;


ALTER TABLE `ma_giam_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `quyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `tai_khoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `don_hang`
  ADD CONSTRAINT `fk_khach_hang_id` FOREIGN KEY (`khach_hang_id`) REFERENCES `khach_hang` (`id`);


ALTER TABLE `don_hang_chi_tiet`
  ADD CONSTRAINT `fk_don_hang_id` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hang` (`id`);


ALTER TABLE `san_pham`
  ADD CONSTRAINT `fk_danh_muc_id` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_muc` (`id`);
COMMIT;

