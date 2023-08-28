-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2018 at 11:17 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodbank`
--

CREATE TABLE IF NOT EXISTS `bloodbank` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `location` varchar(30) NOT NULL,
  `BloodQuantity` int(50) NOT NULL,
  `BBname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `bloodbank`
--

INSERT INTO `bloodbank` (`id`, `location`, `BloodQuantity`, `BBname`) VALUES
(1, 'Mombasa', 10, ' Mombasa County Hospital'),
(2, 'Embu ', 200, 'Embu County Hospital'),
(3, 'Kisumu', 300, 'Jaramogi Oginga Odinga Referral Hospital'),
(4, 'Nakuru ', 600, 'Nakuru County Hospital'),
(5, 'Eldoret', 650, 'Moi Referral Hospital, Along Nandi Road');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE IF NOT EXISTS `donation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `age` int(30) NOT NULL,
  `homeaddress` text NOT NULL,
  `mobileno` int(30) NOT NULL,
  `gender` text NOT NULL,
  `emailaddress` varchar(30) NOT NULL,
  `bloodgroup` varchar(20) NOT NULL,
  `quantity` int(40) NOT NULL,
  `date` date NOT NULL,
  `BBname` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`ID`, `username`, `password`, `age`, `homeaddress`, `mobileno`, `gender`, `emailaddress`, `bloodgroup`, `quantity`, `date`, `BBname`) VALUES
(1, 'victor', '', 54, 'MOMBASA', 721786578, 'male', 'victormule@gmail.com', 'A', 30, '0000-00-00', 'mombasa county hospital'),
(2, 'mose kioko', '', 25, 'nakuru', 745674324, 'male', 'mosekioko@gmail.com', 'B', 15, '0000-00-00', 'Nakuru County Hospital'),
(3, 'nadia ochuku', '', 35, 'nairobi', 756346754, 'female', 'nadiaochuku@gmail.com', 'A', 34, '0000-00-00', 'nairobi'),
(4, 'mary nekesa', '', 34, 'mombasa', 74523421, 'female', 'marynekesa@gmail.com', 'B', 10, '0000-00-00', 'mombsa county hospital'),
(5, 'cynthia achieng', '', 34, 'embu', 734567426, 'female', 'cynthiaachieng@gmail.com', 'AB', 10, '0000-00-00', 'Embu County Hospital'),
(6, 'moses ochieng', '', 38, 'nakuru', 734567429, 'male', 'mosesochieng@gmail.com', 'AB', 15, '0000-00-00', 'Nakuru County Hospital'),
(7, 'kelvinngetich', '', 23, 'eldoret', 724232235, 'male', 'kelvinngetich@gmail.com', 'O', 10, '0000-00-00', ' Moi Teaching and Referral Hos'),
(8, 'hassanomar', '', 28, 'mombasa', 714457018, 'male', 'hassanomar@gmail.com', 'O', 15, '0000-00-00', 'mombasa county hospital'),
(9, 'kelvinomolo', '', 34, 'nakuru', 739567425, 'male', 'kelvinomolo@gmail.com', 'AB', 18, '0000-00-00', 'nakuru county hospital');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE IF NOT EXISTS `donors` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL,
  `age` int(20) NOT NULL,
  `homeaddress` varchar(50) NOT NULL,
  `mobileno` int(30) NOT NULL,
  `gender` text NOT NULL,
  `emailaddress` varchar(30) NOT NULL,
  `bloodgroup` varchar(30) NOT NULL,
  `Bloodbank` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`ID`, `username`, `password`, `age`, `homeaddress`, `mobileno`, `gender`, `emailaddress`, `bloodgroup`, `Bloodbank`) VALUES
(1, 'vinny motanya', 'kelvin', 89, 'nakuru', 721668260, 'male', 'kelvinkasyoki@yahoo.com', 'B', 'KISUMU CENTER'),
(2, 'mary okumu', '', 56, 'kisumu', 2147483647, 'female', 'maryokumu@gmail.com', 'AB', 'NAIROBI'),
(3, 'melvin okech', '', 34, 'kiaale', 2147483647, 'male', 'melvinokech@gmail.com', 'A', 'Mombasa RBTC, Mzizima Road, Mo'),
(4, 'prisca omolo', '', 23, 'nakuru', 2147483647, 'female', 'priscaomolo@gmail.com', 'AB', ' Nakuru County Hospital'),
(5, 'racheal onyamgo', '', 67, 'mombasa', 7456789, 'female', 'rachealonyamgo@gmail.com', 'A', 'Embu County Hospital'),
(6, 'kelvin', '', 23, 'kisumu', 721668260, 'male', 'kelvinkasyoki@yahoo.com', 'A', ''),
(7, 'paul', '', 56, 'nairobi', 734561234, 'male', 'paulmusyimi@gmail.com', 'B', 'kisumu'),
(8, 'michealwere', '', 23, '', 722610385, 'male', 'michealwere@gmail.com', 'A', 'embu'),
(9, 'chris masila', '', 35, '', 714007010, 'male', 'chrismasila@gmail.com', 'O', 'mombasa'),
(10, 'sebastianmakau', '', 40, '', 723675412, 'male', 'sebastianmakau', 'O', 'nairobi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `age` int(30) NOT NULL,
  `emailaddress` varchar(30) NOT NULL,
  `phoneno` int(30) NOT NULL,
  `gender` text NOT NULL,
  `bloodgroup` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(30) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `UserLevel` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstname`, `lastname`, `username`, `password`, `UserLevel`) VALUES
(2, 'kelvin', 'muchokii', 'kelvinmuchoki', '', 0),
(3, 'vincent', 'motanya', 'vinny', 'vinny', 0),
(4, 'adminfirstname', 'adminlastname', 'admin', 'test', 1),
(5, 'melvin', 'kasyoki', 'melvin', 'melvin34', 0),
(6, 'vinkel', 'kasyoki', 'vinkelly', 'vinkel', 0),
(7, 'pascal', 'muendo', 'pascal', 'pascal34', 0),
(8, 'victor', 'ochieng', 'victor', 'victor@ochieng', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
