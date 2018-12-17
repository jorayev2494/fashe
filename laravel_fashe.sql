-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 30 2018 г., 03:42
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel_fashe`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_menus`
--

CREATE TABLE `admin_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admin_menus`
--

INSERT INTO `admin_menus` (`id`, `title`, `link`, `icon`, `active`, `created_at`, `updated_at`) VALUES
(1, 'users', '/admin/users', 'icon-users', 1, NULL, NULL),
(2, 'products', '/admin/products', 'fa fa-product-hunt', 1, NULL, NULL),
(3, 'categories', '/admin/categories', 'fa fa-navicon', 1, NULL, NULL),
(4, 'Statuses', '/admin/statuses', 'fa fa-pied-piper', 1, NULL, NULL),
(5, 'Menus', '/admin/menus', 'fa fa-outdent', 1, NULL, NULL),
(6, 'Roles', '/admin/roles', 'fa fa-user-circle-o', 1, NULL, NULL),
(7, 'Slider', '/admin/sliders', 'fa fa-window-restore', 1, NULL, NULL),
(8, 'Socials', '/admin/socials', 'fa fa-feed', 1, NULL, NULL),
(9, 'Orders', '/admin/orders', 'fa fa-shopping-basket', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `link`, `img`, `menu_id`, `active`, `created_at`, `updated_at`) VALUES
(9, 'Мужской', 'mans', 'andra-1920x239.jpg', 2, 1, '2018-10-27 19:14:07', '2018-10-27 19:29:35'),
(10, 'Женский', 'woman', 'request-for-quote-2.jpg', 2, 1, '2018-10-28 09:09:14', '2018-10-28 10:13:24'),
(11, 'Детский', 'children', 'top07-1920x239.jpg', 2, 1, '2018-10-28 09:45:43', '2018-10-28 09:45:43');

-- --------------------------------------------------------

--
-- Структура таблицы `category_products`
--

CREATE TABLE `category_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category_products`
--

INSERT INTO `category_products` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(37, 9, 40, NULL, NULL),
(38, 9, 41, NULL, NULL),
(39, 9, 42, NULL, NULL),
(40, 9, 43, NULL, NULL),
(41, 9, 44, NULL, NULL),
(42, 9, 45, NULL, NULL),
(43, 9, 46, NULL, NULL),
(44, 9, 47, NULL, NULL),
(45, 9, 48, NULL, NULL),
(46, 9, 49, NULL, NULL),
(47, 10, 50, NULL, NULL),
(48, 11, 51, NULL, NULL),
(49, 10, 52, NULL, NULL),
(50, 10, 53, NULL, NULL),
(51, 10, 54, NULL, NULL),
(52, 10, 55, NULL, NULL),
(53, 10, 56, NULL, NULL),
(54, 10, 57, NULL, NULL),
(55, 10, 58, NULL, NULL),
(56, 10, 59, NULL, NULL),
(57, 10, 60, NULL, NULL),
(58, 11, 61, NULL, NULL),
(59, 11, 62, NULL, NULL),
(60, 11, 63, NULL, NULL),
(61, 11, 64, NULL, NULL),
(62, 11, 65, NULL, NULL),
(63, 11, 66, NULL, NULL),
(64, 11, 67, NULL, NULL),
(65, 11, 68, NULL, NULL),
(66, 11, 69, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `cart_count` int(10) UNSIGNED DEFAULT NULL,
  `cart_sum` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'animating',
  `name_customer` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `cart_count`, `cart_sum`, `status`, `name_customer`, `last_name`, `email`, `phone`, `address`, `shipping`, `created_at`, `updated_at`) VALUES
