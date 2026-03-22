-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2025 at 04:14 PM
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
-- Database: `retech`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `firstname`, `lastname`, `email`, `phone`, `subject`, `message`, `date`) VALUES
(1, 'Victor', 'Osaronwafor', 'victorosaronwafor@gmail.com', '08188059316', 'Urgent Assistance Needed', 'Hiiiiii', '2025-10-23 02:07:23');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `specifications` text DEFAULT NULL,
  `device_condition` enum('new','good','fair','poor') DEFAULT 'good',
  `image` varchar(255) DEFAULT NULL,
  `pickup_location` text DEFAULT NULL,
  `additional_notes` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0	Pending\r\n1	Approved\r\n2	Rejected\r\n3	Matched',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `donor_id`, `title`, `brand`, `model`, `specifications`, `device_condition`, `image`, `pickup_location`, `additional_notes`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 'Donation to School', 'HP', '', '8 GB RAM', 'new', NULL, 'Sharp Corner', 'NIL', 1, '2025-10-19 13:30:23', '2025-10-24 07:56:40'),
(3, 2, 'Sending Donations to Secondary School', 'HP', 'Pavillion', '8 GB RAM', 'poor', '68f4f70f83c7c.png', 'Mararaba', 'Nil\r\n', 1, '2025-10-19 13:33:22', '2025-10-24 07:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `beneficiary_id` int(11) NOT NULL,
  `donation_id` int(11) NOT NULL,
  `purpose` text NOT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0 = Pending, 1 = Approved, 2 = Rejected, 3 = Matched',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `beneficiary_id`, `donation_id`, `purpose`, `status`, `created_at`) VALUES
(1, 3, 3, 'For secondary schools ict empowerment', 3, '2025-10-22 20:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `discount_offer` text DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `office_address` longtext DEFAULT NULL,
  `error_message` text DEFAULT NULL,
  `payment_notice` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedIn` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `whatsapp_group` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `discount_offer`, `about`, `phone`, `email`, `office_address`, `error_message`, `payment_notice`, `facebook`, `instagram`, `twitter`, `linkedIn`, `youtube`, `whatsapp`, `whatsapp_group`, `logo`, `status`, `date`) VALUES
(1, '', '', '', '', '\r\n\r\n\r\n', '', '', '', '', '', '', 'youtube.com', '', '', '1727805040.png', 0, '2024-02-23 18:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` tinyint(1) DEFAULT 0,
  `access` tinyint(1) DEFAULT NULL COMMENT '0 - unrestricted, 1 - restricted\r\n',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone`, `address`, `profile_photo`, `password`, `role`, `access`, `date_created`) VALUES
(1, 'Victor Olamide Osaronwafor', 'victorosaronwafor@gmail.com', '08188059316', 'Treasure Academy, kabayi Maraba Nasarawa state', '../../assets/img/profile-photos/1760956143_Betty Yusuf - NIN Front.jpg', '$2y$10$U70iNR8vqFn2dGW47bAu0eoKXH1FqFOJ/lzJm2soXkpuHBU3QwT1S', 0, 0, '2025-10-20 11:29:03'),
(2, 'Victor Osaronwafor', 'osaronwaforvictor9@gmail.com', '08188059316', 'Treasure Academy, kabayi Maraba Nasarawa state', NULL, '$2y$10$NKvRyJn4ibBzU1Dff5oHbuH8Rnu5UEYmYuGGRR68KBnQtY90jc4mO', 1, NULL, '2025-10-20 13:13:48'),
(3, 'Olvios', 'olviostech@gmail.com', '08188059316', 'Treasure Academy, kabayi Maraba Nasarawa state', NULL, '$2y$10$TydILQm8D97wDZwmXfYPFOes6tFFwp0iq4E3ONV3w4DVlwAI86vI6', 0, NULL, '2025-10-20 13:15:50'),
(4, 'Hacker 1', 'osaronwaforvictor09@gmail.com', '', 'Along Lord\'s Chosen Street Mararaba', NULL, '$2y$10$Vgx/kcwntGFTG7gXcGgICuUf.Wm6a3Gpq.tdlGIQt7gBXUQ/FeP5y', 1, NULL, '2025-10-20 13:19:52'),
(5, 'ReTech 9ja Admin', 'admin@retech9ja1.com', '08188059316', 'David Street 34', '../../assets/img/profile-photos/1760964312_Betty Yusuf - NIN Front.jpg', '$2y$10$J1t7j3sGqJ0a7BxwT4m2euM3i6YXrhMqx9D3AlNskU.7bTqAjQ9vu$2y$10$Ytu8s4.QDQJNwKLyrK98EuSrErCLOMfuEJD1NXhegOu.MaxSlX5b2', 2, NULL, '2025-10-20 13:45:12'),
(6, 'Betty Yusuf', 'bettyyusuf@gmail.com', '08188059316', 'David Street 34', '../../assets/img/profile-photos/1761165319_IMG-20251017-WA0004.jpg', '$2y$10$ZmwueSSUdo/S3b925frnVemP5ESt5t6AYemO7IhthxcOcF5Sz7X2i', 0, NULL, '2025-10-22 21:35:19'),
(7, 'Admin ReTech 9ja', 'admin@retech9ja.com', '08188059316', 'David Street 34', NULL, '$2y$10$S8gYi1CKwunEU8g3cDCHhuCYLYNZD5CmphHkOvE2wibab5BVl/uyu', 2, NULL, '2025-10-23 01:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(1000) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `page_url`, `date`) VALUES
(1, '::1', 'http://localhost/ReTech-9ja/webadmin/index.php', '2025-10-23 01:25:20'),
(2, '::1', 'http://localhost/ReTech-9ja/webadmin/view-visitors.php', '2025-10-23 01:25:35'),
(3, '::1', 'http://localhost/ReTech-9ja/index.php', '2025-10-23 01:27:40'),
(4, '::1', 'http://localhost/ReTech-9ja/login.php', '2025-10-23 01:30:30'),
(5, '::1', 'http://localhost/ReTech-9ja/register.php', '2025-10-23 01:36:50'),
(6, '::1', 'http://localhost/ReTech-9ja/webadmin/view-requests.php', '2025-10-23 01:37:28'),
(7, '::1', 'http://localhost/ReTech-9ja/about.php', '2025-10-23 01:42:54'),
(8, '::1', 'http://localhost/ReTech-9ja/contact.php', '2025-10-23 01:50:39'),
(9, '::1', 'http://localhost/ReTech-9ja/request-donation.php?donation_id=3', '2025-10-24 08:56:50'),
(10, '::1', 'http://localhost/ReTech-9ja/webadmin/donor-view-requests.php', '2025-10-24 09:29:24'),
(11, '::1', 'http://localhost/ReTech-9ja/request-donation.php?donation_id=', '2025-10-24 09:31:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donor_id` (`donor_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beneficiary_id` (`beneficiary_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`beneficiary_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
