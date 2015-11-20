-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2015 at 04:19 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ths`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `product_supplier` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `product_description` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `product_type` tinyint(1) NOT NULL COMMENT '0 = np, 1 = p',
  `product_status` int(11) NOT NULL COMMENT '0=inactive, 1=active',
  `product_expiration` date NOT NULL,
  `product_supplyPrice` int(11) NOT NULL,
  `product_markUpPrice` int(11) NOT NULL,
  `product_retailPrice` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_reorderPoint` int(11) NOT NULL,
  `product_reorderAmount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_supplier`, `product_description`, `product_type`, `product_status`, `product_expiration`, `product_supplyPrice`, `product_markUpPrice`, `product_retailPrice`, `product_quantity`, `product_reorderPoint`, `product_reorderAmount`, `created_at`, `updated_at`) VALUES
(1, 'elaine brigette padiernos', 'lasasd', '<3', 0, 1, '0000-00-00', 12, 0, 12, 786, 10, 12, '2015-11-11 12:34:09', '2015-11-11 12:34:09'),
(2, 'nicomaine padiernos', 'lasasd', '1123', 0, 1, '0000-00-00', 12, 0, 12, 13, 12, 12, '2015-11-11 12:09:15', '2015-11-11 12:09:15'),
(3, 'elaine <3 lance', 'lasasd', 'asd', 0, 1, '0000-00-00', 12, 0, 12, 338, 16, 12, '2015-11-11 12:07:11', '2015-11-11 12:07:11'),
(4, 'sample', 'lasasd', 'asd', 1, 1, '2015-11-05', 12, 0, 12, 8, 12, 12, '2015-11-11 03:22:33', '2015-11-11 03:22:33'),
(5, 'sample2', 'lasasd', 'asd', 1, 1, '2015-12-25', 12, 0, 12, 12, 1, 2, '2015-11-11 04:17:17', '2015-11-11 04:17:17'),
(6, 'nelson', 'lasasd', 'asd', 0, 1, '0000-00-00', 123, 0, 123, 49, 50, 50, '2015-11-11 12:06:11', '2015-11-11 12:06:11'),
(7, 'Pedigree Dry', 'lasasd', 'masarap', 0, 1, '0000-00-00', 200, 0, 400, 50, 30, 30, '2015-11-12 03:17:52', '2015-11-12 03:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sales_date` datetime NOT NULL,
  `sales_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 = returned, 1 = closed',
  `sales_total` int(11) NOT NULL,
  `sales_discount` int(11) NOT NULL,
  `sales_finalTotal` int(11) NOT NULL,
  `sales_cashTender` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sales_id`, `user_id`, `sales_date`, `sales_status`, `sales_total`, `sales_discount`, `sales_finalTotal`, `sales_cashTender`, `product_id`, `product_quantity`, `created_at`, `updated_at`) VALUES
