-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 11:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fspproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `idachievement` int(11) NOT NULL,
  `idteam` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`idachievement`, `idteam`, `name`, `date`, `description`) VALUES
(1, 1, 'terminator 1', '2022-01-08', 'juara 1'),
(2, 1, 'maniac 1', '2020-01-15', 'juara 2'),
(3, 1, 'headshot 1', '2022-01-08', 'juara 3'),
(4, 2, 'gunner 1', '2020-11-11', 'juara 3'),
(5, 2, 'rusher 1', '2020-03-05', 'terminator'),
(6, 2, 'terminator 1', '2021-01-25', 'juara 2'),
(7, 3, 'rusher 1', '2021-11-05', 'rusher'),
(8, 3, 'headshot 1', '2022-03-22', 'juara 3'),
(9, 3, 'rusher 1', '2021-09-17', 'terminator'),
(11, 4, 'gunner 1', '2022-05-13', 'juara 1'),
(12, 4, 'terminator 1', '2020-06-10', 'rusher'),
(13, 4, 'rusher 1', '2020-07-07', 'terminator'),
(14, 5, 'maniac 1', '2024-11-11', 'juara 3'),
(15, 5, 'gunner 1', '2021-03-03', 'rusher'),
(16, 5, 'headshot 1', '2022-01-08', 'juara 2'),
(17, 6, 'rusher 1', '2021-08-11', 'juara 3'),
(18, 6, 'terminator 1', '2023-02-28', 'rusher'),
(19, 6, 'gunner 1', '2020-08-19', 'terminator'),
(20, 7, 'maniac 1', '2024-09-30', 'juara 3'),
(21, 7, 'rusher 1', '2021-02-20', 'rusher'),
(22, 7, 'maniac 1', '2023-01-10', 'juara 1'),
(23, 8, 'rusher 1', '2022-12-30', 'rusher'),
(24, 8, 'headshot 1', '2023-06-12', 'juara 2'),
(25, 8, 'terminator 1', '2024-07-23', 'juara 3'),
(26, 9, 'rusher 1', '2022-10-21', 'juara 1'),
(27, 9, 'maniac 1', '2023-09-25', 'juara 2'),
(28, 9, 'rusher 1', '2022-07-25', 'maniac'),
(29, 1, 'gunner 1', '2021-04-30', 'terminator'),
(30, 2, 'maniac 1', '2024-06-05', 'maniac'),
(31, 3, 'gunner 1', '2023-08-19', 'juara 1'),
(32, 4, 'rusher 1', '2021-07-15', 'maniac'),
(33, 5, 'maniac 1', '2024-03-16', 'juara 2'),
(34, 6, 'gunner 1', '2023-11-12', 'terminator'),
(35, 7, 'headshot 1', '2024-02-14', 'maniac'),
(36, 8, 'terminator 1', '2023-10-01', 'juara 1');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `idevent` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`idevent`, `name`, `date`, `description`) VALUES
(1, 'perang dunia 3', '2024-08-29', 'event antar kota'),
(2, 'sky game', '2020-01-15', 'event nasional'),
(3, 'unlock limit', '2024-08-29', 'event internasional'),
(4, 'UEL', '2020-12-25', 'event antar kota'),
(5, 'PEL', '2021-02-20', 'event nasional'),
(6, 'esport expo', '2021-07-15', 'event internasional'),
(7, 'brush strike', '2021-11-05', 'event antar kota'),
(8, 'mlbb gas', '2022-03-22', 'event nasional'),
(9, 'pinc', '2022-08-09', 'event internasional'),
(10, 'punc', '2022-12-30', 'event internasional'),
(11, 'legion king', '2023-01-10', 'event pemerintah'),
(12, 'fire fight', '2023-05-18', 'event pemerintah'),
(13, 'hancur expo', '2023-10-01', 'event antar kota'),
(14, 'acer game', '2024-02-14', 'event nasional'),
(15, 'pemanasan expo', '2024-07-23', 'event internasional'),
(16, 'solo expo', '2021-01-25', 'event pemerintah'),
(17, 'rog expo', '2023-09-25', 'event antar kota'),
(18, 'cbogame', '2023-09-25', 'event pemerintah'),
(19, 'sky expo', '2023-06-12', 'event pemerintah'),
(20, 'game inferno', '2023-09-25', 'event antar kota'),
(21, 'gism', '2024-06-05', 'event pemerintah'),
(22, 'rog launch', '2024-09-30', 'event nasional'),
(23, 'ggwp', '2020-03-05', 'event nasional'),
(24, 'anjur', '2020-08-19', 'event internasional'),
(25, 'gulat game', '2020-11-11', 'event antar kota'),
(26, 'giyas', '2021-09-25', 'event nasional'),
(27, 'ggrena', '2021-01-25', 'event nasional');

-- --------------------------------------------------------

--
-- Table structure for table `event_teams`
--

