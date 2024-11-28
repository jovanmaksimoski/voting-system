-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 11:47 AM
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
-- Database: `voting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `name`) VALUES
(1, 'Makes Work Fun'),
(2, 'Team Player'),
(3, 'Culture Champion'),
(4, 'Difference Maker');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`ID`, `name`, `surname`, `email`, `password`) VALUES
(27, 'Jovan', 'Maksimoski', 'jovanmaksimoskii@gmail.com', '$2y$10$I4ADXioNteCyuNhCIDe/0ue7cIkv4wjhz5sKHd92b4w6sMRFWwsl2'),
(28, 'Hop Rios', 'Ferrell', 'gaqizibapa@mailinator.com', '$2y$10$J1GmMXEz1rgnbHUNZbtCPu36fLMEtXo7dNdQPT9Kc0Bex5u7ydXQu'),
(29, 'McKenzie Dickson', 'Summers', 'favev@mailinator.com', '$2y$10$Y1L6JkcnMslbyRLMD4YzIu5xLV22TnyFlz8HPCRj.qxY5InfeyQCS'),
(30, 'Holmes Watkins', 'Shannon', 'qubu@mailinator.com', '$2y$10$ICGssjkFNy4nzZplGSGRpedkm6r3vITNrrGg5KP9fQ5O6aqoUgDoC'),
(31, 'Colin Curtis', 'Mccray', 'fecohu@mailinator.com', '$2y$10$4I5v7MLsa4b9oupiuVRVV.YylOV.JqalM5ln/Dg2wwC3IGB96112O'),
(32, 'Ferdinand Farrell', 'Luna', 'kuxopelaza@mailinator.com', '$2y$10$ELL.64EVSzRlE8vpVRNuTOr6yzyCqq3OvpheC1IeSNlcge./aw4oi'),
(33, 'Yvette Sutton', 'Robles', 'juba@mailinator.com', '$2y$10$a9NGkrMzJN8EmEVd2By1d.ku.k7wqX/AeLxi3BFIHGlDh6BGgxEve'),
(34, 'Lacey Roberson', 'Howe', 'legom@mailinator.com', '$2y$10$P91BM/LJBXSROmiXlfd2LuQvAfgh3ISolCMjScedNVVPS./UXPNMa'),
(35, 'Naomi Waller', 'Donaldson', 'muvo@mailinator.com', '$2y$10$1H.GIwpP6TLN7Ou5OiYgDed2twBr0Izgk3iBcuAHjmq7a7hYNBMjy'),
(36, 'Wang Melendez', 'Lambert', 'qujaqec@mailinator.com', '$2y$10$E1WwnT/WkFnzXLh0jJ0FUuqqhsxEiQGlzlF1C/rRMtY8q/uwoQug6'),
(37, 'Gillian Ferrell', 'Spears', 'hijyfiqyx@mailinator.com', '$2y$10$Zg8RiiIInKimWzkrUgSV9uLL44DzTwajAvbn3TyLELf.1j.VyNVmC'),
(38, 'bojan', 'bojanovski', 'bojan@gmail.com', '$2y$10$4TgaLvLaIMi.91CBSIJjpOFlFWwMAjng2SANDkym4TSmtNP7SiTmu');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `voter_id` int(11) NOT NULL,
  `nominee_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `voter_id`, `nominee_id`, `category_id`, `comment`, `created_at`) VALUES
(1, 32, 31, 2, 'Est quo eos id itaque excepturi', '2024-11-28 10:04:56'),
(2, 31, 31, 1, 'Modi aliquip in adipisicing obcaecati esse pariatur Vero porro', '2024-11-28 10:09:13'),
(3, 31, 31, 2, 'Eveniet nisi error irure est nihil aliquam aliquid quis voluptate neque praesentium repellendus Ipsa asperiores dolorem atque iure', '2024-11-28 10:09:17'),
(4, 32, 27, 2, 'Officiis corrupti aut dolor nostrum porro enim ipsum dolor aliquip earum voluptas', '2024-11-28 10:09:23'),
(5, 30, 32, 4, 'Aute culpa enim reprehenderit asperiores aliquam quidem eu minim non debitis vel placeat est est voluptatum reprehenderit sit tempora', '2024-11-28 10:09:29'),
(6, 28, 27, 4, 'Fugiat distinctio Quis mollit inventore', '2024-11-28 10:11:07'),
(7, 27, 29, 3, 'Veniam est consectetur illum ipsum eligendi proident rerum voluptatem rerum corrupti ad unde placeat est quo quia', '2024-11-28 10:11:11'),
(8, 27, 32, 3, 'Obcaecati dolor minim ducimus perspiciatis sit enim accusantium omnis velit officia aperiam doloribus incidunt ut autem dolor', '2024-11-28 10:11:14'),
(9, 28, 28, 4, 'Magnam exercitation fugiat officiis aliquip consequatur Tempor praesentium excepteur doloremque autem minim aliquip', '2024-11-28 10:17:14'),
(10, 32, 27, 4, 'Nihil explicabo Est molestiae molestiae beatae ut adipisci obcaecati', '2024-11-28 10:25:51'),
(11, 28, 27, 2, 'Duis quod nostrum facere voluptatem eveniet', '2024-11-28 10:25:55'),
(12, 32, 33, 4, 'Voluptate quo magnam minus aut autem voluptas nihil incididunt corrupti quam qui nisi adipisci cumque cupidatat laborum Non anim debitis', '2024-11-28 10:36:15'),
(13, 31, 27, 2, 'Sed aut sit est exercitation consequuntur', '2024-11-28 10:37:22'),
(14, 30, 29, 3, 'Odit ut minim doloremque quod minima doloremque accusamus aut et debitis consequatur consequatur Voluptatem cupiditate et ea enim', '2024-11-28 10:37:29'),
(15, 27, 28, 2, 'Vitae quia commodi explicabo Eum', '2024-11-28 10:40:18'),
(16, 30, 28, 3, 'Officiis ut perferendis recusandae Soluta', '2024-11-28 10:40:21'),
(17, 29, 31, 4, 'Doloremque ex id fugiat blanditiis reprehenderit id quis tempor', '2024-11-28 10:40:25'),
(18, 36, 29, 4, 'Et suscipit pariatur Eos autem exercitationem consequat Quis quis nostrum', '2024-11-28 10:41:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voter_id` (`voter_id`),
  ADD KEY `nominee_id` (`nominee_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`voter_id`) REFERENCES `employees` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`nominee_id`) REFERENCES `employees` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `votes_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
