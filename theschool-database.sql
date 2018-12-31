-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2018 at 12:03 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `role` varchar(20) NOT NULL,
  `phone` int(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `name`, `role`, `phone`, `email`, `password`) VALUES
(1, 'Roye', 'owner', 546792567, 'royekott@gmail.com', '123'),
(5, 'Coral', 'sales', 544258567, 'coca@gmail.com', '456456'),
(4, 'Lior', 'manager', 544849567, 'lior@gmail.com', '12345'),
(6, 'Jhon', 'manager', 48217220, 'jhon@gmai.com', '456456'),
(7, 'Tom', 'sales', 50884665, 'tom@gmail.com', '789789');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `name` varchar(40) NOT NULL,
  `description` varchar(400) NOT NULL,
  `image` varchar(250) NOT NULL,
  `student` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`name`, `description`, `image`, `student`) VALUES
('English', 'ABA Englishâ€™s English course also contains video classes created to speed up and consolidate the process of learning English grammar. The best American and British Academy teachers will explain to you, via very entertaining videos, English grammar. There are 144 video classes, one for every unit: with each video class you will learn a different grammatical function.', '../root/english.jpg', 'Kobe, Labron.'),
('Math', 'Get introductions to algebra, geometry, trigonometry, precalculus and calculus or get help with current math coursework and AP exam preparation. Select a course to learn more. ', '../root/math.jpg', 'Al, Klay, Antony.'),
('Chemistry', 'Chemistry is the study of atoms and molecules and their interactions. Chemistry studies the reactions and physical changes that occur when compounds are created or transformed. Sub-disciplines of chemistry include organic chemistry, inorganic chemistry, analytical chemistry and physical chemistry.', '../root/chemistry.jpg', 'Kevin, Steph.'),
('Biology', 'Biology, defined as the scientific study of life, is an incredibly broad and diverse field. In many ways, it is as kaleidoscopic and rich as living organisms themselves.', '../root/Biology.jpg', 'Klay, Al, Antony.'),
('Science', '  Science is the concerted human effort to understand, or to understand better, the history of the natural world and how the natural world works, with observable physical evidence as the basis of that understanding.', '../root/science.jpg', 'Labron, Steph, Al, Demar.');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `phone` int(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `course` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `phone`, `email`, `image`, `course`) VALUES
(15, 'Al Horford', 54888888, 'al@gmail.com', '../root/al.png', 'Math, Biology, Science'),
(16, 'Demar Derozen', 54999999, 'demar@gmail.com', '../root/demar.png', 'Science'),
(13, 'Kobe Bryant', 54666666, 'kobe@gmail.com', '../root/kobe.png', 'English.'),
(14, 'Antony Davis', 54777777, 'antony@gmail.com', '../root/antony.png', 'Biology, Math'),
(11, 'Klay Thompson', 54444444, 'klay@gmail.com', '../root/klay.png', 'Math, Biology'),
(12, 'Kevin', 5455555, 'kyrie@gmail.com', '../root/kyrie.jpg', 'Chemistry'),
(8, 'Labron', 54111111, 'labron@gmail.com', '../root/labron.png', 'English, Science'),
(9, 'Steph', 54222222, 'steph@gmail.com', '../root/steph.png', 'Chemistry'),
(10, 'Kevin', 54333333, 'kevin@gmail.com', '../root/kevin.jpg', 'Chemistry');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
