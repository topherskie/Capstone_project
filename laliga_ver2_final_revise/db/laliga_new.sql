-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 07:57 AM
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
-- Database: `laliga_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `brgy`
--

CREATE TABLE `brgy` (
  `brg_id` int(11) NOT NULL,
  `brg_name` varchar(30) NOT NULL,
  `brgy_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brgy`
--

INSERT INTO `brgy` (`brg_id`, `brg_name`, `brgy_timestamp`) VALUES
(1, 'Adlaon', '2022-05-16 02:09:52'),
(2, 'Agsungot', '2022-05-16 02:09:52'),
(3, 'Apas', '2022-05-16 02:09:52'),
(4, 'Babag', '2022-05-16 02:09:52'),
(5, 'Bacayan', '2022-05-16 02:09:52'),
(6, 'Banilad', '2022-05-16 02:09:52'),
(7, 'Basak Pardo', '2022-05-16 02:09:52'),
(8, 'Basak San Nicolas', '2022-05-16 02:09:52'),
(9, 'Binaliw', '2022-05-16 02:09:52'),
(10, 'Bonbon', '2022-05-16 02:09:52'),
(11, 'Budlaan', '2022-05-16 02:09:52'),
(12, 'Buhisan', '2022-05-16 02:09:52'),
(13, 'Bulacao', '2022-05-16 02:09:52'),
(14, 'Buot', '2022-05-16 02:09:52'),
(15, 'Busay', '2022-05-16 02:09:52'),
(16, 'Calamba', '2022-05-16 02:09:52'),
(17, 'Cambinocot', '2022-05-16 02:09:52'),
(18, 'Capitol Site', '2022-05-16 02:09:52'),
(19, 'Carreta', '2022-05-16 02:09:52'),
(20, 'Cogon Pardo', '2022-05-16 02:09:52'),
(21, 'Cogon Ramos', '2022-05-16 02:09:52'),
(22, 'Day‑as', '2022-05-16 02:09:52'),
(23, 'Duljo Fatima', '2022-05-16 02:09:52'),
(24, 'Ermita', '2022-05-16 02:09:52'),
(25, 'Guadalupe', '2022-05-16 02:09:52'),
(26, 'Guba', '2022-05-16 02:09:52'),
(27, 'Hipodromo', '2022-05-16 02:09:52'),
(28, 'Inayawan', '2022-05-16 02:09:52'),
(29, 'Kalubihan', '2022-05-16 02:09:52'),
(30, 'Kalunasan', '2022-05-16 02:09:52'),
(31, 'Kamagayan', '2022-05-16 02:09:52'),
(32, 'Kamputhaw ', '2022-05-16 02:09:52'),
(33, 'Kasambagan', '2022-05-16 02:09:52'),
(34, 'Kinasang‑an Pardo', '2022-05-16 02:09:52'),
(35, 'Labangon', '2022-05-16 02:09:52'),
(36, 'Lahug', '2022-05-16 02:09:52'),
(37, 'Lorega‑San Miguel', '2022-05-16 02:09:52'),
(38, 'Lusaran', '2022-05-16 02:09:52'),
(39, 'Luz', '2022-05-16 02:09:52'),
(40, 'Mabini', '2022-05-16 02:09:52'),
(41, 'Mabolo', '2022-05-16 02:09:52'),
(42, 'Malubog', '2022-05-16 02:09:52'),
(43, 'Mambaling', '2022-05-16 02:09:52'),
(44, 'Pahina Central', '2022-05-16 02:09:52'),
(45, 'Pahina San Nicolas', '2022-05-16 02:09:52'),
(46, 'Pamutan', '2022-05-16 02:09:52'),
(47, 'Pari-an', '2022-05-16 02:09:52'),
(48, 'Paril', '2022-05-16 02:09:52'),
(49, 'Pasil', '2022-05-16 02:09:52'),
(50, 'Pit-os', '2022-05-16 02:09:52'),
(51, 'Poblacion Pardo', '2022-05-16 02:09:52'),
(52, 'Pulangbato', '2022-05-16 02:09:52'),
(53, 'Pung-ol Sibugay', '2022-05-16 02:09:52'),
(54, 'Punta Princesa', '2022-05-16 02:09:52'),
(55, 'Quiot', '2022-05-16 02:09:52'),
(56, 'Sambag I', '2022-05-16 02:09:52'),
(57, 'Sambag II', '2022-05-16 02:09:52'),
(58, 'San Antonio', '2022-05-16 02:09:52'),
(59, 'San Jose', '2022-05-16 02:09:52'),
(60, 'San Nicolas Proper', '2022-05-16 02:09:52'),
(61, 'San Roque', '2022-05-16 02:09:52'),
(62, 'Santa Cruz', '2022-05-16 02:09:52'),
(63, 'Santo Niño', '2022-05-16 02:09:52'),
(64, 'Sapangdaku', '2022-05-16 02:09:52'),
(65, 'Sawang Calero', '2022-05-16 02:09:52'),
(66, 'Sinsin', '2022-05-16 02:09:52'),
(67, 'Sirao', '2022-05-16 02:09:52'),
(68, 'Suba', '2022-05-16 02:09:52'),
(69, 'Sudlon I', '2022-05-16 02:09:52'),
(70, 'Sudlon II', '2022-05-16 02:09:52'),
(71, 'T. Padilla', '2022-05-16 02:09:52'),
(72, 'Tabunan', '2022-05-16 02:09:52'),
(73, 'Tagba-o	', '2022-05-16 02:09:52'),
(74, 'Talamban', '2022-05-16 02:09:52'),
(75, 'Taptap', '2022-05-16 02:09:52'),
(76, 'Tejero', '2022-05-16 02:09:52'),
(77, 'Tinago', '2022-05-16 02:09:52'),
(78, 'Tisa', '2022-05-16 02:09:52'),
(79, 'To-ong', '2022-05-16 02:09:52'),
(80, 'Zapatera', '2022-05-16 02:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `chat_routes`
--

CREATE TABLE `chat_routes` (
  `chat_id` int(11) NOT NULL,
  `me` int(11) NOT NULL,
  `other` int(11) NOT NULL,
  `me_name` varchar(30) NOT NULL,
  `other_name` varchar(30) NOT NULL,
  `chat_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_routes`
--

INSERT INTO `chat_routes` (`chat_id`, `me`, `other`, `me_name`, `other_name`, `chat_timestamp`) VALUES
(6, 17, 1, 'Carl C', 'Christopher Sanchez', '2022-05-20 11:37:19'),
(7, 26, 21, 'Jacob Silanas', 'Junmar Fajardo', '2022-05-21 02:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `payment_tracker`
--

CREATE TABLE `payment_tracker` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_username` varchar(30) DEFAULT NULL,
  `payment_source` varchar(30) DEFAULT NULL,
  `date_sub_started` date DEFAULT NULL,
  `payment_type` varchar(30) DEFAULT NULL,
  `purpose` varchar(30) DEFAULT NULL,
  `payment_amount` int(11) DEFAULT NULL,
  `payment_status` varchar(30) DEFAULT NULL,
  `subscription_duration` int(11) DEFAULT NULL,
  `timestamping` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_tracker`
--

INSERT INTO `payment_tracker` (`payment_id`, `user_id`, `user_username`, `payment_source`, `date_sub_started`, `payment_type`, `purpose`, `payment_amount`, `payment_status`, `subscription_duration`, `timestamping`) VALUES
(14, 17, 'carl', 'https://test-sources.paymongo.', '2022-05-20', 'gcash', 'subscription', 125, 'success', 30, '2022-05-20 02:49:57'),
(16, 26, 'jacob', 'https://test-sources.paymongo.', '2022-05-21', 'gcash', 'subscription', 125, 'success', 30, '2022-05-21 02:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `player_invites`
--

CREATE TABLE `player_invites` (
  `invite_id` int(11) NOT NULL,
  `player_id` int(11) DEFAULT NULL,
  `scout_id` int(11) DEFAULT NULL,
  `player_pos` varchar(30) DEFAULT NULL,
  `player_name` varchar(30) DEFAULT NULL,
  `scout_name` varchar(30) DEFAULT NULL,
  `invite_msg` varchar(200) DEFAULT NULL,
  `invite_status` varchar(30) DEFAULT NULL,
  `desc_decline` varchar(200) DEFAULT NULL,
  `desc_dismiss` varchar(200) DEFAULT NULL,
  `desc_player_quit` varchar(200) DEFAULT NULL,
  `invite_notif` int(11) DEFAULT NULL,
  `scout_notif` int(11) DEFAULT NULL,
  `invite_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_invites`
--

INSERT INTO `player_invites` (`invite_id`, `player_id`, `scout_id`, `player_pos`, `player_name`, `scout_name`, `invite_msg`, `invite_status`, `desc_decline`, `desc_dismiss`, `desc_player_quit`, `invite_notif`, `scout_notif`, `invite_timestamp`) VALUES
(48, 19, 17, 'SG', 'Berto Sinilangan', 'Carl C', 'Would you like to try out.', 'hired', NULL, NULL, NULL, 1, NULL, '2022-05-21 02:16:28'),
(50, 21, 26, 'C', 'Junmar Fajardo', 'Jacob Silanas', 'try out again.', 'hired', NULL, NULL, NULL, 0, NULL, '2022-05-21 02:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `player_invites_dec`
--

CREATE TABLE `player_invites_dec` (
  `dec_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `player_id` int(11) DEFAULT NULL,
  `scout_id` int(11) DEFAULT NULL,
  `player_pos` varchar(30) DEFAULT NULL,
  `invite_msg` varchar(30) DEFAULT NULL,
  `player_name` varchar(30) DEFAULT NULL,
  `scout_name` varchar(30) DEFAULT NULL,
  `dec_msg` varchar(250) DEFAULT NULL,
  `cancel_date` varchar(30) DEFAULT NULL,
  `dec_reason` varchar(30) DEFAULT NULL,
  `dec_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_invites_dec`
