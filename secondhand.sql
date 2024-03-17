-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2024-03-09 21:12:34
-- 服务器版本： 5.7.26
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `secondhand`
--

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `cell_id` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `last_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `shop_id`, `cell_id`, `uid`, `last_time`) VALUES
(1, 2, 1, 2, '1709989819'),
(2, 5, 2, 1, '1709989432');

-- --------------------------------------------------------

--
-- 表的结构 `messagelist`
--

CREATE TABLE `messagelist` (
  `id` int(11) NOT NULL,
  `cell_id` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `messagelist`
--

INSERT INTO `messagelist` (`id`, `cell_id`, `uid`, `time`, `message_id`, `message`) VALUES
(1, NULL, 2, '1709988861', 1, 'Hello！'),
(2, NULL, 2, '1709988881', 1, 'Is this a genuine version?'),
(3, 1, NULL, '1709988965', 1, 'Yes.'),
(4, 1, NULL, '1709988998', 1, 'Is there anything else you need to know?'),
(5, 1, NULL, '1709989051', 1, 'This is 90% new. If you like it, you can buy it quickly.'),
(6, NULL, 2, '1709989323', 1, 'OK!'),
(7, 2, NULL, '1709989432', 2, 'Please provide your shipping information so that we can quickly deliver it to you!'),
(8, 1, NULL, '1709989819', 1, 'OK');

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`id`, `shop_id`, `uid`, `time`) VALUES
(1, 5, 1, '1709989114'),
(2, 2, 2, '1709989864');

-- --------------------------------------------------------

--
-- 表的结构 `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `intro` text COLLATE utf8_unicode_ci,
  `uid` int(11) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `shop`
--

INSERT INTO `shop` (`id`, `cname`, `price`, `date_start`, `date_end`, `intro`, `uid`, `date`, `img`, `img2`, `type`, `status`) VALUES
(1, 'Les Miserables', '75.00', '2024-03-09', '2024-07-01', 'This is a novel that depicts the living conditions of people from all walks of life during the French Revolution, and is known as the encyclopedia of human suffering.', 1, '1709986021', 'upload/d6e049d219d486854b8e3525383f655f433.jpg', 'upload/d6e049d219d486854b8e3525383f655f774.jpg', 'Books', 0),
(2, 'Red and Black', '109.00', '2024-03-09', '2024-06-01', 'This is a foundational work of critical realism in 19th century Europe, mainly depicting the personal struggles and love experiences of the protagonist Yu Lian, deeply reflecting the social atmosphere of that time.', 1, '1709987176', 'upload/a36d93dc777b7a715181ead2287f9405518.jpg', 'upload/a36d93dc777b7a715181ead2287f9405773.jpg', 'Books', 1),
(3, 'Turkey Noodles', '45.00', '2024-03-09', '2024-04-30', 'Turkey noodles are a type of instant noodles originating from South Korea, widely popular worldwide for their unique taste and flavor. Its main ingredients are noodles, vegetables, and turkey meat. Noodles are usually made from wheat flour, with a strong taste and not easy to burn in the pot; Vegetables include bean sprouts, shredded carrots, shredded onions, etc., which increase the nutritional value of food; The addition of turkey meat makes the noodles more chewy and flavorful.', 1, '1709987512', 'upload/d02da99daea09876691d87777ae8b0a3614.jpg', 'upload/d02da99daea09876691d87777ae8b0a3288.jpg', 'Food', 0),
(4, 'Portable study desk', '499.00', '2024-03-09', '2024-06-20', 'It is a new, scientific, humane, and practical learning aid tool that combines research from multiple disciplines such as ergonomics, ergonomics, and human physiology, and integrates elements such as human visual principles, color science, psychology, and more.', 2, '1709988328', 'upload/31ebc0affdd1de36600dbf5f779d99c9737.jpg', 'upload/31ebc0affdd1de36600dbf5f779d99c9800.jpg', 'Furnitures', 0),
(5, 'Folding bed', '99.00', '2024-03-09', '2024-04-30', 'A simple bed designed using the principle of joints that can be folded, retracted, and placed. It is made of environmentally friendly materials, with a stable and lightweight structure, making it suitable for use in office, travel, home, leisure, and other occasions.', 2, '1709988531', 'upload/ebab0ec8ec51580634275578ee9eb7e2741.jpg', 'upload/ebab0ec8ec51580634275578ee9eb7e2815.jpg', 'Furnitures', 1),
(6, 'Succulent plants', '29.00', '2024-03-09', '2024-03-31', 'A type of plant with a special water storage organ, in which at least one of its roots, stems, and leaves is thick and juicy, capable of storing a large amount of water.', 2, '1709988764', 'upload/13ba19fe87db686bdc3bc33b1d3f50f2188.jpg', 'upload/13ba19fe87db686bdc3bc33b1d3f50f2464.jpg', 'Others', 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `password`, `name`, `email`) VALUES
(1, '123456', 'Sophia', '123456@gmail.com'),
(2, '888888', 'Michael', '888888@gmail.com');

--
-- 转储表的索引
--

--
-- 表的索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `messagelist`
--
ALTER TABLE `messagelist`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `messagelist`
--
ALTER TABLE `messagelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
