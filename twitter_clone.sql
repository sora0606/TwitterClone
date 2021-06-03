-- MySQL dump 10.13Distrib 5.7.32, for osx10.12 (x86_64)
--
-- Host: localhostDatabase: twitter_clone
-- ------------------------------------------------------
-- Server version	5.7.32

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
-- Table structure for table `follows`
--

DROP TABLE IF EXISTS `follows`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `follows` (
`id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
`status` varchar(20) NOT NULL DEFAULT 'active' COMMENT 'フォローステータス',
`follow_user_id` int(11) NOT NULL COMMENT 'フォローしたユーザーID',
`followed_user_id` int(11) NOT NULL COMMENT 'フォローされたユーザーID',
`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '登録日時',
`updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新日時',
PRIMARY KEY (`id`),
KEY `id` (`status`,`follow_user_id`,`followed_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
`id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
`status` varchar(20) NOT NULL DEFAULT 'active' COMMENT 'いいね！ステータス',
`user_id` int(11) NOT NULL COMMENT 'いいね！したユーザーのID',
`tweet_id` int(11) NOT NULL COMMENT 'いいね！されたつぶやきのID',
`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '登録日時',
`updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新日時',
PRIMARY KEY (`id`),
KEY `status` (`status`,`user_id`,`tweet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
`id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
`status` varchar(20) NOT NULL DEFAULT 'active' COMMENT '通知ステータス',
`recieved_user_id` int(11) NOT NULL COMMENT '通知を受信したユーザーID',
`sent_user_id` int(11) NOT NULL COMMENT 'フォローか、いいね！したユーザーID',
`message` varchar(50) NOT NULL COMMENT '通知メッセージ',
`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '登録日時',
`updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新日時',
PRIMARY KEY (`id`),
KEY `status` (`status`,`recieved_user_id`,`sent_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tweets`
--

DROP TABLE IF EXISTS `tweets`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tweets` (
`id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
`status` varchar(20) NOT NULL DEFAULT 'active' COMMENT 'つぶやきステータス',
`user_id` int(11) NOT NULL COMMENT 'つぶやいたユーザーのID',
`body` varchar(140) NOT NULL COMMENT 'つぶやき',
`image_name` varchar(500) DEFAULT NULL COMMENT 'つぶやき画像',
`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '登録日時',
`updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新日時',
PRIMARY KEY (`id`),
KEY `status` (`status`),
KEY `user_id` (`user_id`),
KEY `body` (`body`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
`id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
`status` varchar(20) NOT NULL DEFAULT 'active' COMMENT '会員ステータス',
`nickname` varchar(50) NOT NULL COMMENT 'ニックネーム',
`name` varchar(50) NOT NULL COMMENT 'ユーザー名',
`email` varchar(254) NOT NULL COMMENT 'メールアドレス',
`password` varchar(128) NOT NULL COMMENT 'パスワード',
`image_name` varchar(100) DEFAULT NULL COMMENT 'ユーザーアイコン',
`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '登録日時',
`updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新日時',
PRIMARY KEY (`id`),
KEY `status` (`status`),
KEY `nickname` (`nickname`,`name`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-03 22:13:13
