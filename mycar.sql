-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2019 at 01:23 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mycar`
--

-- --------------------------------------------------------

--
-- Table structure for table `abilities`
--

CREATE TABLE `abilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_id` int(10) UNSIGNED DEFAULT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `only_owned` tinyint(1) NOT NULL DEFAULT 0,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `scope` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abilities`
--

INSERT INTO `abilities` (`id`, `name`, `title`, `entity_id`, `entity_type`, `only_owned`, `options`, `scope`, `created_at`, `updated_at`) VALUES
(1, '*', 'All abilities', NULL, '*', 0, NULL, NULL, '2019-05-28 05:56:26', '2019-05-28 05:56:26'),
(2, 'roles', 'إدارة الصلاحيات', NULL, NULL, 0, NULL, NULL, NULL, NULL),
(3, 'admins_manage', 'إدارة الإعضاء', NULL, NULL, 0, NULL, NULL, NULL, NULL),
(4, 'companies_manage', 'الشركات المصنعة', NULL, NULL, 0, NULL, NULL, NULL, NULL),
(5, 'models_manage', 'إدارة الموديلات', NULL, NULL, 0, NULL, NULL, NULL, NULL),
(6, 'products_manage', 'إدارة القطع و المنتجات', NULL, NULL, 0, NULL, NULL, NULL, NULL),
(7, 'users_manage', 'إدارة المستخدمين', NULL, NULL, 0, NULL, NULL, NULL, NULL),
(8, 'suppliers_manage', 'إدارة الموردين', NULL, NULL, 0, NULL, NULL, NULL, NULL),
(9, 'company_model_manage', 'إدارة طلبات العملاء', NULL, NULL, 0, NULL, NULL, NULL, NULL),
(10, 'cities_manage', 'إدارة المدن', NULL, NULL, 0, NULL, NULL, NULL, NULL),
(11, 'settings_manage', 'إدارة إعدادات النظام', NULL, NULL, 0, NULL, NULL, NULL, NULL),
(12, 'guides_manage', 'إدارة الإرشادات', NULL, NULL, 0, NULL, NULL, NULL, NULL),
(13, 'reports_manage', 'إدارة التقارير', NULL, NULL, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assigned_roles`
--

CREATE TABLE `assigned_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED NOT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restricted_to_id` int(10) UNSIGNED DEFAULT NULL,
  `restricted_to_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scope` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigned_roles`
--

INSERT INTO `assigned_roles` (`id`, `role_id`, `entity_id`, `entity_type`, `restricted_to_id`, `restricted_to_type`, `scope`) VALUES
(1, 1, 1, 'App\\User', NULL, NULL, NULL),
(3, 9, 3, 'App\\User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `ar_name`, `en_name`, `created_at`, `updated_at`) VALUES
(2, 'قسم رئيسي ثاني 2', 'Second Main Category 2', '2019-07-22 14:23:06', '2019-07-22 14:29:05'),
(4, 'قسم جديد', 'new cadoc', '2019-07-22 15:43:31', '2019-07-22 15:43:31'),
(5, 'Harlan Tyler', 'Conan Curtis', '2019-07-22 15:43:35', '2019-07-22 15:43:35'),
(6, 'Keaton Mcbride', 'Armando Rodgers', '2019-07-22 15:43:38', '2019-07-22 15:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 36, '2019-08-04 12:10:05', '2019-08-04 12:10:05'),
(6, 35, '2019-08-04 12:10:05', '2019-08-04 12:10:05'),
(7, 34, '2019-08-04 12:10:05', '2019-08-04 12:10:05'),
(8, 7, '2019-08-04 12:10:05', '2019-08-04 12:10:05'),
(9, 38, '2019-08-05 10:44:14', '2019-08-05 10:44:14'),
(10, 39, '2019-08-05 12:19:11', '2019-08-05 12:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `ar_name`, `en_name`, `delivery_price`, `created_at`, `updated_at`, `is_active`, `deleted_at`) VALUES
(1, 'جدة', 'Jeddah', 10, '2019-05-28 06:43:48', '2019-05-28 06:43:48', 1, NULL),
(8, 'الرياض', 'Riyadh', 20, '2019-05-28 06:49:34', '2019-05-28 06:58:12', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `ar_name`, `en_name`, `is_active`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'تويوتا', 'TOYOTA', 1, 'photos/DS0NKJZJdMQ22Wy1Cdq2YKCtQJlOO0KVKRToZ0Am.png', '2019-05-28 07:28:20', '2019-08-07 11:08:37', NULL),
(6, 'ليكسز', 'LEXUS', 1, 'photos/VV8LJ0R8ZjaVrMLutZRPvflq56Bk9Z694CzNXJNc.png', '2019-05-28 07:30:47', '2019-08-07 11:06:48', NULL),
(8, 'جيب', 'JEEP', 1, 'photos/zGEQN65dW0GlmCskSk4lwaGx6YMzcuIlVpcVlAgP.jpeg', '2019-08-07 10:59:23', '2019-08-07 12:09:23', '2019-08-07 12:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `company_models`
--

CREATE TABLE `company_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_models`
--

INSERT INTO `company_models` (`id`, `company_id`, `ar_name`, `en_name`, `created_at`, `updated_at`, `is_active`, `deleted_at`) VALUES
(6, 1, 'كورولا', 'COROLLA', '2019-06-02 07:17:22', '2019-06-02 07:17:22', 1, NULL),
(7, 1, 'هايبرد اكس', 'HYBRID X', '2019-08-06 10:47:21', '2019-08-06 10:47:21', 1, NULL),
(8, 1, 'هاي -سي تي', 'High CT', '2019-08-06 10:47:58', '2019-08-06 10:47:58', 1, NULL),
(9, 1, 'كامري سولار', 'toyota camry solara', '2019-08-06 10:49:20', '2019-08-06 10:49:20', 1, NULL),
(10, 6, 'أي اس هايبرد', 'ES HYbrid', '2019-08-06 10:51:41', '2019-08-06 10:51:41', 1, NULL),
(11, 6, 'آر أكس', 'RX', '2019-08-06 10:52:05', '2019-08-06 10:52:05', 1, NULL),
(12, 6, 'جي إس أف', 'GS F', '2019-08-06 10:52:48', '2019-08-06 10:52:48', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_type` enum('delivery','receive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` double(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `order_id`, `delivery_type`, `address`, `lat`, `lng`, `value`) VALUES
(21, 18, 'receive', NULL, NULL, NULL, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `device` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('web','ios','android') COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `user_id`, `device`, `type`, `order_id`, `created_at`, `updated_at`) VALUES
(5, 36, 'czYrJYWoVXs:APA91bE2DRF-S3rI-yFtlrL4vyQo_OC9jyh7N2-E2qH9nNjLeB3nIYleEWRXfanb8tvhyZO0VN8Lqjc_WwIukMcZxM4jipT8oglD4UhVtKbkjq2pxy7UazS-pnrU75gVZ7VRTiHbH9bG', 'web', NULL, '2019-08-17 14:20:04', '2019-08-20 15:02:53'),
(6, 1, 'f1wgVH-g9lI:APA91bGwxHZVEj6gZv2GfaIV_l8L5rl-fbV6SvBvpfZQWHH5kpeyz28-LdkS1qOjtE600Zlj6VEvVnYt8bvG_uran1vAUrKysp9M8Ezhq4ktbyPwEBPAhPh1BGohSU13r4RDx6NKp9dz', 'web', NULL, '2019-08-17 14:23:48', '2019-08-17 14:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE `instructions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructions`
--

INSERT INTO `instructions` (`id`, `ar_title`, `en_title`, `ar_description`, `en_description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'العنوان بالعربية', 'asaaaaaaaaa', 'الوصف بالعربية الوصف بالعربية الوصف بالعربية الوصف بالعربية الوصف بالعربية الوصف بالعربية الوصف بالعربية الوصف بالعربية الوصف بالعربية الوصف بالعربية الوصف بالعربية الوصف بالعربية', 'English teosdc English teosdc English teosdc English teosdc English teosdc English teosdc English teosdc English teosdc English teosdc English teosdc English teosdc English teosdc English teosdc English teosdc English teosdc English teosdc English teosdc', 'photos/QGDzMbcwOUBJQL1sWaWtPUCEKT3P39XLVqeIU5Z5.jpeg', NULL, '2019-05-30 09:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `chat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `chat_id`, `body`, `created_at`, `updated_at`) VALUES
(77, 36, 5, 'هاااااااي', '2019-08-20 15:02:05', '2019-08-20 15:02:05');

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
(3, '2019_05_27_123306_create_bouncer_tables', 1),
(4, '2019_05_28_080232_add_is_active_to_users', 2),
(6, '2019_05_28_082818_create_cities_table', 3),
(7, '2019_05_28_083019_add_is_active_column_to_cities', 4),
(8, '2019_05_28_090116_create_companies_table', 5),
(9, '2019_05_28_093804_create_company_models_table', 6),
(10, '2019_05_28_095253_create_model_years_table', 6),
(11, '2019_05_28_112416_add_is_active_column_to_company_model', 7),
(12, '2019_05_29_090820_add_suspend_reason_column_to_users', 8),
(14, '2019_05_30_080808_add_deleted_at_column_to_users_table', 10),
(16, '2019_05_30_093424_create_instructions_table', 11),
(22, '2019_06_02_084843_add_soft_deletes_to_company_models', 13),
(23, '2019_06_02_085009_add_soft_deletes_to_companies', 14),
(24, '2019_06_02_085058_add_soft_deletes_to_parts', 15),
(26, '2019_06_02_085144_add_soft_deletes_to_cities', 16),
(27, '2019_05_30_125802_create_replies_table', 17),
(28, '2019_05_30_125803_create_reply_details_table', 17),
(33, '2019_06_09_092750_add_login_code_to_users_table', 22),
(35, '2019_06_09_144726_add_status_column_to_replies_table', 22),
(38, '2019_06_12_123208_create_devices_table', 23),
(39, '2019_07_15_160517_create_contacts_table', 23),
(40, '2019_07_18_160355_create_proposals_table', 24),
(41, '2019_07_18_160550_create_proposal_comments_table', 24),
(42, '2019_07_18_160803_create_proposal_likes_table', 24),
(43, '2019_06_12_093839_create_notifications_table', 25),
(44, '2019_05_28_094910_create_parts_table', 26),
(45, '2019_05_28_113718_create_part_images_table', 26),
(53, '2019_07_22_151156_create_categories_table', 27),
(54, '2019_07_22_151205_create_sub_categories_table', 27),
(55, '2019_07_23_113010_add_sub_category_id_to_parts_table', 28),
(56, '2019_07_25_110755_add_soft_delete_to_part_images_table', 29),
(58, '2019_07_25_123404_create_return_items_table', 30),
(59, '2019_07_25_124748_add_soft_deletes_to_return_items_table', 31),
(60, '2019_07_25_125224_add_reason_column_to_return_items_table', 32),
(61, '2019_07_25_163202_create_transactions_table', 33),
(62, '2019_07_29_112309_add_is_accepted_column_to_users_table', 34),
(63, '2019_07_30_143004_add_region_column_to_users_table', 35),
(64, '2019_08_01_150816_modify_notifications_table', 36),
(65, '2019_08_04_110939_create_chats_table', 37),
(66, '2019_08_04_110955_create_messages_table', 37),
(69, '2019_08_06_162551_add_parent_id_to_parts_table', 39),
(75, '2019_08_06_164026_add_number_to_parts_table', 40),
(76, '2019_05_30_125800_create_orders_table', 41),
(77, '2019_05_30_125801_create_order_details_table', 41),
(78, '2019_06_03_090156_add_winner_reply_id_to_orders_table', 41),
(79, '2019_06_03_105324_add_app_percentage_to_orders_table', 41),
(80, '2019_06_03_105759_add_total_order_to_orders_table', 41),
(81, '2019_06_03_110123_add_supplier_percent_to_orders_table', 41),
(82, '2019_06_10_144632_add_supplier_id_to_orders_table', 41),
(83, '2019_08_07_124433_add_image_column_to_companies_table', 42),
(85, '2019_08_20_151220_create_deliveries_table', 43),
(86, '2019_08_20_181955_add_value_column_to_deliveries_table', 44),
(87, '2019_08_20_191846_add_payment_status_column_to_orders_table', 45),
(88, '2019_08_21_161837_add_order_id_to_notifications_table', 46);

-- --------------------------------------------------------

--
-- Table structure for table `model_years`
--

CREATE TABLE `model_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_model_id` bigint(20) UNSIGNED NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_years`
--

INSERT INTO `model_years` (`id`, `company_model_id`, `year`, `created_at`, `updated_at`) VALUES
(67, 6, 2019, '2019-06-02 07:17:22', '2019-06-02 07:17:22'),
(68, 6, 2018, '2019-06-02 07:17:22', '2019-06-02 07:17:22'),
(69, 6, 2017, '2019-06-02 07:17:22', '2019-06-02 07:17:22'),
(70, 6, 2016, '2019-06-02 07:17:22', '2019-06-02 07:17:22'),
(71, 6, 2015, '2019-06-02 07:17:22', '2019-06-02 07:17:22'),
(72, 6, 2014, '2019-06-02 07:17:22', '2019-06-02 07:17:22'),
(73, 6, 2013, '2019-06-02 07:17:22', '2019-06-02 07:17:22'),
(74, 6, 2012, '2019-06-02 07:17:22', '2019-06-02 07:17:22'),
(75, 6, 2011, '2019-06-02 07:17:22', '2019-06-02 07:17:22'),
(76, 6, 2010, '2019-06-02 07:17:22', '2019-06-02 07:17:22'),
(77, 6, 2009, '2019-06-02 07:17:22', '2019-06-02 07:17:22'),
(78, 6, 2008, '2019-06-02 07:17:22', '2019-06-02 07:17:22'),
(79, 7, 2019, '2019-08-06 10:47:21', '2019-08-06 10:47:21'),
(80, 7, 2018, '2019-08-06 10:47:21', '2019-08-06 10:47:21'),
(81, 7, 2017, '2019-08-06 10:47:22', '2019-08-06 10:47:22'),
(82, 7, 2016, '2019-08-06 10:47:22', '2019-08-06 10:47:22'),
(83, 7, 2015, '2019-08-06 10:47:22', '2019-08-06 10:47:22'),
(84, 7, 2014, '2019-08-06 10:47:22', '2019-08-06 10:47:22'),
(85, 7, 2013, '2019-08-06 10:47:22', '2019-08-06 10:47:22'),
(86, 7, 2012, '2019-08-06 10:47:22', '2019-08-06 10:47:22'),
(87, 7, 2011, '2019-08-06 10:47:22', '2019-08-06 10:47:22'),
(88, 7, 2010, '2019-08-06 10:47:23', '2019-08-06 10:47:23'),
(89, 7, 2009, '2019-08-06 10:47:23', '2019-08-06 10:47:23'),
(90, 7, 2008, '2019-08-06 10:47:23', '2019-08-06 10:47:23'),
(91, 7, 2007, '2019-08-06 10:47:23', '2019-08-06 10:47:23'),
(92, 8, 2019, '2019-08-06 10:47:58', '2019-08-06 10:47:58'),
(93, 8, 2018, '2019-08-06 10:47:58', '2019-08-06 10:47:58'),
(94, 8, 2017, '2019-08-06 10:47:59', '2019-08-06 10:47:59'),
(95, 8, 2016, '2019-08-06 10:47:59', '2019-08-06 10:47:59'),
(96, 8, 2015, '2019-08-06 10:47:59', '2019-08-06 10:47:59'),
(97, 8, 2014, '2019-08-06 10:47:59', '2019-08-06 10:47:59'),
(98, 8, 2013, '2019-08-06 10:47:59', '2019-08-06 10:47:59'),
(99, 8, 2012, '2019-08-06 10:47:59', '2019-08-06 10:47:59'),
(100, 8, 2011, '2019-08-06 10:47:59', '2019-08-06 10:47:59'),
(101, 8, 2010, '2019-08-06 10:47:59', '2019-08-06 10:47:59'),
(102, 8, 2009, '2019-08-06 10:48:00', '2019-08-06 10:48:00'),
(103, 8, 2008, '2019-08-06 10:48:00', '2019-08-06 10:48:00'),
(104, 8, 2007, '2019-08-06 10:48:00', '2019-08-06 10:48:00'),
(105, 9, 2019, '2019-08-06 10:49:20', '2019-08-06 10:49:20'),
(106, 9, 2018, '2019-08-06 10:49:20', '2019-08-06 10:49:20'),
(107, 9, 2017, '2019-08-06 10:49:21', '2019-08-06 10:49:21'),
(108, 9, 2016, '2019-08-06 10:49:21', '2019-08-06 10:49:21'),
(109, 9, 2015, '2019-08-06 10:49:21', '2019-08-06 10:49:21'),
(110, 9, 2014, '2019-08-06 10:49:21', '2019-08-06 10:49:21'),
(111, 9, 2013, '2019-08-06 10:49:21', '2019-08-06 10:49:21'),
(112, 9, 2012, '2019-08-06 10:49:21', '2019-08-06 10:49:21'),
(113, 9, 2011, '2019-08-06 10:49:22', '2019-08-06 10:49:22'),
(114, 9, 2010, '2019-08-06 10:49:22', '2019-08-06 10:49:22'),
(115, 9, 2009, '2019-08-06 10:49:22', '2019-08-06 10:49:22'),
(116, 9, 2008, '2019-08-06 10:49:22', '2019-08-06 10:49:22'),
(117, 10, 2019, '2019-08-06 10:51:42', '2019-08-06 10:51:42'),
(118, 10, 2018, '2019-08-06 10:51:42', '2019-08-06 10:51:42'),
(119, 10, 2017, '2019-08-06 10:51:42', '2019-08-06 10:51:42'),
(120, 11, 2019, '2019-08-06 10:52:05', '2019-08-06 10:52:05'),
(121, 11, 2018, '2019-08-06 10:52:06', '2019-08-06 10:52:06'),
(122, 11, 2017, '2019-08-06 10:52:06', '2019-08-06 10:52:06'),
(123, 12, 2019, '2019-08-06 10:52:48', '2019-08-06 10:52:48'),
(124, 12, 2018, '2019-08-06 10:52:48', '2019-08-06 10:52:48'),
(125, 12, 2017, '2019-08-06 10:52:48', '2019-08-06 10:52:48'),
(126, 12, 2016, '2019-08-06 10:52:48', '2019-08-06 10:52:48'),
(127, 12, 2015, '2019-08-06 10:52:48', '2019-08-06 10:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ar_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `order_id`, `is_read`, `created_at`, `updated_at`, `ar_title`, `en_title`, `ar_message`, `en_message`) VALUES
(10, 7, NULL, 1, NULL, '2019-08-01 15:03:18', 'عنوان الإأشعار بالعربي', 'Engilsh notification title', 'نص الإشعار بالعربي', 'English notification message'),
(11, 7, NULL, 1, NULL, '2019-08-01 15:03:18', 'عنوان الإأشعار بالعربي', 'Engilsh notification title', 'نص الإشعار بالعربي', 'English notification message'),
(12, 7, NULL, 1, NULL, '2019-08-01 15:03:18', 'عنوان الإأشعار بالعربي', 'Engilsh notification title', 'نص الإشعار بالعربي', 'English notification message'),
(13, 7, NULL, 1, NULL, '2019-08-01 15:03:18', 'عنوان الإأشعار بالعربي', 'Engilsh notification title', 'نص الإشعار بالعربي', 'English notification message'),
(15, 7, NULL, 1, NULL, '2019-08-01 15:03:18', 'عنوان الإأشعار بالعربي', 'Engilsh notification title', 'نص الإشعار بالعربي', 'English notification message'),
(16, 36, 18, 1, '2019-08-21 15:23:20', '2019-08-21 15:23:25', 'تغيير حالة طلب', 'Order status Changed', 'لديك طلب تم تغيير حالته رقم 18', 'you have an Order with changed status No 18');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_car_type` tinyint(1) NOT NULL DEFAULT 1,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_model_id` bigint(20) UNSIGNED DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `parts_type` enum('original','used','commercial') COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `structure_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` enum('cash','online','network') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('new','waiting','accepted','prepare','refused','onWay','delivered','completed','canceled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `winner_reply_id` bigint(20) UNSIGNED DEFAULT NULL,
  `app_percentage` double(8,2) NOT NULL DEFAULT 0.00,
  `delivery_value` double(8,2) NOT NULL DEFAULT 0.00,
  `total` double(8,2) NOT NULL DEFAULT 0.00,
  `supplier_percent` double(8,2) NOT NULL DEFAULT 0.00,
  `supplier_id` bigint(20) DEFAULT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_car_type`, `company_id`, `company_model_id`, `year`, `parts_type`, `form_image`, `structure_number`, `payment_type`, `status`, `completed_status`, `created_at`, `updated_at`, `deleted_at`, `winner_reply_id`, `app_percentage`, `delivery_value`, `total`, `supplier_percent`, `supplier_id`, `payment_status`) VALUES
(18, 36, 1, 6, 10, 2018, 'used', NULL, NULL, 'network', 'delivered', NULL, '2019-08-19 14:23:04', '2019-08-21 15:23:20', NULL, 15, 10.00, 0.00, 325.00, 292.50, 15, 1),
(19, 36, 0, 6, 11, 2018, 'used', '1566226571_36_form_image.jpg', '213215146516', 'cash', 'waiting', NULL, '2019-08-19 15:56:11', '2019-08-19 15:56:11', NULL, NULL, 0.00, 0.00, 0.00, 0.00, 15, 0),
(20, 36, 1, 6, 10, 2018, 'used', NULL, NULL, 'cash', 'accepted', NULL, '2019-08-19 14:23:04', '2019-08-19 14:23:04', NULL, NULL, 0.00, 0.00, 0.00, 0.00, 15, 0),
(21, 36, 0, 6, 11, 2018, 'used', '1566226571_36_form_image.jpg', '213215146516', 'cash', 'prepare', NULL, '2019-08-19 15:56:11', '2019-08-19 15:56:11', NULL, NULL, 0.00, 0.00, 0.00, 0.00, 15, 0),
(22, 36, 1, 6, 10, 2018, 'used', NULL, NULL, 'cash', 'refused', NULL, '2019-08-19 14:23:04', '2019-08-19 14:23:04', NULL, NULL, 0.00, 0.00, 0.00, 0.00, 15, 0),
(23, 36, 0, 6, 11, 2018, 'used', '1566226571_36_form_image.jpg', '213215146516', 'cash', 'onWay', NULL, '2019-08-19 15:56:11', '2019-08-19 15:56:11', NULL, NULL, 0.00, 0.00, 0.00, 0.00, 15, 0),
(24, 36, 1, 6, 10, 2018, 'used', NULL, NULL, 'cash', 'delivered', NULL, '2019-08-19 14:23:04', '2019-08-19 14:23:04', NULL, NULL, 0.00, 0.00, 0.00, 0.00, 15, 0),
(25, 36, 0, 6, 11, 2018, 'used', '1566226571_36_form_image.jpg', '213215146516', 'cash', 'completed', NULL, '2019-08-19 15:56:11', '2019-08-19 15:56:11', NULL, NULL, 0.00, 0.00, 0.00, 0.00, 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `part_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `part_id`, `quantity`, `description`, `created_at`, `updated_at`) VALUES
(24, 18, 30, 1, NULL, '2019-08-19 14:23:04', '2019-08-19 14:23:04'),
(25, 18, 31, 1, NULL, '2019-08-19 14:23:04', '2019-08-19 14:23:04'),
(26, 19, 30, 3, NULL, '2019-08-19 15:56:11', '2019-08-19 15:56:11'),
(27, 19, 31, 4, NULL, '2019-08-19 15:56:11', '2019-08-19 15:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_model_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `parent_id`, `number`, `ar_name`, `en_name`, `image`, `code`, `company_model_id`, `created_at`, `updated_at`, `deleted_at`, `sub_category_id`) VALUES
(19, NULL, NULL, 'قطعة جديدة بالعربية جديدة جداً', 'New Part in English Helllo', 'photos/TbIk6BpUtfsSJz1TBucM5sr5ErV9WpX9dI3L8Itv.jpeg', NULL, 6, '2019-07-23 15:20:53', '2019-07-24 14:07:28', NULL, 1),
(20, NULL, NULL, 'قطعة رئيسية للتجربة', 'Main part for testingtestingtesting', 'photos/ZhFAaxQ8rAvhBCUUdQfDhbFtBH2dDDWU0d8WLm19.jpeg', '111111', 6, '2019-07-24 10:50:40', '2019-07-25 09:28:57', NULL, 4),
(21, NULL, NULL, 'هيلو قطعة جديدة', 'hello new part', 'photos/mRSsfmamUSvkqnPlW8NWytH1yvivv6l6qJhk2DEE.jpeg', NULL, 6, '2019-07-24 12:48:15', '2019-07-25 09:19:04', '2019-07-25 09:19:04', 1),
(28, NULL, NULL, 'قطعة رئيسية', 'Main Part', 'photos/AGcs6blnTQZqXpwp3r5YdSEKmiauzrN9df0BpQdi.jpeg', NULL, 7, '2019-08-06 14:54:49', '2019-08-06 14:55:09', '2019-08-06 14:55:09', 1),
(29, NULL, NULL, 'قطعة رئيسية لديها قطع فرعية', 'Main part with chidren', 'photos/daJrX8uCkQ46u9Y0lr7SUaLTEMz8QTiGK0bbwgRW.jpeg', NULL, 7, '2019-08-06 14:56:43', '2019-08-06 14:56:43', NULL, 1),
(30, 29, NULL, 'قطعة فرعية 1', 'Sub Part 1', 'photos/MePK60Vqj946vzXq3LoMsKSs5Ol1ikweRvi8nahG.jpeg', '321321', NULL, '2019-08-06 14:56:43', '2019-08-06 14:56:43', NULL, NULL),
(31, 29, NULL, 'قطعة فرعية 2', 'Sub Part 2', 'photos/BXdGD6rB3dCXQC8SmlVmeQeR7C81IsWcpAYukVG9.jpeg', '3181AX', NULL, '2019-08-06 14:56:44', '2019-08-06 14:56:44', NULL, NULL),
(32, NULL, NULL, 'قطع فرعية 2', 'Main part with chidren', 'photos/daJrX8uCkQ46u9Y0lr7SUaLTEMz8QTiGK0bbwgRW.jpeg', NULL, 7, '2019-08-06 14:56:43', '2019-08-06 14:56:43', NULL, 1),
(33, 32, NULL, 'قطعة فرعية 3', 'Sub Part 1', 'photos/MePK60Vqj946vzXq3LoMsKSs5Ol1ikweRvi8nahG.jpeg', '321321', NULL, '2019-08-06 14:56:43', '2019-08-06 14:56:43', NULL, NULL),
(34, 32, NULL, 'قطعة فرعية 4', 'Sub Part 2', 'photos/BXdGD6rB3dCXQC8SmlVmeQeR7C81IsWcpAYukVG9.jpeg', '3181AX', NULL, '2019-08-06 14:56:44', '2019-08-06 14:56:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `part_images`
--

CREATE TABLE `part_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `part_id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `part_images`
--

INSERT INTO `part_images` (`id`, `part_id`, `ar_name`, `en_name`, `code`, `image`, `number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 19, 'اسم قطعة فرعية 2', 'Karina Osborne', 'zxc2', 'photos/Vy2uWVaWTUzHcvVsf8dVbsZgCwlXp20yIhcfKCmJ.jpeg', 2, '2019-07-23 15:20:53', '2019-07-25 09:11:56', '2019-07-25 09:11:56'),
(18, 21, 'اهلا وسهلاً', 'new welcome', 'zcx12', 'photos/9xnIPZcKRQX4171664pmETpaGdCw5vI4ywkkN2od.jpeg', 1, '2019-07-24 12:48:16', '2019-07-25 09:18:31', '2019-07-25 09:18:31'),
(19, 21, 'هلا يا هلا', 'English one', 'zxc32', 'photos/qX8jtmy389nNyXIxRk11QHC3vlpBjU6MiTBhdj7v.jpeg', 2, '2019-07-24 12:48:16', '2019-07-24 12:48:16', NULL);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `ability_id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED DEFAULT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forbidden` tinyint(1) NOT NULL DEFAULT 0,
  `scope` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `ability_id`, `entity_id`, `entity_type`, `forbidden`, `scope`) VALUES
(16, 1, 1, 'roles', 0, NULL),
(44, 4, 9, 'roles', 0, NULL),
(45, 5, 9, 'roles', 0, NULL),
(46, 6, 9, 'roles', 0, NULL),
(47, 7, 9, 'roles', 0, NULL),
(48, 8, 9, 'roles', 0, NULL),
(49, 9, 9, 'roles', 0, NULL),
(50, 10, 9, 'roles', 0, NULL),
(51, 11, 9, 'roles', 0, NULL),
(52, 12, 9, 'roles', 0, NULL),
(53, 13, 9, 'roles', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposal_comments`
--

CREATE TABLE `proposal_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proposal_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposal_likes`
--

CREATE TABLE `proposal_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proposal_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `like` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `total` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('new','accepted','refused','finished') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `order_id`, `supplier_id`, `total`, `created_at`, `updated_at`, `status`) VALUES
(15, 18, 15, 325, '2019-08-21 09:35:39', '2019-08-21 09:36:05', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `reply_details`
--

CREATE TABLE `reply_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reply_id` bigint(20) UNSIGNED NOT NULL,
  `order_details_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `part_price` double NOT NULL,
  `total_parts` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reply_details`
--

INSERT INTO `reply_details` (`id`, `reply_id`, `order_details_id`, `order_id`, `part_price`, `total_parts`, `created_at`, `updated_at`) VALUES
(25, 15, 24, 18, 150, 150, '2019-08-21 09:35:39', '2019-08-21 09:35:39'),
(26, 15, 25, 18, 175, 175, '2019-08-21 09:35:39', '2019-08-21 09:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `return_items`
--

CREATE TABLE `return_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('waiting','accepted','refused') COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(10) UNSIGNED DEFAULT NULL,
  `scope` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `title`, `level`, `scope`, `created_at`, `updated_at`) VALUES
(1, '*', '*', NULL, NULL, '2019-05-28 05:56:26', '2019-05-28 05:56:26'),
(9, 'en-name not available', 'دور عام', NULL, NULL, '2019-05-29 06:46:46', '2019-05-29 06:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('text','url','textarea','image') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `type`, `ar_value`, `en_value`, `page`, `slug`, `title`, `created_at`, `updated_at`) VALUES
(1, 'about', 'textarea', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات\r\n                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات\r\n                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات', 'الإعدادات العامة', 'general', 'من نحن', NULL, '2019-05-30 10:06:43'),
(2, 'terms', 'textarea', 'لشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و الأحكام... الشروط و ', 'Terms and conditions Terms and conditions Terms and conditions Terms and conditions Terms and conditions Terms and conditions Terms and conditions Terms and conditions Terms and conditions Terms and conditions Terms and conditions Terms and conditions Terms and conditions Terms and conditions Terms and conditions Terms and conditions Terms and conditions Terms and conditions Terms and conditions ', 'الإعدادات العامة', 'general', 'الشروط و الأحكام', NULL, '2019-05-30 10:06:43'),
(3, 'privacy', 'textarea', '<p>سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية</p>', '<p>privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices</p>', 'الإعدادات العامة', 'general', 'شروط الخصوصية', NULL, '2019-05-30 10:06:43'),
(4, 'facebook', 'url', 'Culpa consectetur o', 'Culpa consectetur o', 'الإعدادات العامة', 'general', 'رابط فيسبوك', NULL, '2019-05-30 10:06:43'),
(5, 'twitter', 'url', 'Est accusantium mini', 'Est accusantium mini', 'الإعدادات العامة', 'general', 'رابط تويتر', NULL, '2019-05-30 10:06:43'),
(6, 'instagram', 'url', 'Reprehenderit exerci', 'Reprehenderit exerci', 'الإعدادات العامة', 'general', 'رابط إنستجرام', NULL, '2019-05-30 10:06:43'),
(7, 'snapchat', 'url', 'Vitae in minima cons', 'Vitae in minima cons', 'الإعدادات العامة', 'general', 'رابط سناب شات', NULL, '2019-05-30 10:06:43'),
(14, 'address', 'url', 'Sint Nam commodi qu', 'Sint Nam commodi qu', 'الإعدادات العامة', 'general', 'العنوان', NULL, '2019-05-30 10:06:43'),
(15, 'phone', 'url', '0599654782', '0599654782', 'الإعدادات العامة', 'general', 'رقم التواصل', NULL, '2019-05-30 10:06:43'),
(16, 'email', 'url', 'asd@asd.com', 'asd@asd.com', 'الإعدادات العامة', 'general', 'البريد الإلكتروني', NULL, '2019-05-30 10:06:43'),
(17, 'whatsapp', 'url', '05593654123', '05593654123', 'الإعدادات العامة', 'general', 'واتس أب', NULL, '2019-05-30 10:06:43'),
(18, 'google+', 'url', 'google.com', 'google.com', 'الإعدادات العامة', 'general', 'GOOGLE+', NULL, '2019-05-30 10:06:43'),
(19, 'delivery_value', 'url', '30', '30', 'الإعدادات العامة', 'general', 'قيمة التوصيل المضافة على الطلب', NULL, '2019-05-30 10:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `ar_name`, `en_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'قسم فرعي 1', 'Sub Category 1', '2019-07-22 15:32:22', '2019-07-22 15:32:22'),
(3, 5, 'Quinlan Sargent', 'Eleanor Richardson', '2019-07-22 15:44:02', '2019-07-22 15:44:02'),
(4, 2, 'هلاااااااااااااااااااااااااااا', 'Helloooooooooooooooooo', '2019-07-22 15:44:08', '2019-07-22 15:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` double(8,2) NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `type` enum('for','on') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `value`, `order_id`, `type`, `created_at`, `updated_at`, `user_id`) VALUES
(14, 292.50, NULL, '', '2019-08-21 09:36:05', '2019-08-21 09:36:05', 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_code` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('user','supplier','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licence_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licence_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `suspend_reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_accepted` tinyint(1) NOT NULL DEFAULT 0,
  `region` enum('inside','outside') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `login_code`, `password`, `type`, `image`, `address`, `lat`, `lng`, `licence_number`, `licence_image`, `commission`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `is_active`, `suspend_reason`, `deleted_at`, `is_accepted`, `region`) VALUES
(1, 'admin', 'admin@admin.com', '01111111111', NULL, '$2y$10$K3Yh0KAOwGUU53ZULdawoOncY4kcwQWe4BBKCW14D5RNb7xftwRO.', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9Z4PyFuNjsCnPlYBdCj1QDWZYHv6cmcO6SSMpoeHgPTCQDebuPrqadVYph3D', NULL, '2019-08-20 15:00:24', 1, NULL, NULL, 0, 'inside'),
(3, 'محكمه', 'admin2@admin.com', '0321321', NULL, '$2y$10$4n1t6XWs4ppJo0ux0poUiO8cqR3dqWBfF1LQwMb3.ccUzrhD9PCCe', 'admin', 'photos/SyKGQZa3fSjfAyi9e5nxcnNhSACutmwyVdyop2Uh.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-29 07:06:16', '2019-05-29 07:13:28', 1, NULL, NULL, 0, 'inside'),
(7, 'يا هلا يا هلا', NULL, '0555', 1234, '$2y$10$FTZ4ajtzwwLl33ohaD43.Ol09ddh/5wRCa5cyk7FXqzW5O4Fd3qnm', 'user', NULL, 'منطقة الرياض السعودية', '25.187543192930733', '46.03271441796869', NULL, NULL, NULL, NULL, 'gpBLcZyYW56864i36KtB4rvV9XmjfvNMlrXUAHdoVPuefnqocxuh69x7uEJu', '2019-05-29 10:25:34', '2019-08-01 15:03:03', 1, 'تارالؤلابؤغلعغلعغ', NULL, 0, 'inside'),
(8, 'مورد 4', NULL, '054646543', 1234, '$2y$10$FTZ4ajtzwwLl33ohaD43.Ol09ddh/5wRCa5cyk7FXqzW5O4Fd3qnm', 'supplier', NULL, 'ممر وادي حنيفة، الرياض 12922، السعودية', NULL, NULL, '321321321223', NULL, '10', NULL, 'PHcXFU5dcnzYeZf7RqHl6V6PEw0aphwwLnv83wcocWug89oO8mu4WdQA0c9l', '2019-05-29 10:25:34', '2019-07-15 10:43:17', 1, NULL, NULL, 1, 'inside'),
(9, 'مورد 3', NULL, '54', 1234, '$2y$10$KlMOMUMvDxlbbs6yIofmue3c2B/P2c8zHM/94PrZVFN5zy90zPzUK', 'supplier', NULL, 'طريق ابي بكر الصديق، الرياض 12444، السعودية', '24.736835199910423', '46.70684741024934', '530', '/tmp/phpiIIbOp', '52', NULL, 'CkJY3GiP3Lmbil2fMPTZPOUYwDjH1JmTZShkjJ1FlqURvChf5aZOzr2iT00n', '2019-05-30 06:52:39', '2019-07-31 13:08:16', 1, NULL, NULL, 1, 'inside'),
(10, 'مورد 2', NULL, '43', NULL, '$2y$10$AYPgYl28Fp1HQQq3SKghK.5OadIb/82PiZL1lbDmRIxSmIDZq1Bs.', 'supplier', NULL, '3637 ابن نجم، السليمانية، الرياض 12311، السعودية', '24.681942912091774', '46.67938158993684', '844', '/tmp/phpURJukC', '74', NULL, NULL, '2019-05-30 06:52:53', '2019-06-02 07:18:51', 1, NULL, NULL, 1, 'inside'),
(11, 'مورد 1', NULL, '92', NULL, '$2y$10$ICLUGgVFuM1MPiBc/kOXluEuG1Qn3oN/rcEssGJBcd8Q3GnpgcAdS', 'supplier', NULL, 'الملك عبد العزيز، الرياض السعودية', '24.7270315', '46.70980959999997', '711', 'photos/QGDzMbcwOUBJQL1sWaWtPUCEKT3P39XLVqeIU5Z5.jpeg', '10', NULL, NULL, '2019-05-30 07:07:15', '2019-06-02 07:18:38', 1, NULL, NULL, 1, 'inside'),
(12, 'تيوتا', NULL, '0547257056', 1234, '$2y$10$MIkOcjuaUGOUnbGTMvp2R.uPDNq7du6aSmkMyO0pjLr6s4Nv/xFM6', 'supplier', NULL, 'بريدة السعودية', '26.3592309', '43.98181199999999', '12345876', 'photos/nBmdXdpdiMFxpYYuNaGDJeLwkEp8aTESe9rbDEFx.jpeg', '10', NULL, 'Sq6ByL8ifNugkRjvfRzdXmxdAxXY4nQapBPupyWWXprhROGpMZbtBjeZZwlz', '2019-06-12 06:43:41', '2019-06-12 06:44:01', 1, NULL, NULL, 1, 'inside'),
(15, 'مستخدم جديد للتجربة الله يخربيتكوا', NULL, '445', 1234, '$2y$10$.HGb5MIkL59g0DckAGKM9eci6w/atJxPEhVM61GvicMqoM7WyFD52', 'supplier', NULL, '7614 عبدالله بن رواحة، السليمانية، الرياض 12243، السعودية', '24.71', '46.69', '02310', 'photos/tiEacuRIyYlPcQnYYKkVax8BFWX9PMRvZho0IOqV.jpeg', '10', NULL, 'XcUEkTmymY9u34gvf1NRwEB59SsPruJxOxMUrRxFslfsgNPxqBMG0Wz3G4da', '2019-07-29 14:17:58', '2019-08-19 14:16:18', 1, NULL, NULL, 1, 'inside'),
(34, NULL, NULL, '5858', 1234, NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yVDPiUVyROFJv1Nw7P69zwqSHCQbRxx6PEUprZ9WL8ZIVMLMlkJIoTePT0Nh', '2019-07-31 13:09:32', '2019-08-01 13:41:41', 1, 'يقؤبرللااىتةنوم', NULL, 0, 'outside'),
(35, NULL, NULL, '055', 1234, NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'G97tFqL2V05hGCZJVi5DNuaJiykDc4a3HzFg5j1GwKjedSND9ODxQW6pw80r', '2019-08-01 15:02:46', '2019-08-01 16:34:26', 1, NULL, NULL, 0, 'outside'),
(36, NULL, NULL, '55', 1234, NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'VFEOmS5A7PKbVk4QKqs8HFIedEE3CE0YqZbqCc1vCbSLV5khrKqLvaMPbdUS', '2019-08-04 10:06:17', '2019-08-20 15:02:48', 1, NULL, NULL, 0, 'outside'),
(38, NULL, NULL, '321', 1234, NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WWnpvOLHgM8CW1SrcohFdi5Y4zhqFp14QTcckmkYnt70P0TUJh8L5qWz9WtZ', '2019-08-05 10:44:12', '2019-08-05 13:02:34', 1, NULL, '2019-08-05 13:02:34', 0, 'inside'),
(39, NULL, NULL, '1324', 1234, NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HQH6Mvrl3o2xzbdaN4z7Q9IoDihV1HRI3olhTtpHZQZxShlk7Q7Al3Icf28I', '2019-08-05 12:19:05', '2019-08-05 13:02:36', 1, NULL, '2019-08-05 13:02:36', 1, 'inside');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abilities`
--
ALTER TABLE `abilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abilities_scope_index` (`scope`);

--
-- Indexes for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned_roles_entity_index` (`entity_id`,`entity_type`,`scope`),
  ADD KEY `assigned_roles_role_id_index` (`role_id`),
  ADD KEY `assigned_roles_scope_index` (`scope`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_user_id_foreign` (`user_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_models`
--
ALTER TABLE `company_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_models_company_id_foreign` (`company_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deliveries_order_id_foreign` (`order_id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devices_user_id_foreign` (`user_id`),
  ADD KEY `devices_order_id_foreign` (`order_id`);

--
-- Indexes for table `instructions`
--
ALTER TABLE `instructions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`),
  ADD KEY `messages_chat_id_foreign` (`chat_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_years`
--
ALTER TABLE `model_years`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_years_company_model_id_foreign` (`company_model_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`),
  ADD KEY `notifications_order_id_foreign` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_company_id_foreign` (`company_id`),
  ADD KEY `orders_company_model_id_foreign` (`company_model_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_part_id_foreign` (`part_id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parts_company_model_id_foreign` (`company_model_id`),
  ADD KEY `parts_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `part_images`
--
ALTER TABLE `part_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `part_images_part_id_foreign` (`part_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_entity_index` (`entity_id`,`entity_type`,`scope`),
  ADD KEY `permissions_ability_id_index` (`ability_id`),
  ADD KEY `permissions_scope_index` (`scope`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal_comments`
--
ALTER TABLE `proposal_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposal_comments_proposal_id_foreign` (`proposal_id`),
  ADD KEY `proposal_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `proposal_likes`
--
ALTER TABLE `proposal_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposal_likes_proposal_id_foreign` (`proposal_id`),
  ADD KEY `proposal_likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_order_id_foreign` (`order_id`),
  ADD KEY `replies_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `reply_details`
--
ALTER TABLE `reply_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reply_details_reply_id_foreign` (`reply_id`),
  ADD KEY `reply_details_order_details_id_foreign` (`order_details_id`),
  ADD KEY `reply_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `return_items`
--
ALTER TABLE `return_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `return_items_order_id_foreign` (`order_id`),
  ADD KEY `return_items_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`,`scope`),
  ADD KEY `roles_scope_index` (`scope`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abilities`
--
ALTER TABLE `abilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company_models`
--
ALTER TABLE `company_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `instructions`
--
ALTER TABLE `instructions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `model_years`
--
ALTER TABLE `model_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `part_images`
--
ALTER TABLE `part_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `proposal_comments`
--
ALTER TABLE `proposal_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `proposal_likes`
--
ALTER TABLE `proposal_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reply_details`
--
ALTER TABLE `reply_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `return_items`
--
ALTER TABLE `return_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_models`
--
ALTER TABLE `company_models`
  ADD CONSTRAINT `company_models_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `deliveries_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `devices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_chat_id_foreign` FOREIGN KEY (`chat_id`) REFERENCES `chats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_years`
--
ALTER TABLE `model_years`
  ADD CONSTRAINT `model_years_company_model_id_foreign` FOREIGN KEY (`company_model_id`) REFERENCES `company_models` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_company_model_id_foreign` FOREIGN KEY (`company_model_id`) REFERENCES `company_models` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_part_id_foreign` FOREIGN KEY (`part_id`) REFERENCES `parts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parts`
--
ALTER TABLE `parts`
  ADD CONSTRAINT `parts_company_model_id_foreign` FOREIGN KEY (`company_model_id`) REFERENCES `company_models` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parts_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `part_images`
--
ALTER TABLE `part_images`
  ADD CONSTRAINT `part_images_part_id_foreign` FOREIGN KEY (`part_id`) REFERENCES `parts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ability_id_foreign` FOREIGN KEY (`ability_id`) REFERENCES `abilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proposal_comments`
--
ALTER TABLE `proposal_comments`
  ADD CONSTRAINT `proposal_comments_proposal_id_foreign` FOREIGN KEY (`proposal_id`) REFERENCES `proposals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposal_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `proposal_likes`
--
ALTER TABLE `proposal_likes`
  ADD CONSTRAINT `proposal_likes_proposal_id_foreign` FOREIGN KEY (`proposal_id`) REFERENCES `proposals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposal_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `replies_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reply_details`
--
ALTER TABLE `reply_details`
  ADD CONSTRAINT `reply_details_order_details_id_foreign` FOREIGN KEY (`order_details_id`) REFERENCES `order_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reply_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reply_details_reply_id_foreign` FOREIGN KEY (`reply_id`) REFERENCES `replies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `return_items`
--
ALTER TABLE `return_items`
  ADD CONSTRAINT `return_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `return_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
