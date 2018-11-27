/*
SQLyog Community v12.5.1 (64 bit)
MySQL - 10.1.30-MariaDB : Database - homestay
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`homestay` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `homestay`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

/*Table structure for table `akun` */

DROP TABLE IF EXISTS `akun`;

CREATE TABLE `akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`id`) REFERENCES `admin` (`id`),
  CONSTRAINT `akun_ibfk_2` FOREIGN KEY (`id`) REFERENCES `member` (`id`),
  CONSTRAINT `akun_ibfk_3` FOREIGN KEY (`id`) REFERENCES `pemilik_homestay/kendaraan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `akun` */

/*Table structure for table `event` */

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` int(11) NOT NULL,
  `jadwal_mulai` date NOT NULL,
  `jadwal_selesai` date NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `id_objek` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_objek` (`id_objek`),
  CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_objek`) REFERENCES `objek_wisata` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `event` */

/*Table structure for table `fasilitas` */

DROP TABLE IF EXISTS `fasilitas`;

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_homestay` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `Keterangan` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_homestay` (`id_homestay`),
  CONSTRAINT `fasilitas_ibfk_1` FOREIGN KEY (`id_homestay`) REFERENCES `homestay` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fasilitas` */

/*Table structure for table `homestay` */

DROP TABLE IF EXISTS `homestay`;

CREATE TABLE `homestay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_kamar` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `nama` varchar(25) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pemilik` (`id_pemilik`),
  CONSTRAINT `homestay_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilik_homestay/kendaraan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `homestay` */

insert  into `homestay`(`id`,`nomor_kamar`,`id_pemilik`,`harga`,`keterangan`,`nama`,`gambar`,`created_at`,`updated_at`) values 
(2,1,1,500000,'del','test','C:\\xampp\\tmp\\php428D.tmp',NULL,NULL),
(3,2,1,12312,'samping depan belakang','Hendra Simangunsong','C:\\xampp\\tmp\\php8E60.tmp','2018-11-26 02:03:41','2018-11-26 02:03:41'),
(4,1,1,5000000,'assek nian','Hendra Simangunsong','crud.PNG','2018-11-26 02:06:37','2018-11-26 02:06:37'),
(5,1,1,5000000,'test','Hendra Simangunsong','Memiliki.png','2018-11-26 02:07:25','2018-11-26 02:07:25'),
(6,1,1,5000000,'samping depan belakang','Hendra Simangunsong','download.png','2018-11-26 02:09:47','2018-11-26 02:09:47'),
(7,1,1,5000000,'samping depan belakang','Hendra Simangunsong','download.png','2018-11-26 02:10:21','2018-11-26 02:10:21'),
(8,1,1,5000000,'samping depan belakang','Hendra Simangunsong','download.png','2018-11-26 02:11:34','2018-11-26 02:11:34'),
(11,1,1,5000000,'test','Hendra Simangunsong','C:\\xampp\\tmp\\php6F9D.tmp','2018-11-26 07:09:23','2018-11-26 07:09:23'),
(12,1,1,123,'asd','qwerty','C:\\xampp\\tmp\\php8535.tmp','2018-11-26 07:10:34','2018-11-26 07:10:34'),
(13,1,1,10000,'asafdsfdad','qwe','adsfd.PNG','2018-11-26 07:12:31','2018-11-26 07:12:31'),
(14,1,1,10000,'asafdsfdad','qwe','adsfd.PNG','2018-11-26 07:15:26','2018-11-26 07:15:26'),
(15,1,1,5000000,'test','test','adsfd.PNG','2018-11-26 07:15:47','2018-11-26 07:15:47'),
(16,1,1,5000000,'test','test','adsfd.PNG','2018-11-26 07:16:09','2018-11-26 07:16:09'),
(17,1,1,5000000,'test','test','adsfd.PNG','2018-11-26 07:16:45','2018-11-26 07:16:45'),
(18,1,1,5000000,'test','test','adsfd.PNG','2018-11-26 07:22:37','2018-11-26 07:22:37');

/*Table structure for table `kendaraan` */

DROP TABLE IF EXISTS `kendaraan`;

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `Merk_kendaraan` varchar(50) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `plat_nomor` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pemilik` (`id_pemilik`),
  CONSTRAINT `kendaraan_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilik_homestay/kendaraan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kendaraan` */

/*Table structure for table `member` */

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telepon` varchar(25) NOT NULL,
  `poin` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `member` */

insert  into `member`(`id`,`nama`,`alamat`,`no_telepon`,`poin`,`created_at`,`updated_at`) values 
(1,'hendra','del','0981231',2,'0000-00-00','0000-00-00');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `objek_wisata` */

DROP TABLE IF EXISTS `objek_wisata`;

CREATE TABLE `objek_wisata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `objek_wisata` */

/*Table structure for table `pemilik_homestay/kendaraan` */

DROP TABLE IF EXISTS `pemilik_homestay/kendaraan`;

CREATE TABLE `pemilik_homestay/kendaraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pemilik_homestay/kendaraan` */

insert  into `pemilik_homestay/kendaraan`(`id`,`nama`,`alamat`,`created_at`,`updated_at`) values 
(1,'hendra','del','0000-00-00','0000-00-00');

/*Table structure for table `pengalaman` */

DROP TABLE IF EXISTS `pengalaman`;

CREATE TABLE `pengalaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `date` date NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `id_member` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_member` (`id_member`),
  CONSTRAINT `pengalaman_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengalaman` */

/*Table structure for table `record_pemesanan` */

DROP TABLE IF EXISTS `record_pemesanan`;

CREATE TABLE `record_pemesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_member` int(11) NOT NULL,
  `id_homestay` int(11) NOT NULL,
  `date` date NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_member` (`id_member`),
  KEY `id_homestay` (`id_homestay`),
  CONSTRAINT `record_pemesanan_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id`),
  CONSTRAINT `record_pemesanan_ibfk_2` FOREIGN KEY (`id_homestay`) REFERENCES `homestay` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `record_pemesanan` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`role`) values 
(1,'Hendra Simangunsong','hendrasimz92@gmail.com',NULL,'simangunsong',NULL,NULL,NULL,'admin'),
(2,'Hendra Simangunsong2','hendrasimz92@gmail.com',NULL,'964aa191a39da63b96a3c3990fd74ef9',NULL,NULL,NULL,'admin'),
(3,'Hendra Simangunsong','hendrasimz93@gmail.com',NULL,'d2bcc286168bf8e040885c5cb7b6df13',NULL,NULL,NULL,'member'),
(4,'benyamin','benyamin@del.ac.id',NULL,'89c08875c9c91ae00554079591524b16',NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
