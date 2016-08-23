-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-07-08 10:31:14
-- 服务器版本： 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.6.19-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_manage_system`
--

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `no` varchar(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `sex` varchar(255) NOT NULL COMMENT '性别',
  `age` int(10) NOT NULL COMMENT '年龄',
  `about` text NOT NULL COMMENT '简介'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `no`, `name`, `sex`, `age`, `about`) VALUES
(24, '1', '1243', 'å¥³', 47, 'kjkl'),
(26, NULL, '1222121', 'å¥³', 545, '123\r\n4545645qqqqqqqqqqq'),
(27, NULL, '1222121', 'å¥³', 545, 'sadsadasd'),
(33, NULL, 'sdsadsadasd', 'ç”·', 48979, 'sadasdasd'),
(34, '1', 'za', 'ç”·', 0, 'asda'),
(35, '13w', 'asdasdasdadsadasdas', 'å¥³', 0, 'å•Šæ˜¯æ‰“ç®—æ‰“ç®—'),
(36, 'tx0001', 'dsadasdasdasda', 'ç”·', 5644987, 'asdsdasd'),
(37, 'tx0004', 'zy', 'å¥³', 147852369, 'asdadasdasdasdasdasd'),
(38, 'tx1478', 'asadasd', 'å¥³', 0, 'sdasdasd'),
(39, 'tx14525845', 'asdsadasdsad', 'å¥³', 0, 'sfsdfsdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;