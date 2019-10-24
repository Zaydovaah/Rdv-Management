-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2019 at 08:47 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.3.10-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `RDV_Management`
--

-- --------------------------------------------------------

--
-- Table structure for table `Doc`
--

CREATE TABLE `Doc` (
  `docID` int(255) NOT NULL,
  `roleID` int(200) NOT NULL,
  `docFirst` varchar(255) NOT NULL,
  `docLast` varchar(255) NOT NULL,
  `specID` int(200) NOT NULL,
  `docPhone` int(9) NOT NULL,
  `docAddress` varchar(255) NOT NULL,
  `docMail` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Doc`
--

INSERT INTO `Doc` (`docID`, `roleID`, `docFirst`, `docLast`, `specID`, `docPhone`, `docAddress`, `docMail`, `username`, `password`) VALUES
(1, 3, 'Urahara', 'Kisuke', 1, 777777777, 'Karakura Town', 'kisuke@gmail.com', 'doctor1', 'doctor1'),
(2, 3, 'Tsunade', 'Sarutobi', 2, 772114145, 'Konoha, Land of Fire', 'sarutobi@gmail.com', 'doctor2', 'doctor2'),
(3, 3, 'Sakura', 'Haruno', 3, 77456123, 'Konoha, Land of Fire', 'haruno@gmail.com', 'doctor3', 'doctor3'),
(4, 3, 'Inoue', 'Orihime', 4, 774561235, 'Karakura town', 'orihime@gmail.com', 'doctor4', 'doctor4'),
(5, 3, 'Wendy', 'Marvell', 5, 774561238, 'Fiore, Fairy Tail', 'Wendy@gmail.com', 'doctor4', 'doctor4'),
(6, 3, 'Elizabeth', 'Liones', 6, 774561236, 'Somewhere', 'liones@gmail.com', 'doctor6', 'doctor6'),
(7, 3, 'Unohana', 'Yachiru', 7, 774561234, 'Soul Society', 'kenpachi1@gmail.com', 'Kenpachi', 'Kenpachi1');

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE `Patient` (
  `patientID` int(200) NOT NULL,
  `patientFirst` varchar(255) NOT NULL,
  `patientLast` varchar(255) NOT NULL,
  `patientPhone` int(10) NOT NULL,
  `patientAddress` varchar(255) NOT NULL,
  `patientCNI` bigint(17) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`patientID`, `patientFirst`, `patientLast`, `patientPhone`, `patientAddress`, `patientCNI`) VALUES
(1, 'Waver', 'Velvet', 778888887, 'Somewhere', 12345678912345678),
(2, 'Sasuke', 'Ushiha', 773213221, 'Konoha, Land of Fire', 123456778978945),
(3, 'Zabuza', 'Momochi', 775122336, 'Kiri, Hidden village of the mist', 741852966),
(5, 'Rock', 'Lee', 776569984, 'Konoha, Land of Fire', 156329523),
(6, 'Azou', 'Ushiha', 776569981, 'Dakar, Golf', 12345678912345678),
(7, 'Erza', 'Velvet', 774561234, 'Dakar, Golf', 45678912336985);

-- --------------------------------------------------------

--
-- Table structure for table `Rdv`
--

CREATE TABLE `Rdv` (
  `rdvID` int(200) NOT NULL,
  `patientID` int(200) NOT NULL,
  `servID` int(200) NOT NULL,
  `docID` int(200) NOT NULL,
  `rdvDate` date NOT NULL,
  `rdvTime` varchar(10) DEFAULT NULL,
  `dateTime` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `id` int(200) NOT NULL,
  `roleID` int(200) NOT NULL,
  `roleName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`id`, `roleID`, `roleName`) VALUES
(1, 1, 'Admin'),
(2, 2, 'Secretary'),
(3, 3, 'Doctor');

-- --------------------------------------------------------

--
-- Table structure for table `Secretary`
--

