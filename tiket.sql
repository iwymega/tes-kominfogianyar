/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - tiket
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tiket` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `tiket`;

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `kode_event` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_tlp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `events` */

insert  into `events`(`id`,`nama`,`image`,`kategori`,`kode_event`,`email`,`no_tlp`,`created_at`,`updated_at`) values 
(20,'event7 Indonesia','ooIaC88ZKxvuxGyGMSjBD1p3zwGbgpCl9MNZGCHO.jpg','Anak-anak','event7','event7','456123789','2022-12-22 10:56:30','2022-12-22 10:56:30'),
(21,'event 3 Bali Cup','7raGkfXNUTTRTukpRexPlaHOEP8Rm4gqbJRkexrz.jpg','Orang Tua','event3 bali','event3@mail.com','6245789321','2022-12-22 11:02:07','2022-12-22 11:02:07'),
(22,'eventbrate 2023','MFlH05STZYy0aHeLr5FpLkasgjqswDPHIoJMZn7j.jpg','Dewasa','AOCeventbrate','eventbrate@mail.com','456789123','2022-12-22 12:47:31','2022-12-22 12:47:31'),
(26,'tesnomor123','huyd6PqT2fVNkFRblyG8qxW2rwCTkbtJl2Hze7e8.jpg','Anak-anak','tesnomor123','tesnomor123@mail.com','123','2022-12-22 13:36:52','2022-12-22 13:36:52');

/*Table structure for table `jenis` */

DROP TABLE IF EXISTS `jenis`;

CREATE TABLE `jenis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `admin_fee` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jenis` */

insert  into `jenis`(`id`,`nama`,`harga`,`admin_fee`,`stok`,`created_at`,`updated_at`) values 
(1,'presale1',15000,2000,10,NULL,NULL),
(2,'presale2',10000,1000,15,NULL,NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2022_12_22_060937_create_events_table',1),
(6,'2022_12_22_061246_create_jenis_table',2),
(7,'2022_12_22_114244_create_tikets_table',3);

/*Table structure for table `tikets` */

DROP TABLE IF EXISTS `tikets`;

CREATE TABLE `tikets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_event` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tikets` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
