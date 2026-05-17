-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2026 at 05:47 AM
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
-- Database: `database_ini`
--

-- --------------------------------------------------------

--
-- Table structure for table `cleanup_drives`
--

CREATE TABLE `cleanup_drives` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `drive_date` date DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `slots` int(11) DEFAULT 0,
  `status` enum('open','full','upcoming','cancelled') DEFAULT 'open',
  `organizer` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cleanup_drives`
--

INSERT INTO `cleanup_drives` (`id`, `title`, `description`, `location`, `drive_date`, `time_start`, `time_end`, `slots`, `status`, `organizer`, `created_at`) VALUES
(1, 'Linis Gadgaran', 'SADASD', 'Gadgran', '2026-05-06', '07:00:00', '12:00:00', 50, 'open', 'degue alert ph', '2026-05-06 02:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `content_sections`
--

CREATE TABLE `content_sections` (
  `id` int(11) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content_sections`
--

INSERT INTO `content_sections` (`id`, `section_name`, `title`, `content`, `updated_at`) VALUES
(1, 'home', 'Sintossss', '<div class=\"hero-section\">\r\n<h1>Welcome to Dengue Alert Philippines</h1>\r\n<p>Your trusted source for dengue prevention and awareness information. Stay informed, stay protected.</p>\r\n</div>\r\n\r\n<div class=\"content-section\">\r\n<p>Dengue fever is a mosquito-borne viral infection that has become a major public health concern in the Philippines. Our platform provides real-time information, prevention tips, and community support to help combat this disease.</p>\r\n\r\n<div class=\"feature-grid\">\r\n<div class=\"feature-card\">\r\n<div class=\"icon\">🩺</div>\r\n<h3>Health Monitoring</h3>\r\n<p>Track dengue cases and trends across the Philippines with real-time data and statistics.</p>\r\n</div>\r\n\r\n<div class=\"feature-card\">\r\n<div class=\"icon\">🦟</div>\r\n<h3>Prevention Tips</h3>\r\n<p>Learn effective strategies to prevent mosquito bites and reduce dengue transmission.</p>\r\n</div>\r\n\r\n<div class=\"feature-card\">\r\n<div class=\"icon\">📞</div>\r\n<h3>Emergency Support</h3>\r\n<p>Get immediate help and connect with healthcare professionals when needed.</p>\r\n</div>\r\n</div>\r\n</div>', '2026-04-02 11:15:06'),
(2, 'awareness', 'Dengue Awareness and Prevention', '<div class=\"content-section\">\r\n<h1>Dengue Awareness</h1>\r\n<h2>What is Dengue?</h2>\r\n<p>Dengue is a viral infection transmitted by the Aedes mosquito. It can cause severe flu-like symptoms and in some cases, life-threatening complications.</p>\r\n\r\n<h2>Prevention Tips</h2>\r\n<div class=\"prevention-grid\">\r\n<div class=\"prevention-card\">\r\n<div class=\"number\">1</div>\r\n<h4>Eliminate Breeding Sites</h4>\r\n<p>Remove standing water from containers, flower pots, and other places where mosquitoes can lay eggs.</p>\r\n</div>\r\n\r\n<div class=\"prevention-card\">\r\n<div class=\"number\">2</div>\r\n<h4>Use Mosquito Repellents</h4>\r\n<p>Apply mosquito repellents containing DEET, picaridin, or oil of lemon eucalyptus to exposed skin.</p>\r\n</div>\r\n\r\n<div class=\"prevention-card\">\r\n<div class=\"number\">3</div>\r\n<h4>Wear Protective Clothing</h4>\r\n<p>Wear long-sleeved shirts, long pants, socks, and shoes when outdoors, especially during dawn and dusk.</p>\r\n</div>\r\n\r\n<div class=\"prevention-card\">\r\n<div class=\"number\">4</div>\r\n<h4>Install Window Screens</h4>\r\n<p>Use window screens, air conditioning, or close windows and doors to keep mosquitoes outside.</p>\r\n</div>\r\n\r\n<div class=\"prevention-card\">\r\n<div class=\"number\">5</div>\r\n<h4>Use Mosquito Nets</h4>\r\n<p>Sleep under mosquito nets, especially infants, young children, and pregnant women.</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"cta-section\">\r\n<h2>Stay Protected, Stay Healthy</h2>\r\n<p>Prevention is the best defense against dengue. Take action today to protect yourself and your community.</p>\r\n<button class=\"cta-button\" onclick=\"window.location.href=\'contact.php\'\">Get Help Now</button>\r\n</div>\r\n</div>', '2026-04-02 11:15:06'),
(3, 'stats', 'Dengue Statistics and Trends', '<h1>Dengue Statistics</h1><p>Track the latest dengue cases and trends across the Philippines.</p><div class=\"stats-container\"><div class=\"stat-box\"><h3>Total Cases (2024)</h3><span class=\"stat-number\">150,000+</span></div><div class=\"stat-box\"><h3>Deaths</h3><span class=\"stat-number\">800+</span></div><div class=\"stat-box\"><h3>Regions Affected</h3><span class=\"stat-number\">17</span></div></div>', '2026-04-02 11:46:17'),
(4, 'contact', 'Contact Us  Now1', 'Contact Us', '2026-04-02 11:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_verified` tinyint(4) DEFAULT 0,
  `otp_hash` varchar(64) DEFAULT NULL,
  `otp_expires` datetime DEFAULT NULL,
  `reset_otp_hash` varchar(64) DEFAULT NULL,
  `reset_otp_expires` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `is_verified`, `otp_hash`, `otp_expires`, `reset_otp_hash`, `reset_otp_expires`) VALUES
(1, 'admin@gmail.com', '$2y$10$yf89ug.jRmc4MzpLrerwTethXZc3bfSejXu/s86wp6AkseRVSJuji', 1, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cleanup_drives`
--
ALTER TABLE `cleanup_drives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_sections`
--
ALTER TABLE `content_sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `section_name` (`section_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cleanup_drives`
--
ALTER TABLE `cleanup_drives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `content_sections`
--
ALTER TABLE `content_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
