-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 06, 2023 at 05:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lifelink_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `users_id`, `posts_id`, `created_at`, `updated_at`) VALUES
(1, 'Hello', 1, 1, '2023-10-05 18:32:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `post_categories_id` int(11) NOT NULL,
  `post_types_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `location`, `users_id`, `post_categories_id`, `post_types_id`, `created_at`, `updated_at`) VALUES
(1, 'Test Post tilte', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum odio culpa at autem, officia harum incidunt voluptas repellat eius natus aliquid fugit explicabo magnam eaque saepe doloremque rem error! Adipisci id, esse modi impedit eos saepe quod aut, minus est tempore ratione optio sit deleniti earum inventore. At, nostrum rem.', NULL, 1, 1, 1, '2023-10-05 18:06:16', NULL),
(2, 'Test Post title 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum odio culpa at autem, officia harum incidunt voluptas repellat eius natus aliquid fugit explicabo magnam eaque saepe doloremque rem error! Adipisci id, esse modi impedit eos saepe quod aut, minus est tempore ratione optio sit deleniti earum inventore. At, nostrum rem. sdflsdfjldsf slfjsdlfjsdlf. fldsflsdfjlsf', NULL, 1, 1, 1, '2023-10-05 18:12:17', NULL),
(3, NULL, 'Hello world', NULL, 1, 1, 1, '2023-10-05 19:42:07', NULL),
(4, NULL, 'Test Description ', NULL, 1, 2, 1, '2023-10-05 19:42:33', NULL),
(5, NULL, 'Test Description ', NULL, 1, 2, 1, '2023-10-05 19:42:33', NULL),
(6, NULL, 'Test post', NULL, 3, 1, 1, '2023-10-05 21:26:45', NULL),
(7, NULL, '<p><br></p>', NULL, 3, 1, 1, '2023-10-05 21:29:54', NULL),
(8, NULL, '<p><br></p>', NULL, 3, 2, 1, '2023-10-05 21:36:46', NULL),
(9, NULL, '&lt;p&gt;&lt;br&gt;&lt;/p&gt;', NULL, 3, 1, 1, '2023-10-05 21:39:11', NULL),
(10, NULL, '&lt;p&gt;&lt;br&gt;&lt;/p&gt;', NULL, 3, 1, 1, '2023-10-05 21:39:47', NULL),
(11, NULL, '&lt;p&gt;Referring to findings of the research, Laura Bailey, senior lecturer in English Language and Linguistics at the University of Kent, said: &quot;Email threads and instant messaging platforms have become blended into &#039;conversations&#039; where formal openings and sign offs might feel out of place.&quot;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;Do you think some phrases have become outdated? Vote in our poll below and share your thoughts in the comments.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;✍: Vicky McKeever&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;Sources:&lt;/p&gt;&lt;p&gt;Barclays: https://lnkd.in/ej4ZV9Ah&lt;/p&gt;&lt;p&gt;CNBC Make It: https://lnkd.in/eFDghGxJ&lt;/p&gt;', NULL, 3, 2, 1, '2023-10-05 21:40:45', NULL),
(12, NULL, '<p>Referring to findings of the research, Laura Bailey, senior lecturer in English Language and Linguistics at the University of Kent, said: \"Email threads and instant messaging platforms have become blended into \'conversations\' where formal openings and sign offs might feel out of place.\"</p><p><br></p><p>Do you think some phrases have become outdated? Vote in our poll below and share your thoughts in the comments.</p><p><br></p><p>✍: Vicky McKeever</p><p><br></p><p>Sources:</p><p>Barclays: https://lnkd.in/ej4ZV9Ah</p><p>CNBC Make It: https://lnkd.in/eFDghGxJ</p>', NULL, 3, 2, 1, '2023-10-05 21:45:18', NULL),
(13, 'Array', '<p>Test Description</p>', NULL, 1, 1, 1, '2023-10-06 00:00:47', NULL),
(14, 'Test title', 'Test post', NULL, 3, 1, 1, '2023-10-06 00:01:28', NULL),
(15, 'Hello World', '<p>lorem ipsum dollar imet.</p>', NULL, 1, 1, 1, '2023-10-06 00:05:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts_has_tags`
--

CREATE TABLE `posts_has_tags` (
  `id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL,
  `tags_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts_has_votes`
--

CREATE TABLE `posts_has_votes` (
  `id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL,
  `votes_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `name`) VALUES
(1, 'Groceries'),
(2, 'Medical'),
(3, 'Emotional Support');

-- --------------------------------------------------------

--
-- Table structure for table `post_types`
--

CREATE TABLE `post_types` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `post_types`
--

INSERT INTO `post_types` (`id`, `name`) VALUES
(1, 'Offer help'),
(2, 'Need assistance');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `mobile` varchar(14) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `password` varchar(254) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `img` text DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `otp` varchar(100) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `token` text DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `mobile`, `email`, `password`, `username`, `img`, `bio`, `otp`, `points`, `token`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Nipun', 'Kumara', '0763490865', NULL, '$2y$10$Otm0a6AyKDvftbq0AfZt6eusP76IryxHF1XyTo8zl/8ggI.dEuEA6', 'nipun1', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi nisi perspiciatis nulla delectus explicabo corrupti, consectetur, repudiandae quo voluptatum iusto mollitia adipisci cumque officiis cupiditate autem laborum minima. Aut, porro. At porro similique mollitia fugiat deleniti nihil eligendi quod odit labore iusto! Consequuntur cupiditate, blanditiis cum quaerat earum expedita explicabo!', NULL, NULL, NULL, 1, '2023-10-05 13:56:38', '2023-10-06 01:41:21'),
(2, 'Dilshan', 'Fernando', NULL, 'dilshan@gmail.com', '$2y$10$lidNkAwIaFRn.faHptzzhORT5kY8iOn1FZ1E9FmSK.bIcgjhzgtVC', 'dilshan1', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi tenetur amet, sunt quod minus ea unde, similique distinctio reprehenderit omnis quo laboriosam ratione sit sapiente repellendus officiis dicta non iusto suscipit quae voluptate dolore molestiae corrupti! Sint, recusandae vitae? Consequatur quo quasi labore provident est itaque tempora nostrum? Quisquam, ut!', NULL, NULL, NULL, 1, '2023-10-05 21:00:57', '2023-10-05 21:11:20'),
(3, 'Test', 'User', NULL, 'test@gmail.com', '$2y$10$GosXy98zoSk4bhviN/gpce/YKYHm4V5e5/YSWoKXMi7Mqj0FGZUeO', 'test12', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi tenetur amet, sunt quod minus ea unde, similique distinctio reprehenderit omnis quo laboriosam ratione sit sapiente repellendus officiis dicta non iusto suscipit quae voluptate dolore molestiae corrupti! Sint, recusandae vitae? Consequatur quo quasi labore provident est itaque tempora nostrum? Quisquam, ut!', NULL, NULL, NULL, 1, '2023-10-05 21:08:24', '2023-10-05 21:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `name`) VALUES
(1, 'upvote'),
(2, 'downvote');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_users1_idx` (`users_id`),
  ADD KEY `fk_comments_posts1_idx` (`posts_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posts_users1_idx` (`users_id`),
  ADD KEY `fk_posts_post_categories1_idx` (`post_categories_id`),
  ADD KEY `fk_posts_post_types1_idx` (`post_types_id`);

--
-- Indexes for table `posts_has_tags`
--
ALTER TABLE `posts_has_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posts_has_tags_tags1_idx` (`tags_id`),
  ADD KEY `fk_posts_has_tags_posts1_idx` (`posts_id`);

--
-- Indexes for table `posts_has_votes`
--
ALTER TABLE `posts_has_votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posts_has_votes_votes1_idx` (`votes_id`),
  ADD KEY `fk_posts_has_votes_posts1_idx` (`posts_id`),
  ADD KEY `fk_posts_has_votes_users1_idx` (`users_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_types`
--
ALTER TABLE `post_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts_has_tags`
--
ALTER TABLE `posts_has_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts_has_votes`
--
ALTER TABLE `posts_has_votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_types`
--
ALTER TABLE `post_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_posts1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `fk_comments_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_post_categories1` FOREIGN KEY (`post_categories_id`) REFERENCES `post_categories` (`id`),
  ADD CONSTRAINT `fk_posts_post_types1` FOREIGN KEY (`post_types_id`) REFERENCES `post_types` (`id`),
  ADD CONSTRAINT `fk_posts_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts_has_tags`
--
ALTER TABLE `posts_has_tags`
  ADD CONSTRAINT `fk_posts_has_tags_posts1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `fk_posts_has_tags_tags1` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `posts_has_votes`
--
ALTER TABLE `posts_has_votes`
  ADD CONSTRAINT `fk_posts_has_votes_posts1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `fk_posts_has_votes_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_posts_has_votes_votes1` FOREIGN KEY (`votes_id`) REFERENCES `votes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
