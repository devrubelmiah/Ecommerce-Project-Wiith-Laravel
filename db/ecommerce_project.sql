-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 08:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$sdGAMKuemBfzG3IivZl58uOzluu7WxPzLWzaQOvduQk4bEwV.8kxm', NULL, '2021-04-05 05:09:41', '2021-04-05 05:09:41'),
(3, 'lover Hero', 'rubel99999@gmail.com', NULL, '$2y$10$uwPz8q9VRuJN3up0OOpg0ubnI6HDgwN3Mgxc.guflk6PDtMwYHfiO', NULL, '2021-04-05 05:25:01', '2021-04-05 05:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `slug`, `photo`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'make your <br> site stunning with <br> large title test', 'make-your-br-site-stunning-with-br-large-title-test', 'make-your-br-site-stunning-with-br-large-title-test-2104152240-1618485760-709.jpg', '<p>Hipster style is a fashion trending for Gentleman and Lady<br />with tattoos. You&rsquo;ll become so cool and attractive with your&rsquo;s girl.<br />Now let come hare and grab it now ! test</p>', 'active', '2021-04-15 03:56:06', '2021-05-17 23:33:07'),
(3, 'What is Lorem Ipsum?', 'what-is-lorem-ipsum', 'what-is-lorem-ipsum-2105183244-1621315964-213.jpg', '<div>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the</p>\r\n<p>printing and typesetting industry. Lorem Ipsum</p>\r\n<p>has been the industry\'s standard dummy text ever</p>\r\n<p>since the 1500s, when an unknown printer</p>\r\n</div>\r\n<div>&nbsp;</div>', 'active', '2021-05-17 23:32:46', '2021-05-17 23:32:46'),
(4, 'Where does it come from?', 'where-does-it-come-from', 'where-does-it-come-from-2105183428-1621316068-697.jpg', '<p>Contrary to popular belief, Lorem Ipsum</p>\r\n<p>is not simply random text.</p>\r\n<p>It has roots in a piece of classical</p>\r\n<p>Latin literature from 45 BC, making it over 2000 years old.</p>\r\n<p>&nbsp;</p>', 'active', '2021-05-17 23:34:29', '2021-05-17 23:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Symphony', 'symphony', 'active', '2021-04-11 05:28:00', '2021-04-11 05:28:00'),
(3, 'Samsung', 'samsung-2104112904-1618140544-673', 'active', '2021-04-11 05:29:04', '2021-04-11 05:29:04'),
(6, 'Walton', 'walton', 'active', '2021-07-22 23:56:57', '2021-07-22 23:56:57'),
(7, 'huawei', 'huawei', 'active', '2021-07-22 23:57:31', '2021-07-22 23:57:31'),
(8, 'HTC', 'htc', 'active', '2021-07-22 23:57:55', '2021-07-22 23:57:55'),
(9, 'Realme', 'realme', 'active', '2021-07-22 23:58:20', '2021-07-22 23:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `branners`
--

CREATE TABLE `branners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `status` enum('new','proccess','delivered','cancel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `quantity` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorgy__blog__posts`
--

CREATE TABLE `categorgy__blog__posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_cat_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorgy__blog__posts`
--

INSERT INTO `categorgy__blog__posts` (`id`, `post_id`, `post_cat_id`, `created_at`, `updated_at`) VALUES
(6, 9, 4, NULL, NULL),
(7, 9, 1, NULL, NULL),
(8, 10, 3, NULL, NULL),
(9, 11, 8, NULL, NULL),
(10, 11, 6, NULL, NULL),
(11, 11, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_parent` tinyint(1) NOT NULL DEFAULT 1,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `added_by` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `summary`, `photo`, `is_parent`, `parent_id`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(18, 'Samsung', 'samsung-2105185843-1621321123-17', '<p>this is same samsung brand.</p>', 'samsung-2105185842-1621321122-819.jpg', 1, NULL, 1, 'active', '2021-04-16 01:53:43', '2021-05-18 00:58:43'),
(19, 'Apple', 'apple-2105180053-1621321253-101', '<p>Apple is supper brand in hole world..</p>', 'apple-2105180052-1621321252-546.jpg', 1, NULL, 1, 'active', '2021-04-16 02:12:50', '2021-05-18 01:01:13'),
(20, 'Sony', 'sony-2107230039-1627041639-700', '<p>test love</p>', 'sony-2107230039-1627041639-394.jpg', 1, NULL, 1, 'active', '2021-04-22 02:31:10', '2021-07-23 06:00:39'),
(21, 'Symphony', 'symphony', '<div>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>&nbsp;</div>', 'symphony-2105180118-1621321278-37.jpg', 1, NULL, 1, 'active', '2021-04-22 02:38:54', '2021-05-18 01:01:21'),
(22, 'Mobile', 'mobile-2107230201-1627041721-78', '<p>it is mobile.</p>', 'mobile-2107230200-1627041720-131.jpg', 1, NULL, 1, 'active', '2021-04-22 02:52:14', '2021-07-23 06:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('fixed','percent') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fixed',
  `value` decimal(20,2) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `status`, `created_at`, `updated_at`) VALUES
(3, 'abc-1212', 'percent', '25.00', 'active', '2021-06-06 00:12:24', '2021-06-06 00:12:24'),
(4, 'fx-1212', 'fixed', '50.00', 'active', '2021-06-06 00:13:07', '2021-06-06 00:13:07'),
(5, 'yearofday-250', 'percent', '15.00', 'active', '2021-07-23 00:00:29', '2021-07-23 00:00:52');

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
(4, '2021_04_05_090356_create_admins_table', 1),
(5, '2021_04_10_190032_create_brands_table', 2),
(7, '2021_04_14_130538_create_banners_table', 3),
(8, '2021_04_15_113948_create_categories_table', 4),
(9, '2021_04_16_090113_create_products_table', 5),
(11, '2021_04_16_103733_create_product__images_table', 6),
(12, '2021_04_28_121847_create_post_categories_table', 7),
(13, '2021_04_28_122458_create_post_tags_table', 7),
(14, '2021_04_28_122855_create_posts_table', 7),
(15, '2021_04_28_171456_create_categorgy__blog__posts_table', 8),
(16, '2021_04_28_172713_create_tag__blog__posts_table', 8),
(21, '2021_05_21_060240_create_shippings_table', 9),
(22, '2021_05_21_060314_create_orders_table', 9),
(23, '2021_05_21_060512_create_carts_table', 9),
(24, '2021_06_03_074849_create_notifications_table', 10),
(26, '2021_06_03_075435_create_wishlists_table', 10),
(27, '2021_06_03_075256_create_coupons_table', 11),
(28, '2021_07_01_023136_create_product_reviews_table', 12),
(29, '2021_07_01_023448_create_post_comments_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `shipping_id` int(10) UNSIGNED DEFAULT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` double(8,2) NOT NULL,
  `coupon` double(8,2) DEFAULT NULL,
  `total_amount` double(8,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `payment_method` enum('cod','stripe') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cod',
  `payment_status` enum('paid','unpaid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `status` enum('new','proccess','delivered','cancel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shipping_id`, `order_number`, `sub_total`, `coupon`, `total_amount`, `quantity`, `payment_method`, `payment_status`, `status`, `first_name`, `last_name`, `email`, `phone`, `country`, `post_code`, `address1`, `address2`, `created_at`, `updated_at`) VALUES
(8, 1, 7, 'ORD-WZTYWWIH5W', 3735.00, NULL, 4135.00, 6, 'stripe', 'paid', 'new', 'lover', 'hero', 'lover@gmail.com', '0138999999', 'US', '1212', 'Mirpur', 'Dhaka', '2021-07-18 05:09:01', '2021-07-18 05:28:24'),
(9, 3, NULL, 'ORD-5IFYUFLRB6', 1140.00, NULL, 1140.00, 2, 'stripe', 'paid', 'new', 'lover test', 'hero k', 'loving@gmail.com', '0138999999', 'DZ', '1212', 'Mirpur', 'Dhaka', '2021-07-18 05:37:28', '2021-07-18 05:38:07'),
(10, 3, 7, 'ORD-N9LHDBS4AI', 495.00, NULL, 895.00, 1, 'cod', 'unpaid', 'new', 'lover', 'Test', 'user@gmail.com', '0138999999', 'US', '1216', 'ooo', 'Dhaka', '2021-07-18 05:43:29', '2021-07-18 05:43:29');

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quote` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_cat_id` int(10) UNSIGNED DEFAULT NULL,
  `post_tag_id` int(10) UNSIGNED DEFAULT NULL,
  `added_by` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `summary`, `description`, `quote`, `photo`, `post_cat_id`, `post_tag_id`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pharetra cursus nisl, ac molestie enim tempus eget. Nulla interdum, tellus sed elementum lacinia, eros nibh cursus augue, eu feugiat lectus mi et orci. Pellentesque a tellus at lorem dignissim varius nec non ante. Mauris blandit, sapien in consectetur rutrum, magna tellus consequat est, quis venenatis ipsum tortor nec orci. Vivamus a est eu nisl consequat euismod. Proin aliquam fringilla nunc a aliquam. Proin mattis rutrum diam. Donec viverra purus sit amet lacus lacinia, eu tristique risus cursus.</p>', '<p>Vestibulum consectetur consectetur felis id mattis. Nunc luctus tortor felis, eget tincidunt lorem feugiat vitae. Vestibulum vel lacinia ligula. Fusce ullamcorper nunc eros, ut dictum metus semper et. Etiam lacinia consectetur tellus. Nulla porta diam et imperdiet viverra. Nullam posuere at enim nec suscipit. Curabitur non dui id diam aliquet venenatis eu non justo. Suspendisse potenti. Nam arcu urna, eleifend et consectetur vitae, finibus vulputate ante.</p>\r\n<p>Maecenas at sollicitudin metus. Aliquam consectetur maximus mi, non venenatis magna facilisis id. Nam non volutpat eros, et hendrerit eros. Aliquam accumsan facilisis neque quis ornare. Aliquam erat volutpat. Integer sit amet congue urna. Vivamus vitae felis in tortor tincidunt fermentum vel a nibh. Phasellus lobortis sodales enim, ut vulputate leo pellentesque ac. Sed in elit a dui vestibulum bibendum at ut mauris. Vestibulum ultricies non orci sit amet blandit. Sed viverra velit rutrum dui dignissim sodales. Pellentesque sed egestas enim.</p>\r\n<p>Nullam auctor efficitur mi, eget sagittis sem pulvinar nec. Etiam vehicula molestie diam. Pellentesque sed mauris consectetur, efficitur lacus a, maximus augue. In eleifend, nulla ut ullamcorper tincidunt, est eros suscipit mauris, sit amet vehicula velit arcu vitae justo. In justo nulla, maximus a tortor eget, tincidunt sagittis nisl. Duis elementum lacinia velit, vel bibendum nibh egestas ac. Ut libero orci, scelerisque sed rhoncus ut, interdum ac eros. Etiam ac commodo purus. Ut in risus id erat porta congue ac ac enim. Donec commodo metus nec leo sodales imperdiet elementum non risus. Nam ornare nisi at orci sodales sagittis. Nulla enim nulla, tincidunt efficitur mauris in, vulputate sagittis tortor. Quisque eleifend, nisi in ultricies elementum, velit diam vehicula nisi, ut commodo nisi odio ac leo. Duis in semper nisi. Donec et ornare orci. Nunc eleifend elit vel aliquet varius.</p>\r\n<p>Nam lacinia molestie tortor. Cras sit amet pretium erat. Duis cursus dignissim suscipit. Nunc tincidunt lorem pellentesque, lacinia quam at, cursus enim. Duis sed pulvinar odio, sit amet rhoncus metus. Nam quis porttitor purus. Nunc semper tempor interdum. Nunc interdum dui odio, bibendum varius quam finibus a. Donec neque libero, pretium ac sapien nec, accumsan maximus felis. Curabitur at mattis lorem. Pellentesque vel justo purus.</p>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pharetra cursus nisl, ac molestie enim tempus eget. Nulla interdum, tellus sed elementum lacinia, eros nibh cursus augue, eu feugiat lectus mi et orci. Pellentesque a tellus at lorem dignissim varius nec non ante. Mauris blandit, sapien in consectetur rutrum, magna tellus consequat est, quis venenatis ipsum tortor nec orci. Vivamus a est eu nisl consequat euismod. Proin aliquam fringilla nunc a aliquam. Proin mattis rutrum diam. Donec viverra purus sit amet lacus lacinia, eu tristique risus cursus.', 'lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-2105165640-1621133800-769.jpg', NULL, NULL, 1, 'active', '2021-05-15 20:56:40', '2021-05-15 20:56:40'),
(10, 'Nulla interdum, tellus sed elementum lacinia, eros nibh cursus augue.', 'nulla-interdum-tellus-sed-elementum-lacinia-eros-nibh-cursus-augue-2105202807-1621474087-451', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pharetra cursus nisl, ac molestie enim tempus eget. Nulla interdum, tellus sed elementum lacinia, eros nibh cursus augue, eu feugiat lectus mi et orci. Pellentesque a tellus at lorem dignissim varius nec non ante. Mauris blandit, sapien in consectetur rutrum, magna tellus consequat est, quis venenatis ipsum tortor nec orci. Vivamus a est eu nisl consequat euismod. Proin aliquam fringilla nunc a aliquam. Proin mattis rutrum diam. Donec viverra purus sit amet lacus lacinia, eu tristique risus cursus.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pharetra cursus nisl, ac molestie enim tempus eget. Nulla interdum, tellus sed elementum lacinia, eros nibh cursus augue, eu feugiat lectus mi et orci. Pellentesque a tellus at lorem dignissim varius nec non ante. Mauris blandit, sapien in consectetur rutrum, magna tellus consequat est, quis venenatis ipsum tortor nec orci. Vivamus a est eu nisl consequat euismod. Proin aliquam fringilla nunc a aliquam. Proin mattis rutrum diam. Donec viverra purus sit amet lacus lacinia, eu tristique risus cursus.</p>\r\n<p>Vestibulum consectetur consectetur felis id mattis. Nunc luctus tortor felis, eget tincidunt lorem feugiat vitae. Vestibulum vel lacinia ligula. Fusce ullamcorper nunc eros, ut dictum metus semper et. Etiam lacinia consectetur tellus. Nulla porta diam et imperdiet viverra. Nullam posuere at enim nec suscipit. Curabitur non dui id diam aliquet venenatis eu non justo. Suspendisse potenti. Nam arcu urna, eleifend et consectetur vitae, finibus vulputate ante.</p>\r\n<p>Maecenas at sollicitudin metus. Aliquam consectetur maximus mi, non venenatis magna facilisis id. Nam non volutpat eros, et hendrerit eros. Aliquam accumsan facilisis neque quis ornare. Aliquam erat volutpat. Integer sit amet congue urna. Vivamus vitae felis in tortor tincidunt fermentum vel a nibh. Phasellus lobortis sodales enim, ut vulputate leo pellentesque ac. Sed in elit a dui vestibulum bibendum at ut mauris. Vestibulum ultricies non orci sit amet blandit. Sed viverra velit rutrum dui dignissim sodales. Pellentesque sed egestas enim.</p>\r\n<p>Nullam auctor efficitur mi, eget sagittis sem pulvinar nec. Etiam vehicula molestie diam. Pellentesque sed mauris consectetur, efficitur lacus a, maximus augue. In eleifend, nulla ut ullamcorper tincidunt, est eros suscipit mauris, sit amet vehicula velit arcu vitae justo. In justo nulla, maximus a tortor eget, tincidunt sagittis nisl. Duis elementum lacinia velit, vel bibendum nibh egestas ac. Ut libero orci, scelerisque sed rhoncus ut, interdum ac eros. Etiam ac commodo purus. Ut in risus id erat porta congue ac ac enim. Donec commodo metus nec leo sodales imperdiet elementum non risus. Nam ornare nisi at orci sodales sagittis. Nulla enim nulla, tincidunt efficitur mauris in, vulputate sagittis tortor. Quisque eleifend, nisi in ultricies elementum, velit diam vehicula nisi, ut commodo nisi odio ac leo. Duis in semper nisi. Donec et ornare orci. Nunc eleifend elit vel aliquet varius.</p>\r\n<p>Nam lacinia molestie tortor. Cras sit amet pretium erat. Duis cursus dignissim suscipit. Nunc tincidunt lorem pellentesque, lacinia quam at, cursus enim. Duis sed pulvinar odio, sit amet rhoncus metus. Nam quis porttitor purus. Nunc semper tempor interdum. Nunc interdum dui odio, bibendum varius quam finibus a. Donec neque libero, pretium ac sapien nec, accumsan maximus felis. Curabitur at mattis lorem. Pellentesque vel justo purus.</p>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pharetra cursus nisl, ac molestie enim tempus eget. Nulla interdum, tellus sed elementum lacinia, eros nibh cursus augue, eu feugiat lectus mi et orci. Pellentesque a tellus at lorem dignissim varius nec non ante. Mauris blandit, sapien in consectetur rutrum, magna tellus consequat est, quis venenatis ipsum tortor nec orci. Vivamus a est eu nisl consequat euismod. Proin aliquam fringilla nunc a aliquam. Proin mattis rutrum diam. Donec viverra purus sit amet lacus lacinia, eu tristique risus cursus.', 'nulla-interdum-tellus-sed-elementum-lacinia-eros-nibh-cursus-augue-2105160100-1621134060-576.jpg', NULL, NULL, 1, 'active', '2021-05-15 21:01:01', '2021-05-19 19:28:07'),
(11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-2105203814-1621474694-28', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut cursus tincidunt est et cursus. Etiam at dui luctus, vestibulum velit sed, venenatis massa. Nam tincidunt placerat blandit. Maecenas lobortis lorem elementum, aliquam quam tristique, volutpat neque. Praesent ac turpis fermentum sapien mollis facilisis mattis scelerisque metus. Quisque cursus blandit mauris pellentesque tempus. Donec lacinia condimentum ex quis mollis. Suspendisse potenti. Donec posuere dolor quis tortor dictum, et dapibus ante maximus. Proin pretium ipsum tortor, sed tristique nunc posuere in. Nullam sollicitudin eget velit nec rutrum. Etiam vitae sapien urna. Ut ut dapibus augue. Vestibulum imperdiet vestibulum consectetur.</p>', '<div id=\"lipsum\">\r\n<p>Suspendisse consectetur rutrum erat et lacinia. Praesent et velit a ipsum maximus commodo. Nunc scelerisque lectus at accumsan semper. Curabitur vel sem est. Morbi nunc leo, condimentum rhoncus fermentum a, tincidunt eu nulla. Proin scelerisque libero cursus, pulvinar nisi et, convallis turpis. Morbi non neque pulvinar, consequat ligula quis, ultricies dolor. Ut eget erat nulla. Etiam maximus efficitur neque in tincidunt. Nunc tincidunt orci quam, nec tempus tortor suscipit eu. Pellentesque sed aliquam neque, non suscipit massa. Donec non nunc at turpis tristique gravida sed eu quam. Fusce sagittis libero nisi, a eleifend urna efficitur ac. Suspendisse sit amet neque erat. Proin a varius ex. Praesent sit amet ornare neque, at dignissim orci.</p>\r\n<p>Nam commodo felis libero, eget varius risus finibus et. Quisque varius faucibus lorem, sit amet condimentum ipsum dignissim ut. Etiam non interdum nibh. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean quis sapien ac neque aliquam sollicitudin. Pellentesque vestibulum ligula vitae tortor viverra placerat. Donec vitae orci augue. In pretium nisi ac ligula vehicula, et rhoncus lectus varius. In finibus, dui elementum ultrices faucibus, leo augue feugiat lacus, nec sollicitudin erat sem nec dui. Ut pellentesque, est iaculis accumsan venenatis, nibh ipsum elementum odio, sit amet ultrices mauris dolor a nunc.</p>\r\n<p>Mauris dolor massa, tristique eget suscipit in, gravida id elit. Maecenas ac pellentesque tortor, et mattis diam. Vestibulum iaculis nulla lectus, non interdum felis consectetur at. Mauris sagittis scelerisque tortor, ac molestie tortor egestas et. Maecenas eget interdum mauris. Etiam fermentum tempus urna, vitae interdum urna faucibus sed. Fusce porttitor volutpat metus ultrices dictum. Aliquam tristique erat et dolor sodales mattis. Nullam scelerisque metus eu neque blandit, ut sollicitudin velit convallis. Sed facilisis quam a nunc lacinia dignissim. Morbi eget dictum risus, sed egestas odio. Vestibulum suscipit massa suscipit turpis sagittis sollicitudin. Maecenas imperdiet justo velit, vitae bibendum arcu interdum hendrerit.</p>\r\n<p>Nulla condimentum lorem vitae urna bibendum lacinia. Vestibulum semper magna at ante interdum congue. Mauris nisi nulla, maximus et elit at, dictum rhoncus ante. In tempor libero a massa scelerisque, sed mattis lorem rutrum. Curabitur ac ipsum erat. Fusce hendrerit, enim malesuada consequat convallis, risus sem vehicula neque, eget efficitur lorem sapien at mauris. Ut in magna in risus ultricies semper ac at lectus.</p>\r\n</div>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut cursus tincidunt est et cursus. Etiam at dui luctus, vestibulum velit sed, venenatis massa. Nam tincidunt placerat blandit. Maecenas lobortis lorem elementum, aliquam quam tristique, volutpat neque. Praesent ac turpis fermentum sapien mollis facilisis mattis scelerisque metus.', 'lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-2105203814-1621474694-367.jpg', NULL, NULL, 1, 'active', '2021-05-19 19:38:14', '2021-05-19 19:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Blog + Furm', 'blog-furm', 'active', '2021-04-28 13:12:43', '2021-04-28 13:18:12'),
(3, 'Bootstrap', 'bootstrap', 'active', '2021-04-28 13:23:26', '2021-04-28 13:23:26'),
(4, 'Blog', 'blog', 'active', '2021-05-11 02:10:01', '2021-05-11 02:10:01'),
(5, 'Laravel', 'laravel', 'active', '2021-05-19 19:30:49', '2021-05-19 19:31:01'),
(6, 'VueJs', 'vuejs', 'active', '2021-05-19 19:31:17', '2021-05-19 19:31:17'),
(7, 'PHP', 'php', 'active', '2021-05-19 19:31:27', '2021-05-19 19:31:27'),
(8, 'SQL', 'sql', 'active', '2021-05-19 19:31:52', '2021-05-19 19:31:52'),
(9, 'ReactJs', 'reactjs', 'active', '2021-05-19 19:32:26', '2021-05-19 19:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `replied_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`id`, `user_id`, `post_id`, `comment`, `status`, `replied_comment`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, 2, 11, 'This is very best article', 'active', NULL, NULL, '2021-07-01 23:41:48', '2021-07-01 23:41:48'),
(3, 1, 11, 'lover', 'active', NULL, NULL, '2021-07-01 23:55:08', '2021-07-01 23:55:08'),
(5, 1, 10, 'Carry on', 'active', NULL, NULL, '2021-07-02 00:14:19', '2021-07-02 00:14:19'),
(6, NULL, NULL, 'Carry on future', 'inactive', NULL, NULL, '2021-07-03 03:40:52', '2021-07-03 03:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 'HTML + CSS', 'html-css', 'inactive', '2021-04-28 13:46:06', '2021-04-28 15:54:47'),
(4, 'jquery', 'jquery', 'active', NULL, NULL),
(5, 'css', 'css', 'active', NULL, NULL),
(6, 'npm', 'npm', 'active', '2021-05-19 19:34:10', '2021-05-19 19:34:10'),
(7, 'database', 'database', 'active', '2021-05-19 19:34:37', '2021-05-19 19:34:37'),
(8, 'ajax', 'ajax', 'active', '2021-05-19 19:34:59', '2021-05-19 19:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 1,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'm',
  `condition` enum('default','new','hot') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `price` double(8,2) DEFAULT 123.45,
  `discount` double(8,2) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `cat_id` int(10) UNSIGNED DEFAULT NULL,
  `child_cat_id` int(10) UNSIGNED DEFAULT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `summary`, `description`, `photo`, `stock`, `size`, `condition`, `status`, `price`, `discount`, `is_featured`, `cat_id`, `child_cat_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(9, 'What is Lorem Ipsum?', 'what-is-lorem-ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'what-is-lorem-ipsum-2105194935-1621388975-326.jpg', 10, 'M,L', 'hot', 'active', 200.00, 10.00, 1, 21, NULL, 1, '2021-05-18 19:49:36', '2021-05-18 19:49:36'),
(10, 'Where does it come from?', 'where-does-it-come-from', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'where-does-it-come-from-2105195157-1621389117-82.jpg', 12, 'M,XL', 'new', 'active', 1200.00, 20.00, 1, 21, NULL, 1, '2021-05-18 19:51:58', '2021-05-18 19:51:58'),
(11, 'Why do we use it?', 'why-do-we-use-it', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using and the like</p>', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'why-do-we-use-it-2105195420-1621407260-105.jpg', 12, 'M,L,XL', 'hot', 'active', 600.00, 10.00, 1, 19, NULL, 3, '2021-05-19 00:54:21', '2021-05-19 00:54:21'),
(14, 'What is Lorem Ipsum?', 'what-is-lorem-ipsum', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '<div>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>&nbsp;</div>', 'what-is-lorem-ipsum-2107233416-1627022056-113.jpg', 12, 'M,L', 'default', 'active', 150.00, 10.00, 1, 22, NULL, 8, '2021-07-23 00:34:17', '2021-07-23 00:34:17'),
(15, 'Where does it come from?', 'where-does-it-come-from', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', 'where-does-it-come-from-2107230430-1627027470-404.jpg', 12, 'M,L', 'default', 'active', 320.00, 10.00, 1, 22, NULL, 9, '2021-07-23 02:04:30', '2021-07-23 02:04:30'),
(16, 'Why do we use it?', 'why-do-we-use-it', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'why-do-we-use-it-2107231926-1627028366-584.jpg', 12, 'S', 'new', 'active', 520.00, 5.00, 1, 20, NULL, 8, '2021-07-23 02:19:26', '2021-07-23 02:19:26'),
(17, 'Where can I get some?', 'where-can-i-get-some', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'where-can-i-get-some-2107232209-1627028529-807.jpg', 12, 'M', 'hot', 'active', 2500.00, 12.00, 1, 19, NULL, 6, '2021-07-23 02:22:09', '2021-07-23 02:22:09'),
(18, 'Where can I get some?', 'where-can-i-get-some', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'where-can-i-get-some-2107234057-1627040457-898.jpg', 18, 'S,M,L', 'new', 'active', 520.00, 7.00, 1, 18, NULL, 3, '2021-07-23 05:40:58', '2021-07-23 05:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `rate` tinyint(4) NOT NULL DEFAULT 0,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `user_id`, `product_id`, `rate`, `review`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 3, 'test test p', 'inactive', '2021-07-01 01:06:26', '2021-07-03 02:02:48'),
(3, 3, 10, 4, 'Hey Every body look at me. ', 'active', '2021-03-16 18:02:47', '2021-04-21 20:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `product__images`
--

CREATE TABLE `product__images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product__images`
--

INSERT INTO `product__images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(30, 9, 'muspi-merol-si-tahw-2105194936-1621388976-1189.jpg', '2021-05-18 19:49:36', '2021-05-18 19:49:36'),
(31, 9, 'muspi-merol-si-tahw-2105194937-1621388977-1574.jpg', '2021-05-18 19:49:37', '2021-05-18 19:49:37'),
(32, 10, 'morf-emoc-ti-seod-erehw-2105195158-1621389118-3070.jpg', '2021-05-18 19:51:58', '2021-05-18 19:51:58'),
(33, 10, 'morf-emoc-ti-seod-erehw-2105195158-1621389118-1521.jpg', '2021-05-18 19:51:59', '2021-05-18 19:51:59'),
(34, 11, 'ti-esu-ew-od-yhw-2105195421-1621407261-1485.jpg', '2021-05-19 00:54:22', '2021-05-19 00:54:22'),
(35, 11, 'ti-esu-ew-od-yhw-2105195422-1621407262-2337.jpg', '2021-05-19 00:54:22', '2021-05-19 00:54:22'),
(38, 14, 'muspi-merol-si-tahw-2107233418-1627022058-2024.jpg', '2021-07-23 00:34:18', '2021-07-23 00:34:18'),
(39, 14, 'muspi-merol-si-tahw-2107233418-1627022058-1929.jpg', '2021-07-23 00:34:18', '2021-07-23 00:34:18'),
(40, 15, 'morf-emoc-ti-seod-erehw-2107230430-1627027470-2319.jpg', '2021-07-23 02:04:31', '2021-07-23 02:04:31'),
(41, 15, 'morf-emoc-ti-seod-erehw-2107230431-1627027471-2985.jpg', '2021-07-23 02:04:31', '2021-07-23 02:04:31'),
(42, 16, 'ti-esu-ew-od-yhw-2107231926-1627028366-1217.jpg', '2021-07-23 02:19:26', '2021-07-23 02:19:26'),
(43, 16, 'ti-esu-ew-od-yhw-2107231926-1627028366-1466.jpg', '2021-07-23 02:19:26', '2021-07-23 02:19:26'),
(44, 17, 'emos-teg-i-nac-erehw-2107232209-1627028529-2571.jpg', '2021-07-23 02:22:09', '2021-07-23 02:22:09'),
(45, 17, 'emos-teg-i-nac-erehw-2107232209-1627028529-2382.jpg', '2021-07-23 02:22:10', '2021-07-23 02:22:10'),
(46, 18, 'emos-teg-i-nac-erehw-2107234058-1627040458-3025.jpg', '2021-07-23 05:40:58', '2021-07-23 05:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `type`, `price`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Dhaka', '100.00', 'active', '2021-06-06 04:54:03', '2021-06-06 04:54:03'),
(3, 'CTG', '500.00', 'active', '2021-06-06 04:54:26', '2021-06-06 04:54:26'),
(4, 'Rangpur', '1000.00', 'active', '2021-06-06 04:54:42', '2021-06-06 04:54:42'),
(5, 'Khulna', '700.00', 'active', '2021-06-06 04:55:04', '2021-06-06 04:55:04'),
(6, 'Barisal', '800.00', 'active', '2021-06-06 04:55:26', '2021-06-06 04:55:26'),
(7, 'Comilla', '400.00', 'active', '2021-06-06 04:55:45', '2021-06-06 04:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `tag__blog__posts`
--

CREATE TABLE `tag__blog__posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag__blog__posts`
--

INSERT INTO `tag__blog__posts` (`id`, `post_id`, `post_tag_id`, `created_at`, `updated_at`) VALUES
(5, 9, 5, NULL, NULL),
(6, 9, 2, NULL, NULL),
(7, 10, 4, NULL, NULL),
(8, 11, 8, NULL, NULL),
(9, 11, 6, NULL, NULL),
(10, 11, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', NULL, '$2y$10$cWTbUDCzIHoOodJZ/VRQ1.uXsrD4jx675Gf/oBiHmwrSdwVD2pMfa', NULL, NULL, '2021-04-05 09:34:35', '2021-04-05 09:34:35'),
(2, 'Samsang', 'test@gmail.com', NULL, '$2y$10$GvguzYP2vIB4ZTmKafzAVOZJ6.9ay7OFZ1TG1OG9AZR/W5cmCGM82', NULL, NULL, '2021-04-05 09:40:02', '2021-04-05 09:40:02'),
(3, 'lover Hero', 'loverr@gmail.com', NULL, '$2y$10$z0S6hwR7GyJ3b/XPOXJ2muppIHfgwMEm/PYeQtNw1QT6c1x1TZtWC', NULL, NULL, '2021-05-15 22:59:51', '2021-05-15 22:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `cart_id` int(10) UNSIGNED DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `product_id`, `user_id`, `cart_id`, `price`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
(1, 10, 1, NULL, 960.00, 1, 960.00, '2021-06-05 06:03:17', '2021-06-05 06:03:17'),
(2, 9, 1, NULL, 180.00, 1, 180.00, '2021-06-05 06:04:20', '2021-06-05 06:04:20'),
(3, 11, 1, NULL, 540.00, 1, 540.00, '2021-06-05 06:05:15', '2021-06-05 06:05:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_slug_unique` (`slug`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `branners`
--
ALTER TABLE `branners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branners_slug_unique` (`slug`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Indexes for table `categorgy__blog__posts`
--
ALTER TABLE `categorgy__blog__posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`),
  ADD KEY `categories_added_by_foreign` (`added_by`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_shipping_id_foreign` (`shipping_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_post_cat_id_foreign` (`post_cat_id`),
  ADD KEY `posts_post_tag_id_foreign` (`post_tag_id`),
  ADD KEY `posts_added_by_foreign` (`added_by`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_categories_slug_unique` (`slug`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_comments_user_id_foreign` (`user_id`),
  ADD KEY `post_comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_tags_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cat_id_foreign` (`cat_id`),
  ADD KEY `products_child_cat_id_foreign` (`child_cat_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_reviews_product_id_foreign` (`product_id`),
  ADD KEY `product_reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `product__images`
--
ALTER TABLE `product__images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product__images_product_id_foreign` (`product_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag__blog__posts`
--
ALTER TABLE `tag__blog__posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_cart_id_foreign` (`cart_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `branners`
--
ALTER TABLE `branners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categorgy__blog__posts`
--
ALTER TABLE `categorgy__blog__posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product__images`
--
ALTER TABLE `product__images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tag__blog__posts`
--
ALTER TABLE `tag__blog__posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `shippings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_post_cat_id_foreign` FOREIGN KEY (`post_cat_id`) REFERENCES `post_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_post_tag_id_foreign` FOREIGN KEY (`post_tag_id`) REFERENCES `post_tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_child_cat_id_foreign` FOREIGN KEY (`child_cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product__images`
--
ALTER TABLE `product__images`
  ADD CONSTRAINT `product__images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
