-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 06:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Account_ID` int(4) NOT NULL,
  `Customer_ID` int(4) NOT NULL,
  `Branch_ID` int(4) NOT NULL,
  `Account_Number` varchar(13) NOT NULL,
  `Balance` int(6) NOT NULL,
  `Interest_Rate_Year` decimal(5,4) NOT NULL,
  `Account_type` varchar(13) NOT NULL,
  `Account_Status` varchar(9) NOT NULL DEFAULT 'Active',
  `Account_Open_Date` date NOT NULL,
  `Password` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Account_ID`, `Customer_ID`, `Branch_ID`, `Account_Number`, `Balance`, `Interest_Rate_Year`, `Account_type`, `Account_Status`, `Account_Open_Date`, `Password`) VALUES
(1, 1, 1, '955-4-75016-5', 6809, '0.0115', 'Fixed deposit', 'Active', '1999-05-25', 367535),
(2, 2, 1, '388-2-71037-9', 5915, '0.0110', 'Fixed deposit', 'Suspended', '2000-02-21', 390144),
(3, 3, 1, '545-8-68220-5', 6898, '0.0025', 'Salary', 'Suspended', '2001-05-12', 680604),
(4, 4, 1, '603-3-86996-1', 16233, '0.0025', 'Saving', 'Active', '2002-03-04', 478519),
(5, 5, 2, '179-9-14024-3', 12371, '0.0025', 'Saving', 'Active', '2002-07-19', 447123),
(6, 6, 2, '607-6-18862-6', 8087, '0.0025', 'Salary', 'Active', '2003-10-15', 921214),
(7, 7, 2, '616-8-76506-3', 12971, '0.0090', 'Fixed deposit', 'Active', '2003-11-07', 355590),
(8, 8, 5, '560-9-24137-5', 15842, '0.0025', 'Salary', 'Active', '2004-01-08', 515251),
(9, 9, 9, '239-6-66252-8', 18553, '0.0025', 'Saving', 'Active', '2004-04-05', 327292),
(10, 10, 10, '357-9-20658-6', 655, '0.0025', 'Salary', 'Active', '2004-08-06', 609134),
(11, 11, 1, '141-7-59689-6', 15526, '0.0025', 'Salary', 'Suspended', '2005-07-07', 460778),
(12, 12, 2, '314-3-83588-8', 101280, '0.0025', 'Saving', 'Active', '2006-04-08', 261461),
(13, 13, 3, '785-5-55096-2', 12765, '0.0080', 'Fixed deposit', 'Active', '2006-09-05', 753999),
(14, 14, 3, '483-0-68210-4', 18106, '0.0025', 'Salary', 'Active', '2006-11-06', 647216),
(15, 15, 3, '119-7-54278-7', 1504, '0.0025', 'Salary', 'Active', '2007-01-08', 417872),
(16, 16, 6, '133-8-89543-8', 9330, '0.0025', 'Salary', 'Active', '2007-03-12', 230123),
(17, 17, 7, '902-2-75857-0', 3949, '0.0085', 'Fixed deposit', 'Suspended', '2007-04-09', 607048),
(18, 18, 8, '503-4-80296-7', 4194, '0.0095', 'Fixed deposit', 'Suspended', '2007-06-07', 882018),
(19, 19, 9, '332-8-75387-3', 7340, '0.0075', 'Fixed deposit', 'Active', '2007-08-11', 375405),
(20, 20, 10, '552-5-61075-5', 176078, '0.0025', 'Salary', 'Active', '2007-09-12', 191704);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `Branch_ID` int(4) NOT NULL,
  `Branch_name` varchar(30) NOT NULL,
  `Branch_street` varchar(40) NOT NULL,
  `Branch_city` varchar(19) NOT NULL,
  `Branch_state` varchar(22) NOT NULL,
  `Branch_country` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`Branch_ID`, `Branch_name`, `Branch_street`, `Branch_city`, `Branch_state`, `Branch_country`) VALUES
