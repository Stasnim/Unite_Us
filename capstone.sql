-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 04:20 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED DEFAULT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_member` int(10) UNSIGNED NOT NULL DEFAULT 5,
  `active_members` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `requested` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `admin_id`, `name`, `description`, `code`, `max_member`, `active_members`, `requested`, `tags`, `created_at`, `updated_at`) VALUES
(1, 1, 'Abid Group 01', 'Sed ea ad dolore hic', 'In natus atque dolore culpa officia quia aut est t', 675, 1, 0, 'architecture', '2020-06-12 08:11:35', '2020-06-12 08:11:35'),
(2, 1, 'Abid Group 02', 'Laborum Sunt quas tempore deserunt ut deserunt m', 'Aperiam ullamco explicabo Autem sint animi quos', 453, 1, 0, 'cse', '2020-06-12 08:11:50', '2020-06-12 08:11:50'),
(3, 1, 'Abid Group 03', 'Eu anim commodi porro sit sit fugiat eiusmod odit', 'Et nobis incidunt cum qui nulla cum in nemo labor', 930, 1, 0, 'eee', '2020-06-12 08:12:00', '2020-06-12 08:12:00'),
(4, 1, 'Abid Group 04', 'Nostrud ipsam fugiat eos dolore', 'Lorem sint explicabo Commodi ab aut recusandae R', 221, 1, 0, 'cse', '2020-06-12 08:12:13', '2020-06-12 08:12:13'),
(5, 2, 'Sazzad Group 01', 'Aperiam temporibus illum recusandae Adipisci id', 'Porro qui ex dolor fugiat perferendis aute dolorib', 683, 1, 0, 'design', '2020-06-12 08:14:20', '2020-06-12 08:14:20'),
(6, 2, 'Sazzad Group 02', 'Dolor ut corporis facere velit sint amet et quod', 'Et aut minus laboriosam voluptatem vel rerum volu', 669, 1, 0, 'design', '2020-06-12 08:14:31', '2020-06-12 08:14:31'),
(7, 2, 'Sazzad Group 03', 'Quia corporis perferendis cumque fugit consectetu', 'Voluptatem cum est voluptas sapiente autem ex aliq', 48, 1, 0, 'cse', '2020-06-12 08:14:45', '2020-06-12 08:14:45'),
(8, 2, 'Sazzad Group 04', 'Deserunt mollit quas voluptas explicabo Adipisci', 'Obcaecati molestias rerum unde eaque est laudantiu', 513, 1, 0, 'eee', '2020-06-12 08:15:01', '2020-06-12 08:15:01'),
(9, 3, 'Siam group 01', 'Omnis molestiae enim vel nisi ullamco ut sit ad i', 'Velit pariatur Nostrud qui elit exercitation vit', 27, 1, 0, 'eee', '2020-06-12 08:15:56', '2020-06-12 08:15:56'),
(10, 3, 'Siam group 02', 'Vel id sint ad obcaecati optio dolor excepteur al', 'Illum minim quibusdam aliqua Fuga In ut tempori', 580, 1, 0, 'design', '2020-06-12 08:16:02', '2020-06-12 08:16:02'),
(11, 3, 'Siam group 03', 'Nisi vitae eligendi voluptate velit perspiciatis', 'Dolore harum et quia dicta rem aut aperiam', 246, 1, 0, 'eee', '2020-06-12 08:16:12', '2020-06-12 08:16:12'),
(12, 3, 'Siam group 04', 'Culpa cumque est rem eos duis', 'Itaque nulla nostrum iure do anim est', 763, 1, 0, 'architecture', '2020-06-12 08:16:20', '2020-06-12 08:16:20'),
(13, 4, 'Test 01 Group 01', 'Maiores eos laborum Est ut at quibusdam nulla und', 'Hic at quo aut ea perferendis dolores velit harum', 544, 1, 0, 'architecture', '2020-06-12 08:17:53', '2020-06-12 08:17:53'),
(14, 4, 'Test 01 Group 02', 'Dolore velit qui pariatur Dolores amet ut proide', 'Ea et aut excepturi perferendis cumque temporibus', 240, 1, 0, 'eee', '2020-06-12 08:18:07', '2020-06-12 08:18:07'),
(15, 4, 'Test 01 Group 03', 'Officiis consectetur placeat quis laudantium min', 'Quisquam voluptate quasi velit natus et labore lab', 720, 1, 0, 'cse', '2020-06-12 08:18:16', '2020-06-12 08:18:16'),
(16, 4, 'Test 01 Group 04', 'Quos quisquam in quos cum corporis aliquam et ut n', 'Est reprehenderit irure minima iusto molestiae cup', 529, 1, 0, 'design', '2020-06-12 08:18:25', '2020-06-12 08:18:25'),
(17, 5, 'Test 02 Group 01', 'Et aut amet atque rem consectetur accusantium rer', 'Magni et ab voluptatum aliquid', 727, 1, 0, 'cse', '2020-06-12 08:19:25', '2020-06-12 08:19:25'),
(18, 5, 'Test 02 Group 02', 'Duis voluptatum impedit tempor error est officii', 'Assumenda ipsum optio ea id tempore quae ad lau', 106, 1, 0, 'cse', '2020-06-12 08:19:35', '2020-06-12 08:19:35'),
(19, 5, 'Test 02 Group 03', 'Sequi elit sed earum inventore accusamus fugit m', 'Cupidatat saepe nisi similique corrupti doloremqu', 45, 1, 0, 'architecture', '2020-06-12 08:19:46', '2020-06-12 08:19:46'),
(20, 5, 'Test 02 Group 04', 'Est dignissimos nobis repellendus Laboris dicta b', 'Fugiat aliquam iusto esse ullamco ad omnis iure e', 589, 1, 0, 'cse', '2020-06-12 08:20:00', '2020-06-12 08:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `progress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `group_id`, `user_id`, `action`, `task`, `submitted`, `progress`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:11:35', '2020-06-12 08:11:35'),
(2, 2, 1, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:11:50', '2020-06-12 08:11:50'),
(3, 3, 1, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:12:00', '2020-06-12 08:12:00'),
(4, 4, 1, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:12:13', '2020-06-12 08:12:13'),
(5, 5, 2, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:14:20', '2020-06-12 08:14:20'),
(6, 6, 2, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:14:31', '2020-06-12 08:14:31'),
(7, 7, 2, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:14:45', '2020-06-12 08:14:45'),
(8, 8, 2, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:15:01', '2020-06-12 08:15:01'),
(9, 9, 3, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:15:56', '2020-06-12 08:15:56'),
(10, 10, 3, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:16:02', '2020-06-12 08:16:02'),
(11, 11, 3, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:16:12', '2020-06-12 08:16:12'),
(12, 12, 3, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:16:20', '2020-06-12 08:16:20'),
(13, 13, 4, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:17:53', '2020-06-12 08:17:53'),
(14, 14, 4, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:18:07', '2020-06-12 08:18:07'),
(15, 15, 4, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:18:16', '2020-06-12 08:18:16'),
(16, 16, 4, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:18:25', '2020-06-12 08:18:25'),
(17, 17, 5, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:19:25', '2020-06-12 08:19:25'),
(18, 18, 5, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:19:35', '2020-06-12 08:19:35'),
(19, 19, 5, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:19:46', '2020-06-12 08:19:46'),
(20, 20, 5, 'Group Creation', NULL, NULL, NULL, '2020-06-12 08:20:00', '2020-06-12 08:20:00');

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
(122, '2014_10_12_000000_create_users_table', 1),
(123, '2014_10_12_100000_create_password_resets_table', 1),
(124, '2019_08_19_000000_create_failed_jobs_table', 1),
(125, '2020_05_02_143736_create_groups_table', 1),
(126, '2020_05_03_073910_create_tasks_table', 1),
(127, '2020_05_04_061344_create_logs_table', 1),
(128, '2020_05_04_081909_create_attachments_table', 1),
(129, '2020_05_05_061911_create_requests_table', 1),
(130, '2020_05_07_053720_create_task_details_table', 1),
(131, '2020_05_08_060408_create_profiles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `university` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interest` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rank` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT 100,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `avatar`, `phone`, `bio`, `university`, `department`, `interest`, `rank`, `points`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '+1 (962) 653-7394', 'Aut sit accusamus dolores veniam sint quia nobis', 'Dolores qui est incidunt vel aliquam quia explic', 'Sunt odit aliquam omnis asperiores et est exercita', 'Hic cum eu natus eveniet elit non esse fugit', NULL, 100, '2020-06-12 08:07:50', '2020-06-12 08:07:50'),
(2, 2, NULL, '+1 (462) 187-3984', 'Irure sit ratione suscipit officiis porro error e', 'Explicabo Dolor voluptatum fugiat quas dolor rer', 'Blanditiis recusandae Officia fuga Explicabo Ex', 'Non quia aut quo aspernatur deleniti aut molestiae', NULL, 100, '2020-06-12 08:08:38', '2020-06-12 08:08:38'),
(3, 3, NULL, '+1 (839) 748-5214', 'Perferendis quidem qui magni anim sed ea totam dig', 'Dolorem assumenda ad incidunt neque deserunt veni', 'Omnis ducimus deleniti rem eum sit excepturi ver', 'Culpa proident vel est expedita quibusdam nostrud', NULL, 100, '2020-06-12 08:08:56', '2020-06-12 08:08:56'),
(4, 4, NULL, '+1 (766) 762-5487', 'Vel quam vitae qui corporis Nam non maxime placeat', 'Veritatis nihil dolor temporibus exercitationem pa', 'Molestiae itaque aut numquam dolorem saepe dicta r', 'Fugiat adipisicing ut nulla cupiditate incidunt q', NULL, 100, '2020-06-12 08:09:07', '2020-06-12 08:09:07'),
(5, 5, NULL, '+1 (485) 812-2881', 'Natus aperiam esse saepe nisi repudiandae molesti', 'Nemo sed sunt eum aut magna', 'Ipsam recusandae Consequat Consequatur qui elit', 'Magnam eligendi et amet omnis distinctio Quia do', NULL, 100, '2020-06-12 08:09:18', '2020-06-12 08:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `approval` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `task` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `archived` tinyint(1) NOT NULL DEFAULT 0,
  `sub_id` int(11) DEFAULT NULL,
  `sub_name` int(11) DEFAULT NULL,
  `sub_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_details`
--

CREATE TABLE `task_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `assined_id` int(10) UNSIGNED NOT NULL,
  `assign_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Abid', 'abid@mailinator.net', NULL, '$2y$10$Vy3D4FTsGGIeR6snB9Mvqu2c5U.tj.BCDd/7a0XEQMqgj1A0MQQIS', NULL, '2020-06-12 08:07:50', '2020-06-12 08:07:50'),
(2, 'Sazzad', 'sazzad@mailinator.com', NULL, '$2y$10$Yg2jRTOlF9RlQ9ACf/uReuz2gmjjEU0OjCjDp1xHvEGOOHT31v0/q', NULL, '2020-06-12 08:08:38', '2020-06-12 08:08:38'),
(3, 'Siam', 'haconicu@mailinator.net', NULL, '$2y$10$VaUYxk/ZtG6qExfyjcIuKOUVcqwAoOCwxQy1/KIgPPmapqPFlAakO', NULL, '2020-06-12 08:08:56', '2020-06-12 08:08:56'),
(4, 'Test 01', 'batox@mailinator.com', NULL, '$2y$10$w2Dc0lbecgMyAtzed.baM.uvVUbivUqu3KHG329WhC0H8OstEBoAS', NULL, '2020-06-12 08:09:07', '2020-06-12 08:09:07'),
(5, 'Test 02', 'cuxewoxahu@mailinator.com', NULL, '$2y$10$C2ycOdtNTM6AUr0LQka0Y.UICoHXMVcXUuF1UAjqhdARZWkyZhDqO', NULL, '2020-06-12 08:09:18', '2020-06-12 08:09:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attachments_attachment_unique` (`attachment`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_code_unique` (`code`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profiles_user_id_unique` (`user_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_details`
--
ALTER TABLE `task_details`
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
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_details`
--
ALTER TABLE `task_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