(36, 1447211941, 1, '2015-11-11 11:19:01', 1, 0, 0, 168, 0, 2, 12, '2015-11-11 03:19:01', '2015-11-11 03:19:01'),
(37, 1447211941, 1, '2015-11-11 11:19:01', 1, 0, 0, 168, 0, 4, 2, '2015-11-11 03:19:01', '2015-11-11 03:19:01'),
(38, 1447211985, 1, '2015-11-11 11:19:45', 1, 0, 0, 24, 0, 2, 2, '2015-11-11 03:19:45', '2015-11-11 03:19:45'),
(39, 1447212088, 1, '2015-11-11 11:21:28', 1, 0, 0, 144, 0, 2, 12, '2015-11-11 03:21:28', '2015-11-11 03:21:28'),
(40, 1447212127, 1, '2015-11-11 11:22:07', 1, 0, 0, 144, 0, 2, 12, '2015-11-11 03:22:07', '2015-11-11 03:22:07'),
(41, 1447212153, 1, '2015-11-11 11:22:33', 1, 0, 0, 168, 0, 3, 12, '2015-11-11 03:22:33', '2015-11-11 03:22:33'),
(42, 1447212153, 1, '2015-11-11 11:22:33', 1, 0, 0, 168, 0, 4, 2, '2015-11-11 03:22:33', '2015-11-11 03:22:33'),
(43, 1447232416, 1, '2015-11-11 17:00:16', 1, 0, 0, 1200, 0, 1, 100, '2015-11-11 09:00:16', '2015-11-11 09:00:16'),
(44, 1447234146, 1, '2015-11-11 17:29:06', 1, 0, 0, 144, 0, 1, 12, '2015-11-11 09:29:06', '2015-11-11 09:29:06'),
(45, 1447243459, 1, '2015-11-11 20:04:19', 1, 0, 0, 600, 0, 2, 50, '2015-11-11 12:04:19', '2015-11-11 12:04:19'),
(46, 1447243500, 1, '2015-11-11 20:05:00', 1, 0, 0, 6150, 0, 6, 50, '2015-11-11 12:05:00', '2015-11-11 12:05:00'),
(47, 1447243572, 1, '2015-11-11 20:06:12', 1, 0, 0, 123, 0, 6, 1, '2015-11-11 12:06:12', '2015-11-11 12:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_contactNo` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_status` tinyint(1) NOT NULL COMMENT '0= inactive, 1 = active',
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_name`, `supplier_contactNo`, `supplier_email`, `supplier_address`, `supplier_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'lasasd', '0942042422042', 'boss@ivan', 'cainta', 1, '', '2015-09-30 08:23:32', '2015-09-30 08:23:32'),
(2, 'king chua', '09265260828', 'king@king.com', 'Marikina', 1, '', '2015-09-30 19:11:33', '2015-09-30 19:11:33'),
(3, 'arvs', '091512312341', 'arvs@tits', 'victoria', 1, '', '2015-09-30 19:13:17', '2015-09-30 19:13:17'),
(4, 'Nelson', '091624124151', 'nelson.coralde@yahoo.com', 'San Mateo', 1, '', '2015-09-30 23:08:02', '2015-09-30 23:08:02'),
(5, 'KING', '1239012830', 'lkjqewjkjlewelqjk@eqw', 'qweoiqwueqj', 1, '', '2015-09-30 23:09:09', '2015-09-30 23:09:09'),
(6, 'jason castro', '09153456789', 'jason@castro', 'China', 1, '', '2015-10-02 09:33:05', '2015-10-02 09:33:05'),
(7, 'james yap', '09561231234', 'jame@yap', 'marikina ', 1, '', '2015-10-02 09:33:29', '2015-10-02 09:33:29'),
(8, 'IVANHIGH', '09265261212', 'ivan@m', 'sa taas', 1, '', '2015-10-02 23:15:26', '2015-10-02 23:15:26'),
(9, 'lanceasdasd', '09123123', '1@1', 'asdasda', 1, '', '2015-10-04 07:32:10', '2015-10-04 07:32:10'),
(10, 'boompanes', '091923123', 'asdasdd@2', 'dasddadsd', 1, '', '2015-10-04 07:32:35', '2015-10-04 07:32:35'),
(11, 'asdadeaeaadsd', '123912390', 'asd@12313', 'asdd', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'KJH', 'KJH', 'QEQE@KQJHEQKJHKJHKJHK', 'KJH', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_contactNo` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 = admin, 1 = cashier',
  `user_status` int(11) NOT NULL COMMENT '0 = inactive, 1 = active',
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_email`, `password`, `user_contactNo`, `user_type`, `user_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(28, 'elainelabyuu', 'lance@lance', '$2y$10$RTjdNi0AKq/0dD6G6/76oOkLrz7FWKB5sUSyp.2l.iw3qWFNj/Hku', '289', 1, 0, '', '2015-10-12 11:12:12', '2015-10-12 22:56:15'),
(29, 'lancebox', 'lance@lance.com', '$2y$10$TYrjlGo2fR9N4Xe2WpezxuvC9wcJBrLlZOHMQZ2sOiWpXrHkf9qR2', '09265260828', 1, 1, '', '2015-10-13 00:35:26', '2015-10-13 00:35:26'),
(30, 'asdasd', '123@123', '$2y$10$56y/2KATjl3dJQvBKw0Bq.FmsTNraAENCIZ/DhA.9DirWzzI7QkMS', '123', 1, 1, '', '2015-10-13 00:36:15', '2015-10-13 00:36:15'),
(31, 'lasdasd', 'asd@23123', '$2y$10$pVwMxf0zmbdX0aK8OsDjDO6pPgyyE2s3gGcVtFFLKsyCsK4Wq18aK', '123', 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'qwe', 'qwe@123', '$2y$10$pputIPo8YKQXZj41fLxsj.sB/29MNPy2MT5ZDsWklXMcsAhgdsRyy', '123', 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'brigette', 'ebr@jlp', '$2y$10$2FgSGtkl4Ocu5QLv02bLhu8f30K2EG3O7urHUNvF4JWTSwSiIToKq', '12312123', 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'lanceeeee', 'asdasd@wqweqwterqytwertqw', '$2y$10$OLlKtCgK56PoK8Tl9sDHw.sT3Rjrp8n9Px0ZdeIhaWe4nP3COMFku', 'asd', 1, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Rafael Chua', 'admin@admin.com', '$2y$10$Q6m59.f0JrPecJIsY9N3y.ET.mZSdhnnfZlPxriVkxkCRS4PwyY.y', '09055081262', 0, 1, 'qEBM4T5YpUFVa3cM6zKxNqhy6p8FfLjtbFGYpJoTuyYEWh7Qs1YzM7VjKqch', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Lance Padiernos', 'cashier@cashier.com', '$2y$10$eZYPFXSC4kN26nfRT2kvE.7qOeOJmqaq1OYb0B8NBnx8iHky2pIO.', '123', 1, 1, 'u2LRpRf5CzwbBVIG7IU90ewTFirVl6UrJhM2kD3KQzYxB0MK71yeGfwQvs74', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Nelson Coralde', 'cashier2@cashier.com', '$2y$10$7sgzXd70ZFmteM8Tx39uLeRoC56nmFQ5Z775SY0R9T5BPYCxmHknm', '123', 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Sample', 'sample@sample.com', '$2y$10$fk6MG0CwGBDP5bSrRsj1Ce5c5X9.bO.XAEl7TPk.K2U.WT7teACOO', '123', 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `sales_id` (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
