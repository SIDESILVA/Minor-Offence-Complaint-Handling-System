-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 05:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbuser`
--

-- --------------------------------------------------------

--
-- Table structure for table `case_investigate`
--

CREATE TABLE `case_investigate` (
  `Complaint_No` varchar(30) NOT NULL,
  `In_Parties` varchar(500) NOT NULL,
  `Final` varchar(500) NOT NULL,
  `Start_Date` varchar(20) NOT NULL,
  `Start_Time` varchar(20) NOT NULL,
  `End_Date` varchar(20) NOT NULL,
  `End_Time` varchar(20) NOT NULL,
  `Image` text NOT NULL,
  `Audio` text NOT NULL,
  `Text` text NOT NULL,
  `Video` text NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `case_investigate`
--

INSERT INTO `case_investigate` (`Complaint_No`, `In_Parties`, `Final`, `Start_Date`, `Start_Time`, `End_Date`, `End_Time`, `Image`, `Audio`, `Text`, `Video`, `Status`) VALUES
('CN2023112919173', 'Suchini\r\nPawani\r\nMaduka', 'After thorough investigation and investigation, we have gathered crucial information regarding the incident. Your home has been broken into and several valuables including jewellery, smartphones, laptops and other personal belongings have been confirmed stolen.', '2023-11-09', '19:54', '2023-12-09', '12:50', 'WhatsApp Image 2023-09-15 at 07.58.23.jpg', '', '', '', 'Processing'),
('CN20231129191731', 'Hansi\r\nSuchini', 'Our investigative team has been actively looking into the incident. We have gathered information and interviewed relevant individuals to understand the circumstances surrounding the event. Additionally, we are reviewing any available evidence, ', '2023-11-01', '21:22', '2023-11-11', '21:28', 'WhatsApp Image 2023-09-15 at 07.58.23.jpg', '', '', '', 'Processing'),
('CN20231130045422', 'Hansi\r\nUpani\r\nChathumi', 'I promptly reported the incident to the local authorities, and a police report has been filed under case number [if applicable]. I am providing this detailed description to assist in the investigation and recovery of the stolen items.\r\n\r\nI kindly request a thorough investigation into this matter to bring the responsible party to justice and recover the stolen belongings. Your prompt attention to this issue is highly appreciated.', '2023-11-16', '08:05', '2023-12-09', '05:09', '', '', '', '', 'Processing'),
('CN20231130084415', 'Naveen\r\nkothe\r\nChathumi', 'The stealing happened on [insert date] at around [insert time], right at my house. They took some important things from my home. These things are valuable to me. I noticed that something was wrong. They might have broken into my house or done something sneaky to take my things. I already told the police about what happened. They are looking into it to try and help. If you have insurance, I also told them about the stealing. They might be able to help replace what was taken.', '2023-11-30', '08:53', '2023-12-09', '08:54', '', '', '', '', 'Complete'),
('CN20240311091048', 'Suchini, Hirushika, Tamasha, Dinesha', 'I urge you to take immediate action to investigate this matter and apprehend the individual responsible. Additionally, I request assistance in recovering the stolen property and ensuring that justice is served.\r\n\r\nPlease do not hesitate to contact me at [your contact information] to discuss this matter further or to provide any necessary information.\r\n\r\nThank you for your attention to this urgent matter.', '2024-02-26', '00:17', '2024-03-09', '09:22', 'specialyou-21st-birthday-decoration-item-kit-for-adults-with-black-and-white-balloons-set-of-58-pcs-product-images-orvnginemjh-p602813423-0-202306282352.jpg', '', '', '', 'Complete'),
('CN20240313214317', 'Suchini, HAnsi', 'A licensing agreement is important for computing/IT firms because it defines the terms under which software or technology can be used, distributed, and protected. It helps establish legal boundaries, protect intellectual property rights, and ensure compliance with regulations, ultimately safeguarding the interests of both the licensor (the owner of the software or technology) and the licensee (the party using or distributing it).', '2024-02-27', '12:50', '2024-03-29', '14:53', 'specialyou-21st-birthday-decoration-item-kit-for-adults-with-black-and-white-balloons-set-of-58-pcs-product-images-orvnginemjh-p602813423-0-202306282352.jpg', '', '', '', 'Complete'),
('CN20240314123356', 'Hansi, Suchini', '\r\n\r\n\"I am writing to formally report a theft incident that occurred on [date] at [location].\r\n On the aforementioned date, I discovered that [describe the stolen items or property].\r\n These items hold significant personal and/or monetary value to me. ', '2024-03-04', '13:34', '2024-04-04', '16:34', '', '', '', '', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_reg`
--

