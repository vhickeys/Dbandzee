-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2026 at 02:12 AM
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
-- Database: `dbandzee`
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

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `slug`, `caption`, `description`, `image`, `status`, `created_at`) VALUES
(1, 'Engineering & Infrastructure Services', 'engineering-infrastructure-services', 'Building a strong foundation for progress', 'Our Engineering & Infrastructure Services cover a wide range of construction and development solutions including civil works, roads, buildings, earthworks, dredging, and large-scale infrastructure projects. We deliver professional project management, technical expertise, and innovative solutions for government, corporate, and industrial clients, ensuring projects are completed efficiently, safely, and sustainably.', '69bf1d3839f9b.webp', 'active', '2026-03-21 23:22:54'),
(2, 'Mining & Resource Extraction', 'mining-resource-extraction', 'Unlocking the wealth beneath the earth', 'Mining & Resource Extraction involves the responsible exploration, extraction, and processing of minerals and natural resources. This service ensures efficient utilization of geological assets while adhering to safety and environmental standards. \r\n\r\nWe handle the entire value chain, from identifying mineral deposits to extraction, processing, and transportation of resources. Services include site evaluation, drilling, blasting, material handling, and resource management consulting. Ideal for companies or governments looking to maximize resource output with minimal environmental impact.', '69bf1c7c3b2aa.webp', 'active', '2026-03-21 23:32:28'),
(3, 'Security Services', 'security-services-1', 'Protecting people, property, and assets', 'Our Security Services provide comprehensive solutions for industrial sites, corporate offices, events, and construction projects. We offer trained personnel, strategic security planning, and consultancy to mitigate risks and ensure safety. Our services are tailored to meet the specific needs of clients, maintaining a secure and compliant environment.', '69bf1e8aa199b.jpg', 'active', '2026-03-21 23:36:45'),
(4, 'Business & Technical Consultancy', 'business-technical-consultancy', 'Guiding your projects to success', 'Our consultancy services deliver expert guidance in engineering, project management, procurement, and business development. We help clients optimize operations, reduce costs, manage contracts, and implement effective strategies. Whether for infrastructure, industrial operations, or commercial ventures, our consultancy ensures informed decision-making and measurable results.', '69bf1da3edb9a.jpg', 'active', '2026-03-21 23:37:23'),
(5, 'General Merchandise & Procurement', 'general-merchandise-procurement', 'Supplying quality, on time, every time', 'This service covers the sourcing, supply, and logistics of construction materials, industrial equipment, and corporate procurement needs. We ensure timely delivery of high-quality products, streamline procurement processes, and provide reliable support for government and private-sector clients. Our services reduce operational delays and enhance project efficiency.', '69bf1e1142bb6.jpg', 'active', '2026-03-21 23:39:13');

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
(1, '', 'D\'bandzee Ltd is a multidisciplinary company providing services in dredging, construction, mining, security services, consultancy, and general merchandise. The company supports infrastructure development, resource extraction, and industrial operations through professional project delivery and reliable supply solutions.', '08188059316', 'info@dbandzee.com', 'F.C.T Abuja', '', '', '', '', '', '', 'youtube.com', '', '', '1774218374.jpg', 1, '2024-02-23 18:26:51');

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
(1, 'Admin', 'admin@dbandzee.com', NULL, NULL, NULL, '$2y$10$gZtuq5J4ggRpzI93TsRMPefqGORf7Wzm1lt.SXNisHTtS4oh/A3He', 2, NULL, '2026-03-21 22:06:57');

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
(1, '::1', 'http://localhost/dbandzee/contact.php', '2026-03-23 01:08:31'),
(2, '::1', 'http://localhost/dbandzee/index.php', '2026-03-23 01:18:22'),
(3, '::1', 'http://localhost/dbandzee/service-details.php?slug=general-merchandise-procurement', '2026-03-23 01:37:41'),
(4, '::1', 'http://localhost/dbandzee/about.php', '2026-03-23 01:37:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
