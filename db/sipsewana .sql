-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2020 at 04:11 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addbook`
--

INSERT INTO `addbook` (`book_id`, `title`, `author`, `category`, `quantity`, `language`, `cover`, `firstimage`, `nextimage`) VALUES
(4, 'Artificial Intelligence', 'David L. Poole', 'IT', 8, 'English', 'itbook1.jpg', 'itbook12.jpg', 'itbook123.png'),
(5, 'Learn Html & Css', 'Shay Howe', 'IT', 9, 'English', 'itbook2.jpg', 'itbook21.png', 'itbook22.png'),
(6, 'Raspberry Pi CookBook', 'James Arthur', 'IT', 5, 'English', 'itbook3.jpg', 'itbook31.jpg', 'itbook32.jpg'),
(7, 'Software Engineering', 'Caidin Sadowski', 'IT', 9, 'English', 'itbook4.jpg', 'itbook41.jpg', 'itbook42.png'),
(8, 'Design Patterns in Python', 'Chris Walker', 'IT', 0, 'English', 'itbook5.jpg', 'itbook51.jpg', 'itbook52.png'),
(9, 'Python Design Patterns', 'Ron Wills', 'IT', 8, 'English', 'itbook6.jpg', 'itbook61.png', 'itbook62.png'),
(10, 'Adaptive Code via C#', 'Gary Mclean', 'IT', 4, 'English', 'itbook7.jpg', 'itbook71.jpg', 'itbook72.png'),
(11, 'Jumping Into C++', 'Alex Allain', 'IT', 9, 'English', 'itbook8.jpg', 'itbook81.png', 'itbook82.jpg'),
(12, 'Math Geek', 'Raphael Rosen', 'Mathematics', 6, 'English', 'mathsbook1.jpg', 'mathsbook11.jpg', 'mathsbook12.jpg'),
(13, 'Nature Science', 'Colin Rayman', 'Science', 5, 'English', 'science1.png', 'science11.jpg', 'science12.jpg'),
(14, 'Animal Science', 'Alexandar Wilson', 'Science', 6, 'English', 'science2.jpg', 'science21.jpg', 'science22.jpg'),
(15, 'The Serpent  Secret', 'Sayantani Dasgupta', 'Novel', 4, 'English', 'front2.jpg', 'novel11.jpg', 'novel12.jpg'),
(16, 'Harry Poter', 'J.K. Rowling', 'Novel', 8, 'English', 'front3.jpg', 'novel21.png', 'novel22.png'),
(17, 'Its All In Your Head', 'Keith Blanchard', 'Art', 6, 'English', 'art1.jpg', 'art11.jpg', 'art12.jpg'),
(18, 'Fundamentals of Drawing', 'Barrington Barber', 'Art', 8, 'English', 'art2.jpg', 'art21.jpg', 'art22.jpg'),
(19, 'Einstein', 'Walter Isaacson', 'Biography', 7, 'English', 'bio1.jpg', 'bio11.jpg', 'bio12.jpg'),
(20, 'The Human Anatomy', 'Katelynn D. Harman', 'Health', 7, 'English', 'health1.jpg', 'health11.jpg', 'health12.png'),
(21, 'Golden Soil', 'Rupert McCall', 'Poetry', 5, 'English', 'poetry1.jpg', 'poetry11.jpg', 'poetry12.jpg'),
(22, 'Cook Book', 'Michelin Star', 'Cooking', 7, 'English', 'cook1.png', 'cook11.jpg', 'cook12.png'),
(23, 'Cinderella', 'Barbara Watson', 'Kids', 7, 'English', 'kids1.jpg', 'kids11.png', 'kids12.png'),
(24, 'Think Like A Boss', 'Benjamin Shah', 'Business', 8, 'English', 'business1.jpg', 'business11.png', 'business12.png'),
(25, 'Drugs In Sport', 'Neil Chester', 'Other', 8, 'English', 'other1.jpg', 'other11.png', 'other12.jpg'),
(26, 'The Jewish Revolutionary', 'Michael Jones', 'Other', 6, 'English', 'front1.jpg', 'other21.png', 'other22.png'),
(28, 'Western Country Cook Book', 'Nathan Outlaw', 'Cooking', 1, 'English', 'cook2.jpg', 'cook21.jpg', 'cook22.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

DROP TABLE IF EXISTS `adminlogin`;
CREATE TABLE IF NOT EXISTS `adminlogin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `issuebook`
--

