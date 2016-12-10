-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2014 at 02:20 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `met`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `date_added`, `date_modified`) VALUES
(1, 'HOLIDAY PACKAGES', '2014-06-22 07:17:35', '2014-06-22 07:17:35'),
(2, 'HONEYMOON PACKAGES', '2014-06-22 07:19:13', '2014-06-22 07:19:13'),
(3, 'CONFERNESE PLANNER', '2014-06-22 07:19:48', '2014-06-22 07:19:48'),
(4, 'SPECIAL PACKAGES WITH AIR FAIR', '2014-06-22 07:20:46', '2014-06-22 07:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `adult` varchar(10) NOT NULL,
  `chiled` varchar(10) NOT NULL,
  `comments` varchar(1000) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `first_name`, `email`, `address`, `arrival_date`, `departure_date`, `adult`, `chiled`, `comments`, `date_added`, `date_modified`) VALUES
(1, 'dsfsdf', 'sumit.sale@gamil.com', 'sdfsdf', '2014-06-18', '2014-06-25', '3', '2', '', '2014-06-29 07:08:49', '2014-06-29 07:08:49'),
(2, 'dsfsdf', 'sumit.sale@gamil.com', 'sdfsdf', '2014-06-18', '2014-06-25', '3', '2', 'dsadasdad', '2014-06-29 07:09:49', '2014-06-29 07:09:49'),
(3, 'dsdsdfsdf', 'sumit.sale@gamil.com', 'sdfsfsdfsdf', '2014-06-02', '2014-06-25', '4', '4', 'rwerwerwerwer', '2014-06-29 07:15:39', '2014-06-29 07:15:39'),
(4, 'ertert', 'sumit.sale@gamil.com', 'ertert', '2014-06-01', '2014-06-26', '3', '3', 'ffdfsdfsdfsdf', '2014-06-29 07:31:18', '2014-06-29 07:31:18'),
(5, 'dfsdfsd', 'sumit.sale@gamil.com', 'sdfsdf', '2014-06-03', '2014-06-18', '2', '3', 'sdfsdfsdf', '2014-06-29 07:32:23', '2014-06-29 07:32:23'),
(6, 'sdfsdf', 'sumit.sale@gamil.com', 'sdfsdf', '2014-06-01', '2014-06-25', '3', '3', 'sdfsdfsdf', '2014-06-29 07:33:46', '2014-06-29 07:33:46'),
(7, 'asdasd', 'sumit.sale@gamil.com', 'sdasdasd', '2014-06-04', '2014-06-05', '3', '3', 'adadasdasd', '2014-06-29 07:52:09', '2014-06-29 07:52:09'),
(8, 'asdasd', 'sumit.sale@gamil.com', 'asdasd', '2014-06-03', '2014-06-04', '3', '3', 'aadasdad', '2014-06-29 07:56:04', '2014-06-29 07:56:04'),
(9, 'zxczxc', 'sumit.sale@gamil.com', 'zxczxc', '2014-06-04', '2014-06-12', '2', '3', 'zxczxczxc', '2014-06-29 08:01:04', '2014-06-29 08:01:04'),
(10, 'sdfsdf', 'sumit.sale@gamil.com', 'sdfsdf', '2014-06-01', '2014-06-02', '2', '3', 'xzxczxc', '2014-06-29 08:01:54', '2014-06-29 08:01:54'),
(11, 'asdads', 'sumit.sale@gamil.com', 'asdad', '2014-06-03', '2014-06-25', '2', '3', 'asdas', '2014-06-29 08:03:18', '2014-06-29 08:03:18'),
(12, 'werwer', 'sumit.sale@gamil.com', 'werwer', '2014-06-01', '2014-06-11', '3', '3', 'ewrwer', '2014-06-29 08:04:03', '2014-06-29 08:04:03'),
(13, 'sdfsdf', 'sumit.sale@gamil.com', 'asdfd', '2014-06-01', '2014-06-04', '1', '4', 'sdfsdf', '2014-06-29 08:36:16', '2014-06-29 08:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE IF NOT EXISTS `enquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `title` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `email_id` varchar(500) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `check_in` varchar(500) NOT NULL,
  `check_out` varchar(500) NOT NULL,
  `adult` varchar(50) NOT NULL,
  `chiled` varchar(50) NOT NULL,
  `no_of_room` varchar(50) NOT NULL,
  `estimate_budget` varchar(500) NOT NULL,
  `comment_and_reference` varchar(1000) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `type`, `name`, `title`, `first_name`, `last_name`, `mobile`, `telephone`, `email_id`, `address`, `check_in`, `check_out`, `adult`, `chiled`, `no_of_room`, `estimate_budget`, `comment_and_reference`, `date_added`, `date_modified`) VALUES
