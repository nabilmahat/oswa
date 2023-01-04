-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 07:43 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `question_id` varchar(255) NOT NULL,
  `option_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `survey_id`, `question_id`, `option_id`, `email`, `name`, `gender`) VALUES
(79, 12, 'j4FNqVEkhi', 215, 'ali@abu.com', 'Ali Abu', 1),
(80, 12, 'mfaxlS3QYU', 216, 'ali@abu.com', 'Ali Abu', 1),
(81, 12, 'zoWsKtKVXA', 221, 'ali@abu.com', 'Ali Abu', 1),
(85, 12, 'j4FNqVEkhi', 211, 'ahmad@peah.com', 'Ahmad Peah', 1),
(86, 12, 'mfaxlS3QYU', 217, 'ahmad@peah.com', 'Ahmad Peah', 1),
(87, 12, 'zoWsKtKVXA', 219, 'ahmad@peah.com', 'Ahmad Peah', 1),
(88, 12, 'j4FNqVEkhi', 212, 'ro@peah.com', 'Ro Peah', 2),
(89, 12, 'mfaxlS3QYU', 218, 'ro@peah.com', 'Ro Peah', 2),
(90, 12, 'zoWsKtKVXA', 220, 'ro@peah.com', 'Ro Peah', 2),
(91, 12, 'j4FNqVEkhi', 211, 'samadiah@peah.co', 'samad peah', 2),
(92, 12, 'mfaxlS3QYU', 216, 'samadiah@peah.co', 'samad peah', 2),
(93, 12, 'zoWsKtKVXA', 219, 'samadiah@peah.co', 'samad peah', 2),
(94, 12, 'j4FNqVEkhi', 214, 'sam@peah.io', 'Sam', 2),
(95, 12, 'mfaxlS3QYU', 217, 'sam@peah.io', 'Sam', 2),
(96, 12, 'zoWsKtKVXA', 219, 'sam@peah.io', 'Sam', 2),
(97, 12, 'zoWsKtKVXA', 220, 'sam@peah.io', 'Sam', 2),
(98, 12, 'j4FNqVEkhi', 213, 'zeleng@zale.zel', 'zeleng', 1),
(99, 12, 'mfaxlS3QYU', 218, 'zeleng@zale.zel', 'zeleng', 1),
(100, 12, 'zoWsKtKVXA', 219, 'zeleng@zale.zel', 'zeleng', 1),
(101, 12, 'j4FNqVEkhi', 211, 'zelenger@zale.zel', 'zelenger', 1),
(102, 12, 'mfaxlS3QYU', 218, 'zelenger@zale.zel', 'zelenger', 1),
(103, 12, 'zoWsKtKVXA', 221, 'zelenger@zale.zel', 'zelenger', 1);

-- --------------------------------------------------------

--
-- Table structure for table `optionpools`
--

CREATE TABLE `optionpools` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `qID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `optionpools`
--

