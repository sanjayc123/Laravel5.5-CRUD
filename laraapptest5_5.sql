-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 27, 2018 at 02:08 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraapptest5_5`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `isbn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `user_id`, `isbn`, `title`, `author`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 1, '1234', 'My title', 'sanjay', 'dsfdsfdsfdsf', '1532605819.jpg', '2018-07-26 06:20:19', '2018-07-26 06:20:40'),
(3, 1, 'asdasd', 'asdsad', 'asdas', 'ddsadasdsad', '1532605856.jpg', '2018-07-26 06:20:56', '2018-07-26 06:20:56'),
(4, 1, 'asdsad', 'sadsad', 'asddsad', 'sadasdsasd', '1532605867.jpg', '2018-07-26 06:21:07', '2018-07-26 06:21:07'),
(5, 1, 'asdsa', 'dsad', 'saddsadd', 'sadsadsad', '1532605874.jpg', '2018-07-26 06:21:14', '2018-07-26 06:21:14'),
(6, 1, 'asdsa', 'dsadsad', 'asasdsad', 'asdsad', '1532605882.jpg', '2018-07-26 06:21:22', '2018-07-26 06:21:22'),
(7, 1, 'sadsa', 'dsadasd', 'asdsad', 'asdasd', '1532605891.jpg', '2018-07-26 06:21:31', '2018-07-26 06:21:31'),
(8, 1, 'sadsad', 'sadasd', 'asdsadsa', 'dasdasdsa', '1532605911.jpg', '2018-07-26 06:21:51', '2018-07-26 06:21:51'),
(9, 1, 'sanjay123', 'sdsdsdf', 'sdfsdf', 'sdfdsfdsfds', '1532605946.jpg', '2018-07-26 06:22:26', '2018-07-26 06:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_26_060259_create_books_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sanjay', 'sanjay.chaudhari@panamaxil.com', '$2y$10$b7TDnY.4kukUIfLerqrx/eMYNnBoR.c..37VMezZhMqWEqq5bAC0i', 'bH49jLcBTAuESkuzE2op0UsEKuQmFCCYZfHgMBahMoQRIC5e27aT7JeWXYAn', '2018-07-25 06:15:54', '2018-07-25 06:15:54'),
(2, 'siteuser', 'sanjay@panamaxil.com', '$2y$10$86dNok6y9yWeRFQ6Al0LPeRt2GFFV698T1w6sV78N1JOIrjxIKRdm', 'ORtoiAYHwJhhXurPwkRRD8DVFMt8CD8Zm7FgFUVZwOXztd231cS9bNi9eXbf', '2018-07-26 06:23:56', '2018-07-26 06:23:56'),
(3, 'Sanjay', 'sanjay1@panamaxil.com', '$2y$10$KAZEjoVo75.YtSB3KGqjcuX1va82KkRUXITqXMcW40L06ysZyAzYK', 'w29o6zluzdoLZyWnCw4m8KRjywZtM7pmOsTMwzLyk0audShXrs0ksndFp4nz', '2018-07-27 04:21:53', '2018-07-27 04:21:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
