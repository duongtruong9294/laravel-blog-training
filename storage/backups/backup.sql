-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: laravel_blog
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'giai tri',0,'2019-04-03 01:13:13','2019-04-03 01:13:13'),(2,'kinh doanh',0,'2019-04-03 01:13:58','2019-04-03 01:13:58'),(3,'du lich',0,'2019-04-03 01:14:05','2019-04-03 01:14:05'),(4,'show biz',0,'2019-04-03 01:14:13','2019-04-10 07:57:55'),(5,'phim',1,'2019-04-03 01:45:40','2019-04-03 04:18:29'),(6,'ca nhac',1,'2019-04-04 07:40:03','2019-04-04 07:40:03'),(7,'bat dong san',2,'2019-04-08 08:27:02','2019-04-08 08:27:02'),(8,'doanh nhan',2,NULL,NULL),(9,'ngan hang',2,NULL,NULL),(10,'trong nuoc',3,'2019-04-18 00:00:00','2019-04-20 00:00:00'),(11,'ngoai nuoc',3,'2019-04-19 00:00:00','2019-04-27 00:00:00'),(12,'sao viet',4,'2019-04-25 00:00:00','2019-04-12 00:00:00'),(13,'sao chau a',4,'2019-04-05 00:00:00','2019-04-19 00:00:00'),(14,'phim trong nuoc',5,'2019-04-11 00:00:00','2019-04-20 00:00:00'),(15,'phim nuoc ngoai',5,'2019-04-04 00:00:00','2019-04-27 00:00:00'),(16,'ca nhac trong nuoc',6,'2019-04-11 00:00:00','2019-04-20 00:00:00'),(17,'ca nhac nuoc ngoai',6,'2019-04-03 00:00:00','2019-04-26 00:00:00');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `new_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_new_id_foreign` (`new_id`),
  CONSTRAINT `comments_new_id_foreign` FOREIGN KEY (`new_id`) REFERENCES `news` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (8,'77776666',NULL,1,10,'2019-04-18 02:15:16','2019-04-18 02:15:16'),(9,'333ddddd',NULL,1,10,'2019-04-18 02:16:48','2019-04-18 02:16:48'),(16,'fdsfds465465',NULL,1,10,'2019-04-18 02:34:25','2019-04-18 02:34:25'),(39,'iuouou0',NULL,2,10,'2019-04-18 07:55:23','2019-04-18 07:55:23'),(40,'oiuou',NULL,2,10,'2019-04-19 01:13:28','2019-04-19 01:13:28'),(41,'vvvvvv11111',8,1,10,'2019-04-19 01:49:16','2019-04-19 01:49:16'),(42,'222221111',41,1,10,'2019-04-19 01:49:26','2019-04-19 01:49:26');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_04_02_064941_create_categories_table',1),(5,'2019_04_02_071252_create_news_table',2),(6,'2019_04_02_081405_create_tags_table',3),(7,'2019_04_02_081511_create_tag_new_table',3),(9,'2019_04_03_091522_add_status_to_news_table',4),(15,'2019_04_09_094135_create_roles_table',5),(16,'2019_04_09_094407_create_role_user_table',5),(17,'2019_04_16_024723_create_verify_users_table',6),(18,'2019_04_16_025108_add_verified_to_users_table',6),(19,'2019_04_16_040230_add_token_confirmed_to_users_table',7),(20,'2019_04_17_095408_create_comment_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `news_user_id_foreign` (`user_id`),
  KEY `news_category_id_foreign` (`category_id`),
  CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Lộ diện dàn mỹ nhân \"cứu vãn\" thể diện cho Thiên Long Bát Bộ 2019?','Chưa hết sốc với cảnh Chu Chỉ Nhược bị cưỡng hiếp 2 lần trong Ỷ Thiên Đồ Long Ký mới đây, khán giả lại phải chờ đợi gì từ Thiên Long Bát Bộ 2019?','1554970465.jpg',1,1,'2019-04-03 09:46:15','2019-04-11 08:14:25',1),(2,'Minh Tuyết lạnh lùng từ chối khi Mạc Văn Khoa \"xin ôm\" vì đâu?','Nam diễn viên hài đất Bắc bị từ chối phũ phàng khi có ý \"xin được ôm\" đàn chị.','1554970574.jpg',1,1,'2019-04-03 09:46:15','2019-04-11 08:16:14',1),(3,'Dự án ngàn tỉ bỏ hoang trên đất vàng','Được cấp hàng chục ngàn mét vuông đất ở vị trí đắc địa với kỳ vọng hình thành một bệnh viện quy mô lớn, hiện đại phục vụ người dân nhưng sau gần 10 năm khởi công, dự án vẫn bỏ hoang.','1554970628.jpg',1,1,'2019-04-03 09:46:15','2019-04-11 08:17:08',1),(4,'Kì lạ đất nước người dân không chịu đi làm, chỉ đợi phát tiền miễn phí','Việc cấp phát tiền miễn phí cho người dân thất nghiệp tại Phần Lan chỉ giúp cải thiện về mặt tâm lý chứ không thể cải thiện tình trạng thất nghiệp do người dân không chịu đi làm.','1554970695.jpg',1,1,'2019-04-03 09:46:15','2019-04-11 08:18:15',1),(5,'Cháy kinh hoàng ở Hà Nội làm 8 người chết và mất tích','<p>Khu vực kho xưởng bị ch&aacute;y nằm sau trong khu d&acirc;n cư h&agrave;ng trăm m&eacute;t, c&oacute; nhiều vật liệu dễ ch&aacute;y như đồ nhựa, đồ gỗ n&ecirc;n đ&atilde; ch&aacute;y la rất nhanh, khiến 8 người chết v&agrave; mất t&iacute;ch.</p>','1555037211.jpg',1,4,'2019-04-03 09:46:15','2019-04-12 02:46:51',1),(6,'Video gangster khét tiếng đánh nhau tay đôi với khủng bố trong nhà tù Úc','<p>Một t&ecirc;n x&atilde; hội đen bạo lực v&agrave; một t&ecirc;n khủng bố đ&atilde; bị ph&aacute;t hiện đ&aacute;nh nhau trong một trong những nh&agrave; t&ugrave; t&agrave;n bạo nhất nước &Uacute;c.</p>','1555037282.png',1,1,'2019-04-03 09:46:15','2019-04-12 02:48:02',1),(9,'Giá vàng hôm nay 11/4: Chứng khoán èo uột, tiền đổ mạnh vào vàng','<p>Tại thời điểm 8 giờ 30 ph&uacute;t, gi&aacute; v&agrave;ng thế giới dao động quanh ngưỡng 1.302 USD/ounce, tương đương với mức giao dịch cuối giờ chiều phi&ecirc;n trước đ&oacute;. Tuy nhi&ecirc;n, so với c&ugrave;ng giờ s&aacute;ng qua, v&agrave;ng vẫn tăng 3 USD. Đ&acirc;y cũng l&agrave; mức cao nhất kể từ 28/3.</p>','1554970754.jpg',1,1,'2019-04-04 03:19:18','2019-04-12 02:18:48',1),(10,'Vừa làm vedette, vừa hóa nữ hoàng thảm đỏ Aquafina VIFW: Chỉ có thể là Thanh Hằng!','<h2>Giữa rừng người đẹp khoe sắc tr&ecirc;n thảm đỏ khai mạc Aquafina Vietnam International Fashion Week, Thanh Hằng l&agrave;m say l&ograve;ng giới mộ điệu trong thiết kế tuyệt đẹp lấy cảm hứng từ BST thiết kế nh&atilde;n chai phi&ecirc;n bản giới hạn Aquafina.</h2>','1555035869.jpg',1,2,'2019-04-12 02:24:29','2019-04-12 02:38:25',1);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_username_index` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,7,NULL,NULL),(1,8,NULL,NULL),(2,8,NULL,NULL),(1,11,NULL,NULL),(2,11,NULL,NULL),(1,12,NULL,NULL),(1,13,NULL,NULL),(1,14,NULL,NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Phóng viên','author','{\"new.create\": true}','2019-04-10 02:55:42','2019-04-10 02:55:42'),(2,'Biên tập viên','editor','{\"new.update\": true, \"new.publish\": true}','2019-04-10 02:55:42','2019-04-10 02:55:42');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag_new`
