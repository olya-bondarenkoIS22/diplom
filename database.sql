-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 23, 2025 at 04:51 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `archivirus.local`
--

-- --------------------------------------------------------

--
-- Table structure for table `antique_items`
--

CREATE TABLE `antique_items` (
  `id` bigint NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_added` date NOT NULL,
  `available` tinyint(1) NOT NULL,
  `id_blog` bigint NOT NULL,
  `id_category` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint NOT NULL,
  `id_user` bigint NOT NULL,
  `blog_name` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `id_user`, `blog_name`, `created_date`, `description`, `address`, `image`) VALUES
(1, 1, 'аааааааааааааааааа', '2025-12-23', 'ааааааааааааааааааааааааааааааа', 'ааааааааааааааааа', 'assets/uploads/blogs/blog_694ab11d12b4b.png'),
(2, 1, 'Доки времен Вьетнама', '2025-12-23', 'Тееееееееееееееееееееееееееееееееееееееееееееееееекст', 'Ленинградская 12/2', 'assets/uploads/blogs/blog_694ac4bd388ad.png'),
(3, 5, 'Блог №1', '2025-12-23', 'Описание Описание Описание Описание', 'Где-то', 'assets/uploads/blogs/blog_694ac7b684595.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` smallint NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` bigint NOT NULL,
  `delivery_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint NOT NULL,
  `id_antique_item` bigint NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint NOT NULL,
  `id_user` bigint NOT NULL,
  `id_antique_item` bigint NOT NULL,
  `id_status` smallint NOT NULL,
  `id_payment_method` smallint NOT NULL,
  `id_delivery_address` bigint NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` smallint NOT NULL,
  `payment_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` smallint NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Гость'),
(2, 'Зарегистрированный пользователь'),
(3, 'Менеджер'),
(4, 'Администратор');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` smallint NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `date_registration` date NOT NULL,
  `id_role` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `phone_number`, `date_registration`, `id_role`) VALUES
(1, 'ozyreo', '$2y$10$WRjsqAN.UcrgKD7PmNFLgOD9VlDdsHQerX2I1yDBPCEe9buxmnPqO', '+79024491743', '2025-12-19', 2),
(2, 'Olya', '$2y$10$TvDA0sPSJ6hnAdHQpqY0V.7AzFSf0/6jcuV.UySQkZpxfL3ZkIY2S', '+79024490292', '2025-12-21', 2),
(5, 'Olga', '$2y$10$ZlOxtomaTRR/IENnI3ynA.q01lN2DCO4qQTwM30uGGPNVnuhFF8bu', '+79506449759', '2025-12-23', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antique_items`
--
ALTER TABLE `antique_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_antiqueitems_to_blogs` (`id_blog`),
  ADD KEY `fk_antiqueitems_to_categories` (`id_category`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_blogs_to_users` (`id_user`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_images_to_antiqueitems` (`id_antique_item`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_to_users` (`id_user`),
  ADD KEY `fk_orders_to_antiqueitems` (`id_antique_item`),
  ADD KEY `fk_orders_to_statuses` (`id_status`),
  ADD KEY `fk_orders_to_paymentmethods` (`id_payment_method`),
  ADD KEY `fk_orders_to_deliveryaddresses` (`id_delivery_address`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `fk_users_to_roles` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antique_items`
--
ALTER TABLE `antique_items`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` smallint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` smallint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` smallint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `antique_items`
--
ALTER TABLE `antique_items`
  ADD CONSTRAINT `fk_antiqueitems_to_blogs` FOREIGN KEY (`id_blog`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_antiqueitems_to_categories` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `fk_blogs_to_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_images_to_antiqueitems` FOREIGN KEY (`id_antique_item`) REFERENCES `antique_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_to_antiqueitems` FOREIGN KEY (`id_antique_item`) REFERENCES `antique_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_orders_to_deliveryaddresses` FOREIGN KEY (`id_delivery_address`) REFERENCES `delivery_addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_orders_to_paymentmethods` FOREIGN KEY (`id_payment_method`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_orders_to_statuses` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_orders_to_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_to_roles` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
