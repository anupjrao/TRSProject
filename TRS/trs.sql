-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2018 at 07:03 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trs`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SelTick` (IN `uid` INT)  NO SQL
BEGIN
select u_id,seat_no,v_id,dot,timeT,tid,price from transaction where u_id=uid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(11) DEFAULT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` char(1) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `pwd` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mvatt`
--

CREATE TABLE `mvatt` (
  `source` varchar(20) DEFAULT NULL,
  `dest` varchar(20) DEFAULT NULL,
  `timeT` time DEFAULT NULL,
  `dot` date DEFAULT NULL,
  `v_id` varchar(5) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mvatt`
--

INSERT INTO `mvatt` (`source`, `dest`, `timeT`, `dot`, `v_id`, `price`) VALUES
('Bangalore', 'Mysore', '17:30:00', '2018-10-09', 'BUS01', 679),
('Chennai', 'Bangalore', '14:00:00', '2018-10-09', 'BUS02', 715),
('Bangalore', 'Chennai', '18:00:00', '2018-10-09', 'BUS03', 799),
('Bangalore', 'Mysore', '04:15:00', '2018-10-09', 'BUS04', 360),
('Bangalore', 'Mysore', '13:00:00', '2018-10-09', 'RLW01', 342),
('Bangalore', 'Delhi', '11:00:00', '2018-10-09', 'RLW02', 1324),
('Bangalore', 'Chennai', '03:00:00', '2018-10-09', 'RLW03', 645),
('Bangalore', 'Delhi', '22:00:00', '2018-10-09', 'AIR01', 7117),
('Chennai', 'Bangalore', '19:35:00', '2018-10-09', 'AIR02', 4523),
('Bangalore', 'Chennai', '15:30:00', '2018-10-09', 'AIR03', 5432),
('Bangalore', 'Delhi', '02:00:00', '2018-10-09', 'AIR04', 6125),
('Delhi', 'Bangalore', '12:00:00', '2018-10-09', 'AIR05', 5441);

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `source` varchar(20) NOT NULL,
  `dest` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`source`, `dest`) VALUES
('Bangalore', 'Chennai'),
('Bangalore', 'Delhi'),
('Bangalore', 'Mysore'),
('Chennai', 'Bangalore'),
('Delhi', 'Bangalore'),
('Mysore', 'Bangalore');

-- --------------------------------------------------------

--
-- Stand-in structure for view `sseats`
-- (See below for the actual view)
--
CREATE TABLE `sseats` (
`v_id` varchar(5)
,`seat_no` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `u_id` int(11) DEFAULT NULL,
  `v_id` varchar(5) DEFAULT NULL,
  `seat_no` int(11) DEFAULT NULL,
  `dot` date DEFAULT NULL,
  `timeT` time DEFAULT NULL,
  `tid` varchar(10) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `transaction`
--
DELIMITER $$
CREATE TRIGGER `IncSeat` BEFORE DELETE ON `transaction` FOR EACH ROW BEGIN
	UPDATE vehicle set seats_av = seats_av + 1 WHERE vehicle.v_id=old.v_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `SeatRed` BEFORE INSERT ON `transaction` FOR EACH ROW BEGIN
	UPDATE vehicle set seats_av = seats_av-1 where vehicle.v_id = new.v_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `v_id` varchar(5) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `seats_av` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`v_id`, `type`, `seats`, `seats_av`) VALUES
('AIR01', 'Airways', 15, 15),
('AIR02', 'Airways', 15, 15),
('AIR03', 'Airways', 15, 15),
('AIR04', 'Airways', 15, 15),
('AIR05', 'Airways', 15, 15),
('BUS01', 'Roadways', 15, 15),
('BUS02', 'Roadways', 15, 15),
('BUS03', 'Roadways', 15, 15),
('BUS04', 'Roadways', 15, 15),
('RLW01', 'Railways', 15, 15),
('RLW02', 'Railways', 15, 15),
('RLW03', 'Railways', 15, 15);

-- --------------------------------------------------------

--
-- Structure for view `sseats`
--
DROP TABLE IF EXISTS `sseats`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sseats`  AS  (select `transaction`.`v_id` AS `v_id`,`transaction`.`seat_no` AS `seat_no` from `transaction`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `mvatt`
--
ALTER TABLE `mvatt`
  ADD KEY `source` (`source`,`dest`,`v_id`),
  ADD KEY `v_id` (`v_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`source`,`dest`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD KEY `u_id` (`u_id`),
  ADD KEY `v_id` (`v_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `mvatt`
--
ALTER TABLE `mvatt`
  ADD CONSTRAINT `mvatt_ibfk_1` FOREIGN KEY (`source`,`dest`) REFERENCES `places` (`source`, `dest`) ON DELETE CASCADE,
  ADD CONSTRAINT `mvatt_ibfk_2` FOREIGN KEY (`v_id`) REFERENCES `vehicle` (`v_id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `u_idref` FOREIGN KEY (`u_id`) REFERENCES `customer` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `v_idref` FOREIGN KEY (`v_id`) REFERENCES `vehicle` (`v_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