INSERT INTO `optionpools` (`id`, `title`, `description`, `qID`) VALUES
(64, 'Morning', NULL, 'IatkSXbjN0'),
(65, 'Afternoon', NULL, 'IatkSXbjN0'),
(66, 'Evening', NULL, 'IatkSXbjN0'),
(67, 'Night', NULL, 'IatkSXbjN0'),
(68, 'Never', NULL, 'IatkSXbjN0'),
(69, 'Sol', NULL, 'HuRzLpni3k'),
(70, 'Soju', NULL, 'HuRzLpni3k'),
(71, 'Sokun', NULL, 'HuRzLpni3k'),
(72, 'There', NULL, '97tdvTks20'),
(73, 'Here', NULL, '97tdvTks20'),
(74, 'Nowhere', NULL, '97tdvTks20'),
(75, 'Dunno', NULL, 'nDasq1f3ms'),
(76, 'Saja', NULL, 'nDasq1f3ms'),
(77, 'Ha', NULL, 'nDasq1f3ms');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `question_id` varchar(255) NOT NULL,
  `survey_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `title`, `description`, `question_id`, `survey_id`) VALUES
(211, 'Morning', '', 'j4FNqVEkhi', 12),
(212, 'Afternoon', '', 'j4FNqVEkhi', 12),
(213, 'Evening', '', 'j4FNqVEkhi', 12),
(214, 'Night', '', 'j4FNqVEkhi', 12),
(215, 'Never', '', 'j4FNqVEkhi', 12),
(216, 'Dunno', '', 'mfaxlS3QYU', 12),
(217, 'Saja', '', 'mfaxlS3QYU', 12),
(218, 'Ha', '', 'mfaxlS3QYU', 12),
(219, 'There', '', 'zoWsKtKVXA', 12),
(220, 'Here', '', 'zoWsKtKVXA', 12),
(221, 'Nowhere', '', 'zoWsKtKVXA', 12),
(222, 'Sol', '', 'oaPvBmZ3JR', 13),
(223, 'Soju', '', 'oaPvBmZ3JR', 13),
(224, 'Sokun', '', 'oaPvBmZ3JR', 13),
(225, 'Morning', '', 'sekkInl7f5', 13),
(226, 'Afternoon', '', 'sekkInl7f5', 13),
(227, 'Evening', '', 'sekkInl7f5', 13),
(228, 'Night', '', 'sekkInl7f5', 13),
(229, 'Never', '', 'sekkInl7f5', 13),
(230, 'Dunno', '', 'qq89BHw2vs', 13),
(231, 'Saja', '', 'qq89BHw2vs', 13),
(232, 'Ha', '', 'qq89BHw2vs', 13);

-- --------------------------------------------------------

--
-- Table structure for table `questionpools`
--

CREATE TABLE `questionpools` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `qID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questionpools`
--

INSERT INTO `questionpools` (`id`, `title`, `description`, `type`, `qID`) VALUES
(29, 'When is your hobby?', 'When?', 1, 'IatkSXbjN0'),
(30, 'What is your hobby?', 'Why', 2, 'HuRzLpni3k'),
(31, 'Where is your hobby', 'Where', 2, '97tdvTks20'),
(32, 'Why is your hobbyy?', 'Nani?', 1, 'nDasq1f3ms');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `type` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `qID` varchar(255) DEFAULT NULL,
  `question_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `type`, `survey_id`, `qID`, `question_id`) VALUES
(71, 'When is your hobby?', 'When?', 1, 12, 'IatkSXbjN0', 'j4FNqVEkhi'),
(72, 'Why is your hobbyy?', 'Nani?', 1, 12, 'nDasq1f3ms', 'mfaxlS3QYU'),
(73, 'Where is your hobby', 'Where', 2, 12, '97tdvTks20', 'zoWsKtKVXA'),
(74, 'What is your hobby?', 'Why', 2, 13, 'HuRzLpni3k', 'oaPvBmZ3JR'),
(75, 'When is your hobby?', 'When?', 1, 13, 'IatkSXbjN0', 'sekkInl7f5'),
(76, 'Why is your hobbyy?', 'Nani?', 1, 13, 'nDasq1f3ms', 'qq89BHw2vs');

-- --------------------------------------------------------

--
-- Table structure for table `respondents`
--

CREATE TABLE `respondents` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text NOT NULL,
  `respond` int(11) DEFAULT 0,
  `user_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `title`, `start_date`, `end_date`, `description`, `respond`, `user_email`) VALUES
(12, 'Hobbyssss', '2023-01-09', '2023-01-20', 'Hobbbys', 7, 'admin@survey.com'),
(13, 'Rawrrrr', '2023-01-02', '2023-01-08', 'Roarrrrr', 0, 'admin@survey.com'),
(14, 'Hogoh', '2023-01-26', '2023-01-31', 'Hogohhhhh', 0, 'admin@survey.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `contact_number`, `address`, `role`) VALUES
(1, 'admin@oswa.com', 'admin123', 'Admin OSWA', '0178912345', 'Kulim Kedah', 1),
(4, 'admin@survey.com', 'Admin_01', 'samad peah', '0123334545', 'Songklang Klang', 2),
(5, 'ahmad@peah.com', 'Admin_01', 'Ahmad Peahs', '0129876543', 'Songkawng Aha', 2),
(6, 'sam@oswa.com', 'Admin_01', 'Sam', '0129876543', 'Songkawng Aha', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `optionpools`
--
ALTER TABLE `optionpools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionpools`
--
ALTER TABLE `questionpools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `optionpools`
--
ALTER TABLE `optionpools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `questionpools`
--
ALTER TABLE `questionpools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