(1, 'packages', 'BREAK TO ANDAMAN', 'Mr', 'sdfsdf', 'sdfsdf', '8082464653', '3123123', 's.s@gmail.com', 'sdfsfd', 'sf', 'dsfsdf', '0', '1', '3', 'sfdsd', 'fsdfsdf', '2014-06-29 09:50:54', '2014-06-29 09:50:54'),
(2, 'packages', 'BREAK TO ANDAMAN', 'Mr', 'sdfsdf', 'sdfsdf', '8082464653', '3123123', 's.s@gmail.com', 'sdfsfd', 'sf', 'dsfsdf', '0', '1', '3', 'sfdsd', 'fsdfsdf', '2014-06-29 09:51:07', '2014-06-29 09:51:07'),
(3, 'packages', 'BREAK TO ANDAMAN', 'Mrs', 'werwer', 'werwer', '8082464653', '3123123', 's.s@gmail.com', 'werwerwer', 'sf', 'dsfsdf', '3', '2', '0', 'werwer', 'werwerwerwer', '2014-06-29 09:51:49', '2014-06-29 09:51:49'),
(4, 'packages', 'BREAK TO ANDAMAN', 'Mr', 'qweqwewqe', 'qweqweqweq', '8082464653', '3123123', 's.s@gmail.com', 'qweqweqwe', '2014-06-10', '2014-06-20', '1', '0', '4', '34243234', 'asA\r\nASS\r\nasASas', '2014-06-29 09:29:20', '2014-06-29 09:29:20'),
(5, 'hotel', ' Fortune Resort Bay Island', 'Mr', 'sdfsfd', 'sdfsdf', '8082464653', '3123123', 's.s@gmail.com', 'sdfsfsdf', '2014-06-02', '2014-06-11', '2', '3', '2', '234234', 'sdfsdfsdf', '2014-06-29 09:39:41', '2014-06-29 09:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(500) NOT NULL,
  `thumbnail` varchar(500) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `day` varchar(500) NOT NULL,
  `night` varchar(500) NOT NULL,
  `start_price` varchar(500) NOT NULL,
  `price_with_out_offer` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `hotel_name`, `thumbnail`, `address`, `day`, `night`, `start_price`, `price_with_out_offer`, `description`, `rating`, `date_added`, `date_modified`) VALUES
