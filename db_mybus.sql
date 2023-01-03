-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2023 at 10:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mybus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_mybus`
--

CREATE TABLE `tbl_admin_mybus` (
  `kd_admin` int(50) NOT NULL,
  `nama_admin` varchar(35) DEFAULT NULL,
  `username_admin` varchar(30) DEFAULT NULL,
  `password_admin` varchar(256) DEFAULT NULL,
  `img_admin` varchar(35) DEFAULT NULL,
  `email_admin` varchar(35) DEFAULT NULL,
  `level_admin` varchar(12) DEFAULT NULL,
  `status_admin` int(1) DEFAULT NULL,
  `date_create_admin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_mybus`
--

INSERT INTO `tbl_admin_mybus` (`kd_admin`, `nama_admin`, `username_admin`, `password_admin`, `img_admin`, `email_admin`, `level_admin`, `status_admin`, `date_create_admin`) VALUES
(1, 'Manajer', 'supervisor', '$2y$10$v25.H4XMgDztA2NmxeJQSeaRl2nKboXeRTo1BjPe37R0JG3rXraZG', 'assets/backend/img/default.png', 'manager@gmail.com', '1', 1, '1552819095'),
(2, 'Admin', 'admin', '$2y$10$v25.H4XMgDztA2NmxeJQSeaRl2nKboXeRTo1BjPe37R0JG3rXraZG', 'assets/backend/img/default.png', 'adm@gmail.com', '2', 1, '1552276812');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank_mybus`
--

