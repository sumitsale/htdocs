-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2014 at 10:33 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fresher`
--

-- --------------------------------------------------------

--
-- Table structure for table `pm_project_issues_details`
--

CREATE TABLE IF NOT EXISTS `pm_project_issues_details` (
  `issue_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(25) NOT NULL,
  `tracker` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `priority` varchar(8) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `description` varchar(250) NOT NULL,
  `assignee` varchar(25) NOT NULL,
  `updated` datetime NOT NULL,
  `start_date` date NOT NULL,
  `due_date` date NOT NULL,
  `estimated_time` int(4) NOT NULL,
  `spent_time` int(4) NOT NULL,
  `work_completed` int(3) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`issue_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pm_project_issues_details`
--

INSERT INTO `pm_project_issues_details` (`issue_id`, `project_name`, `tracker`, `status`, `priority`, `subject`, `description`, `assignee`, `updated`, `start_date`, `due_date`, `estimated_time`, `spent_time`, `work_completed`, `created`) VALUES
(3, 'Compoz', 'dsdf', 'sdf', 'sd', 'sdf', 'sdfsd', 'fsdf', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 0, 0, 0, '0000-00-00'),
(4, 'Compoz', 'dsdf', 'sdf', 'sd', 'sdf', 'sdfsd', 'fsdf', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 0, 0, 0, '0000-00-00'),
(5, 'Compoz', 'dsdf', 'sdf', 'sd', 'sdf', 'sdfsd', 'fsdf', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 0, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pm_status_master`
--

CREATE TABLE IF NOT EXISTS `pm_status_master` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pm_status_master`
--

INSERT INTO `pm_status_master` (`status_id`, `status`) VALUES
(1, 'In Progress'),
(2, 'Fresh'),
(3, 'Resolved'),
(4, 'Close');

-- --------------------------------------------------------

--
-- Table structure for table `pm_tracker_master`
--

CREATE TABLE IF NOT EXISTS `pm_tracker_master` (
  `track_id` int(11) NOT NULL AUTO_INCREMENT,
  `tracker` varchar(25) NOT NULL,
  PRIMARY KEY (`track_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pm_tracker_master`
--

INSERT INTO `pm_tracker_master` (`track_id`, `tracker`) VALUES
(1, 'Task'),
(2, 'Bug'),
(3, 'Feature'),
(4, 'Change Request'),
(5, 'Suggestion');

-- --------------------------------------------------------

--
-- Table structure for table `pm_user_registration_details`
--

CREATE TABLE IF NOT EXISTS `pm_user_registration_details` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(36) NOT NULL,
  `projectname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `pm_user_registration_details`
--

INSERT INTO `pm_user_registration_details` (`emp_id`, `username`, `email`, `password`, `projectname`, `firstname`, `lastname`) VALUES
(1, 'admin@eample.com', 'admin@eample.com', '54321', 'Compoz', 'dfdsf', 'sdfsf');

-- --------------------------------------------------------

--
-- Table structure for table `project_master`
--

CREATE TABLE IF NOT EXISTS `project_master` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(25) NOT NULL,
  `description` varchar(300) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `project_master`
--

INSERT INTO `project_master` (`project_id`, `project_name`, `description`, `created_date`) VALUES
(1, 'Stacos', 'It deals with online tax Payment.', '2014-10-01'),
(2, 'Compoz', 'It deals with photo storage ', '2014-11-05'),
(3, 'Invino', 'it deals with online vine shop', '2014-10-22'),
(4, 'Nykaa', 'It deals with online shopping', '2014-11-20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
