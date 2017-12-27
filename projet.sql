-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-11-29 18:37:00
-- 服务器版本： 5.7.10
-- PHP Version: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet`
--

-- --------------------------------------------------------

--
-- 表的结构 `eleve_el`
--

CREATE TABLE `eleve_el` (
  `el_ID` varchar(100) NOT NULL,
  `el_NOM` varchar(100) NOT NULL,
  `el_PRENOM` varchar(100) NOT NULL,
  `el_MDP` varchar(100) NOT NULL,
  `el_GROUPE` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `eleve_el`
--

INSERT INTO `eleve_el` (`el_ID`, `el_NOM`, `el_PRENOM`, `el_MDP`, `el_GROUPE`) VALUES
('dupont.bernard@gmail.com', 'DUPONT', 'Bernard', '$2y$10$FNO3/OMHVbAoYlW1XMVZeecB1uGxxibtE5VOvBaJJeVGmRmzUuRZe', 8),
('fff', 'ffff', 'ffffff', '$2y$10$xIdqVQ6x/JixT.bybUx7cey6X5mK4i9ZuouMgCP45ND628mLfcDN.', 13),
('a', 'a', 'a', '$2y$10$y.odXN8GMsDxT5cqg5mKnORD9EL6Jkf0YDP5/sBz7CiGfZKeMZ3vW', 1);

-- --------------------------------------------------------

--
-- 表的结构 `enseignant_ens`
--

CREATE TABLE `enseignant_ens` (
  `ens_ID` varchar(100) NOT NULL,
  `ens_NOM` varchar(100) NOT NULL,
  `ens_PRENOM` varchar(100) NOT NULL,
  `ens_MDP` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `enseignant_ens`
--

INSERT INTO `enseignant_ens` (`ens_ID`, `ens_NOM`, `ens_PRENOM`, `ens_MDP`) VALUES
('jliu', 'LIU', 'Jixiong', '$2y$10$Wft3zD5EfwL2Wjey96FCv.MaCBnqdfrgYrHUxJBz3KZDRnqsf3vcq'),
('wtan', 'TAN', 'William', '$2y$10$i9baFBLKYvAg1fl1YXLe/O6PO04vEyhJObHVkHLENYPV3Zg0jU3um');

-- --------------------------------------------------------

--
-- 表的结构 `seance_sea`
--

CREATE TABLE `seance_sea` (
  `sea_TITRE` varchar(100) NOT NULL,
  `sea_ens_ID` varchar(100) NOT NULL,
  `sea_DATE` date NOT NULL,
  `sea_HEURE` time NOT NULL,
  `sea_DUREE` time NOT NULL,
  `sea_DUREE_SOU` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `seance_sea`
--

INSERT INTO `seance_sea` (`sea_TITRE`, `sea_ens_ID`, `sea_DATE`, `sea_HEURE`, `sea_DUREE`, `sea_DUREE_SOU`) VALUES
('aaa', 'w.tan.13', '2000-10-10', '12:20:00', '00:15:00', '00:00:00'),
('a', 'wtan', '0001-01-01', '11:01:00', '00:01:00', '00:00:00'),
('aaa', 'wtan', '0001-01-01', '01:01:00', '01:30:00', '01:05:00'),
('bbb', 'wtan', '0001-01-01', '01:01:00', '05:00:00', '01:00:00'),
('ccc', 'wtan', '0001-01-01', '01:01:00', '05:00:00', '01:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `soutenance_sou`
--

CREATE TABLE `soutenance_sou` (
  `sou_ID` int(11) NOT NULL,
  `sou_ens_ID` varchar(11) NOT NULL,
  `sou_el_ID` varchar(11) NOT NULL,
  `sou_DATE` date NOT NULL,
  `sou_HEURE` time NOT NULL,
  `sou_DUREE` time NOT NULL,
  `sou_CHOIX` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `soutenance_sou`
--

INSERT INTO `soutenance_sou` (`sou_ID`, `sou_ens_ID`, `sou_el_ID`, `sou_DATE`, `sou_HEURE`, `sou_DUREE`, `sou_CHOIX`) VALUES
(0, '2', '3', '2017-10-03', '05:27:47', '00:00:00', 0),
(1, 'wtan', 'blabla2', '2017-11-16', '07:13:00', '00:11:00', 0),
(2, 'wtan', ' ', '2017-11-14', '12:39:00', '00:37:00', 0),
(3, 'jliu', 'a', '2017-11-16', '13:59:00', '01:00:00', 0),
(4, 'jliu', 'a', '2017-11-13', '22:59:00', '07:37:00', 0),
(5, 'wtan', '0', '0001-01-01', '01:01:00', '01:05:00', 0),
(6, 'wtan', '0', '0001-01-01', '01:01:00', '01:00:00', 0),
(7, 'wtan', '0', '0001-01-01', '01:16:00', '01:00:00', 0),
(8, 'wtan', '0', '0001-01-01', '01:31:00', '01:00:00', 0),
(9, 'wtan', '0', '0001-01-01', '01:46:00', '01:00:00', 0),
(10, 'wtan', '0', '0001-01-01', '02:01:00', '01:00:00', 0),
(11, 'wtan', '0', '0001-01-01', '01:01:00', '01:00:00', 0),
(12, 'wtan', '0', '0001-01-01', '02:01:00', '01:00:00', 0),
(13, 'wtan', '0', '0001-01-01', '03:01:00', '01:00:00', 0),
(14, 'wtan', '0', '0001-01-01', '04:01:00', '01:00:00', 0),
(15, 'wtan', '0', '0001-01-01', '05:01:00', '01:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eleve_el`
--
ALTER TABLE `eleve_el`
  ADD PRIMARY KEY (`el_ID`);

--
-- Indexes for table `enseignant_ens`
--
ALTER TABLE `enseignant_ens`
  ADD PRIMARY KEY (`ens_ID`);

--
-- Indexes for table `soutenance_sou`
--
ALTER TABLE `soutenance_sou`
  ADD PRIMARY KEY (`sou_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
