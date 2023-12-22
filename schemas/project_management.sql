-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 05:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `a_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `proj_id` int(255) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `file_type` varchar(50) DEFAULT '0',
  `file_size` varchar(50) DEFAULT '0',
  `file_path` varchar(40) DEFAULT './uploads'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`a_id`, `user_id`, `proj_id`, `file_name`, `file_type`, `file_size`, `file_path`) VALUES
(3, 1, 11, 'PMG_PICTURES_33927607420582758924141.jpeg', '1', '31756', './uploads/'),
(4, 1, 11, 'PMG_PICTURES_8256913472488054684141.jpeg', '1', '21424', './uploads/'),
(5, 1, 11, 'PMG_PICTURES_90768463834355273524141.jpeg', '1', '24761', './uploads/'),
(6, 1, 11, 'PMG_PICTURES_51868748730497100974141.jpeg', '1', '24761', './uploads/'),
(7, 1, 12, 'PMG_PICTURES_67006797761466538124306.jpeg', '1', '31756', './uploads/'),
(8, 1, 12, 'PMG_PICTURES_30688755271127580014306.jpeg', '1', '21424', './uploads/'),
(9, 1, 12, 'PMG_PICTURES_60569331847987198334306.jpeg', '1', '24761', './uploads/'),
(10, 1, 12, 'PMG_PICTURES_35305244001607053544306.jpeg', '1', '24761', './uploads/'),
(11, 1, 14, 'PMG_PICTURES_58648035611812432974685.jpeg', '1', '31756', './uploads/'),
(15, 1, 14, 'PMG_PICTURES_21495701262288695744686.jpeg', '1', '33684', './uploads/'),
(35, 1, 11, 'PMG_PICTURES_8256913472488054684141.jpeg', '1', '21424', './uploads/'),
(36, 1, 11, 'PMG_PICTURES_8256913472488054684141.jpeg', '1', '21424', './uploads/'),
(38, 1, 11, 'PMG_PICTURES_90768463834355273524141.jpeg', '1', '24761', './uploads/');

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `ds_id` int(11) NOT NULL,
  `proj_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `suggestion` varchar(255) NOT NULL DEFAULT '0',
  `ds_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discussions`
--

