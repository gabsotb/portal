-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2013 at 02:41 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rdbeportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `approved_applications`
--

CREATE TABLE IF NOT EXISTS `approved_applications` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_id` bigint(20) NOT NULL,
  `application_type` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `business_id_idx` (`business_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `approved_applications`
--


-- --------------------------------------------------------

--
-- Table structure for table `business_application_status`
--

CREATE TABLE IF NOT EXISTS `business_application_status` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_id` bigint(20) NOT NULL,
  `application_status` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `business_id_idx` (`business_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `business_application_status`
--


-- --------------------------------------------------------

--
-- Table structure for table `business_plan`
--

CREATE TABLE IF NOT EXISTS `business_plan` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `investment_id` bigint(20) NOT NULL,
  `executive_summary` text NOT NULL,
  `promoter_profile` text NOT NULL,
  `project_background` text NOT NULL,
  `equity_financing` text NOT NULL,
  `income_statement` text NOT NULL,
  `cashflow_statement` text NOT NULL,
  `payback_period` text NOT NULL,
  `npv` text NOT NULL,
  `loan_amortization` text NOT NULL,
  `implementation_plan` text NOT NULL,
  `notes` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `investment_id_idx` (`investment_id`),
  KEY `created_by_idx` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `business_plan`
--


-- --------------------------------------------------------

--
-- Table structure for table `e_i_application`
--

CREATE TABLE IF NOT EXISTS `e_i_application` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_regno` varchar(255) NOT NULL,
  `developer_name` varchar(255) NOT NULL,
  `developer_title` varchar(255) NOT NULL,
  `developer_address` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_purpose` text NOT NULL,
  `project_nature` text NOT NULL,
  `project_site` text NOT NULL,
  `project_sitelaws` text NOT NULL,
  `environment_impacts` text NOT NULL,
  `other_alternatives` text,
  `other_information` text,
  `user_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `company_regno` (`company_regno`),
  KEY `created_by_idx` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `e_i_application`
--


-- --------------------------------------------------------

--
-- Table structure for table `e_i_application_decision`
--

CREATE TABLE IF NOT EXISTS `e_i_application_decision` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eireport_id` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `eireport_id_idx` (`eireport_id`),
  KEY `created_by_idx` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `e_i_application_decision`
--


-- --------------------------------------------------------

--
-- Table structure for table `e_i_application_status`
--

CREATE TABLE IF NOT EXISTS `e_i_application_status` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) NOT NULL,
  `application_status` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id_idx` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `e_i_application_status`
--


-- --------------------------------------------------------

--
-- Table structure for table `e_i_a_certificate`
--

CREATE TABLE IF NOT EXISTS `e_i_a_certificate` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `serial_number` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `serial_number` (`serial_number`),
  UNIQUE KEY `company_id` (`company_id`),
  KEY `company_id_idx` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `e_i_a_certificate`
--


-- --------------------------------------------------------

--
-- Table structure for table `e_i_report`
--

CREATE TABLE IF NOT EXISTS `e_i_report` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) NOT NULL,
  `ei_doc` varchar(255) NOT NULL,
  `emp_doc` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `company_id` (`company_id`),
  KEY `company_id_idx` (`company_id`),
  KEY `created_by_idx` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `e_i_report`
--


-- --------------------------------------------------------

--
-- Table structure for table `e_i_task_assignment`
--

CREATE TABLE IF NOT EXISTS `e_i_task_assignment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_assigned` bigint(20) NOT NULL,
  `user_assigning` varchar(255) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `instructions` varchar(255) NOT NULL,
  `duedate` datetime NOT NULL,
  `work_status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `company_id_idx` (`company_id`),
  KEY `user_assigned_idx` (`user_assigned`),
  KEY `created_by_idx` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `e_i_task_assignment`
--


-- --------------------------------------------------------

--
-- Table structure for table `investment_application`
--

