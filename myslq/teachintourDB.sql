-- phpMyAdmin SQL Dump
-- version 4.4.15.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2016 at 07:49 AM
-- Server version: 5.5.44-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teachintourDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL,
  `firstname` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `nationality` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `passport` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` int(1) NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `line` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `location_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `fee_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `education` text COLLATE utf8_unicode_ci NOT NULL,
  `experience` text COLLATE utf8_unicode_ci NOT NULL,
  `language` text COLLATE utf8_unicode_ci NOT NULL,
  `skill` text COLLATE utf8_unicode_ci NOT NULL,
  `emergency` text COLLATE utf8_unicode_ci NOT NULL,
  `violation` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `violation_detail` text COLLATE utf8_unicode_ci,
  `criminal` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `criminal_detail` text COLLATE utf8_unicode_ci,
  `agreement` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `paid` varchar(5) COLLATE utf8_unicode_ci DEFAULT 'false',
  `receivedAt` double(20,0) DEFAULT NULL,
  `receivedBy` int(11) DEFAULT NULL,
  `approval` varchar(5) COLLATE utf8_unicode_ci DEFAULT 'false',
  `approvedAt` double(20,0) DEFAULT NULL,
  `approvedBy` int(11) NOT NULL,
  `createdAt` double(20,0) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `updatedAt` double(20,0) DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `inactive` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', '1', 1463920149),
('Manage', '1', 1463920149),
('Manage', '2', 1465729686),
('Manager', '2', 1465729686);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('Admin', 1, 'Admin of Teachin'' Tour', NULL, NULL, 1463920056, 1463920056),
('Manage', 2, 'Create content, Update content, Delete content', NULL, NULL, 1463920119, 1463920119),
('Manager', 1, 'teachin'' tour manager', NULL, NULL, 1465729672, 1465729672);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE IF NOT EXISTS `fees` (
  `id` int(11) NOT NULL,
  `title` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `popular` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `shelf` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `available` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` double(20,0) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `updatedAt` double(20,0) DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `inactive` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `title`, `price`, `detail`, `popular`, `shelf`, `available`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `inactive`) VALUES
