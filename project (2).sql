-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2026 at 10:32 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `value`) VALUES
(1, 'User', 1),
(2, 'Manager', 2),
(3, 'Admin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `photo` varchar(255) DEFAULT NULL,
  `suspended` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `role_id`, `photo`, `suspended`, `created_at`, `updated_at`) VALUES
(17, 'UCSP', 'ucsp@gmail.com', '09987663456', 'Pathein', 'ucsp2026', 3, '2.jfif', 0, '2026-05-27 12:13:49', '2026-05-27 14:09:49'),
(23, 'Mariano Pouros', 'phyllis.hahn@kuhlman.com', '(539) 381-0998', '986 Jennie Gateway Apt. 444\nJustinaburgh, MO 13873', '~u:&etZE*dec=^&', 3, NULL, 1, '2026-05-28 04:27:04', NULL),
(27, 'Eino Steuber', 'rmraz@hotmail.com', '323-681-2543', '268 Tevin Hills\nEmileberg, IL 12136', 'kW1p}T3_mg^A', 3, NULL, 1, '2026-05-28 04:27:04', NULL),
(31, 'Alexanne Gerlach', 'allison08@luettgen.com', '1-754-662-2333', '212 Spencer Stream Suite 623\nMorissetteport, KY 50446', '4y/C/jd!`-oZW.b_4rb', 3, NULL, 0, '2026-05-28 04:27:05', NULL),
(32, 'Ms. Shanna Bruen IV', 'dhirthe@paucek.com', '860-457-9857', '593 Braeden Prairie Suite 232\nEast Joantown, TN 22983', 'D?\\qJsK{', 1, NULL, 0, '2026-05-28 04:27:05', NULL),
(33, 'test', 'test@gmail.com', '09999999999', 'test', '098f6bcd4621d373cade4e832627b4f6', 3, '1.jfif', 0, '2026-05-28 04:37:19', NULL),
(34, 'Brielle McGlynn', 'tfadel@hills.com', '1-940-459-6978', '6898 Schinner Spring Suite 282\nWest Kyla, CT 97892', 'mPaIIF\'o', 1, NULL, 0, '2026-05-28 07:34:59', NULL),
(35, 'Cristal Ernser', 'gtrantow@bosco.com', '+1-330-992-8733', '301 Misael Courts\nEast Kaleighfort, NE 41376-2890', 'E(C[/McFwr!uE', 3, NULL, 0, '2026-05-28 07:34:59', NULL),
(36, 'Xander Runolfsson', 'hpaucek@yahoo.com', '+1-269-824-2382', '10433 Kiarra Pine Suite 252\nSouth Vicenta, IN 37189-9426', 'g67I}m$CxOVX\'@?Y1Z', 1, NULL, 0, '2026-05-28 07:34:59', NULL),
(37, 'Miss Amy Breitenberg III', 'arunolfsdottir@breitenberg.com', '(417) 802-2675', '14232 Austen Courts\nZiemeton, MI 75350-5913', '_^y)mgC*e4{', 3, NULL, 0, '2026-05-28 07:34:59', NULL),
(38, 'Ettie Fritsch Jr.', 'eulah91@gmail.com', '336-415-7074', '172 Wisoky Port\nEast Emilio, ND 13255-1570', 'UU91V#&}>jyxp\',t_5Cv', 2, NULL, 0, '2026-05-28 07:34:59', NULL),
(39, 'Dr. Ericka Bernier MD', 'ariel.hill@conn.info', '(727) 223-6363', '1533 Armstrong Corner\nEast Dillan, MA 40447-1375', '+=<=f[-g!vg}0dE9#2Z8', 1, NULL, 0, '2026-05-28 07:34:59', NULL),
(40, 'Vanessa Abshire', 'lubowitz.zechariah@hoeger.info', '(630) 458-3323', '282 Sydnee Turnpike Suite 758\nEast Justina, MI 47397-3837', '-0G|/t', 1, NULL, 0, '2026-05-28 07:34:59', NULL),
(41, 'Marion Davis Jr.', 'jaquelin58@hotmail.com', '1-458-585-9888', '67332 Halie Squares Apt. 543\nHauckview, NC 23723', 'rRV4BZ>|0:A', 1, NULL, 0, '2026-05-28 07:34:59', NULL),
(42, 'Dr. Evans Ratke IV', 'linnea88@yahoo.com', '1-660-795-2412', '88119 Rodger Mission\nDachmouth, MI 46692-7965', '[$O=qsR', 1, NULL, 0, '2026-05-28 07:34:59', NULL),
(44, 'assignment', 'assi@gmail.com', '0984374545', 'uit', '12345', 1, '3.jfif', 0, '2026-06-09 11:22:35', NULL),
(45, 'Admin', 'admin@gmail.com', '0996564545', 'uit', '12345', 3, NULL, 0, '2026-06-09 15:26:36', NULL),
(46, 'oak', 'oak@gmail.com', '09971660639', 'Pathein', '123456', 1, '3.jfif', 0, '2026-06-09 15:35:44', NULL),
(47, 'day2', 'day@gmail.com', '0996754544534', 'cfdsfgdgdsfd', '12345', 3, '1.jfif', 0, '2026-06-10 09:53:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
