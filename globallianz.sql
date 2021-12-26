-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 23, 2020 at 12:15 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `globallianz`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` tinytext CHARACTER SET utf8 NOT NULL,
  `username` varchar(200) CHARACTER SET utf8 NOT NULL,
  `status` varchar(40) DEFAULT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `lead_id`, `userid`, `comment`, `username`, `status`, `created_date`) VALUES
(1, 1, 2, 'Now i am follow up this lead', 'Vijay', 'Follow Up', '2020-03-08 19:19:48'),
(2, 2, 1, 'Testing', 'Globallianz', 'Follow Up', '2020-03-17 13:26:38'),
(3, 1, 1, '', 'Globallianz', 'Negotiation', '2020-06-04 10:24:21'),
(4, 1, 1, '', 'Globallianz', 'Importance', '2020-06-04 10:25:25'),
(5, 1, 1, '', 'Globallianz', 'E Relevant', '2020-06-04 10:27:19'),
(6, 1, 1, '', 'Globallianz', 'Importance', '2020-06-04 10:27:55'),
(7, 1, 1, '', 'Globallianz', 'Follow Up', '2020-06-04 10:29:44'),
(8, 1, 1, 'Testing', 'Globallianz', 'Importance', '2020-06-04 10:32:06'),
(9, 14, 1, 'Lwlar kam kar', 'Globallianz', 'Not Contacted', '2020-09-20 15:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lead`
--

