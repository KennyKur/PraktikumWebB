-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2020 pada 19.16
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `praktikumweb_final_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(20) NOT NULL,
  `kategori_id` int(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `stok` int(20) NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `kategori_id`, `nama`, `author`, `stok`, `thumbnail`) VALUES
(1, 1, 'Data structure 2th Edition', 'Kenny', 50, '1.jpg'),
(3, 2, 'USBN', 'Admin Pengguna', 30, 'buku1.jpg'),
(4, 2, 'Hari buku sedunia', 'Kenny Kurniadi', 10, 'buku2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_admin`
--

CREATE TABLE `detail_admin` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_admin`
--

INSERT INTO `detail_admin` (`id`, `user_id`, `nama`, `no_telp`, `alamat`, `status`) VALUES
(1, 2, 'admin biasa', '08111', 'Jalan tampak kuda', 1),
(2, 3, 'kenny kurniadi', '087770012485', 'jalan warban', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id` int(20) NOT NULL,
  `pinjam_buku_id` int(20) NOT NULL,
  `buku_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_users`
--

CREATE TABLE `detail_users` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_users`
--

INSERT INTO `detail_users` (`id`, `user_id`, `nama`, `alamat`, `no_telp`, `jenis_kelamin`) VALUES
(1, 1, 'admin', '-', '0812345678', 'Laki-laki'),
(2, 5, 'kenny', 'warban', '', 'perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor_rak` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `nomor_rak`) VALUES
(1, 'horror', 212),
(2, 'fantasy', 266);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam_buku`
--

CREATE TABLE `pinjam_buku` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `buku_id` int(20) NOT NULL,
  `waktu_pinjam` date NOT NULL,
  `waktu_kembali` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjam_buku`
--

INSERT INTO `pinjam_buku` (`id`, `user_id`, `buku_id`, `waktu_pinjam`, `waktu_kembali`, `status`) VALUES
(1, 5, 5, '0000-00-00', '0000-00-00', 0),
(2, 5, 5, '0000-00-00', '0000-00-00', 0),
(3, 5, 5, '2020-10-06', '2020-10-12', 0),
(4, 5, 0, '2020-10-06', '2020-10-12', 0),
(5, 5, 1, '2020-10-06', '2020-10-12', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `status`) VALUES
(1, 'admin@gmail.com', 'admin', 3),
(2, 'admin2@gmail.com', 'admin', 2),
(3, 'kenny_kurniadi@yahoo.com', '2BxaAi2strExuvv', 2),
(5, 'a@gmail.com', '4n4k0nd4', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `detail_admin`
--
ALTER TABLE `detail_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pinjam_buku_id` (`pinjam_buku_id`),
  ADD KEY `buku_id` (`buku_id`);

--
-- Indeks untuk tabel `detail_users`
--
ALTER TABLE `detail_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pinjam_buku`
--
ALTER TABLE `pinjam_buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail_admin`
--
ALTER TABLE `detail_admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_users`
--
ALTER TABLE `detail_users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pinjam_buku`
--
ALTER TABLE `pinjam_buku`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_admin`
--
ALTER TABLE `detail_admin`
  ADD CONSTRAINT `detail_admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD CONSTRAINT `detail_pinjam_ibfk_1` FOREIGN KEY (`pinjam_buku_id`) REFERENCES `pinjam_buku` (`id`),
  ADD CONSTRAINT `detail_pinjam_ibfk_2` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_users`
--
ALTER TABLE `detail_users`
  ADD CONSTRAINT `detail_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pinjam_buku`
--
ALTER TABLE `pinjam_buku`
  ADD CONSTRAINT `pinjam_buku_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
