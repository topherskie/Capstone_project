-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 07:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laliga_pilipinas`
--

-- --------------------------------------------------------

--
-- Table structure for table `basketball_court`
--

CREATE TABLE `basketball_court` (
  `bc_idno` int(10) NOT NULL,
  `user_idno` int(10) NOT NULL,
  `bc_img` varchar(250) NOT NULL,
  `bc_name` varchar(150) NOT NULL,
  `bc_rate` double NOT NULL,
  `bc_address` varchar(200) NOT NULL,
  `bc_desc` varchar(300) NOT NULL,
  `bc_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basketball_court`
--

INSERT INTO `basketball_court` (`bc_idno`, `user_idno`, `bc_img`, `bc_name`, `bc_rate`, `bc_address`, `bc_desc`, `bc_timestamp`) VALUES
(13, 9, 'blaziken.jpg', 'BAGI2X', 560, 'Banawa st', 'court is full of nice view', '2022-04-06 10:23:29'),
(25, 4, 'courtImage.jpg', 'pdfLABAN', 149, 'Basak Pardo', 'this is court test sample', '2022-05-09 16:23:51'),
(26, 4, 'court.png', 'GAJSKD', 130, 'SDJFKSDJ', 'SDJFKSDJKFKSDKF', '2022-05-09 16:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `basketball_teams`
--

CREATE TABLE `basketball_teams` (
  `team_idno` int(11) NOT NULL,
  `recruits_idno` int(11) NOT NULL,
  `team_name` varchar(30) NOT NULL,
  `event_name` varchar(30) NOT NULL,
  `team_logo` varchar(250) NOT NULL,
  `team_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basketball_teams`
--

INSERT INTO `basketball_teams` (`team_idno`, `recruits_idno`, `team_name`, `event_name`, `team_logo`, `team_timestamp`) VALUES
(1, 2, 'Jordan B', 'Palaro pang barangays', '262892364_947504486147959_5632842347657057738_n.jpg', '2022-05-11 17:18:52'),
(6, 14, 'Boston', 'Palaro pang barangays', 'boston_logo.jpg', '2022-05-08 04:05:00'),
(7, 11, 'Bucks', 'Palaro pang barangays', 'bucks_logo.png', '2022-05-08 05:43:05'),
(8, 16, 'Nets', 'Palaro pang barangays', 'nets_logo.png', '2022-05-08 15:31:30'),
(13, 18, 'UC', '', '', '2022-05-11 05:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `casual_matches`
--

CREATE TABLE `casual_matches` (
  `cm_idno` int(10) NOT NULL,
  `user_idno` int(10) NOT NULL,
  `cm_desc` varchar(300) NOT NULL,
  `cm_location` varchar(50) NOT NULL,
  `cm_date_posted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cm_date_game` date NOT NULL,
  `cm_start_time` time NOT NULL,
  `cm_end_time` time NOT NULL,
  `mr_fullname` varchar(30) NOT NULL,
  `match_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `casual_matches`
--

INSERT INTO `casual_matches` (`cm_idno`, `user_idno`, `cm_desc`, `cm_location`, `cm_date_posted`, `cm_date_game`, `cm_start_time`, `cm_end_time`, `mr_fullname`, `match_status`) VALUES
(44, 11, 'looknig for player to play with us!', 'Cebu City', '2022-05-10 04:03:09', '2022-04-27', '22:00:00', '07:10:00', '', 'Accept'),
(47, 12, 'hello broo', 'Naga City', '2022-05-10 05:47:28', '2022-04-05', '20:13:00', '18:09:00', '', ''),
(48, 12, 'looking 1 more member', 'Naga City', '2022-05-05 04:22:33', '2022-04-05', '20:13:00', '18:09:00', '', 'Accept'),
(49, 12, 'Who\'s up for 1 game? hit me up', 'Naga City', '2022-04-01 13:22:01', '2022-04-05', '20:13:00', '18:09:00', '', ''),
(55, 2, 'lookking 5v5', 'Bogo City', '2022-05-10 10:01:59', '2022-04-07', '15:56:00', '15:55:00', 'Christopher Sanchez', 'Accept'),
(57, 14, 'Hello world', 'Naga City', '2022-04-10 14:54:16', '2022-04-11', '02:21:00', '04:21:00', '', ''),
(59, 2, 'Play 5v5 game 59', 'Cebu City', '2022-05-10 01:43:09', '2022-05-26', '23:19:00', '23:20:00', '', ''),
(60, 2, 'post 60', 'Cebu City', '2022-05-10 01:56:45', '2022-05-26', '01:55:00', '12:58:00', '', ''),
(62, 11, 'post ni idno 11', 'Cebu City', '2022-05-10 04:22:09', '2022-05-25', '14:23:00', '00:22:00', 'Lebron James', '');

-- --------------------------------------------------------

--
-- Table structure for table `chat_routes`
--