CREATE TABLE `tbl_lead` (
  `id` int(11) NOT NULL,
  `lead_id` varchar(200) DEFAULT NULL,
  `customer_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `company_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `state` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_no` varchar(200) DEFAULT NULL,
  `secondary_mobile_no` varchar(30) DEFAULT NULL,
  `email_id` varchar(200) DEFAULT NULL,
  `requirement` varchar(1000) DEFAULT NULL,
  `description` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `lead_source` varchar(500) DEFAULT NULL,
  `status` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `assigned_by` varchar(200) DEFAULT NULL,
  `assigned_to` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lead`
--

INSERT INTO `tbl_lead` (`id`, `lead_id`, `customer_name`, `company_name`, `city`, `state`, `mobile_no`, `secondary_mobile_no`, `email_id`, `requirement`, `description`, `lead_source`, `status`, `userid`, `address`, `assigned_by`, `assigned_to`, `created_date`) VALUES
(1, '1583674851', 'Testing123', 'Lead', 'Pune', 'maha', '9145342321', '', 'testing2@gmail.com', 'adfasfas', 'adfasfas', '', 'Importance', 2, NULL, 'Globallianz', 'Vijay', '2020-03-08 19:10:51'),
(2, '1583754972', 'Vivekanand Gaikwad', 'Globallianz', 'Pune', 'Maharashtra', '7507012305', '+917507012305', 'vivekanand.gaikwad30@gmail.com', '', '', '', 'Follow Up', 2, NULL, 'Globallianz', 'Vijay', '2020-03-09 17:26:12'),
(3, '1583766291', 'Shinde S.', 'XYZ', 'Pune', 'Maharashtra', '8888888888', '123456789', '', 'P10 LED display', '6*10', 'Indiamart', 'Not Contacted', 3, NULL, 'Vivekanand Gaikwad', 'Vivekanand Gaikwad', '2020-03-09 20:34:51'),
(4, '1585919337', 'Testing123', 'Lead', 'Pune', 'maha', '9145342321', '', 'testing2@gmail.com', '', '', 'Self', 'Follow Up', 3, NULL, 'Globallianz', 'Vivekanand Gaikwad', '2020-04-03 18:38:57'),
(5, '1315403438', 'ANEES', NULL, 'Mumbai', 'Maharashtra', '+91-9820026080', NULL, 'unease@gmail.com', 'Requirement for Digital Advertising Screen', 'Sandeep can it be used as a single piece alone  is there a smaller size available\n\n Quantity:   500   piece\n Viewing Distance:   3 feet \n Dimensions:   4 inch x 4 inch \n Probable Order Value:   50 Lak', 'Indiamart', 'Not Contacted', NULL, ', Mumbai, Maharashtra, ', NULL, NULL, '2020-04-25 13:00:46'),
(6, '1315375318', 'Muskan', NULL, 'New Delhi', 'Delhi', '+91-8851783415', NULL, 'abhigarg991171@gmail.com', 'Requirement for USB Powered Mini LED Fan Diy Programmable Message with Fan', 'I want to buy USB Powered Mini LED Fan Diy Programmable Message with Fan. \n\nKindly send me price and other details.\n\n Shape:   Round \n Lighting Type:   LED \n Why do you need this:   For Home Use \n', 'Indiamart', 'Not Contacted', NULL, ', New Delhi, Delhi, ', NULL, NULL, '2020-04-25 12:35:28'),
(7, '1314921901', 'Anitesh Mandal', 'Ani Online', 'Bardhaman', 'West Bengal', '+91-7001990836', NULL, 'anionlinein@gmail.com', 'Requirement for Moving Massage Display', 'I am interested in buying Moving Massage Display. \n\nKindly send me price and other details.\n\n', 'Indiamart', 'Not Contacted', NULL, 'Village - Galsi, Galsi Nh 2, Bardhaman, West Bengal, 713406', NULL, NULL, '2020-04-24 18:25:55'),
(8, '1314654036', 'Sibi', NULL, 'Pune', 'Maharashtra', '+91-9819239897', NULL, 'sibi.jacob@adityabirla.com', 'Requirement for SMD LED Module', 'I am interested in buying SMD LED Module. \n For business purpose Color Single\nKindly send me price and other details.\n\n Quantity:   500   piece\n Type:   Outdoor Type \n Shape:   Rectangle \n Why do you ', 'Indiamart', 'Not Contacted', NULL, ', Pune, Maharashtra, ', NULL, NULL, '2020-04-24 13:31:32'),
(9, '1314382029', 'Surendra Singh', NULL, 'Bharatpur', 'Rajasthan', '+91-9829893648', NULL, 'surendrasingh11076@gmail.com', 'Requirement for LED Programmable Red Message Fan', 'I am interested in LED Programmable Message Fan Red\n\n Quantity:   1   Piece\n Shape:   Clock,   Square,   Round,   Rectangle \n Approximate Order Value:   Upto 1,000 \n Currency:   INR - Indian Rupee \n', 'Indiamart', 'Not Contacted', NULL, ', Bharatpur, Rajasthan, ', NULL, NULL, '2020-04-24 08:45:12'),
(10, '1314144761', 'Vimalkumar', NULL, 'Thrissur', 'Kerala', '+91-8281471531', NULL, 'vimalkumar.988@gmail.com', 'Requirement for LED Name Badge', 'My Requirement is for LED Name Badge. \n\nKindly send me price and other details.\n\n Quantity:   1   piece\n Probable Requirement Type:   Business Use \n', 'Indiamart', 'Not Contacted', NULL, ', Thrissur, Kerala, ', NULL, NULL, '2020-04-23 18:37:51'),
(11, '1313287471', 'Tushar', 'TNV & Company', 'Surat', 'Gujarat', '+91-9904990685', '+91-8780901165', 'vegadtushar96@gmail.com', 'Requirement for USB Powered Mini LED Fan', 'I want to purchase USB Powered Mini LED Fan Diy Programmable Message with Fan, Type of Lighting Application: Indoor Li. \n\nKindly send me price and other details.\n\n', 'Indiamart', 'Not Contacted', NULL, '284, Lalita Park, Katargan, Surat, Gujarat, 395004', NULL, NULL, '2020-04-22 17:05:54'),
(12, '1313105146', 'Tanveer Ashraf', 'Automation Technologies', 'Bhilai', 'Chhattisgarh', '+91-9755706709', '+91-8819071019', 'tanveer4u26@gmail.com', 'Requirement for LED Video Wall', 'I am interested in buying LED Video Wall. \n\nKindly send me price and other details.\n\n', 'Indiamart', 'Not Contacted', NULL, 'No. 2/11, New Krishna Nagar, Supela, , Bhilai, Chhattisgarh, 490023', NULL, NULL, '2020-04-22 14:03:18'),
(13, '1311891495', 'Anil Kumar', 'Akshaya Marketing', 'Hyderabad', 'Telangana', '9849005004', '', 'akpulakanti@gmail.com', 'Requirement for Scroll Board', 'Requirement for Scroll Board', 'Indiamart', 'Not Contacted', 2, '1st Floor, Maruthi Tower, Tower Street, , Hyderabad, Telangana, 500003', 'Globallianz', 'Vijay', '2020-04-20 20:41:12'),
(14, '1311538178', 'Praju', '', 'Omerga', 'Maharashtra', '7822998138', '', 'priyadarshani.kasabe@gmail.com', 'Requirement for P10 LED Module', 'Requirement for P10 LED Module', 'Indiamart', 'Not Contacted', 2, ', Omerga, Maharashtra, ', 'Globallianz', 'Vijay', '2020-04-20 13:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `id` int(11) NOT NULL,
  `from_username` varchar(200) CHARACTER SET utf8 NOT NULL,
  `to_username` varchar(200) CHARACTER SET utf8 NOT NULL,
  `from_userid` int(11) NOT NULL,
  `to_userid` int(11) NOT NULL,
  `message` varchar(500) CHARACTER SET utf8 NOT NULL,
  `view` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `lead_id` bigint(20) NOT NULL,
  `Notification_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`id`, `from_username`, `to_username`, `from_userid`, `to_userid`, `message`, `view`, `created_date`, `status`, `lead_id`, `Notification_type`) VALUES
(1, 'Globallianz', 'Vijay', 1, 2, '<b style=\"color:green\">Lead ID 1583674851</b> This Lead Assign you', 1, '2020-03-08 19:10:51', 'active', 1, 'Lead'),
(2, 'Vijay', 'Globallianz', 2, 1, '<b style=\"color:green\">ID ID1583674851</b> Commented', 1, '2020-03-08 19:19:48', 'active', 1, 'Lead'),
(3, 'Globallianz', 'Vijay', 1, 2, '<b style=\"color:green\">Lead ID 1583754972</b> This Lead Assign you', 1, '2020-03-09 17:26:12', 'active', 2, 'Lead'),
(4, 'Vivekanand Gaikwad', 'Globallianz', 3, 1, '<b style=\"color:green\">Vivekanand Gaikwad</b> This Employee Created New Lead', 1, '2020-03-09 20:34:51', 'active', 3, 'Lead'),
(5, 'Globallianz', 'Vijay', 1, 2, '<b style=\"color:green\">ID ID1583754972</b> Commented', 1, '2020-03-17 13:26:38', 'active', 2, 'Lead'),
(6, 'Globallianz', 'Vivekanand Gaikwad', 1, 3, '<b style=\"color:green\">Lead ID 1585919337</b> This Lead Assign you', 0, '2020-04-03 18:38:57', 'active', 4, 'Lead'),
(7, 'Admin', 'Vijay', 1, 2, '<b style=\"color:green\">Lead ID 1315375318</b> India Mart Lead Assing You', 1, '2020-04-27 11:11:27', 'active', 6, 'Lead'),
(8, 'India Mart', 'Admin', 1, 1, '<b style=\"color:green\">Lead ID 1315375318</b> India Mart Lead Assign To Vijay This Employee', 1, '2020-04-27 11:11:27', 'active', 6, 'Lead'),
(9, 'Admin', 'Vivekanand Gaikwad', 1, 3, '<b style=\"color:green\">Lead ID 1314921901</b> India Mart Lead Assing You', 0, '2020-04-27 11:11:27', 'active', 7, 'Lead'),
(10, 'India Mart', 'Admin', 1, 1, '<b style=\"color:green\">Lead ID 1314921901</b> India Mart Lead Assign To Vivekanand Gaikwad This Employee', 1, '2020-04-27 11:11:27', 'active', 7, 'Lead'),
(11, 'Admin', 'Vijay', 1, 2, '<b style=\"color:green\">Lead ID 1314654036</b> India Mart Lead Assing You', 1, '2020-04-27 11:11:27', 'active', 8, 'Lead'),
(12, 'India Mart', 'Admin', 1, 1, '<b style=\"color:green\">Lead ID 1314654036</b> India Mart Lead Assign To Vijay This Employee', 1, '2020-04-27 11:11:27', 'active', 8, 'Lead'),
(13, 'Admin', 'Vivekanand Gaikwad', 1, 3, '<b style=\"color:green\">Lead ID 1314382029</b> India Mart Lead Assing You', 0, '2020-04-27 11:11:27', 'active', 9, 'Lead'),
(14, 'India Mart', 'Admin', 1, 1, '<b style=\"color:green\">Lead ID 1314382029</b> India Mart Lead Assign To Vivekanand Gaikwad This Employee', 1, '2020-04-27 11:11:27', 'active', 9, 'Lead'),
(15, 'Admin', 'Vijay', 1, 2, '<b style=\"color:green\">Lead ID 1314144761</b> India Mart Lead Assing You', 1, '2020-04-27 11:11:27', 'active', 10, 'Lead'),
(16, 'India Mart', 'Admin', 1, 1, '<b style=\"color:green\">Lead ID 1314144761</b> India Mart Lead Assign To Vijay This Employee', 1, '2020-04-27 11:11:27', 'active', 10, 'Lead'),
(17, 'Admin', 'Vijay', 1, 2, '<b style=\"color:green\">Lead ID 1313287471</b> India Mart Lead Assing You', 1, '2020-04-27 11:11:27', 'active', 11, 'Lead'),
(18, 'India Mart', 'Admin', 1, 1, '<b style=\"color:green\">Lead ID 1313287471</b> India Mart Lead Assign To Vijay This Employee', 1, '2020-04-27 11:11:27', 'active', 11, 'Lead'),
(19, 'Admin', 'Vijay', 1, 2, '<b style=\"color:green\">Lead ID 1313105146</b> India Mart Lead Assing You', 1, '2020-04-27 11:11:27', 'active', 12, 'Lead'),
(20, 'India Mart', 'Admin', 1, 1, '<b style=\"color:green\">Lead ID 1313105146</b> India Mart Lead Assign To Vijay This Employee', 1, '2020-04-27 11:11:27', 'active', 12, 'Lead'),
(21, 'Admin', 'Vivekanand Gaikwad', 1, 3, '<b style=\"color:green\">Lead ID 1311891495</b> India Mart Lead Assing You', 0, '2020-04-27 11:11:27', 'active', 13, 'Lead'),
(22, 'India Mart', 'Admin', 1, 1, '<b style=\"color:green\">Lead ID 1311891495</b> India Mart Lead Assign To Vivekanand Gaikwad This Employee', 1, '2020-04-27 11:11:27', 'active', 13, 'Lead'),
(23, 'Admin', 'Vijay', 1, 2, '<b style=\"color:green\">Lead ID 1311538178</b> India Mart Lead Assing You', 1, '2020-04-27 11:11:27', 'active', 14, 'Lead'),
(24, 'India Mart', 'Admin', 1, 1, '<b style=\"color:green\">Lead ID 1311538178</b> India Mart Lead Assign To Vijay This Employee', 1, '2020-04-27 11:11:27', 'active', 14, 'Lead'),
(25, 'Globallianz', 'Vijay', 1, 2, '<b style=\"color:green\">ID ID1</b> Commented', 1, '2020-06-04 10:24:21', 'active', 1, 'Lead'),
(26, 'Globallianz', 'Vijay', 1, 2, '<b style=\"color:green\">ID ID1</b> Commented', 1, '2020-06-04 10:25:25', 'active', 1, 'Lead'),
(27, 'Globallianz', 'Vijay', 1, 2, '<b style=\"color:green\">ID ID1</b> Commented', 1, '2020-06-04 10:27:19', 'active', 1, 'Lead'),
(28, 'Globallianz', 'Vijay', 1, 2, '<b style=\"color:green\">ID ID1</b> Commented', 1, '2020-06-04 10:27:55', 'active', 1, 'Lead'),
(29, 'Globallianz', 'Vijay', 1, 2, '<b style=\"color:green\">ID ID1</b> Commented', 1, '2020-06-04 10:29:44', 'active', 1, 'Lead'),
(30, 'Globallianz', 'Vijay', 1, 2, '<b style=\"color:green\">ID ID1</b> Commented', 1, '2020-06-04 10:32:06', 'active', 1, 'Lead'),
(31, 'Globallianz', 'Vijay', 1, 2, '<b style=\"color:green\">ID ID1311538178</b> Commented', 1, '2020-09-20 15:31:23', 'active', 14, 'Lead');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `id` bigint(20) NOT NULL,
  `full_name` varchar(300) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` enum('Admin','Employee') NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`id`, `full_name`, `mobile_no`, `email_address`, `location`, `role`, `password`, `user_type`, `status`, `created_date`) VALUES
(1, 'Globallianz', '7507012305', 'globallianz@gmail.com', 'Pune', 'Manager', '7c5e62fbfc8a62229675265f24ac0c10', 'Admin', 'active', '2020-02-26 00:00:00'),
(2, 'Vijay', '9158675645', 'vijay171819@gmail.com', 'Pune', 'Manager', '7c5e62fbfc8a62229675265f24ac0c10', 'Employee', 'active', '2020-02-26 18:43:05'),
(3, 'Vivekanand Gaikwad', '7507012305', 'vivekanand.gaikwad30@gmail.com', 'Pune', 'Manager', 'e10adc3949ba59abbe56e057f20f883e', 'Employee', 'active', '2020-03-09 20:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role_name`) VALUES
(1, 'Sales executive'),
(2, 'Marketing execute'),
(3, 'Manager'),
(4, 'Account executive'),
(5, 'Production executive'),
(6, 'Team leader'),
(7, 'Sales manager');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_source`
--

CREATE TABLE `tbl_source` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_source`
--

INSERT INTO `tbl_source` (`id`, `name`) VALUES
(1, 'Indiamart'),
(2, 'Google'),
(3, 'Self'),
(4, 'Justdial'),
(5, 'Online'),
(6, 'Reference'),
(7, 'Friend');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `status`) VALUES
(1, 'Contacted'),
(3, 'Not Contacted'),
(4, 'E Relevant'),
(5, 'Follow Up'),
(6, 'Case Dropped'),
(7, 'Lost Lead'),
(8, 'Importance'),
(9, 'Negotiation'),
(10, 'Deal Done'),
(11, 'Quotation Sending ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lead`
--
ALTER TABLE `tbl_lead`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_owner` (`customer_name`(255)),
  ADD KEY `city` (`city`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_source`
--
ALTER TABLE `tbl_source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_lead`
--
ALTER TABLE `tbl_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_source`
--
ALTER TABLE `tbl_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