DROP TABLE IF EXISTS `issuebook`;
CREATE TABLE IF NOT EXISTS `issuebook` (
  `issueid` int(11) NOT NULL AUTO_INCREMENT,
  `memberid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `issuedate` date DEFAULT NULL,
  `collectdate` date DEFAULT NULL,
  `returndate` date DEFAULT NULL,
  `completedate` date DEFAULT NULL,
  `fine` float DEFAULT NULL,
  `payday` date DEFAULT NULL,
  PRIMARY KEY (`issueid`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuebook`
--

INSERT INTO `issuebook` (`issueid`, `memberid`, `bookid`, `issuedate`, `collectdate`, `returndate`, `completedate`, `fine`, `payday`) VALUES
(25, 8, 12, '2020-06-03', '2020-06-06', '2020-06-15', NULL, NULL, NULL),
(16, 7, 28, '2020-05-28', '2020-05-31', '2020-06-14', '2020-06-29', 150, '2020-05-29'),
(24, 8, 8, '2020-06-03', '2020-06-06', NULL, NULL, NULL, NULL),
(26, 8, 11, '2020-06-03', '2020-06-06', '2020-06-15', '2020-05-30', NULL, NULL),
(28, 13, 28, '2020-05-29', '2020-06-01', '2020-06-15', '2020-05-30', NULL, NULL),
(32, 7, 6, '2020-05-29', '2020-06-01', '2020-06-15', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `notid` int(11) NOT NULL AUTO_INCREMENT,
  `memberid` int(11) DEFAULT NULL,
  `msg` text NOT NULL,
  `msgid` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`notid`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notid`, `memberid`, `msg`, `msgid`, `date`) VALUES
(1, NULL, 'You collected the issued book.', 1, NULL),
(2, NULL, 'You returned the issued book.', 2, NULL),
(3, NULL, 'You paid the penalty for late return book.', 3, NULL),
(12, NULL, 'Reservation removed because collect date expired.', 5, NULL),
(10, NULL, 'Book were issued for your pending book request.', 4, NULL),
(14, 1111111111, '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 1111111111, NULL),
(21, 8, 'Reservation removed because collect date expired.', NULL, '2020-06-03 14:49:09'),
(22, 8, 'Reservation removed because collect date expired.', NULL, '2020-06-03 14:49:09'),
(23, 13, 'Reservation removed because collect date expired.', NULL, '2020-06-03 14:49:09'),
(24, 8, 'Book were issued for your pending book request.', NULL, '2020-06-03 14:49:09'),
(25, 13, 'Reservation removed because collect date expired.', NULL, '2020-06-03 14:49:09'),
(26, 7, 'Reservation removed because collect date expired.', NULL, '2020-06-03 14:49:09');

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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`mem-id`, `fullname`, `address`, `email`, `phonenumber`, `password`) VALUES
(7, 'Deshani Surangika', 'Horana,Kalutara', 'deshani@gmail.com', 773455678, 'deshani'),
(6, 'hiruni nishadini', 'waththala, gampaha', 'hiruni@gmail.com', 712342134, 'hiruni'),
(8, 'hashan hirapitya', 'angoda, colombo', 'hashan@gmail.com', 765673456, 'hashan'),
(9, 'uditha madusanka', 'kahawaththa,mathale', 'uditha@gmail.com', 713457856, 'uditha'),
(10, 'pasidu kaushalya', 'beruwala,aluthgama', 'pasidu@gmail.com', 716784567, 'pasidu'),
(11, 'sampath udayakumara', 'nagoda,kalutara', 'sampath@gmail.com', 775677890, 'sampath'),
(12, 'anjana sampath', 'benthota,aluthgama', 'anjana@gmail.com', 786784567, 'anjana'),
(13, 'sithara samudiri', 'kiridiwela,mathara', 'sithara@gmail.com', 714565634, 'sithara'),
(14, 'lakshitha pramudith', 'dompe,gampaha', 'lakshitha@gmail.com', 715673412, 'lakshitha'),
(15, 'hoshan dinuk', 'jaela,gampaha', 'hoshan@gmail.com', 775677890, 'hoshan'),
(16, 'yasura malshan', 'mathugama,kalutara', 'yasura@gmail.com', 716784532, 'yasura'),
(17, 'saman kumara', 'koswaththa,rathnapura', 'saman@gmail.com', 787896754, 'saman'),
(18, 'isuru dilshan', 'mathugama,kalutara', 'isuru@gmail.com', 711772177, 'isuru'),
(19, 'hansika priyashani', 'meerigama,gampaha', 'hansika@gmail.com', 785674356, 'hansika'),
(20, 'nuwan perera', 'kakirawa,anuradhapura', 'nuwan@gmail.com', 785673456, 'nuwan'),
(21, 'manuka pramod', 'thelwaththa,colombo', 'manuka@gmail.com', 714567890, 'manuka');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
