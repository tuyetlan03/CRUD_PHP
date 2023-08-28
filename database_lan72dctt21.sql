-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 26, 2023 lúc 06:11 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lan_72dctt21`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MSV` int(10) NOT NULL,
  `HOTEN` varchar(100) NOT NULL,
  `NGAYSINH` date NOT NULL,
  `DIACHI` varchar(100) NOT NULL,
  `GIOITINH` varchar(10) NOT NULL,
  `LOP` varchar(50) NOT NULL,
  `KHOA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`MSV`, `HOTEN`, `NGAYSINH`, `DIACHI`, `GIOITINH`, `LOP`, `KHOA`) VALUES
(1, 'Bùi Minh Kiên ', '1986-10-15', 'Vệ An', 'Nữ', 'C6', 'Kế '),
(2, 'Nguyễn Thị Giang', '1990-07-07', 'An Ninh', 'Nam', 'L8', 'CNTT'),
(3, 'Nguyễn Thị phương', '1994-06-06', 'Bắc Ninh', 'Nữ', 'K5', 'CNTT'),
(4, 'Hồ Đức Kiên', '1996-02-11', 'Vĩnh Long', 'Nam', 'C01', 'KETOAN'),
(5, 'Nguyễn Phương Hiền', '1993-06-09', 'Bắc Ninh', 'Nữ', 'C01', 'KETOAN'),
(6, 'Nguyễn Thị At', '1985-05-05', 'Lạng Giang', 'Nữ', 'C6', 'CNTT'),
(7, 'Nguyễn Thị Giang ', '1983-05-05', 'Văn an', 'Nam', 'c45', 'CNTT'),
(8, 'Nguyễn Thị Giang ', '1983-05-05', 'Văn an', 'Nam', 'c45', 'CNTT');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MSV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `MSV` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
