-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2013 at 11:57 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lp_paycharge`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_access_level`
--

DROP TABLE IF EXISTS `tbl_access_level`;
CREATE TABLE IF NOT EXISTS `tbl_access_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `tran_code` varchar(10) NOT NULL,
  `can_add` int(3) NOT NULL,
  `can_edit` int(3) NOT NULL,
  `can_delete` int(3) NOT NULL,
  `can_approve` int(3) NOT NULL,
  `can_certify` int(3) NOT NULL,
  `can_print` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_no` int(11) NOT NULL,
  `admin` decimal(18,2) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_admin`
--

REPLACE INTO `tbl_admin` (`id`, `admin_no`, `admin`, `created_at`, `updated_at`) VALUES
(1, 1, 199.00, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_charge_rate`
--

DROP TABLE IF EXISTS `tbl_charge_rate`;
CREATE TABLE IF NOT EXISTS `tbl_charge_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_no` int(11) NOT NULL,
  `transaction_name` varchar(50) NOT NULL,
  `moder_award_no` int(11) NOT NULL,
  `trans_type` int(11) NOT NULL,
  `company_no` int(11) NOT NULL,
  `date_of_quotation` varchar(50) NOT NULL,
  `B_12` varchar(50) NOT NULL,
  `B_14` varchar(50) NOT NULL,
  `B_15` varchar(50) NOT NULL,
  `B_16` varchar(50) NOT NULL,
  `B_17` varchar(50) NOT NULL,
  `B_18` varchar(50) NOT NULL,
  `B_19` varchar(50) NOT NULL,
  `B_20` varchar(50) NOT NULL,
  `B_21` varchar(50) NOT NULL,
  `B_22` varchar(50) NOT NULL,
  `B_24` varchar(50) NOT NULL,
  `B_26` varchar(50) NOT NULL,
  `B_27` varchar(50) NOT NULL,
  `B_29` varchar(50) NOT NULL,
  `B_30` varchar(50) NOT NULL,
  `B_31` varchar(50) NOT NULL,
  `B_32` varchar(50) NOT NULL,
  `B_33` varchar(50) NOT NULL,
  `B_34` varchar(50) NOT NULL,
  `B_35` varchar(50) NOT NULL,
  `B_36` varchar(50) NOT NULL,
  `B_37` varchar(50) NOT NULL,
  `B_38` varchar(50) NOT NULL,
  `B_51` varchar(50) NOT NULL,
  `B_52` varchar(50) NOT NULL,
  `B_53` varchar(50) NOT NULL,
  `B_54` varchar(50) NOT NULL,
  `B_55` varchar(50) NOT NULL,
  `B_56` varchar(50) NOT NULL,
  `B_59` varchar(100) NOT NULL,
  `B_60` varchar(100) NOT NULL,
  `B_61` varchar(100) NOT NULL,
  `B_62` varchar(100) NOT NULL,
  `B_63` varchar(100) NOT NULL,
  `B_64` varchar(100) NOT NULL,
  `B_65` varchar(100) NOT NULL,
  `B_66` varchar(100) NOT NULL,
  `B_67` varchar(100) NOT NULL,
  `B_68` varchar(100) NOT NULL,
  `B_69` varchar(100) NOT NULL,
  `C_25` varchar(50) NOT NULL,
  `C_26` varchar(50) NOT NULL,
  `C_27` varchar(50) NOT NULL,
  `C_28` varchar(50) NOT NULL,
  `C_30` varchar(50) NOT NULL,
  `C_31` varchar(50) NOT NULL,
  `C_32` varchar(50) NOT NULL,
  `C_33` varchar(50) NOT NULL,
  `C_34` varchar(50) NOT NULL,
  `C_35` varchar(50) NOT NULL,
  `C_36` varchar(50) NOT NULL,
  `C_37` varchar(50) NOT NULL,
  `C_52` varchar(50) NOT NULL,
  `C_53` varchar(50) NOT NULL,
  `C_54` varchar(50) NOT NULL,
  `C_55` varchar(50) NOT NULL,
  `C_56` varchar(50) NOT NULL,
  `C_57` varchar(50) NOT NULL,
  `D_4` varchar(50) NOT NULL,
  `D_5` varchar(50) NOT NULL,
  `D_15` varchar(50) NOT NULL,
  `D_16` varchar(50) NOT NULL,
  `D_17` varchar(50) NOT NULL,
  `D_18` varchar(50) NOT NULL,
  `D_19` varchar(50) NOT NULL,
  `D_20` varchar(50) NOT NULL,
  `D_21` varchar(50) NOT NULL,
  `D_22` varchar(50) NOT NULL,
  `D_25` varchar(50) NOT NULL,
  `D_26` varchar(50) NOT NULL,
  `D_27` varchar(50) NOT NULL,
  `D_28` varchar(50) NOT NULL,
  `D_29` varchar(50) NOT NULL,
  `D_30` varchar(50) NOT NULL,
  `D_31` varchar(50) NOT NULL,
  `D_32` varchar(50) NOT NULL,
  `D_33` varchar(50) NOT NULL,
  `D_34` varchar(50) NOT NULL,
  `D_35` varchar(50) NOT NULL,
  `D_36` varchar(50) NOT NULL,
  `D_37` varchar(50) NOT NULL,
  `D_38` varchar(50) NOT NULL,
  `swi_peror_cur` int(3) NOT NULL,
  `long_service` varchar(50) NOT NULL,
  `swi_process` int(3) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_contacts`
--

DROP TABLE IF EXISTS `tbl_client_contacts`;
CREATE TABLE IF NOT EXISTS `tbl_client_contacts` (
  `company_no` int(10) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `date_trans` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`company_no`,`contact_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_client_contacts`
--

REPLACE INTO `tbl_client_contacts` (`company_no`, `contact_no`, `date_trans`) VALUES
(2903887, 2, '2013-05-11 14:38:13'),
(34587987, 1, '2013-05-11 10:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

DROP TABLE IF EXISTS `tbl_company`;
CREATE TABLE IF NOT EXISTS `tbl_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `address_line1` varchar(50) NOT NULL,
  `address_line2` varchar(50) NOT NULL,
  `contact_first_name` varchar(50) NOT NULL,
  `contact_full_name` varchar(50) NOT NULL,
  `contact_title` varchar(50) NOT NULL,
  `state_no` int(11) NOT NULL,
  `client_no` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_company`
--

REPLACE INTO `tbl_company` (`id`, `company_name`, `department`, `address_line1`, `address_line2`, `contact_first_name`, `contact_full_name`, `contact_title`, `state_no`, `client_no`) VALUES
(7, 'Modesto Inc.', 'IT', 'Taguig', 'Makati', 'Lady Melinda Minette', 'Lady Modesto', 'CEO', 37, '2903887'),
(6, 'Jo Erik Inc.', 'IT', '1234', '4567', 'Jo Erik', 'Jo Erik San Jose', 'CEO', 37, '34587987');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacts`
--

