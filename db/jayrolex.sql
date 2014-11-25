-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2014 at 01:59 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jayrolex`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `movie_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(255) NOT NULL DEFAULT '',
  `movie_year` int(4) NOT NULL,
  `movie_rating` varchar(4) NOT NULL DEFAULT '',
  `movie_bio` varchar(255) DEFAULT NULL,
  `movie_img` varchar(200) NOT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_name`, `movie_year`, `movie_rating`, `movie_bio`, `movie_img`) VALUES
(1, 'Lord of the Rings: The Fellowship of the Ring', 2001, '5', 'A battle between good and evil in which a Hobbit must deliver a ring into a volcano.', 'assets/lordOfRings.jpg'),
(2, 'Pacific Rim', 2013, '4', 'Giant robots fight giant monsters in Japan.', 'assets/pacificRim.jpg'),
(3, 'Dazed and Confused', 1993, '2.5', 'A bunch friends enjoy their last day of highschool.', 'assets/dazedConfused.jpg'),
(4, 'Batman & Robin', 1997, '1', 'The worst Batman movie, ever...', 'assets/batmanRobin.jpg'),
(5, 'District 9', 2009, '4', 'A man has an unexpected surprise when he visits an alien slum in Johannesburg, South Africa.', 'assets/district9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `review_movie_id` int(11) unsigned NOT NULL,
  `review_user_id` int(11) unsigned NOT NULL,
  `review_rating` int(11) NOT NULL,
  `review_content` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`review_id`),
  KEY `users_foreign_key` (`review_user_id`),
  KEY `movies_foreign_key` (`review_movie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `review_movie_id`, `review_user_id`, `review_rating`, `review_content`) VALUES
(1, 1, 2, 5, 'Lord of the Rings is awesome!! However, The Fellowship of the Ring is a little slow, but keeps you roped in for the long haul.'),
(2, 5, 4, 4, 'District 9 kept the adrenaline going and tension high. A must see for any action/sci-fi fan.'),
(3, 2, 1, 5, 'What''s not to like about giant robots fighting giant monsters!?'),
(4, 3, 2, 3, 'The movie rating of this movie doesn''t do it justice. While being a typical 90''s teen flick, Dazed and Confused is absolutely comical and you''ll fall in love with the characters over and over again.'),
(5, 4, 3, 1, 'I honestly think the review rating is a little generous. Batman & Robin is by far the worst Batman movie ever thrown up onto the silver screen.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL DEFAULT '',
  `user_full_name` varchar(150) NOT NULL DEFAULT '',
  `user_email` varchar(255) NOT NULL DEFAULT '',
  `user_password` varchar(255) NOT NULL DEFAULT '',
  `user_role` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_full_name`, `user_email`, `user_password`, `user_role`) VALUES
(1, 'Smores', 'Joe Smoe', 'smores@gmail.edu', 'c@mpf1re', 1),
(2, 'White Rabbit', 'Beth White', 'bethanyWhite123@yahoo.com', 'WhIteXmas', 2),
(3, 'Jimmy', 'James Williams', 'willJ60@yahoo.com', 'w!LLy', 3),
(4, 'Bobbie', 'Billy Bob', 'bobbyB@zoho.com', 'z0h0Rockz', 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `movies_foreign_key` FOREIGN KEY (`review_movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_foreign_key` FOREIGN KEY (`review_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
