# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.27)
# Database: db_uas
# Generation Time: 2019-10-21 14:39:27 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tb_admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `kd_adm` int(10) NOT NULL AUTO_INCREMENT,
  `nama_adm` varchar(20) NOT NULL,
  `user_adm` varchar(20) NOT NULL,
  `pass_adm` varchar(100) NOT NULL,
  `level_adm` enum('admin','pemilik') NOT NULL,
  PRIMARY KEY (`kd_adm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tb_admin` WRITE;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;

INSERT INTO `tb_admin` (`kd_adm`, `nama_adm`, `user_adm`, `pass_adm`, `level_adm`)
VALUES
	(1,'Rizky Fathurahman','admin','202cb962ac59075b964b07152d234b70','admin'),
	(2,'kiki','pemilik','202cb962ac59075b964b07152d234b70','pemilik');

/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_barang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_barang`;

CREATE TABLE `tb_barang` (
  `kd_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `gambar_barang` varchar(50) NOT NULL,
  `jenis_barang` varchar(10) NOT NULL,
  `stok_barang` int(10) NOT NULL,
  `harga_barang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tb_barang` WRITE;
/*!40000 ALTER TABLE `tb_barang` DISABLE KEYS */;

INSERT INTO `tb_barang` (`kd_barang`, `nama_barang`, `gambar_barang`, `jenis_barang`, `stok_barang`, `harga_barang`)
VALUES
	('BR001','Sharp LED Aquos 24 Inc','20180710-1001.jpg','LED TV',7,2500000),
	('BR002','Tcl LED 32 Inch','20180710-0001.jpg','LED TV',10,2300000),
	('BR003','Philip LED 32 Inch','20180710-000.jpg','LED TV',10,3000000),
	('BR004','Polytron LED 32 Inch','20180710-0002.jpg','LED TV',0,2800000),
	('BR005','Kasur Busa','20180710-0003.jpg','Kasur',8,750000),
	('BR006','Kasur Lipat','20180710-0004.jpg','Kasur',8,350000),
	('BR007','Kasur Udara','20180710-0005.jpg','Kasur',-6,550000),
	('BR008','Kursi Kantor','20180710-0006.jpg','Kursi',20,150000),
	('BR009','Kursi Lipat','20180710-0007.jpg','Kursi',20,50000),
	('BR010','Kursi Plastik','20180710-0008.JPG','Kursi',100,30000),
	('BR011','Kursi Susun','20180710-0009.jpg','Kursi',100,45000),
	('BR012','Kursi Warung','20180710-00010.jpg','Kursi',90,20000),
	('BR013','Lemari Laci Plastik','20180710-00011.jpg','Lemari',10,550000),
	('BR014','Lemari Plastik','20180710-00012.jpg','Lemari',10,750000),
	('BR015','Lemari Rak','20180710-00013.jpg','Lemari',10,1000000),
	('BR016','Lemari Slider','20180710-00014.jpg','Lemari',10,1300000);

/*!40000 ALTER TABLE `tb_barang` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_bayar
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_bayar`;

CREATE TABLE `tb_bayar` (
  `kd_bayar` varchar(20) NOT NULL,
  `kd_transaksi` varchar(20) NOT NULL,
  `kd_pelanggan` varchar(10) NOT NULL,
  `nama_bank` varchar(20) NOT NULL,
  `jml_bayar` varchar(20) NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tb_bayar` WRITE;
/*!40000 ALTER TABLE `tb_bayar` DISABLE KEYS */;

INSERT INTO `tb_bayar` (`kd_bayar`, `kd_transaksi`, `kd_pelanggan`, `nama_bank`, `jml_bayar`, `bukti_bayar`)
VALUES
	('BY-20180710-001','TR-20180710-001','PG001','BNI(023 827 2088)','14.000.000,00','BY20180710-00.jpg'),
	('BY-20180713-002','TR-20180713-003','PG001','BCA(731 025 2527)','3.300.000,00','BY20180713-00.jpg'),
	('BY-20180714-003','TR-20180714-004','PG002','BRI(034 101 000 743 ','2.200.000,00','BY20180714-00.jpg'),
	('BY-20180714-004','TR-20180714-005','PG001','Mandiri(0700 000 899','2.500.000,00','BY20180714-002.jpg'),
	('BY-20180714-005','TR-20180714-006','PG001','Mandiri(0700 000 899','2.500.000,00','BY20180714-003.jpg'),
	('BY-20180714-006','TR-20180714-007','PG001','Mandiri(0700 000 899','2.500.000,00','BY20180714-004.jpg'),
	('BY-20180714-007','TR-20180714-008','PG001','Mandiri(0700 000 899','2.500.000,00','BY20180714-005.jpg');

/*!40000 ALTER TABLE `tb_bayar` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_pelanggan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_pelanggan`;

CREATE TABLE `tb_pelanggan` (
  `kd_pelanggan` varchar(10) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `pass_pelanggan` varchar(100) NOT NULL,
  `foto_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` longtext NOT NULL,
  PRIMARY KEY (`kd_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tb_pelanggan` WRITE;
/*!40000 ALTER TABLE `tb_pelanggan` DISABLE KEYS */;

INSERT INTO `tb_pelanggan` (`kd_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `pass_pelanggan`, `foto_pelanggan`, `alamat_pelanggan`)
VALUES
	('PG001','Rizky Fathurahman','rizky172@gmail.com','098f6bcd4621d373cade4e832627b4f6','20180710-100.jpg','Kp.Karajeun II Rt 03/Rw 01 Kec. Sagaranten Kab. Sukabumi'),
	('PG003','aa','aa@gmail.com','098f6bcd4621d373cade4e832627b4f6','',''),
	('PG004','test','test@gmail.com','098f6bcd4621d373cade4e832627b4f6','','');

/*!40000 ALTER TABLE `tb_pelanggan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_rinci
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_rinci`;

CREATE TABLE `tb_rinci` (
  `kd_rinci` int(10) NOT NULL AUTO_INCREMENT,
  `kd_transaksi` varchar(20) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `qty_rinci` int(10) NOT NULL,
  `harga_rinci` int(20) NOT NULL,
  `total_rinci` int(20) NOT NULL,
  PRIMARY KEY (`kd_rinci`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tb_rinci` WRITE;
/*!40000 ALTER TABLE `tb_rinci` DISABLE KEYS */;

INSERT INTO `tb_rinci` (`kd_rinci`, `kd_transaksi`, `kd_barang`, `qty_rinci`, `harga_rinci`, `total_rinci`)
VALUES
	(1,'TR-20180710-001','BR004',5,2800000,14000000),
	(3,'TR-20180713-003','BR005',1,750000,750000),
	(4,'TR-20180713-003','BR006',1,350000,350000),
	(5,'TR-20180713-003','BR007',4,550000,2200000),
	(6,'TR-20180714-004','BR007',4,550000,2200000),
	(7,'TR-20180714-005','BR001',1,2500000,2500000),
	(8,'TR-20180714-006','BR001',1,2500000,2500000),
	(9,'TR-20180714-007','BR001',1,2500000,2500000),
	(10,'TR-20180714-008','BR001',1,2500000,2500000);

/*!40000 ALTER TABLE `tb_rinci` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_transaksi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_transaksi`;

CREATE TABLE `tb_transaksi` (
  `kd_transaksi` varchar(20) NOT NULL,
  `kd_pelanggan` varchar(10) NOT NULL,
  `tgl_beli` date NOT NULL,
  `alamat_kirim` longtext NOT NULL,
  `no_hp` int(12) NOT NULL,
  `atas_nama` varchar(20) NOT NULL,
  `status_konfirmasi` varchar(20) NOT NULL,
  `status_bayar` int(10) NOT NULL,
  `tgl_konfirmasi` date NOT NULL,
  `user_konfirmasi` varchar(10) NOT NULL,
  PRIMARY KEY (`kd_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tb_transaksi` WRITE;
/*!40000 ALTER TABLE `tb_transaksi` DISABLE KEYS */;

INSERT INTO `tb_transaksi` (`kd_transaksi`, `kd_pelanggan`, `tgl_beli`, `alamat_kirim`, `no_hp`, `atas_nama`, `status_konfirmasi`, `status_bayar`, `tgl_konfirmasi`, `user_konfirmasi`)
VALUES
	('TR-20180710-001','PG001','2018-07-10','Gg. Kaswari II',123456789,'Bule','1',1,'2018-07-10','admin'),
	('TR-20180713-003','PG001','2018-07-13','1',1,'1','1',1,'2018-07-13','admin'),
	('TR-20180714-004','PG002','2018-07-14','kaswari',1234,'kiki','1',1,'2018-07-14','admin'),
	('TR-20180714-005','PG001','2018-07-14','2',2,'2','1',1,'2018-07-14','admin'),
	('TR-20180714-006','PG001','2018-07-14','1',1,'1','0',1,'0000-00-00',''),
	('TR-20180714-007','PG001','2018-07-14','1',1,'1','0',1,'0000-00-00',''),
	('TR-20180714-008','PG001','2018-07-14','1',1,'1','0',1,'0000-00-00','');

/*!40000 ALTER TABLE `tb_transaksi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tmp_pesan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tmp_pesan`;

CREATE TABLE `tmp_pesan` (
  `kd_pesan` int(10) NOT NULL AUTO_INCREMENT,
  `kd_pelanggan` varchar(10) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `qty_pesan` int(10) NOT NULL,
  `harga_pesan` int(20) NOT NULL,
  PRIMARY KEY (`kd_pesan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tmp_pesan` WRITE;
/*!40000 ALTER TABLE `tmp_pesan` DISABLE KEYS */;

INSERT INTO `tmp_pesan` (`kd_pesan`, `kd_pelanggan`, `kd_barang`, `tgl_pesan`, `qty_pesan`, `harga_pesan`)
VALUES
	(1,'PG004','BR007','2019-10-21',1,550000);

/*!40000 ALTER TABLE `tmp_pesan` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
