-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 09, 2020 at 05:25 AM
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
  `isbn` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `pages` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `language` text NOT NULL,
  `cover` text NOT NULL,
  `firstimage` text NOT NULL,
  `nextimage` text NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addbook`
--

INSERT INTO `addbook` (`book_id`, `title`, `author`, `category`, `isbn`, `publisher`, `pages`, `quantity`, `language`, `cover`, `firstimage`, `nextimage`) VALUES
(4, 'Artificial Intelligence', 'David L. Poole', 'IT', '9781107195394', 'Pearson Education India, 2005', 435, 8, 'English', 'itbook1.jpg', 'itbook12.jpg', 'itbook123.png'),
(5, 'Learn Html & Css', 'Shay Howe', 'IT', '0133477576', 'New Riders, 2014 ', 304, 9, 'English', 'itbook2.jpg', 'itbook21.png', 'itbook22.png'),
(6, 'Raspberry Pi CookBook', 'James Arthur', 'IT', '9781849696623', 'Packt Publishing Ltd, 2017', 402, 5, 'English', 'itbook3.jpg', 'itbook31.jpg', 'itbook32.jpg'),
(7, 'Software Engineering', 'Caidin Sadowski', 'IT', '1484242211', 'Apress, 2016', 310, 8, 'English', 'itbook4.jpg', 'itbook41.jpg', 'itbook42.png'),
(8, 'Design Patterns in Python', 'Chris Walker', 'IT', '9781788837484', 'Apress, 2017', 248, 1, 'English', 'itbook5.jpg', 'itbook51.jpg', 'itbook52.png'),
(9, 'Python Design Patterns', 'Ron Wills', 'IT', '9781786460677', 'Packt Publishing Ltd, 2018', 286, 8, 'English', 'itbook6.jpg', 'itbook61.png', 'itbook62.png'),
(10, 'Adaptive Code via C#', 'Gary Mclean', 'IT', '9780133979732', 'Microsoft Press, 2015', 448, 4, 'English', 'itbook7.jpg', 'itbook71.jpg', 'itbook72.png'),
(11, 'Jumping Into C++', 'Alex Allain', 'IT', '0988927802', 'Cprogramming, 2014', 516, 9, 'English', 'itbook8.jpg', 'itbook81.png', 'itbook82.jpg'),
(12, 'Math Geek', 'Raphael Rosen', 'Mathematics', '1440583811', 'Simon and Schuster, 2016', 256, 7, 'English', 'mathsbook1.jpg', 'mathsbook11.jpg', 'mathsbook12.jpg'),
(13, 'Nature Science', 'Colin Rayman', 'Science', '0415070147', 'Psychology Press, 2012', 310, 5, 'English', 'science1.png', 'science11.jpg', 'science12.jpg'),
(14, 'Animal Science', 'Alexandar Wilson', 'Science', '1428361278', 'Cengage Learning, 2005', 448, 6, 'English', 'science2.jpg', 'science21.jpg', 'science22.jpg'),
(15, 'The Serpent  Secret', 'Sayantani Dasgupta', 'Novel', '1338185721', 'Scholastic Incorporated, 2011', 368, 4, 'English', 'front2.jpg', 'novel11.jpg', 'novel12.jpg'),
(16, 'Harry Poter', 'J.K. Rowling', 'Novel', '1408855658', 'Bloomsbury USA, 2014', 352, 8, 'English', 'front3.jpg', 'novel21.png', 'novel22.png'),
(17, 'Its All In Your Head', 'Keith Blanchard', 'Art', '9780692918234', 'Wicked Cow Studios, 2017', 208, 6, 'English', 'art1.jpg', 'art11.jpg', 'art12.jpg'),
(18, 'Fundamentals of Drawing', 'Barrington Barber', 'Art', '1848584105', 'Arcturus Publishing, 2005', 267, 8, 'English', 'art2.jpg', 'art21.jpg', 'art22.jpg'),
(19, 'Einstein', 'Walter Isaacson', 'Biography', '0313330808', 'Greenwood Publishing Group, 2005', 161, 7, 'English', 'bio1.jpg', 'bio11.jpg', 'bio12.jpg'),
(20, 'The Human Anatomy', 'Katelynn D. Harman', 'Health', '9781647645519', 'Knowledge Flow, 2014', 100, 7, 'English', 'health1.jpg', 'health11.jpg', 'health12.png'),
(21, 'Golden Soil', 'Rupert McCall', 'Poetry', '1647645514', 'Rupert McCall, 2019', 156, 5, 'English', 'poetry1.jpg', 'poetry11.jpg', 'poetry12.jpg'),
(22, 'Cook Book', 'Michelin Star', 'Cooking', '1625817887', 'Rose Publishing Company, 1877', 384, 7, 'English', 'cook1.png', 'cook11.jpg', 'cook12.png'),
(23, 'Cinderella', 'Barbara Watson', 'Kids', '1625814569', 'Twin Sisters, 2017', 24, 7, 'English', 'kids1.jpg', 'kids11.png', 'kids12.png'),
(24, 'Think Like A Boss', 'Benjamin Shah', 'Business', '	1708780963', 'Independently Published, 2019', 157, 8, 'English', 'business1.jpg', 'business11.png', 'business12.png'),
(25, 'Drugs In Sport', 'Neil Chester', 'Other', '1351838989', 'Taylor & Francis, 2018', 430, 8, 'English', 'other1.jpg', 'other11.png', 'other12.jpg'),
(26, 'The Jewish Revolutionary', 'Michael Jones', 'Other', '0929891074', 'Fidelity Press, 2008', 1200, 5, 'English', 'front1.jpg', 'religious11.png', 'religious12.png');

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
-- Table structure for table `booknews`
--

DROP TABLE IF EXISTS `booknews`;
CREATE TABLE IF NOT EXISTS `booknews` (
  `newsid` int(11) NOT NULL AUTO_INCREMENT,
  `topic` text NOT NULL,
  `msg` text NOT NULL,
  `cover` text NOT NULL,
  `newsdate` datetime DEFAULT NULL,
  PRIMARY KEY (`newsid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booknews`
--

INSERT INTO `booknews` (`newsid`, `topic`, `msg`, `cover`, `newsdate`) VALUES
(1, 'RWA retires RITA Awards, debuts the \'Vivian\'', 'The Romance Writers of America will permanently retire its annual RITA Awards, which it has presented annually since 1982, and introduce a new award, the Vivian, named after RWA founder Vivian Stephens.\r\n\r\nThe move to retire the RITAs follows a controversy related to issues of diversity at the organization this winter that saw the resignation of its newly-instated president and its entire board of directors, as well as the cancellation of this year\'s planned RITA Awards ceremony. In January, the RWA announced that it planned to hold the RITAs again \"to celebrate 2019 and 2020 romances\" in 2021.', 'news1.jpg', '2020-05-20 12:47:05'),
(2, 'The story behind â€˜The Great Realisation,â€™ a post-pandemic bedtime tale', 'Before the pandemic, Tomos Roberts read his poems to crowds around London who, he confesses, were often more interested in what they were drinking than what he was saying. Now, hunkered down and out of work, heâ€™s found a far more attentive audience that stretches around the world â€” and includes people who havenâ€™t yet reached drinking age.\r\nRobertsâ€™s poem, â€œThe Great Realisation,â€ was released on YouTube on April 29 and has been viewed tens of millions of times. A simple rhyming tale read as a bedtime story, it takes on heavy themes â€” corporate greed, familial alienation, the pandemic â€” and somehow comes up with a happy ending. Set in an unspecified future, the poem looks back on pre-pandemic life and imagines a â€œgreat realisationâ€ sparked by the scourge.', 'news2.jpg', '2020-05-22 12:47:05'),
(3, 'Colson Whitehead: Black author makes Pulitzer Prize history', 'US author Colson Whitehead has become only the fourth writer ever to win the Pulitzer Prize for fiction twice.The African-American author was honored for The Nickel Boys, which chronicles the abuse of black boys at a juvenile reform school in Florida.\r\nWhitehead, a 50-year-old New Yorker, won the 2017 prize in the same category for his book Underground Railroad. With one for each week, weâ€™ll get to rank up our Rocket Pass 6 with a twist. The four modes to be introduced are Dropshot Rumble, Beach Ball, Boomer Ball, and Rocket Leagueâ€™s latest addition (and casualty), Heatseeker.Before him, only Booth Tarkington, William Faulkner and John Updike had won the Pulitzer for fiction twice.', 'news3.jpg', '2020-05-25 12:47:05'),
(4, 'Marvel Comics AUGUST 2020 Solicitations Cover Gallery', 'Marvel Comics has released its August 2020 solicitations, largely pieced together from titles that were not released in April and May along with titles that were rescheduled from June and July due to comic book distribution interruptions stemming from coronavirus.\r\nAlmost 30 years after the landmark story Future Imperfect, legendary INCREDIBLE HULK scribe Peter David returns to the far-future version of the Hulk known as Maestro â€” the master of what remains of the world. With astounding art from HULK veteran Dale Keown and up-and-comer GermÃ¡n Peralta, Maestro will answer questions that have haunted Hulk fans for years â€” and inspire some new ones.', 'news4.jpg', '2020-05-28 12:47:05'),
(11, 'New book added to the \'cooking\' book collection', 'As Sri Lanka is being rediscovered a travel destination, its varied cuisine is also under the spotlight. As well as absorbing influences from India, the Middle East, Far East Asia and myriad European invaders, the small island also has strong Singhalese and Tamil cooking traditions and this cookbook brings these styles together to showcase the best of the countryâ€™s culinary heritage. Dig into 100 recipes that celebrate the islandâ€™s wonderful ingredients, from okra and jackfruit to coconut and chillies, and explore its culture through original travel photography of the country, its kitchens and its people.', 'cook2.jpg', '2020-06-09 04:28:50');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_from` varchar(255) NOT NULL,
  `msg_to` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `date` datetime NOT NULL,
  `seen` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `msg_from`, `msg_to`, `msg`, `date`, `seen`) VALUES
