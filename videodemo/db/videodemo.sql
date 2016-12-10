-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2015 at 04:04 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `videodemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` varchar(100) NOT NULL,
  `end_time` varchar(100) NOT NULL,
  `start_hour` int(10) NOT NULL,
  `start_minute` int(10) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `httpurl` text NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modifed` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `start_time`, `end_time`, `start_hour`, `start_minute`, `title`, `httpurl`, `date_added`, `date_modifed`) VALUES
(1, '0:00', '0:30', 0, 0, 'Video Title Here', 'http://static.bouncingminds.com/ads/15secs/dogs_600.mp4', '2014-12-12 19:40:11', '2014-12-12 19:42:33'),
(2, '0:30', '1:00', 0, 15, 'Video Title Here', 'http://static.bouncingminds.com/ads/15secs/horse_how_to_600.mp4', '2014-12-12 19:40:11', '2014-12-12 20:14:33'),
(3, '1:00', '1:30', 0, 35, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 20:05:15'),
(4, '1:30', '2:00', 0, 36, 'Video Title Here', 'http://static.bouncingminds.com/ads/15secs/dogs_600.mp4', '2014-12-12 19:40:12', '2014-12-12 20:08:07'),
(5, '2:00', '2:30', 0, 39, 'Video Title Here', 'http://static.bouncingminds.com/ads/15se', '2014-12-12 19:40:12', '2014-12-12 20:07:43'),
(6, '2:30', '3:00', 0, 40, 'Video Title Here', 'http://static.bouncingminds.com/ads/15secs/horse_how_to_600.mp4', '2014-12-12 19:40:12', '2014-12-12 20:14:44'),
(7, '3:00', '3:30', 3, 0, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(8, '3:30', '4:00', 3, 30, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(9, '4:00', '4:30', 4, 0, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(10, '4:30', '5:00', 4, 30, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(11, '5:00', '5:30', 5, 0, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(12, '5:30', '6:00', 5, 30, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(13, '6:00', '6:30', 6, 0, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(14, '6:30', '7:00', 6, 30, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(15, '7:00', '7:30', 7, 0, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(16, '7:30', '8:00', 7, 30, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(17, '8:00', '8:30', 8, 0, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(18, '8:30', '9:00', 8, 30, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(19, '9:00', '9:30', 9, 0, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(20, '9:30', '10:00', 9, 30, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(21, '10:00', '10:30', 10, 0, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(22, '10:30', '11:00', 10, 30, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(23, '11:00', '11:30', 11, 0, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(24, '11:30', '12:00', 11, 30, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(28, '13:30', '14:00', 13, 9, 'Video Title Here', 'http://static.bouncingminds.com/ads/15secs/dogs_600.mp4', '2014-12-12 19:40:12', '2014-12-27 08:38:50'),
(29, '14:00', '14:30', 14, 0, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(30, '14:30', '15:00', 14, 30, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(31, '15:00', '15:30', 15, 0, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(32, '15:30', '16:00', 15, 30, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(33, '16:00', '16:30', 16, 0, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(34, '16:30', '17:00', 16, 30, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(35, '17:00', '17:30', 17, 0, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(36, '17:30', '18:00', 17, 30, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(37, '18:00', '18:30', 18, 0, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(38, '18:30', '19:00', 18, 30, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(39, '19:00', '19:30', 19, 0, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(40, '19:30', '20:00', 19, 30, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(41, '20:00', '20:30', 20, 0, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(42, '20:30', '21:00', 20, 30, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:12', '2014-12-12 19:40:12'),
(43, '21:00', '21:30', 21, 0, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:13', '2014-12-12 19:40:13'),
(44, '21:30', '22:00', 21, 30, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:13', '2014-12-12 19:40:13'),
(45, '22:00', '22:30', 22, 0, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:13', '2014-12-12 19:40:13'),
(46, '22:30', '23:00', 22, 30, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:13', '2014-12-12 19:40:13'),
(47, '23:00', '23:30', 23, 0, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:13', '2014-12-12 19:40:13'),
(48, '23:30', '0:00', 23, 30, 'Video Title Here', 'http://download.wavetlan.com/SVV/Media/HTTP/H264/Talkinghead_Media/H264_test1_Talkinghead_mp4_480x360.mp4', '2014-12-12 19:40:13', '2014-12-12 19:40:13');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