CREATE TABLE `complaint_reg` (
  `Complaint_No` varchar(50) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `Title` enum('Mr','Mrs','Ms','Rev') NOT NULL,
  `First_Name` varchar(200) NOT NULL,
  `Last_Name` varchar(200) NOT NULL,
  `E_Mail` varchar(50) NOT NULL,
  `Contact_Number` varchar(10) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `Age` varchar(2) NOT NULL,
  `Birth_Date` varchar(30) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `District` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Division_Code` varchar(50) NOT NULL,
  `Investigator_Name` varchar(200) NOT NULL,
  `Complaint_Type` varchar(500) NOT NULL,
  `Other_Type` varchar(500) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Other_Details` varchar(500) NOT NULL,
  `Suspects` varchar(500) NOT NULL,
  `Ref_Number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint_reg`
--

INSERT INTO `complaint_reg` (`Complaint_No`, `Date`, `Title`, `First_Name`, `Last_Name`, `E_Mail`, `Contact_Number`, `NIC`, `Age`, `Birth_Date`, `Gender`, `Address`, `District`, `City`, `Division_Code`, `Investigator_Name`, `Complaint_Type`, `Other_Type`, `Description`, `Other_Details`, `Suspects`, `Ref_Number`) VALUES
('CN20231129191731', '2023-11-29', 'Ms', 'Suchini Ishanka', 'De Silva', 'suchi.desilva20@gmail.com', '0702343276', '200059300223', '23', '2000-04-02', 'Female', '723/131, Lake Terrace, Athurugiriya', 'Colombo', 'Athurugiriya', 'Athurugiriya', 'Hansi', '(Section 366) Theft.', '', '\r\nThe theft has caused me considerable distress and inconvenience.\r\n I immediately notified the local authorities and filed a police report\r\nI urge prompt investigation into this matter and request all necessary actions be \r\ntaken to apprehend the perpetrator(s) and recover the stolen property. \r\n', '', 'hsasf', 'REF191731291123'),
('CN20231129203947', '2023-11-29', 'Ms', 'Suchini Ishanka', 'De Silva', 'suchi.desilva20@gmail.com', '0702343276', '200059300222', '23', '2000-04-02', 'Female', '723/131, Lake Terrace, Athurugiriya', 'Colombo', 'Athurugiriya', 'Athurugiriya', 'Hansi', '(Section 366) Theft.', '', '\r\nThe theft has caused me considerable distress and inconvenience.\r\n I immediately notified the local authorities and filed a police report\r\nI urge prompt investigation into this matter and request all necessary actions be \r\ntaken to apprehend the perpetrator(s) and recover the stolen property. \r\n', '', 'hsasf', 'REF203947291123'),
('CN20231130084415', '2023-11-30', 'Ms', 'chathumi', 'himasha', '39-bit-0013@kdu.ac.lk', '0716634560', '200059300223', '23', '2000-04-02', 'Female', '723/131, Lake Terrace, Athurugiriya', 'Colombo', 'Athurugiriya', '35-B', 'Pawani', '(Section 366) Theft.', '', '\r\nThe theft has caused me considerable distress and inconvenience.\r\n I immediately notified the local authorities and filed a police report\r\nI urge prompt investigation into this matter and request all necessary actions be \r\ntaken to apprehend the perpetrator(s) and recover the stolen property. \r\n', '', 'hsasf', 'REF084415301123'),
('CN20231130094759', '2023-11-30', 'Ms', 'Suchini Ishanka', 'De Silva', 'suchi.desilva2000@gmail.com', '0702343276', '200059300223', '23', '2000-04-02', 'Female', '723/131, Lake Terrace, Athurugiriya', 'Colombo', 'Athurugiriya', '35-B', 'Hansi', '(Section 366) Theft.', '', '\r\nThe theft has caused me considerable distress and inconvenience.\r\n I immediately notified the local authorities and filed a police report\r\nI urge prompt investigation into this matter and request all necessary actions be \r\ntaken to apprehend the perpetrator(s) and recover the stolen property. \r\n', '', 'hsasf', 'REF094759301123'),
('CN20240311091048', '2024-03-11', 'Ms', 'Suchini Ishanka', 'De Silva', 'suchi.desilva20@gmail.com', '0702343276', '200059300222', '23', '2000-04-02', 'Female', '723/131, Lake Terrace, Athurugiriya', 'Colombo', 'Athurugiriya', '253B', 'Naveen', '(Section 366) Theft.', '', '\r\nThe theft has caused me considerable distress and inconvenience.\r\n I immediately notified the local authorities and filed a police report\r\nI urge prompt investigation into this matter and request all necessary actions be \r\ntaken to apprehend the perpetrator(s) and recover the stolen property. \r\n', '', 'hsasf', 'REF091048110324'),
('CN20240313161750', '2024-03-13', 'Ms', 'Hansi', 'Hettiarachchi', 'hansi200hettiarachchi@gmail.com', '0702845728', '200059300222', '23', '2000-04-02', 'Female', 'No/132 thenagama ,vitharandeniya', 'Colombo', 'tangalle', '253B', 'Naveen', '(Section 366) Theft.', '', '\r\nThe theft has caused me considerable distress and inconvenience.\r\n I immediately notified the local authorities and filed a police report\r\nI urge prompt investigation into this matter and request all necessary actions be \r\ntaken to apprehend the perpetrator(s) and recover the stolen property. \r\n', '', 'hsasf', 'REF161750130324'),
('CN20240313214317', '2024-03-13', 'Ms', 'Suchini', 'De Silva', 'suchi.desilva20@gmail.com', '0702343276', '200059300222', '23', '2000-04-02', 'Female', '723/131, Lake Terrace, Athurugiriya', 'Colombo', 'Athurugiriya', '335B', 'Naveen', '(Section 366) Theft.', '', '\r\nThe theft has caused me considerable distress and inconvenience.\r\n I immediately notified the local authorities and filed a police report\r\nI urge prompt investigation into this matter and request all necessary actions be \r\ntaken to apprehend the perpetrator(s) and recover the stolen property. \r\n', '', 'hsasf', 'REF214317130324'),
('CN20240314123356', '2024-03-14', 'Ms', 'suchini', 'ishanka', 'suchi.desilva20@gmail.com', '0702343276', '200059300222', '23', '2000-04-02', 'Female', 'athurugiriya, colombo', 'Colombo', 'athurugiriya', '335B', 'Naveen', '(Section 366) Theft.', '', '\r\nThe theft has caused me considerable distress and inconvenience.\r\n I immediately notified the local authorities and filed a police report\r\nI urge prompt investigation into this matter and request all necessary actions be \r\ntaken to apprehend the perpetrator(s) and recover the stolen property. \r\n', '', 'hsasf', 'REF123356140324'),
('CN20240314135722', '2024-03-14', 'Ms', 'Suchini Ishanka', 'De Silva', 'suchi.desilva20@gmail.com', '0702343276', '200059300222', '23', '2000-04-02', 'Female', '723/131, Lake Terrace, Athurugiriya', 'Colombo', 'Athurugiriya', '335', 'Ishz20', '(Section 366) Theft.', '', '\r\nThe theft has caused me considerable distress and inconvenience.\r\n I immediately notified the local authorities and filed a police report\r\nI urge prompt investigation into this matter and request all necessary actions be \r\ntaken to apprehend the perpetrator(s) and recover the stolen property. \r\n', '', 'hsasf', 'REF135722140324');

-- --------------------------------------------------------

--
-- Table structure for table `pasword_reset`
--

CREATE TABLE `pasword_reset` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `Status` enum('O','PF','I') NOT NULL,
  `First_Name` varchar(250) NOT NULL,
  `Last_Name` varchar(250) NOT NULL,
  `Service_No` varchar(30) NOT NULL,
  `Rank` varchar(30) NOT NULL,
  `Title` enum('Mr.','Mrs.','Ms.') NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `Birth_Date` date NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `E_Mail` varchar(100) NOT NULL,
  `Contact_No` varchar(10) NOT NULL,
  `User_Name` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Step` varchar(50) NOT NULL DEFAULT 'Pending',
  `Logged` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`Status`, `First_Name`, `Last_Name`, `Service_No`, `Rank`, `Title`, `NIC`, `Birth_Date`, `Gender`, `Location`, `E_Mail`, `Contact_No`, `User_Name`, `Password`, `Step`, `Logged`) VALUES
('I', 'Suchini Ishanka', 'De Silva', '0014', 'Police Officer', 'Mr.', '200059300222', '2000-04-02', 'Female', '', 'suchi.desilva20@gmail.com', '0702343276', 'Ishz20', 'b502a31cb8', 'Approved', 1),
('PF', 'Hansi', 'Hettiarachchi', '0019', 'Police Officer', 'Mr.', '200071202484', '2000-07-30', 'Female', '', 'hansi200hettiarachchi@gmail.com', '0702845728', 'Hansi', '7d8801678d', 'Approved', 0);

-- --------------------------------------------------------

--
-- Table structure for table `status_view`
--

CREATE TABLE `status_view` (
  `Ref_No` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Complaint_No` varchar(255) NOT NULL,
  `C_Type` varchar(255) NOT NULL,
  `Complaint` varchar(500) NOT NULL,
  `Current_Status` varchar(255) NOT NULL,
  `Final` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `case_investigate`
--
ALTER TABLE `case_investigate`
  ADD PRIMARY KEY (`Complaint_No`);

--
-- Indexes for table `complaint_reg`
--
ALTER TABLE `complaint_reg`
  ADD PRIMARY KEY (`Complaint_No`);

--
-- Indexes for table `pasword_reset`
--
ALTER TABLE `pasword_reset`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`Service_No`,`NIC`),
  ADD UNIQUE KEY `User_Name` (`User_Name`),
  ADD UNIQUE KEY `NIC` (`NIC`),
  ADD UNIQUE KEY `E_Mail` (`E_Mail`),
  ADD UNIQUE KEY `Password` (`Password`),
  ADD UNIQUE KEY `Contact_No` (`Contact_No`);

--
-- Indexes for table `status_view`
--
ALTER TABLE `status_view`
  ADD PRIMARY KEY (`Ref_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pasword_reset`
--
ALTER TABLE `pasword_reset`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
