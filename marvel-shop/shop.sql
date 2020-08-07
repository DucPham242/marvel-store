-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2019 at 02:05 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cate`
--

CREATE TABLE `tbl_cate` (
  `id_cate` int(11) NOT NULL,
  `name_cate` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_cate` datetime NOT NULL DEFAULT current_timestamp(),
  `stt_cate` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_cate`
--

INSERT INTO `tbl_cate` (`id_cate`, `name_cate`, `date_cate`, `stt_cate`) VALUES
(1, 'Đồng hồ Tissot', '2019-08-25 20:42:12', 1),
(2, 'Đồng hồ Citizen', '2019-08-01 20:42:12', 1),
(3, 'Đồng hồ Calvin Klein', '2019-08-06 20:42:12', 1),
(4, 'Đồng hồ Hamilton', '2019-08-01 20:42:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_order`
--

CREATE TABLE `tbl_detail_order` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `total` float NOT NULL,
  `stt` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id_member` int(11) NOT NULL,
  `name_member` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_member` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `addres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_member` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `passw` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stt_member` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stt_order` int(11) NOT NULL DEFAULT 1,
  `date_order` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `id_cate` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mô tả sản phẩm',
  `date_creat` datetime NOT NULL DEFAULT current_timestamp(),
  `stt` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `id_cate`, `name`, `price`, `img`, `quantity`, `description`, `date_creat`, `stt`) VALUES
(5, 4, 'Đồng hồ Hamilton', 25000000, 'hamilton.jpg', 2, 'Mô tả sản phẩm', '2019-08-25 20:42:35', 1),
(6, 2, 'Đồng hồ Citizen', 15000000, 'citizen.jpg', 1, 'Mô tả sản phẩm', '2019-08-13 20:42:35', 1),
(7, 3, 'Đồng hồ Calvin Klein', 36000000, 'ck.jpg', 1, 'Mô tả sản phẩm', '2019-08-05 20:42:35', 1),
(8, 1, 'Đồng hồ Tissot', 9000000, 'tissot.jpg', 1, 'Mô tả sản phẩm', '2019-08-02 20:42:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `passw` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stt_user` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cate`
--
ALTER TABLE `tbl_cate`
  ADD PRIMARY KEY (`id_cate`);

--
-- Indexes for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD PRIMARY KEY (`id_order`,`id_product`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cate` (`id_cate`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cate`
--
ALTER TABLE `tbl_cate`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD CONSTRAINT `fk_id_order_detail_order_order` FOREIGN KEY (`id_order`) REFERENCES `tbl_order` (`id_order`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_product_order_detail_product` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `fk_id_member_order_member` FOREIGN KEY (`id_member`) REFERENCES `tbl_member` (`id_member`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `fk_id_cate_tbl_product_cate` FOREIGN KEY (`id_cate`) REFERENCES `tbl_cate` (`id_cate`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
