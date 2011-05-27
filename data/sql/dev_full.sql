-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2011 at 01:19 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `meteb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sfuser_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `activitytype_id` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `activitytype_id_idx` (`activitytype_id`),
  KEY `sfuser_id_idx` (`sfuser_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `sfuser_id`, `title`, `activitytype_id`, `created_at`, `updated_at`) VALUES
(2, 2, '', 3, '2011-05-26 12:03:43', '2011-05-26 12:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `activity_type`
--

CREATE TABLE IF NOT EXISTS `activity_type` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `activity_type`
--

INSERT INTO `activity_type` (`id`, `title`) VALUES
(1, 'Add Client'),
(2, 'Add Quote'),
(3, 'Edit Client'),
(4, 'Edit Quote');

-- --------------------------------------------------------

--
-- Table structure for table `client_status`
--

CREATE TABLE IF NOT EXISTS `client_status` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `client_status`
--

INSERT INTO `client_status` (`id`, `title`) VALUES
(1, 'active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `expensedata`
--

CREATE TABLE IF NOT EXISTS `expensedata` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `renewal_expenses` varchar(20) NOT NULL,
  `expense_inflation` varchar(20) NOT NULL,
  `initial_expenses` varchar(20) NOT NULL,
  `loadings` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `expensedata`
--


-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `title`) VALUES
(1, 'male'),
(2, 'female');

-- --------------------------------------------------------

--
-- Table structure for table `marketdata`
--

CREATE TABLE IF NOT EXISTS `marketdata` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uploaded_at` datetime NOT NULL,
  `month_array` text NOT NULL,
  `discounting_array` text NOT NULL,
  `dhfactors_matrix` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `marketdata`
--


-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE IF NOT EXISTS `quote` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `second_life` bigint(20) DEFAULT NULL,
  `guarantee_period` bigint(20) DEFAULT NULL,
  `spouse_reversion` decimal(10,5) DEFAULT NULL,
  `pri` decimal(10,3) DEFAULT NULL,
  `purchase_price` decimal(15,2) DEFAULT NULL,
  `initial_gross_annuity` decimal(15,2) DEFAULT NULL,
  `initial_net_annuity` decimal(15,2) DEFAULT NULL,
  `commence_at` datetime NOT NULL,
  `first_annuity_increase` datetime NOT NULL,
  `guaranteed_terms` bigint(20) DEFAULT NULL,
  `premium_charge` decimal(15,5) DEFAULT NULL,
  `fund_charge` decimal(15,5) DEFAULT NULL,
  `administrative_charge` decimal(15,5) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id_idx` (`client_id`),
  KEY `created_by_idx` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quote`
--


-- --------------------------------------------------------

--
-- Table structure for table `quotehistory`
--

CREATE TABLE IF NOT EXISTS `quotehistory` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id_idx` (`client_id`),
  KEY `created_by_idx` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quotehistory`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_forgot_password`
--

CREATE TABLE IF NOT EXISTS `sf_guard_forgot_password` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `unique_key` varchar(255) DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sf_guard_forgot_password`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sf_guard_group`
--

INSERT INTO `sf_guard_group` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'Administrator group', '2011-05-26 09:30:17', '2011-05-26 09:30:17'),
(2, 'advisor', 'Financial Advisor', '2011-05-26 09:30:18', '2011-05-26 09:30:18'),
(3, 'client', 'Client', '2011-05-26 09:30:18', '2011-05-26 09:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_group_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group_permission` (
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_group_permission`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sf_guard_permission`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_remember_key`
--

CREATE TABLE IF NOT EXISTS `sf_guard_remember_key` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sf_guard_remember_key`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_address` (`email_address`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sf_guard_user`
--

INSERT INTO `sf_guard_user` (`id`, `first_name`, `last_name`, `email_address`, `username`, `algorithm`, `salt`, `password`, `is_active`, `is_super_admin`, `last_login`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin', 'admin@gmail.com', 'admin', 'sha1', 'fd5665e9e0d07a4aa839a16cffe4da2f', '246533ba8e45c96e591d9ebb31dfd30055ae2d8d', 1, 0, '2011-05-26 16:17:32', '2011-05-26 09:30:18', '2011-05-26 16:18:19'),
(3, 'Advisor', 'Advisor', 'advisor@gmail.com', 'advisor@gmail.com', 'sha1', 'cbc3e091f8ec7e40ab1b66b59a171bbe', '461842172b0a16f790ca0604e5741a104a896fe4', 1, 0, '2011-05-26 13:46:58', '2011-05-26 09:30:18', '2011-05-26 16:17:44'),
(4, 'client', 'client', 'client@gmail.com', 'client', 'sha1', 'b840f4dbb0b2a1e79d999d8021b439ac', '48d5b4dbd0bcac0bafa8f445886c1e4199613965', 1, 0, '2011-05-26 14:50:38', '2011-05-26 09:30:18', '2011-05-26 16:17:52'),
(5, 'Shadley', 'Wentzel', 'shad6ster@gmail.com', 'sanjuro', 'sha1', '30b4244813d746dd10f6874e069763a0', '5aeb1d48ca36deffa0908b042ab3efd0788507d1', 1, 1, NULL, '2011-05-27 09:34:01', '2011-05-27 09:35:01'),
(6, 'Samir', 'Franciscus', 'samir@imobi.co.za', 'samir', 'sha1', '080b8c91b7072b87e579f3451a4093d4', 'd9ff0b979be0011b8b6b9ff7cde42e92f39aa908', 1, 1, NULL, '2011-05-27 09:34:43', '2011-05-27 09:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_group` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_user_group`
--

INSERT INTO `sf_guard_user_group` (`user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(2, 1, '2011-05-26 09:30:18', '2011-05-26 09:30:18'),
(3, 2, '2011-05-26 09:30:18', '2011-05-26 09:30:18'),
(4, 3, '2011-05-26 09:30:18', '2011-05-26 09:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_permission` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_user_permission`
--


-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE IF NOT EXISTS `system` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `system`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sfuser_id` bigint(20) DEFAULT NULL,
  `gender_id` bigint(20) DEFAULT NULL,
  `spouse_gender_id` bigint(20) DEFAULT NULL,
  `status_id` bigint(20) DEFAULT NULL,
  `parent_user_id` bigint(20) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `dob` datetime NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `idnumber` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `postaladdress` varchar(100) NOT NULL,
  `streetaddress` varchar(100) NOT NULL,
  `spousename` varchar(30) NOT NULL,
  `spousesurname` varchar(30) NOT NULL,
  `spousedob` datetime NOT NULL,
  `spouseidnumber` varchar(20) NOT NULL,
  `company` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sfuser_id_idx` (`sfuser_id`),
  KEY `gender_id_idx` (`gender_id`),
  KEY `spouse_gender_id_idx` (`spouse_gender_id`),
  KEY `status_id_idx` (`status_id`),
  KEY `parent_user_id_idx` (`parent_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `sfuser_id`, `gender_id`, `spouse_gender_id`, `status_id`, `parent_user_id`, `name`, `surname`, `dob`, `telephone`, `mobile`, `idnumber`, `fax`, `postaladdress`, `streetaddress`, `spousename`, `spousesurname`, `spousedob`, `spouseidnumber`, `company`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 2, 1, NULL, 'admin', 'admin', '2011-05-26 00:00:00', '0833908314', '0833908314', '811250700088', '0833908314', '1 Raven Street', 'Grassy Park', 'admin', 'admin', '2011-05-26 00:00:00', '811214123', 'Abbaliaer ', '2011-05-26 09:30:18', '2011-05-26 16:18:19'),
(3, 3, 1, 2, 1, NULL, 'advisor', 'advisor', '2011-05-12 00:00:00', '0833908314', '1231123', '123123', '6899178', 'Plumstead', '23 Tota Street', 'advisor', 'advisor', '2011-05-26 00:00:00', '2312312312', 'AceofSpadesDigital', '2011-05-26 09:30:18', '2011-05-26 16:17:44'),
(4, 4, 1, 2, 1, NULL, 'client', 'client', '2010-02-02 00:00:00', '123123', '1231123', '811250700088', '1234', 'asdasd', 'asdasd', 'client', 'client', '2006-02-16 00:00:00', '123412341234', 'asdsd', '2011-05-26 09:30:18', '2011-05-26 16:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_index`
--

CREATE TABLE IF NOT EXISTS `user_profile_index` (
  `keyword` varchar(200) NOT NULL DEFAULT '',
  `field` varchar(50) NOT NULL DEFAULT '',
  `position` bigint(20) NOT NULL DEFAULT '0',
  `id` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`keyword`,`field`,`position`,`id`),
  KEY `user_profile_index_id_user_profile_id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile_index`
--

INSERT INTO `user_profile_index` (`keyword`, `field`, `position`, `id`) VALUES
('admin', 'name', 0, 2),
('admin', 'surname', 0, 2),
('advisor', 'name', 0, 3),
('advisor', 'surname', 0, 3),
('client', 'name', 0, 4),
('client', 'surname', 0, 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_activitytype_id_activity_type_id` FOREIGN KEY (`activitytype_id`) REFERENCES `activity_type` (`id`),
  ADD CONSTRAINT `activity_sfuser_id_sf_guard_user_id` FOREIGN KEY (`sfuser_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quote`
--
ALTER TABLE `quote`
  ADD CONSTRAINT `quote_client_id_sf_guard_user_id` FOREIGN KEY (`client_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quote_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quotehistory`
--
ALTER TABLE `quotehistory`
  ADD CONSTRAINT `quotehistory_client_id_sf_guard_user_id` FOREIGN KEY (`client_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quotehistory_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_forgot_password`
--
ALTER TABLE `sf_guard_forgot_password`
  ADD CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
  ADD CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
  ADD CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
  ADD CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
  ADD CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_gender_id_gender_id` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `user_profile_parent_user_id_sf_guard_user_id` FOREIGN KEY (`parent_user_id`) REFERENCES `sf_guard_user` (`id`),
  ADD CONSTRAINT `user_profile_sfuser_id_sf_guard_user_id` FOREIGN KEY (`sfuser_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_profile_spouse_gender_id_gender_id` FOREIGN KEY (`spouse_gender_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `user_profile_status_id_client_status_id` FOREIGN KEY (`status_id`) REFERENCES `client_status` (`id`);

--
-- Constraints for table `user_profile_index`
--
ALTER TABLE `user_profile_index`
  ADD CONSTRAINT `user_profile_index_id_user_profile_id` FOREIGN KEY (`id`) REFERENCES `user_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
