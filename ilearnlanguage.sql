/*
Navicat MySQL Data Transfer

Source Server         : mydb
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : ilearnlanguage

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2017-06-22 14:34:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bookmark_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `bookmark_tbl`;
CREATE TABLE `bookmark_tbl` (
  `bookmark_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `del_flag` tinyint(1) NOT NULL,
  PRIMARY KEY (`bookmark_id`),
  KEY `bookmark_tbl_ibfk_1` (`student_id`),
  KEY `bookmark_tbl_ibfk_2` (`teacher_id`),
  CONSTRAINT `bookmark_tbl_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_tbl` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bookmark_tbl_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_tbl` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bookmark_tbl
-- ----------------------------

-- ----------------------------
-- Table structure for `credit_package_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `credit_package_tbl`;
CREATE TABLE `credit_package_tbl` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_money` int(11) NOT NULL,
  `package_credits` int(11) NOT NULL,
  `package_save` int(11) NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of credit_package_tbl
-- ----------------------------

-- ----------------------------
-- Table structure for `favourites_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `favourites_tbl`;
CREATE TABLE `favourites_tbl` (
  `favourite_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`favourite_id`),
  KEY `student_id` (`student_id`),
  KEY `teacher_id` (`teacher_id`),
  CONSTRAINT `favourites_tbl_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_tbl` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `favourites_tbl_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_tbl` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of favourites_tbl
-- ----------------------------

-- ----------------------------
-- Table structure for `lessons_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `lessons_tbl`;
CREATE TABLE `lessons_tbl` (
  `lesson_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `lesson_status` int(1) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `del_flag` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  PRIMARY KEY (`lesson_id`),
  KEY `lessons_tbl_ibfk_1` (`teacher_id`),
  KEY `lessons_tbl_ibfk_2` (`student_id`),
  CONSTRAINT `lessons_tbl_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_tbl` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lessons_tbl_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student_tbl` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lessons_tbl
-- ----------------------------
INSERT INTO `lessons_tbl` VALUES ('1', '38', '5', '0', '2016-08-21 01:54:27', '0', '2016-08-21', '17:54:40', '21:54:50');

-- ----------------------------
-- Table structure for `lesson_history_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `lesson_history_tbl`;
CREATE TABLE `lesson_history_tbl` (
  `history_id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `lesson_date` date NOT NULL,
  `lesson_time` time NOT NULL,
  `lesson_credits` int(11) NOT NULL,
  `rating` float NOT NULL,
  `review` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`history_id`),
  KEY `lesson_history_tbl_ibfk_1` (`lesson_id`),
  CONSTRAINT `lesson_history_tbl_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `lessons_tbl` (`lesson_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lesson_history_tbl
-- ----------------------------

-- ----------------------------
-- Table structure for `session_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `session_tbl`;
CREATE TABLE `session_tbl` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of session_tbl
-- ----------------------------
INSERT INTO `session_tbl` VALUES ('1', '1_MX40NTYyMzcxMn5-MTQ3MDY1MTExNjAxM35WWlM3VkhsaHMrUnVjUEU1Vmk1bFU5Nlh-UH4', '2016-08-08 18:11:56');
INSERT INTO `session_tbl` VALUES ('2', '1_MX40NTYyMzcxMn5-MTQ3MDY1MTcxNjk5Mn5zQzBlNGN2VElFWGdPVGhkOWk1a1BJcG1-UH4', '2016-08-08 18:21:57');
INSERT INTO `session_tbl` VALUES ('3', '1_MX40NTYyMzcxMn5-MTQ3MDY1MjM3NjYxMH54SGZOc1k5NjNWZ09vaHVBZi9xYy82UXV-UH4', '2016-08-08 18:32:57');
INSERT INTO `session_tbl` VALUES ('4', '1_MX40NTYyMzcxMn5-MTQ3MDY1MjU5MzUxN34vK3MwVTNyUm1TYnJlSFRZSk8yUXBQTkZ-UH4', '2016-08-08 18:36:34');
INSERT INTO `session_tbl` VALUES ('5', '2_MX40NTYyMzcxMn5-MTQ3MDY1MzA3NjMxMX5ub0s1U3J2QnlEUllqU2F5K1EwNmFoVEp-UH4', '2016-08-08 18:44:36');
INSERT INTO `session_tbl` VALUES ('6', '1_MX40NTYyMzcxMn5-MTQ3MDY1Mzc3MDA5OX5hbDZBSkxBN2dJZE91V2g4dTI2ekZ3Mlp-UH4', '2016-08-08 18:56:10');
INSERT INTO `session_tbl` VALUES ('7', '2_MX40NTYyMzcxMn5-MTQ3MDY1Mzg4MjE1MH5KTktXaXdNVE5SeWFxbjA0c1NnWFJxRXJ-UH4', '2016-08-08 18:58:02');
INSERT INTO `session_tbl` VALUES ('8', '1_MX40NTYyMzcxMn5-MTQ3MDY1NDEwMzg2M34weVl1Vk52cUV0dXNjSUhFNDY5Y1NhVXB-fg', '2016-08-08 19:01:44');
INSERT INTO `session_tbl` VALUES ('9', '2_MX40NTYyMzcxMn5-MTQ3MDY1NDMxNjQ4M35wbXBUbGx2cURaUko1OWc0YmZNWGRBd3N-fg', '2016-08-08 19:05:17');
INSERT INTO `session_tbl` VALUES ('10', '2_MX40NTYyMzcxMn5-MTQ3MDY1NDMyMzM3M35kejcySTBBc0lrOE5CMG9pd1Y4ck8rd2x-fg', '2016-08-08 19:05:23');
INSERT INTO `session_tbl` VALUES ('11', '2_MX40NTYyMzcxMn5-MTQ3MDY2NTA1MjI2Nn5JUGdEL1ZuaWNnWWcrNmMxOTlkYkxIOTJ-fg', '2016-08-08 22:04:12');
INSERT INTO `session_tbl` VALUES ('12', '1_MX40NTYyMzcxMn5-MTQ3MDY2NTQ4Mjg3OH4zcFhtd3ZDRmhwT2hPQ1QxWjZDT0NEaG1-fg', '2016-08-08 22:11:23');

-- ----------------------------
-- Table structure for `student_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `student_tbl`;
CREATE TABLE `student_tbl` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `residing_in` varchar(255) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `native_language` varchar(255) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `credits` int(11) DEFAULT '0',
  `country_code` varchar(5) NOT NULL,
  `user_photo` varchar(255) NOT NULL,
  PRIMARY KEY (`student_id`),
  KEY `phone_id` (`phone_number`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `student_tbl_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user_tbl` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of student_tbl
-- ----------------------------
INSERT INTO `student_tbl` VALUES ('5', '90', 'Bryan', 'UK', '12345678', null, 'M', '0', '224', '');

-- ----------------------------
-- Table structure for `teacher_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `teacher_tbl`;
CREATE TABLE `teacher_tbl` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `native_language` varchar(255) NOT NULL,
  `fluent_language` varchar(255) NOT NULL,
  `gender` varchar(1) NOT NULL DEFAULT '',
  `dob_month` int(2) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `residing_in` varchar(255) NOT NULL,
  `paypal_id` varchar(255) DEFAULT NULL,
  `phone_number` varchar(11) DEFAULT NULL,
  `hour_rate` int(3) DEFAULT NULL,
  `overview` varchar(255) DEFAULT NULL,
  `user_photo` varchar(255) DEFAULT NULL,
  `video_intro` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `online_for` float(255,0) DEFAULT NULL,
  `credits` int(255) DEFAULT NULL,
  `dob_day` int(2) NOT NULL,
  `week_hours` varchar(11) DEFAULT NULL,
  `country_code` varchar(255) NOT NULL,
  `rating` float NOT NULL,
  PRIMARY KEY (`teacher_id`),
  UNIQUE KEY `user_id` (`user_id`) USING BTREE,
  KEY `teacher_tbl_ibfk_2` (`phone_number`),
  CONSTRAINT `teacher_tbl_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user_tbl` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of teacher_tbl
-- ----------------------------
INSERT INTO `teacher_tbl` VALUES ('38', '77', 'RisingStar', 'R.star', 'United States', 'United States', 'F', '10', 'United States', 'tree avenue', '13425', '1535215', '65', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. \r\n			                    	Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. \r\n			                    	Lorem ipsum dolor sit amet, consectetur adi', '', '', '0', null, '0', '14', 'more than 3', '1', '0');
INSERT INTO `teacher_tbl` VALUES ('39', '78', 'Carlos', 'CarlosOrstega', 'Haiti', 'Somalia', 'F', '5', 'Moldova', 'city', '19374', '10384872', '25', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. \r\n			                    	Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. \r\n			                    	Lorem ipsum dolor sit amet, consectetur adi', '', '', '1', null, '0', '16', 'more than 3', '504', '0');
INSERT INTO `teacher_tbl` VALUES ('41', '92', 'Alonzo', 'Alonzo Barrett', 'United States', 'United States', 'M', '10', 'United States', 'United States', '12553', '12459345', '65', '**********************I AM ACCEPTING NEW STUDENTS********************** I love sharing my language with others and helping students become confident, fluent English speakers! I have experience working in Japan and the US as a language teacher and I love w', '', '', '0', null, '0', '17', 'less than 3', '1', '0');
INSERT INTO `teacher_tbl` VALUES ('42', '93', 'Penguin', 'Penguin King', 'Antigua and Barbuda', 'Ethiopia', 'F', '6', 'Bahamas', 'United States', '14124', '12459345', '50', 'Hi, My Name is Bahamas , and I have been teaching english as a second language for 10 years. I love to teach you. Thank you....', ' ', ' ', '0', null, '0', '12', 'less than 3', '43', '0');
INSERT INTO `teacher_tbl` VALUES ('43', '94', 'Happy ', 'Happy boy', 'United States', 'Algeria', 'F', '8', 'Palau', 'United States', '19387', '19038473', '70', 'Happy Teacher', '', '', '0', null, '0', '15', 'more than 3', '1', '0');
INSERT INTO `teacher_tbl` VALUES ('44', '95', 'Good', 'John Stewart', 'United States', 'Wallis and Futuna', 'M', '5', 'United States', 'United States', '19384', '1038743', '77', 'Happy Teacher', '', '', '0', null, '0', '15', 'more than 3', '1', '0');

-- ----------------------------
-- Table structure for `teach_languages_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `teach_languages_tbl`;
CREATE TABLE `teach_languages_tbl` (
  `teach_language_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `language_name` varchar(255) NOT NULL,
  PRIMARY KEY (`teach_language_id`),
  KEY `teach_languages_tbl_ibfk_1` (`teacher_id`),
  CONSTRAINT `teach_languages_tbl_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_tbl` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of teach_languages_tbl
-- ----------------------------
INSERT INTO `teach_languages_tbl` VALUES ('1', '38', 'United States');
INSERT INTO `teach_languages_tbl` VALUES ('2', '39', 'United States');
INSERT INTO `teach_languages_tbl` VALUES ('4', '41', 'United States');
INSERT INTO `teach_languages_tbl` VALUES ('5', '42', 'Austria');
INSERT INTO `teach_languages_tbl` VALUES ('6', '43', 'United States');
INSERT INTO `teach_languages_tbl` VALUES ('7', '44', 'United States');

-- ----------------------------
-- Table structure for `timetable_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `timetable_tbl`;
CREATE TABLE `timetable_tbl` (
  `timetable_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `time_status` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `del_flag` tinyint(4) NOT NULL,
  PRIMARY KEY (`timetable_id`),
  KEY `timetable_tbl_ibfk_1` (`teacher_id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `timetable_tbl_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_tbl` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `timetable_tbl_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student_tbl` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of timetable_tbl
-- ----------------------------
INSERT INTO `timetable_tbl` VALUES ('59', '38', null, '0', '2016-08-23', '12:00:00', '12:30:00', '0');
INSERT INTO `timetable_tbl` VALUES ('60', '38', null, '0', '2016-08-26', '15:00:00', '15:30:00', '0');
INSERT INTO `timetable_tbl` VALUES ('61', '38', null, '0', '2016-08-27', '09:30:00', '10:00:00', '0');
INSERT INTO `timetable_tbl` VALUES ('62', '38', null, '0', '2016-08-22', '10:00:00', '10:30:00', '0');
INSERT INTO `timetable_tbl` VALUES ('63', '38', null, '0', '2016-08-25', '02:30:00', '05:00:00', '0');
INSERT INTO `timetable_tbl` VALUES ('64', '38', null, '0', '2016-08-25', '11:30:00', '13:30:00', '0');

-- ----------------------------
-- Table structure for `user_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `user_tbl`;
CREATE TABLE `user_tbl` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_type` int(1) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `del_flag` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'delete flag',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_tbl
-- ----------------------------
INSERT INTO `user_tbl` VALUES ('77', 'hhrijy@outlook.com', '111', '0', '2016-08-20 00:48:01', '0');
INSERT INTO `user_tbl` VALUES ('78', 'happy@gmail.com', '111', '0', '2016-08-20 11:32:23', '0');
INSERT INTO `user_tbl` VALUES ('90', 'bryan@outlook.com', '111', '1', '2016-08-20 14:58:00', '0');
INSERT INTO `user_tbl` VALUES ('92', 'alonzo@outlook.com', '111', '0', '2016-08-23 10:07:41', '0');
INSERT INTO `user_tbl` VALUES ('93', 'perguin@yandex.com', '111', '0', '2016-08-23 17:39:19', '0');
INSERT INTO `user_tbl` VALUES ('94', 'happy@yandex.com', '111', '0', '2016-08-23 18:39:42', '0');
INSERT INTO `user_tbl` VALUES ('95', 'good@outlook.com', '111', '0', '2016-08-23 18:44:40', '0');