(1, 'BNLTT of North Carolina', 'Broadcast Drive', 'Charlotte', 'North Carolina', 'USA'),
(2, 'BNLTT of Hong Kong', 'Max Trade Centre', 'San Po Kong', 'Hong Kong', 'Hong Kong'),
(3, 'BNLTT of Kandal Steung Distric', 'National Road No 2', 'Kraing Svay Village', 'Kandal Steung District', 'Cambodia'),
(4, 'BNLTT of Daejeon', 'Guryong-dong', 'Yuseong-gu', 'Daejeon', 'Korea'),
(5, 'BNLTT of Kuala Belait', 'Kg Perpindahan Seria', 'Belait', 'Kuala Belait', 'Brunei'),
(6, 'BNLTT of Bamako', 'HAMDALLAYE', 'Bamako', 'Bamako', 'Mali'),
(7, 'BNLTT of Indiana', 'Sugarfoot Lane', 'Lafayette', 'Indiana', 'USA'),
(8, 'BNLTT of Freeport', 'Parker Building Downtown Shopping Centre', 'Freeport', 'Freeport', 'Bahamas'),
(9, 'BNLTT of Marsh Harbour', 'East Bay Street', 'Marsh Harbour', 'Marsh Harbour', 'Bahamas'),
(10, 'BNLTT of Aden', 'Sheikh Othman', 'Aden', 'Aden', 'Yemen'),
(11, 'BNLTT of Southwest Finland', 'Aleksanterinkatu', 'Turku', 'Southwest Finland', 'Finland'),
(12, 'BNLTT of California', 'Prospect Valley Road', 'Los Angeles', 'California', 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `Card_ID` int(4) NOT NULL,
  `Account_ID` int(4) NOT NULL,
  `Card_brand` varchar(10) NOT NULL,
  `Card_type` varchar(6) NOT NULL,
  `Limit` int(6) DEFAULT NULL,
  `Card_Number` varchar(19) DEFAULT NULL,
  `Card_CVV` int(3) NOT NULL,
  `Card_Exp` date NOT NULL,
  `Card_Wireless` varchar(3) NOT NULL,
  `Card_Status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`Card_ID`, `Account_ID`, `Card_brand`, `Card_type`, `Limit`, `Card_Number`, `Card_CVV`, `Card_Exp`, `Card_Wireless`, `Card_Status`) VALUES
(1, 1, 'Mastercard', 'Debit', NULL, '5958-3307-7921-5735', 512, '2006-01-02', 'Yes', 'Active'),
(2, 1, 'Visa', 'Credit', 5000, '8596-4596-8759-1246', 639, '2026-03-03', 'Yes', 'Active'),
(3, 2, 'Visa', 'Credit', 5000, '3852-6052-7864-9616', 331, '2003-08-02', 'No', 'Inactive'),
(4, 3, 'Visa', 'Credit', 20000, '4408-9428-1229-7070', 152, '2026-06-03', 'No', 'Active'),
(5, 4, 'Mastercard', 'Credit', 150000, '1245-6398-7596-4528', 154, '2025-06-04', 'Yes', 'Active'),
(6, 5, 'Mastercard', 'Debit', NULL, '5303-6898-8576-3532', 723, '2026-07-09', 'No', 'Active'),
(7, 6, 'Visa', 'Credit', 30000, '2154-1762-7713-1507', 612, '2024-07-05', 'Yes', 'Active'),
(8, 7, 'Mastercard', 'Debit', NULL, '7239-5269-9416-1757', 850, '2023-12-31', 'No', 'Active'),
(9, 8, 'Visa', 'Credit', 40000, '8925-8174-6333-8214', 201, '2023-10-18', 'No', 'Active'),
(10, 9, 'Visa', 'Credit', 50000, '3080-4660-1727-4070', 603, '2024-06-12', 'Yes', 'Active'),
(11, 10, 'Visa', 'Credit', 50000, '1317-6973-2861-9949', 233, '2024-07-18', 'Yes', 'Active'),
(12, 11, 'Mastercard', 'Credit', 35000, '8628-7206-6964-9848', 972, '2024-03-14', 'Yes', 'Active'),
(13, 12, 'Mastercard', 'Debit', NULL, '2273-8383-5985-8420', 629, '2027-02-01', 'Yes', 'Active'),
(14, 13, 'Mastercard', 'Debit', NULL, '4268-597-1245-6385', 852, '2025-04-18', 'No', 'Active'),
(15, 14, 'Visa', 'Credit', 10000, '8208-1262-2756-5653', 887, '2025-05-08', 'No', 'Active'),
(16, 15, 'Mastercard', 'Credit', 70000, '5334-3652-1644-6093', 425, '2025-11-10', 'Yes', 'Active'),
(17, 16, 'Visa', 'Debit', NULL, '4151-8402-7962-9714', 293, '2024-09-11', 'No', 'Active'),
(18, 17, 'Mastercard', 'Debit', NULL, '8445-1732-5520-8285', 988, '2025-07-02', 'Yes', 'Active'),
(19, 18, 'Mastercard', 'Credit', 80000, '5763-6351-2576-6180', 109, '2024-08-02', 'No', 'Active'),
(20, 19, 'Visa', 'Debit', NULL, '8125-9749-4187-5229', 241, '2024-04-06', 'Yes', 'Active'),
(21, 20, 'Mastercard', 'Debit', NULL, '3963-7656-4956-3107', 254, '2026-09-08', 'No', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(4) NOT NULL,
  `Customer_First_Name` varchar(32) NOT NULL,
  `Customer_Last_Name` varchar(32) NOT NULL,
  `Customer_Date_of_Birth` date NOT NULL,
  `ID_type` varchar(14) NOT NULL,
  `ID_number` varchar(9) NOT NULL,
  `Customer_Sex` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Customer_First_Name`, `Customer_Last_Name`, `Customer_Date_of_Birth`, `ID_type`, `ID_number`, `Customer_Sex`) VALUES
