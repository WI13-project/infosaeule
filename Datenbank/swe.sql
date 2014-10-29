-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Okt 2014 um 21:18
-- Server Version: 5.6.20
-- PHP-Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `swe`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `inhalt`
--

CREATE TABLE IF NOT EXISTS `inhalt` (
`Text_ID` int(10) unsigned NOT NULL,
  `Titel` varchar(40) NOT NULL DEFAULT '',
  `Kurzinfo` varchar(100) NOT NULL,
  `Text` text NOT NULL,
  `Ersteller` int(11) NOT NULL,
  `EDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Deaktiviert` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `inhalt`
--

INSERT INTO `inhalt` (`Text_ID`, `Titel`, `Kurzinfo`, `Text`, `Ersteller`, `EDate`, `Deaktiviert`) VALUES
(1, 'Test1', 'hihi</p>', '<p>blubb', 1, '2014-10-28 09:48:54', 0),
(2, 'Test2', 'Dies ist der zweite Test', '<h1><img style="float: right;" title="TinyMCE Logo" src="img/tlogo.png" alt="TinyMCE Logo" width="92" height="80" />Welcome to the TinyMCE editor demo!</h1>\r\n<p>wir testen es!</p>\r\n<table border="0">\r\n<tbody>\r\n<tr>\r\n<td><strong>Product</strong></td>\r\n<td><strong>Cost</strong></td>\r\n<td><strong>Really?</strong></td>\r\n</tr>\r\n<tr>\r\n<td>TinyMCE</td>\r\n<td>Free</td>\r\n<td>YES!</td>\r\n</tr>\r\n<tr>\r\n<td>Plupload</td>\r\n<td>Free</td>\r\n<td>YES!</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>Enjoy our software and create great content!</p>\r\n<p>Oh, and by the way, don''t forget to check out our other product called <a href="http://www.plupload.com" target="_blank">Plupload</a>, your ultimate upload solution with HTML5 upload support!</p>', 1, '2014-10-28 09:48:54', 0),
(3, 'Test3', 'Dies ist der dritte Test', '<h1><img style="float: right;" title="TinyMCE Logo" src="img/tlogo.png" alt="TinyMCE Logo" width="92" height="80" />Welcome to the TinyMCE editor demo!</h1>\r\n<p>wir testen es!</p>\r\n<table border="0">\r\n<tbody>\r\n<tr>\r\n<td><strong>Pfgfg</strong></td>\r\n<td><strong>Cfgfgfggst</strong></td>\r\n<td><strong>Reagggggglly?</strong></td>\r\n</tr>\r\n<tr>\r\n<td>TinyMCE</td>\r\n<td>Free</td>\r\n<td>YES!</td>\r\n</tr>\r\n<tr>\r\n<td>Plupload</td>\r\n<td>Free</td>\r\n<td>YES!</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>Enjoy our software and create great content!</p>\r\n<p>Oh, and by the way, don''t forget to check out our other product called <a href="http://www.plupload.com" target="_blank">Plupload</a>, your ultimate upload solution with HTML5 upload support!</p>', 1, '2014-10-28 09:48:54', 0),
(4, 'Testobjekt 4', 'Dies ist nicht Tino!', '<p>555</p>', 1, '2014-10-28 09:48:54', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nutzer`
--

CREATE TABLE IF NOT EXISTS `nutzer` (
`Nutzer_ID` int(10) unsigned NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Vorname` varchar(50) NOT NULL,
  `Passwort` varchar(25) NOT NULL,
  `EMail` varchar(255) NOT NULL,
  `Deaktiviert` int(1) NOT NULL,
  `Rechte` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `nutzer`
--

INSERT INTO `nutzer` (`Nutzer_ID`, `Name`, `Vorname`, `Passwort`, `EMail`, `Deaktiviert`, `Rechte`, `Timestamp`) VALUES
(1, 'Testuser', '', 'test', '', 0, 9, '2014-10-27 10:50:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inhalt`
--
ALTER TABLE `inhalt`
 ADD PRIMARY KEY (`Text_ID`);

--
-- Indexes for table `nutzer`
--
ALTER TABLE `nutzer`
 ADD PRIMARY KEY (`Nutzer_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inhalt`
--
ALTER TABLE `inhalt`
MODIFY `Text_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nutzer`
--
ALTER TABLE `nutzer`
MODIFY `Nutzer_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
