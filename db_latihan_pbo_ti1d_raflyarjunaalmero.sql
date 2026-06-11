-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2026 at 07:16 AM
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
-- Database: `db_latihan_pbo_ti1d_raflyarjunaalmero`
--

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(100) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('regular','imax','velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(10) DEFAULT NULL,
  `kacamata_3d_id` varchar(50) DEFAULT NULL,
  `efek_gerak_fitur` tinyint(1) DEFAULT '0',
  `bantal_selimut_pack` tinyint(1) DEFAULT '0',
  `layanan_butler` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'The Avengers: Secret Wars', '2026-06-15 13:00:00', 1, '50000.00', 'regular', 'Dolby 7.1', 'Row G', NULL, 0, 0, 0),
(2, 'The Avengers: Secret Wars', '2026-06-15 13:00:00', 2, '50000.00', 'regular', 'Dolby 7.1', 'Row G', NULL, 0, 0, 0),
(3, 'Avatar 4', '2026-06-15 14:30:00', 1, '50000.00', 'regular', 'Dolby 7.1', 'Row E', NULL, 0, 0, 0),
(4, 'Avatar 4', '2026-06-15 14:30:00', 1, '50000.00', 'regular', 'Dolby 7.1', 'Row F', NULL, 0, 0, 0),
(5, 'KKN di Desa Penari 2', '2026-06-16 19:00:00', 1, '55000.00', 'regular', 'Standard Stereo', 'Row C', NULL, 0, 0, 0),
(6, 'KKN di Desa Penari 2', '2026-06-16 19:00:00', 1, '55000.00', 'regular', 'Standard Stereo', 'Row C', NULL, 0, 0, 0),
(7, 'Batman: Resurrection', '2026-06-16 21:15:00', 1, '55000.00', 'regular', 'Dolby 7.1', 'Row A', NULL, 0, 0, 0),
(8, 'Batman: Resurrection', '2026-06-16 21:15:00', 2, '55000.00', 'regular', 'Dolby 7.1', 'Row A', NULL, 0, 0, 0),
(9, 'Avatar 4', '2026-06-15 10:00:00', 1, '90000.00', 'imax', 'IMAX 12-Channel', 'Row H', 'IMAX-3D-01', 1, 0, 0),
(10, 'Avatar 4', '2026-06-15 10:00:00', 1, '90000.00', 'imax', 'IMAX 12-Channel', 'Row H', 'IMAX-3D-02', 1, 0, 0),
(11, 'The Avengers: Secret Wars', '2026-06-15 16:45:00', 1, '90000.00', 'imax', 'IMAX 12-Channel', 'Row J', 'IMAX-3D-09', 0, 0, 0),
(12, 'The Avengers: Secret Wars', '2026-06-15 16:45:00', 1, '90000.00', 'imax', 'IMAX 12-Channel', 'Row J', 'IMAX-3D-10', 0, 0, 0),
(13, 'Interstellar (Re-release)', '2026-06-17 13:00:00', 1, '80000.00', 'imax', 'IMAX 6-Channel', 'Row F', NULL, 1, 0, 0),
(14, 'Interstellar (Re-release)', '2026-06-17 13:00:00', 1, '80000.00', 'imax', 'IMAX 6-Channel', 'Row F', NULL, 1, 0, 0),
(15, 'Gundala: Rise of Heroes', '2026-06-15 18:00:00', 2, '250000.00', 'velvet', 'Dolby Atmos', 'Suite A1', NULL, 0, 1, 1),
(16, 'Gundala: Rise of Heroes', '2026-06-15 18:00:00', 2, '250000.00', 'velvet', 'Dolby Atmos', 'Suite A2', NULL, 0, 1, 1),
(17, 'Batman: Resurrection', '2026-06-16 20:00:00', 2, '300000.00', 'velvet', 'Dolby Atmos', 'Suite B1', NULL, 0, 1, 1),
(18, 'Batman: Resurrection', '2026-06-16 20:00:00', 2, '300000.00', 'velvet', 'Dolby Atmos', 'Suite B2', NULL, 0, 1, 1),
(19, 'The Avengers: Secret Wars', '2026-06-17 21:00:00', 2, '300000.00', 'velvet', 'Dolby Atmos', 'Suite C1', NULL, 0, 1, 1),
(20, 'The Avengers: Secret Wars', '2026-06-17 21:00:00', 2, '300000.00', 'velvet', 'Dolby Atmos', 'Suite C2', NULL, 0, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
