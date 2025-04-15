-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 15, 2025 at 01:43 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_pemweb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int NOT NULL,
  `nama_kandidat` varchar(50) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `nama_kandidat`, `visi`, `misi`) VALUES
(2, 'Elang Angkasa', 'mempererat tali persaudaran.', 'mewujudkan solidaritas.\r\n'),
(3, 'Rangga Kusuma', 'meningkatkan rasa solidaritas.', 'membentuk lingkungan yang aman dan tertib.'),
(4, 'Jefri Nikolas', 'aghsgdga hgdahgfhnsgd', 'sbdfhbshjf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`) VALUES
(8, 'karina', '$2y$10$PsHNP4wYnf7WxoDYducbf.oqW9eCpEfEZhdn7VUvyd2mFsL3ZF6TW', 2),
(9, 'admin', '$2y$10$2NLiBCG/0e.9FRTfzhVDZu9H3PlEpb2AX8WV/IhUDsqWjIHjwwXUS', 1),
(10, 'Fufu', '$2y$10$0W2V1zEBIklfx1lxBMmR9ejiZznCSXNV90YZkzOCAhplk/hiGZ2qG', 2),
(11, 'lala', '$2y$10$k//5/b.QG8sTwpvltoCnour6YDcMim9.yHur1/nt/Wlxsd0UWy5cq', 2),
(12, 'bella', '$2y$10$J.mr5FMokbvqoozH6Xtv.e5H.LkgY1WnWc6TBXv6BqSZVgNG0bdau', 2),
(13, 'hasna', '$2y$10$LBR3C.jlLU1JMvWnpdqizuVCjpE3sxqMCehBBkJLOwEASUdiaImhi', 2),
(14, 'starla', '$2y$10$io42RZBv5VKNlc8PJhxdkec8FMQbvvWSLpe4NE8NtiUjRtov0jxtG', 2),
(15, 'dea', '$2y$10$08fRfqb/N8Ts6vmIREC.8eDSnit5cNwhypvcJ.1beIFpghV.QEh9.', 2),
(16, 'fafa', '$2y$10$xQ.QmNboMfe/39lmCfiPhujpYKZaMgTxurhA.KLWB2iTdPc9iBBJa', 2),
(17, 'uus', '$2y$10$ssye69Coww7YodjIAaVXK.msdEGXlARHyhz06mNo7LSQzgnE3d0i2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `candidate_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `user_id`, `candidate_id`) VALUES
(3, 8, 2),
(4, 10, 3),
(5, 11, 3),
(6, 12, 3),
(7, 13, 2),
(8, 14, 2),
(9, 15, 3),
(10, 16, 3),
(11, 17, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `votes_ibfk_2` (`candidate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
