-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 04:41 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wolfmania`
--

-- --------------------------------------------------------

--
-- Table structure for table `konsulltimet`
--

CREATE TABLE `konsulltimet` (
  `id` int(11) NOT NULL,
  `Emri_Konsulltimit` varchar(100) NOT NULL,
  `Lenda` varchar(30) NOT NULL,
  `Profesori` varchar(30) NOT NULL,
  `Koha_Konsulltimit` varchar(100) NOT NULL,
  `Shenimet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsulltimet`
--

INSERT INTO `konsulltimet` (`id`, `Emri_Konsulltimit`, `Lenda`, `Profesori`, `Koha_Konsulltimit`, `Shenimet`) VALUES
(2, 'Procesim i imazheve provimi 2021', 'Procesim i imazheve', 'Artan Berisha', '2021-05-21T15:00', '0'),
(3, 'Kalkulus provimi final 2021', 'Kalkulus', 'Naim Braha', '2021-05-20T16:03', 'Konsulltimet do te mbahen ne daten e caktuar. Ju lutem ejani 5 min me heret.\r\n   '),
(5, 'Konsulltimet qershor 2 Aplikacione Kompjuterike', 'Aplikacione Kompjuterike', 'Naim Braha', '2021-05-13T11:44', 'Shenime rreth dsadasdas'),
(7, 'Emri kons', 'Kalkulus 1', 'Naim Braha', '2021-05-06T15:11', 'fsadasfasda'),
(8, 'Tung123', 'Analiz Algoritmeve', 'Elver Bajrami', '2021-05-10T16:14', 'tungat123'),
(9, 'arosdasdvimi final 2021', 'Kalkulus 1', 'Artan Berisha', '2021-05-05T16:54', 'U ndryshua konsulltimi'),
(11, 'Konsulltimet qershor Aplikacione Kompjuterike', 'Aplikacione Kompjuterike', 'Naim Braha', '2021-05-12T06:22', 'qweqeqew'),
(14, 'Konsulltimi OOP & GUI ', 'Programim OOP & GUI', 'Elver Bajrami', '2021-05-27T01:55', 'Ju lutem ejani 10 min me heret'),
(15, 'Analiz Algoritmeve Konsulltimi', 'Analiz Algoritmeve', 'Elver Bajrami', '2021-05-11T16:00', 'Merrni ID me vete'),
(16, 'Provimi janar Biznisi dhe Interneti', 'Programimi WWW', 'Ermir Rugova', '2021-05-29T02:12', 'Ju lutem mos u vononi. Merreni id dhe maskat me veti perndryshe nuk lejonu.'),
(17, 'Konsulltimet diskrete nentor 2021', 'Matematika diskrete', 'Bujar Fejzullahu', '2021-06-04T17:13', 'Merrini maskat, id dhe ejani me heret');

-- --------------------------------------------------------

--
-- Table structure for table `mesazhadmin`
--

CREATE TABLE `mesazhadmin` (
  `Id` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Mesazhi` varchar(500) NOT NULL,
  `Created_At` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesazhadmin`
--

INSERT INTO `mesazhadmin` (`Id`, `Username`, `Mesazhi`, `Created_At`) VALUES
(3, 'ArtanBerisha123', 'asdasdas', '2021-05-22'),
(4, 'admin', 'adSdasdas', '2021-05-22'),
(5, 'naimBraha1', 'asdads', '2021-05-22'),
(6, 'naimBraha1', '      Shkruani mesazhin qe deshironi te dergoni Adminit\r\n      ', '2021-05-22'),
(7, 'naimBraha1', 'asdadsdsa', '2021-05-23'),
(8, 'admin', 'asdasd123', '2021-05-23'),
(9, 'admin', 'dassdasad', '2021-05-23'),
(10, 'naimBraha1', 'asdasd', '2021-05-23'),
(11, 'naimBraha1', 'Tung qysh po kalon', '2021-05-23'),
(12, 'admin', 'asdadsasd', '2021-05-23'),
(15, 'ermirrugova123a', 'Pershendetja', '2021-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `mesazhet`
--

CREATE TABLE `mesazhet` (
  `id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Teksti` varchar(255) NOT NULL,
  `Sent` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesazhet`
--

