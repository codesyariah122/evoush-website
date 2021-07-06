-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2021 at 07:36 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

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
(1, 'Umum', 'Pesan bebas yang dapat anda ajukan pada management kami', NULL, '2021-06-02 01:43:13', '2021-06-02 01:43:13'),
(2, 'Bisnis Evoush', 'Anda bisa mengirim pesan mengenai pertanyaan seputar bisnis evoush', NULL, '2021-06-02 01:44:37', '2021-06-02 08:20:15'),
(3, 'Join Evoush', 'Anda bisa mengirim pesan berupa pertanyaan mengenai informasi join evoush', NULL, '2021-06-02 08:23:32', '2021-06-02 08:23:32');

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
(25, 13, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_message`
--

CREATE TABLE `contact_message` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `quotes`, `cover`, `file`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Evoush Opportunity Seminar (EOS)', 'Evoush Beauty And Wellness Jember', 'events/pIQteyzbFGdrlr5SIffvdwpvU5pBF3iNuBX3eV79.jpg', '', '<p><strong>Business Seminar</strong> Recognition <strong>DOORPRIZE</strong>.</p>\r\n<p style=\"line-height: 2;\">Bukan hanya seminar biasa yang kali ini evoush adakan di Kota Jember akan ada banyak informasi dan ilmu yang akan anda dapatkan dalam seminar EOS kali ini, ayo kita tajamkan semangat kita dalam membangun bisnis jaringan di Evoush. Your Eternal Future&nbsp;</p>\r\n<p style=\"line-height: 2;\">&lt;video controls&gt;<br />&nbsp; &nbsp; &nbsp; &lt;source src=\"https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/videos/event/event1.mp4\" type=\"video/mp4\"&gt;<br />&nbsp; &nbsp; &nbsp; &nbsp;&lt;source src=\"mov_bbb.ogg\" type=\"video/ogg\"&gt;<br />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Your browser does not support HTML video.</p>\r\n<p style=\"line-height: 2;\">&lt;/video&gt;</p>', '2021-06-27 07:54:05', '2021-06-27 08:19:20');

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
(56, '2021_07_03_044511_create_api_data_test_table', 22);

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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `description`, `mini_description`, `cover`, `price`, `views`, `stock`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kileon', 'kileon', 'Minuman serbuk yang mengandung FISH COLLAGEN yang membantu mengencangkan kulit wajah, menyuburkan rambut, serta membantu mencegah osteoporosis dan meredakan radang sendi dan rematik. \\r\\nVITAMIN C membantu merawat kulit pada wajah anda dari flek hitam, kerutan dan menangkal radikal bebas.', 'FISH COLLAGEN DRINK', 'product-covers/2gRgH5XOsELfzkYBWtL7NJaClsr8zamaHWbO1nE5.jpg', 1.00, 0, 100, 'PUBLISH', 1, 1, NULL, '2021-06-12 03:08:44', '2021-06-12 03:32:00', NULL),
(2, 'Eikana', 'eikana', 'Serbuk minuman kesehatan mengandung bahan-bahan serat alami yang aman dan bermanfaat bagi tubuh anda.', 'Minuman Serbuk Extract Buah Dan Sayur', 'product-covers/uDEftI7lEVykRwGQ7q8WeYgy6zWSdVyl4VcVj7oI.jpg', 1.00, 0, 100, 'PUBLISH', 1, NULL, NULL, '2021-06-12 03:34:30', '2021-06-12 03:34:30', NULL),
(3, 'Gilcam Propolis', 'gilcam-propolis', 'Seluruh dunia sudah tau betapa banyak manfaat dari kandungan propolis bagi kesehatan tubuh. Selain menjaga dan menyeimbangkan imun tubuh anda, Gilcam Propolis kami di produksi dengan kualitas yang terjaga dan tentunya kaya manfaat bagi kesehatan anda.', 'Propolis Brazilian Nano Tech', 'product-covers/lTNVol0W3E8TeVWi5BiXmNTWjI39glxd9nzboEi0.jpg', 1.00, 0, 100, 'PUBLISH', 1, NULL, NULL, '2021-06-12 15:27:23', '2021-06-12 15:27:23', NULL),
(4, 'Brightening Beauty Soap', 'brightening-beauty-soap', 'Rawat kulit indahmu dengan sentuhan dari bahan alami yang terkandung dalam Produk Brightening Beauty Soap', 'Siapapun tidak akan bisa menolak kebaikan dari Evoush Brightening Beauty Soap', 'product-covers/5WL4zZmHersbDeiZm6kGs07P8UaLuRnem7D0Kiwb.jpg', 1.00, 0, 100, 'PUBLISH', 1, NULL, NULL, '2021-06-12 15:29:48', '2021-06-12 15:29:48', NULL),
(5, 'Evoush Perfect Lipmatte', 'evoush-perfect-lipmatte', 'Tunjukan penampilan terbaik anda dengan warna-warna menawan dari Evoush Perfect Lipmatte, penampilan semakin menarik dan berwarna dalam balutan produk lipmatte kami.', 'Perfect lipmatte menambah kesempurnaan penampilan anda semakin kece', 'product-covers/wMPsgYNzwAnVOxxZnkBtaVZKrLsgWoswtbBqRBDF.jpg', 1.00, 0, 100, 'PUBLISH', 1, NULL, NULL, '2021-06-12 15:33:47', '2021-06-12 15:33:47', NULL),
(6, 'Evoush Daycream', 'evoush-daycream', 'Sentuhan kelembutan Evoush Daycream akan membuat hari anda semakin terjaga, karena bukan tanpa sebab kulit anda semakin terjaga bersama Evoush Daycream yang di produksi dengan bahan dengan pilihan kualitas terbaik.', 'Lindungi kulit wajah anda dengan sentuhan lembut', 'product-covers/mfZSMWl5wQvH0FRm4tSFPKXSCUZHOKqXeA1q9DyM.jpg', 1.00, 0, 100, 'PUBLISH', 1, NULL, NULL, '2021-06-12 15:35:12', '2021-06-12 15:35:12', NULL),
(8, 'Evoush Nightcream', 'evoush-nightcream', 'Setelah seharian berbalut riasan wajah, tentunya kulit anda membutuhkan perawatan lebih di malam hari dikala kulit anda menjalankan proses regenerasi Evoush Nightcream akan menjadi faktor tambahan untuk semakin memperbaiki regenerasi kulit wajah anda di saat istirahat malam.', 'Beauty Skin Think Beauty', 'product-covers/9hhOvtA4dfB2WacMwOJR25uf7YLn0C0dcRlyHxXF.jpg', 1.00, 0, 100, 'PUBLISH', 1, NULL, NULL, '2021-06-12 15:39:28', '2021-06-12 15:39:28', NULL),
(9, 'Evoush Body Serum', 'evoush-body-serum', 'Memliki kulit putih sehat dan menawan adalah impian setiap wanita, Evoush Body Serum lah jawaban yang senantiasa menjawab setiap pertanyaan sebagian impian diatas. Evoush Body Serum akan merawat kulit anda dengan kebaikan yang terkandung didalamnya.', 'For Precious Beauty Whitening Your Skin', 'product-covers/JB4mY62LkuhX4qppb7GSJ67vv4SmUnkJ5Kc9JFFd.jpg', 1.00, 0, 100, 'PUBLISH', 1, NULL, NULL, '2021-06-12 15:40:34', '2021-06-12 15:40:34', NULL),
(10, 'Evoush Peeling Spray', 'evoush-peeling-spray', 'Produk spray terbaik yang akan menjaga kulit anda dari sel-sel mati dari kulit yang biasanya sangat mengganggu penampilan, Evoush Peeling Spray sangat mudah di gunakan, praktis dan tentunya kualitas bahan yang tidak akan bisa di ragukan lagi manfaat dan kandungannya', 'Menjaga kulit dan membersihkan sel-sel mati pada kulit anda dengan cara praktis', 'product-covers/ScyuxusiG3992wHvBJfBcegfSSD0npdOrfyxUSzc.jpg', 1.00, 0, 100, 'PUBLISH', 1, NULL, NULL, '2021-06-12 15:44:05', '2021-06-12 15:44:05', NULL),
(11, 'Evoush Pefect Gold Jelly Night', 'evoush-pefect-gold-jelly-night', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Perfect Gold Jelly Night From Evoush', 'product-covers/e2jGaFkB5aialN2nhUHxFvGaoyoBCUu6Dii6HqXF.jpg', 1.00, 0, 100, 'PUBLISH', 1, NULL, NULL, '2021-06-12 15:45:18', '2021-06-12 15:45:18', NULL),
(12, 'Evoush Facewash', 'evoush-facewash', 'Menjaga kesehatan kulit terutama kulit wajah adalah sebuah modal utama dalam menjaga penampilan anda, Evoush Facewash melakukannya dengan sentuhan lembut bagi kulit anda', 'Deep Cleaning Beauty your facewash By Evoush', 'product-covers/sHDd5FdciecwM9mSzJS0sJHXDmAzdT55n8ay5tmh.jpg', 1.00, 0, 100, 'PUBLISH', 1, NULL, NULL, '2021-06-12 15:47:00', '2021-06-12 15:47:00', NULL),
(13, 'Evoush Facial Toner', 'evoush-facial-toner', 'Cara praktis dan simple untuk merawat kulit dengan kualitas terbaik dari produk Evoush Facial Toner yang senantiasa memberikan manfaat bagi kulit terbaik anda', 'Simple Shooting For Beauty Skin', 'product-covers/HxPgM4M9HZw7mVehmJuoA1xgSOoW5hC4UvHy1DCh.jpg', 1.00, 0, 100, 'PUBLISH', 1, NULL, NULL, '2021-06-12 15:48:03', '2021-06-12 15:48:03', NULL);

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
(1, 1, 'Your Eternal Future', 'covers/M0AM1YuB0laVD2YZQC2FFf7ZrzGQBRMnfZ9c9QPD.jpg', 'Membangun bisnis jaringan dengan semangat yang penuh inovasi, product-product terbaik yang di sajikan sebagai modal dan motivasi untuk menjadi juaranya.', NULL, NULL, '2021-06-15 11:14:34', 'pujiermanto', 'pujiermanto', 'https://www.youtube.com/channel/UCxptCTRqJ5amS9nmztsG7jw', 'Kota Bandung', 'Jawa Barat', 'parallax/YBm3naAY3CsvglJbVfEtYGzWS0p8jvkXGpDoim95.jpg'),
(2, 2, 'Daun yang jatuh tak pernah menyalahkan angin yang berhembus', NULL, '<p>Akun ini bertugas untuk mengelola konten untuk artikel ataupun informasi yang menarik seputar evoush. Secara fungsional akun ini mengatur management kontent baik itu kontent tulisan dan design grafis yang memberikan informasi menarik dan terupdate untuk para member evoush utamanya dan khalayak awam selebihnya.</p>', NULL, '2021-06-28 00:19:32', '2021-06-28 00:19:32', 'evoush.official', 'evoush.evoush.12', 'https://www.youtube.com/channel/UCIzNgeNDD58z8XNppkopwzw', 'Kabupaten Sidoarjo', 'Jawa Timur', NULL),
(3, 3, 'Masa depan adalah milik Anda yang telah menyiapkannya dari hari ini', NULL, NULL, NULL, '2021-06-29 04:28:04', '2021-06-29 04:28:04', NULL, NULL, 'citradevi', 'Kabupaten Sidoarjo', 'Jawa Timur', NULL),
(4, 4, 'jangan cemas kalau badai datang, karena disana juga akan ada pelangi yang menunggu', NULL, '<p>Saya adalah seorang praktisi kesehatan di bidang kefarmasian yang telah memulai berbisnis dg evoush. Saya memulai bisnis evoush ini dengan menjadi pemakai dr produk nya terlebih dahulu.<br />Dengan bermodalkan uang tabungan yang dulu beserta dengan bantuan suami dan tekad yang kuat, saya pun memulai bisnis yang sekarang sudah membawa saya k peringkat shapire dlm kurung waktu 2,5 bulan dg omset puluhan juta rupiah🥰</p>', NULL, '2021-06-29 04:40:21', '2021-06-29 04:40:21', NULL, NULL, 'saidahlaila', 'Kabupaten Hulu Sungai Selatan', 'Kalimantan Selatan', NULL),
(5, 5, 'TERIMA KESEMPATAN PELUANG YANG DATANG, GAGAL ITU URUSAN NANTI YANG TERPENTING KITA BERANI MENCOBA DAN MENCOBA', NULL, '<p>Saya seorang ibu rumah tangga yang memiliki 2 org putri,setelah selesai mengeyam pendidikan diperguruan tinggi swasta di kota malang saya langsung bekerja dgn berbagai profesi sebagai seorang guru akuntansi &nbsp;dan kemudian bekerja sebagai staff acounting di perusahaan swasta.<br />Karena suami yang hrs berpindah tempat kerja ke kota lain dan keterbatasan waktu untuk keluarga saya akhirnya resign.<br />Kemudian saya memulai bisnis sendiri dan akhirnya saya di perkenalkan oleh seorang teman dengan <strong>product Evoush</strong>.<br />Awalnya saya hanya pemakai krn &nbsp;saya merasakan manfaat dr product tersebut saya ingin langsung menjalankan bisnisnya.<br />Dengan tekad yang kuat bermodalkan tabungan dari bisnis sebelumnya saya mengambil inisiatif untuk bergabung menjadi mitra <strong>Evoush</strong>...banyak yg saya dptkan di bisnis ini selain pencapaian <strong>Sapphire &nbsp;dgn income puluhan juta rupiah</strong> dlm <strong>kurun waktu 3 bulan</strong>...yang membuat saya lebih mantap lagi adalah menjadi mitra <strong>PT. Pineleng Indah Cemerlang</strong>, perusahaan yg sdh memiliki legalitas dan kompoten untuk menaungi mitra2nya di seluruh Indonesia maupun di Asia</p>', NULL, '2021-06-29 05:03:57', '2021-06-29 05:03:57', NULL, NULL, 'putriku', 'Kabupaten Bima', 'Nusa Tenggara Barat', NULL),
(6, 6, 'Selama kita tidak menyerah, maka segala kemungkinan masih bisa terjadi, tidak ada yang tidak mungkin.. Jadi berjuang lah sekuat tenaga untuk meraih semua mimpi.. Orang SUKSES selalu kelebihan satu cara.. Sedangkan orang gagal selalu kelebihan satu alasan', NULL, NULL, NULL, '2021-06-29 05:05:58', '2021-06-29 05:05:58', NULL, NULL, 'hendry', 'Kabupaten Sidoarjo', 'Jawa Timur', NULL),
(7, 7, NULL, NULL, '<p>Pertama kenal Evoush di Fb dengan bapak dir langsung..<br />Awalnya diperkenalkan produk dan sistem marketing<br />Buat sya ini ada peluang usaha sangat bagus..selain produk2 bermanfaat juga peluang usaha yg sngat baik dimasa sperti sekarang ini / pandemi covid 19<br />Selain bisnis nya yg sangat mudah dilakukan sy memperkanalkan ke semua kalangan sperti anak sekolah SMA .ibu rumah tangga..Karyawan swasta dan ASN juga mau mengambil peluang usaha evoush ini<br />Dan disela2 kesibukan sy sbgai Ibu Rumah Tangga dan Pengusaha dan tetap bisa memperkenalkan bisnis evoush kepada teman2<br />Dengan bermodal hanya 3,2 jt saya sdh mendpatkan omset smpai 35 jt an dan mencapai posisi saphire</p>', NULL, '2021-06-29 05:13:00', '2021-06-29 05:13:00', NULL, NULL, NULL, 'Kabupaten Lombok Tengah', 'Nusa Tenggara Barat', NULL),
(8, 8, 'Dunia ini dipenui dengan orang-orang baik dan jika kamu tidak dapat menemukannya, jadilah salah satunya', NULL, '<p>Berkomitmen yang kuat untuk selalu maju dan selalu menyampaikan informasi tentang berbisnis di evoush. Baik itu manfaat produknya maupun system bisnisnya yang handal, selalu belajar ...</p>', NULL, '2021-06-29 05:16:59', '2021-06-29 05:16:59', NULL, NULL, NULL, 'Kabupaten Kapuas', 'Kalimantan Tengah', NULL),
(9, 9, NULL, NULL, NULL, NULL, '2021-06-29 05:19:16', '2021-06-29 05:19:16', NULL, 'reninurhayati', NULL, 'Kabupaten Kendal', 'Jawa Tengah', NULL),
(10, 10, NULL, NULL, '<p>Hallo ... nama saya <strong>omay tri wahyuni</strong> saya mantan BMI Taiwan sy pernah menjadi leader di Duta Network indonesia, &amp; sekarang saya jadi ibu rumah tangga,sekaligus online olshop, saya jg ada beberapa bln ini <strong>gabung di Evoush</strong>, sy mulai dri nol di Evoush &amp; alhamdulilah sdh mendapatkan bonus nya, bsr harapan sy di Evoush ini sy ingin success, beribadah ketanah suci &amp; jdi leader besar yg bertanggung jawab sm team nya &amp; menebar terus <strong>manfaat produk Evoush</strong> kesemua kalangan masyarakat indonesia &amp; luar negri</p>', NULL, '2021-06-29 05:31:09', '2021-06-29 05:31:09', 'yuliagtulooh', 'omaytriwahyuni', 'https://www.youtube.com/channel/UCy_H53ISURYZ37d7wmOk2Ag', 'Kota Bogor', 'Jawa Barat', NULL),
(11, 11, 'there is only one thing that make a dream impossible to achieve; the fear of failure', NULL, '<p>&lt;p&gt;&amp;nbsp;mendapatkan &lt;strong&gt;3 nasabah asuransi&lt;/strong&gt; dalam seminggu dan&lt;strong&gt; mendapat 7 bintang&lt;/strong&gt;&lt;/p&gt;</p>', NULL, '2021-06-29 08:01:02', '2021-06-29 08:01:02', NULL, NULL, NULL, 'Kabupaten Sidoarjo', 'Jawa Timur', NULL),
(12, 12, 'Tidak ada eskalator menuju sukses.Kamu harus berani menaiki tangga demi tangga menuju puncak,tidak ada jalan pintas.', NULL, NULL, NULL, '2021-07-01 04:12:34', '2021-07-02 08:28:01', NULL, NULL, NULL, 'Kabupaten Sidoarjo', 'Jawa Timur', 'kinclong/parallax/XOqXGVTCPcjDUb8MIZ8mdf52dLqKMPHsWXjVaCvU.jpg');

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
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `roles`, `address`, `phone`, `avatar`, `status`) VALUES
(1, 'puji ermanto', 'pujiermanto@gmail.com', NULL, '$2y$10$5Mib7Q.KxYo0LXpegbOpCOWy6uQ5CqSDn02QkD/FT0.WemStEtz3q', NULL, '2021-05-28 07:34:40', '2021-06-15 09:37:48', 'administrator', '[\"ADMIN\"]', 'Jl. Boeing Utara 1 No.7', '6288222668778', 'avatars/ONphyuv1xbK6g3YkKrsZG5OS6q4HrBVZtbp1ELcX.png', 'ACTIVE'),
(2, 'evoush author', 'evoushauthor@evoush.com', NULL, '$2y$10$lZ1LcyoA9VlyE0By4TuRGOCraIcyZ630KyaLw2hRnCG2/Nk65lyby', NULL, '2021-06-28 00:19:31', '2021-06-28 00:19:31', 'evoush_author2021', '[\"AUTHOR\"]', 'Pergudangan sirie Blok-S/20', '6288222668778', 'avatars/pUz1wibOjtyfJpjM9IFOd8hDYNGUI7FCCX0WCKLj.jpg', 'ACTIVE'),
(3, 'citra devijianti', 'citradevi@evoush.com', NULL, '$2y$10$AlE8YdRhpJJnNLcxIFloO.tGodHajpj8wA6EJX893Q9umhtj9BBQm', NULL, '2021-06-29 04:28:03', '2021-06-29 04:28:03', 'citradevi', '[\"MEMBER\"]', NULL, '6285649000069', 'citradevi/profile/8emfcTiHm7VPhNqcoO7BlGFxaVlfMd6IGs5azpsI.png', 'ACTIVE'),
(4, 'saidah laila', 'saidahlaila@evoush.com', NULL, '$2y$10$PkjcW63fJAE70ecJtQ0PMuie0RunquyzzRZfwLBDW3hQXMmKgGz6S', NULL, '2021-06-29 04:40:20', '2021-06-29 04:40:20', 'saidahlaila', '[\"MEMBER\"]', NULL, '6285347231325', 'saidahlaila/profile/C8XdULsc3fKXKSMbun6wtJT6huyxhvsY2Wd3PYaU.png', 'ACTIVE'),
(5, 'Endang Ekawati,S.E', 'putriku@evoush.com', NULL, '$2y$10$k2sVowHeONULiTUKAX554uyIiZUDh7tKlJ4RORv1jWmPtbM71u1fW', NULL, '2021-06-29 05:03:56', '2021-06-29 05:03:56', 'putriku', '[\"MEMBER\"]', NULL, '6285225497552', 'putriku/profile/2ruhNc7az5e6bfwoFVFvjgW75IjvgVhBmm8bIcWy.png', 'ACTIVE'),
(6, 'hendriyanto', 'hendry@evoush.com', NULL, '$2y$10$o4MACEXM0Yr9Bmwbnoobfudpa7A1yC32mB7OHRo3zJYs5q9JimlMm', NULL, '2021-06-29 05:05:57', '2021-06-29 05:05:57', 'hendry', '[\"MEMBER\"]', NULL, '6281230174799', 'hendry/profile/SrPPERzayU7a9W3Pff7ziYUoX5oysaHU4YMwZsRj.png', 'ACTIVE'),
(7, 'Ratmina', 'ratmina@evoush.com', NULL, '$2y$10$RPDLhJo8aX0t1UX4t.ppG.HvUa7iSdsdow5od6Cgcmea4pNdBSobe', NULL, '2021-06-29 05:12:58', '2021-06-29 05:12:58', 'ratmina', '[\"MEMBER\"]', NULL, '6282237984519', 'ratmina/profile/cddC2WgpDF9DwUum3MOkUNVsKN22usfaZwrwuqfa.png', 'ACTIVE'),
(8, 'Rahmad', 'rahmad@evoush.com', NULL, '$2y$10$lw1SOTDadyjk5aC0PzeATeYrgEorBAAU7iobaqu4GmXLemrtsIcdG', NULL, '2021-06-29 05:16:58', '2021-06-29 05:16:58', 'rahmadisa', '[\"MEMBER\"]', NULL, '6282157497162', 'rahmadisa/profile/8jRbMys4juzPGZrXFxeerVgRHVQ9Xfg2TEPXTIj1.png', 'ACTIVE'),
(9, 'Reni Nurhayati', 'nurhayati.reni.nr@gmail.com', NULL, '$2y$10$h7Y1X0p2BVvKG0t5G8EY3OP/wYHCmvnbbekOcILKDAVvkx.jhgmKK', NULL, '2021-06-29 05:19:15', '2021-06-29 05:19:15', 'salwa', '[\"MEMBER\"]', NULL, '6282299683355', NULL, 'ACTIVE'),
(10, 'omay tri wahyuni', 'a0903991328@gmail.com', NULL, '$2y$10$B6A/4d1YXknvKfIY0/Ivp.ziMpkvbj1B1u823/1e0PSnFEJ/Q3/CG', NULL, '2021-06-29 05:31:08', '2021-06-29 05:31:08', 'youlia', '[\"MEMBER\"]', NULL, '6289514462738', NULL, 'ACTIVE'),
(11, 'Suprihanik Mujiastuti,SE', 'hanik.hansel@gmail.com', NULL, '$2y$10$3QxVI19L6YTxvCHXxm2psOfpvXg5Ei/n3tTg2ueTEKp9r3GTzUycW', NULL, '2021-06-29 08:01:00', '2021-06-29 08:01:00', 'hanik', '[\"MEMBER\"]', NULL, '6282264640950', NULL, 'ACTIVE'),
(12, 'Tutik Rahayu', 'kinclong@evoush.com', NULL, '$2y$10$dkMBXFp9MzVIVP89ib2ZUeZC6OfnjeNwcsOvl3.76xz7CqYd0Zexa', NULL, '2021-07-01 04:12:31', '2021-07-02 09:39:25', 'kinclong', '[\"MEMBER\"]', NULL, '6282131609949', 'kinclong/profile/5D006BbpiCoMKxTgxR0SJUixh4KCfcOSJWT6nRz9.jpg', 'ACTIVE');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contact_message`
--
ALTER TABLE `contact_message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
