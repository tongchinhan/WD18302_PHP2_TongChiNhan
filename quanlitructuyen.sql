-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th1 17, 2024 lúc 10:06 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlitructuyen`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachbinhluan`
--

CREATE TABLE `danhsachbinhluan` (
  `id` int NOT NULL,
  `idnguoidung` int DEFAULT NULL,
  `idtailieu` int DEFAULT NULL,
  `noidung` text COLLATE utf8mb4_general_ci,
  `ngaybinhluan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachdanhgia`
--

CREATE TABLE `danhsachdanhgia` (
  `id` int NOT NULL,
  `idnguoidung` int DEFAULT NULL,
  `idtailieu` int DEFAULT NULL,
  `diemso` int DEFAULT NULL,
  `noidung` text COLLATE utf8mb4_general_ci,
  `ngaydanhgia` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachnguoidung`
--

CREATE TABLE `danhsachnguoidung` (
  `id` int NOT NULL,
  `manguoidung` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `hoten` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `matkhau` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sodienthoai` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `diachi` text COLLATE utf8mb4_general_ci,
  `vairo` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachtailieu`
--

CREATE TABLE `danhsachtailieu` (
  `id` int NOT NULL,
  `tentailieu` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `idtheloai` int DEFAULT NULL,
  `mota` text COLLATE utf8mb4_general_ci,
  `ngaytao` datetime DEFAULT NULL,
  `duongdan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachtheloai`
--

CREATE TABLE `danhsachtheloai` (
  `id` int NOT NULL,
  `tentheloai` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhsachbinhluan`
--
ALTER TABLE `danhsachbinhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idnguoidung` (`idnguoidung`),
  ADD KEY `idtailieu` (`idtailieu`);

--
-- Chỉ mục cho bảng `danhsachdanhgia`
--
ALTER TABLE `danhsachdanhgia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idnguoidung` (`idnguoidung`),
  ADD KEY `idtailieu` (`idtailieu`);

--
-- Chỉ mục cho bảng `danhsachnguoidung`
--
ALTER TABLE `danhsachnguoidung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `danhsachtailieu`
--
ALTER TABLE `danhsachtailieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtheloai` (`idtheloai`);

--
-- Chỉ mục cho bảng `danhsachtheloai`
--
ALTER TABLE `danhsachtheloai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhsachbinhluan`
--
ALTER TABLE `danhsachbinhluan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhsachdanhgia`
--
ALTER TABLE `danhsachdanhgia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhsachnguoidung`
--
ALTER TABLE `danhsachnguoidung`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhsachtailieu`
--
ALTER TABLE `danhsachtailieu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhsachtheloai`
--
ALTER TABLE `danhsachtheloai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `danhsachbinhluan`
--
ALTER TABLE `danhsachbinhluan`
  ADD CONSTRAINT `danhsachbinhluan_ibfk_1` FOREIGN KEY (`idnguoidung`) REFERENCES `danhsachnguoidung` (`id`),
  ADD CONSTRAINT `danhsachbinhluan_ibfk_2` FOREIGN KEY (`idtailieu`) REFERENCES `danhsachtailieu` (`id`);

--
-- Các ràng buộc cho bảng `danhsachdanhgia`
--
ALTER TABLE `danhsachdanhgia`
  ADD CONSTRAINT `danhsachdanhgia_ibfk_1` FOREIGN KEY (`idnguoidung`) REFERENCES `danhsachnguoidung` (`id`),
  ADD CONSTRAINT `danhsachdanhgia_ibfk_2` FOREIGN KEY (`idtailieu`) REFERENCES `danhsachtailieu` (`id`);

--
-- Các ràng buộc cho bảng `danhsachtailieu`
--
ALTER TABLE `danhsachtailieu`
  ADD CONSTRAINT `danhsachtailieu_ibfk_1` FOREIGN KEY (`idtheloai`) REFERENCES `danhsachtheloai` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