CREATE TABLE `tbl_bank_mybus` (
  `kd_bank` varchar(50) NOT NULL,
  `nasabah_bank` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `nomrek_bank` varchar(50) DEFAULT NULL,
  `photo_bank` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bank_mybus`
--

INSERT INTO `tbl_bank_mybus` (`kd_bank`, `nasabah_bank`, `nama_bank`, `nomrek_bank`, `photo_bank`) VALUES
('BNK0001', 'My Bus', 'BCA', '54902520644', 'assets/frontend/img/bank/bca-icon.jpg'),
('BNK0002', 'My Bus', 'MANDIRI', '6666666666', 'assets/frontend/img/bank/mandiri-icon.jpg'),
('BNK0003', 'My Bus', 'BRI', '7777777777', 'assets/frontend/img/bank/bri-icon.jpg'),
('BNK0004', 'My Bus', 'BNI', '8888888888', 'assets/frontend/img/bank/bni-icon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus`
--

CREATE TABLE `tbl_bus` (
  `kd_bus` int(50) NOT NULL,
  `nama_bus` varchar(50) DEFAULT NULL,
  `plat_bus` varchar(50) DEFAULT NULL,
  `kapasitas_bus` int(13) DEFAULT NULL,
  `status_bus` int(1) NOT NULL,
  `desc_bus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bus`
--

INSERT INTO `tbl_bus` (`kd_bus`, `nama_bus`, `plat_bus`, `kapasitas_bus`, `status_bus`, `desc_bus`) VALUES
(11, 'SM 01', 'S 4011 SMG', 19, 1, NULL),
(12, 'SM 02', 'S 4012 SMG', 19, 1, NULL),
(13, 'SB 01', 'S 4011 SBY', 19, 1, NULL),
(14, 'SB 02', 'S 4012 SBY', 19, 1, NULL),
(15, 'YG 01', 'Y 4011 YGY', 19, 1, NULL),
(16, 'YG 02', 'Y 4012 YGY', 19, 1, NULL),
(17, 'BD 01', 'B 4011 BDG', 19, 1, NULL),
(18, 'BD 02', 'B 4012 BDG', 19, 1, NULL),
(19, 'ML 01', 'M 4011 MLG', 19, 1, NULL),
(20, 'ML 02', 'M 4012 MLG', 19, 1, NULL),
(21, 'PL 01', 'P 4011 PLB', 19, 1, NULL),
(22, 'PL 02', 'P 4012 PLB', 19, 1, NULL),
(23, 'MD', 'M 4011 MDN', 19, 1, NULL),
(24, 'MD 02', 'M 4012 MDN', 19, 1, NULL),
(25, 'JK 01', 'J 4011 JKT', 19, 1, NULL),
(26, 'JK 02', 'J 4012 JKT', 19, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal_mybus`
--

CREATE TABLE `tbl_jadwal_mybus` (
  `kd_jadwal` varchar(50) NOT NULL,
  `kd_bus` varchar(50) DEFAULT NULL,
  `kd_tujuan` int(50) NOT NULL,
  `kd_asal` int(50) NOT NULL,
  `wilayah_jadwal` varchar(50) DEFAULT NULL,
  `jam_berangkat_jadwal` time DEFAULT NULL,
  `jam_tiba_jadwal` time DEFAULT NULL,
  `harga_jadwal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal_mybus`
--

INSERT INTO `tbl_jadwal_mybus` (`kd_jadwal`, `kd_bus`, `kd_tujuan`, `kd_asal`, `wilayah_jadwal`, `jam_berangkat_jadwal`, `jam_tiba_jadwal`, `harga_jadwal`) VALUES
('J0001', '17', 8, 2, 'Jakarta', '12:00:00', '15:25:00', '500000'),
('J0002', '17', 5, 2, 'Malang', '21:30:00', '23:30:00', '250000'),
('J0003', '17', 7, 2, 'Medan', '18:30:00', '20:15:00', '250000'),
('J0004', '18', 6, 2, 'Palembang', '14:30:00', '16:35:00', '325000'),
('J0005', '18', 3, 2, 'Yogyakarta', '12:05:00', '15:20:00', '345000'),
('J0006', '11', 4, 2, 'Semarang', '01:16:00', '01:16:00', '135000'),
('J0007', '25', 2, 8, 'Bandung', '06:16:00', '08:25:00', '340000'),
('J0008', '25', 5, 8, 'Malang', '15:30:00', '21:30:00', '130000'),
('J0009', '26', 3, 8, 'Yogyakarta', '12:45:00', '18:20:00', '450000'),
('J0010', '19', 2, 5, 'Bandung', '18:30:00', '20:30:00', '220000'),
('J0011', '20', 8, 5, 'Jakarta', '20:18:00', '22:30:00', '340000'),
('J0012', '20', 3, 5, 'Yogyakarta', '21:30:00', '23:20:00', '450000'),
('J0013', '23', 8, 7, 'Jakarta', '06:22:00', '11:20:00', '450000'),
('J0014', '24', 1, 7, 'Surabaya', '18:15:00', '21:30:00', '245000'),
('J0015', '24', 3, 7, 'Yogyakarta', '12:45:00', '15:30:00', '560000'),
('J0016', '21', 8, 6, 'Jakarta', '20:30:00', '23:30:00', '345000'),
('J0017', '22', 3, 6, 'Yogyakarta', '19:30:00', '23:25:00', '350000'),
('J0018', '11', 8, 4, 'Jakarta', '15:30:00', '18:50:00', '368000'),
('J0019', '12', 2, 4, 'Bandung', '11:30:00', '16:30:00', '430000'),
('J0020', '12', 3, 4, 'Yogyakarta', '02:30:00', '06:30:00', '450000'),
('J0021', '13', 2, 1, 'Bandung', '14:30:00', '20:15:00', '450000'),
('J0022', '14', 3, 1, 'Yogyakarta', '00:54:00', '09:00:00', '500000'),
('J0023', '15', 8, 3, 'Jakarta', '12:30:00', '15:20:00', '345000'),
('J0024', '16', 2, 3, 'Bandung', '18:30:00', '21:30:00', '345000'),
('J0025', '15', 5, 3, 'Malang', '12:00:00', '15:20:00', '435000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfirmasi_mybus`
--

CREATE TABLE `tbl_konfirmasi_mybus` (
  `kd_konfirmasi` varchar(50) NOT NULL,
  `kd_order` varchar(50) DEFAULT NULL,
  `nama_konfirmasi` varchar(50) DEFAULT NULL,
  `nama_bank_konfirmasi` varchar(50) DEFAULT NULL,
  `norek_konfirmasi` varchar(50) DEFAULT NULL,
  `total_konfirmasi` varchar(50) DEFAULT NULL,
  `photo_konfirmasi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konfirmasi_mybus`
--

INSERT INTO `tbl_konfirmasi_mybus` (`kd_konfirmasi`, `kd_order`, `nama_konfirmasi`, `nama_bank_konfirmasi`, `norek_konfirmasi`, `total_konfirmasi`, `photo_konfirmasi`) VALUES
('KF0001', 'ORD00001', 'Delvy Tulak Sandatoding', 'BNI', '24423523', '345000', '/assets/frontend/upload/payment/MBRC_163297911805121.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level_mybus`
--

CREATE TABLE `tbl_level_mybus` (
  `kd_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level_mybus`
--

INSERT INTO `tbl_level_mybus` (`kd_level`, `nama_level`) VALUES
(1, 'owner'),
(2, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_mybus`
--

CREATE TABLE `tbl_menu_mybus` (
  `kd_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_mybus`
--

INSERT INTO `tbl_menu_mybus` (`kd_menu`, `nama_menu`) VALUES
(1, 'owner'),
(2, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_mybus`
--

CREATE TABLE `tbl_order_mybus` (
  `id_order` int(11) NOT NULL,
  `kd_order` varchar(50) DEFAULT NULL,
  `kd_tiket` varchar(50) DEFAULT NULL,
  `kd_jadwal` varchar(50) DEFAULT NULL,
  `kd_pelanggan` varchar(50) DEFAULT NULL,
  `kd_bank` varchar(50) DEFAULT NULL,
  `asal_order` varchar(200) DEFAULT NULL,
  `nama_order` varchar(50) DEFAULT NULL,
  `tgl_beli_order` varchar(50) DEFAULT NULL,
  `tgl_berangkat_order` varchar(50) DEFAULT NULL,
  `nama_kursi_order` varchar(50) DEFAULT NULL,
  `umur_kursi_order` varchar(50) DEFAULT NULL,
  `no_kursi_order` varchar(50) DEFAULT NULL,
  `no_ktp_order` varchar(50) DEFAULT NULL,
  `no_tlpn_order` varchar(50) DEFAULT NULL,
  `alamat_order` varchar(100) DEFAULT NULL,
  `email_order` varchar(100) DEFAULT NULL,
  `expired_order` varchar(50) DEFAULT NULL,
  `qrcode_order` varchar(100) DEFAULT NULL,
  `status_order` varchar(2) DEFAULT NULL,
  `nama_institusi` varchar(100) DEFAULT NULL,
  `jumlah_kursi_institusi` int(5) DEFAULT NULL,
  `tlp_institusi` int(50) DEFAULT NULL,
  `alamat_institusi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_mybus`
--

INSERT INTO `tbl_order_mybus` (`id_order`, `kd_order`, `kd_tiket`, `kd_jadwal`, `kd_pelanggan`, `kd_bank`, `asal_order`, `nama_order`, `tgl_beli_order`, `tgl_berangkat_order`, `nama_kursi_order`, `umur_kursi_order`, `no_kursi_order`, `no_ktp_order`, `no_tlpn_order`, `alamat_order`, `email_order`, `expired_order`, `qrcode_order`, `status_order`, `nama_institusi`, `jumlah_kursi_institusi`, `tlp_institusi`, `alamat_institusi`) VALUES
(185, 'ORD00001', 'TORD000012023013118', 'J0023', 'PL0006', 'BNK0002', '3', 'Delvy Tulak Sandatoding', 'Selasa, 03 Januari 2023, 14:31', '2023-01-31', 'Delvy Tulak Sandatoding', '233', '18', '73260884020222', '085343961822', 'Klitren Lor. GK III No. 303', 'delvytsandatoding19@gmail.com', '04-01-2023 14:31:51', 'assets/frontend/upload/qrcode/ORD00001.png', '2', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan_mybus`
--

CREATE TABLE `tbl_pelanggan_mybus` (
  `kd_pelanggan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username_pelanggan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password_pelanggan` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `no_ktp_pelanggan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_pelanggan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat_pelanggan` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `email_pelanggan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `telpon_pelanggan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `img_pelanggan` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `status_pelanggan` int(1) DEFAULT NULL,
  `date_create_pelanggan` varchar(50) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_pelanggan_mybus`
--

INSERT INTO `tbl_pelanggan_mybus` (`kd_pelanggan`, `username_pelanggan`, `password_pelanggan`, `no_ktp_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `email_pelanggan`, `telpon_pelanggan`, `img_pelanggan`, `status_pelanggan`, `date_create_pelanggan`) VALUES
('PL0001', 'jokowidodo', '$2y$10$EdK0hNQ5Os6kJ4stD78xBeL0dHpY3vwgW5C..OytDPZorbB3FMGrK', '', 'Joko Widodo', 'Klitren Lor. GK III No. 303', 'joko@gmail.com', '085343961833', 'assets/frontend/img/default.png', 0, '1668520356'),
('PL0002', 'vanessa', '$2y$10$MmXRFCqLDzALSmcuPAOkqOXfqIEui5PEGirRyuQU/a.nQppAXUZVO', '', 'Sheila Vanessa Hartono', 'Jl Kramat Raya 3 H Kompl Maya Indah II, DKI Jakarta', 'sheilavanessa2@gmail.com', '083222444555', 'assets/frontend/img/default.png', 0, '1668520799'),
('PL0003', 'vijey', '$2y$10$MunNQMJRsCaraiIoTWyIOemgaBGcjV0YcMb3s8sthoOq377jh7aEe', '', 'Vijey Yahya Putra o', 'Jl Al Wathoniah 9 RT 015/01, DKI Jakarta', 'vijeyputra@gmail.com', '097234536212', 'assets/frontend/img/t2.jpg', 0, '1668520840'),
('PL0004', 'puspa', '$2y$10$0fXS5RiQR3HiGp.Tbft.pOntiUuFdsEJgemqMPZGiM0Z7mBdRchxe', '', 'Puspitasari Marthin', 'Jl Kalibaru Brt VII 11, DKI Jakarta', 'puspitasari@gmail.com', '098767234332', 'assets/frontend/img/default.png', 0, '1668520883'),
('PL0005', 'glein', '$2y$10$Z0yHLBONdwK9Rs7A1RdaqOU841bNRS8ix7l069wHx8EP/imBaYTIa', '', 'Glein Putri Silvandari', 'Ruko Puri Indah Bl T-2/22, DKI Jakarta', 'glein@gmail.com', '098234337872', 'assets/frontend/img/default.png', 0, '1668520924'),
('PL0006', 'delvyyyy__', '$2y$10$wEKCXJH5GC1zLVwt7wlcf.Q1A9FbpZYikfEcFCq5kQxp.A3KY2.56', '', 'Delvy Tulak Sandatoding', 'Klitren Lor. GK III No. 303', 'delvytsandatoding19@gmail.com', '085343961822', 'assets/frontend/img/default.png', 0, '1670926710'),
('PL0007', 'mariavalencien', '$2y$10$i1wcbuEdXDbGQC6vlxrSPuIkVWgy8QU4rc1vBfmNW7PRrBRM4jjNe', '', 'Maria Valencien Nessie Octataria', 'Jl. Poros Makassar, Bonto Marannu, Maros, Sulawesi Selatan', 'maria@gmail.com', '085343961855', 'assets/frontend/img/default.png', 0, '1670927831'),
('PL0008', 'fanget123', '$2y$10$uLBOjaMr2sgzHTzLedwLaO.GihHNAfdNIPlwDpRsOsVDWfhwby0Ha', '', 'Natasha Angelica Panget', 'Jl. Affandi, Mrican, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', 'fanget@gmail.com', '085343961800', 'assets/frontend/img/default.png', 0, '1671028918'),
('PL0009', 'panget', '$2y$10$0XHm3wRJg0rwZx2i6dt1N.gLt2C3LKqK/31HsQ2YFf8cRLg9GLcz2', '', 'Natasha Angelica Panget', 'Sekaran, Gunung Pati, Semarang City, Central Java 50229', 'nglcpanget@gmail.com', '082123123456', 'assets/frontend/img/default.png', 0, '1672715585');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tiket_mybus`
--

CREATE TABLE `tbl_tiket_mybus` (
  `id_tiket` int(50) NOT NULL,
  `kd_tiket` varchar(50) NOT NULL,
  `kd_order` varchar(50) DEFAULT NULL,
  `nama_tiket` varchar(50) DEFAULT NULL,
  `kursi_tiket` varchar(50) DEFAULT NULL,
  `umur_tiket` varchar(50) DEFAULT NULL,
  `asal_beli_tiket` varchar(50) DEFAULT NULL,
  `harga_tiket` varchar(50) NOT NULL,
  `etiket_tiket` varchar(100) DEFAULT NULL,
  `status_tiket` varchar(50) NOT NULL,
  `nama_institusi` varchar(500) DEFAULT NULL,
  `jumlah_kursi_institusi` int(5) DEFAULT NULL,
  `create_tgl_tiket` date DEFAULT NULL,
  `create_admin_tiket` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tiket_mybus`
--

INSERT INTO `tbl_tiket_mybus` (`id_tiket`, `kd_tiket`, `kd_order`, `nama_tiket`, `kursi_tiket`, `umur_tiket`, `asal_beli_tiket`, `harga_tiket`, `etiket_tiket`, `status_tiket`, `nama_institusi`, `jumlah_kursi_institusi`, `create_tgl_tiket`, `create_admin_tiket`) VALUES
(199, 'TORD000012023013118', 'ORD00001', 'Delvy Tulak Sandatoding', '18', '233 Tahun', '3', '345000', 'assets/backend/upload/etiket/ORD00001.pdf', '2', NULL, NULL, '2023-01-03', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tujuan_mybus`
--

CREATE TABLE `tbl_tujuan_mybus` (
  `kd_tujuan` int(50) NOT NULL,
  `kota_tujuan` varchar(50) NOT NULL,
  `nama_terminal_tujuan` varchar(50) NOT NULL,
  `terminal_tujuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tujuan_mybus`
--

INSERT INTO `tbl_tujuan_mybus` (`kd_tujuan`, `kota_tujuan`, `nama_terminal_tujuan`, `terminal_tujuan`) VALUES
(1, 'Surabaya', 'Terminal Kayu Besar', 'Jl. Letnan Jenderal S. Parman, Kasian, Kedungrejo, Kec. Waru, Kota SBY'),
(2, 'Bandung', 'Terminal Bojongloa ', 'Jl. Raya Sawahan No.283, Situsaeur, Bojongloa Kidul, Kota Bandung, Jawa Barat 40235'),
(3, 'Yogyakarta', 'Terminal Giwangan', 'Giwangan, Umbulharjo, Yogyakarta City, Special Region of Yogyakarta 55163'),
(4, 'Semarang', 'Terminal Penggaron', 'Penggaron Kidul, Pedurungan, Semarang'),
(5, 'Malang', 'Terminal Arjosari', 'Arjosari, Blimbing, Malang City, East Java 65126'),
(6, 'Palembang', 'Terimnal Alang-alang Lebar', 'Jl. Bypass Alang-Alang Lebar, Kec. Alang-Alang Lebar, Kota Palembang'),
(7, 'Medan', 'Terimnal Terpadu Amplas', 'Timbang Deli, Medan Amplas, Kota Medan, Sumatera Utara 20148'),
(8, 'Jakarta', 'Terminal Nyak Arief Simprug', 'Jl. T Nyak Arief Simprug Garden 2 Kav D-3 Grogol Slt Jakar, DKI Jakarta, 12220');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin_mybus`
--
ALTER TABLE `tbl_admin_mybus`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `tbl_bank_mybus`
--
ALTER TABLE `tbl_bank_mybus`
  ADD PRIMARY KEY (`kd_bank`);

--
-- Indexes for table `tbl_bus`
--
ALTER TABLE `tbl_bus`
  ADD PRIMARY KEY (`kd_bus`);

--
-- Indexes for table `tbl_jadwal_mybus`
--
ALTER TABLE `tbl_jadwal_mybus`
  ADD PRIMARY KEY (`kd_jadwal`),
  ADD KEY `kd_bus` (`kd_bus`),
  ADD KEY `kd_tujuan` (`kd_tujuan`);

--
-- Indexes for table `tbl_konfirmasi_mybus`
--
ALTER TABLE `tbl_konfirmasi_mybus`
  ADD PRIMARY KEY (`kd_konfirmasi`),
  ADD KEY `kode_order` (`kd_order`);

--
-- Indexes for table `tbl_level_mybus`
--
ALTER TABLE `tbl_level_mybus`
  ADD PRIMARY KEY (`kd_level`);

--
-- Indexes for table `tbl_menu_mybus`
--
ALTER TABLE `tbl_menu_mybus`
  ADD PRIMARY KEY (`kd_menu`);

--
-- Indexes for table `tbl_order_mybus`
--
ALTER TABLE `tbl_order_mybus`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `kd_jadwal` (`kd_jadwal`),
  ADD KEY `kd_kustomer` (`kd_pelanggan`),
  ADD KEY `kd_tiket` (`kd_tiket`),
  ADD KEY `kd_bank` (`kd_bank`);

--
-- Indexes for table `tbl_pelanggan_mybus`
--
ALTER TABLE `tbl_pelanggan_mybus`
  ADD PRIMARY KEY (`kd_pelanggan`);

--
-- Indexes for table `tbl_tiket_mybus`
--
ALTER TABLE `tbl_tiket_mybus`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `kode_order` (`kd_order`),
  ADD KEY `kd_tiket` (`kd_tiket`),
  ADD KEY `kd_tiket_2` (`kd_tiket`);

--
-- Indexes for table `tbl_tujuan_mybus`
--
ALTER TABLE `tbl_tujuan_mybus`
  ADD PRIMARY KEY (`kd_tujuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin_mybus`
--
ALTER TABLE `tbl_admin_mybus`
  MODIFY `kd_admin` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_bus`
--
ALTER TABLE `tbl_bus`
  MODIFY `kd_bus` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_level_mybus`
--
ALTER TABLE `tbl_level_mybus`
  MODIFY `kd_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_menu_mybus`
--
ALTER TABLE `tbl_menu_mybus`
  MODIFY `kd_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order_mybus`
--
ALTER TABLE `tbl_order_mybus`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `tbl_tiket_mybus`
--
ALTER TABLE `tbl_tiket_mybus`
  MODIFY `id_tiket` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `tbl_tujuan_mybus`
--
ALTER TABLE `tbl_tujuan_mybus`
  MODIFY `kd_tujuan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_jadwal_mybus`
--
ALTER TABLE `tbl_jadwal_mybus`
  ADD CONSTRAINT `tbl_jadwal_mybus_ibfk_1` FOREIGN KEY (`kd_tujuan`) REFERENCES `tbl_tujuan_mybus` (`id_tujuan`);

--
-- Constraints for table `tbl_order_mybus`
--
ALTER TABLE `tbl_order_mybus`
  ADD CONSTRAINT `tbl_order_mybus_ibfk_1` FOREIGN KEY (`kd_bank`) REFERENCES `tbl_bank_mybus` (`kd_bank`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
