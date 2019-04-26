-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2019 at 07:27 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `botintel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_apicustom`
--

CREATE TABLE `cms_apicustom` (
  `id` int(10) UNSIGNED NOT NULL,
  `permalink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tabel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kolom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_query_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sql_where` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `method_type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` longtext COLLATE utf8mb4_unicode_ci,
  `responses` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_apikey`
--

CREATE TABLE `cms_apikey` (
  `id` int(10) UNSIGNED NOT NULL,
  `screetkey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_dashboard`
--

CREATE TABLE `cms_dashboard` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_email_queues`
--

CREATE TABLE `cms_email_queues` (
  `id` int(10) UNSIGNED NOT NULL,
  `send_at` datetime DEFAULT NULL,
  `email_recipient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_cc_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_content` text COLLATE utf8mb4_unicode_ci,
  `email_attachments` text COLLATE utf8mb4_unicode_ci,
  `is_sent` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_email_templates`
--

CREATE TABLE `cms_email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_email_templates`
--

INSERT INTO `cms_email_templates` (`id`, `name`, `slug`, `subject`, `content`, `description`, `from_name`, `from_email`, `cc_email`, `created_at`, `updated_at`) VALUES
(1, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2018-07-13 03:11:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_logs`
--

CREATE TABLE `cms_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipaddress` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useragent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `id_cms_users` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_logs`
--

INSERT INTO `cms_logs` (`id`, `ipaddress`, `useragent`, `url`, `description`, `details`, `id_cms_users`, `created_at`, `updated_at`) VALUES
(1, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/pages', 'Try view the data :name at Pages', '', 2, '2018-07-14 10:50:39', NULL),
(2, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/logout', 'admin@botintel.com logout', '', 2, '2018-07-14 10:50:45', NULL),
(3, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/login', 'admin@botintel.com login with IP Address 110.38.25.58', '', 2, '2018-07-14 10:51:01', NULL),
(4, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/statistic_builder/add-save', 'Add New Data Tasks at Statistic Builder', '', 1, '2018-07-14 10:51:53', NULL),
(5, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/statistic_builder/edit-save/1', 'Update data Counters at Statistic Builder', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>name</td><td>Tasks</td><td>Counters</td></tr><tr><td>slug</td><td>tasks</td><td></td></tr></tbody></table>', 1, '2018-07-14 11:26:06', NULL),
(6, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/statistic_builder/edit-save/1', 'Update data Counters at Statistic Builder', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>slug</td><td>tasks</td><td></td></tr></tbody></table>', 1, '2018-07-14 11:26:22', NULL),
(7, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/logout', 'flk-admin@yopmail.com logout', '', 1, '2018-07-14 11:26:56', NULL),
(8, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/login', 'flk-admin@yopmail.com login with IP Address 110.38.25.58', '', 1, '2018-07-14 11:27:07', NULL),
(9, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/forgot', 'Someone with IP 110.38.25.58 request a password for flk-admin@yopmail.com', '', NULL, '2018-07-14 12:20:18', NULL),
(10, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/login', 'flk-admin@yopmail.com login with IP Address 110.38.25.58', '', 1, '2018-07-14 12:21:35', NULL),
(11, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/users/edit-save/1', 'Update data Super Admin at Users Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>password</td><td>$2y$10$ngOh04YcXEtqHzBxJ4oZ.uFbLSklyWViQUFgIp7EYgd1u.hqMia.W</td><td>$2y$10$.80B7Fuzb6uA5WjId8g21ObjH0q.49Xux.y2lcv/FzV7hMHMsXRXC</td></tr><tr><td>id_cms_privileges</td><td>1</td><td></td></tr><tr><td>status</td><td>Active</td><td></td></tr></tbody></table>', 1, '2018-07-14 12:21:48', NULL),
(12, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/menu_management/add-save', 'Add New Data Overview at Menu Management', '', 1, '2018-07-14 13:06:36', NULL),
(13, '172.94.91.211', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/login', 'admin@botintel.com login with IP Address 172.94.91.211', '', 2, '2018-07-14 13:07:59', NULL),
(14, '172.94.91.211', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/logout', 'admin@botintel.com logout', '', 2, '2018-07-14 13:09:28', NULL),
(15, '68.96.67.64', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/login', 'admin@botintel.com login with IP Address 68.96.67.64', '', 2, '2018-07-14 13:40:25', NULL),
(16, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/login', 'flk-admin@yopmail.com login with IP Address 110.38.25.58', '', 1, '2018-07-16 13:56:48', NULL),
(17, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/login', 'flk-admin@yopmail.com login with IP Address 110.38.25.58', '', 1, '2018-07-16 14:02:09', NULL),
(18, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/logout', 'flk-admin@yopmail.com logout', '', 1, '2018-07-16 14:56:35', NULL),
(19, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/login', 'admin@botintel.com login with IP Address 110.38.25.58', '', 2, '2018-07-16 14:56:46', NULL),
(20, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/releases/add-save', 'Add New Data test at Releases', '', 2, '2018-07-16 14:57:34', NULL),
(21, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/users/delete-image', 'Delete the image of Admin at Users Management', '', 2, '2018-07-16 15:02:55', NULL),
(22, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/users/edit-save/2', 'Update data Admin at Users Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>photo</td><td></td><td>uploads/2/2018-07/chrysanthemum.jpg</td></tr><tr><td>password</td><td>$2y$10$pdle9izjusLdQWFlyI4GXuQmwDn1VeY4Mi0I4ZI9lTA3tCvvyb3gG</td><td></td></tr><tr><td>id_cms_privileges</td><td>2</td><td></td></tr><tr><td>status</td><td></td><td></td></tr></tbody></table>', 2, '2018-07-16 15:03:26', NULL),
(23, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/logout', 'admin@botintel.com logout', '', 2, '2018-07-16 15:03:43', NULL),
(24, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/login', 'admin@botintel.com login with IP Address 110.38.25.58', '', 2, '2018-07-16 15:03:53', NULL),
(25, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/releases/delete-image', 'Delete the image of test at Releases', '', 2, '2018-07-16 15:08:07', NULL),
(26, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/releases/edit-save/84', 'Update data test at Releases', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>release_image</td><td></td><td>uploads/2/2018-07/chrysanthemum.jpg</td></tr><tr><td>is_scrapped</td><td>0</td><td></td></tr><tr><td>updated_At</td><td></td><td></td></tr></tbody></table>', 2, '2018-07-16 15:08:17', NULL),
(27, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/login', 'admin@botintel.com login with IP Address 110.38.25.58', '', 2, '2018-07-16 15:35:03', NULL),
(28, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/users/delete-image', 'Delete the image of Admin at Users Management', '', 2, '2018-07-16 15:35:15', NULL),
(29, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/users/edit-save/2', 'Update data Admin at Users Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>photo</td><td></td><td>uploads/2/2018-07/favicon.jpg</td></tr><tr><td>password</td><td>$2y$10$pdle9izjusLdQWFlyI4GXuQmwDn1VeY4Mi0I4ZI9lTA3tCvvyb3gG</td><td></td></tr><tr><td>id_cms_privileges</td><td>2</td><td></td></tr><tr><td>status</td><td></td><td></td></tr></tbody></table>', 2, '2018-07-16 15:35:24', NULL),
(30, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/logout', 'admin@botintel.com logout', '', 2, '2018-07-16 15:35:50', NULL),
(31, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/logout', ' logout', '', NULL, '2018-07-16 15:39:51', NULL),
(32, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/login', 'admin@botintel.com login with IP Address 110.38.25.58', '', 2, '2018-07-16 16:15:46', NULL),
(33, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/tasks/edit-save/1', 'Update data  at Tasks', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody></tbody></table>', 2, '2018-07-16 16:16:23', NULL),
(34, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/logout', 'admin@botintel.com logout', '', 2, '2018-07-16 16:16:30', NULL),
(35, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/login', 'flk-admin@yopmail.com login with IP Address 110.38.25.58', '', 1, '2018-07-16 16:16:40', NULL),
(36, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/stores/edit-save/1', 'Update data Nike2 at Stores', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>store_name</td><td>Nike</td><td>Nike2</td></tr></tbody></table>', 1, '2018-07-16 16:22:58', NULL),
(37, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://199.250.201.124/~botintel/public/admin/stores/edit-save/1', 'Update data Nike at Stores', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>store_name</td><td>Nike2</td><td>Nike</td></tr></tbody></table>', 1, '2018-07-16 16:23:04', NULL),
(38, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 'http://199.250.201.124/~botintel/public/admin/login', 'admin@botintel.com login with IP Address 110.38.25.58', '', 2, '2018-07-16 16:58:48', NULL),
(39, '110.38.25.58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 'http://199.250.201.124/~botintel/public/admin/logout', 'admin@botintel.com logout', '', 2, '2018-07-16 16:59:48', NULL),
(40, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://localhost/botintel/public/admin/login', 'admin@botintel.com login with IP Address ::1', '', 2, '2018-07-17 02:56:49', NULL),
(41, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://localhost/botintel/public/admin/pages/add-save', 'Add New Data Terms & Conditions at Pages', '', 2, '2018-07-17 02:58:52', NULL),
(42, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://localhost/botintel/public/admin/pages/add-save', 'Add New Data Privacy Policy at Pages', '', 2, '2018-07-17 02:59:42', NULL),
(43, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://localhost/botintel/public/admin/pages/edit-save/2', 'Update data Privacy Policy at Pages', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>is_blog</td><td>0</td><td>1</td></tr></tbody></table>', 2, '2018-07-17 03:48:42', NULL),
(44, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://localhost/botintel/public/admin/login', 'flk-admin@yopmail.com login with IP Address ::1', '', 1, '2018-07-17 05:48:34', NULL),
(45, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://localhost/botintel/public/admin/pages/add-save', 'Add New Data Helpfull Page at Pages', '', 2, '2018-07-17 05:50:46', NULL),
(46, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://localhost/botintel/public/admin/pages/delete/3', 'Delete data Helpfull Page at Pages', '', 2, '2018-07-17 05:51:10', NULL),
(47, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://localhost/botintel/public/admin/login', 'flk-admin@yopmail.com login with IP Address ::1', '', 1, '2018-07-18 01:35:12', NULL),
(48, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://localhost/botintel/public/admin/logout', 'flk-admin@yopmail.com logout', '', 1, '2018-07-18 01:51:56', NULL),
(49, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://localhost/botintel/public/admin/login', 'flk-admin@yopmail.com login with IP Address ::1', '', 1, '2018-07-18 02:11:01', NULL),
(50, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://localhost/botintel/public/admin/logout', 'flk-admin@yopmail.com logout', '', 1, '2018-07-18 02:35:44', NULL),
(51, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://localhost/botintel/public/admin/login', 'flk-admin@yopmail.com login with IP Address ::1', '', 1, '2018-07-18 03:22:59', NULL),
(52, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://localhost/botintel/public/admin/login', 'flk-admin@yopmail.com login with IP Address ::1', '', 1, '2018-07-26 06:43:28', NULL),
(53, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'http://localhost/botintel/public/admin/subscriptions/add-save', 'Add New Data gfsg at Subscriptions', '', 1, '2018-07-26 06:44:43', NULL),
(54, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/login', 'flk-admin@yopmail.com login with IP Address ::1', '', 1, '2018-07-28 03:40:42', NULL),
(55, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/logout', 'flk-admin@yopmail.com logout', '', 1, '2018-07-28 04:24:58', NULL),
(56, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/login', 'admin@botintel.com login with IP Address ::1', '', 2, '2018-07-28 04:25:27', NULL),
(57, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/login', 'flk-admin@yopmail.com login with IP Address ::1', '', 1, '2018-07-28 04:25:54', NULL),
(58, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/menu_management/edit-save/13', 'Update data Stripe Subscription at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>name</td><td>Stripe_Subscription</td><td>Stripe Subscription</td></tr><tr><td>color</td><td></td><td>normal</td></tr><tr><td>sorting</td><td>8</td><td></td></tr></tbody></table>', 1, '2018-07-28 04:27:17', NULL),
(59, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/menu_management/edit-save/13', 'Update data Stripe Subscription at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>sorting</td><td>8</td><td></td></tr></tbody></table>', 1, '2018-07-28 04:27:37', NULL),
(60, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/menu_management/edit-save/13', 'Update data User Subscriptions at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>name</td><td>Stripe Subscription</td><td>User Subscriptions</td></tr><tr><td>sorting</td><td>8</td><td></td></tr></tbody></table>', 1, '2018-07-28 04:28:16', NULL),
(61, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/stripe_subscription', 'Try view the data :name at Stripe Subscription', '', 2, '2018-07-28 05:34:02', NULL),
(62, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/stripe_subscription', 'Try view the data :name at Stripe Subscription', '', 2, '2018-07-28 05:34:05', NULL),
(63, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/stripe_subscription', 'Try view the data :name at Stripe Subscription', '', 2, '2018-07-28 05:34:08', NULL),
(64, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/stripe_subscription', 'Try view the data :name at Stripe Subscription', '', 2, '2018-07-28 05:34:14', NULL),
(65, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/module_generator', 'Try view the data :name at Module Generator', '', 2, '2018-07-28 06:40:24', NULL),
(66, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/stripe_subscription', 'Try view the data :name at Stripe Subscription', '', 2, '2018-07-28 06:40:27', NULL),
(67, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/login', 'flk-admin@yopmail.com login with IP Address ::1', '', 1, '2018-07-30 00:00:59', NULL),
(68, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/tasks/edit-save/7', 'Update data  at Tasks', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>release_id</td><td>97</td><td>139</td></tr></tbody></table>', 1, '2018-07-30 03:38:50', NULL),
(69, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/tasks/edit-save/8', 'Update data  at Tasks', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>release_id</td><td>95</td><td>135</td></tr></tbody></table>', 1, '2018-07-30 03:38:58', NULL),
(70, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/tasks/edit-save/9', 'Update data  at Tasks', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>release_id</td><td>94</td><td>158</td></tr></tbody></table>', 1, '2018-07-30 03:39:03', NULL),
(71, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/logout', 'flk-admin@yopmail.com logout', '', 1, '2018-07-30 05:40:04', NULL),
(72, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/login', 'flk-admin@yopmail.com login with IP Address ::1', '', 1, '2018-08-01 01:37:51', NULL),
(73, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/module_generator/delete/23', 'Delete data Successful Order at Module Generator', '', 1, '2018-08-01 01:39:28', NULL),
(74, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/login', 'admin@botintel.com login with IP Address ::1', '', 2, '2018-08-01 04:37:55', NULL),
(75, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'http://localhost/botintel/public/admin/logout', 'admin@botintel.com logout', '', 2, '2018-08-01 04:39:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus`
--

CREATE TABLE `cms_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'url',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_dashboard` tinyint(1) NOT NULL DEFAULT '0',
  `id_cms_privileges` int(11) DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_menus`
--

INSERT INTO `cms_menus` (`id`, `name`, `type`, `path`, `color`, `icon`, `parent_id`, `is_active`, `is_dashboard`, `id_cms_privileges`, `sorting`, `created_at`, `updated_at`) VALUES
(1, 'Stores', 'Route', 'AdminStoresControllerGetIndex', 'normal', 'fa fa-home', 0, 1, 0, 1, 3, '2018-07-13 03:20:10', '2018-07-13 16:27:16'),
(2, 'Sizes', 'Route', 'AdminSizesControllerGetIndex', 'normal', 'fa fa-check-square-o', 0, 1, 0, 1, 5, '2018-07-13 03:33:39', '2018-07-13 16:28:22'),
(5, 'Subscriptions', 'Route', 'AdminSubscriptionsControllerGetIndex', 'normal', 'fa fa-tag', 0, 1, 0, 1, 4, '2018-07-13 03:59:47', '2018-07-13 16:27:20'),
(6, 'Releases', 'Route', 'AdminReleasesControllerGetIndex', 'normal', 'fa fa-cart-arrow-down', 0, 1, 0, 1, 2, '2018-07-13 04:10:21', '2018-07-13 16:27:13'),
(7, 'Settings', 'Route', 'AdminCustomersControllerGetIndex', 'normal', 'fa fa-circle-o', 9, 1, 0, 1, 1, '2018-07-13 04:41:50', '2018-07-13 16:22:00'),
(8, 'Profiles', 'Route', 'AdminProfilesControllerGetIndex', 'normal', 'fa fa-circle-o', 9, 1, 0, 1, 2, '2018-07-13 15:59:55', '2018-07-13 17:44:24'),
(9, 'Customers', 'Module', 'customers', 'normal', 'fa fa-users', 0, 1, 0, 1, 1, '2018-07-13 16:19:11', NULL),
(10, 'Tasks', 'Route', 'AdminTasksControllerGetIndex', 'normal', 'fa fa-dollar', 0, 1, 0, 1, 6, '2018-07-13 17:15:03', '2018-07-13 17:45:10'),
(11, 'Pages', 'Route', 'AdminPagesControllerGetIndex', 'normal', 'fa fa-edit', 0, 1, 0, 1, 7, '2018-07-14 10:23:36', '2018-07-14 10:33:31'),
(12, 'Overview', 'Statistic', 'statistic_builder/show/tasks', 'normal', 'fa fa-glass', 0, 1, 1, 1, NULL, '2018-07-14 13:06:36', NULL),
(13, 'User Subscriptions', 'Route', 'AdminStripeSubscriptionControllerGetIndex', 'normal', 'fa fa-money', 0, 1, 0, 1, 8, '2018-07-28 03:44:20', '2018-07-28 04:28:16'),
(15, 'Successful Order', 'Route', 'AdminSuccessfulOrderControllerGetIndex', NULL, 'fa fa-glass', 0, 1, 0, 1, 9, '2018-08-01 01:39:53', NULL),
(16, 'settings', 'Route', 'AdminSuccessfulOrderControllerGetIndex', NULL, 'fa fa-glass', 0, 1, 0, 1, 9, '2018-08-01 01:39:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus_privileges`
--

CREATE TABLE `cms_menus_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_menus` int(11) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_menus_privileges`
--

INSERT INTO `cms_menus_privileges` (`id`, `id_cms_menus`, `id_cms_privileges`) VALUES
(3, 3, 1),
(4, 4, 1),
(19, 9, 2),
(20, 9, 1),
(21, 7, 2),
(22, 7, 1),
(28, 6, 2),
(29, 6, 1),
(30, 1, 2),
(31, 1, 1),
(32, 5, 2),
(33, 5, 1),
(34, 2, 2),
(35, 2, 1),
(38, 8, 2),
(39, 8, 1),
(40, 10, 2),
(41, 10, 1),
(42, 11, 2),
(43, 11, 1),
(44, 12, 2),
(45, 12, 1),
(46, 13, 2),
(47, 13, 1),
(48, 14, 1),
(49, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_moduls`
--

CREATE TABLE `cms_moduls` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_moduls`
--

INSERT INTO `cms_moduls` (`id`, `name`, `icon`, `path`, `table_name`, `controller`, `is_protected`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Notifications', 'fa fa-cog', 'notifications', 'cms_notifications', 'NotificationsController', 1, 1, '2018-07-13 03:11:39', NULL, NULL),
(2, 'Privileges', 'fa fa-cog', 'privileges', 'cms_privileges', 'PrivilegesController', 1, 1, '2018-07-13 03:11:39', NULL, NULL),
(3, 'Privileges Roles', 'fa fa-cog', 'privileges_roles', 'cms_privileges_roles', 'PrivilegesRolesController', 1, 1, '2018-07-13 03:11:39', NULL, NULL),
(4, 'Users Management', 'fa fa-users', 'users', 'cms_users', 'AdminCmsUsersController', 0, 1, '2018-07-13 03:11:39', NULL, NULL),
(5, 'Settings', 'fa fa-cog', 'settings', 'cms_settings', 'SettingsController', 1, 1, '2018-07-13 03:11:39', NULL, NULL),
(6, 'Module Generator', 'fa fa-database', 'module_generator', 'cms_moduls', 'ModulsController', 1, 1, '2018-07-13 03:11:39', NULL, NULL),
(7, 'Menu Management', 'fa fa-bars', 'menu_management', 'cms_menus', 'MenusController', 1, 1, '2018-07-13 03:11:39', NULL, NULL),
(8, 'Email Templates', 'fa fa-envelope-o', 'email_templates', 'cms_email_templates', 'EmailTemplatesController', 1, 1, '2018-07-13 03:11:39', NULL, NULL),
(9, 'Statistic Builder', 'fa fa-dashboard', 'statistic_builder', 'cms_statistics', 'StatisticBuilderController', 1, 1, '2018-07-13 03:11:39', NULL, NULL),
(10, 'API Generator', 'fa fa-cloud-download', 'api_generator', '', 'ApiCustomController', 1, 1, '2018-07-13 03:11:39', NULL, NULL),
(11, 'Log User Access', 'fa fa-flag-o', 'logs', 'cms_logs', 'LogsController', 1, 1, '2018-07-13 03:11:39', NULL, NULL),
(12, 'Stores', 'fa fa-home', 'stores', 'stores', 'AdminStoresController', 0, 0, '2018-07-13 03:20:10', NULL, NULL),
(13, 'Sizes', 'fa fa-tachometer', 'sizes', 'sizes', 'AdminSizesController', 0, 0, '2018-07-13 03:33:38', NULL, NULL),
(14, 'Customers', 'fa fa-users', 'customers', 'users', 'AdminCustomersController', 0, 0, '2018-07-13 03:37:29', NULL, '2018-07-13 04:08:59'),
(15, 'Subscriptions', 'fa fa-check-square-o', 'subscriptions', 'subscriptions', 'AdminSubscriptionsController', 0, 0, '2018-07-13 03:40:47', NULL, '2018-07-13 03:59:17'),
(16, 'Subscriptions', 'fa fa-check-square-o', 'subscriptions', 'subscriptions', 'AdminSubscriptionsController', 0, 0, '2018-07-13 03:59:47', NULL, NULL),
(17, 'Releases', 'fa fa-product-hunt', 'releases', 'releases', 'AdminReleasesController', 0, 0, '2018-07-13 04:10:21', NULL, NULL),
(18, 'Customers', 'fa fa-users', 'customers', 'users', 'AdminCustomersController', 0, 0, '2018-07-13 04:41:49', NULL, NULL),
(19, 'Profiles', 'fa fa-edit', 'profiles', 'profile', 'AdminProfilesController', 0, 0, '2018-07-13 15:59:55', NULL, NULL),
(20, 'Tasks', 'fa fa-dollar', 'tasks', 'tasks', 'AdminTasksController', 0, 0, '2018-07-13 17:15:03', NULL, NULL),
(21, 'Pages', 'fa fa-edit', 'pages', 'pages', 'AdminPagesController', 0, 0, '2018-07-14 10:23:36', NULL, NULL),
(22, 'Stripe Subscription', 'fa fa-money', 'stripe_subscription', 'subscriptions', 'AdminStripeSubscriptionController', 0, 0, '2018-07-28 03:44:20', NULL, NULL),
(23, 'Successful Order', 'fa fa-glass', 'successful_order', 'tasks', 'AdminSuccessfulOrderController', 0, 0, '2018-08-01 01:38:21', NULL, '2018-08-01 01:39:28'),
(24, 'Successful Order', 'fa fa-glass', 'successful_order', 'tasks', 'AdminSuccessfulOrderController', 0, 0, '2018-08-01 01:39:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_notifications`
--

CREATE TABLE `cms_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_users` int(11) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_privileges`
--

CREATE TABLE `cms_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_superadmin` tinyint(1) DEFAULT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_privileges`
--

INSERT INTO `cms_privileges` (`id`, `name`, `is_superadmin`, `theme_color`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 1, 'skin-red', '2018-07-13 03:11:40', NULL),
(2, 'Admin', 0, 'skin-red', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_privileges_roles`
--

CREATE TABLE `cms_privileges_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_visible` tinyint(1) DEFAULT NULL,
  `is_create` tinyint(1) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `is_edit` tinyint(1) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `id_cms_moduls` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_privileges_roles`
--

INSERT INTO `cms_privileges_roles` (`id`, `is_visible`, `is_create`, `is_read`, `is_edit`, `is_delete`, `id_cms_privileges`, `id_cms_moduls`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, 0, 1, 1, '2018-07-13 03:11:40', NULL),
(2, 1, 1, 1, 1, 1, 1, 2, '2018-07-13 03:11:40', NULL),
(3, 0, 1, 1, 1, 1, 1, 3, '2018-07-13 03:11:40', NULL),
(4, 1, 1, 1, 1, 1, 1, 4, '2018-07-13 03:11:40', NULL),
(5, 1, 1, 1, 1, 1, 1, 5, '2018-07-13 03:11:40', NULL),
(6, 1, 1, 1, 1, 1, 1, 6, '2018-07-13 03:11:40', NULL),
(7, 1, 1, 1, 1, 1, 1, 7, '2018-07-13 03:11:40', NULL),
(8, 1, 1, 1, 1, 1, 1, 8, '2018-07-13 03:11:40', NULL),
(9, 1, 1, 1, 1, 1, 1, 9, '2018-07-13 03:11:40', NULL),
(10, 1, 1, 1, 1, 1, 1, 10, '2018-07-13 03:11:40', NULL),
(11, 1, 0, 1, 0, 1, 1, 11, '2018-07-13 03:11:40', NULL),
(12, 1, 1, 1, 1, 1, 1, 12, NULL, NULL),
(13, 1, 1, 1, 1, 1, 1, 13, NULL, NULL),
(14, 1, 1, 1, 1, 1, 1, 14, NULL, NULL),
(15, 1, 1, 1, 1, 1, 1, 15, NULL, NULL),
(16, 1, 1, 1, 1, 1, 1, 16, NULL, NULL),
(17, 1, 1, 1, 1, 1, 1, 17, NULL, NULL),
(18, 1, 1, 1, 1, 1, 1, 18, NULL, NULL),
(25, 1, 1, 1, 1, 1, 1, 19, NULL, NULL),
(26, 1, 1, 1, 1, 1, 1, 20, NULL, NULL),
(27, 1, 1, 1, 1, 1, 1, 21, NULL, NULL),
(39, 1, 1, 1, 1, 1, 1, 22, NULL, NULL),
(40, 1, 1, 1, 1, 1, 2, 14, NULL, NULL),
(41, 1, 1, 1, 1, 1, 2, 18, NULL, NULL),
(42, 1, 1, 1, 1, 1, 2, 21, NULL, NULL),
(43, 1, 1, 1, 1, 1, 2, 19, NULL, NULL),
(44, 1, 1, 1, 1, 1, 2, 17, NULL, NULL),
(45, 1, 1, 1, 1, 1, 2, 13, NULL, NULL),
(46, 1, 1, 1, 1, 1, 2, 12, NULL, NULL),
(47, 1, 1, 1, 1, 1, 2, 22, NULL, NULL),
(48, 1, 1, 1, 1, 1, 2, 15, NULL, NULL),
(49, 1, 1, 1, 1, 1, 2, 16, NULL, NULL),
(50, 1, 1, 1, 1, 1, 2, 20, NULL, NULL),
(51, 1, 1, 1, 1, 1, 2, 4, NULL, NULL),
(52, 1, 1, 1, 1, 1, 1, 23, NULL, NULL),
(53, 1, 1, 1, 1, 1, 1, 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_settings`
--

CREATE TABLE `cms_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `content_input_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataenum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `helper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_settings`
--

INSERT INTO `cms_settings` (`id`, `name`, `content`, `content_input_type`, `dataenum`, `helper`, `created_at`, `updated_at`, `group_setting`, `label`) VALUES
(1, 'login_background_color', NULL, 'text', NULL, 'Input hexacode', '2018-07-13 03:11:40', NULL, 'Login Register Style', 'Login Background Color'),
(2, 'login_font_color', NULL, 'text', NULL, 'Input hexacode', '2018-07-13 03:11:40', NULL, 'Login Register Style', 'Login Font Color'),
(3, 'login_background_image', NULL, 'upload_image', NULL, NULL, '2018-07-13 03:11:40', NULL, 'Login Register Style', 'Login Background Image'),
(4, 'email_sender', 'info@botIntel.io', 'text', NULL, NULL, '2018-07-13 03:11:40', NULL, 'Email Setting', 'Email Sender'),
(5, 'smtp_driver', 'mail', 'select', 'smtp,mail,sendmail', NULL, '2018-07-13 03:11:40', NULL, 'Email Setting', 'Mail Driver'),
(6, 'smtp_host', NULL, 'text', NULL, NULL, '2018-07-13 03:11:40', NULL, 'Email Setting', 'SMTP Host'),
(7, 'smtp_port', '25', 'text', NULL, 'default 25', '2018-07-13 03:11:40', NULL, 'Email Setting', 'SMTP Port'),
(8, 'smtp_username', NULL, 'text', NULL, NULL, '2018-07-13 03:11:40', NULL, 'Email Setting', 'SMTP Username'),
(9, 'smtp_password', NULL, 'text', NULL, NULL, '2018-07-13 03:11:40', NULL, 'Email Setting', 'SMTP Password'),
(10, 'appname', 'Botintel', 'text', NULL, NULL, '2018-07-13 03:11:40', NULL, 'Application Setting', 'Application Name'),
(11, 'default_paper_size', 'Legal', 'text', NULL, 'Paper size, ex : A4, Legal, etc', '2018-07-13 03:11:40', NULL, 'Application Setting', 'Default Paper Print Size'),
(12, 'logo', 'uploads/2018-07/6aaa09927e13a09815ee97b5b536c5e7.png', 'upload_image', NULL, NULL, '2018-07-13 03:11:40', NULL, 'Application Setting', 'Logo'),
(13, 'favicon', 'uploads/2018-07/3b42d909b2f3d5a2013e26698cd0f2ef.jpg', 'upload_image', NULL, NULL, '2018-07-13 03:11:40', NULL, 'Application Setting', 'Favicon'),
(14, 'api_debug_mode', 'true', 'select', 'true,false', NULL, '2018-07-13 03:11:40', NULL, 'Application Setting', 'API Debug Mode'),
(15, 'google_api_key', NULL, 'text', NULL, NULL, '2018-07-13 03:11:40', NULL, 'Application Setting', 'Google API Key'),
(16, 'google_fcm_key', NULL, 'text', NULL, NULL, '2018-07-13 03:11:40', NULL, 'Application Setting', 'Google FCM Key');

-- --------------------------------------------------------

--
-- Table structure for table `cms_statistics`
--

CREATE TABLE `cms_statistics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_statistics`
--

INSERT INTO `cms_statistics` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Counters', 'tasks', '2018-07-14 10:51:53', '2018-07-14 11:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `cms_statistic_components`
--

CREATE TABLE `cms_statistic_components` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_statistics` int(11) DEFAULT NULL,
  `componentID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `config` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_statistic_components`
--

INSERT INTO `cms_statistic_components` (`id`, `id_cms_statistics`, `componentID`, `component_name`, `area_name`, `sorting`, `name`, `config`, `created_at`, `updated_at`) VALUES
(1, 1, '5873140ec272c9c4b90187dbf5980d84', 'smallbox', 'area1', 0, NULL, '{\"name\":\"Total Tasks\",\"icon\":\"ion-podium\",\"color\":\"bg-red\",\"link\":\"admin\\/tasks\",\"sql\":\"Select count(\'id\') From tasks\"}', '2018-07-14 10:52:22', NULL),
(2, 1, '389827bc04b30aabadf1d08b945e6d05', 'smallbox', 'area3', 0, NULL, '{\"name\":\"Total Users\",\"icon\":\"ion-ios-people\",\"color\":\"bg-aqua\",\"link\":\"admin\\/customers\",\"sql\":\"select count(id) from users\"}', '2018-07-14 10:58:13', NULL),
(3, 1, '3b656ca636156205523127ce49d17721', 'smallbox', 'area2', 0, NULL, '{\"name\":\"Total Releases\",\"icon\":\"ion-cube\",\"color\":\"bg-green\",\"link\":\"admin\\/releases\",\"sql\":\"Select count(id) from releases\"}', '2018-07-14 10:58:36', NULL),
(4, 1, 'a6bf70cda0529557d1f815a4b09de600', 'smallbox', 'area4', 0, NULL, '{\"name\":\"Total Profiles\",\"icon\":\"ion-ios-pricetag\",\"color\":\"bg-yellow\",\"link\":\"admin\\/profiles\",\"sql\":\"select count(\'id\') From profile\"}', '2018-07-14 11:02:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_users`
--

CREATE TABLE `cms_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`id`, `name`, `photo`, `email`, `password`, `id_cms_privileges`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Super Admin', 'uploads/1/2018-07/favicon.jpg', 'flk-admin@yopmail.com', '$2y$10$.80B7Fuzb6uA5WjId8g21ObjH0q.49Xux.y2lcv/FzV7hMHMsXRXC', 1, '2018-07-13 03:11:39', '2018-07-14 12:21:48', 'Active'),
(2, 'Admin', 'uploads/2/2018-07/favicon.jpg', 'admin@botintel.com', '$2y$10$pdle9izjusLdQWFlyI4GXuQmwDn1VeY4Mi0I4ZI9lTA3tCvvyb3gG', 2, '2018-07-13 06:11:45', '2018-07-16 15:35:24', NULL);

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
(1, '2016_08_07_145904_add_table_cms_apicustom', 1),
(2, '2016_08_07_150834_add_table_cms_dashboard', 1),
(3, '2016_08_07_151210_add_table_cms_logs', 1),
(4, '2016_08_07_151211_add_details_cms_logs', 1),
(5, '2016_08_07_152014_add_table_cms_privileges', 1),
(6, '2016_08_07_152214_add_table_cms_privileges_roles', 1),
(7, '2016_08_07_152320_add_table_cms_settings', 1),
(8, '2016_08_07_152421_add_table_cms_users', 1),
(9, '2016_08_07_154624_add_table_cms_menus_privileges', 1),
(10, '2016_08_07_154624_add_table_cms_moduls', 1),
(11, '2016_08_17_225409_add_status_cms_users', 1),
(12, '2016_08_20_125418_add_table_cms_notifications', 1),
(13, '2016_09_04_033706_add_table_cms_email_queues', 1),
(14, '2016_09_16_035347_add_group_setting', 1),
(15, '2016_09_16_045425_add_label_setting', 1),
(16, '2016_09_17_104728_create_nullable_cms_apicustom', 1),
(17, '2016_10_01_141740_add_method_type_apicustom', 1),
(18, '2016_10_01_141846_add_parameters_apicustom', 1),
(19, '2016_10_01_141934_add_responses_apicustom', 1),
(20, '2016_10_01_144826_add_table_apikey', 1),
(21, '2016_11_14_141657_create_cms_menus', 1),
(22, '2016_11_15_132350_create_cms_email_templates', 1),
(23, '2016_11_15_190410_create_cms_statistics', 1),
(24, '2016_11_17_102740_create_cms_statistic_components', 1),
(25, '2017_06_06_164501_add_deleted_at_cms_moduls', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `short_description` text,
  `blog_image` text,
  `is_blog` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `page_slug`, `page_content`, `short_description`, `blog_image`, `is_blog`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Terms & Conditions', 'terms-conditions', '<p style=\"margin-bottom: 20px; font-size: 19px; line-height: 30px; color: rgb(255, 255, 255); font-family: Raleway, sans-serif; background-color: rgb(25, 25, 25);\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p><p style=\"margin-bottom: 20px; font-size: 19px; line-height: 30px; color: rgb(255, 255, 255); font-family: Raleway, sans-serif; background-color: rgb(25, 25, 25);\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p><p style=\"margin-bottom: 20px; font-size: 19px; line-height: 30px; color: rgb(255, 255, 255); font-family: Raleway, sans-serif; background-color: rgb(25, 25, 25);\"><span style=\"font-weight: 700;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</span></p>', NULL, NULL, 0, 1, '2018-07-17 07:58:52', NULL),
(2, 'Privacy Policy', 'privacy-policy', '<p style=\"margin-bottom: 20px; font-size: 19px; line-height: 30px; color: rgb(255, 255, 255); font-family: Raleway, sans-serif; background-color: rgb(25, 25, 25);\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p><p style=\"margin-bottom: 20px; font-size: 19px; line-height: 30px; color: rgb(255, 255, 255); font-family: Raleway, sans-serif; background-color: rgb(25, 25, 25);\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p><p style=\"margin-bottom: 20px; font-size: 19px; line-height: 30px; color: rgb(255, 255, 255); font-family: Raleway, sans-serif; background-color: rgb(25, 25, 25);\"><span style=\"font-weight: 700;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</span></p>', NULL, NULL, 0, 1, '2018-07-17 07:59:42', '2018-07-17 08:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_name` varchar(255) NOT NULL,
  `delivery_fname` varchar(255) DEFAULT NULL,
  `delivery_lname` varchar(255) DEFAULT NULL,
  `delivery_address1` varchar(255) DEFAULT NULL,
  `delivery_address2` varchar(255) DEFAULT NULL,
  `delivery_city` varchar(255) DEFAULT NULL,
  `delivery_state` varchar(255) DEFAULT NULL,
  `delivery_zip` varchar(255) DEFAULT NULL,
  `delivery_country` varchar(255) DEFAULT NULL,
  `delivery_phone` varchar(255) DEFAULT NULL,
  `payment_email` varchar(255) DEFAULT NULL,
  `payment_cardno` varchar(255) DEFAULT NULL,
  `payment_card_type` varchar(255) DEFAULT NULL,
  `payment_expmon` varchar(2) DEFAULT NULL,
  `payment_expyear` int(5) DEFAULT NULL,
  `payment_cvv` varchar(4) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `releases`
--

CREATE TABLE `releases` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `release_name` varchar(255) NOT NULL,
  `release_description` text NOT NULL,
  `release_image` varchar(255) DEFAULT NULL,
  `release_date` datetime NOT NULL,
  `submission_time` datetime DEFAULT NULL,
  `release_code` varchar(255) NOT NULL,
  `is_scrapped` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_At` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `releases`
--

INSERT INTO `releases` (`id`, `store_id`, `country`, `release_name`, `release_description`, `release_image`, `release_date`, `submission_time`, `release_code`, `is_scrapped`, `status`, `created_at`, `updated_At`) VALUES
(1, 2, 'US', 'NMD', 'Lorem ipsum dolor sit After, Contribute disciplining elit, sed do modus tempo incident ut labor et dolor magma aliquot. Ut Engine ad minim venial,', 'uploads/1/2018-07/favicon.jpg', '2018-07-19 12:00:00', '2018-07-19 12:00:00', 'AQ1789-100', 0, 1, '2018-07-13 09:39:38', NULL),
(83, 1, 'EU', 'Air Jordan 2 Retro', ' ', 'https://secure-images.nike.com/is/image/DotCom/385475_122?&wid=2500&fmt=png-alpha', '2018-06-09 07:00:00', '2018-06-09 07:00:00', '385475-122', 1, 1, '2018-07-16 10:23:54', NULL),
(84, 2, 'EU', 'test', 'test', 'uploads/2/2018-07/chrysanthemum.jpg', '2018-07-10 15:25:00', '2018-07-10 15:25:00', '22222', 0, 1, '2018-07-16 10:57:34', '2018-07-16 11:08:17'),
(125, 1, 'US', 'The 10: Nike Air Presto x Off-White', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AA3830_002?&wid=2500&fmt=png-alpha', '2018-07-27 16:00:00', '2018-07-27 16:00:00', 'AA3830-002', 1, 1, '2018-07-28 12:15:01', NULL),
(126, 1, 'US', 'Nike Air Max 97 Plus', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AH8144_101?&wid=2500&fmt=png-alpha', '2018-08-01 14:00:00', '2018-08-01 14:00:00', 'AH8144-101', 1, 1, '2018-07-28 12:16:01', NULL),
(127, 1, 'US', 'Nike Air Max Plus 97', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AH8143_100?&wid=2500&fmt=png-alpha', '2018-08-01 14:00:00', '2018-08-01 14:00:00', 'AH8143-100', 1, 1, '2018-07-28 12:16:01', NULL),
(128, 1, 'US', 'Air Jordan 10 Retro', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/310805_062?&wid=2500&fmt=png-alpha', '2018-07-28 14:00:00', '2018-07-28 14:00:00', '310805-062', 1, 1, '2018-07-28 12:16:01', NULL),
(129, 1, 'US', 'Air Jordan 3 Retro', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/136064_111?&wid=2500&fmt=png-alpha', '2018-07-21 14:00:00', '2018-07-21 14:00:00', '136064-111', 1, 1, '2018-07-28 12:16:01', NULL),
(130, 1, 'US', 'Nike Cortez Basic Leather OG', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/882254_164?&wid=2500&fmt=png-alpha', '2018-03-01 15:00:00', '2018-03-01 15:00:00', '882254-164', 1, 1, '2018-07-28 12:16:01', NULL),
(131, 1, 'US', 'Air Jordan XI Retro', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/378037_005?&wid=2500&fmt=png-alpha', '2018-07-23 16:00:00', '2018-07-23 16:00:00', '378037-005', 1, 1, '2018-07-28 12:16:01', NULL),
(132, 1, 'US', 'Air Jordan 1 Retro High OG SL', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AV3725_010?&wid=2500&fmt=png-alpha', '2018-07-23 16:00:00', '2018-07-23 16:00:00', 'AV3725-010', 1, 1, '2018-07-28 12:16:01', NULL),
(133, 1, 'US', 'Air Jordan 1 Retro High OG', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/555088_115?&wid=2500&fmt=png-alpha', '2018-07-23 16:00:00', '2018-07-23 16:00:00', '555088-115', 1, 1, '2018-07-28 12:16:01', NULL),
(134, 1, 'US', 'Air Jordan 1 Retro High OG NRG', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/861428_061?&wid=2500&fmt=png-alpha', '2018-07-23 16:00:00', '2018-07-23 16:00:00', '861428-061', 1, 1, '2018-07-28 12:16:01', NULL),
(135, 1, 'US', 'Air Jordan 1 Retro High', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AQ7476_016?&wid=2500&fmt=png-alpha', '2018-07-23 16:00:00', '2018-07-23 16:00:00', 'AQ7476-016', 1, 1, '2018-07-28 12:16:01', NULL),
(136, 1, 'US', 'Air Jordan 1 Retro High OG NRG', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/861428_007?&wid=2500&fmt=png-alpha', '2018-07-23 16:00:00', '2018-07-23 16:00:00', '861428-007', 1, 1, '2018-07-28 12:16:01', NULL),
(137, 1, 'US', 'Nike Air Skylon II', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AO1551_103?&wid=2500&fmt=png-alpha', '2018-07-30 14:00:00', '2018-07-30 14:00:00', 'AO1551-103', 1, 1, '2018-07-28 12:16:01', NULL),
(138, 1, 'US', 'Nike Air Skylon II', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AO1551_100?&wid=2500&fmt=png-alpha', '2018-07-30 14:00:00', '2018-07-30 14:00:00', 'AO1551-100', 1, 1, '2018-07-28 12:16:01', NULL),
(139, 1, 'US', 'Air Jordan 1 High Zip Awok', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/BQ0864_106?&wid=2500&fmt=png-alpha', '2018-07-23 14:00:00', '2018-07-23 14:00:00', 'BQ0864-106', 1, 1, '2018-07-28 12:16:01', NULL),
(140, 1, 'US', 'Air Jordan 1 High Zip Awok', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/BQ0864_601?&wid=2500&fmt=png-alpha', '2018-07-23 14:00:00', '2018-07-23 14:00:00', 'BQ0864-601', 1, 1, '2018-07-28 12:16:01', NULL),
(141, 1, 'US', 'Nike Air Flightposite', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AO9378_500?&wid=2500&fmt=png-alpha', '2018-07-28 14:00:00', '2018-07-28 14:00:00', 'AO9378-500', 1, 1, '2018-07-28 12:16:01', NULL),
(142, 1, 'US', 'Nike Air Max 95 Essential Camo', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AQ6303_001?&wid=2500&fmt=png-alpha', '2018-07-28 14:00:00', '2018-07-28 14:00:00', 'AQ6303-001', 1, 1, '2018-07-28 12:16:01', NULL),
(143, 1, 'US', 'Nike Air Max 95 Camo', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AQ6385_200?&wid=2500&fmt=png-alpha', '2018-07-28 14:00:00', '2018-07-28 14:00:00', 'AQ6385-200', 1, 1, '2018-07-28 12:16:01', NULL),
(144, 1, 'US', 'Nike Air Max 1', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AQ6378_001?&wid=2500&fmt=png-alpha', '2018-07-28 14:00:00', '2018-07-28 14:00:00', 'AQ6378-001', 1, 1, '2018-07-28 12:16:01', NULL),
(145, 1, 'US', 'Nike Air Max 98', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AQ6156_300?&wid=2500&fmt=png-alpha', '2018-07-28 14:00:00', '2018-07-28 14:00:00', 'AQ6156-300', 1, 1, '2018-07-28 12:16:01', NULL),
(146, 1, 'US', 'Nike Air Max 98 Camo', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AQ6468_300?&wid=2500&fmt=png-alpha', '2018-07-28 14:00:00', '2018-07-28 14:00:00', 'AQ6468-300', 1, 1, '2018-07-28 12:16:01', NULL),
(147, 1, 'US', 'Nike Air Max 1 Parra', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AT3057_100?&wid=2500&fmt=png-alpha', '2018-07-21 14:00:00', '2018-07-21 14:00:00', 'AT3057-100', 1, 1, '2018-07-28 12:16:01', NULL),
(148, 1, 'US', 'Air Jordan 4 Retro x Levi\'s', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AO2571_001?&wid=2500&fmt=png-alpha', '2018-07-20 16:00:00', '2018-07-20 16:00:00', 'AO2571-001', 1, 1, '2018-07-28 12:16:01', NULL),
(149, 1, 'US', 'Air Jordan 4 Retro Levis NRG', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AQ9103_001?&wid=2500&fmt=png-alpha', '2018-07-20 16:00:00', '2018-07-20 16:00:00', 'AQ9103-001', 1, 1, '2018-07-28 12:17:01', NULL),
(150, 1, 'US', 'Air Jordan 13 Retro', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AQ1757_004?&wid=2500&fmt=png-alpha', '2018-07-27 14:00:00', '2018-07-27 14:00:00', 'AQ1757-004', 1, 1, '2018-07-28 12:17:01', NULL),
(151, 1, 'US', 'Nike Air Skylon II', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AO4540_101?&wid=2500&fmt=png-alpha', '2018-07-20 14:00:00', '2018-07-20 14:00:00', 'AO4540-101', 1, 1, '2018-07-28 12:17:01', NULL),
(152, 1, 'US', 'Nike Air Skylon II', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AO4540_102?&wid=2500&fmt=png-alpha', '2018-07-20 14:00:00', '2018-07-20 14:00:00', 'AO4540-102', 1, 1, '2018-07-28 12:17:01', NULL),
(153, 1, 'US', 'Nike Air Skylon II', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AO4540_100?&wid=2500&fmt=png-alpha', '2018-07-20 14:00:00', '2018-07-20 14:00:00', 'AO4540-100', 1, 1, '2018-07-28 12:17:01', NULL),
(154, 1, 'US', 'Nike Air Max Deluxe', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AQ1272_400?&wid=2500&fmt=png-alpha', '2018-07-26 14:00:00', '2018-07-26 14:00:00', 'AQ1272-400', 1, 1, '2018-07-28 12:17:01', NULL),
(155, 1, 'US', 'Nike Air Max 95 OG', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AT2865_100?&wid=2500&fmt=png-alpha', '2018-07-19 14:00:00', '2018-07-19 14:00:00', 'AT2865-100', 1, 1, '2018-07-28 12:17:01', NULL),
(156, 1, 'US', 'Nike Air Max 95 OG', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AT2865_200?&wid=2500&fmt=png-alpha', '2018-08-16 14:00:00', '2018-08-16 14:00:00', 'AT2865-200', 1, 1, '2018-07-28 12:17:01', NULL),
(157, 1, 'US', 'Air Jordan 3 Retro', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AQ3835_160?&wid=2500&fmt=png-alpha', '2018-07-18 16:05:00', '2018-07-18 16:05:00', 'AQ3835-160', 1, 1, '2018-07-28 12:17:01', NULL),
(158, 1, 'US', 'Air Jordan 3 Retro', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/136064_116?&wid=2500&fmt=png-alpha', '2018-07-18 16:05:00', '2018-07-18 16:05:00', '136064-116', 1, 1, '2018-07-28 12:17:01', NULL),
(159, 1, 'US', 'Air Jordan 3 Retro OG', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/854262_001?&wid=2500&fmt=png-alpha', '2018-07-18 16:05:00', '2018-07-18 16:05:00', '854262-001', 1, 1, '2018-07-28 12:17:01', NULL),
(160, 1, 'US', 'Air Jordan 18 Retro', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AA2494_601?&wid=2500&fmt=png-alpha', '2018-07-18 16:05:00', '2018-07-18 16:05:00', 'AA2494-601', 1, 1, '2018-07-28 12:17:01', NULL),
(161, 1, 'US', 'Air Jordan XI Retro', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/378037_623?&wid=2500&fmt=png-alpha', '2018-07-18 16:05:00', '2018-07-18 16:05:00', '378037-623', 1, 1, '2018-07-28 12:17:01', NULL),
(162, 1, 'US', 'Air Jordan 11 Retro Low ', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/528895_003?&wid=2500&fmt=png-alpha', '2018-07-18 16:05:00', '2018-07-18 16:05:00', '528895-003', 1, 1, '2018-07-28 12:17:01', NULL),
(163, 1, 'US', 'Air Jordan 11 Retro Low', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AV2187_441?&wid=2500&fmt=png-alpha', '2018-07-18 16:05:00', '2018-07-18 16:05:00', 'AV2187-441', 1, 1, '2018-07-28 12:17:01', NULL),
(164, 1, 'US', 'Air Jordan 1 Retro High OG', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/555088_403?&wid=2500&fmt=png-alpha', '2018-07-18 16:05:00', '2018-07-18 16:05:00', '555088-403', 1, 1, '2018-07-28 12:17:01', NULL),
(165, 1, 'US', 'Air Jordan 1 Retro High OG', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/555088_013?&wid=2500&fmt=png-alpha', '2018-07-18 16:05:00', '2018-07-18 16:05:00', '555088-013', 1, 1, '2018-07-28 12:17:01', NULL),
(166, 1, 'US', 'Nike Zoom KD11', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AO2604_900?&wid=2500&fmt=png-alpha', '2018-07-17 18:00:00', '2018-07-17 18:00:00', 'AO2604-900', 1, 1, '2018-07-28 12:17:01', NULL),
(167, 1, 'US', 'Nike Moon Racer', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AQ4121_001?&wid=2500&fmt=png-alpha', '2018-08-02 14:00:00', '2018-08-02 14:00:00', 'AQ4121-001', 1, 1, '2018-07-28 12:17:01', NULL),
(168, 1, 'US', 'Nike Moon Racer', 'Nike and Virgil Abloh reissue The Ten: Air Presto x Off-White in striking monochrome. This maximalist take on the early 2000s icon features additional design elements jammed right back into the cage and across the heel, all the while maintaining the characteristic t-shirt-like fit.', 'https://secure-images.nike.com/is/image/DotCom/AQ4121_200?&wid=2500&fmt=png-alpha', '2018-08-02 14:00:00', '2018-08-02 14:00:00', 'AQ4121-200', 1, 1, '2018-07-28 12:17:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_name`, `status`, `created_at`, `updated_at`) VALUES
(1, '3.5', 1, '2018-07-13 13:36:41', NULL),
(2, '4', 1, '2018-07-13 13:36:46', NULL),
(3, '4.5', 1, '2018-07-13 13:37:03', NULL),
(4, '5', 1, '2018-07-13 13:37:08', NULL),
(5, '5.5', 1, '2018-07-13 13:37:14', NULL),
(6, '6', 1, '2018-07-13 13:37:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `store_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nike', 1, '2018-07-13 08:29:24', '2018-07-16 12:23:04'),
(2, 'Adidas', 1, '2018-07-13 08:29:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `subscription_name` varchar(255) NOT NULL,
  `subscription_description` text,
  `subscription_price` varchar(255) NOT NULL,
  `number_of_profiles` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `subscription_name`, `subscription_description`, `subscription_price`, `number_of_profiles`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Premium', '<pre msgtype=\"msg\" class=\"zcmsgcnt\" style=\"margin-right: 50px; margin-bottom: 0px; padding: 0px; border-width: 0px; border-style: initial; border-color: initial; outline: 0px; font-size: 15px; vertical-align: baseline; background: transparent; font-family: inherit; text-shadow: none; white-space: pre-wrap; color: rgb(21, 21, 21);\"><br></pre>', '40', 5, 1, '2018-07-13 09:05:55', '2018-07-13 09:08:04'),
(2, 'Plus', '', '70', 10, 1, '2018-07-13 09:06:22', '2018-07-13 09:07:49'),
(3, 'Elite', '', '100', 20, 1, '2018-07-13 09:07:01', '2018-07-13 09:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `stripe_plan` varchar(255) NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `name`, `stripe_plan`, `stripe_id`, `quantity`, `trial_ends_at`, `ends_at`, `created_at`, `updated_at`) VALUES
(1, 48, 'main', 'premium', 'sub_DIjsb5H6LnfY9v', 1, NULL, NULL, '2018-07-26 12:16:46', '2018-07-26 07:16:46'),
(2, 49, 'main', 'premium', 'sub_DIkAu6gnhV43xV', 1, NULL, NULL, '2018-07-26 12:35:04', '2018-07-26 07:35:04'),
(3, 50, 'main', 'premium', 'sub_DIkUu7vksnrXNw', 1, NULL, NULL, '2018-07-26 12:54:24', '2018-07-26 07:54:24'),
(4, 51, 'main', 'premium', 'sub_DIkVoyPnQwAHSU', 1, NULL, NULL, '2018-07-26 12:55:34', '2018-07-26 07:55:34'),
(5, 54, 'main', 'premium', 'sub_DIktcbyYMURPwJ', 1, NULL, NULL, '2018-07-26 13:20:04', '2018-07-26 08:20:04'),
(6, 55, 'main', 'premium', 'sub_DJ2tYDk8S0EpyA', 1, NULL, NULL, '2018-07-27 07:55:23', '2018-07-27 02:55:23'),
(7, 57, 'main', 'premium', 'sub_DJ2u1oTqR1qiDw', 1, NULL, NULL, '2018-07-27 07:56:26', '2018-07-27 02:56:26'),
(8, 59, 'main', 'premium', 'sub_DJ2zMYcnAhkfcF', 1, NULL, NULL, '2018-07-27 08:01:25', '2018-07-27 03:01:25'),
(9, 60, 'main', 'premium', 'sub_DJ30kyzjyQLttB', 1, NULL, NULL, '2018-07-27 08:03:02', '2018-07-27 03:03:02'),
(10, 61, 'main', 'premium', 'sub_DJ33JYNCpzb9dU', 1, NULL, NULL, '2018-07-27 08:06:02', '2018-07-27 03:06:02'),
(11, 62, 'main', 'premium', 'sub_DJ33P009Yg8XDn', 1, NULL, NULL, '2018-07-27 08:06:03', '2018-07-27 03:06:03'),
(12, 64, 'main', 'premium', 'sub_DJ3HywdIAEYXIu', 1, NULL, NULL, '2018-07-27 08:20:00', '2018-07-27 03:20:00'),
(13, 66, 'main', 'premium', 'sub_DJ3SIsqXFaet4t', 1, NULL, NULL, '2018-07-27 08:30:45', '2018-07-27 03:30:45'),
(14, 71, 'main', 'plus', 'sub_DJ5fY5xeT07ZO6', 1, NULL, NULL, '2018-07-27 10:47:40', '2018-07-27 05:47:40'),
(15, 72, 'main', 'premium', 'sub_DJ5hEBLSZP5wiq', 1, NULL, '2018-08-27 05:50:16', '2018-07-27 10:50:19', '2018-07-28 02:37:51'),
(16, 73, 'main', 'elite', 'sub_DJ5tZBS85DinCV', 1, NULL, NULL, '2018-07-27 11:01:33', '2018-07-27 06:01:33'),
(17, 74, 'main', 'plus', 'sub_DJ5x3P6FSfYgO7', 1, NULL, NULL, '2018-07-27 11:06:00', '2018-07-27 06:06:00'),
(18, 76, 'main', 'plus', 'sub_DJ6QGjzGaIBeyp', 1, NULL, NULL, '2018-07-27 11:35:00', '2018-07-27 06:35:00'),
(19, 77, 'main', 'elite', 'sub_DJ6hjUt6luW6SG', 1, NULL, NULL, '2018-07-27 11:51:31', '2018-07-27 06:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `release_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `successful` int(2) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `release_id`, `size_id`, `profile_id`, `status`, `successful`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 0, '2018-07-13 13:37:44', '2018-07-16 12:16:23'),
(2, 84, 2, 1, 1, 0, '2018-07-20 08:36:35', '2018-07-20 08:36:35'),
(3, 83, 2, 1, 1, 0, '2018-07-20 08:36:35', '2018-07-20 08:36:35'),
(4, 84, 2, 2, 1, 0, '2018-07-20 08:36:35', '2018-07-20 08:36:35'),
(5, 83, 1, 1, 1, 1, '2018-07-20 08:45:14', '2018-07-20 08:45:14'),
(6, 83, 1, 1, 1, 0, '2018-07-20 08:45:14', '2018-07-20 08:45:14'),
(7, 139, 3, 1, 1, 0, '2018-07-20 08:45:14', '2018-07-30 08:38:50'),
(8, 135, 2, 1, 1, 0, '2018-07-23 07:31:00', '2018-07-30 08:38:58'),
(9, 158, 1, 2, 1, 0, '2018-07-23 07:31:00', '2018-07-30 08:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `nick_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `subscription_active` tinyint(4) DEFAULT NULL,
  `stripe_id` varchar(255) DEFAULT NULL,
  `stripe_plan` int(25) DEFAULT NULL,
  `card_brand` varchar(255) DEFAULT NULL,
  `card_last_four` int(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `subscription_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `subscription_id`, `full_name`, `nick_name`, `email`, `password`, `phone`, `country`, `gender`, `timezone`, `language`, `status`, `remember_token`, `created_at`, `updated_at`, `subscription_active`, `stripe_id`, `stripe_plan`, `card_brand`, `card_last_four`, `trial_ends_at`, `subscription_ends_at`) VALUES
(1, 3, 'test', 'test', 'test@yopmail.com', '$2y$10$HH811euzNBLESR5RvHiPZugaTolZP4GPbZeVp5O2IxUynsRFps212', '21212121212', 'CA', 'Male', '(GMT -8:00) Pacific Time (US & Canada)', 'LV', 1, 'dcJgUymVbQMKRILR4UCKwFVpJlWl6J3MWRBeHWrv9uu4wyfF3iFbjsFyvIoR', '2018-07-13 10:11:36', '2018-07-27 13:49:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 2, 'test test', NULL, 'testsss@yopmail.com', NULL, '232323', NULL, NULL, NULL, NULL, 0, 'Dctg2vv0Ihuzha1BSgkEOho8rVRGJdYuvP5fMi8WGB75BZk3Wqz36VNCnnkT', '2018-07-18 06:24:14', '2018-07-18 06:24:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1, 'resaea d', NULL, 'asda@yopmail.com', NULL, '23232323223', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-18 06:25:29', '2018-07-18 06:25:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 1, 'rttesae saea', NULL, 'eatest@yopmail.com', NULL, '2323232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-24 07:29:37', '2018-07-24 07:29:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 2, 'asda das', NULL, 'sda@yopmail.com', NULL, '232323', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-24 08:05:54', '2018-07-24 08:05:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 1, 'sdfsd fdsfs', NULL, 'fsfs@yopmail.com', NULL, '23232323232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-24 10:31:56', '2018-07-24 10:31:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 1, 'tsadada tsadada', NULL, 'testdsf@yopmail.com', NULL, '22222', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-24 10:46:37', '2018-07-24 10:46:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 1, 'teseae teseae', NULL, 'dasd@yopmail.com', NULL, '2323232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-24 10:47:34', '2018-07-24 10:47:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 1, 'fsdfsf fsdfsf', NULL, 'fsdfds@yopmail.com', NULL, '23232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-24 10:57:46', '2018-07-24 10:57:46', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 1, 'dfsfsf dfsfsf', NULL, 'dasdas@yopmail.com', NULL, '2222', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-24 11:04:04', '2018-07-24 11:04:04', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 2, 'fdsfs fdsfs', NULL, 'sdfsfs@yopmail.com', NULL, '22222222222222', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 06:37:50', '2018-07-26 06:37:50', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 1, 'dsfmsd dsfmsd', NULL, 'sda@yopmail.com', NULL, '222222', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 06:48:07', '2018-07-26 06:48:07', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 1, 'tesese tesese', NULL, 'tsdf@yopmail.com', NULL, '3232323', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 06:49:09', '2018-07-26 06:49:09', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 1, 'tesese tesese', NULL, 'tsdf@yopmail.com', NULL, '3232323', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 06:52:52', '2018-07-26 06:52:52', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 1, 'tesae tesae', NULL, 'dsf@yopmail.com', NULL, '23232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 06:53:23', '2018-07-26 06:53:23', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 1, 'dsfs dsfs', NULL, 'dfsf@yopmail.com', NULL, '23232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 06:55:02', '2018-07-26 06:55:02', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 1, 'dsfs dsfs', NULL, 'dfsf@yopmail.com', NULL, '23232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 06:55:37', '2018-07-26 06:55:37', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 1, 'dsfs dsfs', NULL, 'dfsf@yopmail.com', NULL, '23232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 07:04:11', '2018-07-26 07:04:11', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 1, 'tdfds tdfds', NULL, 'fs@yopmail.com', NULL, '2222', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 07:04:39', '2018-07-26 07:04:39', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 1, 'te te', NULL, 'sdad@yopmail.com', NULL, '323232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 09:47:03', '2018-07-26 09:47:03', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 1, 'tesad tesad', NULL, 'gfdg@yopmail.com', NULL, '2323232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 11:19:50', '2018-07-26 11:19:50', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 1, 'tesad tesad', NULL, 'gfdg@yopmail.com', NULL, '2323232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 11:25:54', '2018-07-26 11:25:56', 0, 'cus_DIj3fuyTHufMsT', NULL, NULL, NULL, NULL, NULL),
(37, 1, 'tesad tesad', NULL, 'gfdg@yopmail.com', NULL, '2323232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 11:27:43', '2018-07-26 11:27:45', 0, 'cus_DIj5PfqckcWuQx', NULL, NULL, NULL, NULL, NULL),
(38, 1, 'test test', NULL, 'gdsf@yopmail.com', NULL, '23232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 11:28:15', '2018-07-26 11:28:17', 0, 'cus_DIj59jp13EHkb4', NULL, NULL, NULL, NULL, NULL),
(39, 1, 'test test', NULL, 'gdsf@yopmail.com', NULL, '23232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 11:28:48', '2018-07-26 11:28:58', 0, 'cus_DIj6d7O9c3b6Zz', NULL, NULL, NULL, NULL, NULL),
(40, 2, 'tfsf tfsf', NULL, 'fsdfsd@yopmail.com', NULL, '232323', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 11:29:27', '2018-07-26 11:29:37', 0, 'cus_DIj7dClKE8if7q', NULL, 'Visa', 4242, NULL, NULL),
(41, 1, 'fgsfsd fgsfsd', NULL, 'tfm@yopmail.com', NULL, '23232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 11:49:32', '2018-07-26 11:49:42', 0, 'cus_DIjRiWlPPxSXZy', NULL, 'Visa', 4242, NULL, NULL),
(42, 1, 'fgsfsd fgsfsd', NULL, 'tfm@yopmail.com', NULL, '23232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 11:58:01', '2018-07-26 11:58:02', 0, 'cus_DIjZtL8MXUi7bS', NULL, NULL, NULL, NULL, NULL),
(43, 1, 'fsdfs fsdfs', NULL, 'das@yopmail.com', NULL, '22222', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 11:58:40', '2018-07-26 11:58:50', 0, 'cus_DIjaNEAFXzRbxH', NULL, 'Visa', 4242, NULL, NULL),
(44, 1, 'fsdfs fsdfs', NULL, 'das@yopmail.com', NULL, '22222', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 12:01:18', '2018-07-26 12:01:20', 0, 'cus_DIjczndj3yC2e2', NULL, NULL, NULL, NULL, NULL),
(45, 4, 'adasd adasd', NULL, 'sada@yopmail.com', NULL, '2222', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 12:01:50', '2018-07-26 12:01:59', 0, 'cus_DIjdzco3nez42N', NULL, 'Visa', 4242, NULL, NULL),
(46, 1, 'gfhf gfhf', NULL, 'dasa@yopmail.com', NULL, '2222', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 12:13:13', '2018-07-26 12:13:22', 0, 'cus_DIjoS1188A3HjP', NULL, 'Visa', 4242, NULL, NULL),
(47, 2, 'gfhf gfhf', NULL, 'dasa@yopmail.com', NULL, '2222', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 12:14:55', '2018-07-26 12:15:07', 0, 'cus_DIjqcWxA188BgQ', NULL, 'Visa', 4242, NULL, NULL),
(48, 2, 'ghfh ghfh', NULL, 'sada@yopmail.com', NULL, '2323232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 12:16:34', '2018-07-26 12:16:43', 0, 'cus_DIjsdcRShuG4n9', NULL, 'Visa', 4242, NULL, NULL),
(49, 2, 'fsdjfsd fsdjfsd', NULL, 'sada@yopmail.com', NULL, '22222', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 12:34:49', '2018-07-26 12:35:02', 0, 'cus_DIkAJhXfSj5auz', NULL, 'Visa', 4242, NULL, NULL),
(50, 3, 'dfdsfs dfdsfs', NULL, 'dfas@yopmail.com', NULL, '2222', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 12:54:13', '2018-07-26 12:54:22', 0, 'cus_DIkT5EI5ax7Uqx', NULL, 'Visa', 4242, NULL, NULL),
(51, 2, 'fsdfds fsdfds', NULL, 'fsdf@yopmail.com', NULL, '222222', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 12:55:21', '2018-07-26 12:55:32', 0, 'cus_DIkVrFYtUCoDDR', NULL, 'Visa', 4242, NULL, NULL),
(52, 1, 'fsfsd fsfsd', NULL, 'dfs@yopmail.com', NULL, '23232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 13:12:37', '2018-07-26 13:12:37', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 1, 'fsfsd fsfsd', NULL, 'dfs@yopmail.com', NULL, '23232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 13:18:23', '2018-07-26 13:18:23', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 1, 'fsfsd fsfsd', NULL, 'dfs@yopmail.com', NULL, '23232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-26 13:19:53', '2018-07-26 13:20:01', 0, 'cus_DIkt1Qdmh21d4b', NULL, 'Visa', 4242, NULL, NULL),
(55, 2, 'dasda dasda', NULL, 'asdda@yopmail.com', NULL, '2222', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 07:55:11', '2018-07-27 07:55:21', 0, 'cus_DJ2swZEKAT00AY', NULL, 'Visa', 4242, NULL, NULL),
(56, 2, 'dasda dasda', NULL, 'asdda@yopmail.com', NULL, '2222', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 07:55:41', '2018-07-27 07:55:43', 0, 'cus_DJ2tx9wWNtJPmj', NULL, NULL, NULL, NULL, NULL),
(57, 4, 'dasd dasd', NULL, 'das@yopmail.com', NULL, '22323232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 07:56:16', '2018-07-27 07:56:24', 0, 'cus_DJ2tKegqQb8MPo', NULL, 'Visa', 4242, NULL, NULL),
(58, 4, 'dasd dasd', NULL, 'das@yopmail.com', NULL, '22323232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 08:00:37', '2018-07-27 08:00:39', 0, 'cus_DJ2yvyvmpsXi8L', NULL, NULL, NULL, NULL, NULL),
(59, 2, 'teseae teseae', NULL, 'sdjf@yopmail.com', NULL, '2323232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 08:01:12', '2018-07-27 08:01:23', 0, 'cus_DJ2yYiyHjPgVQ4', NULL, 'Visa', 4242, NULL, NULL),
(60, 1, 'asdasd asdasd', NULL, 'asdff@yopmail.com', NULL, '23232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 08:02:49', '2018-07-27 08:02:59', 0, 'cus_DJ30WwIQI3gGiY', NULL, 'Visa', 4242, NULL, NULL),
(61, 1, 'dasda dasda', NULL, 'dasd2@yopmail.com', NULL, '232323', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 08:05:51', '2018-07-27 08:05:59', 0, 'cus_DJ33hf6eZ8e7T9', NULL, 'Visa', 4242, NULL, NULL),
(62, 1, 'dasda dasda', NULL, 'dasd2@yopmail.com', NULL, '232323', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 08:05:52', '2018-07-27 08:06:01', 0, 'cus_DJ33RvYiuwkKHE', NULL, 'Visa', 4242, NULL, NULL),
(63, 1, 'dasda dasda', NULL, 'dasd2@yopmail.com', NULL, '232323', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 08:15:07', '2018-07-27 08:15:09', 0, 'cus_DJ3CmlFMPBksmv', NULL, NULL, NULL, NULL, NULL),
(64, 2, 'dsad dsad', NULL, 'sadas@yopmail.com', NULL, '232332', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 08:19:47', '2018-07-27 08:19:58', 0, 'cus_DJ3H9Y2i692AvM', NULL, 'Visa', 4242, NULL, NULL),
(65, 2, 'dsad dsad', NULL, 'sadas@yopmail.com', NULL, '232332', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 08:29:43', '2018-07-27 08:29:45', 0, 'cus_DJ3RKwCtEMcK45', NULL, NULL, NULL, NULL, NULL),
(66, 1, 'fgdfg fgdfg', NULL, 'gfdg@yopmail.com', NULL, '3434343', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 08:30:34', '2018-07-27 08:30:43', 0, 'cus_DJ3SU0lmlmUzob', NULL, 'Visa', 4242, NULL, NULL),
(67, 1, 'fgdfg fgdfg', NULL, 'gfdg@yopmail.com', NULL, '3434343', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 08:31:01', '2018-07-27 08:31:02', 0, 'cus_DJ3SOndGr9Q6nh', NULL, NULL, NULL, NULL, NULL),
(68, 2, 'sdad sdad', NULL, 'ndasd@yopmail.com', NULL, '232323', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 10:39:46', '2018-07-27 10:39:46', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 2, 'sdad sdad', NULL, 'ndasd@yopmail.com', NULL, '232323', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 10:42:17', '2018-07-27 10:42:17', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 2, 'sdad sdad', NULL, 'ndasd@yopmail.com', NULL, '232323', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 10:42:45', '2018-07-27 10:42:45', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 2, 'sdad sdad', NULL, 'ndasd@yopmail.com', NULL, '232323', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 10:47:28', '2018-07-27 10:47:36', 0, 'cus_DJ5f3gsTLk7sgS', NULL, 'Visa', 4242, NULL, NULL),
(72, 0, 'dasda dasda', NULL, 'heello@yopmail.com', '$2y$10$HH811euzNBLESR5RvHiPZugaTolZP4GPbZeVp5O2IxUynsRFps212', '222222', NULL, NULL, NULL, NULL, 0, '4enp8g0Wpi9TIqclZOECpjBApMtdp9BDyMCxMYFewM0z5gznsmtXNjlnU8NH', '2018-07-27 10:50:07', '2018-07-28 08:07:13', 0, 'cus_DJ5hYlACYaiewM', NULL, 'Visa', 4242, NULL, NULL),
(73, 3, 'dasdamkg dasdamkg', NULL, 'kkk@yopmail.com', NULL, '23232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 11:01:22', '2018-07-27 11:01:30', 0, 'cus_DJ5tZX8XhU6Eeu', NULL, 'Visa', 4242, NULL, NULL),
(74, 2, 'test test', NULL, 'jjjj@yopmail.com', NULL, '2323232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 11:05:49', '2018-07-27 11:05:57', 0, 'cus_DJ5x4vljPWz2Hs', NULL, 'Visa', 4242, NULL, NULL),
(75, 2, 'test test', NULL, 'jjjj@yopmail.com', NULL, '2323232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 11:33:23', '2018-07-27 11:33:25', 1, 'cus_DJ6Pp29nOKiQvg', NULL, NULL, NULL, NULL, NULL),
(76, 2, 'haha haha', NULL, 'haha@yopmail.com', NULL, '23232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 11:34:49', '2018-07-27 11:34:57', 1, 'cus_DJ6Qk6tjTH3iwX', NULL, 'Visa', 4242, NULL, NULL),
(77, 3, 'sdfsf sdfsf', NULL, 'fg@yopmail.com', NULL, '2323232', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-27 11:51:19', '2018-07-27 11:51:29', 1, 'cus_DJ6hAMNHtBlEXe', NULL, 'Visa', 4242, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_apikey`
--
ALTER TABLE `cms_apikey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_logs`
--
ALTER TABLE `cms_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_menus`
--
ALTER TABLE `cms_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_moduls`
--
ALTER TABLE `cms_moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_notifications`
--
ALTER TABLE `cms_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_privileges`
--
ALTER TABLE `cms_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_settings`
--
ALTER TABLE `cms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_statistics`
--
ALTER TABLE `cms_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `releases`
--
ALTER TABLE `releases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_apikey`
--
ALTER TABLE `cms_apikey`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_logs`
--
ALTER TABLE `cms_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `cms_menus`
--
ALTER TABLE `cms_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `cms_moduls`
--
ALTER TABLE `cms_moduls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cms_notifications`
--
ALTER TABLE `cms_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_privileges`
--
ALTER TABLE `cms_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `cms_settings`
--
ALTER TABLE `cms_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cms_statistics`
--
ALTER TABLE `cms_statistics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `releases`
--
ALTER TABLE `releases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
