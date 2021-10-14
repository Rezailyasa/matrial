-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2021 pada 08.54
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
-- Database: `new_e_learning`
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
-- Struktur dari tabel `data_absen`
--

CREATE TABLE `data_absen` (
  `id` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `users_id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Struktur dari tabel `data_course`
--

CREATE TABLE `data_course` (
  `id` int(11) NOT NULL,
  `nama_mata_pelajaran` varchar(255) NOT NULL,
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
-- Struktur dari tabel `data_jurusan`
--

CREATE TABLE `data_jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelas`
--

CREATE TABLE `data_kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `data_jurusan_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kelas`
--

INSERT INTO `data_kelas` (`id`, `nama_kelas`, `data_jurusan_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(22890, 'XII RPL 1', 1614326492, '', '2021-06-05 14:01:12', '2021-06-05 14:01:12');

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
-- Struktur dari tabel `data_semester`
--

CREATE TABLE `data_semester` (
  `id` int(11) NOT NULL,
  `nama_semester` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Struktur dari tabel `setting_kelas_siswa`
--

CREATE TABLE `setting_kelas_siswa` (
  `data_kelas_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_kontrak_pengajaran`
--

CREATE TABLE `setting_kontrak_pengajaran` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `data_course_id` int(11) NOT NULL,
  `data_kelas_id` int(11) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `waktu_mulai` varchar(255) NOT NULL,
  `waktu_selesai` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nis`, `name`, `image`, `email`, `email_orang_tua`, `email_verified_at`, `telepon`, `password`, `alamat`, `maps`, `user_role_id`, `is_active`, `forgot`, `permohonan_akun`, `mode_gelap`, `created_at`, `updated_at`) VALUES
(3, NULL, 'admin', 'user.webp', 'admin@gmail.com', NULL, '1', '0838371444', '$2y$10$/50MXxCKZpi1XjHqKWh3MOldLpj6wcRy4wFjJkXd85aVQyHk3pa7e', 'desa suci blok tenggeran mundu cirebon', NULL, 1, 1, NULL, NULL, 2, '2020-10-18 14:23:15', '2021-01-07 03:04:04'),
(1602863100, NULL, 'guru', 'user.webp', 'guru@gmail.com', NULL, '1', '0838371444', '$2y$10$/50MXxCKZpi1XjHqKWh3MOldLpj6wcRy4wFjJkXd85aVQyHk3pa7e', 'desa suci blok tenggeran mundu cirebon', NULL, 8, 1, '1613648446', NULL, 2, '2020-10-08 14:23:15', '2021-03-01 20:56:37'),
(1602863104, NULL, 'pelajar', 'user.webp', 'usmanhabibbahtiar@gmail.com', NULL, '1', '0838371444', '$2y$10$f/gW.0DCGFRrq/apmuJF9eXBYP03izKQF5BDVGsQPru4XY4DlrpZK', 'desa suci blok tenggeran mundu cirebon', NULL, 2, 1, '1623161288', 'Staf', 2, '2020-10-18 14:23:15', '2021-06-09 18:10:49'),
(1614326491, NULL, 'Kaprodi', 'user.webp', 'kaprodi@gmail.com', NULL, '1614326491', NULL, '$2y$10$sijiEBxnIg5OoueoORaso.AyD6tHWFKxT/KPiGHOMZzXOIsAOye5a', 'Belum Di Input', NULL, 2, 1, NULL, 'Student', 2, '2021-02-26 01:01:31', '2021-06-11 01:05:24'),
(1614326492, NULL, 'Wali Kelas', 'user.webp', 'walikelas@gmail.com', NULL, '1614326491', NULL, '$2y$10$sijiEBxnIg5OoueoORaso.AyD6tHWFKxT/KPiGHOMZzXOIsAOye5a', 'Belum Di Input', NULL, 6, 1, NULL, NULL, 2, '2021-02-26 01:01:31', '2021-06-05 17:23:54');

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
(91, 8, 6, '2021-03-02 16:31:08', '2021-03-02 16:31:08'),
(104, 2, 14, '2021-06-05 21:24:15', '2021-06-05 21:24:15'),
(105, 1, 6, '2021-06-09 22:47:45', '2021-06-09 22:47:45'),
(106, 1, 8, '2021-06-09 22:47:45', '2021-06-09 22:47:45'),
(107, 1, 15, '2021-06-09 22:47:45', '2021-06-09 22:47:45');

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
(15, 'Settings', '2021-06-09 22:45:20', '2021-06-09 22:45:20');

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
(3, 'Kepala Institusi', '2021-06-05 10:19:21', '2021-06-05 10:19:14'),
(4, 'Wakil Kepala Institusi', NULL, NULL),
(5, 'Kaprodi', '2020-12-09 00:36:56', '2020-12-09 00:36:56'),
(6, 'Wali Kelas', NULL, NULL),
(7, 'Staf', NULL, NULL),
(8, 'Teacher', '2020-12-09 00:37:07', '2020-12-09 00:37:07'),
(9, 'Student', '2020-12-09 00:37:26', '2020-12-09 00:37:26'),
(10, 'Alumni', NULL, NULL);

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
(1, 8, 'Menu', '/menu', 'fas fa-fw fa-book', NULL, '2020-08-30 11:21:17'),
(2, 8, 'SubMenu', '/sub_menu', 'fas fa-fw fa-book', NULL, '2020-08-30 11:14:48'),
(15, 6, 'Dashboard', '/admin_dashboard', 'fas fa-fw fa-tachometer-alt', '2020-08-31 02:49:50', '2021-06-09 22:44:13'),
(16, 6, 'Role & Access', '/role', 'fas fa-fw fa-user-tag', '2020-08-31 02:50:52', '2020-08-31 02:50:52'),
(17, 8, 'SubSubMenu', '/sub_sub_menu', 'fas fa-fw fa-book', NULL, '2020-08-30 11:14:48'),
(240, 6, 'User Verify', '/user_verify', 'fas fa-users', '2021-06-05 17:56:10', '2021-06-05 17:56:29'),
(241, 14, 'Dashboard', '/join_kelas', 'fas fa-fw fa-tachometer-alt', '2021-06-05 21:22:20', '2021-06-05 21:22:37'),
(242, 15, 'Pembelajaran', '/settingpembelajaran', 'fas fa-book', '2021-06-09 22:49:20', '2021-06-09 22:49:20');

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
-- Indeks untuk tabel `data_calon_student`
--
ALTER TABLE `data_calon_student`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_course`
--
ALTER TABLE `data_course`
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
-- Indeks untuk tabel `data_kuisioner`
--
ALTER TABLE `data_kuisioner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`),
  ADD KEY `data_course_id` (`data_course_id`);

--
-- Indeks untuk tabel `data_semester`
--
ALTER TABLE `data_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_kelas_siswa`
--
ALTER TABLE `setting_kelas_siswa`
  ADD KEY `data_kelas_id` (`data_kelas_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`);

--
-- Indeks untuk tabel `setting_kontrak_pengajaran`
--
ALTER TABLE `setting_kontrak_pengajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `data_mata_pelajaran_id` (`data_course_id`),
  ADD KEY `data_kelas_id` (`data_kelas_id`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`);

--
-- Indeks untuk tabel `setting_wali_kelas`
--
ALTER TABLE `setting_wali_kelas`
  ADD KEY `users_id` (`users_id`),
  ADD KEY `data_kelas_id` (`data_kelas_id`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`);

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
-- AUTO_INCREMENT untuk tabel `data_absen`
--
ALTER TABLE `data_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `data_absen_course`
--
ALTER TABLE `data_absen_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_calon_student`
--
ALTER TABLE `data_calon_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_jurusan`
--
ALTER TABLE `data_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22892;

--
-- AUTO_INCREMENT untuk tabel `data_kuisioner`
--
ALTER TABLE `data_kuisioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_semester`
--
ALTER TABLE `data_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `setting_kontrak_pengajaran`
--
ALTER TABLE `setting_kontrak_pengajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1623238487;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=480;

--
-- AUTO_INCREMENT untuk tabel `user_subsub_menu`
--
ALTER TABLE `user_subsub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

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
-- Ketidakleluasaan untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`user_menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
