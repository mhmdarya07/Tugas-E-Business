-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2025 pada 08.08
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bukawarung`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '+6281912706965', 'sejeong0701@gmail.com', 'Binjai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(13, 'Smartphone'),
(14, 'Laptop');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_stock` int(11) NOT NULL DEFAULT 0,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_stock`, `product_description`, `product_image`, `product_status`, `data_created`) VALUES
(26, 13, 'iPhone 16 Plus', 16999000, 0, '<p>Layar besar 6.7 inci, baterai tahan lama, cocok untuk hiburan<br />\r\ndan produktivitas</p>\r\n', 'produk1766543938.jpeg', 1, '2025-12-24 02:38:58'),
(27, 13, 'iPhone 15 Pro', 19999000, 0, '<p>Versi lebih kecil dari ProMax, tetap dengan performa tinggi<br />\r\ndan build premium</p>\r\n', 'produk1766544077.jpeg', 1, '2025-12-24 02:41:17'),
(28, 13, 'Samsung Galaxy S25 Ultra', 25999000, 100, '<p>Flagship premium dengan layar Dynamic AMOLED&nbsp;<br />\r\n2x 6.8 inci, kamera utama 200 MP, chip exznos 2500, baterai 5000<br />\r\nmAh, dan fitur S-Pen. Cocok untuk Profesionak dan kreator konten</p>\r\n', 'produk1766544130.jpeg', 1, '2025-12-24 02:42:10'),
(29, 13, 'Samsung Galaxy Z Fold 7', 28499000, 10, '<p>Smartphone lipat dengan layar utama 7.6 inci AMOLED 120 Hz<br />\r\ndan layar cover 6.2 inci. cocok untuk multitasking, produktivitas,<br />\r\ndan hiburan premium</p>\r\n', 'produk1766544227.jpeg', 1, '2025-12-24 02:43:47'),
(34, 13, 'iPhone 17 Pro Max', 28999000, 5, '<p>Flahship terbaru dengan ship A19 Bionic, kamera 48MP<br />\r\nProMotion, layar 6,7 inci 120 Hz, desain titanium, dan fitur AI<br />\r\nkamera canggih. Cocok untuk Pengguna yang ingin memiliki<br />\r\nsmartphone dengan performa maksimal</p>\r\n', 'produk1766562880.jpg', 1, '2025-12-24 07:54:40'),
(35, 14, 'Apple MacBook Air (M4, 2025)', 17999000, 100, '<p>Menggunakan chip M4 terbaru dengan NPU kuat untuk Apple Intelligence.&nbsp;<br />\r\nDesain tanpa kipas (silent) dan baterai tahan hingga 22 jam.</p>\r\n', 'produk1766566403.jpg', 1, '2025-12-24 08:53:23'),
(36, 13, 'Samsung Galaxy S25 Edge', 22499000, 100, '<p>Varian baru dengan layar melengkung 6.7 inci, chip Exynos 2400<br />\r\nkamera 50 MP + 12 MP ultra wide + 10 MP telephoto. Desain&nbsp;<br />\r\nelegan dengan build premium</p>\r\n', 'produk1766579812.jpeg', 1, '2025-12-24 12:36:52'),
(37, 13, 'Xiaomi 15 Ultra', 16999000, 20, '<p>Flagship premium dengan kamera Leica 200 MP, layar AMOLED<br />\r\n6.73 inci 120Hz, chip snapdragon 8 Gen 4, baterai 5.000 mAh dengan<br />\r\nfast charging 120W. Cocok untuk fotografer dan pengguna profesional</p>\r\n', 'produk1766580036.jpeg', 1, '2025-12-24 12:40:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_telp` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `nama_user`, `username`, `password`, `user_telp`, `user_email`, `user_address`) VALUES
(1, 'Pharita', 'vtra', '0192023a7bbd73250516f069df18b500', '0849184', 'kpps1207232007-0103@pilkada2024.com', 'Binjai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
