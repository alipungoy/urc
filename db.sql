-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2020 at 10:29 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urc`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `username` mediumtext NOT NULL,
  `fName` tinytext NOT NULL,
  `lName` tinytext NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` tinytext NOT NULL,
  `token` varchar(250) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `fName`, `lName`, `email`, `password`, `user_type`, `token`, `verified`) VALUES
(23, 'test', 'test', 'test', 'test@gmail.com', '$2y$10$Nty.2ptmY9TWVzcECZR37u.saj170XNJvaBeOJXJqPLV1xEQoRZ9W', 'admin', '82da150ddfd65c4667d22c5a83667aaa2d69fcf5617a03cae5b7093f509c602649425c1593f789492e9c3584cef6f514443a', 0),
(24, 'test1', 'test', 'test', 'test1@gmail.com', '$2y$10$p1Z51d7OkoujHUUBnA9QGum50X76WXvni9wj..NYrxjXYg0x0ccZi', 'user', '51a488810034d2fbd6e77ba9f22d087814f9cd8475dc678c860b22a49a58d4ae0f1ec3bdd8eb3eabfb4809c3925de4cfbafc', 0),
(25, 'test3', 'test', 'test', 'test3@gmail.com', '$2y$10$9m8oXwcOTXlF0rJvizOyWuBOuNtv9/T3OvmhBg9w.xRR7ngzrDoDC', 'user', '287298dc8fb8d6233e9cf85562f0117f146c8b474e94dd9eef0d69e34df31bed34528b650ad23e555e9cf850a3ff16cf6393', 0),
(26, 'test4', 'test', 'test', 'test4@gmail.com', '$2y$10$XRz0kIL/qWJvDJvZQ5IHt.z5DlyOOOLMsPYG34rlsl4ttVg81UtZ2', 'user', '5e3e0525a355c0ebe32a2e68d54d63763e161946c12313f04225fda3e936083ab5763a940b3fc96c57e2670c95c72be39ab2', 0),
(27, 'test10', 'test', 'test', 'test10@gmail.com', '$2y$10$UeDoP0EZ8zviseY5FgoViOrxF.xPQW.KtI26yFLuYqXJarbYIzZtC', 'user', 'da6e850ee692c74a603cfe6f9b99129ad3c9cb3b4b883f10cd391e226df2f6ec77176c44119a9de63fa24cecdaa8fa7453a1', 0),
(28, 'test11', 'test', 'test', 'test11@gmail.com', '$2y$10$VXDPZdHAZBSR8ig8XSqDdeQpWPcv7ozH4RBCAzC9JNGQY98hgxiVC', 'user', 'f9e44c74f2d674c89c2aa4117b7f3f9a39144b27ad43f99820149a796f009668bffce1e5f9b636f7fae75e7f43e37c943365', 0),
(29, 'test12', 'test', 'test', 'test12@gmail.com', '$2y$10$2eewqUi7IyGxOqMv7jsG3OWoKFjbHx2zZk.AXDojCc8S50vpsBhLK', 'user', '377684398768df32214ed951fe10afdff4f0f742ef6f5ae53a1064423d2adf1d5b9648f1139554d978b53eaea117fba3b80c', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
