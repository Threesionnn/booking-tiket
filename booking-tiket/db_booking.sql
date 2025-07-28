-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2025 pada 05.56
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_booking`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `payment_status` enum('pending','paid','cancelled') DEFAULT 'pending',
  `booking_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `schedule_id`, `total`, `payment_status`, `booking_date`) VALUES
(1, 2, 9, 120000.00, 'pending', '2025-07-06 14:04:46'),
(2, 2, 9, 120000.00, 'pending', '2025-07-06 14:05:21'),
(3, 2, 16, 96000.00, 'pending', '2025-07-06 14:49:16'),
(4, 2, 16, 96000.00, 'pending', '2025-07-06 14:50:22'),
(5, 2, 15, 96000.00, 'paid', '2025-07-06 14:55:06'),
(6, 2, 15, 96000.00, 'paid', '2025-07-06 15:07:22'),
(7, 2, 16, 96000.00, 'pending', '2025-07-06 15:12:54'),
(8, 2, 16, 48000.00, 'paid', '2025-07-06 15:50:11'),
(9, 2, 16, 48000.00, 'paid', '2025-07-06 15:57:53'),
(10, 2, 9, 120000.00, 'paid', '2025-07-06 16:08:11'),
(11, 2, 15, 48000.00, 'paid', '2025-07-06 16:30:23'),
(12, 2, 16, 48000.00, 'paid', '2025-07-06 16:32:43'),
(13, 2, 16, 48000.00, 'paid', '2025-07-06 17:09:11'),
(14, 2, 15, 48000.00, 'paid', '2025-07-06 17:16:05'),
(15, 3, 9, 120000.00, 'pending', '2025-07-06 17:29:30'),
(16, 3, 9, 60000.00, 'paid', '2025-07-06 17:40:47'),
(17, 3, 9, 120000.00, 'paid', '2025-07-06 17:41:03'),
(18, 3, 10, 65000.00, 'paid', '2025-07-06 18:07:24'),
(19, 3, 10, 65000.00, 'paid', '2025-07-06 18:12:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking_seats`
--

CREATE TABLE `booking_seats` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `seat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `booking_seats`
--

INSERT INTO `booking_seats` (`id`, `booking_id`, `seat_id`) VALUES
(2, 2, 1),
(3, 18, 391),
(4, 19, 392);

-- --------------------------------------------------------

--
-- Struktur dari tabel `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `synopsis` text DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `rating` varchar(10) DEFAULT NULL,
  `release_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `movies`
--

INSERT INTO `movies` (`id`, `title`, `synopsis`, `poster`, `genre`, `duration`, `rating`, `release_date`) VALUES
(1, 'Agak Laen', 'Empat sekawan mengelola rumah hantu yang hampir bangkrut, hingga sebuah insiden mengubah segalanya.', 'agaklaen.jpg', 'Comedy, Horror', 119, '13+', '2024-02-01'),
(2, 'Dune: Part Two', 'Paul Atreides bersatu dengan Chani dan kaum Fremen untuk membalas dendam pada konspirator yang menghancurkan keluarganya.', 'dune2.jpg', 'Sci-Fi, Action', 166, '13+', '2024-03-01'),
(3, 'Siksa Neraka', 'Kisah kakak beradik yang terseret ke neraka setelah kecelakaan dan menyaksikan balasan dari dosa-dosa mereka.', 'siksaneraka.jpg', 'Horror', 98, '17+', '2023-12-14'),
(4, 'Godzilla x Kong: The New Empire', 'Godzilla dan Kong harus bersatu untuk menghadapi ancaman kolosal yang tersembunyi di dunia kita.', 'godzillaxkong.jpg', 'Action, Sci-Fi', 115, '13+', '2024-03-27'),
(5, 'Superman', 'Clark Kent muda berusaha menyeimbangkan warisan aliennya dengan kehidupan manusianya di Smallville.', 'superman.jpg', 'Action, Superhero', 150, '13+', '2025-07-11'),
(6, 'Ipar Adalah Maut', 'Kisah nyata tentang rumah tangga yang hancur ketika seorang suami berselingkuh dengan adik iparnya sendiri.', 'iparmaut.jpg', 'Drama, Romance', 131, '17+', '2024-06-13'),
(7, 'Joker: Folie à Deux', 'Arthur Fleck menemukan teman di Arkham Asylum, Harleen Quinzel, dalam sebuah kisah musikal yang kelam dan rumit.', 'joker2.jpeg', 'Musical, Thriller', 135, '17+', '2024-10-02'),
(8, 'Wicked', 'Kisah Elphaba, seorang gadis berkulit hijau yang disalahpahami, dan perjalanannya menjadi Penyihir Jahat dari Barat.', 'wicked.jpg', 'Fantasy, Musical', 150, 'SU', '2024-11-27'),
(9, 'Badarawuhi di Desa Penari', 'Mila dan teman-temannya harus menghadapi teror entitas gaib, Badarawuhi, saat melakukan KKN di sebuah desa terpencil.', 'badarawuhi.jpg', 'Horror', 122, '13+', '2024-04-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `studio` varchar(50) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `schedules`
--

INSERT INTO `schedules` (`id`, `movie_id`, `tanggal`, `jam`, `studio`, `harga`) VALUES
(1, 1, '2026-07-05', '13:00:00', 'Studio 1', 40000.00),
(2, 1, '2026-07-06', '16:30:00', 'Studio 2', 45000.00),
(3, 2, '2026-07-06', '18:00:00', 'Studio 1', 50000.00),
(4, 2, '2026-07-07', '20:00:00', 'Studio 3', 50000.00),
(5, 3, '2026-07-05', '19:00:00', 'Studio 2', 40000.00),
(6, 3, '2026-07-08', '15:00:00', 'Studio 1', 42000.00),
(7, 4, '2025-07-07', '14:00:00', 'Studio 1', 55000.00),
(8, 4, '2025-07-09', '21:00:00', 'Studio 2', 55000.00),
(9, 5, '2025-07-11', '13:30:00', 'Studio 1', 60000.00),
(10, 5, '2025-07-12', '19:00:00', 'Studio 3', 65000.00),
(11, 6, '2026-06-13', '17:30:00', 'Studio 2', 40000.00),
(12, 6, '2026-06-15', '20:30:00', 'Studio 1', 42000.00),
(13, 7, '2025-10-02', '16:00:00', 'Studio 1', 50000.00),
(14, 7, '2025-10-03', '19:30:00', 'Studio 3', 50000.00),
(15, 8, '2025-11-27', '15:00:00', 'Studio 2', 48000.00),
(16, 8, '2025-11-28', '18:00:00', 'Studio 1', 48000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `seat_number` varchar(10) DEFAULT NULL,
  `status` enum('available','booked') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `seats`
--

INSERT INTO `seats` (`id`, `schedule_id`, `seat_number`, `status`) VALUES
(1, 1, 'A1', 'available'),
(2, 1, 'A2', 'available'),
(3, 1, 'A3', 'available'),
(4, 1, 'A4', 'available'),
(5, 1, 'A5', 'available'),
(6, 1, 'A6', 'available'),
(7, 1, 'A7', 'available'),
(8, 1, 'A8', 'available'),
(9, 1, 'B1', 'available'),
(10, 1, 'B2', 'available'),
(11, 1, 'B3', 'available'),
(12, 1, 'B4', 'available'),
(13, 1, 'B5', 'available'),
(14, 1, 'B6', 'available'),
(15, 1, 'B7', 'available'),
(16, 1, 'B8', 'available'),
(17, 1, 'C1', 'available'),
(18, 1, 'C2', 'available'),
(19, 1, 'C3', 'available'),
(20, 1, 'C4', 'available'),
(21, 1, 'C5', 'available'),
(22, 1, 'C6', 'available'),
(23, 1, 'C7', 'available'),
(24, 1, 'C8', 'available'),
(25, 1, 'D1', 'available'),
(26, 1, 'D2', 'available'),
(27, 1, 'D3', 'available'),
(28, 1, 'D4', 'available'),
(29, 1, 'D5', 'available'),
(30, 1, 'D6', 'available'),
(31, 1, 'D7', 'available'),
(32, 1, 'D8', 'available'),
(33, 1, 'E1', 'available'),
(34, 1, 'E2', 'available'),
(35, 1, 'E3', 'available'),
(36, 1, 'E4', 'available'),
(37, 1, 'E5', 'available'),
(38, 1, 'E6', 'available'),
(39, 1, 'E7', 'available'),
(40, 1, 'E8', 'available'),
(41, 2, 'A1', 'available'),
(42, 2, 'A2', 'available'),
(43, 2, 'A3', 'available'),
(44, 2, 'A4', 'available'),
(45, 2, 'A5', 'available'),
(46, 2, 'A6', 'available'),
(47, 2, 'A7', 'available'),
(48, 2, 'A8', 'available'),
(49, 2, 'B1', 'available'),
(50, 2, 'B2', 'available'),
(51, 2, 'B3', 'available'),
(52, 2, 'B4', 'available'),
(53, 2, 'B5', 'available'),
(54, 2, 'B6', 'available'),
(55, 2, 'B7', 'available'),
(56, 2, 'B8', 'available'),
(57, 2, 'C1', 'available'),
(58, 2, 'C2', 'available'),
(59, 2, 'C3', 'available'),
(60, 2, 'C4', 'available'),
(61, 2, 'C5', 'available'),
(62, 2, 'C6', 'available'),
(63, 2, 'C7', 'available'),
(64, 2, 'C8', 'available'),
(65, 2, 'D1', 'available'),
(66, 2, 'D2', 'available'),
(67, 2, 'D3', 'available'),
(68, 2, 'D4', 'available'),
(69, 2, 'D5', 'available'),
(70, 2, 'D6', 'available'),
(71, 2, 'D7', 'available'),
(72, 2, 'D8', 'available'),
(73, 2, 'E1', 'available'),
(74, 2, 'E2', 'available'),
(75, 2, 'E3', 'available'),
(76, 2, 'E4', 'available'),
(77, 2, 'E5', 'available'),
(78, 2, 'E6', 'available'),
(79, 2, 'E7', 'available'),
(80, 2, 'E8', 'available'),
(81, 3, 'A1', 'available'),
(82, 3, 'A2', 'available'),
(83, 3, 'A3', 'available'),
(84, 3, 'A4', 'available'),
(85, 3, 'A5', 'available'),
(86, 3, 'A6', 'available'),
(87, 3, 'A7', 'available'),
(88, 3, 'A8', 'available'),
(89, 3, 'B1', 'available'),
(90, 3, 'B2', 'available'),
(91, 3, 'B3', 'available'),
(92, 3, 'B4', 'available'),
(93, 3, 'B5', 'available'),
(94, 3, 'B6', 'available'),
(95, 3, 'B7', 'available'),
(96, 3, 'B8', 'available'),
(97, 3, 'C1', 'available'),
(98, 3, 'C2', 'available'),
(99, 3, 'C3', 'available'),
(100, 3, 'C4', 'available'),
(101, 3, 'C5', 'available'),
(102, 3, 'C6', 'available'),
(103, 3, 'C7', 'available'),
(104, 3, 'C8', 'available'),
(105, 3, 'D1', 'available'),
(106, 3, 'D2', 'available'),
(107, 3, 'D3', 'available'),
(108, 3, 'D4', 'available'),
(109, 3, 'D5', 'available'),
(110, 3, 'D6', 'available'),
(111, 3, 'D7', 'available'),
(112, 3, 'D8', 'available'),
(113, 3, 'E1', 'available'),
(114, 3, 'E2', 'available'),
(115, 3, 'E3', 'available'),
(116, 3, 'E4', 'available'),
(117, 3, 'E5', 'available'),
(118, 3, 'E6', 'available'),
(119, 3, 'E7', 'available'),
(120, 3, 'E8', 'available'),
(121, 4, 'A1', 'available'),
(122, 4, 'A2', 'available'),
(123, 4, 'A3', 'available'),
(124, 4, 'A4', 'available'),
(125, 4, 'A5', 'available'),
(126, 4, 'A6', 'available'),
(127, 4, 'A7', 'available'),
(128, 4, 'A8', 'available'),
(129, 4, 'B1', 'available'),
(130, 4, 'B2', 'available'),
(131, 4, 'B3', 'available'),
(132, 4, 'B4', 'available'),
(133, 4, 'B5', 'available'),
(134, 4, 'B6', 'available'),
(135, 4, 'B7', 'available'),
(136, 4, 'B8', 'available'),
(137, 4, 'C1', 'available'),
(138, 4, 'C2', 'available'),
(139, 4, 'C3', 'available'),
(140, 4, 'C4', 'available'),
(141, 4, 'C5', 'available'),
(142, 4, 'C6', 'available'),
(143, 4, 'C7', 'available'),
(144, 4, 'C8', 'available'),
(145, 4, 'D1', 'available'),
(146, 4, 'D2', 'available'),
(147, 4, 'D3', 'available'),
(148, 4, 'D4', 'available'),
(149, 4, 'D5', 'available'),
(150, 4, 'D6', 'available'),
(151, 4, 'D7', 'available'),
(152, 4, 'D8', 'available'),
(153, 4, 'E1', 'available'),
(154, 4, 'E2', 'available'),
(155, 4, 'E3', 'available'),
(156, 4, 'E4', 'available'),
(157, 4, 'E5', 'available'),
(158, 4, 'E6', 'available'),
(159, 4, 'E7', 'available'),
(160, 4, 'E8', 'available'),
(161, 5, 'A1', 'available'),
(162, 5, 'A2', 'available'),
(163, 5, 'A3', 'available'),
(164, 5, 'A4', 'available'),
(165, 5, 'A5', 'available'),
(166, 5, 'A6', 'available'),
(167, 5, 'A7', 'available'),
(168, 5, 'A8', 'available'),
(169, 5, 'B1', 'available'),
(170, 5, 'B2', 'available'),
(171, 5, 'B3', 'available'),
(172, 5, 'B4', 'available'),
(173, 5, 'B5', 'available'),
(174, 5, 'B6', 'available'),
(175, 5, 'B7', 'available'),
(176, 5, 'B8', 'available'),
(177, 5, 'C1', 'available'),
(178, 5, 'C2', 'available'),
(179, 5, 'C3', 'available'),
(180, 5, 'C4', 'available'),
(181, 5, 'C5', 'available'),
(182, 5, 'C6', 'available'),
(183, 5, 'C7', 'available'),
(184, 5, 'C8', 'available'),
(185, 5, 'D1', 'available'),
(186, 5, 'D2', 'available'),
(187, 5, 'D3', 'available'),
(188, 5, 'D4', 'available'),
(189, 5, 'D5', 'available'),
(190, 5, 'D6', 'available'),
(191, 5, 'D7', 'available'),
(192, 5, 'D8', 'available'),
(193, 5, 'E1', 'available'),
(194, 5, 'E2', 'available'),
(195, 5, 'E3', 'available'),
(196, 5, 'E4', 'available'),
(197, 5, 'E5', 'available'),
(198, 5, 'E6', 'available'),
(199, 5, 'E7', 'available'),
(200, 5, 'E8', 'available'),
(201, 6, 'A1', 'available'),
(202, 6, 'A2', 'available'),
(203, 6, 'A3', 'available'),
(204, 6, 'A4', 'available'),
(205, 6, 'A5', 'available'),
(206, 6, 'A6', 'available'),
(207, 6, 'A7', 'available'),
(208, 6, 'A8', 'available'),
(209, 6, 'B1', 'available'),
(210, 6, 'B2', 'available'),
(211, 6, 'B3', 'available'),
(212, 6, 'B4', 'available'),
(213, 6, 'B5', 'available'),
(214, 6, 'B6', 'available'),
(215, 6, 'B7', 'available'),
(216, 6, 'B8', 'available'),
(217, 6, 'C1', 'available'),
(218, 6, 'C2', 'available'),
(219, 6, 'C3', 'available'),
(220, 6, 'C4', 'available'),
(221, 6, 'C5', 'available'),
(222, 6, 'C6', 'available'),
(223, 6, 'C7', 'available'),
(224, 6, 'C8', 'available'),
(225, 6, 'D1', 'available'),
(226, 6, 'D2', 'available'),
(227, 6, 'D3', 'available'),
(228, 6, 'D4', 'available'),
(229, 6, 'D5', 'available'),
(230, 6, 'D6', 'available'),
(231, 6, 'D7', 'available'),
(232, 6, 'D8', 'available'),
(233, 6, 'E1', 'available'),
(234, 6, 'E2', 'available'),
(235, 6, 'E3', 'available'),
(236, 6, 'E4', 'available'),
(237, 6, 'E5', 'available'),
(238, 6, 'E6', 'available'),
(239, 6, 'E7', 'available'),
(240, 6, 'E8', 'available'),
(241, 7, 'A1', 'available'),
(242, 7, 'A2', 'available'),
(243, 7, 'A3', 'available'),
(244, 7, 'A4', 'available'),
(245, 7, 'A5', 'available'),
(246, 7, 'A6', 'available'),
(247, 7, 'A7', 'available'),
(248, 7, 'A8', 'available'),
(249, 7, 'B1', 'available'),
(250, 7, 'B2', 'available'),
(251, 7, 'B3', 'available'),
(252, 7, 'B4', 'available'),
(253, 7, 'B5', 'available'),
(254, 7, 'B6', 'available'),
(255, 7, 'B7', 'available'),
(256, 7, 'B8', 'available'),
(257, 7, 'C1', 'available'),
(258, 7, 'C2', 'available'),
(259, 7, 'C3', 'available'),
(260, 7, 'C4', 'available'),
(261, 7, 'C5', 'available'),
(262, 7, 'C6', 'available'),
(263, 7, 'C7', 'available'),
(264, 7, 'C8', 'available'),
(265, 7, 'D1', 'available'),
(266, 7, 'D2', 'available'),
(267, 7, 'D3', 'available'),
(268, 7, 'D4', 'available'),
(269, 7, 'D5', 'available'),
(270, 7, 'D6', 'available'),
(271, 7, 'D7', 'available'),
(272, 7, 'D8', 'available'),
(273, 7, 'E1', 'available'),
(274, 7, 'E2', 'available'),
(275, 7, 'E3', 'available'),
(276, 7, 'E4', 'available'),
(277, 7, 'E5', 'available'),
(278, 7, 'E6', 'available'),
(279, 7, 'E7', 'available'),
(280, 7, 'E8', 'available'),
(281, 8, 'A1', 'available'),
(282, 8, 'A2', 'available'),
(283, 8, 'A3', 'available'),
(284, 8, 'A4', 'available'),
(285, 8, 'A5', 'available'),
(286, 8, 'A6', 'available'),
(287, 8, 'A7', 'available'),
(288, 8, 'A8', 'available'),
(289, 8, 'B1', 'available'),
(290, 8, 'B2', 'available'),
(291, 8, 'B3', 'available'),
(292, 8, 'B4', 'available'),
(293, 8, 'B5', 'available'),
(294, 8, 'B6', 'available'),
(295, 8, 'B7', 'available'),
(296, 8, 'B8', 'available'),
(297, 8, 'C1', 'available'),
(298, 8, 'C2', 'available'),
(299, 8, 'C3', 'available'),
(300, 8, 'C4', 'available'),
(301, 8, 'C5', 'available'),
(302, 8, 'C6', 'available'),
(303, 8, 'C7', 'available'),
(304, 8, 'C8', 'available'),
(305, 8, 'D1', 'available'),
(306, 8, 'D2', 'available'),
(307, 8, 'D3', 'available'),
(308, 8, 'D4', 'available'),
(309, 8, 'D5', 'available'),
(310, 8, 'D6', 'available'),
(311, 8, 'D7', 'available'),
(312, 8, 'D8', 'available'),
(313, 8, 'E1', 'available'),
(314, 8, 'E2', 'available'),
(315, 8, 'E3', 'available'),
(316, 8, 'E4', 'available'),
(317, 8, 'E5', 'available'),
(318, 8, 'E6', 'available'),
(319, 8, 'E7', 'available'),
(320, 8, 'E8', 'available'),
(321, 9, 'A1', 'available'),
(322, 9, 'A2', 'available'),
(323, 9, 'A3', 'available'),
(324, 9, 'A4', 'available'),
(325, 9, 'A5', 'available'),
(326, 9, 'A6', 'available'),
(327, 9, 'A7', 'available'),
(328, 9, 'A8', 'available'),
(329, 9, 'B1', 'available'),
(330, 9, 'B2', 'available'),
(331, 9, 'B3', 'available'),
(332, 9, 'B4', 'available'),
(333, 9, 'B5', 'available'),
(334, 9, 'B6', 'available'),
(335, 9, 'B7', 'available'),
(336, 9, 'B8', 'available'),
(337, 9, 'C1', 'available'),
(338, 9, 'C2', 'available'),
(339, 9, 'C3', 'available'),
(340, 9, 'C4', 'available'),
(341, 9, 'C5', 'available'),
(342, 9, 'C6', 'available'),
(343, 9, 'C7', 'available'),
(344, 9, 'C8', 'available'),
(345, 9, 'D1', 'available'),
(346, 9, 'D2', 'available'),
(347, 9, 'D3', 'available'),
(348, 9, 'D4', 'available'),
(349, 9, 'D5', 'available'),
(350, 9, 'D6', 'available'),
(351, 9, 'D7', 'available'),
(352, 9, 'D8', 'available'),
(353, 9, 'E1', 'available'),
(354, 9, 'E2', 'available'),
(355, 9, 'E3', 'available'),
(356, 9, 'E4', 'available'),
(357, 9, 'E5', 'available'),
(358, 9, 'E6', 'available'),
(359, 9, 'E7', 'available'),
(360, 9, 'E8', 'available'),
(361, 10, 'A1', 'available'),
(362, 10, 'A2', 'available'),
(363, 10, 'A3', 'available'),
(364, 10, 'A4', 'available'),
(365, 10, 'A5', 'available'),
(366, 10, 'A6', 'available'),
(367, 10, 'A7', 'available'),
(368, 10, 'A8', 'available'),
(369, 10, 'B1', 'available'),
(370, 10, 'B2', 'available'),
(371, 10, 'B3', 'available'),
(372, 10, 'B4', 'available'),
(373, 10, 'B5', 'available'),
(374, 10, 'B6', 'available'),
(375, 10, 'B7', 'available'),
(376, 10, 'B8', 'available'),
(377, 10, 'C1', 'available'),
(378, 10, 'C2', 'available'),
(379, 10, 'C3', 'available'),
(380, 10, 'C4', 'available'),
(381, 10, 'C5', 'available'),
(382, 10, 'C6', 'available'),
(383, 10, 'C7', 'available'),
(384, 10, 'C8', 'available'),
(385, 10, 'D1', 'available'),
(386, 10, 'D2', 'available'),
(387, 10, 'D3', 'available'),
(388, 10, 'D4', 'available'),
(389, 10, 'D5', 'available'),
(390, 10, 'D6', 'available'),
(391, 10, 'D7', 'booked'),
(392, 10, 'D8', 'booked'),
(393, 10, 'E1', 'available'),
(394, 10, 'E2', 'available'),
(395, 10, 'E3', 'available'),
(396, 10, 'E4', 'available'),
(397, 10, 'E5', 'available'),
(398, 10, 'E6', 'available'),
(399, 10, 'E7', 'available'),
(400, 10, 'E8', 'available'),
(401, 11, 'A1', 'available'),
(402, 11, 'A2', 'available'),
(403, 11, 'A3', 'available'),
(404, 11, 'A4', 'available'),
(405, 11, 'A5', 'available'),
(406, 11, 'A6', 'available'),
(407, 11, 'A7', 'available'),
(408, 11, 'A8', 'available'),
(409, 11, 'B1', 'available'),
(410, 11, 'B2', 'available'),
(411, 11, 'B3', 'available'),
(412, 11, 'B4', 'available'),
(413, 11, 'B5', 'available'),
(414, 11, 'B6', 'available'),
(415, 11, 'B7', 'available'),
(416, 11, 'B8', 'available'),
(417, 11, 'C1', 'available'),
(418, 11, 'C2', 'available'),
(419, 11, 'C3', 'available'),
(420, 11, 'C4', 'available'),
(421, 11, 'C5', 'available'),
(422, 11, 'C6', 'available'),
(423, 11, 'C7', 'available'),
(424, 11, 'C8', 'available'),
(425, 11, 'D1', 'available'),
(426, 11, 'D2', 'available'),
(427, 11, 'D3', 'available'),
(428, 11, 'D4', 'available'),
(429, 11, 'D5', 'available'),
(430, 11, 'D6', 'available'),
(431, 11, 'D7', 'available'),
(432, 11, 'D8', 'available'),
(433, 11, 'E1', 'available'),
(434, 11, 'E2', 'available'),
(435, 11, 'E3', 'available'),
(436, 11, 'E4', 'available'),
(437, 11, 'E5', 'available'),
(438, 11, 'E6', 'available'),
(439, 11, 'E7', 'available'),
(440, 11, 'E8', 'available'),
(441, 12, 'A1', 'available'),
(442, 12, 'A2', 'available'),
(443, 12, 'A3', 'available'),
(444, 12, 'A4', 'available'),
(445, 12, 'A5', 'available'),
(446, 12, 'A6', 'available'),
(447, 12, 'A7', 'available'),
(448, 12, 'A8', 'available'),
(449, 12, 'B1', 'available'),
(450, 12, 'B2', 'available'),
(451, 12, 'B3', 'available'),
(452, 12, 'B4', 'available'),
(453, 12, 'B5', 'available'),
(454, 12, 'B6', 'available'),
(455, 12, 'B7', 'available'),
(456, 12, 'B8', 'available'),
(457, 12, 'C1', 'available'),
(458, 12, 'C2', 'available'),
(459, 12, 'C3', 'available'),
(460, 12, 'C4', 'available'),
(461, 12, 'C5', 'available'),
(462, 12, 'C6', 'available'),
(463, 12, 'C7', 'available'),
(464, 12, 'C8', 'available'),
(465, 12, 'D1', 'available'),
(466, 12, 'D2', 'available'),
(467, 12, 'D3', 'available'),
(468, 12, 'D4', 'available'),
(469, 12, 'D5', 'available'),
(470, 12, 'D6', 'available'),
(471, 12, 'D7', 'available'),
(472, 12, 'D8', 'available'),
(473, 12, 'E1', 'available'),
(474, 12, 'E2', 'available'),
(475, 12, 'E3', 'available'),
(476, 12, 'E4', 'available'),
(477, 12, 'E5', 'available'),
(478, 12, 'E6', 'available'),
(479, 12, 'E7', 'available'),
(480, 12, 'E8', 'available'),
(481, 13, 'A1', 'available'),
(482, 13, 'A2', 'available'),
(483, 13, 'A3', 'available'),
(484, 13, 'A4', 'available'),
(485, 13, 'A5', 'available'),
(486, 13, 'A6', 'available'),
(487, 13, 'A7', 'available'),
(488, 13, 'A8', 'available'),
(489, 13, 'B1', 'available'),
(490, 13, 'B2', 'available'),
(491, 13, 'B3', 'available'),
(492, 13, 'B4', 'available'),
(493, 13, 'B5', 'available'),
(494, 13, 'B6', 'available'),
(495, 13, 'B7', 'available'),
(496, 13, 'B8', 'available'),
(497, 13, 'C1', 'available'),
(498, 13, 'C2', 'available'),
(499, 13, 'C3', 'available'),
(500, 13, 'C4', 'available'),
(501, 13, 'C5', 'available'),
(502, 13, 'C6', 'available'),
(503, 13, 'C7', 'available'),
(504, 13, 'C8', 'available'),
(505, 13, 'D1', 'available'),
(506, 13, 'D2', 'available'),
(507, 13, 'D3', 'available'),
(508, 13, 'D4', 'available'),
(509, 13, 'D5', 'available'),
(510, 13, 'D6', 'available'),
(511, 13, 'D7', 'available'),
(512, 13, 'D8', 'available'),
(513, 13, 'E1', 'available'),
(514, 13, 'E2', 'available'),
(515, 13, 'E3', 'available'),
(516, 13, 'E4', 'available'),
(517, 13, 'E5', 'available'),
(518, 13, 'E6', 'available'),
(519, 13, 'E7', 'available'),
(520, 13, 'E8', 'available'),
(521, 14, 'A1', 'available'),
(522, 14, 'A2', 'available'),
(523, 14, 'A3', 'available'),
(524, 14, 'A4', 'available'),
(525, 14, 'A5', 'available'),
(526, 14, 'A6', 'available'),
(527, 14, 'A7', 'available'),
(528, 14, 'A8', 'available'),
(529, 14, 'B1', 'available'),
(530, 14, 'B2', 'available'),
(531, 14, 'B3', 'available'),
(532, 14, 'B4', 'available'),
(533, 14, 'B5', 'available'),
(534, 14, 'B6', 'available'),
(535, 14, 'B7', 'available'),
(536, 14, 'B8', 'available'),
(537, 14, 'C1', 'available'),
(538, 14, 'C2', 'available'),
(539, 14, 'C3', 'available'),
(540, 14, 'C4', 'available'),
(541, 14, 'C5', 'available'),
(542, 14, 'C6', 'available'),
(543, 14, 'C7', 'available'),
(544, 14, 'C8', 'available'),
(545, 14, 'D1', 'available'),
(546, 14, 'D2', 'available'),
(547, 14, 'D3', 'available'),
(548, 14, 'D4', 'available'),
(549, 14, 'D5', 'available'),
(550, 14, 'D6', 'available'),
(551, 14, 'D7', 'available'),
(552, 14, 'D8', 'available'),
(553, 14, 'E1', 'available'),
(554, 14, 'E2', 'available'),
(555, 14, 'E3', 'available'),
(556, 14, 'E4', 'available'),
(557, 14, 'E5', 'available'),
(558, 14, 'E6', 'available'),
(559, 14, 'E7', 'available'),
(560, 14, 'E8', 'available'),
(561, 15, 'A1', 'available'),
(562, 15, 'A2', 'available'),
(563, 15, 'A3', 'available'),
(564, 15, 'A4', 'available'),
(565, 15, 'A5', 'available'),
(566, 15, 'A6', 'available'),
(567, 15, 'A7', 'available'),
(568, 15, 'A8', 'available'),
(569, 15, 'B1', 'available'),
(570, 15, 'B2', 'available'),
(571, 15, 'B3', 'available'),
(572, 15, 'B4', 'available'),
(573, 15, 'B5', 'available'),
(574, 15, 'B6', 'available'),
(575, 15, 'B7', 'available'),
(576, 15, 'B8', 'available'),
(577, 15, 'C1', 'available'),
(578, 15, 'C2', 'available'),
(579, 15, 'C3', 'available'),
(580, 15, 'C4', 'available'),
(581, 15, 'C5', 'available'),
(582, 15, 'C6', 'available'),
(583, 15, 'C7', 'available'),
(584, 15, 'C8', 'available'),
(585, 15, 'D1', 'available'),
(586, 15, 'D2', 'available'),
(587, 15, 'D3', 'available'),
(588, 15, 'D4', 'available'),
(589, 15, 'D5', 'available'),
(590, 15, 'D6', 'available'),
(591, 15, 'D7', 'available'),
(592, 15, 'D8', 'available'),
(593, 15, 'E1', 'available'),
(594, 15, 'E2', 'available'),
(595, 15, 'E3', 'available'),
(596, 15, 'E4', 'available'),
(597, 15, 'E5', 'available'),
(598, 15, 'E6', 'available'),
(599, 15, 'E7', 'available'),
(600, 15, 'E8', 'available'),
(601, 16, 'A1', 'available'),
(602, 16, 'A2', 'available'),
(603, 16, 'A3', 'available'),
(604, 16, 'A4', 'available'),
(605, 16, 'A5', 'available'),
(606, 16, 'A6', 'available'),
(607, 16, 'A7', 'available'),
(608, 16, 'A8', 'available'),
(609, 16, 'B1', 'available'),
(610, 16, 'B2', 'available'),
(611, 16, 'B3', 'available'),
(612, 16, 'B4', 'available'),
(613, 16, 'B5', 'available'),
(614, 16, 'B6', 'available'),
(615, 16, 'B7', 'available'),
(616, 16, 'B8', 'available'),
(617, 16, 'C1', 'available'),
(618, 16, 'C2', 'available'),
(619, 16, 'C3', 'available'),
(620, 16, 'C4', 'available'),
(621, 16, 'C5', 'available'),
(622, 16, 'C6', 'available'),
(623, 16, 'C7', 'available'),
(624, 16, 'C8', 'available'),
(625, 16, 'D1', 'available'),
(626, 16, 'D2', 'available'),
(627, 16, 'D3', 'available'),
(628, 16, 'D4', 'available'),
(629, 16, 'D5', 'available'),
(630, 16, 'D6', 'available'),
(631, 16, 'D7', 'available'),
(632, 16, 'D8', 'available'),
(633, 16, 'E1', 'available'),
(634, 16, 'E2', 'available'),
(635, 16, 'E3', 'available'),
(636, 16, 'E4', 'available'),
(637, 16, 'E5', 'available'),
(638, 16, 'E6', 'available'),
(639, 16, 'E7', 'available'),
(640, 16, 'E8', 'available');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(2, 'Mike', 'Sionyehezkiel16@gmail.com', '$2y$10$478BuKP/u/zTyWNEaQ0a7e0LbfeDhf3Yc.bDR16XCYVmtxb9JzB5q', 'user'),
(3, 'Sion Yehezkiel', 'Augeerms@gmail.com', '$2y$10$HF.LWtMRkyZGTLuXpl.zdus1zgBY9QZB39ZWXW45OxosjzdG/BgQm', 'user'),
(4, 'Thresson', 'lithiumnner17@gmail.com', '$2y$10$2A0UGyj70LP5.KIHsyhRueGnMnOBRRlMqrNKuPXzysIYAKmbLv6Iu', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- Indeks untuk tabel `booking_seats`
--
ALTER TABLE `booking_seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `seat_id` (`seat_id`);

--
-- Indeks untuk tabel `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indeks untuk tabel `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `booking_seats`
--
ALTER TABLE `booking_seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=641;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `booking_seats`
--
ALTER TABLE `booking_seats`
  ADD CONSTRAINT `booking_seats_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_seats_ibfk_2` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
