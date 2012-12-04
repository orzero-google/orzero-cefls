-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 12 月 04 日 10:45
-- 服务器版本: 5.5.25a
-- PHP 版本: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `cefls`
--

-- --------------------------------------------------------

--
-- 表的结构 `blog_menu`
--

DROP TABLE IF EXISTS `blog_menu`;
CREATE TABLE IF NOT EXISTS `blog_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `menu_name` varchar(255) NOT NULL,
  `menu_type` smallint(3) NOT NULL DEFAULT '0',
  `menu_sort` int(4) NOT NULL DEFAULT '0',
  `menu_count` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- 转存表中的数据 `blog_menu`
--

INSERT INTO `blog_menu` (`menu_id`, `parent_id`, `menu_name`, `menu_type`, `menu_sort`, `menu_count`) VALUES
(1, 0, '关于实外', 1, 0, 0),
(2, 0, '师资队伍', 1, 0, 0),
(3, 0, '德育视窗', 1, 0, 0),
(4, 0, '教学科研', 1, 0, 0),
(5, 0, '外语特色', 1, 0, 0),
(6, 0, '交流合作', 1, 0, 0),
(7, 0, '学子风采', 1, 0, 0),
(8, 0, '艺体天地', 1, 0, 0),
(9, 0, '感悟实外', 1, 0, 0),
(10, 1, '实外概况', 2, 0, 0),
(11, 1, '实外文化', 2, 0, 0),
(12, 1, '领导班子', 2, 0, 0),
(13, 1, '组织结构', 2, 0, 0),
(14, 1, '媒体关注', 2, 0, 0),
(15, 1, '资证荣誉', 2, 0, 0),
(16, 1, '大事纪要', 2, 0, 0),
(17, 1, '联系我们', 2, 0, 0),
(18, 2, '数学教师', 2, 0, 0),
(19, 2, '语文教师', 2, 0, 0),
(20, 2, '外语教师', 2, 0, 0),
(21, 2, '物理教师', 2, 0, 0),
(22, 2, '化学教师', 2, 0, 0),
(23, 2, '政治教师', 2, 0, 0),
(24, 2, '历史教师', 2, 0, 0),
(25, 2, '地理教师', 2, 0, 0),
(26, 2, '艺体教师', 2, 0, 0),
(27, 2, '生理卫生教师', 2, 0, 0),
(28, 2, '信息技术教师', 2, 0, 0),
(29, 3, '德育管理', 2, 0, 0),
(30, 3, '德育动态', 2, 0, 0),
(31, 3, '团队活动', 2, 0, 0),
(32, 3, '心理教育', 2, 0, 0),
(33, 3, '德育成果', 2, 0, 0),
(34, 4, '学研管理', 2, 0, 0),
(35, 4, '教学动态', 2, 0, 0),
(36, 4, '教研活动', 2, 0, 0),
(37, 4, '课堂延伸', 2, 0, 0),
(38, 4, '教学成果', 2, 0, 0),
(39, 5, '英语课堂', 2, 0, 0),
(40, 5, '外教风采', 2, 0, 0),
(41, 5, '活动集锦', 2, 0, 0),
(42, 5, '法德苑地', 2, 0, 0),
(43, 5, '外语佳作', 2, 0, 0),
(44, 5, '赛事风云', 2, 0, 0),
(45, 5, '学习资源', 2, 0, 0),
(46, 6, '友好学校', 2, 0, 0),
(47, 6, '国内互动', 2, 0, 0),
(48, 6, '国际往来', 2, 0, 0),
(49, 6, '合作项目', 2, 0, 0),
(50, 7, '状元金榜', 2, 0, 0),
(51, 7, '理科精英', 2, 0, 0),
(52, 7, '文科翘楚', 2, 0, 0),
(53, 7, '高考年报', 2, 0, 0),
(54, 8, '运动时空', 2, 0, 0),
(55, 8, '音乐之声', 2, 0, 0),
(56, 8, '美术佳苑', 2, 0, 0),
(57, 9, '学子寄情', 2, 0, 0),
(58, 9, '家长抒怀', 2, 0, 0),
(59, 9, '教师达意', 2, 0, 0),
(60, 9, '媒评舆论', 2, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
