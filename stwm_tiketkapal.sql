-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2025 at 07:49 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stwm_tiketkapal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `lev` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`, `nama`, `lev`) VALUES
(1, 'penjualan', '21232f297a57a5a743894a0e4a801fc3', 'penjualan', 1),
(2, 'pimpinan', '21232f297a57a5a743894a0e4a801fc3', 'pimpinan', 2),
(3, 'syahbandar', '21232f297a57a5a743894a0e4a801fc3', 'syahbandar', 3),
(4, 'operator', '21232f297a57a5a743894a0e4a801fc3', 'Operator Agen', 4);

-- --------------------------------------------------------

--
-- Table structure for table `bagasi`
--

CREATE TABLE `bagasi` (
  `id_bagasi` varchar(15) NOT NULL,
  `jml_bagasi` varchar(15) NOT NULL,
  `harga` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagasi`
--

INSERT INTO `bagasi` (`id_bagasi`, `jml_bagasi`, `harga`) VALUES
('IBG-002', '30', '20000'),
('IBG-003', '40', '40000'),
('IBG-004', '20', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `berangkat`
--

CREATE TABLE `berangkat` (
  `id_berangkat` varchar(15) NOT NULL,
  `id_tiket` varchar(100) DEFAULT NULL,
  `no_surat_izin` varchar(100) DEFAULT NULL,
  `jml_penumpang` varchar(15) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` enum('P','B') DEFAULT 'B'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berangkat`
--

INSERT INTO `berangkat` (`id_berangkat`, `id_tiket`, `no_surat_izin`, `jml_penumpang`, `tanggal`, `status`) VALUES
('IB-K001', 'KTKB-T007', '01', '10', '2025-01-10 00:00:00', 'P'),
('IB-K003', 'KTKB-T013', 'SPB/31-01-2024', '50', '2025-01-31 07:00:00', 'P'),
('IB-K004', 'KTKB-T014', 'SPB/01-02-2025', '50', '2025-02-01 13:00:00', 'P'),
('IB-K005', 'KTKB-T016', 'SPB/02-02-2025', '50', '2025-03-02 07:00:00', 'P'),
('IB-K006', 'KTKB-T013', 'SPB/03-02-2025', '50', '2025-02-03 14:00:00', 'P'),
('IB-K007', 'KTKB-T019', 'SPB/04-02-2025', '60', '2025-02-04 08:00:00', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `confirm_pembayaran`
--

CREATE TABLE `confirm_pembayaran` (
  `id_konfirm` int(11) NOT NULL,
  `id_member` varchar(15) NOT NULL,
  `total_bayar` varchar(30) NOT NULL,
  `tgl_confirm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tgl_jt_tempo` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `golongan_kendaraan`
--

CREATE TABLE `golongan_kendaraan` (
  `id_golongan` int(11) NOT NULL,
  `nm_golongan` varchar(50) NOT NULL,
  `ket_golongan` text NOT NULL,
  `tarif_golongan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan_kendaraan`
--

INSERT INTO `golongan_kendaraan` (`id_golongan`, `nm_golongan`, `ket_golongan`, `tarif_golongan`) VALUES
(1, 'Golongan Kendaraan', '-', 0),
(2, 'Gol IVA', 'Minibus / Mobil Pribadi (1x Ukuran Mobil)', 140000),
(3, 'Gol IVA (KSO)', 'Minibus Sampri & Prisma', 150000),
(4, 'Gol IVB', 'Pick Up, Double Cabin dan sejenis', 135000);

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `idi` varchar(15) NOT NULL,
  `nm` varchar(30) NOT NULL,
  `sub` varchar(30) NOT NULL,
  `isi` text NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`idi`, `nm`, `sub`, `isi`, `tgl`) VALUES
('PI001', 'olivia', 'Hai', 'Budi', '2025-02-13 18:23:04'),
('PI002', 'Halo', 'Halo', 'Halo', '2025-02-13 18:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `kapal`
--

CREATE TABLE `kapal` (
  `kode_kapal` varchar(30) NOT NULL,
  `nama_kapal` varchar(100) NOT NULL,
  `rakit_kapal` varchar(100) NOT NULL,
  `izin_kapal` varchar(100) NOT NULL,
  `jml_kursi` varchar(50) NOT NULL,
  `ft_kapal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kapal`
--

INSERT INTO `kapal` (`kode_kapal`, `nama_kapal`, `rakit_kapal`, `izin_kapal`, `jml_kursi`, `ft_kapal`) VALUES
('KK-A001', 'Mentawai Fast 2', '2012', 'DISHUB-091992/PDG', '100', 'kapal1.jpg'),
('KK-A002', 'Mentawai Fast 1', '2012', 'DISHUB-0919442/PDG', '100', 'kapal2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE `kursi` (
  `idk` varchar(15) NOT NULL,
  `nok` varchar(15) NOT NULL,
  `id_kapal` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursi`
--

INSERT INTO `kursi` (`idk`, `nok`, `id_kapal`) VALUES
('IK001', '1A', 'KK-A001'),
('IK002', '2A', 'KK-A001'),
('IK003', '3A', 'KK-A001'),
('IK004', '4A', 'KK-A001'),
('IK005', '5A', 'KK-A001'),
('IK006', '6A', 'KK-A001'),
('IK007', '7A', 'KK-A001'),
('IK008', '8A', 'KK-A001'),
('IK009', '9A', 'KK-A001'),
('IK024', '24A', 'KK-A001'),
('IK025', '25A', 'KK-A001'),
('IK026', '1A', 'KK-A002'),
('IK027', '2A', 'KK-A002'),
('IK028', '3A', 'KK-A002'),
('IK029', '4A', 'KK-A002'),
('IK030', '5A', 'KK-A002'),
('IK031', '6A', 'KK-A002'),
('IK032', '7A', 'KK-A002'),
('IK033', '8A', 'KK-A002'),
('IK034', '9A', 'KK-A002'),
('IK035', '10A', 'KK-A002'),
('IK036', '11A', 'KK-A002'),
('IK037', '12A', 'KK-A002'),
('IK038', '13A', 'KK-A002'),
('IK039', '14A', 'KK-A002'),
('IK040', '15A', 'KK-A002'),
('IK041', '26A', 'KK-A001');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `p_no_identitas` varchar(32) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `p_nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `p_nohp` varchar(15) DEFAULT NULL,
  `p_alamat` text,
  `lev` int(1) NOT NULL,
  `confirm` enum('Y','N','C') NOT NULL DEFAULT 'N',
  `tgl_daf` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`p_no_identitas`, `user`, `pass`, `p_nama`, `email`, `p_nohp`, `p_alamat`, `lev`, `confirm`, `tgl_daf`) VALUES
('PL1302256', 'budi', '00dfc53ee86af02e742515cdcf075ed3', 'Budi', 'budi@gmail.com', '082165443677', 'Lhoksuemawe\r\nBlang Pulo', 2, 'Y', '2025-02-13 18:14:37'),
('PL3001251', 'wafi', 'a9629197076b8faaf28897469621e21a', 'wafi', 'wafi123@gmail.com', '09242456373', 'Padang', 2, 'Y', '2025-01-30 09:44:23'),
('PL3001252', 'imam', 'eaccb8ea6090a40a98aa28c071810371', 'Imam Fakri', 'imam12@gmail.com', '081122334455', 'Sicincin', 2, 'Y', '2025-01-30 17:48:32'),
('PL3001253', 'aisyah', '26bb533df5747c7a3f2a9cc48a8cf3ee', 'Aisyah Alfurqan', 'aisyah00@gmail.com', '0812443286728', 'Padang', 2, 'Y', '2025-01-30 17:51:56'),
('PL3001254', 'khaila', '10ec9a84b750befeb646ca62fe55502b', 'Khaila Syahira', 'khaila@gmail.com', '0823445177728', 'Solok', 2, 'Y', '2025-01-30 17:52:58'),
('PL3001255', 'alex', '534b44a19bf18d20b71ecc4eb77c572f', 'Alexander', 'alex18@gmail.com', '0895359531361', 'Mentawai', 2, 'Y', '2025-01-30 17:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `nahkoda`
--

CREATE TABLE `nahkoda` (
  `kode_nah` varchar(100) NOT NULL,
  `nama_nah` varchar(100) DEFAULT NULL,
  `nohp` varchar(15) NOT NULL,
  `alm` text NOT NULL,
  `umur` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nahkoda`
--

INSERT INTO `nahkoda` (`kode_nah`, `nama_nah`, `nohp`, `alm`, `umur`) VALUES
('KNK-A004', 'Rizal', '082388232845', 'PADANG', '34'),
('KNK-A005', 'Sarudin', '08123456688', 'PADANG', '23'),
('KNK-A006', 'Akmal', '081122334455', 'SOLOK', '25'),
('KNK-A007', 'Rezky', '081234567876', 'PARIAMAN', '24'),
('KNK-A008', 'Cristo', '081234567876', 'Mentawai', '36');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` varchar(15) NOT NULL,
  `kode_member` varchar(100) DEFAULT NULL,
  `kode_tiket` varchar(50) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `ktgr_tiket` enum('Dewasa','Anak') NOT NULL,
  `nm_penumpang` varchar(100) NOT NULL,
  `umur` date NOT NULL,
  `idk` varchar(15) NOT NULL,
  `bagasi` varchar(15) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggal_pesan` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('1','2','3') NOT NULL DEFAULT '1',
  `id_golongan` int(11) NOT NULL DEFAULT '1',
  `no_kendaraan` varchar(30) NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `kode_tiket` varchar(15) NOT NULL,
  `jml_tiket_dewasa` varchar(30) NOT NULL,
  `jml_tiket_ank2` varchar(50) NOT NULL,
  `id_tujuan` varchar(15) NOT NULL,
  `id_kapal` varchar(15) NOT NULL,
  `id_nahkoda` varchar(15) NOT NULL,
  `hrg_tiket_ank2` varchar(50) NOT NULL,
  `hrg_tiket_dewasa` varchar(50) NOT NULL,
  `jam_berangkat` time NOT NULL,
  `jam_tiba` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`kode_tiket`, `jml_tiket_dewasa`, `jml_tiket_ank2`, `id_tujuan`, `id_kapal`, `id_nahkoda`, `hrg_tiket_ank2`, `hrg_tiket_dewasa`, `jam_berangkat`, `jam_tiba`) VALUES
('KTKB-T013', '30', '20', 'IT-B007', 'KK-A001', 'KNK-A006', '150000', '285000', '07:00:00', '11:00:00'),
('KTKB-T014', '30', '20', 'IT-B004', 'KK-A001', 'KNK-A006', '150000', '285000', '13:00:00', '17:00:00'),
('KTKB-T016', '40', '20', 'IT-B005', 'KK-A002', 'KNK-A005', '150000', '285000', '07:00:00', '12:00:00'),
('KTKB-T018', '50', '20', 'IT-B008', 'KK-A002', 'KNK-A005', '150000', '285000', '07:00:00', '12:00:00'),
('KTKB-T019', '50', '30', 'IT-B009', 'KK-A002', 'KNK-A006', '100000', '150000', '13:00:00', '15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `kode_tujuan` varchar(15) NOT NULL,
  `nama_tujuan` varchar(100) DEFAULT NULL,
  `lama_tujuan` varchar(100) DEFAULT NULL,
  `pelabuhan_asal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`kode_tujuan`, `nama_tujuan`, `lama_tujuan`, `pelabuhan_asal`) VALUES
('IT-B004', 'Padang', '4 Jam', 'Siberut'),
('IT-B005', 'Padang', '5 Jam', 'Sikabaluan'),
('IT-B006', 'Siberut', '2 Jam', 'Sikabaluan'),
('IT-B007', 'Siberut', '4 Jam', 'Padang'),
('IT-B008', 'Sikabaluan', '5 Jam', 'Padang'),
('IT-B009', 'Sikabaluan', '2 Jam', 'Siberut');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bagasi`
--
ALTER TABLE `bagasi`
  ADD PRIMARY KEY (`id_bagasi`);

--
-- Indexes for table `berangkat`
--
ALTER TABLE `berangkat`
  ADD PRIMARY KEY (`id_berangkat`);

--
-- Indexes for table `confirm_pembayaran`
--
ALTER TABLE `confirm_pembayaran`
  ADD PRIMARY KEY (`id_konfirm`);

--
-- Indexes for table `golongan_kendaraan`
--
ALTER TABLE `golongan_kendaraan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`idi`);

--
-- Indexes for table `kapal`
--
ALTER TABLE `kapal`
  ADD PRIMARY KEY (`kode_kapal`);

--
-- Indexes for table `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`idk`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`p_no_identitas`);

--
-- Indexes for table `nahkoda`
--
ALTER TABLE `nahkoda`
  ADD PRIMARY KEY (`kode_nah`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`kode_tiket`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`kode_tujuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `confirm_pembayaran`
--
ALTER TABLE `confirm_pembayaran`
  MODIFY `id_konfirm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `golongan_kendaraan`
--
ALTER TABLE `golongan_kendaraan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
