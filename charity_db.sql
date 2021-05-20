-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 09:32 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charity_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `admin_lname` varchar(10) NOT NULL,
  `admin_fname` varchar(10) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_pwd` varchar(10) NOT NULL,
  `admin_img` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `com_date` date NOT NULL,
  `com_time` time NOT NULL,
  `req_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `comment`, `com_date`, `com_time`, `req_id`, `donor_id`) VALUES
(36, 'okay we will try our best', '0000-00-00', '00:00:00', 17, 6);

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `don_id` int(11) NOT NULL,
  `don_date` date NOT NULL,
  `don_time` time NOT NULL,
  `amount` int(11) NOT NULL,
  `recommandation` varchar(255) DEFAULT NULL,
  `req_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donor_id` int(11) NOT NULL,
  `donor_fname` varchar(40) NOT NULL,
  `donor_lname` varchar(20) DEFAULT NULL,
  `donor_email` varchar(40) NOT NULL,
  `donor_pwd` varchar(500) NOT NULL,
  `donor_country` varchar(20) NOT NULL,
  `donor_city` varchar(20) NOT NULL,
  `donor_img` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `donor_fname`, `donor_lname`, `donor_email`, `donor_pwd`, `donor_country`, `donor_city`, `donor_img`) VALUES
(1, 'pfunk', 'majani', 'pfunk@gmail.com', '00000', '', '', NULL),
(2, '', '', '', '', '', '', ''),
(3, 'mark', '', 'mark@gmail.com', '$2y$10$494', '', '', ''),
(4, 'mark', '', 'mark@gmail.com', '$2y$10$rVhARDahPqyn23ea78zG0.XzBY8omWmpwzhS/VTeYUzsRFUQVZFkC', '', '', ''),
(5, 'watoaji', '', 'watoaji@gmail.com', '$2y$10$q7etIniXtfBMzJYKGeODreRtwYuZzxJC9vRwtAKBEQ.Y/U6jgGdkq', '', '', ''),
(6, 'thedonor', '', 'thedonor@gmail.com', '$2y$10$NJ9VMdLArf87NymDmLCWceIL.kipHsNYALIjN.mlv88mltO38ACPm', 'zimbabwe', 'dodoma', '1621362092profil.jpg'),
(7, 'mussa shabani', '', 'mussa@gmail.com', '$2y$10$1su68djY7mlx96GoqHtcAOw.41tn6Nyakg5w9oLAav8FwUxZVHYr.', '', '', ''),
(8, 'kkk', '', 'khalid', '$2y$10$yxoXhDGQlcfi6reC33JbsO8pHSF5sAQDmnXJcDW39RjbXi707i/bu', '', '', ''),
(9, 'golden', '', 'golden1@gmail.com', '$2y$10$n00S/xpmqK0hgcjE6Gu1eukeCSI0H/zwgidmePT29bODpo9SQSa7W', '', '', ''),
(10, 'herode', '', 'herode@gmail.com', '$2y$10$wJtl2Pyh80sCagTv6gn7QeQS3MM9X7XtWTiayr0TeGJ8hCUKg8ru2', '', '', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `ngo`
--

CREATE TABLE `ngo` (
  `NGO_id` int(11) NOT NULL,
  `NGO_name` varchar(10) NOT NULL,
  `NGO_country` varchar(10) DEFAULT NULL,
  `NGO_city` varchar(10) DEFAULT NULL,
  `NGO_email` varchar(30) NOT NULL,
  `NGO_password` varchar(500) NOT NULL,
  `NGO_phoneno` varchar(15) DEFAULT NULL,
  `NGO_status` int(2) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `NGO_img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngo`
--

INSERT INTO `ngo` (`NGO_id`, `NGO_name`, `NGO_country`, `NGO_city`, `NGO_email`, `NGO_password`, `NGO_phoneno`, `NGO_status`, `admin_id`, `NGO_img`) VALUES
(2, 'dodoma cha', 'tanzania', 'dodoma', 'dodoma@gmail.com', 'dodoma', '', 0, 0, 'ngo.jpg'),
(3, 'girls huma', '', '', 'girls@gmail.com', '2', '', 0, 0, 'ngo.jpg'),
(4, 'girls huma', '', '', 'girls@gmail.com', 'huma', '', 0, 0, 'ngo.jpg'),
(5, 'watu safi', '', '', 'watu@gmail.com', '$argon2i$v', '', 0, 0, 'ngo.jpg'),
(6, 'watu safi', '', '', 'watu@gmail.com', '$2y$10$k/c', '', 0, 0, 'ngo.jpg'),
(8, 'save the c', 'tanzania', 'dodoma', 'wema1@gmail.com', '$2y$10$h366pxIFZPwvYZT6ZO6EbOfSV9mZFVXH0B8EYoRZtL7r1Sjs1FXYi', '778899901', 0, 0, 'file81551261387275.jpg'),
(10, 'nairo ', 'tanzania', 'dodoma', 'nairo@gmail.com', '$2y$10$xL6sPzHM8.TIgug4tLwv8ObcFj//ngASoDo0S2NrIuvbwXvrFKYni', '099999', 0, 0, 'ngo.jpg'),
(13, 'herode', '', '', 'herode@gmail.com', '$2y$10$yR3nhfWqMZtEnCdXrSzHreGi1hk5fV10DvaigUQCUMWtplibSOlr.', '', 0, 0, 'ngo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_uploads`
--

CREATE TABLE `ngo_uploads` (
  `upload_id` int(11) NOT NULL,
  `path` varchar(20) NOT NULL,
  `upload_date` date NOT NULL,
  `upload_time` time NOT NULL,
  `NGO_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngo_uploads`
--

INSERT INTO `ngo_uploads` (`upload_id`, `path`, `upload_date`, `upload_time`, `NGO_id`) VALUES
(11, 'beg.PNG', '0000-00-00', '09:37:43', 8);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `req_id` int(11) NOT NULL,
  `request_time` datetime NOT NULL DEFAULT current_timestamp(),
  `title` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `budget` int(11) NOT NULL,
  `strategy` varchar(255) DEFAULT NULL,
  `status` varchar(6) NOT NULL,
  `NGO_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`req_id`, `request_time`, `title`, `description`, `budget`, `strategy`, `status`, `NGO_id`) VALUES
(17, '0000-00-00 00:00:00', 'helping old age people', 'we are looking forward to helping old age people back we lack enough funds', 12000000, 'we will ensure that the funds reach the targeted people at wholy', 'open', 8);

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE `shares` (
  `share_id` int(11) NOT NULL,
  `share_time` time NOT NULL,
  `share_date` date NOT NULL,
  `res_no` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `don_key2` (`donor_id`),
  ADD KEY `req_key2` (`req_id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`don_id`),
  ADD KEY `req_key` (`req_id`),
  ADD KEY `don_key` (`donor_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `ngo`
--
ALTER TABLE `ngo`
  ADD PRIMARY KEY (`NGO_id`);

--
-- Indexes for table `ngo_uploads`
--
ALTER TABLE `ngo_uploads`
  ADD PRIMARY KEY (`upload_id`),
  ADD KEY `ngo_upload_key` (`NGO_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `ngo_key` (`NGO_id`);

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`share_id`),
  ADD KEY `req_key3` (`req_id`),
  ADD KEY `don_key3` (`donor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `don_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ngo`
--
ALTER TABLE `ngo`
  MODIFY `NGO_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ngo_uploads`
--
ALTER TABLE `ngo_uploads`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
  MODIFY `share_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `don_key2` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`donor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `req_key2` FOREIGN KEY (`req_id`) REFERENCES `requests` (`req_id`) ON DELETE CASCADE;

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `don_key` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`donor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `req_key` FOREIGN KEY (`req_id`) REFERENCES `requests` (`req_id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_uploads`
--
ALTER TABLE `ngo_uploads`
  ADD CONSTRAINT `ngo_upload_key` FOREIGN KEY (`NGO_id`) REFERENCES `ngo` (`NGO_id`) ON DELETE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `ngo_key` FOREIGN KEY (`NGO_id`) REFERENCES `ngo` (`NGO_id`) ON DELETE CASCADE;

--
-- Constraints for table `shares`
--
ALTER TABLE `shares`
  ADD CONSTRAINT `don_key3` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`donor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `req_key3` FOREIGN KEY (`req_id`) REFERENCES `requests` (`req_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
