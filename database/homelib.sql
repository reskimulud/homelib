-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 11:47 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homelib`
--

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `target` varchar(5) NOT NULL,
  `title` varchar(125) NOT NULL,
  `icon` varchar(125) NOT NULL,
  `body` varchar(125) NOT NULL,
  `href` varchar(125) NOT NULL,
  `is_seen` int(11) NOT NULL,
  `date_created` bigint(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `target`, `title`, `icon`, `body`, `href`, `is_seen`, `date_created`) VALUES
(3, 'admin', 'Permintaan konfirmasi pembayaran', 'http://localhost/homelib/favicon.ico', 'Administrator Homelib telah membuat permintaan untuk mengonfirmasi pesanan #22012111Y1BOTP', 'transaksi/konfirmasi', 1, 1611329410),
(4, 'admin', 'Permintaan konfirmasi pembayaran', 'http://localhost/homelib/favicon.ico', 'Administrator Homelib telah membuat permintaan untuk mengonfirmasi pesanan #22012111Q0AIY3', 'transaksi/konfirmasi', 1, 1611377026),
(5, 'admin', '#23012114SPE2K9 | Pesanan Baru Dibuat oleh User', 'http://localhost/homelib/favicon.ico', 'Administrator Homelib telah membuat pesanan dengan total harga sebesar Rp. 372.000', 'transaksi', 1, 1611380896),
(6, 'admin', 'Permintaan konfirmasi pembayaran', 'http://localhost/homelib/favicon.ico', 'Administrator Homelib telah membuat permintaan untuk mengonfirmasi pesanan #23012114SPE2K9', 'transaksi/konfirmasi', 1, 1611389578),
(7, '1', 'Pesanan sedang diproses', 'http://localhost/homelib/favicon.ico', 'Permintaan anda untuk pesanan #23012114SPE2K9 telah dikonfirmasi dan sedang diproses', 'user/notification', 1, 1611389632),
(8, 'admin', '#23012113EDSPLC | Pesanan Baru Dibuat oleh User', 'http://localhost/homelib/favicon.ico', 'Administrator Homelib telah membuat pesanan dengan total harga sebesar Rp. 149.000', 'transaksi', 1, 1611398129),
(9, 'admin', '#2401211416L0SX | Pesanan Baru Dibuat oleh User', 'http://localhost/homelib/favicon.ico', 'Administrator Homelib telah membuat pesanan dengan total harga sebesar Rp. 435.000', 'transaksi', 1, 1611463448),
(10, 'admin', '#24012111JLF4QI | Pesanan Baru Dibuat oleh User', 'http://localhost/homelib/favicon.ico', 'Administrator Homelib telah membuat pesanan dengan total harga sebesar Rp. 149.000', 'transaksi', 1, 1611466870),
(11, 'admin', '#24012111R7X15F | Pesanan Baru Dibuat oleh User', 'http://localhost/homelib/favicon.ico', 'Administrator Homelib telah membuat pesanan dengan total harga sebesar Rp. 300.000', 'transaksi', 1, 1611467268),
(12, 'admin', '#2401211171G6UF | Pesanan Baru Dibuat oleh User', 'http://localhost/homelib/favicon.ico', 'Administrator Homelib telah membuat pesanan dengan total harga sebesar Rp. 736.000', 'transaksi', 1, 1611476423),
(13, 'admin', '#2401211413FOLR | Pesanan Baru Dibuat oleh User', 'http://localhost/homelib/favicon.ico', 'Administrator Homelib telah membuat pesanan dengan total harga sebesar Rp. 885.000', 'transaksi', 1, 1611476727),
(14, 'admin', 'Permintaan konfirmasi pembayaran', 'http://localhost/homelib/favicon.ico', 'Administrator Homelib telah membuat permintaan untuk mengonfirmasi pesanan #2401211413FOLR', 'transaksi/konfirmasi', 1, 1611477280),
(15, '1', 'Pesanan sedang diproses', 'http://localhost/homelib/favicon.ico', 'Permintaan anda untuk pesanan #2401211413FOLR telah dikonfirmasi dan sedang diproses', 'user/notification', 1, 1611477307),
(16, 'admin', '#2401212435SNCX | Pesanan Baru Dibuat oleh User', 'http://localhost/homelib/favicon.ico', 'Reski Mulud Muchamad telah membuat pesanan dengan total harga sebesar Rp. 518.000', 'transaksi', 1, 1611480924),
(17, 'admin', '#24012111Q9IKAR | Pesanan Baru Dibuat oleh User', 'http://localhost/homelib/favicon.ico', 'Administrator Homelib telah membuat pesanan dengan total harga sebesar Rp. 145.000', 'transaksi', 0, 1611481268),
(18, 'admin', '#24012111PVZODR | Pesanan Baru Dibuat oleh User', 'http://localhost/homelib/favicon.ico', 'Administrator Homelib telah membuat pesanan dengan total harga sebesar Rp. 145.000', 'transaksi', 0, 1611483951),
(19, 'admin', 'Permintaan konfirmasi pembayaran', 'http://localhost/homelib/favicon.ico', 'Administrator Homelib telah membuat permintaan untuk mengonfirmasi pesanan #2401211171G6UF', 'transaksi/konfirmasi', 1, 1611484399),
(20, '1', 'Pesanan sedang diproses', 'http://localhost/homelib/favicon.ico', 'Permintaan anda untuk pesanan #2401211171G6UF telah dikonfirmasi dan sedang diproses', 'user/notification', 0, 1611484416);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(125) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `thumb` varchar(125) NOT NULL DEFAULT 'no_thumb.jpg',
  `date_added` int(32) NOT NULL,
  `added_by` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` bigint(128) NOT NULL,
  `weight` int(32) NOT NULL,
  `color` varchar(6) NOT NULL,
  `sold` int(11) NOT NULL DEFAULT 0,
  `add_to_cart` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `product_desc`, `thumb`, `date_added`, `added_by`, `category_id`, `price`, `weight`, `color`, `sold`, `add_to_cart`) VALUES
