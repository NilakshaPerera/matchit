-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 12:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matchit`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `events_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `payments_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `users_id`, `events_id`, `channel_id`, `payments_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 5, 2, '2021-02-28', '2021-02-28 12:11:37', '2021-02-28 12:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Telephone', '2021-02-02 05:41:35', '2021-02-02 05:41:35'),
(2, 'Fax', '2021-02-02 05:41:35', '2021-02-02 05:41:35'),
(3, 'Post', '2021-02-02 05:41:35', '2021-02-02 05:41:35'),
(4, 'Email', '2021-02-02 05:41:35', '2021-02-02 05:41:35'),
(5, 'Web Form', '2021-02-02 05:41:35', '2021-02-02 05:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_types_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `price` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `banner` varchar(250) NOT NULL,
  `venue` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_types_id`, `name`, `price`, `date`, `created_at`, `updated_at`, `banner`, `venue`) VALUES
(1, 5, 'Calista Rivas', '494', '1996-12-18', '2021-02-28 11:53:42', '2021-02-28 11:53:42', 'storage/events/1614533021-2048168733/1614533021-1078406617.jpg', 'Debitis amet quam r'),
(2, 4, 'Zephania Rush', '222', '2022-01-20', '2021-02-28 12:08:15', '2021-02-28 12:08:15', 'storage/events/1614533895-1748864630/1614533895-929729474.jpg', 'Duis consequat Odio');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE `event_types` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Coastal walks', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(2, 'Yatch Trips', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(3, 'Sky Diving', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(4, 'Rock Climbing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(5, 'Evening Lectures', '2021-02-27 07:47:29', '2021-02-27 07:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Abseling', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(2, 'Acrobatics', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(3, 'Acroyoga', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(4, 'Acting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(5, 'Aeromodelling', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(6, 'Airbrushing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(7, 'Aircraft Spotting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(8, 'Airplane Combat', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(9, 'Airplane Flight', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(10, 'Airsofting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(11, 'Alligator Wrestling', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(12, 'Amateur Astronomy', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(13, 'Amateur Radio', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(14, 'Animals/pets/dogs', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(15, 'Ant Farm', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(16, 'Aquarium (Freshwater & Saltwater)', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(17, 'Archery', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(18, 'Arts', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(19, 'Astrology', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(20, 'Astronomy', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(21, 'Backgammon', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(22, 'Badminton', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(23, 'Barefooting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(24, 'Base Jumping', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(25, 'Baseball', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(26, 'Basketball', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(27, 'Beach/Sun tanning', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(28, 'Beachcombing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(29, 'Beadwork', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(30, 'Beatboxing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(31, 'Becoming A Child Advocate', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(32, 'Bell Ringing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(33, 'Belly ', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(34, 'Bicycle Polo', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(35, 'Bird watching', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(36, 'Birding', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(37, 'Blacksmithing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(38, 'Blobbing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(39, 'Blogging', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(40, 'BMX', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(41, 'Board ', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(42, 'Boating', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(43, 'Bobsledding', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(44, 'Body Building', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(45, 'Bonsai Tree', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(46, 'Bookbinding', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(47, 'Boomerangs', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(48, 'Bowling', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(49, 'Boxing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(50, 'Brewing Beer', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(51, 'Bridge Building', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(52, 'Bringing Food To The Disabled', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(53, 'Building A House For Habitat For Humanity', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(54, 'Building Dollhouses', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(55, 'Bungee Jumping', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(56, 'Butterfly Watching', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(57, 'Button ', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(58, 'Cake Decorating', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(59, 'Calligraphy', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(60, 'Camping', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(61, 'Candle Making', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(62, 'Canoeing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(63, 'Canyon Swinging', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(64, 'Car Racing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(65, 'Cardio Workout', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(66, 'Cardstacking', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(67, 'Cartooning', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(68, 'Casino Gambling', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(69, 'Cave Diving', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(70, 'Ceramics', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(71, 'Cheerleading', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(72, 'Chess', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(73, 'Church/church activities', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(74, 'Cigar Smoking', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(75, 'Cliff Diving', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(76, 'Cloud Watching', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(77, 'Coin ', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(78, ' Antiques', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(79, ' Artwork', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(80, ' Hats', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(81, '  Albums', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(82, ' RPM Records', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(83, '  Cards (Baseball', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(84, ' Football', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(85, ' Basketball', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(86, ' Hockey)', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(87, ' Swords', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(88, 'Coloring', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(89, 'Compose ', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(90, 'Computer activities', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(91, 'Contact Juggling', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(92, 'Conworlding', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(93, 'Cooking', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(94, 'Cosplay', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(95, 'Crafts', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(96, 'Crafts (unspecified)', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(97, 'Crochet', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(98, 'Crocheting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(99, 'Cross-Stitch', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(100, 'Crossword Puzzles', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(101, 'Cycling', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(102, 'Darts', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(103, 'Diecast Collectibles', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(104, 'Digital Photography', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(105, 'Diving', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(106, 'Dodgeball', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(107, 'Dolls', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(108, 'Dominoes', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(109, 'Downhill Mountain Biking', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(110, 'Downhill Skateboarding', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(111, 'Drawing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(112, 'Dumpster Diving', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(113, 'Eating out', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(114, 'Courses', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(115, 'Electronics', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(116, 'Embroidery', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(117, 'Entertaining', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(118, 'Exercise (aerobics', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(119, ' weights)', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(120, 'Falconry', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(121, 'Fast cars', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(122, 'Felting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(123, 'Fencing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(124, 'Fire Poi', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(125, 'Fishing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(126, 'Floorball', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(127, 'Floral Arrangements', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(128, 'Flowboarding', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(129, 'Fly Fishing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(130, 'Fly Hunting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(131, 'Fly Tying', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(132, 'Football', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(133, 'Four Wheeling', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(134, 'Free Climbing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(135, 'Freshwater Aquariums', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(136, 'Frisbee Golf – Frolf', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(137, '', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(138, 'Garage Saleing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(139, 'Gardening', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(140, 'Genealogy', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(141, 'Geocaching', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(142, 'Ghost Hunting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(143, 'Glowsticking', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(144, 'Gnoming', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(145, 'Go Kart Racing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(146, 'Going to movies', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(147, 'Golf', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(148, 'Grip Strength', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(149, 'Guitar', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(150, 'Gun ', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(151, 'Gunsmithing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(152, 'Gymnastics', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(153, 'Gyotaku', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(154, 'Handwriting Analysis', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(155, 'Hang gliding', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(156, 'Herping', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(157, 'Highlining', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(158, 'Hiking', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(159, 'Home Brewing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(160, 'Home Repair', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(161, 'Home Theater', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(162, 'Horseback Riding', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(163, 'Hot air ballooning', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(164, 'Hula Hooping', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(165, 'Hunting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(166, 'Ice Climbing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(167, 'Ice Cross Downhill', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(168, 'Ice Diving', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(169, 'Ice Fishing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(170, 'Ice Skating', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(171, 'Illusion', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(172, 'Impersonations', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(173, 'Inline Skating', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(174, 'Internet', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(175, 'Inventing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(176, 'Jet Engines', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(177, 'Jetboarding', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(178, 'Jewelry Making', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(179, 'Jigsaw Puzzles', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(180, 'Jousting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(181, 'Juggling', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(182, 'Jump Roping', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(183, 'Kayaking', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(184, 'Keep A Journal', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(185, 'Kitchen Chemistry', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(186, 'Kite Boarding', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(187, 'Kites', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(188, 'Knitting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(189, 'Knotting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(190, 'Lacrosse', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(191, 'Lasers', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(192, 'Lawn Darts', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(193, 'Learn to Play Poker', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(194, 'Learning A Foreign Language', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(195, 'Learning An Instrument', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(196, 'Learning To Pilot A Plane', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(197, 'Leathercrafting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(198, 'Legos', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(199, 'Letterboxing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(200, 'Listening to music', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(201, 'Locksport', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(202, 'Luge / Skeleton', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(203, 'Macramé', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(204, 'Magic', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(205, 'Making Model Cars', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(206, 'Marksmanship', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(207, 'Martial Arts', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(208, 'Matchstick Modeling', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(209, 'Meditation', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(210, 'Metal Detecting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(211, 'Microscopy', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(212, 'Model Railroading', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(213, 'Model Rockets', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(214, 'Modeling Ships', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(215, 'Models', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(216, 'Motocross', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(217, 'Motorcycle Stunts', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(218, 'Motorcycles', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(219, 'Mountain Biking', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(220, 'Mountain Boarding', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(221, 'Mountain Climbing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(222, 'al Instruments', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(223, 'Nail Art', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(224, 'Needlepoint', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(225, 'Noodling', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(226, 'Off Road Driving', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(227, 'Origami', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(228, 'Owning An Antique Car', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(229, 'Paintball', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(230, 'Painting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(231, 'Papermache', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(232, 'Papermaking', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(233, 'Parachuting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(234, 'Paragliding or Power Paragliding', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(235, 'Parkour', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(236, 'People Watching', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(237, 'Photography', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(238, 'Piano', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(239, 'Pilates', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(240, 'Pinochle', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(241, 'Pipe Smoking', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(242, 'Planking', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(243, 'Playing music', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(244, 'Playing team sports', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(245, 'Pole Dancing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(246, 'Pottery', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(247, 'Powerboking', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(248, 'Protesting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(249, 'Puppetry', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(250, 'Pyrotechnics', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(251, 'Quilting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(252, 'R/C Boats', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(253, 'R/C Cars', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(254, 'R/C Helicopters', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(255, 'R/C Planes', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(256, 'Racing Pigeons', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(257, 'Rafting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(258, 'Rapping', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(259, 'Reading', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(260, 'Reading To The Elderly', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(261, 'Renaissance Faire', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(262, 'Rescuing Abused Or Abandoned Animals', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(263, 'Robotics', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(264, 'Rock Balancing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(265, 'Rock Climbing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(266, 'Rock Collecting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(267, 'Rockets', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(268, 'Rocking AIDS Babies', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(269, 'Roleplaying', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(270, 'Roller Derby', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(271, 'Running', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(272, 'Running of the Bulls', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(273, 'Sailing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(274, 'Saltwater Aquariums', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(275, 'Sand Castles', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(276, 'Sandboarding', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(277, 'Scrapbooking', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(278, 'Scuba Diving', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(279, 'Self Defense', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(280, 'Sewing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(281, 'Shark Diving', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(282, 'Shark Fishing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(283, 'Shopping', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(284, 'Singing In Choir', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(285, 'Skateboarding', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(286, 'Skeet Shooting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(287, 'Sketching', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(288, 'Skiing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(289, 'Sky Diving', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(290, 'Slack Lining', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(291, 'Slingshots', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(292, 'Slot Car Racing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(293, 'Snorkeling', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(294, 'Snow Skiing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(295, 'Snowboarding', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(296, 'Snowmobiling', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(297, 'Soap Making', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(298, 'Soccer', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(299, 'Socializing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(300, 'Speed Cubing (rubix cube)', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(301, 'Spelunkering', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(302, 'Squash', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(303, 'Stamp ', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(304, 'Storm Chasing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(305, 'Storytelling', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(306, 'Street Luge', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(307, 'String Figures', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(308, 'Surf Fishing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(309, 'Surfingextreme', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(310, 'Survival', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(311, 'Swimming', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(312, 'Swimming', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(313, 'Tai Chi', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(314, 'Tatting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(315, 'Taxidermy', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(316, 'Tea Tasting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(317, 'Tennis', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(318, 'Tesla Coils', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(319, 'Tetris', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(320, 'Textiles', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(321, 'Tombstone Rubbing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(322, 'Tool ', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(323, 'Toy ', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(324, 'Train ', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(325, 'Train Spotting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(326, 'Traveling', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(327, 'Treasure Hunting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(328, 'Triathlon', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(329, 'Tutoring Children', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(330, 'Ultimate Frisbee', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(331, 'Urban Exploration', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(332, 'Video Games', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(333, 'Violin', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(334, 'Volunteer', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(335, 'Wakeboarding', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(336, 'Walking', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(337, 'Warhammer', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(338, 'Watching sporting events', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(339, 'Water Ski', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(340, 'Waterfall Kayaking', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(341, 'Weightlifting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(342, 'White Water Rafting', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(343, 'Windsurfing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(344, 'Wine Making', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(345, 'Wingsuit Flying', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(346, 'Woodworking', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(347, 'Working In A Food Pantry', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(348, 'Working on cars', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(349, 'World Record Breaking', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(350, 'Wrestling', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(351, 'Writing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(352, 'Writing ', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(353, 'Writing Songs', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(354, 'Xpogo', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(355, 'Yoga', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(356, 'YoYo', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(357, 'Ziplining', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(358, 'Zorbing', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(359, 'Zumba', '2021-02-27 07:47:29', '2021-02-27 07:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('perera.nilaksha@gmail.com', '$2y$10$.kXZLOPNeWGwJdrr3TTDY.qla39wWpmT5DElIwMON7U4XqaRn7tgy', '2021-02-27 07:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `payment_status_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(100) NOT NULL,
  `reference_no` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `users_id`, `payment_status_id`, `date`, `amount`, `reference_no`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-02-28', '12', 'MATCHIT-00001', '2021-02-28 12:11:03', '2021-02-28 12:11:03'),
(2, 1, 1, '2021-02-28', '222', 'MATCHIT-00002', '2021-02-28 12:11:37', '2021-02-28 12:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Successful', '2021-02-02 05:41:35', '2021-02-02 05:41:35'),
(2, 'Failed', '2021-02-02 05:41:35', '2021-02-02 05:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `personality_details`
--

CREATE TABLE `personality_details` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personality_details`
--

INSERT INTO `personality_details` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'pd 1', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(2, 'pd 2', '2021-02-27 07:47:29', '2021-02-27 07:47:29'),
(3, 'pd 3', '2021-02-27 07:47:29', '2021-02-27 07:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Senior Client Service Agent', '2021-02-02 05:41:35', '2021-02-02 05:41:35'),
(2, 'Client Service Agent', '2021-02-02 05:41:35', '2021-02-02 05:41:35'),
(3, 'Finance Manager', '2021-02-02 05:41:35', '2021-02-02 05:41:35'),
(4, 'Receptionist', '2021-02-02 05:41:35', '2021-02-02 05:41:35'),
(5, 'Client', '2021-02-02 05:41:35', '2021-02-02 05:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Completed', '2021-02-02 05:41:35', '2021-02-02 05:41:35'),
(2, 'Partial', '2021-02-02 05:41:35', '2021-02-02 05:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roles_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefered_gender` enum('Male','Female','Everyone') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_types_id` int(11) DEFAULT NULL,
  `channels_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `roles_id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `dob`, `gender`, `prefered_gender`, `address`, `user_types_id`, `channels_id`, `status_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 5, 'Dale Stokes', 'perera.nilaksha@gmail.com', '111111111111', NULL, '$2y$10$dq7sby75kFmVkQ/xIwGAvu2cisIynrwQpZRMpvarhH.Fwo0HUoqwO', '1950-07-27', 'Male', 'Male', 'Et omnis modi veniam', 1, NULL, 1, 'kLSPbhBK8Ve4zILo8LGwP9kkHDMnulDTIm2QxL25ope6xaFpZW3l24Cfhq1J', '2021-01-28 00:49:51', '2021-03-02 03:08:19'),
(2, 5, 'Cassady Palmer', 'waxub@mailinator.com', '077777773', NULL, '$2y$10$eGwcTW3ha0sO8cHitEbQo.odz3TxNpOFcgWBcgu5iBjmrDyX//qHa', '1951-10-14', 'Male', 'Female', 'Voluptatibus sapient', 2, NULL, 1, NULL, '2021-03-02 00:49:35', '2021-03-02 05:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_bookings`
--

CREATE TABLE `user_has_bookings` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `bookings_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_has_hobbies`
--

CREATE TABLE `user_has_hobbies` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `hobbies_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_has_hobbies`
--

INSERT INTO `user_has_hobbies` (`id`, `users_id`, `hobbies_id`, `created_at`, `updated_at`) VALUES
(43, 1, 1, '2021-03-02 03:08:19', '2021-03-02 03:08:19'),
(44, 1, 3, '2021-03-02 03:08:19', '2021-03-02 03:08:19'),
(45, 1, 4, '2021-03-02 03:08:19', '2021-03-02 03:08:19'),
(46, 1, 13, '2021-03-02 03:08:19', '2021-03-02 03:08:19'),
(119, 2, 3, '2021-03-02 05:30:06', '2021-03-02 05:30:06'),
(120, 2, 4, '2021-03-02 05:30:06', '2021-03-02 05:30:06'),
(121, 2, 5, '2021-03-02 05:30:06', '2021-03-02 05:30:06'),
(122, 2, 20, '2021-03-02 05:30:06', '2021-03-02 05:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_personality_details`
--

CREATE TABLE `user_has_personality_details` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `personality_details_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_has_personality_details`
--

INSERT INTO `user_has_personality_details` (`id`, `users_id`, `personality_details_id`, `created_at`, `updated_at`) VALUES
(26, 1, 1, '2021-03-02 03:08:19', '2021-03-02 03:08:19'),
(27, 1, 2, '2021-03-02 03:08:19', '2021-03-02 03:08:19'),
(28, 1, 3, '2021-03-02 03:08:19', '2021-03-02 03:08:19'),
(66, 2, 1, '2021-03-02 05:30:06', '2021-03-02 05:30:06'),
(67, 2, 2, '2021-03-02 05:30:06', '2021-03-02 05:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_reviews`
--

CREATE TABLE `user_has_reviews` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `reviews_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `fee` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `fee`, `created_at`, `updated_at`) VALUES
(1, 'Local', '12', '2021-02-02 05:41:35', '2021-02-02 05:41:35'),
(2, 'Remote', '5', '2021-02-02 05:41:35', '2021-02-02 05:41:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personality_details`
--
ALTER TABLE `personality_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_has_bookings`
--
ALTER TABLE `user_has_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_has_hobbies`
--
ALTER TABLE `user_has_hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_has_personality_details`
--
ALTER TABLE `user_has_personality_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_has_reviews`
--
ALTER TABLE `user_has_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personality_details`
--
ALTER TABLE `personality_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_has_bookings`
--
ALTER TABLE `user_has_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_has_hobbies`
--
ALTER TABLE `user_has_hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `user_has_personality_details`
--
ALTER TABLE `user_has_personality_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user_has_reviews`
--
ALTER TABLE `user_has_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
