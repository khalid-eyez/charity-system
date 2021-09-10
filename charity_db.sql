-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 11:09 AM
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
  `admin_pwd` varchar(255) NOT NULL,
  `admin_img` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `admin_lname`, `admin_fname`, `admin_email`, `admin_pwd`, `admin_img`) VALUES
(1, 'Charity Ad', '', 'admin@gmail.com', '$2y$10$L70Ra78ck9cc7VgMvw2GLestJz6Laj5InGHa3l9c4Vals78oF4cEu', NULL);

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
(73, 'hey', '2021-07-11', '20:33:44', 114, 14),
(74, 'hey', '2021-07-11', '20:46:29', 115, 14),
(75, 'holla', '2021-07-11', '21:04:38', 115, 6);

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `don_id` int(11) NOT NULL,
  `don_date` date NOT NULL,
  `don_time` time NOT NULL,
  `currency` varchar(4) NOT NULL,
  `cardnumber` varchar(20) NOT NULL,
  `receipt` varchar(500) NOT NULL,
  `amount` float NOT NULL,
  `recommandation` varchar(255) DEFAULT NULL,
  `req_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`don_id`, `don_date`, `don_time`, `currency`, `cardnumber`, `receipt`, `amount`, `recommandation`, `req_id`, `donor_id`) VALUES
(87, '2021-08-02', '17:08:09', 'TZS', 'tn90-0000', '$2y$10$eCqqb11JiY.a/88ptR9sVeyAfoo8unqDFLyNjpGwCWbkzUocJEM8a', 67000, '', 116, 14),
(88, '2021-08-02', '17:08:54', 'TZS', 'tn90-0000', '$2y$10$X3Ks0L/DvLcZxtoBSWa2J.vfxYAFdzBZkC0mZK5WoeHB/QnnA8TYW', 70000, '', 116, 14),
(89, '2021-08-02', '17:09:45', 'TZS', 'tn90-0000', '$2y$10$L.ZgwLrJXuHK92Zq9q/Rf.5XKYeDLpAI1aI7Zc15vUG./HXmpGR6S', 78000, '', 116, 14),
(90, '2021-08-02', '17:10:47', 'TZS', 'tn90-0000', '$2y$10$BxJT6BBR46M8/61wjyjNAehOCseR4B0w04Nh6KHJB/LPxe201tM.G', 89000, '', 116, 14),
(91, '2021-08-02', '17:11:34', 'TZS', 'tn90-0000', '$2y$10$iqef4uhMlvQRotItpu8FHucDlGuZOcAomGP2kWUwrknVNXDl1M7eS', 78900, '', 116, 14),
(92, '2021-08-02', '17:15:12', 'TZS', 'tn90-0000', '$2y$10$fAHI.XOdKU.7YoDQYEV9XOwH/p4iYiwbYfJqUVsJtmyzUmWSr6Yn.', 5000000000, '', 116, 14),
(93, '2021-08-02', '17:16:13', 'TZS', 'tn90-0000', '$2y$10$I7fbKpO4sdOaqI2ICRc0se63ZWSjkUiKAp7C6vGDF1VVX/x5OXeR.', 7900000, '', 116, 14),
(94, '2021-08-03', '10:34:19', 'TZS', '5thh77', '$2y$10$8CAI0sBpZmwAcC20gVlaEu1bE3EZvvw4aPKi.vwiZhVngQMyXq19K', 69000, '', 116, 14),
(95, '2021-08-03', '10:36:21', 'TZS', '5thh77', '$2y$10$e0AxtKfMJJGaJ5a3Qua9s.dg.8EjBx38U1SlzqTHTLJQPUFmfYEqu', 59000, '', 116, 14),
(96, '2021-08-03', '10:38:09', 'TZS', '5thh77', '$2y$10$J8Ga8cR9uwoDwLjzVmCl9O6/Cj6HsEKtQaor5GmLTaOoFdXyII7kO', 5679000, '', 115, 14),
(97, '2021-08-10', '10:59:41', 'USD', '1562556577777', '$2y$10$VP.8Mhit2sMdqboVZ04SZuaXE/7nM41kTqJkZrqK8aK5gIUaCd.ou', 5000, 'fgjfgj', 116, 14);

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
(6, 'thedonor mkuu', '', 'thedonor@gmail.com', '$2y$10$NJ9VMdLArf87NymDmLCWceIL.kipHsNYALIjN.mlv88mltO38ACPm', 'zimbabwe', 'dodoma1', '1626026165profil.PNG'),
(10, 'herode', '', 'herode@gmail.com', '$2y$10$wJtl2Pyh80sCagTv6gn7QeQS3MM9X7XtWTiayr0TeGJ8hCUKg8ru2', '', '', 'user.png'),
(11, 'god', '', 'girls@gmail.com', '$2y$10$Tl6R1twcLF/wFiBi7HjqgeHMj.MPdKjjSCt1sZktybZW8aoz71T2C', '', '', 'user.png'),
(14, 'thedonor', '', 'donor@gmail.com', '$2y$10$uo0qP8./kf4ZePUSP5sP6.60GNVn/etEDtfkro5Ach5VCvSTutdNm', 'Tanzania', 'dodoma', '1626028616profil.PNG'),
(18, 'khalid', '', 'khal', '$2y$10$D6pfk.aPlWrwgSRsUvJiauKkNAil/rMGyE7kiDJCKEHYFgvtZ93XS', '', '', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `ngo`
--

CREATE TABLE `ngo` (
  `NGO_id` int(11) NOT NULL,
  `NGO_name` varchar(150) NOT NULL,
  `NGO_country` varchar(10) DEFAULT NULL,
  `NGO_city` varchar(10) DEFAULT NULL,
  `NGO_email` varchar(30) NOT NULL,
  `NGO_password` varchar(500) NOT NULL,
  `NGO_phoneno` varchar(15) DEFAULT NULL,
  `NGO_status` varchar(10) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `NGO_img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngo`
--

INSERT INTO `ngo` (`NGO_id`, `NGO_name`, `NGO_country`, `NGO_city`, `NGO_email`, `NGO_password`, `NGO_phoneno`, `NGO_status`, `admin_id`, `NGO_img`) VALUES
(8, 'save the c', 'Andorra', 'dodoma', 'wema1@gmail.com', '$2y$10$h366pxIFZPwvYZT6ZO6EbOfSV9mZFVXH0B8EYoRZtL7r1Sjs1FXYi', '778899901', 'verified', 0, 'file8ffgg.PNG'),
(10, 'nairo ', 'tanzania', 'dodoma', 'nairo@gmail.com', '$2y$10$xL6sPzHM8.TIgug4tLwv8ObcFj//ngASoDo0S2NrIuvbwXvrFKYni', '099999', 'verified', 0, 'ngo.jpg'),
(25, 'gdhdg', '', '', 'thedonor', '$2y$10$tk4HdOvCEHNe2qM9fZo69Og21Eme3XGKv1NigQN5t105kjEdcypjq', '', 'ordinary', 0, 'ngo.jpg'),
(26, 'khalidi hassan ', '', '', 'winner', '$2y$10$5wpUzszJO3pg.48zAG1.i.jfamDL.PN7dWzqkFceqC3zhn/odMjnK', '', 'ordinary', 0, 'ngo.jpg'),
(27, 'khalidi hassan ', '', '', 'thedonor@gmail.com', '$2y$10$YwAi7c3S7zjgjZa.N./Nh.7KlTNpzu8X2LnFFyRYuieWeSz58Z5W6', '', 'ordinary', 0, 'ngo.jpg'),
(28, 'khalid', '', '', 'p-safaris', '$2y$10$j/aFrtg/mg9dzDAgkRDyZeBtxkGAc0mam/.JytOGbCeLMh0Te36ni', '', 'ordinary', 0, 'ngo.jpg'),
(29, 'ghjghj', '', '', 'khal', '$2y$10$VC4pIa9V6dj3m34qT4NR4.QoRUmLljCnGg7lda4MniDhAAGyF6Sui', '', 'ordinary', 0, 'ngo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_uploads`
--

