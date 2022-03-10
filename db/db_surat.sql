-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01 Mar 2018 pada 03.30
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_edit_suratkeluar`
--

CREATE TABLE `log_edit_suratkeluar` (
  `id` int(11) NOT NULL,
  `no_agenda_keluar` varchar(25) NOT NULL,
  `id_petugas` varchar(15) NOT NULL,
  `jenis_surat` varchar(30) NOT NULL,
  `tanggal_kirim` varchar(15) NOT NULL,
  `no_surat` varchar(15) NOT NULL,
  `pengirim` varchar(30) NOT NULL,
  `perihal` varchar(30) NOT NULL,
  `gambar` text NOT NULL,
  `tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_edit_suratmasuk`
--

CREATE TABLE `log_edit_suratmasuk` (
  `id` int(11) NOT NULL,
  `no_agenda_masuk` varchar(30) NOT NULL,
  `id_petugas` char(25) NOT NULL,
  `jenis_surat` varchar(30) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `pengirim` varchar(30) NOT NULL,
  `perihal` varchar(25) NOT NULL,
  `gambar` text NOT NULL,
  `status` enum('Sudah dibaca','Belum dibaca','','') NOT NULL,
  `tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_edit_suratmasuk`
--

INSERT INTO `log_edit_suratmasuk` (`id`, `no_agenda_masuk`, `id_petugas`, `jenis_surat`, `tanggal_kirim`, `tanggal_terima`, `no_surat`, `pengirim`, `perihal`, `gambar`, `status`, `tgl_edit`) VALUES
(26, 'SM/20180227001', 'P002', 'Resmi', '2018-02-27', '2018-02-28', '3', 'sopian', 'asalamualaikum', '1519697456surat.JPG', 'Belum dibaca', '2018-02-27 02:12:43'),
(27, 'SM/20180227001', 'P002', 'Dinas', '2018-02-27', '2018-02-28', '54', 'Dimas', 'Assalamualaikum', '1519697688surat.JPG', 'Belum dibaca', '2018-02-27 02:15:25'),
(28, 'SM/20180227001', 'P002', 'Dinas', '2018-02-27', '2018-02-28', '54', 'Dimas', 'Assalamualaikum', '1519697688surat.JPG', 'Sudah dibaca', '2018-02-27 02:15:45'),
(29, 'SM/20180227001', 'P002', 'Dinas', '2018-02-27', '2018-02-28', '54', 'Dimas', 'Assalamualaikum', '1519697688surat.JPG', 'Sudah dibaca', '2018-02-27 02:16:39'),
(30, 'SM/20180227001', 'P002', 'Dinas', '2018-02-27', '2018-02-28', '54', 'Dimas', 'Assalamualaikum', '1519697688surat.JPG', 'Sudah dibaca', '2018-03-01 02:22:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_hapus_disposisi`
--

