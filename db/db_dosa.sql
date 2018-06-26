-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2018 at 10:07 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_dosa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `aksesoris`
--

CREATE TABLE IF NOT EXISTS `aksesoris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `berat` varchar(25) NOT NULL,
  `bahan` varchar(25) NOT NULL,
  `harga` varchar(18) NOT NULL,
  `image` blob,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `aksesoris`
--

INSERT INTO `aksesoris` (`id`, `nama`, `jenis`, `berat`, `bahan`, `harga`, `image`) VALUES
(4, 'Gelang Pudge2', 'Gelang', '3gram', 'Alumunium', '25000', 0x696d616765732e6a7067),
(7, 'Gelang Fnatic', '', '3gram', 'Silicon', '25000', 0x46616e617469632e4a5047),
(8, 'Gelang EG', '', '3gram', 'Silicon', '25000', 0x646f776e6c6f61642e6a7067),
(12, 'Kalung Dota 2', 'Kalung', '3gram', 'Alumunium', '35000', 0x323031372d686f742d616e696d652d67616d652d776f726c642d6f662d77617263726166742d686f7264652d646f7461322d70656e64616e742d6e65636b6c6163652d636f73706c61792d6163636573736f72792d626c61636b2d616e64616d702d7265642d66617368696f6e2d6e65636b6c616365732d616e64616d702d70656e64616e74732d696e746c2d333631312d38353030363131312d39646330336536363330366565366562373366393665376636396265636463372d636174616c6f675f3233332e6a7067),
(11, 'Ganci Pudge', 'Gantungan Kunci', '4gram', 'Alumunium', '25000', 0x696d616765732e6a7067),
(13, 'Kalung AM', 'Kalung', '5gram', 'Alumunium', '35000', 0x323637373338353637345f313632343939363338362e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `harga` varchar(18) NOT NULL,
  `image` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `nama`, `harga`, `image`) VALUES
(4, 'Arcana IO', '325000', 0x696f2e6a7067),
(2, 'Arcana Jugger', '420000', 0x6d617872657364656661756c742e6a7067),
(3, 'Arcana SF', '375000', 0x617263616e615f73665f64616e5f696d6d6f7274616c5f61726d5f6f665f6465736f6c6174696f6e5f636f645f62616e64756e675f313635313039325f313435383437343536322e6a7067),
(5, 'Arcana Techies', '310000', 0x7465632e6a7067),
(6, 'Arcana PA', '365000', 0x70612e6a7067),
(7, 'Arcana CM', '315000', 0x636d2e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `size` varchar(10) NOT NULL,
  `bahan` varchar(25) NOT NULL,
  `harga` varchar(18) NOT NULL,
  `image` blob,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `size`, `bahan`, `harga`, `image`) VALUES
(12, 'Baju Troll', 'M', 'Kain', '85000', 0x747368697274332e6a7067),
(10, 'Baju Juggernaut', 'L', 'Wol', '75000', 0x747368697274312e6a7067),
(13, 'Baju Pudge', 'XL', 'Kain', '100000', 0x747368697274352e6a7067),
(18, 'Baju Enigma', 'XL', 'Kain', '75000', 0x496e74656c6c6967656e63652d4865726f2d454e49474d412d4461726368726f772d5072696e742d4f726967696e616c2d44657369676e2d446f7461322d446f74612d322d436f74746f6e2d43617375616c2d5473686972742d542d73686972742d5445452e6a7067),
(15, 'Baju Zeus', 'M', 'Kain', '75000', 0x74736869727431302e6a7067),
(19, 'Baju DK', 'L', 'Kain', '75000', 0x467265652d5368697070696e672d537472656e6774682d4865726f2d446176696f6e2d447261676f6e2d4b6e696768742d444b2d5072696e742d4f726967696e616c2d44657369676e2d446f7461322d446f74612d322d436f74746f6e2d43617375616c2e6a70675f363430783634302e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `password` varchar(18) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telpon` varchar(18) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_steam` varchar(18) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `password`, `email`, `no_telpon`, `alamat`, `id_steam`) VALUES
(1, 'Putra Krisnayana', '123123', 'gungkris@rocketmail.com', '', 'JL.Tukad Barito No 7', 'masterchuuni2121'),
(2, 'Putri', '12345', 'sada@gmail.com', '', 'JL.Tukad Barito No 7', 'wawa123'),
(3, 'aw', '123', 'asda@gmail', '', 'dsfsdsd', 'sdfsf'),
(4, 'caroline', 'caroline123', 'caroline@gmail.com', '082132552112', 'Jakarta', 'carolineagatha'),
(5, 'oline', 'oline123', 'oline@gmail.com', '082115226215', 'Jakarta Timur', 'olinetha'),
(6, 'la', 'la123', 'la@gmail.com', '0823151612', 'Denpasar', 'lala123'),
(7, 'eka', 'eka123', 'eka@gmail.com', '083115223512', 'Denpasar', 'ekadjm4x'),
(8, 'Aila', 'aila123', 'ailagraila@gmail.com', '081251662139', 'Sukabumi', 'ailagraila'),
(9, 'putra', 'putra123', 'putra@gmail.com', '082236212115', 'Panjer', 'putraka21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
