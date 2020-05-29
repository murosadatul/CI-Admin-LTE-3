-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2020 at 10:47 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsample`
--
CREATE DATABASE IF NOT EXISTS `dbsample` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbsample`;

-- --------------------------------------------------------

--
-- Table structure for table `system_page`
--

DROP TABLE IF EXISTS `system_page`;
CREATE TABLE `system_page` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `page` varchar(100) NOT NULL,
  `url` varchar(50) NOT NULL,
  `parent_page` varchar(100) NOT NULL,
  `order` tinyint(3) UNSIGNED NOT NULL,
  `icon` varchar(50) NOT NULL,
  `active_code` varchar(25) NOT NULL
) ENGINE=Aria DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_page`
--

INSERT INTO `system_page` (`id`, `page`, `url`, `parent_page`, `order`, `icon`, `active_code`) VALUES
(1, 'dashboard', 'sample/index', '', 1, 'nav-icon fas fa-tachometer-alt', 'dashboard'),
(2, 'form', '', '', 2, 'nav-icon fas fa-edit', ''),
(11, 'advanced elements', 'sample/form_advanced', 'form', 3, '', 'form_advanced'),
(4, 'general elements', 'sample/form_general', 'form', 2, '', 'form_general'),
(5, 'editor', 'sample/form_editor', 'form', 3, '', 'form_editor'),
(6, 'validation', 'sample/form_validation', 'form', 4, '', 'form_validation'),
(7, 'chart', '', '', 3, 'nav-icon fas fa-chart-pie', ''),
(8, 'modals & alerts', '', '', 4, 'nav-icon fas fa-tree', ''),
(9, 'tables', '', '', 5, 'nav-icon fas fa-table', ''),
(10, 'calendars', '', '', 6, 'nav-icon far fa-calendar-alt', ''),
(12, 'chart js', 'sample/chartjs', 'chart', 1, '', 'chartjs'),
(13, 'flot', 'sample/chartflot', 'chart', 2, '', 'chartflot'),
(14, 'inline', 'sample/chartinline', 'chart', 3, '', 'chartinline');

-- --------------------------------------------------------

--
-- Table structure for table `system_setting`
--

DROP TABLE IF EXISTS `system_setting`;
CREATE TABLE `system_setting` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `value` varchar(400) NOT NULL
) ENGINE=Aria DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_setting`
--

INSERT INTO `system_setting` (`id`, `label`, `code`, `value`) VALUES
(1, 'Site Name', 'site_name', 'CodeIgniter&AdminLTE3'),
(2, 'Favicon', 'favicon', 'assets/img/favicon.ico'),
(3, 'Footer', 'footer', '<strong>Copyright &copy; 2014-2019 <a href=\"http://adminlte.io\">AdminLTE.io</a>.</strong>\r\n    All rights reserved.\r\n    <div class=\"float-right d-none d-sm-inline-block\">\r\n      <b>Version</b> 3.0.2\r\n    </div>'),
(4, 'Logo', 'site_logo', '{base_url}assets/img/logo/logosn.png'),
(5, 'Logo with text', 'site_logo_text', '{base_url}assets/img/logo/logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `system_page`
--
ALTER TABLE `system_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_setting`
--
ALTER TABLE `system_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `system_page`
--
ALTER TABLE `system_page`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `system_setting`
--
ALTER TABLE `system_setting`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