CREATE TABLE `log_hapus_disposisi` (
  `id` int(11) NOT NULL,
  `no_disposisi` varchar(25) NOT NULL,
  `no_agenda_masuk` varchar(25) NOT NULL,
  `no_surat_masuk` varchar(15) NOT NULL,
  `kepada` varchar(30) NOT NULL,
  `tanggal_disposisi` date NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `status_disposisi` enum('Sudah dibaca','Belum dibaca') NOT NULL,
  `tanggapan` varchar(10) NOT NULL,
  `tgl_hapus` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_hapus_suratkeluar`
--

CREATE TABLE `log_hapus_suratkeluar` (
  `id` int(11) NOT NULL,
  `no_agenda_keluar` varchar(25) NOT NULL,
  `id_petugas` varchar(15) NOT NULL,
  `jenis_surat` varchar(30) NOT NULL,
  `tanggal_kirim` varchar(15) NOT NULL,
  `no_surat` varchar(15) NOT NULL,
  `pengirim` varchar(30) NOT NULL,
  `perihal` varchar(30) NOT NULL,
  `gambar` text NOT NULL,
  `tgl_hapus` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_hapus_suratmasuk`
--

CREATE TABLE `log_hapus_suratmasuk` (
  `id` int(11) NOT NULL,
  `no_agenda_masuk` varchar(30) NOT NULL,
  `id_petugas` char(25) NOT NULL,
  `jenis_surat` varchar(30) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `pengirim` varchar(30) NOT NULL,
  `perihal` varchar(25) NOT NULL,
  `gambar` text NOT NULL,
  `status` enum('Sudah dibaca','Belum dibaca','','') NOT NULL,
  `tgl_hapus` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_hapus_suratmasuk`
--

INSERT INTO `log_hapus_suratmasuk` (`id`, `no_agenda_masuk`, `id_petugas`, `jenis_surat`, `tanggal_kirim`, `tanggal_terima`, `no_surat`, `pengirim`, `perihal`, `gambar`, `status`, `tgl_hapus`) VALUES
(6, 'SM/20180227001', 'P002', 'Resmi', '2018-02-27', '2018-02-28', '3', 'anjar', 'asalamualaikum', '1519697456surat.JPG', 'Belum dibaca', '2018-02-27 02:13:00'),
(7, 'SM/20180227003', 'P002', '', '0000-00-00', '0000-00-00', '9', 'as', 'sa', '1519704800team.png', 'Belum dibaca', '2018-02-27 04:16:08'),
(8, 'SM/20180227002', 'P002', 'Dinas', '2018-02-27', '2018-02-28', '445', 'sa', 'bnnh', '1519702856surat.JPG', 'Belum dibaca', '2018-02-27 04:16:12');

-- --------------------------------------------------------

--
-- Stand-in structure for view `q_disposisi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `q_disposisi` (
`no_disposisi` int(11)
,`no_surat_masuk` varchar(50)
,`keterangan` varchar(30)
,`kepada` varchar(30)
,`status_disposisi` enum('Sudah dibaca','Belum dibaca')
,`tanggapan` varchar(30)
,`pengirim` varchar(30)
,`perihal` varchar(25)
,`tanggal_kirim` date
,`tanggal_terima` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `q_keluar`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `q_keluar` (
`no_agenda_keluar` varchar(25)
,`nama_petugas` varchar(61)
,`jenis_surat` varchar(30)
,`no_surat` varchar(50)
,`tanggal_kirim` date
,`pengirim` varchar(30)
,`perihal` varchar(30)
,`gambar` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `q_masuk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `q_masuk` (
`no_agenda_masuk` varchar(35)
,`nama_petugas` varchar(61)
,`jenis_surat` varchar(30)
,`no_surat` varchar(50)
,`tanggal_kirim` date
,`tanggal_terima` date
,`pengirim` varchar(30)
,`perihal` varchar(25)
,`status` enum('Sudah dibaca','Belum dibaca')
,`gambar` text
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_disposisi`
--

CREATE TABLE `tb_disposisi` (
  `no_disposisi` int(11) NOT NULL,
  `no_agenda_masuk` varchar(25) NOT NULL,
  `no_surat_masuk` varchar(50) NOT NULL,
  `kepada` varchar(30) NOT NULL,
  `tanggal_disposisi` date NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `status_disposisi` enum('Sudah dibaca','Belum dibaca') NOT NULL,
  `tanggapan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_disposisi`
--

INSERT INTO `tb_disposisi` (`no_disposisi`, `no_agenda_masuk`, `no_surat_masuk`, `kepada`, `tanggal_disposisi`, `keterangan`, `status_disposisi`, `tanggapan`) VALUES
(5, 'SM/20180227001', '54', 'Bpk.Miswan Wahyudi', '2018-02-27', 'alfa', 'Belum dibaca', 'iya');

--
-- Trigger `tb_disposisi`
--
DELIMITER $$
CREATE TRIGGER `log_hapus_disposisi` BEFORE DELETE ON `tb_disposisi` FOR EACH ROW INSERT INTO log_hapus_disposisi
(no_disposisi, no_agenda_masuk, no_surat_masuk, kepada, tanggal_disposisi, keterangan, status_disposisi, tanggapan, tgl_hapus)

VALUES(OLD.no_disposisi, OLD.no_agenda_masuk, OLD.no_surat_masuk, OLD.kepada, OLD.tanggal_disposisi, OLD.keterangan, OLD.status_disposisi, OLD.tanggapan, sysdate())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_surat`
--

CREATE TABLE `tb_jenis_surat` (
  `id` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_surat`
--

INSERT INTO `tb_jenis_surat` (`id`, `jenis_surat`) VALUES
(1, 'Resmi'),
(2, 'Pribadi'),
(3, 'Dinas'),
(4, 'Non-Dinas'),
(5, 'Lain-Lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nomor_surat`
--

CREATE TABLE `tb_nomor_surat` (
  `id` int(11) NOT NULL,
  `tahun_ajaran` char(10) NOT NULL,
  `no_depan` char(30) NOT NULL,
  `no_belakang` char(30) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nomor_surat`
--

INSERT INTO `tb_nomor_surat` (`id`, `tahun_ajaran`, `no_depan`, `no_belakang`, `ket`) VALUES
(1, '2017/2018', '421.5/', '-SMKN1/BP3 WIL.I', 'Sekolah Kejuruan'),
(2, '2017/2018', '421.7/', '-SMKN1/BP3 WIL.I', 'Osis/Kesiswaan'),
(3, '2017/2018', '422.4/', '-SMKN1/BP3 WIL.I', 'Keuangan/Spp'),
(4, '2017/2018', '423.5/', '-SMKN1/BP3 WIL.I', 'Kurikulum'),
(5, '2017/2018', '424.1/', '-SMKN1/BP3 WIL.I', 'Guru/Pegawai Fungsional'),
(6, '2017/2018', '424.2/', '-SMKN1/BP3 WIL.I', 'Tata Usaha (Struktural)'),
(7, '2017/2018', '425.3/', '-SMKN1/BP3 WIL.I', 'Sarana Prasarana'),
(8, '2017/2018', '421.76/', '-SMKN1/BP3 WIL.I', 'Ekstrakulikuler');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` varchar(15) NOT NULL,
  `nama_depan` varchar(30) NOT NULL,
  `nama_belakang` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak` varchar(9) NOT NULL,
  `status_petugas` enum('Aktif','NonAktif') NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_depan`, `nama_belakang`, `password`, `hak`, `status_petugas`, `email`) VALUES
('P001', 'Ahmad', 'Sopian', '202cb962ac59075b964b07152d234b70', 'Admin', 'Aktif', 'ramadhikasaputra421@gmail.com'),
('P002', 'Ahmad', 'sopian Jarot', 'caf1a3dfb505ffed0d024130f58c5cfa', 'Petugas', 'Aktif', 'aryanperdana325@gmail.com'),
('P003', 'Muhammad', 'Rifki', '81dc9bdb52d04dc20036dbd8313ed055', 'Pemimpin', 'Aktif', 'ahmadsopian66@yahoo.co.id');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat_keluar`
--

CREATE TABLE `tb_surat_keluar` (
  `no_agenda_keluar` varchar(25) NOT NULL,
  `id_petugas` varchar(15) NOT NULL,
  `jenis_surat` varchar(30) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `pengirim` varchar(30) NOT NULL,
  `perihal` varchar(30) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_surat_keluar`
--

INSERT INTO `tb_surat_keluar` (`no_agenda_keluar`, `id_petugas`, `jenis_surat`, `tanggal_kirim`, `no_surat`, `pengirim`, `perihal`, `gambar`) VALUES
('SK/20180227001', 'P002', 'Sangat Rahasia', '2018-02-28', '421.5/-SMKN1/BP3 WIL.I', 'bk', 'a', '1519697949team.png');

--
-- Trigger `tb_surat_keluar`
--
DELIMITER $$
CREATE TRIGGER `log_edit_suratkeluar` BEFORE UPDATE ON `tb_surat_keluar` FOR EACH ROW INSERT INTO log_edit_suratkeluar
(no_agenda_keluar, id_petugas, jenis_surat, tanggal_kirim, no_surat, pengirim, perihal, gambar, tgl_edit)

VALUES(OLD.no_agenda_keluar, OLD.id_petugas, OLD.jenis_surat, OLD.tanggal_kirim, OLD.no_surat, OLD.pengirim, OLD.perihal, OLD.gambar, sysdate())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_hapus_suratkeluar` BEFORE DELETE ON `tb_surat_keluar` FOR EACH ROW INSERT INTO log_hapus_suratkeluar
(no_agenda_keluar, id_petugas, jenis_surat, tanggal_kirim, no_surat, pengirim, perihal, gambar, tgl_hapus)

VALUES(OLD.no_agenda_keluar, OLD.id_petugas, OLD.jenis_surat, OLD.tanggal_kirim, OLD.no_surat, OLD.pengirim, OLD.perihal, OLD.gambar, sysdate())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat_masuk`
--

CREATE TABLE `tb_surat_masuk` (
  `no_agenda_masuk` varchar(35) NOT NULL,
  `id_petugas` varchar(15) NOT NULL,
  `jenis_surat` varchar(30) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `pengirim` varchar(30) NOT NULL,
  `perihal` varchar(25) NOT NULL,
  `gambar` text NOT NULL,
  `status` enum('Sudah dibaca','Belum dibaca') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_surat_masuk`
--

INSERT INTO `tb_surat_masuk` (`no_agenda_masuk`, `id_petugas`, `jenis_surat`, `tanggal_kirim`, `tanggal_terima`, `no_surat`, `pengirim`, `perihal`, `gambar`, `status`) VALUES
('SM/20180227001', 'P002', 'Dinas', '2018-02-27', '2018-02-28', '54', 'Dimas', 'Assalamualaikum', '1519697688surat.JPG', 'Sudah dibaca'),
('SM/20180227004', 'P002', 'Resmi', '2018-02-27', '2018-02-28', '342', 'sada', 'ds', '1519704917surat.JPG', 'Belum dibaca');

--
-- Trigger `tb_surat_masuk`
--
DELIMITER $$
CREATE TRIGGER `log_edit_suratmasuk` BEFORE UPDATE ON `tb_surat_masuk` FOR EACH ROW INSERT INTO log_edit_suratmasuk
(no_agenda_masuk, id_petugas, jenis_surat, tanggal_kirim, tanggal_terima, no_surat, pengirim, perihal, gambar, status, tgl_edit)

VALUES(OLD.no_agenda_masuk, OLD.id_petugas, OLD.jenis_surat, OLD.tanggal_kirim,OLD.tanggal_terima, OLD.no_surat, OLD.pengirim, OLD.perihal, OLD.gambar,OLD.status, sysdate())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_hapus_suratmasuk` BEFORE DELETE ON `tb_surat_masuk` FOR EACH ROW INSERT INTO log_hapus_suratmasuk
(no_agenda_masuk, id_petugas, jenis_surat, tanggal_kirim, tanggal_terima, no_surat, pengirim, perihal, gambar, status, tgl_hapus)

VALUES(OLD.no_agenda_masuk, OLD.id_petugas, OLD.jenis_surat, OLD.tanggal_kirim,OLD.tanggal_terima, OLD.no_surat, OLD.pengirim, OLD.perihal, OLD.gambar,OLD.status, sysdate())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur untuk view `q_disposisi`
--
DROP TABLE IF EXISTS `q_disposisi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`army`@`localhost` SQL SECURITY DEFINER VIEW `q_disposisi`  AS  select `tb_disposisi`.`no_disposisi` AS `no_disposisi`,`tb_disposisi`.`no_surat_masuk` AS `no_surat_masuk`,`tb_disposisi`.`keterangan` AS `keterangan`,`tb_disposisi`.`kepada` AS `kepada`,`tb_disposisi`.`status_disposisi` AS `status_disposisi`,`tb_disposisi`.`tanggapan` AS `tanggapan`,`tb_surat_masuk`.`pengirim` AS `pengirim`,`tb_surat_masuk`.`perihal` AS `perihal`,`tb_surat_masuk`.`tanggal_kirim` AS `tanggal_kirim`,`tb_surat_masuk`.`tanggal_terima` AS `tanggal_terima` from (`tb_disposisi` join `tb_surat_masuk`) where (`tb_disposisi`.`no_surat_masuk` = `tb_surat_masuk`.`no_surat`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `q_keluar`
--
DROP TABLE IF EXISTS `q_keluar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `q_keluar`  AS  select `tb_surat_keluar`.`no_agenda_keluar` AS `no_agenda_keluar`,concat(`tb_petugas`.`nama_depan`,' ',`tb_petugas`.`nama_belakang`) AS `nama_petugas`,`tb_surat_keluar`.`jenis_surat` AS `jenis_surat`,`tb_surat_keluar`.`no_surat` AS `no_surat`,`tb_surat_keluar`.`tanggal_kirim` AS `tanggal_kirim`,`tb_surat_keluar`.`pengirim` AS `pengirim`,`tb_surat_keluar`.`perihal` AS `perihal`,`tb_surat_keluar`.`gambar` AS `gambar` from (`tb_surat_keluar` join `tb_petugas`) where (`tb_petugas`.`id_petugas` = `tb_surat_keluar`.`id_petugas`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `q_masuk`
--
DROP TABLE IF EXISTS `q_masuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `q_masuk`  AS  select `tb_surat_masuk`.`no_agenda_masuk` AS `no_agenda_masuk`,concat(`tb_petugas`.`nama_depan`,' ',`tb_petugas`.`nama_belakang`) AS `nama_petugas`,`tb_surat_masuk`.`jenis_surat` AS `jenis_surat`,`tb_surat_masuk`.`no_surat` AS `no_surat`,`tb_surat_masuk`.`tanggal_kirim` AS `tanggal_kirim`,`tb_surat_masuk`.`tanggal_terima` AS `tanggal_terima`,`tb_surat_masuk`.`pengirim` AS `pengirim`,`tb_surat_masuk`.`perihal` AS `perihal`,`tb_surat_masuk`.`status` AS `status`,`tb_surat_masuk`.`gambar` AS `gambar` from (`tb_surat_masuk` join `tb_petugas`) where (`tb_petugas`.`id_petugas` = `tb_surat_masuk`.`id_petugas`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_edit_suratkeluar`
--
ALTER TABLE `log_edit_suratkeluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id_petugas`),
  ADD KEY `id_2` (`id_petugas`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `log_edit_suratmasuk`
--
ALTER TABLE `log_edit_suratmasuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_hapus_disposisi`
--
ALTER TABLE `log_hapus_disposisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_agenda` (`no_agenda_masuk`),
  ADD KEY `no_agenda_2` (`no_agenda_masuk`),
  ADD KEY `no_agenda_3` (`no_agenda_masuk`);

--
-- Indexes for table `log_hapus_suratkeluar`
--
ALTER TABLE `log_hapus_suratkeluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_hapus_suratmasuk`
--
ALTER TABLE `log_hapus_suratmasuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  ADD PRIMARY KEY (`no_disposisi`),
  ADD KEY `no_agenda` (`no_agenda_masuk`),
  ADD KEY `no_agenda_2` (`no_agenda_masuk`),
  ADD KEY `no_desposisi` (`no_disposisi`),
  ADD KEY `no_agenda_3` (`no_agenda_masuk`),
  ADD KEY `no_agenda_masuk` (`no_agenda_masuk`);

--
-- Indexes for table `tb_jenis_surat`
--
ALTER TABLE `tb_jenis_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_nomor_surat`
--
ALTER TABLE `tb_nomor_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `e-mail` (`email`),
  ADD KEY `id` (`id_petugas`),
  ADD KEY `id_2` (`id_petugas`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `tb_surat_keluar`
--
ALTER TABLE `tb_surat_keluar`
  ADD PRIMARY KEY (`no_agenda_keluar`),
  ADD KEY `id` (`id_petugas`),
  ADD KEY `id_2` (`id_petugas`),
  ADD KEY `no_agenda_keluar` (`no_agenda_keluar`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_petugas_2` (`id_petugas`);

--
-- Indexes for table `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  ADD PRIMARY KEY (`no_agenda_masuk`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_edit_suratkeluar`
--
ALTER TABLE `log_edit_suratkeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_edit_suratmasuk`
--
ALTER TABLE `log_edit_suratmasuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `log_hapus_disposisi`
--
ALTER TABLE `log_hapus_disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_hapus_suratkeluar`
--
ALTER TABLE `log_hapus_suratkeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_hapus_suratmasuk`
--
ALTER TABLE `log_hapus_suratmasuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  MODIFY `no_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jenis_surat`
--
ALTER TABLE `tb_jenis_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_nomor_surat`
--
ALTER TABLE `tb_nomor_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  ADD CONSTRAINT `tb_disposisi_ibfk_1` FOREIGN KEY (`no_agenda_masuk`) REFERENCES `tb_surat_masuk` (`no_agenda_masuk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_surat_keluar`
--
ALTER TABLE `tb_surat_keluar`
  ADD CONSTRAINT `tb_surat_keluar_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  ADD CONSTRAINT `tb_surat_masuk_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
