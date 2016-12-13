-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2015 at 07:39 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `barang_id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(5) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`barang_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `kode_barang`, `kategori_id`, `nama_barang`, `harga`) VALUES
(15, 'BR001', 1, 'mie kari', 2300),
(16, 'BR002', 2, 'Bimoli', 22000);

-- --------------------------------------------------------

--
-- Table structure for table `costumer`
--

CREATE TABLE IF NOT EXISTS `costumer` (
  `costumer_id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_costumer` varchar(5) NOT NULL,
  `nama_costumer` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telpon_costumer` varchar(12) NOT NULL,
  PRIMARY KEY (`costumer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `costumer`
--

INSERT INTO `costumer` (`costumer_id`, `kode_costumer`, `nama_costumer`, `alamat`, `telpon_costumer`) VALUES
(7, 'CS001', 'Hendra Pembeli', 'jelambar', '2300'),
(8, 'CS002', 'johan', 'daan mogot', '084563112'),
(9, 'CS003', 'selvi', 'villa bandara', '0213645');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE IF NOT EXISTS `kategori_barang` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`kategori_id`, `nama_kategori`) VALUES
(1, 'mie instan'),
(2, 'minyak'),
(6, 'handphone'),
(8, 'sepatu'),
(9, 'tas');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE IF NOT EXISTS `operator` (
  `operator_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `last_login` date NOT NULL,
  `level` enum('penjualan','pembelian') NOT NULL,
  PRIMARY KEY (`operator_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`operator_id`, `nama_lengkap`, `username`, `password`, `last_login`, `level`) VALUES
(4, 'hendra', 'hendra', 'a04cca766a885687e33bc6b114230ee9', '2015-10-16', 'penjualan'),
(5, 'chandra', 'chandra', 'ad845a24a47deecbfa8396e90db75c6a', '2015-10-04', 'pembelian');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_supplier` varchar(5) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `telpon_supplier` varchar(12) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `kode_supplier`, `nama_supplier`, `alamat_supplier`, `telpon_supplier`) VALUES
(4, 'SP001', 'PT Timbul Tenggelam', 'kosambi', '08645213'),
(5, 'SP002', 'PT Maju Mundur', 'tagcity', '02145663');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `transaksi_id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_transaksi` date NOT NULL,
  `operator_id` int(11) NOT NULL,
  PRIMARY KEY (`transaksi_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `tanggal_transaksi`, `operator_id`) VALUES
(7, '2014-07-18', 1),
(6, '2014-07-17', 2),
(5, '2014-07-17', 2),
(8, '2015-10-04', 4),
(9, '2015-10-16', 4);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_beli`
--

CREATE TABLE IF NOT EXISTS `transaksi_beli` (
  `transaksibeli_id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  PRIMARY KEY (`transaksibeli_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `transaksi_beli`
--

INSERT INTO `transaksi_beli` (`transaksibeli_id`, `tanggal`, `supplier_id`) VALUES
(5, '2015-10-11', 4),
(6, '2015-10-14', 5),
(7, '2015-10-15', 5),
(8, '2015-10-16', 4),
(9, '2015-10-16', 4),
(10, '2015-10-16', 4),
(11, '2015-10-16', 4),
(12, '2015-10-16', 4),
(13, '2015-10-16', 5),
(14, '2015-10-16', 4);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_beli_detail`
--

CREATE TABLE IF NOT EXISTS `transaksi_beli_detail` (
  `belidetail_id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `transaksibeli_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '"1" = sudah di proses, "0" belum di proses',
  PRIMARY KEY (`belidetail_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `transaksi_beli_detail`
--

INSERT INTO `transaksi_beli_detail` (`belidetail_id`, `barang_id`, `harga`, `qty`, `transaksibeli_id`, `status`) VALUES
(17, 16, 2000, 12, 8, 1),
(16, 16, 30000, 300, 8, 1),
(18, 16, 2000, 12, 8, 1),
(19, 16, 20000, 222, 13, 1),
(20, 15, 5000, 20, 8, 1),
(21, 15, 5000, 20, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE IF NOT EXISTS `transaksi_detail` (
  `t_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '1= sudah diproses , 0 belum diproses',
  PRIMARY KEY (`t_detail_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`t_detail_id`, `barang_id`, `qty`, `transaksi_id`, `harga`, `status`) VALUES
(10, 1, 6, 6, 2000, '1'),
(9, 6, 3, 5, 3000, '1'),
(8, 1, 4, 5, 2000, '1'),
(11, 5, 4, 6, 2300, '1'),
(12, 4, 4, 6, 1500, '1'),
(13, 1, 3, 7, 2000, '1'),
(14, 6, 2, 7, 3000, '1'),
(19, 5, 4, 8, 2300, '1'),
(20, 9, 4, 8, 400000, '1'),
(21, 15, 20, 9, 2300, '1');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_jual`
--

CREATE TABLE IF NOT EXISTS `transaksi_jual` (
  `transaksijual_id` int(11) NOT NULL AUTO_INCREMENT,
  `costumer_id` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `operator_id` int(11) NOT NULL,
  PRIMARY KEY (`transaksijual_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `transaksi_jual`
--

INSERT INTO `transaksi_jual` (`transaksijual_id`, `costumer_id`, `tanggal_transaksi`, `operator_id`) VALUES
(18, 7, '2015-10-16', 4);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_jual_detail`
--

CREATE TABLE IF NOT EXISTS `transaksi_jual_detail` (
  `jualdetail_id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_id` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `transaksijual_id` int(11) NOT NULL,
  PRIMARY KEY (`jualdetail_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `transaksi_jual_detail`
--

INSERT INTO `transaksi_jual_detail` (`jualdetail_id`, `barang_id`, `harga_jual`, `qty`, `status`, `transaksijual_id`) VALUES
(15, 15, 2300, 20, 1, 18);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
