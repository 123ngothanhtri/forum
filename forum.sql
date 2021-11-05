-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2021 at 07:35 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Thần Thánh', 'admin@gmail.com', '$2y$10$k5JaZon8Aoy/aDV6R6GULeTwIVV8LFP0vVm5pJ1CTHTFIQ04Ivb.S');

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `id_baiviet` int(11) NOT NULL,
  `noidung_baiviet` varchar(999) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinhanh_baiviet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaythem_baiviet` datetime NOT NULL,
  `luotxem_baiviet` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL,
  `id_theloai` int(11) DEFAULT NULL,
  `multipleimage` varchar(999) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`id_baiviet`, `noidung_baiviet`, `hinhanh_baiviet`, `ngaythem_baiviet`, `luotxem_baiviet`, `id`, `id_theloai`, `multipleimage`) VALUES
(96, 'rfrfrfrf', 'image_baiviet/IH0iF647b8lWzwdnqpphsK8AzvOZM5w3CDDBPTIp.png', '2021-10-16 09:19:45', 1, 22, NULL, 'multiple_image/g02a0YXsM3Fd56OpjLX1xCxPrwClVKN38BqAtUdn.jpg|multiple_image/MO6z9sfyQC1JHE5LFNWrGVvjnk7iwJk0mTuJMVoq.png|multiple_image/fwtlgLJyLwvyAJTqVV1fspT6Xk5tp4OA40L0S16S.jpg'),
(97, 's', NULL, '2021-10-16 09:20:04', 5, 22, NULL, NULL),
(98, NULL, 'image_baiviet/rgtcQ5ObYLNQGNlYhuXI3yHCgUXapkq2sKNwdxta.png', '2021-10-16 09:21:38', 1, 22, NULL, 'multiple_image/2h4iGukCqGqi9x6bU874IuSPYkPrSQrdf3hq6fVf.jpg'),
(99, 'asdasd', NULL, '2021-10-16 09:32:48', 0, 14, NULL, 'multiple_image/lCbROjA6RL722xvyDLDhN4wufPtDMNLdPZaaqn4m.png|multiple_image/9KGPVbZTtC54VgTRws6g5TaHKm2U6Yv3KrAZROBB.jpg|multiple_image/louOkfTQ2WDt3cDd6tyNdxNJ9DmcZKgfnuQV5NnP.jpg'),
(100, 'tyty', NULL, '2021-10-16 10:03:11', 1, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id_binhluan` int(11) NOT NULL,
  `noidung_binhluan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_binhluan` datetime DEFAULT NULL,
  `id` int(11) NOT NULL,
  `id_baiviet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id_follow` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_user_fl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id_follow`, `id_user`, `id_user_fl`) VALUES
(8, 15, 14),
(9, 14, 16),
(10, 21, 19),
(11, 21, 16),
(12, 19, 20),
(13, 19, 17),
(14, 20, 22),
(15, 20, 19),
(16, 18, 19),
(17, 18, 23),
(19, 14, 19),
(21, 14, 22),
(22, 16, 21),
(23, 16, 18),
(24, 16, 22),
(26, 14, 21),
(27, 14, 20),
(28, 15, 22),
(32, 14, 24),
(37, 14, 23),
(38, 14, 15),
(39, 18, 14);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id_like` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_baiviet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id_like`, `id`, `id_baiviet`) VALUES
(180, 22, 98),
(181, 22, 97),
(185, 14, 99),
(188, 14, 97),
(191, 14, 100);

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `id_theloai` int(11) NOT NULL,
  `ten_theloai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`id_theloai`, `ten_theloai`) VALUES
(1, 'Khác'),
(2, 'Hài hước'),
(3, 'Game');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `birthday`, `image`, `password`, `email_verified_at`, `remember_token`) VALUES
(14, 'Keqing', 'keqing@gmail.com', 'Nữ', '2009-06-01', 'avatar/SChfVHpdnVR87meCT5gVaUqIpc8ymmN2jZjR1Tdq.jpg', '$2y$10$w5bCfNmNLUkHOO6qs6N4RuFYLIb5zUFwL2i81dtQOp3qFdMMevOWO', NULL, NULL),
(15, 'Barbara', 'barbara@gmail.com', 'Nam', '2000-04-17', NULL, '$2y$10$w5bCfNmNLUkHOO6qs6N4RuFYLIb5zUFwL2i81dtQOp3qFdMMevOWO', NULL, NULL),
(16, 'Ganyu', 'ganyu@gmail.com', 'Nữ', '2000-04-17', NULL, '$2y$10$w5bCfNmNLUkHOO6qs6N4RuFYLIb5zUFwL2i81dtQOp3qFdMMevOWO', NULL, NULL),
(17, 'Raiden Shogun', 'raidensogun@gmail.com', 'Nữ', '2015-01-01', NULL, '$2y$10$3FrJBmC6DogptqKcrvnTzOJa5EgN4qeAm30Pfx1CXfCG9RuNnZ7xW', NULL, NULL),
(18, 'Kokomi', 'kokomi@gmail.com', 'Nữ', '2009-01-01', 'avatar/xH7ruO7wi3rSNrsF9gcm15hjRf9BOilNaer3YAEd.png', '$2y$10$DlmizLVOXh481DQ10mFL5uIKYnpiwiSMz2/00CQW1fZNW98qRZvb6', NULL, NULL),
(19, 'HuTao', 'hutao@gmail.com', 'Nữ', '2000-12-29', NULL, '$2y$10$XNBdoK9Sw/TeasrTgEmr8uFBtk4HTab6.PpAxW6G1nnT1Wi4wv7kC', NULL, NULL),
(20, 'Eula', 'eula@gmail.com', 'Nữ', '2015-01-01', NULL, '$2y$10$gfq1b5QbjJML45OYZcv1C.1ZXJMQJKCsQqsYlNlT7iia4eZ1/dLZy', NULL, NULL),
(21, 'Yoimiya', 'yoimiya@gmail.com', 'Nữ', '2015-01-01', NULL, '$2y$10$0jXo4/XzI6Z58c1WVOQ18eJkNQRWh6bO8diYVCz6ETyE46HaRyy0y', NULL, NULL),
(22, 'Ayaka', 'ayaka@gmail.com', 'Nam', '2014-12-31', 'avatar/RnTAtOo6luerW9QWG5FdMhEaSHrfGDonCxkXk7ug.png', '$2y$10$aY9sx1MSmND/I7k5vJP/TumKJAjk5d8L0Q4y/vqj22lauOBLz7Cze', NULL, NULL),
(23, 'Zhongli', 'zhongli@gmail.com', 'Nam', '2000-10-01', NULL, '$2y$10$fJfdsDMHf1wq8/K8N0Itie79lTINyimfouiJfAFg/9peSWX1ki.tq', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`id_baiviet`),
  ADD KEY `id` (`id`),
  ADD KEY `id_theloai` (`id_theloai`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_binhluan`),
  ADD KEY `id_baiviet` (`id_baiviet`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id_follow`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `id` (`id`),
  ADD KEY `id_baiviet` (`id_baiviet`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id_theloai`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `id_baiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_binhluan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id_follow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id_theloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `baiviet_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`id_baiviet`) REFERENCES `baiviet` (`id_baiviet`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`id_baiviet`) REFERENCES `baiviet` (`id_baiviet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
