-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 04:58 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicles`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ID` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `name`, `email`, `username`, `password`) VALUES
(1, 'Sharon Duke', 'admin@gmail.com', 'admin', '$2y$10$IBLju8Za3SUikKoglg.HpeSDvyLtox.p3QCkiSDuKgk19tvVPodrK');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_ID` int(11) NOT NULL,
  `vehicle_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `book_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pickup` varchar(100) NOT NULL,
  `dropoff` varchar(100) NOT NULL,
  `location` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_ID`, `vehicle_ID`, `user_ID`, `book_date`, `pickup`, `dropoff`, `location`, `status`) VALUES
(1, 2, 2, '2022-01-31 07:12:57', '2022-02-01', '2022-02-04', 'sdfd', 0),
(2, 3, 2, '2022-01-31 07:14:38', '2009-05-18', '1988-09-13', 'Distinctio Proident', 0),
(3, 2, 2, '2022-01-31 06:24:31', '2022-01-27', '2022-01-28', 'Proident sunt ut to', 1),
(4, 3, 3, '2023-04-25 02:46:28', '2023-04-05', '2023-04-05', 'lakitpur', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_ID` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_ID`, `category_name`) VALUES
(1, 'Car'),
(2, 'Two Wheel');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_ID` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_ID`, `name`, `email`, `subject`, `message`, `user_ID`) VALUES
(3, 'Gil Spears', 'notyfe@mailinator.com', 'Ipsam quaerat nostru', 'Animi quibusdam exe', 2),
(4, 'Bhim', 'bindaspuskar@gmail.com', 'physics', 'vfdvdv', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `birth` varchar(250) NOT NULL,
  `license` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `zip` mediumtext NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `firstname`, `lastname`, `email`, `phone`, `birth`, `license`, `state`, `address`, `zip`, `password`) VALUES
(2, 'Pamela', 'Branch', 'harry@gmail.com', 1, '2000-10-14', 'Et sit ipsum commod', 'Aut proident dolore', 'Eveniet dolores und', '28660', '$2y$10$6vYTmOi86s.x/N17dW6VZuaexX7fKp/dOwaXu/h5vLRWHUNNmK8XC'),
(3, 'puskar', 'bhandari', 'bindaspuskar@gmail.com', 9867343148, '2023-03-27', 'puskarbha@gmail.com', '1', 'Sarawal-1', '12352', '$2y$10$xDrMo0mHo.tBO5BSH8o8eeiTwEWDXxujG8jLbqgIxHu6dJ2y4S7P.');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_ID` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `brand` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `engine` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `transmission` varchar(250) NOT NULL,
  `features` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `style` varchar(250) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(200) NOT NULL,
  `submitted_by` int(11) NOT NULL,
  `published_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_ID`, `name`, `brand`, `type`, `engine`, `status`, `transmission`, `features`, `description`, `style`, `price`, `image`, `submitted_by`, `published_date`) VALUES
(3, 'Velma Carney', 'Dignissimos fugiat ', '1', 'Ea nihil sunt volupt', 'Totam quisquam aliqu', 'Error praesentium qu', 'Blanditiis nemo erro', 'Et dolores ex rerum ', 'Delectus eu reprehe', '948.00', '27987.jpeg', 1, '2022-01-31 05:49:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