(1, 'The Magic Of Adobe Illustrator', 'Buku The Magic Of Adobe Illustrator', 'Reseweb-The_Magic_Of_Adobe_Illustrator-01.png', 1609402255, 1, 1, 280000, 900, 'FF4A2E', 0, 0),
(2, 'Aplikasi Arduino dan Sensor', 'Buku Aplikasi Arduino dan Sensor ini asdja;alsjf asfasflashlakshf \'poa\'aisfa\'iqghqq oasfiqy\'pqfhafpo', 'Reseweb-Aplikasi_Arduino_dan_Sensor-01.png', 1610386560, 1, 1, 135000, 750, 'F88129', 0, 0),
(4, 'Ruby Untuk Aplikasi Dekstop dan Web', 'Buku Ruby Untuk Aplikasi Dekstop dan Web', 'Reseweb-Ruby_Untuk_Aplikasi_Dekstop_dan_Web-01.png', 1609910452, 1, 1, 109000, 800, 'EB9100', 0, 0),
(5, 'The Magic Of CorelDraw 60 Total Tutorial Edisi Revisi ke 3', 'Buku The Magic Of CorelDraw 60 Total Tutorial Edisi Revisi ke 3', 'Reseweb-The_Magic_Of_CorelDraw_60_Total_Tutorial_Edisi_Revisi_ke_3-01.png', 1609910509, 1, 1, 208000, 800, '00ABD6', 1, 0),
(6, 'Mudah Belajar Visual Basic.Net Disertai Lebih dari 300 Contoh Program +CD', 'Buku Mudah Belajar Visual Basic.Net Disertai Lebih dari 300 Contoh Program +CD', 'Reseweb-Mudah_Belajar_Visual_Basic_Net_Disertai_Lebih_dari_300_Contoh_Program_+CD-01.png', 1609910900, 1, 1, 176000, 890, '1988C8', 0, 0),
(7, 'Deep learning Modernisasi Machine Learning Untuk Big Data', 'Buku Deep learning Modernisasi Machine Learning Untuk Big Data cocok bagi anda yang ingin belajar tentang deep learning', 'Reseweb-Deep_learning_Modernisasi_Machine_Learning_Untuk_Big_Data-01.png', 1609911020, 1, 1, 83000, 600, '1EA59A', 0, 0),
(8, 'Graphic Design', 'Buku pembelajaran dalam graphic design', 'Reseweb-Computer_Graphic_Design_Revisi_ke_3-01.png', 1609911082, 1, 1, 208000, 1100, '007BFF', 1, 0),
(10, 'Algoritma Pemrograman Menggunakan Bahasa Pascal dan C++', 'Buku Algoritma dan Pemrograman dalam Bahasa Pascal, C, dan C++ merupakan edisi baru dari buku sebelumnya, yaitu Algoritma dan Pemrograman dalam Bahasa Pascal dan C. Buku ini disusun bagi siapapun (siswa, mahasiswa, umum) yang ingin mempelajari bidang pemr', 'Reseweb-Algoritma_dan_Pemrograman_dalam_Bahasa_Pascal_C_dan_C++-01.png', 1610386764, 1, 1, 135000, 700, '91F804', 2, 1),
(11, 'Aplikasi Smart Report +DVD', 'Buku Aplikasi Smart Report +DVD', 'Reseweb-Aplikasi_Smart_Report_+DVD-01.png', 1610710919, 1, 1, 145000, 800, '701034', 1, 0),
(12, 'Seni Interaksi Rasulullah', 'Buku Seni Interaksi Rasulullah', 'photo_2021-01-08_19-45-51.jpg', 1611397848, 1, 2, 139000, 1000, '856DE4', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `category` varchar(125) NOT NULL,
  `date_added` bigint(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `category`, `date_added`) VALUES
(1, 'Buku IT (Buku tentang Informatika)', 1611055908),
(2, 'Buku Islami', 1611056004);

-- --------------------------------------------------------

--
-- Table structure for table `product_payment_method`
--

CREATE TABLE `product_payment_method` (
  `id` int(11) NOT NULL,
  `method` varchar(125) NOT NULL,
  `number` varchar(32) NOT NULL,
  `account_holder` varchar(125) NOT NULL,
  `icon` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_payment_method`
--

INSERT INTO `product_payment_method` (`id`, `method`, `number`, `account_holder`, `icon`) VALUES
(1, 'Transfer Bank BRI', '441001019889539', 'Reski Mulud Muchamad', '1024px-Logo_Bank_Rakyat_Indonesia_svg.png'),
(3, 'Transfer OVO', '082125116279', 'Reski Mulud Muchamad', 'logo-ovo.png'),
(4, 'Transfer Bank BCA', '03080770989', 'Reski Mulud Muchamad', 'BCA_logo_Bank_Central_Asia.png');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `transaction_number` varchar(17) NOT NULL,
  `product` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` int(32) NOT NULL,
  `status` int(11) NOT NULL,
  `shipping_address` varchar(225) NOT NULL,
  `method_id` int(11) NOT NULL,
  `total_fee` bigint(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `transaction_number`, `product`, `user_id`, `date_created`, `status`, `shipping_address`, `method_id`, `total_fee`) VALUES
(1, '190121112GC68W', '[{\"product_id\":10,\"qty\":2}]', 1, 1611052228, 0, '\r\n                                        Kp. Selajambu RT 04/01KebonpedesKabupaten Sukabumi,\r\n                                            Jawa Barat43194                                    ', 1, 290000),
(2, '19012113F2Z1WK', '[{\"product_id\":10,\"qty\":1}]', 1, 1611057446, 0, '\r\n                                        Kp. Selajambu RT 04/01KebonpedesKabupaten Sukabumi,\r\n                                            Jawa Barat43194                                    ', 3, 145000),
(3, '190121142OBWE0', '[{\"product_id\":2,\"qty\":1}]', 1, 1611057567, 0, '\r\n                                        Kp. Selajambu RT 04/01KebonpedesKabupaten Sukabumi,\r\n                                            Jawa Barat43194                                    ', 4, 145000),
(4, '20012111PMNYA4', '[{\"product_id\":5,\"qty\":1}]', 1, 1611113730, 0, '\r\n                                        Kp. Selajambu RT 04/01KebonpedesKabupaten Sukabumi,\r\n                                            Jawa Barat43194                                    ', 1, 218000),
(5, '200121139MQI4D', '[{\"product_id\":8,\"qty\":2}]', 1, 1611125375, 0, '\r\n                                        Kp. Selajambu RT 04/01KebonpedesKabupaten Sukabumi,\r\n                                            Jawa Barat43194                                    ', 3, 436000),
(6, '20012121UAHM8O', '[{\"product_id\":10,\"qty\":2}]', 2, 1611155052, 0, '\r\n                                        Kp. Selajambu RT 04/01KebonpedesKabupaten Sukabumi,\r\n                                            Jawa Barat43194                                    ', 1, 290000),
(7, '200121133VRZCM0', '[{\"product_id\":2,\"qty\":1}]', 13, 1611161327, 0, '\r\n                                        Kp. Rawa belut Kelurahan LimusnunggalCibeureumKota Sukabumi,\r\n                                            Jawa Barat43116                                    ', 3, 145000),
(8, '22012111Q0AIY3', '[{\"product_id\":11,\"qty\":1}]', 1, 1611312620, 0, '\r\n                                        Kp. Selajambu RT 04/01KebonpedesKabupaten Sukabumi,\r\n                                            Jawa Barat43194                                    ', 1, 155000),
(9, '22012111Y1BOTP', '[{\"product_id\":4,\"qty\":1}]', 1, 1611324947, 0, '\r\n                                        Kp. Selajambu RT 04/01KebonpedesKabupaten Sukabumi,\r\n                                            Jawa Barat43194                                    ', 1, 119000),
(10, '23012114SPE2K9', '[{\"product_id\":6,\"qty\":2}]', 1, 1611380896, 0, '\r\n                                        Kp. Selajambu RT 04/01KebonpedesKabupaten Sukabumi,\r\n                                            Jawa Barat43194                                    ', 4, 372000),
(11, '23012113EDSPLC', '[{\"product_id\":12,\"qty\":1}]', 1, 1611398128, 0, '\r\n                                        Kp. Selajambu RT 04/01KebonpedesKabupaten Sukabumi,\r\n                                            Jawa Barat43194                                    ', 3, 149000),
(12, '2401211416L0SX', '[{\"product_id\":\"11\",\"qty\":\"1\"},{\"product_id\":\"10\",\"qty\":\"2\"}]', 1, 1611463447, 1, '\r\n                                        Kp. Selajambu RT 04/01KebonpedesKabupaten Sukabumi,\r\n                                            Jawa Barat43194                                    ', 4, 435000),
(13, '24012111JLF4QI', '[{\"product_id\":12,\"qty\":1}]', 1, 1611466870, 1, '\r\n                                        Kp. Selajambu RT 04/01KebonpedesKabupaten Sukabumi,\r\n                                            Jawa Barat43194                                    ', 1, 149000),
(14, '24012111R7X15F', '[{\"product_id\":\"10\",\"qty\":\"1\"},{\"product_id\":\"11\",\"qty\":\"1\"}]', 1, 1611467268, 1, '\r\n                                        Kp. Selajambu RT 04/01KebonpedesKabupaten Sukabumi,\r\n                                            Jawa Barat43194                                    ', 1, 300000),
(15, '2401211171G6UF', '[{\"product_id\":\"10\",\"qty\":\"1\"},{\"product_id\":\"11\",\"qty\":\"1\"},{\"product_id\":\"8\",\"qty\":\"1\"},{\"product_id\":\"5\",\"qty\":\"1\"}]', 1, 1611476423, 2, '\r\n                                        Kp. Selajambu RT 04/01KebonpedesKabupaten Sukabumi,\r\n                                            Jawa Barat43194                                    ', 1, 736000),
(16, '2401211413FOLR', '[{\"product_id\":\"10\",\"qty\":\"1\"},{\"product_id\":\"11\",\"qty\":\"1\"},{\"product_id\":\"8\",\"qty\":\"1\"},{\"product_id\":\"5\",\"qty\":\"1\"},{\"product_id\":\"12\",\"qty\":\"1\"}]', 1, 1611476727, 2, '\r\n                                        Kp. Selajambu RT 04/01KebonpedesKabupaten Sukabumi,\r\n                                            Jawa Barat43194                                    ', 4, 885000),
(17, '2401212435SNCX', '[{\"product_id\":\"11\",\"qty\":\"1\"},{\"product_id\":\"10\",\"qty\":\"1\"},{\"product_id\":\"8\",\"qty\":\"1\"}]', 2, 1611480924, 1, '\r\n                                        Kp. Selajambu RT 04/01KebonpedesKabupaten Sukabumi,\r\n                                            Jawa Barat43194                                    ', 4, 518000),
(18, '24012111Q9IKAR', '[{\"product_id\":\"10\",\"qty\":\"1\"}]', 1, 1611481268, 1, '\r\n                                        Kp. Selajambu RT 04/01KebonpedesKabupaten Sukabumi,\r\n                                            Jawa Barat43194                                    ', 1, 145000),
(19, '24012111PVZODR', '[{\"product_id\":10,\"qty\":1}]', 1, 1611483951, 1, '\r\n                                        Kp. Selajambu RT 04/01KebonpedesKabupaten Sukabumi,\r\n                                            Jawa Barat43194                                    ', 1, 145000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_confirm`
--

CREATE TABLE `transaction_confirm` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `transaction_number` varchar(32) NOT NULL,
  `proof_image` varchar(125) NOT NULL,
  `date_created` bigint(32) NOT NULL,
  `is_confirmed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_confirm`
--

INSERT INTO `transaction_confirm` (`id`, `transaction_id`, `transaction_number`, `proof_image`, `date_created`, `is_confirmed`) VALUES
(1, 4, '20012111PMNYA4', '20190424_171519.jpg', 1611121465, 1),
(2, 5, '200121139MQI4D', 'IMG20201226012702.jpg', 1611128390, 1),
(3, 6, '20012121UAHM8O', 'photo_2021-01-08_19-45-51.jpg', 1611155892, 1),
(4, 9, '22012111Y1BOTP', 'f079bf5a-dcf6-4bf1-ab36-70c7348db12a.jpg', 1611329409, 1),
(5, 8, '22012111Q0AIY3', 'table.PNG', 1611377026, 1),
(6, 10, '23012114SPE2K9', 'cari.PNG', 1611389578, 1),
(7, 16, '2401211413FOLR', 'photo_2021-01-08_19-46-02.jpg', 1611477280, 1),
(8, 15, '2401211171G6UF', 'photo_2021-01-08_19-46-021.jpg', 1611484399, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_invoice`
--

CREATE TABLE `transaction_invoice` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(32) NOT NULL,
  `order_by` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_invoice`
--

INSERT INTO `transaction_invoice` (`id`, `invoice_number`, `order_by`, `date_created`, `transaction_id`) VALUES
(1, 'INV20012111PMNYA4', 1, 1611127240, 4),
(2, 'INV200121139MQI4D', 1, 1611128443, 5),
(3, 'INV20012121UAHM8O', 2, 1611156163, 6),
(4, 'INV22012111Y1BOTP', 1, 1611371042, 9),
(5, 'INV22012111Q0AIY3', 1, 1611377151, 8),
(6, 'INV23012114SPE2K9', 1, 1611389632, 10),
(7, 'INV2401211413FOLR', 1, 1611477307, 16),
(8, 'INV2401211171G6UF', 1, 1611484416, 15);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_status`
--

CREATE TABLE `transaction_status` (
  `id` int(11) NOT NULL,
  `status` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_status`
--

INSERT INTO `transaction_status` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(125) NOT NULL,
  `name` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `role_id` int(11) NOT NULL,
  `password` varchar(125) NOT NULL,
  `address_id` int(11) NOT NULL,
  `image` varchar(125) NOT NULL DEFAULT 'default.jpg',
  `profession` varchar(125) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_registered` int(32) NOT NULL,
  `phone` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `email`, `role_id`, `password`, `address_id`, `image`, `profession`, `is_active`, `date_registered`, `phone`) VALUES
(1, 'admin', 'Administrator Homelib', 'admin@homelib.com', 1, '$2y$10$uZwqpysvGJSTGSF/Pp589ee1eh8w.fVeG5S2gCXawfXcYGrZ7MR9y', 2, '1611375081.png', 'Web Developer', 1, 1608000698, 82125116279),
(2, 'reskimulud', 'Reski Mulud Muchamad', 'reski@gmail.com', 2, '$2y$10$ku8Hz4SK8ePVtW81wZejuuP9Hv.m0HPeJshJGcyM.qfOPoELBkleW', 1, '1610443956.png', '', 1, 1608031653, 0),
(3, 'mankart', 'Mank Art', 'mangyoyoy01@gmail.com', 2, '$2y$10$y8AyRC82E6QVveJe1mFuV.T5H7z50v2h72o7ao1CVuAxXZL26Lv/G', 0, '1609333582.png', '', 1, 1609333399, 0),
(4, 'reskimulud_', 'Sebagai Contoh', 'contoh@contoh.com', 2, '$2y$10$Ck7x51QD3KemlJJ5QYSO9uK.1uw8cLrv0njoZNCwDKLQumy4Yki/i', 0, 'default.jpg', '', 1, 1609480819, 0),
(5, '1930511053', 'Muhammad Drajat', 'drajatdani1892@gmail.com', 1, '$2y$10$rmgxgZVTfLMKrinhmNhcI.UGM.FJox.FXHKu.A/7Bz4T4HjI55.E2', 0, 'default.jpg', '', 1, 1609728843, 0),
(6, 'Ikram', 'Ikram Maulana', 'ikram_maulana@onedrive.web.id', 3, '$2y$10$U81L0J8SmG5SogoxobNUX.U7YQGwFLWJZHb4B6nU9dDlvvywHkCDu', 0, 'default.jpg', '', 1, 1610377657, 0),
(10, 'contoh', 'Hanya Contoh', 'contoh@contoh1.com', 2, '$2y$10$08Lx9AdRbS/GWCrYpyUEYOLkhG6l0DuzLuitGfTyaYSdU9pFoRfVS', 0, 'default.jpg', '', 1, 1610866276, 0),
(13, 'hanipah', 'Hanipah', 'hanipah@gmail.com', 2, '$2y$10$QhSZPh/Bz5KJT2I0.lM38eIOSTyojYNGyv9JjDVgLnY9aQdNp9nr2', 5, 'default.jpg', '', 1, 1611160608, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `menu_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(4, 3, 1),
(5, 4, 1),
(8, 2, 3),
(9, 4, 3),
(12, 6, 1),
(14, 11, 1),
(17, 13, 1),
(18, 13, 2),
(19, 13, 3),
(20, 14, 1),
(21, 14, 2),
(22, 14, 3),
(23, 15, 1),
(24, 15, 2),
(25, 15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `receiver` varchar(125) NOT NULL,
  `address` varchar(125) NOT NULL,
  `city_id` int(11) NOT NULL,
  `city_name` varchar(125) NOT NULL,
  `sub_districts` varchar(125) NOT NULL,
  `postal` int(11) NOT NULL,
  `phone` bigint(32) NOT NULL,
  `option_address` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `receiver`, `address`, `city_id`, `city_name`, `sub_districts`, `postal`, `phone`, `option_address`) VALUES
(1, 2, 'Reski Mulud Muchamad', 'Kp. Selajambu RT 04/01', 430, 'Kabupaten Sukabumi,\r\n                                            Jawa Barat', 'Kebonpedes', 43194, 85157705184, ''),
(2, 1, 'Reski Mulud Muchamad', 'Kp. Selajambu RT 04/01', 430, 'Kabupaten Sukabumi,\r\n                                            Jawa Barat', 'Kebonpedes', 43194, 85157705184, ''),
(3, 2, 'asfasfas', 'asfasfasfasf', 430, 'Kabupaten Sukabumi,\r\n                                            Jawa Barat', ' af afafasf', 1412423, 817146512, ''),
(5, 13, 'Hanipah', 'Kp. Rawa belut Kelurahan Limusnunggal', 431, 'Kota Sukabumi,\r\n                                            Jawa Barat', 'Cibeureum', 43116, 85157705184, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `id` varchar(32) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `rowid` varchar(64) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`id`, `user_id`, `product_id`, `qty`, `price`, `name`, `rowid`, `subtotal`) VALUES
('10-and-1', 1, 10, 2, 135000, 10, 'be5c0bd52f8f34cbd9e7d6880877a7bf', 135000),
('11-and-1', 1, 11, 1, 145000, 11, '07cd5d2f0e8cb4780c781dad9035442c', 145000);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(125) NOT NULL,
  `icon` varchar(125) NOT NULL,
  `is_show` int(11) DEFAULT 0,
  `has_sub_menu` int(11) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `icon`, `is_show`, `has_sub_menu`, `url`) VALUES
(1, 'Admin', 'fas fa-fw fa-tachometer-alt', 1, 1, NULL),
(2, 'User', 'fas fa-fw fa-user', 1, 1, NULL),
(3, 'Menu', 'fas fa-fw fa-list', 1, 1, NULL),
(4, 'Produk', 'fas fa-fw fa-box-open', 1, 1, NULL),
(6, 'Transaksi', 'fas fa-fw fa-shopping-cart', 1, 1, NULL),
(11, 'Webconfig', 'fas fa-fw fa-cogs', 1, 0, 'webconfig'),
(13, 'Checkout', '', NULL, 1, NULL),
(14, 'Address', '', NULL, 1, NULL),
(15, 'Billing', '', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'User'),
(3, 'Editor');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `title` varchar(125) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `url` varchar(125) NOT NULL,
  `icon` varchar(125) NOT NULL,
  `is_show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `title`, `menu_id`, `url`, `icon`, `is_show`) VALUES
(1, 'Dashboard', 1, 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 'Role', 1, 'admin/role', 'fas fa-fw fa-user-tie', 1),
(3, 'Daftar Pengguna', 1, 'admin/userslist', 'fas fa-fw fa-users', 1),
(4, 'Profil Saya', 2, 'user', 'fas fa-fw fa-user', 1),
(5, 'Edit Profil', 2, 'user/edit', 'fas fa-fw fa-user-edit', 1),
(6, 'Ubah Password', 2, 'user/changepassword', 'fas fa-fw fa-key', 1),
(7, 'Pengaturan Menu', 3, 'menu', 'fas fa-fw fa-list', 1),
(8, 'Pengaturan Submenu', 3, 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(9, 'Katalog Produk', 4, 'produk', 'fas fa-fw fa-bookmark', 1),
(10, 'Kategori', 4, 'produk/kategori', 'fas fa-fw fa-book', 1),
(12, 'Transaksi', 6, 'transaksi', 'fas fa-fw fa-shopping-cart', 1),
(13, 'Invoice', 6, 'transaksi/invoice', 'fas fa-fw fa-file-invoice-dollar', 1),
(14, 'Metode Pembayaran', 4, 'produk/pembayaran', 'fas fa-fw fa-credit-card', 1),
(16, 'Konfirmasi Pembayaran', 6, 'transaksi/konfirmasi', 'fas fa-fw fa-clipboard-check', 1),
(17, 'Notifikasi', 1, 'admin/notifikasi', 'fas fa-fw fa-bell', 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_config_detail`
--

CREATE TABLE `web_config_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `domain` varchar(128) NOT NULL,
  `description` varchar(225) NOT NULL,
  `keyword` varchar(225) NOT NULL,
  `favicon` varchar(32) NOT NULL DEFAULT 'favicon.ico',
  `address` varchar(225) NOT NULL,
  `gmaps` varchar(500) NOT NULL,
  `telp` bigint(32) NOT NULL,
  `github` varchar(128) NOT NULL,
  `facebook` varchar(128) NOT NULL,
  `instagram` varchar(128) NOT NULL,
  `twitter` varchar(128) NOT NULL,
  `pinterest` varchar(128) NOT NULL,
  `policy` longtext NOT NULL,
  `terms` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_config_detail`
--

INSERT INTO `web_config_detail` (`id`, `name`, `email`, `domain`, `description`, `keyword`, `favicon`, `address`, `gmaps`, `telp`, `github`, `facebook`, `instagram`, `twitter`, `pinterest`, `policy`, `terms`) VALUES
(1, 'Homelib', 'mangyoyoy01@gmail.com', 'http://localhost/homelib/', 'Tempat Buku Pembelajaran dalam Lingkup Teknik Informatika', 'E-commerce, Buku, Book, Ngoding, Teknik Informatika, IT', 'favicon.ico', 'Kp. Selajambu, RT 04/01, Sasagaran, Kebonpedes 43194', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d506977.8303404998!2d106.65394143281249!3d-6.918757199999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e683633fcd15215%3A0x261f558445241e0c!2sUniversitas%20Muhammadiyah%20Sukabumi!5e0!3m2!1sid!2sid!4v1609609835394!5m2!1sid!2sid\" frameborder=\"0\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', 85157705184, 'https://github.com/reski-mulud-muchamad', 'https://facebook.com/reski.muchamad', 'https://instagram.com/reskimulud', 'https://twitter.com/reski_mulud', 'https://pinterest.com/reskimulud', '<h1> Kebijakan Privasi untuk Drift Art</h1>\r\n\r\n<p> Di <b>Drift Art</b>, dapat diakses dari https://drift-art.com, salah satu prioritas utama kami adalah privasi pengunjung kami. Dokumen Kebijakan Privasi ini berisi jenis informasi yang dikumpulkan dan direkam oleh <b>Drift Art</b> dan bagaimana kami menggunakannya. </p>\r\n\r\n<p> Jika Anda memiliki pertanyaan tambahan atau memerlukan informasi lebih lanjut tentang Kebijakan Privasi kami, jangan ragu untuk menghubungi kami. </p>\r\n\r\n<h2> File Log </h2>\r\n\r\n<p> <b>Drift Art</b> mengikuti prosedur standar menggunakan berkas log. File-file ini mencatat pengunjung ketika mereka mengunjungi situs web. Semua perusahaan hosting melakukan ini dan merupakan bagian dari analitik layanan hosting. Informasi yang dikumpulkan oleh file log termasuk alamat protokol internet (IP), jenis browser, Penyedia Layanan Internet (ISP), cap tanggal dan waktu, halaman rujukan / keluar, dan mungkin jumlah klik. Ini tidak terkait dengan informasi apa pun yang dapat diidentifikasi secara pribadi. Tujuan dari informasi tersebut adalah untuk menganalisis tren, mengelola situs, melacak pergerakan pengguna di situs web, dan mengumpulkan informasi demografis. Kebijakan Privasi kami dibuat dengan bantuan <a href=\"https://www.privacypolicyonline.com/privacy-policy-generator/\"> Penghasil Kebijakan Privasi </a> dan <a href = \"https: / /www.generateprivacypolicy.com\">Pembuat Kebijakan Privasi </a>. </p>\r\n\r\n\r\n\r\n\r\n<h2> Kebijakan Privasi </h2>\r\n\r\n<P> Anda dapat melihat daftar ini untuk menemukan Kebijakan Privasi untuk masing-masing mitra iklan <b>Drift Art</b>. </p>\r\n\r\n<p> Server iklan atau jaringan iklan pihak ketiga menggunakan teknologi seperti cookie, JavaScript, atau Web Beacon yang digunakan di iklan masing-masing dan tautan yang muncul di <b>Drift Art</b>, yang dikirim langsung ke browser pengguna. Mereka secara otomatis menerima alamat IP Anda saat ini terjadi. Teknologi ini digunakan untuk mengukur keefektifan kampanye iklan mereka dan / atau untuk mempersonalisasi konten iklan yang Anda lihat di situs web yang Anda kunjungi. </p>\r\n\r\n<p> Perhatikan bahwa <b>Drift Art</b> tidak memiliki akses ke atau kontrol atas cookie yang digunakan oleh pengiklan pihak ketiga ini. </p>\r\n\r\n<h2> Kebijakan Privasi Pihak Ketiga </h2>\r\n\r\n<p> Kebijakan Privasi <b>Drift Art</b> tidak berlaku untuk pengiklan atau situs web lain. Karenanya, kami menyarankan Anda untuk berkonsultasi dengan masing-masing Kebijakan Privasi dari server iklan pihak ketiga ini untuk informasi yang lebih rinci. Ini mungkin termasuk praktik dan instruksi mereka tentang cara menyisih dari opsi tertentu. </p>\r\n\r\n<p> Anda dapat memilih untuk menonaktifkan cookie melalui opsi browser individu Anda. Untuk mengetahui informasi lebih rinci tentang manajemen cookie dengan browser web tertentu, dapat ditemukan di situs web masing-masing browser. Apa Itu Cookies? </p>\r\n\r\n<h2> Informasi Anak-anak </h2>\r\n\r\n<p> Bagian lain dari prioritas kami adalah menambahkan perlindungan untuk anak-anak saat menggunakan internet. Kami mendorong orang tua dan wali untuk mengamati, berpartisipasi, dan / atau memantau dan membimbing aktivitas online mereka. </p>\r\n\r\n<p> <b>Drift Art</b> tidak dengan sengaja mengumpulkan Informasi Identifikasi Pribadi apa pun dari anak-anak di bawah usia 13 tahun. Jika menurut Anda anak Anda memberikan informasi semacam ini di situs web kami, kami sangat menganjurkan Anda untuk segera menghubungi kami dan kami akan melakukan yang terbaik upaya untuk segera menghapus informasi tersebut dari catatan kami. </p>\r\n\r\n<h2> Hanya Kebijakan Privasi Online </h2>\r\n\r\n<p> Kebijakan Privasi ini hanya berlaku untuk aktivitas online kami dan berlaku untuk pengunjung situs web kami sehubungan dengan informasi yang mereka bagikan dan / atau kumpulkan di <b>Drift Art</b>. Kebijakan ini tidak berlaku untuk informasi apa pun yang dikumpulkan secara offline atau melalui saluran selain situs web ini. </p>\r\n\r\n<h2> Persetujuan </h2>\r\n\r\n<p> Dengan menggunakan situs web kami, Anda dengan ini menyetujui Kebijakan Privasi kami dan menyetujui Syarat dan Ketentuannya. </p>', '<h2> <strong> Persyaratan dan Ketentuan </strong> </h2>\r\n\r\n<p> Selamat datang di Drift Art! </p>\r\n\r\n<p> Syarat dan ketentuan ini menguraikan aturan dan regulasi untuk penggunaan Situs Web Drift Art, yang terletak di https://drift-art.com. </p>\r\n\r\n<p> Dengan mengakses situs web ini, kami menganggap Anda menerima syarat dan ketentuan ini. Jangan terus menggunakan Drift Art jika Anda tidak setuju untuk mengambil semua syarat dan ketentuan yang disebutkan di halaman ini. </p>\r\n\r\n<p> Terminologi berikut berlaku untuk Syarat dan Ketentuan ini, Pernyataan Privasi dan Pemberitahuan Sanggahan dan semua Perjanjian: \"Klien\", \"Anda\" dan \"Milik Anda\" mengacu pada Anda, orang yang masuk ke situs web ini dan mematuhi persyaratan Perusahaan dan kondisi. \"Perusahaan\", \"Diri Kami\", \"Kami\", \"Milik Kami\", dan \"Kami\", mengacu pada Perusahaan kami. \"Pihak\", \"Pihak\", atau \"Kami\", mengacu pada Klien dan diri kami sendiri. Semua istilah mengacu pada penawaran, penerimaan, dan pertimbangan pembayaran yang diperlukan untuk melakukan proses bantuan kami kepada Klien dengan cara yang paling tepat untuk tujuan yang jelas dalam memenuhi kebutuhan Klien sehubungan dengan penyediaan layanan yang dinyatakan Perusahaan, sesuai dengan dan tunduk pada, hukum yang berlaku di Belanda. Setiap penggunaan terminologi di atas atau kata lain dalam bentuk tunggal, jamak, huruf besar dan / atau dia, dianggap dapat dipertukarkan dan oleh karena itu merujuk pada yang sama. Syarat dan Ketentuan kami dibuat dengan bantuan <a href=\"https://www.privacypolicyonline.com/terms-conditions-generator/\"> Generator Syarat & Ketentuan </a> dan <a href = \"https : //www.generateprivacypolicy.com \"> Generator Kebijakan Privasi </a>. </p>\r\n\r\n<h3><li>Cookie</i> </h3>\r\n\r\n<p> Kami menggunakan penggunaan cookie. Dengan mengakses Drift Art, Anda setuju untuk menggunakan cookie sesuai dengan Kebijakan Privasi Drift Art. </p>\r\n\r\n<p> Sebagian besar situs web interaktif menggunakan cookie untuk memungkinkan kami mengambil detail pengguna untuk setiap kunjungan. Cookie digunakan oleh situs web kami untuk mengaktifkan fungsionalitas area tertentu untuk memudahkan orang mengunjungi situs web kami. Beberapa afiliasi / mitra periklanan kami juga dapat menggunakan cookie. </p>\r\n\r\n<h3><li>License</i> </h3>\r\n\r\n<p> Kecuali jika dinyatakan lain, Drift Art dan / atau pemberi lisensinya memiliki hak kekayaan intelektual untuk semua materi di Drift Art. Semua hak kekayaan intelektual dilindungi. Anda dapat mengakses ini dari Drift Art untuk penggunaan pribadi Anda sendiri dengan tunduk pada batasan yang ditetapkan dalam syarat dan ketentuan ini. </p>\r\n\r\n<p> Anda tidak boleh: </p>\r\n<ul>\r\n    <li> Publikasikan ulang materi dari Drift Art </li>\r\n    <li> Menjual, menyewakan, atau mensublisensikan materi dari Drift Art </li>\r\n    <li> Mereproduksi, menggandakan, atau menyalin materi dari Drift Art </li>\r\n    <li> Mendistribusikan kembali konten dari Drift Art </li>\r\n</ul>\r\n\r\n<p> Perjanjian ini akan dimulai pada tanggal Perjanjian ini. </p>\r\n\r\n<p> Bagian dari situs web ini menawarkan kesempatan bagi pengguna untuk memposting dan bertukar pendapat dan informasi di area tertentu di situs web. Drift Art tidak memfilter, mengedit, menerbitkan atau meninjau Komentar sebelum kehadirannya di situs web. Komentar tidak mencerminkan pandangan dan pendapat Drift Art, agen dan / atau afiliasinya. Komentar mencerminkan pandangan dan opini orang yang memposting pandangan dan opini mereka. Sejauh diizinkan oleh undang-undang yang berlaku, Drift Art tidak bertanggung jawab atas Komentar atau atas kewajiban, kerusakan atau biaya yang disebabkan dan / atau diderita sebagai akibat dari penggunaan dan / atau posting dan / atau tampilan Komentar di situs web ini. </p>\r\n\r\n<p> Drift Art berhak untuk memantau semua Komentar dan menghapus Komentar yang dianggap tidak pantas, menyinggung, atau menyebabkan pelanggaran Syarat dan Ketentuan ini. </p>\r\n\r\n<p> Anda menjamin dan menyatakan bahwa: </p>\r\n\r\n<ul>\r\n    <li> Anda berhak memposting Komentar di situs web kami dan memiliki semua lisensi dan persetujuan yang diperlukan untuk melakukannya; </li>\r\n    <li> Komentar tidak melanggar hak kekayaan intelektual apa pun, termasuk tanpa batasan hak cipta, paten, atau merek dagang pihak ketiga mana pun; </li>\r\n    <li> Komentar tidak mengandung materi yang memfitnah, memfitnah, menyinggung, tidak senonoh, atau melanggar hukum yang merupakan pelanggaran privasi </li>\r\n    <li> Komentar tidak akan digunakan untuk meminta atau mempromosikan bisnis atau kebiasaan atau menampilkan aktivitas komersial atau aktivitas yang melanggar hukum. </li>\r\n</ul>\r\n\r\n<p> Anda dengan ini memberikan lisensi non-eksklusif kepada Drift Art untuk menggunakan, mereproduksi, mengedit, dan mengizinkan orang lain untuk menggunakan, mereproduksi, dan mengedit Komentar Anda dalam segala bentuk, format, atau media. </p>\r\n\r\n<h3> <strong> Melakukan Hyperlink ke Konten kami </strong> </h3>\r\n\r\n<p> Organisasi berikut dapat menautkan ke Situs Web kami tanpa persetujuan tertulis sebelumnya: </p>\r\n\r\n<ul>\r\n    <li> Instansi pemerintah; </li>\r\n    <li> Mesin telusur; </li>\r\n    <li> Organisasi berita; </li>\r\n    <li> Distributor direktori daring dapat menautkan ke Situs Web kami dengan cara yang sama seperti mereka membuat tautan ke Situs Web bisnis terdaftar lainnya; dan </li>\r\n    <li> Bisnis Terakreditasi di seluruh sistem kecuali meminta organisasi nirlaba, pusat perbelanjaan amal, dan grup penggalangan dana amal yang mungkin tidak hyperlink ke situs Web kami. </li>\r\n</ul>\r\n\r\n<p> Organisasi-organisasi ini dapat menautkan ke beranda kami, ke publikasi atau ke informasi Situs Web lainnya selama tautan tersebut: (a) sama sekali tidak menipu; (b) tidak secara tidak langsung menyiratkan sponsor, dukungan atau persetujuan dari pihak yang menghubungkan dan produk dan / atau layanannya; dan (c) cocok dengan konteks situs pihak yang menautkan. </p>\r\n\r\n<p> Kami dapat mempertimbangkan dan menyetujui permintaan tautan lain dari jenis organisasi berikut: </p>\r\n\r\n<ul>\r\n    <li> sumber informasi konsumen dan / atau bisnis yang umum; </li>\r\n    <li> situs komunitas dot.com; </li>\r\n    <li> asosiasi atau grup lain yang mewakili badan amal; </li>\r\n    <li> distributor direktori daring; </li>\r\n    <li> portal internet; </li>\r\n    <li> firma akuntansi, hukum dan konsultasi; dan </li>\r\n    <li> institusi pendidikan dan asosiasi perdagangan. </li>\r\n</ul>\r\n\r\n<p> Kami akan menyetujui permintaan tautan dari organisasi-organisasi ini jika kami memutuskan bahwa: (a) tautan tersebut tidak akan membuat kami terlihat tidak menyenangkan bagi diri kami sendiri atau bisnis terakreditasi kami; (b) organisasi tidak memiliki catatan negatif apa pun dengan kami; (c) manfaat bagi kami dari visibilitas hyperlink mengkompensasi tidak adanya Drift Art; dan (d) tautannya ada dalam konteks informasi sumber daya umum. </p>\r\n\r\n<p> Organisasi-organisasi ini dapat menautkan ke beranda kami selama tautan tersebut: (a) sama sekali tidak menipu; (b) tidak secara tidak langsung menyiratkan sponsor, dukungan atau persetujuan dari pihak yang menghubungkan dan produk atau layanannya; dan (c) cocok dengan konteks situs pihak yang menautkan. </p>\r\n\r\n<p> Jika Anda adalah salah satu organisasi yang tercantum dalam paragraf 2 di atas dan tertarik untuk menautkan ke situs web kami, Anda harus memberi tahu kami dengan mengirim email ke Drift Art. Harap sertakan nama Anda, nama organisasi Anda, informasi kontak serta URL situs Anda, daftar URL apa pun yang ingin Anda tautkan ke Situs web kami, dan daftar URL di situs kami yang ingin Anda tautkan. tautan. Tunggu 2-3 minggu untuk mendapatkan tanggapan. </p>\r\n\r\n<p> Organisasi yang disetujui dapat melakukan hyperlink ke Situs web kami sebagai berikut: </p>\r\n\r\n<ul>\r\n    <li> Dengan menggunakan nama perusahaan kami; atau </li>\r\n    <li> Dengan menggunakan pencari sumber daya seragam yang ditautkan ke; atau </li>\r\n    <li> Dengan menggunakan deskripsi lain apa pun dari Situs web kami yang ditautkan yang masuk akal dalam konteks dan format konten di situs pihak yang menautkan. </li>\r\n</ul>\r\n\r\n<p> Penggunaan logo Drift Art atau karya seni lain tidak akan diizinkan untuk penautan jika tidak ada perjanjian lisensi merek dagang. </p>\r\n\r\n<h3><i>iFrames</i> </h3>\r\n\r\n<p> Tanpa persetujuan sebelumnya dan izin tertulis, Anda tidak boleh membuat bingkai di sekitar Halaman Web kami yang mengubah dengan cara apa pun tampilan visual atau tampilan Situs Web kami. </p>\r\n\r\n<h3> <strong> Kewajiban Konten </strong> </h3>\r\n\r\n<p> Kami tidak akan bertanggung jawab atas konten apa pun yang muncul di Situs Web Anda. Anda setuju untuk melindungi dan membela kami dari semua klaim yang muncul di Situs Web Anda. Tidak ada tautan yang muncul di Situs Web mana pun yang dapat ditafsirkan sebagai fitnah, cabul atau kriminal, atau yang melanggar, jika tidak melanggar, atau mendukung pelanggaran atau pelanggaran lain, hak pihak ketiga mana pun. </p>\r\n\r\n<h3> <strong> Reservasi Hak </strong> </h3>\r\n\r\n<p> Kami berhak meminta Anda menghapus semua tautan atau tautan tertentu ke Situs Web kami. Anda setuju untuk segera menghapus semua tautan ke Situs web kami atas permintaan. Kami juga berhak mengubah syarat dan ketentuan ini serta kebijakan penautannya kapan saja. Dengan terus menautkan ke Situs web kami, Anda setuju untuk terikat dan mengikuti syarat dan ketentuan penautan ini. </p>\r\n\r\n<h3> <strong> Penghapusan tautan dari situs web kami </strong> </h3>\r\n\r\n<p> Jika Anda menemukan tautan apa pun di Situs Web kami yang menyinggung karena alasan apa pun, Anda bebas menghubungi dan memberi tahu kami kapan saja. Kami akan mempertimbangkan permintaan untuk menghapus tautan, tetapi kami tidak berkewajiban untuk menanggapi Anda secara langsung atau lebih. </p>\r\n\r\n<p> Kami tidak memastikan bahwa informasi di situs web ini benar, kami tidak menjamin kelengkapan atau keakuratannya; kami juga tidak berjanji untuk memastikan bahwa situs web tetap tersedia atau bahwa materi di situs web selalu diperbarui. </p>\r\n\r\n<h3><illionDisclaimer</i> </h3>\r\n\r\n<p> Sejauh diizinkan oleh hukum yang berlaku, kami mengecualikan semua pernyataan, jaminan, dan ketentuan yang berkaitan dengan situs web kami dan penggunaan situs web ini. Tidak ada dalam penafian ini yang akan: </p>\r\n\r\n<ul>\r\n    <li> batasi atau kecualikan tanggung jawab kami atau Anda atas kematian atau cedera diri; </li>\r\n    <li> batasi atau kecualikan tanggung jawab kami atau Anda atas penipuan atau kesalahan penyajian yang menipu; </li>\r\n    <li> batasi kewajiban kami atau Anda dengan cara apa pun yang tidak diizinkan berdasarkan hukum yang berlaku; atau </li>\r\n    <li> mengecualikan kewajiban kami atau Anda yang mungkin tidak dikecualikan berdasarkan hukum yang berlaku. </li>\r\n</ul>\r\n\r\n<p> Batasan dan larangan tanggung jawab yang ditetapkan dalam Bagian ini dan di tempat lain dalam penafian ini: (a) tunduk pada paragraf sebelumnya; dan (b) mengatur semua kewajiban yang timbul berdasarkan pelepasan tanggung jawab hukum, termasuk kewajiban yang timbul dalam kontrak, dalam wanprestasi, dan untuk pelanggaran kewajiban hukum. </p>\r\n\r\n<p> Selama situs web dan informasi serta layanan di situs web ini disediakan secara gratis, kami tidak akan bertanggung jawab atas kehilangan atau kerusakan dalam bentuk apa pun. </p>');

-- --------------------------------------------------------

--
-- Table structure for table `web_config_team`
--

CREATE TABLE `web_config_team` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `position` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `telp` bigint(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_config_team`
--

INSERT INTO `web_config_team` (`id`, `user_id`, `name`, `position`, `email`, `telp`) VALUES
(1, 2, 'Reski Mulud Muchamad', '', 'reski.mulud@gmail.com', 82125116279),
(2, 5, 'Muhammad Drajat Ramdhani', '-', 'drajatdani1892@gmail.com', 82318404001),
(3, 6, 'Ikram Maulana', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_payment_method`
--
ALTER TABLE `product_payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transaction_confirm`
--
ALTER TABLE `transaction_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_invoice`
--
ALTER TABLE `transaction_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_by` (`order_by`) USING BTREE,
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `transaction_status`
--
ALTER TABLE `transaction_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `role_id` (`role_id`) USING BTREE;

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `web_config_detail`
--
ALTER TABLE `web_config_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_config_team`
--
ALTER TABLE `web_config_team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_payment_method`
--
ALTER TABLE `product_payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaction_confirm`
--
ALTER TABLE `transaction_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaction_invoice`
--
ALTER TABLE `transaction_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaction_status`
--
ALTER TABLE `transaction_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `web_config_detail`
--
ALTER TABLE `web_config_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_config_team`
--
ALTER TABLE `web_config_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`added_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `transaction_invoice`
--
ALTER TABLE `transaction_invoice`
  ADD CONSTRAINT `transaction_invoice_ibfk_1` FOREIGN KEY (`order_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`),
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
