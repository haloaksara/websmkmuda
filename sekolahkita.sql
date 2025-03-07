-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Mar 2025 pada 03.15
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolahkita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `konten` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `tanggal_post` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id`, `judul`, `konten`, `gambar`, `status`, `tanggal_post`) VALUES
(1, 'berita1', 'berita1', NULL, 1, '2025-02-05'),
(2, 'berita2', 'berita2', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `kode_guru` varchar(255) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`kode_guru`, `nama_guru`, `alamat`, `no_telp`, `username`, `password`) VALUES
('G0010', 'wahyu123', 'jember', '4545656', 'admin', '123'),
('G00101', 'wahyu', '111', '11', 'santika', 'dfsbs'),
('G00112321', 'halo', 'sdasa', '21321321', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `kode_jurusan` char(5) NOT NULL,
  `nama_jurusan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
('J001', 'RPL'),
('J002', 'TSM'),
('J003', 'PM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kode_kelas` char(5) NOT NULL,
  `nama_kelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`kode_kelas`, `nama_kelas`) VALUES
('K001', 'X'),
('K002', 'XI'),
('K003', 'XII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `kode_siswa` char(5) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `kode_kelas` char(5) DEFAULT NULL,
  `kode_jurusan` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`kode_siswa`, `nama_siswa`, `alamat`, `no_telp`, `tgl_lahir`, `username`, `password`, `kode_kelas`, `kode_jurusan`) VALUES
('S001', 'FIDA', 'BANGSALSARI', '0852369751489', '2024-07-01', 'FIDA45', '12345678', 'K001', 'J001'),
('S002', 'RADI', 'UMBULSARI', '0852469874125', '2024-11-01', 'RADI65', '12345678', 'K002', 'J002');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`kode_guru`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`kode_siswa`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_jurusan` (`kode_jurusan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `tb_kelas` (`kode_kelas`),
  ADD CONSTRAINT `tb_siswa_ibfk_2` FOREIGN KEY (`kode_jurusan`) REFERENCES `tb_jurusan` (`kode_jurusan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
