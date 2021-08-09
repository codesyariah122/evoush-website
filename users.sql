-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2021 pada 11.21
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evoush_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `achievements` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `roles`, `address`, `phone`, `avatar`, `status`, `achievements`) VALUES
(1, 'puji ermanto', 'pujiermanto@gmail.com', NULL, '$2y$10$5Mib7Q.KxYo0LXpegbOpCOWy6uQ5CqSDn02QkD/FT0.WemStEtz3q', NULL, '2021-05-28 07:34:40', '2021-07-31 00:05:57', 'administrator', '[\"ADMIN\"]', 'Jl. Boeing Utara 1 No.7', '6288222668778', 'administrator/profile/UXGtWE6NMu8cd5hi6nIEgu6WJL6YctE4fzMK0djb.jpg', 'ACTIVE', ''),
(2, 'evoush author', 'evoushauthor@evoush.com', NULL, '$2y$10$lZ1LcyoA9VlyE0By4TuRGOCraIcyZ630KyaLw2hRnCG2/Nk65lyby', NULL, '2021-06-28 00:19:31', '2021-06-28 00:19:31', 'evoush_author2021', '[\"AUTHOR\"]', 'Pergudangan sirie Blok-S/20', '6288222668778', 'avatars/pUz1wibOjtyfJpjM9IFOd8hDYNGUI7FCCX0WCKLj.jpg', 'ACTIVE', ''),
(3, 'fahrin', 'fahrin@evoush.com', NULL, '$2y$10$TU6CRLs3H0.g0Vu6fDY7F.tM8T1..7LyQZCe5A6rzRexrkkUhQFEi', NULL, '2021-08-06 21:10:38', '2021-08-09 01:56:05', 'thefounder', '[\"MEMBER\"]', NULL, '628123889992', 'fahrin/profile/pj5GIbBVQpXdHRyMhj9exsTqOA3MnxUmQWnIJEqc.png', 'ACTIVE', '[\"STAR SAPHIRE\"]'),
(4, 'rifqi fenti', 'rifqifenti@evoush.com', NULL, '$2y$10$0cgAQ9T308RxLo056bWnZuU.EeK0WjigbxGSzR8Hqhkuewr2.SqDq', NULL, '2021-08-06 21:07:39', '2021-08-09 02:03:04', 'rifqifenti', '[\"MEMBER\"]', NULL, '628899888888', 'rifqifenti/profile/PY0NJ7DdCsrLZetE4Or0lrq5vJqqBkphg0f0dXgl.png', 'ACTIVE', '[\"STAR SAPHIRE\"]'),
(5, 'Luthfi Kardhina Sari', 'dieana@evoush.com', NULL, '$2y$10$2X5oi1JTMhK.4c5yjuWmEuKAuWz3HEB44qEgOCZ5lM.7bQznhIR7K', NULL, '2021-08-04 02:16:23', '2021-08-09 02:03:22', 'dieana', '[\"MEMBER\"]', NULL, '6288222668778', 'dieana/profile/CwHSaUQ6vZM20GfzyED2NwDTVCNwGVNG0mLS9u5m.png', 'ACTIVE', '[\"STAR SAPHIRE\"]'),
(6, 'rifqi', 'rifqi@evoush.com', NULL, '$2y$10$BAYxvc8aOaxZ6/.qqIqTqu/ay71Q/wzXCBXw2z8hpcGFLK8U/TX.G', NULL, '2021-08-06 21:09:35', '2021-08-09 02:03:34', 'coachrifqi', '[\"MEMBER\"]', NULL, '628899888888', 'rifqi/profile/ATAKTPFcnxEGdaCLQR6tSKALFTGJdmRv9p34ag1j.png', 'ACTIVE', '[\"STAR SAPHIRE\"]'),
(7, 'hendriyanto', 'hendry@evoush.com', NULL, '$2y$10$o4MACEXM0Yr9Bmwbnoobfudpa7A1yC32mB7OHRo3zJYs5q9JimlMm', NULL, '2021-06-29 05:05:57', '2021-08-09 02:03:41', 'hendry', '[\"MEMBER\"]', NULL, '6281230174799', 'hendry/profile/SrPPERzayU7a9W3Pff7ziYUoX5oysaHU4YMwZsRj.png', 'ACTIVE', '[\"STAR SAPHIRE\"]'),
(8, 'Endang Ekawati,S.E', 'putriku@evoush.com', NULL, '$2y$10$k2sVowHeONULiTUKAX554uyIiZUDh7tKlJ4RORv1jWmPtbM71u1fW', NULL, '2021-06-29 05:03:56', '2021-08-09 02:03:55', 'putriku', '[\"MEMBER\"]', NULL, '6285225497552', 'putriku/profile/2ruhNc7az5e6bfwoFVFvjgW75IjvgVhBmm8bIcWy.png', 'ACTIVE', '[\"STAR SAPHIRE\"]'),
(9, 'Ratmina', 'ratmina@evoush.com', NULL, '$2y$10$RPDLhJo8aX0t1UX4t.ppG.HvUa7iSdsdow5od6Cgcmea4pNdBSobe', NULL, '2021-06-29 05:12:58', '2021-08-09 02:04:14', 'ratmina', '[\"MEMBER\"]', NULL, '6282237984519', 'ratmina/profile/cddC2WgpDF9DwUum3MOkUNVsKN22usfaZwrwuqfa.png', 'ACTIVE', '[\"STAR SAPHIRE\"]'),
(10, 'agung irdiyanto', 'founder@evoush.com', NULL, '$2y$10$f5S5BeUTdYW1skz.xlkreOLpqGyR0tl.HAp4fXNC9Jg6p5J6v4aq.', NULL, '2021-08-07 00:05:58', '2021-08-09 02:05:45', 'founder', '[\"MEMBER\"]', NULL, '6283848098887', 'kangariel/profile/MYbcsMaLyCr6pTzhh74LOvR8q7qy9uff0CLhH3G3.png', 'ACTIVE', '[\"STAR SAPHIRE\"]'),
(11, 'Tutik Rahayu', 'kinclong@evoush.com', NULL, '$2y$10$dkMBXFp9MzVIVP89ib2ZUeZC6OfnjeNwcsOvl3.76xz7CqYd0Zexa', NULL, '2021-07-01 04:12:31', '2021-08-09 02:04:31', 'kinclong', '[\"MEMBER\"]', NULL, '6282131609949', 'kinclong/profile/QkIahVq6B9ixDXNdCIhv6Dln1j2mjJofL1AEScAl.png', 'ACTIVE', '[\"SAPHIRE\"]'),
(12, 'ayurey', 'ayurey@evoush.com', NULL, '$2y$10$AdN7Un9JFH/LPmTs.B1toeK1Obb9nITNPco3FQoQGyxy1H5YjuTue', NULL, '2021-08-04 02:21:38', '2021-08-09 02:07:15', 'ayurey', '[\"MEMBER\"]', NULL, '087887898787732', 'ayurey/profile/xcEpPrnllGOG8VCRVvb25h9la9BYtxOQ5mi6Ifu9.png', 'ACTIVE', '[\"SAPHIRE\"]'),
(13, 'Ababil Alung Edoardo', 'ababil@evoush.com', NULL, '$2y$10$v9fiC8mEzBvmes9hNAiLZuXmNzbv7JHdFaw.lltv5D9hAHs3ivjuK', NULL, '2021-08-04 02:22:39', '2021-08-09 02:05:30', 'ababil', '[\"MEMBER\"]', NULL, '6281333372172', 'ababil/profile/2l0Hs8Z6taE204UPHSpd3ufU694hrDs6hM8xJDBq.png', 'ACTIVE', '[\"SAPHIRE\"]'),
(14, 'deded syahreza', 'deded@evoush.com', NULL, '$2y$10$ORtRaKMjrG.g2kL5pmEII.jUY9m/tL.vaihreyhX3dyNah5Nt85t2', NULL, '2021-08-04 02:19:30', '2021-08-09 02:05:15', 'deded', '[\"MEMBER\"]', NULL, '08988987878787', 'deded/profile/A9WYUNhlmnBHqgPCRjNiTYLPXML4feiOeYVPfv4B.png', 'ACTIVE', '[\"SAPHIRE\"]'),
(15, 'Rahmad', 'rahmad@evoush.com', NULL, '$2y$10$lw1SOTDadyjk5aC0PzeATeYrgEorBAAU7iobaqu4GmXLemrtsIcdG', NULL, '2021-06-29 05:16:58', '2021-08-09 02:04:41', 'rahmadisa', '[\"MEMBER\"]', NULL, '6282157497162', 'rahmadisa/profile/8jRbMys4juzPGZrXFxeerVgRHVQ9Xfg2TEPXTIj1.png', 'ACTIVE', '[\"SAPHIRE\"]'),
(16, 'saidah laila', 'saidahlaila@evoush.com', NULL, '$2y$10$PkjcW63fJAE70ecJtQ0PMuie0RunquyzzRZfwLBDW3hQXMmKgGz6S', NULL, '2021-06-29 04:40:20', '2021-08-09 02:04:59', 'saidahlaila', '[\"MEMBER\"]', NULL, '6285347231325', 'saidahlaila/profile/C8XdULsc3fKXKSMbun6wtJT6huyxhvsY2Wd3PYaU.png', 'ACTIVE', '[\"SAPHIRE\"]');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
