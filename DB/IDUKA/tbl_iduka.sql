-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Nov 2020 pada 13.19
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_data`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_iduka`
--

CREATE TABLE `tbl_iduka`
(
  `id` int
(11) NOT NULL,
  `iduka` varchar
(128) NOT NULL,
  `alamat` text NOT NULL,
  `jurusan` varchar
(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_iduka`
--

INSERT INTO `tbl_iduka` (`
id`,
`iduka
`, `alamat`, `jurusan`) VALUES
(1, 'ADIT MOTOR', 'Pandanan Semin', 'TKRO'),
(2, 'AL- H.RALLY AUTO CAR', 'Jl. Wonosari Yogya Km 3 Siyono', 'TKRO'),
(3, 'BARES MOTOR', 'Munggi Pasar, 04/31 Semanu, Semanu', 'TKRO'),
(4, 'BAS AUTO SERVICE', 'Jl. Karangmojo Semin Km 1 Gunungkidul', 'TKRO'),
(5, 'BENGKEL ADI', 'Jl Ario Putro  No 60 Rt 002/03 Sarua Indah Ciputat', 'TKRO'),
(6, 'BENGKEL LATANZA AUTO', 'Jl Sumber Agung, Tawarsari 02/18, Wonosari,  Gunungkidul, Yogyakarta', 'TKRO'),
(7, 'BENGKEL MITRA ASTON', 'Kajar II  RT.03/09', 'TKRO'),
(8, 'BENGKEL MORRIS', 'Jl. Pleret Km 1 Besalen Bantul', 'TKRO'),
(9, 'BENGKEL WISTARA PERFORMNCE', 'Jl Godean Km 4 Yogyakarta', 'TKRO'),
(10, 'BM ART GARAGE', 'Jl.Jetis,Jetis, Wedomartani, Ngemplak, Sleman, Daerah Istimewa Yogyakarta', 'TKRO'),
(11, 'BM DITTO MOTOR', 'Wanujoyo Kidul, Srimartani, Piyungan Bantul', 'TKRO'),
(12, 'BM GALANG MOTOR', 'Tawarsari Wonosari', 'TKRO'),
(13, 'BM JAYA MOTOR', 'Karangduwet, Karangrejek Wonosari', 'TKRO'),
(14, 'BM MARANATA ', 'Cendolan Pundungsari Semin', 'TKRO'),
(15, 'BM PUSPA INDAH', 'Karangmojo I Karangmojo Gunungkidul', 'TKRO'),
(16, 'BM SEDYO RUKUN', 'Jl. Tentara Pelajar No. 40 Wonosari Gk', 'TKRO'),
(17, 'BM. GOTREK AUTO', 'Jl. Kyai Legi Kepek Wonosari Gunungkidul', 'TKRO'),
(18, 'BM. MBAH RUD', 'JL. Karangmojo-Ponjong, Karangmojo 1, Karangmojo, Gunungkidul', 'TKRO'),
(19, 'BM. MITRA AUTO CAR SERVICE', 'Jl, Raya Bakungan, No 46, Wedomertani, Ngemplak, Sleman, Yogyakarta', 'TKRO'),
(20, 'BM. SETIA MOTOR', 'Jl. Kyai Legi Siyono Wetan Logandeng Playen, Gunungkidul', 'TKRO'),
(21, 'BM. SS AUTO', 'Clorot Semanu Gunungkidul', 'TKRO'),
(22, 'DHEA MOTOR', 'Keringan Kidul Bulurejo Semin', 'TKRO'),
(23, 'GEMBONG JAYA VW', 'Sendari Tirtoadi Mlati Sleman', 'TKRO'),
(24, 'HERU BINTANG MOTOR', 'Jambe Rt 02/01 MlopoharjoWuryantoro Wonogiri', 'TKRO'),
(25, 'HUMAM MOTOR', 'Sambeng II SAMBIREJO Ngawen GK', 'TKRO'),
(26, 'HYUNDAY YOGYAKARTA', 'PT SUMBER BARU CITRA MOBIL  YK', 'TKRO'),
(27, 'KENCANA MOTOR WONOGIRI', 'Jl Jendral Sudirman 111Wonogiri', 'TKRO'),
(28, 'MAESTRO BENGKEL', 'Jl raya Janti No 263 Yogyakarta', 'TKRO'),
(29, 'MAJU MAPAN AUTO CAR', 'Jl. Ring Rood Selatan Seneng Siraman Wonosari Gk', 'TKRO'),
(30, 'NISSAN DATSUN MLATI', 'Jl. Magelang Km 10, Bangunrejo, Tridadi, Sleman, Yogyakarta', 'TKRO'),
(31, 'PT CALINDO', 'Jl, Wonosari Baron, Km 15, Jenglot Pucanganom Rongkop', 'TKRO'),
(32, 'PT ROSALIA INDAH', 'Jl Raya Semin Gunungkidul', 'TKRO'),
(33, 'PT SANOH INDONESIA', 'Jl Inti IIBlok C-4, N0.10 Kawasan Industri HYUNDAY ', 'TKRO'),
(34, 'PT SUMBER BARU TRADA ', 'Jl Ringroad Aselatan Sewon Bantul', 'TKRO'),
(35, 'PT.ROSALIA INDAH', 'Semin Semin Gunungkidul', 'TKRO'),
(36, 'SABAR BARU MOTOR', 'Keringan Lor Semin Gunungkidul', 'TKRO'),
(37, 'SAHABAT MOTOR ', 'Watukelir Sukoharjo', 'TKRO'),
(38, 'SARINO MOTOR', 'Jl Wonogiri Baturetno Wonogiri', 'TKRO'),
(39, 'TIBO URIP TRANSPORT', 'Jl. Ring Rood Selatan, Wonosari', 'TKRO'),
(40, 'VIKKY JAYA', 'Karangmojo 1 Karangmojo Gunungkidul', 'TKRO'),
(41, 'YULIA MOBILINDO PERKASA', 'Jl. Sisingamangaraja No 70 Yogyakarta', 'TKRO'),
(42, 'BALAI PEMASYARAKATAN KELAS II WONOSARI', 'Jl. Mgr Soegiyo Pranoto No. 37 Wonosari, Gunungkidul', 'AKL'),
(43, 'BANK MINI MOEKA', 'SMK Muhammadiyah Karangmojo', 'AKL'),
(44, 'BMT DANA INSANI PONJONG', 'Kerjo II Genjahan Ponjong, Gunungkidul', 'AKL'),
(45, 'BMT MANDIRI', 'Jl. Wonosari Semin Jlantir Gedangrejo', 'AKL'),
(46, 'BMT MITRA AMANAH ', 'Semanu Semanu Gunungkidul', 'AKL'),
(47, 'BPN Kabupaten Gunungkidul', 'Jl. Kidemang Wonopawiro Lingkar Utara Piyaman , Gunungkidul', 'AKL'),
(48, 'DIN KEBUD Kab. Gk', 'Komplek Bangsal Sewoko Projo Wonosari', 'AKL'),
(49, 'DIPERINDAG ', 'Jl Brigjen Katamso No 1 Wonosari ', 'AKL'),
(50, 'KANTOR POS WONOSARI YOGYAKARTA', 'Jl. Brigjen Katamso No 12 Wonosari Gunungkidul', 'AKL'),
(51, 'KJKS BMT MANDIRI', 'Jl. Wonosari - Semin Jlantir 1 Gedangrejo Karangmojo, Gunungkidul', 'AKL'),
(52, 'KJKS PERMATA', 'Jl Karangmojo Wonosari Km 2 Wiladeg Krmojo', 'AKL'),
(53, 'KOPERASI JASA KEUANGAN SYARIAH PERMATA', 'Jl. Wonosari-Karangmojo Km.2 Wiladeg Karangmojo, Gunungkidul', 'AKL'),
(54, 'KOPERASI UNIT DESA BHINA REJEKI', 'Plumbungan Gedangrejo Karangmojo, Gunungkidul', 'AKL'),
(55, 'KP-RI \"TEGAK\"  KARANGMOJO,GUNUNGKIDUL', 'Gedangan Gedangrejo Karangmojo, Gunungkidul', 'AKL'),
(56, 'KP-RI BANGUN', 'Jl. Kol. Sugiono No 5 Wonosari Gunungkidul', 'AKL'),
(57, 'KSU JABAL TARIK', 'Jl. Karangmojo Ponjong Km 0.5 Karangmojo Gunungkidul', 'AKL'),
(58, 'PKP-RI Kabupaten Gunungkidul', 'Jl. Pramuka Gg.Pudak No. 16 Wonosari, Gunungkidul', 'AKL'),
(59, 'PRIMKOP KARTIKA B-08', 'Jl. Kesatrian no .3 Wonosari Gk', 'AKL'),
(60, 'PT BPRS MAM  CAB. WONOSARI', 'Jl. Kh. Agus Salim No 74 Kepek wonosari, Gunungkidul', 'AKL'),
(61, 'SEKRETARIAT DPRD KABUPATEN GUNUNGKIDUL', 'Jl. Brigjen Katamso No 12 Wonosari Gunungkidul', 'AKL'),
(62, 'UDB PPM KECAMATAN PONJONG, GUNUNGKIDUL', 'Jl. Jendral Sudirman Kerjo 1, Genjahan Ponjong Gunungkidul', 'AKL'),
(63, 'UPK MAKMUR KARANGMOJO', 'Jl.Karangmojo -Ponjong Km 0,5 , Karangmojo 1, Karangmojo, Gunungkidul', 'AKL'),
(64, 'UPK PONJONG', 'Jl. Jendral Sudirman, Kerjo Genjahan Ponjong', 'AKL'),
(65, 'DINAS KESEHATAN KABUPATEN GUNUNGKIDUL', 'Jl. Kolonel Sugiyono No 17 Wonosari, Gunungkidul', 'OTKP'),
(66, 'DINAS PEKERJAAN UMUM, PERUMAHAN RAKYAT DAN KAWASAN PERMUKIMAN', 'Jl. Brigjen Katamso NO. 2, Wonosari, Gunungkidul', 'OTKP'),
(67, 'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU GUNUNGKIDUL', 'Jl. Kesatrian No 38 Wonosari, Gunungkidul', 'OTKP'),
(68, 'DINAS PENDIDIKAN PEMUDA DAN OLAHRAGA KABUPATEN GUNUNGKIDUL', 'Jl Pemuda No. 32 Baleharjo Wonosari, Gunungkidul', 'OTKP'),
(69, 'DINAS PERPUSTAKAAN DAN ARSIP DAERAH', 'Jl. Kolonel Sugiyono No. 35 Wonosari, Gunungkidul', 'OTKP'),
(70, 'DPUPRKP', 'Jl. Brigjen katamso No 2 Wonosari', 'OTKP'),
(71, 'KANTOR KECAMATAN KARANGMOJO', 'Jl. Karangmojo Wonosari Km 1 Gedangrejo Karangmojo, Gunungkidul', 'OTKP'),
(72, 'KANTOR KECAMATAN PONJONG', 'Sumber Kidul, Ponjong, Ponjong, Gunungkidul', 'OTKP'),
(73, 'KANTOR POS PONJONG', 'Jl. Sultan Agung No.46.Kerjo II Genjahan Ponjong, Gunungkidul', 'OTKP'),
(74, 'KANTOR POS SEMIN KABUPATEN GUNUNGKIDUL', 'Jl Semin - Wonosari, Semin Gunungkidul', 'OTKP'),
(75, 'KANTOR SEKRETARIAT DAERAH KABUPATEN GUNUNGKIDUL', 'Jl. Brigjen Katamso 1 Wonosari, Gunungkidul', 'OTKP'),
(76, 'KANTOR URUSAN AGAMA  KECAMATAN SEMANU KABUPATEN GUNUNGKIDUL (KUA)', 'Ngebrak Barat, Semanu Kabupaten , Gunungkidul', 'OTKP'),
(77, 'KANTOR URUSAN AGAMA KECAMATAN KARANGMOJO (KUA)', 'Jl. Srimpi Karangmojo - Karangmojo, Gunungkidul', 'OTKP'),
(78, 'KEC. Semanu ', 'Jl Jendral Sudirman No 4 Semanu Gunungkidul', 'OTKP'),
(79, 'KEJAKSAAN NEGERI WONOSARI GUNUNGKIDUL', 'Jl. Mgr. Sugiyo Pranoto No. 10 Wonosari Gunungkidul', 'OTKP'),
(80, 'KEMENTERIAN AGAMA KABUPATEN GUNUNGKIDUL', 'Jl. Brigjen Katamso 13 Wonosari Gunungkidul', 'OTKP'),
(81, 'KORWILCAM BID.PENDIDIKAN KARANGMOJO', 'Plumbungan Gedangrejo Karangmojo, Gunungkidul', 'OTKP'),
(82, 'KPAD Kab Gunungkidul', 'Wonosari Wonosari Gunungkidul', 'OTKP'),
(83, 'KUA Kec. Ponjong', 'Sumberkidul Ponjong Ponjong', 'OTKP'),
(84, 'PN Wonosari Kelas II', 'Jl Taman Bhakti No 01 Wonosari Gk', 'OTKP'),
(85, 'POS INDONESIA Wonosari', ' Jl Brigjen Katamsi No 12 Wonosari', 'OTKP'),
(86, 'PUSKESMAS KRMOJO I', 'Jl Wonosari Karangmojo Km 8,1Krmojo', 'OTKP'),
(87, 'UPT PUSKESMAS PONJONG I', 'Jl. Sultan Agung No 62 Kerjo Genjahan Ponjong', 'OTKP'),
(88, 'UPT PUSKESMAS SEMANU', 'Jl Jendral Sudirman No 10 Semanu', 'OTKP'),
(89, 'AMALIA SWALAYAN', 'Pati Genjahan Ponjong', 'BDP'),
(90, 'AMANAH SRI RAHARJO', 'Warung Gedangrejo Karangmojo', 'BDP'),
(91, 'DIVA SWALAYAN KARANGMOJO', 'Plumbungan Gedangrejo Karangmojo', 'BDP'),
(92, 'DIVA SWALAYAN PONJONG', 'Genjahan Ponjong', 'BDP'),
(93, 'JUMADI SWALAYAN', 'Warung, Gedangrejo Karangmojo', 'BDP'),
(94, 'KPRI BANGUN WONOSARI', 'Jl. Kol Sugiyono no 5 Wonosari', 'BDP'),
(95, 'MOEKA MART', 'SMK MUH KARANGMOJO', 'BDP'),
(96, 'RK DISTRO', 'Selang Jl Karangmojo Wonosari km 2,5 Selang', 'BDP'),
(97, 'TOKO \" EKA\"', 'Pati Genjahan Ponjong', 'BDP'),
(98, 'TOKO ANDIKA PUTRA', 'Jl Raya Eromoko Wonogiri', 'BDP'),
(99, 'TOKO ISTANA', 'Jl Sumarwi 17 Wonosari Gunungkidul.', 'BDP'),
(100, 'TOKO ISTANA 7', 'Jl . Pangarsan No 1 Purbosari Wonosari Gunungkidul.', 'BDP'),
(101, ' DIKA MOTOR', 'Gedangan 3 Gedangrejo Karangmojo', 'TBSM'),
(102, 'ADI JAYA MOTOR', 'Selang Wetan Bendungan Karangmojo', 'TBSM'),
(103, 'AHASS FANY MOTOR', 'Jl. Jogja - Wonosari Km 7 Gading Playen', 'TBSM'),
(104, 'AQUIN MOTOR', 'Kayu walang Kelor Karangmojo', 'TBSM'),
(105, 'BENGKEL BEJO', 'Gunungsari Semin Semin', 'TBSM'),
(106, 'BMW ( BENGKEL MAS WARDI )', 'Ngepung Rt 03/14 Karangmojo Karangmojo', 'TBSM'),
(107, 'BUDI JAYA MOTOR', 'Jl. Taman Bakti Km 2 Wonosari', 'TBSM'),
(108, 'EVA MANDIRI', 'Sogo, Semanu, Semanu', 'TBSM'),
(109, 'HAR MOTOR', 'Jl. Raya Karangmojo Wonosari', 'TBSM'),
(110, 'HAYDEN MOTOR', 'Jetis Kulon Semanu Gunungkidul', 'TBSM'),
(111, 'PRATAMA JAYA MOTOR', 'Besari Siraman Wonosari', 'TBSM'),
(112, 'SUMBER BARU MOTOR', 'Jl. KH Agus Salim No 197 Kranon Kepek Wonosari', 'TBSM'),
(113, 'SUMBER BARU MOTOR KARANGMOJO', 'Karangmojo Karangmojo', 'TBSM'),
(114, 'SURYA MOTOR', 'Munggi Pasar Semanu Gunungkidul', 'TBSM');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_iduka`
--
ALTER TABLE `tbl_iduka`
ADD PRIMARY KEY
(`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_iduka`
--
ALTER TABLE `tbl_iduka`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
