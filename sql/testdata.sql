-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2013 at 07:28 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `codeigniter_intm`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(120) NOT NULL,
  `password` varchar(250) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `firstname`, `lastname`, `created_at`) VALUES
(2, 'john@yahoo.com', 'b5e42f49ab3acf8f6c2ccf99f604a17f', 'Placeholder', 'Placeholder', '2013-03-18 13:27:25'),
(13, 'jsprogram@yahoo.com', '527bd5b5d689e2c32ae974c6229ff785', NULL, NULL, NULL),
(14, 'johnjoyce@yahoo.com', '527bd5b5d689e2c32ae974c6229ff785', NULL, NULL, NULL),
(15, 'test@gmail.com', '12345678', 'firstname', 'lastname', NULL),
(16, 'test@gmail.com', '12345678', 'firstname', 'lastname', '0000-00-00 00:00:00'),
(17, 'test@gmail.com', '12345678', 'firstname', 'lastname', '0000-00-00 00:00:00'),
(18, 'test@gmail.com', '12345678', 'firstname', 'lastname', '0000-00-00 00:00:00'),
(19, 'testencrypt123@gmail.com', '12345678', 'testencrypt', 'testencrypt', '0000-00-00 00:00:00'),
(20, 'testencrypt1234@gmail.com', 'LTbv5nA1HlpdfJc00dYiS4DAtkJ56LHfp57AybR6xK13OzOAuPZ7Sc+jHVvYAwltyJOHNW4tNrQsJsA71C3x2g==', 'testencrypt2', 'testencrypt2', '0000-00-00 00:00:00'),
(21, 'test12345678@gmail.com', 'bCtE4ct/hTYhXWytcLAPVT8Xo0C6rkStvtlRDaZMcPB72MdqzihMExohfJwWSouKvxCtzLfzX9E/v8HwwZ787w==', 'test12345678', 'test12345678last', '0000-00-00 00:00:00'),
(22, 'password@gmail.com', 'rfNvGmNqzDaT42lRRf3uFHbLhqYFx6qiZLaeczQsJPcr9Tc/4MOxUrpclhtwvff8cNGp7LqCNkfzZIQSHZJm2g==', 'password', 'password', '0000-00-00 00:00:00'),
(23, 'testnew@gmail.com', 'PvAZS5KAT29BOJ27GgN04fZkB8IQ3C4fJcGRchk5Z1ead6sCtUX4NGKzuqGldd/gfZZBxTJlUo7T2kYLT7BRhg==', 'testnew', 'testnewlast', '0000-00-00 00:00:00'),
(24, 'registerlogin@test.com', 'gX4EVLpHYikvZpSFGcJTB1quY7TI2b3+Tas7m8BOM5GJKYKgSL3+P1cTq2QdhITbE3A6F7o0IEsxrXqmMS1a2A==', 'registerlogin', 'registerlogin', '0000-00-00 00:00:00'),
(25, 'modelconstructor@test.com', '/WQHz4tRFyBTnoD55VwbQJ87a+dX1aKni7hvmt/zepSFxASPdxnPqXMN2dcfarmWMcSfHobqNd5HkHgHWBrgHw==', 'modelconstructor', 'modelconstructor', '0000-00-00 00:00:00'),
(26, 'test999@gmail.com', 'vMgQAtM7+2brPXrOF2+yU5CLnYMcxX+bd9ktKYepIR8GyMYLCrq3p6QrBbuEE3jE27azdkC4uNHE1jXmLbtT+g==', 'testing', 'testing', '0000-00-00 00:00:00'),
(27, 'testing1234@gmail.com', 'M/wpiyFbwcR2kaJo9hlPKxAdK3lbU7IZ7UR8ZMVd3g1PCBsrad288TgMXornC/kQqFZpBlXgOOfC7k1kooU8EQ==', 'testing', 'testing1234', '0000-00-00 00:00:00'),
(28, 'testdateuser@gmail.com', 'w/5DO8S1HoyEDo3ZHpHpZU1fEFp4jEwIK2/f8tHJuex9+rv/WCg+eMVO6iqsWhcLWEPiePezt0sqzJcDvhpPPQ==', 'testdateuser', 'passtestdateuser123', '2013-03-19 19:53:04');
