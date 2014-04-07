-- phpMyAdmin SQL Dump
-- version 3.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2012 at 12:11 PM
-- Server version: 5.1.62
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpdevel_safedoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_admin_user`
--

CREATE TABLE IF NOT EXISTS `safedoc_admin_user` (
  `adminUserID` int(11) NOT NULL AUTO_INCREMENT,
  `adminUserName` varchar(45) DEFAULT NULL,
  `adminUserPassword` varchar(45) DEFAULT NULL,
  `adminUserEmail` varchar(60) DEFAULT NULL,
  `adminUserCreatedOn` date DEFAULT NULL,
  `adminUserModifiedOn` date DEFAULT NULL,
  PRIMARY KEY (`adminUserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `safedoc_admin_user`
--

INSERT INTO `safedoc_admin_user` (`adminUserID`, `adminUserName`, `adminUserPassword`, `adminUserEmail`, `adminUserCreatedOn`, `adminUserModifiedOn`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'master1@wwindia.com', '2012-01-06', '2012-04-18'),
(3, 'admintest', '21232f297a57a5a743894a0e4a801fc3', 'test@gmail.com', '2012-01-09', '2012-03-02'),
(4, 'admintest123', '21232f297a57a5a743894a0e4a801fc3', 'test123@gmail.com', '2012-01-09', '2012-03-02'),
(5, 'cric', '47259a7c66f866f2bdfd3054ddffb260', 'cric@wwidnia.com', '2012-01-18', '2012-01-18'),
(6, 'test', 'cc03e747a6afbbcbf8be7668acfebee5', 'test@test.com', '2012-03-02', '2012-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_advertise`
--

CREATE TABLE IF NOT EXISTS `safedoc_advertise` (
  `safedoc_advertise_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `Requirement` text NOT NULL,
  `added_date` date NOT NULL,
  PRIMARY KEY (`safedoc_advertise_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `safedoc_advertise`
--

INSERT INTO `safedoc_advertise` (`safedoc_advertise_id`, `company_name`, `address`, `Phone`, `email_id`, `Requirement`, `added_date`) VALUES
(1, 'Test', 'Test Address', '123556', 'Tes@test.com', 'zadasd\n', '2012-04-14'),
(2, 'adasd', 'asdas', '124', 'dasdasd@dad.com', 'asdas', '2012-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_banner`
--

CREATE TABLE IF NOT EXISTS `safedoc_banner` (
  `bannerId` int(11) NOT NULL AUTO_INCREMENT,
  `bannerTitle` varchar(45) DEFAULT NULL,
  `bannerImage` varchar(250) DEFAULT NULL,
  `bannerLink` varchar(250) NOT NULL,
  `bannerCode` text,
  `bannerCreatedOn` date DEFAULT NULL,
  `bannerModifiedOn` date DEFAULT NULL,
  PRIMARY KEY (`bannerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=big5 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `safedoc_banner`
--

INSERT INTO `safedoc_banner` (`bannerId`, `bannerTitle`, `bannerImage`, `bannerLink`, `bannerCode`, `bannerCreatedOn`, `bannerModifiedOn`) VALUES
(1, 'Right 1', 'banner1.jpg', 'http://safedoc.phpdevelopment.co.in', '', '2012-01-10', '2012-01-18'),
(2, 'Right 2', 'banner2.jpg', 'http://www.google.com', '', '2012-01-10', '2012-01-17'),
(3, 'Right 3', 'banner3.jpg', 'http://www.google.com', '', '2012-01-10', '2012-01-17'),
(4, 'Right 4', 'banner4.jpg', 'http://www.google.com', '', '2012-01-10', '2012-01-17'),
(5, 'Bottom', 'bottom_banner.jpg', 'http://www.google.com', '', '2012-01-10', '2012-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_cms`
--

CREATE TABLE IF NOT EXISTS `safedoc_cms` (
  `cmsId` int(11) NOT NULL AUTO_INCREMENT,
  `cmsTitle` varchar(50) NOT NULL,
  `cmsContent` text NOT NULL,
  `cmsKeyword` text NOT NULL,
  `cmsDescription` text NOT NULL,
  `cmsUpdatedDate` date NOT NULL,
  PRIMARY KEY (`cmsId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `safedoc_cms`
--

INSERT INTO `safedoc_cms` (`cmsId`, `cmsTitle`, `cmsContent`, `cmsKeyword`, `cmsDescription`, `cmsUpdatedDate`) VALUES
(1, 'Privacy Policy', '<p>SafeDocManager is a property of Purple Technology Solutions Limited.  Safedocmanager is a means of ensuring that your documents remain safe and protected. A user may find his records to be misplaced or lost through stealing, theft and many other circumstances. The notion is to provide a protected safe methodology by which you could save your documents in this portal. </p><p>\n</p><h2>How We Store Your Documents</h2>\n<p>The Documents uploaded in safedocmanager are in encrypted form. The encrypted form is stored in our server and is retrieved with information again in encrypted form which is then converted to user understandable format. All documents and information stored within our portal have all security measures by which we ensure complete end to end secured information of your documents. Purple Technologies have employed support for your services. A user may contact us in case of any query or help which he or she may require in uploading his/her documents. We also guarantee 24 by 7 support for you.</p><p>\n</p><h2>What we do with the information we gather</h2>\n<p>We require this information to understand your needs and provide you with a better service, and in particular for the following reasons:</p>\n<ol type="a">\n<li>Internal record keeping.</li>\n<li>We may use the information to improve our products and services.</li>\n<li>We may periodically send promotional emails about new products, special offers or other information .which we think you may find interesting using the email address which you have provided.</li>\n</ol>\n<h2>Controlling your personal information</h2>\n<p>You may choose to restrict the collection or use of your personal information in the following ways:</p>\n<p>Whenever you are asked to fill in a form on the website, look for the box that you can click to indicate that you do not want the information to be used by anybody for direct marketing purposes if you have previously agreed to us using your personal information for direct marketing purposes, you may change your mind at any time by writing to or emailing to us.</p>\n<p>We will not sell, distribute or lease your personal information to third parties unless we have your permission or are required by law to do so. We may use your personal information to send you promotional information about third parties which we think you may find interesting if you tell us that you wish this to happen.</p>\n<p>SafeDocManager ensures complete security and storage of information related to your personal assets, documents, etc though we would not be responsible in case of any breach of information from the user’s end. The user should understand his/her responsibility towards their documents and any mishandling or misappropriate data stored would not be held responsible as a negligence from purple technology solutions.</p>', 'Privacy Policy Keyword', 'Privacy Policy Description', '2012-04-19'),
(2, 'About Us', '<p>SafeDocManager is a property of purple technologies incorporated in the year 2012.SafeDocManager stores all your information related to your personal belongings and assets. This includes your marksheets, mutual funds, pan card, passport, driving license and other documents. Other documents signify any document which you feel could be of prime importance and which should be stored properly so that in case it is lost, it could be easily accessible through our portal. Most of us don’t understand the need of storing documents properly and some even lose their documents in this process. We understand in reliability and accessibility which could help our customers in getting all the information easily from anywhere all across the globe. Our aim is to provide easy access and a stored database just for your convenience. We also emphasize on security and all documents are encrypted in our database so that there isn''t any form of leakage of information. Our Privacy statements illustrate what precautions we have undertaken in order to provide you with the most secured platform.</p>\n\n<h2>Our Goal </h2>\n<p>The goal of Safedocmanager is to keep all your document safe and remind you about your financial investments on timely basis and this becomes our priority. We make sure that all your document stays safe and is available for you access and the reminders about your financial investments is given to you anytime, anywhere, anyways!</p>\n<h2>Our Mission - Keep it simple and safe!</h2>\n<p>By keeping safedocmanager simple and easy to use, we&nbsp;make it easier for you to access all your and get reminders about your financial investments on timely basis- and all these happens with very simple user friendly operations and interface! </p>\n<p>Safedocmanager is 100% secure and we guarantee the&nbsp;safety of your documents! Our security experts work non-stop to make sure your documents and the detail available is kept private and secure</p>\n<p>Our mission is ensure complete end to end security of your documents with increased trust and reliability. Our major aim would be to increase user base and provide end to end solution in terms of storing documents for all the users.</p>', 'About Us About Us About Us About Us About Us About Us About Us About Us', 'About Us About Us About Us About Us About Us About Us About Us About Us', '2012-04-18'),
(3, 'Advertise', '<p>Advertisement is a means to promote your product and increase brand awareness to the customers. We thoroughly understand the needs of our customers and believe in branding and commercial offerings.</p>\n<h2>Sponsored Ads</h2>\n<p>Sponsored Ads strives to maximize the earning potential of every ad spot in your inventory. We strive to reach out to all our customers in order to drive your potential market and increase brand awareness of your product and services.</p>\n<h2>Banner Ads</h2>\n<p>Banner ads are majorly aimed to attract traffic for your website. The web banner is displayed when a web page that references the banner is loaded into a&nbsp;web browser. Banner Ads reflect to increase your brand presence and increase your brand awareness. SafeDocManager promises to reach every customer and reflect about your lines of offerings and services. We have Banner Ad size rectangles of 300 by 250 and 468 by 60.</p>\n<h2>Anyone interested in advertising with us may contact us by filling the below form</h2>\n<form name="frmView" id="frmView" method="post">\n<input name="hidval" value="advertise" type="hidden">\n<ul class="frmRequest">\n<li><label>Name of the Company:</label><input name="txtName" class="required" type="text"></li>\n<li><label>Address:</label><input name="txtAddress" class="required" type="text"></li>\n<li><label>Phone:</label><input name="txtPhone" class="required number" type="text"></li>\n<li><label>Email id:</label><input name="txtEmail" class="required email" type="text"></li>\n<li><label>Requirement:</label><textarea name="requirement" id="requirement" class="required"></textarea></li>\n<li><label>&nbsp;</label><button class="butt"><span>submit</span></button></li>\n</ul>\n</form>', 'Advertise Advertise Advertise Advertise Advertise Advertise Advertise Advertise ', 'Advertise Advertise Advertise Advertise Advertise Advertise Advertise ', '2012-04-18'),
(4, 'Contact us', '<p>Purple Technology Solutions</p>\n<p>Old No.33, New Number 82,Zion Nagar,Ranipet 632401 Vellore</p>\n<p>Or</p>\n<p>SRV Media PVT Limited (Marketing Partner for SafeDocManager)</p>\n<p>C 303, Venkatesh Serenety, Sr.No. 128/7, Pune 411041</p>\n<p>Tel: +919503053726, +917738638767</p>\n<p>Email us at <a href="mailto:info@srvmedia.com">info@srvmedia.com</a></p>\n<h2>For any further queries</h2>\n<ul class="frmRequest">\n<form name="frmView" id="frmView" method="post">\n<input name="hidval" value="contact" type="hidden">\n<li><label>Name of the Company:</label><input name="txtName" class="required" type="text"></li>\n<li><label>Address:</label><input name="txtAddress" class="required" type="text"></li>\n<li><label>Phone:</label><input name="txtPhone" class="required number" type="text"></li>\n<li><label>Query:</label><textarea name="requirement" id="requirement"></textarea></li>\n<li><label>&nbsp;</label><button class="butt"><span>submit</span></button></li>\n</form></ul>', 'Advertise', 'Advertise', '2012-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_country`
--

CREATE TABLE IF NOT EXISTS `safedoc_country` (
  `countryId` int(11) NOT NULL AUTO_INCREMENT,
  `countryName` varchar(45) DEFAULT NULL,
  `countryCreatedOn` date DEFAULT NULL,
  `countryModifiedOn` date DEFAULT NULL,
  PRIMARY KEY (`countryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `safedoc_country`
--

INSERT INTO `safedoc_country` (`countryId`, `countryName`, `countryCreatedOn`, `countryModifiedOn`) VALUES
(9, 'India', '2012-01-11', '2012-03-03'),
(10, 'Australia', '2012-01-11', '2012-01-11'),
(11, 'USA', '2012-01-11', '2012-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_document`
--

CREATE TABLE IF NOT EXISTS `safedoc_document` (
  `documentId` int(11) NOT NULL AUTO_INCREMENT,
  `documentUserId` int(11) DEFAULT NULL,
  `documentCategoryId` int(11) DEFAULT NULL,
  `docCategoryParentId` int(11) NOT NULL,
  `documentName` varchar(250) DEFAULT NULL,
  `documentNumber` varchar(20) NOT NULL,
  `documentYearPassing` int(11) DEFAULT NULL,
  `documentSubjectName` varchar(45) DEFAULT NULL,
  `documentBoard` varchar(45) DEFAULT NULL,
  `documentMarks` int(11) DEFAULT NULL,
  `documentPercentage` decimal(16,2) DEFAULT NULL,
  `documentRemarks` varchar(250) DEFAULT NULL,
  `documentImage` varchar(250) DEFAULT NULL,
  `documentExpiryDate` date DEFAULT NULL,
  `documentAlertDate` date DEFAULT NULL,
  `documentCreatedOn` date DEFAULT NULL,
  `documentModifiedOn` date DEFAULT NULL,
  PRIMARY KEY (`documentId`),
  KEY `documentUserId` (`documentUserId`),
  KEY `documentCategoryId` (`documentCategoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `safedoc_document`
--

INSERT INTO `safedoc_document` (`documentId`, `documentUserId`, `documentCategoryId`, `docCategoryParentId`, `documentName`, `documentNumber`, `documentYearPassing`, `documentSubjectName`, `documentBoard`, `documentMarks`, `documentPercentage`, `documentRemarks`, `documentImage`, `documentExpiryDate`, `documentAlertDate`, `documentCreatedOn`, `documentModifiedOn`) VALUES
(24, 2, 7, 3, 'Passport', 'PASS123PORT1233', 0, '0', '0', 0, '0.00', '0', 'w-11.jpg', '2012-01-05', '2012-01-11', '2012-01-18', '2012-01-18'),
(25, 2, 8, 3, 'Driving License', 'Driving32145611111', 0, '0', '0', 0, '0.00', '0', 'w31.jpeg', '2012-01-18', '2012-01-04', '2012-01-18', '2012-01-18'),
(27, 2, 16, 0, 'test', '0', 0, '0', '0', 0, '0.00', '0', 'banner4.jpg', '0000-00-00', '0000-00-00', '2012-01-18', '2012-01-19'),
(29, 6, 7, 3, 'Passport', 'G121231212', 0, '0', '0', 0, '0.00', '0', 'safe1-2.jpg', '2012-02-10', '2012-01-28', '2012-01-18', '2012-02-16'),
(31, 2, 17, 0, 'ssc certificate 111111', '0', 0, '0', '0', 0, '0.00', '0', 'whyso.jpg', '0000-00-00', '0000-00-00', '2012-01-19', '2012-01-19'),
(34, 19, 1, 0, 'Phone bill', '0', 0, '0', '0', 0, '0.00', '0', 'republic_day_india_12266.jpg', '0000-00-00', '2012-01-04', '2012-01-28', '2012-01-28'),
(38, 19, 1, 0, 'dsds', '0', 0, '0', '0', 0, '0.00', '0', 'Chris kerr.xls', '0000-00-00', '2012-01-01', '2012-01-28', '2012-01-28'),
(39, 26, 1, 0, 'Fail', '0', 0, '0', '0', 0, '0.00', '0', 'Failed.jpg', '0000-00-00', '2012-02-06', '2012-02-06', '2012-02-06'),
(41, 26, 1, 0, 'Pass', '0', 0, '0', '0', 0, '0.00', '0', 'Passed.jpg', '0000-00-00', '2011-11-08', '2012-02-07', '2012-02-07'),
(42, 26, 1, 0, 'Pass', '0', 0, '0', '0', 0, '0.00', '0', 'Passed1.jpg', '0000-00-00', '2011-10-04', '2012-02-07', '2012-02-07'),
(44, 29, 1, 0, 'Primium', '0', 0, '0', '0', 0, '0.00', '0', 'Kalika.jpg', '0000-00-00', '2012-02-19', '2012-02-18', '2012-03-11'),
(45, 27, 1, 0, 'Menu', '0', 0, '0', '0', 0, '0.00', '0', 'menu.jpg', '0000-00-00', NULL, '2012-02-21', '2012-02-21'),
(49, 2, 1, 0, 'sssss', '0', 0, '0', '0', 0, '0.00', '0', 'img.jpg', '0000-00-00', NULL, '2012-02-24', '2012-02-24'),
(50, 36, 7, 3, 'Passport', 'G2345667', 0, '0', '0', 0, '0.00', '0', 'Zodiac.jpg', '2012-03-11', '2012-03-12', '2012-03-11', '2012-03-11'),
(52, 37, 1, 0, 'SRV Logo', '0', 0, '0', '0', 0, '0.00', '0', 'untitled.bmp', '0000-00-00', '2012-03-23', '2012-03-21', '2012-03-21'),
(53, 41, 7, 3, 'Passport', 'we234rf', 0, '0', '0', 0, '0.00', '0', 'New_Bitmap_Image.jpg', '2012-04-13', '2015-04-14', '2012-04-13', '2012-04-13'),
(54, 42, 1, 0, 'Gourav', '0', 0, '0', '0', 0, '0.00', '0', 'DSC_3593-1.JPG', '0000-00-00', '2012-04-15', '2012-04-15', '2012-04-15'),
(55, 28, 2, 0, 'Xth Standard', '0', 1999, 'Science', 'CBSE', 789, '87.25', 'Too Good', NULL, '0000-00-00', NULL, '2012-04-19', '2012-04-19'),
(56, 28, 7, 3, 'Passport', 'AS123456', 0, '0', '0', 0, '0.00', '0', NULL, '2012-04-20', NULL, '2012-04-20', '2012-04-20'),
(57, 28, 1, 0, 'wererr', '0', 0, '0', '0', 0, '0.00', '0', '1.png', '0000-00-00', '2012-04-25', '2012-04-25', '2012-04-25'),
(58, 40, 7, 3, 'Passport', 'a12345', 0, '0', '0', 0, '0.00', '0', 'Facebook.jpg', '2012-05-24', '2012-05-15', '2012-05-14', '2012-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_doc_category`
--

CREATE TABLE IF NOT EXISTS `safedoc_doc_category` (
  `docCategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `docCategoryName` varchar(45) DEFAULT NULL,
  `docCategoryParentId` int(11) DEFAULT NULL,
  `docCategoryUserId` int(11) NOT NULL,
  `docCategoryCreatedOn` date DEFAULT NULL,
  `docCategoryModifiedOn` date DEFAULT NULL,
  PRIMARY KEY (`docCategoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `safedoc_doc_category`
--

INSERT INTO `safedoc_doc_category` (`docCategoryId`, `docCategoryName`, `docCategoryParentId`, `docCategoryUserId`, `docCategoryCreatedOn`, `docCategoryModifiedOn`) VALUES
(1, 'Home Documents', 0, 0, '2012-01-11', '2012-02-29'),
(2, 'Marksheets', 0, 0, '2012-01-11', '2012-01-11'),
(3, 'Official documents', 0, 0, '2012-01-11', '2012-01-11'),
(7, 'Passport', 3, 0, '2012-01-11', '2012-01-11'),
(8, 'Driving license', 3, 0, '2012-01-11', '2012-01-11'),
(9, 'Pan Card', 3, 0, '2012-01-11', '2012-01-11'),
(15, '10th Certificate', 2, 2, '2012-01-17', '2012-01-18'),
(16, 'ttt', 0, 2, '2012-01-17', '2012-01-17'),
(17, 'testmain cat', 0, 2, '2012-01-18', '2012-01-18'),
(18, 'Loan', 1, 6, '2012-01-18', '2012-01-18'),
(20, 'test doc', 1, 2, '2012-01-20', '2012-01-20'),
(21, 'Loan Axis Bank', 1, 6, '2012-01-23', '2012-01-23'),
(22, 'testers', 1, 18, '2012-01-28', '2012-01-28'),
(23, 'abc', 1, 18, '2012-01-28', '2012-01-28'),
(24, 'Bill', 1, 19, '2012-01-28', '2012-01-28'),
(25, 'Final Year', 2, 19, '2012-01-28', '2012-01-28'),
(26, 'Test', 1, 6, '2012-01-28', '2012-01-28'),
(27, 'Test 1', 1, 26, '2012-02-07', '2012-02-07'),
(30, 'Personal Docs', 0, 33, '2012-02-23', '2012-02-23'),
(37, 'tax papers', 0, 0, '2012-03-05', '2012-03-05'),
(38, 'Loan', 0, 36, '2012-03-11', '2012-03-11'),
(39, 'Premium', 0, 37, '2012-03-21', '2012-03-21'),
(41, 'Personal', 0, 42, '2012-04-15', '2012-04-15'),
(45, 'Test', 0, 46, '2012-04-25', '2012-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_logs`
--

CREATE TABLE IF NOT EXISTS `safedoc_logs` (
  `logsId` int(11) NOT NULL AUTO_INCREMENT,
  `logsUserId` int(11) DEFAULT NULL,
  `logsLogin` datetime DEFAULT NULL,
  `logsCreatedOn` date DEFAULT NULL,
  `logsModifiedOn` date DEFAULT NULL,
  PRIMARY KEY (`logsId`),
  KEY `logsUserId` (`logsUserId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_mutualfunds`
--

CREATE TABLE IF NOT EXISTS `safedoc_mutualfunds` (
  `mutualfundsId` int(11) NOT NULL AUTO_INCREMENT,
  `mutualfundsCompanyId` int(11) DEFAULT NULL,
  `mutualfundsName` varchar(250) DEFAULT NULL,
  `mutualfundsCode` varchar(45) DEFAULT NULL,
  `mutualfundsNAV` decimal(16,2) DEFAULT NULL,
  `mutualfundsRepurchasePrice` decimal(16,2) DEFAULT NULL,
  `mutualfundsSalesPrice` decimal(16,2) DEFAULT NULL,
  `mutualfundsUpdateDate` date DEFAULT NULL,
  `mutualfundsCreatedOn` date DEFAULT NULL,
  `mutualfundsModifiedsOn` date DEFAULT NULL,
  PRIMARY KEY (`mutualfundsId`),
  KEY `mutualCompanyId` (`mutualfundsCompanyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `safedoc_mutualfunds`
--

INSERT INTO `safedoc_mutualfunds` (`mutualfundsId`, `mutualfundsCompanyId`, `mutualfundsName`, `mutualfundsCode`, `mutualfundsNAV`, `mutualfundsRepurchasePrice`, `mutualfundsSalesPrice`, `mutualfundsUpdateDate`, `mutualfundsCreatedOn`, `mutualfundsModifiedsOn`) VALUES
(4, 3, 'test', '113065', '10.57', '10.46', '10.57', '2012-04-30', NULL, '2012-01-17'),
(5, 1, 'xyz 1', 'xyz234', '45.30', '17.18', '19.50', '2012-01-14', '2012-01-14', NULL),
(6, 1, 'test', 'test', '12.00', '12.00', '12.00', '2012-01-20', '2012-01-17', NULL),
(9, 8, 'sdfsdfsdf', '113065', '10.57', '10.46', '10.57', '2012-04-30', '2012-01-18', '2012-01-19'),
(10, 9, 'Axis Triple Advantage Fund - Dividend Option', '113065', '10.57', '10.46', '10.57', '2012-04-30', '2012-01-18', '2012-01-18'),
(11, 3, 'sasas', '113065', '10.57', '10.46', '10.57', '2012-04-30', '2012-01-19', '2012-01-19'),
(12, 9, 'Axis Triple Advantage Fund', '113064', '11.40', '11.29', '11.40', '2012-04-30', '2012-04-13', NULL),
(13, 11, 'BARODA PIONEER BALANCE FUND-Growth Plan', '101912', '26.90', '26.63', '26.90', '2012-04-30', '2012-04-13', '2012-04-13'),
(14, 11, 'BARODA PIONEER BALANCE FUND-Dividend Plan', '101913', '26.90', '26.63', '26.90', '2012-04-30', '2012-04-13', NULL),
(15, 12, 'Birla Sun Life 95 Fund-Plan A (Dividend)', '103154', '98.89', '97.90', '98.89', '2012-04-30', '2012-04-13', NULL),
(16, 12, 'Birla Sun Life 95 Fund-Plan B(Growth', '103155', '303.70', '300.66', '303.70', '2012-04-30', '2012-04-13', NULL),
(17, 12, 'Birla Sun Life Freedom Fund-Plan A (Dividend)', '100035', '14.55', '14.40', '14.55', '2011-10-21', '2012-04-13', NULL),
(18, 12, 'Birla Sun Life Freedom Fund-Plan B (Growth)', '100036', '30.91', '30.60', '30.91', '2011-10-21', '2012-04-13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_mutual_company`
--

CREATE TABLE IF NOT EXISTS `safedoc_mutual_company` (
  `mutualCompanyId` int(11) NOT NULL AUTO_INCREMENT,
  `mutualCompanyName` varchar(45) DEFAULT NULL,
  `mutualCompanyCreatedOn` date DEFAULT NULL,
  `mutualCompanyModifiedOn` date DEFAULT NULL,
  PRIMARY KEY (`mutualCompanyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `safedoc_mutual_company`
--

INSERT INTO `safedoc_mutual_company` (`mutualCompanyId`, `mutualCompanyName`, `mutualCompanyCreatedOn`, `mutualCompanyModifiedOn`) VALUES
(1, 'XYZ', '2012-01-13', '2012-01-13'),
(3, 'ABC', '2012-01-13', '2012-01-13'),
(8, 'sdfdsfsdfsdf', '2012-01-18', '2012-01-18'),
(9, 'Axis Mutual Fund', '2012-01-18', '2012-01-18'),
(11, 'Baroda Pioneer Mutual Fund', '2012-04-13', '2012-04-13'),
(12, 'Birla Sun Life Mutual Fund', '2012-04-13', '2012-04-13'),
(13, 'Canara Robeco Mutual Fund', '2012-04-13', '2012-04-13'),
(14, 'DSP BlackRock Mutual Fund', '2012-04-13', '2012-04-13'),
(15, 'Fidelity Mutual Fund', '2012-04-13', '2012-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_newsfeeds`
--

CREATE TABLE IF NOT EXISTS `safedoc_newsfeeds` (
  `newsfeedsId` int(11) NOT NULL AUTO_INCREMENT,
  `newsfeedTitle` varchar(250) DEFAULT NULL,
  `newsfeedDescription` text,
  `newsfeedCreatedOn` date DEFAULT NULL,
  `newsfeedModifiedOn` date DEFAULT NULL,
  PRIMARY KEY (`newsfeedsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `safedoc_newsfeeds`
--

INSERT INTO `safedoc_newsfeeds` (`newsfeedsId`, `newsfeedTitle`, `newsfeedDescription`, `newsfeedCreatedOn`, `newsfeedModifiedOn`) VALUES
(9, 'Newsfeed 1', '<p>some text here!\nsome text here!\nsome text here!\nsome text here!\n<b>some text here! Test</b></p>', '2012-01-10', '2012-03-22'),
(17, 'Newsfeed2', '<p>Newsfeed cotent..</p><p>Newsfeed cotent..</p><p>Newsfeed cotent..</p>', '2012-01-18', '2012-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_notifications`
--

CREATE TABLE IF NOT EXISTS `safedoc_notifications` (
  `notificationId` int(11) NOT NULL AUTO_INCREMENT,
  `notificationUserId` int(11) DEFAULT NULL,
  `notificationByEmail` char(1) DEFAULT NULL,
  `notificationBySMS` char(1) DEFAULT NULL,
  `notificationCreatedOn` date DEFAULT NULL,
  `notificationModifiedOn` date DEFAULT NULL,
  PRIMARY KEY (`notificationId`),
  KEY `notificationUserId` (`notificationUserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `safedoc_notifications`
--

INSERT INTO `safedoc_notifications` (`notificationId`, `notificationUserId`, `notificationByEmail`, `notificationBySMS`, `notificationCreatedOn`, `notificationModifiedOn`) VALUES
(1, 2, '1', '1', '2012-01-11', '2012-05-12'),
(6, 11, '1', '1', '2012-01-23', '2012-01-23'),
(13, 18, '1', '1', '2012-01-28', '2012-01-28'),
(21, 26, '1', '1', '2012-02-06', '2012-02-07'),
(22, 27, '1', '1', '2012-02-15', '2012-02-18'),
(23, 28, '1', '1', '2012-02-15', '2012-03-13'),
(24, 29, '1', '1', '2012-02-15', '2012-03-31'),
(25, 30, '1', '1', '2012-02-16', '2012-02-16'),
(28, 33, '0', '0', '2012-02-23', '2012-02-23'),
(29, 34, '0', '0', '2012-02-26', '2012-02-26'),
(30, 35, '0', '0', '2012-03-09', '2012-03-09'),
(31, 36, '', '1', '2012-03-11', '2012-03-11'),
(32, 37, '0', '0', '2012-03-21', '2012-03-21'),
(34, 39, '0', '0', '2012-03-30', '2012-03-30'),
(35, 40, '1', '1', '2012-04-13', '2012-04-13'),
(36, 41, '1', '1', '2012-04-13', '2012-04-13'),
(37, 42, '1', '1', '2012-04-15', '2012-04-15'),
(38, 43, '0', '0', '2012-04-19', '2012-04-19'),
(39, 44, '0', '0', '2012-04-22', '2012-04-22'),
(40, 45, '1', '', '2012-04-25', '2012-04-25'),
(41, 46, '1', '1', '2012-04-25', '2012-04-25'),
(42, 47, '', '', '2012-04-28', '2012-04-28'),
(43, 48, '0', '0', '2012-05-26', '2012-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_payment`
--

CREATE TABLE IF NOT EXISTS `safedoc_payment` (
  `paymentId` int(11) NOT NULL AUTO_INCREMENT,
  `paymentUserId` int(11) DEFAULT NULL,
  `packageId` int(11) NOT NULL,
  `paymentAmount` decimal(16,2) DEFAULT NULL,
  `paymentStatus` enum('0','1') DEFAULT '0' COMMENT '0= Pending\n1= Paid',
  `TxnreferenceNo` varchar(255) NOT NULL,
  `BankReferenceNo` varchar(255) NOT NULL,
  `paymentCreatedOn` date DEFAULT NULL,
  `paymentModifiedOn` date DEFAULT NULL,
  PRIMARY KEY (`paymentId`),
  KEY `paymentUserId` (`paymentUserId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_payment_details`
--

CREATE TABLE IF NOT EXISTS `safedoc_payment_details` (
  `payment_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `period` varchar(255) NOT NULL,
  `CreatedOn` date NOT NULL,
  `ModifiedOn` date NOT NULL,
  PRIMARY KEY (`payment_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `safedoc_payment_details`
--

INSERT INTO `safedoc_payment_details` (`payment_details_id`, `name`, `amount`, `period`, `CreatedOn`, `ModifiedOn`) VALUES
(1, 'Yearly', 999, '365', '2012-04-05', '2012-04-05'),
(2, 'Life Time', 2599, 'unlimited', '2012-04-05', '2012-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_protfolio`
--

CREATE TABLE IF NOT EXISTS `safedoc_protfolio` (
  `portfolioId` int(11) NOT NULL AUTO_INCREMENT,
  `portfolioUserId` int(11) DEFAULT NULL,
  `portfolioMutualCompanyId` int(11) NOT NULL,
  `portfolioMutualFundId` int(11) DEFAULT NULL,
  `portfolioUnits` int(11) DEFAULT NULL,
  `portfolioPurchaseDate` date DEFAULT NULL,
  `portfolioPurchaseNAV` decimal(16,2) DEFAULT NULL,
  `portfolioNotifyPercentIncrease` decimal(16,2) DEFAULT NULL,
  `portfolioNotifyPrice` decimal(16,2) DEFAULT NULL,
  `portfolioCreatedOn` date DEFAULT NULL,
  `portfolioModifiedOn` date DEFAULT NULL,
  PRIMARY KEY (`portfolioId`),
  KEY `userId` (`portfolioUserId`),
  KEY `mutualfundsId` (`portfolioMutualFundId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `safedoc_protfolio`
--

INSERT INTO `safedoc_protfolio` (`portfolioId`, `portfolioUserId`, `portfolioMutualCompanyId`, `portfolioMutualFundId`, `portfolioUnits`, `portfolioPurchaseDate`, `portfolioPurchaseNAV`, `portfolioNotifyPercentIncrease`, `portfolioNotifyPrice`, `portfolioCreatedOn`, `portfolioModifiedOn`) VALUES
(3, 2, 1, 5, 900, '2012-01-14', '8.00', '10.00', '0.00', '2012-01-14', '2012-01-21'),
(4, 2, 3, 4, 100, '2012-01-14', '150.00', '0.00', '250.00', '2012-01-14', '2012-01-21'),
(7, 6, 9, 10, 100, '2011-12-01', '8.00', '70.00', '0.00', '2012-01-23', '2012-01-23'),
(10, 20, 1, 6, 0, '2013-07-04', '0.00', '0.00', '98.09', '2012-01-28', '2012-01-28'),
(11, 20, 1, 6, 0, '2012-01-28', '0.00', '10.00', '0.00', '2012-01-28', '2012-01-28'),
(12, 20, 1, 6, 7878, '2012-01-28', '12123.00', '0.00', '898.00', '2012-01-28', '2012-01-28'),
(13, 29, 9, 10, 3000, '2012-02-18', '10.00', '50.00', '0.00', '2012-02-18', '2012-02-18'),
(15, 29, 9, 10, 1000, '2012-03-01', '10.00', '10.00', '0.00', '2012-03-01', '2012-03-01'),
(17, 36, 9, 10, 1000, '2012-03-11', '9.00', '20.00', '0.00', '2012-03-11', '2012-03-11'),
(18, 37, 9, 10, 10000, '2012-03-21', '10.00', '0.00', '4.00', '2012-03-21', '2012-03-21'),
(19, 28, 9, 10, 1000, '2012-04-10', '89.00', '0.00', '110.09', '2012-04-10', '2012-05-01'),
(20, 28, 3, 4, 80, '2012-04-10', '76.00', '60.00', '0.00', '2012-04-10', '2012-04-10'),
(21, 40, 9, 10, 1000, '2012-04-13', '10.50', '20.00', '0.00', '2012-04-13', '2012-04-13'),
(22, 40, 12, 15, 1000, '2012-04-13', '99.00', '10.00', '0.00', '2012-04-13', '2012-04-13'),
(23, 40, 12, 16, 1000, '2012-04-13', '310.00', '10.00', '0.00', '2012-04-13', '2012-04-13'),
(24, 40, 12, 17, 1000, '2012-04-13', '14.00', '0.00', '15.00', '2012-04-13', '2012-04-13'),
(25, 40, 9, 10, 10, '2012-04-13', '10.00', '10.00', '0.00', '2012-04-13', '2012-04-13'),
(26, 41, 12, 15, 100, '2012-04-03', '50.00', '50.00', '0.00', '2012-04-13', '2012-04-13'),
(27, 28, 12, 16, 56, '2012-04-13', '98.00', '0.00', '200.00', '2012-04-13', '2012-04-13'),
(28, 42, 9, 10, 100, '2012-04-15', '10.00', '0.00', '11.00', '2012-04-15', '2012-04-15'),
(29, 28, 12, 17, 100, '2012-04-25', '10.00', '100.00', '0.00', '2012-04-25', '2012-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_user`
--

CREATE TABLE IF NOT EXISTS `safedoc_user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(45) DEFAULT NULL,
  `userUName` varchar(45) DEFAULT NULL,
  `userPassword` varchar(250) DEFAULT NULL,
  `profile_image_path_thumb` varchar(255) NOT NULL,
  `profile_image_path_original` varchar(255) NOT NULL,
  `userDOB` date DEFAULT NULL,
  `userEducation` varchar(250) DEFAULT NULL,
  `userWork` varchar(250) DEFAULT NULL,
  `userCity` varchar(255) NOT NULL,
  `userCountryId` int(11) DEFAULT NULL,
  `userAboutMySelf` text,
  `userEmail` varchar(45) DEFAULT NULL,
  `userMobile` varchar(45) DEFAULT NULL,
  `activationkey` varchar(255) NOT NULL,
  `OTP` varchar(255) NOT NULL,
  `ActiveOPT` smallint(1) NOT NULL,
  `userDemoFlag` smallint(1) NOT NULL DEFAULT '1',
  `userPaidFlag` smallint(1) NOT NULL DEFAULT '0',
  `isActive` smallint(1) NOT NULL,
  `show_demo` smallint(1) NOT NULL,
  `expire_date` date NOT NULL,
  `userCreatedOn` date NOT NULL,
  `userUpdatedOn` date NOT NULL,
  PRIMARY KEY (`userId`),
  KEY `countryId` (`userCountryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `safedoc_user`
--

INSERT INTO `safedoc_user` (`userId`, `userName`, `userUName`, `userPassword`, `profile_image_path_thumb`, `profile_image_path_original`, `userDOB`, `userEducation`, `userWork`, `userCity`, `userCountryId`, `userAboutMySelf`, `userEmail`, `userMobile`, `activationkey`, `OTP`, `ActiveOPT`, `userDemoFlag`, `userPaidFlag`, `isActive`, `show_demo`, `expire_date`, `userCreatedOn`, `userUpdatedOn`) VALUES
(2, 'Sachin Tendulkar!', 'test', 'cc03e747a6afbbcbf8be7668acfebee5', 'img_142X94.jpg', 'img.jpg', '1988-01-12', 'Bsc, Maharashtra Board', 'self employment', 'test123', 11, 'Test Desc', 'sunil.silumala@wwindia.com', '9820221486', '', '', 0, 0, 1, 1, 0, '2012-04-27', '2012-01-07', '2012-05-12'),
(6, 'Tushar Chopde', 'tushar.chopde', 'b8647a55cc808f712da1a68e75f1e9dc', 'DSC01638_142X94.JPG', 'DSC01638.JPG', '1986-04-21', 'BE', 'Web Werks India Pvt Ltd', 'Mumbai', 9, '', 'tushar.chopde@wwindia.com', '9820221486', '', '', 0, 0, 0, 1, 0, '2013-04-12', '2012-01-18', '2012-02-24'),
(9, 'Rima Mehta', 'rima.mehta', '0f359740bd1cda994f8b55330c86d845', 'w3_142X94.jpeg', 'w3.jpeg', '1986-10-09', 'M.Sc(IIT)', '-', 'Surat', 9, '-', 'rima.mehta@wwindia.com', '986547', '', '', 0, 0, 1, 1, 0, '2012-04-27', '2012-01-19', '2012-02-22'),
(10, NULL, 'testnewuser', '827ccb0eea8a706c4c34a16891f84e7b', '', '', NULL, NULL, NULL, '', NULL, NULL, 'test@tesing.com', '12345678', '', '', 0, 0, 0, 0, 0, '2013-04-12', '2012-01-23', '2012-01-23'),
(11, 'Tushar Chopde', 'tushar', 'b8647a55cc808f712da1a68e75f1e9dc', 'alertme_142X94.png', 'alertme.png', '0000-00-00', 'BE', 'Web Werks India Pvt Ltd', 'Mumbai', 9, 'Test', 'tushar.chopde@gmail.com', '9820221486', '', '', 0, 0, 0, 0, 0, '0000-00-00', '2012-01-23', '2012-01-23'),
(12, NULL, 'testinguser', 'e10adc3949ba59abbe56e057f20f883e', '', '', NULL, NULL, NULL, '', NULL, NULL, 'sunil221@yahoo.co.in', '12345678', '', '', 0, 0, 0, 0, 0, '0000-00-00', '2012-01-23', '2012-01-23'),
(16, NULL, 'Rajesh', '80ae3b1c2b8b42f54217cd43192d2262', '', '', NULL, NULL, NULL, '', NULL, NULL, 'rajesh.shingare@wwindia.com', '1234', 'ff3f63663e741d69e4634b0080d2ae48', '', 0, 1, 0, 0, 0, '0000-00-00', '2012-01-28', '2012-01-28'),
(17, NULL, 'rajeshwar.shingare', 'e360bc13bcba071f4746adbb334cd78e', '', '', NULL, NULL, NULL, '', NULL, NULL, 'rajeshwar.shingare@wwindia.c.o.m', '23790544', '323e849ec98e94e570dc8356a79ff016', '', 0, 1, 0, 0, 0, '0000-00-00', '2012-01-28', '2012-01-28'),
(18, 'Rajesh', 'Rajeshwar', 'e722795ae7b1d0cec31443da1b37f820', 'Sunflower_142X94.gif', 'Sunflower.gif', '0000-00-00', 'BE', 'QC Team Lead', 'Badlapur', 9, 'I am a software tester and leading the QC team since last year.', 'rajeshwar.shingare@wwindia.com', '666666', '26239d94c2ba949bdc69232e81190e32', '', 0, 1, 0, 1, 0, '0000-00-00', '2012-01-28', '2012-01-28'),
(19, 'Rajesh', 'Rajesh2', '4b41430be781e3427ede002b5495b658', 'republic_day_india_12266_142X94.jpg', 'republic_day_india_12266.jpg', '0000-00-00', 'Tester', '', 'Austr', 10, 'dsdsdsds', 'Test2@wwindia.com', '66666', '1a31442124822d5d74437239e4b9cb9d', '', 0, 1, 0, 1, 0, '0000-00-00', '2012-01-28', '2012-01-30'),
(20, NULL, 'raj.shin', '1f5a0c9231cf0b843a09b39c508dde2f', '', '', NULL, NULL, NULL, '', NULL, NULL, 'Test5@wwindia.com', '33333', '84cf2fe2d942d19ee36e919b5979d371', '', 0, 1, 0, 1, 0, '0000-00-00', '2012-01-28', '2012-01-28'),
(21, NULL, 'raj.shin1', 'e360bc13bcba071f4746adbb334cd78e', '', '', NULL, NULL, NULL, '', NULL, NULL, 'Test6@wwindia.com', '121', '87d11b94237caf5451840cc91c17ed4a', '', 0, 1, 0, 1, 0, '0000-00-00', '2012-01-28', '2012-01-28'),
(23, NULL, 'huzefa', '0f359740bd1cda994f8b55330c86d845', '', '', NULL, NULL, NULL, '', NULL, NULL, 'huzefa.madraswala@wwindia.com', '5566556655', '1f263d05fde0c7f81c83910356ea837a', '', 0, 1, 0, 1, 0, '0000-00-00', '2012-01-28', '2012-01-28'),
(24, NULL, 'Namita', '47bce5c74f589f4867dbd57e9ca9f808', '', '', NULL, NULL, NULL, '', NULL, NULL, 'dshjsushuhs@c.c.c.c', '55656565', '66e20a4263f6926e78bcdbc02307bdbb', '', 0, 1, 0, 0, 0, '0000-00-00', '2012-01-30', '2012-01-30'),
(25, NULL, 'aaaa', '47bce5c74f589f4867dbd57e9ca9f808', '', '', NULL, NULL, NULL, '', NULL, NULL, 'aaaa@avd.com', '56565654445455555555555555555555555555555', 'b811141afc590aa3e087599a8109325c', '', 0, 1, 0, 0, 0, '0000-00-00', '2012-01-30', '2012-01-30'),
(26, 'harsha', 'Harshada', '440ac85892ca43ad26d44c7ad9d47d3e', '', '', '0000-00-00', 'Bsc', 'Testing', 'Mumbai', 9, 'Good', 'harshada.gawde@wwindia.com', '2', '86d3b8324de2241239a81c62f96d6cba', '', 0, 1, 0, 1, 0, '0000-00-00', '2012-02-06', '2012-02-07'),
(27, 'Mayank Vatsal', 'mayankvatsal', '6ad20edaab0fc96bdb311705532d51aa', 'mayank1_142X94.jpg', 'mayank1.jpg', '0000-00-00', 'MBA', 'Consultant', 'Mumbai', 9, 'dfdszf', 'mayank.vatsal@gmail.com', '7709731833', '2c29244012a2e7d0731cf41a92925573', '', 0, 1, 0, 1, 0, '0000-00-00', '2012-02-15', '2012-02-18'),
(28, 'Rohit Prasad', 'rairohitprasad', '908dceb19d76656175036c5967dcd734', '', '', '2012-03-06', 'MBA', 'Accenture', 'Mumbai', 9, 'ABCD', 'rairohitprasad@gmail.com', '7738638767', '79ded93c1c084cd67162f21e9f44b72f', '', 0, 1, 0, 1, 0, '0000-00-00', '2012-02-15', '2012-03-13'),
(29, 'Vikram kumar', 'vikram1248', '1e0bef3d1a06832c1eaf3413c5ad45a7', '1_110_142X94.jpg', '1_110.jpg', '1970-01-01', 'MBA', 'employee', 'Mumbai', 9, 'working with HDFC Bank', 'vikram.bitmesra@gmail.com', '9503053726', 'c311abdaeb04202d0099f57cf7f5391f', '', 0, 1, 0, 1, 0, '0000-00-00', '2012-02-15', '2012-04-10'),
(30, 'Prashant', 'Prashant', 'e10adc3949ba59abbe56e057f20f883e', '28_142X94.jpg', '28.jpg', '0000-00-00', 'Masters ...', 'Business Development', 'Mumbai', 9, 'ajgsksagk hgksafhg ksdfahdfs ajdfsjksdf', 'prashant.shelar@wwindia.com', '9821245344', '03f52a5495983ca8d7dbeb8e1e06aa75', '', 0, 1, 0, 1, 0, '0000-00-00', '2012-02-16', '2012-02-16'),
(31, NULL, 'vikram', '677ef6b2862e3574fc943176a9e6a402', '', '', NULL, NULL, NULL, '', NULL, NULL, 'vikramm.kumar@hdfcbank.com', '9503053726', '596b02e2b6bdb893319b4041d081dc9c', '', 0, 1, 0, 0, 0, '0000-00-00', '2012-02-18', '2012-02-18'),
(32, 'Vivek', 'vivekb', '25f9e794323b453885f5181f1b624d0b', '', '', '1990-01-17', 'BE', '', 'Mumbai', 9, '', 'vivek.barsaiyan@wwindia.com', '9594242195', '681cfc4adc99af0ab25da091f0d85a9f', '', 0, 1, 0, 1, 0, '0000-00-00', '2012-02-22', '2012-02-22'),
(33, NULL, 'raman', 'cc03e747a6afbbcbf8be7668acfebee5', '', '', NULL, NULL, NULL, '', NULL, NULL, 'director@scit.edu', '0912345678', 'ecbc8e67aec6c5c36a23e13ced24cf34', '', 0, 1, 0, 1, 0, '0000-00-00', '2012-02-23', '2012-02-23'),
(34, NULL, 'Allen', '0123d11995f4c8d8cc48b8d5c46cc263', '', '', NULL, NULL, NULL, '', NULL, NULL, 'callenraj@gmail.com', '9442273766', '9b5524c3153d3aef85e95bd825abe290', '', 0, 1, 0, 1, 0, '0000-00-00', '2012-02-26', '2012-02-26'),
(35, NULL, 'user', 'e10adc3949ba59abbe56e057f20f883e', '', '', NULL, NULL, NULL, '', NULL, NULL, 'sachin.mhaskar@wwindia.com', '22400226', 'b5bcf4a4bf55632b35f4cc8dbcdbc7ef', '', 0, 1, 0, 1, 0, '0000-00-00', '2012-03-09', '2012-03-09'),
(36, 'Sanjeev', 'sanjeev', '3df3c7e62c6925da2056af88c398ebdb', 'DSCN5289_142X94.JPG', 'DSCN5289.JPG', '1983-07-08', 'MBA', 'SRV Media', 'Mumbai', 9, 'XYZ  ABC  I like Veg ood', 'sanjeev.dta@gmail.com', '9503053726', 'b4b2c448ca22d8facfcf57d37a7a75aa', '', 0, 1, 0, 1, 0, '0000-00-00', '2012-03-11', '2012-03-11'),
(37, NULL, 'saimanohar', 'b65cc97ce2586767b370c2db47595f25', '', '', NULL, NULL, NULL, '', NULL, NULL, 'promanohar@gmail.com', '9850325663', '2be907872b3b53a570527604923ab2fc', '', 0, 1, 0, 1, 0, '0000-00-00', '2012-03-21', '2012-03-21'),
(39, NULL, 'vikram8421', '677ef6b2862e3574fc943176a9e6a402', '', '', NULL, NULL, NULL, '', NULL, NULL, 'vikramkumar1248@gmail.com', '9503053726', 'db4b2246f21e77c5a09f83b16294d19b', '', 0, 0, 0, 1, 0, '0000-00-00', '2012-03-30', '2012-03-30'),
(40, 'Vikram', 'vikram1234', '677ef6b2862e3574fc943176a9e6a402', '', '', '1983-12-02', 'MBA-Symbiosis', 'Free Lanser', 'Mumbai', 9, 'I am Great', 'vikram@srvmedia.com', '9503053726', '6d65c71743b21bd7cda98420bd8b3f9b', '', 0, 1, 0, 1, 1, '0000-00-00', '2012-04-13', '2012-04-13'),
(41, 'Chitral', 'chitral', 'e19d5cd5af0378da05f63f891c7467af', '', '', '1978-12-10', 'B Com', 'Service', 'Mumbai', 9, 'Hi ', 'chitral.shah@gmail.com', '9323688870', 'ba65b157254ed37112af988e0142a471', '', 0, 1, 0, 1, 1, '0000-00-00', '2012-04-13', '2012-04-13'),
(42, 'Gourav Bansiwal', 'gourav.bansiwal', '728546e46959c18353d853daa5910542', '', '', '1987-12-03', 'MBA', '', 'Pune', 9, '', 'gourav.bansiwal@gmail.com', '9028558793', 'b5dbe348cad2350754cd11c9324dbbfc', '', 0, 1, 0, 1, 1, '0000-00-00', '2012-04-15', '2012-04-15'),
(43, NULL, 'rohit1248', '677ef6b2862e3574fc943176a9e6a402', '', '', NULL, NULL, NULL, '', NULL, NULL, 'rohit_prasad2006@yahoo.co.in', '7738638767', 'bee544b8decaba64105ab4025d1b8aae', '', 0, 1, 0, 1, 1, '0000-00-00', '2012-04-19', '2012-04-19'),
(44, NULL, 'aasra', '8763bb2f7d78a70a1d793e0b0d66829e', '', '', NULL, NULL, NULL, '', NULL, NULL, 'seshaallen@gmail.com', '9487973766', '9a6aa275f6e4371dbb0fd6366e0df1b0', '', 0, 1, 0, 1, 1, '0000-00-00', '2012-04-22', '2012-04-22'),
(45, 'prachi mehta', 'prachi2020', '100e66eecea4e52a265b63d0dc33315a', '', '', '1989-08-26', 'mba', 'student', 'pune', 9, '', 'prachi@srvmedia.com', '9975471567', '4a2fd888ea9db19ff5f7243f2ce7324a', '', 0, 1, 0, 1, 1, '0000-00-00', '2012-04-25', '2012-04-25'),
(46, 'qaw', 'Raman123', 'cc03e747a6afbbcbf8be7668acfebee5', '', '', '1970-01-01', 'qwe', 'qwe', 'as', 9, 'sdqwe', 'raman06@yahoo.com', '9503053726', 'e589fa9b3dc6733f412cf567e2b97687', '', 0, 1, 0, 1, 1, '0000-00-00', '2012-04-25', '2012-04-25'),
(47, 'Chuck Boudreau', 'surveygold', 'd15d1ca72b5680758d85e129c660ebb2', '', '', '1958-06-05', 'University of West Florida, BS, Systems Science', '', 'Colorado Springs, Colorado', 11, 'I am a great guy to know. Really. :-)', 'chuck@surveygold.com', '7196609888', '1ab90b38ee51f86970e56fce097fdd7f', '', 0, 1, 0, 1, 1, '0000-00-00', '2012-04-28', '2012-04-28'),
(48, NULL, 'vivek', '677ef6b2862e3574fc943176a9e6a402', '', '', NULL, NULL, NULL, '', NULL, NULL, 'info@srvmedia.com', '9503053726', '700bba12a39b74daf70bc9ccdd7025be', '', 0, 0, 0, 1, 1, '0000-00-00', '2012-05-26', '2012-05-26');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `safedoc_document`
--
ALTER TABLE `safedoc_document`
  ADD CONSTRAINT `documentCategoryId` FOREIGN KEY (`documentCategoryId`) REFERENCES `safedoc_doc_category` (`docCategoryId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `documentUserId` FOREIGN KEY (`documentUserId`) REFERENCES `safedoc_user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `safedoc_logs`
--
ALTER TABLE `safedoc_logs`
  ADD CONSTRAINT `logsUserId` FOREIGN KEY (`logsUserId`) REFERENCES `safedoc_user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `safedoc_mutualfunds`
--
ALTER TABLE `safedoc_mutualfunds`
  ADD CONSTRAINT `mutualCompanyId` FOREIGN KEY (`mutualfundsCompanyId`) REFERENCES `safedoc_mutual_company` (`mutualCompanyId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `safedoc_notifications`
--
ALTER TABLE `safedoc_notifications`
  ADD CONSTRAINT `notificationUserId` FOREIGN KEY (`notificationUserId`) REFERENCES `safedoc_user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `safedoc_payment`
--
ALTER TABLE `safedoc_payment`
  ADD CONSTRAINT `paymentUserId` FOREIGN KEY (`paymentUserId`) REFERENCES `safedoc_user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `safedoc_protfolio`
--
ALTER TABLE `safedoc_protfolio`
  ADD CONSTRAINT `mutualfundsId` FOREIGN KEY (`portfolioMutualFundId`) REFERENCES `safedoc_mutualfunds` (`mutualfundsId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `userId` FOREIGN KEY (`portfolioUserId`) REFERENCES `safedoc_user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `safedoc_user`
--
ALTER TABLE `safedoc_user`
  ADD CONSTRAINT `countryId` FOREIGN KEY (`userCountryId`) REFERENCES `safedoc_country` (`countryId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
