-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 04:50 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dumbways`
--

-- --------------------------------------------------------

--
-- Table structure for table `heroes_db`
--

CREATE TABLE `heroes_db` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_id` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `heroes_db`
--

INSERT INTO `heroes_db` (`id`, `name`, `type_id`, `gambar`) VALUES
(13, 'baki hanma', 'fighter', '5f254e275dd15.jpg'),
(14, 'Yujiro hanma', 'berserker', '5f254e752c23b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `type_id`
--

CREATE TABLE `type_id` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type_id`
--

INSERT INTO `type_id` (`id`, `name`) VALUES
(1, 'hp regen'),
(2, 'sdsfsdf'),
(3, 'zilonk'),
(4, 'sadajd'),
(5, 'ljkadasd'),
(6, 'suren'),
(7, 'sadasd'),
(8, 'asdasd'),
(9, 'vcxv'),
(10, 'sdfdsf'),
(11, 'kjshadksah'),
(12, 'sdfsdf'),
(13, 'fighter'),
(14, 'berserker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `heroes_db`
--
ALTER TABLE `heroes_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_id`
--
ALTER TABLE `type_id`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `heroes_db`
--
ALTER TABLE `heroes_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `type_id`
--
ALTER TABLE `type_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
