CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `address` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
);
CREATE TABLE IF NOT EXISTS `projects` (
  `proj_id` int NOT NULL AUTO_INCREMENT,
  `proj_name` varchar(80) NOT NULL,
  `user_id` int(255) NOT NULL,
  `description` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`proj_id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS `attachments` (
  `a_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `proj_id` int(255) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `file_type` varchar(50) DEFAULT 0,
  `file_size` varchar(50) DEFAULT 0,
  `file_path` varchar(40) DEFAULT "./uploads",
   PRIMARY KEY (`a_id`),
   FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON UPDATE CASCADE ON DELETE CASCADE,
   FOREIGN KEY (`proj_id`) REFERENCES `projects`(`proj_id`) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS `tasks` (
  `t_id` int NOT NULL AUTO_INCREMENT,
  `task_name` varchar(20) NOT NULL,
  `description` varchar(225) NOT NULL,
  `proj_id` int(235) NOT NULL,
  `start_date` varchar(30) NOT NULL,
  `end_date` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`t_id`),
  FOREIGN KEY (`proj_id`) REFERENCES `projects`(`proj_id`) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS `milestones` (
  `m_id` int(255) NOT NULL AUTO_INCREMENT,
  `proj_id` int(3) NOT NULL,
  `t_id` int(3) NOT NULL,
  `milestone_name` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `due_date` date NOT NULL,
  PRIMARY KEY (`m_id`),
  FOREIGN KEY (`proj_id`) REFERENCES `projects`(`proj_id`) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (`t_id`) REFERENCES `tasks`(`t_id`) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS `discussions` (
  `ds_id` int NOT NULL AUTO_INCREMENT,
  `proj_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `suggestion` varchar(255) NOT NULL DEFAULT 0,
  `ds_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(`ds_id`),
   FOREIGN KEY (`proj_id`) REFERENCES `projects`(`proj_id`) ON UPDATE CASCADE ON DELETE CASCADE,
   FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS `filesharing` (
  `s_id` int NOT NULL AUTO_INCREMENT,
  `proj_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`s_id`),
   FOREIGN KEY (`proj_id`) REFERENCES `projects`(`proj_id`) ON UPDATE CASCADE ON DELETE CASCADE,
   FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON UPDATE CASCADE ON DELETE CASCADE
);