(1, 'Conn', 'Cassian', '2009-11-03', 'Driver License', '65046193', 'Male'),
(2, 'Sita', 'Philo', '2002-10-10', 'Driver License', '73374739', 'Female'),
(3, 'Tijmen', 'Bóthildr', '1979-09-06', 'Driver License', '456345111', 'Male'),
(4, 'Reigo', 'Vita', '1984-01-06', 'National ID', '12345678', 'Female'),
(5, 'Vendelín', 'Sushila', '2017-05-07', 'National ID', '98765432', 'Female'),
(6, 'Hazel', 'Robinson', '1969-04-12', 'Passport', '95310106', 'Female'),
(7, 'Sasha', 'Sadr', '1996-08-07', 'National ID', '99210240', 'Male'),
(8, 'Saanvi', 'Lee', '2007-05-07', 'Driver License', '55544432', 'Female'),
(9, 'Everlee', 'Clark', '1960-04-06', 'National ID', '58776500', 'Female'),
(10, 'Kyle', 'Peterson', '1973-01-03', 'National ID', '60726676', 'Male'),
(11, 'Aldo', 'Walker', '1990-05-04', 'Driver License', '89745366', 'Male'),
(12, 'Katalina', 'Lewis', '2013-02-10', 'National ID', '54376577', 'Female'),
(13, 'Ryland', 'Howard', '2005-04-06', 'Driver License', '12123121', 'Male'),
(14, 'Kenya', 'Cooper', '1962-06-01', 'Driver License', '69876545', 'Female'),
(15, 'Sawyer', 'Butler', '2012-01-04', 'Driver License', '41478193', 'Female'),
(16, 'Antonio', 'Ryan', '1997-08-06', 'Passport', '69445739', 'Female'),
(17, 'Elliot', 'Edwards', '1952-08-01', 'Passport', '85709506', 'Male'),
(18, 'Romina', 'Garcia', '1959-09-09', 'Driver License', '19878966', 'Male'),
(19, 'Keanu', 'Chen', '1957-03-12', 'National ID', '76452184', 'Female'),
(20, 'Joslyn', 'Torres', '1987-01-09', 'Driver License', '39903457', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `Customer_Address_ID` int(4) NOT NULL,
  `Customer_ID` int(4) NOT NULL,
  `Customer_Street` varchar(64) NOT NULL,
  `Customer_City` varchar(64) NOT NULL,
  `Customer_State` varchar(64) NOT NULL,
  `Customer_Postal_Code` varchar(5) NOT NULL,
  `Customer_Country` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`Customer_Address_ID`, `Customer_ID`, `Customer_Street`, `Customer_City`, `Customer_State`, `Customer_Postal_Code`, `Customer_Country`) VALUES