CREATE TABLE `event_teams` (
  `idevent` int(11) NOT NULL,
  `idteam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `event_teams`
--

INSERT INTO `event_teams` (`idevent`, `idteam`) VALUES
(1, 1),
(1, 2),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 1),
(11, 2),
(12, 3),
(13, 4),
(14, 5),
(15, 6),
(16, 7),
(17, 8),
(18, 9),
(19, 1),
(20, 2),
(21, 3),
(22, 4),
(23, 5),
(24, 6),
(25, 7),
(26, 8),
(27, 9);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `idgame` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`idgame`, `name`, `description`) VALUES
(1, 'warthunder', 'game perang'),
(2, 'coc', 'game strategi'),
(3, 'dota', 'game moba'),
(4, 'warship', 'game simulasi'),
(5, 'mlbb', 'game moba'),
(6, 'pubg', 'game battle royal'),
(7, 'harvest moon', 'game memasak'),
(8, 'basara', 'game kerajaan'),
(9, 'takken', 'game fighting');

-- --------------------------------------------------------

--
-- Table structure for table `join_proposal`
--

CREATE TABLE `join_proposal` (
  `idjoin_proposal` int(11) NOT NULL,
  `idmember` int(11) NOT NULL,
  `idteam` int(11) NOT NULL,
  `description` varchar(100) DEFAULT 'role preference: support, attacker, dll',
  `status` enum('waiting','approved','rejected') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `join_proposal`
--

INSERT INTO `join_proposal` (`idjoin_proposal`, `idmember`, `idteam`, `description`, `status`) VALUES
(1, 1, 1, 'proposal add', 'waiting'),
(2, 2, 1, 'acc', 'approved'),
(3, 3, 1, 'revision', 'rejected'),
(4, 4, 2, 'proposal add', 'waiting'),
(5, 5, 2, 'acc', 'approved'),
(6, 6, 2, 'revision', 'rejected'),
(7, 7, 3, 'proposal add', 'waiting'),
(8, 8, 3, 'acc', 'approved'),
(9, 9, 3, 'revision', 'rejected'),
(10, 10, 4, 'proposal add', 'waiting'),
(11, 11, 4, 'acc', 'approved'),
(12, 12, 4, 'revision', 'rejected'),
(13, 13, 5, 'proposal add', 'rejected'),
(14, 14, 5, 'acc', 'approved'),
(15, 15, 5, 'revision', 'rejected'),
(16, 16, 6, 'proposal add', 'waiting'),
(17, 17, 6, 'acc', 'approved'),
(18, 18, 6, 'revision', 'rejected'),
(19, 19, 7, 'proposal add', 'waiting'),
(20, 20, 7, 'acc', 'approved'),
(21, 21, 7, 'revision', 'rejected'),
(23, 23, 8, 'acc', 'approved'),
(24, 24, 8, 'revision', 'rejected'),
(25, 25, 9, 'proposal add', 'rejected'),
(26, 26, 9, 'acc', 'approved'),
(27, 27, 9, 'role preference: support, attacker, dll', 'rejected'),
(28, 240813, 1, 'Tank', 'waiting'),
(29, 240813, 8, 'Healer', 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `idmember` int(11) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `profile` enum('admin','member') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idmember`, `fname`, `lname`, `username`, `password`, `profile`) VALUES
(1, 'mikel', NULL, 'mikel', '123', 'admin'),
(2, 'fusiguro', 'megumi', 'fusiguro', '123', 'member'),
(3, 'charli', 'utina', 'charli', '123', 'admin'),
(4, 'daniel', 'abids', 'daniel', '123', 'admin'),
(5, 'beca', 'ando', 'beca', '123', 'member'),
(6, 'syahrul', 'mustaqim', 'syahrul', '123', 'member'),
(7, 'ana', 'bika', 'ana', '123', 'member'),
(8, 'liliana', 'wijaya', 'liliana', '123', 'admin'),
(9, 'agis', 'makmur', 'agis', '123', 'member'),
(10, 'agus', 'jaya', 'agus', '123', 'admin'),
(11, 'paiton', 'gas', 'paiton', '123', 'admin'),
(12, 'elon', 'tenami', 'elon', '123', 'member'),
(13, 'ica', 'sayang', 'ica', '123', 'member'),
(14, 'faisal', 'amram', 'faisal', '123', 'admin'),
(15, 'asmala', 'melanda', 'asmala', '123', 'member'),
(16, 'andik', 'firman', 'andik', '123', 'admin'),
(17, 'zainal', 'zainal', 'zainal', '123', 'admin'),
(18, 'yuna', 'pink', 'yuna', '123', 'admin'),
(19, 'zahra', 'ihra', 'zahra', '123', 'member'),
(20, 'xaviera', 'pinter', 'xaviera', '123', 'member'),
(21, 'zaki', 'zakat', 'zaki', '123', 'member'),
(23, 'member1', 'member1', 'member1', '456', 'member'),
(24, 'arif', 'abidin', 'arif', '123', 'member'),
(25, 'royyan', 'aulabih', 'royyanzz', '123', 'admin'),
(26, 'josua', 'malik', 'josua', '123', 'member'),
(27, 'anggi', 'rosa', 'rosana', '123', NULL),
(240813, 'user', 'member', 'user1', '/bL/LXYTwxyt+y3CSSl/Vw==', 'member'),
(240814, 'user', 'name', 'user2', '/bL/LXYTwxyt+y3CSSl/Vw==', 'member'),
(240815, 'user', 'name', 'user3', '/bL/LXYTwxyt+y3CSSl/Vw==', 'member'),
(240816, 'admin', 'name', 'admin2', '/bL/LXYTwxyt+y3CSSl/Vw==', 'admin'),
(240817, 'admin', 'name', 'admin3', '/bL/LXYTwxyt+y3CSSl/Vw==', 'admin'),
(240818, 'admin', 'name', 'admin1', '/bL/LXYTwxyt+y3CSSl/Vw==', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `idteam` int(11) NOT NULL,
  `idgame` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`idteam`, `idgame`, `name`) VALUES