(5, 4, 12, 'animating', 'Yakub', 'Jorayev', 'email@email.com', '12345000', 'Tkm Ukraine', 'adadawawdlddnawmndasd ndjwaa wdawkmd awd asd nasndan asdak asdkjasdwijiefru aksd dasdawod wadajefjrf poaksdkwaor', '2018-10-24 10:10:13', '2018-10-24 10:10:13'),
(6, 20, 155, 'animating', 'Test', 'test', 'test@tets.com', '+55555555', 'Africa', 'wd akmdamsd asd asdkwadpop addmwamdas asmdwamd iwadirfjrigt igtgktdfgldfg fdlgfdlfdlfdl lfdlfl lflfdlfdl lfdfdls  fffefo f;ls; ,se /,  ,e,fse,fse sefeokfeksofeoefkeosf eksfseofk kfosekfok soef s kos fkoek sfwd akmdamsd asd asdkwadpop addmwamdas asmdwamd iwadirfjrigt igtgktdfgldfg fdlgfdlfdlfdl lfdlfl lflfdlfdl lfdfdls  fffefo f;ls; ,se /,  ,e,fse,fse sefeokfeksofeoefkeosf eksfseofk kfosekfok soef s kos fkoek sfwd akmdamsd asd asdkwadpop addmwamdas asmdwamd iwadirfjrigt igtgktdfgldfg fdlgfdlfdlfdl lfdlfl lflfdlfdl lfdfdls  fffefo f;ls; ,se /,  ,e,fse,fse sefeokfeksofeoefkeosf eksfseofk kfosekfok soef s kos fkoek sf', '2018-10-24 10:15:24', '2018-10-24 10:15:24'),
(7, 26, 179, 'animating', 'ЕЕЕЕЕ', 'ЕЕЕЕ', 'RRR@rrr.com', '2232523', 'wdad dawd', 'awd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wadawd awdawd ad ad ad wd wad', '2018-10-24 10:25:34', '2018-10-24 10:25:34'),
(8, 4, 31, 'animating', 'ewewe', 'wewe', 'wae@aeewr.com', '8779798797', 'wadwadawd', 'dwad wadaw ddwa awd ad awdaw', '2018-10-24 10:29:14', '2018-10-24 10:29:14');

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `name`, `prefix`, `active`, `created_at`, `updated_at`) VALUES
(1, 'home', 'home', 0, NULL, '2018-10-19 17:59:04'),
(2, 'shop', 'shop', 1, NULL, '2018-10-19 18:14:39'),
(3, 'sale', 'sale', 0, NULL, '2018-10-23 07:05:43'),
(4, 'blog', 'blog', 0, NULL, '2018-10-28 14:38:34'),
(5, 'about', 'about', 1, NULL, NULL),
(6, 'contacts', 'contacts', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_19_120453_create_admin_menus_table', 2),
(4, '2018_08_21_001417_create_products_table', 3),
(5, '2018_08_27_185238_create_categories_table', 4),
(6, '2018_08_27_185707_create_statuses_table', 4),
(11, '2018_09_25_214832_create_menus_table', 5),
(12, '2018_09_25_215006_change_users_table', 5),
(13, '2018_09_25_225142_create_category_products_table', 5),
(15, '2018_10_02_114146_change_categories_table', 6),
(17, '2018_10_06_101004_change_products_table', 7),
(18, '2018_10_15_201454_create_roles_table', 8),
(19, '2018_10_15_204303_change_users_table', 9),
(20, '2018_10_18_223938_change_categories_table', 10),
(21, '2018_10_19_004340_create_sliders_table', 11),
(22, '2018_10_19_145744_create_socials_table', 12),
(39, '2018_10_23_160102_create_customers_table', 13),
(40, '2018_10_23_160125_create_orders_table', 13),
(41, '2018_10_24_090755_change_orders_table', 14),
(42, '2018_10_24_164319_create_subscribes_table', 15);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customers_id` int(10) UNSIGNED DEFAULT NULL,
  `products_id` int(10) UNSIGNED NOT NULL,
  `price_once` int(10) UNSIGNED NOT NULL,
  `count` int(10) UNSIGNED NOT NULL,
  `summa` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `customers_id`, `products_id`, `price_once`, `count`, `summa`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(6, NULL, 62, 200, 1, 200, 0, 6, '2018-10-28 11:29:40', '2018-10-28 11:29:40'),
(7, NULL, 46, 600, 5, 3000, 1, 36, '2018-10-29 12:13:07', '2018-10-29 12:16:37'),
(8, NULL, 50, 100, 5, 500, 0, 36, '2018-10-29 12:13:07', '2018-10-29 12:13:07');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count` int(10) UNSIGNED DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int(10) UNSIGNED DEFAULT '3',
  `price` double(15,8) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `category_id`, `size`, `count`, `color`, `status_id`, `price`, `discount`, `active`, `description`, `created_at`, `updated_at`) VALUES
