-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Mar 2019 pada 03.35
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_printindong`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `norek` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hp` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `username`, `nama`, `avatar`, `email`, `password`, `alamat`, `kota`, `hp`, `api_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'spiderman', 'Spiderman', NULL, 'spiderman@gmail.com', '$2y$10$bKr0OvM4lWxutGgJZpn26eXL5L/JZFG3tohIZMsVjn/v3ATMi9hde', NULL, NULL, '08123123123', 'nFV6Lwl7uUSjwVw23efTFS7TkOF1RDcc9FBU60o3i0Y0ZnAylSdy8mL7Uwlv', 0, '2019-03-06 02:22:32', '2019-03-06 02:22:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `finishing`
--

CREATE TABLE `finishing` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_bahan_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `finishing`
--

INSERT INTO `finishing` (`id`, `nama`, `jenis_bahan_id`, `created_at`, `updated_at`) VALUES
(1, 'Laminating', 1, NULL, NULL),
(2, 'Hecter', 1, NULL, NULL),
(3, 'Jilid Spiral', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_bahan`
--

CREATE TABLE `jenis_bahan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_service_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_bahan`
--

INSERT INTO `jenis_bahan` (`id`, `nama`, `created_at`, `updated_at`, `jenis_service_id`) VALUES
(1, 'HVS', NULL, NULL, 1),
(2, 'Book Paper', NULL, NULL, 1),
(3, 'Art Paper', NULL, NULL, 1),
(4, 'Roll Up Banner', NULL, NULL, 4),
(5, 'X Banner', NULL, NULL, 4),
(6, 'Mini X Banner', NULL, NULL, 4),
(7, 'Standing Banner', NULL, NULL, 4),
(8, 'Art Paper', NULL, NULL, 8),
(9, 'Art Cartoon', NULL, NULL, 8),
(10, 'Duplex', NULL, NULL, 8),
(11, 'HVS 80 Gr', NULL, NULL, 8),
(12, 'Backlit Korea', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9),
(13, 'Backlit China', NULL, NULL, 9),
(14, 'Frontlit Germany', NULL, NULL, 9),
(15, 'Frontlit China', NULL, NULL, 9),
(16, 'Frontlit Korea Matte', NULL, NULL, 9),
(17, 'Frontlit China Glossy', NULL, NULL, 9),
(18, 'Backlit Korea', NULL, NULL, 10),
(23, 'Backlit China', NULL, NULL, 10),
(25, 'Frontlit Germany', NULL, NULL, 10),
(26, 'Frontlit China', NULL, NULL, 10),
(27, 'Frontlit Korea Matte', NULL, NULL, 10),
(28, 'Frontlit China Glossy', NULL, NULL, 10),
(29, 'Crono', NULL, NULL, 12),
(30, 'Vinyl', NULL, NULL, 12),
(31, 'Transparan', NULL, NULL, 12),
(32, 'Oracal', NULL, NULL, 12),
(33, 'Scotlight', NULL, NULL, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_service`
--

CREATE TABLE `jenis_service` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_service`
--

INSERT INTO `jenis_service` (`id`, `service_id`, `nama`, `icon`, `created_at`, `updated_at`) VALUES
(1, 4, 'Kertas', NULL, NULL, NULL),
(2, 4, 'Sticker', NULL, NULL, NULL),
(3, 4, 'Vinyl', NULL, NULL, NULL),
(4, 1, 'Banner', NULL, NULL, NULL),
(5, 2, 'Bowl Lunch', NULL, NULL, NULL),
(6, 3, 'C', NULL, NULL, NULL),
(7, 5, 'E', NULL, NULL, NULL),
(8, 1, 'Flyer', NULL, NULL, NULL),
(9, 1, 'Spanduk', NULL, NULL, NULL),
(10, 1, 'Vinyl', NULL, NULL, NULL),
(11, 1, 'Poster', NULL, NULL, NULL),
(12, 1, 'Sticker', NULL, NULL, NULL),
(13, 1, 'Hangtag', NULL, NULL, NULL),
(14, 2, 'Lunch Box', NULL, NULL, NULL),
(15, 2, 'Dus Box', NULL, NULL, NULL),
(16, 2, 'Standing Pouch', NULL, NULL, NULL),
(17, 2, 'Plastik Inner', NULL, NULL, NULL),
(18, 2, 'Plastik Outer', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Bandung', NULL, NULL),
(2, 'Jakarta', NULL, NULL),
(3, 'Yogyakarta', NULL, NULL),
(4, 'Medan', NULL, NULL),
(5, 'Palembang', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id`, `nama`, `icon`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Go-Send', NULL, 50000, NULL, NULL),
(2, 'JNE', NULL, 100000, NULL, NULL),
(3, 'Tiki', NULL, 5000, NULL, NULL),
(4, 'Pos Indonesia', NULL, 80000, NULL, NULL),
(5, 'Angkot', NULL, 7000, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `methodbayar`
--

CREATE TABLE `methodbayar` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2019_02_18_185748_create_kertas_table', 1),
(189, '2019_02_16_172626_create_customers_table', 2),
(190, '2019_02_16_232606_create_vendors_table', 2),
(191, '2019_02_18_182302_create_service_table', 2),
(192, '2019_02_18_182536_create_jenis_service_table', 2),
(193, '2019_02_18_182936_create_kurir_table', 2),
(194, '2019_02_26_233733_create_jenis_bahan_table', 2),
(195, '2019_02_27_001551_create_methodbayar_table', 2),
(196, '2019_02_27_001606_create_bank_table', 2),
(197, '2019_02_27_013051_create_wishlist_table', 2),
(198, '2019_02_27_044126_create_ukuran_bahan_table', 2),
(199, '2019_02_27_174819_create_vendor_service_table', 2),
(200, '2019_02_27_233834_create_finishing_table', 2),
(201, '2019_02_28_064947_create_transaksi_table', 2),
(202, '2019_03_04_001612_create_pembayaran_table', 2),
(203, '2019_03_04_174851_create_rating_table', 2),
(204, '2019_03_04_175306_create_pesanan_table', 2),
(205, '2019_03_05_231023_create_kota_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(10) UNSIGNED NOT NULL,
  `trx_id` int(10) UNSIGNED NOT NULL,
  `methodbayar_id` int(10) UNSIGNED NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `max_bayar` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(10) UNSIGNED NOT NULL,
  `trx_id` int(10) UNSIGNED NOT NULL,
  `jenis_service_id` int(10) UNSIGNED NOT NULL,
  `jenis_bahan_id` int(11) DEFAULT NULL,
  `ukuran_bahan_id` int(11) DEFAULT NULL,
  `finishing` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `trx_id`, `jenis_service_id`, `jenis_bahan_id`, `ukuran_bahan_id`, `finishing`, `qty`, `harga`, `keterangan`, `document`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 50, 50000, NULL, NULL, 1, '2019-03-06 02:24:36', '2019-03-12 08:59:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `trx_id` int(10) UNSIGNED NOT NULL,
  `nilai` tinyint(4) NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`id`, `nama`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Promotion', NULL, NULL, NULL),
(2, 'Packaging', NULL, NULL, NULL),
(3, 'Merchandising', NULL, NULL, NULL),
(4, 'Document', NULL, NULL, NULL),
(5, 'Stationery', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `kurir_id` int(11) DEFAULT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `vendor_id`, `customer_id`, `kurir_id`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, NULL, 0, '2019-03-06 02:24:36', '2019-03-12 08:40:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran_bahan`
--

CREATE TABLE `ukuran_bahan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_bahan_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ukuran_bahan`
--

INSERT INTO `ukuran_bahan` (`id`, `nama`, `created_at`, `updated_at`, `jenis_bahan_id`) VALUES
(1, 'A1', NULL, NULL, 1),
(2, 'A2', NULL, NULL, 1),
(3, 'A3', NULL, NULL, 1),
(4, 'Per Meter', NULL, NULL, 29),
(5, 'Per Meter', NULL, NULL, 30),
(6, 'Per Meter', NULL, NULL, 31),
(7, 'Per Meter', NULL, NULL, 32),
(8, 'Per Meter', NULL, NULL, 33),
(9, 'Per Meter', NULL, NULL, 12),
(10, 'Per Meter', NULL, NULL, 13),
(11, 'Per Meter', NULL, NULL, 14),
(12, 'Per Meter', NULL, NULL, 15),
(13, 'Per Meter', NULL, NULL, 16),
(14, 'Per Meter', NULL, NULL, 17),
(15, 'Per Meter', NULL, NULL, 18),
(18, 'Per Meter', NULL, NULL, 23),
(19, 'Per Meter', NULL, NULL, 25),
(20, 'Per Meter', NULL, NULL, 26),
(21, 'Per Meter', NULL, NULL, 27),
(22, 'Per Meter', NULL, NULL, 28);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vendors`
--

INSERT INTO `vendors` (`id`, `username`, `nama`, `avatar`, `email`, `password`, `alamat`, `hp`, `api_token`, `kota`, `status`, `created_at`, `updated_at`) VALUES
(1, 'vendora', 'PT Vendor A', NULL, 'khairalvin@gmail.com', '$2y$10$WfQNVg.08mIF.TyW.GUZROE2nkpFuRbkpxG2mTmp88U0sam4BfiG.', 'Jl Ggagk', '08123123123', 'TOiddGsRUKDN0brv5S1qPfeTWxLQy9klbEGDNYY0QXxjz9VO3AcxxVsE4eQi', 1, 0, '2019-03-06 02:23:11', '2019-03-06 02:23:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor_service`
--

CREATE TABLE `vendor_service` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `jenis_service_id` int(10) UNSIGNED NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vendor_service`
--

INSERT INTO `vendor_service` (`id`, `vendor_id`, `jenis_service_id`, `harga`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 50000, NULL, '2019-03-06 02:23:11', '2019-03-06 02:23:11'),
(2, 1, 2, 10000, NULL, '2019-03-06 02:23:11', '2019-03-06 02:23:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_username_unique` (`username`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_hp_unique` (`hp`),
  ADD UNIQUE KEY `customers_api_token_unique` (`api_token`);

--
-- Indeks untuk tabel `finishing`
--
ALTER TABLE `finishing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `finishing_jenis_bahan_id_foreign` (`jenis_bahan_id`);

--
-- Indeks untuk tabel `jenis_bahan`
--
ALTER TABLE `jenis_bahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_bahan_jenis_service_id_foreign` (`jenis_service_id`);

--
-- Indeks untuk tabel `jenis_service`
--
ALTER TABLE `jenis_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_service_service_id_foreign` (`service_id`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `methodbayar`
--
ALTER TABLE `methodbayar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_trx_id_foreign` (`trx_id`),
  ADD KEY `pembayaran_methodbayar_id_foreign` (`methodbayar_id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_trx_id_foreign` (`trx_id`),
  ADD KEY `pesanan_jenis_service_id_foreign` (`jenis_service_id`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_trx_id_foreign` (`trx_id`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_vendor_id_foreign` (`vendor_id`),
  ADD KEY `transaksi_customer_id_foreign` (`customer_id`);

--
-- Indeks untuk tabel `ukuran_bahan`
--
ALTER TABLE `ukuran_bahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ukuran_bahan_jenis_bahan_id_foreign` (`jenis_bahan_id`);

--
-- Indeks untuk tabel `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_username_unique` (`username`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`),
  ADD UNIQUE KEY `vendors_hp_unique` (`hp`),
  ADD UNIQUE KEY `vendors_api_token_unique` (`api_token`);

--
-- Indeks untuk tabel `vendor_service`
--
ALTER TABLE `vendor_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_service_vendor_id_foreign` (`vendor_id`),
  ADD KEY `vendor_service_jenis_service_id_foreign` (`jenis_service_id`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `finishing`
--
ALTER TABLE `finishing`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_bahan`
--
ALTER TABLE `jenis_bahan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `jenis_service`
--
ALTER TABLE `jenis_service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `methodbayar`
--
ALTER TABLE `methodbayar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ukuran_bahan`
--
ALTER TABLE `ukuran_bahan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `vendor_service`
--
ALTER TABLE `vendor_service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `finishing`
--
ALTER TABLE `finishing`
  ADD CONSTRAINT `finishing_jenis_bahan_id_foreign` FOREIGN KEY (`jenis_bahan_id`) REFERENCES `jenis_bahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jenis_bahan`
--
ALTER TABLE `jenis_bahan`
  ADD CONSTRAINT `jenis_bahan_jenis_service_id_foreign` FOREIGN KEY (`jenis_service_id`) REFERENCES `jenis_service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jenis_service`
--
ALTER TABLE `jenis_service`
  ADD CONSTRAINT `jenis_service_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_methodbayar_id_foreign` FOREIGN KEY (`methodbayar_id`) REFERENCES `methodbayar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_trx_id_foreign` FOREIGN KEY (`trx_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_jenis_service_id_foreign` FOREIGN KEY (`jenis_service_id`) REFERENCES `jenis_service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_trx_id_foreign` FOREIGN KEY (`trx_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_trx_id_foreign` FOREIGN KEY (`trx_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ukuran_bahan`
--
ALTER TABLE `ukuran_bahan`
  ADD CONSTRAINT `ukuran_bahan_jenis_bahan_id_foreign` FOREIGN KEY (`jenis_bahan_id`) REFERENCES `jenis_bahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `vendor_service`
--
ALTER TABLE `vendor_service`
  ADD CONSTRAINT `vendor_service_jenis_service_id_foreign` FOREIGN KEY (`jenis_service_id`) REFERENCES `jenis_service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vendor_service_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