(1, 9, 'inferno'),
(2, 8, 'brush'),
(3, 7, 'akang'),
(4, 6, 'nayon'),
(5, 5, 'nagoya'),
(6, 4, 'mac'),
(7, 3, 'rush'),
(8, 2, 'sky'),
(9, 1, 'down');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `idteam` int(11) NOT NULL,
  `idmember` int(11) NOT NULL,
  `description` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`idteam`, `idmember`, `description`) VALUES
(1, 1, 'flanker'),
(1, 2, 'platipus'),
(1, 3, 'gas'),
(2, 4, 'rusia'),
(2, 5, 'amerika'),
(2, 6, 'jerman'),
(3, 7, 'tank'),
(3, 8, 'rabit'),
(3, 9, 'best'),
(4, 10, 'perunggu'),
(4, 11, 'hindia'),
(4, 12, 'erk'),
(5, 13, 'tni'),
(5, 14, 'marine'),
(5, 15, 'uss'),
(6, 16, 'pesawat'),
(6, 17, 'terbang'),
(6, 18, 'tajam'),
(7, 19, 'melaju'),
(7, 20, 'mendaki'),
(7, 21, 'terjun'),
(8, 23, 'bangun'),
(8, 24, 'serang'),
(9, 25, 'mekanik'),
(9, 26, 'rush'),
(9, 27, 'heal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`idachievement`),
  ADD KEY `fk_achievement_team1_idx` (`idteam`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`idevent`);

--
-- Indexes for table `event_teams`
--
ALTER TABLE `event_teams`
  ADD PRIMARY KEY (`idevent`,`idteam`),
  ADD KEY `fk_event_has_team_team1_idx` (`idteam`),
  ADD KEY `fk_event_has_team_event1_idx` (`idevent`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`idgame`);

--
-- Indexes for table `join_proposal`
--
ALTER TABLE `join_proposal`
  ADD PRIMARY KEY (`idjoin_proposal`),
  ADD KEY `fk_join_proposal_member1_idx` (`idmember`),
  ADD KEY `fk_join_proposal_team1_idx` (`idteam`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idmember`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`idteam`),
  ADD KEY `fk_team_game1_idx` (`idgame`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`idteam`,`idmember`),
  ADD KEY `fk_team_has_member_member1_idx` (`idmember`),
  ADD KEY `fk_team_has_member_team_idx` (`idteam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievement`
--
ALTER TABLE `achievement`
  MODIFY `idachievement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `idevent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `idgame` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `join_proposal`
--
ALTER TABLE `join_proposal`
  MODIFY `idjoin_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `idmember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240819;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `idteam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievement`
--
ALTER TABLE `achievement`
  ADD CONSTRAINT `fk_achievement_team1` FOREIGN KEY (`idteam`) REFERENCES `team` (`idteam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_teams`
--
ALTER TABLE `event_teams`
  ADD CONSTRAINT `fk_event_has_team_event1` FOREIGN KEY (`idevent`) REFERENCES `event` (`idevent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_event_has_team_team1` FOREIGN KEY (`idteam`) REFERENCES `team` (`idteam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `join_proposal`
--
ALTER TABLE `join_proposal`
  ADD CONSTRAINT `fk_join_proposal_member1` FOREIGN KEY (`idmember`) REFERENCES `member` (`idmember`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_join_proposal_team1` FOREIGN KEY (`idteam`) REFERENCES `team` (`idteam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `fk_team_game1` FOREIGN KEY (`idgame`) REFERENCES `game` (`idgame`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `team_members`
--
ALTER TABLE `team_members`
  ADD CONSTRAINT `fk_team_has_member_member1` FOREIGN KEY (`idmember`) REFERENCES `member` (`idmember`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_team_has_member_team` FOREIGN KEY (`idteam`) REFERENCES `team` (`idteam`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
