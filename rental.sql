-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2017 at 07:16 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `brand` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `brand`, `stock`, `price`, `status`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Toyota Avanza', '6', '100K', 'available', '67e52d00bdfd96834dda401b98d2af372136a993.jpg', NULL, NULL, '2017-11-30 22:01:29'),
(2, 'Toyota Innova', '9', '200K', 'available', '8119.jpg', NULL, NULL, '2017-11-30 21:25:05'),
(3, 'Toyota Alphard', '5', '500K', 'available', '4235377-ferrari.jpg', NULL, NULL, '2017-11-30 19:22:20'),
(4, 'Honda Jazz', '13', '170K', 'available', 'Bruce_Wayne''s_Car_(TJLMS).jpg', NULL, NULL, '2017-11-30 19:22:27'),
(5, 'Honda HR-V', '7', '220K', 'available', 'Ceramic White-WAW-210,209,209-640-en_US.jpg', NULL, NULL, '2017-11-30 19:22:38'),
(6, 'Honda Mobilio', '8', '150K', 'available', 'HD CAR wALLPAPERS (20).jpg', NULL, NULL, '2017-11-30 19:22:45'),
(7, 'Toyota Agya', '21', '140K', 'available', 'lamborghini_gallardo_hd-normal.jpg', NULL, NULL, '2017-11-30 19:22:52'),
(8, 'Toyota Yaris', '9', '200K', 'available', 'Mazda-2-Genki-Hatch-2017-1.jpg', NULL, NULL, '2017-11-30 19:22:59'),
(9, 'Toyota Fortuner', '3', '400K', 'available', 'Mazda2-Racing-Concept-1.jpg', NULL, NULL, '2017-11-30 19:23:11'),
(10, 'Honda CR-V', '7', '380K', 'available', 'white-porsche-car-plain.jpg', NULL, NULL, '2017-11-30 19:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `peminjams`
--

CREATE TABLE `peminjams` (
  `id` int(11) NOT NULL,
  `cars_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identitas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjams`
--

INSERT INTO `peminjams` (`id`, `cars_id`, `name`, `identitas`, `phone`, `status`, `date`, `day`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'hafiz', '1550', '085219991234', 'sudah', '16-11-2017', '5', NULL, NULL, NULL),
(2, 1, 'afandi', '1551', '085212341234', 'belum', '13-10-2017', '2', NULL, NULL, NULL),
(8, 1, 'penyewa 1', '12345', '0987', 'sudah', '02-12-2017', '6', NULL, '2017-11-30 21:23:08', '2017-11-30 22:01:29'),
(9, 2, 'tes', '123', '123', 'belum', '12', '2', NULL, '2017-11-30 21:25:04', '2017-11-30 21:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$EtCIduPeKQKftXzYz4CuZeVwXCuDmEDw4GMYAUPu7vsdRXBe/NSAK', '3tGOE3mRT4WBL1drko7WRZVKiZEozp3Ah6krkKZDPYvgL5ubH6iWvvx5xVfa', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjams`
--
ALTER TABLE `peminjams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_id` (`cars_id`);

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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `peminjams`
--
ALTER TABLE `peminjams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjams`
--
ALTER TABLE `peminjams`
  ADD CONSTRAINT `peminjams_ibfk_1` FOREIGN KEY (`cars_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