(1, 1, 'Dounby', 'Orkney Islands', 'Glasgow', '23161', 'Scotland'),
(2, 2, 'Wall street ', 'New york city', 'New york', '97137', 'USA'),
(3, 3, 'Durham', 'Cumbria', 'Cardiff', '49680', 'England'),
(4, 4, 'Hollywood boulevard', 'Los Angeles', 'California', '66809', 'USA'),
(5, 5, 'Winthrop', 'Okanogan County', 'Washington', '25951', 'USA'),
(6, 6, 'West street ', 'Annapolis', 'Maryland', '90332', 'USA'),
(7, 7, 'Broadway', 'New york city', 'New york', '69388', 'USA'),
(8, 8, 'Abbey road', 'London', 'Edinburgh', '66021', 'England '),
(9, 9, 'Orchad road', 'SIngpore', 'Yishuan', '98002', 'Singpore'),
(10, 10, 'Champs-Élysées:', 'Paris', 'Brittany', '96241', 'France'),
(11, 11, 'Bennelong Point', 'Sydney', 'Tasmania', '25700', 'Australia'),
(12, 12, 'Orchad lane ', 'Sandiego', 'California', '33282', 'USA'),
(13, 13, 'Champ de Mars', 'Paris ', 'Corsica', '71505', 'France'),
(14, 14, 'Uttar Pradesh', 'Agra', 'Uttar Pradesh', '65896', 'India '),
(15, 15, 'Sheikh Mohammed bin Rashid Blvd', 'Dubai', 'Sharjah', '76520', 'United Arab Emirates'),
(16, 16, 'Battle Creek Road', 'Keystone', 'South Dokata', '32748', 'USA'),
(17, 17, 'Boulevard Porte du Roy', 'Le Mont Saint Michel', 'Paris Region', '13783', 'France'),
(18, 18, 'Acropolis', 'Athens', 'Ionioi Nisoi', '19501', 'Greece'),
(19, 19, 'Pariser Platz', 'Berlin', 'Hassen', '54986', 'Germany '),
(20, 20, 'Alabama street', 'Montgomery', 'Alabama', '35004', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `customer_contact`
--

CREATE TABLE `customer_contact` (
  `Customer_Contact_ID` int(4) NOT NULL,
  `Customer_ID` int(4) NOT NULL,
  `Customer_Email` varchar(25) NOT NULL,
  `Customer_Phone_Number` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer_contact`
--

INSERT INTO `customer_contact` (`Customer_Contact_ID`, `Customer_ID`, `Customer_Email`, `Customer_Phone_Number`) VALUES
(1, 1, 'Conn12@outlook.com', '+48953840'),
(2, 2, 'Sita65@hotmail.com', '+50623095'),
(3, 3, 'Tijmennn@hotmail.com', '+36531375'),
(4, 4, 'Reigo4@outlook.com', '+93372327'),
(5, 5, 'Vendelín@hotmail.com', '+60731815'),
(6, 6, 'Hazelbeauty@gmail.com', '+23667931'),
(7, 7, 'Sasha13244@hotmail.com', '+67325759'),
(8, 8, 'Saanvi@hotmail.com', '+80333506'),
(9, 9, 'Everlee@gmail.com', '+10468042'),
(10, 10, 'Kyle1@outlook.com', '+71461875'),
(11, 11, 'Aldo@outlook.com', '+93350122'),
(12, 12, 'Katalinaaa@hotmail.com', '+46113066'),
(13, 13, 'Rylandor@gmail.com', '+42955891'),
(14, 14, 'Kenya@gmail.com', '+82152837'),
(15, 15, 'Sawyer23@gmail.com', '+99996389'),
(16, 16, 'Antoniohandsome@gmail.com', '+67876513'),
(17, 17, 'Elliototoo@hotmail.com', '+12790359'),
(18, 18, 'Romina2@gmail.com', '+55225161'),
(19, 19, 'Keanu89@outlook.com', '+71582833'),
(20, 20, 'JoslynFrankly@gmail.com', '+39151534');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_ID` int(4) NOT NULL,
  `Employee_First_Name` varchar(9) NOT NULL,
  `Employee_Last_Name` varchar(9) NOT NULL,
  `Branch_ID` int(4) NOT NULL,
  `Employee_Sex` varchar(6) NOT NULL,
  `Employee_Salary` varchar(13) NOT NULL,
  `Employee_Start_Date` varchar(10) NOT NULL,
  `Employee_End_Date` varchar(10) NOT NULL,
  `Employee_Password` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `Employee_First_Name`, `Employee_Last_Name`, `Branch_ID`, `Employee_Sex`, `Employee_Salary`, `Employee_Start_Date`, `Employee_End_Date`, `Employee_Password`) VALUES
(1, 'Hermione ', 'Kim', 1, 'Female', ' $ 10,000.00 ', '2001-04-03', '', 'hermione41'),
(2, 'Silas', 'Smith', 1, 'Female', ' $ 8,010.00 ', '2001-04-03', '2020-05-12', 'silas215'),
(3, 'Abbey', 'Brown', 2, 'Female', ' $ 6,789.00 ', '2002-09-12', '', 'abbeykatie'),
(4, 'Susan', 'Anderson', 3, 'Female', ' $ 5,297.00 ', '2003-05-23', '', 'susanhanna'),
(5, 'Alexander', 'Clark', 4, 'Male', ' $ 7,228.00 ', '2004-05-25', '', 'alexanderw'),
(6, 'John', 'Scott', 5, 'Male', ' $ 5,304.00 ', '2005-06-14', '', 'johnkong'),
(7, 'Edward', 'Hill', 6, 'Male', ' $ 9,984.00 ', '2006-11-07', '', 'edward12'),
(8, 'Natty', 'Nelson', 7, 'Female', ' $ 9,367.00 ', '2007-04-08', '', 'nattynelson'),
(9, 'Roger', 'Baker', 8, 'Male', ' $ 6,714.00 ', '2007-04-09', '', 'roger4567'),
(10, 'James', 'Carter', 9, 'Male', ' $ 9,557.00 ', '2007-04-10', '', 'jamesbond'),
(11, 'Yogi', 'Campbell', 10, 'Female', ' $ 8,750.00 ', '2008-03-10', '', 'yogides'),
(12, 'Richard', 'Allen', 1, 'Male', ' $ 2,654.00 ', '2009-02-10', '', 'richardcool'),
(13, 'Cate', 'Walker', 2, 'Female', ' $ 4,526.00 ', '2010-01-10', '', 'catesplendid'),
(14, 'Elena', 'Lewis', 3, 'Female', ' $ 2,417.00 ', '2010-12-10', '', 'elenahlme2'),
(15, 'Tony', 'Wright', 4, 'Male', ' $ 1,659.00 ', '2011-11-10', '', 'tonystark'),
(16, 'Julie', 'White', 5, 'Female', ' $ 1,763.00 ', '2012-10-10', '', 'juliejulib'),
(17, 'Carol', 'Lee', 6, 'Female', ' $ 2,948.00 ', '2013-09-10', '', 'carolchristmas'),
(18, 'Steve', 'Martin', 7, 'Male', ' $ 1,580.00 ', '2014-08-10', '', 'stevenelson'),
(19, 'Joseph', 'Moore', 8, 'Male', ' $ 2,652.00 ', '2015-07-10', '', 'josephvincent'),
(20, 'Jane', 'Rodriguez', 9, 'Female', ' $ 1,878.00 ', '2016-06-10', '', 'janejiji'),
(21, 'Kate', 'Perez', 10, 'Female', ' $ 2,367.00 ', '2017-05-10', '', 'katejujijuji'),
(22, 'Tim', 'Cardian', 1, 'Male', ' $ 5,669.00 ', '2017-09-12', '', 'cardiantim');

-- --------------------------------------------------------

--
-- Table structure for table `employee_address`
--

CREATE TABLE `employee_address` (
  `Employee_address_ID` int(4) NOT NULL,
  `Employee_ID` int(4) NOT NULL,
  `Employee_street` varchar(26) NOT NULL,
  `Employee_city` varchar(20) NOT NULL,
  `Employee_state` varchar(17) NOT NULL,
  `Employee_postalcode` int(5) NOT NULL,
  `Employee_country` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employee_address`
--

INSERT INTO `employee_address` (`Employee_address_ID`, `Employee_ID`, `Employee_street`, `Employee_city`, `Employee_state`, `Employee_postalcode`, `Employee_country`) VALUES
(1, 1, 'Aleksanterinkatu', 'Turku', 'Southwest Finland', 20100, 'Finland'),
(2, 2, 'Abby Creek lane', 'Indianapolis', 'Indiana', 46001, 'USA'),
(3, 3, 'Main ST', 'Waitfield', 'Vermont', 25673, 'USA'),
(4, 4, 'Hummocky Road', 'Wisanger', 'South Australia', 55223, 'Australia'),
(5, 5, 'Anthony Avenue', 'Abilene', 'Texas', 79601, 'USA'),
(6, 6, 'Hoge Wei', 'Auby-sur-semois', 'Hainaut', 68805, 'Belgium'),
(7, 7, 'Round Drive', 'Booragul', 'New South Wales', 22846, 'Australia'),
(8, 8, 'Blk A Berek Polis Sg Liang', 'Belait', 'Kuala Belait', 67594, 'Brunei'),
(9, 9, 'rue Descartes', 'Strasbourg', 'Alsace', 67000, 'France'),
(10, 10, 'Settlement Road', 'Stradbroke', 'Victoria', 38514, 'Australia'),
(11, 11, 'Dinh Hamlet', 'Long An', 'Long An', 89403, 'Vietnam'),
(12, 12, 'Windy Ridge Road', 'Fort Wayne', 'Indiana', 46835, 'USA'),
(13, 13, 'Tran Hung Dao', 'Nghe An', 'Vinh', 85032, 'Vietnam'),
(14, 14, 'Monteadores', 'Minas', 'Lavalleja', 30000, 'Uruguay'),
(15, 15, 'Catherine Drive', 'Fargo', 'North Dakota', 58102, 'USA'),
(16, 16, 'Del Monte', 'Los Pinos', 'Colonia', 70201, 'Uruguay'),
(17, 17, 'South Street', 'Margate', 'Tasmania', 70545, 'Australia'),
(18, 18, 'Mnimbah Road', 'Soldiers Point', 'New South Wales', 23175, 'Australia'),
(19, 19, 'Cunningham Street', 'Mount Hutton', 'Queensland', 61445, 'Australia'),
(20, 20, 'Ren Min Fa Yuan', 'Changchun', 'Jilin', 86593, 'China'),
(21, 21, 'Kebele', 'Addis Ababa', 'Addis Ababa', 25143, 'Ethiopia'),
(22, 22, 'Sala Kang Seng Village', 'Sangkat Svay Dangkum', 'Siem Reap', 85563, 'Cambodia');

-- --------------------------------------------------------

--
-- Table structure for table `employee_contact`
--

CREATE TABLE `employee_contact` (
  `Employee_Contact_ID` int(4) NOT NULL,
  `Employee_ID` int(4) NOT NULL,
  `Employee_Email` varchar(26) NOT NULL,
  `Employee_Phone_Number` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employee_contact`
--

INSERT INTO `employee_contact` (`Employee_Contact_ID`, `Employee_ID`, `Employee_Email`, `Employee_Phone_Number`) VALUES
(1, 1, 'hermione41@gmail.com', '+92381572'),
(2, 2, 'silas215@outlook.com', '+37502312'),
(3, 3, 'abbeykatie@gmail.com', '+87360346'),
(4, 4, 'susanhanna@outlook.com', '+98672182'),
(5, 5, 'alexanderw@outlook.com', '+79945405'),
(6, 6, 'johnkong@outlook.com', '+75005216'),
(7, 7, 'edward12@hotmail.com', '+87652606'),
(8, 8, 'nattynelson@outlook.com', '+15482811'),
(9, 9, 'roger4567@gmail.com', '+53122497'),
(10, 10, 'jamesbond@hotmail.com', '+40789026'),
(11, 11, 'yogides@gmail.com', '+13862431'),
(12, 12, 'richardcool@outlook.com', '+72794952'),
(13, 13, 'catesplendid@outlook.com', '+97385787'),
(14, 14, 'elenahlme2@hotmail.com', '+26235624'),
(15, 15, 'tonystark@hotmail.com', '+78863639'),
(16, 16, 'juliejulib@gmail.com', '+26641355'),
(17, 17, 'carolchristmas@hotmail.com', '+59659806'),
(18, 18, 'stevenelson@outlook.com', '+68549184'),
(19, 19, 'josephvincent@hotmail.com', '+67317492'),
(20, 20, 'janejiji@hotmail.com', '+72802577'),
(21, 21, 'katejujijuji@gmail.com', '+67403095'),
(22, 22, 'cardiantim@gmail.com', '+86542311');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `Loan_ID` int(4) NOT NULL,
  `Date` date NOT NULL,
  `Account_ID` int(4) NOT NULL,
  `Credit_Bureau` varchar(2) NOT NULL,
  `Loan_Amount` int(5) NOT NULL,
  `Interest_Rate` decimal(4,4) NOT NULL,
  `Loan_In_Term_Year` int(1) NOT NULL,
  `Loan_Start_Date` date NOT NULL,
  `Loan_End_Date` date NOT NULL,
  `Loan_Status` varchar(7) NOT NULL,
  `Payment_Status` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`Loan_ID`, `Date`, `Account_ID`, `Credit_Bureau`, `Loan_Amount`, `Interest_Rate`, `Loan_In_Term_Year`, `Loan_Start_Date`, `Loan_End_Date`, `Loan_Status`, `Payment_Status`) VALUES
(1, '2020-01-15', 1, 'AA', 50000, '0.0200', 1, '2022-02-15', '2023-02-15', 'Approve', 'Completed'),
(2, '2020-01-27', 2, 'BB', 23000, '0.0500', 2, '2020-02-27', '2021-02-27', 'Approve', 'Incompleted'),
(3, '2020-02-15', 3, 'CC', 12000, '0.0600', 1, '2020-03-15', '2021-03-15', 'Approve', 'Completed'),
(4, '2020-05-14', 4, 'DD', 34000, '0.0600', 1, '2020-06-14', '2021-06-14', 'Pending', NULL),
(5, '2020-10-19', 5, 'EE', 32000, '0.0300', 2, '0000-00-00', '0000-00-00', 'Reject', NULL),
(6, '2021-03-02', 6, 'FF', 41000, '0.0500', 4, '0000-00-00', '0000-00-00', 'Reject', NULL),
(7, '2021-02-08', 7, 'GG', 23000, '0.0400', 1, '2021-02-09', '2022-02-09', 'Approve', 'Completed'),
(8, '2022-12-30', 8, 'HH', 21000, '0.0200', 1, '0000-00-00', '0000-00-00', 'Reject', NULL),
(9, '2023-08-01', 9, 'CC', 43000, '0.0300', 5, '0000-00-00', '0000-00-00', 'Reject', NULL),
(10, '2023-02-23', 10, 'AA', 75000, '0.0700', 6, '0000-00-00', '0000-00-00', 'Reject', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loan_transaction`
--

CREATE TABLE `loan_transaction` (
  `Loan_Payment_ID` int(4) NOT NULL,
  `Loan_ID` int(4) NOT NULL,
  `Balance_Loan` decimal(7,2) NOT NULL,
  `Payment_Date` date NOT NULL,
  `Number_of_Days` int(2) NOT NULL,
  `Interest_Per_Period` decimal(5,2) NOT NULL,
  `Principle_of_Loan` decimal(6,2) NOT NULL,
  `Total_Payment` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `loan_transaction`
--

INSERT INTO `loan_transaction` (`Loan_Payment_ID`, `Loan_ID`, `Balance_Loan`, `Payment_Date`, `Number_of_Days`, `Interest_Per_Period`, `Principle_of_Loan`, `Total_Payment`) VALUES
(1, 1, '45913.74', '2020-03-31', 46, '125.68', '4086.26', '4211.94'),
(2, 2, '22097.79', '2020-03-31', 34, '106.83', '902.21', '1009.04'),
(3, 1, '41777.07', '2020-04-30', 30, '75.27', '4136.67', '4211.94'),
(4, 3, '11057.19', '2020-04-30', 47, '88.61', '942.81', '1031.42'),
(5, 2, '21179.31', '2020-04-30', 30, '90.56', '918.48', '1009.04'),
(6, 1, '37635.90', '2020-05-31', 31, '70.77', '4141.17', '4211.94'),
(7, 3, '10079.62', '2020-05-31', 31, '53.85', '977.57', '1031.42'),
(8, 2, '20259.96', '2020-05-31', 31, '89.69', '919.35', '1009.04'),
(9, 1, '33485.66', '2020-06-30', 30, '61.70', '4150.24', '4211.94'),
(10, 3, '9095.71', '2020-06-30', 30, '47.51', '983.91', '1031.42'),
(11, 2, '19333.95', '2020-06-30', 30, '83.03', '926.01', '1009.04'),
(12, 1, '29330.44', '2020-07-31', 31, '56.72', '4155.22', '4211.94'),
(13, 3, '8108.59', '2020-07-31', 31, '44.30', '987.12', '1031.42'),
(14, 2, '18406.79', '2020-07-31', 31, '81.88', '927.16', '1009.04'),
(15, 1, '25168.19', '2020-08-31', 31, '49.69', '4162.25', '4211.94'),
(16, 3, '7116.66', '2020-08-31', 31, '39.49', '991.93', '1031.42'),
(17, 2, '17475.70', '2020-08-31', 31, '77.95', '931.09', '1009.04'),
(18, 1, '20997.51', '2020-09-30', 30, '41.26', '4170.68', '4211.94'),
(19, 3, '6118.78', '2020-09-30', 30, '33.54', '997.88', '1031.42'),
(20, 2, '16538.28', '2020-09-30', 30, '71.62', '937.42', '1009.04'),
(21, 1, '16821.14', '2020-10-31', 31, '35.57', '4176.37', '4211.94'),
(22, 3, '5117.16', '2020-10-31', 31, '29.80', '1001.62', '1031.42'),
(23, 2, '15599.28', '2020-10-31', 31, '70.04', '939.00', '1009.04'),
(24, 1, '12636.78', '2020-11-30', 30, '27.58', '4184.36', '4211.94'),
(25, 3, '4109.86', '2020-11-30', 30, '24.12', '1007.30', '1031.42'),
(26, 2, '14654.17', '2020-11-30', 30, '63.93', '945.11', '1009.04'),
(27, 1, '8446.25', '2020-12-31', 31, '21.41', '4190.53', '4211.94'),
(28, 3, '3098.46', '2020-12-31', 31, '20.02', '1011.40', '1031.42'),
(29, 2, '13707.19', '2020-12-31', 31, '62.06', '946.98', '1009.04'),
(30, 1, '4248.66', '2021-01-31', 31, '14.35', '4197.59', '4211.94'),
(31, 3, '2082.17', '2021-01-31', 31, '15.13', '1016.29', '1031.42'),
(32, 3, '1059.93', '2021-02-28', 28, '9.18', '1022.24', '1031.42'),
(33, 1, '0.00', '2021-02-28', 28, '6.52', '4248.66', '4255.18'),
(34, 3, '0.00', '2021-03-31', 31, '5.18', '1059.93', '1065.11'),
(35, 7, '21113.64', '2021-09-30', 29, '70.72', '1886.36', '1957.08'),
(36, 7, '19225.96', '2021-10-31', 31, '69.40', '1887.68', '1957.08'),
(37, 7, '17330.03', '2021-11-30', 30, '61.15', '1895.93', '1957.08'),
(38, 7, '15429.91', '2021-12-31', 31, '56.96', '1900.12', '1957.08'),
(39, 7, '13523.55', '2022-01-31', 31, '50.72', '1906.36', '1957.08'),
(40, 7, '11606.62', '2022-02-28', 28, '40.15', '1916.93', '1957.08'),
(41, 7, '9687.69', '2022-03-31', 31, '38.15', '1918.93', '1957.08'),
(42, 7, '7761.42', '2022-04-30', 30, '30.81', '1926.27', '1957.08'),
(43, 7, '5829.85', '2022-05-31', 31, '25.51', '1931.57', '1957.08'),
(44, 7, '3891.31', '2022-06-30', 30, '18.54', '1938.54', '1957.08'),
(45, 7, '1947.02', '2022-07-31', 31, '12.79', '1944.29', '1957.08'),
(46, 7, '0.00', '2022-08-31', 31, '6.40', '1947.02', '1953.42');

-- --------------------------------------------------------

--
-- Table structure for table `pre_transaction`
--

CREATE TABLE `pre_transaction` (
  `Pre_Transaction_ID` int(4) NOT NULL,
  `Account_ID` int(2) NOT NULL,
  `Payer_Account_Number` varchar(13) NOT NULL,
  `Set_Date` date NOT NULL,
  `Payback_Date` date NOT NULL,
  `Pre_Trans_Amount` int(4) NOT NULL,
  `Pre_Trans_Status` varchar(10) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pre_transaction`
--

INSERT INTO `pre_transaction` (`Pre_Transaction_ID`, `Account_ID`, `Payer_Account_Number`, `Set_Date`, `Payback_Date`, `Pre_Trans_Amount`, `Pre_Trans_Status`) VALUES
(1, 16, '955-4-75016-5', '2022-01-02', '2023-04-02', 2201, 'Pending'),
(2, 17, '388-2-71037-9', '2023-02-03', '2023-04-03', 9836, 'Pending'),
(3, 18, '545-8-68220-5', '2023-03-05', '2023-04-04', 2295, 'Cancel'),
(4, 19, '603-3-86996-1', '2023-03-06', '2023-04-03', 8904, 'Pending'),
(5, 5, '179-9-14024-3', '2023-03-07', '2023-04-03', 8959, 'Pending'),
(6, 16, '607-6-18862-6', '2023-03-08', '2023-04-03', 5848, 'Complete'),
(7, 17, '616-8-76506-3', '2023-03-09', '2023-04-03', 2383, 'Pending'),
(8, 18, '560-9-24137-5', '2023-03-10', '2023-04-03', 8364, 'Pending'),
(9, 19, '239-6-66252-8', '2023-03-11', '2023-04-03', 5335, 'Pending'),
(10, 20, '357-9-20658-6', '2023-03-12', '2023-04-03', 6566, 'Complete'),
(11, 16, '141-7-59689-6', '2023-03-13', '2023-04-03', 4489, 'Complete'),
(12, 17, '314-3-83588-8', '2023-03-12', '2023-04-03', 9632, 'Complete'),
(13, 18, '785-5-55096-2', '2023-03-12', '2023-04-03', 7965, 'Complete'),
(14, 19, '483-0-68210-4', '2023-03-12', '2023-04-03', 8585, 'Cancel'),
(15, 20, '119-7-54278-7', '2023-03-12', '2023-04-03', 9301, 'Cancel'),
(16, 19, '955-4-75016-5', '2023-03-12', '2023-04-03', 5078, 'Pending'),
(17, 20, '388-2-71037-9', '2023-03-12', '2023-04-03', 3788, 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `Transaction_ID` int(4) NOT NULL,
  `Account_ID` int(4) NOT NULL,
  `Card_Number` varchar(19) DEFAULT NULL,
  `Transaction_Date` date NOT NULL,
  `Transaction_Type` varchar(12) NOT NULL,
  `Amount` int(5) NOT NULL,
  `Recipient_Account` varchar(13) DEFAULT NULL,
  `Transaction_Detail` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Transaction_ID`, `Account_ID`, `Card_Number`, `Transaction_Date`, `Transaction_Type`, `Amount`, `Recipient_Account`, `Transaction_Detail`) VALUES
(1, 1, '5958-3307-7921-5735', '2022-02-06', 'Withdraw', 500, '', 'Grocery '),
(2, 1, '8596-4596-8759-1246', '2022-02-06', 'Withdraw', 1200, '', 'Restaurant'),
(3, 3, '1245-6398-7596-4528', '2022-11-09', 'Transferring', 11000, '947-4-59481-5', 'Transportation'),
(4, 4, '', '2022-12-09', 'Swipe Card', 5361, '179-9-14024-3', 'Restaurant'),
(5, 5, '5303-6898-8576-3532', '2022-09-27', 'Transferring', 3323, '034-6-18862-6', 'Rental'),
(6, 6, '', '2022-01-12', 'Payment', 3198, '119-7-54278-7', 'Restaurant'),
(7, 6, '', '2022-01-12', 'Payment', 3574, '483-0-68210-4', 'Hospital'),
(8, 6, '2154-1762-7713-1507', '2022-01-12', 'Transferring', 8561, '357-9-20548-6', 'Shopping'),
(9, 9, '3080-4660-1727-4070', '2022-09-12', 'Transferring', 3388, '207-6-18862-6', 'Restaurant'),
(10, 10, '1317-6973-2861-9949', '2022-10-12', 'Withdraw', 2000, '', 'Rental'),
(11, 19, '', '2022-12-16', 'Payment', 285, '915-4-75016-5', 'Online Shopping'),
(12, 11, '8628-7206-6964-9848', '2022-12-22', 'Withdraw', 90000, '', 'ATM'),
(13, 13, '4268-597-1245-6385', '2022-12-27', 'Withdraw', 10000, '', 'Online Shopping'),
(14, 14, '', '2023-04-01', 'Swipe Card', 7317, '141-7-59129-6', 'Transportation'),
(15, 15, '', '2023-08-12', 'Payment', 674, '112-7-59689-6', 'Transportation'),
(16, 3, '4408-9428-1229-7070', '2022-02-06', 'Withdraw', 1600, '', 'ATM'),
(17, 11, '', '2022-02-06', 'Payment', 7340, '188-7-40819-1', 'Online Shopping'),
(18, 3, '4408-9428-1229-7070', '2022-11-09', 'Transferring', 500, '984-7-79819-2', 'Transportation'),
(19, 12, '', '2022-12-09', 'Transferring', 1289, '612-1-40129-3', 'Online Shopping'),
(20, 13, '', '2022-09-27', 'Withdraw', 200, '', 'Grocery '),
(21, 13, '', '2022-01-12', 'Withdraw', 990, '', 'ATM'),
(22, 15, '5334-3652-1644-6093', '2022-01-12', 'Swipe Card', 20, '151-6-45698-6', 'Grocery '),
(23, 10, '1317-6973-2861-9949', '2022-01-12', 'Payment', 150, '188-7-40819-1', 'Transportation'),
(24, 11, '8628-7206-6964-9848', '2022-09-12', 'Payment', 890, '125-6-45321-6', 'Pet Store'),
(25, 16, '', '2022-10-12', 'Transferring', 1423, '612-1-40129-3', 'Online Shopping'),
(26, 20, '', '2022-12-06', 'Withdraw', 12, '539-7-12549-1', 'Online Shopping'),
(27, 12, '2273-8383-5985-8420', '2022-12-22', 'Payment', 180, '984-7-79819-2', 'Transportation'),
(28, 19, '', '2022-12-27', 'Transferring', 750, '', 'Grocery '),
(29, 18, '', '2023-04-01', 'Withdraw', 4500, '142-7-12498-1', 'Grocery '),
(30, 17, '', '2023-08-12', 'Transferring', 1100, '125-7-39875-2', 'Online Shopping');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Account_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `Branch_ID` (`Branch_ID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`Branch_ID`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`Card_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`Customer_Address_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `customer_contact`
--
ALTER TABLE `customer_contact`
  ADD PRIMARY KEY (`Customer_Contact_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_ID`),
  ADD KEY `Branch_ID` (`Branch_ID`);

--
-- Indexes for table `employee_address`
--
ALTER TABLE `employee_address`
  ADD PRIMARY KEY (`Employee_address_ID`),
  ADD KEY `Employee_ID` (`Employee_ID`);

--
-- Indexes for table `employee_contact`
--
ALTER TABLE `employee_contact`
  ADD PRIMARY KEY (`Employee_Contact_ID`),
  ADD KEY `Employee_ID` (`Employee_ID`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`Loan_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- Indexes for table `loan_transaction`
--
ALTER TABLE `loan_transaction`
  ADD PRIMARY KEY (`Loan_Payment_ID`),
  ADD KEY `Loan_ID` (`Loan_ID`);

--
-- Indexes for table `pre_transaction`
--
ALTER TABLE `pre_transaction`
  ADD PRIMARY KEY (`Pre_Transaction_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`Transaction_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `Account_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `Branch_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `Card_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `Customer_Address_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customer_contact`
--
ALTER TABLE `customer_contact`
  MODIFY `Customer_Contact_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employee_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employee_address`
--
ALTER TABLE `employee_address`
  MODIFY `Employee_address_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employee_contact`
--
ALTER TABLE `employee_contact`
  MODIFY `Employee_Contact_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `Loan_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `loan_transaction`
--
ALTER TABLE `loan_transaction`
  MODIFY `Loan_Payment_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pre_transaction`
--
ALTER TABLE `pre_transaction`
  MODIFY `Pre_Transaction_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `Transaction_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`Branch_ID`) REFERENCES `branch` (`Branch_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `account` (`Account_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_address_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_contact`
--
ALTER TABLE `customer_contact`
  ADD CONSTRAINT `customer_contact_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Branch_ID`) REFERENCES `branch` (`Branch_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_address`
--
ALTER TABLE `employee_address`
  ADD CONSTRAINT `employee_address_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employee` (`Employee_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_contact`
--
ALTER TABLE `employee_contact`
  ADD CONSTRAINT `employee_contact_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employee` (`Employee_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `account` (`Account_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_transaction`
--
ALTER TABLE `loan_transaction`
  ADD CONSTRAINT `loan_transaction_ibfk_1` FOREIGN KEY (`Loan_ID`) REFERENCES `loan` (`Loan_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pre_transaction`
--
ALTER TABLE `pre_transaction`
  ADD CONSTRAINT `pre_transaction_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `account` (`Account_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `account` (`Account_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
