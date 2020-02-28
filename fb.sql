-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2020 at 04:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `img_url` text NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `body`, `user_id`, `img_url`, `post_id`) VALUES
(38, 'zz', 1, 'FB_IMG_1523545980247.jpg', 42),
(56, 'rcfxzderzsssssssssssssssx', 2, 'FB_IMG_1524341167933.jpg', 43),
(57, 'bbbbbbbbbbbbbbbbbbbbrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 2, 'FB_IMG_1524339256206.jpg', 43),
(62, 'node --max-old-space-size=<size> path-to/fileName.js', 2, 'FB_IMG_1524510764397.jpg', 46),
(63, 'I\'ve faced this same problem recently and came across to this thread but my problem was with React App. Below changes in the node start command solved my issues.', 2, 'FB_IMG_1524521223905.jpg', 46);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `img_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `user_id`, `comment`, `img_url`) VALUES
(42, 'We\'ve just launched Material Kit PRO. It has a huge number of components, sections and example pages. Start Your Development With A Badass Bootstrap UI Kit inspired by Material Design.', 2, '', 'FB_IMG_1523545770642.jpg'),
(43, '18\r\n\r\ni was struggling with this even after setting --max-old-space-size.\r\n\r\nThen i realised need to put options --max-old-space-size before the karma script.\r\n\r\nalso best to specify both syntaxes --max-old-space-size and --max_old_space_size my script for karma :', 1, '', 'FB_IMG_1523741889777.jpg'),
(45, '@IF EXIST ', 1, '', 'FB_IMG_1524339606765.jpg'),
(46, 'received_961668447323979', 2, '', 'FB_IMG_1523546390707.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `mail` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mail`, `password`) VALUES
(1, 'fatma', 'fatma@gmail.com', '123'),
(2, 'alaa', 'alaa@gmail.com', '131');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