(47, 'hiruni nishadini', 'admin', 'not yet.', '2020-06-09 04:26:53', 'no'),
(46, 'admin', 'hiruni nishadini', 'did you return the book?', '2020-06-09 02:57:13', 'no'),
(45, 'admin', 'Bhagya Udathari', 'I Love You', '2020-06-08 05:33:33', 'no'),
(41, 'admin', 'hashan hirapitya', 'did you eat dinner', '2020-06-07 23:16:01', 'no'),
(42, 'admin', 'hiruni nishadini', 'how about today', '2020-06-08 00:09:03', 'no'),
(43, 'admin', 'hiruni nishadini', 'good morning', '2020-06-08 04:15:45', 'no'),
(44, 'hiruni nishadini', 'admin', 'good morning admin', '2020-06-08 05:11:00', 'no'),
(40, 'admin', 'hashan hirapitya', 'whats up', '2020-06-07 19:50:28', 'no'),
(39, 'admin', 'hashan hirapitya', 'hello hashan', '2020-06-07 19:50:19', 'no'),
(38, 'admin', 'hiruni nishadini', 'hello hiruni', '2020-06-07 19:48:14', 'no'),
(37, 'hiruni nishadini', 'admin', 'hello sir', '2020-06-07 19:13:42', 'no'),
(35, 'admin', 'hiruni nishadini', 'Hello admin', '2020-06-07 19:04:58', 'no'),
(36, 'hiruni nishadini', 'admin', 'hello admin', '2020-06-07 19:11:05', 'no'),
(34, 'admin', 'hiruni nishadini', 'Hello admin', '2020-06-07 19:04:22', 'no'),
(33, 'admin', 'hiruni nishadini', 'can i request book?', '2020-06-07 03:44:42', 'no'),
(32, 'admin', 'hiruni nishadini', 'hello', '2020-06-07 03:27:32', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comid` int(11) NOT NULL AUTO_INCREMENT,
  `member` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `comdate` datetime NOT NULL,
  PRIMARY KEY (`comid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comid`, `member`, `comment`, `comdate`) VALUES
(1, 'hashan hirapitya', 'This is the best online library website I ever visited.', '2020-06-02 16:01:57'),
(2, 'Deshani Surangika', 'This is the only  library which has this online website support  in our area.This is a really good work.Keep it up.', '2020-06-03 13:29:25'),
(3, 'pasidu kaushalya', 'This is a good website.', '2020-06-04 16:55:27'),
(4, 'ADMIN', 'Thanks All of Your Support.', '2020-06-04 17:19:39'),
(5, 'hiruni nishadini', 'Thanks for letting us to use this free service.', '2020-06-09 03:07:52'),
(6, 'ADMIN', 'Appreciate your feedback.', '2020-06-09 03:55:35');

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
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuebook`
--

INSERT INTO `issuebook` (`issueid`, `memberid`, `bookid`, `issuedate`, `collectdate`, `returndate`, `completedate`, `fine`, `payday`) VALUES
(34, 10, 6, '2020-05-06', '2020-05-09', '2020-05-23', NULL, 85, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `notid` int(11) NOT NULL AUTO_INCREMENT,
  `memberid` int(11) DEFAULT NULL,
  `bookid` int(11) DEFAULT NULL,
  `msg` text NOT NULL,
  `msgid` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`notid`)
) ENGINE=MyISAM AUTO_INCREMENT=423 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notid`, `memberid`, `bookid`, `msg`, `msgid`, `date`) VALUES
(1, NULL, NULL, 'You collected the issued book.', 1, NULL),
(2, NULL, NULL, 'You returned the issued book.', 2, NULL),
(3, NULL, NULL, 'You paid the penalty for late return book.', 3, NULL),
(12, NULL, NULL, 'Reservation removed because collect date expired.', 5, NULL),
(10, NULL, NULL, 'Book is issued for your pending book request.', 4, NULL),
(14, NULL, NULL, 'You have ONLY 3days left to return the book.', 6, NULL),
(21, NULL, NULL, 'You didnt return the book within given time.Penalty will be charged now.', 7, NULL),
(22, NULL, NULL, 'Today is the Last day to return your issued book.', 8, NULL),
(23, NULL, NULL, 'You have only one day to collect your issued book.', 9, NULL),
(419, 7, NULL, 'You returned the issued book.', NULL, '2020-07-07 05:02:53'),
(418, 7, NULL, 'You collected the issued book.', NULL, '2020-07-07 05:02:42'),
(417, 7, 47, 'You have only one day to collect your issued book.', NULL, '2020-07-07 05:02:34'),
(420, 7, NULL, 'You returned the issued book.', NULL, '2020-07-07 05:07:08'),
(421, 7, NULL, 'You paid the penalty for late return book.', NULL, '2020-07-07 05:07:13'),
(414, 7, NULL, 'Book is issued for your pending book request.', NULL, '2020-07-05 04:57:14'),
(422, 15, NULL, 'You paid the penalty for late return book.', NULL, '2020-07-07 05:13:09'),
(409, 8, NULL, 'Reservation removed because collect date expired.', NULL, '2020-06-13 04:50:50'),
(404, 10, NULL, 'You paid the penalty for late return book.', NULL, '2020-06-09 03:54:07'),
(403, 10, NULL, 'You returned the issued book.', NULL, '2020-06-09 03:51:15'),
(407, 8, 47, 'Today is the last day to collect your book.', NULL, '2020-06-12 04:50:25'),
(396, NULL, NULL, 'Today is the last day to collect your book.', 10, NULL),
(397, 1111111111, 1111111111, '111111111111111111111111111111111111111111111111111111111111111111111111111', 1111111111, NULL),
(405, 8, NULL, 'Book is issued for your pending book request.', NULL, '2020-06-09 04:45:25'),
(406, 8, 47, 'You have only one more to collect your issued book.', NULL, '2020-06-11 04:47:48');

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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`mem-id`, `fullname`, `address`, `email`, `phonenumber`, `password`) VALUES
(7, 'Deshani Surangika', 'Horana,Kalutara', 'deshani@gmail.com', 773455678, 'deshani'),
(6, 'hiruni nishadini', 'waththala, gampaha', 'hiruni@gmail.com', 712342134, 'hiruni'),
(8, 'hashan hirapitya', 'angoda, colombo', 'hashan@gmail.com', 765673456, 'hashan'),
(9, 'uditha madusanka', 'kahawaththa,mathale', 'uditha@gmail.com', 713457856, 'uditha'),
(10, 'pasidu kaushalya', 'beruwala,aluthgama', 'pasidu@gmail.com', 716784567, 'pasidu'),
(12, 'anjana sampath', 'benthota,aluthgama', 'anjana@gmail.com', 786784567, 'anjana'),
(13, 'sithara samudiri', 'kiridiwela,mathara', 'sithara@gmail.com', 714565634, 'sithara'),
(14, 'lakshitha pramudith', 'dompe,gampaha', 'lakshitha@gmail.com', 715673412, 'lakshitha'),
(15, 'hoshan dinuk', 'jaela,gampaha', 'hoshan@gmail.com', 775677890, 'hoshan'),
(16, 'yasura malshan', 'mathugama,kalutara', 'yasura@gmail.com', 716784532, 'yasura'),
(17, 'saman kumara', 'koswaththa,rathnapura', 'saman@gmail.com', 787896754, 'saman'),
(18, 'isuru dilshan', 'mathugama,kalutara', 'isuru@gmail.com', 711772177, 'isuru'),
(19, 'hansika priyashani', 'meerigama,gampaha', 'hansika@gmail.com', 785674356, 'hansika'),
(20, 'nuwan perera', 'kakirawa,anuradhapura', 'nuwan@gmail.com', 785673456, 'nuwan'),
(21, 'manuka pramod', 'thelwaththa,colombo', 'manuka@gmail.com', 714567890, 'manuka'),
(22, 'Bhagya Udathari', 'ovitigala,mathugama', 'bhagya@gmail.com', 714861060, 'bhagya');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
