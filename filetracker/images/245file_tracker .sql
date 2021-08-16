-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 07, 2021 at 07:39 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `file_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'From whom it is recived',
  `subject` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `body` text NOT NULL,
  `doc` varchar(255) DEFAULT NULL,
  `des_id` int(11) NOT NULL,
  `status` enum('Pending','Solved') NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`ID`),
  KEY `user_id` (`user_id`),
  KEY `des_id` (`des_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`ID`, `user_id`, `subject`, `date`, `body`, `doc`, `des_id`, `status`) VALUES
(1, 11, 'Students are not In class', '2020-12-24', 'Pakistan lifted the Covid-19 related lockdown on August 10, 2020 after having employed strict to smart lockdown strategies for about five months. From August onward, the reported daily cases of infections remained relatively low until end of November when situation once again started to deteriorate. During these nine months (from March to December) the security landscape of Pakistan did not witness any major shift. However, the frequency and intensity of terrorist attacks slightly increased from May to July, particularly in North Waziristan district of Khyber Pakhtunkhwa and the restive southwestern province of Balochistan. Again, in October, the terrorists stepped up attacks and that trend variably continued until end of December. Throughout these months, violent Sindhi nationalist groups launched several attacks against the security forces in Sindh. Similarly, Baloch insurgent perpetrated some high-impact attacks against security forces in Balochistan; in June, Balochistan Liberation Army (BLA) militants attacked the Pakistan Stock Exchange (PSX) building in Karachi, where law enforcement personnel were alert enough to kill all four attackers; three security guards and one police officer also lost their lives before the attack was successfully foiled. Meanwhile, the Pakistani Taliban groups continued to regroup in erstwhile FATA besides perpetrating some attacks in Rawalpindi, Karachi and Balochistan.', NULL, 1, 'Pending'),
(2, 11, 'I want a day out', '2020-12-24', 'This is something of the other thing', NULL, 1, 'Pending'),
(3, 12, 'I wana learn Maths', '2020-12-24', 'Bilal lkjsdlkjfslkdf', NULL, 2, 'Pending'),
(4, 11, 'dskjfh', '2021-01-04', 'slkdjflkjsdlfkjlsdf', NULL, 1, 'Pending'),
(5, 12, 'dsklfh', '2021-01-04', 'sjdkfhkjsdhkfhkjsdhfkjhkjshdkjfhkjsdhfkjh', NULL, 1, 'Pending'),
(6, 11, 'Classes are late', '2021-01-05', 'Our classes are late please take notice we are so much in worry', NULL, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Dep_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ID`, `Dep_name`, `address`) VALUES
(1, 'Computer science', 'Office #3, CHenab Plaza, Charsadda Road charsadda'),
(2, 'mathes', ''),
(16, 'English', '');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `depart_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `depart_id` (`depart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `desname`, `Email`, `Password`, `depart_id`) VALUES
(1, 'Director', 'directorit@bkuc.com', '123', 1),
(2, 'VC', 'vcit@bkuc.com', '123', 1),
(3, 'hostel warden', 'wardanit@bkuc.com', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forwarding`
--

DROP TABLE IF EXISTS `forwarding`;
CREATE TABLE IF NOT EXISTS `forwarding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `to_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forwarding`
--

INSERT INTO `forwarding` (`id`, `application_id`, `from_id`, `remarks`, `to_id`, `timestamp`) VALUES
(1, 1, 1, 'this is not my work', 2, '2021-01-07 07:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Father_name` varchar(255) NOT NULL,
  `Cinc` varchar(17) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `User_name`, `Email`, `Password`, `Father_name`, `Cinc`, `Phone`, `occupation`) VALUES
(11, 'Shah Gee', 'shah@gamil.com', 'Shah123', 'Khan', '14567', '12345', 'Labor'),
(12, 'Hazrat Bilal', 'bilal@bilal.com', 'bilal', 'Shams', '171015325', '334914', 'sds');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_ibfk_3` FOREIGN KEY (`des_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
