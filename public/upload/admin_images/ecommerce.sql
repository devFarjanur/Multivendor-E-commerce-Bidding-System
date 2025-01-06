-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2024 at 01:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `bid_requests`
--

CREATE TABLE `bid_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bid_amount` decimal(10,2) DEFAULT NULL,
  `bid_status` enum('pending','accepted','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bid_requests`
--

INSERT INTO `bid_requests` (`id`, `customer_id`, `product_id`, `vendor_id`, `bid_amount`, `bid_status`, `created_at`, `updated_at`) VALUES
(1, 23, 1, NULL, 799.99, 'pending', '2024-12-06 05:24:52', '2024-12-06 05:24:52'),
(2, 23, 2, NULL, 1499.99, 'pending', '2024-12-06 05:24:55', '2024-12-06 05:24:55'),
(3, 23, 12, NULL, 89.99, 'pending', '2024-12-06 05:25:01', '2024-12-06 05:25:01'),
(4, 24, 4, NULL, 19.99, 'pending', '2024-12-06 05:27:51', '2024-12-06 05:27:51'),
(5, 24, 3, NULL, 1299.99, 'pending', '2024-12-06 05:27:53', '2024-12-06 05:27:53'),
(6, 24, 7, NULL, 799.99, 'pending', '2024-12-06 05:27:57', '2024-12-06 05:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'electronics.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(2, 'Fashion', 'fashion.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(3, 'Home Appliances', 'home_appliances.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(4, 'Beauty & Personal Care', 'beauty_care.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(5, 'Groceries', 'groceries.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(6, 'Furniture', 'furniture.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(7, 'Health & Wellness', 'health_wellness.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(8, 'Toys & Games', 'toys_games.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(9, 'Books & Stationery', 'books_stationery.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(10, 'Mobile Phones & Accessories', 'mobile_phones.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(11, 'Shoes & Bags', 'shoes_bags.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(12, 'Jewelry', 'jewelry.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(13, 'Sports & Fitness', 'sports_fitness.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(14, 'Automotive', 'automotive.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(15, 'Pet Supplies', 'pet_supplies.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_10_29_131042_create_users_table', 1),
(3, '2024_10_30_121553_create_vendors_table', 1),
(4, '2024_10_30_124321_create_categories_table', 1),
(5, '2024_10_30_124322_create_subcategories_table', 1),
(6, '2024_10_30_130254_create_products_table', 1),
(7, '2024_10_30_131430_create_bid_requests_table', 1),
(8, '2024_10_30_133219_create_orders_table', 1),
(9, '2024_10_30_133925_create_payments_table', 1),
(10, '2024_10_30_134620_create_messages_table', 1),
(11, '2024_10_30_135107_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` enum('unread','read') NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','shipped','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` enum('COD','SSLCommerz') NOT NULL,
  `payment_status` enum('pending','completed','failed') NOT NULL DEFAULT 'pending',
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `bidding_end` datetime DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `vendor_id`, `category_id`, `subcategory_id`, `name`, `description`, `price`, `image`, `bidding_end`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'iPhone 13', 'Apple iPhone 13 with 128GB storage', 799.99, 'iphone13.webp', '2024-12-16 10:52:28', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(2, 2, 1, 2, 'Dell XPS 13', 'Dell XPS 13 Laptop with Intel i7', 1499.99, 'dell_xps13.webp', '2024-12-11 10:52:28', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(3, 3, 1, 3, 'Canon EOS 90D', 'Canon EOS 90D DSLR camera', 1299.99, 'canon_eos90d.webp', '2024-12-14 10:52:28', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(4, 4, 2, 4, 'Men\'s T-Shirt', 'Cotton Men\'s T-Shirt in various colors', 19.99, 'mens_tshirt.webp', '2024-12-13 10:52:28', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(5, 5, 2, 5, 'Women\'s Dress', 'Elegant Women\'s Dress for evening wear', 49.99, 'womens_dress.webp', '2024-12-18 10:52:28', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(6, 6, 2, 6, 'Leather Wallet', 'Genuine leather wallet for men', 29.99, 'leather_wallet.jpeg', '2024-12-21 10:52:28', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(7, 7, 3, 7, 'Samsung Refrigerator', 'Samsung 350L Frost Free Refrigerator', 799.99, 'samsung_fridge.webp', '2024-12-09 10:52:28', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(8, 8, 3, 8, 'LG Washing Machine', 'LG 7kg Fully Automatic Washing Machine', 499.99, 'lg_washing_machine.webp', '2024-12-15 10:52:28', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(9, 9, 3, 9, 'Panasonic Microwave', 'Panasonic Microwave Oven with 23L capacity', 119.99, 'panasonic_microwave.webp', '2024-12-20 10:52:28', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(10, 10, 4, 10, 'Moisturizing Cream', 'Hydrating Moisturizing Cream for dry skin', 25.99, 'moisturizing_cream.webp', '2024-12-12 10:52:28', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(11, 11, 4, 11, 'Hair Dryer', 'Professional Hair Dryer with multiple heat settings', 59.99, 'hair_dryer.png', '2024-12-19 10:52:28', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(12, 12, 4, 12, 'Makeup Kit', 'Complete Makeup Kit with various cosmetics', 89.99, 'makeup_kit.jpg', '2024-12-17 10:52:28', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(13, 13, 6, 13, 'Sofa Set', 'Luxury Sofa Set for living room', 999.99, 'sofa_set.jpg', '2024-12-10 10:52:28', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(14, 14, 6, 14, 'Wooden Bed', 'King-size Wooden Bed with mattress', 499.99, 'wooden_bed.jpg', '2024-12-21 10:52:28', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(15, 15, 6, 15, 'Office Chair', 'Ergonomic Office Chair with adjustable features', 149.99, 'office_chair.webp', '2024-12-16 10:52:28', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(16, 1, 1, 1, 'Smartwatch', 'Latest Smartwatch with health monitoring features', 199.99, 'smartwatch.webp', '2024-12-12 10:52:28', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(17, 2, 1, 2, 'HP Spectre x360', 'HP Spectre x360 Convertible Laptop', 1499.99, 'hp_spectre.jpg', '2024-12-14 10:52:28', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(18, 3, 1, 3, 'GoPro HERO9', 'GoPro HERO9 Black Edition for adventure recording', 399.99, 'gopro_hero9.webp', '2024-12-15 10:52:28', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `vendor_id`, `category_id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Mobile Phones', 'mobile_phones.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(2, 2, 1, 'Laptops', 'laptops.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(3, 3, 1, 'Cameras', 'cameras.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(4, 4, 2, 'Men\'s Clothing', 'mens_clothing.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(5, 5, 2, 'Women\'s Clothing', 'womens_clothing.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(6, 6, 2, 'Accessories', 'accessories.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(7, 7, 3, 'Refrigerators', 'refrigerators.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(8, 8, 3, 'Washing Machines', 'washing_machines.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(9, 9, 3, 'Microwaves', 'microwaves.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(10, 10, 4, 'Skincare', 'skincare.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(11, 11, 4, 'Hair Care', 'hair_care.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(12, 12, 4, 'Makeup', 'makeup.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(13, 13, 6, 'Living Room Furniture', 'living_room_furniture.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(14, 14, 6, 'Bedroom Furniture', 'bedroom_furniture.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28'),
(15, 15, 6, 'Office Furniture', 'office_furniture.jpg', 'active', '2024-12-06 04:52:28', '2024-12-06 04:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('vendor','customer','admin') NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `address`, `phone`, `profile_image`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$KJ5/TXSw4HxNSI9hjL60vezVcFUvXGGxxuYAPL5kb2os7uhvZJOse', 'admin', 'Admin Address', '+8801775282986', 'admin_image.png', NULL, NULL),
(2, 'Customer', 'user@gmail.com', '$2y$10$UpJtwOfXWwpgxSj8OYDSCOCoV8/iI4FjsyOpW5Yjb/HkPDiqBroi6', 'customer', 'Customer Address', '+8801775282988', 'customer_image.png', NULL, NULL),
(3, 'Vendor 1', 'vendor1@gmail.com', '$2y$10$ORMtIbWrIMfiFd6sV6gU3uhNi8kh0NI7x8h0uMMlg75QVi9pjOYhi', 'vendor', 'Vendor 1 Address', '+8801775280001', 'vendor_1_image.png', NULL, NULL),
(4, 'Vendor 2', 'vendor2@gmail.com', '$2y$10$gzT1E8s/04wHvfXAU0dyDO7l4PRriA82Zxsx18eGSYjOWGOQQ7HHu', 'vendor', 'Vendor 2 Address', '+8801775280002', 'vendor_2_image.png', NULL, NULL),
(5, 'Vendor 3', 'vendor3@gmail.com', '$2y$10$dCuUaWsJrYZ.glIC289.auR9EuwLVLSvTgkZUoc9UvolITQue/qBq', 'vendor', 'Vendor 3 Address', '+8801775280003', 'vendor_3_image.png', NULL, NULL),
(6, 'Vendor 4', 'vendor4@gmail.com', '$2y$10$LlGHW3.iOypcjzniiwjV/O1oJZJICrY2uqB9ysREcQtlERygqALjm', 'vendor', 'Vendor 4 Address', '+8801775280004', 'vendor_4_image.png', NULL, NULL),
(7, 'Vendor 5', 'vendor5@gmail.com', '$2y$10$teSifU0XHiBU9ZBsT5.QI.1hJNnooaURHZ7TfAD0wOpPO3IBieJcu', 'vendor', 'Vendor 5 Address', '+8801775280005', 'vendor_5_image.png', NULL, NULL),
(8, 'Vendor 6', 'vendor6@gmail.com', '$2y$10$uQb2v7dXoGtfZZhqV.Y90.6O/VOYdcXupF4uUxh5P8m/bLLZW.f36', 'vendor', 'Vendor 6 Address', '+8801775280006', 'vendor_6_image.png', NULL, NULL),
(9, 'Vendor 7', 'vendor7@gmail.com', '$2y$10$bwqzRtKdtDLlHveHOCWxrOQvop//vySI8HAHq8Tqd5XyhokNHHr.e', 'vendor', 'Vendor 7 Address', '+8801775280007', 'vendor_7_image.png', NULL, NULL),
(10, 'Vendor 8', 'vendor8@gmail.com', '$2y$10$F1SLr372mQiIauc5iby.6.lijKNrzzT28tH37A7m7t9a353H.U8y.', 'vendor', 'Vendor 8 Address', '+8801775280008', 'vendor_8_image.png', NULL, NULL),
(11, 'Vendor 9', 'vendor9@gmail.com', '$2y$10$IR0JCWa42pwKO4pI.MSIKObMgcWtaMmPpEor12TuJgWKnMvKjfzj6', 'vendor', 'Vendor 9 Address', '+8801775280009', 'vendor_9_image.png', NULL, NULL),
(12, 'Vendor 10', 'vendor10@gmail.com', '$2y$10$poad49q/ygoR7t3CwVMhXuxPEork.W0pEdOxMVs9b3G6/kBZaLsiq', 'vendor', 'Vendor 10 Address', '+8801775280010', 'vendor_10_image.png', NULL, NULL),
(13, 'Vendor 11', 'vendor11@gmail.com', '$2y$10$KnLlxuwRGftmjjaft12MH.FknW7PthX/xcWjbJWK/kusaitMBmWEW', 'vendor', 'Vendor 11 Address', '+8801775280011', 'vendor_11_image.png', NULL, NULL),
(14, 'Vendor 12', 'vendor12@gmail.com', '$2y$10$5g0jZ6luk/txmrz/XWmbpe4OuNEVtEuEZLiXGI5etqx.cYDqwmdri', 'vendor', 'Vendor 12 Address', '+8801775280012', 'vendor_12_image.png', NULL, NULL),
(15, 'Vendor 13', 'vendor13@gmail.com', '$2y$10$knhpKmCAcJgc1xOqHG3TKeWkXSikBkgZb/LAT/cjcy7jSAIC3e1sO', 'vendor', 'Vendor 13 Address', '+8801775280013', 'vendor_13_image.png', NULL, NULL),
(16, 'Vendor 14', 'vendor14@gmail.com', '$2y$10$8dneNWcV7XwiF.E4wIdmtOj6bLTYjApLAZnfPnq3O04DSmGGt8E.G', 'vendor', 'Vendor 14 Address', '+8801775280014', 'vendor_14_image.png', NULL, NULL),
(17, 'Vendor 15', 'vendor15@gmail.com', '$2y$10$GYKSnlHgPLbK41sCDusyQeVSD2/6DWZwLe32Bm60BnBM0dF3LXzk.', 'vendor', 'Vendor 15 Address', '+8801775280015', 'vendor_15_image.png', NULL, NULL),
(18, 'Vendor 16', 'vendor16@gmail.com', '$2y$10$2R2mXn9P4Pu3dFpf/8bu5OtV9uOZv1G5TsIRmIAJDE0ArvXDgEqk6', 'vendor', 'Vendor 16 Address', '+8801775280016', 'vendor_16_image.png', NULL, NULL),
(19, 'Vendor 17', 'vendor17@gmail.com', '$2y$10$JnfeI8HLUvvj.S8AIRuaEO5wJa5ol6ArTCdIiL6EvF0lj/9Z4K/4S', 'vendor', 'Vendor 17 Address', '+8801775280017', 'vendor_17_image.png', NULL, NULL),
(20, 'Vendor 18', 'vendor18@gmail.com', '$2y$10$ZIBcSrBMSqy5/4VbnBCGeeQg8qXgzEk3EuLB7u0a2YagjdZCSXUG6', 'vendor', 'Vendor 18 Address', '+8801775280018', 'vendor_18_image.png', NULL, NULL),
(21, 'Vendor 19', 'vendor19@gmail.com', '$2y$10$5JGGv9HMa4RwOFCmhbDfDuzOfZFWvmU0suD4riBc8ku7svT1bBoLC', 'vendor', 'Vendor 19 Address', '+8801775280019', 'vendor_19_image.png', NULL, NULL),
(22, 'Vendor 20', 'vendor20@gmail.com', '$2y$10$VHQxRdZXf/L1lYtxgnUrGewX.Ea/WjK6VaDib1HA5l/y2IqsoNv2.', 'vendor', 'Vendor 20 Address', '+8801775280020', 'vendor_20_image.png', NULL, NULL),
(23, 'Fahim', 'fahim@gmail.com', '$2y$10$p.UOmYXx8Ts2FpE1vHNWy.wnb1XQj2JQeoN9s1KqV.hvUeWxAAd4K', 'customer', NULL, '+8801775282989', NULL, '2024-12-06 05:24:49', '2024-12-06 05:24:49'),
(24, 'Tamim', 'tamim@gmail.com', '$2y$10$r3DkBE5n.emgweAqKfl7OuY46OFklafzaZtfZPOsvumXzOKAlieD2', 'customer', NULL, '+8801775282990', NULL, '2024-12-06 05:27:48', '2024-12-06 05:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `store_name` varchar(255) DEFAULT NULL,
  `store_logo` varchar(255) DEFAULT NULL,
  `status` enum('active','pending','rejected','inactive') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `user_id`, `store_name`, `store_logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Store of Vendor 1', 'vendor_1_logo.png', 'rejected', NULL, NULL),
(2, 4, 'Store of Vendor 2', 'vendor_2_logo.png', 'active', NULL, NULL),
(3, 5, 'Store of Vendor 3', 'vendor_3_logo.png', 'active', NULL, NULL),
(4, 6, 'Store of Vendor 4', 'vendor_4_logo.png', 'active', NULL, NULL),
(5, 7, 'Store of Vendor 5', 'vendor_5_logo.png', 'pending', NULL, NULL),
(6, 8, 'Store of Vendor 6', 'vendor_6_logo.png', 'active', NULL, NULL),
(7, 9, 'Store of Vendor 7', 'vendor_7_logo.png', 'rejected', NULL, NULL),
(8, 10, 'Store of Vendor 8', 'vendor_8_logo.png', 'rejected', NULL, NULL),
(9, 11, 'Store of Vendor 9', 'vendor_9_logo.png', 'active', NULL, NULL),
(10, 12, 'Store of Vendor 10', 'vendor_10_logo.png', 'active', NULL, NULL),
(11, 13, 'Store of Vendor 11', 'vendor_11_logo.png', 'active', NULL, NULL),
(12, 14, 'Store of Vendor 12', 'vendor_12_logo.png', 'rejected', NULL, NULL),
(13, 15, 'Store of Vendor 13', 'vendor_13_logo.png', 'active', NULL, NULL),
(14, 16, 'Store of Vendor 14', 'vendor_14_logo.png', 'active', NULL, NULL),
(15, 17, 'Store of Vendor 15', 'vendor_15_logo.png', 'pending', NULL, NULL),
(16, 18, 'Store of Vendor 16', 'vendor_16_logo.png', 'pending', NULL, NULL),
(17, 19, 'Store of Vendor 17', 'vendor_17_logo.png', 'active', NULL, NULL),
(18, 20, 'Store of Vendor 18', 'vendor_18_logo.png', 'pending', NULL, NULL),
(19, 21, 'Store of Vendor 19', 'vendor_19_logo.png', 'pending', NULL, NULL),
(20, 22, 'Store of Vendor 20', 'vendor_20_logo.png', 'rejected', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bid_requests`
--
ALTER TABLE `bid_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bid_requests_customer_id_foreign` (`customer_id`),
  ADD KEY `bid_requests_product_id_foreign` (`product_id`),
  ADD KEY `bid_requests_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_receiver_id_foreign` (`receiver_id`);

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
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_product_id_foreign` (`product_id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_vendor_id_foreign` (`vendor_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_vendor_id_foreign` (`vendor_id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendors_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bid_requests`
--
ALTER TABLE `bid_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bid_requests`
--
ALTER TABLE `bid_requests`
  ADD CONSTRAINT `bid_requests_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bid_requests_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bid_requests_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subcategories_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
