-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2013 at 06:56 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `CI_advanced`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `recipient_id` decimal(10,0) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `parent_message_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `like_counter` int(11) DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `fk_messages_users_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=175 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `content`, `recipient_id`, `user_id`, `created_at`, `parent_message_id`, `updated_at`, `like_counter`) VALUES
(4, '123', 4, 4, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(6, 'testing this is the 4th message of march 7', 4, 4, '2013-03-07 11:30:04', NULL, '2013-03-07 11:30:04', NULL),
(7, 'testing this is the 4th message of march 7', 4, 4, '2013-03-07 11:31:00', NULL, '2013-03-07 11:31:00', NULL),
(8, 'testing this is a really annoying message from march7', 4, 4, '2013-03-07 11:36:43', NULL, '2013-03-07 11:36:43', NULL),
(9, 'testing this is a really annoying message from march7', 4, 4, '2013-03-07 11:36:56', NULL, '2013-03-07 11:36:56', NULL),
(10, 'testing this is a really annoying message from march7', 4, 4, '2013-03-07 11:37:08', NULL, '2013-03-07 11:37:08', NULL),
(11, 'testing this is post requirement message. does it work?', 4, 4, '2013-03-07 11:37:45', NULL, '2013-03-07 11:37:45', NULL),
(12, 'testing this is SECOND MESSAGE after adding required', 4, 4, '2013-03-07 11:39:59', NULL, '2013-03-07 11:39:59', NULL),
(13, 'This is a testing child message', 4, 5, '2013-03-07 12:24:37', 6, '2013-03-07 12:24:37', NULL),
(14, 'This is a testing child message', 4, 5, '2013-03-07 12:25:17', 6, '2013-03-07 12:25:17', NULL),
(15, 'This is a testing child message for no.7', 4, 5, '2013-03-07 12:27:29', 7, '2013-03-07 12:27:29', NULL),
(16, 'This is a testing child message for no.8', 4, 5, '2013-03-07 12:27:29', 8, '2013-03-07 12:27:29', NULL),
(17, 'testing this is an update here', 4, 4, '2013-03-07 13:23:06', NULL, '2013-03-07 13:23:06', NULL),
(18, 'testing this is an update here', 4, 4, '2013-03-07 13:23:27', NULL, '2013-03-07 13:23:27', NULL),
(19, 'filler content', 4, 4, '2013-03-07 13:33:07', 0, '2013-03-07 13:33:07', NULL),
(20, 'filler content', 4, 4, '2013-03-07 13:33:28', 0, '2013-03-07 13:33:28', NULL),
(21, 'filler content', 4, 4, '2013-03-07 13:39:38', 6, '2013-03-07 13:39:38', NULL),
(22, 'testing child dump', 4, 4, '2013-03-07 13:40:48', 6, '2013-03-07 13:40:48', NULL),
(23, 'filler content', 4, 4, '2013-03-07 13:41:26', 6, '2013-03-07 13:41:26', NULL),
(24, 'This is awesome. I cannot believe that I am already building somethng', 4, 4, '2013-03-07 13:43:41', 6, '2013-03-07 13:43:41', NULL),
(25, 'This is my update! And it belongs to me.', 4, 4, '2013-03-07 13:44:17', NULL, '2013-03-07 13:44:17', NULL),
(26, 'ANd this is a comment that will should up right above.', 4, 4, '2013-03-07 13:44:38', 6, '2013-03-07 13:44:38', NULL),
(27, 'This is my update for michael', 4, 4, '2013-03-07 13:53:57', NULL, '2013-03-07 13:53:57', NULL),
(28, 'This is the comment to go afterwards.', 4, 4, '2013-03-07 13:54:18', 6, '2013-03-07 13:54:18', NULL),
(29, 'testing', 4, 4, '2013-03-07 14:23:54', NULL, '2013-03-07 14:23:54', NULL),
(30, 'test is new update at 3PM ', 4, 4, '2013-03-07 14:24:09', NULL, '2013-03-07 14:24:09', NULL),
(31, 'test is new update at 3PM and comment. ', 4, 4, '2013-03-07 14:24:55', 6, '2013-03-07 14:24:55', NULL),
(32, 'this is a parent', 4, 4, '2013-03-07 15:14:57', NULL, '2013-03-07 15:14:57', NULL),
(33, 'this is a child that i created', 4, 4, '2013-03-07 15:16:02', 6, '2013-03-07 15:16:02', NULL),
(34, 'test this message will become child 11', 4, 4, '2013-03-07 16:52:48', 6, '2013-03-07 16:52:48', NULL),
(35, 'test', 4, 4, '2013-03-07 16:55:32', 6, '2013-03-07 16:55:32', NULL),
(36, 'testing testing testing testing', 4, 4, '2013-03-07 16:56:04', 6, '2013-03-07 16:56:04', NULL),
(37, 'test', 4, 4, '2013-03-07 16:57:02', 6, '2013-03-07 16:57:02', NULL),
(38, 'testing testing.', 4, 4, '2013-03-07 16:57:13', 6, '2013-03-07 16:57:13', NULL),
(39, 'testing testing testing testing', 4, 4, '2013-03-07 16:59:17', 6, '2013-03-07 16:59:17', NULL),
(40, 'testing testing testing ultra', 4, 4, '2013-03-07 17:01:07', 6, '2013-03-07 17:01:07', NULL),
(43, 'what if this is also a child of no.7', 4, 4, '2013-03-07 17:12:46', 7, '2013-03-07 17:12:46', NULL),
(44, 'testing hopefully this is for no.7', 4, 4, '2013-03-07 17:15:56', 7, '2013-03-07 17:15:56', NULL),
(45, 'testing hopefully this is for no.7', 4, 4, '2013-03-07 17:19:10', 7, '2013-03-07 17:19:10', NULL),
(46, 'testing hopefully this is for no.7', 4, 4, '2013-03-07 17:19:15', 7, '2013-03-07 17:19:15', NULL),
(47, 'this is a reply to one two three', 4, 4, '2013-03-07 18:32:11', 4, '2013-03-07 18:32:11', NULL),
(48, 'This is a reply to second message after adding required', 4, 4, '2013-03-07 18:33:23', 12, '2013-03-07 18:33:23', NULL),
(49, 'testing a reply', 4, 4, '2013-03-07 18:45:21', 32, '2013-03-07 18:45:21', NULL),
(50, 'testing a reply to test is new update at 3PM', 4, 4, '2013-03-07 18:45:57', 30, '2013-03-07 18:45:57', NULL),
(52, '', 4, 4, '2013-03-07 18:52:30', 4, '2013-03-07 18:52:30', NULL),
(53, 'This is a reply to This is my update! And it belongs to me.', 4, 4, '2013-03-07 18:52:49', 25, '2013-03-07 18:52:49', NULL),
(54, 'testing this is a reply to requirement message, does it work', 4, 4, '2013-03-07 18:55:20', 11, '2013-03-07 18:55:20', NULL),
(55, 'This should be a new parent without when children', 4, 4, '2013-03-07 18:55:54', NULL, '2013-03-07 18:55:54', NULL),
(56, 'This should be a new parent without when children', 4, 4, '2013-03-07 18:56:14', NULL, '2013-03-07 18:56:14', NULL),
(57, 'testing a new post hopefully it works', 4, 4, '2013-03-07 18:56:33', NULL, '2013-03-07 18:56:33', NULL),
(58, 'testing a new post hopefully it works', 4, 4, '2013-03-07 18:56:49', NULL, '2013-03-07 18:56:49', NULL),
(59, 'This is a brand newupdate on March 7  and it is amazing.', 4, 4, '2013-03-07 18:57:18', NULL, '2013-03-07 18:57:18', NULL),
(60, 'this is a reply to the amazing brand new post and it should be awesome.', 4, 4, '2013-03-07 18:57:36', 59, '2013-03-07 18:57:36', NULL),
(61, 'testing the brand new wall process_wall_v2', 4, 4, '2013-03-07 18:59:15', NULL, '2013-03-07 18:59:15', NULL),
(64, '', 4, 4, '2013-03-07 19:26:41', 55, '2013-03-07 19:26:41', NULL),
(66, 'testing a reply for no.7 at the end of the day', 4, 4, '2013-03-07 19:46:31', 7, '2013-03-07 19:46:31', NULL),
(81, 'This should show up at the bottom of testing this is the 4th message of march 7', 4, 4, '2013-03-08 12:04:30', 6, '2013-03-08 12:04:30', NULL),
(141, 'I am user 5 writing on user 4 wall.', 4, 5, '2013-03-14 20:15:33', NULL, '2013-03-14 20:15:33', NULL),
(142, 'I am user 5 writing on user 4 wall. I am user 5 writing on user 4 wall.I am user 5 writing on user 4 wall. this is a child', 4, 5, '2013-03-14 20:15:43', 141, '2013-03-14 20:15:43', NULL),
(144, 'This is user 4 on user 6''s wall', 6, 4, '2013-03-14 20:17:25', NULL, '2013-03-14 20:17:25', NULL),
(172, 'This is a message from John to John', 36, 36, '2013-03-26 06:48:19', NULL, NULL, NULL),
(173, 'I also replying to this message.', 36, 36, '2013-03-26 06:48:25', 172, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `user_level` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `firstname`, `lastname`, `user_level`, `description`, `created_at`, `updated_at`) VALUES
(35, 'fernardo@gmail.com', '12345678', 'Fernado', 'Dinao', 'Normal', 'Adding personal description to Fernardo', '2013-03-26 04:58:49', '2013-03-26 05:02:01'),
(36, 'john@yahoo.com', '12345678', 'John', 'Asana', 'Normal', NULL, '2013-03-26 06:47:28', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_messages_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