(13, ' Fortune Resort Bay Island', 'img_hotel_01.jpg', 'Marine Hill, Port Blair', '1 days', '2 nights', '123', '', 'Located on one of the world''s last outpost of virgin, natural rain-forest island, Fortune Resort Bay Island\r\n															Overlooks the pristine blue waters of the Bay of Bengal.', 'three', '2014-06-27 20:48:24', '2014-07-05 05:33:41'),
(14, 'Fortune Resort Bay Island', 'img_hotel_02.jpg', 'Marine Hill, Port Blair', '5 days', '3 nights', '6980.00', '', 'Located on one of the world''s last outpost of virgin, natural rain-forest island, Fortune Resort Bay Island\r\n															Overlooks the pristine blue waters of the Bay of Bengal.', 'three', '2014-06-27 20:53:34', '2014-06-27 20:53:34'),
(15, 'sdfsdf', 'img_hotel_01.jpg', 'sdfsdfdf', '3 days', '4 nights', '234234', '12000.00', 'sdfsdfsdf', 'three', '2014-06-28 11:35:51', '2014-07-03 19:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_detail`
--

CREATE TABLE IF NOT EXISTS `hotel_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_tag` varchar(1000) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `thumbnail_1` varchar(500) NOT NULL,
  `thumbnail_2` varchar(500) NOT NULL,
  `thumbnail_3` varchar(500) NOT NULL,
  `thumbnail_4` varchar(500) NOT NULL,
  `thumbnail_5` varchar(500) NOT NULL,
  `overview_paragraph_1` text NOT NULL,
  `overview_paragraph_2` text NOT NULL,
  `overview_paragraph_3` text NOT NULL,
  `room_1_type` varchar(500) NOT NULL,
  `room_1_amunities` varchar(500) NOT NULL,
  `room_1_thumbnail` varchar(500) NOT NULL,
  `room_1_inclusion` varchar(500) NOT NULL,
  `room_1_accomodation_chargres` varchar(500) NOT NULL,
  `room_2_type` varchar(500) NOT NULL,
  `room_2_amunities` varchar(500) NOT NULL,
  `room_2_thumbnail` varchar(500) NOT NULL,
  `room_2_inclusion` varchar(500) NOT NULL,
  `room_2_accomodation_chargres` varchar(500) NOT NULL,
  `room_3_type` varchar(500) NOT NULL,
  `room_3_amunities` varchar(500) NOT NULL,
  `room_3_thumbnail` varchar(500) NOT NULL,
  `room_3_inclusion` varchar(500) NOT NULL,
  `room_3_accomodation_chargres` varchar(500) NOT NULL,
  `room_1_charges` varchar(500) NOT NULL,
  `room_2_charges` varchar(500) NOT NULL,
  `room_3_charges` varchar(500) NOT NULL,
  `hotel_amunities` varchar(500) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hotel_detail`
--

INSERT INTO `hotel_detail` (`id`, `meta_tag`, `hotel_id`, `thumbnail_1`, `thumbnail_2`, `thumbnail_3`, `thumbnail_4`, `thumbnail_5`, `overview_paragraph_1`, `overview_paragraph_2`, `overview_paragraph_3`, `room_1_type`, `room_1_amunities`, `room_1_thumbnail`, `room_1_inclusion`, `room_1_accomodation_chargres`, `room_2_type`, `room_2_amunities`, `room_2_thumbnail`, `room_2_inclusion`, `room_2_accomodation_chargres`, `room_3_type`, `room_3_amunities`, `room_3_thumbnail`, `room_3_inclusion`, `room_3_accomodation_chargres`, `room_1_charges`, `room_2_charges`, `room_3_charges`, `hotel_amunities`, `date_added`, `date_modified`) VALUES
(1, 'weqweqwe,qwe,q,we,qe,qw,e,qwe', 13, 'inner_slider02.jpg', 'inner_slider01.jpg', 'inner_slider02.jpg', 'inner_slider02.jpg', 'inner_slider02.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor \r\n											incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\n											exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure\r\n											dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \r\n											Excepteur sint occaecat', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor \r\n											incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\n											exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure\r\n											dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \r\n											Excepteur sint occaecat', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor \r\n											incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\n											exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure\r\n											dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \r\n											Excepteur sint occaecat', 'STANDARD', 'Neque porro quisquam5,Neque porro quisquam7,Neque porro quisquam8', 'img_room_std.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etc', 'DELUX', 'Neque porro quisquam6,Neque porro quisquam8', 'img_room_delux.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etc', 'DELUX', 'Neque porro quisquam1,Neque porro quisquam2', 'img_room_delux.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etc', '5400.00', '6000.00', '10000.00', 'Travel Desk,Laundry,24 Hours Security,Gym,24 Hour Front Desk,Internet,Coffee Shop,Room Service,24 Hour Check in,Pool', '2014-07-05 09:32:41', '2014-07-05 09:32:41'),
(2, 'asdadasd', 15, '', '', '', '', '', '<br />', '<br />', '<br />', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Travel Desk,Gym', '2014-07-05 06:28:31', '2014-07-05 06:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room`
--

CREATE TABLE IF NOT EXISTS `hotel_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `hotel_detail_id` int(11) NOT NULL,
  `room_type` varchar(500) NOT NULL,
  `room_amunities` text NOT NULL,
  `thumbnail` varchar(500) NOT NULL,
  `inclusion` varchar(500) NOT NULL,
  `charges` varchar(500) NOT NULL,
  `price_with_offer` varchar(100) NOT NULL,
  `accomodation_charges` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `hotel_room`
--

INSERT INTO `hotel_room` (`id`, `room_id`, `hotel_detail_id`, `room_type`, `room_amunities`, `thumbnail`, `inclusion`, `charges`, `price_with_offer`, `accomodation_charges`) VALUES
(1, 1, 1, 'STANDARD', 'Neque porro quisquam1,Neque porro quisquam4,Neque porro quisquam6', 'Hydrangeas.jpg', 'dfgddfg', '43535', '1234', 'dfsfsfadfadasdasd'),
(4, 1, 2, 'STANDARD', 'Neque porro quisquam1,Neque porro quisquam4', 'Hydrangeas.jpg', 'sdfsfsf', '234234', '234234', '234234'),
(5, 2, 2, 'STANDARD', 'Neque porro quisquam2,Neque porro quisquam2,Neque porro quisquam5', 'Lighthouse.jpg', 'sdasds', '23123', '123123', 'sdadad'),
(8, 3, 2, 'STANDARD', 'Neque porro quisquam3,Neque porro quisquam2', 'Desert.jpg', 'dsfsdf', '324', '234234', '234234'),
(11, 5, 2, 'DELUX', 'Neque porro quisquam5,Neque porro quisquam4', 'Koala.jpg', '324', '3424', '234234', '234234');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(500) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(500) NOT NULL,
  `small_description` varchar(500) NOT NULL,
  `package_day` varchar(100) NOT NULL,
  `package_night` varchar(100) NOT NULL,
  `pricing` varchar(200) NOT NULL,
  `pricing_with_out_offer` varchar(200) NOT NULL,
  `destination` varchar(500) NOT NULL,
  `key_feature` varchar(500) NOT NULL,
  `package_thumbnail` varchar(500) NOT NULL,
  `show_on_site` varchar(100) NOT NULL,
  `rating` varchar(200) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `category_id`, `category_name`, `small_description`, `package_day`, `package_night`, `pricing`, `pricing_with_out_offer`, `destination`, `key_feature`, `package_thumbnail`, `show_on_site`, `rating`, `date_added`, `date_modified`) VALUES
(3, 'BREAK TO ANDAMAN', 1, 'HOLIDAY PACKAGES', 'Explore the life under the sea at Andaman Islands with Scuba Diving', '3 days', '2 nights', '1233.00', '1111.00', 'Accommodation Transfers Sightseeing', '<p>&nbsp;Accommodation <br /></p><p>&nbsp;Transfer</p><p>&nbsp;Sightseeing</p>', 'img_andaman.jpg', 'Show', 'one', '2014-06-27 18:01:00', '2014-07-05 07:14:56'),
(4, 'BREAK TO ANDAMAN', 2, 'HONEYMOON PACKAGES', '', '6 day', '4 night', '3000.00', '10000.00', 'Explore the life under the sea at Andaman Islands with Scuba Diving', 'Explore the life under the sea at Andaman Islands with Scuba Diving', 'img_best_of_andaman.jpg', 'Show', 'three', '2014-06-27 18:02:09', '2014-06-27 19:33:11'),
(5, 'BREAK TO ANDAMAN3', 3, 'CONFERNESE PLANNER', '', '3 day', '5 night', '1542.00', '6000.00', 'Explore the life under the sea at Andaman Islands with Scuba Diving', 'Explore the life under the sea at Andaman Islands with Scuba Diving', 'img_drop_place.jpg', 'Show', 'four', '2014-06-27 18:05:26', '2014-06-27 19:33:31'),
(6, 'BREAK TO ANDAMAN3', 3, 'CONFERNESE PLANNER', '', '3 day', '3 night', '7580.00', '10000.00', 'Explore the life under the sea at Andaman Islands with Scuba Diving', 'Explore the life under the sea at Andaman Islands with Scuba Diving', 'img_jolly_island.jpg', 'Show', 'four', '2014-06-27 18:06:06', '2014-06-27 19:28:39'),
(7, 'Exotic andaman', 4, 'SPECIAL PACKAGES WITH AIR FAIR', '', '3 day', '3 night', '3652.00', '6000.00', 'Explore the life under the sea at Andaman Islands with Scuba Diving', 'Explore the life under the sea at Andaman Islands with Scuba Diving', 'img_best_of_andaman.jpg', 'Show', 'five', '2014-06-27 18:06:51', '2014-06-27 19:34:03'),
(8, 'asdasd', 2, 'HONEYMOON PACKAGES', 'sdasdasdasd', '3 days', '2 nights', '233213', '33234', 'asdadsad', 'adasdasdasdasd', 'img_exotic_andaman.jpg', 'Hide', 'four', '2014-06-28 11:11:52', '2014-06-28 11:12:56'),
(9, 'xcvxcv', 4, 'SPECIAL PACKAGES WITH AIR FAIR', 'xcvxcvxc', '3 days', '4 nights', '5400.00', '6000.00', 'xcvxcvxc', 'xcvxvxcv', 'Desert.jpg', 'Show', 'three', '2014-06-28 11:17:02', '2014-07-05 07:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `packages_itinerary`
--

CREATE TABLE IF NOT EXISTS `packages_itinerary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_detail_id` int(11) NOT NULL,
  `heading` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `packages_itinerary`
--

INSERT INTO `packages_itinerary` (`id`, `package_detail_id`, `heading`, `description`) VALUES
(8, 5, 'dadsa', 'dadadasd'),
(41, 7, 'dfgdf', 'dfgdfgddfgdgdgdgdfgddfgdfgdfg'),
(42, 7, 'ffffffffffffffffffffff', 'ffffffffffffffffffffffffffffffffffffffffff'),
(64, 3, 'asA', 'sASasASsdfsdfsfsdfsdfsdff\r\nsdfsdffsdfsdfsfsdfsdfsdffsdfsdfsfsdf\r\nsdfsdffsdfsdfsfsdfsdfsdff'),
(65, 3, 'sdfsfsdf', 'sdfsdfsfsdfsdfsdffsdfsdfsfsdfsdfsdffsdfsdfsfsdf\r\nsdfsdffsdfsdfsfsdfsdfsdffsdfsdfsfsdfsdfsdffsdfsd\r\nfsfsdfsdfsdffsdfsdfsfsdfsdfsdffsdfsdfsfsdfsdfsdff'),
(66, 3, 'asdsd', 'dasdasdasd\r\nasd\r\nas\r\ndas\r\nda\r\nsd');

-- --------------------------------------------------------

--
-- Table structure for table `package_detail`
--

CREATE TABLE IF NOT EXISTS `package_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_tag` varchar(1000) NOT NULL,
  `package_id` int(11) NOT NULL,
  `thumbnail_1` varchar(500) NOT NULL,
  `thumbnail_2` varchar(500) NOT NULL,
  `thumbnail_3` varchar(500) NOT NULL,
  `thumbnail_4` varchar(500) NOT NULL,
  `thumbnail_5` varchar(500) NOT NULL,
  `activity` text NOT NULL,
  `description` text NOT NULL,
  `inclusion` text NOT NULL,
  `itinerary_day_1_heading` varchar(500) NOT NULL,
  `itinerary_day_1_description` text NOT NULL,
  `itinerary_day_2_heading` varchar(500) NOT NULL,
  `itinerary_day_2_description` varchar(500) NOT NULL,
  `itinerary_day_3_heading` varchar(500) NOT NULL,
  `itinerary_day_3_description` text NOT NULL,
  `itinerary_day_4_heading` varchar(500) NOT NULL,
  `itinerary_day_4_description` text NOT NULL,
  `itinerary_day_5_heading` varchar(500) NOT NULL,
  `itinerary_day_5_description` text NOT NULL,
  `itinerary_day_6_heading` varchar(500) NOT NULL,
  `itinerary_day_6_description` text NOT NULL,
  `itinerary_day_7_heading` varchar(500) NOT NULL,
  `itinerary_day_7_description` text NOT NULL,
  `hotel_id` varchar(500) NOT NULL,
  `hotel_name` text NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `package_detail`
--

INSERT INTO `package_detail` (`id`, `meta_tag`, `package_id`, `thumbnail_1`, `thumbnail_2`, `thumbnail_3`, `thumbnail_4`, `thumbnail_5`, `activity`, `description`, `inclusion`, `itinerary_day_1_heading`, `itinerary_day_1_description`, `itinerary_day_2_heading`, `itinerary_day_2_description`, `itinerary_day_3_heading`, `itinerary_day_3_description`, `itinerary_day_4_heading`, `itinerary_day_4_description`, `itinerary_day_5_heading`, `itinerary_day_5_description`, `itinerary_day_6_heading`, `itinerary_day_6_description`, `itinerary_day_7_heading`, `itinerary_day_7_description`, `hotel_id`, `hotel_name`, `date_added`, `date_modified`) VALUES
(1, '', 1, 'Desert.jpg', 'Hydrangeas.jpg', 'Jellyfish.jpg', 'Jellyfish.jpg', 'Koala.jpg', 'asdasdasdadsdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdfsdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdfsdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdfsdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdfsdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdfsdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdfsdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdf', 'asdasdsdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdfsdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdfsdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdfsdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdfsdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdfsdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdfsdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdfsdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdf', 'asdasd', 'sd', 'asdasdasda', 'sad', 'asdasdasd', 'asdas', 'dasdasdasdasd', 'asdas', 'dasdasdasd', 'asdasd', '', 'sdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdf', '', 'sdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdfsdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdfsdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdfsdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdfsdfsdfsfsdfsdfsdfsfsfsdfsdfsdfsdfsdf', '', '3,5,6', 'asdad,asdad,asdad', '2014-06-23 19:13:26', '2014-06-23 19:13:26'),
(2, '', 1, 'Chrysanthemum.jpg', 'Desert.jpg', 'Hydrangeas.jpg', 'Jellyfish.jpg', 'Jellyfish.jpg', 'asdasd', 'asdasd', 'asdasd', 'sd', 'asdasdasda', 'sad', 'asdasdasd', 'asdas', 'dasdasdasdasd', 'asdas', 'dasdasdasd', 'asdasd', '', '', '', '', '', '3,4', 'asdad,asdad', '2014-06-22 16:29:36', '2014-06-22 16:29:36'),
(3, 'zdasdadasda \r\nasdadasd', 3, 'inner_slider01.jpg', 'inner_slider02.jpg', 'inner_slider01.jpg', 'inner_slider02.jpg', 'inner_slider01.jpg', '<h4 style="color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"><p style="margin-bottom: 0.0001pt;"><strong><span style="font-family:Arial,sans-serif;font-size: 15pt;">Short Break to Andaman Islands</span></strong></p><p style="margin-bottom: 0.0001pt;"><span style="font-family:Arial,sans-serif;font-size: 9pt;">Package Duration : 3 Night / 4 Days &nbsp;</span></p><p style="margin-bottom: 0.0001pt;"><span style="font-family:Arial,sans-serif;font-size: 9pt;">Destination&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Port Blair (3 Night)</span></p><p style="margin-bottom: 0.0001pt;"><strong><u><span style="font-family:Arial,sans-serif;font-size: 9pt;">Highlights</span></u></strong></p></h4><ul style="color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"><li><span style="font-family:Arial,sans-serif;font-size: 9pt; font-weight: normal; text-indent: -18pt;">Meet &amp; Greet at Port Blair Airport</span></li></ul><ul style="color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"><li><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;"><span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;</span></span><span style="font-family:Arial,sans-serif;font-size: 9pt;">Swim, walk &amp; relax at Carbynz’s Cove Beach<span style="background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"></span></span></span></li></ul><h4 style="color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-family:Arial, sans-serif;font-size: 9pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Sound &amp; light Show at Cellular Jail.</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-family:Arial, sans-serif;font-size: 9pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Harbor Cruise –cruise to seven ports/ harbour by Boat.</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-family:Arial, sans-serif;font-size: 9pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Viewing of colourful corals and underwater marine life through glass bottom boats</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-family:Arial, sans-serif;font-size: 9pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Visit Ross Islands by boat</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-family:Arial, sans-serif;font-size: 9pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">visit North Bay Coral Island by boat and options of Snorkelling and other water sports activities</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span></span><span style="font-family:Arial, sans-serif;font-size: 9pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-weight: normal;">Port Blair city tour – visit Museums. Monuments &amp; Memorial</span></span></p><p style="margin-bottom: 0.0001pt;"><strong><u>Package Includes</u></strong></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-size: 9pt;">Hotel Accommodation for 3 Night at Port Blair</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-size: 9pt;">Hotel Accommodation for 2 Night at Havelock</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-size: 9pt;">Return Airport Transfers by Private Non AC Car</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-size: 9pt;">Sightseeing &amp; other transfers by Private Non AC Car</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-size: 9pt;">Service of Tour Manager</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-size: 9pt;">All Entry tickets, permits &amp; Ferry Tickets</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span></span><span style="font-size: 9pt;"><span style="font-weight: normal;">Hotel Taxes &amp; Parking Charges</span></span></p></h4>', '<h4 style="color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"><p style="margin-bottom: 0.0001pt;"><strong><span style="font-family:Arial,sans-serif;font-size: 15pt;">Short Break to Andaman Islands</span></strong></p><p style="margin-bottom: 0.0001pt;"><span style="font-family:Arial,sans-serif;font-size: 9pt;">Package Duration : 3 Night / 4 Days &nbsp;</span></p><p style="margin-bottom: 0.0001pt;"><span style="font-family:Arial,sans-serif;font-size: 9pt;">Destination&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Port Blair (3 Night)</span></p><p style="margin-bottom: 0.0001pt;"><strong><u><span style="font-family:Arial,sans-serif;font-size: 9pt;">Highlights</span></u></strong></p></h4><ul style="color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"><li><span style="font-family:Arial,sans-serif;font-size: 9pt; font-weight: normal; text-indent: -18pt;">Meet &amp; Greet at Port Blair Airport</span></li></ul><ul style="color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"><li><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;"><span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;</span></span><span style="font-family:Arial,sans-serif;font-size: 9pt;">Swim, walk &amp; relax at Carbynz’s Cove Beach<span style="background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"></span></span></span></li></ul><h4 style="color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-family:Arial, sans-serif;font-size: 9pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Sound &amp; light Show at Cellular Jail.</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-family:Arial, sans-serif;font-size: 9pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Harbor Cruise –cruise to seven ports/ harbour by Boat.</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-family:Arial, sans-serif;font-size: 9pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Viewing of colourful corals and underwater marine life through glass bottom boats</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-family:Arial, sans-serif;font-size: 9pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Visit Ross Islands by boat</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-family:Arial, sans-serif;font-size: 9pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">visit North Bay Coral Island by boat and options of Snorkelling and other water sports activities</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span></span><span style="font-family:Arial, sans-serif;font-size: 9pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-weight: normal;">Port Blair city tour – visit Museums. Monuments &amp; Memorial</span></span></p><p style="margin-bottom: 0.0001pt;"><strong><u>Package Includes</u></strong></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-size: 9pt;">Hotel Accommodation for 3 Night at Port Blair</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-size: 9pt;">Hotel Accommodation for 2 Night at Havelock</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-size: 9pt;">Return Airport Transfers by Private Non AC Car</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-size: 9pt;">Sightseeing &amp; other transfers by Private Non AC Car</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-size: 9pt;">Service of Tour Manager</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-size: 9pt;">All Entry tickets, permits &amp; Ferry Tickets</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span></span><span style="font-size: 9pt;"><span style="font-weight: normal;">Hotel Taxes &amp; Parking Charges</span></span></p></h4>', '<h4 style="color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"><p style="margin-bottom: 0.0001pt;"><strong><span style="font-family:Arial,sans-serif;font-size: 15pt;">Short Break to Andaman Islands</span></strong></p><p style="margin-bottom: 0.0001pt;"><span style="font-family:Arial,sans-serif;font-size: 9pt;">Package Duration : 3 Night / 4 Days &nbsp;</span></p><p style="margin-bottom: 0.0001pt;"><span style="font-family:Arial,sans-serif;font-size: 9pt;">Destination&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Port Blair (3 Night)</span></p><p style="margin-bottom: 0.0001pt;"><strong><u><span style="font-family:Arial,sans-serif;font-size: 9pt;">Highlights</span></u></strong></p></h4><ul style="color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"><li><span style="font-family:Arial,sans-serif;font-size: 9pt; font-weight: normal; text-indent: -18pt;">Meet &amp; Greet at Port Blair Airport</span></li></ul><ul style="color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"><li><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;"><span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;</span></span><span style="font-family:Arial,sans-serif;font-size: 9pt;">Swim, walk &amp; relax at Carbynz’s Cove Beach<span style="background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"></span></span></span></li></ul><h4 style="color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-family:Arial, sans-serif;font-size: 9pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Sound &amp; light Show at Cellular Jail.</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-family:Arial, sans-serif;font-size: 9pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Harbor Cruise –cruise to seven ports/ harbour by Boat.</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-family:Arial, sans-serif;font-size: 9pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Viewing of colourful corals and underwater marine life through glass bottom boats</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-family:Arial, sans-serif;font-size: 9pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Visit Ross Islands by boat</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-family:Arial, sans-serif;font-size: 9pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">visit North Bay Coral Island by boat and options of Snorkelling and other water sports activities</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span></span><span style="font-family:Arial, sans-serif;font-size: 9pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-weight: normal;">Port Blair city tour – visit Museums. Monuments &amp; Memorial</span></span></p><p style="margin-bottom: 0.0001pt;"><strong><u>Package Includes</u></strong></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-size: 9pt;">Hotel Accommodation for 3 Night at Port Blair</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-size: 9pt;">Hotel Accommodation for 2 Night at Havelock</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-size: 9pt;">Return Airport Transfers by Private Non AC Car</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-size: 9pt;">Sightseeing &amp; other transfers by Private Non AC Car</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-size: 9pt;">Service of Tour Manager</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span><span style="font-size: 9pt;">All Entry tickets, permits &amp; Ferry Tickets</span></span></p><p style="margin-bottom: 0.0001pt; text-indent: -18pt;"><span style="font-weight: normal;"><span style="font-family:Symbol;font-size: 9pt;">·<span style="font-family:''Times New Roman'';font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span></span></span></span><span style="font-size: 9pt;"><span style="font-weight: normal;">Hotel Taxes &amp; Parking Charges</span></span></p></h4>', 'DAY 1: Arival to Andaman Island(Port Blair)', 'On arrival at Port Blair AirPort/ Havelock, our representative will receive and escort to the hotel for checking. After lunch, the sightseeing starts with Carbyn''s Cove Beach, the picturesque Beach is around 07km far from Port Blair city and it is an deal destination for swimming and sun-basking. Prom Carbyn''s Cove Beach we move for Cruise of Harbours, the leisure Cruise ends with Viper Island, the place of execution. ', 'DAY 1: Arival to Andaman Island(Port Blair)', 'On arrival at Port Blair AirPort/ Havelock, our representative will receive and escort to the hotel for checking. After lunch, the sightseeing starts with Carbyn''s Cove Beach, the picturesque Beach is around 07km far from Port Blair city and it is an deal destination for swimming and sun-basking. Prom Carbyn''s Cove Beach we move for Cruise of Harbours, the leisure Cruise ends with Viper Island, the place of execution. ', 'DAY 1: Arival to Andaman Island(Port Blair)', 'On arrival at Port Blair AirPort/ Havelock, our representative will receive and escort to the hotel for checking. After lunch, the sightseeing starts with Carbyn''s Cove Beach, the picturesque Beach is around 07km far from Port Blair city and it is an deal destination for swimming and sun-basking. Prom Carbyn''s Cove Beach we move for Cruise of Harbours, the leisure Cruise ends with Viper Island, the place of execution. ', 'DAY 1: Arival to Andaman Island(Port Blair)', 'On arrival at Port Blair AirPort/ Havelock, our representative will receive and escort to the hotel for checking. After lunch, the sightseeing starts with Carbyn''s Cove Beach, the picturesque Beach is around 07km far from Port Blair city and it is an deal destination for swimming and sun-basking. Prom Carbyn''s Cove Beach we move for Cruise of Harbours, the leisure Cruise ends with Viper Island, the place of execution. ', 'DAY 1: Arival to Andaman Island(Port Blair)', '', '', '', '', '', '13,14', ' Fortune Resort Bay Island,Fortune Resort Bay Island', '2014-07-05 12:11:28', '2014-07-05 12:11:28'),
(4, '', 9, '', '', '', '', '', '<br />', '', '<br />', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '13', ' Fortune Resort Bay Island', '2014-07-01 18:55:06', '2014-07-01 18:55:06'),
(5, '', 8, '', '', '', '', '', '<br />', '', '<br />', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '13', ' Fortune Resort Bay Island', '2014-07-01 19:02:34', '2014-07-01 19:02:34'),
(6, 'asdasdasdasd,asd,a,dsa,d,ads,a,d', 7, '', '', '', '', '', '<br />', '<br />', '<br />', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '13,14', ' Fortune Resort Bay Island,Fortune Resort Bay Island', '2014-07-01 20:46:20', '2014-07-01 20:46:20'),
(7, 'dfgdfg', 4, 'Hydrangeas.jpg', 'Hydrangeas.jpg', '', '', '', '<p>dfgdfgdfgdfg</p><p><br /></p><p>dgd</p><p>fg</p><p>d<br /></p>', '<p>fgddgdg</p><p><br /></p><p>f</p><p>dfg</p><div align="center"><ul><li><strong><em><u><del>dg</del></u></em></strong><br /></li></ul></div>', '<p>dfgdfg</p><p>d</p><p>fg</p><p>dfg</p><p>d</p><p>g<br /></p>', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '13', ' Fortune Resort Bay Island', '2014-07-05 10:23:35', '2014-07-05 10:23:35');

-- --------------------------------------------------------

--
-- Table structure for table `place_to_visit`
--

CREATE TABLE IF NOT EXISTS `place_to_visit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_tag` varchar(500) NOT NULL,
  `place_name` varchar(500) NOT NULL,
  `category_name` varchar(500) NOT NULL,
  `small_thumbnail` varchar(500) NOT NULL,
  `thumbnail_1` varchar(500) NOT NULL,
  `thumbnail_2` varchar(500) NOT NULL,
  `thumbnail_3` varchar(500) NOT NULL,
  `thumbnail_4` varchar(500) NOT NULL,
  `thumbnail_5` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `place_to_visit`
--

INSERT INTO `place_to_visit` (`id`, `meta_tag`, `place_name`, `category_name`, `small_thumbnail`, `thumbnail_1`, `thumbnail_2`, `thumbnail_3`, `thumbnail_4`, `thumbnail_5`, `description`, `date_added`, `date_modified`) VALUES
(2, 'asdasdad', 'Ross Island', 'Islands', 'img_places_one.jpg', 'inner_slider01.jpg', 'inner_slider01.jpg', 'inner_slider02.jpg', 'inner_slider02.jpg', 'inner_slider02.jpg', '<p>The small island with its treasure of ruins in it become the hot tourists spot in the territory.\r\n												While visiting to this island, we desire to know more and more about Ross Island. Before the independence, \r\n												the island is the seat of British power and capital of these Andaman Islands from 1858 until 1941 and also\r\n												the base for the British Administrator of the penal colony in Port Blair In 1941, the Japanese converted \r\n												the site into POW camp, and built war installations, remnants of which can still be seen. It now stands as \r\n												a ruin of the bygone days with the old structure almost in debris and the few signs of its colonial glory,\r\n												such as the Chief \r\n											</p>\r\n											<p>\r\n												The small island with its treasure of ruins in it become the hot tourists spot in the territory.\r\n												While visiting to this island, we desire to know more and more about Ross Island. Before the independence, \r\n												the island is the seat of British power and capital of these Andaman Islands from 1858 until 1941 and also\r\n												the base for the British Administrator of the penal colony in Port Blair In 1941, the Japanese converted \r\n												the site into POW camp, and built war installations, remnants of which can still be seen. It now stands as \r\n												a ruin of the bygone days with the old structure almost in debris and the few signs of its colonial glory,\r\n												such as the Chief \r\n											</p>\r\n											<p>\r\n												The small island with its treasure of ruins in it become the hot tourists spot in the territory.\r\n												While visiting to this island, we desire to know more and more about Ross Island. Before the independence, \r\n												the island is the seat of British power and capital of these Andaman Islands from 1858 until 1941 and also\r\n												the base for the British Administrator of the penal colony in Port Blair In 1941, the Japanese converted \r\n												the site into POW camp, and built war installations, remnants of which can still be seen. It now stands as \r\n												a ruin of the bygone days with the old structure almost in debris and the few signs of its colonial glory,\r\n												such as the Chief \r\n											</p>\r\n											<p>\r\n												The small island with its treasure of ruins in it become the hot tourists spot in the territory.\r\n												While visiting to this island, we desire to know more and more about Ross Island. Before the independence, \r\n												the island is the seat of British power and capital of these Andaman Islands from 1858 until 1941 and also\r\n												the base for the British Administrator of the penal colony in Port Blair In 1941, the Japanese converted \r\n												the site into POW camp, and built war installations, remnants of which can still be seen. It now stands as \r\n												a ruin of the bygone days with the old structure almost in debris and the few signs of its colonial glory,\r\n												such as the Chief \r\n											</p>', '2014-07-05 05:09:11', '2014-07-05 05:09:11'),
(3, '', 'Jolly buoy Island', 'Beaches', 'img_places_one.jpg', 'inner_slider01.jpg', 'inner_slider01.jpg', 'inner_slider02.jpg', 'inner_slider02.jpg', 'inner_slider02.jpg', '<p>\n												The small island with its treasure of ruins in it become the hot tourists spot in the territory.\n												While visiting to this island, we desire to know more and more about Ross Island. Before the independence, \n												the island is the seat of British power and capital of these Andaman Islands from 1858 until 1941 and also\n												the base for the British Administrator of the penal colony in Port Blair In 1941, the Japanese converted \n												the site into POW camp, and built war installations, remnants of which can still be seen. It now stands as \n												a ruin of the bygone days with the old structure almost in debris and the few signs of its colonial glory,\n												such as the Chief \n											</p>', '2014-06-27 21:47:37', '2014-06-27 21:47:37'),
(4, '', 'Viper Island', 'Monument & Museums', 'img_places_one.jpg', 'inner_slider01.jpg', 'inner_slider02.jpg', 'inner_slider02.jpg', 'inner_slider01.jpg', 'inner_slider01.jpg', '<p>\n												The small island with its treasure of ruins in it become the hot tourists spot in the territory.\n												While visiting to this island, we desire to know more and more about Ross Island. Before the independence, \n												the island is the seat of British power and capital of these Andaman Islands from 1858 until 1941 and also\n												the base for the British Administrator of the penal colony in Port Blair In 1941, the Japanese converted \n												the site into POW camp, and built war installations, remnants of which can still be seen. It now stands as \n												a ruin of the bygone days with the old structure almost in debris and the few signs of its colonial glory,\n												such as the Chief \n											</p>', '2014-06-27 21:24:36', '2014-06-27 21:24:36'),
(5, '', 'Jolly buoy Island', 'Monument & Museums', 'slider02.jpg', 'slider01.jpg', 'slider02.jpg', 'slider01.jpg', 'slider01.jpg', 'slider01.jpg', '<p>\r\n												The small island with its treasure of ruins in it become the hot tourists spot in the territory.\r\n												While visiting to this island, we desire to know more and more about Ross Island. Before the independence, \r\n												the island is the seat of British power and capital of these Andaman Islands from 1858 until 1941 and also\r\n												the base for the British Administrator of the penal colony in Port Blair In 1941, the Japanese converted \r\n												the site into POW camp, and built war installations, remnants of which can still be seen. It now stands as \r\n												a ruin of the bygone days with the old structure almost in debris and the few signs of its colonial glory,\r\n												such as the Chief \r\n											</p>', '2014-06-28 12:26:48', '2014-06-28 12:26:48'),
(6, '', 'asdasd', 'Monument & Museums', 'inner_slider01.jpg', 'inner_slider01.jpg', 'inner_slider02.jpg', 'inner_slider02.jpg', '', '', '<p>asdasd</p><p>asd</p><p>a</p><p>sda</p><p>ds</p><p>asd</p><p>ad</p><p><br /></p>', '2014-06-28 13:59:35', '2014-06-28 13:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `activekey` varchar(100) NOT NULL,
  `lastvisit` datetime NOT NULL,
  `superuser` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `team_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `type`, `activekey`, `lastvisit`, `superuser`, `status`, `firstname`, `address`, `team_id`) VALUES
(1, 'ABC', '21232f297a57a5a743894a0e4a801fc3', 'abc@gmail.com', '', '', '0000-00-00 00:00:00', '', '', '', '', 0),
(2, 'EFG', 'ppp', 'efg@gmail.com', '', '', '0000-00-00 00:00:00', '', '', '', '', 0),
(3, 'HIJ', 'ppp', 'hij@gmail.com', '', '', '0000-00-00 00:00:00', '', '', '', '', 0),
(4, 'KLM', 'ppp', 'lkm@gmail.com', '', '', '0000-00-00 00:00:00', '', '', '', '', 0),
(5, 'admin', 'c93ccd78b2076528346216b3b2f701e6', 'vfsf', 'sfs', 'vsvsvs', '0000-00-00 00:00:00', 'ss', 'svs', 'vivek', 'bhandup', 0),
(6, 'hhhhh', '21232f297a57a5a743894a0e4a801fc3', 'tgrgr@gmail.com', 'grtggtgrg', '', '0000-00-00 00:00:00', '', 'A', '', '', 1),
(7, 'vivek', 'c93ccd78b2076528346216b3b2f701e6', 'vivek@gmail.com', 'grtggtgrg', '', '0000-00-00 00:00:00', '', 'A', '', '', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
