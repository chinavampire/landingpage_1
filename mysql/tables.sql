/*
Navicat MySQL Data Transfer

Source Server         : simplifiedwebsite
Source Server Version : 50723
Source Host           : 162.215.255.54:3306
Source Database       : simplkbd_sw

Target Server Type    : MYSQL
Target Server Version : 50723
File Encoding         : 65001

Date: 2024-10-28 15:24:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `5_1_about`
-- ----------------------------
DROP TABLE IF EXISTS `5_1_about`;
CREATE TABLE `5_1_about` (
  `slogan` varchar(50) CHARACTER SET utf8 DEFAULT '',
  `content` varchar(1000) CHARACTER SET utf8 DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of 5_1_about
-- ----------------------------
INSERT INTO `5_1_about` VALUES ('Easiest way to build a website', 'I\'ve been coding for more than 5 years .\r\nI finished lots of projects for my friends and clients , here are some things i\'ve learned so far:\r\nYou think your website looks cool , maybe others don\'t think so .\r\nFunctions are more important than layouts since funtions can help manage your business which layouts can not.\r\nPlan could change due to new ideas come out at any time . That needs great patience even probably takes years.\r\nI have the patience .\r\nPlease feel free to contact me .\r\nI\'m always being patient and honored to solve your problems . ');

-- ----------------------------
-- Table structure for `5_1_account`
-- ----------------------------
DROP TABLE IF EXISTS `5_1_account`;
CREATE TABLE `5_1_account` (
  `sn` int(5) NOT NULL AUTO_INCREMENT,
  `account` varchar(20) CHARACTER SET utf8 DEFAULT '',
  `password` varchar(255) CHARACTER SET utf8mb4 DEFAULT '',
  `privilege` varchar(20) CHARACTER SET utf8 DEFAULT '',
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of 5_1_account
-- ----------------------------
INSERT INTO `5_1_account` VALUES ('1', 'admin', '$2y$10$u1U4JLfcQoYtzDHyo2IFL.sMo2F1Q8GhoqofeSf/BLbm0kbr9..PO', 'admin');
INSERT INTO `5_1_account` VALUES ('2', 'portfolio', '$2y$10$zNOHLAQDzVQi/xC9gp.8LuF2yNQmQ73wZieFBzy2YVA/tWVqplNwK', 'portfolio');
INSERT INTO `5_1_account` VALUES ('3', 'blog', '$2y$10$zNOHLAQDzVQi/xC9gp.8LuF2yNQmQ73wZieFBzy2YVA/tWVqplNwK', 'blog');
INSERT INTO `5_1_account` VALUES ('4', 'message', '$2y$10$zNOHLAQDzVQi/xC9gp.8LuF2yNQmQ73wZieFBzy2YVA/tWVqplNwK', 'message');

-- ----------------------------
-- Table structure for `5_1_blog`
-- ----------------------------
DROP TABLE IF EXISTS `5_1_blog`;
CREATE TABLE `5_1_blog` (
  `sn` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `content` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of 5_1_blog
-- ----------------------------
INSERT INTO `5_1_blog` VALUES ('2', 'This is the title of the event.', 'Here is the content.', 'Xinxiang Ha , China', '2023-04-02');
INSERT INTO `5_1_blog` VALUES ('3', 'This is the title of the event.', 'Here is the content.', 'Xinxiang Ha , China', '2023-04-03');

-- ----------------------------
-- Table structure for `5_1_home`
-- ----------------------------
DROP TABLE IF EXISTS `5_1_home`;
CREATE TABLE `5_1_home` (
  `home_name` varchar(50) CHARACTER SET utf8 DEFAULT '',
  `home_address` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `home_email` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `home_facebook` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `home_twitter` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `home_whatsapp` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `home_instagram` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `home_youtube` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `home_video_title` varchar(50) CHARACTER SET utf8 DEFAULT '',
  `home_video_show` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of 5_1_home
-- ----------------------------
INSERT INTO `5_1_home` VALUES ('Yu Chen', 'xinxiang', 'hnmicrosoft@163.com', 'fb', 'tw', 'whats', 'inst', 'yt', 'Create your website !!', '1');

-- ----------------------------
-- Table structure for `5_1_message`
-- ----------------------------
DROP TABLE IF EXISTS `5_1_message`;
CREATE TABLE `5_1_message` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `email` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `message` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of 5_1_message
-- ----------------------------

-- ----------------------------
-- Table structure for `5_1_portfolio`
-- ----------------------------
DROP TABLE IF EXISTS `5_1_portfolio`;
CREATE TABLE `5_1_portfolio` (
  `sn` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 DEFAULT '',
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of 5_1_portfolio
-- ----------------------------
INSERT INTO `5_1_portfolio` VALUES ('2', 'Health technology');
INSERT INTO `5_1_portfolio` VALUES ('3', 'Maki');
INSERT INTO `5_1_portfolio` VALUES ('4', 'The gig economy');

-- ----------------------------
-- Table structure for `5_1_slider`
-- ----------------------------
DROP TABLE IF EXISTS `5_1_slider`;
CREATE TABLE `5_1_slider` (
  `sn` int(5) NOT NULL AUTO_INCREMENT,
  `text` varchar(50) CHARACTER SET utf8 DEFAULT '',
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of 5_1_slider
-- ----------------------------
INSERT INTO `5_1_slider` VALUES ('1', 'Create your website costing you only $5 !');

-- ----------------------------
-- Table structure for `5_1_staff`
-- ----------------------------
DROP TABLE IF EXISTS `5_1_staff`;
CREATE TABLE `5_1_staff` (
  `sn` int(5) NOT NULL,
  `fullname` varchar(50) CHARACTER SET utf8 DEFAULT '',
  `post` varchar(50) CHARACTER SET utf8 DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of 5_1_staff
-- ----------------------------
INSERT INTO `5_1_staff` VALUES ('1', 'name1', 'Salesman');
INSERT INTO `5_1_staff` VALUES ('2', 'Name2', 'engineer');