CREATE TABLE `chat_routes` (
  `chat_idno` int(15) NOT NULL,
  `me` int(15) NOT NULL,
  `other` int(15) NOT NULL,
  `timestamps` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `me_name` varchar(30) NOT NULL,
  `other_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_routes`
--

INSERT INTO `chat_routes` (`chat_idno`, `me`, `other`, `timestamps`, `me_name`, `other_name`) VALUES
(64, 11, 4, '2022-05-09 18:25:57', 'Lebron James', 'Zaldy Amora'),
(65, 18, 4, '2022-05-11 06:01:04', 'Michael Jordan', 'Zaldy Amora'),
(66, 11, 9, '2022-05-11 11:15:27', 'Lebron James 2', 'dave delta');

-- --------------------------------------------------------

--
-- Table structure for table `chat_routes_players`
--

CREATE TABLE `chat_routes_players` (
  `chatp_idno` int(11) NOT NULL,
  `me` int(10) NOT NULL,
  `other` int(10) NOT NULL,
  `mep_name` varchar(30) NOT NULL,
  `otherp_name` varchar(30) NOT NULL,
  `chatp_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_routes_players`
--

INSERT INTO `chat_routes_players` (`chatp_idno`, `me`, `other`, `mep_name`, `otherp_name`, `chatp_timestamp`) VALUES
(6, 11, 2, 'Christopher Sanchez', 'Lebron James', '2022-05-09 18:43:28'),
(8, 16, 11, 'Lebron James 2', 'Kevin Durant', '2022-05-11 08:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `docs_organizer`
--

CREATE TABLE `docs_organizer` (
  `doc_idno` int(11) NOT NULL,
  `user_idno` int(11) NOT NULL,
  `player_name` varchar(35) NOT NULL,
  `doc_type` varchar(25) NOT NULL,
  `doc_file_name` varchar(50) NOT NULL,
  `doc_status` varchar(25) DEFAULT NULL,
  `doc_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `docs_organizer`
--

INSERT INTO `docs_organizer` (`doc_idno`, `user_idno`, `player_name`, `doc_type`, `doc_file_name`, `doc_status`, `doc_timestamp`) VALUES
(7, 2, 'Christopher Sanchez', 'driver license', 'How to Write Chapter 2 (1).pdf', 'accepted', '2022-04-18 16:26:08'),
(10, 14, 'Lee Wong', 'passport', 'How to Write Chapter 2 (1).pdf', 'accepted', '2022-04-20 06:34:15'),
(11, 11, 'Lebron James', 'philhealth', '1A.jpg', 'accepted', '2022-04-27 10:19:26'),
(12, 12, 'abc abcabc', 'philhealth', 'How to Write Chapter 2 (1).pdf', 'accepted', '2022-05-03 11:33:47'),
(13, 19, 'Alpha Bravo', 'nbi', 'studyLoad2022.pdf', 'accepted', '2022-05-11 06:28:57'),
(14, 19, 'Alpha Bravo', 'nbi', 'studyLoad2022.pdf', 'pending', '2022-05-11 06:29:04'),
(15, 20, 'testfirstname testlastname', 'philhealth', 'How to Write Chapter 2 (1) (1).pdf', 'accepted', '2022-05-12 03:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `match_requesters`
--

CREATE TABLE `match_requesters` (
  `mr_idno` int(10) NOT NULL,
  `requester_idno` int(10) NOT NULL,
  `cm_idnos` int(11) DEFAULT NULL,
  `user_idno` int(11) NOT NULL,
  `mr_date_requested` date NOT NULL,
  `mr_status` varchar(25) DEFAULT NULL,
  `cm_fullname` varchar(30) NOT NULL,
  `ses_fullname` varchar(30) NOT NULL,
  `cm_about` varchar(30) NOT NULL,
  `requester_email` varchar(30) NOT NULL,
  `mr_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `match_requesters`
--

INSERT INTO `match_requesters` (`mr_idno`, `requester_idno`, `cm_idnos`, `user_idno`, `mr_date_requested`, `mr_status`, `cm_fullname`, `ses_fullname`, `cm_about`, `requester_email`, `mr_timestamp`) VALUES
(91, 11, 55, 2, '2022-04-07', 'Accept', 'Christopher Sanchez', 'Lebron James 2', 'lookking 5v5', 'tinikculture@gmail.com', '2022-05-10 10:03:54'),
(92, 19, 49, 12, '2022-04-05', 'pending', '', 'Alpha Bravo', 'Who', 'alpha@gmail.com', '2022-05-11 06:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `payment_court_tracker`
--

CREATE TABLE `payment_court_tracker` (
  `paybook_idno` int(11) NOT NULL,
  `user_idno` int(11) NOT NULL,
  `co_idno` int(11) NOT NULL,
  `booking_idno` int(11) NOT NULL,
  `paymentbook_source` varchar(100) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `purpose` varchar(25) NOT NULL,
  `paybook_amount` decimal(10,0) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `paybook_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_tracker`
--

CREATE TABLE `payment_tracker` (
  `payment_idno` int(10) NOT NULL,
  `user_idno` int(10) NOT NULL,
  `user_username` varchar(25) NOT NULL,
  `payment_source` varchar(250) NOT NULL,
  `date_sub_started` date NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `purpose` varchar(30) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `subscription_duration` int(11) NOT NULL,
  `timestamping` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_tracker`
--

INSERT INTO `payment_tracker` (`payment_idno`, `user_idno`, `user_username`, `payment_source`, `date_sub_started`, `payment_type`, `purpose`, `payment_amount`, `payment_status`, `subscription_duration`, `timestamping`) VALUES
(40, 2, 'topher', 'https://test-sources.paymongo.com/sources?id=src_mgig21pDDPGKmVUzUQswS6eb', '2022-04-15', 'gcash', 'subscription', 125, 'success', 30, '2022-04-15 13:10:50'),
(43, 11, 'lbj23', 'https://test-sources.paymongo.com/sources?id=src_cCetsfg9LkKosZgoiEQut1SL', '2022-04-15', 'gcash', 'subscription', 125, 'success', 30, '2022-04-15 17:52:22'),
(44, 14, 'lee', 'https://test-sources.paymongo.com/sources?id=src_QsGn2RmoN4KXUz2S9gLrdwdH', '2022-04-16', 'gcash', 'subscription', 125, 'success', 30, '2022-04-16 06:51:27'),
(45, 17, 'bob', 'https://test-sources.paymongo.com/sources?id=src_rqLB81gnTWKfNHjwB39C66xY', '2022-04-30', 'gcash', 'subscription', 125, 'success', 30, '2022-04-30 05:28:24'),
(46, 12, 'abc123', 'https://test-sources.paymongo.com/sources?id=src_Pdf3VWjR51Ep3zG7w2Zbo1PS', '2022-05-05', 'gcash', 'subscription', 125, 'success', 30, '2022-05-05 06:15:09'),
(47, 16, 'durant', 'https://test-sources.paymongo.com/sources?id=src_kq3v8S8o77tEesE9kTT1rd6V', '2022-05-09', 'gcash', 'subscription', 125, 'success', 30, '2022-05-09 07:37:21'),
(48, 18, 'jordan123', 'https://test-sources.paymongo.com/sources?id=src_arnWZiJgWV1cDq9RPZMdCXyX', '2022-05-11', 'gcash', 'subscription', 125, 'success', 30, '2022-05-11 03:54:34'),
(49, 19, 'alpha', 'https://test-sources.paymongo.com/sources?id=src_b6yGzwm2udseVsCKBXiCEZZx', '2022-05-11', 'gcash', 'subscription', 125, 'success', 30, '2022-05-11 06:12:12'),
(50, 20, 'test', 'https://test-sources.paymongo.com/sources?id=src_kfMv5GzbWyn4VNxL3Zt7pYTh', '2022-05-12', 'gcash', 'subscription', 125, 'success', 30, '2022-05-12 02:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `player_stats`
--

CREATE TABLE `player_stats` (
  `stat_idno` int(11) NOT NULL,
  `user_idnoStats` int(11) NOT NULL,
  `player_name` varchar(30) NOT NULL,
  `stat_pts` int(10) NOT NULL,
  `stat_reb` int(10) NOT NULL,
  `stat_ast` int(10) NOT NULL,
  `stat_tov` int(10) NOT NULL,
  `stat_stl` int(10) NOT NULL,
  `stat_blk` int(11) NOT NULL,
  `round_games` varchar(30) NOT NULL,
  `game_award` varchar(30) NOT NULL,
  `event_name` varchar(30) NOT NULL,
  `event_gameType` varchar(30) NOT NULL,
  `event_date` varchar(30) NOT NULL,
  `stat_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_stats`
--

INSERT INTO `player_stats` (`stat_idno`, `user_idnoStats`, `player_name`, `stat_pts`, `stat_reb`, `stat_ast`, `stat_tov`, `stat_stl`, `stat_blk`, `round_games`, `game_award`, `event_name`, `event_gameType`, `event_date`, `stat_timestamp`) VALUES
(38, 14, 'Lee Wong', 12, 21, 1, 1, 1, 1, '1st Game', 'None', 'Palaro pang barangays', 'Single Elimnation', '2022-05-27 08:10:00', '2022-05-08 14:22:58'),
(39, 14, 'Lee Wong', 12, 21, 2, 1, 12, 21, '2nd Game', 'Most Defensive Player', 'Palaro pang barangays', 'Single Elimnation', '2022-05-27 08:10:00', '2022-05-08 14:23:13'),
(40, 14, 'Lee Wong', 2, 0, 2, 3, 4, 1, '2nd Game', 'None', 'Palaro pang barangays', 'Single Elimnation', '2022-05-27 08:10:00', '2022-05-08 14:23:28'),
(41, 2, 'Christopher Sanchez', 31, 21, 2, 4, 2, 12, '2nd Game', 'Most Defensive Player', 'Palaro pang barangays', 'Single Elimnation', '2022-05-27 08:10:00', '2022-05-08 14:43:13'),
(44, 2, 'Christopher Sanchez', 21, 2, 23, 21, 23, 1, '1st Game', 'MVP', 'Palaro pang barangays', 'Single Elimnation', '2022-05-27 08:10:00', '2022-05-08 16:23:03'),
(45, 14, 'Lee Wong', 21, 22, 21, 21, 22, 1, 'Final Game', 'Most Defensive Player', 'Palaro pang barangays', 'Single Elimnation', '2022-05-27 08:10:00', '2022-05-08 17:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `promote_tournament`
--

CREATE TABLE `promote_tournament` (
  `event_idno` int(11) NOT NULL,
  `user_idno` int(11) NOT NULL,
  `event_name` varchar(35) NOT NULL,
  `event_about` varchar(55) NOT NULL,
  `event_maxteam` varchar(30) NOT NULL,
  `event_start` datetime NOT NULL,
  `event_gametype` varchar(35) NOT NULL,
  `promo_status` varchar(30) NOT NULL,
  `event_imgbanner` varchar(60) NOT NULL,
  `event_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promote_tournament`
--

INSERT INTO `promote_tournament` (`event_idno`, `user_idno`, `event_name`, `event_about`, `event_maxteam`, `event_start`, `event_gametype`, `promo_status`, `event_imgbanner`, `event_timestamp`) VALUES
(18, 12, 'Palaro pang barangays', 'Promoting youth player', '4', '2022-05-27 08:10:00', 'Single Elimnation', 'Finished', 'basketball-switch-hero.jpg', '2022-05-09 08:49:24'),
(21, 12, 'test games', 'test games', '4', '2022-05-02 00:00:00', 'Single Elimination', '', 'court.png', '2022-05-08 14:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `recruit_inivites`
--

CREATE TABLE `recruit_inivites` (
  `invite_idno` int(11) NOT NULL,
  `recruit_idno` int(11) NOT NULL,
  `player_idno` int(11) NOT NULL,
  `player_name` varchar(50) NOT NULL,
  `player_position` varchar(15) NOT NULL,
  `invite_status` varchar(25) NOT NULL,
  `team` varchar(50) NOT NULL,
  `team_idnos` int(11) NOT NULL,
  `requester_email` varchar(30) NOT NULL,
  `ses_email` varchar(30) NOT NULL,
  `invite_timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recruit_inivites`
--

INSERT INTO `recruit_inivites` (`invite_idno`, `recruit_idno`, `player_idno`, `player_name`, `player_position`, `invite_status`, `team`, `team_idnos`, `requester_email`, `ses_email`, `invite_timestamp`) VALUES
(11, 2, 14, 'Lee Wong', 'Small Forward', 'accept', 'Lakers', 1, '', '', '2022-04-18 11:15:56'),
(13, 2, 12, 'abc abcabc', 'Center', 'accept', 'Lakers', 1, '', '', '2022-05-03 19:17:51'),
(17, 11, 12, 'Abers Miller', 'Power Forward', 'accept', '', 7, '', '', '2022-05-09 15:26:35'),
(18, 16, 17, 'bob123 Ortiz', 'Shooting Guard', 'accept', 'Nets', 8, '', '', '2022-05-09 15:37:48'),
(34, 2, 11, 'Lebron James 2', '', 'pending', '', 0, 'tinikculture@gmail.com', 'tophersanchez777@gmail.com', '2022-05-12 14:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `reservations_data`
--

CREATE TABLE `reservations_data` (
  `res_idno` int(11) NOT NULL,
  `bc_idno` int(11) NOT NULL,
  `co_idno` int(11) NOT NULL,
  `user_idno` int(11) NOT NULL,
  `res_date` datetime NOT NULL,
  `res_start_time` time NOT NULL,
  `res_end_time` time NOT NULL,
  `res_total_payment` decimal(11,2) NOT NULL,
  `res_hrs_duration` decimal(11,2) NOT NULL,
  `res_status` varchar(25) NOT NULL,
  `res_address` varchar(100) NOT NULL,
  `res_courtname` varchar(50) NOT NULL,
  `res_revenue` decimal(11,2) NOT NULL,
  `requester_reserve_email` varchar(30) NOT NULL,
  `court_owner_email` varchar(30) NOT NULL,
  `res_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `res_time_approved` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations_data`
--

INSERT INTO `reservations_data` (`res_idno`, `bc_idno`, `co_idno`, `user_idno`, `res_date`, `res_start_time`, `res_end_time`, `res_total_payment`, `res_hrs_duration`, `res_status`, `res_address`, `res_courtname`, `res_revenue`, `requester_reserve_email`, `court_owner_email`, `res_timestamp`, `res_time_approved`) VALUES
(18, 13, 9, 2, '2022-06-02 00:00:00', '17:12:00', '05:12:00', '6720.00', '12.00', 'success', 'Banawa st', 'BAGI2X', '0.00', '', '0', '2022-05-03 04:14:45', '0000-00-00 00:00:00'),
(20, 16, 4, 14, '2022-05-23 00:00:00', '15:31:00', '16:35:00', '128.00', '1.00', 'success', 'Basak Pardo Main roads', 'Don Jose basketball Court', '0.00', '', '0', '2022-05-08 04:37:49', '0000-00-00 00:00:00');

--
-- Triggers `reservations_data`
--
DELIMITER $$
CREATE TRIGGER `bckup_reservation_data` AFTER INSERT ON `reservations_data` FOR EACH ROW BEGIN
INSERT INTO reservations_data_history
VALUES(NEW.res_idno, NEW.bc_idno, NEW.co_idno, NEW.user_idno, NEW.res_date, NEW.res_start_time, NEW.res_end_time, NEW.res_total_payment, NEW.res_hrs_duration, NEW.res_status, NEW.res_address, NEW.res_courtname, NEW.res_timestamp, NEW.res_time_approved);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reservations_data_history`
--

CREATE TABLE `reservations_data_history` (
  `res_idno` int(11) NOT NULL,
  `bc_idno` int(11) NOT NULL,
  `co_idno` int(11) NOT NULL,
  `user_idno` int(11) NOT NULL,
  `res_date` datetime NOT NULL,
  `res_start_time` time NOT NULL,
  `res_end_time` time NOT NULL,
  `res_total_payment` decimal(10,0) NOT NULL,
  `res_hrs_duration` decimal(10,0) NOT NULL,
  `res_status` varchar(25) NOT NULL,
  `res_address` varchar(100) NOT NULL,
  `res_courtname` varchar(50) NOT NULL,
  `res_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `res_time_approved` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations_data_history`
--

INSERT INTO `reservations_data_history` (`res_idno`, `bc_idno`, `co_idno`, `user_idno`, `res_date`, `res_start_time`, `res_end_time`, `res_total_payment`, `res_hrs_duration`, `res_status`, `res_address`, `res_courtname`, `res_timestamp`, `res_time_approved`) VALUES
(18, 13, 9, 2, '2022-06-02 00:00:00', '17:12:00', '05:12:00', '6720', '12', 'pending', 'Banawa st', 'BAGI2X', '2022-05-03 04:07:36', '0000-00-00 00:00:00'),
(20, 16, 4, 14, '2022-05-23 00:00:00', '15:31:00', '16:35:00', '128', '1', 'pending', 'Basak Pardo Main roads', 'Don Jose basketball Court', '2022-05-08 04:31:45', '0000-00-00 00:00:00'),
(21, 13, 9, 11, '2022-05-24 00:00:00', '14:33:00', '16:33:00', '1120', '2', 'decline', 'Banawa st', 'BAGI2X', '2022-05-10 17:22:01', '0000-00-00 00:00:00'),
(22, 13, 9, 11, '2022-05-30 00:00:00', '05:23:00', '18:26:00', '7308', '13', 'pending', 'Banawa st', 'BAGI2X', '2022-05-10 17:23:33', '0000-00-00 00:00:00'),
(23, 13, 9, 2, '2022-05-25 00:00:00', '20:10:00', '22:11:00', '1129', '2', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 09:14:52', '0000-00-00 00:00:00'),
(24, 13, 9, 11, '2022-05-19 00:00:00', '10:17:00', '12:19:00', '1139', '2', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 11:19:39', '0000-00-00 00:00:00'),
(25, 13, 9, 11, '2022-06-01 00:00:00', '08:32:00', '10:34:00', '1139', '2', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 11:31:43', '0000-00-00 00:00:00'),
(26, 13, 9, 11, '2022-05-27 00:00:00', '20:34:00', '09:36:00', '6141', '11', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 11:34:42', '0000-00-00 00:00:00'),
(27, 13, 9, 11, '2022-05-27 00:00:00', '20:34:00', '09:36:00', '6141', '11', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 11:38:06', '0000-00-00 00:00:00'),
(28, 25, 4, 11, '2022-05-16 00:00:00', '20:39:00', '22:42:00', '305', '2', 'pending', 'Basak Pardo', 'pdfLABAN', '2022-05-11 11:39:20', '0000-00-00 00:00:00'),
(29, 13, 9, 11, '2022-05-22 00:00:00', '00:52:00', '13:53:00', '7289', '13', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 11:47:18', '0000-00-00 00:00:00'),
(30, 13, 9, 11, '2022-05-25 00:00:00', '21:50:00', '22:53:00', '588', '1', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 11:51:13', '0000-00-00 00:00:00'),
(31, 13, 9, 11, '2022-05-23 00:00:00', '21:52:00', '23:53:00', '1129', '2', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 11:53:55', '0000-00-00 00:00:00'),
(32, 13, 9, 11, '2022-06-01 00:00:00', '13:54:00', '12:59:00', '513', '1', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 11:58:25', '0000-00-00 00:00:00'),
(33, 13, 9, 11, '2022-05-16 00:00:00', '20:59:00', '22:01:00', '579', '1', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 11:59:00', '0000-00-00 00:00:00'),
(34, 13, 9, 11, '2022-05-17 00:00:00', '21:09:00', '22:10:00', '569', '1', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 12:08:14', '0000-00-00 00:00:00'),
(35, 13, 9, 11, '2022-05-24 00:00:00', '09:23:00', '11:25:00', '1139', '2', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 12:22:47', '0000-00-00 00:00:00'),
(36, 13, 9, 11, '2022-05-30 00:00:00', '10:51:00', '12:54:00', '1148', '2', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 12:50:27', '0000-00-00 00:00:00'),
(37, 13, 9, 11, '2022-05-16 00:00:00', '11:55:00', '14:59:00', '1717', '3', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 12:53:50', '0000-00-00 00:00:00'),
(38, 13, 9, 11, '2022-05-24 00:00:00', '09:55:00', '10:56:00', '569', '1', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 12:54:34', '0000-00-00 00:00:00'),
(39, 13, 9, 11, '2022-05-17 00:00:00', '09:56:00', '13:57:00', '2249', '4', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 12:55:09', '0000-00-00 00:00:00'),
(40, 13, 9, 11, '2022-05-30 00:00:00', '10:05:00', '12:07:00', '1139', '2', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 13:04:25', '0000-00-00 00:00:00'),
(41, 13, 9, 11, '2022-05-17 00:00:00', '11:08:00', '12:09:00', '569', '1', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 13:06:51', '0000-00-00 00:00:00'),
(42, 13, 9, 11, '2022-05-24 00:00:00', '11:11:00', '15:15:00', '2277', '4', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 13:09:09', '0000-00-00 00:00:00'),
(43, 13, 9, 11, '2022-05-16 00:00:00', '23:13:00', '12:13:00', '6160', '11', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 13:11:40', '0000-00-00 00:00:00'),
(44, 13, 9, 11, '2022-05-24 00:00:00', '10:13:00', '14:17:00', '2277', '4', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 13:12:41', '0000-00-00 00:00:00'),
(45, 13, 9, 11, '2022-05-22 00:00:00', '14:18:00', '15:20:00', '579', '1', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 13:14:54', '0000-00-00 00:00:00'),
(46, 13, 9, 11, '2022-05-25 00:00:00', '14:18:00', '14:24:00', '56', '0', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 13:18:41', '0000-00-00 00:00:00'),
(47, 13, 9, 11, '2022-05-23 00:00:00', '23:21:00', '01:21:00', '12320', '22', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 13:20:32', '0000-00-00 00:00:00'),
(48, 13, 9, 11, '2022-05-26 00:00:00', '12:24:00', '03:27:00', '5012', '9', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 13:22:57', '0000-00-00 00:00:00'),
(49, 13, 9, 11, '2022-05-25 00:00:00', '10:25:00', '14:29:00', '2277', '4', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 13:24:58', '0000-00-00 00:00:00'),
(50, 13, 9, 11, '2022-05-25 00:00:00', '11:30:00', '15:31:00', '2249', '4', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 13:28:33', '0000-00-00 00:00:00'),
(51, 13, 9, 11, '2022-05-24 00:00:00', '10:31:00', '15:39:00', '2875', '5', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 13:30:19', '0000-00-00 00:00:00'),
(52, 13, 9, 11, '2022-05-18 00:00:00', '10:33:00', '14:37:00', '2277', '4', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 15:08:11', '0000-00-00 00:00:00'),
(53, 13, 9, 11, '2022-05-19 00:00:00', '15:32:00', '17:34:00', '1139', '2', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 15:28:47', '0000-00-00 00:00:00'),
(54, 13, 9, 11, '2022-05-25 00:00:00', '13:41:00', '13:45:00', '37', '0', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 15:44:11', '0000-00-00 00:00:00'),
(55, 13, 9, 11, '2022-05-31 00:00:00', '12:48:00', '13:49:00', '569', '1', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 15:48:21', '0000-00-00 00:00:00'),
(56, 13, 9, 11, '2022-05-31 00:00:00', '16:50:00', '17:56:00', '616', '1', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 15:51:08', '0000-00-00 00:00:00'),
(57, 13, 9, 11, '2022-05-27 00:00:00', '12:53:00', '13:54:00', '569', '1', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 15:53:22', '0000-00-00 00:00:00'),
(58, 13, 9, 11, '2022-05-18 00:00:00', '15:54:00', '04:58:00', '6123', '11', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 15:55:36', '0000-00-00 00:00:00'),
(59, 13, 9, 11, '2022-05-27 00:00:00', '00:00:00', '03:03:00', '1708', '3', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 16:00:20', '0000-00-00 00:00:00'),
(60, 13, 9, 11, '2022-05-09 00:00:00', '13:02:00', '16:05:00', '1708', '3', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 16:01:22', '0000-00-00 00:00:00'),
(61, 13, 9, 11, '2022-05-23 00:00:00', '14:05:00', '17:08:00', '1708', '3', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 16:04:47', '0000-00-00 00:00:00'),
(62, 13, 9, 11, '2022-05-17 00:00:00', '14:08:00', '14:08:00', '0', '0', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 16:07:37', '0000-00-00 00:00:00'),
(63, 13, 9, 11, '2022-05-26 00:00:00', '14:10:00', '17:14:00', '1717', '3', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 16:11:54', '0000-00-00 00:00:00'),
(64, 13, 9, 11, '2022-06-02 00:00:00', '05:14:00', '12:13:00', '3911', '7', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 16:12:56', '0000-00-00 00:00:00'),
(65, 13, 9, 11, '2022-06-10 00:00:00', '04:18:00', '15:17:00', '6151', '11', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 16:14:17', '0000-00-00 00:00:00'),
(66, 25, 4, 11, '2022-06-08 00:00:00', '04:17:00', '16:17:00', '1788', '12', 'pending', 'Basak Pardo', 'pdfLABAN', '2022-05-11 16:17:24', '0000-00-00 00:00:00'),
(67, 13, 9, 11, '2022-05-09 00:00:00', '15:18:00', '12:22:00', '1643', '3', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 16:19:36', '0000-00-00 00:00:00'),
(68, 13, 9, 11, '2022-06-02 00:00:00', '04:29:00', '03:33:00', '523', '1', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 16:33:01', '0000-00-00 00:00:00'),
(69, 13, 9, 11, '2022-05-10 00:00:00', '15:35:00', '14:39:00', '523', '1', 'decline', 'Banawa st', 'BAGI2X', '2022-05-11 16:35:54', '0000-00-00 00:00:00'),
(70, 13, 9, 11, '2022-05-17 00:00:00', '02:39:00', '14:37:00', '6701', '12', 'pending', 'Banawa st', 'BAGI2X', '2022-05-11 16:37:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(11) NOT NULL,
  `event_idno` int(11) NOT NULL,
  `team_name` varchar(50) NOT NULL,
  `1st_quarter` int(11) NOT NULL,
  `2nd_quarter` int(11) NOT NULL,
  `3rd_quarter` int(11) NOT NULL,
  `4th_quarter` int(11) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `event_type` varchar(50) NOT NULL,
  `team_logo` varchar(250) NOT NULL,
  `team_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_idno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `event_idno`, `team_name`, `1st_quarter`, `2nd_quarter`, `3rd_quarter`, `4th_quarter`, `event_name`, `event_type`, `team_logo`, `team_timestamp`, `user_idno`) VALUES
(353, 18, 'Lakers', 21, 12, 21, 31, '', '', 'lakers.jpg', '2022-05-08 17:24:09', 12),
(354, 18, 'Boston', 21, 1, 23, 12, '', '', 'boston_logo.jpg', '2022-05-08 17:23:51', 12),
(355, 18, 'Bucks', 21, 23, 21, 45, '', '', 'bucks_logo.png', '2022-05-08 17:23:59', 12),
(356, 18, 'Nets', 21, 2, 21, 21, '', '', 'nets_logo.png', '2022-05-08 17:24:17', 12);

-- --------------------------------------------------------

--
-- Table structure for table `team_finals`
--

CREATE TABLE `team_finals` (
  `tf_idno` int(11) NOT NULL,
  `event_idno` int(11) NOT NULL,
  `tf_name` varchar(25) NOT NULL,
  `one_score` int(11) DEFAULT NULL,
  `two_score` int(11) NOT NULL,
  `three_score` int(11) NOT NULL,
  `four_score` int(11) NOT NULL,
  `tf_finalScore` int(11) DEFAULT NULL,
  `game_result` varchar(25) DEFAULT NULL,
  `tf_logo` varchar(250) NOT NULL,
  `tf_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_idno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_finals`
--

INSERT INTO `team_finals` (`tf_idno`, `event_idno`, `tf_name`, `one_score`, `two_score`, `three_score`, `four_score`, `tf_finalScore`, `game_result`, `tf_logo`, `tf_timestamp`, `user_idno`) VALUES
(119, 18, 'Lakers', 12, 21, 21, 34, 88, 'Win', 'lakers.jpg', '2022-05-09 05:33:17', 0),
(120, 18, 'Bucks', 12, 21, 21, 12, 66, 'Lose', 'bucks_logo.png', '2022-05-09 05:33:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_idno` int(10) NOT NULL,
  `user_type` varchar(25) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_username` varchar(25) NOT NULL,
  `user_password` varchar(25) NOT NULL,
  `user_fname` varchar(25) NOT NULL,
  `user_mname` varchar(25) NOT NULL,
  `user_lname` varchar(25) NOT NULL,
  `user_dob` date NOT NULL,
  `city` varchar(50) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `user_gender` varchar(25) NOT NULL,
  `user_contact_no` varchar(40) NOT NULL,
  `user_date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `img_profile` varchar(50) NOT NULL,
  `hl_moments` varchar(250) NOT NULL,
  `user_type_upgrade` varchar(25) NOT NULL,
  `quality_status` varchar(30) NOT NULL,
  `user_height` int(11) NOT NULL,
  `player_pos` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_idno`, `user_type`, `user_email`, `user_username`, `user_password`, `user_fname`, `user_mname`, `user_lname`, `user_dob`, `city`, `user_address`, `user_gender`, `user_contact_no`, `user_date_created`, `img_profile`, `hl_moments`, `user_type_upgrade`, `quality_status`, `user_height`, `player_pos`) VALUES
(2, 'player', 'tophersanchez777@gmail.com', 'topher', 'topher', 'Christopher', 'Uy', 'Sanchez', '1997-03-03', 'Cebu City', 'Inayawan LowerTorre Brg', 'male', '9168628235', '2022-05-11 17:18:15', 'court.png', 'series_2_butler_common.mp4', 'organizer', 'Verified', 0, ''),
(4, 'court_owner', 'zaldy@gmail.com', 'zaldy', 'zaldy', 'Zaldy', 'Z', 'Amora', '2011-08-17', 'Cebu City', 'Tubaa South Areas', 'male', '09335123', '2022-05-09 16:47:32', 'blaziken.jpg', 'series_1_giannis_common.mp4', '', '', 0, ''),
(9, 'court_owner', 'asahiclash@gmail.com', 'dave123', 'dave', 'dave', 'w', 'delta', '2022-02-02', 'Mandaue City', 'Lower Torre Brgy. Inayawan', 'female', '2147483647', '2022-05-11 16:15:39', 'basketball-switch-hero.jpg', '', '', '', 0, ''),
(11, 'player', 'tinikculture@gmail.com', 'lbj23', 'lebron', 'Lebron', 'D', 'James 2', '1978-07-12', 'Naga City', 'Lower Torre Brgy. Inayawan', 'male', '782391238', '2022-05-12 04:54:39', 'blaziken.jpg', 'series_1_giannis_common.mp4', 'organizer', 'Verified', 0, ''),
(12, 'player', 'abc123@gmail.com', 'abc123', 'abc123', 'Abers', 'A', 'Miller', '2013-01-07', '', 'abc st adressss', 'male', '09231892', '2022-05-08 13:42:33', 'rl_2017_tall (1).jpg', 'series_2_butler_common.mp4', 'organizer', 'Verified', 0, ''),
(13, 'player', 'jamorant@gmail.com', 'jamorant', 'jamorant', 'Ja', 'G', 'Morant', '2022-04-06', 'Bogo City', 'LA cansas', 'male', '901237712', '2022-04-08 07:40:25', 'basketball-switch-hero.jpg', 'series_2_butler_common.mp4', '', '', 0, ''),
(14, 'player', 'lee@gmail.com', 'lee', 'lee', 'Lee', 'L', 'Wong', '1999-06-23', 'Bogo City', 'Lower Torre Brgy. Inayawan', 'male', '7823912381', '2022-05-08 10:17:27', 'rl_2017_tall (1).jpg', 'series_2_butler_common.mp4', 'organizer', 'Verified', 0, ''),
(16, 'player', 'durant123@gmail.com', 'durant', 'durant', 'Kevin', 'F', 'Durant', '1984-04-18', 'Lapu-Lapu City', 'Adderss x', 'male', '0987558', '2022-04-12 14:24:18', 'courtImage.jpg', '', '', '', 0, ''),
(17, 'player', 'bob@gmail.com', 'bob', 'bob', 'bob123', 'B', 'Ortiz', '2022-04-04', 'Lapu-Lapu City', 'Inayawan Lower Torre', 'male', '0982178932', '2022-04-30 05:27:51', '1A.jpg', '', '', '', 0, ''),
(18, 'player', 'jordan@gmail.com', 'jordan123', 'jordan123', 'Michael', 'B', 'Jordan', '1997-02-04', '', 'Basak Pardo Cebu City Cebu', 'male', '09332687231', '2022-05-11 03:26:54', 'jordan123.jpg', 'series_2_butler_common.mp4', '', '', 0, ''),
(19, 'player', 'alpha@gmail.com', 'alpha', 'alpha', 'Alpha', 'U', 'Bravo', '2001-01-09', '', 'Basak Pardo Cebu City Cebu', 'male', '09325481434', '2022-05-12 03:35:29', 'rl_2017_tall (1).jpg', 'series_1_giannis_common.mp4', 'organizer', '', 0, ''),
(20, 'player', 'test1@gmail.com', 'test', 'test', 'T firstname', 't', 'L lastname', '1997-07-23', '', 'test@gmail.com', 'male', '09332586777', '2022-05-12 04:12:58', '', '', 'Organizer', 'Verified', 12, 'PF'),
(21, 'player', 'sam@gmail.com', 'sam', 'sam', 'samFIRS', 'S', 'SAMLASTNAME', '1998-03-03', '', 'sam st', 'male', '0923782871', '2022-05-16 16:37:27', '', '', '', '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basketball_court`
--
ALTER TABLE `basketball_court`
  ADD PRIMARY KEY (`bc_idno`),
  ADD KEY `basketball_court_ibfk_1` (`user_idno`);

--
-- Indexes for table `basketball_teams`
--
ALTER TABLE `basketball_teams`
  ADD PRIMARY KEY (`team_idno`);

--
-- Indexes for table `casual_matches`
--
ALTER TABLE `casual_matches`
  ADD PRIMARY KEY (`cm_idno`),
  ADD KEY `casual_matches_ibfk_1` (`user_idno`);

--
-- Indexes for table `chat_routes`
--
ALTER TABLE `chat_routes`
  ADD PRIMARY KEY (`chat_idno`),
  ADD KEY `me` (`me`),
  ADD KEY `other` (`other`);

--
-- Indexes for table `chat_routes_players`
--
ALTER TABLE `chat_routes_players`
  ADD PRIMARY KEY (`chatp_idno`);

--
-- Indexes for table `docs_organizer`
--
ALTER TABLE `docs_organizer`
  ADD PRIMARY KEY (`doc_idno`),
  ADD KEY `user_idno` (`user_idno`);

--
-- Indexes for table `match_requesters`
--
ALTER TABLE `match_requesters`
  ADD PRIMARY KEY (`mr_idno`),
  ADD KEY `cm_idno` (`cm_idnos`),
  ADD KEY `user_idno` (`user_idno`);

--
-- Indexes for table `payment_court_tracker`
--
ALTER TABLE `payment_court_tracker`
  ADD PRIMARY KEY (`paybook_idno`);

--
-- Indexes for table `payment_tracker`
--
ALTER TABLE `payment_tracker`
  ADD PRIMARY KEY (`payment_idno`),
  ADD KEY `user_idno` (`user_idno`);

--
-- Indexes for table `player_stats`
--
ALTER TABLE `player_stats`
  ADD PRIMARY KEY (`stat_idno`);

--
-- Indexes for table `promote_tournament`
--
ALTER TABLE `promote_tournament`
  ADD PRIMARY KEY (`event_idno`);

--
-- Indexes for table `recruit_inivites`
--
ALTER TABLE `recruit_inivites`
  ADD PRIMARY KEY (`invite_idno`);

--
-- Indexes for table `reservations_data`
--
ALTER TABLE `reservations_data`
  ADD PRIMARY KEY (`res_idno`);

--
-- Indexes for table `reservations_data_history`
--
ALTER TABLE `reservations_data_history`
  ADD PRIMARY KEY (`res_idno`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `event_idno` (`event_idno`);

--
-- Indexes for table `team_finals`
--
ALTER TABLE `team_finals`
  ADD PRIMARY KEY (`tf_idno`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_idno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basketball_court`
--
ALTER TABLE `basketball_court`
  MODIFY `bc_idno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `basketball_teams`
--
ALTER TABLE `basketball_teams`
  MODIFY `team_idno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `casual_matches`
--
ALTER TABLE `casual_matches`
  MODIFY `cm_idno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `chat_routes`
--
ALTER TABLE `chat_routes`
  MODIFY `chat_idno` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `chat_routes_players`
--
ALTER TABLE `chat_routes_players`
  MODIFY `chatp_idno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `docs_organizer`
--
ALTER TABLE `docs_organizer`
  MODIFY `doc_idno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `match_requesters`
--
ALTER TABLE `match_requesters`
  MODIFY `mr_idno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `payment_court_tracker`
--
ALTER TABLE `payment_court_tracker`
  MODIFY `paybook_idno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payment_tracker`
--
ALTER TABLE `payment_tracker`
  MODIFY `payment_idno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `player_stats`
--
ALTER TABLE `player_stats`
  MODIFY `stat_idno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `promote_tournament`
--
ALTER TABLE `promote_tournament`
  MODIFY `event_idno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `recruit_inivites`
--
ALTER TABLE `recruit_inivites`
  MODIFY `invite_idno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `reservations_data`
--
ALTER TABLE `reservations_data`
  MODIFY `res_idno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `reservations_data_history`
--
ALTER TABLE `reservations_data_history`
  MODIFY `res_idno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

--
-- AUTO_INCREMENT for table `team_finals`
--
ALTER TABLE `team_finals`
  MODIFY `tf_idno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_idno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basketball_court`
--
ALTER TABLE `basketball_court`
  ADD CONSTRAINT `basketball_court_ibfk_1` FOREIGN KEY (`user_idno`) REFERENCES `user` (`user_idno`);

--
-- Constraints for table `casual_matches`
--
ALTER TABLE `casual_matches`
  ADD CONSTRAINT `casual_matches_ibfk_1` FOREIGN KEY (`user_idno`) REFERENCES `user` (`user_idno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chat_routes`
--
ALTER TABLE `chat_routes`
  ADD CONSTRAINT `chat_routes_ibfk_1` FOREIGN KEY (`me`) REFERENCES `user` (`user_idno`),
  ADD CONSTRAINT `chat_routes_ibfk_2` FOREIGN KEY (`other`) REFERENCES `user` (`user_idno`);

--
-- Constraints for table `docs_organizer`
--
ALTER TABLE `docs_organizer`
  ADD CONSTRAINT `docs_organizer_ibfk_1` FOREIGN KEY (`user_idno`) REFERENCES `user` (`user_idno`);

--
-- Constraints for table `match_requesters`
--
ALTER TABLE `match_requesters`
  ADD CONSTRAINT `match_requesters_ibfk_1` FOREIGN KEY (`cm_idnos`) REFERENCES `casual_matches` (`cm_idno`),
  ADD CONSTRAINT `match_requesters_ibfk_2` FOREIGN KEY (`user_idno`) REFERENCES `user` (`user_idno`);

--
-- Constraints for table `payment_tracker`
--
ALTER TABLE `payment_tracker`
  ADD CONSTRAINT `payment_tracker_ibfk_1` FOREIGN KEY (`user_idno`) REFERENCES `user` (`user_idno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