CREATE TABLE `Secretary` (
  `secID` int(200) NOT NULL,
  `roleID` int(200) NOT NULL,
  `secFirst` varchar(255) NOT NULL,
  `secLast` varchar(255) NOT NULL,
  `servID` int(200) NOT NULL,
  `secPhone` int(9) NOT NULL,
  `secAddress` varchar(255) NOT NULL,
  `secMail` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Secretary`
--

INSERT INTO `Secretary` (`secID`, `roleID`, `secFirst`, `secLast`, `servID`, `secPhone`, `secAddress`, `secMail`, `username`, `password`) VALUES
(1, 2, 'Maria', 'Hill', 1, 778888884, 'DC-Washington', 'Hill@gmail.com', 'secretary1', 'secretary1'),
(2, 2, 'Hinata', 'Hyuga', 2, 777702904, 'Konoha, Land of Fire', 'Hinata@gmail.com', 'secretary2', 'secretary2'),
(3, 2, 'Tenten', 'Something', 3, 774561235, 'Konoha, Land of Fire', 'tenten@gmail.com', 'Tenten', 'Tenten10');

-- --------------------------------------------------------

--
-- Table structure for table `Service`
--

CREATE TABLE `Service` (
  `servID` int(200) NOT NULL,
  `servName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Service`
--

INSERT INTO `Service` (`servID`, `servName`) VALUES
(1, 'Maternite'),
(2, 'Cardiologie'),
(3, 'Pediatrie'),
(4, 'Odontologie'),
(5, 'Dermatologie'),
(6, 'Stomatologie'),
(7, 'Virologie'),
(8, 'Neurologie');

-- --------------------------------------------------------

--
-- Table structure for table `Speciality`
--

CREATE TABLE `Speciality` (
  `specID` int(200) NOT NULL,
  `specName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Speciality`
--

INSERT INTO `Speciality` (`specID`, `specName`) VALUES
(1, 'Gynecologue'),
(2, 'Chirurgien'),
(3, 'Cardiologue'),
(4, 'Dermatologue'),
(5, 'Cancerologue'),
(6, 'Chirurgien Dentiste'),
(7, 'Neurologue');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `roleID` int(200) NOT NULL,
  `username` varchar(40) NOT NULL DEFAULT '',
  `password` varchar(40) NOT NULL DEFAULT '',
  `firstname` varchar(40) NOT NULL DEFAULT '',
  `lastname` varchar(40) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `roleID`, `username`, `password`, `firstname`, `lastname`, `email`) VALUES
(1, 1, 'admin', 'admin', 'Azzou ', 'Gueye', 'assanesimbad@gmail.com'),
(3, 2, 'secretary2', 'secretary2', 'Hinata', 'Hyuga', 'Hinata@gmail.com'),
(4, 3, 'doctor1', 'doctor1', 'Urahara', 'Kisuke', 'kisuke@gmail.com'),
(5, 3, 'doctor2', 'doctor2', 'Tsunade', 'Sarutobi', 'sarutobi@gmail.com'),
(6, 3, 'doctor3', 'doctor3', 'Sakura', 'Haruno', 'haruno@gmail.com'),
(7, 3, 'doctor4', 'doctor4', 'Inoue', 'Orihime', 'orihime@gmail.com'),
(8, 3, 'doctor5', 'doctor5', 'Wendy', 'Marvell', 'Wendy@gmail.com'),
(9, 3, 'doctor6', 'doctor6', 'Elizabeth', 'Liones', 'liones@gmail.com'),
(10, 3, 'doctor7', 'Kenpachi1', 'Unohana', 'Yashiru', 'Kenpachi1@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Doc`
--
ALTER TABLE `Doc`
  ADD PRIMARY KEY (`docID`);

--
-- Indexes for table `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`patientID`),
  ADD UNIQUE KEY `patientPhone` (`patientPhone`);

--
-- Indexes for table `Rdv`
--
ALTER TABLE `Rdv`
  ADD PRIMARY KEY (`rdvID`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Secretary`
--
ALTER TABLE `Secretary`
  ADD PRIMARY KEY (`secID`);

--
-- Indexes for table `Service`
--
ALTER TABLE `Service`
  ADD PRIMARY KEY (`servID`);

--
-- Indexes for table `Speciality`
--
ALTER TABLE `Speciality`
  ADD PRIMARY KEY (`specID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Doc`
--
ALTER TABLE `Doc`
  MODIFY `docID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Patient`
--
ALTER TABLE `Patient`
  MODIFY `patientID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Rdv`
--
ALTER TABLE `Rdv`
  MODIFY `rdvID` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Secretary`
--
ALTER TABLE `Secretary`
  MODIFY `secID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Service`
--
ALTER TABLE `Service`
  MODIFY `servID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Speciality`
--
ALTER TABLE `Speciality`
  MODIFY `specID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
