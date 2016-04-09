-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2016 at 05:10 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meow`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `title`, `user_id`, `img_id`) VALUES
(1, 'fdfdfd', 22, 5),
(2, 'omg this cat is amazing ', 22, 11),
(3, 'SOMETHING', 22, 12),
(6, 'WOW!!', 25, 7),
(7, 'Awesome! ', 22, 1),
(8, 'Woah', 1, 1),
(9, 'So basic', 1, 5),
(10, 'Aweeeeeeeeeee', 1, 7),
(11, 'How sophisticated ', 1, 11),
(12, 'I love the ocean! ', 1, 12),
(13, 'Woah amazing pic! ', 1, 13),
(14, 'Such a generic cat ', 26, 1),
(15, 'Bob is pretty great looking!!!!', 26, 5),
(16, 'I want a kitten! ', 26, 7),
(17, 'Looks like a smart cat', 26, 11),
(18, 'SO FLUFFYYYYYYYY', 26, 12),
(19, 'awe! I want this cat', 26, 13),
(20, 'AHhahahahahhahahahaaaaaaaa', 22, 15),
(21, 'I know right ^ ', 26, 15),
(22, 'rrrr', 26, 1),
(23, 'WEOEOEOEOEO', 22, 7);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `text` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `title` varchar(300) NOT NULL,
  `path` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `user_id`, `description`, `title`, `path`) VALUES
(1, 1, 'This cat is pretty much the best', 'Whiskers ', 'https://www.petfinder.com/wp-content/uploads/2012/11/140272627-grooming-needs-senior-cat-632x475.jpg'),
(5, 23, 'Cool', 'Bob', 'http://petsittersoflasvegas.com/wp-content/uploads/2015/01/o-CATS-KILL-BILLIONS-facebook.jpg'),
(7, 23, 'This is jack when he was a kitten :)', 'Jack', 'http://elelur.com/data_images/cat-breeds/siberian-cat/siberian-cat-08.jpg'),
(11, 25, 'fluff', 'Philis', 'http://www.cancats.net/wp-content/uploads/2014/11/cool-cat-breeds-rag-doll-cats-pictures-white-fluffy-cats-with-blue-eyes.jpg'),
(12, 25, 'fuzzzzzz', 'New Cat ', 'https://patcegan.files.wordpress.com/2012/02/fluffy-cat.jpg'),
(13, 22, 'My favourite cat', 'Laurel', 'http://i.dailymail.co.uk/i/pix/2015/10/20/01/2D92587600000578-3280211-So_hot_right_meow_A_Japanese_housewife_creates_handmade_cat_purs-m-62_1445301682918.jpg'),
(15, 26, 'These guys are pretty funny!! ', 'PB & J ', 'http://i.imgur.com/mLbNbXT.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `bio` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `bio`) VALUES
(1, 'cat', 'cat', 'I love cats!!!! '),
(14, '123', '123', 'new bio! '),
(15, 'hey', 'hey', 'hey'),
(22, 'isla', '123', 'Hi! I am a cat enthusiast '),
(23, 'Isla McCullough', 'isla', 'Yay! I love cats so much, I swear im not crazy. Although I think im going crazy right now'),
(24, '333', '333', NULL),
(25, 'Penny', '123', 'I really like cats! '),
(26, 'clay', '123', 'Im all about cats');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `img_id` (`img_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `img_id` (`img_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD KEY `message_id` (`message_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`img_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`img_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
