-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 08:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- If the database already exists, drop it
DROP DATABASE IF EXISTS `dompet_malam`;
-- Create the database
CREATE DATABASE `dompet_malam` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
-- Use the new database
USE `dompet_malam`;

-- Table structure for table `transaksi`
CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `kategori` enum('Pemasukan','Pengeluaran','Pemasukan Gaji','Pengeluaran Rutin') NOT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp(),
  `lampiran` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `transaksi`
INSERT INTO `transaksi` (`id`, `tanggal`, `kategori`, `nominal`, `keterangan`, `tanggal_input`, `lampiran`) VALUES
(2, '2024-06-08', 'Pengeluaran', 10000.00, 'makan baso', '2024-06-11 01:22:42', NULL),
(9, '2024-06-11', 'Pemasukan Gaji', 3000000.00, 'bonus juni', '2024-06-11 01:40:28', 'uploads/LUPA GALANG.jpg');

-- Setting AUTO_INCREMENT for table `transaksi`
ALTER TABLE `transaksi`
  AUTO_INCREMENT = 10;

COMMIT;