CREATE TABLE IF NOT EXISTS `investment_application` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `registration_number` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `job_created` bigint(20) NOT NULL,
  `job_category` text NOT NULL,
  `company_legal_nature` text NOT NULL,
  `company_representative` varchar(255) NOT NULL,
  `application_letter` varchar(255) NOT NULL,
  `incorporation_certificate` varchar(255) NOT NULL,
  `shareholding_list` varchar(255) NOT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `username_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `registration_number` (`registration_number`),
  KEY `created_by_idx` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `investment_application`
--


-- --------------------------------------------------------

--
-- Table structure for table `investment_certificate`
--

CREATE TABLE IF NOT EXISTS `investment_certificate` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `serial_number` bigint(20) NOT NULL,
  `business_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `serial_number` (`serial_number`),
  UNIQUE KEY `business_id` (`business_id`),
  KEY `business_id_idx` (`business_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `investment_certificate`
--


-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sender` varchar(255) NOT NULL,
  `recepient` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `attachement` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_id` bigint(20) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'notpaid',
  `slip_number` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `business_id_idx` (`business_id`),
  KEY `created_by_idx` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `payment`
--


-- --------------------------------------------------------

--
-- Table structure for table `project_impact`
--

CREATE TABLE IF NOT EXISTS `project_impact` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) NOT NULL,
  `impact_level` varchar(255) NOT NULL,
  `comments` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `company_id_idx` (`company_id`),
  KEY `created_by_idx` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `project_impact`
--


-- --------------------------------------------------------

--
-- Table structure for table `project_summary`
--

CREATE TABLE IF NOT EXISTS `project_summary` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `investment_id` bigint(20) NOT NULL,
  `business_sector` varchar(255) NOT NULL,
  `techinical_viability` text NOT NULL,
  `planned_investment` text NOT NULL,
  `employment_created` text NOT NULL,
  `job_categories` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `investment_id_idx` (`investment_id`),
  KEY `created_by_idx` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `project_summary`
--


-- --------------------------------------------------------

--
-- Table structure for table `public_hearing`
--

CREATE TABLE IF NOT EXISTS `public_hearing` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) NOT NULL,
  `report` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `company_id_idx` (`company_id`),
  KEY `created_by_idx` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `public_hearing`
--


-- --------------------------------------------------------

--
-- Table structure for table `rejected_applications`
--

CREATE TABLE IF NOT EXISTS `rejected_applications` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_id` bigint(20) NOT NULL,
  `application_type` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `business_id_idx` (`business_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rejected_applications`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_forgot_password`
--

CREATE TABLE IF NOT EXISTS `sf_guard_forgot_password` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `unique_key` varchar(255) DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sf_guard_forgot_password`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sf_guard_group`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_group_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group_permission` (
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_group_permission`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sf_guard_permission`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_remember_key`
--

CREATE TABLE IF NOT EXISTS `sf_guard_remember_key` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sf_guard_remember_key`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_address` (`email_address`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sf_guard_user`
--

INSERT INTO `sf_guard_user` (`id`, `first_name`, `last_name`, `email_address`, `username`, `algorithm`, `salt`, `password`, `is_active`, `is_super_admin`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Investor', 'Investor', 'investor@rdb.com', 'investor', 'sha1', '1efaaa9adbe3670b2fbe669ae9038e10', '83376ecb8b5c879f7b347dca33b554b6db9d1e82', 1, 0, '2013-02-05 14:15:04', '2013-02-05 08:24:00', '2013-02-05 14:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_group` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_user_group`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_permission` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_user_permission`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_profile`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_profile` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `email_new` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `validate_at` datetime DEFAULT NULL,
  `validate` varchar(33) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `email_new` (`email_new`),
  KEY `validate_idx` (`validate`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sf_guard_user_profile`
--


-- --------------------------------------------------------

--
-- Table structure for table `task_assignment`
--

CREATE TABLE IF NOT EXISTS `task_assignment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_assigned` bigint(20) NOT NULL,
  `user_assigning` varchar(255) NOT NULL,
  `investmentapp_id` bigint(20) NOT NULL,
  `instructions` varchar(255) NOT NULL,
  `duedate` datetime NOT NULL,
  `work_status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `investmentapp_id_idx` (`investmentapp_id`),
  KEY `user_assigned_idx` (`user_assigned`),
  KEY `created_by_idx` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `task_assignment`
--


-- --------------------------------------------------------

--
-- Table structure for table `tor`
--

CREATE TABLE IF NOT EXISTS `tor` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `impact_id` bigint(20) NOT NULL,
  `issues_assessed` text NOT NULL,
  `specific_tasks` text NOT NULL,
  `stake_holders` text NOT NULL,
  `experts` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `impact_id_idx` (`impact_id`),
  KEY `created_by_idx` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tor`
--


-- --------------------------------------------------------

--
-- Table structure for table `tor_status`
--

CREATE TABLE IF NOT EXISTS `tor_status` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tor_id` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `comments` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `tor_id_idx` (`tor_id`),
  KEY `created_by_idx` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tor_status`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `approved_applications`
--
ALTER TABLE `approved_applications`
  ADD CONSTRAINT `approved_applications_business_id_investment_application_id` FOREIGN KEY (`business_id`) REFERENCES `investment_application` (`id`);

--
-- Constraints for table `business_application_status`
--
ALTER TABLE `business_application_status`
  ADD CONSTRAINT `bbii` FOREIGN KEY (`business_id`) REFERENCES `investment_application` (`id`);

--
-- Constraints for table `business_plan`
--
ALTER TABLE `business_plan`
  ADD CONSTRAINT `business_plan_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `business_plan_investment_id_investment_application_id` FOREIGN KEY (`investment_id`) REFERENCES `investment_application` (`id`);

--
-- Constraints for table `e_i_application`
--
ALTER TABLE `e_i_application`
  ADD CONSTRAINT `e_i_application_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `e_i_application_decision`
--
ALTER TABLE `e_i_application_decision`
  ADD CONSTRAINT `e_i_application_decision_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `e_i_application_decision_eireport_id_e_i_report_id` FOREIGN KEY (`eireport_id`) REFERENCES `e_i_report` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `e_i_application_status`
--
ALTER TABLE `e_i_application_status`
  ADD CONSTRAINT `e_i_application_status_company_id_e_i_application_id` FOREIGN KEY (`company_id`) REFERENCES `e_i_application` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `e_i_a_certificate`
--
ALTER TABLE `e_i_a_certificate`
  ADD CONSTRAINT `e_i_a_certificate_company_id_e_i_application_id` FOREIGN KEY (`company_id`) REFERENCES `e_i_application` (`id`);

--
-- Constraints for table `e_i_report`
--
ALTER TABLE `e_i_report`
  ADD CONSTRAINT `e_i_report_company_id_e_i_application_id` FOREIGN KEY (`company_id`) REFERENCES `e_i_application` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `e_i_report_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `e_i_task_assignment`
--
ALTER TABLE `e_i_task_assignment`
  ADD CONSTRAINT `e_i_task_assignment_company_id_e_i_application_id` FOREIGN KEY (`company_id`) REFERENCES `e_i_application` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `e_i_task_assignment_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `e_i_task_assignment_user_assigned_sf_guard_user_id` FOREIGN KEY (`user_assigned`) REFERENCES `sf_guard_user` (`id`);

--
-- Constraints for table `investment_application`
--
ALTER TABLE `investment_application`
  ADD CONSTRAINT `investment_application_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `investment_certificate`
--
ALTER TABLE `investment_certificate`
  ADD CONSTRAINT `investment_certificate_business_id_investment_application_id` FOREIGN KEY (`business_id`) REFERENCES `investment_application` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_business_id_investment_application_id` FOREIGN KEY (`business_id`) REFERENCES `investment_application` (`id`),
  ADD CONSTRAINT `payment_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_impact`
--
ALTER TABLE `project_impact`
  ADD CONSTRAINT `project_impact_company_id_e_i_application_id` FOREIGN KEY (`company_id`) REFERENCES `e_i_application` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_impact_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_summary`
--
ALTER TABLE `project_summary`
  ADD CONSTRAINT `project_summary_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_summary_investment_id_investment_application_id` FOREIGN KEY (`investment_id`) REFERENCES `investment_application` (`id`);

--
-- Constraints for table `public_hearing`
--
ALTER TABLE `public_hearing`
  ADD CONSTRAINT `public_hearing_company_id_e_i_application_id` FOREIGN KEY (`company_id`) REFERENCES `e_i_application` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `public_hearing_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rejected_applications`
--
ALTER TABLE `rejected_applications`
  ADD CONSTRAINT `rejected_applications_business_id_investment_application_id` FOREIGN KEY (`business_id`) REFERENCES `investment_application` (`id`);

--
-- Constraints for table `sf_guard_forgot_password`
--
ALTER TABLE `sf_guard_forgot_password`
  ADD CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
  ADD CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
  ADD CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
  ADD CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
  ADD CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_profile`
--
ALTER TABLE `sf_guard_user_profile`
  ADD CONSTRAINT `sf_guard_user_profile_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `task_assignment`
--
ALTER TABLE `task_assignment`
  ADD CONSTRAINT `task_assignment_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `task_assignment_investmentapp_id_investment_application_id` FOREIGN KEY (`investmentapp_id`) REFERENCES `investment_application` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `task_assignment_user_assigned_sf_guard_user_id` FOREIGN KEY (`user_assigned`) REFERENCES `sf_guard_user` (`id`);

--
-- Constraints for table `tor`
--
ALTER TABLE `tor`
  ADD CONSTRAINT `tor_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tor_impact_id_project_impact_id` FOREIGN KEY (`impact_id`) REFERENCES `project_impact` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tor_status`
--
ALTER TABLE `tor_status`
  ADD CONSTRAINT `tor_status_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tor_status_tor_id_tor_id` FOREIGN KEY (`tor_id`) REFERENCES `tor` (`id`) ON DELETE CASCADE;
