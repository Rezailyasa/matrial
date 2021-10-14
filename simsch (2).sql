-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jul 2021 pada 13.48
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simsch`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_acara_pembelajaran`
--

CREATE TABLE `berita_acara_pembelajaran` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `setting_kontrak_pengajaran_id` int(11) NOT NULL,
  `pertemuan` int(11) NOT NULL,
  `materi_pokok` varchar(255) NOT NULL,
  `sub_materi` varchar(255) NOT NULL,
  `data_file_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_guru_piket`
--

CREATE TABLE `catatan_guru_piket` (
  `id` int(11) NOT NULL,
  `judul_catatan` varchar(100) NOT NULL,
  `catatan` text NOT NULL,
  `tgl_catatan` date NOT NULL DEFAULT current_timestamp(),
  `tahun_ajaran_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `catatan_guru_piket`
--

INSERT INTO `catatan_guru_piket` (`id`, `judul_catatan`, `catatan`, `tgl_catatan`, `tahun_ajaran_id`, `created_at`, `updated_at`, `users_id`) VALUES
(4, 'catatan', 'dadadada', '2021-07-18', 5, '2021-07-18 08:47:05', '2021-07-18 08:47:05', 1602863100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_absen`
--

CREATE TABLE `data_absen` (
  `id` int(11) NOT NULL,
  `tgl_absen` date NOT NULL DEFAULT current_timestamp(),
  `jam_absen` time NOT NULL DEFAULT current_timestamp(),
  `users_id` int(11) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_absen`
--

INSERT INTO `data_absen` (`id`, `tgl_absen`, `jam_absen`, `users_id`, `tahun_ajaran_id`, `status`, `deskripsi`, `keterangan`, `created_at`, `updated_at`) VALUES
(265, '2021-07-25', '23:17:12', 3, 5, 'Masuk', 'Absen melalui face', 'Absen Melalui Face Recognition', '2021-07-25 16:17:12', '2021-07-25 16:17:12'),
(266, '2021-07-25', '23:36:54', 3, 5, 'Keluar', NULL, 'Absen Melalui Face Recognition', '2021-07-25 16:36:54', '2021-07-25 16:36:54'),
(295, '2021-07-27', '00:42:56', 1626747761, 5, 'Masuk', 'Absen melalui face', 'Absen Melalui Face Recognition', '2021-07-26 17:42:56', '2021-07-26 17:42:56'),
(296, '2021-07-27', '01:11:29', 1626747761, 5, 'Keluar', 'Absen melalui face', 'Absen Melalui Face Recognition', '2021-07-26 18:11:29', '2021-07-26 18:11:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_absen_course`
--

CREATE TABLE `data_absen_course` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `setting_kontrak_pengajaran_id` int(11) NOT NULL,
  `pertemuan` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_berita`
--

CREATE TABLE `data_berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi_berita` text NOT NULL,
  `file` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_berita`
--

INSERT INTO `data_berita` (`id`, `judul`, `isi_berita`, `file`, `created_at`, `updated_at`, `tanggal`) VALUES
(1, 'berita', 'das', NULL, '2021-07-18 12:03:17', '2021-07-18 12:03:17', '2021-07-19'),
(2, 'berita 2', 'dsadasdad', NULL, '2021-07-18 12:03:42', '2021-07-18 12:03:42', '2021-07-19'),
(3, 'berita 3', 'dsadas', NULL, '2021-07-18 12:04:32', '2021-07-18 12:04:32', '2021-07-19'),
(4, 'da', 'das', 'ktp-3.jpeg', '2021-07-18 12:20:40', '2021-07-18 12:20:40', '2021-07-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_calon_student`
--

CREATE TABLE `data_calon_student` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_file`
--

CREATE TABLE `data_file` (
  `id` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_isi_materi`
--

CREATE TABLE `data_isi_materi` (
  `id` int(11) NOT NULL,
  `data_judul_materi_id` int(11) NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `kategori` varchar(100) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `isi_materi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jadwal_ujian`
--

CREATE TABLE `data_jadwal_ujian` (
  `id` int(11) NOT NULL,
  `tgl_mulai` varchar(25) NOT NULL,
  `tgl_selesai` varchar(25) NOT NULL,
  `jam_mulai` varchar(25) NOT NULL,
  `jam_selesai` varchar(25) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_jadwal_ujian`
--

INSERT INTO `data_jadwal_ujian` (`id`, `tgl_mulai`, `tgl_selesai`, `jam_mulai`, `jam_selesai`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '2021-07-09', '2021-07-15', '13:00', '14:00', 'dasdsa', '2021-07-09 08:21:00', '2021-07-09 08:21:00'),
(2, '2021-07-09', '2021-07-15', '12:00', '12:00', 'ghhg', '2021-07-09 08:25:46', '2021-07-09 08:25:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jawaban_ujian`
--

CREATE TABLE `data_jawaban_ujian` (
  `id` int(11) NOT NULL,
  `setting_ujian_master_soal_id` int(11) NOT NULL,
  `data_master_soal_id` int(11) NOT NULL,
  `data_soal_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `data_soal_jawaban_id` int(11) DEFAULT NULL,
  `is_right` varchar(11) DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `jawaban_essay` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_jawaban_ujian`
--

INSERT INTO `data_jawaban_ujian` (`id`, `setting_ujian_master_soal_id`, `data_master_soal_id`, `data_soal_id`, `users_id`, `data_soal_jawaban_id`, `is_right`, `file`, `jawaban_essay`, `created_at`, `updated_at`) VALUES
(33, 18, 2, 15, 1623238488, 3, 'Salah', NULL, NULL, '2021-07-14 12:39:04', '2021-07-14 12:39:04'),
(34, 18, 2, 17, 1623238488, NULL, NULL, '1626291761-ttd.jpeg', 'das', '2021-07-14 12:42:41', '2021-07-14 12:42:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jenis_ujian`
--

CREATE TABLE `data_jenis_ujian` (
  `id` int(11) NOT NULL,
  `jenis_ujian` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_jenis_ujian`
--

INSERT INTO `data_jenis_ujian` (`id`, `jenis_ujian`, `created_at`, `updated_at`) VALUES
(3, 'PAT', '2021-07-09 07:45:29', '2021-07-09 07:45:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_judul_materi`
--

CREATE TABLE `data_judul_materi` (
  `id` int(11) NOT NULL,
  `data_master_materi_id` int(11) NOT NULL,
  `judul_materi` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_judul_materi`
--

INSERT INTO `data_judul_materi` (`id`, `data_master_materi_id`, `judul_materi`, `deskripsi`, `file`, `created_at`, `updated_at`) VALUES
(1, 1626277977, 'Judul Materi', 'kospaodk', 'list', '2021-07-22 07:34:49', '2021-07-22 07:34:49'),
(2, 1626277977, 'judul 2', 'kjljijkkl', 'dribbble', '2021-07-22 07:56:18', '2021-07-22 07:56:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jurusan`
--

CREATE TABLE `data_jurusan` (
  `id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_jurusan`
--

INSERT INTO `data_jurusan` (`id`, `deskripsi`, `image`, `nama_jurusan`, `created_at`, `updated_at`) VALUES
(3, 'ccccc', '1623685463-download.png', 'Rekayasa Perangkat Lunak', '2021-06-14 02:51:08', '2021-06-14 08:44:23'),
(6, 'ini keperawatan', '1623685719-downloadm.png', 'Keperawatan', '2021-06-14 08:48:39', '2021-06-14 08:48:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelas`
--

CREATE TABLE `data_kelas` (
  `id` int(11) NOT NULL,
  `tingkat_kelas` varchar(50) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `data_jurusan_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kelas`
--

INSERT INTO `data_kelas` (`id`, `tingkat_kelas`, `nama_kelas`, `data_jurusan_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(22893, 'XI', 'XI RPL 3', 3, '3', '2021-06-14 07:15:40', '2021-06-14 07:15:40'),
(22894, 'X', 'kpm 1', 6, 'h', '2021-06-28 01:56:35', '2021-06-28 01:56:35'),
(22895, 'XI', 'rpl 3', 3, 'fgh', '2021-06-28 01:57:06', '2021-06-28 01:57:06'),
(22896, 'XI', 'RPL 2', 3, '-', '2021-06-28 06:11:42', '2021-06-28 06:11:52'),
(22897, 'XI', 'xi kpm 1', 6, 'sda', '2021-07-16 02:53:37', '2021-07-16 02:53:37'),
(22898, 'XII', 'xii kpm 1', 6, 'dsa', '2021-07-16 07:50:54', '2021-07-16 07:50:54'),
(22899, 'X', 'kpm 2', 6, 'dsa', '2021-07-17 01:30:02', '2021-07-17 01:30:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_komentar`
--

CREATE TABLE `data_komentar` (
  `id` int(11) NOT NULL,
  `materi_pembelajaran_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kuisioner`
--

CREATE TABLE `data_kuisioner` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `data_course_id` int(11) NOT NULL,
  `kesesuaian_materi` int(11) NOT NULL,
  `penilaian_student` varchar(255) DEFAULT NULL,
  `pertemuan` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_master_materi`
--

CREATE TABLE `data_master_materi` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `judul_master_materi` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_master_materi`
--

INSERT INTO `data_master_materi` (`id`, `users_id`, `file`, `judul_master_materi`, `deskripsi`, `kategori`, `created_at`, `updated_at`) VALUES
(1626277973, 1602863100, '1626360304-Screenshot (127).png', 'Master 3', 'Master 3', 'Materi Semester 3', '2021-07-15 07:45:04', '2021-07-15 09:19:00'),
(1626277974, 1602863100, '1626360381-Screenshot (128).png', 'Master121', 'Master 3', 'Materi Semester 1', '2021-07-15 07:46:21', '2021-07-15 09:28:41'),
(1626277977, 1602863100, '1626960469-Screenshot (138).png', 'pertemuan 1', 'pertemuan 1', 'pembelajaran', '2021-07-22 06:27:49', '2021-07-22 06:27:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_master_soal`
--

CREATE TABLE `data_master_soal` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `judul_master_soal` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `is_random` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_master_soal`
--

INSERT INTO `data_master_soal` (`id`, `users_id`, `judul_master_soal`, `keterangan`, `is_random`, `is_active`, `image`, `created_at`, `updated_at`) VALUES
(2, 1602863100, 'mastersoal', 'dasdas', 1, 1, '1626015403-download.png', '2021-07-10 10:31:52', '2021-07-11 11:14:20'),
(5, 1602863100, 'dasdsa', 'dsadsadsa', NULL, 1, '1626096082-downloadm.png', '2021-07-12 06:21:22', '2021-07-12 06:21:22'),
(6, 1602863100, 'ewqeqeqewqewq', 'ewqeqw', NULL, 1, '1626096099-Capture.PNG', '2021-07-12 06:21:39', '2021-07-12 06:21:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_matapelajaran`
--

CREATE TABLE `data_matapelajaran` (
  `id` int(11) NOT NULL,
  `nama_matapelajaran` varchar(255) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_matapelajaran`
--

INSERT INTO `data_matapelajaran` (`id`, `nama_matapelajaran`, `deskripsi`, `created_at`, `updated_at`) VALUES
(3, 'B Inggris', 'Jurusan RPL Kelas X', '2021-06-14 07:36:42', '2021-06-14 07:36:42'),
(4, 'Pemograman Web', '-', '2021-07-05 10:56:27', '2021-07-05 10:56:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_nilai_ujian`
--

CREATE TABLE `data_nilai_ujian` (
  `id` int(11) NOT NULL,
  `setting_ujian_master_soal_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `nilai_essay` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_nilai_ujian`
--

INSERT INTO `data_nilai_ujian` (`id`, `setting_ujian_master_soal_id`, `users_id`, `nilai`, `nilai_essay`, `created_at`, `updated_at`) VALUES
(7, 18, 1623238488, 5, 0, '2021-07-14 12:16:39', '2021-07-14 12:42:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_semester`
--

CREATE TABLE `data_semester` (
  `id` int(11) NOT NULL,
  `nama_semester` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_semester`
--

INSERT INTO `data_semester` (`id`, `nama_semester`, `created_at`, `updated_at`) VALUES
(5, 'Ganjil', '2021-06-14 00:06:45', '2021-06-14 00:06:45'),
(6, 'Genap', '2021-07-16 06:59:44', '2021-07-16 06:59:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_soal`
--

CREATE TABLE `data_soal` (
  `id` int(11) NOT NULL,
  `data_master_soal_id` int(11) NOT NULL,
  `isi_soal` text NOT NULL,
  `file` varchar(200) DEFAULT NULL,
  `bobot_nilai` int(11) DEFAULT NULL,
  `kunci_jawaban` int(11) DEFAULT NULL,
  `type_soal` varchar(25) NOT NULL,
  `is_send_file` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_soal`
--

INSERT INTO `data_soal` (`id`, `data_master_soal_id`, `isi_soal`, `file`, `bobot_nilai`, `kunci_jawaban`, `type_soal`, `is_send_file`, `created_at`, `updated_at`) VALUES
(15, 2, 'rdasdsadsadsada', '', 5, 1, '1', 0, '2021-07-11 06:47:16', '2021-07-12 15:00:35'),
(16, 2, 'x', '', 4, 1, '1', 0, '2021-07-11 06:48:57', '2021-07-11 10:49:08'),
(17, 2, 'essay', '', NULL, NULL, '2', 1, '2021-07-11 08:38:30', '2021-07-11 08:38:30'),
(18, 2, 'q', '1626022196-download.png', 3, 5, '1', NULL, '2021-07-11 09:49:56', '2021-07-11 09:49:56'),
(19, 2, 'xxxxxxxxxxxxx', '1626025279-Capture.PNG', NULL, NULL, '2', 1, '2021-07-11 10:02:23', '2021-07-11 10:41:19'),
(20, 2, 'qqqqqqqqqqqqqqq', '', NULL, NULL, '2', NULL, '2021-07-11 10:23:58', '2021-07-11 10:23:58'),
(21, 2, 'qqqqqqqqqqqqqq', '', NULL, NULL, '2', 1, '2021-07-11 10:24:13', '2021-07-11 10:24:13'),
(23, 2, 'qqqqqqqqqqqqqqqqqqqqqqqq', '1626027122-downloadm.png', 5, 4, '1', NULL, '2021-07-11 10:45:47', '2021-07-11 11:12:02'),
(24, 2, 'z', '', 2, 1, '1', NULL, '2021-07-13 08:01:20', '2021-07-13 08:01:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_soal_jawaban`
--

CREATE TABLE `data_soal_jawaban` (
  `id` int(11) NOT NULL,
  `data_soal_id` int(11) NOT NULL,
  `isi_jawaban` text NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_soal_jawaban`
--

INSERT INTO `data_soal_jawaban` (`id`, `data_soal_id`, `isi_jawaban`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, '_1', '', 1, '2021-07-11 06:42:16', '2021-07-11 06:42:16'),
(2, 10, '_2', '', 2, '2021-07-11 06:42:16', '2021-07-11 06:42:16'),
(3, 10, '_3', '', 3, '2021-07-11 06:42:16', '2021-07-11 06:42:16'),
(4, 10, '_4', '', 4, '2021-07-11 06:42:16', '2021-07-11 06:42:16'),
(5, 10, '_5', '', 5, '2021-07-11 06:42:16', '2021-07-11 06:42:16'),
(6, 13, 'dsa', '', 1, '2021-07-11 06:45:36', '2021-07-11 06:45:36'),
(7, 13, 'dsa', '', 2, '2021-07-11 06:45:36', '2021-07-11 06:45:36'),
(8, 13, 'das', '', 3, '2021-07-11 06:45:36', '2021-07-11 06:45:36'),
(9, 13, 'dsa', '', 4, '2021-07-11 06:45:36', '2021-07-11 06:45:36'),
(10, 13, 'dsa', '', 5, '2021-07-11 06:45:36', '2021-07-11 06:45:36'),
(11, 14, 'aaaa', '', 1, '2021-07-11 06:46:23', '2021-07-12 14:40:26'),
(12, 14, 'ccccccccb', '', 2, '2021-07-11 06:46:23', '2021-07-12 14:40:26'),
(13, 14, 'vvvvvvvvvvvc', '1626125961-WhatsApp Image 2021-06-03 at 10.16.08 AM.jpeg', 3, '2021-07-11 06:46:23', '2021-07-12 14:39:21'),
(14, 14, 'd', '', 4, '2021-07-11 06:46:23', '2021-07-12 14:39:21'),
(15, 14, 'e', '', 5, '2021-07-11 06:46:23', '2021-07-12 14:39:21'),
(16, 15, 'a66667767676', '', 1, '2021-07-11 06:47:16', '2021-07-12 15:00:35'),
(17, 15, 'b90980989089809', '', 2, '2021-07-11 06:47:16', '2021-07-12 15:00:35'),
(18, 15, 'c56756', '', 3, '2021-07-11 06:47:16', '2021-07-12 15:00:35'),
(19, 15, 'd', '', 4, '2021-07-11 06:47:16', '2021-07-12 15:00:35'),
(20, 15, 'e', '', 5, '2021-07-11 06:47:16', '2021-07-12 15:00:35'),
(21, 16, 'a', '1626011337-download.png', 1, '2021-07-11 06:48:57', '2021-07-11 06:48:57'),
(22, 16, 'b', '', 2, '2021-07-11 06:48:57', '2021-07-11 06:48:57'),
(23, 16, 'c', '', 3, '2021-07-11 06:48:57', '2021-07-11 06:48:57'),
(24, 16, 'd', '', 4, '2021-07-11 06:48:57', '2021-07-11 06:48:57'),
(25, 16, 'e', '1626011337-desktop.ini', 5, '2021-07-11 06:48:57', '2021-07-11 06:48:57'),
(26, 18, 'a', '1626022196-download.png', 1, '2021-07-11 09:49:56', '2021-07-11 09:49:56'),
(27, 18, 'b', '', 2, '2021-07-11 09:49:56', '2021-07-11 09:49:56'),
(28, 18, 'c', '1626022196-Capture1.PNG', 3, '2021-07-11 09:49:56', '2021-07-11 09:49:56'),
(29, 18, 'd', '', 4, '2021-07-11 09:49:56', '2021-07-11 09:49:56'),
(30, 18, 'e', '1626022196-Capture.PNG', 5, '2021-07-11 09:49:56', '2021-07-11 09:49:56'),
(31, 22, 'adadadas', '1626027163-downloadm.png', 1, '2021-07-11 10:44:48', '2021-07-11 11:12:43'),
(32, 22, 'b', '', 2, '2021-07-11 10:44:48', '2021-07-11 11:12:43'),
(33, 22, 'c', '', 3, '2021-07-11 10:44:48', '2021-07-11 11:12:43'),
(34, 22, 'd', '', 4, '2021-07-11 10:44:48', '2021-07-11 11:12:43'),
(35, 22, 'edasdassdas', '1626027163-downloadm.png', 5, '2021-07-11 10:44:48', '2021-07-11 11:12:43'),
(36, 23, 'ada', '', 1, '2021-07-11 10:45:47', '2021-07-11 11:12:02'),
(37, 23, 'b', '', 2, '2021-07-11 10:45:47', '2021-07-11 11:12:02'),
(38, 23, 'cdadsa', '', 3, '2021-07-11 10:45:47', '2021-07-11 11:12:02'),
(39, 23, 'd', '', 4, '2021-07-11 10:45:47', '2021-07-11 11:12:02'),
(40, 23, 'e', '', 5, '2021-07-11 10:45:47', '2021-07-11 11:12:02'),
(41, 24, 'z', '1626188480-download.png', 1, '2021-07-13 08:01:20', '2021-07-13 08:01:20'),
(42, 24, 'z', '1626188480-downloadm.png', 2, '2021-07-13 08:01:20', '2021-07-13 08:01:20'),
(43, 24, 'z', '', 3, '2021-07-13 08:01:20', '2021-07-13 08:01:20'),
(44, 24, 'z', '', 4, '2021-07-13 08:01:20', '2021-07-13 08:01:20'),
(45, 24, 'z', '', 5, '2021-07-13 08:01:20', '2021-07-13 08:01:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_token`
--

CREATE TABLE `data_token` (
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `qr`
--

CREATE TABLE `qr` (
  `id` int(11) NOT NULL,
  `qr` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `qr`
--

INSERT INTO `qr` (`id`, `qr`, `updated_at`, `created_at`) VALUES
(551, '1627220001', '2021-07-25 13:33:21', '2021-07-25 13:33:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_guru_piket`
--

CREATE TABLE `setting_guru_piket` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `jadwal` varchar(100) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_guru_piket`
--

INSERT INTO `setting_guru_piket` (`id`, `users_id`, `jadwal`, `tahun_ajaran_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, 1602863100, 'Senin', 5, 'dsadsa', '2021-07-19 09:33:32', '2021-07-19 09:33:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_homebase`
--

CREATE TABLE `setting_homebase` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `data_jurusan_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_homebase`
--

INSERT INTO `setting_homebase` (`id`, `users_id`, `data_jurusan_id`, `created_at`, `updated_at`) VALUES
(1, 3, 3, '2021-06-27 10:46:51', '2021-06-27 10:46:51'),
(2, 1614326492, 3, '2021-06-27 11:13:51', '2021-06-27 11:13:51'),
(4, 1602863100, 6, '2021-06-28 00:15:55', '2021-06-28 00:15:55'),
(5, 1626747761, 3, '2021-07-25 17:51:50', '2021-07-25 17:51:50'),
(6, 1626748647, 3, '2021-07-25 17:52:00', '2021-07-25 17:52:00'),
(7, 1614326491, 6, '2021-07-25 17:52:09', '2021-07-25 17:52:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_jabatan`
--

CREATE TABLE `setting_jabatan` (
  `id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_jabatan`
--

INSERT INTO `setting_jabatan` (`id`, `user_role_id`, `users_id`, `tahun_ajaran_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 3, 3, 4, 'sda', '2021-06-29 02:40:31', '2021-06-29 05:27:33'),
(3, 6, 1614326491, 4, 'as', '2021-06-29 05:26:04', '2021-06-29 05:26:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_jadwal_absen`
--

CREATE TABLE `setting_jadwal_absen` (
  `id` int(11) NOT NULL,
  `jam_masuk` varchar(100) NOT NULL,
  `jam_keluar` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_jadwal_absen`
--

INSERT INTO `setting_jadwal_absen` (`id`, `jam_masuk`, `jam_keluar`, `created_at`, `updated_at`) VALUES
(20, '01:00', '01:05', '2021-07-26 18:02:54', '2021-07-26 18:02:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_jenis_file`
--

CREATE TABLE `setting_jenis_file` (
  `id` int(11) NOT NULL,
  `data_file_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `jenis_file` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_kelas_siswa`
--

CREATE TABLE `setting_kelas_siswa` (
  `id` int(11) NOT NULL,
  `data_kelas_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_kelas_siswa`
--

INSERT INTO `setting_kelas_siswa` (`id`, `data_kelas_id`, `users_id`, `tahun_ajaran_id`, `created_at`, `updated_at`) VALUES
(20, 22893, 1602863104, 5, '2021-07-16 23:57:10', '2021-07-17 01:25:52'),
(22, 22897, 1623238489, 5, '2021-07-16 23:58:42', '2021-07-17 08:16:54'),
(34, 22898, 1623238488, 5, '2021-07-17 08:13:46', '2021-07-17 08:13:46'),
(35, 22899, 1623238489, 6, '2021-07-17 08:17:21', '2021-07-17 08:25:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_kontrak_pengajaran`
--

CREATE TABLE `setting_kontrak_pengajaran` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `data_matapelajaran_id` int(11) NOT NULL,
  `data_kelas_id` int(11) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `waktu_mulai` varchar(255) NOT NULL,
  `waktu_selesai` varchar(255) NOT NULL,
  `save` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_kontrak_pengajaran`
--

INSERT INTO `setting_kontrak_pengajaran` (`id`, `users_id`, `data_matapelajaran_id`, `data_kelas_id`, `tahun_ajaran_id`, `hari`, `waktu_mulai`, `waktu_selesai`, `save`, `created_at`, `updated_at`) VALUES
(1, 1602863100, 3, 22894, 5, 'Selasa', '02:12', '14:12', 1, '2021-06-28 07:14:50', '2021-06-28 07:16:13'),
(2, 1602863100, 4, 22894, 5, 'Senin', '07:00', '17:58', 1, '2021-07-05 10:59:57', '2021-07-05 11:00:04'),
(3, 1614326491, 4, 22893, 5, 'Senin', '13:29', '14:29', 0, '2021-07-22 23:29:38', '2021-07-22 23:29:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_mapel_ujian`
--

CREATE TABLE `setting_mapel_ujian` (
  `id` int(11) NOT NULL,
  `setting_kontrak_pengajaran_id` int(11) NOT NULL,
  `data_jadwal_ujian_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_mapel_ujian`
--

INSERT INTO `setting_mapel_ujian` (`id`, `setting_kontrak_pengajaran_id`, `data_jadwal_ujian_id`, `created_at`, `updated_at`) VALUES
(4, 1, 1, '2021-07-14 08:04:34', '2021-07-14 08:04:34'),
(5, 2, 2, '2021-07-14 08:04:44', '2021-07-14 08:04:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_master_materi_guru`
--

CREATE TABLE `setting_master_materi_guru` (
  `id` int(11) NOT NULL,
  `data_master_materi_id` int(11) NOT NULL,
  `setting_kontrak_pengajaran_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_tugas_guru`
--

CREATE TABLE `setting_tugas_guru` (
  `id` int(11) NOT NULL,
  `materi_pembelajaran_id` int(11) NOT NULL,
  `data_master_soal_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_ujian_master_soal`
--

CREATE TABLE `setting_ujian_master_soal` (
  `id` int(11) NOT NULL,
  `data_master_soal_id` int(11) NOT NULL,
  `setting_mapel_ujian_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_ujian_master_soal`
--

INSERT INTO `setting_ujian_master_soal` (`id`, `data_master_soal_id`, `setting_mapel_ujian_id`, `created_at`, `updated_at`) VALUES
(18, 2, 4, '2021-07-14 08:05:34', '2021-07-14 08:05:34'),
(19, 5, 5, '2021-07-14 08:05:41', '2021-07-14 08:05:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_wali_kelas`
--

CREATE TABLE `setting_wali_kelas` (
  `users_id` int(11) NOT NULL,
  `data_kelas_id` int(11) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int(11) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `data_semester_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun_ajaran`, `data_semester_id`, `is_active`, `created_at`, `updated_at`) VALUES
(5, '2023/2024', 6, 1, '2021-07-16 07:00:19', '2021-07-19 09:15:50'),
(6, '2024/2025', 5, 0, '2021-07-16 09:32:41', '2021-07-19 09:15:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `nip` int(11) DEFAULT NULL,
  `nis` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_orang_tua` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maps` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `forgot` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permohonan_akun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_gelap` int(11) NOT NULL,
  `pola_wajah` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nip`, `nis`, `name`, `image`, `email`, `email_orang_tua`, `email_verified_at`, `telepon`, `password`, `alamat`, `maps`, `user_role_id`, `is_active`, `forgot`, `permohonan_akun`, `mode_gelap`, `pola_wajah`, `created_at`, `updated_at`) VALUES
(3, NULL, NULL, 'admin', 'user.webp', 'admin@gmail.com', NULL, '1', '0838371444', '$2y$10$/50MXxCKZpi1XjHqKWh3MOldLpj6wcRy4wFjJkXd85aVQyHk3pa7e', 'desa suci blok tenggeran mundu cirebon', NULL, 1, 1, NULL, NULL, 2, NULL, '2020-10-18 14:23:15', '2021-06-29 06:59:38'),
(1602863100, NULL, NULL, 'guru', 'downloadm.png', 'guru@gmail.com', NULL, '1', '0838371444', '$2y$10$/50MXxCKZpi1XjHqKWh3MOldLpj6wcRy4wFjJkXd85aVQyHk3pa7e', 'desa suci blok tenggeran mundu cirebon', NULL, 8, 1, '1613648446', NULL, 2, NULL, '2020-10-08 14:23:15', '2021-07-19 07:20:27'),
(1602863104, NULL, 1602863104, 'pelajar', 'user.webp', 'usmanhabibbahtiar@gmail.com', NULL, '1', '0838371444', '$2y$10$f/gW.0DCGFRrq/apmuJF9eXBYP03izKQF5BDVGsQPru4XY4DlrpZK', 'desa suci blok tenggeran mundu cirebon', NULL, 9, 1, '1623161288', 'Staf', 2, NULL, '2020-10-18 14:23:15', '2021-07-16 23:57:10'),
(1614326491, NULL, NULL, 'Kaprodi', 'user.webp', 'kaprodi@gmail.com', NULL, '1614326491', NULL, '$2y$10$sijiEBxnIg5OoueoORaso.AyD6tHWFKxT/KPiGHOMZzXOIsAOye5a', 'Belum Di Input', NULL, 8, 1, NULL, 'Student', 2, NULL, '2021-02-26 01:01:31', '2021-06-11 06:17:18'),
(1614326492, NULL, NULL, 'Wali Kelas', 'user.webp', 'walikelas@gmail.com', NULL, '1614326491', NULL, '$2y$10$sijiEBxnIg5OoueoORaso.AyD6tHWFKxT/KPiGHOMZzXOIsAOye5a', 'Belum Di Input', NULL, 6, 1, NULL, NULL, 2, NULL, '2021-02-26 01:01:31', '2021-07-05 05:51:47'),
(1623238488, NULL, 879897897, 'pelajar2', 'user.webp', 'siswa@gmail.com', NULL, '1', '0838371444', '$2y$10$/50MXxCKZpi1XjHqKWh3MOldLpj6wcRy4wFjJkXd85aVQyHk3pa7e', 'desa suci blok tenggeran mundu cirebon', NULL, 9, 1, '1623161288', 'Staf', 2, NULL, '2020-10-18 14:23:15', '2021-07-16 23:57:31'),
(1623238489, NULL, 879897897, 'pelajar 2', 'user.webp', 'rezailyasa@gmail.com', NULL, '1', '0838371444', '$2y$10$/50MXxCKZpi1XjHqKWh3MOldLpj6wcRy4wFjJkXd85aVQyHk3pa7e', 'desa suci blok tenggeran mundu cirebon', NULL, 9, 1, '1623161288', 'Siswa', 2, NULL, '2020-10-18 14:23:15', '2021-07-16 23:58:42'),
(1626747761, NULL, NULL, 'Reza Ilyasa', 'user.webp', 'rezailyasa2@gmail.com', NULL, '1626747761', NULL, '$2y$10$jUtewge5kCwaZ1wylV0CBOuHhRinu3I2VmzuVpV8h5lzsMj8Q/40C', 'Belum Di Input', NULL, 8, 1, NULL, 'Teacher', 2, '{\"label\":\"cmV6YWlseWFzYTJAZ21haWwuY29t\",\"descriptors\":[[-0.17281000316143036,0.15342317521572113,0.0606134869158268,-0.03863295912742615,-0.08622562140226364,-0.11647836118936539,-0.04394105076789856,-0.13433939218521118,0.13322757184505463,-0.056012433022260666,0.22297878563404083,-0.0022876679431647062,-0.23104271292686462,-0.08990904688835144,0.022774675861001015,0.14216020703315735,-0.188587948679924,-0.16512909531593323,-0.06998143345117569,-0.06921873241662979,0.08812468498945236,0.02613704465329647,0.06259439885616302,0.02089642733335495,-0.09510728716850281,-0.3102410137653351,-0.0935768410563469,-0.09548131376504898,0.10517759621143341,-0.022621681913733482,-0.06915314495563507,-0.02257971093058586,-0.18552017211914062,-0.1350170522928238,0.06155247241258621,0.07901265472173691,-0.000261790759395808,-0.029909072443842888,0.2385246902704239,-0.062187545001506805,-0.1777620017528534,0.0019357871497049928,0.10498744994401932,0.24001935124397278,0.13752689957618713,0.12020912766456604,0.03518955036997795,-0.13089615106582642,0.053308263421058655,-0.16922608017921448,0.09742452949285507,0.1757243126630783,0.08564308285713196,0.058692339807748795,0.018916111439466476,-0.217511385679245,0.030185498297214508,0.049828168004751205,-0.20628882944583893,0.015166595578193665,0.10525372624397278,-0.045688796788454056,-0.06597677618265152,-0.04132499545812607,0.2919342815876007,0.08164265006780624,-0.11855798214673996,-0.1259949505329132,0.1795254498720169,-0.11575794965028763,-0.06586936861276627,0.03610774874687195,-0.1459900438785553,-0.12118659168481827,-0.28592291474342346,0.0058954511769115925,0.41326162219047546,0.07199609279632568,-0.1787445843219757,0.05274931341409683,-0.10437630861997604,-0.05301806703209877,0.04663644731044769,0.07970261573791504,-0.1089768260717392,0.05013279616832733,-0.12574559450149536,0.04176195710897446,0.17469742894172668,-0.03211403638124466,-0.003274742513895035,0.19372205436229706,0.09198938310146332,0.0802021250128746,0.0617266520857811,0.08607466518878937,-0.11034305393695831,-0.05908164754509926,-0.18639226257801056,-0.05029212310910225,0.06845582276582718,-0.030972106382250786,-0.0001190963521366939,0.1601189523935318,-0.1610259860754013,0.10866192728281021,0.03507454693317413,-0.03719629347324371,-0.06814539432525635,0.015859926119446754,-0.0521969199180603,-0.12065273523330688,0.09564165771007538,-0.15849223732948303,0.1988539695739746,0.2039758265018463,0.03959651663899422,0.14216987788677216,0.08599065244197845,0.06679444015026093,0.0016040208283811808,-0.0030267832335084677,-0.18489456176757812,-0.0644129291176796,0.06361611932516098,-0.031365878880023956,0.11270884424448013,0.09724462777376175],[-0.1813487559556961,0.16584374010562897,0.05350154638290405,-0.049500007182359695,-0.08534419536590576,-0.09452605247497559,-0.07064386457204819,-0.1529054492712021,0.12230220437049866,-0.06446918845176697,0.23308120667934418,0.025554850697517395,-0.23961138725280762,-0.11572661995887756,0.0016590559389442205,0.13913960754871368,-0.1605701595544815,-0.1633177548646927,-0.06809080392122269,-0.06804461777210236,0.0871296152472496,0.023750178515911102,0.054905183613300323,0.00395649578422308,-0.08101964741945267,-0.2915220260620117,-0.08357096463441849,-0.07264547049999237,0.053817667067050934,-0.027005217969417572,-0.06284503638744354,-0.02862912230193615,-0.18571829795837402,-0.13396428525447845,0.05902528762817383,0.0913572609424591,-0.004935883916914463,-0.00217835558578372,0.2369755506515503,-0.05864296481013298,-0.16112013161182404,0.01414736919105053,0.12243719398975372,0.23131470382213593,0.1309690773487091,0.11227185279130936,0.042403694242239,-0.15475693345069885,0.06834020465612411,-0.1681697964668274,0.09284881502389908,0.1885221153497696,0.10708802193403244,0.04684663563966751,0.03111610747873783,-0.2059653252363205,0.0470627062022686,0.04436669498682022,-0.17798224091529846,0.011674096807837486,0.12404585629701614,-0.044851914048194885,-0.07525020092725754,-0.03513316437602043,0.28461700677871704,0.07706944644451141,-0.10328212380409241,-0.14495080709457397,0.17565393447875977,-0.09214513003826141,-0.09435620158910751,0.03963553532958031,-0.1479853391647339,-0.13254769146442413,-0.2948291301727295,0.02034648135304451,0.42229214310646057,0.09777896851301193,-0.18003618717193604,0.07063622027635574,-0.11696607619524002,-0.05069056153297424,0.05314381420612335,0.05282127112150192,-0.1139986589550972,0.04444226250052452,-0.13029825687408447,0.04146866500377655,0.18536046147346497,-0.01967187039554119,-0.01103760302066803,0.17601393163204193,0.11442196369171143,0.10012871026992798,0.06466862559318542,0.06746412068605423,-0.10333414375782013,-0.04484046623110771,-0.20433902740478516,-0.0482487827539444,0.051299624145030975,-0.030926184728741646,0.0245522428303957,0.15437369048595428,-0.15912333130836487,0.10573289543390274,0.02765789069235325,-0.03578004240989685,-0.0741080492734909,0.031146734952926636,-0.062487613409757614,-0.1054261103272438,0.08236980438232422,-0.15715187788009644,0.204827681183815,0.18550798296928406,0.058929141610860825,0.13285185396671295,0.12919186055660248,0.07726570963859558,0.00652058981359005,0.001961149275302887,-0.17368340492248535,-0.07771732658147812,0.05934236943721771,-0.026395494118332863,0.13534507155418396,0.10419460386037827],[-0.18608258664608002,0.16854199767112732,0.05749034509062767,-0.047741200774908066,-0.0671675056219101,-0.09250285476446152,-0.03410502150654793,-0.14473991096019745,0.13230575621128082,-0.05362313613295555,0.21729037165641785,0.0046376693062484264,-0.22778497636318207,-0.1273810863494873,0.026422061026096344,0.1462683379650116,-0.1724018156528473,-0.17230211198329926,-0.08872078359127045,-0.07177513837814331,0.060153037309646606,0.016006266698241234,0.05436433479189873,0.03175833448767662,-0.08812265843153,-0.29794424772262573,-0.0712861716747284,-0.10538937151432037,0.06848063319921494,-0.03452720120549202,-0.05597221851348877,-0.014083354733884335,-0.19841620326042175,-0.15440881252288818,0.03626314178109169,0.106232650578022,0.008543310686945915,-0.004292678087949753,0.2138575315475464,-0.06563712656497955,-0.153828427195549,0.02179521508514881,0.09135369211435318,0.25051745772361755,0.12374582886695862,0.09924889355897903,0.030771078541874886,-0.11683166027069092,0.05439703166484833,-0.1790177822113037,0.08328521251678467,0.16463997960090637,0.10582318902015686,0.04557071998715401,0.029800087213516235,-0.20155172049999237,0.03905156999826431,0.03098747506737709,-0.2038450390100479,0.011259703896939754,0.0866808369755745,-0.03519298881292343,-0.058779384940862656,-0.03237258642911911,0.28973472118377686,0.08566322177648544,-0.10059387981891632,-0.11391913890838623,0.18769881129264832,-0.08588524907827377,-0.06474342197179794,0.023106161504983902,-0.14447501301765442,-0.11797447502613068,-0.29847252368927,0.03519735857844353,0.4142068028450012,0.09110957384109497,-0.20351488888263702,0.05266634374856949,-0.13517382740974426,-0.047549620270729065,0.026490986347198486,0.05923759192228317,-0.10183393210172653,0.051511675119400024,-0.13008184731006622,0.04856941103935242,0.15212449431419373,-0.02171643078327179,-0.013559896498918533,0.18067729473114014,0.10855414718389511,0.06961195915937424,0.06374579668045044,0.06081118434667587,-0.1116185411810875,-0.05357660353183746,-0.21060119569301605,-0.0552985854446888,0.0582796148955822,-0.015905054286122322,0.010514347814023495,0.1632612645626068,-0.14716310799121857,0.10861753672361374,0.043979328125715256,-0.05016733333468437,-0.0720284953713417,0.05571184307336807,-0.05376099795103073,-0.13228890299797058,0.09295257925987244,-0.1447499692440033,0.19263581931591034,0.20048770308494568,0.027476217597723007,0.13408586382865906,0.09396503120660782,0.07521013915538788,0.002676479984074831,0.018535945564508438,-0.15952253341674805,-0.07652683556079865,0.07415308058261871,-0.020204899832606316,0.11017225682735443,0.1111307293176651],[-0.17956799268722534,0.1664239764213562,0.07147716730833054,-0.05399699881672859,-0.06934782862663269,-0.10183200240135193,-0.0573970228433609,-0.14660651981830597,0.1182369664311409,-0.05730302631855011,0.21172791719436646,0.016520392149686813,-0.23091921210289001,-0.09334328025579453,0.010987324640154839,0.1301567256450653,-0.17968030273914337,-0.1557788997888565,-0.08283554017543793,-0.0750260129570961,0.07597827911376953,0.03697178512811661,0.05010824277997017,0.00893419235944748,-0.09222147613763809,-0.3062370717525482,-0.08162245899438858,-0.08041904121637344,0.07126644998788834,-0.012184804305434227,-0.041198961436748505,-0.016762545332312584,-0.19633543491363525,-0.12262967228889465,0.057252928614616394,0.10653259605169296,0.0027193583082407713,0.013215593062341213,0.22067654132843018,-0.06925274431705475,-0.16197144985198975,0.03372567147016525,0.10823927074670792,0.23371312022209167,0.13034966588020325,0.1204538643360138,0.03574027493596077,-0.1381848007440567,0.049521174281835556,-0.17000015079975128,0.09173620492219925,0.183068186044693,0.09946563839912415,0.05859043076634407,0.038559943437576294,-0.20631475746631622,0.04919227212667465,0.04028565436601639,-0.19672909379005432,0.011584162712097168,0.10604015737771988,-0.05001650005578995,-0.0539889857172966,-0.016896052286028862,0.28180474042892456,0.074770487844944,-0.10377772152423859,-0.12948431074619293,0.18085914850234985,-0.10946854948997498,-0.07950451225042343,0.027665456756949425,-0.12630793452262878,-0.12084449827671051,-0.29414212703704834,0.026582146063447,0.41047370433807373,0.10684358328580856,-0.20066586136817932,0.07812976837158203,-0.11746345460414886,-0.04598284140229225,0.05929889157414436,0.049740925431251526,-0.12554585933685303,0.05864916741847992,-0.12519149482250214,0.047102972865104675,0.17266817390918732,-0.010160241276025772,-0.009537698701024055,0.18866415321826935,0.1121058389544487,0.08736657351255417,0.07315885275602341,0.05611889436841011,-0.11094813793897629,-0.0592053197324276,-0.21260966360569,-0.05732663348317146,0.06293465197086334,-0.01734161004424095,0.017235491424798965,0.1599365621805191,-0.1619814783334732,0.12839818000793457,0.028565099462866783,-0.049130991101264954,-0.07287055999040604,0.05381667613983154,-0.054844554513692856,-0.11293493956327438,0.0978478491306305,-0.16298475861549377,0.21355180442333221,0.1967942863702774,0.029363516718149185,0.14318132400512695,0.11852017790079117,0.07100334763526917,0.0032878441270440817,0.007240857928991318,-0.1648409068584442,-0.08438868820667267,0.07263506948947906,-0.029604902490973473,0.13603165745735168,0.10699868202209473],[-0.20232567191123962,0.16152578592300415,0.07040061056613922,-0.05421920120716095,-0.07511640340089798,-0.08894253522157669,-0.05912911519408226,-0.1383974552154541,0.11536005139350891,-0.051602449268102646,0.21711912751197815,0.023253798484802246,-0.24463103711605072,-0.10345663875341415,0.013209091499447823,0.13227581977844238,-0.15783436596393585,-0.16670827567577362,-0.06813829392194748,-0.07197673618793488,0.0766722708940506,0.013326604850590229,0.053432270884513855,0.01942262426018715,-0.09124065935611725,-0.29456278681755066,-0.08122847974300385,-0.08021554350852966,0.05953666567802429,-0.02337520569562912,-0.06000792235136032,-0.01068513561040163,-0.19077347218990326,-0.11558342725038528,0.04252979904413223,0.11289635300636292,0.0025535845197737217,0.00827089138329029,0.22618798911571503,-0.05920558050274849,-0.15393488109111786,0.008870474062860012,0.10089520364999771,0.24710869789123535,0.1387590765953064,0.11577973514795303,0.04641906917095184,-0.12759152054786682,0.05138091742992401,-0.16512097418308258,0.10159596055746078,0.19129447638988495,0.107865110039711,0.04452351853251457,0.029910648241639137,-0.20532317459583282,0.04444748908281326,0.04084332287311554,-0.18028710782527924,0.012546527199447155,0.1088406890630722,-0.03780989348888397,-0.06355752050876617,-0.03627241402864456,0.3021049201488495,0.07879967987537384,-0.11570325493812561,-0.12854523956775665,0.18968293070793152,-0.08889853954315186,-0.08087579905986786,0.03398218750953674,-0.1621115803718567,-0.12064838409423828,-0.28900185227394104,0.044256169348955154,0.42189356684684753,0.08875667303800583,-0.188291534781456,0.06686259806156158,-0.1205049455165863,-0.059147853404283524,0.04447518289089203,0.06517434120178223,-0.12286429107189178,0.040211863815784454,-0.1262701451778412,0.04655928164720535,0.17708709836006165,-0.009989967569708824,-0.008540254086256027,0.1679256111383438,0.11735420674085617,0.07940707355737686,0.05768155679106712,0.0620482936501503,-0.10007670521736145,-0.04471775144338608,-0.2049894630908966,-0.047894541174173355,0.041432950645685196,-0.027334481477737427,0.010562747716903687,0.1654113382101059,-0.15334086120128632,0.1074889600276947,0.035724785178899765,-0.0413268506526947,-0.0788562148809433,0.04302803799510002,-0.07182430475950241,-0.12475154548883438,0.08451129496097565,-0.1621914654970169,0.18968123197555542,0.1949482262134552,0.05272550508379936,0.12253113090991974,0.11650987714529037,0.08613947033882141,0.019914546981453896,0.020681679248809814,-0.16974548995494843,-0.06677252799272537,0.08014821261167526,-0.033464010804891586,0.12001267075538635,0.11110372096300125],[-0.20361827313899994,0.17986644804477692,0.07222557067871094,-0.05506066232919693,-0.07744890451431274,-0.10321086645126343,-0.05611499771475792,-0.13756540417671204,0.11390723288059235,-0.03960162401199341,0.2180997133255005,0.022698836401104927,-0.246800035238266,-0.07108012586832047,0.005193229299038649,0.12183347344398499,-0.14973044395446777,-0.1488557904958725,-0.06929746270179749,-0.06169189140200615,0.08110025525093079,0.0179439764469862,0.04963904619216919,0.023525532335042953,-0.07721958309412003,-0.2780403196811676,-0.07455967366695404,-0.06367841362953186,0.06419049948453903,-0.022359851747751236,-0.044071413576602936,-0.020319610834121704,-0.18945854902267456,-0.12465295940637589,0.04809720441699028,0.0983123928308487,-0.005035178270190954,-0.00199665199033916,0.23634444177150726,-0.07265074551105499,-0.1708766520023346,0.015564954839646816,0.11046022921800613,0.252273827791214,0.13506390154361725,0.10994917899370193,0.04848213493824005,-0.12633055448532104,0.04898480325937271,-0.15881595015525818,0.08943171054124832,0.18069514632225037,0.11215534806251526,0.040720921009778976,0.027136866003274918,-0.22670449316501617,0.04001231864094734,0.05216880515217781,-0.1829884797334671,0.015164258889853954,0.10757537186145782,-0.026912733912467957,-0.044758256524801254,-0.030489224940538406,0.2922358810901642,0.08574225753545761,-0.11591962724924088,-0.13600994646549225,0.18090872466564178,-0.09558797627687454,-0.07270156592130661,0.05305324122309685,-0.15626004338264465,-0.12827491760253906,-0.27347588539123535,0.03672967478632927,0.41750431060791016,0.08728564530611038,-0.17664316296577454,0.05887893959879875,-0.10513824969530106,-0.05827200040221214,0.04162200167775154,0.06614891439676285,-0.13119511306285858,0.04551545903086662,-0.11748427897691727,0.04779931530356407,0.18685683608055115,-0.0005287432577461004,-0.02681904099881649,0.16693010926246643,0.11602052301168442,0.06467010825872421,0.05087195336818695,0.06742413341999054,-0.10538773983716965,-0.03861397132277489,-0.20560181140899658,-0.04701175540685654,0.04490147531032562,-0.03241806849837303,0.018939271569252014,0.17924152314662933,-0.16454778611660004,0.10793249309062958,0.029917661100625992,-0.031042970716953278,-0.0853450819849968,0.05792689323425293,-0.059506628662347794,-0.10675442218780518,0.0852806568145752,-0.15562893450260162,0.20785768330097198,0.188493549823761,0.045623116195201874,0.1137000322341919,0.11382800340652466,0.06655086576938629,0.03906075283885002,0.028509408235549927,-0.15895093977451324,-0.07400082051753998,0.07283764332532883,-0.039226312190294266,0.1472301036119461,0.10520925372838974],[-0.1812858134508133,0.1718684881925583,0.05806828290224075,-0.043266795575618744,-0.08277247846126556,-0.09399225562810898,-0.06509765237569809,-0.14617520570755005,0.10818744450807571,-0.0572352334856987,0.2271343469619751,0.02192988246679306,-0.23699578642845154,-0.08221552520990372,0.004396205767989159,0.1316359043121338,-0.16675707697868347,-0.15380829572677612,-0.06925878673791885,-0.06268829852342606,0.08063819259405136,0.030286185443401337,0.04958508536219597,0.017219921573996544,-0.08565177023410797,-0.28432533144950867,-0.07608859241008759,-0.07156448066234589,0.050202421844005585,-0.019169585779309273,-0.05438152700662613,-0.02475571446120739,-0.17439167201519012,-0.12548641860485077,0.07373113930225372,0.10339462012052536,-0.009787232615053654,-0.000624084728769958,0.2328602820634842,-0.06908473372459412,-0.16518011689186096,0.029413660988211632,0.12605969607830048,0.24694809317588806,0.1349375694990158,0.12016501277685165,0.03037772700190544,-0.15403862297534943,0.06355439871549606,-0.17632348835468292,0.09781800210475922,0.1814092993736267,0.09977252036333084,0.06447668373584747,0.022803576663136482,-0.2254863977432251,0.04794960841536522,0.05528572201728821,-0.19157013297080994,0.0023971679620444775,0.10786855965852737,-0.03529813885688782,-0.04496941342949867,-0.02547106333076954,0.3001275658607483,0.09593859314918518,-0.12734410166740417,-0.1201433390378952,0.1665162891149521,-0.09636858850717545,-0.08272658288478851,0.03452306240797043,-0.14337070286273956,-0.13706828653812408,-0.2777498662471771,0.02925886958837509,0.42680537700653076,0.0933392196893692,-0.19063249230384827,0.05237378552556038,-0.10730456560850143,-0.04559386521577835,0.061893709003925323,0.06646853685379028,-0.12136659771203995,0.030043868348002434,-0.1151948869228363,0.038816697895526886,0.18226374685764313,-0.010101018473505974,-0.02070266380906105,0.17700976133346558,0.11609296500682831,0.08367317169904709,0.07741305232048035,0.08627761155366898,-0.1104508489370346,-0.04939066618680954,-0.21681199967861176,-0.048749350011348724,0.03464215621352196,-0.03254644572734833,0.018252667039632797,0.16427606344223022,-0.16330982744693756,0.11952365189790726,0.03625361993908882,-0.04081273823976517,-0.07148312032222748,0.04081911966204643,-0.05148785188794136,-0.10509797185659409,0.08323625475168228,-0.17170952260494232,0.21780778467655182,0.18077318370342255,0.04772791266441345,0.15079550445079803,0.11738751083612442,0.0759485587477684,0.012866896577179432,0.003751531708985567,-0.1623096913099289,-0.07611807435750961,0.06903386861085892,-0.022252527996897697,0.14351174235343933,0.09690024703741074],[-0.18631161749362946,0.15075112879276276,0.0692610815167427,-0.05541159212589264,-0.09100576490163803,-0.07545533776283264,-0.06226608529686928,-0.14907267689704895,0.11131307482719421,-0.07791002094745636,0.2281694859266281,0.020832939073443413,-0.2581842541694641,-0.07462476193904877,-0.0027110676746815443,0.14874035120010376,-0.1579935997724533,-0.15545539557933807,-0.054397858679294586,-0.05265473574399948,0.08270826190710068,0.030155103653669357,0.06438712775707245,0.027457738295197487,-0.08312598615884781,-0.29115206003189087,-0.09836593270301819,-0.09158313274383545,0.0610477477312088,-0.028979245573282242,-0.0633164718747139,-0.0335911400616169,-0.16745197772979736,-0.11360662430524826,0.05994143337011337,0.10667487978935242,-0.0063606384210288525,-0.013156970031559467,0.2356240451335907,-0.07046546041965485,-0.1680251508951187,0.01677629165351391,0.13270193338394165,0.2296416312456131,0.12048938870429993,0.12517830729484558,0.031445879489183426,-0.14669714868068695,0.06287852674722672,-0.1680000275373459,0.1177184134721756,0.15867644548416138,0.10365153849124908,0.06438129395246506,0.03620336577296257,-0.2073075920343399,0.05545446649193764,0.07134425640106201,-0.20390169322490692,0.030116621404886246,0.11717850714921951,-0.025279248133301735,-0.037520844489336014,-0.020813383162021637,0.30126065015792847,0.08468063175678253,-0.12670139968395233,-0.13133858144283295,0.17793723940849304,-0.1002441793680191,-0.09447529166936874,0.038857266306877136,-0.15905578434467316,-0.13040156662464142,-0.2781933844089508,0.03589692711830139,0.41974321007728577,0.10842763632535934,-0.16699272394180298,0.05979105830192566,-0.09287327527999878,-0.06688312441110611,0.052525799721479416,0.06801532953977585,-0.10092341154813766,0.015863986685872078,-0.1143374964594841,0.0399361178278923,0.18005652725696564,-0.01185139175504446,-0.011018269695341587,0.189564049243927,0.09959059953689575,0.09421957284212112,0.0548039935529232,0.08919695764780045,-0.12180245667695999,-0.041197605431079865,-0.21348316967487335,-0.0539637990295887,0.03416438400745392,-0.008655665442347527,0.020736178383231163,0.1653003841638565,-0.15042367577552795,0.10613670200109482,0.018130294978618622,-0.04534505307674408,-0.06830719858407974,0.04857543855905533,-0.08859829604625702,-0.10583002120256424,0.08809417486190796,-0.1664675921201706,0.21646207571029663,0.18178892135620117,0.06484787911176682,0.11387450248003006,0.1328643411397934,0.0661814957857132,0.03657681494951248,-0.0027578407898545265,-0.1908317506313324,-0.07282811403274536,0.10016154497861862,-0.047829002141952515,0.14263802766799927,0.10306351631879807],[-0.17736877501010895,0.164970263838768,0.055550843477249146,-0.05191589891910553,-0.08441821485757828,-0.09624888002872467,-0.07400193065404892,-0.1580708622932434,0.12341565638780594,-0.05560827627778053,0.23090557754039764,0.01955920085310936,-0.23571611940860748,-0.10278473049402237,0.019769681617617607,0.13750949501991272,-0.16211284697055817,-0.1581498235464096,-0.06196661293506622,-0.04310315474867821,0.05728285387158394,0.028520753607153893,0.07908142358064651,0.023243358358740807,-0.0858270451426506,-0.29671406745910645,-0.0883050262928009,-0.07539758086204529,0.052495941519737244,-0.021869665011763573,-0.06609593331813812,-0.010030633769929409,-0.19493527710437775,-0.140395388007164,0.07185010612010956,0.11878032237291336,-0.01677546463906765,-0.005254464689642191,0.2191588580608368,-0.0682259351015091,-0.18331322073936462,0.015991222113370895,0.12365216761827469,0.24045346677303314,0.13195595145225525,0.11989684402942657,0.031503502279520035,-0.14753447473049164,0.05815558508038521,-0.14788202941417694,0.10678064078092575,0.166540265083313,0.11440563946962357,0.04165477678179741,0.023264314979314804,-0.20110516250133514,0.061632685363292694,0.051965802907943726,-0.1891198456287384,0.019051874056458473,0.13290360569953918,-0.0457305833697319,-0.04724838584661484,-0.024695636704564095,0.28535735607147217,0.07190907001495361,-0.10488085448741913,-0.13791358470916748,0.15774230659008026,-0.09962315112352371,-0.08946957439184189,0.060940083116292953,-0.14667317271232605,-0.15211454033851624,-0.2962869703769684,0.013611258007586002,0.39498400688171387,0.09866146743297577,-0.1774604767560959,0.06488344818353653,-0.0847734659910202,-0.0509757436811924,0.04657922685146332,0.07607907801866531,-0.11400336772203445,0.055666904896497726,-0.1334257423877716,0.035702895373106,0.20033346116542816,-0.018032994121313095,-0.017125079408288002,0.1977769285440445,0.10069292038679123,0.08263076841831207,0.06646020710468292,0.06941164284944534,-0.09366833418607712,-0.041571252048015594,-0.21905085444450378,-0.058585237711668015,0.06046483293175697,-0.02966175600886345,0.010319676250219345,0.1522017866373062,-0.16916021704673767,0.10154170542955399,0.02998778596520424,-0.03038180060684681,-0.05630446597933769,0.032121531665325165,-0.07198502868413925,-0.1232491284608841,0.09628209471702576,-0.16820745170116425,0.20760564506053925,0.18994919955730438,0.07098627090454102,0.12462390959262848,0.12970058619976044,0.06931241601705551,0.018377555534243584,-0.00207889243029058,-0.16630472242832184,-0.07390464842319489,0.086751788854599,-0.03645477816462517,0.15582649409770966,0.10501963645219803],[-0.1885720044374466,0.15345090627670288,0.07725286483764648,-0.05060802027583122,-0.08012834936380386,-0.10224507749080658,-0.06928456574678421,-0.16482892632484436,0.1135345920920372,-0.05144883692264557,0.24467645585536957,0.013045660220086575,-0.23392462730407715,-0.11039498448371887,0.005798162892460823,0.13938795030117035,-0.17729009687900543,-0.1634235978126526,-0.06490572541952133,-0.0470731183886528,0.06924042850732803,0.026471514254808426,0.0675450935959816,0.01012456975877285,-0.07794705778360367,-0.2925512194633484,-0.09436644613742828,-0.09155653417110443,0.0668368861079216,-0.008327381685376167,-0.07532478123903275,-0.01500758621841669,-0.19463108479976654,-0.14255450665950775,0.06278481334447861,0.11189543455839157,-0.006953386124223471,-0.014891493134200573,0.2131483405828476,-0.06816115975379944,-0.16688698530197144,0.015244808048009872,0.11768260598182678,0.2299824357032776,0.1343020349740982,0.12393825501203537,0.03667452558875084,-0.14210188388824463,0.041889969259500504,-0.16094815731048584,0.09696951508522034,0.1783703714609146,0.12178689241409302,0.04769463092088699,0.017921846359968185,-0.20957069098949432,0.049703989177942276,0.049636609852313995,-0.1843976527452469,0.012639195658266544,0.12854820489883423,-0.03281852975487709,-0.055038321763277054,-0.03565594553947449,0.2962694466114044,0.08414021134376526,-0.12061738967895508,-0.12329919636249542,0.1540823131799698,-0.08947921544313431,-0.0883680135011673,0.041274432092905045,-0.16389153897762299,-0.140208438038826,-0.2790849208831787,0.02462456375360489,0.40881115198135376,0.0798773393034935,-0.1853056252002716,0.0567486435174942,-0.10077238827943802,-0.05005032941699028,0.043135784566402435,0.07358083873987198,-0.10910957306623459,0.053496599197387695,-0.12695437669754028,0.03153873234987259,0.18069757521152496,-0.030553188174962997,0.0023269078228622675,0.18935582041740417,0.09181403368711472,0.08343471586704254,0.05635004863142967,0.06295419484376907,-0.08201756328344345,-0.035741519182920456,-0.20191936194896698,-0.04491226747632027,0.050724148750305176,-0.016943974420428276,0.005635516252368689,0.1432805210351944,-0.14708372950553894,0.08431591093540192,0.02986607514321804,-0.03558956831693649,-0.061891984194517136,0.0008820119546726346,-0.05931982398033142,-0.12040004134178162,0.09672314673662186,-0.15907755494117737,0.2042522430419922,0.19777213037014008,0.054539814591407776,0.12806333601474762,0.12481869757175446,0.07330169528722763,0.01657014526426792,0.0061656939797103405,-0.17589393258094788,-0.06584370136260986,0.09181677550077438,-0.04393014684319496,0.13215512037277222,0.09145303815603256]]}', '2021-07-19 19:22:41', '2021-07-25 17:52:47'),
(1626748647, NULL, NULL, 'rwerwrwerew', 'user.webp', 'cknk62@gmail.com', NULL, '1626748674', NULL, '$2y$10$BtM3m.1y2iGDvTB/yRxjAu2V0L7eDbQbFaOixCXkQmlbMrI5/Knsi', 'Belum Di Input', NULL, 8, 1, NULL, 'Teacher', 2, NULL, '2021-07-19 19:37:27', '2021-07-24 14:17:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `user_menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `user_role_id`, `user_menu_id`, `created_at`, `updated_at`) VALUES
(89, 5, 6, '2021-03-02 16:30:51', '2021-03-02 16:30:51'),
(104, 2, 14, '2021-06-05 21:24:15', '2021-06-05 21:24:15'),
(123, 8, 18, '2021-07-10 06:57:57', '2021-07-10 06:57:57'),
(124, 8, 19, '2021-07-10 06:57:57', '2021-07-10 06:57:57'),
(125, 8, 20, '2021-07-10 06:57:57', '2021-07-10 06:57:57'),
(126, 8, 21, '2021-07-10 06:57:57', '2021-07-10 06:57:57'),
(127, 8, 22, '2021-07-10 06:57:57', '2021-07-10 06:57:57'),
(128, 9, 23, '2021-07-12 09:23:27', '2021-07-12 09:23:27'),
(129, 9, 24, '2021-07-12 09:23:27', '2021-07-12 09:23:27'),
(130, 9, 25, '2021-07-12 09:23:27', '2021-07-12 09:23:27'),
(131, 1, 6, '2021-07-26 18:50:01', '2021-07-26 18:50:01'),
(132, 1, 15, '2021-07-26 18:50:01', '2021-07-26 18:50:01'),
(133, 1, 16, '2021-07-26 18:50:01', '2021-07-26 18:50:01'),
(134, 1, 17, '2021-07-26 18:50:01', '2021-07-26 18:50:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `created_at`, `updated_at`) VALUES
(6, 'Dashboard', '2020-08-31 02:04:06', '2021-03-02 16:30:19'),
(8, 'MenuManagement', '2020-08-31 02:04:39', '2020-08-31 02:04:39'),
(14, 'Home', '2021-06-05 21:21:14', '2021-06-05 21:21:14'),
(15, 'PPDB', '2021-06-09 22:45:20', '2021-06-11 06:49:46'),
(16, 'Pembelajaran', '2021-06-11 06:52:23', '2021-06-11 06:52:23'),
(17, 'Arsip', '2021-06-11 09:11:38', '2021-06-11 09:11:38'),
(18, 'DashboardGuru', '2021-07-05 07:52:44', '2021-07-05 07:53:04'),
(19, 'Pengajaran', '2021-07-05 08:21:00', '2021-07-05 08:21:00'),
(20, 'GuruPiket', '2021-07-05 10:39:08', '2021-07-05 10:39:08'),
(21, 'Ujian guru', '2021-07-10 06:47:47', '2021-07-10 06:47:47'),
(22, 'Raport guru', '2021-07-10 06:48:30', '2021-07-10 06:48:30'),
(23, 'Dashboard Siswa', '2021-07-12 09:22:03', '2021-07-12 09:22:03'),
(24, 'Pembelajaran', '2021-07-12 09:22:33', '2021-07-12 09:22:33'),
(25, 'Nilai', '2021-07-12 09:23:04', '2021-07-12 09:23:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2020-08-31 02:10:28', '2021-03-01 21:13:46'),
(2, 'Pengguna Baru', '2020-12-16 07:13:02', '2020-12-08 07:12:55'),
(3, 'Kepala Sekolah', '2021-06-05 10:19:21', '2021-06-05 10:19:14'),
(4, 'Wakil Kepala Sekolah', NULL, NULL),
(5, 'Kepala Jurusan', '2020-12-09 00:36:56', '2020-12-09 00:36:56'),
(6, 'Wali Kelas', NULL, NULL),
(7, 'Staf', NULL, NULL),
(8, 'Guru', '2020-12-09 00:37:07', '2020-12-09 00:37:07'),
(9, 'Siswa', '2020-12-09 00:37:26', '2020-12-09 00:37:26'),
(10, 'Alumni', NULL, NULL),
(480, 'Guru Piket', '2021-07-19 09:36:12', '2021-07-19 09:36:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_subsubsub_menu`
--

CREATE TABLE `user_subsubsub_menu` (
  `id` int(11) NOT NULL,
  `user_subsub_menu_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_subsubsub_menu`
--

INSERT INTO `user_subsubsub_menu` (`id`, `user_subsub_menu_id`, `title`, `created_at`, `updated_at`, `url`) VALUES
(8, 30, 'Jenis Ujian', '2021-06-11 15:18:38', '2021-06-11 15:18:38', '/jenisujian'),
(9, 30, 'Jadwal Ujian', '2021-06-11 15:18:38', '2021-06-11 15:18:38', '/jadwalujian'),
(10, 14, 'Setting Jadwal Absen', '2021-06-14 07:14:12', '2021-06-14 07:14:12', '/settingjadwalabsen'),
(11, 19, 'Tahun Ajaran', '2021-06-11 15:18:38', '2021-06-11 15:18:38', '/tahunajaran'),
(12, 19, 'Jurusan', '2021-06-14 07:14:12', '2021-06-14 07:14:12', '/jurusan'),
(13, 19, 'Kelas', '2021-06-14 07:14:12', '2021-06-14 07:14:12', '/kelas'),
(14, 19, 'Matapelajaran', '2021-06-14 07:14:12', '2021-06-14 07:14:12', '/matapelajaran'),
(15, 19, 'Guru & Staff', '2021-06-14 07:14:12', '2021-06-14 07:14:12', '/guru&staff'),
(16, 19, 'Siswa', '2021-06-14 07:14:12', '2021-06-14 07:14:12', '/siswa'),
(17, 14, 'Face Recognition', '2021-06-14 07:14:12', '2021-06-14 07:14:12', '/facerecognition'),
(18, 14, 'QR Code', '2021-06-14 07:14:12', '2021-06-14 07:14:12', '/qrcode'),
(20, 30, 'Setting Matapelajaran', '2021-07-09 08:32:54', '2021-07-09 08:32:54', '/settingmapelujian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_subsub_menu`
--

CREATE TABLE `user_subsub_menu` (
  `id` int(11) NOT NULL,
  `user_sub_menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_subsub_menu`
--

INSERT INTO `user_subsub_menu` (`id`, `user_sub_menu_id`, `title`, `url`, `created_at`, `Updated_at`) VALUES
(13, 15, 'Dashboard', '/admin_dashboard', '2021-06-11 13:37:33', '2021-06-11 06:28:55'),
(14, 15, 'Generate Absen', '/generateabsen', '2021-06-11 06:28:55', '2021-06-11 06:28:55'),
(15, 15, 'Pengumuman & Berita', '/pengumuman&berita', '2021-06-11 06:30:17', '2021-06-11 06:30:17'),
(16, 244, 'Role & Access', '/role', '2021-06-11 06:33:10', '2021-06-11 06:33:10'),
(17, 244, 'User Verify', '/user_verify', '2021-06-11 06:34:22', '2021-06-11 06:34:22'),
(18, 244, 'Jabatan', '/jabatan', '2021-06-11 06:35:33', '2021-06-11 06:35:33'),
(19, 245, 'Data Master', '#', '2021-06-14 07:08:50', '2021-06-14 00:05:19'),
(20, 245, 'Kontrak Pengajaran', '/kontrakpengajaran', '2021-06-11 06:56:07', '2021-06-11 06:56:07'),
(21, 245, 'Kontrak Siswa', '/kontraksiswa', '2021-06-11 06:56:44', '2021-06-11 06:56:44'),
(22, 246, 'Absen Guru & Staff', '/absenguru&staff', '2021-06-11 06:58:46', '2021-06-11 06:58:46'),
(23, 246, 'Absen Siswa', '/absensiswa', '2021-06-11 06:59:47', '2021-06-11 06:59:47'),
(24, 247, 'Data Pengajaran', '/datapengajaran', '2021-06-11 14:03:17', '2021-06-11 07:03:17'),
(25, 247, 'Data Evaluasi Pengajaran', '/dataevaluasipengajaran', '2021-06-11 07:02:39', '2021-06-11 07:02:39'),
(27, 250, 'Data PKL', '/datapkl', '2021-06-11 14:33:24', '2021-06-11 07:19:21'),
(28, 250, 'Setting PKL', '/settingpkl', '2021-06-11 14:33:31', '2021-06-11 07:19:46'),
(29, 244, 'Guru Piket', '/settinggurupiket', '2021-06-11 07:26:28', '2021-06-11 07:26:28'),
(30, 248, 'Setting Ujian', '/settingujian', '2021-06-11 07:39:56', '2021-06-11 07:39:56'),
(31, 248, 'Soal Uploaded', '/soaluploaded', '2021-06-11 07:52:26', '2021-06-11 07:52:26'),
(32, 248, 'Daftar Nilai Ujian', '/daftarnilaiujian', '2021-06-11 07:52:54', '2021-06-11 07:52:54'),
(33, 249, 'Ledger Nilai', '/ledgernilai', '2021-06-11 07:53:59', '2021-06-11 07:53:59'),
(34, 249, 'Raport Siswa', '/raportsiswa', '2021-06-11 07:54:22', '2021-06-11 07:54:22'),
(37, 276, 'Jadwal Ujian', '/jadwalujiansiswa', '2021-07-12 18:04:34', '2021-07-12 09:42:48'),
(38, 276, 'Nilai Ujian', '/nilaiujiansiswa', '2021-07-12 18:04:39', '2021-07-12 09:43:16'),
(39, 276, 'Riwayat Ujian', '/riwayatujiansiswa', '2021-07-12 18:04:43', '2021-07-12 09:44:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `user_menu_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `user_menu_id`, `title`, `url`, `icon`, `created_at`, `updated_at`) VALUES
(1, 8, 'Menu', '/menu', 'sliders', NULL, '2020-08-30 11:21:17'),
(2, 8, 'SubMenu', '/sub_menu', 'sliders', NULL, '2020-08-30 11:14:48'),
(3, 19, 'Master Materi', '/mastermateri', 'server', '2021-07-05 08:22:12', '2021-07-05 08:22:12'),
(15, 6, 'Dashboard', '/admin_dashboard', 'home', '2020-08-31 02:49:50', '2021-06-09 22:44:13'),
(17, 8, 'SubSubMenu', '/sub_sub_menu', 'sliders', NULL, '2020-08-30 11:14:48'),
(241, 14, 'Dashboard', '/join_kelas', 'home', '2021-06-05 21:22:20', '2021-06-05 21:22:37'),
(242, 15, '.....', '/....', 'sliders', '2021-06-09 22:49:20', '2021-06-11 06:51:36'),
(244, 6, 'Setting Users', '#', 'users', '2021-06-11 06:31:55', '2021-06-11 07:26:48'),
(245, 16, 'Settings', '#', 'settings', '2021-06-11 06:54:29', '2021-06-11 06:54:29'),
(246, 16, 'Absensi', '#', 'user-check', '2021-06-11 06:57:53', '2021-06-11 06:57:53'),
(247, 16, 'Pembelajaran', '#', 'book-open', '2021-06-11 07:01:25', '2021-06-11 07:01:25'),
(248, 16, 'Ujian', '#', 'feather', '2021-06-11 07:32:50', '2021-06-11 07:32:50'),
(249, 16, 'Nilai', '#', 'activity', '2021-06-11 07:35:49', '2021-06-11 07:35:49'),
(250, 16, 'PKL', '/pkl', 'award', '2021-06-11 07:06:50', '2021-06-11 07:06:50'),
(251, 16, 'Home Visit', '/homevisit', 'thermometer', '2021-06-11 07:06:50', '2021-06-11 07:06:50'),
(254, 8, 'SubSubSubMenu', '/sub_sub_sub_menu', 'sliders', '2021-06-11 08:51:52', '2021-06-11 08:53:24'),
(255, 17, 'Program Kerja', '/programkerja', 'sliders', '2021-06-11 09:12:39', '2021-06-11 09:12:39'),
(256, 17, 'SK', '/sk', 'sliders', '2021-06-11 09:13:32', '2021-06-11 09:13:32'),
(257, 17, 'Job Desk', '/jobdesk', 'sliders', '2021-06-11 09:13:57', '2021-06-11 09:13:57'),
(258, 17, 'Kalender Pendidikan', '/kalenderpendidikan', 'sliders', '2021-06-11 09:14:45', '2021-06-11 09:15:15'),
(259, 17, 'Lain-lain', '/lainlain', 'sliders', '2021-06-11 09:15:51', '2021-06-11 09:15:51'),
(260, 18, 'Dashboard', '/dashboardguru', 'home', '2021-07-05 07:56:02', '2021-07-05 07:56:02'),
(261, 18, 'Absensi', '/absensiguru', 'user-check', '2021-07-05 08:12:41', '2021-07-05 08:12:41'),
(262, 18, 'File Manager', '/filemanager', 'file-text', '2021-07-05 08:12:41', '2021-07-05 08:12:41'),
(263, 19, 'Pengajaran', '/pengajaran', 'briefcase', '2021-07-05 08:22:12', '2021-07-05 08:22:12'),
(264, 19, 'Absen siswa', '/absensiswa', 'user-check', '2021-07-05 08:22:12', '2021-07-05 08:22:12'),
(265, 19, 'Nilai Siswa', '/nilaisiswa', 'activity', '2021-07-05 08:22:12', '2021-07-05 08:22:12'),
(266, 20, 'Absen Guru & Staff', '/absenguru&staff', 'user-check', '2021-07-05 10:40:51', '2021-07-05 10:42:48'),
(267, 20, 'Absen Siswa', '/absensiswa', 'user', '2021-07-05 10:41:55', '2021-07-05 10:41:55'),
(268, 20, 'Catatan', '/catatangurupiket', 'edit-3', '2021-07-05 10:48:58', '2021-07-05 10:48:58'),
(269, 21, 'Master Soal', '/mastersoal', 'hard-drive', '2021-07-10 06:49:48', '2021-07-10 06:49:48'),
(270, 21, 'Jadwal Ujian', '/jadwalujianguru', 'calendar', '2021-07-10 06:50:22', '2021-07-10 06:50:22'),
(271, 21, 'Setting Matapelajaran', '/settingmapelujianguru', 'tool', '2021-07-10 06:51:43', '2021-07-10 06:51:43'),
(272, 21, 'Nilai Ujian', '/nilaiujianguru', 'activity', '2021-07-10 06:52:31', '2021-07-10 06:52:31'),
(273, 24, 'Materi pembelajaran', '/materipembelajaran', 'book', '2021-07-12 09:34:22', '2021-07-12 09:34:22'),
(274, 24, 'Tugas', '/tugassiswa', 'clipboard', '2021-07-12 09:34:51', '2021-07-12 09:34:51'),
(275, 24, 'Absensi', '/absensisiswa', 'user-check', '2021-07-12 09:35:38', '2021-07-12 09:35:38'),
(276, 24, 'Ujian', '/ujiansiswa', 'feather', '2021-07-12 09:36:49', '2021-07-12 09:36:49'),
(277, 24, 'Riwayat harian', '/riwayatsiswa', 'activity', '2021-07-12 09:40:23', '2021-07-12 09:40:23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita_acara_pembelajaran`
--
ALTER TABLE `berita_acara_pembelajaran`
  ADD KEY `users_id` (`users_id`),
  ADD KEY `setting_kontrak_pengajaran_id` (`setting_kontrak_pengajaran_id`),
  ADD KEY `data_file_id` (`data_file_id`);

--
-- Indeks untuk tabel `catatan_guru_piket`
--
ALTER TABLE `catatan_guru_piket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_absen`
--
ALTER TABLE `data_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_absen_course`
--
ALTER TABLE `data_absen_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `setting_kontrak_pengajaran_id` (`setting_kontrak_pengajaran_id`);

--
-- Indeks untuk tabel `data_berita`
--
ALTER TABLE `data_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_calon_student`
--
ALTER TABLE `data_calon_student`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_isi_materi`
--
ALTER TABLE `data_isi_materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_jadwal_ujian`
--
ALTER TABLE `data_jadwal_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_jawaban_ujian`
--
ALTER TABLE `data_jawaban_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_jenis_ujian`
--
ALTER TABLE `data_jenis_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_judul_materi`
--
ALTER TABLE `data_judul_materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_jurusan`
--
ALTER TABLE `data_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`data_jurusan_id`);

--
-- Indeks untuk tabel `data_komentar`
--
ALTER TABLE `data_komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_kuisioner`
--
ALTER TABLE `data_kuisioner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`),
  ADD KEY `data_course_id` (`data_course_id`);

--
-- Indeks untuk tabel `data_master_materi`
--
ALTER TABLE `data_master_materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_master_soal`
--
ALTER TABLE `data_master_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_matapelajaran`
--
ALTER TABLE `data_matapelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_nilai_ujian`
--
ALTER TABLE `data_nilai_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_semester`
--
ALTER TABLE `data_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_soal`
--
ALTER TABLE `data_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_soal_jawaban`
--
ALTER TABLE `data_soal_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `qr`
--
ALTER TABLE `qr`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_guru_piket`
--
ALTER TABLE `setting_guru_piket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_homebase`
--
ALTER TABLE `setting_homebase`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_jabatan`
--
ALTER TABLE `setting_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_jadwal_absen`
--
ALTER TABLE `setting_jadwal_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_jenis_file`
--
ALTER TABLE `setting_jenis_file`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_kelas_siswa`
--
ALTER TABLE `setting_kelas_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_kelas_id` (`data_kelas_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`),
  ADD KEY `users_id_2` (`users_id`);

--
-- Indeks untuk tabel `setting_kontrak_pengajaran`
--
ALTER TABLE `setting_kontrak_pengajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `data_mata_pelajaran_id` (`data_matapelajaran_id`),
  ADD KEY `data_kelas_id` (`data_kelas_id`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`);

--
-- Indeks untuk tabel `setting_mapel_ujian`
--
ALTER TABLE `setting_mapel_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_master_materi_guru`
--
ALTER TABLE `setting_master_materi_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_tugas_guru`
--
ALTER TABLE `setting_tugas_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_ujian_master_soal`
--
ALTER TABLE `setting_ujian_master_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_wali_kelas`
--
ALTER TABLE `setting_wali_kelas`
  ADD KEY `users_id` (`users_id`),
  ADD KEY `data_kelas_id` (`data_kelas_id`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_semester_id` (`data_semester_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `user_role_id` (`user_role_id`) USING BTREE;

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_access_menu_role_id_index` (`user_role_id`),
  ADD KEY `user_access_menu_menu_id_index` (`user_menu_id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_subsubsub_menu`
--
ALTER TABLE `user_subsubsub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_subsub_menu_id` (`user_subsub_menu_id`);

--
-- Indeks untuk tabel `user_subsub_menu`
--
ALTER TABLE `user_subsub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_sub_menu` (`user_sub_menu_id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_menu_id` (`user_menu_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `catatan_guru_piket`
--
ALTER TABLE `catatan_guru_piket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_absen`
--
ALTER TABLE `data_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT untuk tabel `data_absen_course`
--
ALTER TABLE `data_absen_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_berita`
--
ALTER TABLE `data_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_calon_student`
--
ALTER TABLE `data_calon_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_isi_materi`
--
ALTER TABLE `data_isi_materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_jadwal_ujian`
--
ALTER TABLE `data_jadwal_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_jawaban_ujian`
--
ALTER TABLE `data_jawaban_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `data_jenis_ujian`
--
ALTER TABLE `data_jenis_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_judul_materi`
--
ALTER TABLE `data_judul_materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_jurusan`
--
ALTER TABLE `data_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22900;

--
-- AUTO_INCREMENT untuk tabel `data_komentar`
--
ALTER TABLE `data_komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `data_kuisioner`
--
ALTER TABLE `data_kuisioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_master_materi`
--
ALTER TABLE `data_master_materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1626277978;

--
-- AUTO_INCREMENT untuk tabel `data_master_soal`
--
ALTER TABLE `data_master_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_matapelajaran`
--
ALTER TABLE `data_matapelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_nilai_ujian`
--
ALTER TABLE `data_nilai_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_semester`
--
ALTER TABLE `data_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_soal`
--
ALTER TABLE `data_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `data_soal_jawaban`
--
ALTER TABLE `data_soal_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `qr`
--
ALTER TABLE `qr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=552;

--
-- AUTO_INCREMENT untuk tabel `setting_guru_piket`
--
ALTER TABLE `setting_guru_piket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `setting_homebase`
--
ALTER TABLE `setting_homebase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `setting_jabatan`
--
ALTER TABLE `setting_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `setting_jadwal_absen`
--
ALTER TABLE `setting_jadwal_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `setting_jenis_file`
--
ALTER TABLE `setting_jenis_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `setting_kelas_siswa`
--
ALTER TABLE `setting_kelas_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `setting_kontrak_pengajaran`
--
ALTER TABLE `setting_kontrak_pengajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `setting_mapel_ujian`
--
ALTER TABLE `setting_mapel_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `setting_master_materi_guru`
--
ALTER TABLE `setting_master_materi_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `setting_tugas_guru`
--
ALTER TABLE `setting_tugas_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `setting_ujian_master_soal`
--
ALTER TABLE `setting_ujian_master_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1626748648;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481;

--
-- AUTO_INCREMENT untuk tabel `user_subsubsub_menu`
--
ALTER TABLE `user_subsubsub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_subsub_menu`
--
ALTER TABLE `user_subsub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `setting_kelas_siswa`
--
ALTER TABLE `setting_kelas_siswa`
  ADD CONSTRAINT `setting_kelas_siswa_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD CONSTRAINT `tahun_ajaran_ibfk_1` FOREIGN KEY (`data_semester_id`) REFERENCES `data_semester` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`user_menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_subsubsub_menu`
--
ALTER TABLE `user_subsubsub_menu`
  ADD CONSTRAINT `user_subsubsub_menu_ibfk_1` FOREIGN KEY (`user_subsub_menu_id`) REFERENCES `user_subsub_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`user_menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
