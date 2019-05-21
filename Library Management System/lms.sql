-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2019 at 12:36 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books_info`
--

CREATE TABLE `books_info` (
  `id` int(11) NOT NULL,
  `books_name` varchar(50) NOT NULL,
  `books_image` varchar(500) NOT NULL,
  `books_author_name` varchar(50) NOT NULL,
  `publication_name` varchar(50) NOT NULL,
  `purchase_date` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `available_quantity` varchar(20) NOT NULL,
  `librarian_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books_info`
--

INSERT INTO `books_info` (`id`, `books_name`, `books_image`, `books_author_name`, `publication_name`, `purchase_date`, `price`, `quantity`, `available_quantity`, `librarian_username`) VALUES
(12, 'Pother Pachali', 'Koala.jpg', 'John Milton', 'Khan Publication', '3/2/2019', '200', '50', '11', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `id` int(11) NOT NULL,
  `std_enrollment` varchar(50) NOT NULL,
  `std_name` varchar(50) NOT NULL,
  `std_semister` varchar(50) NOT NULL,
  `std_contact` varchar(50) NOT NULL,
  `std_email` varchar(50) NOT NULL,
  `books_name` varchar(50) NOT NULL,
  `books_issue_date` varchar(50) NOT NULL,
  `books_return_date` varchar(50) NOT NULL,
  `std_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `std_enrollment`, `std_name`, `std_semister`, `std_contact`, `std_email`, `books_name`, `books_issue_date`, `books_return_date`, `std_username`) VALUES
(9, '12345678', 'Michael Sutradhar', 'First', '01861931612', 'michaelsutradhar@gmail.com', 'You Can win', '07-Feb-2019', '07-Feb-2019', 'admin'),
(10, '12345678', 'Michael Sutradhar', 'First', '01861931612', 'michaelsutradhar@gmail.com', 'Pother Pachali', '07-Feb-2019', '07-Feb-2019', 'admin'),
(11, '566', 'novel sd', 'Second', '018646373245', 'Novel@gmail.com', 'You Can win', '07-Feb-2019', '07-Feb-2019', 'Novel khan'),
(12, '12345678', 'Michael Sutradhar', 'First', '01861931612', 'michaelsutradhar@gmail.com', 'Pother Pachali', '07-Feb-2019', '07-Feb-2019', 'admin'),
(13, '12345678', 'Michael Sutradhar', 'First', '01861931612', 'michaelsutradhar@gmail.com', 'You Can win', '07-Feb-2019', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `librarian_registration`
--

CREATE TABLE `librarian_registration` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `librarian_registration`
--

INSERT INTO `librarian_registration` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`) VALUES
(1, 'Michael', 'Sutradhar', 'admin', '1234', 'michaelsutradhar@gmail.com', '01861931612');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `std_name` varchar(50) NOT NULL,
  `librarian_name` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `msg` varchar(200) NOT NULL,
  `std_read` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `std_name`, `librarian_name`, `title`, `msg`, `std_read`) VALUES
(11, 'admin', 'admin', 'Return Book', 'Kindly return your all books', 'Yes'),
(12, 'Novel khan', 'admin', 'Return Book', 'Kindly return your all books ', 'Yes'),
(18, 'Novel khan', 'admin', 'Pother Pachali', 'Submit This Book', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `semister` varchar(50) NOT NULL,
  `enrollment` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`, `semister`, `enrollment`, `status`) VALUES
(23, 'Michael', 'Sutradhar', 'admin', '123', 'michaelsutradhar@gmail.com', '01861931612', 'First', '12345678', 'yes'),
(26, 'novel', 'sd', 'Novel khan', '4567', 'Novel@gmail.com', '018646373245', 'Second', '566', 'yes'),
(28, 'Shanta', 'Islam', 'shanta', '123456', 'nussuarnob@gmail.com', '01967456872', 'Third', 'C151059', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books_info`
--
ALTER TABLE `books_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarian_registration`
--
ALTER TABLE `librarian_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books_info`
--
ALTER TABLE `books_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `librarian_registration`
--
ALTER TABLE `librarian_registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
