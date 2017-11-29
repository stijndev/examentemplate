-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2017 at 08:19 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hakkers`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(1) NOT NULL,
  `cityname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `cityname`) VALUES
(1, 'Arnhem'),
(2, 'Nijmegen');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(1) NOT NULL,
  `plannedby` varchar(103) NOT NULL DEFAULT 'Stijn',
  `title` varchar(60) NOT NULL,
  `problem` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `address` varchar(75) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `customerphone` int(12) NOT NULL,
  `customername` varchar(103) NOT NULL,
  `fk_mech_id` int(1) NOT NULL DEFAULT '1',
  `fk_type_id` int(1) NOT NULL DEFAULT '1',
  `fk_city_id` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `plannedby`, `title`, `problem`, `date`, `time`, `address`, `zip`, `customerphone`, `customername`, `fk_mech_id`, `fk_type_id`, `fk_city_id`) VALUES
(17, 'Stijn', 'Verwarming wordt niet koud', 'jaslkdfjalsjfslj', '2017-11-18', '09:00:00', 'Koppelstraat 28', '7126AJ', 80789709, 'Stijn Schokkin', 14, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `loginattempts`
--

CREATE TABLE `loginattempts` (
  `IP` varchar(20) NOT NULL,
  `Attempts` int(11) NOT NULL,
  `LastLogin` datetime NOT NULL,
  `Username` varchar(65) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loginattempts`
--

INSERT INTO `loginattempts` (`IP`, `Attempts`, `LastLogin`, `Username`, `ID`) VALUES
('::1', 1, '2017-11-07 08:33:51', 'admin', 1),
('::1', 1, '2017-10-12 11:39:27', 'l;kj', 2),
('::1', 1, '2017-10-12 12:15:41', 'monteurstijn', 3),
('::1', 2, '2017-11-06 15:08:28', 'test', 4),
('::1', 1, '2017-11-13 15:35:13', 'testusr', 5),
('::1', 1, '2017-11-07 13:59:57', 'qqqqq', 6),
('::1', 1, '2017-11-10 10:17:27', 'monteur', 7);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `planner` int(1) NOT NULL DEFAULT '0',
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL,
  `firstname` varchar(51) NOT NULL,
  `lastname` varchar(51) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '1',
  `mod_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `FK_spec_id` int(1) DEFAULT '1',
  `FK_stat_id` int(1) DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `planner`, `username`, `password`, `email`, `firstname`, `lastname`, `phone`, `verified`, `mod_timestamp`, `FK_spec_id`, `FK_stat_id`) VALUES
(13, 1, 'admin', '$2y$10$hSllBuQnI2Ji/JWtjtrxT.mCKBM2UzkLHsO8PPEPvK.rlG.6tkZzu', 'admin@hakkers.nl', 'Stijn', 'Schokkin', '9449494', 1, '2017-11-10 10:16:49', 3, 5),
(14, 0, 'monteur', '$2y$10$nh/nZJzfjFMHofFK8FVLEuIIbiIlnexdwLlhE4Mxnit20Jo0WYd2C', 'monteur@hskaker.nl', 'Piet', 'Jan', '04040', 1, '2017-11-10 10:17:20', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `specialty`
--

CREATE TABLE `specialty` (
  `id` int(1) NOT NULL,
  `specialty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialty`
--

INSERT INTO `specialty` (`id`, `specialty`) VALUES
(1, 'Verwarming'),
(2, 'Loodgieterswerk'),
(3, 'Ventilatie'),
(4, 'Zink en dakwerk');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(1) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Onderweg naar klant'),
(2, 'Onderweg naar bedrijf'),
(3, 'Op bedrijf'),
(4, 'Bij klant'),
(5, 'N.V.T');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(1) NOT NULL,
  `jobtype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `jobtype`) VALUES
(1, 'Reparatie'),
(2, 'Onderhoud'),
(3, 'Storing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `index_city` (`fk_city_id`),
  ADD KEY `index_type` (`fk_type_id`),
  ADD KEY `index_members` (`fk_mech_id`);

--
-- Indexes for table `loginattempts`
--
ALTER TABLE `loginattempts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `index_spec` (`FK_spec_id`),
  ADD KEY `index_stat` (`FK_stat_id`);

--
-- Indexes for table `specialty`
--
ALTER TABLE `specialty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `loginattempts`
--
ALTER TABLE `loginattempts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `specialty`
--
ALTER TABLE `specialty`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `FK_jobs_city` FOREIGN KEY (`fk_city_id`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_jobs_members` FOREIGN KEY (`fk_mech_id`) REFERENCES `members` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_jobs_type` FOREIGN KEY (`fk_type_id`) REFERENCES `type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT FOREIGN KEY (`FK_stat_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_members_specialty` FOREIGN KEY (`FK_spec_id`) REFERENCES `specialty` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_members_status` FOREIGN KEY (`FK_stat_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
