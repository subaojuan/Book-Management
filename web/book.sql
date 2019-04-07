-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-10-11 16:39:44
-- 服务器版本： 5.6.17
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456'),
(2, 'mazhe', '123456');

-- --------------------------------------------------------

--
-- 表的结构 `yx_books`
--

CREATE TABLE `yx_books` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(50) NOT NULL,
  `uploadtime` date NOT NULL,
  `type` varchar(100) NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yx_books`
--

INSERT INTO `yx_books` (`id`, `name`, `price`, `uploadtime`, `type`, `total`) VALUES
(1, 'php从入门到放弃', 37, '1234-12-12', 'php', 33),
(7, 'java从入门到放弃1', 11, '2017-10-10', 'java', 44),
(8, 'mysql从入门到放弃', 44, '2017-10-05', 'mysql', 44),
(9, 'python从入门到放弃', 55, '2017-10-05', 'python', 55),
(10, 'php从入门到精通', 33, '2018-12-12', 'php', 33),
(11, 'java从入门到精通', 34, '2017-10-01', 'java', 34),
(12, 'mysql从入门到精通', 35, '2017-10-02', 'mysql', 35),
(13, 'python从入门到精通', 36, '2017-10-14', 'python', 36),
(14, 'java从入门到精通', 37, '2017-10-01', 'java', 37),
(15, 'mysql从入门到精通', 38, '2017-10-02', 'mysql', 38),
(16, 'python从入门到精通', 39, '2017-10-14', 'python', 39);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `yx_books`
--
ALTER TABLE `yx_books`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `yx_books`
--
ALTER TABLE `yx_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
