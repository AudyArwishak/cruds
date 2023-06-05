-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 05:25 AM
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
-- Database: `pabrikgula`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(10) NOT NULL,
  `nama_admin` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `kata_sandi` varchar(20) NOT NULL,
  `level_akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `email`, `kata_sandi`, `level_akses`) VALUES
('1789434601', 'Ahmad Alif', 'ahmadalif123@gmail.com', 'Hahaha', 'Admin Gudang 3'),
('1893329906', 'Audy Arwishak', 'audyarwishak10@gmail.com', 'Hahaha123', 'Admin Gudang 1'),
('818083610', 'Giusti Felico', 'giustife66@gmail.com', 'Hahaha123', 'Admin Staff 2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gudang`
--

CREATE TABLE `tb_gudang` (
  `id_gudang` varchar(10) NOT NULL,
  `nama_gudang` varchar(20) NOT NULL,
  `alamat_gudang` varchar(50) NOT NULL,
  `id_gula` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_gudang`
--

INSERT INTO `tb_gudang` (`id_gudang`, `nama_gudang`, `alamat_gudang`, `id_gula`) VALUES
('1809783808', 'Gudang Sortir 1', 'Jl Bromo No.30 Kota Malang', '1368277694'),
('1829519452', 'Gudang Sortir 5', 'Jl Blimbing No.8 Kota Malang', '820120205'),
('472101611', 'Gudang Sortir 3', 'Jl Arjuna No.10 Kota Malang', '820120205'),
('57724158', 'Gudang Sortir 4', 'Jl Anggrek No 55 Kota Malang', '1368277694'),
('649938270', 'Gudang Sortir 2', 'Jl Mahameru No. 88 Kota Malang', '1942543312');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gula`
--

CREATE TABLE `tb_gula` (
  `id_gula` varchar(10) NOT NULL,
  `nama_gula` varchar(20) NOT NULL,
  `stok_gula` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_gula`
--

INSERT INTO `tb_gula` (`id_gula`, `nama_gula`, `stok_gula`) VALUES
('1368277694', 'Gula Pasir', '700 Ton'),
('1909869632', 'Gula Putih', '500 Ton'),
('1942543312', 'Gula Aren', '800 Ton'),
('1983817663', 'Gula Putih', '600 Ton'),
('820120205', 'Gula Batu', '650 Ton'),
('82848398', 'Gula Batu', '850 Ton');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwalpengiriman`
--

CREATE TABLE `tb_jadwalpengiriman` (
  `id_jadwal` varchar(10) NOT NULL,
  `id_pengiriman` varchar(10) NOT NULL,
  `id_outlet` varchar(10) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `id_gudang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jadwalpengiriman`
--

INSERT INTO `tb_jadwalpengiriman` (`id_jadwal`, `id_pengiriman`, `id_outlet`, `tanggal_pengiriman`, `id_gudang`) VALUES
('1176529808', '337580075', '1793069064', '2023-06-14', '649938270'),
('1361484814', '468620535', '1793069064', '2023-06-08', '1809783808'),
('670037763', '337580075', '1687874946', '2023-05-22', '472101611'),
('773609227', '1439419535', '566622199', '2023-03-09', '57724158'),
('972262404', '1439419535', '797863420', '2023-06-15', '57724158');

-- --------------------------------------------------------

--
-- Table structure for table `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id_outlet` varchar(10) NOT NULL,
  `nama_outlet` varchar(20) NOT NULL,
  `alamat_outlet` varchar(50) NOT NULL,
  `notelp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_outlet`
--

INSERT INTO `tb_outlet` (`id_outlet`, `nama_outlet`, `alamat_outlet`, `notelp`) VALUES
('1687874946', 'Outlet Barokah', 'Jl Solo No.23 Kota Jombang', '089577688945'),
('1793069064', 'Outlet 5758', 'Jl Rukun No.1 Kota Surabaya', '089165659909'),
('566622199', 'Outlet Barokah', 'Jl Angkasa No.77 Kota Malang', '089565342212'),
('713949073', 'Outlet Amanah', 'Jl Salamrejo No.7 Kota Blitar', '089522156680'),
('797863420', 'Outlet Wijaya', 'Jl Wilis No. 10 Kota Kediri', '0895366844930');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` varchar(10) NOT NULL,
  `nama_pegawai` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `notelp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nama_pegawai`, `jabatan`, `alamat`, `notelp`) VALUES
('1321104184', 'Riska', 'Kepala Gudang', 'Jl Aksara No.1 Kota Malang', '089536729899'),
('685773108', 'Hasbi', 'Admin Gudang 4', 'Jl Aksara No.1 Kota Malang', '089567356647'),
('962324678', 'Alif', 'Admin Gudang 3', 'Jl Comboran No. 44 Kota Malang', '089522455367');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengiriman`
--

CREATE TABLE `tb_pengiriman` (
  `id_pengiriman` varchar(10) NOT NULL,
  `id_truk` varchar(10) NOT NULL,
  `id_supir` varchar(10) NOT NULL,
  `id_gula` varchar(10) NOT NULL,
  `id_outlet` varchar(10) NOT NULL,
  `jumlah_kg` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengiriman`
--

INSERT INTO `tb_pengiriman` (`id_pengiriman`, `id_truk`, `id_supir`, `id_gula`, `id_outlet`, `jumlah_kg`) VALUES
('1363431058', '1689609464', '1154200132', '1368277694', '1687874946', '110 Ton'),
('1439419535', '1689609464', '530388729', '82848398', '1687874946', '140 Ton'),
('1823532338', '1689609464', '1154200132', '820120205', '1687874946', '200 Ton'),
('1854307645', '1967585836', '610777792', '1983817663', '1793069064', '80 Ton'),
('1976015507', '1943524661', '1154200132', '1368277694', '1687874946', '100 Ton'),
('337580075', '739917544', '913067827', '1983817663', '1793069064', '70 Ton'),
('468620535', '1689609464', '1154200132', '1368277694', '1687874946', '100 Ton'),
('756217631', '649122744', '1154200132', '1368277694', '1793069064', '50 Ton'),
('784659063', '649122744', '1889581434', '820120205', '797863420', '90 Ton');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rute`
--

CREATE TABLE `tb_rute` (
  `id_rute` varchar(10) NOT NULL,
  `jarak_rute` varchar(15) NOT NULL,
  `nama_rute` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_rute`
--

INSERT INTO `tb_rute` (`id_rute`, `jarak_rute`, `nama_rute`) VALUES
('1043674143', '86 Km', 'Rute Malang - Pare'),
('488732788', '116 Km', 'Rute Malang - Blitar'),
('489343630', '103 Km', 'Rute Malang - Surabaya'),
('634882036', '30 Km', 'Rute Malng - Batu'),
('761922539', '97 Km', 'Rute Malang - Kediri');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supir`
--

CREATE TABLE `tb_supir` (
  `id_supir` varchar(10) NOT NULL,
  `nama_supir` varchar(20) NOT NULL,
  `alamat_supir` varchar(50) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `id_truk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_supir`
--

INSERT INTO `tb_supir` (`id_supir`, `nama_supir`, `alamat_supir`, `notelp`, `id_truk`) VALUES
('1154200132', 'Amirul', 'Jl Melati No.66 Kota Malang', '089533420089', '649122744'),
('1492587583', 'Laksono', 'Jl Semangka Biji No. 12 Kabupaten Malang', '089544367760', '962066757'),
('1889581434', 'Fajar', 'Jl Kembang No. 33 Kota Malang', '089511234678', '1967585836'),
('530388729', 'Sutikno', 'Jl Blimbing Muda No. 77 Kota Malang', '089563784379', '1689609464'),
('610777792', 'Hamdi', 'Jl Anggrek No. 5 Kota Kediri', '089567899890', '739917544'),
('913067827', 'Ningrat', 'Jl Pemuda No.50 Kota Jombang', '089567457898', '1943524661');

-- --------------------------------------------------------

--
-- Table structure for table `tb_truk`
--

CREATE TABLE `tb_truk` (
  `id_truk` varchar(10) NOT NULL,
  `nama_truk` varchar(20) NOT NULL,
  `kapasitas_truk` varchar(15) NOT NULL,
  `plat_nomor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_truk`
--

INSERT INTO `tb_truk` (`id_truk`, `nama_truk`, `kapasitas_truk`, `plat_nomor`) VALUES
('1689609464', 'Isuzu', '75 Ton', 'N 6799 AU'),
('1943524661', 'Isuzu 2', '40 Ton', 'N 1357 BH'),
('1967585836', 'Scania 2', '50 Ton', 'N 7745 DS'),
('649122744', 'Scania', '60 Ton', 'N 4487 DA'),
('739917544', 'Mitsubishi 2', '80 Ton', 'N 2805 AE'),
('962066757', 'Mitsubishi', '50 Ton', 'N 9637 HG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD PRIMARY KEY (`id_gudang`),
  ADD KEY `id_gula` (`id_gula`);

--
-- Indexes for table `tb_gula`
--
ALTER TABLE `tb_gula`
  ADD PRIMARY KEY (`id_gula`);

--
-- Indexes for table `tb_jadwalpengiriman`
--
ALTER TABLE `tb_jadwalpengiriman`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_pengiriman` (`id_pengiriman`),
  ADD KEY `id_outlet` (`id_outlet`),
  ADD KEY `id_gudang` (`id_gudang`);

--
-- Indexes for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_truk` (`id_truk`),
  ADD KEY `id_supir` (`id_supir`),
  ADD KEY `id_gula` (`id_gula`),
  ADD KEY `id_outlet` (`id_outlet`);

--
-- Indexes for table `tb_rute`
--
ALTER TABLE `tb_rute`
  ADD PRIMARY KEY (`id_rute`);

--
-- Indexes for table `tb_supir`
--
ALTER TABLE `tb_supir`
  ADD PRIMARY KEY (`id_supir`),
  ADD KEY `id_truk` (`id_truk`);

--
-- Indexes for table `tb_truk`
--
ALTER TABLE `tb_truk`
  ADD PRIMARY KEY (`id_truk`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD CONSTRAINT `tb_gudang_ibfk_1` FOREIGN KEY (`id_gula`) REFERENCES `tb_gula` (`id_gula`);

--
-- Constraints for table `tb_jadwalpengiriman`
--
ALTER TABLE `tb_jadwalpengiriman`
  ADD CONSTRAINT `tb_jadwalpengiriman_ibfk_1` FOREIGN KEY (`id_pengiriman`) REFERENCES `tb_pengiriman` (`id_pengiriman`),
  ADD CONSTRAINT `tb_jadwalpengiriman_ibfk_2` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id_outlet`),
  ADD CONSTRAINT `tb_jadwalpengiriman_ibfk_3` FOREIGN KEY (`id_gudang`) REFERENCES `tb_gudang` (`id_gudang`);

--
-- Constraints for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD CONSTRAINT `tb_pengiriman_ibfk_1` FOREIGN KEY (`id_truk`) REFERENCES `tb_truk` (`id_truk`),
  ADD CONSTRAINT `tb_pengiriman_ibfk_2` FOREIGN KEY (`id_supir`) REFERENCES `tb_supir` (`id_supir`),
  ADD CONSTRAINT `tb_pengiriman_ibfk_3` FOREIGN KEY (`id_gula`) REFERENCES `tb_gula` (`id_gula`),
  ADD CONSTRAINT `tb_pengiriman_ibfk_4` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id_outlet`);

--
-- Constraints for table `tb_supir`
--
ALTER TABLE `tb_supir`
  ADD CONSTRAINT `tb_supir_ibfk_1` FOREIGN KEY (`id_truk`) REFERENCES `tb_truk` (`id_truk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