--

DROP TABLE IF EXISTS `tag_new`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag_new` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` bigint(20) unsigned NOT NULL,
  `new_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag_new`
--

LOCK TABLES `tag_new` WRITE;
/*!40000 ALTER TABLE `tag_new` DISABLE KEYS */;
INSERT INTO `tag_new` VALUES (4,5,1,NULL,NULL),(5,1,1,'2019-04-10 00:00:00','2019-04-12 00:00:00'),(6,2,1,'2019-04-17 00:00:00','2019-04-12 00:00:00'),(7,2,2,'2019-04-12 00:00:00','2019-04-19 00:00:00'),(8,1,2,'2019-04-04 00:00:00',NULL),(9,3,2,'2019-04-05 00:00:00','2019-04-13 00:00:00'),(10,4,2,'2019-04-04 00:00:00','2019-04-20 00:00:00'),(11,1,3,'2019-04-18 00:00:00','2019-04-13 00:00:00'),(12,2,3,'2019-04-10 00:00:00','2019-04-06 00:00:00'),(13,4,3,NULL,NULL),(14,5,3,'2019-04-17 00:00:00','2019-04-12 00:00:00'),(15,5,4,NULL,NULL),(16,1,5,NULL,NULL),(19,4,9,NULL,NULL),(22,4,10,NULL,NULL),(23,1,10,NULL,NULL),(24,2,10,NULL,NULL),(25,6,5,NULL,NULL),(26,3,5,NULL,NULL),(27,1,5,NULL,NULL),(28,7,6,NULL,NULL);
/*!40000 ALTER TABLE `tag_new` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Sự Kiện',NULL,NULL),(2,'Thời Trang',NULL,NULL),(3,'Tin Tức',NULL,NULL),(4,'Du Lịch',NULL,NULL),(5,'Quốc Tế',NULL,NULL),(6,'Thời Sự','2019-04-12 02:24:29','2019-04-12 02:24:29'),(7,'Thế Giới','2019-04-12 02:48:02','2019-04-12 02:48:02');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `token_verify` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'superadmin','superadmin@gmail.com',NULL,'$2y$10$II7UMwOVfAntdDqLiHwp9esxmPiwvriU3slJMW2pN4nG93.gy1coC','SUPER ADMIN22','43 VANHWARE',NULL,'2019-04-02 08:42:32','2019-04-10 06:40:23',0,NULL),(2,'admin','admin@gmail.com',NULL,'$2y$10$mtL8jARuzXx8radmdAPFp.6wQLgnuUxDbZvMwtNW5YPkGqUXtkf0S','FAKE ADMIN','43 VANGHOME',NULL,'2019-04-02 08:42:32','2019-04-02 08:42:32',0,NULL),(3,'member','member.@gmail.com',NULL,'$2y$10$fdbpsvTT3cLn7XaXrnphDuYImcwnIkMPQ72TlGgQFxOps2TFxV3NC','FAKE MEMBER','43 HOMEWANG',NULL,'2019-04-02 08:42:32','2019-04-02 08:42:32',0,NULL),(4,'member123','member123.@gmail.com',NULL,'$2y$10$g/esmwLpi3U5P4TkcdIUZOvcwRa/YU3pFjIr6V063bFjgykFfeOiK','FAKE MEMBER123','23 HOMEWANG',NULL,'2019-04-02 08:42:32','2019-04-02 08:42:32',0,NULL),(5,'duong123','duong123.@gmail.com',NULL,'$2y$10$afyennsV0f/Z4DTl2.c5IOoodmH29sDCWboleZu8OfRC4SjUUArtm','TV DUONG123','27 TVSQFQRT',NULL,'2019-04-02 08:42:32','2019-04-02 08:42:32',0,NULL),(6,'duong123456','duong123456.@gmail.com',NULL,'$2y$10$CmibvwgqwM583q7I.xrROeHz6UmrjhgJLGhWunYkvg8IQHIEtnhbO','TV MIKLTEA','96 MIKLTEA',NULL,'2019-04-02 08:42:33','2019-04-02 08:42:33',0,NULL),(7,'pvien01','pv1@allaravel.dev',NULL,'$2y$10$h.sRJXPWo2ZHw9lCbIKY/un35ys6g9.9aRDtHzAZreqDL4SDXs75.','Phóng viên 1',NULL,NULL,'2019-04-10 03:28:40','2019-04-10 03:28:40',0,NULL),(8,'pvien02','pv2@allaravel.dev',NULL,'$2y$10$z2M9PVc7PSIUy7KNf/UHz.4dyk.DVeCd.9Cz4n87FkNaLf9FcXf3m','Phóng viên 2',NULL,NULL,'2019-04-10 03:28:40','2019-04-10 03:28:40',0,NULL),(9,'pvien03','pvien03@gmail.com',NULL,'$2y$10$j0nl4fwTA.ErBwTYLW2HLeUt/WjNZZZ74aVau8NtkBnKemk0rGOI.','pvien03','pvvien03 address',NULL,'2019-04-12 03:59:41','2019-04-12 03:59:41',0,NULL),(11,'user01','user01@gmail.com',NULL,'$2y$10$ZaxbJiIgCuDt/oP8SB7QjemxEZZzu9Pk7IPHs12Abd8J6m.So8pTa','user01','user01fjdfdfdf',NULL,'2019-04-12 07:46:49','2019-04-12 07:46:49',0,NULL),(41,'abcxyz123','duongtruong9294@gmail.com',NULL,'$2y$10$3NtamwB9yPIfU3mrT7vimuJ3XvseUBQHRqiummP2T76JdEWKNlQxK','fdsfdsfdsfds56565465','hgfhgfhgfh565656',NULL,'2019-04-16 08:02:52','2019-04-16 08:03:11',1,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-19  3:15:05