DROP TABLE IF EXISTS `tbl_contacts`;
CREATE TABLE IF NOT EXISTS `tbl_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_no` int(11) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `pref_first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `contact_phone_no` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_contacts`
--

REPLACE INTO `tbl_contacts` (`id`, `contact_no`, `last_name`, `first_name`, `pref_first_name`, `middle_name`, `date_of_birth`, `position`, `contact_phone_no`, `email`, `username`, `password`) VALUES
(2, 1, 'San Jose', 'Jo Erika', 'Erik', 'San Pedro', '1970-01-01', 'Programmer', '09177134250', 'jesanjose@gmail.coma', 'joeriksanjose', 'youaremylady'),
(3, 2, 'Modesto', 'Lady Melinda Minette', 'Lady', 'Minerva', '1970-01-01', 'Programmer', '09177134250', 'lady.modesto@gmail.com', 'ladymodesto', 'ladyganda0726');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_insurance`
--

DROP TABLE IF EXISTS `tbl_insurance`;
CREATE TABLE IF NOT EXISTS `tbl_insurance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `insurance_no` int(11) NOT NULL,
  `insurance` decimal(18,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log_history`
--

DROP TABLE IF EXISTS `tbl_log_history`;
CREATE TABLE IF NOT EXISTS `tbl_log_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id_no` varchar(50) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `date_time_log` datetime NOT NULL,
  `remarks` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_long_services`
--

DROP TABLE IF EXISTS `tbl_long_services`;
CREATE TABLE IF NOT EXISTS `tbl_long_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `long_services_no` int(11) NOT NULL,
  `long_services` decimal(18,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ml1`
--

DROP TABLE IF EXISTS `tbl_ml1`;
CREATE TABLE IF NOT EXISTS `tbl_ml1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_no` int(11) NOT NULL,
  `cell_no` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `normal` decimal(18,2) NOT NULL,
  `early` decimal(18,2) NOT NULL,
  `afternoon` decimal(18,2) NOT NULL,
  `night` decimal(18,2) NOT NULL,
  `50%Shift` decimal(18,2) NOT NULL,
  `T1/4` decimal(18,2) NOT NULL,
  `T1/2` decimal(18,2) NOT NULL,
  `double` decimal(18,2) NOT NULL,
  `DT1/2` decimal(18,2) NOT NULL,
  `triple` decimal(18,2) NOT NULL,
  `calc_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ml2`
--

DROP TABLE IF EXISTS `tbl_ml2`;
CREATE TABLE IF NOT EXISTS `tbl_ml2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_no` int(11) NOT NULL,
  `cell_no` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `normal` decimal(18,2) NOT NULL,
  `early` decimal(18,2) NOT NULL,
  `afternoon` decimal(18,2) NOT NULL,
  `night` decimal(18,2) NOT NULL,
  `50%Shift` decimal(18,2) NOT NULL,
  `T1/4` decimal(18,2) NOT NULL,
  `T1/2` decimal(18,2) NOT NULL,
  `double` decimal(18,2) NOT NULL,
  `DT1/2` decimal(18,2) NOT NULL,
  `triple` decimal(18,2) NOT NULL,
  `calc_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ml3`
--

DROP TABLE IF EXISTS `tbl_ml3`;
CREATE TABLE IF NOT EXISTS `tbl_ml3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_no` int(11) NOT NULL,
  `cell_no` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `normal` decimal(18,2) NOT NULL,
  `early` decimal(18,2) NOT NULL,
  `afternoon` decimal(18,2) NOT NULL,
  `night` decimal(18,2) NOT NULL,
  `50%Shift` decimal(18,2) NOT NULL,
  `T1/4` decimal(18,2) NOT NULL,
  `T1/2` decimal(18,2) NOT NULL,
  `double` decimal(18,2) NOT NULL,
  `DT1/2` decimal(18,2) NOT NULL,
  `triple` decimal(18,2) NOT NULL,
  `calc_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ml4`
--

DROP TABLE IF EXISTS `tbl_ml4`;
CREATE TABLE IF NOT EXISTS `tbl_ml4` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_no` int(11) NOT NULL,
  `cell_no` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `normal` decimal(18,2) NOT NULL,
  `early` decimal(18,2) NOT NULL,
  `afternoon` decimal(18,2) NOT NULL,
  `night` decimal(18,2) NOT NULL,
  `50%Shift` decimal(18,2) NOT NULL,
  `T1/4` decimal(18,2) NOT NULL,
  `T1/2` decimal(18,2) NOT NULL,
  `double` decimal(18,2) NOT NULL,
  `DT1/2` decimal(18,2) NOT NULL,
  `triple` decimal(18,2) NOT NULL,
  `calc_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ml5`
--

DROP TABLE IF EXISTS `tbl_ml5`;
CREATE TABLE IF NOT EXISTS `tbl_ml5` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_no` int(11) NOT NULL,
  `cell_no` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `normal` decimal(18,2) NOT NULL,
  `early` decimal(18,2) NOT NULL,
  `afternoon` decimal(18,2) NOT NULL,
  `night` decimal(18,2) NOT NULL,
  `50%Shift` decimal(18,2) NOT NULL,
  `T1/4` decimal(18,2) NOT NULL,
  `T1/2` decimal(18,2) NOT NULL,
  `double` decimal(18,2) NOT NULL,
  `DT1/2` decimal(18,2) NOT NULL,
  `triple` decimal(18,2) NOT NULL,
  `calc_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ml6`
--

DROP TABLE IF EXISTS `tbl_ml6`;
CREATE TABLE IF NOT EXISTS `tbl_ml6` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_no` int(11) NOT NULL,
  `cell_no` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `normal` decimal(18,2) NOT NULL,
  `early` decimal(18,2) NOT NULL,
  `afternoon` decimal(18,2) NOT NULL,
  `night` decimal(18,2) NOT NULL,
  `50%Shift` decimal(18,2) NOT NULL,
  `T1/4` decimal(18,2) NOT NULL,
  `T1/2` decimal(18,2) NOT NULL,
  `double` decimal(18,2) NOT NULL,
  `DT1/2` decimal(18,2) NOT NULL,
  `triple` decimal(18,2) NOT NULL,
  `calc_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ml7`
--

DROP TABLE IF EXISTS `tbl_ml7`;
CREATE TABLE IF NOT EXISTS `tbl_ml7` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_no` int(11) NOT NULL,
  `cell_no` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `normal` decimal(18,2) NOT NULL,
  `early` decimal(18,2) NOT NULL,
  `afternoon` decimal(18,2) NOT NULL,
  `night` decimal(18,2) NOT NULL,
  `50%Shift` decimal(18,2) NOT NULL,
  `T1/4` decimal(18,2) NOT NULL,
  `T1/2` decimal(18,2) NOT NULL,
  `double` decimal(18,2) NOT NULL,
  `DT1/2` decimal(18,2) NOT NULL,
  `triple` decimal(18,2) NOT NULL,
  `calc_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ml8`
--

DROP TABLE IF EXISTS `tbl_ml8`;
CREATE TABLE IF NOT EXISTS `tbl_ml8` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_no` int(11) NOT NULL,
  `cell_no` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `normal` decimal(18,2) NOT NULL,
  `early` decimal(18,2) NOT NULL,
  `afternoon` decimal(18,2) NOT NULL,
  `night` decimal(18,2) NOT NULL,
  `50%Shift` decimal(18,2) NOT NULL,
  `T1/4` decimal(18,2) NOT NULL,
  `T1/2` decimal(18,2) NOT NULL,
  `double` decimal(18,2) NOT NULL,
  `DT1/2` decimal(18,2) NOT NULL,
  `triple` decimal(18,2) NOT NULL,
  `calc_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ml9`
--

DROP TABLE IF EXISTS `tbl_ml9`;
CREATE TABLE IF NOT EXISTS `tbl_ml9` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_no` int(11) NOT NULL,
  `cell_no` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `normal` decimal(18,2) NOT NULL,
  `early` decimal(18,2) NOT NULL,
  `afternoon` decimal(18,2) NOT NULL,
  `night` decimal(18,2) NOT NULL,
  `50%Shift` decimal(18,2) NOT NULL,
  `T1/4` decimal(18,2) NOT NULL,
  `T1/2` decimal(18,2) NOT NULL,
  `double` decimal(18,2) NOT NULL,
  `DT1/2` decimal(18,2) NOT NULL,
  `triple` decimal(18,2) NOT NULL,
  `calc_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ml10`
--

DROP TABLE IF EXISTS `tbl_ml10`;
CREATE TABLE IF NOT EXISTS `tbl_ml10` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_no` int(11) NOT NULL,
  `cell_no` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `normal` decimal(18,2) NOT NULL,
  `early` decimal(18,2) NOT NULL,
  `afternoon` decimal(18,2) NOT NULL,
  `night` decimal(18,2) NOT NULL,
  `50%Shift` decimal(18,2) NOT NULL,
  `T1/4` decimal(18,2) NOT NULL,
  `T1/2` decimal(18,2) NOT NULL,
  `double` decimal(18,2) NOT NULL,
  `DT1/2` decimal(18,2) NOT NULL,
  `triple` decimal(18,2) NOT NULL,
  `calc_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modern_award`
--

DROP TABLE IF EXISTS `tbl_modern_award`;
CREATE TABLE IF NOT EXISTS `tbl_modern_award` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modern_award_no` int(11) NOT NULL,
  `modern_award_name` varchar(100) NOT NULL,
  `B_14` varchar(50) NOT NULL,
  `B_15` varchar(50) NOT NULL,
  `B_20` varchar(50) NOT NULL,
  `B_21` varchar(50) NOT NULL,
  `B_22` varchar(50) NOT NULL,
  `B_26` varchar(50) NOT NULL,
  `B_27` varchar(50) NOT NULL,
  `B_28` varchar(50) NOT NULL,
  `B_29` varchar(50) NOT NULL,
  `B_30` varchar(50) NOT NULL,
  `B_31` varchar(50) NOT NULL,
  `B_32` varchar(50) NOT NULL,
  `B_33` varchar(50) NOT NULL,
  `B_34` varchar(50) NOT NULL,
  `B_35` varchar(50) NOT NULL,
  `B_36` varchar(50) NOT NULL,
  `B_37` varchar(50) NOT NULL,
  `B_38` varchar(50) NOT NULL,
  `allowance_caption1` varchar(50) NOT NULL,
  `allowance_caption2` varchar(50) NOT NULL,
  `allowance_caption3` varchar(50) NOT NULL,
  `allowance_caption4` varchar(50) NOT NULL,
  `allowance_caption5` varchar(50) NOT NULL,
  `allowance_rate1` varchar(50) NOT NULL,
  `allowance_rate2` varchar(50) NOT NULL,
  `allowance_rate3` varchar(50) NOT NULL,
  `allowance_rate4` varchar(50) NOT NULL,
  `allowance_rate5` varchar(50) NOT NULL,
  `B_51` varchar(50) NOT NULL,
  `B_52` varchar(50) NOT NULL,
  `B_53` varchar(50) NOT NULL,
  `B_54` varchar(50) NOT NULL,
  `B_55` varchar(50) NOT NULL,
  `B_56` varchar(50) NOT NULL,
  `m_allow_margin` varchar(50) NOT NULL,
  `B_59` varchar(100) NOT NULL,
  `B_60` varchar(100) NOT NULL,
  `B_61` varchar(100) NOT NULL,
  `B_62` varchar(100) NOT NULL,
  `B_63` varchar(100) NOT NULL,
  `B_64` varchar(100) NOT NULL,
  `B_65` varchar(100) NOT NULL,
  `B_66` varchar(100) NOT NULL,
  `B_67` varchar(100) NOT NULL,
  `B_68` varchar(100) NOT NULL,
  `B_69` varchar(100) NOT NULL,
  `C_52` varchar(50) NOT NULL,
  `C_53` varchar(50) NOT NULL,
  `C_54` varchar(50) NOT NULL,
  `C_55` varchar(50) NOT NULL,
  `C_56` varchar(50) NOT NULL,
  `C_57` varchar(50) NOT NULL,
  `long_sevice` varchar(50) NOT NULL,
  `payrate_1` decimal(18,2) NOT NULL,
  `payrate_2` decimal(18,2) NOT NULL,
  `payrate_3` decimal(18,2) NOT NULL,
  `payrate_4` decimal(18,2) NOT NULL,
  `payrate_5` decimal(18,2) NOT NULL,
  `payrate_6` decimal(18,2) NOT NULL,
  `payrate_7` decimal(18,2) NOT NULL,
  `payrate_8` decimal(18,2) NOT NULL,
  `payrate_9` decimal(18,2) NOT NULL,
  `payrate_10` decimal(18,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `swi_process` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_modern_award`
--

REPLACE INTO `tbl_modern_award` (`id`, `modern_award_no`, `modern_award_name`, `B_14`, `B_15`, `B_20`, `B_21`, `B_22`, `B_26`, `B_27`, `B_28`, `B_29`, `B_30`, `B_31`, `B_32`, `B_33`, `B_34`, `B_35`, `B_36`, `B_37`, `B_38`, `allowance_caption1`, `allowance_caption2`, `allowance_caption3`, `allowance_caption4`, `allowance_caption5`, `allowance_rate1`, `allowance_rate2`, `allowance_rate3`, `allowance_rate4`, `allowance_rate5`, `B_51`, `B_52`, `B_53`, `B_54`, `B_55`, `B_56`, `m_allow_margin`, `B_59`, `B_60`, `B_61`, `B_62`, `B_63`, `B_64`, `B_65`, `B_66`, `B_67`, `B_68`, `B_69`, `C_52`, `C_53`, `C_54`, `C_55`, `C_56`, `C_57`, `long_sevice`, `payrate_1`, `payrate_2`, `payrate_3`, `payrate_4`, `payrate_5`, `payrate_6`, `payrate_7`, `payrate_8`, `payrate_9`, `payrate_10`, `created_at`, `updated_at`, `swi_process`) VALUES
(11, 1, 'Test Awardeeeeeee', '', '', '', '', '', 'Erika', 'tyt', 'tiuy', 'tiy', 'ti', 'ytiy', 'ti', 'yti', 'yti', 'yt', 'iyt', 'iyt', 'iyt', '6978', '9876', '97', '7556', '654', '69', '976', '697', '234234', '564', '697', '76', '9876', '698', '674', '54', '654', 'sdnbmcvnbzxhjkbJSJDNX', 'jksdhfksjdhf', 'jkhflkjh', 'jhskjhdflsjdhfusdfsjh', 'nbmnbnvmnbv', 'hjh;ouioiu', 'sfasdfsadf', 'sadf', 'xcvzxcvx', 'cvsdfwerwe', 'asdqweq', '7654', '4', '476', '475', '476', '5475', '', 76.00, 78678.00, 687.00, 6.00, 9786.00, 97607.00, 876.00, 976.00, 97.00, 86987.00, '2013-05-11 19:39:20', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_allow`
--

DROP TABLE IF EXISTS `tbl_m_allow`;
CREATE TABLE IF NOT EXISTS `tbl_m_allow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_no` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `cell_no` varchar(2) NOT NULL,
  `meal` decimal(18,2) NOT NULL,
  `first_aid` decimal(18,2) NOT NULL,
  `L_hand_3` decimal(18,2) NOT NULL,
  `L_hand_10` decimal(18,2) NOT NULL,
  `L_hand_20` decimal(18,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payrate`
--

DROP TABLE IF EXISTS `tbl_payrate`;
CREATE TABLE IF NOT EXISTS `tbl_payrate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_no` int(11) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `grade_and_position` varchar(50) NOT NULL,
  `position_no` varchar(50) NOT NULL,
  `payrate` decimal(18,2) NOT NULL,
  `base_rate` decimal(18,2) NOT NULL,
  `casual_rate` decimal(18,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

DROP TABLE IF EXISTS `tbl_position`;
CREATE TABLE IF NOT EXISTS `tbl_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_print_dialog_default_values`
--

DROP TABLE IF EXISTS `tbl_print_dialog_default_values`;
CREATE TABLE IF NOT EXISTS `tbl_print_dialog_default_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_no` int(11) NOT NULL,
  `trans_type` varchar(6) NOT NULL,
  `grade1` tinyint(3) NOT NULL DEFAULT '0',
  `grade2` tinyint(3) NOT NULL DEFAULT '0',
  `grade3` tinyint(3) NOT NULL DEFAULT '0',
  `grade4` tinyint(3) NOT NULL DEFAULT '0',
  `grade5` tinyint(3) NOT NULL DEFAULT '0',
  `grade6` tinyint(3) NOT NULL DEFAULT '0',
  `grade7` tinyint(3) NOT NULL DEFAULT '0',
  `grade8` tinyint(3) NOT NULL DEFAULT '0',
  `grade9` tinyint(3) NOT NULL DEFAULT '0',
  `grade10` tinyint(3) NOT NULL DEFAULT '0',
  `normal` tinyint(3) NOT NULL DEFAULT '0',
  `early` tinyint(3) NOT NULL DEFAULT '0',
  `afternoon` tinyint(3) NOT NULL DEFAULT '0',
  `night` tinyint(3) NOT NULL DEFAULT '0',
  `50_shift` tinyint(3) NOT NULL DEFAULT '0',
  `t_14` tinyint(3) NOT NULL DEFAULT '0',
  `t_12` tinyint(3) NOT NULL DEFAULT '0',
  `double` tinyint(3) NOT NULL DEFAULT '0',
  `dt_12` tinyint(3) NOT NULL DEFAULT '0',
  `triple` tinyint(3) NOT NULL DEFAULT '0',
  `process` tinyint(3) NOT NULL DEFAULT '0',
  `p_normal_time` tinyint(3) NOT NULL DEFAULT '0',
  `p_time_and_half` tinyint(3) NOT NULL DEFAULT '0',
  `p_double_time` tinyint(3) NOT NULL DEFAULT '0',
  `p_double_and_half` tinyint(3) NOT NULL DEFAULT '0',
  `p_triple` tinyint(3) NOT NULL DEFAULT '0',
  `p_day` tinyint(3) NOT NULL DEFAULT '0',
  `p_early` tinyint(3) NOT NULL DEFAULT '0',
  `p_afternoon` tinyint(3) NOT NULL DEFAULT '0',
  `p_night` tinyint(3) NOT NULL DEFAULT '0',
  `p_half` tinyint(3) NOT NULL DEFAULT '0',
  `p_t_14` tinyint(3) NOT NULL DEFAULT '0',
  `calculator` varchar(50) NOT NULL,
  `print_company_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_print_dialog_default_values`
--

REPLACE INTO `tbl_print_dialog_default_values` (`id`, `trans_no`, `trans_type`, `grade1`, `grade2`, `grade3`, `grade4`, `grade5`, `grade6`, `grade7`, `grade8`, `grade9`, `grade10`, `normal`, `early`, `afternoon`, `night`, `50_shift`, `t_14`, `t_12`, `double`, `dt_12`, `triple`, `process`, `p_normal_time`, `p_time_and_half`, `p_double_time`, `p_double_and_half`, `p_triple`, `p_day`, `p_early`, `p_afternoon`, `p_night`, `p_half`, `p_t_14`, `calculator`, `print_company_no`) VALUES
(7, 1, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 'Calculator 1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_public`
--

DROP TABLE IF EXISTS `tbl_public`;
CREATE TABLE IF NOT EXISTS `tbl_public` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `public_no` int(11) NOT NULL,
  `public_value` decimal(18,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_public`
--

REPLACE INTO `tbl_public` (`id`, `public_no`, `public_value`, `created_at`, `updated_at`) VALUES
(1, 1, 13.01, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 55.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rate_increase`
--

DROP TABLE IF EXISTS `tbl_rate_increase`;
CREATE TABLE IF NOT EXISTS `tbl_rate_increase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_no` int(11) NOT NULL,
  `transaction_name` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `rate_1` decimal(18,2) NOT NULL,
  `rate_2` decimal(18,2) NOT NULL,
  `rate_3` decimal(18,2) NOT NULL,
  `rate_4` decimal(18,2) NOT NULL,
  `rate_5` decimal(18,2) NOT NULL,
  `rate_6` decimal(18,2) NOT NULL,
  `rate_7` decimal(18,2) NOT NULL,
  `rate_8` decimal(18,2) NOT NULL,
  `rate_9` decimal(18,2) NOT NULL,
  `rate_10` decimal(18,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

DROP TABLE IF EXISTS `tbl_state`;
CREATE TABLE IF NOT EXISTS `tbl_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_no` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `swi_active` int(3) NOT NULL,
  `tax` decimal(18,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `tbl_state`
--

REPLACE INTO `tbl_state` (`id`, `state_no`, `state_name`, `swi_active`, `tax`, `created_at`, `updated_at`) VALUES
(29, 29, 'asd', 1, 1.00, '2013-05-09 16:12:52', '0000-00-00 00:00:00'),
(30, 30, 'asd', 1, 0.00, '2013-05-05 03:00:04', '0000-00-00 00:00:00'),
(36, 37, 'ERIK-STATE', 1, 0.00, '2013-05-09 16:01:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_super`
--

DROP TABLE IF EXISTS `tbl_super`;
CREATE TABLE IF NOT EXISTS `tbl_super` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `super_no` int(11) NOT NULL,
  `super` decimal(18,2) NOT NULL,
  `effective_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_super`
--

REPLACE INTO `tbl_super` (`id`, `super_no`, `super`, `effective_date`, `created_at`, `updated_at`) VALUES
(1, 2, 123.00, '1970-01-01', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, 3245.00, '2013-08-20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 5, 100.00, '1970-01-01', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_system_setup`
--

DROP TABLE IF EXISTS `tbl_system_setup`;
CREATE TABLE IF NOT EXISTS `tbl_system_setup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_no` int(11) NOT NULL,
  `company_owner` varchar(50) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `c_address` varchar(250) NOT NULL,
  `contact_details` varchar(250) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `swi_default` int(3) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_system_setup`
--

REPLACE INTO `tbl_system_setup` (`id`, `company_no`, `company_owner`, `company_name`, `c_address`, `contact_details`, `logo`, `swi_default`, `created_at`, `updated_at`) VALUES
(1, 1, 'Labour Power', 'Labour Power', 'Australia', 'Australia', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'Labour Power1', 'Labour Power', 'Australia', 'Australia', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tempp_and_cpending`
--

DROP TABLE IF EXISTS `tbl_tempp_and_cpending`;
CREATE TABLE IF NOT EXISTS `tbl_tempp_and_cpending` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_no` varchar(100) NOT NULL,
  `count_no` int(11) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `classification` varchar(50) NOT NULL,
  `1` varchar(50) NOT NULL,
  `2` varchar(50) NOT NULL,
  `3` varchar(50) NOT NULL,
  `4` varchar(50) NOT NULL,
  `5` varchar(50) NOT NULL,
  `6` varchar(50) NOT NULL,
  `7` varchar(50) NOT NULL,
  `8` varchar(50) NOT NULL,
  `9` varchar(50) NOT NULL,
  `10` varchar(50) NOT NULL,
  `grade_no` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_charge_rate`
--

DROP TABLE IF EXISTS `tbl_temp_charge_rate`;
CREATE TABLE IF NOT EXISTS `tbl_temp_charge_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_no` int(11) NOT NULL,
  `cell_no` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `1` varchar(50) NOT NULL,
  `2` varchar(50) NOT NULL,
  `3` varchar(50) NOT NULL,
  `4` varchar(50) NOT NULL,
  `5` varchar(50) NOT NULL,
  `6` varchar(50) NOT NULL,
  `7` varchar(50) NOT NULL,
  `8` varchar(50) NOT NULL,
  `9` varchar(50) NOT NULL,
  `10` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_preview_charge_rate`
--

DROP TABLE IF EXISTS `tbl_temp_preview_charge_rate`;
CREATE TABLE IF NOT EXISTS `tbl_temp_preview_charge_rate` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `trans_no` int(10) NOT NULL,
  `trans_name` varchar(50) DEFAULT NULL,
  `trans_type` int(10) DEFAULT NULL,
  `company_no` int(10) DEFAULT NULL,
  `date_of_quotation` varchar(50) DEFAULT NULL,
  `B_12` varchar(50) DEFAULT NULL,
  `B_13` varchar(50) DEFAULT NULL,
  `B_14` varchar(50) DEFAULT NULL,
  `B_15` varchar(50) DEFAULT NULL,
  `B_16` varchar(50) DEFAULT NULL,
  `B_17` varchar(50) DEFAULT NULL,
  `B_18` varchar(50) DEFAULT NULL,
  `B_19` varchar(50) DEFAULT NULL,
  `B_20` varchar(50) DEFAULT NULL,
  `B_21` varchar(50) DEFAULT NULL,
  `B_22` varchar(50) DEFAULT NULL,
  `B_23` varchar(50) DEFAULT NULL,
  `B_24` varchar(50) DEFAULT NULL,
  `B_25` varchar(50) DEFAULT NULL,
  `B_26` varchar(50) DEFAULT NULL,
  `B_27` varchar(50) DEFAULT NULL,
  `B_28` varchar(50) DEFAULT NULL,
  `B_29` varchar(50) DEFAULT NULL,
  `B_30` varchar(50) DEFAULT NULL,
  `B_31` varchar(50) DEFAULT NULL,
  `B_32` varchar(50) DEFAULT NULL,
  `B_33` varchar(50) DEFAULT NULL,
  `B_34` varchar(50) DEFAULT NULL,
  `B_35` varchar(50) DEFAULT NULL,
  `B_36` varchar(50) DEFAULT NULL,
  `B_37` varchar(50) DEFAULT NULL,
  `B_38` varchar(50) DEFAULT NULL,
  `B_39` varchar(50) DEFAULT NULL,
  `B_40` varchar(50) DEFAULT NULL,
  `B_41` varchar(50) DEFAULT NULL,
  `B_42` varchar(50) DEFAULT NULL,
  `B_43` varchar(50) DEFAULT NULL,
  `B_44` varchar(50) DEFAULT NULL,
  `B_45` varchar(50) DEFAULT NULL,
  `B_46` varchar(50) DEFAULT NULL,
  `B_47` varchar(50) DEFAULT NULL,
  `B_48` varchar(50) DEFAULT NULL,
  `B_49` varchar(50) DEFAULT NULL,
  `B_50` varchar(50) DEFAULT NULL,
  `B_51` varchar(50) DEFAULT NULL,
  `B_52` varchar(50) DEFAULT NULL,
  `B_53` varchar(50) DEFAULT NULL,
  `B_54` varchar(50) DEFAULT NULL,
  `B_55` varchar(50) DEFAULT NULL,
  `B_56` varchar(50) DEFAULT NULL,
  `B_57` varchar(50) DEFAULT NULL,
  `B_58` varchar(50) DEFAULT NULL,
  `B_59` varchar(100) DEFAULT NULL,
  `B_60` varchar(100) DEFAULT NULL,
  `B_61` varchar(100) DEFAULT NULL,
  `B_62` varchar(100) DEFAULT NULL,
  `B_63` varchar(100) DEFAULT NULL,
  `B_64` varchar(100) DEFAULT NULL,
  `B_65` varchar(100) DEFAULT NULL,
  `B_66` varchar(100) DEFAULT NULL,
  `B_67` varchar(100) DEFAULT NULL,
  `B_68` varchar(100) DEFAULT NULL,
  `B_69` varchar(50) DEFAULT NULL,
  `C_25` varchar(50) DEFAULT NULL,
  `C_26` varchar(50) DEFAULT NULL,
  `C_27` varchar(50) DEFAULT NULL,
  `C_28` varchar(50) DEFAULT NULL,
  `C_29` varchar(50) DEFAULT NULL,
  `C_30` varchar(50) DEFAULT NULL,
  `C_31` varchar(50) DEFAULT NULL,
  `C_32` varchar(50) DEFAULT NULL,
  `C_33` varchar(50) DEFAULT NULL,
  `C_34` varchar(50) DEFAULT NULL,
  `C_35` varchar(50) DEFAULT NULL,
  `C_36` varchar(50) DEFAULT NULL,
  `C_37` varchar(50) DEFAULT NULL,
  `C_52` varchar(50) DEFAULT NULL,
  `C_53` varchar(50) DEFAULT NULL,
  `C_54` varchar(50) DEFAULT NULL,
  `C_55` varchar(50) DEFAULT NULL,
  `C_56` varchar(50) DEFAULT NULL,
  `C_57` varchar(50) DEFAULT NULL,
  `D_4` varchar(50) DEFAULT NULL,
  `D_5` varchar(50) DEFAULT NULL,
  `D_15` varchar(50) DEFAULT NULL,
  `D_16` varchar(50) DEFAULT NULL,
  `D_17` varchar(50) DEFAULT NULL,
  `D_18` varchar(50) DEFAULT NULL,
  `D_19` varchar(50) DEFAULT NULL,
  `D_20` varchar(50) DEFAULT NULL,
  `D_21` varchar(50) DEFAULT NULL,
  `D_22` varchar(50) DEFAULT NULL,
  `D_25` varchar(50) DEFAULT NULL,
  `D_26` varchar(50) DEFAULT NULL,
  `D_27` varchar(50) DEFAULT NULL,
  `D_28` varchar(50) DEFAULT NULL,
  `D_30` varchar(50) DEFAULT NULL,
  `D_31` varchar(50) DEFAULT NULL,
  `D_32` varchar(50) DEFAULT NULL,
  `D_33` varchar(50) DEFAULT NULL,
  `D_34` varchar(50) DEFAULT NULL,
  `D_35` varchar(50) DEFAULT NULL,
  `D_36` varchar(50) DEFAULT NULL,
  `D_37` varchar(50) DEFAULT NULL,
  `D_38` varchar(50) DEFAULT NULL,
  `swi_peror_cur` int(10) DEFAULT NULL,
  `position_1` varchar(50) DEFAULT NULL,
  `position_2` varchar(50) DEFAULT NULL,
  `position_3` varchar(50) DEFAULT NULL,
  `position_4` varchar(50) DEFAULT NULL,
  `position_5` varchar(50) DEFAULT NULL,
  `position_6` varchar(50) DEFAULT NULL,
  `position_7` varchar(50) DEFAULT NULL,
  `position_8` varchar(50) DEFAULT NULL,
  `position_9` varchar(50) DEFAULT NULL,
  `position_10` varchar(50) DEFAULT NULL,
  `position_11` varchar(50) DEFAULT NULL,
  `pay_rate_1` varchar(50) DEFAULT NULL,
  `pay_rate_2` varchar(50) DEFAULT NULL,
  `pay_rate_3` varchar(50) DEFAULT NULL,
  `pay_rate_4` varchar(50) DEFAULT NULL,
  `pay_rate_5` varchar(50) DEFAULT NULL,
  `pay_rate_6` varchar(50) DEFAULT NULL,
  `pay_rate_7` varchar(50) DEFAULT NULL,
  `pay_rate_8` varchar(50) DEFAULT NULL,
  `pay_rate_9` varchar(50) DEFAULT NULL,
  `pay_rate_10` varchar(50) DEFAULT NULL,
  `base_rate_1` varchar(50) DEFAULT NULL,
  `base_rate_2` varchar(50) DEFAULT NULL,
  `base_rate_3` varchar(50) DEFAULT NULL,
  `base_rate_4` varchar(50) DEFAULT NULL,
  `base_rate_5` varchar(50) DEFAULT NULL,
  `base_rate_6` varchar(50) DEFAULT NULL,
  `base_rate_7` varchar(50) DEFAULT NULL,
  `base_rate_8` varchar(50) DEFAULT NULL,
  `base_rate_9` varchar(50) DEFAULT NULL,
  `base_rate_10` varchar(50) DEFAULT NULL,
  `casual_rate_1` varchar(50) DEFAULT NULL,
  `casual_rate_2` varchar(50) DEFAULT NULL,
  `casual_rate_3` varchar(50) DEFAULT NULL,
  `casual_rate_4` varchar(50) DEFAULT NULL,
  `casual_rate_5` varchar(50) DEFAULT NULL,
  `casual_rate_6` varchar(50) DEFAULT NULL,
  `casual_rate_7` varchar(50) DEFAULT NULL,
  `casual_rate_8` varchar(50) DEFAULT NULL,
  `casual_rate_9` varchar(50) DEFAULT NULL,
  `casual_rate_10` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tran_code`
--

DROP TABLE IF EXISTS `tbl_tran_code`;
CREATE TABLE IF NOT EXISTS `tbl_tran_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tran_code` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `emp_id_no` varchar(20) NOT NULL,
  `admin` tinyint(3) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_users`
--

REPLACE INTO `tbl_users` (`id`, `username`, `password`, `full_name`, `emp_id_no`, `admin`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'adminto', 'admin', '12345', 1, '2013-05-03 13:29:25', '0000-00-00 00:00:00'),
(2, 'joeriksanjose', 'youaremylady', 'Jo Erik San Jose', '', 1, '2013-05-04 02:13:49', '0000-00-00 00:00:00'),
(3, 'salesako', 'ako', 'Sales', '', 0, '2013-05-11 21:12:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work_cover`
--

DROP TABLE IF EXISTS `tbl_work_cover`;
CREATE TABLE IF NOT EXISTS `tbl_work_cover` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `work_cover_no` int(11) NOT NULL,
  `work_cover_code` varchar(50) NOT NULL,
  `work_cover` decimal(18,2) NOT NULL,
  `state_no` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_work_cover`
--

REPLACE INTO `tbl_work_cover` (`id`, `work_cover_no`, `work_cover_code`, `work_cover`, `state_no`, `created_at`, `updated_at`) VALUES
(1, 0, 'asd', 123.00, 37, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'transportation', 123456.00, 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
