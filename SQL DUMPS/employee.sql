-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2014 at 11:41 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ics-lib-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_no` varchar(10) NOT NULL,
  `name_first` varchar(24) NOT NULL,
  `name_middle` varchar(24) NOT NULL,
  `name_last` varchar(24) NOT NULL,
  PRIMARY KEY (`employee_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_no`, `name_first`, `name_middle`, `name_last`) VALUES
('2004133411', 'Derek', 'Dickerson', 'Ochoa'),
('2006112908', 'Uwaisah', 'Mawahib', 'Sidney'),
('2007111543', 'Fenrir', 'Yuan', 'Chuang'),
('2008100180', 'Jesse', 'Anderson', 'Edzer Josh'),
('2008144165', 'Songhak', 'Taong', 'Wei'),
('2009128943', 'Stephanie', 'Fisher', 'Kuefer'),
('2009150411', 'Henry', 'Barker', 'Peterson'),
('2010110290', 'Jordan', 'Lincoln', 'Susan'),
('2010110321', 'Kemployeei', 'Rudd', 'Sutton'),
('2010125011', 'Mancini', 'Davis', 'Sinegal'),
('2010125981', 'David', 'Pierre', 'Kirtley'),
('2010129981', 'Carolyn', 'Carolyn', 'Morrison'),
('2011111341', 'Pruitt', 'Farris', 'Harlan'),
('2011111390', 'Enriqueta', 'Snowden', 'Hooker'),
('2011113575', 'Harding', 'Brandagamba', 'Puddifoot'),
('2011125010', 'Roberts', 'Valentin', 'Padilla'),
('2012134510', 'Barbara', 'Ryan', 'Calleva'),
('2012156916', 'Kamuta', 'Asada', 'Sakiko'),
('2013114344', 'Marshal', 'Kogan', 'Charles'),
('2013133310', 'Richard', 'Emerson', 'Howle');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
