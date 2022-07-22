-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: laravel_practise
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.22.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_role`
--

DROP TABLE IF EXISTS `admin_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_role` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` int NOT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_role`
--

LOCK TABLES `admin_role` WRITE;
/*!40000 ALTER TABLE `admin_role` DISABLE KEYS */;
INSERT INTO `admin_role` VALUES (2,2,2,NULL,NULL);
/*!40000 ALTER TABLE `admin_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_active` datetime DEFAULT NULL,
  `created_by_id` int DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'superadmin',NULL,NULL,'admin@gmail.com','$2y$10$DaIyjtj2Of6iipYC5WjhQeDIvcpprxhCHC4MObUQin.9VJKOTMie2','super_admin',1,NULL,NULL,NULL,NULL,NULL,'2022-07-21 19:59:45','2022-07-21 19:59:45'),(2,'pushpa','pushpa','shakya','pushpa@gmail.com','$2y$10$6JaLt.5lhuDLwhScn9sJ9uUym93t33Pkx5mCJmRITGpwF8J93oe46','admin',1,NULL,NULL,1,NULL,NULL,'2022-07-21 20:02:07','2022-07-21 20:03:15');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL,
  `created_by_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2022_07_20_060560_create_table_banner',1),(2,'2022_07_20_066234_create_pages_table',2),(20,'2022_07_20_102957_create_table_setting',3),(21,'2022_07_20_061154_create_tbl_admin',4),(22,'2022_07_20_061636_create_tbl_password_reset',4),(23,'2022_07_20_065623_create_table_roles',4),(24,'2022_07_20_065903_create_table_premission',4),(25,'2022_07_20_065956_create_table_admin_roles',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro_text` text COLLATE utf8mb4_unicode_ci,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `page_type` text COLLATE utf8mb4_unicode_ci,
  `page_template` text COLLATE utf8mb4_unicode_ci,
  `parent_page_id` text COLLATE utf8mb4_unicode_ci,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_image_caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,1,'banner.index',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(2,1,'banner.create',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(3,1,'banner.store',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(4,1,'banner.show',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(5,1,'banner.edit',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(6,1,'banner.update',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(7,1,'banner.destroy',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(8,1,'banner.delete',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(9,1,'banner.status',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(10,1,'banner.removeImage',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(11,1,'banner.removeFile',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(12,1,'page.index',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(13,1,'page.create',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(14,1,'page.store',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(15,1,'page.show',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(16,1,'page.edit',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(17,1,'page.update',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(18,1,'page.destroy',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(19,1,'page.delete',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(20,1,'page.status',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(21,1,'page.removeImage',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(22,1,'page.removeFile',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(23,1,'admin.update',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(24,1,'admin.index',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(25,1,'admin.create',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(26,1,'admin.store',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(27,1,'admin.edit',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(28,1,'admin.destroy',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(29,1,'admin.status',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(30,1,'admin.removeImage',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(31,1,'role.index',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(32,1,'role.create',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(33,1,'role.store',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(34,1,'role.edit',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(35,1,'role.update',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(36,1,'role.delete',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(37,1,'role.status',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(38,1,'role.destroy',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(39,1,'globalsetting.create',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(40,1,'globalsetting.store',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(41,1,'globalsetting.show',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(42,1,'globalsetting.edit',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(43,1,'globalsetting.update',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(44,1,'globalsetting.destroy',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(45,1,'globalsetting.delete',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(46,1,'globalsetting.removeImage',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(47,1,'setting.change-password',NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(48,2,'banner.index',NULL,'2022-07-21 20:01:23','2022-07-21 20:01:23'),(49,2,'banner.create',NULL,'2022-07-21 20:01:23','2022-07-21 20:01:23'),(50,2,'banner.store',NULL,'2022-07-21 20:01:23','2022-07-21 20:01:23'),(51,2,'banner.show',NULL,'2022-07-21 20:01:23','2022-07-21 20:01:23'),(52,2,'banner.edit',NULL,'2022-07-21 20:01:23','2022-07-21 20:01:23'),(53,2,'banner.update',NULL,'2022-07-21 20:01:23','2022-07-21 20:01:23'),(54,2,'banner.destroy',NULL,'2022-07-21 20:01:23','2022-07-21 20:01:23'),(55,2,'banner.delete',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(56,2,'banner.status',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(57,2,'banner.removeImage',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(58,2,'banner.removeFile',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(59,2,'page.index',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(60,2,'page.create',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(61,2,'page.store',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(62,2,'page.show',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(63,2,'page.edit',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(64,2,'page.update',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(65,2,'page.destroy',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(66,2,'page.delete',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(67,2,'page.status',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(68,2,'page.removeImage',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(69,2,'page.removeFile',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(70,2,'globalsetting.create',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(71,2,'globalsetting.store',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(72,2,'globalsetting.show',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(73,2,'globalsetting.edit',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(74,2,'globalsetting.update',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(75,2,'globalsetting.destroy',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(76,2,'globalsetting.delete',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24'),(77,2,'globalsetting.removeImage',NULL,'2022-07-21 20:01:24','2022-07-21 20:01:24');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL,
  `created_by_id` int NOT NULL,
  `status` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin',1,1,1,NULL,'2022-07-21 20:01:00','2022-07-21 20:01:00'),(2,'User',2,1,1,NULL,'2022-07-21 20:01:23','2022-07-21 20:01:23');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `organisation_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organisation_logo_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organisation_logo_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax_number_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax_number_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_np` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tweeter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-22  7:37:11
