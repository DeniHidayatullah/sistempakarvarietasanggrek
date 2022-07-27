-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 06:38 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anggrek`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_latih`
--

CREATE TABLE `data_latih` (
  `id` int(11) NOT NULL,
  `nama_anggrek` varchar(255) NOT NULL,
  `genus` varchar(255) NOT NULL,
  `akar` varchar(255) NOT NULL,
  `batang` varchar(255) NOT NULL,
  `bentuk_daun` varchar(255) NOT NULL,
  `jumlah_mahkota` varchar(255) NOT NULL,
  `bentuk_mahkota` varchar(255) NOT NULL,
  `lidah` varchar(255) NOT NULL,
  `motif` varchar(255) NOT NULL,
  `taksonomi_asli` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_latih`
--

INSERT INTO `data_latih` (`id`, `nama_anggrek`, `genus`, `akar`, `batang`, `bentuk_daun`, `jumlah_mahkota`, `bentuk_mahkota`, `lidah`, `motif`, `taksonomi_asli`) VALUES
(1, 'Vanda Lamellata', 'Vanda', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'memanjang ujung melengkung', 'menjulur', 'dua warna', 'Spesies'),
(2, 'Vanda Foetida', 'Vanda', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'memanjang ujung melengkung', 'menjulur', 'dua warna', 'Spesies'),
(3, 'Vanda Lindeni', 'Vanda', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'memanjang ujung melengkung', 'menjulur', 'dua warna', 'Spesies'),
(4, 'Vanda tricolor', 'Vanda', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'memanjang ujung melengkung', 'menjulur', 'bercorak', 'Spesies'),
(5, 'Vanda Lissochiloides', 'Vanda', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'memanjang ujung melengkung', 'menjulur', 'bercorak', 'Spesies'),
(6, 'Vanda Limbata', 'Vanda', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'memanjang ujung melengkung', 'menjulur', 'bercorak', 'Spesies'),
(7, 'Vanda Lombokensis', 'Vanda', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'memanjang ujung melengkung', 'menjulur', 'bercorak', 'Spesies'),
(8, 'Vanda Trimerril', 'Vanda', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'memanjang ujung melengkung', 'menjulur', 'bercorak', 'Spesies'),
(9, 'Vanda Hastifera', 'Vanda', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'memanjang ujung melengkung', 'menjulur', 'bercorak', 'Spesies'),
(10, 'Vanda Insignis', 'Vanda', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'memanjang ujung melengkung', 'menjulur', 'bercorak', 'Spesies'),
(11, 'Vanda helvola', 'Vanda', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'memanjang ujung melengkung', 'menjulur', 'polos', 'Spesies'),
(12, 'Vanda Denisoniana', 'Vanda', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'memanjang ujung melengkung', 'menjulur', 'polos', 'Spesies'),
(13, 'Vanda lamellata var. boxallii', 'Vanda', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'memanjang ujung melengkung', 'menjulur', 'dua warna', 'Varietas'),
(14, 'vanda tricolor var tenebrosa', 'Vanda', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'memanjang ujung melengkung', 'menjulur', 'bercorak', 'Varietas'),
(15, 'vanda tricolor var suavis', 'Vanda', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'memanjang ujung melengkung', 'menjulur', 'bercorak', 'Varietas'),
(16, 'Vanda Limbata var flores', 'Vanda', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'memanjang ujung melengkung', 'menjulur', 'bercorak', 'Varietas'),
(17, 'vanda tricolor var planilabris', 'Vanda', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'memanjang ujung melengkung', 'menjulur', 'bercorak', 'Varietas'),
(18, 'Vandopsis lissochiloides var. alba', 'Vanda', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'memanjang ujung melengkung', 'menjulur', 'bercorak', 'Varietas'),
(19, 'Vanda helvola var Mamasa', 'Vanda', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'memanjang ujung melengkung', 'menjulur', 'polos', 'Varietas'),
(20, 'Cattleya trianae var Coerulea', 'Cattleya', 'Epifit', 'Monopodial', 'runcing', '5 helai', 'seperti bintang', 'menjulur', 'polos', 'Varietas'),
(21, 'Cattleya Intermedia', 'Cattleya', 'Epifit', 'Simpodial', 'runcing', '5 helai', 'seperti bintang', 'menjulur', 'dua warna', 'Spesies'),
(22, 'Cattleya Ghillanyi', 'Cattleya', 'Epifit', 'Simpodial', 'runcing', '5 helai', 'seperti bintang', 'menjulur', 'dua warna', 'Spesies'),
(23, 'Cattleya Aclandiae', 'Cattleya', 'Epifit', 'Simpodial', 'runcing', '5 helai', 'seperti bintang', 'menjulur', 'bercorak', 'Spesies'),
(24, 'Cattleya shilleriana', 'Cattleya', 'Epifit', 'Simpodial', 'runcing', '5 helai', 'seperti bintang', 'menjulur', 'bercorak', 'Spesies'),
(25, 'Cattleya walkeriana', 'Cattleya', 'Epifit', 'Simpodial', 'runcing', '5 helai', 'seperti bintang', 'menjulur', 'polos', 'Spesies'),
(26, 'Cattleya Violacea', 'Cattleya', 'Epifit', 'Simpodial', 'runcing', '5 helai', 'seperti bintang', 'menjulur', 'polos', 'Spesies'),
(27, 'Cattleya Harpophylla', 'Cattleya', 'Epifit', 'Simpodial', 'runcing', '5 helai', 'seperti bintang', 'menjulur', 'polos', 'Spesies'),
(28, 'Cattleya Perrinii', 'Cattleya', 'Epifit', 'Simpodial', 'runcing', '5 helai', 'seperti bintang', 'menjulur', 'polos', 'Spesies'),
(29, 'Cattleya Luteola', 'Cattleya', 'Epifit', 'Simpodial', 'runcing', '5 helai', 'seperti bintang', 'menjulur', 'polos', 'Spesies'),
(30, 'Cattleya forbesii', 'Cattleya', 'Epifit', 'Simpodial', 'runcing', '5 helai', 'seperti bintang', 'menjulur', 'polos', 'Spesies'),
(31, 'Cattleya bicolor var. grossii', 'Cattleya', 'Epifit', 'Simpodial', 'runcing', '5 helai', 'seperti bintang', 'menjulur', 'polos', 'Varietas'),
(32, 'Cattleya bicolor var. coerulea', 'Cattleya', 'Epifit', 'Simpodial', 'runcing', '5 helai', 'seperti bintang', 'menjulur', 'polos', 'Varietas'),
(33, 'Cattleya intermedia var. Alba', 'Cattleya', 'Epifit', 'Simpodial', 'runcing', '5 helai', 'seperti bintang', 'menjulur', 'polos', 'Varietas'),
(34, 'Cattleya intermedia var. coerulea', 'Cattleya', 'Epifit', 'Simpodial', 'runcing', '5 helai', 'seperti bintang', 'menjulur', 'polos', 'Varietas'),
(35, 'Cattleya bowringiana var. coerulea', 'Cattleya', 'Epifit', 'Simpodial', 'runcing', '5 helai', 'seperti bintang', 'menjulur', 'polos', 'Varietas'),
(36, 'cattleya skinneri var. coerulea', 'Cattleya', 'Epifit', 'Simpodial', 'runcing', '5 helai', 'seperti bintang', 'menjulur', 'polos', 'Varietas'),
(37, 'cattleya skinneri var. oculata alba', 'Cattleya', 'Epifit', 'Simpodial', 'runcing', '5 helai', 'seperti bintang', 'menjulur', 'polos', 'Varietas'),
(38, 'cattleya bowringiana var. red', 'Cattleya', 'Epifit', 'Simpodial', 'runcing', '5 helai', 'seperti bintang', 'menjulur', 'polos', 'Varietas'),
(39, 'Dendrobium bigibbum', 'Dendrobium', 'Epifit', 'Simpodial', 'oval', '5 helai', 'oval ujung meruncing', 'menjulur', 'polos', 'Spesies'),
(40, 'Dendrobium Mangosteen', 'Dendrobium', 'Epifit', 'Simpodial', 'oval', '5 helai', 'oval ujung meruncing', 'menjulur', 'polos', 'Spesies'),
(41, 'Dendrobium convolutum', 'Dendrobium', 'Epifit', 'Simpodial', 'oval', '5 helai', 'oval ujung meruncing', 'menjulur', 'polos', 'Spesies'),
(42, 'Dendrobium cinereum', 'Dendrobium', 'Epifit', 'Simpodial', 'oval', '5 helai', 'oval ujung meruncing', 'menjulur', 'polos', 'Spesies'),
(43, 'Dendrobium Aqueum', 'Dendrobium', 'Epifit', 'Simpodial', 'oval', '5 helai', 'oval ujung meruncing', 'menjulur', 'polos', 'Spesies'),
(44, 'Dendrobium victorea', 'Dendrobium', 'Epifit', 'Simpodial', 'oval', '5 helai', 'oval ujung meruncing', 'menjulur', 'dua warna', 'Spesies'),
(45, 'Dendrobium Aduncum', 'Dendrobium', 'Epifit', 'Simpodial', 'oval', '5 helai', 'oval ujung meruncing', 'menjulur', 'dua warna', 'Spesies'),
(46, 'Dendrobium Lop Bruri Black', 'Dendrobium', 'Epifit', 'Simpodial', 'oval', '5 helai', 'oval ujung meruncing', 'menjulur', 'dua warna', 'Spesies'),
(47, 'Dendrobium Regium', 'Dendrobium', 'Epifit', 'Simpodial', 'oval', '5 helai', 'oval ujung meruncing', 'menjulur', 'dua warna', 'Spesies'),
(48, 'Dendrobium sanguinolentum', 'Dendrobium', 'Epifit', 'Simpodial', 'oval', '5 helai', 'oval ujung meruncing', 'menjulur', 'dua warna', 'Spesies'),
(49, 'dendrobium bigibbum var. compactum', 'Dendrobium', 'Epifit', 'Simpodial', 'oval', '5 helai', 'oval ujung meruncing', 'menjulur', 'polos', 'Varietas'),
(50, 'dendrobium fimbriatum var. oculatum', 'Dendrobium', 'Epifit', 'Simpodial', 'oval', '5 helai', 'oval ujung meruncing', 'menjulur', 'polos', 'Varietas'),
(51, 'dendrobium sanderae var. major', 'Dendrobium', 'Epifit', 'Simpodial', 'oval', '5 helai', 'oval ujung meruncing', 'menjulur', 'polos', 'Varietas'),
(52, 'Phalenopsis amboinensis', 'Phalaenopsis', 'Epifit', 'Monopodial', 'lonjong', '5 helai', 'oval lebar ', 'ujung lancip', 'bercorak', 'Spesies'),
(53, 'Phalaenopsis Cornu cervi', 'Phalaenopsis', 'Epifit', 'Monopodial', 'lonjong', '5 helai', 'oval lebar ', 'ujung lancip', 'bercorak', 'Spesies'),
(54, 'Phalenopsis Gigantea', 'Phalaenopsis', 'Epifit', 'Monopodial', 'lonjong', '5 helai', 'oval lebar ', 'ujung lancip', 'bercorak', 'Spesies'),
(55, 'Phalenopsis Javanica', 'Phalaenopsis', 'Epifit', 'Monopodial', 'lonjong', '5 helai', 'oval lebar ', 'ujung lancip', 'bercorak', 'Spesies'),
(56, 'Phalaenopsis violaecea', 'Phalaenopsis', 'Epifit', 'Monopodial', 'lonjong', '5 helai', 'oval lebar ', 'ujung lancip', 'dua warna', 'Spesies'),
(57, 'Phalaenopsis Malang Jaya', 'Phalaenopsis', 'Epifit', 'Monopodial', 'lonjong', '5 helai', 'oval lebar ', 'ujung lancip', 'dua warna', 'Spesies'),
(58, 'Phalenopsis Gibbosa', 'Phalaenopsis', 'Epifit', 'Monopodial', 'lonjong', '5 helai', 'oval lebar ', 'ujung lancip', 'dua warna', 'Spesies'),
(59, 'Phalaenopsis Guadalupe Pineda', 'Phalaenopsis', 'Epifit', 'Monopodial', 'lonjong', '5 helai', 'oval lebar ', 'ujung lancip', 'dua warna', 'Spesies'),
(60, 'Phalaenopsis fimbriata', 'Phalaenopsis', 'Epifit', 'Monopodial', 'lonjong', '5 helai', 'oval lebar ', 'ujung lancip', 'polos', 'Spesies'),
(61, 'Phalaenopsis Aphrodite', 'Phalaenopsis', 'Epifit', 'Monopodial', 'lonjong', '5 helai', 'oval lebar ', 'ujung lancip', 'polos', 'Spesies'),
(62, 'Phalaenopsis amabilis var. papuana', 'Phalaenopsis', 'Epifit', 'Monopodial', 'lonjong', '5 helai', 'oval lebar ', 'ujung lancip', 'polos', 'Varietas'),
(63, 'Phalaenopsis amabilis var. vinicolor', 'Phalaenopsis', 'Epifit', 'Monopodial', 'lonjong', '5 helai', 'oval lebar ', 'ujung lancip', 'polos', 'Varietas'),
(64, 'Phalaenopsis amboinensis var common', 'Phalaenopsis', 'Epifit', 'Monopodial', 'lonjong', '5 helai', 'oval lebar ', 'ujung lancip', 'bercorak', 'Varietas'),
(65, 'Phalaenopsis amboinensis var. flavida', 'Phalaenopsis', 'Epifit', 'Monopodial', 'lonjong', '5 helai', 'oval lebar ', 'ujung lancip', 'bercorak', 'Varietas'),
(66, 'Phalaenopsis fimbriata var. sumatrana', 'Phalaenopsis', 'Epifit', 'Monopodial', 'lonjong', '5 helai', 'oval lebar ', 'ujung lancip', 'dua warna', 'Varietas'),
(67, 'Phalenopsis Javanica var sumatera', 'Phalaenopsis', 'Epifit', 'Monopodial', 'lonjong', '5 helai', 'oval lebar ', 'ujung lancip', 'bercorak', 'Varietas'),
(68, ' phalaenopsis cornu-cervi var. chattaladae', 'Phalaenopsis', 'Epifit', 'Monopodial', 'lonjong', '5 helai', 'oval lebar ', 'ujung lancip', 'polos', 'Varietas'),
(69, 'Spathoglotis Sunshine', 'Spathoglotis', 'Terestrial', 'Simpodial', 'berlipat-lipat', '5 helai', 'elips lebar bertumpuk', 'menjulur', 'dua warna', 'Spesies'),
(70, 'Spathoglotis Papuana', 'Spathoglotis', 'Terestrial', 'Simpodial', 'berlipat-lipat', '5 helai', 'elips lebar bertumpuk', 'menjulur', 'dua warna', 'Spesies'),
(71, 'Spathoglotis ani sby', 'Spathoglotis', 'Terestrial', 'Simpodial', 'berlipat-lipat', '5 helai', 'elips lebar bertumpuk', 'menjulur', 'dua warna', 'Spesies'),
(72, 'Spathoglotis Pauliane', 'Spathoglotis', 'Terestrial', 'Simpodial', 'berlipat-lipat', '5 helai', 'elips lebar bertumpuk', 'menjulur', 'polos', 'Spesies'),
(73, 'Spathoglotis Affinis', 'Spathoglotis', 'Terestrial', 'Simpodial', 'berlipat-lipat', '5 helai', 'elips lebar bertumpuk', 'menjulur', 'polos', 'Spesies'),
(74, 'Spathoglotis Pubescens', 'Spathoglotis', 'Terestrial', 'Simpodial', 'berlipat-lipat', '5 helai', 'elips lebar bertumpuk', 'menjulur', 'polos', 'Spesies'),
(75, 'spathoglotis plicata', 'Spathoglotis', 'Terestrial', 'Simpodial', 'berlipat-lipat', '5 helai', 'elips lebar bertumpuk', 'menjulur', 'polos', 'Spesies'),
(76, 'spathoglotis kimballiana', 'Spathoglotis', 'Terestrial', 'Simpodial', 'berlipat-lipat', '5 helai', 'elips lebar bertumpuk', 'menjulur', 'polos', 'Spesies'),
(77, 'spathoglotis plicata var alba', 'Spathoglotis', 'Terestrial', 'Simpodial', 'berlipat-lipat', '5 helai', 'elips lebar bertumpuk', 'menjulur', 'polos', 'Varietas'),
(78, 'spathoglotis plicata var blume', 'Spathoglotis', 'Terestrial', 'Simpodial', 'berlipat-lipat', '5 helai', 'elips lebar bertumpuk', 'menjulur', 'dua warna', 'Varietas'),
(79, 'spathoglottis kimballiana var. angustifolia', 'Spathoglotis', 'Terestrial', 'Simpodial', 'berlipat-lipat', '5 helai', 'elips lebar bertumpuk', 'menjulur', 'polos', 'Varietas'),
(80, 'Phapiopedilum bullenianum', 'Paphiopedilum', 'Litofit', 'Monopodial', 'lonjong', '3 helai  ', 'elips meruncing', 'berkantong', 'dua warna', 'Spesies'),
(81, 'Phapiopedilum Lunatum', 'Paphiopedilum', 'Litofit', 'Monopodial', 'lonjong', '3 helai  ', 'elips meruncing', 'berkantong', 'dua warna', 'Spesies'),
(82, 'Phapiopedilum Javanicum', 'Paphiopedilum', 'Litofit', 'Monopodial', 'lonjong', '3 helai  ', 'elips meruncing', 'berkantong', 'dua warna', 'Spesies'),
(83, 'Phapiopedilum prinulinum', 'Paphiopedilum', 'Litofit', 'Monopodial', 'lonjong', '3 helai  ', 'elips meruncing', 'berkantong', 'polos', 'Spesies'),
(84, 'Phapiopedilum superbiens', 'Paphiopedilum', 'Litofit', 'Monopodial', 'lonjong', '3 helai  ', 'elips meruncing', 'berkantong', 'bercorak', 'Spesies'),
(85, 'Phapiopedilum Agusii', 'Paphiopedilum', 'Litofit', 'Monopodial', 'lonjong', '3 helai  ', 'elips meruncing', 'berkantong', 'bercorak', 'Spesies'),
(86, 'Phapiopedilum Maudiae', 'Paphiopedilum', 'Litofit', 'Monopodial', 'lonjong', '3 helai  ', 'elips meruncing', 'berkantong', 'bercorak', 'Spesies'),
(87, 'Phapiopedilum Tonsum', 'Paphiopedilum', 'Litofit', 'Monopodial', 'lonjong', '3 helai  ', 'elips meruncing', 'berkantong', 'bercorak', 'Spesies'),
(88, 'Phapiopedilum Lowii Jawa', 'Paphiopedilum', 'Litofit', 'Monopodial', 'lonjong', '3 helai  ', 'elips meruncing', 'berkantong', 'bercorak', 'Spesies'),
(89, 'Paphiopedilum Mauredi Agrihorti', 'Paphiopedilum', 'Litofit', 'Monopodial', 'lonjong', '3 helai  ', 'elips meruncing', 'berkantong', 'bercorak', 'Varietas'),
(90, 'Paphiopedilum Tonsina Agrihorti', 'Paphiopedilum', 'Litofit', 'Monopodial', 'lonjong', '3 helai  ', 'elips meruncing', 'berkantong', 'bercorak', 'Varietas'),
(91, 'Paphiopedilum Rupini Agrihorti', 'Paphiopedilum', 'Litofit', 'Monopodial', 'lonjong', '3 helai  ', 'elips meruncing', 'berkantong', 'bercorak', 'Varietas');

-- --------------------------------------------------------

--
-- Table structure for table `gain`
--

CREATE TABLE `gain` (
  `id` int(11) NOT NULL,
  `node_id` int(11) DEFAULT NULL,
  `atribut` varchar(100) DEFAULT NULL,
  `gain` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gain`
--

INSERT INTO `gain` (`id`, `node_id`, `atribut`, `gain`) VALUES
(1, 1, 'genus', 0.027),
(2, 1, 'akar', 0.01);

-- --------------------------------------------------------

--
-- Table structure for table `rasio_gain`
--

CREATE TABLE `rasio_gain` (
  `id` int(11) NOT NULL,
  `opsi` varchar(10) DEFAULT NULL,
  `cabang1` varchar(50) DEFAULT NULL,
  `cabang2` varchar(50) DEFAULT NULL,
  `rasio_gain` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rasio_gain`
--

INSERT INTO `rasio_gain` (`id`, `opsi`, `cabang1`, `cabang2`, `rasio_gain`) VALUES
(1, 'opsi1', 'dua warna', 'bercorak , polos', 0.077),
(2, 'opsi2', 'bercorak', 'polos , dua warna', 0.07),
(3, 'opsi3', 'polos', 'dua warna , bercorak', 0.064);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karakteristik`
--

CREATE TABLE `tbl_karakteristik` (
  `id_karakteristik` int(11) NOT NULL,
  `kode_karakteristik` varchar(15) NOT NULL,
  `nama_karakteristik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_karakteristik`
--

INSERT INTO `tbl_karakteristik` (`id_karakteristik`, `kode_karakteristik`, `nama_karakteristik`) VALUES
(1, 'K01', 'ab');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `image` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `image`, `password`, `role_id`, `date_created`) VALUES
(1, 'Alfonso Aryando S', 'alfonso', 'face-1.jpg', '$2y$10$RvVYgo42792Sni6uvIKSieQ79XnIC72pIfdGZWYRigpRON.tGjcRC', 1, 2006);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_varietas`
--

CREATE TABLE `tbl_varietas` (
  `id_varietas` int(11) NOT NULL,
  `kode_varietas` varchar(15) NOT NULL,
  `nama_varietas` varchar(255) NOT NULL,
  `gambar` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cara_perawatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_varietas`
--

INSERT INTO `tbl_varietas` (`id_varietas`, `kode_varietas`, `nama_varietas`, `gambar`, `cara_perawatan`) VALUES
(8, 'V01', 'a', 'logo-removebg-preview_(1).png', 'ab');

-- --------------------------------------------------------

--
-- Table structure for table `t_keputusan`
--

CREATE TABLE `t_keputusan` (
  `id` int(11) NOT NULL,
  `parent` text DEFAULT NULL,
  `akar` text DEFAULT NULL,
  `keputusan` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_keputusan`
--

INSERT INTO `t_keputusan` (`id`, `parent`, `akar`, `keputusan`) VALUES
(34, '', '', 'Spesies'),
(35, '', '', 'Spesies'),
(36, '', '', 'Spesies'),
(37, '', '', 'Spesies');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_latih`
--
ALTER TABLE `data_latih`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gain`
--
ALTER TABLE `gain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rasio_gain`
--
ALTER TABLE `rasio_gain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_karakteristik`
--
ALTER TABLE `tbl_karakteristik`
  ADD PRIMARY KEY (`id_karakteristik`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_varietas`
--
ALTER TABLE `tbl_varietas`
  ADD PRIMARY KEY (`id_varietas`);

--
-- Indexes for table `t_keputusan`
--
ALTER TABLE `t_keputusan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_latih`
--
ALTER TABLE `data_latih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `gain`
--
ALTER TABLE `gain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rasio_gain`
--
ALTER TABLE `rasio_gain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_karakteristik`
--
ALTER TABLE `tbl_karakteristik`
  MODIFY `id_karakteristik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_varietas`
--
ALTER TABLE `tbl_varietas`
  MODIFY `id_varietas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_keputusan`
--
ALTER TABLE `t_keputusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
