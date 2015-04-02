-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2015 at 05:21 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spdx`
--

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE IF NOT EXISTS `relationship` (
  `spdx_id1` int(11) NOT NULL,
  `spdx_id2` int(11) NOT NULL,
  `relationship_id` int(11) NOT NULL,
  `spdx_fk` int(11) NOT NULL,
  PRIMARY KEY (`spdx_fk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relationship`
--


-- --------------------------------------------------------

--
-- Table structure for table `spdx_annotations_create`
--

CREATE TABLE IF NOT EXISTS `spdx_annotations_create` (
  `annotator_info_pk` int(11) NOT NULL DEFAULT '0',
  `annotator` text NOT NULL,
  `annotator_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `annotator_type` text NOT NULL,
  `annotator_comment` text,
  `aspdx_id` text NOT NULL,
  `spdx_fk` int(11) NOT NULL,
  PRIMARY KEY (`annotator_info_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spdx_annotations_create`
--


-- --------------------------------------------------------

--
-- Table structure for table `spdx_extracted_lic_info`
--

CREATE TABLE IF NOT EXISTS `spdx_extracted_lic_info` (
  `identifier` int(11) NOT NULL,
  `licensename` text NOT NULL,
  `license_display_name` text NOT NULL,
  `cross_ref_url` text,
  `lic_comment` text,
  `spdx_fk` int(11) NOT NULL,
  PRIMARY KEY (`identifier`,`spdx_fk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spdx_extracted_lic_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `spdx_file`
--

CREATE TABLE IF NOT EXISTS `spdx_file` (
  `spdx_pk` int(11) NOT NULL DEFAULT '0',
  `spdx_id` text NOT NULL,
  `version` text NOT NULL,
  `data_license` text NOT NULL,
  `document_name` text NOT NULL,
  `document_namespace` text NOT NULL,
  `external_dic_ref` text NOT NULL,
  `license_list_version` text NOT NULL,
  `document_comment` text,
  `creator` text NOT NULL,
  `creator_optional1` text,
  `creator_optional2` text,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creator_comment` text,
  PRIMARY KEY (`spdx_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spdx_file`
--


-- --------------------------------------------------------

--
-- Table structure for table `spdx_file_info`
--

CREATE TABLE IF NOT EXISTS `spdx_file_info` (
  `file_info_pk` int(11) NOT NULL DEFAULT '0',
  `fspdx_id` text NOT NULL,
  `filename` text,
  `filetype` text,
  `checksum` text,
  `license_concluded` text NOT NULL,
  `license_info_in_file` text,
  `license_comment` text,
  `file_copyright_text` text,
  `artifact_of_project` text,
  `artifact_of_homepage` text,
  `artifact_of_url` text,
  `file_comment` text,
  `file_notice` text,
  `file_contributor` text,
  `package_info_fk` int(11) NOT NULL,
  `spdx_fk` int(11) NOT NULL,
  PRIMARY KEY (`file_info_pk`,`package_info_fk`,`spdx_fk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spdx_file_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `spdx_license_list_insert`
--

CREATE TABLE IF NOT EXISTS `spdx_license_list_insert` (
  `license_list_pk` int(30) NOT NULL,
  `license_identifier` varchar(50) NOT NULL,
  `license_fullname` varchar(100) NOT NULL,
  `license_matchname_1` varchar(30) NOT NULL,
  `license_matchname_2` varchar(30) NOT NULL,
  `license_matchname_3` varchar(30) NOT NULL,
  `osi_approved` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`license_list_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spdx_license_list_insert`
--

INSERT INTO `spdx_license_list_insert` (`license_list_pk`, `license_identifier`, `license_fullname`, `license_matchname_1`, `license_matchname_2`, `license_matchname_3`, `osi_approved`) VALUES
(1, 'Glide', '3dfx Glide License', 'Glide', '', '', NULL),
(2, 'Abstyles', 'Abstyles License', 'Abstyles', '', '', NULL),
(3, 'AFL-1.1', 'Academic Free License v1.1', 'AFL-1.1', 'AFL 1.1', 'AFL1.1', 1),
(4, 'AFL-1.2	', 'Academic Free License v1.2	', 'AFL-1.2	', 'AFL 1.2	', 'AFL1.2	', 1),
(5, 'AFL-2.0	', 'Academic Free License v2.0	', 'AFL-2.0	', 'AFL 2.0	', 'AFL2.0	', 1),
(6, 'AFL-2.1	', 'Academic Free License v2.1	', 'AFL-2.1	', 'AFL 2.1	', 'AFL2.1	', 1),
(7, 'AFL-3.0', 'Academic Free License v3.0	', 'AFL-3.0', 'AFL 3.0', 'AFL3.0', 1),
(8, 'AMPAS	', 'Academy of Motion Picture Arts and Sciences BSD', 'AMPAS	', '', '', NULL),
(9, 'APL-1.0', 'Adaptive Public License 1.0	', 'APL-1.0', 'APL 1.0', 'APL1.0', 1),
(10, 'Adobe-Glyph', 'Adobe Glyph List License	', 'Adobe-Glyph', 'Adobe Glyph', 'AdobeGlyph', NULL),
(11, 'APAFML	', 'Adobe Postscript AFM License	', 'APAFML	', '', '', NULL),
(12, 'Adobe-2006	', 'Adobe Systems Incorporated Source Code License Agreement', 'Adobe-2006	', 'Adobe 2006	', 'Adobe2006	', NULL),
(13, 'AGPL-1.0	', 'Affero General Public License v1.0a', 'AGPL-1.0	', 'AGPL 1.0	', 'AGPL1.0	', NULL),
(14, 'Afmparse	', 'Afmparse License	', 'Afmparse	', '', '', NULL),
(15, 'Aladdin	', 'Aladdin Free Public License	', 'Aladdin	', '', '', NULL),
(16, 'ADSL', 'Amazon Digital Services License', 'ADSL', '', '', NULL),
(17, 'AMDPLPA	', 'AMD''s plpa_map.c License	', 'AMDPLPA	', '', '', NULL),
(18, 'ANTLR-PD', 'ANTLR Software Rights Notice', 'ANTLR-PD', 'ANTLR PD', 'ANTLRPD', NULL),
(19, 'Apache-1.0', 'Apache License 1.0', 'Apache-1.0', 'Apache 1.0', 'Apache1.0', NULL),
(20, 'Apache-1.1', 'Apache License 1.1', 'Apache-1.1', 'Apache 1.1', 'Apache1.1', 1),
(21, 'Apache-2.0', 'Apache License 2.0', 'Apache-2.0', 'Apache 2.0', 'Apache2.0', 1),
(22, 'AML', 'Apple MIT License', 'AML', '', '', NULL),
(23, 'APSL-1.0', 'Apple Public Source License 1.0', 'APSL-1.0', 'APSL 1.0', 'APSL1.0', 1),
(24, 'APSL-1.1', 'Apple Public Source License 1.1', 'APSL-1.1', 'APSL 1.1', 'APSL1.1', 1),
(25, 'APSL-1.2', 'Apple Public Source License 1.2', 'APSL-1.2', 'APSL 1.2', 'APSL1.2', 1),
(26, 'APSL-2.0', 'Apple Public Source License 2.0', 'APSL-2.0', 'APSL 2.0', 'APSL2.0', 1),
(27, 'Artistic-1.0', 'Artistic License 1.0', 'Artistic-1.0', 'Artistic 1.0', 'Artistic1.0', 1),
(28, 'Artistic-1.0-Perl', 'Artistic License 1.0 (Perl)', 'Artistic-1.0-Perl', 'Artistic 1.0 Perl', 'Artistic1.0Perl', 1),
(29, 'Artistic-1.0-cl8', 'Artistic License 1.0 w/clause 8', 'Artistic-1.0-cl8', 'Artistic 1.0 cl8', 'Artistic1.0cl8', 1),
(30, 'Artistic-2.0', 'Artistic License 2.0', 'Artistic-2.0', 'Artistic 2.0', 'Artistic2.0', 1),
(31, 'AAL', 'Attribution Assurance License', 'AAL', '', '', 1),
(32, 'Bahyph', 'Bahyph License', 'Bahyph', '', '', NULL),
(33, 'Barr', 'Barr License', 'Barr', '', '', NULL),
(34, 'Beerware', 'Beerware License', 'Beerware', '', '', NULL),
(35, 'BitTorrent-1.0', 'BitTorrent Open Source License v1.0', 'BitTorrent-1.0', 'BitTorrent 1.0', 'BitTorrent1.0', NULL),
(36, 'BitTorrent-1.1', 'BitTorrent Open Source License v1.1', 'BitTorrent-1.1', 'BitTorrent 1.1', 'BitTorrent1.1', NULL),
(37, 'BSL-1.0', 'Boost Software License 1.0', 'BSL-1.0', 'BSL 1.0', 'BSL1.0', NULL),
(38, 'Borceux', 'Borceux license', 'Borceux', '', '', NULL),
(39, 'BSD-2-Clause', 'BSD 2-clause "Simplified" License', 'BSD-2-Clause', 'BSD-2 Clause', 'BSD-2Clause', NULL),
(40, 'BSD-2-Clause-FreeBSD', 'BSD 2-clause FreeBSD License', 'BSD-2-Clause-FreeBSD', 'BSD-2 Clause FreeBSD', 'BSD-2ClauseFreeBSD', NULL),
(41, 'BSD-2-Clause-NetBSD', 'BSD 2-clause NetBSD License', 'BSD-2-Clause-NetBSD', 'BSD 2 Clause NetBSD', 'BSD2ClauseNetBSD', NULL),
(42, 'BSD-3-Clause', 'BSD 3-clause "New" or "Revised" License', 'BSD-3-Clause', 'BSD 3 Clause', 'BSD3Clause', NULL),
(43, 'BSD-3-Clause-Clear', 'BSD 3-clause Clear License', 'BSD-3-Clause-Clear', 'BSD 3 Clause Clear', 'BSD3ClauseClear', NULL),
(44, 'BSD-4-Clause', 'BSD 4-clause "Original" or "Old" License', 'BSD-4-Clause', 'BSD 4 Clause', 'BSD4Clause', NULL),
(45, 'BSD-Protection', 'BSD Protection License', 'BSD-Protection', 'BSD Protection', 'BSDProtection', NULL),
(46, 'BSD-3-Clause-Attribution', 'BSD with attribution', 'BSD-3-Clause-Attribution', 'BSD 3 Clause Attribution', 'BSD3ClauseAttribution', NULL),
(47, 'BSD-4-Clause-UC', 'BSD-4-Clause (University of California-Specific', 'BSD-4-Clause-UC', 'BSD 4 Clause UC', 'BSD4ClauseUC', NULL),
(48, 'bzip2-1.0.5', 'bzip2 and libbzip2 License v1.0.5', 'bzip2-1.0.5', 'bzip2 1.0.5', 'bzip21.0.5', NULL),
(49, 'bzip2-1.0.6', 'bzip2 and libbzip2 License v1.0.6', 'bzip2-1.0.6', 'bzip2 1.0.6', 'bzip21.0.6', NULL),
(50, 'Caldera', 'Caldera License', 'Caldera', '', '', NULL),
(51, 'CECILL-1.0', 'CeCILL Free Software License Agreement v1.0', 'CECILL-1.0', 'CECILL 1.0', 'CECILL1.0', NULL),
(52, 'CECILL-1.1', 'CeCILL Free Software License Agreement v1.1', 'CECILL-1.1', 'CECILL 1.1', 'CECILL1.1', NULL),
(53, 'CECILL-2.0', 'CeCILL Free Software License Agreement v2.0', 'CECILL-2.0', 'CECILL 2.0', 'CECILL2.0', NULL),
(54, 'CECILL-B', 'CeCILL-B Free Software License Agreement', 'CECILL-B', 'CECILL B', 'CECILLB', NULL),
(55, 'CECILL-C', 'CeCILL-C Free Software License Agreement', 'CECILL-C', 'CECILL C', 'CECILLC', NULL),
(56, 'ClArtistic', 'Clarified Artistic License', 'ClArtistic', 'Clartistic', '', NULL),
(57, 'MIT-CMU', 'CMU License', 'MIT-CMU', 'MIT CMU', 'MITCMU', NULL),
(58, 'CNRI-Python', 'CNRI Python License', 'CNRI-Python', 'CNRI Python', 'CNRIPython', 1),
(59, 'CNRI-Python-GPL-Compatible', 'CNRI Python Open Source GPL Compatible License Agreement', 'CNRI-Python-GPL-Compatible', 'CNRI Python GPL Compatible', 'CNRIPythonGPLCompatible', NULL),
(60, 'CPOL-1.02', 'Code Project Open License 1.02', 'CPOL-1.02', 'CPOL 1.02', 'CPOL1.02', NULL),
(61, 'CDDL-1.0', 'Common Development and Distribution License 1.0', 'CDDL-1.0', 'CDDL 1.0', 'CDDL1.0', 1),
(62, 'CDDL-1.1', 'Common Development and Distribution License 1.1', 'CDDL-1.1', 'CDDL 1.1', 'CDDL1.1', NULL),
(63, 'CPAL-1.0', 'Common Public Attribution License 1.0', 'CPAL-1.0', 'CPAL 1.0', 'CPAL1.0', 1),
(64, 'CPL-1.0', 'Common Public License 1.0', 'CPL-1.0', 'CPL 1.0', 'CPL1.0', 1),
(65, 'CATOSL-1.1', 'Computer Associates Trusted Open Source License 1.1', 'CATOSL-1.1', 'CATOSL 1.1', 'CATOSL1.1', 1),
(66, 'Condor-1.1', 'Condor Public License v1.1', 'Condor-1.1', 'Condor 1.1', 'Condor1.1', NULL),
(67, 'CC-BY-1.0', 'Creative Commons Attribution 1.0', 'CC-BY-1.0', 'CC-BY 1.0', 'CC-BY1.0', NULL),
(68, 'CC-BY-2.0', 'Creative Commons Attribution 2.0', 'CC-BY-2.0', 'CC BY 2.0', 'CCBY2.0', NULL),
(69, 'CC-BY-2.5', 'Creative Commons Attribution 2.5', 'CC-BY-2.5', 'CC BY 2.5', 'CCBY2.5', NULL),
(70, 'CC-BY-3.0', 'Creative Commons Attribution 3.0', 'CC-BY-3.0', 'CC BY 3.0', 'CCBY3.0', NULL),
(71, 'CC-BY-4.0', 'Creative Commons Attribution 4.0', 'CC-BY-4.0', 'CC BY 4.0', 'CCBY4.0', NULL),
(72, 'CC-BY-ND-1.0', 'Creative Commons Attribution No Derivatives 1.0', 'CC-BY-ND-1.0', 'CC BY ND 1.0', 'CCBYND1.0', NULL),
(73, 'CC-BY-ND-2.0', 'Creative Commons Attribution No Derivatives 2.0', 'CC-BY-ND-2.0', 'CC BY ND 2.0', 'CCBYND2.0', NULL),
(74, 'CC-BY-ND-2.5', 'Creative Commons Attribution No Derivatives 2.5', 'CC-BY-ND-2.5', 'CC BY ND 2.5', 'CCBYND2.5', NULL),
(75, 'CC-BY-ND-3.0', 'Creative Commons Attribution No Derivatives 3.0', 'CC-BY-ND-3.0', 'CC BY ND 3.0', 'CCBYND3.0', NULL),
(76, 'CC-BY-ND-4.0', 'Creative Commons Attribution No Derivatives 4.0', 'CC-BY-ND-4.0', 'CC BY ND 4.0', 'CCBYND4.0', NULL),
(77, 'CC-BY-NC-1.0', 'Creative Commons Attribution Non Commercial 1.0', 'CC-BY-NC-1.0', 'CC BY NC 1.0', 'CCBYNC1.0', NULL),
(78, 'CC-BY-NC-2.0', 'Creative Commons Attribution Non Commercial 2.0', 'CC-BY-NC-2.0', 'CC BY NC 2.0', 'CCBYNC2.0', NULL),
(79, 'CC-BY-NC-2.5', 'Creative Commons Attribution Non Commercial 2.5', 'CC-BY-NC-2.5', 'CC BY NC 2.5', 'CCBYNC2.5', NULL),
(80, 'CC-BY-NC-3.0', 'Creative Commons Attribution Non Commercial 3.0', 'CC-BY-NC-3.0', 'CC BY NC 3.0', 'CCBYNC3.0', NULL),
(81, 'CC-BY-NC-4.0', 'Creative Commons Attribution Non Commercial 4.0', 'CC-BY-NC-4.0', 'CC BY NC 4.0', 'CCBYNC4.0', NULL),
(82, 'CC-BY-NC-ND-1.0', 'Creative Commons Attribution Non Commercial No Derivatives 1.0', 'CC-BY-NC-ND-1.0', 'CC BY NC ND 1.0', 'CCBYNCND1.0', NULL),
(83, 'CC-BY-NC-ND-2.0', 'Creative Commons Attribution Non Commercial No Derivatives 2.0', 'CC-BY-NC-ND-2.0', 'CC BY NC ND 2.0', 'CCBYNCND2.0', NULL),
(84, 'CC-BY-NC-ND-2.5', 'Creative Commons Attribution Non Commercial No Derivatives 2.5', 'CC-BY-NC-ND-2.5', 'CC BY NC ND 2.5', 'CCBYNCND2.5', NULL),
(85, 'CC-BY-NC-ND-3.0', 'Creative Commons Attribution Non Commercial No Derivatives 3.0', 'CC-BY-NC-ND-3.0', 'CC BY NC ND 3.0', 'CCBYNCND3.0', NULL),
(86, 'CC-BY-NC-ND-4.0', 'Creative Commons Attribution Non Commercial No Derivatives 4.0', 'CC-BY-NC-ND-4.0', 'CC BY NC ND 4.0', 'CCBYNCND4.0', NULL),
(87, 'CC-BY-NC-SA-1.0', 'Creative Commons Attribution Non Commercial Share Alike 1.0', 'CC-BY-NC-SA-1.0', 'CC BY NC SA 1.0', 'CCBYNCSA1.0', NULL),
(88, 'CC-BY-NC-SA-2.0', 'Creative Commons Attribution Non Commercial Share Alike 2.0', 'CC-BY-NC-SA-2.0', 'CC BY NC SA 2.0', 'CCBYNCSA2.0', NULL),
(89, 'CC-BY-NC-SA-2.5', 'Creative Commons Attribution Non Commercial Share Alike 2.5', 'CC-BY-NC-SA-2.5', 'CC BY NC SA 2.5', 'CCBYNCSA2.5', NULL),
(90, 'CC-BY-NC-SA-3.0', 'Creative Commons Attribution Non Commercial Share Alike 3.0', 'CC-BY-NC-SA-3.0', 'CC BY NC SA 3.0', 'CCBYNCSA3.0', NULL),
(91, 'CC-BY-NC-SA-4.0', 'Creative Commons Attribution Non Commercial Share Alike 4.0', 'CC-BY-NC-SA-4.0', 'CC BY NC SA 4.0', 'CCBYNCSA4.0', NULL),
(92, 'CC-BY-SA-1.0', 'Creative Commons Attribution Share Alike 1.0', 'CC-BY-SA-1.0', 'CC BY SA 1.0', 'CCBYSA1.0', NULL),
(93, 'CC-BY-SA-2.0', 'Creative Commons Attribution Share Alike 2.0', 'CC-BY-SA-2.0', 'CC BY SA 2.0', 'CCBYSA2.0', NULL),
(94, 'CC-BY-SA-2.5', 'Creative Commons Attribution Share Alike 2.5', 'CC-BY-SA-2.5', 'CC BY SA 2.5', 'CCBYSA2.5', NULL),
(95, 'CC-BY-SA-3.0', 'Creative Commons Attribution Share Alike 3.0', 'CC-BY-SA-3.0', 'CC BY SA 3.0', 'CCBYSA3.0', NULL),
(96, 'CC-BY-SA-4.0', 'Creative Commons Attribution Share Alike 4.0', 'CC-BY-SA-4.0', 'CC BY SA 4.0', 'CCBYSA4.0', NULL),
(97, 'CC0-1.0', 'Creative Commons Zero v1.0 Universal', 'CC0-1.0', 'CC0 1.0', 'CC01.0', NULL),
(98, 'Crossword', 'Crossword License', 'Crossword', '', '', NULL),
(99, 'CUA-OPL-1.0', 'CUA Office Public License v1.0', 'CUA-OPL-1.0', 'CUA OPL 1.0', 'CUAOPL1.0', 1),
(100, 'Cube', 'Cube License', 'Cube', '', '', NULL),
(101, 'D-FSL-1.0', 'Deutsche Freie Software Lizenz', 'D-FSL-1.0', 'DFSL 1.0', 'DFSL1.0', NULL),
(102, 'diffmark', 'diffmark license', 'diffmark', '', '', NULL),
(103, 'WTFPL', 'Do What The F*ck You Want To Public License', 'WTFPL', '', '', NULL),
(104, 'DOC', 'DOC License', 'DOC', '', '', NULL),
(105, 'Dotseqn', 'Dotseqn License', 'Dotseqn', '', '', NULL),
(106, 'DSDP', 'DSDP License', 'DSDP', '', '', NULL),
(107, 'dvipdfm', 'dvipdfm License', 'dvipdfm', '', '', NULL),
(108, 'EPL-1.0', 'Eclipse Public License 1.0', 'EPL-1.0', 'EPL 1.0', 'EPL1.0', 1),
(109, 'eCos-2.0', 'eCos license version 2.0', 'eCos-2.0', 'eCos 2.0', 'eCos2.0', NULL),
(110, 'ECL-1.0', 'Educational Community License v1.0', 'ECL-1.0', 'ECL 1.0', 'ECL1.0', 1),
(111, 'ECL-2.0', 'Educational Community License v2.0', 'ECL-2.0', 'ECL 2.0', 'ECL2.0', 1),
(112, 'eGenix', 'eGenix.com Public License 1.1.0', 'eGenix', '', '', NULL),
(113, 'EFL-1.0', 'Eiffel Forum License v1.0', 'EFL-1.0', 'EFL 1.0', 'EFL1.0', 1),
(114, 'EFL-2.0', 'Eiffel Forum License v2.0', 'EFL-2.0', 'EFL 2.0', 'EFL2.0', 1),
(115, 'MIT-advertising', 'Enlightenment License (e16)', 'MIT-advertising', 'MIT advertising', 'MIT advertising', NULL),
(116, 'MIT-enna', 'enna License', 'MIT-enna', 'MIT enna', 'MITenna', NULL),
(117, 'Entessa', 'Entessa Public License v1.0', 'Entessa', '', '', 1),
(118, 'ErlPL-1.1', 'Erlang Public License v1.1', 'ErlPL-1.1', 'ErlPL 1.1', 'ErlPL1.1', NULL),
(119, 'EUDatagrid', 'EU DataGrid Software License', 'EUDatagrid', '', '', 1),
(120, 'EUPL-1.0', 'European Union Public License 1.0', 'EUPL-1.0', 'EUPL 1.0', 'EUPL1.0', NULL),
(121, 'EUPL-1.1', 'European Union Public License 1.1', 'EUPL-1.1', 'EUPL 1.1', 'EUPL1.1', 1),
(122, 'Eurosym', 'Eurosym License', 'Eurosym', '', '', NULL),
(123, 'Fair', 'Fair License', 'Fair', '', '', 1),
(124, 'MIT-feh', 'feh License', 'MIT-feh', 'MIT feh', 'MITfeh', NULL),
(125, 'Frameworx-1.0', 'Frameworx Open License 1.0', 'Frameworx-1.0', 'Frameworx 1.0', 'Frameworx1.0', 1),
(126, 'FTL', 'Freetype Project License', 'FTL', '', '', NULL),
(127, 'FSFUL', 'FSF Unlimited License', 'FSFUL', '', '', NULL),
(128, 'FSFULLR', 'FSF Unlimited License (with License Retention)', 'FSFULLR', '', '', NULL),
(129, 'Giftware', 'Giftware License', 'Giftware', '', '', NULL),
(130, 'GL2PS', 'GL2PS License', 'GL2PS', '', '', NULL),
(131, 'Glulxe', 'Glulxe License', 'Glulxe', '', '', NULL),
(132, 'AGPL-3.0', 'GNU Affero General Public License v3.0', 'AGPL-3.0', 'AGPL 3.0', 'AGPL3.0', 1),
(133, 'GFDL-1.1', 'GNU Free Documentation License v1.1', 'GFDL-1.1', 'GFDL 1.1', 'GFDL1.1', NULL),
(134, 'GFDL-1.2', 'GNU Free Documentation License v1.2', 'GFDL-1.2', 'GFDL 1.2', 'GFDL1.2', NULL),
(135, 'GFDL-1.3', 'GNU Free Documentation License v1.3', 'GFDL-1.3', 'GFDL 1.3', 'GFDL1.3', NULL),
(136, 'GPL-1.0', 'GNU General Public License v1.0 only', 'GPL-1.0', 'GPL 1.0', 'GPL1.0', NULL),
(137, 'GPL-1.0+', 'GNU General Public License v1.0 or later', 'GPL-1.0+', 'GPL 1.0+', 'GPL1.0+', NULL),
(138, 'GPL-2.0', 'GNU General Public License v2.0 only', 'GPL-2.0', 'GPL 2.0', 'GPL2.0', 1),
(139, 'GPL-2.0+', 'GNU General Public License v2.0 or later', 'GPL-2.0+', 'GPL 2.0+', 'GPL2.0+', 1),
(140, 'GPL-2.0-with-autoconf-exceptio', 'GNU General Public License v2.0 Autoconf exception', 'GPL-2.0-with-autoconf-exceptio', 'GPL 2.0 with autoconf exceptio', 'GPL2.0withautoconfexception', 1),
(141, 'GPL-2.0-with-bison-exception', 'GNU General Public License v2.0 Bison exception', 'GPL-2.0-with-bison-exception', 'GPL 2.0 with bison exception', 'GPL2.0withbisonexception', 1),
(142, 'GPL-2.0-with-classpath-excepti', 'GNU General Public License v2.0 Classpath exception', 'GPL-2.0-with-classpath-excepti', 'GPL 2.0 with classpath excepti', 'GPL2.0withclasspathexception', 1),
(143, 'GPL-2.0-with-font-exception', 'GNU General Public License v2.0 Font exception', 'GPL-2.0-with-font-exception', 'GPL 2.0 with font exception', 'GPL2.0withfontexception', 1),
(144, 'GPL-2.0-with-GCC-exception', 'GNU General Public License v2.0 GCC Runtime Library exception', 'GPL-2.0-with-GCC-exception', 'GPL 2.0 with GCC exception', 'GPL2.0withGCCexception', 1),
(145, 'GPL-3.0', 'GNU General Public License v3.0 only', 'GPL-3.0', 'GPL 3.0', 'GPL3.0', 1),
(146, 'GPL-3.0+', 'GNU General Public License v3.0 or later', 'GPL-3.0+', 'GPL 3.0+', 'GPL3.0+', 1),
(147, 'GPL-3.0-with-autoconf-exceptio', 'GNU General Public License v3.0 Autoconf exception', 'GPL-3.0-with-autoconf-exceptio', 'GPL 3.0 with autoconf exceptio', 'GPL3.0withautoconfexception', 1),
(148, 'GPL-3.0-with-GCC-exception', 'GNU General Public License v3.0 GCC Runtime Library exception', 'GPL-3.0-with-GCC-exception', 'GPL 3.0 with GCC exception', 'GPL3.0withGCCexception', 1),
(149, 'LGPL-2.1', 'GNU Lesser General Public License v2.1 only', 'LGPL-2.1', 'LGPL 2.1', 'LGPL2.1', 1),
(150, 'LGPL-2.1+', 'GNU Lesser General Public License v2.1 or later', 'LGPL-2.1+', 'LGPL 2.1+', 'LGPL2.1+', 1),
(151, 'LGPL-3.0', 'GNU Lesser General Public Licesne v3.0 only', 'LGPL-3.0', 'LGPL 3.0', 'LGPL3.0', 1),
(152, 'LGPL-3.0+', 'GNU Lesser General Public Licesne v3.0 or later', 'LGPL-3.0+', 'LGPL 3.0+', 'LGPL3.0+', 1),
(153, 'LGPL-2.0', 'GNU Lesser General Public Licesne v2 only', 'LGPL-2.0', 'LGPL 2.0', 'LGPL2.0', 1),
(154, 'LGPL-2.0+', 'GNU Lesser General Public Licesne v2 or later', 'LGPL-2.0+', 'LGPL 2.0+', 'LPGL2.0+', 1),
(155, 'gnuplot', 'gnuplot License', 'gnuplot', '', '', NULL),
(156, 'gSOAP-1.3b', 'gSOAP public License v1.3b', 'gSOAP-1.3b', 'gSOAP 1.3b', 'gSOAP1.3b', NULL),
(157, 'HaskellReport', 'Haskell Language Report License', 'HaskellReport', 'Haskellreport', 'Haskell report', NULL),
(158, 'HPND', 'Historic Permission Notice and Disclaimer', 'HPND', '', '', 1),
(159, 'IBM-pibs', 'IBM PowerPC Initialization and Boot Software', 'IBM-pibs', 'IBMpids', 'IBM pibs', NULL),
(160, 'IPL-1.0', 'IDM Public License v1.0', 'IPL-1.0', 'IPL 1.0', 'IPL1.0', 1),
(161, 'ImageMagick', 'ImageMagick License', 'ImageMagick', 'Imagemagick', '', NULL),
(162, 'iMatrix', 'iMatrix Standard Function Library Agreement', 'iMatrix', '', '', NULL),
(163, 'Imlib2', 'Imlib2 License', 'Imlib2', '', '', NULL),
(164, 'IJG', 'Independent JPEG Group License', 'IJG', '', '', NULL),
(165, 'Intel-ACPI', 'Intel ACPI Software License Agreement', 'Intel-ACPI', 'IntelACPI', 'Intel ACPI', NULL),
(166, 'Intel', 'Intel Open Source License', 'Intel', '', '', 1),
(167, 'IPA', 'IPA Font License', 'IPA', '', '', 1),
(168, 'ISC', 'ISC License', 'ISC', '', '', 1),
(169, 'JasPer-2.0', 'JasPer License', 'JasPer-2.0', 'JasPer2.0', 'JasPer 2.0', NULL),
(170, 'JSON ', 'JSON License', 'JSON', '', '', NULL),
(171, 'LPPL-1.3a', 'LaTeX Project Public License 1.3a', 'LPPL-1.3a', 'LPPL1.3a', 'LPPL 1.3a', NULL),
(172, 'LPPL-1.0', 'LaTeX Project Public License v1.0', 'LPPL-1.0', 'LPPL 1.0', 'LPPL1.0', NULL),
(173, 'LPPL-1.1', 'LaTeX Project Public License v1.1', 'LPPL-1.1', 'LPPL 1.1', 'LPPL1.1', NULL),
(174, 'LPPL-1.2', 'LaTeX Project Public License v1.2', 'LPPL-1.2', 'LPPL1.2', 'LPPL 1.2', NULL),
(175, 'LPPL-1.3c', 'LaTeX Project Public License v1.3c', 'LPPL-1.3c', 'LPPL1.3c', 'LPPL 1.3c', 1),
(176, 'Latex2e', 'Latex2eLicense', 'Latex2e', '', '', NULL),
(177, 'BSD-3-Clause-LBNL', 'Lawrence Berkeley National Labs BSD Variant License', 'BSD-3-Clause-LBNL', 'BSD-LBNL', 'BSD 3 Clause LBNL', NULL),
(178, 'Leptonica', 'Leptonica License', 'Leptonica', '', '', NULL),
(179, 'Libpng', 'libpng License', 'Libpng', '', '', NULL),
(180, 'libtiff', 'libtiff License', 'libtiff', '', '', NULL),
(181, 'LPL-1.02', 'Lucent Public License v1.02', 'LPL-1.02', 'LPL1.02', 'LPL 1.02', 1),
(182, 'LPL-1.0', 'Lucent Public License 1.0', 'LPL-1.0', 'LPL1.0', 'LPL 1.0', 1),
(183, 'MakeIndex', 'MakeIndex License', 'MakeIndex', '', '', NULL),
(184, 'MTLL', 'Matrix Template Library License', 'MTLL', '', '', NULL),
(185, 'MS-PL', 'Microsoft Public License', 'MS-PL', 'MSPL', 'MS PL', 1),
(186, 'MS-RL', 'Microsoft Reciprocal License', 'MS-RL', 'MSRL', 'MS RL', 1),
(187, 'MirOS', 'MirOS License', 'MirOS', '', '', 1),
(188, 'MITNFA', 'MIT+no-false-attribs license', 'MITNFA', '', '', NULL),
(189, 'MIT', 'MIT License\r\n', 'MIT', '', '', 1),
(190, 'Motosoto', 'Motosoto License', 'Motosoto', '', '', 1),
(191, 'MPL-1.0', 'Mozilla Public License 1.0', 'MPL-1.0', 'MPL 1.0', 'MPL1.0', 1),
(192, 'MPL-1.1', 'Mozilla Public License 1.1', 'MPL-1.1', 'MPL1.1', 'MPL 1.1', 1),
(193, 'MPL-2.0', 'Mozilla Public License 2.0', 'MPL-2.0', 'MPL2.0', 'MPL 2.0', 1),
(194, 'MPL-2.0-no-copy-exception', 'Mozilla Public Licese 2.0(no copyleft exception)', 'MPL-2.0-no-copy-exception', 'MPL2.0nocopyexception', 'MPL 2.0 no copy exception', 1),
(195, 'mpich2', 'mpich2 License', 'mpich2', '', '', NULL),
(196, 'Multics', 'Multics License', 'Multics', '', '', 1),
(197, 'Mup', 'Mup License', 'Mup', '', '', NULL),
(198, 'NASA-1.3', 'NASA Open Source Agreement 1.3', 'NASA-1.3', 'NASA 1.3', 'NASA1.3', 1),
(199, 'Naumen', 'Naumen Public License', 'Naumen', '', '', 1),
(200, 'NBPL-1.0', 'Net Boolean Public License v1', 'NBPL-1.0', 'NBPL 1.0', 'NBPL1.0', NULL),
(201, 'NetCDF', 'NetCDF license', 'NetCDF', 'Net CDF', '', NULL),
(202, 'NGPL', 'Nethack General Public License', 'NGPL', '', '', 1),
(203, 'NOSL', 'Netizen Open Source License', 'NOSL', '', '', NULL),
(204, 'NPL-1.0', 'Netscape Public License v1.0', 'NPL-1.0', 'NPL1.0', 'NPL 1.0', NULL),
(205, 'NPL-1.1', 'Netscape Public License v1.1', 'NPL-1.1', 'NPL 1.1', 'NPL1.1', NULL),
(206, 'Newsletr', 'Newsletr License', 'Newsletr', '', '', NULL),
(207, 'NLPL', 'No Limit Public License', 'NLPL', '', '', NULL),
(208, 'Nokia ', 'Nokia Open Source License', 'Nokia', '', '', 1),
(209, 'NPOSL-3.0', 'Non-Profit Open Software License 3.0', 'NPOSL-3.0', 'NPOSL 3.0', 'NPOSL3.0', 1),
(210, 'Noweb', 'Noweb License', 'Noweb', '', '', NULL),
(211, 'NRL', 'NRL Licese', 'NRL', '', '', NULL),
(212, 'NTP ', 'NTP License', 'NTP', '', '', 1),
(213, 'Nunit ', 'Nunit License', 'Nunit', '', '', NULL),
(214, 'OCLC-2.0', 'OCLC Research Public License 2.0', 'OCLC-2.0', 'OCLC2.0', 'OCLC 2.0', 1),
(215, 'ODbL-1.0', 'ODC Open Database License v1.0', 'ODbL-1.0', 'ODbL1.0', 'ODbL 1.0', NULL),
(216, 'PDDL-1.0', 'ODC Public Domain Dedication & License 1.0', 'PDDL-1.0', 'PDDL 1.0', 'PDDL-1.0', NULL),
(217, 'OGTSL', 'Open Group Test Suite License', 'OGTSL', '', '', 1),
(218, 'OLDAP-2.2.2', 'Open LDAP Public License 2.2.2', 'OLDAP-2.2.2', 'OLDAP2.2.2', 'OLDAP 2.2.2', NULL),
(219, 'OLDAP-1.1', 'Open LDAP Public License v1.1', 'OLDAP-1.1', 'OLDAP 1.1', 'OLDAP1.1', NULL),
(220, 'OLDAP-1.2', 'Open LDAP Public License v1.2', 'OLDAP-1.2', 'OLDAP1.2', 'OLDAP 1.2', NULL),
(221, 'OLDAP-1.3', 'Open LDAP Public License v1.3', 'OLDAP-1.3', 'OLDAP1.3', 'OLDAP 1.3', NULL),
(222, 'OLDAP-1.4', 'Open LDAP Public License v1.4', 'OLDAP-1.4', 'OLDAP 1.4', 'OLDAP1.4', NULL),
(223, 'OLDAP-2.0', 'Open LDAP Public License v2.09or possibility 2.0A and 2.0B)', 'OLDAP-2.0', 'OLDAP 2.0', 'OLDAP2.0', NULL),
(224, 'OLDAP-2.0.1', 'Open LDAP Public License v2.0.1', 'OLDAP-2.01', 'OLDAP2.01', 'OLDAP 2.01', NULL),
(225, 'OLDAP-2.1 ', 'Open LDAP Public License v2.1', 'OLDAP-2.1', 'OLDAP 2.1', 'OLDAP2.1', NULL),
(226, 'OLDAP-2.2', 'Open LDAP Public License v2.2', 'OLDAP-2.2', 'OLDAP2.2', 'OLDAP 2.2', NULL),
(227, 'OLDAP-2.2.1', 'Open LDAP Public License v2.2.1', 'OLDAP-2.2.1', 'OLDAP 2.2.1', 'OLDAP2.2.1', NULL),
(228, 'OLDAP-2.3', 'Open LDAP Public License v2.3', 'OLDAP-2.3', 'OLDAP2.3', 'OLDAP 2.3', NULL),
(229, 'OLDAP-2.4', 'Open LDAP Public License v2.4', 'OLDAP-2.4', 'OLDAP2.4', 'OLDAP 2.4', NULL),
(230, 'OLDAP-2.5', 'Open LDAP Public License v2.5', 'OLDAP-2.5', 'OLDAP2.5', 'OLDAP 2.5', NULL),
(231, 'OLDAP-2.6', 'Open LDAP Public License v2.6', 'OLDAP-2.6', 'OLDAP 2.6', 'OLDAP2.6', NULL),
(232, 'OLDAP-2.7', 'Open LDAP Public License v2.7', 'OLDAP-2.7', 'OLDAP 2.7', 'OLDAP2.7', NULL),
(233, 'OML', 'Open Market License', 'OML', '', '', NULL),
(234, 'OPL-1.0', 'Open Public License v1.0', 'OPL-1.0', 'OPL 1.0', 'OPL1.0', NULL),
(235, 'OSL-1.0', 'Open Software License 1.0', 'OSL-1.0', 'OSL 1.0', 'OSL1.0', 1),
(236, 'OSL-1.1', 'Open Software License 1.1', 'OSL-1.1', 'OSL 1.1', 'OSL1.1', NULL),
(237, 'OSL-2.0', 'Open Software License 2.0', 'OSL-2.0', 'OSL 2.0', 'OSL2.0', 1),
(238, 'OSL-2.1', 'Open Software License 2.1', 'OSL-2.1', 'OSL 2.1', 'OSL2.1', 1),
(239, 'OSL-3.0', 'Open Software License 3.0', 'OSL-3.0', 'OSL 3.0', 'OSL3.0', 1),
(240, 'OLDAP-2.8', 'OpenLDAP Public License v2.8', 'OLDAP-2.8', 'OLDAP 2.8', 'OLDAP2.8', NULL),
(241, 'OpenSSL', 'OpenSSL License', 'OpenSSL', '', '', NULL),
(242, 'PHP-3.0', 'PHP License v3.0', 'PHP-3.0', 'PHP 3.0', 'PHP3.0', 1),
(243, 'PHP-3.01', 'PHP License v3.01', 'PHP-3.01', 'PHP 3.01', 'PHP3.01', NULL),
(244, 'Plexus', 'Plexus Classworlds License', 'Plexus', '', '', NULL),
(245, 'PostgreSQL', 'PostgreSQL License', 'PostgreSQL', '', '', 1),
(246, 'psfrag', 'psfrag License', 'psfrag', '', '', NULL),
(247, 'psutils', 'psutils License', 'psutils', '', '', NULL),
(248, 'Python-2.0', 'Python License 2.0', 'Python-2.0', 'Python2.0', 'Python 2.0', 1),
(249, 'QPL-1.0', 'Q Public License 1.0 ', 'QPL-1.0', 'QPL 1.0', 'QPL1.0', 1),
(250, 'Qhull', 'Qhull License', 'Qhull', '', '', NULL),
(251, 'Rdisc', 'Rdisc License', 'Rdisc', '', '', NULL),
(252, 'RPSL-1.0', 'RealNetwork Public Source License v1.0', 'RPSL-1.0', 'RPSL 1.0', 'RPSL1.0', 1),
(253, 'RPL-1.1', 'Reciprocal Public License 1.1', 'RPL-1.1', 'RPL 1.1', 'RPL1.1', 1),
(254, 'RPL-1.5', 'Reciprocal Public License 1.5', 'RPL-1.5', 'RPL 1.5', 'RPL1.5', 1),
(255, 'RHeCos-1.1', 'Red Hat eCos Public License v1.1', 'RHeCos-1.1', 'RHeCos 1.1', 'RHeCos1.1', NULL),
(256, 'RSCPL', 'Ricoh Source Code Public License', 'RSCPL', '', '', 1),
(257, 'Ruby', 'Ruby License', '', '', '', NULL),
(258, 'SAX-PD', 'Sax Public Domain Notice', 'SAX-PD', 'SAX PD', 'SAXPD', NULL),
(259, 'Saxpath', 'Saxpath License', '', '', '', NULL),
(260, 'SCEA', 'SCEA Shared Source license', 'SCEA', '', '', NULL),
(261, 'SWL', 'Scheme Widget Library (SWL) Software License Agreement', 'SWL', '', '', NULL),
(262, 'SGI-B-1.0', 'SGI Free Software License B v1.0', 'SGI-B-1.0', 'SGIB1.0', 'SGI B 1.0', NULL),
(263, 'SGI-B-1.0', 'SGI Free Software License B v1.1', 'SGI-B-1.1', 'SGIB1.1', 'SGI B 1.1', NULL),
(264, 'SGI-B-2.0', 'SGI Free Software License B v2.0', 'SGI-B-2.0', 'SGI B 2.0', 'SGIB2.0', NULL),
(265, 'OFL-1.0', 'SIL Open Font License 1.0', 'OFL-1.0', 'OFL 1.0', 'OFL1.0', NULL),
(266, 'OFL-1.1', 'SIL Open Font License 1.1', 'OFL-1.1', 'OFL 1.1', 'OFL1.1', 1),
(267, 'SimPL-2.0', 'Simple Public License 2.0', 'SimPL-2.0', 'SimPL 2.0', 'SimPL2.0', 1),
(268, 'Sleepycat', 'Sleepycat License', 'Sleepycat', '', '', 1),
(269, 'SNIA', 'SNIA Public License ', 'SNIA', '', '', NULL),
(270, 'SMLNJ', 'Standard ML of New Jersey License', 'SMLNJ', '', '', NULL),
(271, 'StandardML-NJ', 'Standard ML of New Jersey License', 'StandardML-NJ', 'StandardMLNJ', 'StandardML NJ', NULL),
(272, 'SugarCRM-1.1.3', 'SugarCRM Public License v1.1.3', 'SugarCRM-1.1.3', 'SugarCRM 1.1.3', 'SugarCRM1.1.3', NULL),
(273, 'SISSL', 'Sun Industry Standards Source License v1.1', 'SISSL', '', '', 1),
(274, 'SISSL-1.2', 'Sun Industry Standards Source License v1.2', 'SISSL-1.2', 'SISSL 1.2', 'SISSL1.2', NULL),
(275, 'SPL-1.0', 'Sun Public License v1.0', 'SPL-1.0', 'SPL 1.0', 'SPL1.0', 1),
(276, 'Watcom-1.0', 'Sybase Open Watcom Public License 1.0', 'Watcom-1.0', 'Watcom 1.0', 'Watcom1.0', 1),
(277, 'TCL', 'TCL/TK License', 'TCL', '', '', NULL),
(278, 'Unlicense', 'The Unlicense', 'Unlicense', '', '', NULL),
(279, 'TMate', 'TMate Open Source License', 'TMate', '', '', NULL),
(280, 'TORQUE-1.1', 'TORQUE v2.5+ Software License v1.1', 'TORQUE-1.1', 'TORQUE 1.1', 'TORQUE1.1', NULL),
(281, 'TOSL', 'Trusster Open Source License', 'TOSL', '', '', NULL),
(282, 'Unicode-TOU', 'Unicode Terms of Use', 'Unicode-TOU', 'Unicode TOU', 'UnicodeTOU', NULL),
(283, 'NCSA', 'University of Illinois/NCSA Open Source License', 'NCSA', '', '', 1),
(284, 'Vim', 'Vim License', 'Vim', '', '', NULL),
(285, 'VOSTROM', 'VOSTROM Public License for Open Source', 'VOSTROM', '', '', NULL),
(286, 'VSL-1.0', 'Vovida Software License v1.0', 'VSL-1.0', 'VSL1.0', 'VSL 1.0', 1),
(287, 'W3C', 'W3C Software Notice and License', 'W3C', '', '', 1),
(288, 'Wsuipa', 'Wsuipa License', 'Wsuipa', '', '', NULL),
(289, 'WXwindows', 'wxWindows Library License', 'WXwindows', '', '', 1),
(290, 'Xnet', 'X.Net License', 'Xnet', '', '', 1),
(291, 'X11', 'X11 License', 'X11', '', '', NULL),
(292, 'Xerox', 'Xerox License', 'Xerox', '', '', NULL),
(293, 'XFree86-1.1', 'XFree86 License 1.1', 'XFree86-1.1', 'XFree86 1.1', 'XFree861.1', NULL),
(294, 'xinetd', 'xinetd License', 'xinetd', '', '', NULL),
(295, 'xpp', 'XPP License', 'xpp', '', '', NULL),
(296, 'XSkat', 'XSkat License', 'XSkat', '', '', NULL),
(297, 'YPL-1.0', 'Yahoo! Public License v1.0', 'YPL-1.0', 'YPL 1.0', 'YPL1.0', NULL),
(298, 'YPL-1.1', 'Yahoo! Public License v1.1', 'YPL-1.1', 'YPL 1.1', 'YPL1.1', NULL),
(299, 'Zed', 'Zed License', 'Zed', '', '', NULL),
(300, 'Zend-2.0', 'Zend License v2.0', 'Zend-2.0', 'Zend 2.0', 'Zend2.0', NULL),
(301, 'Zimbra-1.3', 'Zimbra Public License v1.3', 'Zimbra-1.3', 'Zimbra 1.3', 'Zimbra1.3', NULL),
(302, 'Zlib', 'zlib License', 'Zlib', '', '', 1),
(303, 'zlib-acknowledgement', 'zlib/libpng License with Acknowledgement', 'zlib-acknowledgement', '', '', NULL),
(304, 'ZPL-1.1', 'Zope Public License 1.1', 'ZPL-1.1', 'ZPL 1.1', 'ZPL1.1', NULL),
(305, 'ZPL-2.0', 'Zope Public License 2.0', 'ZPL-2.0', 'ZPL 2.0', 'ZPL2.0', 1),
(306, 'ZPL-2.1', 'Zope Public License 2.1', 'ZPL-2.1', 'ZPL 2.1', 'ZPL2.1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spdx_package_info`
--

CREATE TABLE IF NOT EXISTS `spdx_package_info` (
  `package_info_pk` int(11) NOT NULL DEFAULT '0',
  `pfile_fk` int(11) NOT NULL,
  `name` text NOT NULL,
  `pspdx_id` text NOT NULL,
  `version` text,
  `filename` text,
  `supplier` text,
  `originator` text,
  `download_location` text NOT NULL,
  `checksum` text,
  `verificationcode` text,
  `home_page` text,
  `source_Information` text,
  `source_info` text,
  `license_declared` text NOT NULL,
  `license_concluded` text NOT NULL,
  `license_info_from_files` text,
  `license_comment` text,
  `package_copyright_text` text,
  `summary` text,
  `description` text,
  `summary_description` text,
  `package_detailed_description` text,
  `package_comment` text,
  `spdx_fk` int(11) NOT NULL,
  PRIMARY KEY (`package_info_pk`,`spdx_fk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spdx_package_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `spdx_relationships_create`
--

CREATE TABLE IF NOT EXISTS `spdx_relationships_create` (
  `relationships_info_pk` int(11) NOT NULL DEFAULT '0',
  `relationship` text NOT NULL,
  PRIMARY KEY (`relationships_info_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spdx_relationships_create`
--


-- --------------------------------------------------------

--
-- Table structure for table `spdx_relationships_docs`
--

CREATE TABLE IF NOT EXISTS `spdx_relationships_docs` (
  `relationships_info_pk` int(11) NOT NULL DEFAULT '0',
  `rspdx1_id` text NOT NULL,
  `rspdx2_id` text NOT NULL,
  `relationship_comment` text NOT NULL,
  `spdx_fk` int(11) NOT NULL,
  PRIMARY KEY (`relationships_info_pk`,`spdx_fk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spdx_relationships_docs`
--


-- --------------------------------------------------------

--
-- Table structure for table `spdx_relationship_insert`
--

CREATE TABLE IF NOT EXISTS `spdx_relationship_insert` (
  `relationship_id_pk` int(10) NOT NULL,
  `relationship_type` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`relationship_id_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spdx_relationship_insert`
--

INSERT INTO `spdx_relationship_insert` (`relationship_id_pk`, `relationship_type`) VALUES
(1, 'contains'),
(2, 'containedBy'),
(3, 'generates'),
(4, 'generatedFrom'),
(5, 'ancestorOf'),
(6, 'descendantOf'),
(7, 'variantOf'),
(8, 'distrubutionArtifact'),
(9, 'patchFor'),
(10, 'patchApplied'),
(11, 'copyOf'),
(12, 'fileAdded'),
(13, 'fileDeleted'),
(14, 'fileModified'),
(15, 'dynamicLink'),
(16, 'staticLink'),
(17, 'datFile'),
(18, 'testcaseOf'),
(19, 'buildToolOf'),
(20, 'documentation'),
(21, 'optionalComponentOf'),
(22, 'metafileOf'),
(23, 'packageOf'),
(24, 'amendment'),
(25, 'other'),
(26, 'describes'),
(27, 'describedBy'),
(28, 'prerequisiteFor'),
(29, 'hasPrerequisite');
