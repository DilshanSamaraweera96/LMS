-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 24, 2020 at 05:35 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipsewana`
--

-- --------------------------------------------------------

--
-- Table structure for table `addbook`
--

DROP TABLE IF EXISTS `addbook`;
CREATE TABLE IF NOT EXISTS `addbook` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `category` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `language` text NOT NULL,
  `cover` text NOT NULL,
  `firstimage` text NOT NULL,
  `nextimage` text NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addbook`
--

INSERT INTO `addbook` (`book_id`, `title`, `author`, `category`, `quantity`, `language`, `cover`, `firstimage`, `nextimage`) VALUES
(4, 'Artificial Intelligence', 'David L. Poole', 'IT', 8, 'English', 'itbook1.jpg', 'itbook12.jpg', 'itbook123.png'),
(5, 'Learn Html & Css', 'Shay Howe', 'IT', 9, 'English', 'itbook2.jpg', 'itbook21.png', 'itbook22.png'),
(6, 'Raspberry Pi CookBook', 'James Arthur', 'IT', 7, 'English', 'itbook3.jpg', 'itbook31.jpg', 'itbook32.jpg'),
(7, 'Software Engineering', 'Caidin Sadowski', 'IT', 9, 'English', 'itbook4.jpg', 'itbook41.jpg', 'itbook42.png'),
(8, 'Design Patterns in Python', 'Chris Walker', 'IT', 6, 'English', 'itbook5.jpg', 'itbook51.jpg', 'itbook52.png'),
(9, 'Python Design Patterns', 'Ron Wills', 'IT', 8, 'English', 'itbook6.jpg', 'itbook61.png', 'itbook62.png'),
(10, 'Adaptive Code via C#', 'Gary Mclean', 'IT', 4, 'English', 'itbook7.jpg', 'itbook71.jpg', 'itbook72.png'),
(11, 'Jumping Into C++', 'Alex Allain', 'IT', 6, 'English', 'itbook8.jpg', 'itbook81.png', 'itbook82.jpg'),
(12, 'Math Geek', 'Raphael Rosen', 'Mathematics', 7, 'English', 'mathsbook1.jpg', 'mathsbook11.jpg', 'mathsbook12.jpg'),
(13, 'Nature Science', 'Colin Rayman', 'Science', 5, 'English', 'science1.png', 'science11.jpg', 'science12.jpg'),
(14, 'Animal Science', 'Alexandar Wilson', 'Science', 6, 'English', 'science2.jpg', 'science21.jpg', 'science22.jpg'),
(15, 'The Serpent  Secret', 'Sayantani Dasgupta', 'Novel', 5, 'English', 'front2.jpg', 'novel11.jpg', 'novel12.jpg'),
(16, 'Harry Poter', 'J.K. Rowling', 'Novel', 8, 'English', 'front3.jpg', 'novel21.png', 'novel22.png'),
(17, 'Its All In Your Head', 'Keith Blanchard', 'Art', 6, 'English', 'art1.jpg', 'art11.jpg', 'art12.jpg'),
(18, 'Fundamentals of Drawing', 'Barrington Barber', 'Art', 6, 'English', 'art2.jpg', 'art21.jpg', 'art22.jpg'),
(19, 'Einstein', 'Walter Isaacson', 'Biography', 7, 'English', 'bio1.jpg', 'bio11.jpg', 'bio12.jpg'),
(20, 'The Human Anatomy', 'Katelynn D. Harman', 'Health', 7, 'English', 'health1.jpg', 'health11.jpg', 'health12.png'),
(21, 'Golden Soil', 'Rupert McCall', 'Poetry', 5, 'English', 'poetry1.jpg', 'poetry11.jpg', 'poetry12.jpg'),
(22, 'Cook Book', 'Michelin Star', 'Cooking', 7, 'English', 'cook1.png', 'cook11.jpg', 'cook12.png'),
(23, 'Cinderella', 'Barbara Watson', 'Kids', 7, 'English', 'kids1.jpg', 'kids11.png', 'kids12.png'),
(24, 'Think Like A Boss', 'Benjamin Shah', 'Business', 8, 'English', 'business1.jpg', 'business11.png', 'business12.png'),
(25, 'Drugs In Sport', 'Neil Chester', 'Other', 8, 'English', 'other1.jpg', 'other11.png', 'other12.jpg'),
(26, 'The Jewish Revolutionary', 'Michael Jones', 'Other', 6, 'English', 'front1.jpg', 'other21.png', 'other22.png'),
(27, 'Western Country Cook Book', 'Nathan Outlaw', 'Cooking', 3, 'English', 'cook2.jpg', 'cook21.jpg', 'cook22.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `issuebook`
--

DROP TABLE IF EXISTS `issuebook`;
CREATE TABLE IF NOT EXISTS `issuebook` (
  `issue_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `issuedate` date NOT NULL,
  `returndate` date NOT NULL,
  `collect` tinyint(1) NOT NULL,
  PRIMARY KEY (`issue_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

DROP TABLE IF EXISTS `user_register`;
CREATE TABLE IF NOT EXISTS `user_register` (
  `mem-id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`mem-id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`mem-id`, `fullname`, `address`, `email`, `phonenumber`, `password`) VALUES
(1, 'hiruni', 'No.359/A,Palekkanda,Nauththuduwa,Mathugama.', 'vhasaral@gmail.com', 711772166, 'abcd'),
(3, 'sasada herath', 'No.359/A,Palekkanda,Nauththuduwa,Mathugama.', 'sunil@gmail.com', 772132123, 'azaz'),
(4, 'hashan hirapitya', 'No.359/A,Palekkanda,Nauththuduwa,Mathugama.', 'call@gmail.com', 743523476, 'qaqa'),
(5, 'sharuk khan', 'No.359/A,Palekkanda,Nauththuduwa,Mathugama.', 'call@gmail.com', 758456364, 'asdf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