(40, 'Футболка', '{\"img_0\":\"sECVB4-1-720x960.jpg\",\"img_1\":\"6Pgfy1-9-720x960.jpg\",\"img_2\":\"Tzp8l1-8-720x960.jpg\"}', 9, '{\"size_0\":\"xl\",\"size_1\":\"xxl\",\"size_2\":\"xxxl\"}', 10, '{\"color_0\":\"red\",\"color_1\":\"green\",\"color_2\":\"black\"}', 3, 100.00000000, NULL, 1, 'Это хороший мужской Футболка', '2018-10-27 19:33:35', '2018-10-27 19:33:35'),
(41, 'Polo', '{\"img_0\":\"EPJfY1-8-720x960.jpg\",\"img_1\":\"pVTDs1-9-720x960.jpg\",\"img_2\":\"iat9j4-1-720x960.jpg\"}', 9, '{\"size_0\":\"M\",\"size_1\":\"L\",\"size_2\":\"S\"}', 20, '{\"color_0\":\"silver\",\"color_1\":\"black\"}', 1, 150.00000000, NULL, 1, 'Это хороший футболка из хороший фирмы Polo', '2018-10-27 19:35:29', '2018-10-27 19:35:29'),
(42, 'Diesel', '{\"img_0\":\"RGKG81-9-720x960.jpg\",\"img_1\":\"IR1cb1-8-720x960.jpg\",\"img_2\":\"Anllu4-1-720x960.jpg\"}', 9, '{\"size_0\":\"M\",\"size_1\":\"S\"}', 500, '{\"color_0\":\"silver\",\"color_1\":\"wheit\"}', 2, 500.00000000, NULL, 1, 'Это хороший футболка из Хорошего материала.\r\nСделано в Турции', '2018-10-27 19:39:18', '2018-10-27 19:39:18'),
(43, 'LC Waikiki', '{\"img_0\":\"dwIAGst9450-1.jpg\",\"img_1\":\"04wWfblues.jpg\",\"img_2\":\"VXaUoKPS009S7-720x960.jpg\"}', 9, '{\"size_0\":\"S\",\"size_1\":\"L\",\"size_2\":\"M\"}', 20, '{\"color_0\":\"red\",\"color_1\":\"silver\",\"color_2\":\"gren\"}', 3, 250.00000000, NULL, 1, 'Это футболка из Хорошо материала', '2018-10-27 19:47:46', '2018-10-27 19:47:46'),
(44, 'COLIN\'S', '{\"img_0\":\"H9hBjKPS009S7-720x960.jpg\",\"img_1\":\"TUIuOblues.jpg\",\"img_2\":\"PNNslst9450-1.jpg\"}', 9, '{\"size_0\":\"M\",\"size_1\":\"S\",\"size_2\":\"L\"}', 30, '{\"color_0\":\"red\",\"color_1\":\"yellow\"}', 3, 350.00000000, NULL, 1, 'Турецкая футболка', '2018-10-27 19:50:40', '2018-10-27 19:50:40'),
(45, 'WAIKIKI', '{\"img_0\":\"QJ38oadam-levine-768-720x960.jpg\",\"img_1\":\"8fC3Zao-polo-nam-aristino-aps041s7_master-720x960.jpg\",\"img_2\":\"II9Cdapril-2017-stitch-fix-men-20-720x960.jpg\"}', 9, '{\"size_0\":\"M\",\"size_1\":\"S\"}', 450, '{\"color_0\":\"red\",\"color_1\":\"silver\"}', 3, 400.00000000, NULL, 1, 'Это нормальная футболка', '2018-10-27 19:53:04', '2018-10-27 19:53:04'),
(46, 'ZARA', '{\"img_0\":\"jondzao-polo-nam-aristino-aps041s7_master-720x960.jpg\",\"img_1\":\"yiOKG1-8-720x960.jpg\",\"img_2\":\"KYArR1-9-720x960.jpg\"}', 9, '{\"size_0\":\"M\",\"size_1\":\"L\",\"size_2\":\"S\"}', 56, '{\"color_0\":\"red\",\"color_1\":\"silver\"}', 2, 600.00000000, NULL, 1, 'Хорошая футболка из фирмы ZARA', '2018-10-27 19:54:58', '2018-10-27 19:54:58'),
(47, 'Lacosta', '{\"img_0\":\"MEBoL4c6f17ab917f658f47cfa5ea54089290.jpg\",\"img_1\":\"MKy61april-2017-stitch-fix-men-20-720x960.jpg\",\"img_2\":\"TUOIrproduct-placeholder-uai-720x960.jpg\"}', 9, '{\"size_0\":\"M\",\"size_1\":\"S\",\"size_2\":\"L\"}', 23, '{\"color_0\":\"700\"}', 3, 700.00000000, 650, 1, 'Это футболка Lacoste', '2018-10-27 20:12:53', '2018-10-27 20:12:53'),
(48, 'Rebook', '{\"img_0\":\"5kf4O20180824-KDWG-S-Teaser-JugoUerdens-720x960.jpg\",\"img_1\":\"2KrAKKPS009S7-720x960.jpg\",\"img_2\":\"dUzn2st9450-1.jpg\"}', 9, '{\"size_0\":\"M\",\"size_1\":\"L\",\"size_2\":\"S\"}', 60, '{\"color_0\":\"460\"}', 3, 800.00000000, NULL, 1, 'Описание этой футболки...', '2018-10-27 20:14:22', '2018-10-27 20:14:22'),
(49, 'Nike', '{\"img_0\":\"1ChPgst9450-1.jpg\",\"img_1\":\"SFmOm4-1-720x960.jpg\",\"img_2\":\"0IE8eadam-levine-768-720x960.jpg\"}', 9, '{\"size_0\":\"M\",\"size_1\":\"S\",\"size_2\":\"L\"}', 100, '{\"color_0\":\"red\",\"color_1\":\"silver\"}', 1, 900.00000000, NULL, 1, 'Описание Полупродукта', '2018-10-27 20:18:23', '2018-10-27 20:18:23'),
(50, 'ZARA', '{\"img_0\":\"xGC2N1-720x960.jpg\",\"img_1\":\"xl6vD5-720x960.jpg\",\"img_2\":\"msQ5V2-720x960.jpg\"}', 10, '{\"size_0\":\"M\",\"size_1\":\"S\",\"size_2\":\"L\"}', 30, '{\"color_0\":\"red\",\"color_1\":\"green\",\"color_2\":\"silver\",\"color_3\":\"yellow\"}', NULL, 100.00000000, NULL, 1, 'Это характеристики сайта', '2018-10-28 09:15:17', '2018-10-28 09:15:17'),
(51, 'Polo', '{\"img_0\":\"l8UHn03-ok-720x960.jpg\",\"img_1\":\"YHGtl865.png\",\"img_2\":\"H2B1sNerd-Block-Jr.-Girls-December-2016-3-720x960.jpg\"}', 11, '{\"size_0\":\"s\"}', 100, '{\"color_0\":\"pink\"}', 1, 500.00000000, NULL, 1, 'Описание Товара...', '2018-10-28 09:47:25', '2018-10-28 09:47:25'),
(52, 'Lacoste', '{\"img_0\":\"jf18z2-720x960.jpg\",\"img_1\":\"2asTK1-720x960.jpg\",\"img_2\":\"dfN0C5-720x960.jpg\"}', 10, '{\"size_0\":\"L\",\"size_1\":\"S\",\"size_2\":\"m\",\"size_3\":\"XL\"}', 600, '{\"color_0\":\"red\",\"color_1\":\"yellow\"}', 3, 600.00000000, NULL, 1, 'Описание товара', '2018-10-28 09:50:28', '2018-10-28 09:50:28'),
(53, 'Puma', '{\"img_0\":\"VIhAI1471903_attitude-girl-wallpaper-hd.jpg\",\"img_1\":\"V3qdF01122017-262-720x960.jpg\",\"img_2\":\"2AOjm36562288_2500832256600987_278073993972416512_n-720x960.jpg\"}', 10, '{\"size_0\":\"XXL\",\"size_1\":\"S\",\"size_2\":\"M\"}', 601, '{\"color_0\":\"ren\",\"color_1\":\"yellow\"}', 1, 300.00000000, NULL, 1, 'Описание товара', '2018-10-28 09:52:42', '2018-10-28 09:52:42'),
(54, 'Gucci', '{\"img_0\":\"ssZORgood-vibes-buddha-tank-top-tee-shirt-720x960.jpg\",\"img_1\":\"xwvLq01122017-262-720x960.jpg\",\"img_2\":\"v6bbw1471903_attitude-girl-wallpaper-hd.jpg\"}', 10, '{\"size_0\":\"S\",\"size_1\":\"M\",\"size_2\":\"XXL\"}', 200, '{\"color_0\":\"red\",\"color_1\":\"green\"}', 1, 600.00000000, 500, 1, 'Описание продукта...', '2018-10-28 09:54:45', '2018-10-28 09:54:45'),
(55, 'Louis Vuitton', '{\"img_0\":\"0tEXpIMG_0820-720x960.jpg\",\"img_1\":\"jyqR6IMG_37471-720x960.jpg\",\"img_2\":\"O0bVbkidpik-spring-2017-10-720x960 (1).jpg\"}', 10, '{\"size_0\":\"S\",\"size_1\":\"L\",\"size_2\":\"M\",\"size_3\":\"XXL\"}', 601, '{\"color_0\":\"red\",\"color_1\":\"yellow\"}', 3, 700.00000000, NULL, 1, 'Описание товара...', '2018-10-28 09:58:16', '2018-10-28 09:58:16'),
(56, 'Burberry', '{\"img_0\":\"EwA8tNerd-Block-Jr.-Girls-January-2017-13-720x960.jpg\",\"img_1\":\"1BKREIMG_0820-720x960.jpg\",\"img_2\":\"g1KAlIMG_37471-720x960.jpg\"}', 10, '{\"size_0\":\"L\",\"size_1\":\"S\",\"size_2\":\"XXL\"}', 900, '{\"color_0\":\"red\",\"color_1\":\"yellow\"}', 2, 750.00000000, NULL, 1, 'Описание продукта', '2018-10-28 10:00:20', '2018-10-28 10:00:20'),
(57, 'Chanel', '{\"img_0\":\"DZ2XAnsale-1-49-720x960 (1).jpg\",\"img_1\":\"AZSclRockets-of-Awesome-Girls-Winter-2016-9-720x960.jpg\",\"img_2\":\"59i0snerd-block-jr-girls-march-2017-20-720x960 (1).jpg\"}', 10, '{\"size_0\":\"S\",\"size_1\":\"L\"}', 600, '{\"color_0\":\"red\",\"color_1\":\"Silver\"}', 3, 600.00000000, NULL, 1, 'Описание этого продукта...', '2018-10-28 10:01:56', '2018-10-28 10:01:56'),
(58, 'Versace', '{\"img_0\":\"v3a79kidpik-spring-2017-10-720x960 (1).jpg\",\"img_1\":\"C2suRNerd-Block-Jr.-Girls-January-2017-13-720x960.jpg\",\"img_2\":\"E8AYgnerd-block-jr-girls-march-2017-20-720x960 (1).jpg\"}', 10, '{\"size_0\":\"S\",\"size_1\":\"L\",\"size_2\":\"XXL\"}', 600, '{\"color_0\":\"red\"}', 1, 500.00000000, NULL, 1, 'Описание Продукта...', '2018-10-28 10:04:19', '2018-10-28 10:04:19'),
(59, 'Prada', '{\"img_0\":\"LG3MVnerd-block-jr-girls-march-2017-20-720x960 (1).jpg\",\"img_1\":\"sYe5tkidpik-spring-2017-10-720x960 (1).jpg\",\"img_2\":\"zLrgMNerd-Block-Jr.-Girls-January-2017-13-720x960.jpg\"}', 10, '{\"size_0\":\"S\",\"size_1\":\"L\"}', 800, '{\"color_0\":\"red\",\"color_1\":\"black\"}', 3, 900.00000000, NULL, 1, 'Описание продукта...', '2018-10-28 10:05:49', '2018-10-28 10:05:49'),
(60, 'Dior', '{\"img_0\":\"kvFvA2-720x960.jpg\",\"img_1\":\"dmtDZ1-720x960.jpg\",\"img_2\":\"GYTgs1471903_attitude-girl-wallpaper-hd.jpg\",\"img_3\":\"fWOhJgood-vibes-buddha-tank-top-tee-shirt-720x960.jpg\"}', 10, '{\"size_0\":\"S\",\"size_1\":\"L\",\"size_2\":\"XXL\"}', 900, '{\"color_0\":\"red\",\"color_1\":\"yellow\"}', 3, 1000.00000000, NULL, 1, 'Описание этого продукта...', '2018-10-28 10:08:18', '2018-10-28 10:08:18'),
(61, 'Dior', '{\"img_0\":\"46Heo865.png\",\"img_1\":\"vz2IRAEFAE-042016-CALENZANA-FRANCE_Angelina-720x960.jpg\",\"img_2\":\"Biy2FBabyDolls-Boutique-57449e265f9b58723d1c0905.jpg\"}', 11, '{\"size_0\":\"S\",\"size_1\":\"L\"}', 500, '{\"color_0\":\"red\",\"color_1\":\"green\"}', 1, 100.00000000, NULL, 1, 'Описание товара...', '2018-10-28 10:16:23', '2018-10-28 10:16:23'),
(62, 'Alexander McQween.', '{\"img_0\":\"co5LkBabyDolls-Boutique-57449e265f9b58723d1c0905.jpg\",\"img_1\":\"CJueu865.png\",\"img_2\":\"SaK0AAEFAE-042016-CALENZANA-FRANCE_Angelina-720x960.jpg\"}', 11, '{\"size_0\":\"L\",\"size_1\":\"S\"}', 20, '{\"color_0\":\"red\",\"color_1\":\"yllow\"}', 3, 200.00000000, NULL, 1, 'Описание продукта...', '2018-10-28 10:17:30', '2018-10-28 10:17:30'),
(63, 'Giorgio Armani', '{\"img_0\":\"ghX7TKidbox-Fall-2016-9-720x960.jpg\",\"img_1\":\"ileG8kidbox-girls-spring-2017-13-720x960.jpg\",\"img_2\":\"EHqugkidpik-fall-2017-17-720x960.jpg\"}', 11, '{\"size_0\":\"L\",\"size_1\":\"S\",\"size_2\":\"XXL\"}', 6000, '{\"color_0\":\"red\",\"color_1\":\"yellow\"}', 2, 300.00000000, NULL, 1, 'Описание продукта...', '2018-10-28 10:19:17', '2018-10-28 10:19:17'),
(64, 'Ralph Lauren', '{\"img_0\":\"5bXHtnerd-block-jr-girls-march-2017-20-720x960.jpg\",\"img_1\":\"wTPEoNerd-Block-Jr.-Girls-December-2016-3-720x960.jpg\",\"img_2\":\"3xkholxKzayF.jpg\"}', 11, '{\"size_0\":\"XXL\",\"size_1\":\"S\",\"size_2\":\"M\"}', 600, '{\"color_0\":\"red\",\"color_1\":\"green\",\"color_2\":\"yellow\"}', 3, 399.00000000, NULL, 1, 'Описание продукта...', '2018-10-28 10:21:55', '2018-10-28 10:21:55'),
(65, 'Hermes', '{\"img_0\":\"OyqjJkidbox-girls-spring-2017-13-720x960.jpg\",\"img_1\":\"4NbQ3kidpik-fall-2017-17-720x960.jpg\",\"img_2\":\"v2qaGkidpik-spring-2017-10-720x960.jpg\"}', 11, '{\"size_0\":\"XXL\",\"size_1\":\"S\"}', 600, '{\"color_0\":\"red\"}', 1, 500.00000000, NULL, 1, 'Описание продукта...', '2018-10-28 10:23:40', '2018-10-28 10:23:40'),
(66, 'Dolce & Gabbana', '{\"img_0\":\"sUbfVShirt-Block-December-2016-8-720x960.jpg\",\"img_1\":\"0rCJaRockets-of-Awesome-Girls-Spring-2017-26-720x960.jpg\",\"img_2\":\"Nq9NYRockets-of-Awesome-Girls-Spring-2017-24-720x960.jpg\"}', 11, '{\"size_0\":\"L\",\"size_1\":\"S\",\"size_2\":\"XXL\",\"size_3\":\"e\",\"size_4\":\"f\",\"size_5\":\"sef\",\"size_6\":\"se\",\"size_7\":\"sefdgt\",\"size_8\":\"g\",\"size_9\":\"th\",\"size_10\":\"t\"}', 600, '{\"color_0\":\"red\",\"color_1\":\"yellow\"}', 1, 599.00000000, NULL, 1, 'Описание продукта...', '2018-10-28 10:24:55', '2018-10-28 10:24:55'),
(67, 'Salvatore Ferragamo Salvatore Ferragamo Salvatore Ferragamo Salvatore Ferragamo', '{\"img_0\":\"PdvJ5kidpik-spring-2017-10-720x960.jpg\",\"img_1\":\"opSuEkidpik-fall-2017-17-720x960.jpg\",\"img_2\":\"mt66DKidbox-Fall-2016-9-720x960.jpg\"}', 11, '{\"size_0\":\"L\",\"size_1\":\"S\"}', 600, '{\"color_0\":\"red\",\"color_1\":\"yellow\"}', 3, 700.00000000, NULL, 1, 'Описание продукта...', '2018-10-28 10:26:43', '2018-10-28 10:49:45'),
(68, 'Dunhill', '{\"img_0\":\"TxIrA03-ok-720x960.jpg\",\"img_1\":\"APrsWKidbox-Fall-2016-9-720x960.jpg\",\"img_2\":\"ZgTUW865.png\",\"img_3\":\"zWOk8nerd-block-jr-girls-march-2017-20-720x960.jpg\",\"img_4\":\"fmlwxShirt-Block-December-2016-8-720x960.jpg\"}', 11, '{\"size_0\":\"L\",\"size_1\":\"S\",\"size_2\":\"LLX\"}', 9000, '{\"color_0\":\"red\"}', 3, 8000.00000000, NULL, 1, 'Описание продукта...', '2018-10-28 10:27:51', '2018-10-28 10:27:51'),
(69, 'Calvin Klein Calvin Klein Calvin Klein', '{\"img_0\":\"pB6e0Kidbox-Fall-2016-9-720x960.jpg\",\"img_1\":\"AvuaQ865.png\",\"img_2\":\"FnYYsnerd-block-jr-girls-march-2017-20-720x960.jpg\"}', 11, '{\"size_0\":\"S\",\"size_1\":\"L\"}', 700, '{\"color_0\":\"red\"}', 2, 1000.00000000, NULL, 1, 'Описание продукта...', '2018-10-28 10:29:46', '2018-10-28 10:29:46');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `title`, `prefix`, `active`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 1, NULL, '2018-10-16 03:32:24'),
(2, 'moderator', 'moderator', 1, NULL, '2018-10-16 03:31:59'),
(3, 'user', 'user', 1, NULL, '2018-10-16 03:25:00');

