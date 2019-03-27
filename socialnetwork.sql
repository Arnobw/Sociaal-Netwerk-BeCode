-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2019 at 02:07 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialnetwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `follower_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE `login_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `token` char(64) NOT NULL DEFAULT '',
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_tokens`
--

INSERT INTO `login_tokens` (`id`, `token`, `user_id`) VALUES
(2, '7e6402e547292a71b662d47a59b5a329ac8b443d', 13),
(3, 'b6b07d37d9e002752c1e1b487cfce9ef96fe894d', 14),
(4, 'b4285e422dcf4a8f83ed5d2694822eb2d5797c72', 0),
(6, '15e2b4addedca4913d848e616310c7ccc494286a', 0),
(7, '5e0c538ebd63c3ae37afac51bf4d90cb890de77d', 0),
(8, '1d58d802fc5e53745fed408f41efc2b0a9f003b6', 13);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `sender` int(11) UNSIGNED NOT NULL,
  `receiver` int(11) UNSIGNED NOT NULL,
  `read` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` int(11) UNSIGNED NOT NULL,
  `receiver` int(10) UNSIGNED NOT NULL,
  `sender` int(11) UNSIGNED NOT NULL,
  `extra` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_tokens`
--

CREATE TABLE `password_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `token` char(64) NOT NULL DEFAULT '',
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `body` varchar(160) NOT NULL DEFAULT '',
  `posted_at` datetime NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `posted_at`, `user_id`) VALUES
(14, 'test', '0000-00-00 00:00:00', 14),
(15, 'mkhigùouiyfhjknl', '2019-03-27 10:35:51', 14),
(16, 'jqeb:fkdsfjcklMJHFDNV', '2019-03-27 10:37:16', 14),
(17, 'JLMKRUIOPSGDVJKC,SFDZÙME', '2019-03-27 10:37:19', 14),
(18, 'LFMSJQLZÙLD;C', '2019-03-27 10:39:05', 13),
(19, 'LFMSJQLZÙLD;C', '2019-03-27 10:42:56', 13),
(20, 'dqdmkji', '2019-03-27 10:43:10', 14),
(21, 'dqdmkji', '2019-03-27 10:45:51', 14),
(22, 'dqdmkji', '2019-03-27 10:51:38', 14),
(23, 'dqdmkji', '2019-03-27 10:52:51', 14);

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `email` text,
  `age` int(11) DEFAULT NULL,
  `about` text,
  `colour` varchar(32) DEFAULT NULL,
  `topping` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `age`, `about`, `colour`, `topping`) VALUES
(1, 'Yeet', 'yeet', 'yeet@hotmail.com', NULL, NULL, '', NULL),
(9, 'Swagmaster', '$2y$10$ySM7sArUInrN6yoqxMYo3eii6dmMcKxiPYoK2j0yDckl03cl0AcU6', 'lol123chief@hotmail.com', NULL, NULL, '', NULL),
(10, 'Test', '$2y$10$lHWq8wpVrwUqKMrH3r.zsO0.wm..NAsEAQH8fuaILHj14RdGnzPpm', 'root@root.root', NULL, NULL, '', NULL),
(11, 'Serial Tester', '$2y$10$34bbFdPaKMkYdrd8PDrfS.x/vySDu5h7zqWPYmW5UilETGeDsNUem', 'tester@hotmail.com', 400, 'Ik ben dommie dik', 'Geel', NULL),
(12, 'Lang getal', '$2y$10$2GTijrOmT7zXBFLaDf.BBOpvje1I43hBT6j4fe.5PdNuYhopsJwS2', 'test@test.test', 2147483647, 'Ik ben een lang getal', 'Grijs', NULL),
(13, 'Bad Eend', '$2y$10$h3MagUtD5Llar8FwvBzG4uxEqLOgSZXXoY2J6D7GO/ZGYAnKSTKVS', 'bad@een.de', 1, 'Ik ben een band eend die chilled in de water, zo is natuur.', 'Geel', 'Asbest'),
(14, 'Stefan', '$2y$10$WFBbGwG3J8xCP0OqOtI5b.grm.qP95sLfiAtuidEOouSgAGSYvB4y', 'stef@an.be', 69, 'Ik ben extreem sporter, tafeltennis meester en kan ook een lekkere omelet maken.', 'Appelblauwzeegroen', 'Käze'),
(15, 'Arno', '$2y$10$nhPBHo0qtYiKFFYXC/22uudt5C4jcWN3RaPCNSEZ8d.yBfTsAPHNm', 'localhost@root.root', 420, 'a b c d e f g h i j k l m n o p q r s t u v w x y z', 'Pony', 'Salpeterzuur'),
(16, 'Thijs', '$2y$10$xG.VQ.Bq3JKgUqTgjF8ideFpcrjJ2bqgqAUieZI19xfYhu03o2lge', 'muggengeheugen@zemst.westvloandren', 30, 'stif kluchtig wi', 'Stutte', 'Stutte'),
(17, 'Rawaldeep', '$2y$10$u274Aqf4StwRTV.V2.F.euTH/EbXJbt2dojjPgtF/wcicX4dE/M8.', 'rawal@deep.com', 40000, 'Junior Developer', 'Horse', 'Horse');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_tokens`
--
ALTER TABLE `password_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_tokens`
--
ALTER TABLE `password_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
