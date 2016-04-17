-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: 2016 年 04 月 17 日 22:29
-- 伺服器版本: 5.5.47-0ubuntu0.14.04.1
-- PHP 版本: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `database`
--

-- --------------------------------------------------------

--
-- 資料表結構 `itemlog`
--

CREATE TABLE IF NOT EXISTS `itemlog` (
  `no` int(4) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(100) NOT NULL,
  `describe1` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location` varchar(50) NOT NULL,
  `iftaken` int(1) NOT NULL,
  `loseorfinder` tinyint(1) NOT NULL,
  `belongwho` varchar(20) NOT NULL,
  `finder` varchar(20) NOT NULL,
  `m_id` varchar(20) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `m_id` (`m_id`),
  KEY `finder` (`finder`),
  KEY `belongwho` (`belongwho`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=226 ;

--
-- 資料表的匯出資料 `itemlog`
--

INSERT INTO `itemlog` (`no`, `itemname`, `describe1`, `image`, `date`, `location`, `iftaken`, `loseorfinder`, `belongwho`, `finder`, `m_id`) VALUES
(106, 'æ‰‹éŒ¶', 'Gshockçš„', 'http://140.127.218.250:49002/file/123.jpg', '2016-04-04 16:00:00', 'ç³»è¾¦', 1, 1, 'root', '田安得', ''),
(168, 'æ°´æ¯', 'åœ¨å¤ªé™½åº•ä¸‹è’¸ç™¼äº†', 'http://140.127.218.250:49002/file/Jellyfish.jpg', '0000-00-00 00:00:00', '212', 0, 1, '', '', ''),
(171, 'ç„¡å°¾ç†Š', 'ç«æ˜Ÿæ—…é€”ä¸­éºå¤±', 'http://140.127.218.250:49002/file/Koala.jpg', '0000-00-00 00:00:00', '212', 0, 1, '', '', ''),
(172, 'æ°´æ¯', 'åœ¨å¤ªé™½åº•ä¸‹è’¸ç™¼äº†', 'http://140.127.218.250:49002/file/Jellyfish.jpg', '0000-00-00 00:00:00', 'ç³»è¾¦', 1, 0, '', '', ''),
(173, 'èŠ±', 'æ’åœ¨ç‰›ç³žä¸Š', 'http://140.127.218.250:49002/file/Tulips.jpg', '0000-00-00 00:00:00', 'ç³»è¾¦', 0, 0, '', '', ''),
(224, 'ç¹¡çƒèŠ±', 'é£›æ©Ÿæ˜¯èŠç‰¹å…„å¼Ÿç™¼æ˜Žçš„', 'http://140.127.218.250:49002/file/Hydrangeas.jpg', '2016-04-05 16:00:00', '212', 0, 1, '', 'root', ''),
(225, 'ä¼éµ', 'ç«æ˜Ÿæ—…é€”ä¸­éºå¤±', 'http://140.127.218.250:49002/file/Penguins.jpg', '2016-04-13 16:00:00', 'ç³»è¾¦', 1, 1, '', 'root', '');

-- --------------------------------------------------------

--
-- 資料表結構 `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `m_id` varchar(20) NOT NULL,
  `m_name` varchar(30) NOT NULL,
  `m_pwd` varchar(20) NOT NULL,
  `m_phone` varchar(10) NOT NULL,
  `m_email` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`m_id`),
  KEY `m_id` (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `manager`
--

INSERT INTO `manager` (`m_id`, `m_name`, `m_pwd`, `m_phone`, `m_email`) VALUES
('1', '1', '1', '1', '1'),
('a1023353', '田安得', 'yyyttuut', '0931289005', 'villain@kimo.com');

-- --------------------------------------------------------

--
-- 資料表結構 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stu_id` varchar(20) NOT NULL,
  `stu_name` varchar(30) NOT NULL,
  `stu_pwd` varchar(20) NOT NULL,
  `stu_phone` varchar(10) NOT NULL,
  `stu_email` varchar(50) NOT NULL,
  PRIMARY KEY (`stu_id`),
  KEY `stu_id` (`stu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `student`
--

INSERT INTO `student` (`stu_id`, `stu_name`, `stu_pwd`, `stu_phone`, `stu_email`) VALUES
('1', '1', '1', '1', '1'),
('A1023330', 'é„­äººç‘‹', '456', '0987654321', 'nice@gmail.com'),
('A1023353', '田安得', 'yyyttuut', '0931289005', 'villain@kimo.com'),
('root', 'apple', '123456', '0987654321', 'vv@yahoo.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