-- --------------------------------------------------------

--
-- Структура таблицы `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `title`, `info`, `link`, `active`, `created_at`, `updated_at`) VALUES
(13, '1920x570-tv.jpg', 'The my Portfolio', 'First Site Shop', 'category/electronic', 0, '2018-10-19 11:28:54', '2018-10-29 17:14:40'),
(15, 'iStock-Happy-girl-in-Paris-1920x570.jpg', 'Электроника', 'Электроника скидка 20%', 'category/car', 0, '2018-10-19 11:44:44', '2018-10-29 17:14:48'),
(16, 'fashion6_slider1-1920x570.jpg', 'Tets', 'test', 'testtest', 0, '2018-10-19 12:10:25', '2018-10-29 17:14:56'),
(17, '3d5689a5fc6ecf7cf9baf9bbb77bbf357b45782f.jpg', 'Мужской одежды', '20% Скидка', 'category/mans', 1, '2018-10-29 13:01:30', '2018-10-29 17:23:23'),
(18, 'fashion6_slider2-1920x570.jpg', 'Женские одежды', '15% Скидка', 'category/woman', 1, '2018-10-29 17:18:10', '2018-10-29 17:20:33'),
(19, '34361b54082483f849003328cf0973bb56c19285.jpg', 'Детские товары', '30% Скидка', 'category/children', 1, '2018-10-29 17:22:50', '2018-10-29 17:22:50');

-- --------------------------------------------------------

--
-- Структура таблицы `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `socials`
--

