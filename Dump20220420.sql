CREATE DATABASE  IF NOT EXISTS `hrsale` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `hrsale`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: 192.168.88.99    Database: hrsale
-- ------------------------------------------------------
-- Server version	5.5.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `a_c`
--

DROP TABLE IF EXISTS `a_c`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_c` (
  `val` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `android_notif`
--

DROP TABLE IF EXISTS `android_notif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `android_notif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notif_content` text,
  `notif_start_date` datetime DEFAULT NULL,
  `notif_end_date` datetime DEFAULT NULL,
  `notif_type` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `covid`
--

DROP TABLE IF EXISTS `covid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `covid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) DEFAULT NULL,
  `umur` varchar(255) DEFAULT NULL,
  `kelamin` varchar(255) DEFAULT NULL,
  `kabkota` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kelurahan` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lon` varchar(255) DEFAULT NULL,
  `status_pasien` varchar(255) DEFAULT NULL,
  `desa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `idx_covid_id` (`id`,`lat`,`lon`),
  KEY `idx_covid_id_1` (`id`),
  KEY `idx_covid_latlon` (`lat`,`lon`)
) ENGINE=InnoDB AUTO_INCREMENT=5048 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `masteremployee1`
--

DROP TABLE IF EXISTS `masteremployee1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `masteremployee1` (
  `Nip` varchar(11) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Alamat` varchar(200) DEFAULT NULL,
  `No Telp` varchar(30) DEFAULT NULL,
  `Pengalaman` varchar(200) DEFAULT NULL,
  `Tempat Lahir` varchar(30) DEFAULT NULL,
  `Tgl Lahir` date DEFAULT NULL,
  `Agama` varchar(20) DEFAULT NULL,
  `Jenis Kelamin` char(1) NOT NULL,
  `Status Nikah` varchar(20) DEFAULT NULL,
  `Jumlah Anak` tinyint(3) unsigned DEFAULT '0',
  `Status PPh21` varchar(5) NOT NULL,
  `Pendidikan` varchar(30) DEFAULT NULL,
  `Kode Divisi` varchar(15) DEFAULT NULL,
  `Kode Bagian` varchar(20) DEFAULT NULL,
  `Kode Jabatan` varchar(20) DEFAULT NULL,
  `Kode Group` varchar(20) DEFAULT NULL,
  `Kode Admin` varchar(20) DEFAULT NULL,
  `Kode Kontrak` varchar(20) NOT NULL,
  `Sales Office` varchar(5) DEFAULT NULL,
  `Kode Periode` varchar(10) DEFAULT NULL,
  `Tgl Masuk` date DEFAULT NULL,
  `Tgl Keluar` date DEFAULT NULL,
  `Alasan Keluar` varchar(50) DEFAULT NULL,
  `Aktif` bit(1) DEFAULT b'0',
  `Gaji per Bulan` double(9,0) DEFAULT '0',
  `Jumlah SP` tinyint(3) unsigned DEFAULT '0',
  `No KPJ` varchar(20) DEFAULT NULL,
  `No HLD` varchar(20) DEFAULT NULL,
  `Astek` tinyint(1) NOT NULL DEFAULT '0',
  `SPSI` tinyint(1) NOT NULL,
  `Koperasi` tinyint(1) NOT NULL,
  `No Rekening` varchar(20) DEFAULT NULL,
  `Jari Bermasalah` bit(1) DEFAULT b'0',
  `Catatan` varchar(255) DEFAULT NULL,
  `NPWP` varchar(25) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Begda` date NOT NULL,
  `Endda` date NOT NULL,
  `CreatedBy` varchar(16) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ChangedBy` varchar(16) NOT NULL,
  `ChangedDate` datetime NOT NULL,
  `User` varchar(200) DEFAULT '',
  PRIMARY KEY (`Nip`,`Begda`) USING BTREE,
  KEY `mempind` (`Nip`,`Kode Bagian`,`Kode Divisi`,`Kode Admin`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `masterijin`
--

DROP TABLE IF EXISTS `masterijin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `masterijin` (
  `Jenis` varchar(10) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Potong Cuti` bit(1) NOT NULL,
  `Tambah Cuti` bit(1) NOT NULL,
  `Gaji Dibayar` bit(1) NOT NULL,
  `Maksimum` tinyint(3) unsigned NOT NULL,
  `Full Day` bit(1) NOT NULL,
  `Loss Time` bit(1) NOT NULL,
  `CreatedBy` varchar(16) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ChangedBy` varchar(16) NOT NULL,
  `ChangedDate` datetime NOT NULL,
  PRIMARY KEY (`Jenis`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_advance_salaries`
--

DROP TABLE IF EXISTS `xin_advance_salaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_advance_salaries` (
  `advance_salary_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `month_year` varchar(255) NOT NULL,
  `advance_amount` varchar(255) NOT NULL,
  `one_time_deduct` varchar(50) NOT NULL,
  `monthly_installment` varchar(255) NOT NULL,
  `total_paid` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `status` int(11) DEFAULT NULL,
  `is_deducted_from_salary` int(11) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`advance_salary_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_announcements`
--

DROP TABLE IF EXISTS `xin_announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_announcements` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `company_id` int(111) NOT NULL,
  `location_id` int(11) NOT NULL,
  `department_id` int(111) NOT NULL,
  `published_by` int(111) NOT NULL,
  `summary` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_notify` int(11) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `photo_announcement` text,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_assets`
--

DROP TABLE IF EXISTS `xin_assets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_assets` (
  `assets_id` int(111) NOT NULL AUTO_INCREMENT,
  `assets_category_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `company_asset_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `purchase_date` varchar(255) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `warranty_end_date` varchar(255) NOT NULL,
  `asset_note` text NOT NULL,
  `asset_image` varchar(255) NOT NULL,
  `is_working` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`assets_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_assets_categories`
--

DROP TABLE IF EXISTS `xin_assets_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_assets_categories` (
  `assets_category_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`assets_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_attendance_time`
--

DROP TABLE IF EXISTS `xin_attendance_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_attendance_time` (
  `time_attendance_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `attendance_date` varchar(255) NOT NULL,
  `clock_in` varchar(255) NOT NULL,
  `clock_in_ip_address` varchar(255) NOT NULL,
  `clock_out` varchar(255) NOT NULL,
  `clock_out_ip_address` varchar(255) NOT NULL,
  `clock_in_out` varchar(255) NOT NULL,
  `clock_in_latitude` varchar(150) NOT NULL,
  `clock_in_longitude` varchar(150) NOT NULL,
  `clock_in_address` text NOT NULL,
  `clock_out_latitude` varchar(150) NOT NULL,
  `clock_out_longitude` varchar(150) NOT NULL,
  `clock_out_address` text NOT NULL,
  `time_late` varchar(255) NOT NULL,
  `early_leaving` varchar(255) NOT NULL,
  `overtime` varchar(255) NOT NULL,
  `total_work` varchar(255) NOT NULL,
  `total_rest` varchar(255) NOT NULL,
  `attendance_status` varchar(100) NOT NULL,
  `image_in` text,
  `image_out` text,
  PRIMARY KEY (`time_attendance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_attendance_time_log`
--

DROP TABLE IF EXISTS `xin_attendance_time_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_attendance_time_log` (
  `xin_attendance_time_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `clock_in_date_log` date DEFAULT NULL,
  `clock_in_log` time DEFAULT NULL,
  `clock_in_address_log` text,
  `clock_in_ip_address_log` text,
  `clock_in_latitude_log` text,
  `clock_in_longitude_log` text,
  `clock_in_image_log` text,
  `is_first` tinyint(1) DEFAULT '0',
  `is_last` tinyint(1) DEFAULT '0',
  `is_luarkota` tinyint(1) DEFAULT NULL,
  `is_dangerarea` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`xin_attendance_time_log_id`),
  KEY `pk_user_time_log_att` (`employee_id`),
  KEY `idx_xin_emp_date` (`clock_in_date_log`),
  KEY `xin_attendance_time_log_id_idx` (`xin_attendance_time_log_id`),
  KEY `pk_id_log_time_att` (`clock_in_date_log`,`employee_id`,`clock_in_log`,`xin_attendance_time_log_id`,`is_first`,`is_last`,`is_luarkota`)
) ENGINE=InnoDB AUTO_INCREMENT=590489 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_attendance_time_request`
--

DROP TABLE IF EXISTS `xin_attendance_time_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_attendance_time_request` (
  `time_request_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `request_date` varchar(255) NOT NULL,
  `request_date_request` varchar(255) NOT NULL,
  `request_clock_in` varchar(200) NOT NULL,
  `request_clock_out` varchar(200) NOT NULL,
  `total_hours` varchar(255) NOT NULL,
  `project_no` varchar(200) NOT NULL,
  `purchase_no` varchar(200) DEFAULT NULL,
  `task_id` int(11) NOT NULL,
  `request_reason` text NOT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`time_request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_award_type`
--

DROP TABLE IF EXISTS `xin_award_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_award_type` (
  `award_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `award_type` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`award_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_awards`
--

DROP TABLE IF EXISTS `xin_awards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_awards` (
  `award_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `employee_id` int(200) NOT NULL,
  `award_type_id` int(200) NOT NULL,
  `gift_item` varchar(200) NOT NULL,
  `cash_price` varchar(200) NOT NULL,
  `award_photo` varchar(255) NOT NULL,
  `award_month_year` varchar(200) NOT NULL,
  `award_information` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`award_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_chat_messages`
--

DROP TABLE IF EXISTS `xin_chat_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_chat_messages` (
  `message_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_id` varchar(40) NOT NULL DEFAULT '',
  `to_id` varchar(50) NOT NULL DEFAULT '',
  `message_frm` varchar(255) NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT '0',
  `message_content` longtext NOT NULL,
  `message_date` varchar(255) DEFAULT NULL,
  `recd` tinyint(1) NOT NULL DEFAULT '0',
  `message_type` varchar(255) NOT NULL DEFAULT '',
  `department_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `pk_idx_message_id` (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_clients`
--

DROP TABLE IF EXISTS `xin_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_clients` (
  `client_id` int(111) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `client_username` varchar(255) NOT NULL,
  `client_password` varchar(255) NOT NULL,
  `client_profile` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `is_changed` int(11) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `website_url` varchar(255) NOT NULL,
  `address_1` mediumtext NOT NULL,
  `address_2` mediumtext NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` int(111) NOT NULL,
  `is_active` int(11) NOT NULL,
  `last_logout_date` varchar(255) NOT NULL,
  `last_login_date` varchar(255) NOT NULL,
  `last_login_ip` varchar(255) NOT NULL,
  `is_logged_in` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_companies`
--

DROP TABLE IF EXISTS `xin_companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_companies` (
  `company_id` int(111) NOT NULL AUTO_INCREMENT,
  `type_id` int(111) NOT NULL,
  `name` varchar(255) NOT NULL,
  `trading_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_no` varchar(255) NOT NULL,
  `government_tax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `website_url` varchar(255) NOT NULL,
  `address_1` mediumtext NOT NULL,
  `address_2` mediumtext NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` int(111) NOT NULL,
  `is_active` int(11) NOT NULL,
  `default_currency` varchar(200) DEFAULT NULL,
  `default_timezone` varchar(200) DEFAULT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_company_documents`
--

DROP TABLE IF EXISTS `xin_company_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_company_documents` (
  `document_id` int(11) NOT NULL AUTO_INCREMENT,
  `document_type_id` int(11) NOT NULL,
  `license_name` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  `expiry_date` varchar(255) NOT NULL,
  `license_number` varchar(255) NOT NULL,
  `license_notification` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `document` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_company_info`
--

DROP TABLE IF EXISTS `xin_company_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_company_info` (
  `company_info_id` int(111) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) NOT NULL,
  `logo_second` varchar(255) NOT NULL,
  `sign_in_logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `website_url` mediumtext NOT NULL,
  `starting_year` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `company_contact` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address_1` mediumtext NOT NULL,
  `address_2` mediumtext NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` int(111) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  PRIMARY KEY (`company_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_company_policy`
--

DROP TABLE IF EXISTS `xin_company_policy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_company_policy` (
  `policy_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(111) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`policy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_company_type`
--

DROP TABLE IF EXISTS `xin_company_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_company_type` (
  `type_id` int(111) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_contract_type`
--

DROP TABLE IF EXISTS `xin_contract_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_contract_type` (
  `contract_type_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`contract_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_countries`
--

DROP TABLE IF EXISTS `xin_countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(255) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_flag` varchar(255) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=246 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_currencies`
--

DROP TABLE IF EXISTS `xin_currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_currencies` (
  `currency_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_currency_converter`
--

DROP TABLE IF EXISTS `xin_currency_converter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_currency_converter` (
  `currency_converter_id` int(11) NOT NULL AUTO_INCREMENT,
  `usd_currency` varchar(11) NOT NULL DEFAULT '1',
  `to_currency_title` varchar(200) NOT NULL,
  `to_currency_rate` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`currency_converter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_database_backup`
--

DROP TABLE IF EXISTS `xin_database_backup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_database_backup` (
  `backup_id` int(111) NOT NULL AUTO_INCREMENT,
  `backup_file` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`backup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_departments`
--

DROP TABLE IF EXISTS `xin_departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_departments` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(200) NOT NULL,
  `company_id` int(11) NOT NULL,
  `location_id` int(111) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_designations`
--

DROP TABLE IF EXISTS `xin_designations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_designations` (
  `designation_id` int(11) NOT NULL AUTO_INCREMENT,
  `top_designation_id` int(11) NOT NULL DEFAULT '0',
  `department_id` int(200) NOT NULL,
  `sub_department_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `designation_name` varchar(200) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`designation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_document_type`
--

DROP TABLE IF EXISTS `xin_document_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_document_type` (
  `document_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`document_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_email_configuration`
--

DROP TABLE IF EXISTS `xin_email_configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_email_configuration` (
  `email_config_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_type` enum('phpmail','smtp','codeigniter') COLLATE utf8_unicode_ci NOT NULL,
  `smtp_host` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_port` int(11) NOT NULL,
  `smtp_secure` enum('tls','ssl') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`email_config_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_email_template`
--

DROP TABLE IF EXISTS `xin_email_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_email_template` (
  `template_id` int(111) NOT NULL AUTO_INCREMENT,
  `template_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `status` tinyint(2) NOT NULL,
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_bankaccount`
--

DROP TABLE IF EXISTS `xin_employee_bankaccount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_bankaccount` (
  `bankaccount_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `is_primary` int(11) NOT NULL,
  `account_title` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_code` varchar(255) NOT NULL,
  `bank_branch` mediumtext NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`bankaccount_id`)
) ENGINE=InnoDB AUTO_INCREMENT=461 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_complaints`
--

DROP TABLE IF EXISTS `xin_employee_complaints`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_complaints` (
  `complaint_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `complaint_from` int(111) NOT NULL,
  `title` varchar(255) NOT NULL,
  `complaint_date` varchar(255) NOT NULL,
  `complaint_against` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `status` tinyint(2) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_contacts`
--

DROP TABLE IF EXISTS `xin_employee_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_contacts` (
  `contact_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `relation` varchar(255) NOT NULL,
  `is_primary` int(111) NOT NULL,
  `is_dependent` int(111) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `work_phone` varchar(255) NOT NULL,
  `work_phone_extension` varchar(255) NOT NULL,
  `mobile_phone` varchar(255) NOT NULL,
  `home_phone` varchar(255) NOT NULL,
  `work_email` varchar(255) NOT NULL,
  `personal_email` varchar(255) NOT NULL,
  `address_1` mediumtext NOT NULL,
  `address_2` mediumtext NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=461 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_contract`
--

DROP TABLE IF EXISTS `xin_employee_contract`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_contract` (
  `contract_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `contract_type_id` int(111) NOT NULL,
  `from_date` varchar(255) NOT NULL,
  `designation_id` int(111) NOT NULL,
  `title` varchar(255) NOT NULL,
  `to_date` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`contract_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_documents`
--

DROP TABLE IF EXISTS `xin_employee_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_documents` (
  `document_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `document_type_id` int(111) NOT NULL,
  `date_of_expiry` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `notification_email` varchar(255) NOT NULL,
  `is_alert` tinyint(1) NOT NULL,
  `description` mediumtext NOT NULL,
  `document_file` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`document_id`)
) ENGINE=InnoDB AUTO_INCREMENT=461 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_exit`
--

DROP TABLE IF EXISTS `xin_employee_exit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_exit` (
  `exit_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `exit_date` varchar(255) NOT NULL,
  `exit_type_id` int(111) NOT NULL,
  `exit_interview` int(111) NOT NULL,
  `is_inactivate_account` int(111) NOT NULL,
  `reason` mediumtext NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`exit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_exit_type`
--

DROP TABLE IF EXISTS `xin_employee_exit_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_exit_type` (
  `exit_type_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`exit_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_immigration`
--

DROP TABLE IF EXISTS `xin_employee_immigration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_immigration` (
  `immigration_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `document_type_id` int(111) NOT NULL,
  `document_number` varchar(255) NOT NULL,
  `document_file` varchar(255) NOT NULL,
  `issue_date` varchar(255) NOT NULL,
  `expiry_date` varchar(255) NOT NULL,
  `country_id` varchar(255) NOT NULL,
  `eligible_review_date` varchar(255) NOT NULL,
  `comments` mediumtext NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`immigration_id`)
) ENGINE=InnoDB AUTO_INCREMENT=461 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_leave`
--

DROP TABLE IF EXISTS `xin_employee_leave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_leave` (
  `leave_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `contract_id` int(111) NOT NULL,
  `casual_leave` varchar(255) NOT NULL,
  `medical_leave` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`leave_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_location`
--

DROP TABLE IF EXISTS `xin_employee_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_location` (
  `office_location_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `location_id` int(111) NOT NULL,
  `from_date` varchar(255) NOT NULL,
  `to_date` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`office_location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_promotions`
--

DROP TABLE IF EXISTS `xin_employee_promotions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_promotions` (
  `promotion_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `title` varchar(255) NOT NULL,
  `promotion_date` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`promotion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_qualification`
--

DROP TABLE IF EXISTS `xin_employee_qualification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_qualification` (
  `qualification_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `name` varchar(255) NOT NULL,
  `education_level_id` int(111) NOT NULL,
  `from_year` varchar(255) NOT NULL,
  `language_id` int(111) NOT NULL,
  `to_year` varchar(255) NOT NULL,
  `skill_id` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`qualification_id`)
) ENGINE=InnoDB AUTO_INCREMENT=461 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_resignations`
--

DROP TABLE IF EXISTS `xin_employee_resignations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_resignations` (
  `resignation_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `notice_date` varchar(255) NOT NULL,
  `resignation_date` varchar(255) NOT NULL,
  `reason` mediumtext NOT NULL,
  `added_by` int(111) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`resignation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_security_level`
--

DROP TABLE IF EXISTS `xin_employee_security_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_security_level` (
  `security_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `security_type` int(11) NOT NULL,
  `date_of_clearance` varchar(200) NOT NULL,
  `expiry_date` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`security_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_shift`
--

DROP TABLE IF EXISTS `xin_employee_shift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_shift` (
  `emp_shift_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `shift_id` int(111) NOT NULL,
  `from_date` varchar(255) NOT NULL,
  `to_date` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`emp_shift_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_simpayroll`
--

DROP TABLE IF EXISTS `xin_employee_simpayroll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_simpayroll` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `badgenumber` varchar(45) DEFAULT NULL,
  `ssn` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=872 DEFAULT CHARSET=latin1 COMMENT='employee sim payroll';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_terminations`
--

DROP TABLE IF EXISTS `xin_employee_terminations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_terminations` (
  `termination_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `terminated_by` int(111) NOT NULL,
  `termination_type_id` int(111) NOT NULL,
  `termination_date` varchar(255) NOT NULL,
  `notice_date` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` tinyint(2) NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`termination_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_transfer`
--

DROP TABLE IF EXISTS `xin_employee_transfer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_transfer` (
  `transfer_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `transfer_date` varchar(255) NOT NULL,
  `transfer_department` int(111) NOT NULL,
  `transfer_location` int(111) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` tinyint(2) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`transfer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_travels`
--

DROP TABLE IF EXISTS `xin_employee_travels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_travels` (
  `travel_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `visit_purpose` varchar(255) NOT NULL,
  `visit_place` varchar(255) NOT NULL,
  `travel_mode` int(111) DEFAULT NULL,
  `arrangement_type` int(111) DEFAULT NULL,
  `expected_budget` varchar(255) NOT NULL,
  `actual_budget` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` tinyint(2) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`travel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_warnings`
--

DROP TABLE IF EXISTS `xin_employee_warnings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_warnings` (
  `warning_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `warning_to` int(111) NOT NULL,
  `warning_by` int(111) NOT NULL,
  `warning_date` varchar(255) NOT NULL,
  `warning_type_id` int(111) NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`warning_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employee_work_experience`
--

DROP TABLE IF EXISTS `xin_employee_work_experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employee_work_experience` (
  `work_experience_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `from_date` varchar(255) NOT NULL,
  `to_date` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`work_experience_id`)
) ENGINE=InnoDB AUTO_INCREMENT=461 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_employees`
--

DROP TABLE IF EXISTS `xin_employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_employees` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(200) NOT NULL,
  `office_shift_id` int(111) NOT NULL,
  `reports_to` int(11) NOT NULL DEFAULT '0',
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date_of_birth` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `e_status` int(11) NOT NULL,
  `user_role_id` int(100) NOT NULL,
  `department_id` int(100) NOT NULL,
  `sub_department_id` int(11) NOT NULL,
  `designation_id` int(100) NOT NULL,
  `company_id` int(111) DEFAULT NULL,
  `location_id` int(11) NOT NULL,
  `view_companies_id` varchar(255) NOT NULL,
  `salary_template` varchar(255) NOT NULL,
  `hourly_grade_id` int(111) NOT NULL,
  `monthly_grade_id` int(111) NOT NULL,
  `date_of_joining` varchar(200) NOT NULL,
  `date_of_leaving` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `salary` varchar(200) NOT NULL,
  `wages_type` int(11) NOT NULL,
  `basic_salary` varchar(200) NOT NULL DEFAULT '0',
  `daily_wages` varchar(200) NOT NULL DEFAULT '0',
  `salary_ssempee` varchar(200) NOT NULL DEFAULT '0',
  `salary_ssempeer` varchar(200) DEFAULT '0',
  `salary_income_tax` varchar(200) NOT NULL DEFAULT '0',
  `salary_overtime` varchar(200) NOT NULL DEFAULT '0',
  `salary_commission` varchar(200) NOT NULL DEFAULT '0',
  `salary_claims` varchar(200) NOT NULL DEFAULT '0',
  `salary_paid_leave` varchar(200) NOT NULL DEFAULT '0',
  `salary_director_fees` varchar(200) NOT NULL DEFAULT '0',
  `salary_bonus` varchar(200) NOT NULL DEFAULT '0',
  `salary_advance_paid` varchar(200) NOT NULL DEFAULT '0',
  `address` mediumtext NOT NULL,
  `state` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `zipcode` varchar(200) NOT NULL,
  `profile_picture` mediumtext NOT NULL,
  `profile_background` mediumtext NOT NULL,
  `resume` mediumtext NOT NULL,
  `skype_id` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `facebook_link` mediumtext NOT NULL,
  `twitter_link` mediumtext NOT NULL,
  `blogger_link` mediumtext NOT NULL,
  `linkdedin_link` mediumtext NOT NULL,
  `google_plus_link` mediumtext NOT NULL,
  `instagram_link` varchar(255) NOT NULL,
  `pinterest_link` varchar(255) NOT NULL,
  `youtube_link` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `last_login_date` varchar(255) NOT NULL,
  `last_logout_date` varchar(255) NOT NULL,
  `last_login_ip` varchar(255) NOT NULL,
  `is_logged_in` int(111) NOT NULL,
  `online_status` int(111) NOT NULL,
  `fixed_header` varchar(150) NOT NULL,
  `compact_sidebar` varchar(150) NOT NULL,
  `boxed_wrapper` varchar(150) NOT NULL,
  `leave_categories` varchar(255) NOT NULL DEFAULT '0',
  `ethnicity_type` int(11) NOT NULL,
  `blood_group` varchar(50) DEFAULT NULL,
  `nationality_id` int(11) NOT NULL,
  `citizenship_id` int(11) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `idx_xin_employee` (`user_id`,`employee_id`,`office_shift_id`,`reports_to`,`first_name`,`last_name`,`username`),
  KEY `idx_xin_fk_user_id` (`user_id`,`employee_id`),
  KEY `idx_xin_emp_nama` (`first_name`,`last_name`,`username`),
  KEY `idx_deparment` (`department_id`,`sub_department_id`,`designation_id`),
  KEY `idx_role_location_company` (`company_id`,`location_id`),
  KEY `idx_employee_reports_to1` (`reports_to`)
) ENGINE=InnoDB AUTO_INCREMENT=646 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_ethnicity_type`
--

DROP TABLE IF EXISTS `xin_ethnicity_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_ethnicity_type` (
  `ethnicity_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`ethnicity_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_events`
--

DROP TABLE IF EXISTS `xin_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_date` varchar(255) NOT NULL,
  `event_time` varchar(255) NOT NULL,
  `event_note` mediumtext NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_expense_type`
--

DROP TABLE IF EXISTS `xin_expense_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_expense_type` (
  `expense_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`expense_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_expenses`
--

DROP TABLE IF EXISTS `xin_expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_expenses` (
  `expense_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(200) NOT NULL,
  `company_id` int(11) NOT NULL,
  `expense_type_id` int(200) NOT NULL,
  `billcopy_file` mediumtext NOT NULL,
  `amount` varchar(200) NOT NULL,
  `purchase_date` varchar(200) NOT NULL,
  `remarks` mediumtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `status_remarks` mediumtext NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_file_manager`
--

DROP TABLE IF EXISTS `xin_file_manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_file_manager` (
  `file_id` int(111) NOT NULL AUTO_INCREMENT,
  `user_id` int(111) NOT NULL,
  `department_id` int(111) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_size` varchar(255) NOT NULL,
  `file_extension` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_file_manager_settings`
--

DROP TABLE IF EXISTS `xin_file_manager_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_file_manager_settings` (
  `setting_id` int(111) NOT NULL AUTO_INCREMENT,
  `allowed_extensions` mediumtext NOT NULL,
  `maximum_file_size` varchar(255) NOT NULL,
  `is_enable_all_files` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_finance_bankcash`
--

DROP TABLE IF EXISTS `xin_finance_bankcash`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_finance_bankcash` (
  `bankcash_id` int(111) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(255) NOT NULL,
  `account_balance` varchar(255) NOT NULL,
  `account_opening_balance` varchar(200) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `branch_code` varchar(255) NOT NULL,
  `bank_branch` text NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`bankcash_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_finance_deposit`
--

DROP TABLE IF EXISTS `xin_finance_deposit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_finance_deposit` (
  `deposit_id` int(111) NOT NULL AUTO_INCREMENT,
  `account_type_id` int(111) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `deposit_date` varchar(255) NOT NULL,
  `category_id` int(111) NOT NULL,
  `payer_id` int(111) NOT NULL,
  `payment_method` int(111) NOT NULL,
  `deposit_reference` varchar(255) NOT NULL,
  `deposit_file` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`deposit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_finance_expense`
--

DROP TABLE IF EXISTS `xin_finance_expense`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_finance_expense` (
  `expense_id` int(111) NOT NULL AUTO_INCREMENT,
  `account_type_id` int(111) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `expense_date` varchar(255) NOT NULL,
  `category_id` int(111) NOT NULL,
  `payee_id` int(111) NOT NULL,
  `payment_method` int(111) NOT NULL,
  `expense_reference` varchar(255) NOT NULL,
  `expense_file` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_finance_payees`
--

DROP TABLE IF EXISTS `xin_finance_payees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_finance_payees` (
  `payee_id` int(11) NOT NULL AUTO_INCREMENT,
  `payee_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`payee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_finance_payers`
--

DROP TABLE IF EXISTS `xin_finance_payers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_finance_payers` (
  `payer_id` int(11) NOT NULL AUTO_INCREMENT,
  `payer_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`payer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_finance_transaction`
--

DROP TABLE IF EXISTS `xin_finance_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_finance_transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `transaction_date` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `amount` float NOT NULL,
  `transaction_type` varchar(100) NOT NULL,
  `dr_cr` enum('dr','cr') NOT NULL,
  `transaction_cat_id` int(11) NOT NULL,
  `payer_payee_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `invoice_type` varchar(100) DEFAULT NULL,
  `attachment_file` varchar(100) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_finance_transactions`
--

DROP TABLE IF EXISTS `xin_finance_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_finance_transactions` (
  `transaction_id` int(111) NOT NULL AUTO_INCREMENT,
  `account_type_id` int(111) NOT NULL,
  `deposit_id` int(111) NOT NULL,
  `expense_id` int(111) NOT NULL,
  `transfer_id` int(111) NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `transaction_debit` varchar(255) NOT NULL,
  `transaction_credit` varchar(255) NOT NULL,
  `transaction_date` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_finance_transfer`
--

DROP TABLE IF EXISTS `xin_finance_transfer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_finance_transfer` (
  `transfer_id` int(111) NOT NULL AUTO_INCREMENT,
  `from_account_id` int(111) NOT NULL,
  `to_account_id` int(111) NOT NULL,
  `transfer_date` varchar(255) NOT NULL,
  `transfer_amount` varchar(255) NOT NULL,
  `payment_method` varchar(111) NOT NULL,
  `transfer_reference` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`transfer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_goal_tracking`
--

DROP TABLE IF EXISTS `xin_goal_tracking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_goal_tracking` (
  `tracking_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `tracking_type_id` int(200) NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `target_achiement` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `goal_progress` varchar(200) NOT NULL,
  `goal_status` int(11) NOT NULL DEFAULT '0',
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`tracking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_goal_tracking_type`
--

DROP TABLE IF EXISTS `xin_goal_tracking_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_goal_tracking_type` (
  `tracking_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`tracking_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_holidays`
--

DROP TABLE IF EXISTS `xin_holidays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_holidays` (
  `holiday_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `is_publish` tinyint(1) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`holiday_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_hourly_templates`
--

DROP TABLE IF EXISTS `xin_hourly_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_hourly_templates` (
  `hourly_rate_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `hourly_grade` varchar(255) NOT NULL,
  `hourly_rate` varchar(255) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`hourly_rate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_hrsale_invoices`
--

DROP TABLE IF EXISTS `xin_hrsale_invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_hrsale_invoices` (
  `invoice_id` int(111) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(255) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_id` int(111) NOT NULL,
  `invoice_date` varchar(255) NOT NULL,
  `invoice_due_date` varchar(255) NOT NULL,
  `sub_total_amount` varchar(255) NOT NULL,
  `discount_type` varchar(11) NOT NULL,
  `discount_figure` varchar(255) NOT NULL,
  `total_tax` varchar(255) NOT NULL,
  `total_discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `invoice_note` mediumtext NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT 'null',
  `company_name` varchar(200) NOT NULL DEFAULT 'null',
  `client_profile` varchar(200) NOT NULL DEFAULT 'null',
  `email` varchar(200) NOT NULL DEFAULT 'null',
  `contact_number` varchar(200) NOT NULL DEFAULT 'null',
  `website_url` varchar(200) NOT NULL DEFAULT 'null',
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `city` varchar(200) NOT NULL DEFAULT 'null',
  `state` varchar(200) NOT NULL DEFAULT 'null',
  `zipcode` varchar(200) NOT NULL DEFAULT 'null',
  `countryid` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_hrsale_invoices_items`
--

DROP TABLE IF EXISTS `xin_hrsale_invoices_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_hrsale_invoices_items` (
  `invoice_item_id` int(111) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(111) NOT NULL,
  `project_id` int(111) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_tax_type` varchar(255) NOT NULL,
  `item_tax_rate` varchar(255) NOT NULL,
  `item_qty` varchar(255) NOT NULL,
  `item_unit_price` varchar(255) NOT NULL,
  `item_sub_total` varchar(255) NOT NULL,
  `sub_total_amount` varchar(255) NOT NULL,
  `total_tax` varchar(255) NOT NULL,
  `discount_type` int(11) NOT NULL,
  `discount_figure` varchar(255) NOT NULL,
  `total_discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`invoice_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_hrsale_module_attributes`
--

DROP TABLE IF EXISTS `xin_hrsale_module_attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_hrsale_module_attributes` (
  `custom_field_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `attribute` varchar(255) NOT NULL,
  `attribute_label` varchar(255) NOT NULL,
  `attribute_type` varchar(255) NOT NULL,
  `validation` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`custom_field_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_hrsale_module_attributes_select_value`
--

DROP TABLE IF EXISTS `xin_hrsale_module_attributes_select_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_hrsale_module_attributes_select_value` (
  `attributes_select_value_id` int(11) NOT NULL AUTO_INCREMENT,
  `custom_field_id` int(11) NOT NULL,
  `select_label` varchar(255) NOT NULL,
  PRIMARY KEY (`attributes_select_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_hrsale_module_attributes_values`
--

DROP TABLE IF EXISTS `xin_hrsale_module_attributes_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_hrsale_module_attributes_values` (
  `attributes_value_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `module_attributes_id` int(11) NOT NULL,
  `attribute_value` text NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`attributes_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_hrsale_quotes`
--

DROP TABLE IF EXISTS `xin_hrsale_quotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_hrsale_quotes` (
  `quote_id` int(111) NOT NULL AUTO_INCREMENT,
  `quote_number` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `quote_date` varchar(255) NOT NULL,
  `quote_due_date` varchar(255) NOT NULL,
  `client_id` int(11) NOT NULL,
  `sub_total_amount` varchar(255) NOT NULL,
  `discount_type` varchar(11) NOT NULL,
  `discount_figure` varchar(255) NOT NULL,
  `total_tax` varchar(255) NOT NULL,
  `tax_type` varchar(100) NOT NULL,
  `tax_figure` varchar(255) NOT NULL,
  `total_discount` varchar(255) NOT NULL,
  `quote_type` varchar(100) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `quote_note` mediumtext NOT NULL,
  `name` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `client_profile` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact_number` varchar(200) NOT NULL,
  `website_url` varchar(200) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `zipcode` varchar(200) NOT NULL,
  `countryid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`quote_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_hrsale_quotes_items`
--

DROP TABLE IF EXISTS `xin_hrsale_quotes_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_hrsale_quotes_items` (
  `quote_item_id` int(111) NOT NULL AUTO_INCREMENT,
  `quote_id` int(111) NOT NULL,
  `project_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_tax_type` varchar(255) NOT NULL,
  `item_tax_rate` varchar(255) NOT NULL,
  `item_qty` varchar(255) NOT NULL,
  `item_unit_price` varchar(255) NOT NULL,
  `item_sub_total` varchar(255) NOT NULL,
  `sub_total_amount` varchar(255) NOT NULL,
  `total_tax` varchar(255) NOT NULL,
  `tax_type` int(11) NOT NULL,
  `tax_figure` varchar(200) NOT NULL,
  `discount_type` int(11) NOT NULL,
  `discount_figure` varchar(255) NOT NULL,
  `total_discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`quote_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_income_categories`
--

DROP TABLE IF EXISTS `xin_income_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_income_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_jadwals`
--

DROP TABLE IF EXISTS `xin_jadwals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_jadwals` (
  `jadwal_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` varchar(45) NOT NULL,
  `employee_id` varchar(45) NOT NULL,
  `jadwal_title` varchar(45) NOT NULL,
  `jadwal_date` date NOT NULL,
  `jadwal_time` time NOT NULL,
  `jadwal_note` varchar(45) NOT NULL,
  `created_at` varchar(45) NOT NULL,
  PRIMARY KEY (`jadwal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=530 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_job_applications`
--

DROP TABLE IF EXISTS `xin_job_applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_job_applications` (
  `application_id` int(111) NOT NULL AUTO_INCREMENT,
  `job_id` int(111) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` int(111) NOT NULL,
  `message` mediumtext NOT NULL,
  `job_resume` mediumtext NOT NULL,
  `application_status` int(11) NOT NULL DEFAULT '0',
  `application_remarks` mediumtext NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_job_categories`
--

DROP TABLE IF EXISTS `xin_job_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_job_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_url` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_job_interviews`
--

DROP TABLE IF EXISTS `xin_job_interviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_job_interviews` (
  `job_interview_id` int(111) NOT NULL AUTO_INCREMENT,
  `job_id` int(111) NOT NULL,
  `interviewers_id` varchar(255) NOT NULL,
  `interview_place` varchar(255) NOT NULL,
  `interview_date` varchar(255) NOT NULL,
  `interview_time` varchar(255) NOT NULL,
  `interviewees_id` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`job_interview_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_job_pages`
--

DROP TABLE IF EXISTS `xin_job_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_job_pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `page_details` text NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_job_type`
--

DROP TABLE IF EXISTS `xin_job_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_job_type` (
  `job_type_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `type_url` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`job_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_jobs`
--

DROP TABLE IF EXISTS `xin_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `employer_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `designation_id` int(111) NOT NULL,
  `job_url` varchar(255) NOT NULL,
  `job_type` int(225) NOT NULL,
  `category_url` varchar(255) NOT NULL,
  `is_featured` int(11) NOT NULL,
  `type_url` varchar(255) NOT NULL,
  `job_vacancy` int(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `minimum_experience` varchar(255) NOT NULL,
  `date_of_closing` varchar(200) NOT NULL,
  `short_description` mediumtext NOT NULL,
  `long_description` mediumtext NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_kpi_incidental`
--

DROP TABLE IF EXISTS `xin_kpi_incidental`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_kpi_incidental` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `incidental_kpi` text NOT NULL,
  `targeted_date` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `quarter` int(11) NOT NULL,
  `result` varchar(200) NOT NULL,
  `feedback` text NOT NULL,
  `year_created` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_kpi_maingoals`
--

DROP TABLE IF EXISTS `xin_kpi_maingoals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_kpi_maingoals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `main_kpi` varchar(255) NOT NULL,
  `year_created` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `approve_status` varchar(100) NOT NULL,
  `q1` varchar(100) NOT NULL,
  `q2` varchar(100) NOT NULL,
  `q3` varchar(100) NOT NULL,
  `q4` varchar(100) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_kpi_variable`
--

DROP TABLE IF EXISTS `xin_kpi_variable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_kpi_variable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `variable_kpi` varchar(200) NOT NULL,
  `targeted_date` varchar(200) NOT NULL,
  `result` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `approve_status` varchar(200) NOT NULL,
  `feedback` text NOT NULL,
  `quarter` varchar(200) NOT NULL,
  `year_created` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_languages`
--

DROP TABLE IF EXISTS `xin_languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_languages` (
  `language_id` int(111) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(255) NOT NULL,
  `language_code` varchar(255) NOT NULL,
  `language_flag` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_leads`
--

DROP TABLE IF EXISTS `xin_leads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_leads` (
  `client_id` int(111) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `client_username` varchar(255) NOT NULL,
  `client_password` varchar(255) NOT NULL,
  `client_profile` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `is_changed` int(11) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `website_url` varchar(255) NOT NULL,
  `address_1` mediumtext NOT NULL,
  `address_2` mediumtext NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` int(111) NOT NULL,
  `is_active` int(11) NOT NULL,
  `last_logout_date` varchar(255) NOT NULL,
  `last_login_date` varchar(255) NOT NULL,
  `last_login_ip` varchar(255) NOT NULL,
  `is_logged_in` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_leads_followup`
--

DROP TABLE IF EXISTS `xin_leads_followup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_leads_followup` (
  `leads_followup_id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_id` int(11) NOT NULL,
  `next_followup` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`leads_followup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_leave_applications`
--

DROP TABLE IF EXISTS `xin_leave_applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_leave_applications` (
  `leave_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `employee_id` int(222) NOT NULL,
  `department_id` int(11) NOT NULL,
  `leave_type_id` varchar(222) NOT NULL,
  `from_date` varchar(200) NOT NULL,
  `to_date` varchar(200) NOT NULL,
  `applied_on` varchar(200) NOT NULL,
  `reason` mediumtext NOT NULL,
  `remarks` mediumtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_half_day` tinyint(1) DEFAULT NULL,
  `is_notify` int(11) NOT NULL,
  `leave_attachment` varchar(255) DEFAULT NULL,
  `created_at` varchar(200) NOT NULL,
  `approved_mgr` tinyint(1) unsigned DEFAULT NULL,
  `approved_hrd` tinyint(1) unsigned DEFAULT NULL,
  `approved_mgr_at` varchar(200) DEFAULT NULL,
  `approved_hrd_at` varchar(200) DEFAULT NULL,
  `no_ijin` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`leave_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_leave_type`
--

DROP TABLE IF EXISTS `xin_leave_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_leave_type` (
  `leave_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `type_name` varchar(200) NOT NULL,
  `days_per_year` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`leave_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_make_payment`
--

DROP TABLE IF EXISTS `xin_make_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_make_payment` (
  `make_payment_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `department_id` int(111) NOT NULL,
  `company_id` int(111) NOT NULL,
  `location_id` int(111) NOT NULL,
  `designation_id` int(111) NOT NULL,
  `payment_date` varchar(200) NOT NULL,
  `basic_salary` varchar(255) NOT NULL,
  `payment_amount` varchar(255) NOT NULL,
  `gross_salary` varchar(255) NOT NULL,
  `total_allowances` varchar(255) NOT NULL,
  `total_deductions` varchar(255) NOT NULL,
  `net_salary` varchar(255) NOT NULL,
  `house_rent_allowance` varchar(255) NOT NULL,
  `medical_allowance` varchar(255) NOT NULL,
  `travelling_allowance` varchar(255) NOT NULL,
  `dearness_allowance` varchar(255) NOT NULL,
  `provident_fund` varchar(255) NOT NULL,
  `tax_deduction` varchar(255) NOT NULL,
  `security_deposit` varchar(255) NOT NULL,
  `overtime_rate` varchar(255) NOT NULL,
  `is_advance_salary_deduct` int(11) NOT NULL,
  `advance_salary_amount` varchar(255) NOT NULL,
  `is_payment` tinyint(1) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `hourly_rate` varchar(255) NOT NULL,
  `total_hours_work` varchar(255) NOT NULL,
  `comments` mediumtext NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`make_payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_meetings`
--

DROP TABLE IF EXISTS `xin_meetings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_meetings` (
  `meeting_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `meeting_title` varchar(255) NOT NULL,
  `meeting_date` varchar(255) NOT NULL,
  `meeting_time` varchar(255) NOT NULL,
  `meeting_room` varchar(255) NOT NULL,
  `meeting_note` mediumtext NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`meeting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_office_location`
--

DROP TABLE IF EXISTS `xin_office_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_office_location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(111) NOT NULL,
  `location_head` int(111) NOT NULL,
  `location_manager` int(111) NOT NULL,
  `location_name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `address_1` mediumtext NOT NULL,
  `address_2` mediumtext NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` int(111) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_office_shift`
--

DROP TABLE IF EXISTS `xin_office_shift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_office_shift` (
  `office_shift_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `shift_name` varchar(255) NOT NULL,
  `default_shift` int(111) NOT NULL,
  `monday_in_time` varchar(222) NOT NULL,
  `monday_out_time` varchar(222) NOT NULL,
  `tuesday_in_time` varchar(222) NOT NULL,
  `tuesday_out_time` varchar(222) NOT NULL,
  `wednesday_in_time` varchar(222) NOT NULL,
  `wednesday_out_time` varchar(222) NOT NULL,
  `thursday_in_time` varchar(222) NOT NULL,
  `thursday_out_time` varchar(222) NOT NULL,
  `friday_in_time` varchar(222) NOT NULL,
  `friday_out_time` varchar(222) NOT NULL,
  `saturday_in_time` varchar(222) NOT NULL,
  `saturday_out_time` varchar(222) NOT NULL,
  `sunday_in_time` varchar(222) NOT NULL,
  `sunday_out_time` varchar(222) NOT NULL,
  `created_at` varchar(222) NOT NULL,
  PRIMARY KEY (`office_shift_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_payment_method`
--

DROP TABLE IF EXISTS `xin_payment_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_payment_method` (
  `payment_method_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `method_name` varchar(255) NOT NULL,
  `payment_percentage` varchar(200) DEFAULT NULL,
  `account_number` varchar(200) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_payroll_custom_fields`
--

DROP TABLE IF EXISTS `xin_payroll_custom_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_payroll_custom_fields` (
  `payroll_custom_id` int(11) NOT NULL AUTO_INCREMENT,
  `allow_custom_1` varchar(255) NOT NULL,
  `is_active_allow_1` int(11) NOT NULL,
  `allow_custom_2` varchar(255) NOT NULL,
  `is_active_allow_2` int(11) NOT NULL,
  `allow_custom_3` varchar(255) NOT NULL,
  `is_active_allow_3` int(11) NOT NULL,
  `allow_custom_4` varchar(255) NOT NULL,
  `is_active_allow_4` int(11) NOT NULL,
  `allow_custom_5` varchar(255) NOT NULL,
  `is_active_allow_5` int(111) NOT NULL,
  `deduct_custom_1` varchar(255) NOT NULL,
  `is_active_deduct_1` int(11) NOT NULL,
  `deduct_custom_2` varchar(255) NOT NULL,
  `is_active_deduct_2` int(11) NOT NULL,
  `deduct_custom_3` varchar(255) NOT NULL,
  `is_active_deduct_3` int(11) NOT NULL,
  `deduct_custom_4` varchar(255) NOT NULL,
  `is_active_deduct_4` int(11) NOT NULL,
  `deduct_custom_5` varchar(255) NOT NULL,
  `is_active_deduct_5` int(11) NOT NULL,
  PRIMARY KEY (`payroll_custom_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_performance_appraisal`
--

DROP TABLE IF EXISTS `xin_performance_appraisal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_performance_appraisal` (
  `performance_appraisal_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `appraisal_year_month` varchar(255) NOT NULL,
  `customer_experience` int(111) NOT NULL,
  `marketing` int(111) NOT NULL,
  `management` int(111) NOT NULL,
  `administration` int(111) NOT NULL,
  `presentation_skill` int(111) NOT NULL,
  `quality_of_work` int(111) NOT NULL,
  `efficiency` int(111) NOT NULL,
  `integrity` int(111) NOT NULL,
  `professionalism` int(111) NOT NULL,
  `team_work` int(111) NOT NULL,
  `critical_thinking` int(111) NOT NULL,
  `conflict_management` int(111) NOT NULL,
  `attendance` int(111) NOT NULL,
  `ability_to_meet_deadline` int(111) NOT NULL,
  `remarks` mediumtext NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`performance_appraisal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_performance_appraisal_options`
--

DROP TABLE IF EXISTS `xin_performance_appraisal_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_performance_appraisal_options` (
  `performance_appraisal_options_id` int(11) NOT NULL AUTO_INCREMENT,
  `appraisal_id` int(11) NOT NULL,
  `appraisal_type` varchar(200) NOT NULL,
  `appraisal_option_id` int(11) NOT NULL,
  `appraisal_option_value` int(11) NOT NULL,
  PRIMARY KEY (`performance_appraisal_options_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_performance_indicator`
--

DROP TABLE IF EXISTS `xin_performance_indicator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_performance_indicator` (
  `performance_indicator_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `designation_id` int(111) NOT NULL,
  `customer_experience` int(111) NOT NULL,
  `marketing` int(111) NOT NULL,
  `management` int(111) NOT NULL,
  `administration` int(111) NOT NULL,
  `presentation_skill` int(111) NOT NULL,
  `quality_of_work` int(111) NOT NULL,
  `efficiency` int(111) NOT NULL,
  `integrity` int(111) NOT NULL,
  `professionalism` int(111) NOT NULL,
  `team_work` int(111) NOT NULL,
  `critical_thinking` int(111) NOT NULL,
  `conflict_management` int(111) NOT NULL,
  `attendance` int(111) NOT NULL,
  `ability_to_meet_deadline` int(111) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`performance_indicator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_performance_indicator_options`
--

DROP TABLE IF EXISTS `xin_performance_indicator_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_performance_indicator_options` (
  `performance_indicator_options_id` int(11) NOT NULL AUTO_INCREMENT,
  `indicator_id` int(11) NOT NULL,
  `indicator_type` varchar(200) NOT NULL,
  `indicator_option_id` int(11) NOT NULL,
  `indicator_option_value` int(11) NOT NULL,
  PRIMARY KEY (`performance_indicator_options_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_project_variations`
--

DROP TABLE IF EXISTS `xin_project_variations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_project_variations` (
  `variation_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `project_id` int(111) NOT NULL,
  `created_by` int(111) NOT NULL,
  `variation_name` varchar(255) NOT NULL,
  `variation_no` varchar(255) NOT NULL,
  `assigned_to` varchar(255) NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `variation_hours` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL,
  `variation_status` int(5) NOT NULL,
  `client_approval` int(11) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`variation_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_projects`
--

DROP TABLE IF EXISTS `xin_projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_projects` (
  `project_id` int(111) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `client_id` int(100) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `company_id` varchar(255) DEFAULT NULL,
  `assigned_to` mediumtext NOT NULL,
  `priority` varchar(255) NOT NULL,
  `project_no` varchar(255) DEFAULT NULL,
  `phase_no` varchar(200) DEFAULT NULL,
  `purchase_no` varchar(200) DEFAULT NULL,
  `budget_hours` varchar(255) DEFAULT NULL,
  `summary` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `added_by` int(111) NOT NULL,
  `project_progress` varchar(255) NOT NULL,
  `project_note` longtext NOT NULL,
  `status` tinyint(2) NOT NULL,
  `is_notify` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_projects_attachment`
--

DROP TABLE IF EXISTS `xin_projects_attachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_projects_attachment` (
  `project_attachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(200) NOT NULL,
  `upload_by` int(255) NOT NULL,
  `file_title` varchar(255) NOT NULL,
  `file_description` mediumtext NOT NULL,
  `attachment_file` mediumtext NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`project_attachment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_projects_bugs`
--

DROP TABLE IF EXISTS `xin_projects_bugs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_projects_bugs` (
  `bug_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(111) NOT NULL,
  `user_id` int(200) NOT NULL,
  `attachment_file` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`bug_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_projects_discussion`
--

DROP TABLE IF EXISTS `xin_projects_discussion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_projects_discussion` (
  `discussion_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(111) NOT NULL,
  `user_id` int(200) NOT NULL,
  `client_id` int(11) NOT NULL,
  `attachment_file` varchar(255) NOT NULL,
  `message` mediumtext NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`discussion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_projects_timelogs`
--

DROP TABLE IF EXISTS `xin_projects_timelogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_projects_timelogs` (
  `timelogs_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `total_hours` varchar(255) NOT NULL,
  `timelogs_memo` text NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`timelogs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_qualification_education_level`
--

DROP TABLE IF EXISTS `xin_qualification_education_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_qualification_education_level` (
  `education_level_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`education_level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_qualification_language`
--

DROP TABLE IF EXISTS `xin_qualification_language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_qualification_language` (
  `language_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_qualification_skill`
--

DROP TABLE IF EXISTS `xin_qualification_skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_qualification_skill` (
  `skill_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_quoted_projects`
--

DROP TABLE IF EXISTS `xin_quoted_projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_quoted_projects` (
  `project_id` int(111) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `client_id` int(100) NOT NULL,
  `estimate_date` varchar(255) NOT NULL,
  `company_id` varchar(255) DEFAULT NULL,
  `assigned_to` mediumtext NOT NULL,
  `priority` varchar(255) NOT NULL,
  `project_no` varchar(255) DEFAULT NULL,
  `phase_no` varchar(200) DEFAULT NULL,
  `estimate_hrs` varchar(255) DEFAULT NULL,
  `summary` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `added_by` int(111) NOT NULL,
  `project_progress` varchar(255) NOT NULL,
  `project_note` longtext NOT NULL,
  `status` tinyint(2) NOT NULL,
  `is_notify` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_quoted_projects_attachment`
--

DROP TABLE IF EXISTS `xin_quoted_projects_attachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_quoted_projects_attachment` (
  `project_attachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(200) NOT NULL,
  `upload_by` int(255) NOT NULL,
  `file_title` varchar(255) NOT NULL,
  `file_description` mediumtext NOT NULL,
  `attachment_file` mediumtext NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`project_attachment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_quoted_projects_discussion`
--

DROP TABLE IF EXISTS `xin_quoted_projects_discussion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_quoted_projects_discussion` (
  `discussion_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(111) NOT NULL,
  `user_id` int(200) NOT NULL,
  `client_id` int(11) NOT NULL,
  `attachment_file` varchar(255) NOT NULL,
  `message` mediumtext NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`discussion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_quoted_projects_timelogs`
--

DROP TABLE IF EXISTS `xin_quoted_projects_timelogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_quoted_projects_timelogs` (
  `timelogs_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `total_hours` varchar(255) NOT NULL,
  `timelogs_memo` text NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`timelogs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_recruitment_pages`
--

DROP TABLE IF EXISTS `xin_recruitment_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_recruitment_pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) NOT NULL,
  `page_details` mediumtext NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_recruitment_subpages`
--

DROP TABLE IF EXISTS `xin_recruitment_subpages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_recruitment_subpages` (
  `subpages_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `sub_page_title` varchar(255) NOT NULL,
  `sub_page_details` mediumtext NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`subpages_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_salary_allowances`
--

DROP TABLE IF EXISTS `xin_salary_allowances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_salary_allowances` (
  `allowance_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `is_allowance_taxable` int(11) NOT NULL,
  `allowance_title` varchar(200) DEFAULT NULL,
  `allowance_amount` varchar(200) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`allowance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_salary_bank_allocation`
--

DROP TABLE IF EXISTS `xin_salary_bank_allocation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_salary_bank_allocation` (
  `bank_allocation_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `pay_percent` varchar(200) NOT NULL,
  `acc_number` varchar(200) NOT NULL,
  PRIMARY KEY (`bank_allocation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_salary_commissions`
--

DROP TABLE IF EXISTS `xin_salary_commissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_salary_commissions` (
  `salary_commissions_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `commission_title` varchar(200) DEFAULT NULL,
  `commission_amount` varchar(200) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`salary_commissions_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_salary_loan_deductions`
--

DROP TABLE IF EXISTS `xin_salary_loan_deductions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_salary_loan_deductions` (
  `loan_deduction_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `loan_options` int(11) NOT NULL,
  `loan_deduction_title` varchar(200) NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `monthly_installment` varchar(200) NOT NULL,
  `loan_time` varchar(200) NOT NULL,
  `loan_deduction_amount` varchar(200) NOT NULL,
  `total_paid` varchar(200) NOT NULL,
  `reason` text NOT NULL,
  `status` int(11) NOT NULL,
  `is_deducted_from_salary` int(11) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`loan_deduction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_salary_other_payments`
--

DROP TABLE IF EXISTS `xin_salary_other_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_salary_other_payments` (
  `other_payments_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `payments_title` varchar(200) DEFAULT NULL,
  `payments_amount` varchar(200) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`other_payments_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_salary_overtime`
--

DROP TABLE IF EXISTS `xin_salary_overtime`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_salary_overtime` (
  `salary_overtime_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `overtime_type` varchar(200) NOT NULL,
  `no_of_days` varchar(100) NOT NULL DEFAULT '0',
  `overtime_hours` varchar(100) NOT NULL DEFAULT '0',
  `overtime_rate` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`salary_overtime_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_salary_payslip_allowances`
--

DROP TABLE IF EXISTS `xin_salary_payslip_allowances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_salary_payslip_allowances` (
  `payslip_allowances_id` int(11) NOT NULL AUTO_INCREMENT,
  `payslip_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `allowance_title` varchar(200) NOT NULL,
  `allowance_amount` varchar(200) NOT NULL,
  `salary_month` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`payslip_allowances_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_salary_payslip_commissions`
--

DROP TABLE IF EXISTS `xin_salary_payslip_commissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_salary_payslip_commissions` (
  `payslip_commissions_id` int(11) NOT NULL AUTO_INCREMENT,
  `payslip_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `commission_title` varchar(200) NOT NULL,
  `commission_amount` varchar(200) NOT NULL,
  `salary_month` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`payslip_commissions_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_salary_payslip_loan`
--

DROP TABLE IF EXISTS `xin_salary_payslip_loan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_salary_payslip_loan` (
  `payslip_loan_id` int(11) NOT NULL AUTO_INCREMENT,
  `payslip_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `loan_title` varchar(200) NOT NULL,
  `loan_amount` varchar(200) NOT NULL,
  `salary_month` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`payslip_loan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_salary_payslip_other_payments`
--

DROP TABLE IF EXISTS `xin_salary_payslip_other_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_salary_payslip_other_payments` (
  `payslip_other_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payslip_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `payments_title` varchar(200) NOT NULL,
  `payments_amount` varchar(200) NOT NULL,
  `salary_month` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`payslip_other_payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_salary_payslip_overtime`
--

DROP TABLE IF EXISTS `xin_salary_payslip_overtime`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_salary_payslip_overtime` (
  `payslip_overtime_id` int(11) NOT NULL AUTO_INCREMENT,
  `payslip_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `overtime_title` varchar(200) NOT NULL,
  `overtime_salary_month` varchar(200) NOT NULL,
  `overtime_no_of_days` varchar(200) NOT NULL,
  `overtime_hours` varchar(200) NOT NULL,
  `overtime_rate` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`payslip_overtime_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_salary_payslip_statutory_deductions`
--

DROP TABLE IF EXISTS `xin_salary_payslip_statutory_deductions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_salary_payslip_statutory_deductions` (
  `payslip_deduction_id` int(11) NOT NULL AUTO_INCREMENT,
  `payslip_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `deduction_title` varchar(200) NOT NULL,
  `deduction_amount` varchar(200) NOT NULL,
  `salary_month` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`payslip_deduction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_salary_payslips`
--

DROP TABLE IF EXISTS `xin_salary_payslips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_salary_payslips` (
  `payslip_id` int(11) NOT NULL AUTO_INCREMENT,
  `payslip_key` varchar(200) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `salary_month` varchar(200) NOT NULL,
  `wages_type` int(11) NOT NULL,
  `payslip_type` varchar(50) NOT NULL,
  `basic_salary` varchar(200) NOT NULL,
  `daily_wages` varchar(200) NOT NULL,
  `is_half_monthly_payroll` tinyint(1) NOT NULL,
  `hours_worked` varchar(50) NOT NULL DEFAULT '0',
  `total_allowances` varchar(200) NOT NULL,
  `total_commissions` varchar(200) NOT NULL,
  `total_statutory_deductions` varchar(200) NOT NULL,
  `total_other_payments` varchar(200) NOT NULL,
  `total_loan` varchar(200) NOT NULL,
  `total_overtime` varchar(200) NOT NULL,
  `statutory_deductions` varchar(200) NOT NULL,
  `net_salary` varchar(200) NOT NULL,
  `grand_net_salary` varchar(200) NOT NULL,
  `other_payment` varchar(200) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `pay_comments` mediumtext NOT NULL,
  `is_payment` int(11) NOT NULL,
  `year_to_date` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`payslip_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_salary_statutory_deductions`
--

DROP TABLE IF EXISTS `xin_salary_statutory_deductions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_salary_statutory_deductions` (
  `statutory_deductions_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `statutory_options` int(11) NOT NULL,
  `deduction_title` varchar(200) DEFAULT NULL,
  `deduction_amount` varchar(200) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`statutory_deductions_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_salary_templates`
--

DROP TABLE IF EXISTS `xin_salary_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_salary_templates` (
  `salary_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `salary_grades` varchar(255) NOT NULL,
  `basic_salary` varchar(255) NOT NULL,
  `overtime_rate` varchar(255) NOT NULL,
  `house_rent_allowance` varchar(255) NOT NULL,
  `medical_allowance` varchar(255) NOT NULL,
  `travelling_allowance` varchar(255) NOT NULL,
  `dearness_allowance` varchar(255) NOT NULL,
  `security_deposit` varchar(255) NOT NULL,
  `provident_fund` varchar(255) NOT NULL,
  `tax_deduction` varchar(255) NOT NULL,
  `gross_salary` varchar(255) NOT NULL,
  `total_allowance` varchar(255) NOT NULL,
  `total_deduction` varchar(255) NOT NULL,
  `net_salary` varchar(255) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`salary_template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_security_level`
--

DROP TABLE IF EXISTS `xin_security_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_security_level` (
  `type_id` int(111) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_sub_departments`
--

DROP TABLE IF EXISTS `xin_sub_departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_sub_departments` (
  `sub_department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `department_name` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`sub_department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_support_ticket_files`
--

DROP TABLE IF EXISTS `xin_support_ticket_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_support_ticket_files` (
  `ticket_file_id` int(111) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(111) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `ticket_files` varchar(255) NOT NULL,
  `file_size` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`ticket_file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_support_tickets`
--

DROP TABLE IF EXISTS `xin_support_tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_support_tickets` (
  `ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `ticket_code` varchar(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `ticket_priority` varchar(255) NOT NULL,
  `department_id` int(111) NOT NULL,
  `assigned_to` mediumtext NOT NULL,
  `message` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `ticket_remarks` mediumtext NOT NULL,
  `ticket_status` varchar(200) NOT NULL,
  `ticket_note` mediumtext NOT NULL,
  `is_notify` int(11) NOT NULL,
  `ticket_image` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`ticket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_support_tickets_employees`
--

DROP TABLE IF EXISTS `xin_support_tickets_employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_support_tickets_employees` (
  `tickets_employees_id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `is_notify` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`tickets_employees_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_system_setting`
--

DROP TABLE IF EXISTS `xin_system_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_system_setting` (
  `setting_id` int(111) NOT NULL AUTO_INCREMENT,
  `application_name` varchar(255) NOT NULL,
  `default_currency` varchar(255) NOT NULL,
  `default_currency_id` int(11) NOT NULL,
  `default_currency_symbol` varchar(255) NOT NULL,
  `show_currency` varchar(255) NOT NULL,
  `currency_position` varchar(255) NOT NULL,
  `notification_position` varchar(255) NOT NULL,
  `notification_close_btn` varchar(255) NOT NULL,
  `notification_bar` varchar(255) NOT NULL,
  `enable_registration` varchar(255) NOT NULL,
  `login_with` varchar(255) NOT NULL,
  `date_format_xi` varchar(255) NOT NULL,
  `employee_manage_own_contact` varchar(255) NOT NULL,
  `employee_manage_own_profile` varchar(255) NOT NULL,
  `employee_manage_own_qualification` varchar(255) NOT NULL,
  `employee_manage_own_work_experience` varchar(255) NOT NULL,
  `employee_manage_own_document` varchar(255) NOT NULL,
  `employee_manage_own_picture` varchar(255) NOT NULL,
  `employee_manage_own_social` varchar(255) NOT NULL,
  `employee_manage_own_bank_account` varchar(255) NOT NULL,
  `enable_attendance` varchar(255) NOT NULL,
  `enable_clock_in_btn` varchar(255) NOT NULL,
  `enable_email_notification` varchar(255) NOT NULL,
  `payroll_include_day_summary` varchar(255) NOT NULL,
  `payroll_include_hour_summary` varchar(255) NOT NULL,
  `payroll_include_leave_summary` varchar(255) NOT NULL,
  `enable_job_application_candidates` varchar(255) NOT NULL,
  `job_logo` varchar(255) NOT NULL,
  `payroll_logo` varchar(255) NOT NULL,
  `is_payslip_password_generate` int(11) NOT NULL,
  `payslip_password_format` varchar(255) NOT NULL,
  `enable_profile_background` varchar(255) NOT NULL,
  `enable_policy_link` varchar(255) NOT NULL,
  `enable_layout` varchar(255) NOT NULL,
  `job_application_format` mediumtext NOT NULL,
  `technical_competencies` text,
  `organizational_competencies` text,
  `project_email` varchar(255) NOT NULL,
  `holiday_email` varchar(255) NOT NULL,
  `leave_email` varchar(255) NOT NULL,
  `payslip_email` varchar(255) NOT NULL,
  `award_email` varchar(255) NOT NULL,
  `recruitment_email` varchar(255) NOT NULL,
  `announcement_email` varchar(255) NOT NULL,
  `training_email` varchar(255) NOT NULL,
  `task_email` varchar(255) NOT NULL,
  `compact_sidebar` varchar(255) NOT NULL,
  `fixed_header` varchar(255) NOT NULL,
  `fixed_sidebar` varchar(255) NOT NULL,
  `boxed_wrapper` varchar(255) NOT NULL,
  `layout_static` varchar(255) NOT NULL,
  `system_skin` varchar(255) NOT NULL,
  `animation_effect` varchar(255) NOT NULL,
  `animation_effect_modal` varchar(255) NOT NULL,
  `animation_effect_topmenu` varchar(255) NOT NULL,
  `footer_text` varchar(255) NOT NULL,
  `is_ssl_available` varchar(50) NOT NULL,
  `is_active_sub_departments` varchar(10) NOT NULL,
  `default_language` varchar(200) NOT NULL,
  `statutory_fixed` varchar(100) NOT NULL,
  `system_timezone` varchar(200) NOT NULL,
  `system_ip_address` varchar(255) NOT NULL,
  `system_ip_restriction` varchar(200) NOT NULL,
  `google_maps_api_key` mediumtext NOT NULL,
  `module_recruitment` varchar(100) NOT NULL,
  `module_travel` varchar(100) NOT NULL,
  `module_performance` varchar(100) NOT NULL,
  `module_payroll` varchar(10) NOT NULL,
  `module_files` varchar(100) NOT NULL,
  `module_awards` varchar(100) NOT NULL,
  `module_training` varchar(100) NOT NULL,
  `module_inquiry` varchar(100) NOT NULL,
  `module_language` varchar(100) NOT NULL,
  `module_orgchart` varchar(100) NOT NULL,
  `module_accounting` varchar(111) NOT NULL,
  `module_events` varchar(100) NOT NULL,
  `module_goal_tracking` varchar(100) NOT NULL,
  `module_assets` varchar(100) NOT NULL,
  `module_projects_tasks` varchar(100) NOT NULL,
  `module_chat_box` varchar(100) NOT NULL,
  `enable_page_rendered` varchar(255) NOT NULL,
  `enable_current_year` varchar(255) NOT NULL,
  `employee_login_id` varchar(200) NOT NULL,
  `paypal_email` varchar(100) NOT NULL,
  `paypal_sandbox` varchar(10) NOT NULL,
  `paypal_active` varchar(10) NOT NULL,
  `stripe_secret_key` varchar(200) NOT NULL,
  `stripe_publishable_key` varchar(200) NOT NULL,
  `stripe_active` varchar(10) NOT NULL,
  `online_payment_account` int(11) NOT NULL,
  `is_half_monthly` tinyint(1) NOT NULL,
  `half_deduct_month` tinyint(1) NOT NULL,
  `invoice_terms_condition` text,
  `estimate_terms_condition` text,
  `staff_dashboard` int(11) DEFAULT NULL,
  `project_dashboard` int(11) DEFAULT NULL,
  `enable_auth_background` varchar(11) NOT NULL,
  `hr_version` varchar(200) NOT NULL,
  `hr_release_date` varchar(100) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `module_jadwals` varchar(100) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_task_categories`
--

DROP TABLE IF EXISTS `xin_task_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_task_categories` (
  `task_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`task_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_tasks`
--

DROP TABLE IF EXISTS `xin_tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_tasks` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `project_id` int(111) NOT NULL,
  `created_by` int(111) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `assigned_to` varchar(255) NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `task_hour` varchar(200) NOT NULL,
  `task_progress` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL,
  `task_status` int(5) NOT NULL,
  `task_note` mediumtext NOT NULL,
  `is_notify` int(11) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_tasks_attachment`
--

DROP TABLE IF EXISTS `xin_tasks_attachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_tasks_attachment` (
  `task_attachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(200) NOT NULL,
  `upload_by` int(255) NOT NULL,
  `file_title` varchar(255) NOT NULL,
  `file_description` mediumtext NOT NULL,
  `attachment_file` mediumtext NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`task_attachment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_tasks_comments`
--

DROP TABLE IF EXISTS `xin_tasks_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_tasks_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `task_comments` mediumtext NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_tax_types`
--

DROP TABLE IF EXISTS `xin_tax_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_tax_types` (
  `tax_id` int(111) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`tax_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_termination_type`
--

DROP TABLE IF EXISTS `xin_termination_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_termination_type` (
  `termination_type_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`termination_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_theme_settings`
--

DROP TABLE IF EXISTS `xin_theme_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_theme_settings` (
  `theme_settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `fixed_layout` varchar(200) NOT NULL,
  `fixed_footer` varchar(200) NOT NULL,
  `boxed_layout` varchar(200) NOT NULL,
  `page_header` varchar(200) NOT NULL,
  `footer_layout` varchar(200) NOT NULL,
  `statistics_cards` varchar(200) NOT NULL,
  `animation_style` varchar(100) NOT NULL,
  `theme_option` varchar(100) NOT NULL,
  `dashboard_option` varchar(100) NOT NULL,
  `dashboard_calendar` varchar(100) NOT NULL,
  `login_page_options` varchar(100) NOT NULL,
  `sub_menu_icons` varchar(100) NOT NULL,
  `statistics_cards_background` varchar(200) NOT NULL,
  `employee_cards` varchar(200) NOT NULL,
  `card_border_color` varchar(200) NOT NULL,
  `compact_menu` varchar(200) NOT NULL,
  `flipped_menu` varchar(200) NOT NULL,
  `right_side_icons` varchar(200) NOT NULL,
  `bordered_menu` varchar(200) NOT NULL,
  `form_design` varchar(200) NOT NULL,
  `is_semi_dark` int(11) NOT NULL,
  `semi_dark_color` varchar(200) NOT NULL,
  `top_nav_dark_color` varchar(200) NOT NULL,
  `menu_color_option` varchar(200) NOT NULL,
  `export_orgchart` varchar(100) NOT NULL,
  `export_file_title` mediumtext NOT NULL,
  `org_chart_layout` varchar(200) NOT NULL,
  `org_chart_zoom` varchar(100) NOT NULL,
  `org_chart_pan` varchar(100) NOT NULL,
  PRIMARY KEY (`theme_settings_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_tickets_attachment`
--

DROP TABLE IF EXISTS `xin_tickets_attachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_tickets_attachment` (
  `ticket_attachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(200) NOT NULL,
  `upload_by` int(255) NOT NULL,
  `file_title` varchar(255) NOT NULL,
  `file_description` mediumtext NOT NULL,
  `attachment_file` mediumtext NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`ticket_attachment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_tickets_comments`
--

DROP TABLE IF EXISTS `xin_tickets_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_tickets_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `ticket_comments` mediumtext NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_trainers`
--

DROP TABLE IF EXISTS `xin_trainers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_trainers` (
  `trainer_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `designation_id` int(111) NOT NULL,
  `expertise` mediumtext NOT NULL,
  `address` mediumtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`trainer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_training`
--

DROP TABLE IF EXISTS `xin_training`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_training` (
  `training_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `employee_id` varchar(200) NOT NULL,
  `training_type_id` int(200) NOT NULL,
  `trainer_option` int(11) NOT NULL,
  `trainer_id` int(200) NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `finish_date` varchar(200) NOT NULL,
  `training_cost` varchar(200) NOT NULL,
  `training_status` int(200) NOT NULL,
  `description` mediumtext NOT NULL,
  `performance` varchar(200) NOT NULL,
  `remarks` mediumtext NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`training_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_training_types`
--

DROP TABLE IF EXISTS `xin_training_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_training_types` (
  `training_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`training_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_travel_arrangement_type`
--

DROP TABLE IF EXISTS `xin_travel_arrangement_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_travel_arrangement_type` (
  `arrangement_type_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`arrangement_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_user_roles`
--

DROP TABLE IF EXISTS `xin_user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_user_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL,
  `role_access` varchar(200) NOT NULL,
  `role_resources` text NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_users`
--

DROP TABLE IF EXISTS `xin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` varchar(30) NOT NULL DEFAULT 'administrator',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `profile_background` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `last_login_date` varchar(255) NOT NULL,
  `last_login_ip` varchar(255) NOT NULL,
  `is_logged_in` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xin_warning_type`
--

DROP TABLE IF EXISTS `xin_warning_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xin_warning_type` (
  `warning_type_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`warning_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-20 16:45:08
