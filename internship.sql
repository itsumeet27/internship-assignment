-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2019 at 08:38 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `int_id` int(11) NOT NULL,
  `applied` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `cus_id`, `int_id`, `applied`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 2, 1, 1),
(4, 2, 2, 1),
(5, 3, 1, 1),
(6, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipcode` int(100) NOT NULL,
  `phone` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `email`, `password`, `address1`, `address2`, `city`, `state`, `zipcode`, `phone`, `country`, `ip`) VALUES
(1, 'Sumeet Sharma', 'sksksharma0@gmail.com', 'Shar8286', '302, B-7, Sector-9', 'Shanti Nagar, Mira Road East', 'Mumbai', 'Maharashtra', 401107, '8286864601', 'India', '::1'),
(2, 'Sumeet', 'sksharma.sharma87@gmail.com', 'Shar8286', '302, B-7, Sector-9', 'Shanti Nagar, Mira Road (E)', 'Mumbai', 'Maharashtra', 401107, '8850948655', 'India', '::1'),
(3, 'Nirbhay Verma', 'nirbhayvv@gmail.com', 'Nirbhay', '403, B-9, Sector-6', 'Shanti Nagar, Mira Road East', 'Mumbai', 'Maharashtra', 401107, '7208668292', 'India', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `id` int(11) NOT NULL,
  `nameOfCompany` text NOT NULL,
  `aboutCompany` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipcode` int(100) NOT NULL,
  `phone` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `nameOfCompany`, `aboutCompany`, `email`, `password`, `address1`, `address2`, `city`, `state`, `zipcode`, `phone`, `country`, `ip`, `date`) VALUES
(1, 'NETMATE SOLUTIONS', 'Digital Marketing Agency', 'sksharma.sharma87@gmail.com', 'Shar8286', '302, B-7, Sector-9', 'Shanti Nagar, Mira Road East', 'Mira Bhayandar', 'Maharashtra', 401107, '8286864601', 'India', '::1', '2019-09-04 17:03:24'),
(2, 'IIT Bombay', 'The Indian Institute of Technology, Bombay (IITB) is one of the fifteen higher institutes of technology in the country set up with the objective of making facilities available for higher education, research, and training in various fields of science and technology. With the same mission and vision, Prof. Ganesh Ramakrishnan is gearing to take rural India a leap ahead. For his outstanding contributions, he has also been awarded the IBM Faculty Award 2011.', 'itsumeet@gmail.com', 'Shar8850', '201, C-15, Sector-6', 'Shanti Nagar, Mira Road East', 'Mumbai', 'Maharashtra', 401107, '8850948655', 'India', '::1', '2019-09-04 18:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `internships`
--

CREATE TABLE `internships` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `category` text NOT NULL,
  `postedOn` text NOT NULL,
  `applyBy` text NOT NULL,
  `nameOfCompany` text NOT NULL,
  `aboutCompany` text NOT NULL,
  `aboutInternship` text NOT NULL,
  `location` text NOT NULL,
  `perks` text NOT NULL,
  `duration` int(100) NOT NULL,
  `stipend` int(100) NOT NULL,
  `positions` int(11) NOT NULL,
  `whoCanApply` text NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internships`
--

INSERT INTO `internships` (`id`, `emp_id`, `category`, `postedOn`, `applyBy`, `nameOfCompany`, `aboutCompany`, `aboutInternship`, `location`, `perks`, `duration`, `stipend`, `positions`, `whoCanApply`, `featured`, `deleted`) VALUES
(1, 2, 'Web Development', '2019-09-04', '2019-09-20', 'IIT Bombay', 'The Indian Institute of Technology, Bombay (IITB) is one of the fifteen higher institutes of technology in the country set up with the objective of making facilities available for higher education, research, and training in various fields of science and technology. With the same mission and vision, Prof. Ganesh Ramakrishnan is gearing to take rural India a leap ahead. For his outstanding contributions, he has also been awarded the IBM Faculty Award 2011.', 'Selected intern\'s day-to-day responsibilities include: \r\n\r\n1. Collaborate with teams to implement new features, improvements, and fixes needed to handle our current and future scale\r\n2. Write reusable, testable, and efficient code\r\n3. Build, optimize and scale our Node.js platform and applications\r\n4. Design and implement low-latency, high-availability, and performant applications\r\n5. Implement secure applications and data protection\r\n6. Integrate RESTful APIs &amp;amp; internal web services ensuring high performance\r\n7. Collaborate across teams and contributing to open source\r\n8. Troubleshoot production issues and implement fixes for them\r\n9. Learn and teach peers new technologies', 'Mumbai', 'Certificate', 6, 5000, 5, 'Only those candidates can apply who:\r\n\r\n1. are available for full time (in-office) internship\r\n2. can start the internship between 23rd Aug&#039;19 and 22nd Sep&#039;19\r\n3. are available for duration of 6 months\r\n4. are from Mumbai and neighboring cities\r\n5. have relevant skills and interests', 0, 0),
(2, 1, 'Graphic Designing', '2019-09-05', '2019-09-20', 'NETMATE SOLUTIONS', 'Digital Marketing Agency', 'Selected intern\'s day-to-day responsibilities include:\r\n\r\n1. Brainstorming and ideating in making creative designs for various marketing campaigns\r\n2. Working on digital collaterals such as design banners for website, newsletters, and other social media channels\r\n3. Working on print collaterals such as posters, brochures, standees, event collaterals, leaflets, etc.', 'Mumbai', 'Certificate, Recommendation Letter', 3, 10000, 2, 'Only those candidates can apply who:\r\n\r\n1. are available for full time (in-office) internship\r\n2. can start the internship between 10th Aug&#039;19 and 9th Sep&#039;19\r\n3. are available for duration of 4 months\r\n4. have relevant skills and interests\r\n\r\n** Women willing to start/restart their career can also apply.', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `permission`, `join_date`, `last_login`) VALUES
(1, 'Sumeet Sharma', 'sksksharma0@gmail.com', 'password', 'admin,editor', '2018-10-06 01:00:34', '2018-10-03 09:12:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `internships`
--
ALTER TABLE `internships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
