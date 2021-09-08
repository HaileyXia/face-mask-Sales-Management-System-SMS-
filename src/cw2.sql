

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `DBI`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user` varchar(15) NOT NULL,
  `realname` varchar(15) NOT NULL,
  `pwd` varchar(15) NOT NULL,
  `passportID` varchar(15) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `region` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user`, `realname`, `pwd`, `passportID`, `tel`, `region`, `email`) VALUES
('Ann', 'Ann', '111111', 'EA12345', '13112345678', 'UK', 'Ann@163.com'),
('Chris', 'Chris', '111111', 'EA19288', '87652456171', 'UK', 'Chris@gmail.com'),
('David', 'David', '111111', 'EA23456', '12345678123', 'Japan', 'David@gmail.com'),
('Jack   ', 'Jack  ', '111111', 'EA34567', '12234443444', 'USA', 'Jack@gmail.com'),
('Jimmy', 'Jimmy', '111111', 'EA45678', '23456789012', 'UK', 'Jimmy@163.com'),
('Paul', 'Paul', '111111', 'EA56789', '12345678123', 'USA', 'Paul@gmail.com'),
('Peter', 'Peter', '111111', 'EA67890', '18167157533', 'UK', 'Peter@163.com'),
('Prapa', 'Prapa', '111111', 'EA78901', '12345678123', 'China', 'Prapa@gmail.com'),
('Tom', 'Tom', '111111', 'EA89012', '12345678901', 'Japan', 'Tom@163.com'),
('xtq', 'xtq', '111111', 'EA90123', '18167157533', 'China', 'scytx1@nottingham.edu.cn');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `user` varchar(15) NOT NULL,
  `realn` varchar(15) NOT NULL,
  `pwd` varchar(15) NOT NULL,
  `managerID` varchar(15) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `region` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`user`, `realn`, `pwd`, `managerID`, `tel`, `region`, `email`) VALUES
('manager1', 'Alex', '000000', 'M001', '13312345678', 'China', '123@163.com');

-- --------------------------------------------------------

--
-- Table structure for table `ordering`
--

CREATE TABLE `ordering` (
  `quantityN95` int(11) DEFAULT NULL,
  `quantityS` int(11) DEFAULT NULL,
  `quantitySN95` int(11) DEFAULT NULL,
  `amount` float NOT NULL,
  `orderingID` int(11) NOT NULL,
  `user` varchar(25) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `region` varchar(25) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `ordertime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `excess` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordering`
--

INSERT INTO `ordering` (`quantityN95`, `quantityS`, `quantitySN95`, `amount`, `orderingID`, `user`, `tel`, `region`, `employeeID`, `ordertime`, `excess`) VALUES
(1, 1, 1, 17, 28, 'Ann', '13112345678', 'UK', 3, '2020-05-16 17:06:07', 0),
(10, 10, 10, 170, 31, 'xtq', '18167157533', 'China', 1, '2020-05-16 17:20:39', 0),
(10, 10, 10, 170, 32, 'xtq', '18167157533', 'China', 2, '2020-05-18 17:20:44', 0),
(10, 10, 10, 170, 33, 'xtq', '18167157533', 'China', 1, '2020-05-18 17:34:50', 0),
(1, 1, 1, 17, 35, 'xtq', '18167157533', 'China', 1, '2020-05-19 02:49:36', 0),
(1, 1, 1, 17, 36, 'xtq', '18167157533', 'China', 1, '2020-05-19 02:49:41', 0),
(1, 1, 1, 17, 37, 'xtq', '18167157533', 'China', 1, '2020-05-19 02:49:45', 0),
(1, 1, 1, 17, 38, 'xtq', '18167157533', 'China', 1, '2020-05-19 02:49:51', 0),
(1, 1, 1, 17, 39, 'xtq', '18167157533', 'China', 1, '2020-05-19 02:49:54', 0),
(1, 1, 1, 17, 40, 'xtq', '18167157533', 'China', 2, '2020-05-19 03:53:06', 0),
(100, 100, 100, 1700, 41, 'xtq', '18167157533', 'China', 2, '2020-05-19 03:56:38', 0),
(50, 50, 50, 850, 45, 'xtq', '18167157533', 'China', 2, '2020-05-19 07:19:28', 0),
(10, 10, 10, 170, 47, 'Prapa', '12345678123', 'China', 2, '2020-05-20 06:37:22', 0),
(1, 1, 1, 17, 48, 'Prapa', '12345678123', 'China', 2, '2020-05-20 07:37:59', 0),
(5, 5, 5, 85, 50, 'Paul', '12345678123', 'USA', 5, '2020-05-21 04:45:27', 0),
(5, 5, 5, 85, 51, 'Paul', '12345678123', 'USA', 6, '2020-05-21 04:45:39', 0),
(10, 10, 10, 170, 52, 'David', '12345678123', 'Japan', 7, '2020-05-21 04:46:47', 0),
(10, 5, 5, 110, 53, 'David', '12345678123', 'Japan', 8, '2020-05-21 04:46:59', 0),
(4, 4, 4, 68, 54, 'Ann', '13112345678', 'UK', 4, '2020-05-21 05:08:09', 0),
(1, 1, 1, 17, 55, 'David', '12345678123', 'Japan', 7, '2020-05-21 05:26:42', 0),
(2, 2, 2, 34, 56, 'Ann', '13112345678', 'UK', 3, '2020-05-23 08:35:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rep`
--

CREATE TABLE `rep` (
  `user` varchar(15) NOT NULL,
  `realname` varchar(15) NOT NULL,
  `pwd` varchar(15) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `region` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `quotaN95` int(11) DEFAULT NULL,
  `quotaSN95` int(11) DEFAULT NULL,
  `quotaS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rep`
--

INSERT INTO `rep` (`user`, `realname`, `pwd`, `employeeID`, `tel`, `region`, `email`, `quotaN95`, `quotaSN95`, `quotaS`) VALUES
('Rep1', 'Ben', '111111', 1, '13112345678', 'China', 'Rep1@woolin.com', 395, 395, 395),
('Rep2', 'Dan', '111111', 2, '13112345679', 'China', 'Rep2@woolin.com', 89, 89, 89),
('Rep3', 'Jack', '111111', 3, '13112345670', 'UK', 'Rep3@woolin.com', 50, 50, 50),
('Rep4', 'John', '111111', 4, '13312345670', 'UK', 'Rep4@woolin.com', 66, 36, 36),
('Rep5', 'Mary', '111111', 5, '13312345678', 'USA', 'Rep5@woolin.com', 195, 195, 195),
('Rep6', 'Jane', '111111', 6, '15112345678', 'USA', 'Rep6@woolin.com', 195, 195, 195),
('Rep7', 'Molly', '111111', 7, '17012345678', 'Japan', 'Rep7@woolin.com', 489, 489, 489),
('Rep8', 'Sue', '111111', 8, '18012345678', 'Japan', 'Rep8@woolin.com', 90, 95, 95);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`managerID`);

--
-- Indexes for table `ordering`
--
ALTER TABLE `ordering`
  ADD PRIMARY KEY (`orderingID`);

--
-- Indexes for table `rep`
--
ALTER TABLE `rep`
  ADD PRIMARY KEY (`employeeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ordering`
--
ALTER TABLE `ordering`
  MODIFY `orderingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `rep`
--
ALTER TABLE `rep`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;