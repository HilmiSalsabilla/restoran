-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2025 at 02:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin1', 'admin@gmail.com', '$2y$12$CkPB6zqwsUVqXCBENATfOeXm4kK1ZV5b4oN/jMgUbRyS4NC1d7kXO', '2025-08-24 03:56:09', '2025-08-24 03:56:09'),
(2, 'Admin2', 'admin2@gmail.com', '$2y$12$Ev88vPHpcixgthkBa7tKVeBFhSp7JkcWAY7HLhBHFlQw7xWSdDDeO', '2025-08-24 19:58:55', '2025-08-24 19:58:55'),
(3, 'Admin3', 'admin3@gmail.com', '$2y$12$1j0J0w5gQwz1MoCq.4KMR.DzNtIaWMdk7Q.gKCpikhEKPkp6Y/Nom', '2025-08-24 20:01:23', '2025-08-24 20:01:23'),
(5, 'Admin4', 'admin4@gmail.com', '$2y$12$/8NfPZMUqvM5/wGG9M2oYuvZ05hlAT4c0JyUikpRrvzlyJqcHcjjK', '2025-08-25 02:00:03', '2025-08-25 02:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `num_people` int(10) NOT NULL,
  `spe_request` text NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Processing',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `name`, `email`, `date`, `num_people`, `spe_request`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 'User', 'user@gmail.com', '2025-08-20 15:00:00', 2, 'Continually transform unique value whereas extensive intellectual capital. Authoritatively reintermediate.', 'Booked', '2025-08-17 23:49:35', '2025-08-25 02:35:27'),
(4, 2, 'User', 'user@gmail.com', '2025-08-20 20:30:00', 2, 'Appropriately aggregate premier technologies after high standards in manufactured products.', 'Processing', '2025-08-18 02:24:06', '2025-08-18 02:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `food_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `town` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `zipcode` int(20) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `user_id` int(10) NOT NULL,
  `price` int(40) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Processing',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `name`, `email`, `town`, `country`, `zipcode`, `phone_number`, `address`, `user_id`, `price`, `status`, `created_at`, `updated_at`) VALUES
(9, 'User', 'user@gmail.com', 'Padang', 'Indonesia', 25221, '0812345678', 'Credibly scale error-free alignments rather than sustainable methodologies. Distinctively optimize.', 2, 57, 'Delivered', '2025-08-16 22:16:36', '2025-08-24 23:47:30'),
(13, 'User', 'user@gmail.com', 'Padang', 'Indonesia', 25221, '0812345678', 'Intrinsicly iterate bricks-and-clicks niche markets and inexpensive infrastructures. Enthusiastically synthesize.', 2, 22, 'Delivering', '2025-08-17 01:40:47', '2025-08-24 23:47:09'),
(14, 'User', 'user@gmail.com', 'Padang', 'Indonesia', 25221, '0812345678', 'Authoritatively drive cooperative manufactured products after high-quality bandwidth. Completely scale.', 2, 24, 'Delivering', '2025-08-17 01:45:13', '2025-08-25 02:35:13'),
(15, 'User', 'user@gmail.com', 'Padang', 'Indonesia', 25221, '0812345678', 'Efficiently simplify low-risk high-yield products vis-a-vis open-source value. Interactively architect.', 2, 35, 'Processing', '2025-08-17 01:48:53', '2025-08-17 01:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(10) NOT NULL,
  `category` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `price`, `category`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Chicken Wings', '20', 'Breakfast', 'Quickly re-engineer accurate relationships after orthogonal web services. Completely foster 24/7 alignments through multidisciplinary schemas. Interactively provide access to state of the art information through.', 'menu-1.jpg', '2025-08-09 13:12:53', '2025-08-09 13:12:53'),
(2, 'Chicken Burger', '10', 'Lunch', 'Credibly transition world-class e-business for out-of-the-box web-readiness. Enthusiastically utilize extensible scenarios vis-a-vis fully researched processes. Competently pursue superior core competencies for cross-media e-commerce. Synergistically reintermediate.', 'menu-3.jpg', '2025-08-09 13:12:53', '2025-08-09 13:12:53'),
(3, 'Pizza', '10', 'Dinner', 'Appropriately drive superior e-markets for intuitive methods of empowerment. Efficiently integrate emerging functionalities without turnkey resources. Competently cultivate revolutionary catalysts for change whereas impactful action.', 'menu-2.jpg', '2025-08-09 13:50:47', '2025-08-09 13:50:47'),
(4, 'Pancakes', '15', 'Breakfast', 'Fluffy pancakes with maple syrup', 'menu-4.jpg', '2025-08-10 02:28:25', '2025-08-10 02:28:25'),
(5, 'Omelette', '12', 'Breakfast', 'Cheese and mushroom omelette', 'menu-5.jpg', '2025-08-10 02:28:25', '2025-08-10 02:28:25'),
(6, 'French Toast', '14', 'Breakfast', 'Golden brown french toast with honey', 'menu-6.jpg', '2025-08-10 02:28:25', '2025-08-10 02:28:25'),
(7, 'Fruit Salad', '10', 'Breakfast', 'Fresh mixed fruits with yogurt', 'menu-7.jpg', '2025-08-10 02:28:25', '2025-08-10 02:28:25'),
(8, 'Grilled Chicken Sandwich', '18', 'Lunch', 'Served with fresh vegetables and fries', 'menu-8.jpg', '2025-08-10 02:28:25', '2025-08-10 02:28:25'),
(9, 'Beef Steak', '25', 'Lunch', 'Juicy beef steak with pepper sauce', 'menu-1.jpg', '2025-08-10 02:28:25', '2025-08-10 02:28:25'),
(10, 'Caesar Salad', '12', 'Lunch', 'Romaine lettuce, parmesan, and croutons', 'menu-2.jpg', '2025-08-10 02:28:25', '2025-08-10 02:28:25'),
(11, 'Fish & Chips', '20', 'Lunch', 'Crispy fish fillet with tartar sauce', 'menu-3.jpg', '2025-08-10 02:28:25', '2025-08-10 02:28:25'),
(12, 'Spaghetti Bolognese', '18', 'Dinner', 'Italian pasta with beef sauce', 'menu-4.jpg', '2025-08-10 02:28:25', '2025-08-10 02:28:25'),
(13, 'Grilled Salmon', '30', 'Breakfast', 'Salmon with lemon butter sauce', 'menu-5.jpg', '2025-08-10 02:28:25', '2025-08-25 02:52:27'),
(14, 'Lamb Chops', '30', 'Dinner', 'Tender lamb chops with rosemary', 'menu-6.jpg', '2025-08-10 02:28:25', '2025-08-10 02:28:25'),
(16, 'Vegetable Stir Fry', '15', 'breakfast', 'A vegetable stir fry is a versatile and quick-cooking dish featuring a colorful medley of fresh, crisp-tender vegetables cooked in a hot pan or wok with a savory, flavorful sauce.', '1756122067.jpg', '2025-08-25 04:35:11', '2025-08-25 04:41:07'),
(17, 'Pancakes with Syrup', '25', 'Breakfast', 'Fluffy pancakes served with maple syrup and fresh berries.', 'Pancakes with Syrup.jpg', '2025-08-25 04:37:31', '2025-08-25 04:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `review` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `review`, `created_at`, `updated_at`) VALUES
(1, 'User', 'Rapidiously reconceptualize intermandated e-commerce for holistic intellectual capital. Conveniently brand.', '2025-08-21 05:47:21', '2025-08-21 05:47:21'),
(2, 'User', 'Globally enable corporate alignments rather than exceptional meta-services. Authoritatively architect.', '2025-08-21 21:16:28', '2025-08-21 21:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'User', 'user@gmail.com', NULL, '$2y$12$.jb4mNxBoqBg0VijonXcYuWfNdj0wiUPv8YHP/tEjnP.dtEimddMu', NULL, '2025-08-09 03:05:44', '2025-08-09 03:05:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
