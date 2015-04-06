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
CREATE DATABASE IF NOT EXISTS `SPDX`;
USE `SPDX`;
-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE IF NOT EXISTS `relationship` (
  `spdx_id1` int(11) NOT NULL,
  `spdx_id2` int(11) NOT NULL,
  `relationship_id` int(11) NOT NULL,
  `spdx_fk` int(11) NOT NULL,
  PRIMARY KEY (`spdx_id1`, `spdx_id2`, `spdx_fk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relationship`
--


-- --------------------------------------------------------

--
-- Table structure for table `spdx_annotations_create`
--

CREATE TABLE IF NOT EXISTS `spdx_annotations_create` (
  `annotator_info_pk` int(11) AUTO_INCREMENT,
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
  `spdx_pk` int(11) AUTO_INCREMENT,
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
  `file_info_pk` int(11) AUTO_INCREMENT,
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
  `relative_path` text,
  `package_info_fk` int(11) NOT NULL,
  `spdx_fk` int(11) NOT NULL,
  PRIMARY KEY (`file_info_pk`,`package_info_fk`,`spdx_fk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spdx_file_info`
--

CREATE TABLE IF NOT EXISTS `spdx_license_associations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_info_pk` int(11) NOT NULL,
  `license_list_pk` int(11) NOT NULL,
  `license_identifier` varchar(255) NOT NULL,
  `license_fullname` varchar(255) NOT NULL,
  `license_comments` text NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`file_info_pk`) REFERENCES spdx_file_info(`file_info_pk`),
  FOREIGN KEY (`license_list_pk`) REFERENCES spdx_license_list_insert(`license_list_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- --------------------------------------------------------

--
-- Table structure for table `spdx_license_list_insert`
--

CREATE TABLE IF NOT EXISTS `spdx_license_list_insert` (
  `license_list_pk` int(30) AUTO_INCREMENT,
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
(1, 'Glide', '3dfx Glide License', 'Glide', '', '', 0),
(2, 'Abstyles', 'Abstyles License', 'Abstyles', '', '', 0),
(3, 'AFL-1.1', 'Academic Free License v1.1', 'AFL-1.1', 'AFL 1.1', 'AFL1.1', 1),
(4, 'AFL-1.2	', 'Academic Free License v1.2	', 'AFL-1.2	', 'AFL 1.2	', 'AFL1.2	', 1),
(5, 'AFL-2.0	', 'Academic Free License v2.0	', 'AFL-2.0	', 'AFL 2.0	', 'AFL2.0	', 1),
(6, 'AFL-2.1	', 'Academic Free License v2.1	', 'AFL-2.1	', 'AFL 2.1	', 'AFL2.1	', 1),
(7, 'AFL-3.0', 'Academic Free License v3.0	', 'AFL-3.0', 'AFL 3.0', 'AFL3.0', 1),
(8, 'AMPAS	', 'Academy of Motion Picture Arts and Sciences BSD', 'AMPAS	', '', '', 0),
(9, 'APL-1.0', 'Adaptive Public License 1.0	', 'APL-1.0', 'APL 1.0', 'APL1.0', 1),
(10, 'Adobe-Glyph', 'Adobe Glyph List License	', 'Adobe-Glyph', 'Adobe Glyph', 'AdobeGlyph', 0),
(11, 'APAFML	', 'Adobe Postscript AFM License	', 'APAFML	', '', '', 0),
(12, 'Adobe-2006	', 'Adobe Systems Incorporated Source Code License Agreement', 'Adobe-2006	', 'Adobe 2006	', 'Adobe2006	', 0),
(13, 'AGPL-1.0	', 'Affero General Public License v1.0a', 'AGPL-1.0	', 'AGPL 1.0	', 'AGPL1.0	', 0),
(14, 'Afmparse	', 'Afmparse License	', 'Afmparse	', '', '', 0),
(15, 'Aladdin	', 'Aladdin Free Public License	', 'Aladdin	', '', '', 0),
(16, 'ADSL', 'Amazon Digital Services License', 'ADSL', '', '', 0),
(17, 'AMDPLPA	', 'AMD''s plpa_map.c License	', 'AMDPLPA	', '', '', 0),
(18, 'ANTLR-PD', 'ANTLR Software Rights Notice', 'ANTLR-PD', 'ANTLR PD', 'ANTLRPD', 0),
(19, 'Apache-1.0', 'Apache License 1.0', 'Apache-1.0', 'Apache 1.0', 'Apache1.0', 0),
(20, 'Apache-1.1', 'Apache License 1.1', 'Apache-1.1', 'Apache 1.1', 'Apache1.1', 1),
(21, 'Apache-2.0', 'Apache License 2.0', 'Apache-2.0', 'Apache 2.0', 'Apache2.0', 1),
(22, 'AML', 'Apple MIT License', 'AML', '', '', 0),
(23, 'APSL-1.0', 'Apple Public Source License 1.0', 'APSL-1.0', 'APSL 1.0', 'APSL1.0', 1),
(24, 'APSL-1.1', 'Apple Public Source License 1.1', 'APSL-1.1', 'APSL 1.1', 'APSL1.1', 1),
(25, 'APSL-1.2', 'Apple Public Source License 1.2', 'APSL-1.2', 'APSL 1.2', 'APSL1.2', 1),
(26, 'APSL-2.0', 'Apple Public Source License 2.0', 'APSL-2.0', 'APSL 2.0', 'APSL2.0', 1),
(27, 'Artistic-1.0', 'Artistic License 1.0', 'Artistic-1.0', 'Artistic 1.0', 'Artistic1.0', 1),
(28, 'Artistic-1.0-Perl', 'Artistic License 1.0 (Perl)', 'Artistic-1.0-Perl', 'Artistic 1.0 Perl', 'Artistic1.0Perl', 1),
(29, 'Artistic-1.0-cl8', 'Artistic License 1.0 w/clause 8', 'Artistic-1.0-cl8', 'Artistic 1.0 cl8', 'Artistic1.0cl8', 1),
(30, 'Artistic-2.0', 'Artistic License 2.0', 'Artistic-2.0', 'Artistic 2.0', 'Artistic2.0', 1),
(31, 'AAL', 'Attribution Assurance License', 'AAL', '', '', 1),
(32, 'Bahyph', 'Bahyph License', 'Bahyph', '', '', 0),
(33, 'Barr', 'Barr License', 'Barr', '', '', 0),
(34, 'Beerware', 'Beerware License', 'Beerware', '', '', 0),
(35, 'BitTorrent-1.0', 'BitTorrent Open Source License v1.0', 'BitTorrent-1.0', 'BitTorrent 1.0', 'BitTorrent1.0', 0),
(36, 'BitTorrent-1.1', 'BitTorrent Open Source License v1.1', 'BitTorrent-1.1', 'BitTorrent 1.1', 'BitTorrent1.1', 0),
(37, 'BSL-1.0', 'Boost Software License 1.0', 'BSL-1.0', 'BSL 1.0', 'BSL1.0', 0),
(38, 'Borceux', 'Borceux license', 'Borceux', '', '', 0),
(39, 'BSD-2-Clause', 'BSD 2-clause "Simplified" License', 'BSD-2-Clause', 'BSD-2 Clause', 'BSD-2Clause', 0),
(40, 'BSD-2-Clause-FreeBSD', 'BSD 2-clause FreeBSD License', 'BSD-2-Clause-FreeBSD', 'BSD-2 Clause FreeBSD', 'BSD-2ClauseFreeBSD', 0),
(41, 'BSD-2-Clause-NetBSD', 'BSD 2-clause NetBSD License', 'BSD-2-Clause-NetBSD', 'BSD 2 Clause NetBSD', 'BSD2ClauseNetBSD', 0),
(42, 'BSD-3-Clause', 'BSD 3-clause "New" or "Revised" License', 'BSD-3-Clause', 'BSD 3 Clause', 'BSD3Clause', 0),
(43, 'BSD-3-Clause-Clear', 'BSD 3-clause Clear License', 'BSD-3-Clause-Clear', 'BSD 3 Clause Clear', 'BSD3ClauseClear', 0),
(44, 'BSD-4-Clause', 'BSD 4-clause "Original" or "Old" License', 'BSD-4-Clause', 'BSD 4 Clause', 'BSD4Clause', 0),
(45, 'BSD-Protection', 'BSD Protection License', 'BSD-Protection', 'BSD Protection', 'BSDProtection', 0),
(46, 'BSD-3-Clause-Attribution', 'BSD with attribution', 'BSD-3-Clause-Attribution', 'BSD 3 Clause Attribution', 'BSD3ClauseAttribution', 0),
(47, 'BSD-4-Clause-UC', 'BSD-4-Clause (University of California-Specific', 'BSD-4-Clause-UC', 'BSD 4 Clause UC', 'BSD4ClauseUC', 0),
(48, 'bzip2-1.0.5', 'bzip2 and libbzip2 License v1.0.5', 'bzip2-1.0.5', 'bzip2 1.0.5', 'bzip21.0.5', 0),
(49, 'bzip2-1.0.6', 'bzip2 and libbzip2 License v1.0.6', 'bzip2-1.0.6', 'bzip2 1.0.6', 'bzip21.0.6', 0),
(50, 'Caldera', 'Caldera License', 'Caldera', '', '', 0),
(51, 'CECILL-1.0', 'CeCILL Free Software License Agreement v1.0', 'CECILL-1.0', 'CECILL 1.0', 'CECILL1.0', 0),
(52, 'CECILL-1.1', 'CeCILL Free Software License Agreement v1.1', 'CECILL-1.1', 'CECILL 1.1', 'CECILL1.1', 0),
(53, 'CECILL-2.0', 'CeCILL Free Software License Agreement v2.0', 'CECILL-2.0', 'CECILL 2.0', 'CECILL2.0', 0),
(54, 'CECILL-B', 'CeCILL-B Free Software License Agreement', 'CECILL-B', 'CECILL B', 'CECILLB', 0),
(55, 'CECILL-C', 'CeCILL-C Free Software License Agreement', 'CECILL-C', 'CECILL C', 'CECILLC', 0),
(56, 'ClArtistic', 'Clarified Artistic License', 'ClArtistic', 'Clartistic', '', 0),
(57, 'MIT-CMU', 'CMU License', 'MIT-CMU', 'MIT CMU', 'MITCMU', 0),
(58, 'CNRI-Python', 'CNRI Python License', 'CNRI-Python', 'CNRI Python', 'CNRIPython', 1),
(59, 'CNRI-Python-GPL-Compatible', 'CNRI Python Open Source GPL Compatible License Agreement', 'CNRI-Python-GPL-Compatible', 'CNRI Python GPL Compatible', 'CNRIPythonGPLCompatible', 0),
(60, 'CPOL-1.02', 'Code Project Open License 1.02', 'CPOL-1.02', 'CPOL 1.02', 'CPOL1.02', 0),
(61, 'CDDL-1.0', 'Common Development and Distribution License 1.0', 'CDDL-1.0', 'CDDL 1.0', 'CDDL1.0', 1),
(62, 'CDDL-1.1', 'Common Development and Distribution License 1.1', 'CDDL-1.1', 'CDDL 1.1', 'CDDL1.1', 0),
(63, 'CPAL-1.0', 'Common Public Attribution License 1.0', 'CPAL-1.0', 'CPAL 1.0', 'CPAL1.0', 1),
(64, 'CPL-1.0', 'Common Public License 1.0', 'CPL-1.0', 'CPL 1.0', 'CPL1.0', 1),
(65, 'CATOSL-1.1', 'Computer Associates Trusted Open Source License 1.1', 'CATOSL-1.1', 'CATOSL 1.1', 'CATOSL1.1', 1),
(66, 'Condor-1.1', 'Condor Public License v1.1', 'Condor-1.1', 'Condor 1.1', 'Condor1.1', 0),
(67, 'CC-BY-1.0', 'Creative Commons Attribution 1.0', 'CC-BY-1.0', 'CC-BY 1.0', 'CC-BY1.0', 0),
(68, 'CC-BY-2.0', 'Creative Commons Attribution 2.0', 'CC-BY-2.0', 'CC BY 2.0', 'CCBY2.0', 0),
(69, 'CC-BY-2.5', 'Creative Commons Attribution 2.5', 'CC-BY-2.5', 'CC BY 2.5', 'CCBY2.5', 0),
(70, 'CC-BY-3.0', 'Creative Commons Attribution 3.0', 'CC-BY-3.0', 'CC BY 3.0', 'CCBY3.0', 0),
(71, 'CC-BY-4.0', 'Creative Commons Attribution 4.0', 'CC-BY-4.0', 'CC BY 4.0', 'CCBY4.0', 0),
(72, 'CC-BY-ND-1.0', 'Creative Commons Attribution No Derivatives 1.0', 'CC-BY-ND-1.0', 'CC BY ND 1.0', 'CCBYND1.0', 0),
(73, 'CC-BY-ND-2.0', 'Creative Commons Attribution No Derivatives 2.0', 'CC-BY-ND-2.0', 'CC BY ND 2.0', 'CCBYND2.0', 0),
(74, 'CC-BY-ND-2.5', 'Creative Commons Attribution No Derivatives 2.5', 'CC-BY-ND-2.5', 'CC BY ND 2.5', 'CCBYND2.5', 0),
(75, 'CC-BY-ND-3.0', 'Creative Commons Attribution No Derivatives 3.0', 'CC-BY-ND-3.0', 'CC BY ND 3.0', 'CCBYND3.0', 0),
(76, 'CC-BY-ND-4.0', 'Creative Commons Attribution No Derivatives 4.0', 'CC-BY-ND-4.0', 'CC BY ND 4.0', 'CCBYND4.0', 0),
(77, 'CC-BY-NC-1.0', 'Creative Commons Attribution Non Commercial 1.0', 'CC-BY-NC-1.0', 'CC BY NC 1.0', 'CCBYNC1.0', 0),
(78, 'CC-BY-NC-2.0', 'Creative Commons Attribution Non Commercial 2.0', 'CC-BY-NC-2.0', 'CC BY NC 2.0', 'CCBYNC2.0', 0),
(79, 'CC-BY-NC-2.5', 'Creative Commons Attribution Non Commercial 2.5', 'CC-BY-NC-2.5', 'CC BY NC 2.5', 'CCBYNC2.5', 0),
(80, 'CC-BY-NC-3.0', 'Creative Commons Attribution Non Commercial 3.0', 'CC-BY-NC-3.0', 'CC BY NC 3.0', 'CCBYNC3.0', 0),
(81, 'CC-BY-NC-4.0', 'Creative Commons Attribution Non Commercial 4.0', 'CC-BY-NC-4.0', 'CC BY NC 4.0', 'CCBYNC4.0', 0),
(82, 'CC-BY-NC-ND-1.0', 'Creative Commons Attribution Non Commercial No Derivatives 1.0', 'CC-BY-NC-ND-1.0', 'CC BY NC ND 1.0', 'CCBYNCND1.0', 0),
(83, 'CC-BY-NC-ND-2.0', 'Creative Commons Attribution Non Commercial No Derivatives 2.0', 'CC-BY-NC-ND-2.0', 'CC BY NC ND 2.0', 'CCBYNCND2.0', 0),
(84, 'CC-BY-NC-ND-2.5', 'Creative Commons Attribution Non Commercial No Derivatives 2.5', 'CC-BY-NC-ND-2.5', 'CC BY NC ND 2.5', 'CCBYNCND2.5', 0),
(85, 'CC-BY-NC-ND-3.0', 'Creative Commons Attribution Non Commercial No Derivatives 3.0', 'CC-BY-NC-ND-3.0', 'CC BY NC ND 3.0', 'CCBYNCND3.0', 0),
(86, 'CC-BY-NC-ND-4.0', 'Creative Commons Attribution Non Commercial No Derivatives 4.0', 'CC-BY-NC-ND-4.0', 'CC BY NC ND 4.0', 'CCBYNCND4.0', 0),
(87, 'CC-BY-NC-SA-1.0', 'Creative Commons Attribution Non Commercial Share Alike 1.0', 'CC-BY-NC-SA-1.0', 'CC BY NC SA 1.0', 'CCBYNCSA1.0', 0),
(88, 'CC-BY-NC-SA-2.0', 'Creative Commons Attribution Non Commercial Share Alike 2.0', 'CC-BY-NC-SA-2.0', 'CC BY NC SA 2.0', 'CCBYNCSA2.0', 0),
(89, 'CC-BY-NC-SA-2.5', 'Creative Commons Attribution Non Commercial Share Alike 2.5', 'CC-BY-NC-SA-2.5', 'CC BY NC SA 2.5', 'CCBYNCSA2.5', 0),
(90, 'CC-BY-NC-SA-3.0', 'Creative Commons Attribution Non Commercial Share Alike 3.0', 'CC-BY-NC-SA-3.0', 'CC BY NC SA 3.0', 'CCBYNCSA3.0', 0),
(91, 'CC-BY-NC-SA-4.0', 'Creative Commons Attribution Non Commercial Share Alike 4.0', 'CC-BY-NC-SA-4.0', 'CC BY NC SA 4.0', 'CCBYNCSA4.0', 0),
(92, 'CC-BY-SA-1.0', 'Creative Commons Attribution Share Alike 1.0', 'CC-BY-SA-1.0', 'CC BY SA 1.0', 'CCBYSA1.0', 0),
(93, 'CC-BY-SA-2.0', 'Creative Commons Attribution Share Alike 2.0', 'CC-BY-SA-2.0', 'CC BY SA 2.0', 'CCBYSA2.0', 0),
(94, 'CC-BY-SA-2.5', 'Creative Commons Attribution Share Alike 2.5', 'CC-BY-SA-2.5', 'CC BY SA 2.5', 'CCBYSA2.5', 0),
(95, 'CC-BY-SA-3.0', 'Creative Commons Attribution Share Alike 3.0', 'CC-BY-SA-3.0', 'CC BY SA 3.0', 'CCBYSA3.0', 0),
(96, 'CC-BY-SA-4.0', 'Creative Commons Attribution Share Alike 4.0', 'CC-BY-SA-4.0', 'CC BY SA 4.0', 'CCBYSA4.0', 0),
(97, 'CC0-1.0', 'Creative Commons Zero v1.0 Universal', 'CC0-1.0', 'CC0 1.0', 'CC01.0', 0),
(98, 'Crossword', 'Crossword License', 'Crossword', '', '', 0),
(99, 'CUA-OPL-1.0', 'CUA Office Public License v1.0', 'CUA-OPL-1.0', 'CUA OPL 1.0', 'CUAOPL1.0', 1),
(100, 'Cube', 'Cube License', 'Cube', '', '', 0),
(101, 'D-FSL-1.0', 'Deutsche Freie Software Lizenz', 'D-FSL-1.0', 'DFSL 1.0', 'DFSL1.0', 0),
(102, 'diffmark', 'diffmark license', 'diffmark', '', '', 0),
(103, 'WTFPL', 'Do What The F*ck You Want To Public License', 'WTFPL', '', '', 0),
(104, 'DOC', 'DOC License', 'DOC', '', '', 0),
(105, 'Dotseqn', 'Dotseqn License', 'Dotseqn', '', '', 0),
(106, 'DSDP', 'DSDP License', 'DSDP', '', '', 0),
(107, 'dvipdfm', 'dvipdfm License', 'dvipdfm', '', '', 0),
(108, 'EPL-1.0', 'Eclipse Public License 1.0', 'EPL-1.0', 'EPL 1.0', 'EPL1.0', 1),
(109, 'eCos-2.0', 'eCos license version 2.0', 'eCos-2.0', 'eCos 2.0', 'eCos2.0', 0),
(110, 'ECL-1.0', 'Educational Community License v1.0', 'ECL-1.0', 'ECL 1.0', 'ECL1.0', 1),
(111, 'ECL-2.0', 'Educational Community License v2.0', 'ECL-2.0', 'ECL 2.0', 'ECL2.0', 1),
(112, 'eGenix', 'eGenix.com Public License 1.1.0', 'eGenix', '', '', 0),
(113, 'EFL-1.0', 'Eiffel Forum License v1.0', 'EFL-1.0', 'EFL 1.0', 'EFL1.0', 1),
(114, 'EFL-2.0', 'Eiffel Forum License v2.0', 'EFL-2.0', 'EFL 2.0', 'EFL2.0', 1),
(115, 'MIT-advertising', 'Enlightenment License (e16)', 'MIT-advertising', 'MIT advertising', 'MIT advertising', 0),
(116, 'MIT-enna', 'enna License', 'MIT-enna', 'MIT enna', 'MITenna', 0),
(117, 'Entessa', 'Entessa Public License v1.0', 'Entessa', '', '', 1),
(118, 'ErlPL-1.1', 'Erlang Public License v1.1', 'ErlPL-1.1', 'ErlPL 1.1', 'ErlPL1.1', 0),
(119, 'EUDatagrid', 'EU DataGrid Software License', 'EUDatagrid', '', '', 1),
(120, 'EUPL-1.0', 'European Union Public License 1.0', 'EUPL-1.0', 'EUPL 1.0', 'EUPL1.0', 0),
(121, 'EUPL-1.1', 'European Union Public License 1.1', 'EUPL-1.1', 'EUPL 1.1', 'EUPL1.1', 1),
(122, 'Eurosym', 'Eurosym License', 'Eurosym', '', '', 0),
(123, 'Fair', 'Fair License', 'Fair', '', '', 1),
(124, 'MIT-feh', 'feh License', 'MIT-feh', 'MIT feh', 'MITfeh', 0),
(125, 'Frameworx-1.0', 'Frameworx Open License 1.0', 'Frameworx-1.0', 'Frameworx 1.0', 'Frameworx1.0', 1),
(126, 'FTL', 'Freetype Project License', 'FTL', '', '', 0),
(127, 'FSFUL', 'FSF Unlimited License', 'FSFUL', '', '', 0),
(128, 'FSFULLR', 'FSF Unlimited License (with License Retention)', 'FSFULLR', '', '', 0),
(129, 'Giftware', 'Giftware License', 'Giftware', '', '', 0),
(130, 'GL2PS', 'GL2PS License', 'GL2PS', '', '', 0),
(131, 'Glulxe', 'Glulxe License', 'Glulxe', '', '', 0),
(132, 'AGPL-3.0', 'GNU Affero General Public License v3.0', 'AGPL-3.0', 'AGPL 3.0', 'AGPL3.0', 1),
(133, 'GFDL-1.1', 'GNU Free Documentation License v1.1', 'GFDL-1.1', 'GFDL 1.1', 'GFDL1.1', 0),
(134, 'GFDL-1.2', 'GNU Free Documentation License v1.2', 'GFDL-1.2', 'GFDL 1.2', 'GFDL1.2', 0),
(135, 'GFDL-1.3', 'GNU Free Documentation License v1.3', 'GFDL-1.3', 'GFDL 1.3', 'GFDL1.3', 0),
(136, 'GPL-1.0', 'GNU General Public License v1.0 only', 'GPL-1.0', 'GPL 1.0', 'GPL1.0', 0),
(137, 'GPL-1.0+', 'GNU General Public License v1.0 or later', 'GPL-1.0+', 'GPL 1.0+', 'GPL1.0+', 0),
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
(155, 'gnuplot', 'gnuplot License', 'gnuplot', '', '', 0),
(156, 'gSOAP-1.3b', 'gSOAP public License v1.3b', 'gSOAP-1.3b', 'gSOAP 1.3b', 'gSOAP1.3b', 0),
(157, 'HaskellReport', 'Haskell Language Report License', 'HaskellReport', 'Haskellreport', 'Haskell report', 0),
(158, 'HPND', 'Historic Permission Notice and Disclaimer', 'HPND', '', '', 1),
(159, 'IBM-pibs', 'IBM PowerPC Initialization and Boot Software', 'IBM-pibs', 'IBMpids', 'IBM pibs', 0),
(160, 'IPL-1.0', 'IDM Public License v1.0', 'IPL-1.0', 'IPL 1.0', 'IPL1.0', 1),
(161, 'ImageMagick', 'ImageMagick License', 'ImageMagick', 'Imagemagick', '', 0),
(162, 'iMatrix', 'iMatrix Standard Function Library Agreement', 'iMatrix', '', '', 0),
(163, 'Imlib2', 'Imlib2 License', 'Imlib2', '', '', 0),
(164, 'IJG', 'Independent JPEG Group License', 'IJG', '', '', 0),
(165, 'Intel-ACPI', 'Intel ACPI Software License Agreement', 'Intel-ACPI', 'IntelACPI', 'Intel ACPI', 0),
(166, 'Intel', 'Intel Open Source License', 'Intel', '', '', 1),
(167, 'IPA', 'IPA Font License', 'IPA', '', '', 1),
(168, 'ISC', 'ISC License', 'ISC', '', '', 1),
(169, 'JasPer-2.0', 'JasPer License', 'JasPer-2.0', 'JasPer2.0', 'JasPer 2.0', 0),
(170, 'JSON ', 'JSON License', 'JSON', '', '', 0),
(171, 'LPPL-1.3a', 'LaTeX Project Public License 1.3a', 'LPPL-1.3a', 'LPPL1.3a', 'LPPL 1.3a', 0),
(172, 'LPPL-1.0', 'LaTeX Project Public License v1.0', 'LPPL-1.0', 'LPPL 1.0', 'LPPL1.0', 0),
(173, 'LPPL-1.1', 'LaTeX Project Public License v1.1', 'LPPL-1.1', 'LPPL 1.1', 'LPPL1.1', 0),
(174, 'LPPL-1.2', 'LaTeX Project Public License v1.2', 'LPPL-1.2', 'LPPL1.2', 'LPPL 1.2', 0),
(175, 'LPPL-1.3c', 'LaTeX Project Public License v1.3c', 'LPPL-1.3c', 'LPPL1.3c', 'LPPL 1.3c', 1),
(176, 'Latex2e', 'Latex2eLicense', 'Latex2e', '', '', 0),
(177, 'BSD-3-Clause-LBNL', 'Lawrence Berkeley National Labs BSD Variant License', 'BSD-3-Clause-LBNL', 'BSD-LBNL', 'BSD 3 Clause LBNL', 0),
(178, 'Leptonica', 'Leptonica License', 'Leptonica', '', '', 0),
(179, 'Libpng', 'libpng License', 'Libpng', '', '', 0),
(180, 'libtiff', 'libtiff License', 'libtiff', '', '', 0),
(181, 'LPL-1.02', 'Lucent Public License v1.02', 'LPL-1.02', 'LPL1.02', 'LPL 1.02', 1),
(182, 'LPL-1.0', 'Lucent Public License 1.0', 'LPL-1.0', 'LPL1.0', 'LPL 1.0', 1),
(183, 'MakeIndex', 'MakeIndex License', 'MakeIndex', '', '', 0),
(184, 'MTLL', 'Matrix Template Library License', 'MTLL', '', '', 0),
(185, 'MS-PL', 'Microsoft Public License', 'MS-PL', 'MSPL', 'MS PL', 1),
(186, 'MS-RL', 'Microsoft Reciprocal License', 'MS-RL', 'MSRL', 'MS RL', 1),
(187, 'MirOS', 'MirOS License', 'MirOS', '', '', 1),
(188, 'MITNFA', 'MIT+no-false-attribs license', 'MITNFA', '', '', 0),
(189, 'MIT', 'MIT License\r\n', 'MIT', '', '', 1),
(190, 'Motosoto', 'Motosoto License', 'Motosoto', '', '', 1),
(191, 'MPL-1.0', 'Mozilla Public License 1.0', 'MPL-1.0', 'MPL 1.0', 'MPL1.0', 1),
(192, 'MPL-1.1', 'Mozilla Public License 1.1', 'MPL-1.1', 'MPL1.1', 'MPL 1.1', 1),
(193, 'MPL-2.0', 'Mozilla Public License 2.0', 'MPL-2.0', 'MPL2.0', 'MPL 2.0', 1),
(194, 'MPL-2.0-no-copy-exception', 'Mozilla Public Licese 2.0(no copyleft exception)', 'MPL-2.0-no-copy-exception', 'MPL2.0nocopyexception', 'MPL 2.0 no copy exception', 1),
(195, 'mpich2', 'mpich2 License', 'mpich2', '', '', 0),
(196, 'Multics', 'Multics License', 'Multics', '', '', 1),
(197, 'Mup', 'Mup License', 'Mup', '', '', 0),
(198, 'NASA-1.3', 'NASA Open Source Agreement 1.3', 'NASA-1.3', 'NASA 1.3', 'NASA1.3', 1),
(199, 'Naumen', 'Naumen Public License', 'Naumen', '', '', 1),
(200, 'NBPL-1.0', 'Net Boolean Public License v1', 'NBPL-1.0', 'NBPL 1.0', 'NBPL1.0', 0),
(201, 'NetCDF', 'NetCDF license', 'NetCDF', 'Net CDF', '', 0),
(202, 'NGPL', 'Nethack General Public License', 'NGPL', '', '', 1),
(203, 'NOSL', 'Netizen Open Source License', 'NOSL', '', '', 0),
(204, 'NPL-1.0', 'Netscape Public License v1.0', 'NPL-1.0', 'NPL1.0', 'NPL 1.0', 0),
(205, 'NPL-1.1', 'Netscape Public License v1.1', 'NPL-1.1', 'NPL 1.1', 'NPL1.1', 0),
(206, 'Newsletr', 'Newsletr License', 'Newsletr', '', '', 0),
(207, 'NLPL', 'No Limit Public License', 'NLPL', '', '', 0),
(208, 'Nokia ', 'Nokia Open Source License', 'Nokia', '', '', 1),
(209, 'NPOSL-3.0', 'Non-Profit Open Software License 3.0', 'NPOSL-3.0', 'NPOSL 3.0', 'NPOSL3.0', 1),
(210, 'Noweb', 'Noweb License', 'Noweb', '', '', 0),
(211, 'NRL', 'NRL Licese', 'NRL', '', '', 0),
(212, 'NTP ', 'NTP License', 'NTP', '', '', 1),
(213, 'Nunit ', 'Nunit License', 'Nunit', '', '', 0),
(214, 'OCLC-2.0', 'OCLC Research Public License 2.0', 'OCLC-2.0', 'OCLC2.0', 'OCLC 2.0', 1),
(215, 'ODbL-1.0', 'ODC Open Database License v1.0', 'ODbL-1.0', 'ODbL1.0', 'ODbL 1.0', 0),
(216, 'PDDL-1.0', 'ODC Public Domain Dedication & License 1.0', 'PDDL-1.0', 'PDDL 1.0', 'PDDL-1.0', 0),
(217, 'OGTSL', 'Open Group Test Suite License', 'OGTSL', '', '', 1),
(218, 'OLDAP-2.2.2', 'Open LDAP Public License 2.2.2', 'OLDAP-2.2.2', 'OLDAP2.2.2', 'OLDAP 2.2.2', 0),
(219, 'OLDAP-1.1', 'Open LDAP Public License v1.1', 'OLDAP-1.1', 'OLDAP 1.1', 'OLDAP1.1', 0),
(220, 'OLDAP-1.2', 'Open LDAP Public License v1.2', 'OLDAP-1.2', 'OLDAP1.2', 'OLDAP 1.2', 0),
(221, 'OLDAP-1.3', 'Open LDAP Public License v1.3', 'OLDAP-1.3', 'OLDAP1.3', 'OLDAP 1.3', 0),
(222, 'OLDAP-1.4', 'Open LDAP Public License v1.4', 'OLDAP-1.4', 'OLDAP 1.4', 'OLDAP1.4', 0),
(223, 'OLDAP-2.0', 'Open LDAP Public License v2.09or possibility 2.0A and 2.0B)', 'OLDAP-2.0', 'OLDAP 2.0', 'OLDAP2.0', 0),
(224, 'OLDAP-2.0.1', 'Open LDAP Public License v2.0.1', 'OLDAP-2.01', 'OLDAP2.01', 'OLDAP 2.01', 0),
(225, 'OLDAP-2.1 ', 'Open LDAP Public License v2.1', 'OLDAP-2.1', 'OLDAP 2.1', 'OLDAP2.1', 0),
(226, 'OLDAP-2.2', 'Open LDAP Public License v2.2', 'OLDAP-2.2', 'OLDAP2.2', 'OLDAP 2.2', 0),
(227, 'OLDAP-2.2.1', 'Open LDAP Public License v2.2.1', 'OLDAP-2.2.1', 'OLDAP 2.2.1', 'OLDAP2.2.1', 0),
(228, 'OLDAP-2.3', 'Open LDAP Public License v2.3', 'OLDAP-2.3', 'OLDAP2.3', 'OLDAP 2.3', 0),
(229, 'OLDAP-2.4', 'Open LDAP Public License v2.4', 'OLDAP-2.4', 'OLDAP2.4', 'OLDAP 2.4', 0),
(230, 'OLDAP-2.5', 'Open LDAP Public License v2.5', 'OLDAP-2.5', 'OLDAP2.5', 'OLDAP 2.5', 0),
(231, 'OLDAP-2.6', 'Open LDAP Public License v2.6', 'OLDAP-2.6', 'OLDAP 2.6', 'OLDAP2.6', 0),
(232, 'OLDAP-2.7', 'Open LDAP Public License v2.7', 'OLDAP-2.7', 'OLDAP 2.7', 'OLDAP2.7', 0),
(233, 'OML', 'Open Market License', 'OML', '', '', 0),
(234, 'OPL-1.0', 'Open Public License v1.0', 'OPL-1.0', 'OPL 1.0', 'OPL1.0', 0),
(235, 'OSL-1.0', 'Open Software License 1.0', 'OSL-1.0', 'OSL 1.0', 'OSL1.0', 1),
(236, 'OSL-1.1', 'Open Software License 1.1', 'OSL-1.1', 'OSL 1.1', 'OSL1.1', 0),
(237, 'OSL-2.0', 'Open Software License 2.0', 'OSL-2.0', 'OSL 2.0', 'OSL2.0', 1),
(238, 'OSL-2.1', 'Open Software License 2.1', 'OSL-2.1', 'OSL 2.1', 'OSL2.1', 1),
(239, 'OSL-3.0', 'Open Software License 3.0', 'OSL-3.0', 'OSL 3.0', 'OSL3.0', 1),
(240, 'OLDAP-2.8', 'OpenLDAP Public License v2.8', 'OLDAP-2.8', 'OLDAP 2.8', 'OLDAP2.8', 0),
(241, 'OpenSSL', 'OpenSSL License', 'OpenSSL', '', '', 0),
(242, 'PHP-3.0', 'PHP License v3.0', 'PHP-3.0', 'PHP 3.0', 'PHP3.0', 1),
(243, 'PHP-3.01', 'PHP License v3.01', 'PHP-3.01', 'PHP 3.01', 'PHP3.01', 0),
(244, 'Plexus', 'Plexus Classworlds License', 'Plexus', '', '', 0),
(245, 'PostgreSQL', 'PostgreSQL License', 'PostgreSQL', '', '', 1),
(246, 'psfrag', 'psfrag License', 'psfrag', '', '', 0),
(247, 'psutils', 'psutils License', 'psutils', '', '', 0),
(248, 'Python-2.0', 'Python License 2.0', 'Python-2.0', 'Python2.0', 'Python 2.0', 1),
(249, 'QPL-1.0', 'Q Public License 1.0 ', 'QPL-1.0', 'QPL 1.0', 'QPL1.0', 1),
(250, 'Qhull', 'Qhull License', 'Qhull', '', '', 0),
(251, 'Rdisc', 'Rdisc License', 'Rdisc', '', '', 0),
(252, 'RPSL-1.0', 'RealNetwork Public Source License v1.0', 'RPSL-1.0', 'RPSL 1.0', 'RPSL1.0', 1),
(253, 'RPL-1.1', 'Reciprocal Public License 1.1', 'RPL-1.1', 'RPL 1.1', 'RPL1.1', 1),
(254, 'RPL-1.5', 'Reciprocal Public License 1.5', 'RPL-1.5', 'RPL 1.5', 'RPL1.5', 1),
(255, 'RHeCos-1.1', 'Red Hat eCos Public License v1.1', 'RHeCos-1.1', 'RHeCos 1.1', 'RHeCos1.1', 0),
(256, 'RSCPL', 'Ricoh Source Code Public License', 'RSCPL', '', '', 1),
(257, 'Ruby', 'Ruby License', '', '', '', 0),
(258, 'SAX-PD', 'Sax Public Domain Notice', 'SAX-PD', 'SAX PD', 'SAXPD', 0),
(259, 'Saxpath', 'Saxpath License', '', '', '', 0),
(260, 'SCEA', 'SCEA Shared Source license', 'SCEA', '', '', 0),
(261, 'SWL', 'Scheme Widget Library (SWL) Software License Agreement', 'SWL', '', '', 0),
(262, 'SGI-B-1.0', 'SGI Free Software License B v1.0', 'SGI-B-1.0', 'SGIB1.0', 'SGI B 1.0', 0),
(263, 'SGI-B-1.0', 'SGI Free Software License B v1.1', 'SGI-B-1.1', 'SGIB1.1', 'SGI B 1.1', 0),
(264, 'SGI-B-2.0', 'SGI Free Software License B v2.0', 'SGI-B-2.0', 'SGI B 2.0', 'SGIB2.0', 0),
(265, 'OFL-1.0', 'SIL Open Font License 1.0', 'OFL-1.0', 'OFL 1.0', 'OFL1.0', 0),
(266, 'OFL-1.1', 'SIL Open Font License 1.1', 'OFL-1.1', 'OFL 1.1', 'OFL1.1', 1),
(267, 'SimPL-2.0', 'Simple Public License 2.0', 'SimPL-2.0', 'SimPL 2.0', 'SimPL2.0', 1),
(268, 'Sleepycat', 'Sleepycat License', 'Sleepycat', '', '', 1),
(269, 'SNIA', 'SNIA Public License ', 'SNIA', '', '', 0),
(270, 'SMLNJ', 'Standard ML of New Jersey License', 'SMLNJ', '', '', 0),
(271, 'StandardML-NJ', 'Standard ML of New Jersey License', 'StandardML-NJ', 'StandardMLNJ', 'StandardML NJ', 0),
(272, 'SugarCRM-1.1.3', 'SugarCRM Public License v1.1.3', 'SugarCRM-1.1.3', 'SugarCRM 1.1.3', 'SugarCRM1.1.3', 0),
(273, 'SISSL', 'Sun Industry Standards Source License v1.1', 'SISSL', '', '', 1),
(274, 'SISSL-1.2', 'Sun Industry Standards Source License v1.2', 'SISSL-1.2', 'SISSL 1.2', 'SISSL1.2', 0),
(275, 'SPL-1.0', 'Sun Public License v1.0', 'SPL-1.0', 'SPL 1.0', 'SPL1.0', 1),
(276, 'Watcom-1.0', 'Sybase Open Watcom Public License 1.0', 'Watcom-1.0', 'Watcom 1.0', 'Watcom1.0', 1),
(277, 'TCL', 'TCL/TK License', 'TCL', '', '', 0),
(278, 'Unlicense', 'The Unlicense', 'Unlicense', '', '', 0),
(279, 'TMate', 'TMate Open Source License', 'TMate', '', '', 0),
(280, 'TORQUE-1.1', 'TORQUE v2.5+ Software License v1.1', 'TORQUE-1.1', 'TORQUE 1.1', 'TORQUE1.1', 0),
(281, 'TOSL', 'Trusster Open Source License', 'TOSL', '', '', 0),
(282, 'Unicode-TOU', 'Unicode Terms of Use', 'Unicode-TOU', 'Unicode TOU', 'UnicodeTOU', 0),
(283, 'NCSA', 'University of Illinois/NCSA Open Source License', 'NCSA', '', '', 1),
(284, 'Vim', 'Vim License', 'Vim', '', '', 0),
(285, 'VOSTROM', 'VOSTROM Public License for Open Source', 'VOSTROM', '', '', 0),
(286, 'VSL-1.0', 'Vovida Software License v1.0', 'VSL-1.0', 'VSL1.0', 'VSL 1.0', 1),
(287, 'W3C', 'W3C Software Notice and License', 'W3C', '', '', 1),
(288, 'Wsuipa', 'Wsuipa License', 'Wsuipa', '', '', 0),
(289, 'WXwindows', 'wxWindows Library License', 'WXwindows', '', '', 1),
(290, 'Xnet', 'X.Net License', 'Xnet', '', '', 1),
(291, 'X11', 'X11 License', 'X11', '', '', 0),
(292, 'Xerox', 'Xerox License', 'Xerox', '', '', 0),
(293, 'XFree86-1.1', 'XFree86 License 1.1', 'XFree86-1.1', 'XFree86 1.1', 'XFree861.1', 0),
(294, 'xinetd', 'xinetd License', 'xinetd', '', '', 0),
(295, 'xpp', 'XPP License', 'xpp', '', '', 0),
(296, 'XSkat', 'XSkat License', 'XSkat', '', '', 0),
(297, 'YPL-1.0', 'Yahoo! Public License v1.0', 'YPL-1.0', 'YPL 1.0', 'YPL1.0', 0),
(298, 'YPL-1.1', 'Yahoo! Public License v1.1', 'YPL-1.1', 'YPL 1.1', 'YPL1.1', 0),
(299, 'Zed', 'Zed License', 'Zed', '', '', 0),
(300, 'Zend-2.0', 'Zend License v2.0', 'Zend-2.0', 'Zend 2.0', 'Zend2.0', 0),
(301, 'Zimbra-1.3', 'Zimbra Public License v1.3', 'Zimbra-1.3', 'Zimbra 1.3', 'Zimbra1.3', 0),
(302, 'Zlib', 'zlib License', 'Zlib', '', '', 1),
(303, 'zlib-acknowledgement', 'zlib/libpng License with Acknowledgement', 'zlib-acknowledgement', '', '', 0),
(304, 'ZPL-1.1', 'Zope Public License 1.1', 'ZPL-1.1', 'ZPL 1.1', 'ZPL1.1', 0),
(305, 'ZPL-2.0', 'Zope Public License 2.0', 'ZPL-2.0', 'ZPL 2.0', 'ZPL2.0', 1),
(306, 'ZPL-2.1', 'Zope Public License 2.1', 'ZPL-2.1', 'ZPL 2.1', 'ZPL2.1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `spdx_package_info`
--

CREATE TABLE IF NOT EXISTS `spdx_package_info` (
  `package_info_pk` int(11) AUTO_INCREMENT,
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
  `relationships_info_pk` int(11) AUTO_INCREMENT,
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
  `relationships_info_pk` int(11) AUTO_INCREMENT,
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
  `relationship_id_pk` int(10) AUTO_INCREMENT,
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
