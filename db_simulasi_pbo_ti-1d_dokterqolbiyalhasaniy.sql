-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2026 at 07:00 AM
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
-- Database: `db_simulasi_pbo_ti-1d_dokterqolbiyalhasaniy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(30) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Fauzi', 'SMAN 1 Jakarta', '85.50', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'SMKN 2 Bandung', '78.00', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Citra Lestari', 'SMA Kristen Yusuf', '92.15', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(4, 'Dedi Wijaya', 'SMAN 3 Yogyakarta', '80.45', '250000.00', 'Reguler', 'Ilmu Komunikasi', 'Kampus B', NULL, NULL, NULL, NULL),
(5, 'Eka Putri', 'SMAN 1 Surakarta', '88.90', '250000.00', 'Reguler', 'Manajemen', 'Kampus B', NULL, NULL, NULL, NULL),
(6, 'Fahmi Idris', 'MAN 2 Bogor', '75.60', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(7, 'Gita Gutawa', 'SMA Labschool', '83.20', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(8, 'Hadi Suryo', 'SMAN 1 Surabaya', '95.00', '150000.00', 'Prestasi', NULL, NULL, 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Indah Permata', 'SMAN 5 Semarang', '91.80', '150000.00', 'Prestasi', NULL, NULL, 'Futsal', 'Provinsi', NULL, NULL),
(10, 'Joko Tarub', 'SMKN 1 Malang', '89.50', '150000.00', 'Prestasi', NULL, NULL, 'Lomba Kompetensi Siswa', 'Nasional', NULL, NULL),
(11, 'Kartika Sari', 'SMA Katolik St. Louis', '96.40', '150000.00', 'Prestasi', NULL, NULL, 'Karya Ilmiah Remaja', 'Internasional', NULL, NULL),
(12, 'Laksana Tri', 'SMAN 1 Denpasar', '87.30', '150000.00', 'Prestasi', NULL, NULL, 'Pencak Silat', 'Nasional', NULL, NULL),
(13, 'Mega Utami', 'MAN 1 Medan', '90.10', '150000.00', 'Prestasi', NULL, NULL, 'Tahfidz Al-Quran', 'Provinsi', NULL, NULL),
(14, 'Naufal Abdi', 'SMAN 3 Makassar', '93.25', '150000.00', 'Prestasi', NULL, NULL, 'Debat Bahasa Inggris', 'Nasional', NULL, NULL),
(15, 'Oki Setiawan', 'SMAN 1 Palembang', '82.00', '350000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DIK-2026-001', 'Kementerian Perhubungan'),
(16, 'Putri Ayu', 'SMAN 2 Padang', '86.70', '350000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DIK-2026-002', 'Badan Siber dan Sandi Negara'),
(17, 'Qori Sandi', 'SMAN 1 Pontianak', '84.15', '350000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DIK-2026-003', 'Kementerian Dalam Negeri'),
(18, 'Riyan Hidayat', 'SMKN 1 Balikpapan', '81.90', '350000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DIK-2026-004', 'Kementerian Komunikasi dan Digital'),
(19, 'Siti Aminah', 'MAN 2 Banjarmasin', '89.00', '350000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DIK-2026-005', 'Badan Pusat Statistik'),
(20, 'Taufik Hidayat', 'SMAN 1 Manado', '85.60', '350000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DIK-2026-006', 'Kementerian Keuangan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
