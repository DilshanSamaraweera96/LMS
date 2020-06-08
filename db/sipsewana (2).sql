-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 05, 2020 at 05:22 PM
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
(6, 'Raspberry Pi CookBook', 'James Arthur', 'IT', 4, 'English', 'itbook3.jpg', 'itbook31.jpg', 'itbook32.jpg'),
(7, 'Software Engineering', 'Caidin Sadowski', 'IT', 9, 'English', 'itbook4.jpg', 'itbook41.jpg', 'itbook42.png'),
(8, 'Design Patterns in Python', 'Chris Walker', 'IT', 1, 'English', 'itbook5.jpg', 'itbook51.jpg', 'itbook52.png'),
(9, 'Python Design Patterns', 'Ron Wills', 'IT', 8, 'English', 'itbook6.jpg', 'itbook61.png', 'itbook62.png'),
(10, 'Adaptive Code via C#', 'Gary Mclean', 'IT', 4, 'English', 'itbook7.jpg', 'itbook71.jpg', 'itbook72.png'),
(11, 'Jumping Into C++', 'Alex Allain', 'IT', 9, 'English', 'itbook8.jpg', 'itbook81.png', 'itbook82.jpg'),
(12, 'Math Geek', 'Raphael Rosen', 'Mathematics', 7, 'English', 'mathsbook1.jpg', 'mathsbook11.jpg', 'mathsbook12.jpg'),
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
(26, 'The Jewish Revolutionary', 'Michael Jones', 'Other', 0, 'English', 'front1.jpg', 'other21.png', 'other22.png'),
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booknews`
--

INSERT INTO `booknews` (`newsid`, `topic`, `msg`, `cover`, `newsdate`) VALUES
(1, 'RWA retires RITA Awards, debuts the \'Vivian\'', 'The Romance Writers of America will permanently retire its annual RITA Awards, which it has presented annually since 1982, and introduce a new award, the Vivian, named after RWA founder Vivian Stephens.\r\n\r\nThe move to retire the RITAs follows a controversy related to issues of diversity at the organization this winter that saw the resignation of its newly-instated president and its entire board of directors, as well as the cancellation of this year\'s planned RITA Awards ceremony. In January, the RWA announced that it planned to hold the RITAs again \"to celebrate 2019 and 2020 romances\" in 2021.', 'news1.jpg', '2020-05-20 12:47:05'),
(2, 'The story behind â€˜The Great Realisation,â€™ a post-pandemic bedtime tale', 'Before the pandemic, Tomos Roberts read his poems to crowds around London who, he confesses, were often more interested in what they were drinking than what he was saying. Now, hunkered down and out of work, heâ€™s found a far more attentive audience that stretches around the world â€” and includes people who havenâ€™t yet reached drinking age.\r\nRobertsâ€™s poem, â€œThe Great Realisation,â€ was released on YouTube on April 29 and has been viewed tens of millions of times. A simple rhyming tale read as a bedtime story, it takes on heavy themes â€” corporate greed, familial alienation, the pandemic â€” and somehow comes up with a happy ending. Set in an unspecified future, the poem looks back on pre-pandemic life and imagines a â€œgreat realisationâ€ sparked by the scourge.', 'news2.jpg', '2020-05-22 12:47:05'),
(3, 'Colson Whitehead: Black author makes Pulitzer Prize history', 'US author Colson Whitehead has become only the fourth writer ever to win the Pulitzer Prize for fiction twice.The African-American author was honored for The Nickel Boys, which chronicles the abuse of black boys at a juvenile reform school in Florida.\r\nWhitehead, a 50-year-old New Yorker, won the 2017 prize in the same category for his book Underground Railroad. With one for each week, weâ€™ll get to rank up our Rocket Pass 6 with a twist. The four modes to be introduced are Dropshot Rumble, Beach Ball, Boomer Ball, and Rocket Leagueâ€™s latest addition (and casualty), Heatseeker.Before him, only Booth Tarkington, William Faulkner and John Updike had won the Pulitzer for fiction twice.', 'news3.jpg', '2020-05-25 12:47:05'),
(4, 'Marvel Comics AUGUST 2020 Solicitations Cover Gallery', 'Marvel Comics has released its August 2020 solicitations, largely pieced together from titles that were not released in April and May along with titles that were rescheduled from June and July due to comic book distribution interruptions stemming from coronavirus.\r\nAlmost 30 years after the landmark story Future Imperfect, legendary INCREDIBLE HULK scribe Peter David returns to the far-future version of the Hulk known as Maestro â€” the master of what remains of the world. With astounding art from HULK veteran Dale Keown and up-and-comer GermÃ¡n Peralta, Maestro will answer questions that have haunted Hulk fans for years â€” and inspire some new ones.', 'news4.jpg', '2020-05-28 12:47:05'),
(10, 'New book added to the \'cooking\' book collection', 'As Sri Lanka is being rediscovered a travel destination, its varied cuisine is also under the spotlight. As well as absorbing influences from India, the Middle East, Far East Asia and myriad European invaders, the small island also has strong Singhalese and Tamil cooking traditions and this cookbook brings these styles together to showcase the best of the countryâ€™s culinary heritage. Dig into 100 recipes that celebrate the islandâ€™s wonderful ingredients, from okra and jackfruit to coconut and chillies, and explore its culture through original travel photography of the country, its kitchens and its people.', 'cook2.jpg', '2020-06-03 18:42:34');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comid`, `member`, `comment`, `comdate`) VALUES
(1, 'hashan hirapitya', 'This is the best online library website I ever visited.', '2020-06-02 16:01:57'),
(2, 'Deshani Surangika', 'This is the only  library which has this online website support  in our area.This is a really good work.Keep it up.', '2020-06-03 13:29:25'),
(3, 'pasidu kaushalya', 'This is a good website.', '2020-06-04 16:55:27'),
(4, 'ADMIN', 'Thanks All of Your Support.', '2020-06-04 17:19:39');

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
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuebook`
--

INSERT INTO `issuebook` (`issueid`, `memberid`, `bookid`, `issuedate`, `collectdate`, `returndate`, `completedate`, `fine`, `payday`) VALUES
(34, 10, 6, '2020-06-02', '2020-06-05', '2020-05-23', NULL, 65, NULL),
(16, 7, 28, '2020-06-08', '2020-06-11', '2020-06-03', '2020-06-29', 130, '2020-05-29'),
(32, 7, 26, '2020-06-08', '2020-06-11', '2020-06-25', NULL, NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=403 DEFAULT CHARSET=latin1;

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
(23, NULL, NULL, 'You have only one more to collect your issued book.', 9, NULL),
(399, 7, 28, 'You didnt return the book within given time.Penalty will be charged now.', NULL, '2020-06-04 20:21:34'),
(400, 7, 8, 'You only have one more day to collect your book.', NULL, '2020-06-04 20:21:34'),
(396, NULL, NULL, 'Today is the last day to collect your book.', 10, NULL),
(397, 1111111111, 1111111111, '111111111111111111111111111111111111111111111111111111111111111111111111111', 1111111111, NULL),
(402, 7, NULL, 'Reservation removed because collect date expired.', NULL, '2020-06-05 02:08:53'),
(401, 7, 8, 'Today is the last day to collect your book.', NULL, '2020-06-04 20:45:06');

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
(21, 'manuka pramod', 'thelwaththa,colombo', 'manuka@gmail.com', 714567890, 'manuka'),
(22, 'Bhagya Udathari', 'ovitigala,mathugama', 'bhagya@gmail.com', 714861060, 'bhagya');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
