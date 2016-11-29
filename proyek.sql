-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Nov 2016 pada 00.41
-- Versi Server: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ida` int(5) NOT NULL,
  `idu` varchar(5) NOT NULL,
  `nama_admin` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`ida`, `idu`, `nama_admin`) VALUES
(1, '22', 'Nabilah'),
(2, '23', 'Diyah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ambil_mk`
--

CREATE TABLE IF NOT EXISTS `ambil_mk` (
  `id_ambil` int(12) NOT NULL,
  `idu` varchar(30) NOT NULL,
  `id_mk` varchar(10) NOT NULL,
  `ntugas` varchar(8) NOT NULL,
  `nkuis` varchar(8) NOT NULL,
  `nuts` varchar(8) NOT NULL,
  `nuas` varchar(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ambil_mk`
--

INSERT INTO `ambil_mk` (`id_ambil`, `idu`, `id_mk`, `ntugas`, `nkuis`, `nuts`, `nuas`) VALUES
(1, '2', '4', '78', '96', '95', '88'),
(2, '7', '5', '0', '0', '0', '0'),
(3, '11', '4', '0', '0', '0', '0'),
(4, '4', '1', '0', '0', '0', '0'),
(5, '2', '1', '90', '90', '90', '90'),
(6, '2', '2', '56', '78', '66', '75'),
(7, '11', '1', '0', '0', '0', '0'),
(18, '2', '9', '75', '60', '59', '60'),
(19, '6', '4', '0', '0', '0', '0'),
(20, '6', '9', '0', '0', '0', '0'),
(21, '6', '14', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `idd` int(5) NOT NULL,
  `idu` varchar(10) DEFAULT NULL,
  `nama_dosen` char(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`idd`, `idu`, `nama_dosen`) VALUES
(1, '12', 'SETIADI CAHYONO PUTRO'),
(2, '13', 'TRI ATMADJI SUTIKNO'),
(3, '14', 'SUWASONO'),
(4, '15', 'AGUSTA RAKHMAT TAUFANI'),
(5, '16', 'KARTIKA CANDRA KIRANA'),
(6, '17', 'AHMAD MURSYIDUN NIDHOM'),
(7, '18', 'MARSUDI'),
(8, '19', 'PIDEKSO ADI'),
(9, '20', 'DILA UMNIA SORAYA'),
(10, '21', 'MARIJAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id` int(10) NOT NULL,
  `id_matakuliah` int(10) NOT NULL,
  `id_pertemuan` int(10) NOT NULL,
  `tanggal_upload` varchar(50) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `tipe_file` varchar(50) NOT NULL,
  `ukuran_file` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_tugas`
--

CREATE TABLE IF NOT EXISTS `hasil_tugas` (
  `nama_kelompok` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `id_mahasiswa` varchar(12) NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil_tugas`
--

INSERT INTO `hasil_tugas` (`nama_kelompok`, `ukuran`, `id_mahasiswa`, `tanggal`) VALUES
('kelompok A', '', '150533600165', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `idj` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `id_mk` varchar(7) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `ujian` enum('UTS','UAS') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`idj`, `tanggal`, `id_mk`, `kelas`, `ujian`) VALUES
(1, '2016-12-12', '1', 'B', 'UTS'),
(2, '2016-12-12', '2', 'B', 'UTS'),
(3, '2016-12-13', '3', 'C', 'UTS'),
(4, '2016-12-14', '4', 'D', 'UTS'),
(5, '2016-12-20', '1', 'B', 'UAS'),
(6, '2016-12-21', '3', 'D', 'UAS'),
(7, '2016-12-18', '4', 'B', 'UTS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_ujian`
--

CREATE TABLE IF NOT EXISTS `jadwal_ujian` (
  `id_jadwal` int(10) NOT NULL,
  `kode_mk` varchar(10) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `id_dosen` int(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `ujian` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_ujian`
--

INSERT INTO `jadwal_ujian` (`id_jadwal`, `kode_mk`, `nama_mk`, `id_dosen`, `kelas`, `ujian`) VALUES
(11, 'FTEK224', 'Pendidikan Kewarganegaraan', 20161, 'C', 'UAS'),
(12, 'PTIN612', 'Pemrograman Berorientasi Objek', 20162, 'C', 'UAS'),
(13, 'FTEK463', 'Digital dan Mikroprosesor', 20163, 'C', 'UAS'),
(14, 'PTIN665', 'Pengembangan Kurikulum', 20164, 'C', 'UAS'),
(15, 'FTEK212', 'Kesehatan Keselamatan Kerja', 20165, 'C', 'UAS'),
(16, 'PTIN123', 'Dasar Pemrograman Komputer', 20166, 'C', 'UAS'),
(17, 'FTEK420', 'Matematika Teknik I', 20167, 'C', 'UAS'),
(18, 'PTIN222', 'Basis Data', 20168, 'C', 'UAS'),
(19, 'FTEK111', 'Pendidikan Agama Islam', 20169, 'C', 'UAS'),
(20, 'FTEK123', 'Pengembangan Peserta Didik', 20170, 'C', 'UAS'),
(21, 'FTEK211', 'Perkembangan Peserta Didik', 20171, 'C', 'UAS'),
(22, 'FTEK342', 'Bahasa Indonesia Keilmuan', 20172, 'C', 'UAS'),
(23, 'FTEK412', 'Belajar dan Pembelajaran', 20173, 'C', 'UAS'),
(24, 'PTIN111', 'Sistem Informasi', 20174, 'C', 'UAS'),
(25, 'FTEK432', 'Manajemen Pendidikan Kejuruan', 20175, 'C', 'UAS'),
(26, 'FTEK120', 'Pengantar Pendidikan', 20176, 'C', 'UAS'),
(27, 'FTEK256', 'Statistika', 20177, 'C', 'UAS'),
(28, 'FTEK231', 'Pengembangan Sumber Belajar', 20178, 'C', 'UAS'),
(29, 'PTIN243', 'Metodologi Penelitian', 20179, 'C', 'UAS'),
(30, 'PTIN264', 'Sistem Digital', 20180, 'C', 'UAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok`
--

CREATE TABLE IF NOT EXISTS `kelompok` (
  `id_kelompok` varchar(10) NOT NULL,
  `id_tugas` int(10) NOT NULL,
  `id_mahasiswa` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelompok`
--

INSERT INTO `kelompok` (`id_kelompok`, `id_tugas`, `id_mahasiswa`) VALUES
('A', 11, '150533600165'),
('B', 12, '150533604176'),
('C', 13, '150533602578'),
('D', 14, '150533602115');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komposisi_penilaian`
--

CREATE TABLE IF NOT EXISTS `komposisi_penilaian` (
  `kode_nilai` int(10) NOT NULL,
  `id_dosen` int(10) NOT NULL,
  `kode_mk` varchar(10) NOT NULL,
  `id_mahasiswa` varchar(20) NOT NULL,
  `kuis` int(10) NOT NULL,
  `uts` int(10) NOT NULL,
  `uas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komposisi_penilaian`
--

INSERT INTO `komposisi_penilaian` (`kode_nilai`, `id_dosen`, `kode_mk`, `id_mahasiswa`, `kuis`, `uts`, `uas`) VALUES
(11, 20162, 'PTIN612', '150533600165', 90, 80, 80),
(19, 20170, 'FTEK123', '150533601122', 87, 82, 87),
(14, 20167, 'PTIN222', '150533601234', 86, 90, 91),
(15, 20165, 'FTEK212', '150533602384', 84, 87, 85),
(12, 20165, 'PTIN123', '150533602578', 88, 89, 90),
(13, 20168, 'PTIN222', '150533603341', 87, 92, 90),
(10, 20161, 'FTEK224', '150533604176', 80, 80, 75),
(18, 20167, 'FTEK420', '150533605723', 80, 84, 90),
(17, 20166, 'PTIN123', '150533606571', 85, 88, 86),
(16, 20169, 'FTEK123', '150533607856', 92, 86, 89);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nama_mahasiswa` varchar(50) NOT NULL,
  `pass` int(10) NOT NULL,
  `kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nama_mahasiswa`, `pass`, `kelas`) VALUES
('Nabilah Almas Aulia', 123, 'A'),
('Novika Agista Restu', 123, 'D'),
('Novita Rizki Amalia', 123, 'C'),
('Nur Saadatus Sa''diyah', 123, 'D'),
('Nur Fitriani', 123, 'C'),
('Muhammad Yusuf', 123, 'D'),
('Muhammad Aidil Febianto', 123, 'C'),
('Muhammad Agung Putra', 123, 'D'),
('Muhammad Rizal Zam Zami', 123, 'C'),
('Nur Istiqomah', 123, 'D'),
('Ni Komang Shanti', 123, 'C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE IF NOT EXISTS `matakuliah` (
  `id_mk` int(12) NOT NULL,
  `kode_mk` varchar(10) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `sks` int(5) NOT NULL,
  `ruang` varchar(10) NOT NULL,
  `hari` varchar(30) NOT NULL,
  `jam_ke` varchar(20) NOT NULL,
  `idu` varchar(10) NOT NULL,
  `kapasitas` int(5) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `uts` date NOT NULL,
  `uas` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id_mk`, `kode_mk`, `nama_mk`, `sks`, `ruang`, `hari`, `jam_ke`, `idu`, `kapasitas`, `kelas`, `uts`, `uas`) VALUES
(1, 'FTEK224', 'Pendidikan Kewarganegaraan', 2, 'H5 412', 'Kamis', '3-4', '12', 40, 'A', '2016-09-12', '2016-12-19'),
(2, 'PTIN612', 'Pemrograman Berorientasi Objek', 3, 'H5 212', 'Senin', '1-4', '13', 30, 'C', '2016-09-12', '2016-12-20'),
(3, 'FTEK463', 'Digital dan Mikroprosesor', 3, 'G4 213', 'Senin', '5-8', '14', 30, 'C', '2016-09-13', '2016-12-19'),
(4, 'PTIN665', 'Pengembangan Kurikulum', 2, 'G4110', 'Jumat', '1-2', '15', 30, 'C', '2016-09-14', '2016-12-21'),
(5, 'FTEK212', 'Kesehatan Keselamatan Kerja', 3, 'G4111', 'Senin', '1-2', '16', 40, 'B', '2016-09-12', '2016-12-19'),
(6, 'PTIN123', 'Dasar Pemrograman Komputer', 2, 'G4112', 'Selasa', '1-2', '14', 30, 'C', '2016-09-15', '2016-12-22'),
(7, 'FTEK420', 'Matematika Teknik I', 3, 'G4113', 'Rabu', '1-2', '17', 40, 'B', '2016-09-13', '2016-12-20'),
(8, 'PTIN222', 'Basis Data', 3, 'G4115', 'Kamis', '1-2', '14', 30, 'B', '2016-09-14', '2016-12-21'),
(9, 'FTEK111', 'Pendidikan Agama Islam', 2, 'H5210', 'Jumat', '3-4', '18', 40, 'A', '2016-09-13', '2016-12-20'),
(10, 'FTEK123', 'Pengembangan Peserta Didik', 3, 'H5211', 'Senin', '3-4', '12', 30, 'B', '2016-09-15', '2016-12-22'),
(11, 'FTEK211', 'Perkembangan Peserta Didik', 2, 'H5212', 'Selasa', '3-4', '19', 40, 'A', '2016-09-14', '2016-12-21'),
(12, 'FTEK342', 'Bahasa Indonesia Keilmuan', 3, 'H5214', 'Rabu', '3-4', '20', 30, 'A', '2016-09-15', '2016-11-27'),
(13, 'PTIN111', 'Sistem Informasi', 3, 'H5214', 'Kamis', '3-4', '14', 40, 'A', '2016-09-16', '2016-12-23'),
(14, 'FTEK432', 'Manajemen Pendidikan Kejuruan', 2, 'H5215', 'Jumat', '5-6', '21', 30, 'B', '2016-09-16', '2016-12-23'),
(15, 'FTEK120', 'Pengantar Pendidikan', 2, 'H5216', 'Senin', '5-6', '21', 40, 'B', '2016-09-12', '2016-12-19'),
(16, 'FTEK256', 'Statistika', 3, 'H5217', 'Selasa', '5-6', '17', 30, 'A', '2016-09-14', '2016-12-20'),
(17, 'FTEK231', 'Pengembangan Sumber Belajar', 3, 'H5401', 'Rabu', '5-6', '15', 40, 'C', '2016-09-16', '2016-12-23'),
(18, 'FTEK412', 'Belajar dan Pembelajaran', 2, 'H5403', 'Kamis', '5-6', '21', 30, 'B', '2016-09-15', '2016-12-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkuliahan`
--

CREATE TABLE IF NOT EXISTS `perkuliahan` (
  `kode_nilai` int(10) NOT NULL,
  `id_dosen` int(10) NOT NULL,
  `kode_mk` varchar(10) NOT NULL,
  `id_mahasiswa` varchar(20) NOT NULL,
  `tugas` int(10) NOT NULL,
  `kuis` int(10) NOT NULL,
  `uts` int(10) NOT NULL,
  `uas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perkuliahan`
--

INSERT INTO `perkuliahan` (`kode_nilai`, `id_dosen`, `kode_mk`, `id_mahasiswa`, `tugas`, `kuis`, `uts`, `uas`) VALUES
(212, 20162, 'PTIN612', '150533600165', 70, 80, 90, 80),
(213, 20170, 'FTEK123', '150533601122', 85, 87, 82, 87),
(214, 20161, 'FTEK224', '150533604176', 82, 80, 80, 75),
(215, 20165, 'FTEK212', '150533602384', 86, 84, 87, 85),
(216, 20167, 'FTEK420', '150533605723', 82, 80, 84, 90),
(217, 20168, 'PTIN222', '150533603341', 86, 87, 92, 90),
(218, 21069, 'PTIN123', '150533602578', 87, 88, 89, 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekapnilai`
--

CREATE TABLE IF NOT EXISTS `rekapnilai` (
  `kode_rekap` int(10) NOT NULL,
  `kode_nilai` int(10) NOT NULL,
  `id_mahasiswa` varchar(12) NOT NULL,
  `nilai_tugas` int(10) NOT NULL,
  `nilai_kuis` int(10) NOT NULL,
  `nilai_uts` int(10) NOT NULL,
  `nilai_uas` int(10) NOT NULL,
  `nilai_akhir` int(10) NOT NULL,
  `predikat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekapnilai`
--

INSERT INTO `rekapnilai` (`kode_rekap`, `kode_nilai`, `id_mahasiswa`, `nilai_tugas`, `nilai_kuis`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `predikat`) VALUES
(112, 12, '150533600165', 70, 80, 90, 80, 0, 'B+'),
(113, 13, '150533601122', 85, 87, 82, 87, 0, ''),
(114, 14, '150533604176', 82, 80, 80, 75, 0, ''),
(115, 15, '150533602538', 86, 84, 87, 85, 0, ''),
(116, 16, '150533605723', 82, 80, 84, 90, 0, ''),
(117, 17, '150533603341', 86, 87, 92, 90, 0, ''),
(118, 18, '150533602578', 87, 88, 89, 90, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `tabel_mahasiswa` (
  `idm` int(5) NOT NULL,
  `idu` varchar(4) NOT NULL,
  `nama_mahasiswa` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_mahasiswa`
--

INSERT INTO `tabel_mahasiswa` (`idm`, `idu`, `nama_mahasiswa`) VALUES
(1, '1', 'Sarmijan'),
(2, '2', 'Nur Saadatus Sadiyah'),
(3, '3', 'Artomin'),
(4, '4', 'Wasdiman'),
(5, '5', 'Sumijah'),
(6, '6', 'Darsito'),
(7, '7', 'Nabilah Almas Aulia'),
(8, '8', 'Bardasim'),
(9, '9', 'Montinah'),
(10, '10', 'Tukiyem'),
(11, '11', 'Novika Agista Restu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE IF NOT EXISTS `tugas` (
  `id_tugas` int(10) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `jadwal` date NOT NULL,
  `deksripsi` varchar(50) NOT NULL,
  `id_dosen` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `nama_mk`, `jadwal`, `deksripsi`, `id_dosen`) VALUES
(131, 'Sistem Informasi', '2016-11-30', 'Jelaskan apa yang dimaksud dengan sistem informasi', 20162);

-- --------------------------------------------------------

--
-- Struktur dari tabel `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `id_up` int(4) NOT NULL,
  `idmk` int(4) NOT NULL,
  `idu` varchar(20) NOT NULL,
  `ujian` enum('uts','uas','','') NOT NULL,
  `file` varchar(90) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `upload`
--

INSERT INTO `upload` (`id_up`, `idmk`, `idu`, `ujian`, `file`, `tgl`) VALUES
(1, 2, '12', 'uts', 'coba.docx', '2016-11-27 01:13:32'),
(2, 5, '15', 'uts', 'coba1.docx', '2016-11-27 07:47:41'),
(3, 5, '4', 'uts', 'jawab.docx', '2016-11-27 01:19:24'),
(8, 1, '14', 'uts', 'S1 PTI - Sistem Pendukung Keputusan Berbasis Sistem Pakar-1.pdf', '2016-11-27 03:13:12'),
(9, 5, '11', 'uts', 'S1 PTI - Sistem Pendukung Keputusan Berbasis Sistem Pakar-1.pdf', '2016-11-27 01:19:10'),
(11, 4, '15', 'uts', 'Cara Membuat Tepung dan Minyak dari Kacang Tanah.docx', '2016-11-27 07:51:22'),
(13, 5, '12', 'uts', 'DESAIN RUMAH 1.docx', '2016-11-27 03:10:22'),
(16, 9, '18', 'uts', 'permohonan foging.docx', '2016-11-27 07:52:33'),
(17, 1, '12', 'uts', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idu` int(5) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`idu`, `nomor`, `pass`, `level`) VALUES
(1, '150533600156', '123', '2'),
(2, '150533602578', '123', '2'),
(3, '150533600158', '123', '2'),
(4, '150533600157', '123', '2'),
(5, '150533600163', '123', '2'),
(6, '150533600164', '123', '2'),
(7, '150533600165', '123', '2'),
(8, '150533600166', '123', '2'),
(9, '150533600177', '123', '2'),
(10, '150533600178', '123', '2'),
(11, '150533604176', '123', '2'),
(12, '20161', '123', '1'),
(13, '20162', '123', '1'),
(14, '20163', '123', '1'),
(15, '20164', '123', '1'),
(16, '20165', '123', '1'),
(17, '20166', '123', '1'),
(18, '20167', '123', '1'),
(19, '20168', '123', '1'),
(20, '20169', '123', '1'),
(21, '20170', '123', '1'),
(22, '12345', '123', '0'),
(23, '12346', '123', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ida`);

--
-- Indexes for table `ambil_mk`
--
ALTER TABLE `ambil_mk`
  ADD PRIMARY KEY (`id_ambil`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`idd`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_tugas`
--
ALTER TABLE `hasil_tugas`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idj`);

--
-- Indexes for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indexes for table `komposisi_penilaian`
--
ALTER TABLE `komposisi_penilaian`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_mk`);

--
-- Indexes for table `perkuliahan`
--
ALTER TABLE `perkuliahan`
  ADD PRIMARY KEY (`kode_nilai`);

--
-- Indexes for table `rekapnilai`
--
ALTER TABLE `rekapnilai`
  ADD PRIMARY KEY (`kode_rekap`);

--
-- Indexes for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  ADD PRIMARY KEY (`idm`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id_up`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ida` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ambil_mk`
--
ALTER TABLE `ambil_mk`
  MODIFY `id_ambil` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `idd` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `idj` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id_mk` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  MODIFY `idm` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id_up` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idu` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
