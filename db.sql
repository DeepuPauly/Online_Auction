/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 5.7.9 : Database - online_auction_anns
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`online_auction_anns` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `online_auction_anns`;

/*Table structure for table `tbl_auction` */

DROP TABLE IF EXISTS `tbl_auction`;

CREATE TABLE `tbl_auction` (
  `auction_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_auction` */

/*Table structure for table `tbl_auctionpayment` */

DROP TABLE IF EXISTS `tbl_auctionpayment`;

CREATE TABLE `tbl_auctionpayment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_auctionpayment` */

/*Table structure for table `tbl_bid` */

DROP TABLE IF EXISTS `tbl_bid`;

CREATE TABLE `tbl_bid` (
  `bid_id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `Amount` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`bid_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_bid` */

/*Table structure for table `tbl_booking` */

DROP TABLE IF EXISTS `tbl_booking`;

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_booking` */

insert  into `tbl_booking`(`booking_id`,`user_id`,`amount`,`date`,`status`) values 
(1,1,'400','2023-11-03','pending');

/*Table structure for table `tbl_bookingchild` */

DROP TABLE IF EXISTS `tbl_bookingchild`;

CREATE TABLE `tbl_bookingchild` (
  `bookingchild_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `product_id` varchar(100) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`bookingchild_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_bookingchild` */

insert  into `tbl_bookingchild`(`bookingchild_id`,`booking_id`,`product_id`,`quantity`,`amount`) values 
(1,1,'1','1','400');

/*Table structure for table `tbl_chat` */

DROP TABLE IF EXISTS `tbl_chat`;

CREATE TABLE `tbl_chat` (
  `chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `chat` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`chat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_chat` */

/*Table structure for table `tbl_complaint` */

DROP TABLE IF EXISTS `tbl_complaint`;

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `complaint` varchar(100) DEFAULT NULL,
  `reply` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_complaint` */

/*Table structure for table `tbl_login` */

DROP TABLE IF EXISTS `tbl_login`;

CREATE TABLE `tbl_login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_login` */

insert  into `tbl_login`(`login_id`,`username`,`password`,`usertype`) values 
(1,'admin','Admin123','admin'),
(2,'deepu','Apple123','user'),
(3,'sumith','Sumith123','seller');

/*Table structure for table `tbl_payment` */

DROP TABLE IF EXISTS `tbl_payment`;

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_payment` */

/*Table structure for table `tbl_product` */

DROP TABLE IF EXISTS `tbl_product`;

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) DEFAULT NULL,
  `product` varchar(100) DEFAULT NULL,
  `qty` varchar(100) DEFAULT NULL,
  `details` varchar(100) DEFAULT NULL,
  `rate` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_product` */

insert  into `tbl_product`(`product_id`,`seller_id`,`product`,`qty`,`details`,`rate`) values 
(1,1,'poco','1','good poco','400');

/*Table structure for table `tbl_rating` */

DROP TABLE IF EXISTS `tbl_rating`;

CREATE TABLE `tbl_rating` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `rated` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_rating` */

/*Table structure for table `tbl_seller` */

DROP TABLE IF EXISTS `tbl_seller`;

CREATE TABLE `tbl_seller` (
  `seller_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `sellername` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`seller_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_seller` */

insert  into `tbl_seller`(`seller_id`,`login_id`,`sellername`,`place`,`phone`,`email`) values 
(1,3,'sumith','ekm','9876805387','deepupauly03@gmail.com');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`user_id`,`login_id`,`firstname`,`lastname`,`place`,`phone`,`email`) values 
(1,2,'Deepu','Pauly','thrissur','9870805387','deepu@gmail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