--

INSERT INTO `player_invites_dec` (`dec_id`, `event_id`, `player_id`, `scout_id`, `player_pos`, `invite_msg`, `player_name`, `scout_name`, `dec_msg`, `cancel_date`, `dec_reason`, `dec_timestamp`) VALUES
(31, 47, 1, 17, 'PG', 'We find you interesting. would', 'Christopher Sanchez', 'Carl C', 'We realize your not fit in the game.', '2022-05-20', 'dismiss', '2022-05-20 11:45:31'),
(32, 49, 21, 26, 'C', 'We find you interesting you ha', 'Junmar Fajardo', 'Jacob Silanas', 'Sorry you are not fit.', '2022-05-21', 'dismiss', '2022-05-21 02:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `player_portfolio`
--

CREATE TABLE `player_portfolio` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_name` varchar(30) DEFAULT NULL,
  `event_date` varchar(30) DEFAULT NULL,
  `points` decimal(11,2) DEFAULT NULL,
  `rebound` decimal(11,2) DEFAULT NULL,
  `assist` decimal(11,2) DEFAULT NULL,
  `steal` decimal(11,2) DEFAULT NULL,
  `block` int(11) DEFAULT NULL,
  `position` varchar(40) DEFAULT NULL,
  `game_award` varchar(30) DEFAULT NULL,
  `certificate` varchar(60) DEFAULT NULL,
  `user_fullname` varchar(30) DEFAULT NULL,
  `user_address` varchar(30) DEFAULT NULL,
  `port_dob` varchar(30) DEFAULT NULL,
  `event_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_portfolio`
--

INSERT INTO `player_portfolio` (`event_id`, `user_id`, `event_name`, `event_date`, `points`, `rebound`, `assist`, `steal`, `block`, `position`, `game_award`, `certificate`, `user_fullname`, `user_address`, `port_dob`, `event_timestamp`) VALUES
(93, 1, 'Milo League 1', '2022-05-06', '31.00', '2.00', '4.00', '1.00', 4, 'PG', 'MVP', 'ArboWebForestManualsample.pdf', 'Christophers Sanchezs', 'Inayawan Lower Torre CC', '1997-03-03', '2022-05-20 10:48:17'),
(94, 1, 'Milo League 2', '2022-05-26', '18.00', '2.00', '1.00', '2.00', 2, 'PG', 'MVP', '', 'Christophers Sanchezs', 'Inayawan Lower Torre CC', '25', '2022-05-20 10:47:59'),
(95, 1, 'Milo League 3', '2022-05-26', '45.00', '12.00', '2.00', '2.00', 7, 'PG', 'MVP', '', 'Christophers Sanchezs', 'Inayawan Lower Torre CC', '1997-03-03', '2022-05-20 10:51:04'),
(96, 1, 'Cesafi 1', '2022-06-02', '12.00', '2.00', '6.00', '1.00', 4, 'PG', 'MVP', '', 'Christophers Sanchezs', 'Inayawan Lower Torre CC', '1997-03-03', '2022-05-20 10:50:02'),
(97, 1, 'Cesafi 2', '2022-06-10', '13.00', '2.00', '7.00', '5.00', 1, 'SF', 'MVP', '', 'Christophers Sanchezs', 'Inayawan Lower Torre CC', '25', '2022-05-20 10:49:52'),
(98, 1, 'Cesafi 3', '2022-05-26', '16.00', '5.00', '12.00', '7.00', 9, 'SF', 'MVP', '', 'Christophers Sanchezs', 'Inayawan Lower Torre CC', '25', '2022-05-20 10:50:39'),
(99, 16, 'Big 3 tournament', '2022-05-19', '23.00', '4.00', '1.00', '3.00', 1, 'SG', 'MVP', 'ArboWebForestManualsample.pdf', 'Jose Miranda', 'Pasil St', '43', '2022-05-20 11:26:31'),
(100, 16, 'Globe Basketball Tournament', '2022-05-25', '12.00', '1.00', '2.00', '10.00', 10, 'SG', 'MVP', 'ArboWebForestManualsample.pdf', 'Jose Miranda', 'Pasil St', '43', '2022-05-20 11:26:38'),
(101, 18, 'Cesafi', '2022-06-01', '12.00', '2.00', '2.00', '1.00', 12, 'C', 'MVP', 'ArboWebForestManualsample.pdf', 'Alvin Boringo', 'Busay st hinawaan', '1997-09-09', '2022-05-20 11:19:51'),
(102, 18, 'Milo Tournament', '2022-05-25', '23.00', '1.00', '2.00', '12.00', 12, 'PG', 'MVP', 'ArboWebForestManualsample.pdf', 'Alvin Boringo', 'Busay st hinawaan', '1997-09-09', '2022-05-20 11:19:51'),
(103, 16, 'Tnt Mini tournament', '2022-05-27', '12.00', '2.00', '1.00', '1.00', 3, 'SF', 'MVP', 'ArboWebForestManualsample.pdf', 'Jose Miranda', 'Pasil St', '34', '2022-05-20 11:25:43'),
(104, 19, 'Cesafi', '2022-05-24', '23.00', '12.00', '10.00', '10.00', 2, 'PG', 'MVP', 'ArboWebForestManualsample.pdf', 'Berto Sinilangan', '', '31', '2022-05-20 11:33:09'),
(105, 19, 'Cesafi', '2022-05-12', '12.00', '12.00', '12.00', '12.00', 3, 'PG', 'MVP', 'ArboWebForestManualsample.pdf', 'Berto Sinilangan', '', '31', '2022-05-20 11:33:40'),
(106, 19, '13', '2022-05-31', '10.00', '10.00', '10.00', '10.00', 10, 'PG', 'MVP', 'ArboWebForestManualsample.pdf', 'Berto Sinilangan', '', '31', '2022-05-20 11:34:02'),
(107, 19, 'Milo Tournament', '2022-05-30', '12.00', '4.00', '12.00', '1.00', 2, 'PG', 'MVP', 'ArboWebForestManualsample.pdf', 'Berto Sinilangan', '', '31', '2022-05-20 11:34:29'),
(109, 20, 'Milo Tournament 1', '2022-05-25', '6.00', '11.00', '2.00', '2.00', 5, 'C', 'MVP', 'cert2.jpg', 'Mark Dumantong', '', '25', '2022-05-20 14:29:19'),
(110, 20, 'Cesafi', '2022-05-27', '4.00', '12.00', '2.00', '21.00', 2, 'C', 'MVP', 'cert2.jpg', 'Mark Dumantong', '', '25', '2022-05-20 14:32:22'),
(111, 20, 'Red ban', '2022-03-08', '12.00', '2.00', '2.00', '0.00', 2, 'C', 'MVP', 'cert1.jpg', 'Mark Dumantong', '', '25', '2022-05-20 14:43:52'),
(112, 20, 'Palarong Pambansa', '2022-04-06', '14.00', '6.00', '1.00', '6.00', 4, 'PF', 'Rising Star', 'cert2.jpg', 'Mark Dumantong', '', '25', '2022-05-20 14:44:39'),
(113, 20, 'Palarong Pambansa 2', '2022-05-25', '12.00', '5.00', '2.00', '2.00', 1, 'PF', 'MVP', 'cert2.jpg', 'Mark Dumantong', '', '25', '2022-05-20 14:45:34'),
(114, 20, 'Barangay Tournament', '2022-01-31', '12.00', '5.00', '1.00', '2.00', 1, 'PF', 'MVP', 'cert1.jpg', 'Mark Dumantong', '', '25', '2022-05-20 14:46:25'),
(115, 20, 'Smart Basketball League', '2022-02-12', '4.00', '10.00', '2.00', '3.00', 9, 'C', 'MVP', 'cert2.jpg', 'Mark Dumantong', '', '25', '2022-05-20 14:47:17'),
(116, 20, 'Globe G League', '2021-12-18', '12.00', '4.00', '4.00', '1.00', 5, 'PF', 'MVP', 'cert1.jpg', 'Mark Dumantong', '', '25', '2022-05-20 14:48:07'),
(117, 21, 'Palarong Pambansa Division 1', '2022-05-04', '12.00', '15.00', '5.00', '2.00', 15, 'C', 'MVP', 'cert1.jpg', 'Junmar Fajardo', '', '23', '2022-05-20 14:55:11'),
(118, 21, 'Palarong Pambansa Division 2', '2022-02-07', '15.00', '18.00', '1.00', '1.00', 19, 'C', 'MVP', 'cert2.jpg', 'Junmar Fajardo', '', '23', '2022-05-20 15:00:55'),
(120, 21, 'Milo Intram games', '2021-11-02', '9.00', '10.00', '6.00', '1.00', 7, 'PF', 'MVP', 'cert2.jpg', 'Junmar Fajardo', '', '23', '2022-05-20 15:04:09'),
(121, 21, 'Tnt Mini League', '2022-02-01', '9.00', '12.00', '1.00', '2.00', 2, 'PF', 'MVP', 'cert1.jpg', 'Junmar Fajardo', '', '23', '2022-05-20 15:04:56'),
(122, 21, 'Ovaltine Games', '2021-11-05', '7.00', '2.00', '1.00', '3.00', 12, 'PF', 'MVP', 'cert2.jpg', 'Junmar Fajardo', '', '23', '2022-05-20 15:05:40'),
(123, 21, 'G league 1', '2021-12-10', '12.00', '1.00', '1.00', '5.00', 2, 'SG', 'MVP', 'cert1.jpg', 'Junmar Fajardo', '', '23', '2022-05-20 15:06:21'),
(124, 21, 'Cesafi 5', '2021-12-03', '18.00', '2.00', '3.00', '1.00', 1, 'SG', 'MVP', 'cert2.jpg', 'Junmar Fajardo', '', '23', '2022-05-20 15:07:08'),
(125, 21, 'Cesafi 6', '2021-10-15', '12.00', '2.00', '2.00', '1.00', 5, 'SG', 'MVP', 'cert1.jpg', 'Junmar Fajardo', '', '23', '2022-05-20 15:08:02'),
(126, 21, 'Cesafi 8', '2022-03-10', '5.00', '12.00', '1.00', '1.00', 14, 'C', 'Defensive player of the year', 'cert2.jpg', 'Junmar Fajardo', '', '23', '2022-05-20 15:08:48'),
(127, 22, 'Pambansang d', '2022-01-01', '23.00', '2.00', '1.00', '1.00', 5, 'PG', 'MVP', 'cert1.jpg', 'Paul Salas', '', '14', '2022-05-20 15:16:05'),
(128, 22, 'Milo Games', '2022-01-08', '24.00', '2.00', '1.00', '2.00', 1, 'PG', 'MVP', 'cert2.jpg', 'Paul Salas', '', '14', '2022-05-20 15:16:47'),
(129, 22, 'Cesafi', '2021-12-01', '23.00', '1.00', '2.00', '2.00', 1, 'PG', 'MVP', 'cert2.jpg', 'Paul Salas', '', '14', '2022-05-20 15:17:17'),
(130, 22, 'Tnt games', '2022-02-11', '12.00', '2.00', '1.00', '2.00', 2, 'SG', 'MVP', 'cert1.jpg', 'Paul Salas', '', '14', '2022-05-20 15:17:43'),
(131, 22, 'Bearbrand basketball League', '2022-02-05', '12.00', '5.00', '1.00', '2.00', 1, 'SG', 'MVP', 'cert2.jpg', 'Paul Salas', '', '14', '2022-05-20 15:18:25'),
(132, 22, 'Palamban League', '2022-01-31', '12.00', '1.00', '2.00', '2.00', 6, 'SG', 'MVP', 'cert1.jpg', 'Paul Salas', '', '14', '2022-05-20 15:18:59'),
(133, 23, 'Teens League', '2022-01-11', '12.00', '1.00', '2.00', '1.00', 1, 'PG', 'MVP', 'cert2.jpg', 'Dave Kalahis', '', '10', '2022-05-20 15:26:14'),
(134, 23, 'Cesafi ', '2022-02-07', '12.00', '1.00', '2.00', '2.00', 1, 'PG', 'MVP', 'cert1.jpg', 'Dave Kalahis', '', '10', '2022-05-20 15:26:53'),
(135, 24, 'Palarong Pambansa', '2022-01-31', '23.00', '1.00', '3.00', '1.00', 23, 'SG', 'MVP', 'cert1.jpg', 'Steve Hijas', '', '10', '2022-05-20 15:32:06'),
(136, 24, 'Cesafi', '2022-03-16', '15.00', '2.00', '6.00', '1.00', 2, 'SG', 'MVP', 'cert2.jpg', 'Steve Hijas', '', '10', '2022-05-20 15:32:35'),
(137, 24, 'Cesafi 2', '2021-12-31', '17.00', '2.00', '1.00', '2.00', 5, 'PG', 'MVP', 'cert1.jpg', 'Steve Hijas', '', '10', '2022-05-20 15:33:10'),
(138, 24, 'Cesafi 3', '2022-02-03', '12.00', '4.00', '1.00', '2.00', 1, 'SG', 'MVP', 'cert2.jpg', 'Steve Hijas', '', '10', '2022-05-20 15:34:30'),
(139, 25, 'Cesafi 1', '2022-02-04', '12.00', '2.00', '6.00', '7.00', 1, 'SF', 'Rookie of the year', 'cert1.jpg', 'Joe Rosales', 'Bayanihan Quiot 123', '2012-04-05', '2022-05-20 15:40:17'),
(140, 25, 'Cesafi 2', '2022-05-11', '7.00', '2.00', '6.00', '1.00', 2, 'SF', 'MVP', 'cert2.jpg', 'Joe Rosales', 'Bayanihan Quiot 123', '2012-04-05', '2022-05-20 15:40:17'),
(141, 25, 'Milo Games', '2022-03-11', '12.00', '2.00', '2.00', '1.00', 1, 'PG', 'MVP', 'cert2.jpg', 'Joe Rosales', 'Bayanihan Quiot 123', '8', '2022-05-20 15:42:43'),
(142, 19, 'Palarong Pambansa', '2022-05-26', '23.00', '1.00', '2.00', '3.00', 1, 'SG', 'MVP', 'cert1.jpg', 'Berto Sinilangan', 'Sambag St 5000', '31', '2022-05-20 15:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `player_portfolio_img`
--

CREATE TABLE `player_portfolio_img` (
  `eventimg_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `port_img` varchar(50) DEFAULT NULL,
  `img_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_portfolio_img`
--

INSERT INTO `player_portfolio_img` (`eventimg_id`, `event_id`, `user_id`, `port_img`, `img_timestamp`) VALUES
(6, 5, 1, 'basketball-switch-hero.jpg', '2022-05-15 02:06:41'),
(10, 5, 1, 'court.png', '2022-05-15 02:52:00'),
(11, 5, 1, 'courtImage.jpg', '2022-05-15 02:52:00'),
(12, 5, 1, 'laligaLogo.png', '2022-05-15 02:52:00'),
(13, 42, 1, 'basketball-switch-hero.jpg', '2022-05-16 05:46:34'),
(14, 42, 1, 'blaziken.jpg', '2022-05-16 05:46:34'),
(15, 42, 1, 'courtImage.jpg', '2022-05-16 05:46:35'),
(16, 69, 1, 'basketball-switch-hero.jpg', '2022-05-16 11:05:37'),
(17, 69, 1, 'court.png', '2022-05-16 11:05:37'),
(19, 69, 1, 'courtImage.jpg', '2022-05-16 11:13:35'),
(20, 93, 1, 's8.jpg', '2022-05-20 10:46:54'),
(21, 93, 1, 's6.jpg', '2022-05-20 10:47:05'),
(22, 93, 1, 's8.jpg', '2022-05-20 10:47:05'),
(23, 101, 18, 'basketball-switch-hero.jpg', '2022-05-20 11:47:39'),
(24, 101, 18, 'court.png', '2022-05-20 11:47:39'),
(26, 117, 21, 'fa1.jpg', '2022-05-20 14:56:01'),
(27, 117, 21, 'fa2.jpg', '2022-05-20 14:56:01'),
(28, 117, 21, 'fa4.jpg', '2022-05-20 14:56:02'),
(29, 117, 21, 'fa5.jpg', '2022-05-20 14:56:02'),
(32, 117, 21, 'fa6.jpg', '2022-05-20 14:57:32'),
(33, 117, 21, 'ga3.jpg', '2022-05-20 14:57:32'),
(34, 118, 21, 'fa2.jpg', '2022-05-20 15:01:23'),
(36, 118, 21, 'fa1.jpg', '2022-05-20 15:02:24'),
(37, 126, 21, 'fa1.jpg', '2022-05-20 15:09:12'),
(38, 126, 21, 'fa2.jpg', '2022-05-20 15:09:12'),
(39, 126, 21, 'fa4.jpg', '2022-05-20 15:09:12'),
(40, 126, 21, 'fa5.jpg', '2022-05-20 15:09:12'),
(41, 126, 21, 'fa6.jpg', '2022-05-20 15:09:19'),
(42, 127, 22, 's6.jpg', '2022-05-20 15:19:26'),
(43, 127, 22, 's7.jpg', '2022-05-20 15:19:26'),
(44, 128, 22, 's2.jpg', '2022-05-20 15:19:58'),
(45, 128, 22, 's8.jpg', '2022-05-20 15:19:58'),
(46, 132, 22, 's8.jpg', '2022-05-20 15:20:15'),
(47, 133, 23, 's3.jpg', '2022-05-20 15:27:07'),
(48, 134, 23, 's5.jpg', '2022-05-20 15:27:18'),
(49, 135, 24, 's1.jpg', '2022-05-20 15:33:27'),
(50, 135, 24, 's2.jpg', '2022-05-20 15:33:33'),
(51, 136, 24, 's3.jpg', '2022-05-20 15:33:48'),
(52, 137, 24, 's4.jpg', '2022-05-20 15:34:04'),
(53, 137, 24, 's5.jpg', '2022-05-20 15:34:04'),
(54, 139, 25, 's2.jpg', '2022-05-20 15:38:48'),
(55, 139, 25, 's3.jpg', '2022-05-20 15:38:48'),
(56, 139, 25, 's4.jpg', '2022-05-20 15:38:48'),
(57, 140, 25, 's6.jpg', '2022-05-20 15:39:01'),
(58, 140, 25, 's7.jpg', '2022-05-20 15:39:01'),
(59, 140, 25, 's8.jpg', '2022-05-20 15:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `player_port_avg`
--

CREATE TABLE `player_port_avg` (
  `avg_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `avg_pts` decimal(11,2) DEFAULT NULL,
  `avg_reb` decimal(11,2) DEFAULT NULL,
  `avg_ast` decimal(11,2) DEFAULT NULL,
  `avg_stl` decimal(11,2) DEFAULT NULL,
  `avg_blk` decimal(11,2) DEFAULT NULL,
  `games_played` int(11) DEFAULT NULL,
  `avg_fullname` varchar(30) DEFAULT NULL,
  `avg_address` varchar(30) DEFAULT NULL,
  `avg_dob` varchar(30) DEFAULT NULL,
  `avg_pos` varchar(30) DEFAULT NULL,
  `avg_brgy` varchar(30) NOT NULL,
  `avg_profile_img` varchar(40) NOT NULL,
  `avg_recruit_status` varchar(30) NOT NULL,
  `avg_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_port_avg`
--

INSERT INTO `player_port_avg` (`avg_id`, `user_id`, `avg_pts`, `avg_reb`, `avg_ast`, `avg_stl`, `avg_blk`, `games_played`, `avg_fullname`, `avg_address`, `avg_dob`, `avg_pos`, `avg_brgy`, `avg_profile_img`, `avg_recruit_status`, `avg_timestamp`) VALUES
(23, 1, '22.50', '4.17', '5.33', '3.00', '4.50', 6, 'Christophers Sanchezs', 'Inayawan Lower Torre CC', '25', 'PG', 'Adlaon', 'p2.png', '', '2022-05-20 11:45:31'),
(24, 16, '15.67', '2.33', '1.33', '4.67', '4.67', 3, 'Jose Miranda', 'Pasil St', '34', 'SF', 'Pasil', 'p1.png', '', '2022-05-20 11:25:43'),
(25, 18, '17.50', '1.50', '2.00', '6.50', '12.00', 2, 'Alvin Boringo', 'Busay st hinawaan', '24', 'SG', 'Busay', 'p3.png', '', '2022-05-20 11:58:12'),
(26, 19, '16.00', '7.80', '9.20', '7.20', '3.60', 5, 'Berto Sinilangan', 'Sambag St 5000', '31', 'SG', 'Sambag I', 'p4.png', 'hired', '2022-05-21 02:16:28'),
(27, 20, '9.50', '6.88', '2.00', '4.63', '3.63', 8, 'Mark Dumantong', 'Bulacao St 4323', '25', 'PF', 'Capitol Site', 'p5.png', '', '2022-05-20 15:54:12'),
(28, 21, '11.00', '8.22', '2.33', '1.89', '8.56', 9, 'Junmar Fajardo', 'Guadalupe St 5000', '23', 'C', 'Inayawan', 'p17.png', 'hired', '2022-05-21 02:46:30'),
(29, 22, '17.67', '2.17', '1.33', '1.83', '2.67', 6, 'Paul Salas', 'Bayanihan Quiot 123', '14', 'SG', 'Quiot', 'p7.png', '', '2022-05-20 15:52:13'),
(30, 23, '12.00', '1.00', '2.00', '1.50', '1.00', 2, 'Dave Kalahis', 'Bayanihan Quiot 123', '10', 'PG', 'Quiot', 'p10.png', '', '2022-05-20 15:52:11'),
(31, 24, '16.75', '2.25', '2.75', '1.50', '7.75', 4, 'Steve Hijas', 'Bayanihan Quiot 123', '10', 'SG', 'Quiot', 'p21.png', '', '2022-05-20 15:52:08'),
(32, 25, '10.33', '2.00', '4.67', '3.00', '1.33', 3, 'Joe Rosales', 'Bayanihan Quiot 123', '8', 'PG', 'Quiot', 'p15.png', '', '2022-05-20 15:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(30) DEFAULT NULL,
  `user_pass` varchar(30) NOT NULL,
  `user_firstname` varchar(30) DEFAULT NULL,
  `user_mi` varchar(30) DEFAULT NULL,
  `user_lastname` varchar(30) DEFAULT NULL,
  `user_email` varchar(30) DEFAULT NULL,
  `user_type` varchar(30) NOT NULL,
  `user_dob` varchar(30) DEFAULT NULL,
  `user_gender` varchar(30) DEFAULT NULL,
  `user_address` varchar(30) DEFAULT NULL,
  `user_phone` varchar(30) DEFAULT NULL,
  `user_pp` varchar(80) DEFAULT NULL,
  `user_height` decimal(11,2) DEFAULT NULL,
  `user_brgy` varchar(30) DEFAULT NULL,
  `user_subs` varchar(20) DEFAULT NULL,
  `user_weight` int(11) DEFAULT NULL,
  `hired_status` varchar(30) DEFAULT NULL,
  `user_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_pass`, `user_firstname`, `user_mi`, `user_lastname`, `user_email`, `user_type`, `user_dob`, `user_gender`, `user_address`, `user_phone`, `user_pp`, `user_height`, `user_brgy`, `user_subs`, `user_weight`, `hired_status`, `user_timestamp`) VALUES
(1, 'topher', 'topher', 'Christopher', 'Uy', 'Sanchez', 'tophersanchez777@gmail.com', 'Player', '1997-03-03', 'Male', 'Inayawan Lower Torre CC', '9332586777', 'p2.png', '151.12', 'Adlaon', NULL, 17, '', '2022-05-20 16:00:58'),
(8, 'test', 'test', 'John', 'M', 'Whick', 'test@gmail.com', 'Player', '1975-05-06', 'Male', 'Himalayan trench test', '', NULL, '0.00', NULL, NULL, 0, NULL, '2022-05-15 11:27:12'),
(14, 'zaldy', 'zaldy', 'zaldyf', 'z', 'zaldyL', 'zaldy@gmail.com', 'Scout', '1871-03-03', NULL, NULL, NULL, 'basketball-switch-hero.jpg', NULL, 'Adlaon', 'paid', 0, NULL, '2022-05-17 08:01:47'),
(15, 'alpha', 'alpha', 'AlphaF', 'A', 'AlpahL', 'alpha@gmail.com', 'Player', '1997-09-09', 'Male', 'Cogon Pardo Subat', '67856553', 'laligaLogo.png', '120.00', 'Adlaon', NULL, 12, NULL, '2022-05-16 10:28:18'),
(16, 'jose', 'jose', 'Jose', 'J', 'Miranda', 'jose@gmail.com', 'Player', '1988-03-02', 'Male', 'Pasil St', '0987678632', 'p1.png', '142.00', 'Pasil', NULL, 52, '', '2022-05-20 11:00:14'),
(17, 'carl', 'carl', 'Carl', 'S', 'C', 'carl@gmail.com', 'Scout', '1995-05-05', NULL, NULL, NULL, 'laligaLogo.png', NULL, 'Calamba', 'paid', NULL, NULL, '2022-05-20 02:49:57'),
(18, 'alvin', 'alvin', 'Alvin', 'A', 'Boringo', 'alvin@gmail.com', 'Player', '1997-09-09', 'Male', 'Busay st hinawaan', '098837182', 'p3.png', '200.00', 'Busay', NULL, 89, NULL, '2022-05-20 11:19:50'),
(19, 'berto', 'berto', 'Berto', 'R', 'Sinilangan', 'berto@gmail.com', 'Player', '1990-09-09', 'Male', 'Sambag St 5000', '098989832', 'p4.png', '178.00', 'Sambag I', NULL, 210, 'hired', '2022-05-21 02:16:28'),
(20, 'mark', 'mark', 'Mark', 'U', 'Dumantong', 'mark@gmail.com', 'Player', '1997-03-03', 'Male', 'Bulacao St 4323', '0988327712', 'p5.png', '188.00', 'Bulacao', NULL, 79, NULL, '2022-05-20 14:30:00'),
(21, 'jun', 'jun', 'Junmar', 'G', 'Fajardo', 'junmar@gmail.com', 'Player', '1999-05-04', 'Male', 'Guadalupe St 5000', '093325871232', 'p17.png', '211.00', 'Guadalupe', NULL, 210, 'hired', '2022-05-21 02:46:30'),
(22, 'paul', 'paul', 'Paul', 'A', 'Salas', 'paul@gmail.com', 'Player', '2008-03-03', 'Male', 'Bayanihan Quit 123', '0983782127', 'p7.png', '140.00', 'Adlaon', NULL, 78, NULL, '2022-05-20 15:20:48'),
(23, 'dave', 'dave', 'Dave', 'E', 'Kalahis', 'dave@gmail.com', 'Player', '2011-09-05', 'Male', 'Bayanihan Quiot 123', '0877823123', 'p10.png', '120.00', 'Quiot', NULL, 45, NULL, '2022-05-20 15:40:53'),
(24, 'steve', 'steve', 'Steve', 'R', 'Hijas', 'steve@gmail.com', 'Player', '2012-03-03', 'Male', 'Bayanihan Quiot 123', '98778231', 'p21.png', '121.00', 'Quiot', NULL, 56, NULL, '2022-05-20 15:41:25'),
(25, 'joe', 'joe', 'Joe', 'F', 'Rosales', 'joe@gmail.com', 'Player', '2014-04-05', 'Male', 'Bayanihan Quiot 123', '0987283781', 'p15.png', '150.00', 'Quiot', NULL, 50, NULL, '2022-05-20 15:40:17'),
(26, 'jacob', 'jacob', 'Jacob', 'R', 'Silanas', 'jacob@gmail.com', 'Scout', '1990-03-03', NULL, NULL, NULL, 'rl_2017_tall (1).jpg', NULL, 'Punta Princesa', 'paid', NULL, NULL, '2022-05-21 02:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_hl`
--

CREATE TABLE `user_hl` (
  `hl_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `hl_title` varchar(40) DEFAULT NULL,
  `hl_vid` varchar(60) DEFAULT NULL,
  `hl_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_hl`
--

INSERT INTO `user_hl` (`hl_id`, `user_id`, `hl_title`, `hl_vid`, `hl_timestamp`) VALUES
(9, 1, 'The dunk!', 'butlier.mp4', '2022-05-16 10:21:08'),
(10, 1, 'Wild', 'giannisss.mp4', '2022-05-16 17:04:50'),
(11, 16, 'The great dunk', 'giannisss.mp4', '2022-05-20 05:15:13'),
(12, 16, 'Fast moves', 'anthony.mp4', '2022-05-20 11:28:24'),
(13, 18, 'Game recognize', 'booker.mp4', '2022-05-20 11:29:21'),
(14, 18, 'Moves', 'anthony.mp4', '2022-05-20 11:29:45'),
(15, 19, 'Galawan', 'curry.mp4', '2022-05-20 11:31:25'),
(16, 19, 'Fast break', 'anthony.mp4', '2022-05-20 11:31:45'),
(17, 20, 'Dunk', 'durant.mp4', '2022-05-20 14:49:44'),
(18, 20, 'Beyond the ark', 'herro.mp4', '2022-05-20 14:50:09'),
(19, 21, 'Dunk', 'shaq.mp4', '2022-05-20 14:53:41'),
(20, 21, 'Hustle n Show', 'morant.mp4', '2022-05-20 14:53:59'),
(21, 21, 'Pocket 3', 'curry.mp4', '2022-05-20 14:54:24'),
(22, 22, 'Moves', 'wagner.mp4', '2022-05-20 15:15:06'),
(23, 22, 'Ball skills', 'trae.mp4', '2022-05-20 15:15:23'),
(24, 23, 'Skills', 'smart.mp4', '2022-05-20 15:25:11'),
(25, 23, 'Grit n Grind', 'nikola.mp4', '2022-05-20 15:25:24'),
(26, 24, 'Dunk', 'morant.mp4', '2022-05-20 15:31:24'),
(27, 24, 'The moves', 'tatum.mp4', '2022-05-20 15:31:38'),
(28, 25, '3s', 'curry.mp4', '2022-05-20 15:36:13'),
(29, 25, 'The showman', 'giannis.mp4', '2022-05-20 15:36:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brgy`
--
ALTER TABLE `brgy`
  ADD PRIMARY KEY (`brg_id`);

--
-- Indexes for table `chat_routes`
--
ALTER TABLE `chat_routes`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `payment_tracker`
--
ALTER TABLE `payment_tracker`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `player_invites`
--
ALTER TABLE `player_invites`
  ADD PRIMARY KEY (`invite_id`);

--
-- Indexes for table `player_invites_dec`
--
ALTER TABLE `player_invites_dec`
  ADD PRIMARY KEY (`dec_id`);

--
-- Indexes for table `player_portfolio`
--
ALTER TABLE `player_portfolio`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `player_portfolio_img`
--
ALTER TABLE `player_portfolio_img`
  ADD PRIMARY KEY (`eventimg_id`);

--
-- Indexes for table `player_port_avg`
--
ALTER TABLE `player_port_avg`
  ADD PRIMARY KEY (`avg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_hl`
--
ALTER TABLE `user_hl`
  ADD PRIMARY KEY (`hl_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brgy`
--
ALTER TABLE `brgy`
  MODIFY `brg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `chat_routes`
--
ALTER TABLE `chat_routes`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_tracker`
--
ALTER TABLE `payment_tracker`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `player_invites`
--
ALTER TABLE `player_invites`
  MODIFY `invite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `player_invites_dec`
--
ALTER TABLE `player_invites_dec`
  MODIFY `dec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `player_portfolio`
--
ALTER TABLE `player_portfolio`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `player_portfolio_img`
--
ALTER TABLE `player_portfolio_img`
  MODIFY `eventimg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `player_port_avg`
--
ALTER TABLE `player_port_avg`
  MODIFY `avg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_hl`
--
ALTER TABLE `user_hl`
  MODIFY `hl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