CREATE TABLE `ngo_uploads` (
  `upload_id` int(11) NOT NULL,
  `path` varchar(100) NOT NULL,
  `upload_date` date NOT NULL,
  `upload_time` time NOT NULL,
  `NGO_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngo_uploads`
--

INSERT INTO `ngo_uploads` (`upload_id`, `path`, `upload_date`, `upload_time`, `NGO_id`) VALUES
(12, 'combinepdf(3).pdf', '0000-00-00', '07:20:02', 8),
(13, 'khalidi_cs_cv_v1.doc', '0000-00-00', '07:45:58', 8),
(14, 'MERGE_SORT.docx', '0000-00-00', '07:49:59', 8);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `req_id` int(11) NOT NULL,
  `request_time` date NOT NULL DEFAULT current_timestamp(),
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
(114, '0000-00-00', 'adfadfas', 'fasdfasd', 0, 'fasdfsa', 'open', 8),
(115, '0000-00-00', 'LOVE WEAKNESS', 'adkfjhlkajh dfaksjd fkaljsd flkas dflksaj dfksj dflkasj dfkasjdf kasdj flaskjd flkasdj lksaj dflksj fksjd flksj dfksdj fskdjf skdljf lksadj fksadjf ksdjf ksjdf ksdjf skjdf klsdjf lksdj fksjd fksjdf ks ldjf hskldjfh lksjdf lksadjflksjdf lksjdf lskdjf ksdj ', 2147483647, 'khalkdhkasd', 'open', 8),
(116, '0000-00-00', 'yyyyyyyyyyyyyyyyyyyyyyyyyy', 'dghdfg', 0, 'dgfhdfg', 'open', 8);

-- --------------------------------------------------------

--
-- Table structure for table `request_images`
--

CREATE TABLE `request_images` (
  `imageID` int(11) NOT NULL,
  `imageURL` varchar(60) NOT NULL,
  `requestID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_images`
--

INSERT INTO `request_images` (`imageID`, `imageURL`, `requestID`) VALUES
(28, 'ffgg.PNG', 114),
(29, 'ghh.PNG', 114),
(30, 'ffgg.PNG', 115),
(31, 'ghh.PNG', 115),
(32, 'images123.png', 116),
(33, 'Spia_logo v2.png', 116);

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
-- Indexes for table `request_images`
--
ALTER TABLE `request_images`
  ADD PRIMARY KEY (`imageID`),
  ADD KEY `reqkey` (`requestID`);

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
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `don_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ngo`
--
ALTER TABLE `ngo`
  MODIFY `NGO_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ngo_uploads`
--
ALTER TABLE `ngo_uploads`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `request_images`
--
ALTER TABLE `request_images`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
-- Constraints for table `request_images`
--
ALTER TABLE `request_images`
  ADD CONSTRAINT `reqkey` FOREIGN KEY (`requestID`) REFERENCES `requests` (`req_id`) ON DELETE CASCADE;

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
