-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table db_toko.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel db_toko.admin: ~2 rows (lebih kurang)
INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`, `level`) VALUES
	(10, 'faizul', 'faizul123', 'faizul@gmail.com', 'Admin'),
	(11, 'faizul2', 'faizul2', 'faizul2@gmail.com', 'Kasir');

-- membuang struktur untuk table db_toko.barang
DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` int NOT NULL DEFAULT '0',
  `jumlah_barang` varchar(1000) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel db_toko.barang: ~0 rows (lebih kurang)
INSERT INTO `barang` (`id_barang`, `nama_barang`, `kategori`, `harga`, `jumlah_barang`) VALUES
	(37, 'baso aci', 'makanan', 15000, '10'),
	(38, 'mendoan', 'makanan', 2500, '50'),
	(39, 'kopi', 'minuman', 4000, '20'),
	(40, 'es teh', 'minuman', 3000, '50');

-- membuang struktur untuk table db_toko.transaksi
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int NOT NULL AUTO_INCREMENT,
  `id_barang` int NOT NULL DEFAULT '0',
  `nama_barang` varchar(50) DEFAULT NULL,
  `jumlah` int NOT NULL,
  `total_pembayaran` decimal(10,2) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `tanggal_transaksi` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel db_toko.transaksi: ~94 rows (lebih kurang)