INSERT INTO `discussions` (`ds_id`, `proj_id`, `user_id`, `suggestion`, `ds_time`) VALUES
(1, 15, 1, 'suggestion', '2023-10-12 07:00:00'),
(2, 15, 1, 'suggestion', '2023-10-12 07:00:00'),
(3, 15, 1, 'suggestion', '2023-10-12 07:00:00'),
(4, 15, 1, 'Text', '2023-10-25 07:32:26'),
(5, 15, 1, 'Discusssion', '2023-10-25 07:32:49'),
(6, 15, 1, 'Look At The Discussion', '2023-10-25 07:33:07'),
(7, 15, 1, 'Discussion Test', '2023-10-25 07:37:41'),
(8, 15, 1, 'Test And See That Yahweh Is Good', '2023-10-25 07:46:25'),
(9, 10, 1, 'I Start', '2023-10-25 11:21:44'),
(10, 10, 1, 'I Begin This Chat Now', '2023-10-25 11:22:00'),
(11, 10, 1, 'Discussion', '2023-10-26 08:58:19'),
(12, 10, 1, 'I Am Contributing Now ', '2023-10-26 13:01:26'),
(14, 15, 1, 'Views Now', '2023-11-28 14:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `filesharing`
--

CREATE TABLE `filesharing` (
  `s_id` int(11) NOT NULL,
  `proj_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filesharing`
--

INSERT INTO `filesharing` (`s_id`, `proj_id`, `user_id`, `status`) VALUES
(1, 15, 1, 1),
(2, 15, 1, 1),
(3, 15, 1, 1),
(4, 15, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE `milestones` (
  `m_id` int(255) NOT NULL,
  `proj_id` int(3) NOT NULL,
  `t_id` int(3) NOT NULL,
  `milestone_name` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `milestones`
--

INSERT INTO `milestones` (`m_id`, `proj_id`, `t_id`, `milestone_name`, `description`, `due_date`) VALUES
(1, 10, 9, 'milestone name', 'Milestone Description', '0000-00-00'),
(2, 10, 9, 'milestone 2', 'Milestone 2 Description', '0000-00-00'),
(3, 15, 12, 'test admin milestone add', 'Test Admin Milestone Add Description', '2023-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `proj_id` int(11) NOT NULL,
  `proj_name` varchar(80) NOT NULL,
  `user_id` int(255) NOT NULL,
  `description` varchar(100) NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`proj_id`, `proj_name`, `user_id`, `description`, `start_date`, `end_date`, `status`) VALUES
(2, 'name', 1, 'Description', '2023-10-27', '2023-10-27', '1'),
(3, 'name', 1, 'Description', '2023-10-27', '2023-10-27', '1'),
(4, 'name', 1, 'Description', '2023-10-27', '2023-10-27', '1'),
(5, 'name', 1, 'Description', '2023-10-27', '2023-10-27', '1'),
(6, 'name', 1, 'Description', '2023-10-27', '2023-10-27', '1'),
(7, 'name', 1, 'Description', '2023-10-27', '2023-10-27', '1'),
(8, 'name 2', 1, 'Description 2', '2023-10-27', '2023-10-27', '1'),
(9, 'name 2', 1, 'Description 2', '2023-10-27', '2023-10-27', '1'),
(10, 'name 2', 1, 'Description 2', '2023-10-27', '2023-10-27', '1'),
(11, 'name 2', 1, 'Description 2', '2023-10-27', '2023-10-27', '1'),
(12, 'name 2', 1, 'Description 2', '2023-10-27', '2023-10-27', '1'),
(13, 'name', 1, 'Desc', '2023-10-27', '2023-10-27', '1'),
(14, 'names', 1, 'Descriptions', '2023-10-27', '2023-10-27', '1'),
(15, 'name', 1, 'Description', '2023-10-27', '2023-10-27', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `t_id` int(11) NOT NULL,
  `task_name` varchar(20) DEFAULT NULL,
  `description` varchar(100) NOT NULL,
  `proj_id` int(235) NOT NULL,
  `start_date` varchar(30) NOT NULL,
  `end_date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`t_id`, `task_name`, `description`, `proj_id`, `start_date`, `end_date`) VALUES
(2, 'task name', 'Task Description', 5, '0', '0'),
(3, 'task name', 'Task Description', 5, '0', '0'),
(9, 'task name', 'Task Description', 10, '0', '0'),
(10, 'task name', 'Task Description', 10, '0', '0'),
(12, 'name', 'Description', 15, '2023-10-27', '0'),
(13, 'admin test task', 'Description Task From Admin  Test', 15, '2023-10-27', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `address` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL DEFAULT '1',
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `dob`, `gender`, `phone`, `email`, `address`, `role`, `password`) VALUES
(1, 'maybin', 'mulenga', '06-28-2023', '1', '0955542486', 'maybinmulenga@gmail.com', 'chalala', '1', '$2y$10$CYNTQlc1gkWDv1Cph6.C4eSB./jFpfYdG40MpVtbm7kR27oO2hRU6'),
(3, 'maybin', 'mulenga', '2023-10-26', '1', '0958831200', 'testuser@gmail.com', 'lusaka', '1', '$2y$10$CYNTQlc1gkWDv1Cph6.C4eSB./jFpfYdG40MpVtbm7kR27oO2hRU6'),
(4, 'maybin', 'mulenga', '2013-07-28', '1', '0966652576', 'testadmin@gmail.com', 'Lusaka', '2', '$2y$10$CYNTQlc1gkWDv1Cph6.C4eSB./jFpfYdG40MpVtbm7kR27oO2hRU6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `proj_id` (`proj_id`);

--
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`ds_id`),
  ADD KEY `proj_id` (`proj_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `filesharing`
--
ALTER TABLE `filesharing`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `proj_id` (`proj_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `milestones`
--
ALTER TABLE `milestones`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `proj_id` (`proj_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`proj_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `proj_id` (`proj_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `ds_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `filesharing`
--
ALTER TABLE `filesharing`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `milestones`
--
ALTER TABLE `milestones`
  MODIFY `m_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attachments_ibfk_2` FOREIGN KEY (`proj_id`) REFERENCES `projects` (`proj_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `discussions_ibfk_1` FOREIGN KEY (`proj_id`) REFERENCES `projects` (`proj_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discussions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `filesharing`
--
ALTER TABLE `filesharing`
  ADD CONSTRAINT `filesharing_ibfk_1` FOREIGN KEY (`proj_id`) REFERENCES `projects` (`proj_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `filesharing_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `milestones`
--
ALTER TABLE `milestones`
  ADD CONSTRAINT `milestones_ibfk_1` FOREIGN KEY (`proj_id`) REFERENCES `projects` (`proj_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `milestones_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `tasks` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`proj_id`) REFERENCES `projects` (`proj_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
