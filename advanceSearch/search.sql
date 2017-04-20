-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2017 at 02:22 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Darren Shan'),
(2, 'M.R. James'),
(3, 'Stephanie Meyer'),
(4, 'Nora Roberts');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `date_released` date NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `isbn`, `title`, `description`, `category`, `price`, `date_released`, `date_added`) VALUES
(1, '1405678151', 'Ghost Stories', 'This is the second collection of chilling ghost stories by M. R. James. \\A Warning to the Curious\\ features a young man who excavates an ancient crown - but soon wishes he had let it stay buried. In \\The Mezzotint\\ an engraving of a manor house reveals more than first meets the eye, while in \\The Stalls of Barchester Cathedral\\, an archdeacon\'\'\'\'s journal reveals the strange circumstances that led to his death. The final story, \\A Neighbour\'\'\'\'s Landmark\\, tells of a gentleman whose curiosity is piqued by a strange rhyme, leading him to take a walk through Betton Woods...Read by BAFTA and Emmy-award winning actor Derek Jacobi (\\Cadfael\\, \\Gosford Park\\, \\Doctor Who\\), and with eerie, evocative music, these four haunting stories will thrill anyone who loves to be terrified.', 4, '6.99', '2017-03-01', '2017-03-01 00:00:00'),
(2, '0007260342', 'Hell\'\'s Heroes', 'The final dramatic conclusion to Darren Shan\'\'\'\'s international phenomena, The Demonata. Expect the unexpected! The final dramatic conclusion to Darren Shan\'\'\'\'s international phenomena, The Demonata. Expect the unexpected!', 4, '6.49', '2017-03-07', '2017-03-22 00:00:00'),
(3, '1904233651', 'Twilight', 'When 17 year old Isabella Swan moves to Forks, Washington to live with her father she expects that her new life will be as dull as the town. But in spite of her awkward manner and low expectations, she finds that her new classmates are drawn to this pale, dark-haired new girl in town. But not, it seems, the Cullen family. These five adopted brothers and sisters obviously prefer their own company and will make no exception for Bella. Bella is convinced that Edward Cullen in particular hates her, but she feels a strange attraction to him, although his hostility makes her feel almost physically ill. He seems determined to push her away ? until, that is, he saves her life from an out of control car. Bella will soon discover that there is a very good reason for Edward\'\'\'\'s coldness. He, and his family, are vampires ? and he knows how dangerous it is for others to get too close.', 1, '3.49', '2017-03-05', '2017-03-15 00:00:00'),
(4, '074992926X', 'Black Hills', 'Lil Chance fell in love with Cooper Sullivan pretty much the first time she saw him, an awkward teenager staying with his grandparents on their cattle ranch in South Dakota while his parents went through a messy divorce. Each year, with Coop\'\'\'\'s annual summer visit, their friendship deepens - but then abruptly ends. Twelve years later and Cooper has returned to run the ranch after his grandfather is injured in a fall. Though his touch still haunts her, Lil has let nothing stop her dream of opening the Chance Wildlife Refuge, but something - or someone - has been keeping a close watch. When small pranks escalate into heartless killing, the memory of an unsolved murder in these very hills has Cooper springing to action to keep Lil safe. They both know the dangers that lurk in the wild landscape of the Black Hills. And now they must work together to unearth a killer of twisted and unnatural instincts who has singled them out as prey', 1, '7.19', '2017-03-03', '2017-03-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `books_authors`
--

CREATE TABLE `books_authors` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_authors`
--

INSERT INTO `books_authors` (`book_id`, `author_id`) VALUES
(1, 2),
(1, 3),
(2, 1),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `books_covers`
--

CREATE TABLE `books_covers` (
  `book_id` int(11) NOT NULL,
  `cover_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_covers`
--

INSERT INTO `books_covers` (`book_id`, `cover_id`) VALUES
(1, 2),
(2, 2),
(3, 1),
(3, 2),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `books_languages`
--

CREATE TABLE `books_languages` (
  `book_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_languages`
--

INSERT INTO `books_languages` (`book_id`, `lang_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 3),
(2, 4),
(2, 5),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(4, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `books_locations`
--

CREATE TABLE `books_locations` (
  `book_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_locations`
--

INSERT INTO `books_locations` (`book_id`, `location_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(2, 4),
(3, 1),
(3, 2),
(3, 3),
(3, 5),
(4, 1),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Romance'),
(2, 'Art'),
(3, 'Comedy'),
(4, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `covers`
--

CREATE TABLE `covers` (
  `id` tinyint(1) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `covers`
--

INSERT INTO `covers` (`id`, `name`) VALUES
(1, 'Soft'),
(2, 'Hard');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`) VALUES
(1, 'English'),
(2, 'French'),
(3, 'German'),
(4, 'Spanish'),
(5, 'Italian'),
(6, 'Polish');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`) VALUES
(1, 'London'),
(2, 'Brighton'),
(3, 'Bournemouth'),
(4, 'Portsmouth'),
(5, 'Southampton'),
(6, 'Chichester');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CATEGORY` (`category`) USING BTREE;

--
-- Indexes for table `books_authors`
--
ALTER TABLE `books_authors`
  ADD PRIMARY KEY (`book_id`,`author_id`),
  ADD KEY `FK_BOOK` (`book_id`),
  ADD KEY `FK_AUTHOR` (`author_id`) USING BTREE;

--
-- Indexes for table `books_covers`
--
ALTER TABLE `books_covers`
  ADD PRIMARY KEY (`book_id`,`cover_id`),
  ADD KEY `FK_BOOK` (`book_id`) USING BTREE,
  ADD KEY `FK_COVER` (`cover_id`);

--
-- Indexes for table `books_languages`
--
ALTER TABLE `books_languages`
  ADD PRIMARY KEY (`book_id`,`lang_id`),
  ADD KEY `FK_BOOK` (`book_id`),
  ADD KEY `FK_LANGUAGE` (`lang_id`);

--
-- Indexes for table `books_locations`
--
ALTER TABLE `books_locations`
  ADD PRIMARY KEY (`book_id`,`location_id`),
  ADD KEY `FK_BOOK` (`book_id`),
  ADD KEY `FK_LOCATION` (`location_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `covers`
--
ALTER TABLE `covers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `covers`
--
ALTER TABLE `covers`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);

--
-- Constraints for table `books_authors`
--
ALTER TABLE `books_authors`
  ADD CONSTRAINT `books_authors_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_authors_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `books_covers`
--
ALTER TABLE `books_covers`
  ADD CONSTRAINT `books_covers_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_covers_ibfk_2` FOREIGN KEY (`cover_id`) REFERENCES `covers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `books_languages`
--
ALTER TABLE `books_languages`
  ADD CONSTRAINT `books_languages_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_languages_ibfk_2` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `books_locations`
--
ALTER TABLE `books_locations`
  ADD CONSTRAINT `books_locations_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_locations_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
