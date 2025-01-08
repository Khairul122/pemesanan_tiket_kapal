-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 04:56 PM
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
  `id` varchar(100) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `lev` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`, `nama`, `lev`) VALUES
('IDA-A001-9348939-34845734575', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Esarlina', 1);

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
('IBG-001', '20', '0'),
('IBG-002', '30', '20000'),
('IBG-003', '40', '40000');

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
('IB-K008', 'KTKB-T008', 'SK-DISHUB/0990-2017', '78', '2017-02-03 00:00:00', 'P'),
('IB-K009', 'KTKB-T009', 'SK-DISHUB/0990-2017', '78', '2017-02-03 00:00:00', 'P'),
('IB-K010', 'KTKB-T010', 'SK-DISHUB/0990-2017', '78', '2017-02-03 00:00:00', 'P'),
('IB-K011', 'KTKB-T011', 'SK-DISHUB/0990-2017', '78', '2017-03-08 13:00:00', 'P');

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

--
-- Dumping data for table `confirm_pembayaran`
--

INSERT INTO `confirm_pembayaran` (`id_konfirm`, `id_member`, `total_bayar`, `tgl_confirm`, `tgl_jt_tempo`) VALUES
(3, 'PL07062413 ', '300444', '2024-06-06 22:03:33', '2024-06-07 08:03:33');

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
('PI001', 'Khairul Huda', 'Laporan', 'Halo', '2025-01-08 15:52:58');

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
('PL0501211', 'padang', '93da7ff0080ed80c4176b99cf2ad459a', 'test', 'test@gmail.com', '08123123123', 'padang', 2, 'C', '2021-01-05 23:15:25'),
('PL0704191', 'member', 'aa08769cdcb26674c6706093503ff0a3', 'bege', 'nopen.rianto@gmail.com', '08123123123', 'admin', 2, 'Y', '2021-01-05 23:08:35'),
('PL07062413', 'penumpang1', '06cb2e93e8008c6dbbda2af9b096e9aa', 'Joko purwanto', 'joko@gmail.com', '0811324268', 'Perkantoran Mutiara Center Kav A No 16\r\nKayuringin, Jl. A.Yani, RT.001/RW.005,', 2, 'Y', '2024-06-07 16:06:16'),
('PL08012514', '12345', '827ccb0eea8a706c4c34a16891f84e7b', 'Khairul Huda', 'khairulhuda@gmail.com', '082165443677', 'Lhoksuemawe\r\nBlang Pulo', 2, 'Y', '2025-01-08 10:22:40'),
('PL1007174', 'member', 'aa08769cdcb26674c6706093503ff0a3', 'afrizal', 'afrizal_arta@gmail.com', '08343423423', 'asdsadsad', 2, 'Y', '2017-09-24 00:42:02'),
('PL1306211', 'test123', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', 'test222@gmail.com', '0821321312321', 'padang', 2, 'Y', '2021-06-13 18:04:41'),
('PL1306217', 'google123', 'b8f8312b939f00abb38eeafd4fd107f3', 'googel', 'google@gmail.com', '0812312312312', 'padang', 2, 'Y', '2021-06-13 18:13:35'),
('PL1306218', 'aku123', '871237bf25ba34556a2755fdf2f0ee44', 'aku123', 'aku@gmail.com', '081231231232', 'padang', 2, 'Y', '2021-06-13 18:14:38'),
('PL1502181', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'asdsad', 'dfsfsdfsdf@gmail.com', '0678565464', 'sadasdasdas', 2, 'C', '2018-02-15 22:17:00'),
('PL15062110', 'siskasari', 'fd8fbc2f38b2c8d972a40f9c17833af4', 'asjdhkasjdsad', '2asdsa@gas.com', '34234234', 'asdasdasd', 2, 'Y', '2021-06-15 19:28:41'),
('PL15062111', 'asdfgh', 'a152e841783914146e4bcd4f39100686', 'asdasd', 'asdas@gmail.com', '3242423423', 'asdasdasd', 2, 'Y', '2021-06-15 19:30:26'),
('PL15062112', 'robin12345', 'fdde92eb6af29f8beb2bc9557410f2c8', 'robin', 'robin123@fsfa.com', 'robin', 'padang', 2, 'Y', '2021-06-15 19:41:25'),
('PL1506219', 'nori1234', '1af623c489d2c4e8e940a25f8875bb80', 'nori', 'nori@gmail.com', '08123123232', 'padang', 2, 'Y', '2021-06-15 17:45:09'),
('PL2409171', 'qwerty', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'nopen', 'nopen.pungkonji@gmail.com', '082312321', 'padang', 2, 'Y', '2017-09-24 00:48:53');

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
('KNK-A001', 'Nahkoda 1', '0873627633232', 'Padang', '32'),
('KNK-A004', 'Rizal', '082388232845', 'padang', '34'),
('KNK-A005', 'Sarudin', '08123456688', 'PADANG', '23');

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

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `kode_member`, `kode_tiket`, `tgl_berangkat`, `ktgr_tiket`, `nm_penumpang`, `umur`, `idk`, `bagasi`, `nohp`, `email`, `tanggal_pesan`, `status`, `id_golongan`, `no_kendaraan`, `bukti`) VALUES
('PS-T1', 'PL1007174', 'KTKB-T011', '2019-02-23', 'Dewasa', 'yopi', '1985-04-04', 'IK026', 'IBG-001', '08213123123', 'yopi@gmail.com', '2019-02-23 04:33:14', '3', 1, '', ''),
('PS-T2', 'PL0704191', 'KTKB-T007', '2021-01-06', 'Dewasa', 'wdeqw', '1982-03-02', 'IK001', 'IBG-001', '122', 'asda@gmail.com', '2021-01-04 22:10:42', '2', 1, '', ''),
('PS-T3', 'PL2409171', 'KTKB-T007', '2021-06-15', 'Dewasa', 'asdsadsa', '1982-02-03', 'IK002', 'IBG-001', '32423432423', 'asdasd@adas.com', '2021-06-15 05:46:25', '2', 1, '', ''),
('PS-T4', 'PL15062112', 'KTKB-T007', '2021-06-15', 'Dewasa', 'asdasd', '1982-01-02', 'IK003', 'IBG-001', '3242342342', 'asdasd@adas.com', '2021-06-14 20:36:13', '2', 1, '', ''),
('PS-T5', 'PL07062413', 'KTKB-T011', '2024-06-08', 'Dewasa', 'Joko purwanto', '1982-02-01', 'IK027', 'IBG-001', '0811324268', 'hrd@msolusi.id', '2024-06-07 04:57:04', '2', 3, '', ''),
('PS-T6', 'PL08012514', 'KTKB-T007', '2025-01-09', 'Dewasa', 'Khairul Huda', '2001-01-02', 'IK004', 'IBG-001', '082165443677', 'khairulhuda242@gmail.com', '2025-01-07 21:26:03', '3', 0, '', 'PL08012514_KTKB-T007_20250108_155222.png'),
('PS-T7', 'PL08012514', 'KTKB-T007', '2025-01-09', 'Anak', 'Khairul Huda', '2003-02-08', 'IK005', 'IBG-001', '082165443677', 'khairulhuda242@gmail.com', '2025-01-07 21:26:03', '3', 0, '', 'PL08012514_KTKB-T007_20250108_155222.png');

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
('KTKB-T007', '50', '20', 'IT-B002', 'KK-A001', 'KNK-A001', '150000', '250000', '10:00:00', '02:00:00'),
('KTKB-T008', '120', '122', 'IT-B003', 'KK-A002', 'KNK-A004', '100000', '150000', '09:00:00', '13:00:00'),
('KTKB-T009', '212', '212', 'IT-B004', 'KK-A002', 'KNK-A003', '100000', '200000', '14:00:00', '17:00:00'),
('KTKB-T010', '50', '20', 'IT-B002', 'KK-A001', 'KNK-A001', '150000', '250000', '13:00:00', '16:00:00'),
('KTKB-T011', '120', '150', 'IT-B003', 'KK-A002', 'KNK-A004', '100000', '150000', '13:00:00', '16:00:00'),
('KTKB-T012', '200', '100', 'IT-B004', 'KK-A002', 'KNK-A003', '100000', '200000', '08:00:00', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `kode_tujuan` varchar(15) NOT NULL,
  `nama_tujuan` varchar(100) DEFAULT NULL,
  `lama_tujuan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`kode_tujuan`, `nama_tujuan`, `lama_tujuan`) VALUES
('IT-B002', 'Mentawai Siberut Sikabaluan', '4 jam'),
('IT-B003', 'Mentawai Tuapeijat', '5 jam'),
('IT-B004', 'Mentawai Siberut selatan', '4 jam');

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
-- AUTO_INCREMENT for table `confirm_pembayaran`
--
ALTER TABLE `confirm_pembayaran`
  MODIFY `id_konfirm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `golongan_kendaraan`
--
ALTER TABLE `golongan_kendaraan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
