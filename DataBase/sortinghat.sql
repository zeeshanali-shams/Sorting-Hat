-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2018 at 08:05 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sortinghat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `messege` varchar(255) NOT NULL,
  `posted_on` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `email`, `messege`, `posted_on`) VALUES
(1, 'Zeeshanali160@gmail.com', 'Hi, is there anyone?', '24 April 2018'),
(2, 'rishavsingh160@gmail.com', 'Yes, Zeeshan How can i help you?', '24 April 2018'),
(3, 'Zeeshanali160@gmail.com', 'I am looking for a PHP developer and i have seen your profile you known to be good at it. Can we work together? I have sent you request as Partner, Please accept.', '24 April 2018'),
(12, 'rishavsingh160@gmail.com', 'I have accepted Your request.', '24 April 2018'),
(13, 'apoorvakumar160@gmail.com', 'can i work with you two?', '24 April 2018'),
(14, 'rupamkumar160@gmail.com', 'i also want to work with you. I have sent you request.', '24 April 2018'),
(15, 'rishavsingh160@gmail.com', 'I have accepted all requests. Now we are Team.', '24 April 2018');

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `myemail` varchar(255) NOT NULL,
  `partner` varchar(255) NOT NULL,
  `request` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `myemail`, `partner`, `request`) VALUES
(3, 'manishkumar160@gmail.com', 'rishavsingh160@gmail.com', '1'),
(4, 'ravikumar160@gmail.com', 'rupamkumar160@gmail.com', '1'),
(5, 'ravikumar160@gmail.com', 'apoorvakumar160@gmail.com', '1'),
(6, 'Zeeshanali160@gmail.com', 'manishkumar160@gmail.com', '1'),
(7, 'apoorvakumar160@gmail.com', 'Zeeshanali160@gmail.com', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `im` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `gender`, `contact`, `department`, `interest`, `rating`, `im`) VALUES
(12, 'Rupam Kumar', 'rupamkumar160@gmail.com', '$2y$10$FM9j.e2rP61BsJbwdnO0JeUb6LqziE1tr8oOcZhHjiRBUosvTHCzG', 'Male', '2147483647', 'CSE', 'PHP', '9', 'Student'),
(11, 'Apoorva Kumar', 'apoorvakumar160@gmail.com', '$2y$10$n10L9bCRWxQqfVjHKMllYe23Q6/m9pqKHidqUzKyb4Jd3ty0YE13u', 'Male', '9939414565', 'CSE', 'PHP', '10', 'Teacher'),
(10, 'Zeeshan Ali', 'Zeeshanali160@gmail.com', '$2y$10$eTdKnthMdj.YofFo2Ag4eOA4A0VXOr7aP1qtCbJOALzlCR7qFmU1q', 'Male', '7063744670', 'CSE', 'PHP', '8', 'Student'),
(9, 'Rishav Kumar', 'rishavsingh160@gmail.com', '$2y$10$Chtdh7IlgxrEvaizjrSkauCSa3bKL4xgvyIqiQVVQK6SahG.r0Wk6', 'Male', '7063744670', 'CSE', 'PHP', '7', 'Student'),
(13, 'Manish Kumar', 'manishkumar160@gmail.com', '$2y$10$JakRB1Cv0Gvqi5TCRcENJ.ON5.9/E3SPkFRQ6uIqqyQ4fMcuqERui', 'Male', '8877556699', 'CSE', 'PHP', '10', 'Teacher'),
(14, 'Ravi Kumar', 'ravikumar160@gmail.com', '$2y$10$8YYQxLZOAOuCgoGDBWdms.TKtOpBcsrtw3iUPwEs4SbrCYTw1WJqi', 'Male', '9988779988', 'CSE', 'PHP', '9', 'Teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
