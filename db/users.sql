-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2026 at 08:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Madeline Fulton', 'puqi@mailinator.com', '$2y$10$o822Kc1N1Z4tq5nAE.DQuOL22Yu6w0TAlacivqXsS1wt/W1Ebxcd2', '2026-04-14 12:09:14'),
(2, 'Kyla Mays', 'xenelysara@mailinator.com', '$2y$10$R0Q1XljW2uu1XHls91rPFeIql8r6154NVlqiUPsklxM3qhQI8D93G', '2026-04-14 12:20:35'),
(3, 'John Morales', 'kynox@mailinator.com', '$2y$10$fVgTMy9qFl0bcwVlvCfOEeSGMgCpkJuy/.c542lyveNf6vi3238ki', '2026-04-14 12:23:52'),
(4, 'Geraldine Finch', 'pokenokygu@mailinator.com', '$2y$10$3M9lNxRAPVASQDFyLztb.e5rHqKUWwryLtqiNhhz/ygTcoIa.RhkO', '2026-04-14 17:25:51'),
(5, 'Gretchen Daniel', 'biri@mailinator.com', '$2y$10$g2g9IzPnkZJ5NipmBO.f8.OZrtH9PTl9hUTcZHvjGpoEySI6F84Y6', '2026-04-14 17:27:21'),
(6, 'Sydnee Cantrell', 'hitevepywi@mailinator.com', '$2y$10$RBZ6O9AR.I.9zX52MGbAa.fyVLp9Vw36/.2zMmPQS233/v3r2wI6W', '2026-04-14 17:27:34'),
(7, 'Zephr Acevedo', 'repohe@mailinator.com', '$2y$10$Kbe5f5f355tmm.Nkec73TOnhjiVCa2ignuTcHwIX5nerIHrooOO.K', '2026-04-14 17:28:09'),
(8, 'Frances James', 'xobaz@mailinator.com', '$2y$10$.ZcGjs9y0je0hCL2r.B7yeVxf5MaI95dLSOSbBKGHxaq26Xr9OJ7e', '2026-04-14 17:30:09'),
(9, 'Scarlett White', 'lepyqygu@mailinator.com', '$2y$10$FBJgm78IYx9WB2OlrKALJuTBoNoa3CUU3esfECNKzHumfVChRRSFS', '2026-04-14 17:30:41'),
(10, 'Hiroko Stafford', 'tydazyv@mailinator.com', '$2y$10$9n5k9Tt4zyRA1i6OjM/7FOGM6xZesLo5pJmOc3mNdP8bG6HEh2OVO', '2026-04-14 17:30:54'),
(11, 'Herrod Ross', 'myceqah@mailinator.com', '$2y$10$vG3gKTxQxBKRSiJPtHUrBuoBVQbIYMRFqBtDAOiIM9COuO1GL23VC', '2026-04-14 17:31:26'),
(12, 'Christopher Garza', 'tesywyry@mailinator.com', '$2y$10$wYC/SJvdqdEWrUbM0MfIE.xkamHwSp7PYU0m4r8tm4fF4RC.9hkl6', '2026-04-14 17:31:44'),
(13, 'Isadora Chen', 'zaxygyr@mailinator.com', '$2y$10$6WvRqLLGOr/6VI5s4i.gPO1GXmpBeXLvjyt4csSISvIc8SRLsZBx.', '2026-04-14 17:32:02'),
(14, 'Camilla Bridges', 'qubusojofu@mailinator.com', '$2y$10$MFywBm/9Tcj1SAOQN4UQve7s3/yJfMUCAgIo5P8kEJYwl5ylaa3si', '2026-04-14 17:32:19'),
(15, 'Clarke Simon', 'zimy@mailinator.com', '$2y$10$iks4wcg2AvAl7vfXjHregeuiix1LCXJCQ63BqEVA.npfqqo53I/t2', '2026-04-14 17:39:35'),
(16, 'Quintessa Briggs', 'mekafalu@mailinator.com', '$2y$10$u0p99E2jp5qC0iujaTDJwer/p/suyhGsJA6ct9ewJ8qRaLiSgQ.12', '2026-04-15 17:56:29'),
(17, 'Lydia Bray', 'gefyl@mailinator.com', '$2y$10$JhsoW.lgKllOwcw70UrFUe9hN/Om9OxSDW2GiGVoD8y2nZOTAa8QO', '2026-04-15 18:24:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
