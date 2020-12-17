-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 06:03 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `nama_admin` varchar(25) CHARACTER SET latin1 NOT NULL,
  `username` varchar(25) CHARACTER SET latin1 NOT NULL,
  `password` varchar(35) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(6, 'syifa', 'syifa', '21232f297a57a5a743894a0e4'),
(7, 'syifa', 'syifa', 'ceb335d3fabef8b6116f2e0a4c5c9c1c');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(5) NOT NULL,
  `nama_anggota` varchar(45) CHARACTER SET latin1 NOT NULL,
  `gender` enum('Laki-laki','Perempuan') CHARACTER SET latin1 NOT NULL,
  `no_telp` varchar(15) CHARACTER SET latin1 NOT NULL,
  `alamat` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `password` varchar(35) CHARACTER SET latin1 NOT NULL,
  `gambar` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `gender`, `no_telp`, `alamat`, `email`, `password`, `gambar`) VALUES
(10, 'Daffa Wirawan', 'Laki-laki', '00888888889999', 'Balingasal', 'daffa@gmail.com', 'daffaaja', 'gambar1605664915.jpg'),
(12, 'Syifa Pramesti', 'Perempuan', '082243755726', 'Jakarta', 'syifaprmst@gmail.com', 'prames', 'gambar1606731364.jpg'),
(13, 'Kamu', 'Perempuan', '082243755726', 'Jakarta', 'syifaprmst@gmail.com', 'prames', 'gambar1607411949.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(5) NOT NULL,
  `id_kategori` int(5) DEFAULT NULL,
  `judul_buku` varchar(50) CHARACTER SET latin1 NOT NULL,
  `pengarang` varchar(35) CHARACTER SET latin1 NOT NULL,
  `thn_terbit` date NOT NULL,
  `penerbit` varchar(50) CHARACTER SET latin1 NOT NULL,
  `isbn` varchar(25) CHARACTER SET latin1 NOT NULL,
  `jumlah_buku` int(3) NOT NULL,
  `lokasi` enum('Rak 1','Rak 2','Rak 3') CHARACTER SET latin1 NOT NULL,
  `gambar` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tgl_input` date NOT NULL,
  `status_buku` enum('1','0') CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `judul_buku`, `pengarang`, `thn_terbit`, `penerbit`, `isbn`, `jumlah_buku`, `lokasi`, `gambar`, `tgl_input`, `status_buku`) VALUES
(9, 3, 'Bumi', 'Tere Liye', '2014-01-01', 'PT Gramedia Pustaka Utama', '9786020301129', 1, 'Rak 3', 'gambar1607402214.jpg', '2020-10-17', '1'),
(10, 3, 'Bulan', 'Tere Liye', '2015-02-03', 'PT Gramedia Pustaka Utama', '978-602-03-1411-2', 0, 'Rak 1', 'gambar1602895813.jpg', '2020-10-17', '0'),
(12, 3, 'Matahari', 'Tere Liye', '2016-06-06', 'PT Gramedia Pustaka Utama', '978- 602 - 03 - 3211 – 6', 0, 'Rak 2', 'gambar1602895929.jpg', '2020-10-17', '0'),
(14, 3, 'Komet', 'Tere Liye', '2018-08-08', 'PT Gramedia Pustaka Utama', '9786020385938', 0, 'Rak 1', 'gambar1602896206.jpg', '2020-10-17', '0'),
(32, 3, 'Judul Buku', 'Pengarang', '2020-11-30', 'Penerbit', '123456', 2, 'Rak 2', 'gambar1607411886.jpg', '1970-01-01', '1'),
(34, 3, 'Bintang', 'Tere Liye', '2011-12-14', 'Grasindo,Yogyakarta', '34354422', 1, 'Rak 1', 'gambar1607402156.jpg', '1970-01-01', '1'),
(35, 3, 'Komet', 'Tere Liye', '2007-12-11', 'Gradien Mediatama', '34354422', 2, 'Rak 2', 'gambar1607402300.jpg', '2020-12-08', '1'),
(36, 3, 'Bulan', 'Siswoyo Utomo', '2003-11-11', 'Gema Insani', '34354422', 2, 'Rak 2', 'gambar1607411872.jpg', '2020-12-08', '1');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id_pinjam` int(5) DEFAULT NULL,
  `id_buku` int(5) DEFAULT NULL,
  `tgl_pengembalin` date NOT NULL,
  `denda` double NOT NULL,
  `status_kembali` enum('0','1') CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, ''),
(2, 'Teknologi'),
(3, 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(5) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_anggota` int(5) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `totaldenda` double NOT NULL DEFAULT 0,
  `status_pinjam` enum('0','1') CHARACTER SET latin1 DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_pinjam` int(11) NOT NULL,
  `tgl_pencatatan` datetime NOT NULL,
  `id_anggota` int(4) NOT NULL,
  `id_buku` int(4) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` double NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `total_denda` double NOT NULL,
  `status_pengembalian` varchar(15) CHARACTER SET latin1 NOT NULL,
  `status_peminjaman` varchar(25) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_pinjam`, `tgl_pencatatan`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `denda`, `tgl_pengembalian`, `total_denda`, `status_pengembalian`, `status_peminjaman`) VALUES
(1, '1970-01-01 07:00:01', 0, 13, '2020-11-18', '2020-11-27', 1000, '2020-11-29', 2000, '1', '1'),
(3, '1970-01-01 07:00:01', 10, 17, '2020-11-19', '2020-11-27', 2000, '2020-11-30', 6000, '1', '1'),
(4, '1970-01-01 07:00:01', 10, 32, '2020-11-30', '2020-12-03', 1000, '2020-12-04', 1000, '1', '1'),
(6, '1970-01-01 07:00:01', 12, 32, '2020-11-30', '2020-12-03', 2000, '2020-12-05', 4000, '1', '1'),
(7, '1970-01-01 07:00:01', 12, 34, '2020-12-08', '2020-12-10', 2000, '2020-12-12', 4000, '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `fk_buku_kategori` (`id_kategori`);

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD KEY `fk_detail_pinjam_buku` (`id_buku`),
  ADD KEY `fk_detail_pinjam` (`id_pinjam`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_buku_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD CONSTRAINT `fk_detail_pinjam` FOREIGN KEY (`id_pinjam`) REFERENCES `peminjaman` (`id_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