INSERT INTO `socials` (`id`, `title`, `icon`, `url`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Facebook', 'fa-facebook', 'https://facebook.com/', 1, '2018-10-19 17:04:23', '2018-10-19 17:09:43'),
(3, 'Instagram', 'fa-instagram', 'https://www.instagram.com/jorayev2494/', 1, '2018-10-19 17:05:50', '2018-10-23 07:03:57'),
(4, 'Pinterest', 'fa-pinterest-p', 'https://www.pinterest.ru/', 0, '2018-10-19 17:07:53', '2018-10-19 17:37:22'),
(5, 'Snapchat', 'fa-snapchat-ghost', 'https://www.snapchat.com/', 0, '2018-10-19 17:08:53', '2018-10-19 17:36:58'),
(6, 'YouTube', 'fa-youtube-play', 'https://www.youtube.com/', 1, '2018-10-19 17:09:29', '2018-10-19 17:09:29');

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `prefix`, `active`, `created_at`, `updated_at`) VALUES
(1, 'New', 'new', 1, '2018-08-26 21:00:00', '2018-10-01 20:55:47'),
(2, 'Sale', 'sale', 1, '2018-08-26 21:00:00', '2018-08-26 21:00:00'),
(3, 'Empty', NULL, 1, '2018-10-01 21:01:15', '2018-10-01 21:01:24');

