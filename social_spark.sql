-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2019 at 12:00 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_spark`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(555) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ext` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `project_id`, `parent_id`, `comment`, `file`, `ext`, `created_at`, `updated_at`) VALUES
(1, 14, 15, NULL, 'sdfsd', 'default', '', '2019-05-28 17:49:31', '2019-05-28 17:49:31'),
(2, 14, 14, NULL, 'sadsa', 'default', '', '2019-05-28 18:11:10', '2019-05-28 18:11:10'),
(3, 14, 14, NULL, 'https://www.facebook.com/', 'default', '', '2019-05-28 19:04:29', '2019-05-28 19:04:29'),
(4, 14, 14, NULL, 'Here is my face book . https://www.facebook.com/\r\nIt\'s fine for now.', 'default', '', '2019-05-28 19:15:00', '2019-05-28 19:15:00'),
(6, 14, 14, NULL, 'sss', 'default', '', '2019-05-28 19:22:42', '2019-05-28 19:22:42'),
(8, 14, 14, NULL, 'Here is my face book . https://www.facebook.com/ It\'s fine for now. https://www.facebook.com/', 'default', '', '2019-05-28 19:33:34', '2019-05-28 19:33:34'),
(9, 14, 14, NULL, 'https://www.youtube.com/watch?v=wuLIUtrSE-g', 'default', '', '2019-05-28 19:34:23', '2019-05-28 19:34:23'),
(10, 2, 14, NULL, 'dfsdfsdf', 'default', '', '2019-05-28 19:35:51', '2019-05-28 19:35:51'),
(11, 2, 14, NULL, 'Here is my face book . https://www.facebook.com/ It\'s fine for now. https://www.facebook.com/Here is my face book . https://www.facebook.com/ It\'s fine for now. https://www.facebook.com/Here is my face book . https://www.facebook.com/ It\'s fine for now. https://www.facebook.com/', 'default', '', '2019-05-28 21:06:37', '2019-05-28 21:06:37'),
(12, 2, 14, NULL, 'https://www.facebook.com/\r\nhttps://www.slamgator.com/', 'default', '', '2019-05-29 00:03:41', '2019-05-29 00:03:41'),
(13, 2, 14, NULL, 'Here is my face book . https://www.facebook.com/ It\'s fine for now. \r\nhttps://slamgator.com', 'default', '', '2019-05-29 00:06:20', '2019-05-29 00:06:20'),
(14, 1, 12, NULL, 'df', 'default', '', '2019-05-29 23:55:11', '2019-05-29 23:55:11'),
(15, 1, 12, NULL, 'sdfsd', '1559202977.jpg', 'jpg', '2019-05-29 23:56:17', '2019-05-29 23:56:17'),
(16, 1, 12, NULL, 'dfgdf', 'default', '', '2019-05-29 23:57:17', '2019-05-29 23:57:17'),
(17, 1, 12, NULL, 'ssssss', 'default', '', '2019-05-29 23:57:57', '2019-05-29 23:57:57'),
(18, 1, 12, NULL, 'zzz', '1559203255.mp4', 'mp4', '2019-05-30 00:00:55', '2019-05-30 00:00:55'),
(19, 15, 17, NULL, 'dgdfgdf', 'default', 'no', '2019-06-04 06:38:41', '2019-06-04 06:38:41'),
(20, 15, 17, NULL, 'adasda', '1559659183.png', 'png', '2019-06-04 06:39:43', '2019-06-04 06:39:43'),
(21, 15, 17, NULL, 'ggdsfsd', '1559659272.png', 'png', '2019-06-04 06:41:12', '2019-06-04 06:41:12'),
(22, 15, 17, NULL, 'sfsdfsd', '1559659279.jpg', 'jpg', '2019-06-04 06:41:19', '2019-06-04 06:41:19'),
(23, 15, 17, NULL, 'fdgdfgdf', '1559659370.mp4', 'mp4', '2019-06-04 06:42:51', '2019-06-04 06:42:51'),
(24, 15, 16, NULL, 'sfsdfsd', 'default', 'no', '2019-06-04 06:50:49', '2019-06-04 06:50:49'),
(25, 15, 16, NULL, 'gggggggg', '1559659867.mp4', 'mp4', '2019-06-04 06:51:07', '2019-06-04 06:51:07'),
(26, 6, 17, NULL, 'http://facebook.com', 'default', 'no', '2019-06-04 06:52:56', '2019-06-04 06:52:56'),
(27, 16, 18, NULL, 'test', '1559660243.jpg', 'jpg', '2019-06-04 06:57:23', '2019-06-04 06:57:23'),
(28, 16, 18, NULL, 'test', '1559660253.mp4', 'mp4', '2019-06-04 06:57:33', '2019-06-04 06:57:33'),
(29, 15, 18, NULL, 'testse', '1559660335.jpg', 'jpg', '2019-06-04 06:58:55', '2019-06-04 06:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `field`, `created_at`, `updated_at`) VALUES
(1, 'Computing ', NULL, NULL),
(2, 'Technology ', NULL, NULL),
(3, 'Services ', NULL, NULL),
(4, 'Medicine', NULL, NULL),
(5, 'architecture', NULL, NULL),
(6, 'ecology', NULL, NULL),
(7, 'engeneering', NULL, NULL),
(8, 'finance', NULL, NULL),
(9, 'ecommerce', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `followable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `followable_id` bigint(20) UNSIGNED NOT NULL,
  `accepted` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  `user_del` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`id`, `user_id`, `followable_type`, `followable_id`, `accepted`, `status`, `user_del`, `created_at`, `updated_at`) VALUES
(10, 7, 'App\\Project', 12, 1, 1, 0, '2019-05-27 11:37:12', '2019-05-29 21:43:44'),
(11, 9, 'App\\Project', 12, 0, 1, 0, '2019-05-27 11:56:02', '2019-05-29 21:33:00'),
(13, 7, 'App\\Project', 13, 0, 1, 0, '2019-05-27 17:49:43', '2019-06-09 14:14:56'),
(14, 13, 'App\\Project', 13, 1, 1, 1, '2019-05-27 19:25:12', '2019-06-09 14:14:56'),
(15, 1, 'App\\Project', 14, 1, 1, 0, '2019-05-28 10:20:39', '2019-06-09 14:14:56'),
(16, 4, 'App\\Project', 14, 1, 1, 0, '2019-05-28 10:33:09', '2019-05-29 21:43:57'),
(17, 7, 'App\\Project', 14, 1, 1, 0, '2019-05-29 00:43:29', '2019-05-29 21:43:57'),
(18, 7, 'App\\Project', 15, 1, 1, 0, '2019-05-29 21:33:50', '2019-05-29 21:43:44'),
(19, 6, 'App\\Project', 17, 1, 1, 0, '2019-06-04 06:47:11', '2019-06-09 13:57:57'),
(20, 15, 'App\\Project', 12, 1, 1, 0, '2019-06-04 06:50:03', '2019-06-09 13:57:58'),
(21, 15, 'App\\Project', 15, 1, 1, 0, '2019-06-04 06:51:35', '2019-06-09 13:57:58'),
(22, 15, 'App\\Project', 18, 1, 1, 0, '2019-06-04 06:58:10', '2019-06-09 13:57:58'),
(23, 1, 'App\\Project', 16, 1, 1, 0, '2019-06-08 10:14:05', '2019-06-09 14:14:56'),
(24, 1, 'App\\Project', 18, 1, 1, 0, '2019-06-08 10:40:56', '2019-06-09 14:14:56'),
(25, 11, 'App\\Project', 16, 0, 1, 0, '2019-06-08 15:08:01', '2019-06-09 13:57:58'),
(30, 15, 'App\\Project', 13, 1, 0, 0, '2019-06-09 14:35:48', '2019-06-09 15:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `project_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 12, 2, '1', '2019-05-21 05:46:01', '2019-05-21 05:46:01'),
(5, 12, 4, '1', '2019-05-21 05:46:01', '2019-05-21 05:46:01'),
(6, 12, 5, '1', '2019-05-21 05:46:01', '2019-05-21 05:46:01'),
(7, 13, 2, '1', '2019-05-27 17:23:18', '2019-05-27 17:23:18'),
(8, 13, 9, '1', '2019-05-27 17:23:18', '2019-05-27 17:23:18'),
(9, 13, 11, '1', '2019-05-27 17:23:18', '2019-05-27 17:23:18'),
(10, 14, 2, '1', '2019-05-27 17:26:46', '2019-05-27 17:26:46'),
(11, 15, 2, '1', '2019-05-27 17:27:29', '2019-05-27 17:27:29'),
(12, 16, 2, '1', '2019-05-27 17:27:56', '2019-05-27 17:27:56'),
(13, 17, 2, '1', '2019-05-27 17:28:56', '2019-05-27 17:28:56'),
(14, 18, 2, '1', '2019-05-27 17:29:55', '2019-05-27 17:29:55'),
(15, 14, 9, '1', '2019-05-28 10:01:32', '2019-05-28 10:01:32'),
(16, 14, 14, '1', '2019-05-28 10:01:32', '2019-05-28 10:01:32'),
(17, 15, 3, '1', '2019-05-28 17:24:42', '2019-05-28 17:24:42'),
(18, 15, 4, '1', '2019-05-28 17:24:42', '2019-05-28 17:24:42'),
(19, 15, 6, '1', '2019-05-28 17:24:42', '2019-05-28 17:24:42'),
(20, 16, 5, '1', '2019-06-04 06:25:40', '2019-06-04 06:25:40'),
(21, 16, 12, '1', '2019-06-04 06:25:40', '2019-06-04 06:25:40'),
(22, 17, 1, '1', '2019-06-04 06:26:35', '2019-06-04 06:26:35'),
(23, 17, 11, '1', '2019-06-04 06:26:35', '2019-06-04 06:26:35'),
(24, 18, 2, '1', '2019-06-04 06:56:02', '2019-06-04 06:56:02'),
(25, 18, 5, '1', '2019-06-04 06:56:03', '2019-06-04 06:56:03');

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
(3, '2019_05_17_084818_create_projects_table', 1),
(4, '2019_05_17_121901_create_fields_table', 1),
(5, '2019_05_21_132728_create_members_table', 2),
(6, '2019_05_22_072618_create_remarks_table', 3),
(7, '2019_05_22_074028_remark_ct', 4),
(10, '2019_05_27_163017_create_follows_table', 5),
(12, '2019_05_29_013126_create_comments_table', 6),
(13, '2019_05_29_073552_create_recommends_table', 7),
(14, '2019_05_29_104218_create_profiles_table', 8),
(15, '2019_06_09_094942_create_notifications_table', 9),
(16, '2019_06_09_134250_create_notify_types_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `table_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `to_del` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `from_id`, `to_id`, `table_type`, `table_id`, `project_id`, `status`, `to_del`, `created_at`, `updated_at`) VALUES
(4, 1, 3, 'Recommend', 9, 13, 0, 0, '2019-06-09 14:34:29', '2019-06-09 14:34:29'),
(5, 15, 1, 'Follow', 30, 13, 1, 0, '2019-06-09 14:35:48', '2019-06-09 14:37:48'),
(6, 1, 15, 'Recommend', 10, 13, 1, 1, '2019-06-09 15:11:19', '2019-06-09 15:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `notify_types`
--

CREATE TABLE `notify_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `tableName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notify_types`
--

INSERT INTO `notify_types` (`id`, `tableName`, `created_at`, `updated_at`) VALUES
(1, 'Recommend', '2019-06-08 16:00:00', '2019-06-08 16:00:00');

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
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `study` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `age`, `city`, `study`, `interest`, `created_at`, `updated_at`) VALUES
(1, 1, 32, 'vvvvvvvv', 'vvvvvvv', 'vvvvvvvvvv', '2019-05-29 09:32:31', '2019-06-08 11:51:00'),
(2, 2, 12, 'fff', 'ggg', 'ggg', '2019-05-29 21:48:46', '2019-05-29 21:48:46'),
(3, 15, 43, 'ddd', 'dddd', 'dddd', '2019-06-04 06:52:08', '2019-06-04 06:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `search_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acceptance` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `image`, `description`, `field`, `member`, `search_key`, `acceptance`, `user_id`, `created_at`, `updated_at`) VALUES
(12, 'First project', '1558437802.jpg', 'is a window to nature, through ornamental terrarium you will feel', '2,3', '2,4,5', 'first,project,paypal', 1, 1, '2019-05-21 05:46:01', '2019-05-21 05:46:01'),
(13, 'second project', '1559006598.jpg', 'is a window to nature, through ornamental terrarium you will feel', '1,7,8', '2,9,11', 'cloud,second,project', 0, 1, '2019-05-27 17:23:18', '2019-05-27 17:23:18'),
(14, 'test project', '1559066492.jpg', 'is a window to nature, through ornamental terrarium you will feel', '1,6', '9,14', 'test,project', 0, 2, '2019-05-28 10:01:32', '2019-05-28 10:01:32'),
(15, 'test10 project', 'default.png', 'is a window to nature, through ornamental terrarium you will feel', '2,4', '3,4,6', 'test,project', 1, 14, '2019-05-28 17:24:42', '2019-05-28 17:24:42'),
(16, 'test12 project', 'default.png', 'is a window to nature, through ornamental terrarium you will feel', '2,4', '5,12', 'test,project', 0, 15, '2019-06-04 06:25:40', '2019-06-04 06:25:40'),
(17, 'test teat', '1559658395.jpg', 'is a window to nature, through ornamental terrarium you will feel', '3,6', '1,11', 'test,project', 0, 15, '2019-06-04 06:26:35', '2019-06-04 06:26:35'),
(18, 'This is a test project. Hotel', 'default.png', 'is a window to nature, through ornamental terrarium you will feel', '2,3', '2,5', 'hoetl,hotel,project', 1, 16, '2019-06-04 06:56:02', '2019-06-04 06:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `recommends`
--

CREATE TABLE `recommends` (
  `id` int(10) UNSIGNED NOT NULL,
  `remark_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommend_user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recommends`
--

INSERT INTO `recommends` (`id`, `remark_id`, `user_id`, `body`, `recommend_user_id`, `created_at`, `updated_at`) VALUES
(1, 20, 7, 'aaaa', 0, '2019-05-28 23:49:05', '2019-05-28 23:49:05'),
(2, 20, 7, 'I am a laravel expert have 6 years experience.\r\nhere is my websites https://facebook.com\r\nhttps://slamgator.com', 0, '2019-05-29 00:02:04', '2019-05-29 00:02:04'),
(3, 12, 1, 'I am a laravel expert.', 0, '2019-05-29 12:51:18', '2019-05-29 12:51:18'),
(4, 23, 15, 'res', 0, '2019-06-04 06:36:51', '2019-06-04 06:36:51'),
(5, 25, 6, 'yrttreter', 0, '2019-06-04 06:48:47', '2019-06-04 06:48:47'),
(6, 26, 15, 'test', 0, '2019-06-04 06:58:37', '2019-06-04 06:58:37'),
(7, 26, 15, 'yretret', 0, '2019-06-04 06:58:42', '2019-06-04 06:58:42'),
(8, 26, 1, 'dddd', 6, '2019-06-09 07:18:34', '2019-06-09 07:18:34'),
(9, 30, 1, 'recommend', 3, '2019-06-09 14:34:29', '2019-06-09 14:34:29'),
(10, 30, 1, 'golor to appear that Im select this tooth to add treatment to it', 15, '2019-06-09 15:11:19', '2019-06-09 15:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark_ct_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`id`, `comment`, `remark_ct_id`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(12, 'laravel coder', 1, 12, 1, '2019-05-22 00:55:44', '2019-05-22 07:38:29'),
(13, 'remark1', 2, 12, 1, '2019-05-22 06:51:12', '2019-05-22 07:39:00'),
(14, 'milestones test', 3, 12, 1, '2019-05-22 06:51:26', '2019-05-22 07:56:12'),
(15, 'requirements test', 1, 12, 1, '2019-05-22 06:55:40', '2019-05-22 07:38:49'),
(17, 'recommendation', 4, 12, 1, '2019-05-22 06:58:29', '2019-05-22 07:42:37'),
(19, 'remark test 4', 2, 12, 1, '2019-05-22 07:39:13', '2019-05-22 07:39:13'),
(20, 'test laravel coding', 1, 14, 2, '2019-05-28 12:00:40', '2019-05-28 12:00:40'),
(21, 'second', 1, 14, 2, '2019-05-28 23:47:53', '2019-05-28 23:47:53'),
(22, 'ddd', 1, 14, 2, '2019-05-28 23:48:04', '2019-05-28 23:48:04'),
(24, 'sdfsdfsd bbbb', 2, 17, 15, '2019-06-04 06:38:09', '2019-06-04 06:38:16'),
(25, 'vcvbcv', 1, 17, 15, '2019-06-04 06:38:32', '2019-06-04 06:38:32'),
(26, 'I am a laravel expert.', 1, 18, 16, '2019-06-04 06:56:35', '2019-06-04 06:56:35'),
(27, 'That is remark', 2, 18, 16, '2019-06-04 06:56:48', '2019-06-04 06:56:48'),
(28, 'Milestones', 3, 18, 16, '2019-06-04 06:57:01', '2019-06-04 06:57:01'),
(29, 'recommendation', 4, 18, 16, '2019-06-04 06:57:12', '2019-06-04 06:57:12'),
(30, 'Laravel expert', 1, 13, 1, '2019-06-08 15:09:00', '2019-06-08 15:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `remark_ct`
--

CREATE TABLE `remark_ct` (
  `id` int(10) UNSIGNED NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `remark_ct`
--

INSERT INTO `remark_ct` (`id`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'Requirements', '2019-05-21 16:00:00', '2019-05-21 16:00:00'),
(2, 'Remarks', '2019-05-21 16:00:00', '2019-05-21 16:00:00'),
(3, 'Milestones and achievements\r\n', '2019-05-21 16:00:00', '2019-05-21 16:00:00'),
(4, 'Write a recommendation\r\n', '2019-05-21 16:00:00', '2019-05-21 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'alex', 'james.wmsoft@outlook.com', '$2y$10$M4r037WgM1/BcxABz3j/luQ/JhrA3thJcu4emgU3u26MXbzc2OasO', '1560023460.jpg', 'dN2I2zjCxskrZiugjnFSERR2ox2ejMwQqAtrsJCXLmsiqTZoMwpAwwuK0jwX', '2019-05-17 05:35:49', '2019-06-08 11:51:00'),
(2, 'test', 'test@test.com', '$2y$10$a7Tlt50jTrLe5B3wqzgKJ.ktY21Ivw/OTdLWivYnFUjQJl1JpLZke', '1559195326.jpg', 'BcbiGTYtgxoGFN09xSJXAREm68weRG4zaXoyypuM2bULkpJNyYtxkizByTDv', '2019-05-17 06:14:19', '2019-05-29 21:48:46'),
(3, 'gordon', 'gordon@test.com', '$2y$10$igQ96.X/8.QyB7vlnZghtOQr3hrgiW8hVODd0DZ0NYwY/gJ2XJKg.', 'male.png', 'qhJuF8ka7QLwq7ytmrj1tPKH5jdP6nJlkvAvf9OpeOJ6rqWrWvj7pmY2jrT7', '2019-05-17 06:14:55', '2019-05-17 06:14:55'),
(4, 'test1', 'test1@test.com', '$2y$10$R4DYlVRIkT/F4Ymg75LRYOkZw0UX5pQYRmcuNn3G4Agrgh7htmNM6', 'male.png', 'u7HMpzFPdRWsQ5pMe8dUuErKAJGYHViydr7MlxUajRQph678czjcrhDSlzzx', '2019-05-17 06:15:31', '2019-05-17 06:15:31'),
(5, 'test2', 'test2@test.com', '$2y$10$IGtNAY06FFsxhcIfMvxo6uEQrUm34//.7DwKaKRAgNFf2mB6i05ee', 'male.png', 'aZZbzKX0orF7ebZ7hGVwULoHjWNBq7QUWJuxSl6uOy0vkBpTrZ6tlm3SN1r9', '2019-05-17 06:15:49', '2019-05-17 06:15:49'),
(6, 'test3', 'test3@test.com', '$2y$10$6A3cD/0hv1s8A.wxcg3dwe8rlLfDzJlbTeP8pHIIckJDIzTcmzlca', 'male.png', 'LYi29ZWQB005xmsPfE9bWSrlXBB8hXSlEDv9DwmGLJ5lwf7xQFTGefCOLICi', '2019-05-17 06:16:08', '2019-05-17 06:16:08'),
(7, 'test6', 'test6@test.com', '$2y$10$k7dSKzkYv1dKXtCH0i6jHuEhpWwcWu8P11QYjKQ5LpiQF.OXiBaui', 'male.png', 'FkOPuqbyO0fDVvA0A7FDbVeQXS9eVCZqt75ddSngyjVc6yrjaNd0dP3rh0gS', '2019-05-20 22:42:05', '2019-05-20 22:42:05'),
(8, 'test4', 'test4@test.com', '$2y$10$7ywU1UadmaHrB9/kv41mveljJ/fuAAC4BaHsexgizlaxooEu1lJB2', 'male.png', 'BMX61ctENVDnIYTRu1KPVFKTP2Hmgs64t0k9JXHXVvsyzLCIFeuJaTJh70BO', '2019-05-27 11:53:31', '2019-05-27 11:53:31'),
(9, 'test5', 'test5@test.com', '$2y$10$548J2/XO3Of7hzhj1TOjZuy09tajSP4tCf7XrcnKiSklqBisDtKFq', 'male.png', 'baY2HeLcVXKYhjQK09JeS6CrPrf3eebh9hFEYzv5g2NVM5TfB7aWdPLcLqKI', '2019-05-27 11:53:54', '2019-05-27 11:53:54'),
(11, 'test7', 'test7@test.com', '$2y$10$548J2/XO3Of7hzhj1TOjZuy09tajSP4tCf7XrcnKiSklqBisDtKFq', 'male.png', 'c0tHXr5ZCO47nzXOeoLJ0QCAesm4PUaShI5Knw7vbzNgvGPpOcp6Np5ZdGgX', '2019-05-27 11:53:54', '2019-05-27 11:53:54'),
(12, 'test8', 'test8@test.com', '$2y$10$548J2/XO3Of7hzhj1TOjZuy09tajSP4tCf7XrcnKiSklqBisDtKFq', 'male.png', 'HSRCIg4se4wbzT5qPU7PnytsuqJlxkZB6847vznSkvwnqYsSPK4tF9ZGQSt9', '2019-05-27 11:53:54', '2019-05-27 11:53:54'),
(13, 'test9', 'test9@test.com', '$2y$10$548J2/XO3Of7hzhj1TOjZuy09tajSP4tCf7XrcnKiSklqBisDtKFq', 'male.png', 'X7922OhHRirIN0Zdxy7LfRYzomLoB9H1ohS1FynQEuCQawPIs3Y8w1WbRioJ', '2019-05-27 11:53:54', '2019-05-27 11:53:54'),
(14, 'test10', 'test10@test.com', '$2y$10$548J2/XO3Of7hzhj1TOjZuy09tajSP4tCf7XrcnKiSklqBisDtKFq', 'male.png', 'rxIq6FLjADsDc9vCxpV9iGbGvGM6McH6R8XhHLhmGeKXSziQSa822hz6Bzyk', '2019-05-27 11:53:54', '2019-05-27 11:53:54'),
(15, 'test12', 'test12@test.com', '$2y$10$bWW0nxvthXxlReQYN9XPau91bPKk525Mb1dU36y1CbLPSBNAQ88Zy', '1559659928.jpg', 'u4ZmT1k8SIubvGeEV35mLNOtYFMtccBnZNKPScVGgJWAgKwAYxldOLJjosAv', '2019-06-04 06:24:26', '2019-06-04 06:52:08'),
(16, 'test34', 'test34@test.com', '$2y$10$.oQ6JO7R4kj8sBwRszvDNu9KkHqapmop3ExTIbAYgwfhfUXyuy0e.', 'male.png', NULL, '2019-06-04 06:54:09', '2019-06-04 06:54:09'),
(17, 'dr/nasr', 'testdr@test.com', '$2y$10$fbt7vB52A1o4FCHe7D8yY.QAvjXKvr.f6wKIf09OllWwVMr7u9Yb6', 'male.png', NULL, '2019-06-04 18:06:56', '2019-06-04 18:06:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follows_followable_type_followable_id_index` (`followable_type`,`followable_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify_types`
--
ALTER TABLE `notify_types`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `recommends`
--
ALTER TABLE `recommends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remark_ct`
--
ALTER TABLE `remark_ct`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notify_types`
--
ALTER TABLE `notify_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `recommends`
--
ALTER TABLE `recommends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `remark_ct`
--
ALTER TABLE `remark_ct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
