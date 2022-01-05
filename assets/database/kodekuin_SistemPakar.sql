-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2022 at 01:33 PM
-- Server version: 10.3.32-MariaDB-log-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kodekuin_SistemPakar`
--
CREATE DATABASE IF NOT EXISTS `kodekuin_SistemPakar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kodekuin_SistemPakar`;

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE `aturan` (
  `kode_aturan` varchar(11) NOT NULL,
  `jika` varchar(15) NOT NULL,
  `maka` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aturan`
--

INSERT INTO `aturan` (`kode_aturan`, `jika`, `maka`) VALUES
('A01', 'G01ANDG02ANDG03', 'P01'),
('A02', 'G01ANDG03ANDG02', 'P01'),
('A03', 'G02ANDG01ANDG03', 'P01'),
('A04', 'G02ANDG03ANDG01', 'P01'),
('A05', 'G03ANDG01ANDG02', 'P01'),
('A06', 'G03ANDG02ANDG01', 'P01'),
('A07', 'G01ANDG04ANDG05', 'P02'),
('A08', 'G01ANDG05ANDG04', 'P02'),
('A09', 'G04ANDG01ANDG05', 'P02'),
('A10', 'G04ANDG05ANDG01', 'P02'),
('A11', 'G05ANDG01ANDG04', 'P02'),
('A12', 'G05ANDG04ANDG01', 'P02'),
('A13', 'G01AnDG06ANDG07', 'P03'),
('A14', 'G01ANDG07ANDG06', 'P03'),
('A15', 'G06ANDG01ANDG07', 'P03'),
('A16', 'G06ANDG07ANDG01', 'P03'),
('A17', 'G07ANDG01ANDG06', 'P03'),
('A18', 'G07ANDG06ANDG01', 'P03'),
('A19', 'G08ANDG09ANDG10', 'P04'),
('A20', 'G08ANDG10ANDG09', 'P04'),
('A21', 'G09ANDG08ANDG10', 'P04'),
('A22', 'G09ANDG10ANDG08', 'P04'),
('A23', 'G10ANDG08ANDG09', 'P04'),
('A24', 'G10ANDG09ANDG08', 'P04');

-- --------------------------------------------------------

--
-- Table structure for table `basis_pengetahuan`
--

CREATE TABLE `basis_pengetahuan` (
  `kode_pengetahuan` varchar(11) NOT NULL,
  `penyakit` varchar(500) NOT NULL,
  `gejala` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basis_pengetahuan`
--

INSERT INTO `basis_pengetahuan` (`kode_pengetahuan`, `penyakit`, `gejala`) VALUES
('B01', '[p01] hepatitis b', '[g01] lemas atau mudah lelah, [g02] demam, [g03] mual dan muntah'),
('B02', '[p02] anemia', '[g01] lemas atau mudah lelah, [g04] sesak nafas, [g05] kulit pucat'),
('B03', '[p03] diabetes gestasional', '[g01] lemas atau mudah lelah, [g06] penglihatan buram, [g07] mulut kering'),
('B04', '[p04] sembelit ', '[g08] jarang bAB, [g09] sakit saat BAB, [g10] Tekstur feses kering');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kode_gejala` varchar(11) NOT NULL,
  `nama_gejala` varchar(200) NOT NULL,
  `pertanyaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kode_gejala`, `nama_gejala`, `pertanyaan`) VALUES
('G01', 'Lemas Atau Mudah Lelah', 'Apakah anda merasakan lemas dan lelah?'),
('G02', 'demam', 'Apakah anda sekarang demam ?'),
('G03', 'mual dan muntah', 'Apakah anda mual lalu muntah?'),
('G04', 'sesak nafas', 'Apakah nafas anda terasa sesak?'),
('G05', 'kulit pucat', 'Apakah kulit anda terlihat pucat?'),
('G06', 'Penglihatan buram', 'Apakah anda merasakan pengelihatan buram?'),
('G07', 'mulut kering', 'Apakah mulut anda mengering?'),
('G08', 'jarang BAB', 'Apakah anda jarang buang air besar?'),
('G09', 'sakit saat bAB', 'Apakah saat buang air besar terasa sakit?'),
('G10', 'tekstur feses kering', 'Apakah feses anda kering?');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `kode_kontak` varchar(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(65) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kode_penyakit` varchar(11) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `deskripsi_penyakit` varchar(2000) NOT NULL,
  `solusi` varchar(200) NOT NULL,
  `sumber` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kode_penyakit`, `nama_penyakit`, `deskripsi_penyakit`, `solusi`, `sumber`) VALUES
('P01', 'hepatitis B', 'Hepatitis B adalah peradangan organ hati yang disebabkan oleh virus hepatitis B. Virus in dapat menular melalui hubungan seksual atau berbagi jarum suntik', 'Diberikan vaksin untuk memperkuat sistem imunitas tubuh guna mencegah perkembangan virus dalam tubuh', 'https://www.alodokter.com/hepatitis-b'),
('P02', 'anemia', 'Anemia adalah kondisi ketika tubuh kekurangan sel darah merah yang sehat atau ketika sel darah merah tidak berfungsi dengan baik. Akibatnya, organ tubuh tidak mendapat cukup oksigen, sehingga membuat penderita anemia pucat dan mudah lelah', 'Perbanyak mengonsumsi makanan kaya zat besi dan asam folat, suplemen penambah darah dan vitamin', 'https://www.alodokter.com/anemia'),
('P03', 'diabetes Gestasional', 'Diabetes gestasional adalah diabetes yang muncul pada masa kehamilan, dan hanya berlangsung hingga proses melahirkan. Kondisi ini dapat terjadi di usia kehamilan berapa pun, namun lazimnya berlangsung di minggu ke-24 sampai ke-28 kehamilan', 'Disarankan melakukan tes darah secara lebih rutin, terutama pada 3 bulan terakhir masa kehamilan, melakukan diet sehat, dan olahraga serta mengonsumsi obat-obatan yang diresepkan dokter', 'https://www.alodokter.com/diabetes-gestasional'),
('P04', 'sembelit', 'Sembelit adalah frekuensi buang air besar yang lebih sedikit dari biasanya. Jarak waktu buang air besar pada setiap orang berbeda-beda. Umumnya dalam satu minggu, manusia buang air besar setidaknya lebih dari 3 kali', 'Mengubah pola makan dan gaya hidup, pemberian obat (lasksatif atau pencahar) atau prosedur operasi', 'https://www.alodokter.com/konstipasi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `role` varchar(10) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `no_telepon`, `role`, `username`, `password`) VALUES
('SPK001', 'Super User', 'Jalan merkurius', '2445', 'user', 'superuser', 'superuser'),
('SPK002', 'Super Admin', 'Sillicon Valey ', '123123123123', 'admin', 'superadmin', 'superadmin'),
('SPK003', 'Aji Santoso', 'Jalan jalan terus', '018456498458', 'user', 'Superuser2', 'Superuser2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`kode_aturan`);

--
-- Indexes for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD PRIMARY KEY (`kode_pengetahuan`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`kode_kontak`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
