-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2014 at 08:32 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `client_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `client_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`client_name`, `type`, `url`, `username`, `password`, `id`) VALUES
('Client Name', 'client type', 'client url', 'client username', 'client password', 21),
('Client Name', 'client type 2', 'client url 2', 'client username 2', 'client password 2', 22),
('Client Name', 'client type 3', 'client url 3', 'client username 3', 'client password 3', 23),
('Test Client', 'some type', 'Some Url', 'Some Username', 'Some Password', 24),
('Some Client', 'some type', 'Some Url', 'Some Username', 'Some Password', 25),
('Test Client', 'test type', 'test url', 'test username', 'test password', 26),
('sdf', 'sdf', 'sdf', 'sdf', 'sdf', 27);