INSERT INTO `mesazhet` (`id`, `Username`, `Teksti`, `Sent`) VALUES
(4, 'userone', 'Tung qysh po kalon', '2021-05-15 23:10:49'),
(5, 'userone', 'A po ndegjon', '2021-05-15 23:10:49'),
(7, 'usertwo', 'Tung', '2021-05-15 23:10:49'),
(8, 'naimBraha1', 'Mos boni zhurm', '2021-05-15 23:10:49'),
(9, 'userone', 'Mfal professor', '2021-05-15 23:10:49'),
(10, 'userthree', 'un jam admini', '2021-05-15 23:10:49'),
(11, 'userthree', 'Kur u dergua ?', '2021-05-15 23:11:27'),
(12, 'userone', 'Tung', '2021-05-17 14:18:07'),
(13, 'userone', '       Tung\r\n       ', '2021-05-17 14:40:54'),
(14, 'userone', 'Qkemi', '2021-05-17 14:41:14'),
(16, 'userone', '       Shkruani tekstin qe deshironi te dergoni\r\n       ', '2021-05-20 22:23:52'),
(17, 'userone', '       Shkruani tekstin qe deshads', '2021-05-20 23:38:39'),
(18, 'userone', 'Qkemi', '2021-05-20 23:39:28'),
(19, 'ArtanBerisha123', 'fasdasd', '2021-05-22 01:17:00'),
(22, 'elverBajrami11', 'Tung', '2021-05-24 23:55:04'),
(23, 'lavdimKrasniqi34', 'Tung a', '2021-05-25 00:09:18'),
(24, 'ermirrugova123a', 'a', '2021-05-25 00:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `mesazhispecifik`
--

CREATE TABLE `mesazhispecifik` (
  `id` int(11) NOT NULL,
  `Username_Studenti` varchar(100) NOT NULL,
  `Username_Teacher` varchar(100) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Teksti` varchar(500) NOT NULL,
  `Derguar` datetime NOT NULL DEFAULT current_timestamp(),
  `KushDergoi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesazhispecifik`
--

INSERT INTO `mesazhispecifik` (`id`, `Username_Studenti`, `Username_Teacher`, `Title`, `Teksti`, `Derguar`, `KushDergoi`) VALUES
(1, 'userone', 'naimBraha1', 'Konsulltimet', 'DEshiroj te shtyhen konsulltimet', '2021-05-23 01:29:13', ''),
(2, 'userone', 'naimBraha1', 'Konsulltimet', 'dsadaads', '2021-05-23 01:30:21', ''),
(3, 'userone', 'naimBraha1', 'Konsulltimet', 'asfadsasd', '2021-05-23 01:31:15', ''),
(4, 'userone', 'ArtanBerisha123', 'Konsulltimet asdasd', 'as dasdas da sda sd', '2021-05-23 01:33:00', ''),
(5, 'ermirMilaimi123', 'naimBraha1', 'Mesazh personal Ermirt', 'Tung si po kaloni', '2021-05-23 02:48:11', ''),
(6, 'ermirMilaimi123', 'ermirrugova123a', 'Profesorit', 'Si po kaloni Profesor', '2021-05-23 03:14:51', ''),
(7, 'ermirMilaimi123', 'elverBajrami11', 'Profesorit asdasd', 'dsad asd asd asd QKa po alon', '2021-05-23 03:19:50', 'StT'),
(8, 'ermirMilaimi123', 'elverBajrami11', 'Mesazh personal Ermirt gna Elveri', 'Tung ermir', '2021-05-23 03:25:19', 'TtS'),
(9, 'ermirMilaimi123', 'elverBajrami11', 'Profesorit', 'dasdadssad', '2021-05-23 03:28:04', 'StT'),
(10, 'ermirMilaimi123', 'ermirrugova123a', 'Rreth Konsulltimeve', 'Miredita profesor deshiro tju pys rreth konsulltimeve', '2021-05-23 10:22:00', 'StT'),
(11, 'ermirMilaimi123', 'ermirrugova123a', 'Kthimi i mesazhit rreth konsulltimeve', 'PO konsulltimet do te mbahen ne oren e cekur', '2021-05-23 10:23:31', 'TtS'),
(12, 'ermirMilaimi123', 'naimBraha1', 'TUng', 'Tung prof', '2021-05-23 13:24:12', 'StT'),
(13, 'ermirMilaimi123', 'naimBraha1', 'Konsulltimetasdad', 'Tung si po kaloni', '2021-05-24 00:10:28', 'StT'),
(14, 'ermirMilaimi123', 'BujarFejzullahu321', 'Profesoritdsadasd', 'fasdasfasd', '2021-05-24 00:11:21', 'StT'),
(15, 'ermirMilaimi123', 'elverBajrami11', 'ProfesoritEv', 'fsadasd dasd Fa\r\n      ', '2021-05-24 00:12:47', 'StT'),
(21, 'ermirMilaimi123', 'elverBajrami11', 'Rreth Konsulltimit Analiz algoritmeve', 'I permisova gabimet qe i bera skeni nevoj te vini\r\n      ', '2021-05-25 02:01:11', 'TtS'),
(22, 'lavdimKrasniqi34', 'BujarFejzullahu321', 'Konsulltimi Teori e Gjases', 'Pershendetje profesor kur mbahet konsulltimi ne lenden Teoria e Gjases', '2021-05-25 02:05:44', 'StT'),
(23, 'lavdimKrasniqi34', 'ermirrugova123a', 'Rezultatet PWWW', 'Ju lutem ejani ne fakulltet per rez', '2021-05-25 02:11:21', 'TtS'),
(25, 'mergimHyseni99', 'ArtanBerisha123', 'Konsulltimet ne Grafik Kompjuterike', 'Miredita profesor kur do te caktohen konsulltimet ne Grafik', '2021-05-25 12:58:45', 'StT'),
(26, 'mergimHyseni99', 'BujarFejzullahu33', 'Konsulltimet ne matematik Diskrete', 'Pershendetja profesor kur do te mbahen konsulltimet ne matematik diskrete', '2021-05-25 13:03:00', 'StT'),
(27, 'mergimHyseni99', 'BujarFejzullahu33', 'Rreth mesazhit te derguar per konsulltime', 'Do te ju njoftoj krejt grupin me koh\r\n      ', '2021-05-25 13:04:37', 'TtS');

-- --------------------------------------------------------

--
-- Table structure for table `meszhipersonal`
--

CREATE TABLE `meszhipersonal` (
  `Id` int(11) NOT NULL,
  `Admin` varchar(100) NOT NULL,
  `Username_Professor` varchar(100) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Teksti` varchar(500) NOT NULL,
  `Derguar` datetime NOT NULL DEFAULT current_timestamp(),
  `KushDergoi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meszhipersonal`
--

INSERT INTO `meszhipersonal` (`Id`, `Admin`, `Username_Professor`, `Title`, `Teksti`, `Derguar`, `KushDergoi`) VALUES
(1, 'admin', 'BujarFejzullahu33', 'fasdasd', 'afssadads', '2021-05-25 15:19:08', 'AtT'),
(2, 'admin', 'ArtanBerisha123', 'Konsulltimei ne Aplicacione', 'fasdasdas', '2021-05-25 15:25:25', 'TtA'),
(3, 'admin', 'ArtanBerisha123', 'Konsulltimet ne procesim', 'Ndryshimi i konsullimit u krye me sukses\r\n      ', '2021-05-25 15:39:20', 'AtT'),
(5, 'admin', 'naimBraha1', 'Rreth konsulltimit', 'Ne rregull eshte profesor i perfudova modifikimet qe kerkuat', '2021-05-25 15:59:17', 'AtT'),
(6, 'admin', 'elverBajrami11', 'Rreth Konsulltimeve 1', 'fasda sda sda sda aa b c asd\r\n      ', '2021-05-25 16:17:34', 'TtA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_type`, `created`) VALUES
(1, 'userone', '2c12471b9239ff8697b41621cc0be83e4d55c0f8', 'student', '2021-05-13'),
(3, 'usertwo', '816fe0df745818104afa163f948b3264bd6fa404', 'teacher', '2021-05-13'),
(7, 'ArtanBerisha123', '2ec190660194461ac1a8e082b55e2ff52f9e119a', 'teacher', '2021-05-14'),
(8, 'naimBraha1', 'd92e88859118e9db016a0ad4e2fcee380f6a8fe6', 'teacher', '2021-05-14'),
(9, 'ermirrugova123a', '803ed829f3b72e0fe569b282b01d5a4f6a028210', 'teacher', '2021-05-26'),
(12, 'markGone12', '49100e27ae254e6809c2386660630c1116ef5bd2', 'student', '2021-05-18'),
(16, 'ermirMilaimi123', '803ed829f3b72e0fe569b282b01d5a4f6a028210', 'student', '2021-05-22'),
(19, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '2021-05-22'),
(22, 'elverBajrami11', 'b5b5fd5855369466d1e4ec2edac8f71b5d4311d4', 'teacher', '2021-05-22'),
(25, 'lavdimKrasniqi34', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'student', '2021-05-25'),
(26, 'BujarFejzullahu33', '44c8cbb8ecbac02d9e54ce6b2fdfd21c9469d50b', 'teacher', '2021-05-25'),
(27, 'mergimHyseni99', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'student', '2021-05-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `konsulltimet`
--
ALTER TABLE `konsulltimet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mesazhadmin`
--
ALTER TABLE `mesazhadmin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `mesazhet`
--
ALTER TABLE `mesazhet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mesazhispecifik`
--
ALTER TABLE `mesazhispecifik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meszhipersonal`
--
ALTER TABLE `meszhipersonal`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konsulltimet`
--
ALTER TABLE `konsulltimet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mesazhadmin`
--
ALTER TABLE `mesazhadmin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mesazhet`
--
ALTER TABLE `mesazhet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `mesazhispecifik`
--
ALTER TABLE `mesazhispecifik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `meszhipersonal`
--
ALTER TABLE `meszhipersonal`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
