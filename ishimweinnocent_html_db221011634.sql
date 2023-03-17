-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 12:16 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ishimweinnocent_html_db221011634`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `did` int(5) NOT NULL,
  `dfullname` varchar(200) NOT NULL,
  `dgender` char(1) NOT NULL,
  `dphone` bigint(20) NOT NULL,
  `dusername` varchar(50) NOT NULL,
  `dpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`did`, `dfullname`, `dgender`, `dphone`, `dusername`, `dpassword`) VALUES
(2, 'Dr Emmanuel BUGINGO', 'M', 788954381, 'Bugingo', 'Emmanuel'),
(3, 'Winny MURUNGI', 'F', 788971234, 'Winny', 'Murungi123');

--
-- Triggers `doctors`
--
DELIMITER $$
CREATE TRIGGER `afterinsertdoctor` AFTER INSERT ON `doctors` FOR EACH ROW BEGIN
INSERT INTO `users`(`uid`, `did`, `pid`, `rid`, `username`, `password`, `type`) 
VALUES ("",NEW.did,null,null,NEW.dusername,NEW.dpassword,"Doctor");
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `medecine`
--

CREATE TABLE `medecine` (
  `mid` int(5) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `mprice_unit` float NOT NULL,
  `mmfgdate` date NOT NULL,
  `mexpdate` date NOT NULL,
  `total_dose` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medecine`
--

INSERT INTO `medecine` (`mid`, `mname`, `mprice_unit`, `mmfgdate`, `mexpdate`, `total_dose`) VALUES
(2, 'Coartem', 3500, '2022-05-12', '2023-12-12', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payid` int(5) NOT NULL,
  `tid` int(5) NOT NULL,
  `paydate` date NOT NULL,
  `payamount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payid`, `tid`, `paydate`, `payamount`) VALUES
(2, 1, '2023-03-20', 3600);

-- --------------------------------------------------------

--
-- Table structure for table `petients`
--

