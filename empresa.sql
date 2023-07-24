-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 04:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empresa`
CREATE DATABASE IF NOT EXISTS empresa;
use empresa;
--

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Bio` varchar(50) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `pwd`, `Name`, `Bio`, `Phone`, `Photo`) VALUES
(15, 'cfreake9@quantcast.com', '$2y$10$/bLSyJHhYblPHuJ8g5NLjewuhoTdgg.aaSb//SO.Cgjvrm/gUWkaC', 'Robin', 'Engineer', '644-480-2117', 'empleado-01.jpg'),
(16, 'ndobinson1@example.com', '$2y$10$AW5ZoINo4S3oQ35XVMs5ZudEm/Qn7vrfSUHXO8Oc1x6QIX/uzQ1RS', 'Noellyn', 'Subcontractor', '867-334-4543', 'empleado-02.jpg'),
(17, 'skeyme2@fema.gov', '$2y$10$1TWR11hyPsYfau6fkK2NuOM7qVQRS9S31Zvivl7ouCevbTdEaWM4y', 'Sibella', 'Project Manager', '419-345-9093', 'empleado-03.jpg'),
(18, 'hbonder3@java.com', '$2y$10$RgOUks5m6wM1SqMgFCoj3OWEMOq60l1R5N4H185YZwSrqmijBSbcS', 'Humberto', 'Estimator', '704-155-9914', 'empleado-01.jpg'),
(19, 'eabramson4@gmpg.org', '$2y$10$zd7RHN5kJ5pLaAChKXPOjuSSJ2je8xH/6j4CfclWOubt6JEun6mQi', 'Eve', 'Construction Foreman', '875-904-7992', 'empleado-02.jpg'),
(22, 'test@gmail.com', '$2y$10$d2VibeL2wtaV3bMEK2dnQOnfMjpHO7A3LhCKqD8unqGZPq4ioNMbK', 'Herbert Orellana', 'Fullstack Developer', '12345678', 'empleado-02.jpg'),
(23, 'ao43085@gmail.com', '$2y$10$94ulttaxMS2KBslo.F7EmufAtU/5S4mjWlTcQBp70P5Y4taijXVgi', 'Armando Orellana', 'Freelance Developer', '789456', 'empleado-01.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
