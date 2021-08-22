-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2021 at 12:44 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evoush_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_data_test`
--

CREATE TABLE `api_data_test` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_data_test`
--

INSERT INTO `api_data_test` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Title Testing Data', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2021-07-02 22:12:40', '2021-07-02 22:12:40'),
(2, 'jangan hanya mengandalkan lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2021-07-03 00:36:47', '2021-07-03 00:36:47'),
(3, 'jangan hanya mengandalkan lorem ipsum bagian dua', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2021-07-03 00:40:40', '2021-07-03 00:40:40'),
(4, 'jangan hanya mengandalkan lorem ipsum bagian ketiga', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2021-07-03 00:49:24', '2021-07-03 00:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headline` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('PUBLISH','DRAFT') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `author`, `category_id`, `title`, `slug`, `headline`, `cover`, `content`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'evoush author', 3, 'mamam lorem yuk kaka', 'mamam-lorem-yuk-kaka', 'ini judulnya makan mamam', 'article-covers/ORCnz5Uysus3IKIHLG5gy3kAogc1xDeQxUmn16FS.jpg', '<p>mamam yuk kaaka dengan apa ajah lah</p>', 'DRAFT', '2021-06-29 00:03:47', '2021-06-29 00:03:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'berisi nama file image saja\n            tanpa path',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Kosmetik', 'kosmetik', 'category_images/0GgRPEv6u6WKuQ57IU39eMfL7XgW2MkJzyDqzV58.jpg', 1, NULL, NULL, NULL, '2021-05-28 07:42:01', '2021-05-28 07:42:01'),
(2, 'Nutrisi', 'nutrisi', 'category_images/YdyNQBrE5SNf4EeljtE04C28gvEGL1Ty6VYQBRvE.jpg', 1, NULL, NULL, NULL, '2021-05-28 07:43:34', '2021-05-28 07:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `category_articles`
--

CREATE TABLE `category_articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_articles`
--

INSERT INTO `category_articles` (`id`, `category_name`, `caption`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Bisnis Evoush', 'Category yang menyajikan informasi seputar berbisnis di evoush', NULL, '2021-06-28 09:51:40', '2021-06-28 23:54:22'),
(2, 'News', 'Category yang menyajikan informasi terupdate seputar evoush dan event event yang akan diselenggarakan evoush', NULL, '2021-06-28 09:52:30', '2021-06-28 09:52:30'),
(3, 'Umum', 'Category dengan tujuan untuk menyajikan informasi bebas, baik berupa kegiatan kantor dan juga para member, yang di khususkan bagi kalangan evousher', NULL, '2021-06-28 09:53:39', '2021-06-28 09:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `category_message`
--

CREATE TABLE `category_message` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_message`
--

INSERT INTO `category_message` (`id`, `category_name`, `caption`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Pingpong', '', NULL, '2021-06-02 01:43:13', '2021-06-02 01:43:13'),
(2, 'Zumba', '', NULL, '2021-06-02 01:44:37', '2021-06-02 08:20:15'),
(3, 'Tiktok', '', NULL, '2021-06-02 08:23:32', '2021-06-02 08:23:32'),
(4, 'Makeup', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(13, 1, 2, NULL, NULL),
(14, 2, 2, NULL, NULL),
(15, 3, 2, NULL, NULL),
(16, 4, 1, NULL, NULL),
(17, 5, 1, NULL, NULL),
(18, 6, 1, NULL, NULL),
(20, 8, 1, NULL, NULL),
(21, 9, 1, NULL, NULL),
(22, 10, 1, NULL, NULL),
(23, 11, 1, NULL, NULL),
(24, 12, 1, NULL, NULL),
(25, 13, 1, NULL, NULL),
(26, 14, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_message`
--

CREATE TABLE `contact_message` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_message`
--

INSERT INTO `contact_message` (`id`, `name`, `email`, `phone`, `category_id`, `message`, `province`, `city`, `ip_address`, `deleted_at`, `created_at`, `updated_at`, `username`) VALUES
(1, 'Joni Kemod', NULL, '6288222668778', 2, NULL, 'Jawa Timur', 'Kabupaten Sidoarjo', NULL, NULL, '2021-08-16 15:24:22', '2021-08-16 15:24:22', 'joni_roten');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quotes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `quotes`, `cover`, `file`, `content`, `created_at`, `updated_at`, `link`) VALUES
(1, 'Evoush Opportunity Seminar (EOS)', 'Evoush Beauty And Wellness Jember', 'events/pIQteyzbFGdrlr5SIffvdwpvU5pBF3iNuBX3eV79.jpg', '', '<p><strong>Business Seminar</strong> Recognition <strong>DOORPRIZE</strong>.</p>\r\n<p style=\"line-height: 2;\">Bukan hanya seminar biasa yang kali ini evoush adakan di Kota Jember akan ada banyak informasi dan ilmu yang akan anda dapatkan dalam seminar EOS kali ini, ayo kita tajamkan semangat kita dalam membangun bisnis jaringan di Evoush. Dengan berlangsungnya perhelatan event Eos Jember kali ini diharapkan, kita bisa saling kuta satu sama lain, antara sesama team, motivasi semakin bergelora untuk maju bersama-sama meraih setiap mimpi untuk sukses dalam dunia bisnis jaringan di evoush.</p>\r\n<p style=\"line-height: 2;\">&nbsp;</p>\r\n<p style=\"line-height: 2;\"><strong> Your Eternal Future&nbsp;</strong></p>', '2021-06-27 07:54:05', '2021-07-07 09:40:23', 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/videos/event/event1.mp4');

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
-- Table structure for table `joining`
--

CREATE TABLE `joining` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sponsor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_23_100635_penyesuaian_table_users', 1),
(5, '2021_05_27_111435_create_table_categories', 1),
(6, '2021_05_27_145006_create_products_table', 1),
(7, '2021_05_27_163815_create_category_product_table', 1),
(8, '2021_05_31_024609_create_orders_table', 1),
(9, '2021_05_31_082527_create_order_product_table', 1),
(10, '2021_05_31_213009_create_profile_table', 1),
(11, '2021_06_02_052440_create_category_message_table', 1),
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2021_05_23_100635_penyesuaian_table_users', 1),
(19, '2021_05_27_111435_create_table_categories', 1),
(20, '2021_05_27_145006_create_products_table', 1),
(21, '2021_05_27_163815_create_category_product_table', 1),
(22, '2021_05_31_024609_create_orders_table', 2),
(23, '2021_05_31_035451_create_product_order_table', 3),
(24, '2021_05_31_082527_create_order_product_table', 4),
(25, '2021_06_02_015057_create_contact_table', 5),
(28, '2021_06_02_052440_create_category_message_table', 6),
(32, '2021_06_02_052715_create_contact_message_table', 7),
(34, '2021_05_31_235104_create_profile_table', 8),
(35, '2021_06_12_135647_create_event_table', 9),
(36, '2021_06_13_102653_add_new_field_profile_table', 10),
(37, '2021_06_13_131001_add_new_field_again_profile_table', 11),
(38, '2021_06_19_163336_create_member_table', 12),
(39, '2021_06_19_163530_create_join_table', 12),
(40, '2021_06_20_135837_penambahan_field_member_table', 13),
(41, '2008_12_31_190808_create_member_table', 14),
(42, '2008_12_31_191018_create_join_table', 14),
(43, '2021_06_22_164812_create_member_table', 15),
(44, '2021_06_22_165029_create_joining_table', 15),
(45, '2021_06_22_165635_create_member_table', 16),
(46, '2021_06_22_165714_create_joining_table', 16),
(47, '2021_06_25_175425_create_member_table', 17),
(48, '2021_06_25_175532_create_joining_table', 17),
(49, '2021_06_28_083605_create_articles_table', 18),
(50, '2021_06_28_083713_create_category_articles_table', 18),
(51, '2021_06_28_155630_penambahan_field_table_articles', 19),
(52, '2021_06_28_164849_category_article', 20),
(55, '2021_06_28_173925_articles_table', 21),
(56, '2021_07_03_044511_create_api_data_test_table', 22),
(57, '2021_07_07_162141_penambahan_field_table_event', 23),
(58, '2016_06_01_000001_create_oauth_auth_codes_table', 24),
(59, '2016_06_01_000002_create_oauth_access_tokens_table', 24),
(60, '2016_06_01_000003_create_oauth_refresh_tokens_table', 24),
(61, '2016_06_01_000004_create_oauth_clients_table', 24),
(62, '2016_06_01_000005_create_oauth_personal_access_clients_table', 24),
(63, '2021_07_27_082942_penambahan_field_table_product', 25),
(64, '2021_08_09_065929_tambah_field_pencapaian_user', 26),
(65, '2021_08_16_222128_penambahan_field_contact_message', 27);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('1c2affad29eee5854f2a4e486bed7b6ef53090432fd494ab781218f4f07a08fa25b15a0599c0e518', 19, 7, 'authToken', '[]', 0, '2021-08-05 22:31:22', '2021-08-05 22:31:22', '2022-08-06 05:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(7, NULL, 'Evoush:App Personal Access Client', 'rTdJ087rvsQB1fhMHe6QrNhqfUSk9qjC48SdSbdc', NULL, 'http://localhost', 1, 0, 0, '2021-07-31 00:01:03', '2021-07-31 00:01:03'),
(8, NULL, 'Evoush:App Password Grant Client', 'LJCWZbFm5j62CUp6u1BNYFzIeqdki1847bqnUpY1', 'users', 'http://localhost', 0, 1, 0, '2021-07-31 00:01:03', '2021-07-31 00:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(4, 7, '2021-07-31 00:01:03', '2021-07-31 00:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` double(8,2) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('SUBMIT','PROCESS','FINISH','CANCEL') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mini_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `stock` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` enum('PUBLISH','DRAFT') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `slider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `description`, `mini_description`, `cover`, `price`, `views`, `stock`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`, `slider`) VALUES
(1, 'Kileon', 'kileon', '<p>KILEON merupakan minuman serbuk dengan rasa buah mangga dan nanas yang segar, mengandung collagen tinggi dan L Glutathione yang baik untuk kesehatan dan kecantikan kulit anda.</p>\r\n<p>Kandungan Collagen pada KILEON bermanfaat untuk membantu memelihara kesehatan kulit, meningkatkan masa otot, memperlambat penuaan dini mengurangi keriput serta meningkatkan elastisitas kulit, mencegah kerusakan tulang rawan sendi, menguatkan tulang dan gigi, serta mengatasi kerontokan rambut.</p>\r\n<p>Kandungan L Glutathione pada KILEON bermanfaat untuk mencerahkan kulit tubuh, menyamarkan bekas jerawat, mengatasi kulit kusam, memudarkan flek, mengencangkan kulit, menghaluskan kulit, melindungi kulit dari efek buruk sinar uv, menangkal radikal bebas, meningkatkan efektifitas insulin serta mencegah kerusakan sel hati.</p>\r\n<p><strong>Cara Pakai :&nbsp;</strong></p>\r\n<ul>\r\n<li>Seduh 1 sachet KILEON kedalam segelas air (150ml) dengan suhu ruangan</li>\r\n<li>Aduk sampai merata dan langsung di minum</li>\r\n</ul>', 'Minuman serbuk yang mengandung FISH COLLAGEN yang membantu mengencangkan kulit wajah, menyuburkan rambut', 'product-covers/2gRgH5XOsELfzkYBWtL7NJaClsr8zamaHWbO1nE5.jpg', 1.00, 0, 100, 'PUBLISH', 1, 1, NULL, '2021-06-12 03:08:44', '2021-07-27 02:50:11', NULL, '[\"3. Kileonmanggananas.jpg\",\"7. Kileonmanggananas.jpg\",\"Kileon 05-09-2020 1.jpg\",\"kileon 05-09-2020.jpg\"]'),
(2, 'Eikana', 'eikana', '<p>Eikana merupakan minuman serbuk dengan rasa buah yang segar, kandungan sayur dan buahnya kaya akan serat, vitamin dan mineral sebagai sumber antioksidan yang tinggi, baik untuk kesehatan anda.</p>\r\n<p>Kandungan Corn Fiber, Psyllium Husk, dan Mangosteen, pada EIKANA bermanfaat membantu melancarkan buang air besar / mengatasi semebelit, membersihkan usus dari lemak jahat, menjaga kesehatan saluran pencernaan, membantu menurunkan berat badan, mengenyangkan ( tidak mudah lapar ), membuang racun dalam tubuh dan menurunkan kadar kolesterol sehingga mengurangi resiko penyakit jantung, mengandung anti oksidan tinggi menjaga daya tahan tubuh, mencegah tumor dan kanker.</p>\r\n<p>Kandungan L Arginin, L Gluthatione, dan Fish Oil pada EIKANA bermanfaat untuk membantu meperlancar peredaran darah dan mengurangi tekanan darah tinggi, menangkal radikal bebas, menjaga kesehatan kulit, mencegah kerusakan sel hati, meningkatkan fungsi kognitif, serta membantu mengontrol berat badan.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Aturan Minum :&nbsp;</strong></p>\r\n<ul>\r\n<li>Seduh 1 sachet Eikana dengan satu gelas air ( 150ml ) dengan suhu, ruangan, aduk merata dan langsung diminum</li>\r\n<li>untuk berat di bawah 75 kg cukup minum 1 sachet jam 11 siang sesudah sarapan pagi atau sebelum makan siang</li>\r\n<li>untuk berat badan di atas 75 kg minum 2 sachet yaitu yang pertama jam 11 siang dan sachet yang kedua jam 7-8 malam.</li>\r\n</ul>', 'Minuman Serbuk Extract Buah Dan Sayur mengandung bahan-bahan serat alami yang aman dan bermanfaat bagi tubuh anda.', 'product-covers/uDEftI7lEVykRwGQ7q8WeYgy6zWSdVyl4VcVj7oI.jpg', 1.00, 0, 100, 'PUBLISH', 1, 1, NULL, '2021-06-12 03:34:30', '2021-07-27 02:54:03', NULL, '[\"EIKANA 1.jpg\",\"EIKANA 08-09-2020.jpg\",\"eikana.jpg\",\"eikana1.jpg\",\"eikana2.jpg\"]'),
(3, 'Gilcam Propolis', 'gilcam-propolis', '<p>Seluruh dunia sudah tau betapa banyak manfaat dari kandungan propolis bagi kesehatan tubuh. Selain menjaga dan menyeimbangkan imun tubuh anda, Gilcam Propolis kami di produksi dengan kualitas yang terjaga dan tentunya kaya manfaat bagi kesehatan anda.</p>\r\n<p><strong>Komposisi :&nbsp;</strong></p>\r\n<p>Madu, Propolis, Ekstract Tebu dan Mint</p>\r\n<p><strong>Ingredients :&nbsp;</strong></p>\r\n<p>Honey, Propolis, Cane Extract Mint</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Aturan Pakai :</strong></p>\r\n<p>Teteskan 5 Gilcam Propolis ke dalam air lalu minum, 2 kali sehari</p>', 'Propolis Brazilian Nano Tech yang kaya manfaat untuk menjaga metabolisme tubuh anda', 'product-covers/lTNVol0W3E8TeVWi5BiXmNTWjI39glxd9nzboEi0.jpg', 1.00, 0, 100, 'PUBLISH', 1, 1, NULL, '2021-06-12 15:27:23', '2021-07-27 02:58:41', NULL, '[\"gilcam copy.jpg\",\"Gilcam News.jpg\",\"gilcam2 copy.jpg\"]'),
(4, 'Brightening Beauty Soap', 'brightening-beauty-soap', '<p>Kandungan Niacinamide, Aloe Barbadensis Extract, Pachyrhizus Erosus Root Extract pada brightening Body Soap bermanfaat membantu meredakan inflamasi pada kulit ( sebagian Skin Conditioning Agent) terutama untuk kulit berjerawat / kulit yang mudah berjerawat.&nbsp;</p>\r\n<p>Sebagai moisturizing, yaitu membantu mengatasi kulit kering dan kemerahan terutama untuk kulit yang sensitif terhadap produk kosmetika yang berlebihan, membantu mencerahkan kulit, meratakan warna kulit, memudarkan noda dan berkas jearawat, Membantu menjaga kulit agar tetap kencang, memudarkan kerutan dan keriput, serta meningkatkan elastisitas kulit.</p>\r\n<p><strong>Cara Pakai :&nbsp;</strong></p>\r\n<p>Basahi wajah / tubuh, basahi Beauty Soap dan gosok perhalan dengan telapak tangan hingga mengeluarkan busa, aplikasikan pada seluruh kulit wajah / tubuh, diamkan beberapa saat lalu bilas.</p>', 'Siapapun tidak akan bisa menolak kebaikan dari Evoush Brightening Beauty Soap', 'product-covers/5WL4zZmHersbDeiZm6kGs07P8UaLuRnem7D0Kiwb.jpg', 1.00, 0, 100, 'PUBLISH', 1, 1, NULL, '2021-06-12 15:29:48', '2021-07-27 03:02:47', NULL, '[\"model28.png\",\"P1011693.JPG\",\"P1011696.JPG\",\"parallax_beauty.jpg\"]'),
(5, 'Evoush Perfect Lipmatte', 'evoush-perfect-lipmatte', '<p><strong>Evoush Perfect Lipmatte</strong></p>\r\n<ol>\r\n<li>Natural Born: NA 18201301645</li>\r\n<li>Baby Rich: NA 18201301646</li>\r\n<li>Glazier: NA 18201301647</li>\r\n<li>Bourjois: NA 18201301648</li>\r\n<li>Zelda : NA 1820 1301649</li>\r\n<li>Diva : NA 18201301661</li>\r\n<li>Tiara : NA 18201301653</li>\r\n<li>Red Lipped Batfish : NA 18201301650</li>\r\n</ol>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Netto : 4gr</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp; 1 Paket: 4pcs</p>\r\n<p>&nbsp;</p>\r\n<p>Evoush Perfect Lipmatte dibuat dari bahan pilihan dan foodgrade, sehingga aman digunakan untuk jangka panjang, yaitu : <strong>Cyclopentaxiloxane, Kaolin, Talc, Titanium Dioxide dan Beeswax</strong>.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Keunggulan Lipmatte Evoush : </strong></p>\r\n<ol>\r\n<li>Lipmatte Evoush 3 in 1, lebih hemat, 1 produk dengan 3 manfaat: pewarna bibir, eye shadow dan blush on</li>\r\n<li>Food grade, aman jika tertelan</li>\r\n<li>No Paraben / No Timbal / No Merkuri, tidak&nbsp; menyebabkan bibir hitam/ alergi / gatal / bengkak / kanker mulut.</li>\r\n<li>Longlasting (ga perlu sering touch up setelah makan/minum) transferproof (tidak menempel pada masker, gelas dll)</li>\r\n<li>Pigmented, sekali oles warna sudah terlihat</li>\r\n<li>Tekstur ringan, tidak menggumpal jika terkena air.</li>\r\n<li>No Cracking, diperkaya&nbsp; vitamin B, melembabkan bibir tidak kering.</li>\r\n<li>Tersedia 8 warna, bisa menyesuaikan dengan tema make up (natural/bold)</li>\r\n</ol>\r\n<p><strong>cara pakai : </strong></p>\r\n<ul>\r\n<li>Pewarna Bibir : Oleskan tipis dan merata pada bibir, biarkan beberapa saat untuk benar-benar menempel sempurna</li>\r\n<li>Blush On : Oleskan sedikit saja, pada tulang pipi disatu sisi, ratakan, jika selesai baru pindah ke sisi lainnya. agar lebih mudah di blend.</li>\r\n<li>Eye Shadow : Oleskan sedikit saja pada kelopak mata, ratakan lalu ulangi pada kelopak mata sisi lainnya</li>\r\n</ul>\r\n<p>&nbsp;</p>', 'Perfect lipmatte menambah kesempurnaan penampilan anda semakin kece', 'product-covers/3By15Th9IM3HmofFAPC0cVv6dtFNgDBK43oiuSsq.jpg', 1.00, 0, 100, 'PUBLISH', 1, 1, NULL, '2021-06-12 15:33:47', '2021-08-14 16:03:00', NULL, '[\"P1012111(1).jpg\",\"123392528_121842466177335_5139221623457589376_n.jpg\",\"150468599_334178634616206_9199710288066484328_n.jpg\"]'),
(6, 'Evoush Daycream', 'evoush-daycream', '<p>Sentuhan kelembutan Evoush Daycream akan membuat hari anda semakin terjaga, karena bukan tanpa sebab kulit anda semakin terjaga bersama Evoush Daycream yang di produksi dengan bahan dengan pilihan kualitas terbaik.</p>\r\n<p>Kandungan Titanium Dioxide, Alpha Arbutin, Grape Extract, Niacinamide, Aloe Berbadensis Extract, dan Sodium Hyaluronate pada White Perfect Day Cream bermanfaat membantu melindungi kulit dari pengaruh buruk sinar matahari ( Sebagai uv filter ), mencerahkan kulit, melembabkan / menghidrasi kulit.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Cara Pakai :&nbsp;</strong></p>\r\n<p>Usapkan tipis dan merata pada seluruh wajah setelah mengguanakn Face Wash dan Facial Toner, gunakan rutin pada pagi hari untuk hasil maksimal.</p>', 'Lindungi kulit wajah anda dengan sentuhan lembut Evoush Day Cream', 'product-covers/mfZSMWl5wQvH0FRm4tSFPKXSCUZHOKqXeA1q9DyM.jpg', 1.00, 0, 100, 'PUBLISH', 1, 1, NULL, '2021-06-12 15:35:12', '2021-07-27 03:12:00', NULL, '[\"Day Cream.jpg\",\"Day Cream1 (1).jpg\",\"Day Cream1 (2).jpg\"]'),
(8, 'Evoush Nightcream', 'evoush-nightcream', '<p>Setelah seharian berbalut riasan wajah, tentunya kulit anda membutuhkan perawatan lebih di malam hari dikala kulit anda menjalankan proses regenerasi Evoush Nightcream akan menjadi faktor tambahan untuk semakin memperbaiki regenerasi kulit wajah anda di saat istirahat malam.</p>\r\n<p>Kandungan Baron Nitride, Kojic Acid, Niacinamide, Alpha Arbutin, Arisaema Amurense Extract, Citrus Lemon Fruit Extract, Collagen, dan Sodium Hyaluronate pada White Perfect Night Cream bermanfaat membantu mencerahkan kulit, mengatasi hiperpigmentasi, memudarkan flek dan noda berkas jerawat, memudarkan garis harus dan keriput, serta mengencangkan kulit.</p>\r\n<p><strong>Cara Pakai :&nbsp;</strong></p>\r\n<p>Usapkan tipis dan merata pada seluruh wajah, setelah menggunakan Face Wash, Facial Toner, dan Gold Jelly Serum. Gunakan secara rutin pada malam hari menjelang tidur.</p>', 'Beauty Skin Think Beauty Evoush Night Cream', 'product-covers/9hhOvtA4dfB2WacMwOJR25uf7YLn0C0dcRlyHxXF.jpg', 1.00, 0, 100, 'PUBLISH', 1, 1, NULL, '2021-06-12 15:39:28', '2021-07-27 03:15:23', NULL, '[\"Night Cream.jpg\",\"Night Cream1.jpg\",\"Night Cream2.jpg\"]'),
(9, 'Evoush Body Serum', 'evoush-body-serum', '<p>Memliki kulit putih sehat dan menawan adalah impian setiap wanita, Evoush Body Serum lah jawaban yang senantiasa menjawab setiap pertanyaan sebagian impian diatas. Evoush Body Serum akan merawat kulit anda dengan kebaikan yang terkandung didalamnya.</p>\r\n<p>Kandungan Glycerin, Beeswax, Shea butter, dan Titanium Dioxide pada Precious White Body Serum bermanfaat untuk membantu melembabkan kulit hingga 10 x lipat dari lotion biasa, mengatasi kulit kering dan pecah-pecah, menghaluskan kulit, berbagai sunscreen yang melindungi kulit dari pengaruh buruk sinar matahari (uv filter), dan mencerahkan kulit tubuh.</p>\r\n<p>Precious White Body Serum cepat meresap, tidak lengket, wangi aroma susu, kulit cerah sejak pertama kali pakai.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Cara Pakai :&nbsp;</strong></p>\r\n<p>Tuangkan secukupnya pada telapak tangan usapkan merata pada tangan dan kaki. Untuk hasil maksimal, gunakan setelah Peeling Spray.</p>', 'For Precious Beauty Whitening Your Skin', 'product-covers/JB4mY62LkuhX4qppb7GSJ67vv4SmUnkJ5Kc9JFFd.jpg', 1.00, 0, 100, 'PUBLISH', 1, 1, NULL, '2021-06-12 15:40:34', '2021-07-27 03:17:27', NULL, '[\"Body Serum.jpg\",\"Body Serum1.jpg\",\"Body Serum2.jpg\",\"BODY SERUM250 MM.jpg\"]'),
(10, 'Evoush Peeling Spray', 'evoush-peeling-spray', '<p>Produk spray terbaik yang akan menjaga kulit anda dari sel-sel mati dari kulit yang biasanya sangat mengganggu penampilan, Evoush Peeling Spray sangat mudah di gunakan, praktis dan tentunya kualitas bahan yang tidak akan bisa di ragukan lagi manfaat dan kandungannya</p>\r\n<p>&nbsp;</p>\r\n<p>Kandungan Clycerin, Niacinamide, Licorice Extract, Aloe Barbadensis Extract, dan Collagen pada Peeling Spray yang dilengkapi scrub halus bermanfaat membantu membersihkan kulit hingga ke pori-pori, mengangkat sel kulit mati, menghaluskan tekstur kulit, kulit menjadi lembab, cerah dan bercahaya.</p>\r\n<p><strong>Cara Pakai :&nbsp;</strong></p>\r\n<p>Semprotkan pada wajah atau badan yang akan di peeling, terutama bagian lipatan seperti lutut, sikut, ketiak, leher, dll. Gosok perlahan dengan gerakan memutar hingga kotoran / daki terangkat, lalu bilas, Gunakan Secara teratur untuk hasil optimal.&nbsp;</p>\r\n<p>Khusus Wajah : Gunakan 3 Hari sekali / Seminggi 1-2 kali.</p>', 'Menjaga kulit dan membersihkan sel-sel mati pada kulit anda dengan cara praktis', 'product-covers/ScyuxusiG3992wHvBJfBcegfSSD0npdOrfyxUSzc.jpg', 1.00, 0, 100, 'PUBLISH', 1, 1, NULL, '2021-06-12 15:44:05', '2021-07-27 03:19:29', NULL, '[\"peeling spray1A.jpg\",\"Peeling Spray1B.jpg\",\"Peeling Spray2A.jpg\",\"Peeling Spray2B.jpg\"]'),
(11, 'Evoush Pefect Gold Jelly Night', 'evoush-pefect-gold-jelly-night', '<p>Kandungan Alpha Arbutin, Niacinamide, Citrus Lemon Extract, Aloe Barbandensis Extract, Sodium Hyaluronate, Red Algae dan Vit C pada Perfect Gold Jelly Night Serum bermanfaat membantu menyamarkan kerutan, mengecilkan pori, menjaga elastisitas kulit, mencerahkan, mengatasi kulit kusam, dan meredakan peradangan.</p>\r\n<p><strong>Cara Pakai : </strong></p>\r\n<p>Pump Gold Jelly serum di ujung jari, lalu aplikasikan ke seluruh wajah sambil di pijat ringan dengan gerakan memutar ke atas. Untuk hasil maksimal gunakan rutin setiap malam, sebelum menggunakan Night Cream.</p>', 'Perfect Gold Jelly Night by Evoush', 'product-covers/e2jGaFkB5aialN2nhUHxFvGaoyoBCUu6Dii6HqXF.jpg', 1.00, 0, 100, 'PUBLISH', 1, 1, NULL, '2021-06-12 15:45:18', '2021-08-14 07:33:18', NULL, '[\"P1010528.JPG\",\"Perfect Gold Jelly Night.png\"]'),
(12, 'Evoush Facewash', 'evoush-facewash', '<p>Kandungan Glycerin, Collagen, Alpha Arbutin, dan Niacinamide pada Deep Cleansing Face Wash bermanfaat membantu membersihkan kulit dari debu dan kotoran, menghilangkan minyak dan sisa make up, kulit menjadi bersih, cerah, segar serta lembab.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Cara Pakai :&nbsp;</strong></p>\r\n<ul>\r\n<li>Basahi wajah, tekan pump, tuangkan foam pada tangan, aplikasikan perlahan pada wajah, hindari area mata, diamkan beberapa saat, lalu bilas.</li>\r\n</ul>', 'Menjaga kesehatan kulit terutama kulit wajah adalah sebuah modal utama dalam menjaga penampilan anda, Evoush Facewash melakukannya dengan sentuhan lembut bagi kulit anda', 'product-covers/sHDd5FdciecwM9mSzJS0sJHXDmAzdT55n8ay5tmh.jpg', 1.00, 0, 100, 'PUBLISH', 1, 1, NULL, '2021-06-12 15:47:00', '2021-07-27 03:24:00', NULL, '[\"derrmamen2.png\",\"DUARR 2.png\",\"Face Wash.jpg\",\"Face wash1.jpg\",\"Face Wash2.jpg\"]'),
(13, 'Evoush Facial Toner', 'evoush-facial-toner', '<p>Kandungan Licorice Extract, Glycolic Acid, Aloe Berbadensis Extract, Alpha Arbutin, Niacinamide dan Kojic Acid pada product Simple Shooting Facial Toner bermanfaat membantu membersihkan kulit hingga pori-pori, mengeksfoliasi kulit, meredakan peradangan, menyegarkan dan mencerahkan kulit.</p>\r\n<p><strong>cara pakai :&nbsp;</strong></p>\r\n<p>Semprotkan pada kapas secukupnya, tap secara ringan pada seluruh wajah. Gunakan setelah wajah dibersihkan menggunakan&nbsp;<strong>Face Wash.</strong></p>', 'Cara praktis dan simple untuk merawat kulit dengan kualitas terbaik dari produk Evoush Facial Toner yang senantiasa memberikan manfaat bagi kulit terbaik anda', 'product-covers/iS1KGhOj5lnhtngdZqK62K5uuBVNuRZTgvCYl5i5.jpg', 1.00, 0, 100, 'PUBLISH', 1, 1, NULL, '2021-06-12 15:48:03', '2021-07-27 03:04:17', NULL, '[\"Facial Toner.jpg\",\"Facial Toner_cover.jpg\",\"Facial Toner2.jpg\",\"P1010683.JPG\"]'),
(14, 'Evost SOP 5000 Collagen', 'evost-sop-5000-collagen', '<h1><strong>Apple Powder Drink With Collagen</strong></h1>\r\n<p><strong>(Minuman Serbuk Apel dengan Kolagen)</strong></p>\r\n<ul>\r\n<li>Kolagen 5000 mg per sajian</li>\r\n<li>Salmon Bubuk</li>\r\n<li>Tinggi Protein</li>\r\n<li>Tinggi Serat Pangan</li>\r\n<li>Sumber Vitamin A</li>\r\n<li>Sumber Vitamin E</li>\r\n<li>Sumber Vitamin B2 (Riboflavin)</li>\r\n<li>Sumber Vitamin B6 (Pridoksin)</li>\r\n<li>Sumber Vitamin B9 (Asam Folat)</li>\r\n<li>Tinggi Vitamin C</li>\r\n<li>Sumber Kalsium</li>\r\n<li>Sumber Magnesium</li>\r\n<li>Sumber Selenium</li>\r\n<li>Tinggi Kolin</li>\r\n</ul>\r\n<p><strong>Komposisi : </strong></p>\r\n<p><strong>Peptide Kolagen Ikan (25%). </strong>Apel Bubuk (25%), Anggur bubuk, Serat larut dari jagung. Ekstrak buah-buahan, Inulin. <strong>Serat Gandum, </strong> L-Glutation, L-Aegnin, Premiks vitamin dan mineral, Antioksidan asam askorbat, Kalsium dari ekstrak ganggang laut, <strong>Salmon Bubuk. </strong> Pengatur keasaman ( Asam malat, Asam sitrat), Serat Jeruk, Ekstrak tebu, Ekstrak lidah buaya, Pemanis alami glikosida steviol, Biotin, Asam Folat.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Cara Penyajian : </strong></p>\r\n<ol>\r\n<li>Masukan 1 sachet ke dalam shaker</li>\r\n<li>Tambahkan 150 ml air dingin</li>\r\n<li>Aduk lalu shake hingga merata</li>\r\n<li>Evost siap disajikan</li>\r\n</ol>', 'Apple Powder Drink With Collagen (Minuman Serbuk Apel dengan Kolagen) merupakan product nutrisi terbaru evoush yang penuh manfaat terutama dalam menjaga kesehatan dan kecantikan anda', 'product-covers/eJC8hUOT7B1Tg56943hWhsI9KMH8k7CdRe2OFDbo.jpg', 1.00, 0, 100, 'PUBLISH', 1, 1, NULL, '2021-07-17 03:31:11', '2021-08-09 14:22:48', NULL, '[\"1.jpg\",\"2.jpeg\",\"3.jpeg\",\"4.jpg\"]');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quotes` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parallax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `quotes`, `cover`, `about`, `deleted_at`, `created_at`, `updated_at`, `instagram`, `facebook`, `youtube`, `city`, `province`, `parallax`) VALUES
(1, 1, 'Kaji dan dalamilah sebelum engkau menduduki jabatan, karena kalau engkau telah mendudukinya, maka tidak ada kesempatan bagimu untuk mengkaji dan mendalaminya.', 'administrator/covers/Cl8rxRRBKSsrRS9UXMOqA5uTuh16caKbzp4jKB1Q.jpg', 'Halo gaess ! \r\nPerkenalkan saya puji ermanto, saya adalah web developer dari PT. Pineleng Indah Cemerlang. \r\nTugas utamaku di PT. Pineleng Indah Cemerlang adalah sebagai Fullstack Web Developer, secara singkat tugasku itu adalah membangun sebuah system aplikasi berbasis web guna memenuhi request dari perusahaan . Fungsi dari web tersebut oleh perusahaan di manfaatkan untuk aplikasi support member berupa profile affiliasi dari member yang telah terdaftar di dalam system yang terintegrasi lewat Restapi yang telah distandarisasi oleh pihak perusahaan. Dan saya membangun system untuk memanagemen product, mulai dari keluar masuk barang hingga membuat system order dengan system pembayaran yang terintegrasi dengan layanan payment yang berbasis restapi. Juga membuat media branding berupa content blog yang terus terupdate itu pun tugasku.', NULL, NULL, '2021-08-12 04:46:06', 'pujiermanto', 'pujiermanto', 'https://www.youtube.com/channel/UCxptCTRqJ5amS9nmztsG7jw', 'Kota Bandung', 'Jawa Barat', 'administrator/parallax/Ulj7Wu7TQTzKbTR8qc4tbyZNYek1g8g8NDpgQ6FS.png'),
(2, 2, 'Daun yang jatuh tak pernah menyalahkan angin yang berhembus', NULL, '<p>Akun ini bertugas untuk mengelola konten untuk artikel ataupun informasi yang menarik seputar evoush. Secara fungsional akun ini mengatur management kontent baik itu kontent tulisan dan design grafis yang memberikan informasi menarik dan terupdate untuk para member evoush utamanya dan khalayak awam selebihnya.</p>', NULL, '2021-06-28 00:19:32', '2021-06-28 00:19:32', 'evoush.official', 'evoush.evoush.12', 'https://www.youtube.com/channel/UCIzNgeNDD58z8XNppkopwzw', 'Kabupaten Sidoarjo', 'Jawa Timur', NULL),
(3, 3, 'Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 'Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, '2021-08-06 21:10:38', '2021-08-14 12:02:38', NULL, NULL, NULL, 'Kota Banjarmasin', 'Kalimantan Selatan', NULL),
(4, 4, NULL, NULL, NULL, NULL, '2021-08-06 21:07:40', '2021-08-06 21:07:40', NULL, NULL, NULL, 'Kabupaten Sidoarjo', 'Jawa Timur', NULL),
(5, 5, 'Jangan pernah takut jatuh,\nKarena yg tidak pernah memanjatkan yang tidak pernah jatuh.\nJangan takut gagal,\nKarena yang tidak gagal adalah yang tidak pernah berani melangkah,\nJangan takut salah,\nKarena tanpa salah kita tidak pernah tau mana yg benar.\nJangan takut join di evoush, karena tanpa menjalani peluangnya kamu tidak pernah tau, kalau di evoush ada bisnis dengan hasil besar.\nTerus melangkah walaupun ada jatuh, karena gagalmu adalah batu loncatan untuk sukses. \nSalam sukses\nDiena Top income Evoush', NULL, NULL, NULL, '2021-08-04 02:16:23', '2021-08-11 11:23:22', 'diena_nayla', 'Luthfi-Kardhina-Sari', NULL, 'Kota Banjarmasin', 'Kalimantan Selatan', NULL),
(6, 6, NULL, NULL, NULL, NULL, '2021-08-06 21:09:35', '2021-08-06 21:09:35', NULL, NULL, NULL, 'Kabupaten Sidoarjo', 'Jawa Timur', NULL),
(7, 7, 'Selama kita tidak menyerah, maka segala kemungkinan masih bisa terjadi, tidak ada yang tidak mungkin.. Jadi berjuang lah sekuat tenaga untuk meraih semua mimpi.. Orang SUKSES selalu kelebihan satu cara.. Sedangkan orang gagal selalu kelebihan satu alasan', NULL, NULL, NULL, '2021-06-29 05:05:58', '2021-08-12 23:56:30', NULL, NULL, NULL, 'Kabupaten Sidoarjo', 'Jawa Timur', 'hendry/parallax/GTQ9fbg1W94SKZP6JRdmG9dHHzOj89KAsePj3Jio.jpg'),
(8, 8, 'TERIMA KESEMPATAN PELUANG YANG DATANG, GAGAL ITU URUSAN NANTI YANG TERPENTING KITA BERANI MENCOBA DAN MENCOBA', NULL, '<p>Saya seorang ibu rumah tangga yang memiliki 2 org putri,setelah selesai mengeyam pendidikan diperguruan tinggi swasta di kota malang saya langsung bekerja dgn berbagai profesi sebagai seorang guru akuntansi &nbsp;dan kemudian bekerja sebagai staff acounting di perusahaan swasta.<br />Karena suami yang hrs berpindah tempat kerja ke kota lain dan keterbatasan waktu untuk keluarga saya akhirnya resign.<br />Kemudian saya memulai bisnis sendiri dan akhirnya saya di perkenalkan oleh seorang teman dengan <strong>product Evoush</strong>.<br />Awalnya saya hanya pemakai krn &nbsp;saya merasakan manfaat dr product tersebut saya ingin langsung menjalankan bisnisnya.<br />Dengan tekad yang kuat bermodalkan tabungan dari bisnis sebelumnya saya mengambil inisiatif untuk bergabung menjadi mitra <strong>Evoush</strong>...banyak yg saya dptkan di bisnis ini selain pencapaian <strong>Sapphire &nbsp;dgn income puluhan juta rupiah</strong> dlm <strong>kurun waktu 3 bulan</strong>...yang membuat saya lebih mantap lagi adalah menjadi mitra <strong>PT. Pineleng Indah Cemerlang</strong>, perusahaan yg sdh memiliki legalitas dan kompoten untuk menaungi mitra2nya di seluruh Indonesia maupun di Asia</p>', NULL, '2021-06-29 05:03:57', '2021-06-29 05:03:57', NULL, NULL, 'putriku', 'Kabupaten Bima', 'Nusa Tenggara Barat', NULL),
(9, 9, NULL, NULL, '<p>Pertama kenal Evoush di Fb dengan bapak dir langsung..<br />Awalnya diperkenalkan produk dan sistem marketing<br />Buat sya ini ada peluang usaha sangat bagus..selain produk2 bermanfaat juga peluang usaha yg sngat baik dimasa sperti sekarang ini / pandemi covid 19<br />Selain bisnis nya yg sangat mudah dilakukan sy memperkanalkan ke semua kalangan sperti anak sekolah SMA .ibu rumah tangga..Karyawan swasta dan ASN juga mau mengambil peluang usaha evoush ini<br />Dan disela2 kesibukan sy sbgai Ibu Rumah Tangga dan Pengusaha dan tetap bisa memperkenalkan bisnis evoush kepada teman2<br />Dengan bermodal hanya 3,2 jt saya sdh mendpatkan omset smpai 35 jt an dan mencapai posisi saphire</p>', NULL, '2021-06-29 05:13:00', '2021-06-29 05:13:00', NULL, NULL, NULL, 'Kabupaten Lombok Tengah', 'Nusa Tenggara Barat', NULL),
(10, 11, 'Tidak ada eskalator menuju sukses.Kamu harus berani menaiki tangga demi tangga menuju puncak,tidak ada jalan pintas.', NULL, NULL, NULL, '2021-07-01 04:12:34', '2021-07-02 08:28:01', NULL, NULL, NULL, 'Kabupaten Sidoarjo', 'Jawa Timur', 'kinclong/parallax/XOqXGVTCPcjDUb8MIZ8mdf52dLqKMPHsWXjVaCvU.jpg'),
(11, 12, NULL, NULL, NULL, NULL, '2021-08-04 02:21:38', '2021-08-04 02:21:38', 'ayurey2804', NULL, NULL, 'Kota Banjarmasin', 'Kalimantan Selatan', NULL),
(12, 13, 'Tidak ada kata terlambat,yang ada...Kapan Anda Memulai?\" Pemenang Adalah yang bertahan hingga garis finish.', NULL, '<ul>\n						<li>\n							<b>Tahun 2001</b> <br>\n							Lulus dari salah satu Perguruan tinggi Swasta di Jawa timur dengan jurusan International Relationship.\n						</li>\n						<li>\n							<b>Tahun 2002</b> <br>\n							Melanjutkan Kuliah kembali di perhotelan dengan jurusan Food&Beverages.\n						</li>\n						<li>\n							<b>Tahun 2003</b> <br>\n							Setelah lulus dari Kuliah Perhotelan memutuskan  Magang Di Salah Satu Hotel Bintang 5 Di Surabaya.\n						</li>\n						<li>\n							<b>Tahun 2004-2006</b> <br>\n							Memutuskan Ke Malaysia&bekerja sebagai Chef.\n						</li>\n						<li>\n							<b>Tahun 2006-2007</b> <br>\n							Akhir 2006 Bekerja di Perusahaan Transportasi Di Doha,Qatar selama 1 Tahun.\n						</li>\n						<li>\n							<b>Tahun 2008</b> <br>\n							Kembali lagi ke Malaysia,kali ini mencoba tantangan baru,yaitu bekerja sebagai pemain catur setempat selama 2tahun.\n						</li>\n						<li>\n							<b>Tahun 2010</b> <br>\n							Setelah masa kontrak di dunia catur habis,sy tidak memperpanjang kontrak&kembali mencari pengalaman baru,kali ini Bekerja di Sebuah Casino di Salah satu tempat hiburan Paling mewah di Malaysia.\n						</li>\n						<li>\n							<b>Tahun 2012-2014</b> <br>\n							Kembali lagi dan menekuni di dunia catur,kali ini sebagai Pelatih Privat siswa Catur kelas Basic-Intermediate.\n						</li>\n						<li>\n							<b>2015</b> <br>\n							Merasa bosan di luar negeri akhirnya memutuskan pulang ke Tanah air, dari sini mencoba peruntungan mulai menjadi Marketing kartu kredit hingga bekerja di perusahaan Valas di Surabaya.\n						</li>\n						<li>\n							<b>2016</b> <br>\n							Menekuni bisnis keluarga di dunia parfum&mencoba membuka beberapa gerai Parfum d Jawa timur.\n						</li>\n						<li>\n							<b>2020</b> <br>\n							Sampai akhir nya ketemu lah dg Bisnis baru ini yaitu di Dunia MLM yg kebanyakan orang alergi, setelah mencoba masuk menjadi member,bulan pertama&bulan kedua tanpa ada hasil yg signifikan karena belum mau menjalankan nya, Setelah bulan ketiga...mulai menjalankan bisnis nya...Alhamdulillah di Bulan ketiga penghasilan beranjak naik,mulai ratusan ribu,hingga Puluhan Juta...Dan Alhamdulillah lagi bisa tembus 10 besar sampai beranjak naik 3 besar penghasilan terbesar di Perusahaan ini,lebih dahsyat nya lg di bulan ketiga-kelima dapat penghargaan 3Sapphire, dari sini mulai yakin bahwa,sy berada di Kendaraan(Perusahaan) yg benar&dibantu dg Leader&Management yg bagus...Insha Allah berkah selamanya..Aamiin...🤲🤲🤲\n						</li>\n					</ul>', NULL, '2021-08-04 02:22:39', '2021-08-06 02:24:47', NULL, NULL, NULL, 'Kabupaten Sidoarjo', 'Jawa Timur', NULL),
(13, 14, NULL, NULL, NULL, NULL, '2021-08-04 02:19:30', '2021-08-04 02:19:30', 'deded.syahrezanew', 'deded.syahreza', 'https://www.youtube.com/channel/UCbxBVGeLwBgLgF5ysLpu-lw', 'Kota Banjarmasin', 'Kalimantan Selatan', NULL),
(14, 15, 'Dunia ini dipenui dengan orang-orang baik dan jika kamu tidak dapat menemukannya, jadilah salah satunya', NULL, '<p>Berkomitmen yang kuat untuk selalu maju dan selalu menyampaikan informasi tentang berbisnis di evoush. Baik itu manfaat produknya maupun system bisnisnya yang handal, selalu belajar ...</p>', NULL, '2021-06-29 05:16:59', '2021-06-29 05:16:59', NULL, NULL, NULL, 'Kabupaten Kapuas', 'Kalimantan Tengah', NULL),
(15, 16, 'jangan cemas kalau badai datang, karena disana juga akan ada pelangi yang menunggu', NULL, '<p>Saya adalah seorang praktisi kesehatan di bidang kefarmasian yang telah memulai berbisnis dg evoush. Saya memulai bisnis evoush ini dengan menjadi pemakai dr produk nya terlebih dahulu.<br />Dengan bermodalkan uang tabungan yang dulu beserta dengan bantuan suami dan tekad yang kuat, saya pun memulai bisnis yang sekarang sudah membawa saya k peringkat shapire dlm kurung waktu 2,5 bulan dg omset puluhan juta rupiah🥰</p>', NULL, '2021-06-29 04:40:21', '2021-06-29 04:40:21', NULL, NULL, 'saidahlaila', 'Kabupaten Hulu Sungai Selatan', 'Kalimantan Selatan', NULL),
(16, 10, NULL, NULL, NULL, NULL, '2021-08-07 00:05:58', '2021-08-07 00:05:58', NULL, NULL, NULL, 'Kabupaten Kediri', 'Jawa Timur', NULL),
(17, 18, NULL, NULL, NULL, NULL, '2021-08-09 22:25:58', '2021-08-09 22:25:58', NULL, NULL, NULL, 'Kabupaten Kapuas', 'Kalimantan Tengah', NULL),
(18, 19, NULL, NULL, NULL, NULL, '2021-08-11 22:02:30', '2021-08-11 22:02:30', NULL, NULL, NULL, 'Kabupaten Sidoarjo', 'Jawa Timur', NULL),
(19, 20, NULL, NULL, NULL, NULL, '2021-08-16 08:14:37', '2021-08-16 08:14:37', NULL, NULL, NULL, 'Kabupaten Sidoarjo', 'Jawa Timur', NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `achievements` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `roles`, `address`, `phone`, `avatar`, `status`, `achievements`) VALUES
(1, 'puji ermanto', 'pujiermanto@gmail.com', NULL, '$2y$10$5Mib7Q.KxYo0LXpegbOpCOWy6uQ5CqSDn02QkD/FT0.WemStEtz3q', NULL, '2021-05-28 07:34:40', '2021-08-12 04:36:59', 'administrator', '[\"ADMIN\",\"STAFF\",\"WEBDEVELOPER\",\"AUTHOR\"]', 'Jl. Boeing Utara 1 No.7', '6288222668778', 'administrator/profile/VBaRe13jR3isDZO699C2BHVkrylirdPN3fAjom2N.jpg', 'ACTIVE', 'null'),
(2, 'evoush author', 'evoushauthor@evoush.com', NULL, '$2y$10$lZ1LcyoA9VlyE0By4TuRGOCraIcyZ630KyaLw2hRnCG2/Nk65lyby', NULL, '2021-06-28 00:19:31', '2021-06-28 00:19:31', 'evoush_author2021', '[\"AUTHOR\"]', 'Pergudangan sirie Blok-S/20', '6288222668778', 'avatars/pUz1wibOjtyfJpjM9IFOd8hDYNGUI7FCCX0WCKLj.jpg', 'ACTIVE', ''),
(3, 'fahrin', 'fahrin@evoush.com', NULL, '$2y$10$TU6CRLs3H0.g0Vu6fDY7F.tM8T1..7LyQZCe5A6rzRexrkkUhQFEi', NULL, '2021-08-06 21:10:38', '2021-08-09 01:56:05', 'thefounder', '[\"MEMBER\"]', NULL, '628123889992', 'fahrin/profile/pj5GIbBVQpXdHRyMhj9exsTqOA3MnxUmQWnIJEqc.png', 'ACTIVE', '[\"STAR SAPHIRE\"]'),
(4, 'rifqi fenti', 'rifqifenti@evoush.com', NULL, '$2y$10$0cgAQ9T308RxLo056bWnZuU.EeK0WjigbxGSzR8Hqhkuewr2.SqDq', NULL, '2021-08-06 21:07:39', '2021-08-09 02:03:04', 'rifqifenti', '[\"MEMBER\"]', NULL, '628899888888', 'rifqifenti/profile/PY0NJ7DdCsrLZetE4Or0lrq5vJqqBkphg0f0dXgl.png', 'ACTIVE', '[\"STAR SAPHIRE\"]'),
(5, 'Luthfi Kardhina Sari', 'dieana@evoush.com', NULL, '$2y$10$2X5oi1JTMhK.4c5yjuWmEuKAuWz3HEB44qEgOCZ5lM.7bQznhIR7K', NULL, '2021-08-04 02:16:23', '2021-08-10 03:26:38', 'dieanaevoush', '[\"MEMBER\"]', NULL, '6288222668778', 'dieana/profile/CwHSaUQ6vZM20GfzyED2NwDTVCNwGVNG0mLS9u5m.png', 'ACTIVE', '[\"STAR SAPHIRE\"]'),
(6, 'rifqi', 'rifqi@evoush.com', NULL, '$2y$10$BAYxvc8aOaxZ6/.qqIqTqu/ay71Q/wzXCBXw2z8hpcGFLK8U/TX.G', NULL, '2021-08-06 21:09:35', '2021-08-09 02:03:34', 'coachrifqi', '[\"MEMBER\"]', NULL, '628899888888', 'rifqi/profile/ATAKTPFcnxEGdaCLQR6tSKALFTGJdmRv9p34ag1j.png', 'ACTIVE', '[\"STAR SAPHIRE\"]'),
(7, 'hendriyanto', 'hendry@evoush.com', NULL, '$2y$10$o4MACEXM0Yr9Bmwbnoobfudpa7A1yC32mB7OHRo3zJYs5q9JimlMm', NULL, '2021-06-29 05:05:57', '2021-08-12 01:47:08', 'hendry', '[\"MEMBER\"]', NULL, '6281230174799', 'hendry/profile/SrPPERzayU7a9W3Pff7ziYUoX5oysaHU4YMwZsRj.png', 'ACTIVE', '[\"SAPHIRE\"]'),
(8, 'Endang Ekawati,S.E', 'putriku@evoush.com', NULL, '$2y$10$k2sVowHeONULiTUKAX554uyIiZUDh7tKlJ4RORv1jWmPtbM71u1fW', NULL, '2021-06-29 05:03:56', '2021-08-10 03:08:11', 'putriku', '[\"MEMBER\"]', NULL, '6285225497552', 'putriku/profile/2ruhNc7az5e6bfwoFVFvjgW75IjvgVhBmm8bIcWy.png', 'ACTIVE', '[\"SAPHIRE\"]'),
(9, 'Ratmina', 'ratmina@evoush.com', NULL, '$2y$10$RPDLhJo8aX0t1UX4t.ppG.HvUa7iSdsdow5od6Cgcmea4pNdBSobe', NULL, '2021-06-29 05:12:58', '2021-08-10 03:07:36', 'ratmina', '[\"MEMBER\"]', NULL, '6282237984519', 'ratmina/profile/cddC2WgpDF9DwUum3MOkUNVsKN22usfaZwrwuqfa.png', 'ACTIVE', '[\"SAPHIRE\"]'),
(10, 'agung irdiyanto', 'founder@evoush.com', NULL, '$2y$10$f5S5BeUTdYW1skz.xlkreOLpqGyR0tl.HAp4fXNC9Jg6p5J6v4aq.', NULL, '2021-08-07 00:05:58', '2021-08-09 02:05:45', 'founder', '[\"MEMBER\"]', NULL, '6283848098887', 'kangariel/profile/MYbcsMaLyCr6pTzhh74LOvR8q7qy9uff0CLhH3G3.png', 'ACTIVE', '[\"STAR SAPHIRE\"]'),
(11, 'Tutik Rahayu', 'kinclong@evoush.com', NULL, '$2y$10$dkMBXFp9MzVIVP89ib2ZUeZC6OfnjeNwcsOvl3.76xz7CqYd0Zexa', NULL, '2021-07-01 04:12:31', '2021-08-09 02:04:31', 'kinclong', '[\"MEMBER\"]', NULL, '6282131609949', 'kinclong/profile/QkIahVq6B9ixDXNdCIhv6Dln1j2mjJofL1AEScAl.png', 'ACTIVE', '[\"SAPHIRE\"]'),
(12, 'ayurey', 'ayurey@evoush.com', NULL, '$2y$10$AdN7Un9JFH/LPmTs.B1toeK1Obb9nITNPco3FQoQGyxy1H5YjuTue', NULL, '2021-08-04 02:21:38', '2021-08-09 02:07:15', 'ayurey', '[\"MEMBER\"]', NULL, '087887898787732', 'ayurey/profile/xcEpPrnllGOG8VCRVvb25h9la9BYtxOQ5mi6Ifu9.png', 'ACTIVE', '[\"SAPHIRE\"]'),
(13, 'Ababil Alung Edoardo', 'ababil@evoush.com', NULL, '$2y$10$v9fiC8mEzBvmes9hNAiLZuXmNzbv7JHdFaw.lltv5D9hAHs3ivjuK', NULL, '2021-08-04 02:22:39', '2021-08-09 02:05:30', 'ababil', '[\"MEMBER\"]', NULL, '6281333372172', 'ababil/profile/2l0Hs8Z6taE204UPHSpd3ufU694hrDs6hM8xJDBq.png', 'ACTIVE', '[\"SAPHIRE\"]'),
(14, 'deded syahreza', 'deded@evoush.com', NULL, '$2y$10$ORtRaKMjrG.g2kL5pmEII.jUY9m/tL.vaihreyhX3dyNah5Nt85t2', NULL, '2021-08-04 02:19:30', '2021-08-09 02:05:15', 'deded', '[\"MEMBER\"]', NULL, '08988987878787', 'deded/profile/A9WYUNhlmnBHqgPCRjNiTYLPXML4feiOeYVPfv4B.png', 'ACTIVE', '[\"SAPHIRE\"]'),
(15, 'Rahmad', 'rahmad@evoush.com', NULL, '$2y$10$lw1SOTDadyjk5aC0PzeATeYrgEorBAAU7iobaqu4GmXLemrtsIcdG', NULL, '2021-06-29 05:16:58', '2021-08-09 02:04:41', 'rahmadisa', '[\"MEMBER\"]', NULL, '6282157497162', 'rahmadisa/profile/8jRbMys4juzPGZrXFxeerVgRHVQ9Xfg2TEPXTIj1.png', 'ACTIVE', '[\"SAPHIRE\"]'),
(16, 'saidah laila', 'saidahlaila@evoush.com', NULL, '$2y$10$PkjcW63fJAE70ecJtQ0PMuie0RunquyzzRZfwLBDW3hQXMmKgGz6S', NULL, '2021-06-29 04:40:20', '2021-08-09 02:04:59', 'saidahlaila', '[\"MEMBER\"]', NULL, '6285347231325', 'saidahlaila/profile/C8XdULsc3fKXKSMbun6wtJT6huyxhvsY2Wd3PYaU.png', 'ACTIVE', '[\"SAPHIRE\"]'),
(18, 'hadi ramadhoni', 'hadi@evoush.com', NULL, '$2y$10$Q3qGSdsNn9a7d9YQ2BOvBuQ7FRL.OXYt/P/DBkshe/5jfIPUyBbhS', NULL, '2021-08-09 22:25:57', '2021-08-09 22:26:24', 'hadiramadhoni', '[\"MEMBER\"]', NULL, '62872872827', 'hadiramadhoni/profile/ucmj6exmDeFEnR28aYmxMTE5kBs1SvORCTjtb6zk.png', 'ACTIVE', '[\"SAPHIRE\"]'),
(19, 'Dian Leo Efendi', 'leojadoel@evoush.com', NULL, '$2y$10$wyplRl990JF2GkgOHfNJU.rMsE9VxtJR13VLr1IXBPta3WBwscqT2', NULL, '2021-08-11 22:02:29', '2021-08-11 22:02:29', 'leojadoel', '[\"MEMBER\"]', NULL, '62827827827', 'leojadoel/profile/oS6GpcdWJY50U5i2EDV5V1633JvvMT6ZShps2O9f.png', 'ACTIVE', '[\"SAPHIRE\"]'),
(20, 'randi', 'randi@evoush.com', NULL, '$2y$10$URb6cOByv9.Re2OHw13hZ.88iNC4oT84Utowl7US4rLHu8XgtGrgO', NULL, '2021-08-16 08:14:36', '2021-08-16 08:15:01', 'randi', '[\"STAFF\"]', NULL, '628899888888', 'randi/profile/TtRJiTs2z8yRObx0X3MyRCThKEp1djxIFGj7zO7A.jpg', 'ACTIVE', 'null');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_data_test`
--
ALTER TABLE `api_data_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `category_articles`
--
ALTER TABLE `category_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_message`
--
ALTER TABLE `category_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`),
  ADD KEY `category_product_category_id_foreign` (`category_id`);

--
-- Indexes for table `contact_message`
--
ALTER TABLE `contact_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_message_category_id_foreign` (`category_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `joining`
--
ALTER TABLE `joining`
  ADD PRIMARY KEY (`id`),
  ADD KEY `joining_member_id_foreign` (`member_id`),
  ADD KEY `joining_user_id_foreign` (`user_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_sponsor_id_foreign` (`sponsor_id`),
  ADD KEY `member_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_data_test`
--
ALTER TABLE `api_data_test`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category_articles`
--
ALTER TABLE `category_articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_message`
--
ALTER TABLE `category_message`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contact_message`
--
ALTER TABLE `contact_message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `joining`
--
ALTER TABLE `joining`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category_articles` (`id`);

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `contact_message`
--
ALTER TABLE `contact_message`
  ADD CONSTRAINT `contact_message_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category_message` (`id`);

--
-- Constraints for table `joining`
--
ALTER TABLE `joining`
  ADD CONSTRAINT `joining_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `joining_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_sponsor_id_foreign` FOREIGN KEY (`sponsor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