CREATE TABLE `petients` (
  `peid` int(5) NOT NULL,
  `pefullname` varchar(200) NOT NULL,
  `pegender` char(1) NOT NULL,
  `peage` int(3) NOT NULL,
  `peinsurance` varchar(50) NOT NULL,
  `penationalid` varchar(16) NOT NULL,
  `pephone` bigint(20) NOT NULL,
  `peaddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petients`
--

INSERT INTO `petients` (`peid`, `pefullname`, `pegender`, `peage`, `peinsurance`, `penationalid`, `pephone`, `peaddress`) VALUES
(1, 'Yophes RUKUNDO', 'M', 24, 'RAM', '1199980123726345', 250736452005, 'Nyagatare, Kirebe'),
(2, 'Jordan KATUSHABE', 'M', 25, 'MMI', '1199880123726345', 25078845569, 'Nyagatare, Rwimiyaga'),
(4, 'Ephrem RUKUNDO', 'M', 23, 'MMI', '1200080120926345', 25078875569, 'Kigali, Kabuga');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `pid` int(5) NOT NULL,
  `pfullname` varchar(200) NOT NULL,
  `pgender` char(1) NOT NULL,
  `pphone` bigint(20) NOT NULL,
  `pusername` varchar(50) NOT NULL,
  `ppassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`pid`, `pfullname`, `pgender`, `pphone`, `pusername`, `ppassword`) VALUES
(2, 'Peninnah KABAROKORE', 'F', 250789543265, 'Kabarokore', 'Peninnah123'),
(3, 'Jeaninne MUTONI', 'F', 250729125681, 'Muton Jeaninne', 'Janinne21');

--
-- Triggers `pharmacist`
--
DELIMITER $$
CREATE TRIGGER `afterinsertpharmancist` AFTER INSERT ON `pharmacist` FOR EACH ROW BEGIN
INSERT INTO `users`(`uid`, `did`, `pid`, `rid`, `username`, `password`, `type`) 
VALUES ("",null,NEW.pid,null,NEW.pusername,NEW.ppassword,"Pharmacist");
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reception`
--

CREATE TABLE `reception` (
  `rid` int(5) NOT NULL,
  `rfullname` varchar(200) NOT NULL,
  `rgender` char(1) NOT NULL,
  `rphone` bigint(20) NOT NULL,
  `rusername` varchar(50) NOT NULL,
  `rpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reception`
--

INSERT INTO `reception` (`rid`, `rfullname`, `rgender`, `rphone`, `rusername`, `rpassword`) VALUES
(5, 'Merone CYOMUKAMA', 'F', 250788953261, 'Cyomukama', 'Merone123');

--
-- Triggers `reception`
--
DELIMITER $$
CREATE TRIGGER `afterinsertrecept` AFTER INSERT ON `reception` FOR EACH ROW BEGIN
INSERT INTO `users`(`uid`, `did`, `pid`, `rid`, `username`, `password`, `type`) 
VALUES ("",null,null,NEW.rid,NEW.rusername,NEW.rpassword,"Reception");
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `releasedmedecine`
--

CREATE TABLE `releasedmedecine` (
  `reid` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `tid` int(5) NOT NULL,
  `mid` int(5) NOT NULL,
  `doses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `releasedmedecine`
--

INSERT INTO `releasedmedecine` (`reid`, `pid`, `tid`, `mid`, `doses`) VALUES
(10, 3, 1, 2, '20 Doses');

--
-- Triggers `releasedmedecine`
--
DELIMITER $$
CREATE TRIGGER `afterinsertrelease` AFTER INSERT ON `releasedmedecine` FOR EACH ROW BEGIN
UPDATE medecine SET medecine.total_dose=medecine.total_dose-NEW.doses where medecine.mid=NEW.mid;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `tid` int(5) NOT NULL,
  `did` int(5) NOT NULL,
  `peid` int(5) NOT NULL,
  `tsymptom` varchar(30) NOT NULL,
  `tdeseases` varchar(30) NOT NULL,
  `medcine` varchar(50) NOT NULL,
  `doses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`tid`, `did`, `peid`, `tsymptom`, `tdeseases`, `medcine`, `doses`) VALUES
(1, 3, 2, 'Fever and Headache', 'Malaria', 'Parstamol and Coartem', '2 doses Coartem 2 doses Parstamol');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(5) NOT NULL,
  `did` int(5) DEFAULT NULL,
  `pid` int(5) DEFAULT NULL,
  `rid` int(5) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `did`, `pid`, `rid`, `username`, `password`, `type`) VALUES
(4, NULL, NULL, NULL, 'Ishimwe', 'Innocent123', 'Admin'),
(7, 2, NULL, NULL, 'Bugingo', 'Emmanuel', 'Doctor'),
(8, NULL, NULL, 5, 'Cyomukama', 'Merone123', 'Reception'),
(9, 3, NULL, NULL, 'Winny', 'Murungi123', 'Doctor'),
(10, NULL, 2, NULL, 'Kabarokore', 'Peninnah123', 'Pharmacist'),
(11, NULL, 3, NULL, 'Muton Jeaninne', 'Janinne21', 'Pharmacist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `medecine`
--
ALTER TABLE `medecine`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `petients`
--
ALTER TABLE `petients`
  ADD PRIMARY KEY (`peid`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `reception`
--
ALTER TABLE `reception`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `releasedmedecine`
--
ALTER TABLE `releasedmedecine`
  ADD PRIMARY KEY (`reid`),
  ADD KEY `pid` (`pid`,`mid`),
  ADD KEY `peid` (`tid`),
  ADD KEY `tid` (`tid`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `did` (`did`,`peid`),
  ADD KEY `did_2` (`did`),
  ADD KEY `peid` (`peid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `did` (`did`,`pid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `rid` (`rid`),
  ADD KEY `rid_2` (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `did` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medecine`
--
ALTER TABLE `medecine`
  MODIFY `mid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `petients`
--
ALTER TABLE `petients`
  MODIFY `peid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `pid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reception`
--
ALTER TABLE `reception`
  MODIFY `rid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `releasedmedecine`
--
ALTER TABLE `releasedmedecine`
  MODIFY `reid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `tid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `treatment` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `releasedmedecine`
--
ALTER TABLE `releasedmedecine`
  ADD CONSTRAINT `releasedmedecine_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `treatment` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `releasedmedecine_ibfk_3` FOREIGN KEY (`mid`) REFERENCES `medecine` (`mid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `treatment`
--
ALTER TABLE `treatment`
  ADD CONSTRAINT `treatment_ibfk_1` FOREIGN KEY (`did`) REFERENCES `doctors` (`did`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `treatment_ibfk_2` FOREIGN KEY (`peid`) REFERENCES `petients` (`peid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`did`) REFERENCES `doctors` (`did`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `pharmacist` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`rid`) REFERENCES `reception` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
