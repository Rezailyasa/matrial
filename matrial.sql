-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Agu 2021 pada 12.39
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
-- Database: `matrial`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tipe_barang` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`id`, `nama_barang`, `tipe_barang`, `ukuran`, `keterangan`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Bata hebell', 'Premiuml', '10 x 7,5 cml', 'tipe premium. bahan terbaikl', 0, '2021-08-21 18:53:06', '2021-08-21 19:01:56'),
(2, 'Bata hebel', 'Premium', '10 x 7,5 cm', 'Premium', 1, '2021-08-21 19:02:26', '2021-08-21 19:03:40'),
(3, 'Bata hebel', 'Grade A', '10 x 7,5 cm', 'Grade A', 1, '2021-08-21 19:03:02', '2021-08-21 19:03:02'),
(4, 'Bata hebel', 'Grade B', '10 x 7,5 cm', 'Grade B', 1, '2021-08-21 19:03:27', '2021-08-21 19:03:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_biaya_kirim`
--

CREATE TABLE `data_biaya_kirim` (
  `id` int(11) NOT NULL,
  `biaya_kirim` int(50) NOT NULL,
  `daerah` text NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_biaya_kirim`
--

INSERT INTO `data_biaya_kirim` (`id`, `biaya_kirim`, `daerah`, `tanggal`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 100000, 'cirebon', '14-08-2021', 1, '2021-08-14 15:24:41', '2021-08-14 15:24:41'),
(2, 125000, 'berebes', '14-08-2021', 1, '2021-08-14 15:25:07', '2021-08-14 15:25:07'),
(3, 150000, 'majalengka', '14-08-2021', 1, '2021-08-14 15:25:26', '2021-08-14 15:25:26'),
(4, 125000, 'indramayu', '14-08-2021', 1, '2021-08-14 15:41:58', '2021-08-14 15:41:58'),
(5, 125000, 'kuningan', '14-08-2021', 1, '2021-08-14 16:09:37', '2021-08-14 16:09:37'),
(6, 270000, 'cirebon baru', '17-08-2021', 1, '2021-08-17 08:02:24', '2021-08-17 08:02:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_harga`
--

CREATE TABLE `data_harga` (
  `id` int(11) NOT NULL,
  `harga` int(50) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `tanggal` varchar(15) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_harga`
--

INSERT INTO `data_harga` (`id`, `harga`, `keterangan`, `tanggal`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 50000, 'keterangan', '14-08-2021', 1, '2021-08-14 15:53:42', '2021-08-14 15:53:42'),
(2, 550000, 'perubah harga', '17-08-2021', 0, '2021-08-17 07:23:22', '2021-08-22 10:19:43'),
(3, 500000, 'dsdsadas', '22-08-2021', 1, '2021-08-22 13:39:52', '2021-08-22 13:39:52'),
(4, 590000, 'dassadsa', '22-08-2021', 1, '2021-08-22 13:46:13', '2021-08-22 13:46:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_komisi`
--

CREATE TABLE `data_komisi` (
  `id` int(11) NOT NULL,
  `margin` int(50) NOT NULL,
  `komisi` int(50) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_komisi`
--

INSERT INTO `data_komisi` (`id`, `margin`, `komisi`, `tanggal`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 5000, 75000, '14-08-2021', 1, '2021-08-14 15:40:56', '2021-08-14 15:40:56'),
(2, 10000, 100000, '15-08-2021', 1, '2021-08-14 15:41:21', '2021-08-14 17:46:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_toko`
--

CREATE TABLE `data_toko` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `no_tlp` varchar(20) DEFAULT NULL,
  `nama_pemilik` varchar(100) DEFAULT NULL,
  `alamat` text NOT NULL,
  `data_biaya_kirim_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `users_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_toko`
--

INSERT INTO `data_toko` (`id`, `nama_toko`, `no_tlp`, `nama_pemilik`, `alamat`, `data_biaya_kirim_id`, `is_active`, `users_id`, `created_at`, `updated_at`) VALUES
(1, 'TB. ADIGUNA', NULL, NULL, 'Jl. Pramuka simpang tiga Ciremai Giri, Cirebon Jawa Barat', 6, 1, 1602863100, '2021-08-14 16:00:27', '2021-08-17 08:02:53'),
(2, 'TB. AFIFAH', NULL, NULL, 'blok. Cimeong ds. Dompyong Wetan, Cirebon', 1, 1, 3, '2021-08-14 16:02:00', '2021-08-14 16:49:12'),
(3, 'TB. ALFAN JAYA', NULL, NULL, 'jln. Kisabalanang, Bode Lor, kec. Plumbon, Cirebon', 1, 1, 1602863100, '2021-08-14 16:02:28', '2021-08-14 16:49:23'),
(4, 'TB. AMANAH', NULL, NULL, 'Desa Gagasari, Kec. Gebang Kab. Cirebon', 1, 1, 1602863100, '2021-08-14 16:02:56', '2021-08-14 16:49:51'),
(5, 'TB. AMANAH IBU', NULL, NULL, 'Desa Luwung Kec. Mundu Cirebon Jawa Barat 45173', 1, 1, 3, '2021-08-14 16:03:37', '2021-08-14 16:50:10'),
(6, 'TB. AMANAH', NULL, NULL, 'Jl. Fatahilah Setu Kulon, Plered, Cirebon', 1, 1, 1602863100, '2021-08-14 16:04:37', '2021-08-14 16:50:27'),
(7, 'TB. ANISA', '081324447347', NULL, 'Ds. Dompyong Wetan Kec. Gebang Kab. Cirebon, Jawa Barat 45191', 1, 1, 1602863100, '2021-08-14 16:05:12', '2021-08-14 16:51:09'),
(8, 'TB. ANNUR JAYA', NULL, NULL, 'jalur Lohbener, Kapetakan, Kab. Cirebon Jawa Barat 45152', 1, 1, 1602863100, '2021-08-14 16:07:46', '2021-08-14 16:51:41'),
(9, 'TB. ANUGRAH', NULL, NULL, 'Jl. Gebang- Ciledug. Ds. Gebang Udik Kec. Gebang Kab. Cirebon Jawa Barat 45194', 1, 1, 1626748649, '2021-08-14 16:08:16', '2021-08-14 16:51:55'),
(10, 'TB. ASEP JAYA', NULL, NULL, 'Ciporang-Windu.H. No. 132, Windusengkahan, Kec. Kuningan Kab. Kuningan, Jawa Barat 45515', 5, 1, 3, '2021-08-14 16:10:00', '2021-08-14 16:53:16'),
(11, 'TB. ANUGRAH JAYA', NULL, NULL, 'Jl. Jend A yani, Dukuhturi Timur, Ketanggungan Kab. Brebes', 2, 1, 3, '2021-08-14 16:10:29', '2021-08-14 16:53:36'),
(12, 'TB. AULIA PUTRA', NULL, NULL, 'Jl. Pangeran Cakra Buana, Kecomberan, Kec. Talun, Cirebon,Jawa Barat 45171', 1, 1, 1602863100, '2021-08-14 16:11:00', '2021-08-14 16:54:03'),
(13, 'TB. AWAN', NULL, NULL, 'Kertasemaya, Gegesik, Prajawinangun Wetan, Kaliwedi, Kab. Cirebon Jawa Barat 45165', 1, 1, 1602863100, '2021-08-14 16:11:38', '2021-08-14 16:54:18'),
(14, 'TB. BANGUN JAYA', '087829570706', NULL, 'Beber-Dura Jaya, Kecamatan. Greged, Cirebon, Jawa Barat 45172', 1, 1, 1602863100, '2021-08-14 16:12:49', '2021-08-14 16:54:44'),
(15, 'TB. BANGUNAN DIGJAYA', NULL, NULL, 'Sindang Laut- Ciawi Gajah No. 1, Putat, Sedong, Cirebon, Jawa Barat 45189', 1, 1, 1602863100, '2021-08-14 16:13:11', '2021-08-14 16:55:10'),
(16, 'TB. BAROKAH', NULL, NULL, 'Jl. Ds Kalipasung Kec. Gebang, Kab. Cirebon Jawa Barat 45191', 1, 1, 3, '2021-08-14 16:13:53', '2021-08-14 16:55:26'),
(17, 'TB. BAROKAH', NULL, NULL, 'Jl. Raya Susukan No. 22, Bunder, Kec. Susukan, Cirebon Jawa Barat 45166', 1, 1, 1626748649, '2021-08-14 16:15:02', '2021-08-14 16:55:45'),
(18, 'TB. BAROKAH SAMCHAN', NULL, NULL, 'Jl. Arya S, Blok Balong Indah, Warungkawung. Depok, Cirebon Jawa Barat 45155', 1, 1, 1626748649, '2021-08-14 16:15:35', '2021-08-14 16:56:00'),
(19, 'TB. BAROKAH', NULL, NULL, 'Jl. Kapten Samadikun No. 76 Kota Cirebon Jawa Barat', 1, 1, 1602863100, '2021-08-14 16:16:08', '2021-08-14 16:56:16'),
(20, 'TB. BAROKAH', NULL, NULL, 'Jl. Raya Karang Sembung, Karang Suwung. Kec. Karangsembung, Cirebon Jawa Barat 45186', 1, 1, 1602863100, '2021-08-14 16:17:38', '2021-08-14 16:56:31'),
(21, 'TB. BIMA AGUNG', NULL, NULL, 'Jl. Cideng Raya No. 315. kertawinangun, Kedawung. Cirebon Jawa Barat 45153', 1, 1, 3, '2021-08-14 16:18:10', '2021-08-14 16:56:45'),
(22, 'TB. BIJAKSANA', NULL, NULL, 'Jl. Panongan Jati Tujuh, Kab. Majalengka Jawa Barat 45458', 3, 1, 1626748651, '2021-08-14 16:18:36', '2021-08-14 16:57:47'),
(23, 'TB. BUAH HATI', NULL, NULL, 'Jl. Karya Bhakti IV P. Grenjeng, Kec. Harja Mukti, Kota Cirebon, Jawa Barat 45134', 1, 1, 1602863100, '2021-08-14 16:19:09', '2021-08-14 16:58:07'),
(24, 'TB. BUDI LAKSANA', NULL, NULL, 'Jl. Cendana Raya. No. 5, Perum Bumi Arumsari, Desa Cirebon Girang', 1, 1, 1602863100, '2021-08-14 16:19:38', '2021-08-14 16:58:31'),
(25, 'TB. CAHAYA TERANG', NULL, NULL, 'Jl. DI Panjaitan No. 16, Babakan Losari, Kec. Pabedilan, Cirebon, Jawa Barat 45193', 1, 1, 3, '2021-08-14 16:20:00', '2021-08-14 16:58:45'),
(26, 'TB. DELA', NULL, NULL, 'Jl. PU IV Jatianom, Kec. Susukan Kab. Cirebon, Jawa Barat 45166', 1, 1, 1626748649, '2021-08-14 16:20:34', '2021-08-14 16:59:08'),
(27, 'TB. DINY', NULL, NULL, 'Jl. Jendral Sudirman Blok. Sirandu No. 8, Ciperna, Kec. Talun, Cirebon Jawa Barat 45171', 1, 1, 1602863100, '2021-08-14 16:21:10', '2021-08-14 16:59:30'),
(28, 'TB. EGI ROYOM', NULL, NULL, 'Blok. Tewi Waruroyom, Kec. Depok Kab. Cirebon Jawa Barat', 1, 1, 1602863100, '2021-08-14 16:21:33', '2021-08-14 17:00:11'),
(29, 'TB. EXPRESS PUTRA', NULL, NULL, 'Jl. Pilang Raya No. 164, Sukapura, Kedawung Cirebon Jawa Barat 45153', 1, 1, 1602863100, '2021-08-14 16:21:56', '2021-08-14 17:00:48'),
(30, 'TB. GRIYA JAYA', NULL, NULL, 'Jl. Raya Ciperna, Rt 02/Rw 04. Ciperna Kec. Talun, Cirebon Jawa Barat', 1, 1, 1602863100, '2021-08-14 16:22:18', '2021-08-14 17:01:13'),
(31, 'TB. EHK JAYA', NULL, NULL, 'Kalikoa, Kedawung Kab. Cirebon Jawa Barat 45153', 1, 1, 1602863100, '2021-08-14 16:22:43', '2021-08-14 17:01:34'),
(32, 'TB. ICHA PRESTASI 1', NULL, NULL, 'Jl. Desa Kalipasung Kecamatan Gebang Kab. Cirebon Jawa Barat 45194', 1, 1, 3, '2021-08-14 16:23:05', '2021-08-14 17:01:54'),
(33, 'TB. ICHA PRESTASI 2', NULL, NULL, 'Ds. Gebang Mekar Kec. Gebang Kab Cirebon, Jawa Barat 45191', 1, 1, 3, '2021-08-14 16:23:30', '2021-08-14 17:02:05'),
(34, 'TB. JAYA MULYA', NULL, NULL, 'Jl. Nyi Arum Sari, Sampiran, Kec. Talun Kab. Cirebon Jawa Barat 45171', 1, 1, 1602863100, '2021-08-14 16:23:50', '2021-08-14 17:02:33'),
(35, 'TB. JAYA MULYA', NULL, NULL, 'Pabedilan, Cirebon Jawa Barat', 1, 1, 1626748649, '2021-08-14 16:24:12', '2021-08-14 17:02:56'),
(36, 'TB. JAMAL KERAMIK', NULL, NULL, 'Guwa Lor, Kec. Kaliwedi, Kab. Cirebon Jawa Barat 45165', 1, 1, 3, '2021-08-14 16:24:39', '2021-08-14 17:03:14'),
(37, 'TB. KARIMAN JAYA', NULL, NULL, 'Pamijahan Kec. Plumbon Cirebon Jawa Barat 45155', 1, 1, 1602863100, '2021-08-14 16:25:00', '2021-08-14 17:03:40'),
(38, 'TB. KENCANA', NULL, NULL, 'Pamijahan Kec. Plumbon, Kab. Cirebon  Jawa Barat 45155', 1, 1, 1602863100, '2021-08-14 16:25:24', '2021-08-14 17:04:04'),
(39, 'TB. KEMBAR JAYA', NULL, NULL, 'Jl. Raya Karang Sembung, Karang Suwung. Kec. Karangsembung, Cirebon Jawa Barat 45186', 1, 1, 1626748651, '2021-08-14 16:25:47', '2021-08-14 17:04:30'),
(40, 'TB. KEMBAR JAYA', NULL, NULL, 'kramat, Sumber Kab. Cirebon Jawa Barat', 1, 1, 1626748649, '2021-08-14 16:26:08', '2021-08-14 17:04:52'),
(41, 'TB. LAKSANA', NULL, NULL, 'Gombang, Kec. Plumbon, Cirebon Jawa Barat 45155', 1, 1, 1626748651, '2021-08-14 16:26:29', '2021-08-14 17:05:15'),
(42, 'TB. LARAS GEMILANG', NULL, NULL, 'Ds. Rawaurip Kec. Pangenan Kab. Cirebon Jawa Barat 45182', 1, 1, 3, '2021-08-14 16:26:52', '2021-08-14 17:05:35'),
(43, 'TB. LARISA', NULL, NULL, 'Jl. Nasional 1 No. 82, Bunder, Kec. Susukan, Cirebon Jawa Barat 45166', 1, 1, 1626748649, '2021-08-14 16:27:13', '2021-08-14 17:05:56'),
(44, 'TB. LIA BANGUNAN', NULL, NULL, 'Ajibarang Brebes, Jawa Tengah', 2, 1, 3, '2021-08-14 16:27:37', '2021-08-14 17:06:29'),
(45, 'TB. MAJU BERKAH', NULL, NULL, 'Ds. Cikeduk, Kec. Depok Kab. Cirebon Jawa Barat 45155', 1, 1, 3, '2021-08-14 16:27:59', '2021-08-14 17:07:13'),
(46, 'TB. MAJU  KERAMIK', NULL, NULL, 'Jl. Sunan Gn. Jati, Karang Kendal, Kapetakan, Cirebon Jawa Barat 45152', 1, 1, 1626748651, '2021-08-14 16:28:22', '2021-08-14 17:07:41'),
(47, 'TB.MAKMUR JAYA', NULL, NULL, 'Ciledug Kulon, Kec. Ciledug, Cirebon Jawa Barat 45188', 1, 1, 1626748649, '2021-08-14 16:28:45', '2021-08-14 17:07:59'),
(48, 'TB. MAKMUR JAYA (FITRI)', NULL, NULL, 'Pasar Pabuaran, Kecamatan Pabuaran Kabupaten Cirebon Jawa Barat', 1, 1, 1626748649, '2021-08-14 16:29:09', '2021-08-14 17:08:20'),
(49, 'TB. MAKMUR JAYA BANGUNAN', NULL, NULL, 'Bobos, Kec. Dukupuntang Kab. Cirebon Jawa Barat', 1, 1, 1626748651, '2021-08-14 16:29:29', '2021-08-14 17:08:37'),
(50, 'TB. MAKSUM', NULL, NULL, 'Jl. Pangeran Sutajaya No.20 Ds. Gebang Kulon, Kec. Gebang Kab. Cirebon Jawa Barat 45191', 1, 1, 1602863100, '2021-08-14 16:29:53', '2021-08-14 17:09:02'),
(51, 'TB. MAMA ISO', NULL, NULL, 'Prajawinangun Wetan, Kaliwedi, Cirebon Jawa Barat 45165', 1, 1, 1626748649, '2021-08-14 16:30:15', '2021-08-14 17:09:22'),
(52, 'TB. MAKMUR JAYA (QOMAR)', NULL, NULL, 'Gembongan, Babakan Kab. Cirebon', 1, 1, 1602863100, '2021-08-14 16:30:39', '2021-08-14 17:09:43'),
(53, 'TB. MEGA KURNIA', NULL, NULL, 'Jl. DI Panjaitan No. 29, Babakan Losari, Kec. Pabedilan, Cirebon, Jawa Barat 45193', 1, 1, 1626748649, '2021-08-14 16:31:09', '2021-08-14 17:10:11'),
(54, 'TB. MISKAD JAYA', NULL, NULL, 'Jl. Arya Salingsingan No. 50, Kesugengan Kidul, Kec. Depok, Cirebon Jawa Barat 45155', 1, 1, 1626748649, '2021-08-14 16:31:34', '2021-08-14 17:10:27'),
(55, 'TB. MUJI JAYA', NULL, NULL, 'Jl. Abu Khaer, Sumber Kidul Kec. Babakan, Cirebon Jawa', 1, 1, 1626748649, '2021-08-14 16:32:16', '2021-08-14 17:10:45'),
(56, 'TB. MULTY JAYA', NULL, NULL, 'Jl. Nyimas Endang Geulis, Danawinangun Kec. Klangenan Kab. Cirebon Jawa Barat 45156', 1, 1, 3, '2021-08-14 17:11:58', '2021-08-14 17:11:58'),
(57, 'TB. MULYA JAYA', NULL, NULL, 'Jl. Pegagan Lor Dusun IV, Pegagan Lor, Kapetakan, Cirebon Jawa Barat 45152', 1, 1, 1626748651, '2021-08-14 17:13:42', '2021-08-14 17:13:42'),
(58, 'UD. MUTIARA TANJAKAN', NULL, NULL, 'Bringin, Ciwaringin Cirebon, Jawa Barat 45167', 1, 1, 1626748649, '2021-08-14 17:14:27', '2021-08-14 17:14:27'),
(59, 'TB. MURNI', NULL, NULL, 'R. Bulakamba No. 12 Karang asem, Kluwut Kec. Bulakamba, Kab. Brebes Jawa Tengah 52253', 2, 1, 3, '2021-08-14 17:15:12', '2021-08-14 17:15:28'),
(60, 'TB. NUR', NULL, NULL, 'Jl. P. Anggabaya No. 22, Guwa Kidul, Kaliwedi, Cirebon Jawa Barat 45165', 1, 1, 3, '2021-08-14 17:15:57', '2021-08-14 17:15:57'),
(61, 'TB. NUR AZIZ', NULL, NULL, 'keraton Suranenggala, Cirebon Jawa Barat45152', 1, 1, 3, '2021-08-14 17:16:25', '2021-08-14 17:16:25'),
(62, 'TB. PUTRI MANDIRI', NULL, NULL, 'Jl. Sultan Hasanudin Tukmudal Kec. Sumber Kab. Cirebon 45611', 1, 1, 1602863100, '2021-08-14 17:17:02', '2021-08-14 17:17:02'),
(63, 'TB. 2 PUTRI MANDIRI', NULL, NULL, 'Ds. Kudu keras Sumber Kidul Kec. Babakan Kab. Cirebon Jawa Barat 45191', 1, 1, 1602863100, '2021-08-14 17:17:32', '2021-08-14 17:17:32'),
(64, 'TB. PUTRI PANATAS', NULL, NULL, 'Jl. Raya Ki Gesang Kaliwedi, Kaliwedi Lor, Kaliwedi, Cirebon, Jawa Barat 45165', 1, 1, 1626748649, '2021-08-14 17:18:05', '2021-08-14 17:18:05'),
(65, 'TB. REYHAN', NULL, NULL, 'Ds. Dompyong arah gembongan', 1, 1, 3, '2021-08-14 17:18:34', '2021-08-14 17:18:34'),
(66, 'TB. RIFQIL JAYA 1', NULL, NULL, 'Ciawi, Banjarharjo, Kabupaten Brebes, Jawa Tengah 52265', 2, 1, 3, '2021-08-14 17:19:00', '2021-08-14 17:19:00'),
(67, 'TB. RIFQIL JAYA 2', NULL, NULL, 'Leuweng gede Kersana Brebes Jawa Tengah', 2, 1, 3, '2021-08-14 17:19:23', '2021-08-14 17:19:23'),
(68, 'TB. RIMBA BAROKAH', NULL, NULL, 'Pegagan, Kec. Palimanan, Cirebon, Jawa Barat 45161', 1, 1, 1626748649, '2021-08-14 17:19:51', '2021-08-14 17:19:51'),
(69, 'TB. RIZKI NURCAHYA', NULL, NULL, 'Jln Raya Susukan Tonggoh, RT.003/RW.001, Susukan Lb., Susukanlebak, Cirebon, Jawa Barat 45185', 1, 1, 1602863100, '2021-08-14 17:20:29', '2021-08-14 17:20:29'),
(70, 'TB. RIZKI JAYA MM', NULL, NULL, 'Kandang kerbau, Jl. Abu Khaer, Hulubanteng, Kec. Babakan, Cirebon, Jawa Barat 45191', 1, 1, 1626748649, '2021-08-14 17:20:57', '2021-08-14 17:20:57'),
(71, 'TB. SAMI JAYA', NULL, NULL, 'Jln Suryadinata Desa Marikangen, Kec. Plumbon Cirebon Jawa Barat 45155', 1, 1, 1626748649, '2021-08-14 17:21:25', '2021-08-14 17:21:25'),
(72, 'TB. TIMUR MANDIRI', NULL, NULL, 'Jl. Gebang - Ciledug blok karang asem, Gebang, Kec. Gebang, Cirebon, Jawa Barat 45191', 1, 1, 1602863100, '2021-08-14 17:21:53', '2021-08-14 17:21:53'),
(73, 'TB. SRI AYU', NULL, NULL, 'Jl. Raya Kapetakan, Karangreja, Suranenggala, Cirebon, Jawa Barat 45152', 1, 1, 1602863100, '2021-08-14 17:22:18', '2021-08-14 17:22:18'),
(74, 'TB. SRI RAHAYU', NULL, NULL, 'Jl. Raya Kapetakan No.21, Kertasura, Kapetakan, Cirebon, Jawa Barat 45152', 1, 1, 1602863100, '2021-08-14 17:23:01', '2021-08-14 17:23:01'),
(75, 'TB. SUDIN JAYA', NULL, NULL, 'Jl. Sunan Gn. Jati Dusun Empat., Grogol, Kapetakan, Cirebon, Jawa Barat 45152', 1, 1, 1602863100, '2021-08-14 17:23:41', '2021-08-14 17:23:41'),
(76, 'TB. SUKATRIMA', NULL, NULL, 'Jl. Raya Nyi Mas Endang Geulis, Danawinangun, Kec. Klangenan, Cirebon, Jawa Barat 45156', 1, 1, 1626748649, '2021-08-14 17:24:27', '2021-08-14 17:24:27'),
(77, 'TB. SUMBER REZEKI', NULL, NULL, 'Blok Karang Anyar, Cikulak Kidul, Waled, Cirebon, Jawa Barat 45187', 1, 1, 3, '2021-08-14 17:27:29', '2021-08-14 17:27:29'),
(78, 'TB. SUMBER AGUNG', NULL, NULL, 'Kebarepan, Kec. Plumbon, Cirebon, Jawa Barat', 1, 1, 1626748651, '2021-08-14 17:27:52', '2021-08-14 17:27:52'),
(79, 'TB. SUMBER AGUNG', NULL, NULL, 'Jl. R.Dewi Sartika No.9, Sumber, Kec. Sumber, Cirebon, Jawa Barat 45611', 1, 1, 1626748651, '2021-08-14 17:28:17', '2021-08-14 17:28:17'),
(80, 'TB. SUMBER AGUNG', NULL, NULL, 'Jl. Pangeran Antasari, Purbawinangun, Kec. Plumbon, Cirebon, Jawa Barat 45155', 1, 1, 1626748651, '2021-08-14 17:28:42', '2021-08-14 17:28:42'),
(81, 'TB. SUMBER AGUNG', NULL, NULL, 'Jl. Otto Iskandardinata blok jalinan No.34, Tegalwangi, Kec. Weru, Cirebon, Jawa Barat 45154', 1, 1, 1626748651, '2021-08-14 17:29:08', '2021-08-14 17:29:08'),
(82, 'TB. SUMBER AGUNG', NULL, NULL, 'JL P. Cakrabuana, Desa No.41, Kemantren, Kec. Sumber, Cirebon, Jawa Barat 45611', 1, 1, 1626748651, '2021-08-14 17:29:31', '2021-08-14 17:29:31'),
(83, 'TB. SUMBER JAYA BUANA', NULL, NULL, 'Jl. Kanci - Sindang Laut, Japura Kidul, Kec. Astanajapura, Cirebon, Jawa Barat 45181', 1, 1, 3, '2021-08-14 17:29:56', '2021-08-14 17:29:56'),
(84, 'TB. AULIA', NULL, NULL, 'JL. Perjuangan, Majasem, Karyamulya, Kec. Kesambi, Kota Cirebon, Jawa Barat 45131', 1, 1, 1626748651, '2021-08-14 17:30:23', '2021-08-14 17:30:23'),
(85, 'TB. TANJUNG LINGGA', NULL, NULL, 'Jl. Sunan Gn. Jati No.25, RT.01, Purwawinangun, Suranenggala, Cirebon, Jawa Barat 45152', 1, 1, 1602863100, '2021-08-14 17:30:48', '2021-08-14 17:30:48'),
(86, 'TB. TIAN ROSSONERI', NULL, NULL, 'Jl. Fatahillah No.46, Sumber, Kec. Sumber, Cirebon, Jawa Barat 45611', 1, 1, 1602863100, '2021-08-14 17:31:12', '2021-08-14 17:31:12'),
(87, 'TB. UDIN PUTRA', NULL, NULL, 'Jalan Pramuka Sitopeng, Argasunya, Kec. Harjamukti, Kota Cirebon, Jawa Barat 45145', 1, 1, 1602863100, '2021-08-14 17:32:05', '2021-08-14 17:32:05'),
(88, 'TB. ULFI JAYA', NULL, NULL, 'Prapag Lor, Kec. Losari, Kabupaten Brebes, Jawa Tengah 52255', 2, 1, 1602863100, '2021-08-14 17:32:33', '2021-08-14 17:32:33'),
(89, 'CV. HARAPAN BANGUN JAYA', NULL, NULL, 'Pasalakan, Kec. Sumber, Cirebon, Jawa Barat 45611', 1, 1, 3, '2021-08-14 17:33:01', '2021-08-14 17:33:01'),
(90, 'TB. IRGI JAYA', NULL, NULL, 'Jl. Jend. Sudirman, Penggung, Kalijaga, Kec. Harjamukti, Kota Cirebon, Jawa Barat 45143', 1, 1, 1602863100, '2021-08-14 17:33:30', '2021-08-14 17:33:30'),
(91, 'TB. SARJANA', NULL, NULL, 'Sukareja, Banjarharjo, Kabupaten Brebes, Jawa Tengah 52265', 2, 1, 3, '2021-08-14 17:35:11', '2021-08-14 17:35:11'),
(92, 'TB. JAWI INDAH', NULL, NULL, 'Rungkang, Brebes Jawa Tengah', 2, 1, 3, '2021-08-14 17:35:39', '2021-08-14 17:35:39'),
(93, 'TB. BERKAH JAYA', NULL, NULL, 'Jl. A. Yani No.79, Slatri, Kec. Larangan, Kabupaten Brebes, Jawa Tengah 52262', 2, 1, 3, '2021-08-14 17:36:07', '2021-08-14 17:36:07'),
(94, 'TB. BERKAH JAYA', NULL, NULL, 'Ciampel Kulon, Ciampel, Kec. Kersana, Kabupaten Brebes, Jawa Tengah 52264', 2, 1, 3, '2021-08-14 17:36:35', '2021-08-14 17:36:35'),
(95, 'UD. HM JAYA', NULL, NULL, 'Brebes, jawa tengah', 2, 1, 3, '2021-08-14 17:37:34', '2021-08-14 17:37:34'),
(96, 'TB. DUKUH JERUK', NULL, NULL, 'Dukuhjeruk, Banjarharjo, Kabupaten Brebes, Jawa Tengah 52265', 2, 1, 3, '2021-08-14 17:38:08', '2021-08-14 17:38:08'),
(97, 'TB. GIAN MAJU', NULL, NULL, 'Dukuhjeruk, Banjarharjo, Kabupaten Brebes, Jawa Tengah 52265', 2, 1, 3, '2021-08-14 17:38:31', '2021-08-14 17:38:31'),
(98, 'TB. PUTRI DSP', NULL, NULL, 'Jl. Raya Ciledug Kec. Losari, Kab. Brebes, Jawa Tengah 52255', 2, 1, 3, '2021-08-14 17:39:01', '2021-08-14 17:39:01'),
(99, 'TB. BANGKIT JAYA', NULL, NULL, 'Pejangan, Kec. Tanjung Kab. Brebes, Jawa Tengah', 2, 1, 3, '2021-08-14 17:39:31', '2021-08-14 17:39:31'),
(100, 'TB. MAJU KERAMIK', NULL, NULL, 'Jl. Sunan Gn. Jati, Karangkendal, Kapetakan, Cirebon, Jawa Barat 45152', 1, 1, 1626748651, '2021-08-14 17:40:03', '2021-08-14 17:40:03'),
(101, 'TB. ENGGAL JAYA', NULL, NULL, 'Cikakak, Brebes, Jawa tengah', 2, 1, 3, '2021-08-14 17:40:39', '2021-08-14 17:40:39'),
(102, 'TB. H. APUD', NULL, NULL, 'Jl. Ki Gede Wesaguna, RT.01/RW.01, Bode Lor, Kec. Plumbon, Cirebon, Jawa Barat 45155', 1, 1, 1602863100, '2021-08-14 17:41:09', '2021-08-14 17:41:09'),
(103, 'TB. GIAN MAJU', NULL, NULL, 'Sukareja, Banjarharjo, Kabupaten Brebes, Jawa Tengah 52265', 2, 1, 3, '2021-08-14 17:41:52', '2021-08-14 17:41:52'),
(104, 'TB. QIAN JAYA', NULL, NULL, 'Dukuhjeruk, Banjarharjo, Kabupaten Brebes, Jawa Tengah 52265', 2, 1, 3, '2021-08-14 17:42:23', '2021-08-14 17:42:23'),
(105, 'TB. RIZKI JAYA', NULL, NULL, 'Losari', 2, 1, 1602863100, '2021-08-14 17:42:50', '2021-08-14 17:42:50'),
(106, 'TB. NURUL SIDIQ', NULL, NULL, 'Klayan, Kec. Gunungjati, Cirebon, Jawa Barat 45151', 1, 1, 3, '2021-08-14 17:43:22', '2021-08-14 17:43:22'),
(107, 'TB ontoh', NULL, NULL, 'Jl.Abc cirebon', 1, 1, 3, '2021-08-17 07:21:19', '2021-08-17 07:21:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `data_barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `data_toko_id` int(11) NOT NULL,
  `data_komisi_id` int(11) NOT NULL,
  `kelebihankomisi` int(11) DEFAULT NULL,
  `data_harga_id` int(11) NOT NULL,
  `no_invoice` int(50) NOT NULL,
  `tanggal` varchar(25) NOT NULL,
  `users_id` int(11) NOT NULL,
  `total` int(100) NOT NULL,
  `catatan` text DEFAULT NULL,
  `type_pembayaran` text NOT NULL,
  `is_lunas` varchar(20) NOT NULL,
  `acc` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `data_barang_id`, `qty`, `data_toko_id`, `data_komisi_id`, `kelebihankomisi`, `data_harga_id`, `no_invoice`, `tanggal`, `users_id`, `total`, `catatan`, `type_pembayaran`, `is_lunas`, `acc`, `created_at`, `updated_at`) VALUES
(12, 3, 1, 13, 2, NULL, 2, 1, '16-08-2021', 1602863100, 7040000, NULL, 'Cash', 'Lunas', NULL, '2021-08-21 21:02:19', '2021-08-21 21:02:19'),
(13, 3, 1, 14, 1, NULL, 2, 2, '18-08-2021', 1602863100, 7035000, NULL, 'Cash', 'Lunas', NULL, '2021-08-21 21:23:57', '2021-08-21 21:23:57'),
(14, 2, 1, 15, 2, NULL, 2, 3, '20-08-2021', 1602863100, 7040000, NULL, 'Cash', 'Lunas', NULL, '2021-08-21 21:24:18', '2021-08-21 21:24:18'),
(15, 2, 1, 15, 1, NULL, 2, 4, '16-08-2021', 1602863100, 7035000, NULL, 'Cash', 'Lunas', NULL, '2021-08-21 21:24:47', '2021-08-21 21:24:47'),
(16, 2, 1, 23, 2, NULL, 2, 5, '16-08-2021', 1602863100, 7040000, NULL, 'Cash', 'Lunas', NULL, '2021-08-21 21:27:09', '2021-08-21 21:27:09'),
(17, 3, 1, 15, 1, NULL, 2, 6, '16-08-2021', 1602863100, 7035000, NULL, 'Cash', 'Lunas', NULL, '2021-08-21 21:27:27', '2021-08-21 21:27:27'),
(18, 4, 1, 24, 2, NULL, 2, 7, '16-08-2021', 1602863100, 7040000, NULL, 'Cash', 'Lunas', NULL, '2021-08-21 21:27:44', '2021-08-21 21:27:44'),
(19, 3, 1, 19, 1, NULL, 2, 8, '16-08-2021', 1602863100, 7035000, NULL, 'Cash', 'Lunas', NULL, '2021-08-21 21:28:07', '2021-08-21 21:28:07'),
(21, 3, 1, 5, 1, NULL, 2, 9, '17-08-2021', 3, 6835000, NULL, 'Cash', 'Lunas', NULL, '2021-08-22 10:06:15', '2021-08-22 10:06:15'),
(22, 2, 1, 93, 2, NULL, 4, 10, '17-08-2021', 3, 7585200, NULL, 'Cash', 'Lunas', NULL, '2021-08-22 14:20:12', '2021-08-22 14:20:12'),
(23, 2, 1, 104, 2, NULL, 4, 11, '18-08-2021', 3, 7560000, NULL, 'Cash', 'Lunas', NULL, '2021-08-22 14:20:43', '2021-08-22 14:20:43'),
(24, 2, 2, 106, 2, NULL, 4, 12, '21-08-2021', 3, 15120000, NULL, 'Cash', 'Lunas', NULL, '2021-08-22 14:21:16', '2021-08-22 14:21:16'),
(25, 2, 3, 106, 2, NULL, 4, 13, '22-08-2021', 3, 22774500, NULL, 'Cash', 'Lunas', NULL, '2021-08-22 14:38:38', '2021-08-22 14:38:38'),
(26, 2, 1, 95, 2, 2500, 4, 14, '19-08-2021', 3, 7591500, NULL, 'Cash', 'Lunas', NULL, '2021-08-22 14:42:27', '2021-08-22 14:42:27'),
(27, 2, 1, 59, 2, 5000, 4, 15, '19-08-2021', 3, 7623000, NULL, 'Cash', 'Lunas', NULL, '2021-08-22 15:11:31', '2021-08-22 15:11:31'),
(28, 2, 2, 23, 2, 2500, 4, 16, '17-08-2021', 1602863100, 15183000, NULL, 'Cash', 'Lunas', NULL, '2021-08-22 16:25:27', '2021-08-22 16:25:27');

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
(3, NULL, NULL, 'Ayu', 'Capture.PNG', 'admin@gmail.com', NULL, '1', '0838371444', '$2y$10$/50MXxCKZpi1XjHqKWh3MOldLpj6wcRy4wFjJkXd85aVQyHk3pa7e', 'desa suci blok tenggeran mundu cirebon', NULL, 1, 1, NULL, NULL, 2, NULL, '2020-10-18 14:23:15', '2021-08-12 10:51:23'),
(1602863100, NULL, NULL, 'Tomi', 'user.webp', 'sales@gmail.com', NULL, '1', '0838371444', '$2y$10$/50MXxCKZpi1XjHqKWh3MOldLpj6wcRy4wFjJkXd85aVQyHk3pa7e', 'desa suci blok tenggeran mundu cirebon', NULL, 2, 1, '1613648446', NULL, 2, NULL, '2020-10-08 14:23:15', '2021-08-10 20:29:55'),
(1626748649, NULL, NULL, 'Deno', 'user.webp', 'sales2@gmail.com', NULL, '1', '0838371444', '$2y$10$/50MXxCKZpi1XjHqKWh3MOldLpj6wcRy4wFjJkXd85aVQyHk3pa7e', 'desa suci blok tenggeran mundu cirebon', NULL, 2, 1, '1613648446', NULL, 2, NULL, '2020-10-08 14:23:15', '2021-08-14 15:41:38'),
(1626748651, NULL, NULL, 'Wahyu', 'user.webp', 'sales3@gmail.com', NULL, '1', '0838371444', '$2y$10$/50MXxCKZpi1XjHqKWh3MOldLpj6wcRy4wFjJkXd85aVQyHk3pa7e', 'desa suci blok tenggeran mundu cirebon', NULL, 2, 1, '1613648446', NULL, 2, NULL, '2020-10-08 14:23:15', '2021-08-14 15:41:38');

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
(89, 1, 1, '2021-03-02 16:30:51', '2021-03-02 16:30:51'),
(104, 2, 2, '2021-06-05 21:24:15', '2021-06-05 21:24:15'),
(150, 1, 9, '2021-03-02 16:30:51', '2021-03-02 16:30:51'),
(151, 1, 11, '2021-03-02 16:30:51', '2021-03-02 16:30:51'),
(152, 1, 13, '2021-03-02 16:30:51', '2021-03-02 16:30:51'),
(153, 2, 3, '2021-06-05 21:24:15', '2021-06-05 21:24:15'),
(154, 1, 3, '2021-06-05 21:24:15', '2021-06-05 21:24:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `title`, `url`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', '/dashboard', 'pie-chart', '2020-08-31 02:49:50', '2021-06-09 22:44:13'),
(2, 'Dashboard', '/home', 'home', '2021-06-05 21:22:20', '2021-06-05 21:22:37'),
(3, 'Jadwal Pengiriman', '/jadwal', 'calendar', '2021-06-05 21:22:20', '2021-06-05 21:22:37'),
(9, 'Transaksi', '/transaksi', 'package', '2020-08-31 02:49:50', '2021-06-09 22:44:13'),
(11, 'Settings', '/settings', 'settings', '2020-08-31 02:49:50', '2021-06-09 22:44:13'),
(13, 'Laporan', '/laporan', 'clipboard', '2020-08-31 02:49:50', '2021-06-09 22:44:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu2`
--

CREATE TABLE `user_menu2` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_menu2`
--

INSERT INTO `user_menu2` (`id`, `menu`, `created_at`, `updated_at`) VALUES
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
(2, 'Sales', '2020-12-16 07:13:02', '2020-12-08 07:12:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_biaya_kirim`
--
ALTER TABLE `data_biaya_kirim`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_harga`
--
ALTER TABLE `data_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_komisi`
--
ALTER TABLE `data_komisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_toko`
--
ALTER TABLE `data_toko`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `user_menu2`
--
ALTER TABLE `user_menu2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_biaya_kirim`
--
ALTER TABLE `data_biaya_kirim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_harga`
--
ALTER TABLE `data_harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_komisi`
--
ALTER TABLE `data_komisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_toko`
--
ALTER TABLE `data_toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1626748652;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT untuk tabel `user_menu2`
--
ALTER TABLE `user_menu2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
