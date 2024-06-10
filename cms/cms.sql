-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 01:15 PM
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
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `date`, `title`, `author`, `summary`, `content`) VALUES
(1, '2024/06/10', 'What is Programming language?', 'Najar', 'Programming languages are described in terms of their syntax (form) and semantics (meaning), usually defined by a formal language.', 'Programming languages are described in terms of their syntax (form) and semantics (meaning), usually defined by a formal language. Languages usually provide features such as a type system, variables and mechanisms for error handling. An implementation of a programming language in the form of a compiler or interpreter allows programs to be executed, either directly or by producing what\'s known in programming as an executable. \r\n\r\nA programming language is a system of notation for writing computer programs.\r\n\r\nProgramming languages are described in terms of their syntax (form) and semantics (meaning), usually defined by a formal language. Languages usually provide features such as a type system, variables and mechanisms for error handling. An implementation of a programming language in the form of a compiler or interpreter allows programs to be executed, either directly or by producing what\'s known in programming as an executable.\r\n\r\nComputer architecture has strongly influenced the design of programming languages, with the most common type (imperative languages which implement operations in a specified order) developed to perform well on the popular von Neumann architecture. While early programming languages were closely tied to the hardware, over time they have developed more abstraction to hide implementation details for greater simplicity.\r\n\r\nThousands of programming languages often classified as imperative, functional, logic, or object-oriented have been developed for a wide variety of uses. Many aspects of programming language design involve tradeoffs for example, exception handling simplifies error handling, but at a performance cost. Programming language theory is the subfield of computer science that studies the design, implementation, analysis, characterization, and classification of programming languages.'),
(6, '2024/06/08', 'Meet ENHYPEN, K-Pop\'s Latest Breakout Boy Group', 'ASHLEE MITCHELL', 'One of the most exciting K-pop debuts in recent years came at the end of 2020: ENHYPEN. The seven members of the group were selected by fans worldwide after they competed on Mnet\'s \"I-LAND,\" a South Korean survival reality show.', 'One of the most exciting K-pop debuts in recent years came at the end of 2020: ENHYPEN. The seven members of the group were selected by fans worldwide after they competed on Mnet\'s \"I-LAND,\" a South Korean survival reality show. Featuring members who were former trainees under Big Hit Entertainment, the masterminds behind BTS and TOMORROW X TOGETHER, and from various backgrounds, ENHYPEN are now spreading the K-pop agenda worldwide. \r\n\r\nAfter wrapping up \"I-LAND\'\' in September, the septet immediately began preparing their highly anticipated debut: BORDER : DAY ONE, released last November on Belift Lab, a joint venture between Big Hit and South Korean entertainment company CJ ENM. (Belift Lab are the creators of \"I-LAND.\")\r\n\r\nOn BORDER : DAY ONE, ENHYPEN explore a wide range of genres while grappling with their new status as an emerging global act. The album\'s lead single, \"Given-Taken,\" is a high-energy pop song showcasing the guys\' youthful vocals and doubling as a dark power anthem; the song\'s lyrics tackle the complex question of whether they have earned their coveted spots in the group, or taken them. \r\n\r\nElsewhere, \"Intro: Walk The Line\" takes on alternative hip-hop, \"Let Me In (20 CUBE),\" produced by Big Hit\'s FRANTS and \"Hitman\" Bang, mixes reggae with hip-hop, and closer \"Outro: Cross The Line\" wraps up the album in an eerie, waltz style\r\n\r\nSince debuting in November, ENHYPEN have taken the international K-pop world by storm. Their debut mini-album broke the record for highest first-week sales in Korea among rookies who debuted in 2020, and they won the Next Leader award, aka rookie of the year, at the Fact Music Awards within 12 days of their debut. Their exploding social media presence also reflects their ability to connect with global fans: They currently have more than 1 million followers on Twitter and more than 3 million followers on TikTok.\r\n\r\nBeyond the numbers game, the guys come from diverse backgrounds that align with their goals for world domination: Sunghoon, who gave up a successful career as a competitive figure skater to become an \"idol,\" Sunoo, Heeseung and Jungwon are Korean; Jay is from the U.S.; Jake is Australian; and Ni-ki, the group\'s youngest member, is Japanese. \r\n\r\nSurrounded by some of the best minds in the industry, ENHYPEN have a promising future ahead of them. With young members who are eager to learn and grow, the group is ready for the burgeoning worldwide success that\'s on their horizon. Despite debuting in a pandemic, which has caused them to rely on the power of social media to connect with ENGENES, their so-called fan base, all eyes are now on ENHYPEN. \r\n\r\nGRAMMY.com checked in with ENHYPEN to talk about their debut mini-album, BORDER : DAY ONE, and their plans to take over the worldwide K-pop industry. ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(7, 'cia', '$2y$10$Hh9PKG9EkJ1VLVAZgylmdejGM0l7DMVSFApwWQztzNzatUTM8f99C', 'cia@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
