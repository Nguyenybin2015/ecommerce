-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2023 lúc 02:27 PM
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
-- Cơ sở dữ liệu: `vcl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id_brand` char(36) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id_brand`, `name`) VALUES
('1', 'Vans'),
('2', 'Converse'),
('3', 'Jordan'),
('4', 'Adidas'),
('5', 'MLB');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id_color` char(36) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id_color`, `name`) VALUES
('1', 'black'),
('2', 'white'),
('3', 'red'),
('4', 'blue'),
('5', 'green'),
('6', 'yellow');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_comment` char(36) NOT NULL,
  `content` text NOT NULL,
  `id_user` char(36) NOT NULL,
  `id_shoe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `information`
--

CREATE TABLE `information` (
  `id_information` char(36) NOT NULL,
  `id_size` char(36) NOT NULL,
  `id_color` char(36) NOT NULL,
  `id_brand` char(36) NOT NULL,
  `amount` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `information`
--

INSERT INTO `information` (`id_information`, `id_size`, `id_color`, `id_brand`, `amount`, `image`, `description`) VALUES
('1', '37', '1', '1', 0, '/api/public/img/vansblack.jpg', ''),
('10', '38', '2', '1', 0, '/api/public/img/vanswhite.jpg', ''),
('100', '40', '4', '3', 0, '/api/public/img/jordanblue.jpg', ''),
('101', '41', '4', '3', 0, '/api/public/img/jordanblue.jpg', ''),
('102', '42', '4', '3', 0, '/api/public/img/jordanblue.jpg', ''),
('103', '43', '4', '3', 0, '/api/public/img/jordanblue.jpg', ''),
('104', '44', '4', '3', 0, '/api/public/img/jordanblue.jpg', ''),
('105', '37', '5', '3', 0, '/api/public/img/jordangreen.jpg', ''),
('106', '38', '5', '3', 0, '/api/public/img/jordangreen.jpg', ''),
('107', '39', '5', '3', 0, '/api/public/img/jordangreen.jpg', ''),
('108', '40', '5', '3', 0, '/api/public/img/jordangreen.jpg', ''),
('109', '41', '5', '3', 0, '/api/public/img/jordangreen.jpg', ''),
('11', '39', '2', '1', 0, '/api/public/img/vanswhite.jpg', ''),
('110', '42', '5', '3', 0, '/api/public/img/jordangreen.jpg', ''),
('111', '43', '5', '3', 0, '/api/public/img/jordangreen.jpg', ''),
('112', '44', '5', '3', 0, '/api/public/img/jordangreen.jpg', ''),
('113', '37', '1', '4', 0, '/api/public/img/adidasblack.jpg', ''),
('114', '38', '1', '4', 0, '/api/public/img/adidasblack.jpg', ''),
('115', '39', '1', '4', 0, '/api/public/img/adidasblack.jpg', ''),
('116', '40', '1', '4', 0, '/api/public/img/adidasblack.jpg', ''),
('117', '41', '1', '4', 0, '/api/public/img/adidasblack.jpg', ''),
('118', '42', '1', '4', 0, '/api/public/img/adidasblack.jpg', ''),
('119', '43', '1', '4', 0, '/api/public/img/adidasblack.jpg', ''),
('12', '40', '2', '1', 0, '/api/public/img/vanswhite.jpg', ''),
('120', '44', '1', '4', 0, '/api/public/img/adidasblack.jpg', ''),
('121', '37', '2', '4', 0, '/api/public/img/adidaswhite.jpg', ''),
('122', '38', '2', '4', 0, '/api/public/img/adidaswhite.jpg', ''),
('123', '39', '2', '4', 0, '/api/public/img/adidaswhite.jpg', ''),
('124', '40', '2', '4', 0, '/api/public/img/adidaswhite.jpg', ''),
('125', '41', '2', '4', 0, '/api/public/img/adidaswhite.jpg', ''),
('126', '42', '2', '4', 0, '/api/public/img/adidaswhite.jpg', ''),
('127', '43', '2', '4', 0, '/api/public/img/adidaswhite.jpg', ''),
('128', '44', '2', '4', 0, '/api/public/img/adidaswhite.jpg', ''),
('129', '37', '6', '4', 0, '/api/public/img/adidasyellow.jpg', ''),
('13', '41', '2', '1', 0, '/api/public/img/vanswhite.jpg', ''),
('130', '38', '6', '4', 0, '/api/public/img/adidasyellow.jpg', ''),
('131', '39', '6', '4', 0, '/api/public/img/adidasyellow.jpg', ''),
('132', '40', '6', '4', 0, '/api/public/img/adidasyellow.jpg', ''),
('133', '41', '6', '4', 0, '/api/public/img/adidasyellow.jpg', ''),
('134', '42', '6', '4', 0, '/api/public/img/adidasyellow.jpg', ''),
('135', '43', '6', '4', 0, '/api/public/img/adidasyellow.jpg', ''),
('136', '44', '6', '4', 0, '/api/public/img/adidasyellow.jpg', ''),
('137', '37', '1', '5', 0, '/api/public/img/mlbblack.jpg', ''),
('138', '38', '1', '5', 0, '/api/public/img/mlbblack.jpg', ''),
('139', '39', '1', '5', 0, '/api/public/img/mlbblack.jpg', ''),
('14', '42', '2', '1', 0, '/api/public/img/vanswhite.jpg', ''),
('140', '40', '1', '5', 0, '/api/public/img/mlbblack.jpg', ''),
('141', '41', '1', '5', 0, '/api/public/img/mlbblack.jpg', ''),
('142', '42', '1', '5', 0, '/api/public/img/mlbblack.jpg', ''),
('143', '43', '1', '5', 0, '/api/public/img/mlbblack.jpg', ''),
('144', '44', '1', '5', 0, '/api/public/img/mlbblack.jpg', ''),
('145', '37', '6', '3', 0, '/api/public/img/jordanyellow.jpg', ''),
('146', '38', '6', '3', 0, '/api/public/img/jordanyellow.jpg', ''),
('147', '39', '6', '3', 0, '/api/public/img/jordanyellow.jpg', ''),
('148', '40', '6', '3', 0, '/api/public/img/jordanyellow.jpg', ''),
('149', '41', '6', '3', 0, '/api/public/img/jordanyellow.jpg', ''),
('15', '44', '2', '1', 0, '/api/public/img/vanswhite.jpg', ''),
('150', '42', '6', '3', 0, '/api/public/img/jordanyellow.jpg', ''),
('151', '43', '6', '3', 0, '/api/public/img/jordanyellow.jpg', ''),
('152', '44', '6', '3', 0, '/api/public/img/jordanyellow.jpg', ''),
('153', '37', '5', '3', 0, '/api/public/img/jordangreen.jpg', ''),
('154', '38', '5', '3', 0, '/api/public/img/jordangreen.jpg', ''),
('155', '39', '5', '3', 0, '/api/public/img/jordangreen.jpg', ''),
('156', '40', '5', '3', 0, '/api/public/img/jordangreen.jpg', ''),
('157', '41', '5', '3', 0, '/api/public/img/jordangreen.jpg', ''),
('158', '42', '5', '3', 0, '/api/public/img/jordangreen.jpg', ''),
('159', '43', '5', '3', 0, '/api/public/img/jordangreen.jpg', ''),
('16', '37', '3', '1', 0, '/api/public/img/vansred.jpg', ''),
('160', '44', '5', '3', 0, '/api/public/img/jordangreen.jpg', ''),
('161', '37', '2', '3', 0, '/api/public/img/jordanwhite.jpg', ''),
('162', '38', '2', '3', 0, '/api/public/img/jordanwhite.jpg', ''),
('163', '39', '2', '3', 0, '/api/public/img/jordanwhite.jpg', ''),
('164', '40', '2', '3', 0, '/api/public/img/jordanwhite.jpg', ''),
('165', '41', '2', '3', 0, '/api/public/img/jordanwhite.jpg', ''),
('166', '42', '2', '3', 0, '/api/public/img/jordanwhite.jpg', ''),
('167', '43', '2', '3', 0, '/api/public/img/jordanwhite.jpg', ''),
('168', '44', '2', '3', 0, '/api/public/img/jordanwhite.jpg', ''),
('169', '37', '2', '5', 0, '/api/public/img/mlbwhite.jpg', ''),
('17', '38', '3', '1', 0, '/api/public/img/vansred.jpg', ''),
('170', '38', '2', '5', 0, '/api/public/img/mlbwhite.jpg', ''),
('171', '39', '2', '5', 0, '/api/public/img/mlbwhite.jpg', ''),
('172', '40', '2', '5', 0, '/api/public/img/mlbwhite.jpg', ''),
('173', '41', '2', '5', 0, '/api/public/img/mlbwhite.jpg', ''),
('174', '42', '2', '5', 0, '/api/public/img/mlbwhite.jpg', ''),
('175', '43', '2', '5', 0, '/api/public/img/mlbwhite.jpg', ''),
('176', '44', '2', '5', 0, '/api/public/img/mlbwhite.jpg', ''),
('177', '37', '5', '2', 0, '/api/public/img/conversegreen.jpg', ''),
('178', '38', '5', '2', 0, '/api/public/img/conversegreen.jpg', ''),
('179', '39', '5', '2', 0, '/api/public/img/conversegreen.jpg', ''),
('18', '39', '3', '1', 0, '/api/public/img/vansred.jpg', ''),
('180', '40', '5', '2', 0, '/api/public/img/conversegreen.jpg', ''),
('181', '41', '5', '2', 0, '/api/public/img/conversegreen.jpg', ''),
('182', '42', '5', '2', 0, '/api/public/img/conversegreen.jpg', ''),
('183', '43', '5', '2', 0, '/api/public/img/conversegreen.jpg', ''),
('184', '44', '5', '2', 0, '/api/public/img/conversegreen.jpg', ''),
('19', '40', '3', '1', 0, '/api/public/img/vansred.jpg', ''),
('2', '38', '1', '1', 0, '/api/public/img/vansblack.jpg', ''),
('20', '41', '3', '1', 0, '/api/public/img/vansred.jpg', ''),
('21', '42', '3', '1', 0, '/api/public/img/vansred.jpg', ''),
('22', '43', '3', '1', 0, '/api/public/img/vansred.jpg', ''),
('23', '44', '3', '1', 0, '/api/public/img/vansred.jpg', ''),
('24', '37', '4', '1', 0, '/api/public/img/vansblue.jpg', ''),
('25', '38', '4', '1', 0, '/api/public/img/vansblue.jpg', ''),
('26', '39', '4', '1', 0, '/api/public/img/vansblue.jpg', ''),
('27', '40', '4', '1', 0, '/api/public/img/vansblue.jpg', ''),
('28', '41', '4', '1', 0, '/api/public/img/vansblue.jpg', ''),
('29', '42', '4', '1', 0, '/api/public/img/vansblue.jpg', ''),
('3', '39', '1', '1', 0, '/api/public/img/vansblack.jpg', ''),
('30', '43', '4', '1', 0, '/api/public/img/vansblue.jpg', ''),
('300', '37', '2', '5', 0, '/api/public/img/mlb1.webp', ''),
('31', '44', '4', '1', 0, '/api/public/img/vansblue.jpg', ''),
('311', '38', '2', '5', 0, '/api/public/img/mlb1.webp', ''),
('312', '39', '2', '5', 0, '/api/public/img/mlb1.webp', ''),
('313', '40', '2', '5', 0, '/api/public/img/mlb1.webp', ''),
('314', '41', '2', '5', 0, '/api/public/img/mlb1.webp', ''),
('315', '42', '2', '5', 0, '/api/public/img/mlb1.webp', ''),
('316', '43', '2', '5', 0, '/api/public/img/mlb1.webp', ''),
('317', '44', '2', '5', 0, '/api/public/img/mlb1.webp', ''),
('318', '37', '2', '3', 0, '/api/public/img/jordanvip.webp', ''),
('319', '38', '2', '3', 0, '/api/public/img/jordanvip.webp', ''),
('32', '37', '5', '1', 0, '/api/public/img/vansgreen.jpg', ''),
('320', '39', '2', '3', 0, '/api/public/img/jordanvip.webp', ''),
('321', '40', '2', '3', 0, '/api/public/img/jordanvip.webp', ''),
('322', '41', '2', '3', 0, '/api/public/img/jordanvip.webp', ''),
('323', '42', '2', '3', 0, '/api/public/img/jordanvip.webp', ''),
('324', '43', '2', '3', 0, '/api/public/img/jordanvip.webp', ''),
('325', '44', '2', '3', 0, '/api/public/img/jordanvip.webp', ''),
('33', '38', '5', '1', 0, '/api/public/img/vansgreen.jpg', ''),
('34', '39', '5', '1', 0, '/api/public/img/vansgreen.jpg', ''),
('35', '40', '5', '1', 0, '/api/public/img/vansgreen.jpg', ''),
('36', '41', '5', '1', 0, '/api/public/img/vansgreen.jpg', ''),
('37', '42', '5', '1', 0, '/api/public/img/vansgreen.jpg', ''),
('38', '43', '5', '1', 0, '/api/public/img/vansgreen.jpg', ''),
('39', '44', '5', '1', 0, '/api/public/img/vansgreen.jpg', ''),
('4', '40', '1', '1', 0, '/api/public/img/vansblack.jpg', ''),
('40', '37', '1', '2', 0, '/api/public/img/converseblack.jpg', ''),
('41', '38', '1', '2', 0, '/api/public/img/converseblack.jpg', ''),
('42', '39', '1', '2', 0, '/api/public/img/converseblack.jpg', ''),
('43', '40', '1', '2', 0, '/api/public/img/converseblack.jpg', ''),
('44', '41', '1', '2', 0, '/api/public/img/converseblack.jpg', ''),
('45', '42', '1', '2', 0, '/api/public/img/converseblack.jpg', ''),
('46', '43', '1', '2', 0, '/api/public/img/converseblack.jpg', ''),
('47', '44', '1', '2', 0, '/api/public/img/converseblack.jpg', ''),
('48', '37', '2', '2', 0, '/api/public/img/conversewhite.jpg', ''),
('49', '38', '2', '2', 0, '/api/public/img/conversewhite.jpg', ''),
('5', '41', '1', '1', 0, '/api/public/img/vansblack.jpg', ''),
('50', '39', '2', '2', 0, '/api/public/img/conversewhite.jpg', ''),
('51', '40', '2', '2', 0, '/api/public/img/conversewhite.jpg', ''),
('52', '41', '2', '2', 0, '/api/public/img/conversewhite.jpg', ''),
('53', '42', '2', '2', 0, '/api/public/img/conversewhite.jpg', ''),
('54', '43', '2', '2', 0, '/api/public/img/conversewhite.jpg', ''),
('55', '44', '2', '2', 0, '/api/public/img/conversewhite.jpg', ''),
('56', '37', '3', '2', 0, '/api/public/img/conversered.jpg', ''),
('57', '38', '3', '2', 0, '/api/public/img/conversered.jpg', ''),
('58', '39', '3', '2', 0, '/api/public/img/conversered.jpg', ''),
('59', '40', '3', '2', 0, '/api/public/img/conversered.jpg', ''),
('6', '42', '1', '1', 0, '/api/public/img/vansblack.jpg', ''),
('60', '41', '3', '2', 0, '/api/public/img/conversered.jpg', ''),
('61', '42', '3', '2', 0, '/api/public/img/conversered.jpg', ''),
('62', '43', '3', '2', 0, '/api/public/img/conversered.jpg', ''),
('63', '44', '3', '2', 0, '/api/public/img/conversered.jpg', ''),
('64', '43', '2', '1', 0, '/api/public/img/vanswhite.jpg', ''),
('65', '37', '4', '2', 0, '/api/public/img/converseblue.jpg', ''),
('66', '38', '4', '2', 0, '/api/public/img/converseblue.jpg', ''),
('67', '39', '4', '2', 0, '/api/public/img/converseblue.jpg', ''),
('68', '40', '4', '2', 0, '/api/public/img/converseblue.jpg', ''),
('69', '41', '4', '2', 0, '/api/public/img/converseblue.jpg', ''),
('7', '43', '1', '1', 0, '/api/public/img/vansblack.jpg', ''),
('70', '42', '4', '2', 0, '/api/public/img/converseblue.jpg', ''),
('71', '43', '4', '2', 0, '/api/public/img/converseblue.jpg', ''),
('72', '44', '4', '2', 0, '/api/public/img/converseblue.jpg', ''),
('73', '37', '6', '2', 0, '/api/public/img/converseyellow.jpg', ''),
('74', '38', '6', '2', 0, '/api/public/img/converseyellow.jpg', ''),
('75', '39', '6', '2', 0, '/api/public/img/converseyellow.jpg', ''),
('76', '40', '6', '2', 0, '/api/public/img/converseyellow.jpg', ''),
('77', '41', '6', '2', 0, '/api/public/img/converseyellow.jpg', ''),
('78', '42', '6', '2', 0, '/api/public/img/converseyellow.jpg', ''),
('79', '43', '6', '2', 0, '/api/public/img/converseyellow.jpg', ''),
('8', '44', '1', '1', 0, '/api/public/img/vansblack.jpg', ''),
('80', '44', '6', '2', 0, '/api/public/img/converseyellow.jpg', ''),
('81', '37', '1', '3', 0, '/api/public/img/jordanblack.jpg', ''),
('82', '38', '1', '3', 0, '/api/public/img/jordanblack.jpg', ''),
('83', '39', '1', '3', 0, '/api/public/img/jordanblack.jpg', ''),
('84', '40', '1', '3', 0, '/api/public/img/jordanblack.jpg', ''),
('85', '41', '1', '3', 0, '/api/public/img/jordanblack.jpg', ''),
('86', '42', '1', '3', 0, '/api/public/img/jordanblack.jpg', ''),
('87', '43', '1', '3', 0, '/api/public/img/jordanblack.jpg', ''),
('88', '44', '1', '3', 0, '/api/public/img/jordanblack.jpg', ''),
('89', '37', '3', '3', 0, '/api/public/img/jordanred.jpg', ''),
('9', '37', '2', '1', 0, '/api/public/img/vanswhite.jpg', ''),
('90', '38', '3', '3', 0, '/api/public/img/jordanred.jpg', ''),
('91', '39', '3', '3', 0, '/api/public/img/jordanred.jpg', ''),
('92', '40', '3', '3', 0, '/api/public/img/jordanred.jpg', ''),
('93', '41', '3', '3', 0, '/api/public/img/jordanred.jpg', ''),
('94', '42', '3', '3', 0, '/api/public/img/jordanred.jpg', ''),
('95', '43', '3', '3', 0, '/api/public/img/jordanred.jpg', ''),
('96', '44', '3', '3', 0, '/api/public/img/jordanred.jpg', ''),
('97', '37', '4', '3', 0, '/api/public/img/jordanblue.jpg', ''),
('98', '38', '4', '3', 0, '/api/public/img/jordanblue.jpg', ''),
('99', '39', '4', '3', 0, '/api/public/img/jordanblue.jpg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id_order` char(36) NOT NULL,
  `id_user` char(36) NOT NULL,
  `id_shoe` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shoes`
--

CREATE TABLE `shoes` (
  `id_shoe` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `id_information` char(36) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `shoes`
--

INSERT INTO `shoes` (`id_shoe`, `name`, `price`, `id_information`, `created_at`, `updated_at`) VALUES
(1, 'Giày Vans old skool basic', 2550000, '1', '2023-11-13 18:22:25', '2023-11-13 18:22:25'),
(2, 'Giày Converse 1970s cổ thấp basic', 1650000, '40', '2023-11-13 18:22:25', '2023-11-13 18:22:25'),
(3, 'Giày Converse 1970s cổ cao', 1900000, '73', '2023-11-13 18:22:25', '2023-11-13 18:22:25'),
(4, 'Giày Nike Air Jordan đỏ trắng cổ cao', 5000000, '94', '2023-11-13 18:22:25', '2023-11-13 18:22:25'),
(5, 'Giày Nike Air Jordan xanh lam trắng cổ cao', 5000000, '102', '2023-11-13 18:22:25', '2023-11-13 18:22:25'),
(6, 'Giày MLB', 1300000, '140', '2023-11-13 18:22:25', '2023-11-13 18:22:25'),
(7, 'Giày Adidas Grandcourt', 1250000, '125', '2023-11-13 18:22:25', '2023-11-13 18:22:25'),
(8, 'Giày Vans old skool xanh lam', 2600000, '28', '2023-11-13 18:22:25', '2023-11-13 18:22:25'),
(9, 'Giày Nike Air Jordan vàng trắng cổ cao', 4800000, '145', '2023-11-13 18:22:25', '2023-11-13 18:22:25'),
(10, 'Giày Nike Air Jordan xanh lá trắng cổ cao', 4500000, '156', '2023-11-13 18:22:25', '2023-11-13 18:22:25'),
(11, 'Giày Adidas Forum', 1800000, '125', '2023-11-13 18:22:25', '2023-11-13 18:22:25'),
(12, 'Giày Vans old skool đỏ', 2600000, '16', '2023-11-13 18:22:25', '2023-11-13 18:22:25'),
(13, 'Giày Converse 1970s trắng cổ thấp', 1700000, '51', '2023-11-13 18:22:25', '2023-11-13 18:22:25'),
(14, 'Giày Vans old skool xanh lá', 2500000, '35', '2023-11-13 18:22:25', '2023-11-13 18:22:25'),
(15, 'Giày MLB NY trắng', 1500000, '172', '2023-11-13 18:22:25', '2023-11-13 18:22:25'),
(16, 'Giày Converse 1970s đỏ cổ thấp', 1700000, '59', '2023-11-13 18:22:25', '2023-11-13 18:22:25'),
(17, 'Giày Converse 1970s xanh lam cổ thấp ', 2550000, '68', '2023-11-13 18:48:44', '2023-11-13 18:48:44'),
(18, 'Giày Nike Jordan 1 High ', 4500000, '166', '2023-11-13 18:48:44', '2023-11-13 18:48:44'),
(19, 'Giày Converse 1970s xanh lá cổ thấp ', 1800000, '178', '2023-11-13 18:48:44', '2023-11-13 18:48:44'),
(20, 'giày MLB Chunky classic', 3200000, '317', '2023-11-13 19:11:11', '2023-11-13 19:11:11'),
(21, 'giày Jordan One Take 4 PF', 4000000, '325', '2023-11-13 19:11:11', '2023-11-13 19:11:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id_size` char(36) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id_size`, `name`) VALUES
('37', '37'),
('38', '38'),
('39', '39'),
('40', '40'),
('41', '41'),
('42', '42'),
('43', '43'),
('44', '44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` char(36) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(500) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `comment_id_user_foreign` (`id_user`),
  ADD KEY `comment_id_shoe_foreign` (`id_shoe`);

