-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2022 at 03:36 PM
-- Server version: 5.7.36
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cultuuh3_v3_cc`
--

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `sub_id` int(100) NOT NULL,
  `dateAdded` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `userName` varchar(30) DEFAULT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `platform` varchar(30) DEFAULT NULL,
  `playlistGrouping` varchar(30) DEFAULT NULL,
  `playlistName` varchar(30) DEFAULT NULL,
  `embedLink` varchar(6000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`sub_id`, `dateAdded`, `userName`, `fname`, `lname`, `email`, `platform`, `playlistGrouping`, `playlistName`, `embedLink`) VALUES
(3, '2022-01-01 22:14:41.605373', 'AntoineP', 'Antoine', 'Pegues', 'AntoinePJr@gmail.com', 'Bandcamp', 'Metal', 'Beneath The Barrens', '<iframe style=\"border: 0; width: 500px; height: 275px;\" src=\"https://bandcamp.com/EmbeddedPlayer/album=3166659745/size=large/bgcol=333333/linkcol=9a64ff/artwork=small/transparent=true/\" seamless><a href=\"https://beneaththebarrens.bandcamp.com/album/deadringer-single\">Deadringer- Single by Beneath The Barrens</a></iframe>'),
(4, '2022-01-01 22:14:41.609411', 'AntoineP', 'Antoine', 'Pegues', 'AntoinePJr@gmail.com', 'Bandcamp', 'Classic Hip-Hop', 'Little Brother - The Listening', '<iframe style=\"border: 0; width: 350px; height: 786px;\" src=\"https://bandcamp.com/EmbeddedPlayer/album=439845100/size=large/bgcol=ffffff/linkcol=0687f5/transparent=true/\" seamless><a href=\"https://littlebrother.bandcamp.com/album/the-listening-deluxe-edition\">The Listening (Deluxe Edition) by Little Brother</a></iframe>'),
(5, '2022-01-01 22:14:41.609531', 'AntoineP', 'Antoine', 'Pegues', 'AntoinePJr@gmail.com', 'Audiomack', 'Flash Tracks', 'Flash Track v1', '<iframe src=\"https://audiomack.com/embed/playlist/poindexter-exe/flashtracks-v1?background=1\" scrolling=\"no\" width=\"100%\" height=\"400\" scrollbars=\"no\" frameborder=\"0\"></iframe>'),
(6, '2022-01-01 22:14:41.609611', 'AntoineP', 'Antoine', 'Pegues', 'AntoinePJr@gmail.com', 'TIDAL', 'Flash Tracks', 'Flash Track v1', '<div style=\"position: relative; padding-bottom: 100%; height: 0; overflow: hidden; max-width: 100%;\"><iframe src=\"https://embed.tidal.com/playlists/5ab8b25b-40e4-4270-a5ac-cd4460a8a366?layout=gridify\" frameborder=\"0\" allowfullscreen style=\"position: absolute; top: 0; left: 0; width: 100%; height: 1px; min-height: 100%; margin: 0 auto;\"></iframe></div>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `sub_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