INSERT INTO `transaksi` (`id_transaksi`, `id_barang`, `nama_barang`, `jumlah`, `total_pembayaran`, `metode_pembayaran`, `tanggal_transaksi`) VALUES
	(27, 37, 'baso aci', 3, 45000.00, 'Tunai', '2024-06-11 15:01:29'),
	(28, 38, 'mendoan', 5, 12500.00, 'Tunai', '2024-06-11 15:01:29'),
	(29, 39, 'kopi', 2, 8000.00, 'Tunai', '2024-06-11 15:01:29'),
	(30, 37, 'baso aci', 3, 45000.00, 'QRIS', '2024-06-11 15:04:09'),
	(31, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-11 15:04:09'),
	(32, 39, 'kopi', 2, 8000.00, 'QRIS', '2024-06-11 15:04:09'),
	(33, 37, 'baso aci', 3, 45000.00, 'QRIS', '2024-06-11 15:10:19'),
	(34, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-11 15:10:19'),
	(35, 39, 'kopi', 2, 8000.00, 'QRIS', '2024-06-11 15:10:19'),
	(36, 37, 'baso aci', 3, 45000.00, 'QRIS', '2024-06-11 15:12:00'),
	(37, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-11 15:12:00'),
	(38, 39, 'kopi', 2, 8000.00, 'QRIS', '2024-06-11 15:12:00'),
	(39, 37, 'baso aci', 3, 45000.00, 'QRIS', '2024-06-11 15:12:17'),
	(40, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-11 15:12:17'),
	(41, 39, 'kopi', 2, 8000.00, 'QRIS', '2024-06-11 15:12:17'),
	(42, 37, 'baso aci', 3, 45000.00, 'QRIS', '2024-06-11 15:12:19'),
	(43, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-11 15:12:19'),
	(44, 39, 'kopi', 2, 8000.00, 'QRIS', '2024-06-11 15:12:19'),
	(45, 37, 'baso aci', 3, 45000.00, 'QRIS', '2024-06-11 15:13:44'),
	(46, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-11 15:13:44'),
	(47, 39, 'kopi', 2, 8000.00, 'QRIS', '2024-06-11 15:13:44'),
	(48, 37, 'baso aci', 3, 45000.00, 'QRIS', '2024-06-11 15:14:33'),
	(49, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-11 15:14:33'),
	(50, 39, 'kopi', 2, 8000.00, 'QRIS', '2024-06-11 15:14:33'),
	(51, 37, 'baso aci', 3, 45000.00, 'QRIS', '2024-06-11 15:16:19'),
	(52, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-11 15:16:19'),
	(53, 39, 'kopi', 2, 8000.00, 'QRIS', '2024-06-11 15:16:19'),
	(54, 37, 'baso aci', 2, 30000.00, 'QRIS', '2024-06-13 00:28:03'),
	(55, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-13 00:28:03'),
	(56, 39, 'kopi', 1, 4000.00, 'QRIS', '2024-06-13 00:28:03'),
	(57, 37, 'baso aci', 2, 30000.00, 'QRIS', '2024-06-15 02:07:23'),
	(58, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-15 02:07:23'),
	(59, 39, 'kopi', 1, 4000.00, 'QRIS', '2024-06-15 02:07:23'),
	(60, 40, 'es teh', 4, 12000.00, 'QRIS', '2024-06-15 02:07:23'),
	(61, 37, 'baso aci', 4, 60000.00, 'QRIS', '2024-06-15 02:13:31'),
	(62, 38, 'mendoan', 10, 25000.00, 'QRIS', '2024-06-15 02:13:31'),
	(63, 39, 'kopi', 1, 4000.00, 'QRIS', '2024-06-15 02:13:31'),
	(64, 40, 'es teh', 4, 12000.00, 'QRIS', '2024-06-15 02:13:31'),
	(65, 37, 'baso aci', 4, 60000.00, 'QRIS', '2024-06-15 02:16:05'),
	(66, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-15 02:16:05'),
	(67, 39, 'kopi', 1, 4000.00, 'QRIS', '2024-06-15 02:16:05'),
	(68, 40, 'es teh', 4, 12000.00, 'QRIS', '2024-06-15 02:16:05'),
	(69, 37, 'baso aci', 4, 60000.00, 'QRIS', '2024-06-15 02:16:08'),
	(70, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-15 02:16:08'),
	(71, 39, 'kopi', 1, 4000.00, 'QRIS', '2024-06-15 02:16:08'),
	(72, 40, 'es teh', 4, 12000.00, 'QRIS', '2024-06-15 02:16:08'),
	(73, 37, 'baso aci', 4, 60000.00, 'QRIS', '2024-06-15 02:17:24'),
	(74, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-15 02:17:24'),
	(75, 39, 'kopi', 1, 4000.00, 'QRIS', '2024-06-15 02:17:24'),
	(76, 40, 'es teh', 4, 12000.00, 'QRIS', '2024-06-15 02:17:24'),
	(77, 37, 'baso aci', 4, 60000.00, 'QRIS', '2024-06-15 02:24:52'),
	(78, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-15 02:24:52'),
	(79, 39, 'kopi', 1, 4000.00, 'QRIS', '2024-06-15 02:24:52'),
	(80, 40, 'es teh', 4, 12000.00, 'QRIS', '2024-06-15 02:24:52'),
	(81, 37, 'baso aci', 4, 60000.00, 'QRIS', '2024-06-15 02:25:53'),
	(82, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-15 02:25:53'),
	(83, 39, 'kopi', 1, 4000.00, 'QRIS', '2024-06-15 02:25:53'),
	(84, 40, 'es teh', 4, 12000.00, 'QRIS', '2024-06-15 02:25:53'),
	(85, 37, 'baso aci', 4, 60000.00, 'QRIS', '2024-06-15 02:26:05'),
	(86, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-15 02:26:05'),
	(87, 39, 'kopi', 1, 4000.00, 'QRIS', '2024-06-15 02:26:05'),
	(88, 40, 'es teh', 4, 12000.00, 'QRIS', '2024-06-15 02:26:05'),
	(89, 37, 'baso aci', 4, 60000.00, 'QRIS', '2024-06-15 02:27:19'),
	(90, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-15 02:27:19'),
	(91, 39, 'kopi', 1, 4000.00, 'QRIS', '2024-06-15 02:27:19'),
	(92, 40, 'es teh', 4, 12000.00, 'QRIS', '2024-06-15 02:27:19'),
	(93, 37, 'baso aci', 4, 60000.00, 'QRIS', '2024-06-15 02:27:41'),
	(94, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-15 02:27:41'),
	(95, 39, 'kopi', 1, 4000.00, 'QRIS', '2024-06-15 02:27:41'),
	(96, 40, 'es teh', 4, 12000.00, 'QRIS', '2024-06-15 02:27:41'),
	(97, 37, 'baso aci', 4, 60000.00, 'QRIS', '2024-06-15 02:30:41'),
	(98, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-15 02:30:41'),
	(99, 39, 'kopi', 1, 4000.00, 'QRIS', '2024-06-15 02:30:41'),
	(100, 40, 'es teh', 4, 12000.00, 'QRIS', '2024-06-15 02:30:41'),
	(101, 37, 'baso aci', 4, 60000.00, 'QRIS', '2024-06-15 02:30:59'),
	(102, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-15 02:30:59'),
	(103, 39, 'kopi', 1, 4000.00, 'QRIS', '2024-06-15 02:30:59'),
	(104, 40, 'es teh', 4, 12000.00, 'QRIS', '2024-06-15 02:30:59'),
	(105, 37, 'baso aci', 4, 60000.00, 'QRIS', '2024-06-15 02:35:33'),
	(106, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-15 02:35:33'),
	(107, 39, 'kopi', 1, 4000.00, 'QRIS', '2024-06-15 02:35:33'),
	(108, 40, 'es teh', 4, 12000.00, 'QRIS', '2024-06-15 02:35:33'),
	(109, 37, 'baso aci', 4, 60000.00, 'QRIS', '2024-06-15 02:35:52'),
	(110, 38, 'mendoan', 5, 12500.00, 'QRIS', '2024-06-15 02:35:52'),
	(111, 39, 'kopi', 1, 4000.00, 'QRIS', '2024-06-15 02:35:52'),
	(112, 40, 'es teh', 4, 12000.00, 'QRIS', '2024-06-15 02:35:52'),
	(113, 37, 'baso aci', 1, 15000.00, 'Tunai', '2024-06-15 02:36:26'),
	(114, 38, 'mendoan', 3, 7500.00, 'Tunai', '2024-06-15 02:36:26'),
	(115, 39, 'kopi', 1, 4000.00, 'Tunai', '2024-06-15 02:36:26'),
	(116, 40, 'es teh', 1, 3000.00, 'Tunai', '2024-06-15 02:36:26'),
	(117, 37, 'baso aci', 1, 15000.00, 'QRIS', '2024-06-15 02:36:35'),
	(118, 38, 'mendoan', 3, 7500.00, 'QRIS', '2024-06-15 02:36:35'),
	(119, 39, 'kopi', 1, 4000.00, 'QRIS', '2024-06-15 02:36:35'),
	(120, 40, 'es teh', 1, 3000.00, 'QRIS', '2024-06-15 02:36:35');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