(1, '1 Week', 250, '[{"title":"Home stay"},{"title":"Airport Pick-up"},{"title":"3 Meals a day"},{"title":"Bike"},{"title":"Other"}]', 'false', 'true', 'true', 1464410933, 1, 1464415193, 1, 0),
(2, '2 Weeks', 350, '[{"title":"Home stay"},{"title":"Airport Pick-up"},{"title":"3 Meals a day"},{"title":"Bike"},{"title":"Other"}]', 'true', 'true', 'true', 1464411614, 1, 1464415564, 1, 0),
(3, '3 Weeks', 450, '[{"title":"Home stay"},{"title":"Airport Pick-up"},{"title":"3 Meals a day"},{"title":"Bike"},{"title":"Other"}]', 'false', '', 'true', 1464412985, 1, 1464415653, 1, 0),
(4, '4 Weeks', 500, '[{"title":"Home stay"},{"title":"Airport Pick-up"},{"title":"3 Meals a day"},{"title":"Bike"},{"title":"Other"}]', 'false', 'true', 'true', 1464413032, 1, 1464415666, 1, 0),
(5, '5  Weeks', 600, '[{"title":"Home stay"},{"title":"Airport Pick-up"},{"title":"3 Meals a day"},{"title":"Bike"},{"title":"Other"}]', 'false', '', 'true', 1464413051, 1, 1464415680, 1, 0),
(6, '6 Weeks', 700, '[{"title":"Home stay"},{"title":"Airport Pick-up"},{"title":"3 Meals a day"},{"title":"Bike"},{"title":"Other"}]', 'false', '', 'true', 1464413069, 1, NULL, NULL, 0),
(7, '8 Weeks', 800, '[{"title":"Home stay"},{"title":"Airport Pick-up"},{"title":"3 Meals a day"},{"title":"Bike"},{"title":"Other"}]', 'false', 'true', 'true', 1464413082, 1, NULL, NULL, 0),
(8, '10 Weeks', 1000, '[{"title":"Home stay"},{"title":"Airport Pick-up"},{"title":"3 Meals a day"},{"title":"Bike"},{"title":"Other"}]', 'false', '', 'true', 1464413090, 1, 1464413223, 1, 0),
(9, '12 Weeks', 1200, '[{"title":"Home stay"},{"title":"Airport Pick-up"},{"title":"3 Meals a day"},{"title":"Bike"},{"title":"Other"}]', '', '', 'true', 1464415680, 1, 1464415680, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `cover` text COLLATE utf8_unicode_ci,
  `available` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` double(20,0) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `updatedAt` double(20,0) DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `inactive` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `title`, `detail`, `cover`, `available`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `inactive`) VALUES
(1, 'Namsom, Udonthani', 'Namsom was picked as the first location to launch the "teachin'' tour" Project, because the two co-founders are both from Namsom. They have the same passion and desire to make their home town a better place. Teachin'' English is the core of teachin'' tour program. You will get to teach many kinds of student even "monks". You can help other while you are traveling. Is that cool? Help us break the language barrier. And make Namsom a better place.', '/home/eric/web/teachintour/web/images/locations/covers/1/teachin_monk.jpg', 'true', 1464662811, 1, 1470216904, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1459697554),
('m140209_132017_init', 1459697701),
('m140403_174025_create_account_table', 1459697701),
('m140504_113157_update_tables', 1459697701),
('m140504_130429_create_token_table', 1459697702),
('m140830_171933_fix_ip_field', 1459697702),
('m140830_172703_change_account_table_name', 1459697702),
('m141222_110026_update_ip_field', 1459697702),
('m141222_135246_alter_username_length', 1459697702),
('m150614_103145_update_social_account_table', 1459697702),
('m150623_212711_fix_username_notnull', 1459697702);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`) VALUES
(1, 'Admin', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', ''),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `cover` text COLLATE utf8_unicode_ci,
  `available` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` double(20,0) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `updatedAt` double(20,0) DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `inactive` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `detail`, `cover`, `available`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `inactive`) VALUES
(1, 'Teaching', 'Making Namsom, Udonthani a better place. We, teachin'' tour organization, are preparing our local for the coming AEC. FYI, ASEAN Economic Community(AEC) is the realization of the region’s end goal of economic integration. To survive in the AEC, people have to learn English as a Second Language. Because they  use English as their communication. Teaching English to students at Primary and Secondary level in Namsom is your opportunities to travel and help other at the same time. The students are eager to learn and participate. Volunteers may teach independently, provide support to local teachers or team up with other international volunteers in traditional classrooms.', '/home/eric/web/teachintour/web/images/projects/covers/1/care.png', 'true', 1464443106, 1, 1464686881, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE IF NOT EXISTS `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(1, 'o5FiI3qcF-2AksPGn8K3KRYQHT9oK8_i', 1463919666, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`) VALUES
(1, 'admin', 'admin@teachintour.com', '$2y$12$aPscCHFERhRbOnXii0ujXeLph1dmNPaTgyumkfOoX9wM2JMknlFQO', 't4ri95YltkWvc1ej-Jdu_Ud77U_CFtEM', 1463919666, NULL, NULL, '::1', 1463919666, 1463919666, 0),
(2, 'info', 'info@teachintour.com', '$2y$12$SjW.sxplYcZk59ScJWzaxOe7W5oI4v6e7GsLytPeihgEYH7lzsmuG', 'dQDT8qK3VvkERWl8tbRa6CdGzibZMlg3', 1465729642, NULL, NULL, '58.9.179.33', 1465729642, 1465729642, 0),
(3, 'ericprom', 'surasak@promrat.com', '$2y$12$32FteGM14/XeIi1UxdcCmuS9X7PkftR0tfmU19PI.tsey0j.8vPLW', 'v2D5ZA7Hf0Hf83VLRrajR_vDCSUuvUuJ', 1466333328, NULL, NULL, '58.9.179.33', 1466333328, 1470214991, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_email` (`email`),
  ADD UNIQUE KEY `user_unique_username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