--
-- Chỉ mục cho bảng `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id_information`),
  ADD KEY `information_id_color_foreign` (`id_color`),
  ADD KEY `information_id_brand_foreign` (`id_brand`),
  ADD KEY `information_id_size_foreign` (`id_size`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD UNIQUE KEY `uk_id_shoe` (`id_shoe`),
  ADD KEY `order_id_user_foreign` (`id_user`);

--
-- Chỉ mục cho bảng `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`id_shoe`),
  ADD KEY `shoes_id_information_foreign` (`id_information`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `shoes`
--
ALTER TABLE `shoes`
  MODIFY `id_shoe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_id_shoe_foreign` FOREIGN KEY (`id_shoe`) REFERENCES `shoes` (`id_shoe`),
  ADD CONSTRAINT `comment_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `information_id_brand_foreign` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`),
  ADD CONSTRAINT `information_id_color_foreign` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`),
  ADD CONSTRAINT `information_id_size_foreign` FOREIGN KEY (`id_size`) REFERENCES `size` (`id_size`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_id_shoe_foreign` FOREIGN KEY (`id_shoe`) REFERENCES `shoes` (`id_shoe`),
  ADD CONSTRAINT `order_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `shoes`
--
ALTER TABLE `shoes`
  ADD CONSTRAINT `shoes_id_information_foreign` FOREIGN KEY (`id_information`) REFERENCES `information` (`id_information`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
