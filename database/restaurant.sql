-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 12:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(11, 'Burger', 'Lunchtime just got an upgrade!', '1717341323.png', '2024-06-02 03:15:23', '2024-06-02 03:15:23'),
(12, 'Pizza', 'All Season Gulliver Pizza (20 Inch)', '1717342056.jpg', '2024-06-02 03:27:36', '2024-06-02 03:27:36'),
(13, 'Pasta', 'Pasta Arrabiata', '1717342343.jpg', '2024-06-02 03:32:23', '2024-06-02 03:32:23'),
(14, 'Fries', 'Perfect French Fries', '1717342419.jpeg', '2024-06-02 03:33:40', '2024-06-02 03:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `image`, `password`, `created_at`, `updated_at`) VALUES
(6, 'user', 'user@gmail.com', NULL, '1718341431.jpg', '$2y$10$TKoWKLv/0d6xX0Jy0rXl/OJ46IDHsRpD7dxdUMklSCXust1X/rzL6', '2024-06-05 23:05:55', '2024-06-13 23:03:51'),
(12, 'asif', 'asifrafiun@gmail.com', NULL, NULL, '$2y$10$Rw28SZEBxep18tgwcfZ9WOn2EschhWo6u10Z6YN8QVmtwmg3A0.te', '2024-08-26 00:56:18', '2024-08-26 00:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `order_id`, `name`, `phone`, `email`, `address`, `note`, `created_at`, `updated_at`) VALUES
(14, 14, 'Nolan Gillespie', '01884318311', 'cilezyvaxu@mailinator.com', 'Dolorem dolor accusa', 'Consequuntur deserun', '2024-08-26 03:32:12', '2024-08-26 03:32:12'),
(15, 15, 'Lars Carr', '018888888', 'fufijetefi@mailinator.com', 'Cum aspernatur enim', 'Perspiciatis aut ex', '2024-08-26 03:43:10', '2024-08-26 03:43:10'),
(16, 16, 'Lane Beck', '01854418411', 'zeqamypur@mailinator.com', 'Ut corporis qui recu', 'Omnis cupiditate rer', '2024-08-26 04:25:53', '2024-08-26 04:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `category_id`, `name`, `slug`, `image`, `description`, `price`, `discount_price`, `status`, `created_at`, `updated_at`) VALUES
(11, 11, 'Delicious Burger', 'Burger', '1717341570.png', 'Burgers, Lobsters and plenty to get your teeth into in between.', 95.00, 0.00, 1, '2024-06-02 03:19:30', '2024-06-02 03:19:30'),
(12, 11, 'Delicious Burger', 'Delicious Burger Test', '1717341658.png', 'Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem repellendus sed eaque', 30.00, 0.00, 1, '2024-06-02 03:20:59', '2024-06-02 03:20:59'),
(13, 11, 'Tasty Burger', 'Veniam debitis quaerat officiis', '1717341710.png', 'Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem repellendus sed eaque', 50.00, 0.00, 1, '2024-06-02 03:21:50', '2024-06-02 03:21:50'),
(14, 11, 'Tastiest Burger', 'agnam voluptatem', '1717341778.png', 'Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem repellendus sed eaque', 50.00, 0.00, 1, '2024-06-02 03:22:58', '2024-06-02 03:22:58'),
(15, 14, 'Perfect French Fries', 'These French fries are super crunchy and easy to make', '1717342484.jpeg', 'These French fries are super crunchy and easy to make. You don\'t need a heavy-duty fryer and you', 50.00, 0.00, 1, '2024-06-02 03:34:44', '2024-06-02 03:34:44'),
(16, 14, 'Homemade', 'Homemade French Fries', '1717342599.jpg', 'your favorite restaurant staple at home! These are so easy to make with just 2 main', 90.00, 0.00, 1, '2024-06-02 03:36:39', '2024-06-02 03:36:39'),
(17, 14, 'French Fries', 'the best recipe for easy crispy homemade fries', '1717342713.png', 'French fries are a tasty, popular side dish everyone loves. Crispy on the outside and fluffy on the', 100.00, 0.00, 1, '2024-06-02 03:38:33', '2024-06-02 03:38:33'),
(18, 14, 'Garlic Butter Fries', 'RECIPES, SIDES & SALADS, UNCATEGORIZED', '1717342839.jpeg', 'Why make regular fries when you can make garlic butter fries with a whole head of garlic that’s been roasted to perfection. These fries are golden and crispy on the outside while fluffy on the inside and have been tossed through an incredibly indulgent garlic \r\nbutter sauce and finished off with a sprinkling of parsley and pecorino romano. This is what dreams are made of.', 100.00, 0.00, 1, '2024-06-02 03:40:39', '2024-06-02 03:40:39'),
(19, 13, 'Penne Arrabbiata', 'Penne is what I like to use but feel free to use any kind you’d like!', '1717343020.jpg', 'Now that’s a mouthful, figuratively and literally. Not only is this sauce packed with all of the constants in the alphabet, but it’s also got a perfectly spicy, tomatoey, garlicky flavor. I absolutely love keeping a jar of this stuff in the fridge, to spoon it over a range of carbs including any number of pastas.', 100.00, 0.00, 1, '2024-06-02 03:43:40', '2024-06-02 03:43:40'),
(20, 13, 'Creamy Chicken Pasta', 'Buy Chicken Pasta at the Best Price in BD', '1717343182.jpg', 'The actual color of the physical product may slightly vary due to the deviation of lighting sources, photography or your device display settings.', 200.00, 0.00, 1, '2024-06-02 03:46:23', '2024-06-02 03:46:23'),
(21, 13, 'Alfredo Pasta', 'Be the first to leave a review.', '1717343305.jpg', 'Creamy Alfredo sauce with mozzarella cheese tossed with special penne pasta. A combination of juicy shrimp and calamari ring tossed with linguine', 202.00, 0.00, 1, '2024-06-02 03:48:25', '2024-06-02 03:48:25'),
(22, 13, 'Noodles Company Visit Loveland', 'Fresh & Frozen Pasta', '1717343487.jpg', 'Tossed in Light Tomato Cream Add Pan-Seared Chicken Add Peas Italian bacon (Pancetta) Mushrooms Add Gluten-Friendly', 275.00, 0.00, 1, '2024-06-02 03:51:27', '2024-06-02 03:51:27'),
(23, 12, 'Pizza in the United States Wikipedia', 'Best pizza in Dallas,', '1717343610.png', 'Bill’s thin crust pizzas are known locally in the Chicagoland area as “tavern-style” or “cracker crust,” and are homemade from scratch using only the', 300.00, 0.00, 1, '2024-06-02 03:53:30', '2024-06-02 03:53:30'),
(24, 12, 'Pizza pâté au poulet', 'White Pizza', '1717343731.jpeg', 'Vous avez bien lu: on vous propose ici une pizza pâté au poulet, une combinaison originale de deux', 300.00, 0.00, 1, '2024-06-02 03:55:31', '2024-06-02 03:55:31'),
(25, 12, 'P06 Allo Pizza', 'This White Pizza from', '1717343792.jpeg', 'Base sauce tomate, emmental, mozzarella,émince de poulet aux épices, crème fraiche, piment végétarien', 299.00, 0.00, 1, '2024-06-02 03:56:32', '2024-06-02 03:56:32'),
(26, 12, 'What is full form of PIZZA? Who gave the Name? Quora', 'What is full form of PIZZA', '1717343853.jpg', 'Buscas una Pizzería en la zona? Consulta Pixatl Somos expertos en una amplia gama de platos como pizza margarita y pizza', 400.00, 0.00, 1, '2024-06-02 03:57:33', '2024-06-02 03:57:33');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_05_31_111919_create_categories_table', 1),
(7, '2024_05_31_112027_create_customers_table', 1),
(8, '2024_05_31_112338_create_menu_items_table', 1),
(9, '2024_05_31_112516_create_orders_table', 1),
(10, '2024_05_31_112651_create_order_items_table', 1),
(11, '2024_06_05_121108_create_settings_table', 1),
(13, '2024_06_13_160755_create_payments_table', 2),
(14, '2024_06_13_161230_create_delivery_addresses_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `status` enum('Pending','Confirmed','Canceled','Processing','Completed') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(14, 12, 0.00, 'Pending', '2024-08-26 03:32:12', '2024-08-26 03:32:12'),
(15, 6, 0.00, 'Pending', '2024-08-26 03:43:10', '2024-08-26 03:43:10'),
(16, 6, 0.00, 'Pending', '2024-08-26 04:25:53', '2024-08-26 04:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `menu_item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` smallint(5) UNSIGNED NOT NULL DEFAULT 1,
  `price` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `menu_item_id`, `quantity`, `price`, `discount`, `created_at`, `updated_at`) VALUES
(21, 14, 14, 1, 50.00, 0.00, '2024-08-26 03:32:12', '2024-08-26 03:32:12'),
(22, 14, 18, 1, 100.00, 0.00, '2024-08-26 03:32:12', '2024-08-26 03:32:12'),
(23, 15, 11, 1, 95.00, 0.00, '2024-08-26 03:43:10', '2024-08-26 03:43:10'),
(24, 15, 22, 1, 275.00, 0.00, '2024-08-26 03:43:10', '2024-08-26 03:43:10'),
(25, 15, 26, 2, 800.00, 0.00, '2024-08-26 03:43:10', '2024-08-26 03:43:10'),
(26, 16, 14, 1, 50.00, 0.00, '2024-08-26 04:25:53', '2024-08-26 04:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Completed','Failed') NOT NULL DEFAULT 'Pending',
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_method`, `amount`, `transaction_id`, `status`, `paid_at`, `created_at`, `updated_at`) VALUES
(14, 14, 'Cash On Delivery', 0.00, NULL, 'Pending', NULL, '2024-08-26 03:32:12', '2024-08-26 03:32:12'),
(15, 15, 'Cash On Delivery', 0.00, NULL, 'Pending', NULL, '2024-08-26 03:43:10', '2024-08-26 03:43:10'),
(16, 16, 'Cash On Delivery', 0.00, NULL, 'Pending', NULL, '2024-08-26 04:25:53', '2024-08-26 04:25:53');

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
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_name` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_name`, `value`, `created_at`, `updated_at`) VALUES
('CONTACT_ADDRESS', '2267 Genesee St , Buffalo- NY-14211.', NULL, '2024-06-13 22:56:53'),
('CONTACT_EMAIL', 'admin@gmail.com<br>contact@gmial.com', NULL, '2024-06-13 22:56:52'),
('CONTACT_GOOGLE_MAP', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2921.8568138366277!2d-78.79975230000001!3d42.9180607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d30d23b89acc4d%3A0xe10d612b12e87288!2s2267%20Genesee%20St%2C%20Buffalo%2C%20NY%2014211%2C%20USA!5e0!3m2!1sen!2sbd!4v1704691566026!5m2!1sen!2sbd\" width=\"800\" height=\"600\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, '2024-06-13 22:56:53'),
('CONTACT_PHONE', 'PH:+1 (716)4160357<br> PH: +1(347)6088808 <br>PH: +1 (917)6001965 <br> PH:+1 (347)9356585 <br>PH: +1 (718)5765237', NULL, '2024-06-13 22:56:52'),
('SETTING_ABOUT_PAGE', 'about.jpg', NULL, '2024-06-13 22:56:53'),
('SETTING_ABOUT_US', '<h4 style=\"text-align: center;\">Fast Food About Us</h4>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p class=\"topic-paragraph\"><strong>Fast food is</strong>, a mass-produced food product designed for quick and efficient preparation and distribution that certain restaurants, concession stands, and convenience stores sell. Fast food is perhaps most associated with chain restaurants&mdash;including such prominent&nbsp;brands&nbsp;as&nbsp;<span id=\"ref1305852\"></span>McDonald&rsquo;s,&nbsp;<span id=\"ref1305853\"></span>Burger King, and&nbsp;<span id=\"ref1305854\"></span>Taco Bell&mdash;that typically offer take-out and drive-through services, as convenience and speed are prioritized. Common fast foods include&nbsp;<span id=\"ref1305855\"></span>hamburgers,&nbsp;<span id=\"ref1305871\"></span>hot dogs,&nbsp;<span id=\"ref1305856\"></span>french fries,&nbsp;<span id=\"ref1305868\"></span>pizza,&nbsp;<span id=\"ref1322300\"></span>tacos,&nbsp;<span id=\"ref1305870\"></span>burritos,&nbsp;<span id=\"ref1322301\"></span>salads, and&nbsp;<span id=\"ref1305869\"></span>sandwiches.</p>\r\n<p class=\"topic-paragraph\">Critics of fast food production food often subordinate quality to efficiency, affordability, and profit. Fast-food products are usually highly <span id=\"ref1322302\"></span>processed and precooked or frozen and may contain artificial preservatives in addition to high levels of sodium, cholesterol, saturated fats, and refined grains and sugars. Thus, the term&nbsp;<em>fast food</em>&nbsp;has come to carry negative&nbsp;connotations&nbsp;regarding health, and it raises&nbsp;ethical issues in the fields of agriculture and labor. However polarizing, fast food remains highly popular internationally for its convenience and flavor.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>', NULL, '2024-06-13 22:43:25'),
('SETTING_PAGE_BANNER', 'banner.jpg', NULL, '2024-06-13 22:43:25'),
('SETTING_SITE_FAVICON', 'favicon.jpg', NULL, '2024-06-05 02:02:40'),
('SETTING_SITE_LOGO', 'logo.jpg', NULL, '2024-06-05 02:02:40'),
('SETTING_SITE_TITLE', 'Fast Food Restaurant', NULL, '2024-06-13 22:56:52'),
('SETTING_SOCIAL_FACEBOOK', 'https://www.facebook.com/share/b5D1wfN6HZv3DPPw/?mibextid=K35XfP', NULL, '2024-06-13 22:56:52'),
('SETTING_SOCIAL_INSTAGRAM', '#', NULL, '2024-06-13 22:56:52'),
('SETTING_SOCIAL_LINKEDIN', '#', NULL, '2024-06-13 22:56:52'),
('SETTING_SOCIAL_TWITTER', '#', NULL, '2024-06-13 22:56:52'),
('SETTING_SOCIAL_YOUTUBE', '#', NULL, '2024-06-13 22:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$QWG/SdkUwlDrWLFSV51mI.7oPjwLXqbOD9HTb6R3SWdFxdR31TPhu', NULL, '2024-05-30 23:31:34', '2024-05-30 23:31:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_addresses_order_id_foreign` (`order_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_category_id_foreign` (`category_id`);

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
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_menu_item_id_foreign` (`menu_item_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_name`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD CONSTRAINT `delivery_addresses_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_menu_item_id_foreign` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