-- --------------------------------------------------------

--
-- Структура таблицы `subscribes`
--

CREATE TABLE `subscribes` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subscribes`
--

INSERT INTO `subscribes` (`id`, `email`, `active`, `created_at`, `updated_at`) VALUES
(1, 'test@test.com', 1, '2018-10-24 14:37:28', '2018-10-24 14:37:28'),
(2, 'test@test.com', 1, '2018-10-24 14:37:48', '2018-10-24 14:37:48'),
(3, 'test@tet.com', 1, '2018-10-24 14:38:20', '2018-10-24 14:38:20');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_original` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT '3',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `star` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `avatar`, `avatar_original`, `name`, `lastname`, `email`, `site`, `role_id`, `password`, `location`, `profession`, `remember_token`, `created_at`, `updated_at`, `star`) VALUES
(6, 'Без названия.png', NULL, 'Admin', 'Jorayev', 'admin@admin.com', 'http://fashe.loc/', 1, '$2y$10$9PqzJOgMmPsx9tkPF53DD.AmzYzgApz/uDY20/yQ9g0QsdHHZ/jdS', 'Turkmenisatan', 'Administrator', 'zsnumQvFOCC5bdjjgbxZAhaZwH6haouYJDQLJe9xCLCJ1WNzVxfTcIksXvdC', '2018-09-17 17:38:39', '2018-10-29 11:56:57', NULL),
(36, 'test.jpg', NULL, 'Yakub', 'Jorayev', 'jorayev2494@gmail.com', 'http://fashe.loc/', 3, '$2y$10$R.nma/qpaSdqvTUbL5aKduLXhC4rToAkWUbf2uIgv1PbRdQMb7dXy', 'Turkmenistan', 'Programmer', 'YSUja2HK9kw0E6xSfyaxAJ9gGY3AezmmmglfUNCKKB7BXDg60H90wyQke5IS', '2018-10-29 12:03:19', '2018-10-29 12:20:22', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin_menus`
--
ALTER TABLE `admin_menus`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_menu_id_foreign` (`menu_id`);

--
-- Индексы таблицы `category_products`
--
ALTER TABLE `category_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_products_category_id_foreign` (`category_id`),
  ADD KEY `category_products_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_products_id_foreign` (`products_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_index` (`category_id`),
  ADD KEY `products_status_id_index` (`status_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin_menus`
--
ALTER TABLE `admin_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `category_products`
--
ALTER TABLE `category_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);

--
-- Ограничения внешнего ключа таблицы `category_products`
--
ALTER TABLE `category_products`
  ADD CONSTRAINT `category_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
