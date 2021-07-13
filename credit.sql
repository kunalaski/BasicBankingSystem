-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 06:14 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `history` (
  `id` int(11) PRIMARY KEY auto_increment,
  `sender` varchar(15) NOT NULL,
  `receiver` varchar(35) NOT NULL,
  `trans_amount` int(40) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) Primary Key auto_increment,
  `user_name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_credits` int(40) NOT NULL
);

--
-- Dumping data for table `users`
--

INSERT INTO `users` ( `user_name`, `email`, `user_credits`) VALUES
('Kunal Kamble', 'kunalkamble20k@gmail.com', 51072),
('Rajendra Kamble', 'rajendrakamble04@gmail.com', 109372),
('Pratibha Kamble', 'pratibhakamble12@gmail.com', 84850),
('Rupal Kamble', 'rupalkamble30@gmail.com', 51200),
('Mrunal Kamble', 'mrunalkamble1302@gmail.com', 6000),
('Blaze Dumes', 'blazedumes11j@gmail.com', 53003),
('Jade Corbin', 'jadecorbin23l@gmail.com', 23423),
('Anna De Armas', 'anadearmas69x@gmail.com', 91040),
('Jessie Pinkman', 'jessiepinkman1269@hotmail.com', 126900),
('Walter White', 'walterwhite23k@gmail.com', 88949);


Select*from users;
--
