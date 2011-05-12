-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2011 at 02:52 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `metebquote`
--

-- --------------------------------------------------------

--
-- Table structure for table `expensedata`
--

CREATE TABLE IF NOT EXISTS `expensedata` (
  `expensdataid` int(11) NOT NULL AUTO_INCREMENT,
  `renewal_expenses` varchar(20) NOT NULL COMMENT 'decimal value',
  `expense_inflation` varchar(20) NOT NULL COMMENT 'percentage',
  `initial_expenses` varchar(20) NOT NULL COMMENT 'decimal value',
  `loadings` varchar(20) NOT NULL COMMENT 'percentage',
  PRIMARY KEY (`expensdataid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `expensedata`
--


-- --------------------------------------------------------

--
-- Table structure for table `marketdata`
--

CREATE TABLE IF NOT EXISTS `marketdata` (
  `marketdataid` int(11) NOT NULL AUTO_INCREMENT,
  `upload_date` date NOT NULL,
  `month_array` text NOT NULL,
  `discounting_array` text NOT NULL,
  `dhfactors_matrix` text NOT NULL COMMENT 'array of values from the spreadsheet columns',
  PRIMARY KEY (`marketdataid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `marketdata`
--


-- --------------------------------------------------------

--
-- Table structure for table `quotehistory`
--

CREATE TABLE IF NOT EXISTS `quotehistory` (
  `quotehistoryid` int(11) NOT NULL AUTO_INCREMENT,
  `clientid` int(11) NOT NULL COMMENT 'the userid for who this quote is being generated',
  `financialadvisorid` int(11) NOT NULL COMMENT 'essentially the userid who is this clients financial advisor',
  `quotedatetime` datetime NOT NULL,
  PRIMARY KEY (`quotehistoryid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quotehistory`
--


-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE IF NOT EXISTS `system` (
  `systemid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`systemid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `system`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `usertype` tinyint(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `dob` datetime NOT NULL,
  `sex` varchar(1) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `idnumber` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `postaladdress` varchar(40) NOT NULL,
  `streetaddress` varchar(40) NOT NULL,
  `spousename` varchar(30) NOT NULL,
  `spousesurname` varchar(30) NOT NULL,
  `spousedob` datetime NOT NULL,
  `spousesex` varchar(1) NOT NULL,
  `spouseidnumber` varchar(20) NOT NULL,
  `company` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT 'user status enabled or disabled',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `usertype`, `username`, `password`, `name`, `surname`, `dob`, `sex`, `telephone`, `mobile`, `idnumber`, `email`, `fax`, `postaladdress`, `streetaddress`, `spousename`, `spousesurname`, `spousedob`, `spousesex`, `spouseidnumber`, `company`, `status`) VALUES
(1, 1, '8002235144086', '1a1dc91c907325c69271ddf0c944bc72', 'Samir', 'Franciscus', '1980-02-23 00:00:00', 'M', '', '', '8002235144086', 'sfranciscus@gmail.com', '', '', '', '', '', '0000-00-00 00:00:00', '', '', '', 1);
