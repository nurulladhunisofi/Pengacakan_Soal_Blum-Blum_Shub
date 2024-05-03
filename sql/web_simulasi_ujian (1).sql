-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 03:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_simulasi_ujian`
--

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `pertanyaan` text DEFAULT NULL,
  `jawaban_a` text DEFAULT NULL,
  `jawaban_b` text DEFAULT NULL,
  `jawaban_c` text DEFAULT NULL,
  `jawaban_d` text DEFAULT NULL,
  `kunci_jawaban` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `pertanyaan`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `kunci_jawaban`) VALUES
(1, 'Siapakah penemu bola lampu?', 'Tomas alpha edison', 'Louis Pasteur', 'Ada Lovelace', 'Maria Beasely', 'A'),
(2, 'Siapakah presiden ke-2 Indonesia?', 'Ir. Soekarno', 'Susilo Bambang Yudhoyono', 'B.J Habibie', 'Soeharto', 'D'),
(3, 'Di Cikotok Jawa Barat terdapat tambang komoditas yaitu...', 'Emas', 'Nikel', 'Pasir besi', 'Bauksit', 'A'),
(4, 'Sultan Ageng Tirtoyoso  melakukan perlawanan terhadap penjajah di wilayah...', 'Bandung dan Surabaya', 'Madiun dan Blitar', 'Jakarta dan Tangerang', 'Banten dan Jakarta', 'D'),
(5, 'Nama organisasi PBB yang mengurusi kesehatan dunia adalah', 'UNHCR', 'UNESCO', 'WHO', 'UNICEF', 'C'),
(7, 'Sungai terpanjang di Indonesia', 'Sungai Musi', 'Sungai Ciliwung', 'Sungai Mahakam', 'Sungai Kapuas', 'D'),
(8, 'Sebuah persegi memiliki sisi sepanjang 8 cm. Berapakah kelilingnya?', '16 cm', '24 cm', '32 cm', '64 cm', 'C'),
(9, 'Contoh perilaku hidup rukun di sekolah', 'Memberi contekan ketika ulangan kepada teman sebangku', 'Memaksa meminta uang jajan pada temannya', 'Memaafkan teman yang tidak sengaja merusakkan bukunya', 'Suka berkelahi di sekolah', 'C'),
(10, ' Rudi beragama Kristen, Budi, Imam, dan Muhammad beragama Islam mereka satu kelompok belajar di rumah. Bu guru memberikan tugas sekolah yang harus selesai pada hari senen besok. Pada hari minggu Rudi minta ijin agar ia ikut kerja kelompoknya setelah pulang dari greja. Sikap ketiga temannya yang baik adalah ', ' Marah-marah pada Rudi', 'Mempersilahkan Rudi ke Greja untuk beribadah ', 'Melarang Rudi pergi ke Greja', 'Memaksa Rudi harus ikut kerja klompok ', 'B'),
(11, 'Senjata Khas daerah kalimantan barat adalah', 'Mandau', 'Golok', 'Keris', 'Busur', 'A'),
(12, 'Berapakah hasil dari 5x(3+7)-2?', '28', '45', '48', '50', 'A'),
(13, 'What is the synonym of \"happy\"?', 'Sad', 'Angry', 'Joyful', 'Tired', 'C'),
(14, 'Choose the correct form of the verb: \"She __ to the store yesterday\"', 'Goes', 'Gone', 'Go', 'Went', 'D'),
(15, 'What is the correct form of the verb \"to be\" in the present tense for \"she\"?', 'Am', 'Is', 'Are', 'Be', 'B'),
(16, 'Alat musik tradisional Jawa yang terkenal dengan bunyinya yang lembut adalah...', 'Angklung', 'Gamelan', 'Suling', 'Kendang', 'B'),
(17, 'Lukisan yang dibuat dengan menggunakan teknik mencorek cat di atas kanvas disebut...', 'Mozaik', 'Batik', 'Aquarel', 'Mural', 'C'),
(18, 'Bagian dari tanaman yang bertanggung jawab untuk proses fotosintesis adalah...', 'Batang', 'Daun', 'Akar', 'Buah', 'B'),
(19, 'Apa yang menyebabkan bulan memiliki fase-fase seperti bulan purnama dan bulan sabit?', 'Rotasi Bumi', 'Rotasi Bulan', 'Peredaran Bumi mengelilingi Matahari', 'Peredaran Bulan mengelilingi Bumi', 'D'),
(20, 'Sebuah truk dapat membawa 8 ton barang. Jika truk tersebut sudah membawa 5 ton barang, berapa ton lagi yang dapat dibawa oleh truk tersebut?', '2 ton', '3 ton', '8 ton', '13 ton', 'A'),
(21, 'Jika suatu segitiga memiliki panjang sisi 5cm, 7cm, dan 8 cm, maka tipe segitiga tersebut adalah...', 'Segitiga sama sisi', 'Segitiga sama kaki', 'Segitiga sembarang', 'Segitiga lancip', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(8) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `token` int(10) NOT NULL,
  `level` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `token`, `level`) VALUES
(2, 'titi', 'titi', 'titi', 21448, 'User'),
(3, 'admin', 'admin', 'Akbar', 515745, 'Admin'),
(4, '661b6478718e6', '661b647871', 'sofi', 11265321, 'User'),
(5, '6625cb39e9205', '6625cb39e9', 'Akbar', 130879, 'User'),
(7, '662e84df15e7c', '662e84df15', 'Kilua', 10376, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`,`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
