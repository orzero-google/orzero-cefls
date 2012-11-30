-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 11 月 30 日 08:27
-- 服务器版本: 5.5.25a
-- PHP 版本: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `api_2`
--

-- --------------------------------------------------------

--
-- 表的结构 `blog_authassignment`
--

DROP TABLE IF EXISTS `blog_authassignment`;
CREATE TABLE IF NOT EXISTS `blog_authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_authassignment`
--

INSERT INTO `blog_authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;'),
('Authenticated', '2', NULL, 'N;');

-- --------------------------------------------------------

--
-- 表的结构 `blog_authitem`
--

DROP TABLE IF EXISTS `blog_authitem`;
CREATE TABLE IF NOT EXISTS `blog_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_authitem`
--

INSERT INTO `blog_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, NULL, NULL, 'N;'),
('Authenticated', 2, 'Authenticated user', NULL, 'N;'),
('Comment.*', 1, 'Access all comment actions', NULL, 'N;'),
('Comment.Approve', 0, 'Approve comments', NULL, 'N;'),
('Comment.Delete', 0, 'Delete comments', NULL, 'N;'),
('Comment.Update', 0, 'Update comments', NULL, 'N;'),
('CommentAdministration', 1, 'Administration of comments', NULL, 'N;'),
('Editor', 2, 'Editor', NULL, 'N;'),
('Guest', 2, 'Guest user', NULL, 'N;'),
('Post.*', 1, 'Access all post actions', NULL, 'N;'),
('Post.Admin', 0, 'Administer posts', NULL, 'N;'),
('Post.Create', 0, 'Create posts', NULL, 'N;'),
('Post.Delete', 0, 'Delete posts', NULL, 'N;'),
('Post.Update', 0, 'Update posts', NULL, 'N;'),
('Post.View', 0, 'View posts', NULL, 'N;'),
('PostAdministrator', 1, 'Administration of posts', NULL, 'N;'),
('PostUpdateOwn', 0, 'Update own posts', 'return Yii::app()->user->id==$params["userid"];', 'N;');

-- --------------------------------------------------------

--
-- 表的结构 `blog_authitemchild`
--

DROP TABLE IF EXISTS `blog_authitemchild`;
CREATE TABLE IF NOT EXISTS `blog_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_authitemchild`
--

INSERT INTO `blog_authitemchild` (`parent`, `child`) VALUES
('Editor', 'Authenticated'),
('CommentAdministration', 'Comment.*'),
('Editor', 'CommentAdministration'),
('Authenticated', 'CommentUpdateOwn'),
('Authenticated', 'Guest'),
('PostAdministrator', 'Post.*'),
('PostAdministrator', 'Post.Admin'),
('Authenticated', 'Post.Create'),
('PostAdministrator', 'Post.Create'),
('PostAdministrator', 'Post.Delete'),
('PostAdministrator', 'Post.Update'),
('Guest', 'Post.View'),
('Editor', 'PostAdministrator'),
('Authenticated', 'PostUpdateOwn');

-- --------------------------------------------------------

--
-- 表的结构 `blog_comment`
--

DROP TABLE IF EXISTS `blog_comment`;
CREATE TABLE IF NOT EXISTS `blog_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `author` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `url` varchar(128) DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comment_post` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `content`, `status`, `create_time`, `author`, `email`, `url`, `post_id`) VALUES
(1, 'This is a test comment.', 2, 1230952187, 'Tester', 'tester@example.com', NULL, 2);

-- --------------------------------------------------------

--
-- 表的结构 `blog_lookup`
--

DROP TABLE IF EXISTS `blog_lookup`;
CREATE TABLE IF NOT EXISTS `blog_lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(128) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `blog_lookup`
--

INSERT INTO `blog_lookup` (`id`, `name`, `code`, `type`, `position`) VALUES
(1, 'Draft', 1, 'PostStatus', 1),
(2, 'Published', 2, 'PostStatus', 2),
(3, 'Archived', 3, 'PostStatus', 3),
(4, 'Pending Approval', 1, 'CommentStatus', 1),
(5, 'Approved', 2, 'CommentStatus', 2);

-- --------------------------------------------------------

--
-- 表的结构 `blog_post`
--

DROP TABLE IF EXISTS `blog_post`;
CREATE TABLE IF NOT EXISTS `blog_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `tags` text,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_post_author` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `blog_post`
--

INSERT INTO `blog_post` (`id`, `title`, `content`, `tags`, `status`, `create_time`, `update_time`, `author_id`) VALUES
(1, 'Welcome!', 'This blog system is developed using Yii. It is meant to demonstrate how to use Yii to build a complete real-world application. Complete source code may be found in the Yii releases.\r\n\r\nFeel free to try this system by writing new posts and posting comments.', 'yii, blog', 2, 1230952187, 1230952187, 1),
(2, 'A Test Post', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'test', 2, 1230952187, 1230952187, 1),
(3, '阿萨德发生', ' 阿萨德发生的', '2saf', 2, 1354176366, 1354176366, 1);

-- --------------------------------------------------------

--
-- 表的结构 `blog_rights`
--

DROP TABLE IF EXISTS `blog_rights`;
CREATE TABLE IF NOT EXISTS `blog_rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_rights`
--

INSERT INTO `blog_rights` (`itemname`, `type`, `weight`) VALUES
('Authenticated', 2, 1),
('Editor', 2, 0),
('Guest', 2, 2);

-- --------------------------------------------------------

--
-- 表的结构 `blog_tag`
--

DROP TABLE IF EXISTS `blog_tag`;
CREATE TABLE IF NOT EXISTS `blog_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `frequency` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `blog_tag`
--

INSERT INTO `blog_tag` (`id`, `name`, `frequency`) VALUES
(1, 'yii', 1),
(2, 'blog', 1),
(3, 'test', 1),
(4, '2saf', 1);

-- --------------------------------------------------------

--
-- 表的结构 `blog_user`
--

DROP TABLE IF EXISTS `blog_user`;
CREATE TABLE IF NOT EXISTS `blog_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `salt` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `profile` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `blog_user`
--

INSERT INTO `blog_user` (`id`, `username`, `password`, `salt`, `email`, `profile`) VALUES
(1, 'admin', '9401b8c7297832c567ae922cc596a4dd', '28b206548469ce62182048fd9cf91760', 'webmaster@example.com', NULL),
(2, 'demo', '2e5c7db760a33498023813489cfadc0b', '28b206548469ce62182048fd9cf91760', 'webmaster@example.com', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_article`
--

DROP TABLE IF EXISTS `tbl_article`;
CREATE TABLE IF NOT EXISTS `tbl_article` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `from` varchar(255) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `cid` int(2) NOT NULL,
  `audit` tinyint(2) NOT NULL,
  `grade` tinyint(1) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  `title` text NOT NULL,
  `excerpt` text NOT NULL,
  `content` longtext NOT NULL,
  `author` varchar(64) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(8) NOT NULL,
  `type` smallint(2) NOT NULL,
  `clicknumber` int(8) DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_migration`
--

DROP TABLE IF EXISTS `tbl_migration`;
CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1353059126),
('m110805_153437_installYiiUser', 1353059159),
('m110810_162301_userTimestampFix', 1353059159);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_profiles`
--

DROP TABLE IF EXISTS `tbl_profiles`;
CREATE TABLE IF NOT EXISTS `tbl_profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `tbl_profiles`
--

INSERT INTO `tbl_profiles` (`user_id`, `first_name`, `last_name`) VALUES
(1, 'Administrator', 'Admin'),
(2, 'xami', 'orzero'),
(3, 'xami', '520');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_profiles_fields`
--

DROP TABLE IF EXISTS `tbl_profiles_fields`;
CREATE TABLE IF NOT EXISTS `tbl_profiles_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `field_type` varchar(50) NOT NULL DEFAULT '',
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` text,
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` text,
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `tbl_profiles_fields`
--

INSERT INTO `tbl_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'first_name', 'First Name', 'VARCHAR', 255, 3, 2, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'last_name', 'Last Name', 'VARCHAR', 255, 3, 2, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 2, 3);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(128) NOT NULL DEFAULT '',
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_username` (`username`),
  UNIQUE KEY `user_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `activkey`, `superuser`, `status`, `create_at`, `lastvisit_at`) VALUES
(1, 'admin', '406319e986398247e47bdcb4d5c59831', 'webmaster@example.com', '669360d2530cbea3b4f4b9119e895bd2', 1, 1, '2012-11-16 09:45:59', '2012-11-29 23:43:32'),
(2, 'xami', '406319e986398247e47bdcb4d5c59831', 'xami520@qq.com', '6a6c20e323d61f476d6461f0d9a14cbd', 0, 0, '2012-11-19 02:34:56', '0000-00-00 00:00:00'),
(3, 'xami520', '406319e986398247e47bdcb4d5c59831', '77765997@qq.com', '56b747a929c639c717fb0f1b81aa6fa5', 0, 0, '2012-11-27 05:33:51', '0000-00-00 00:00:00');

--
-- 限制导出的表
--

--
-- 限制表 `blog_authassignment`
--
ALTER TABLE `blog_authassignment`
  ADD CONSTRAINT `blog_authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `blog_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `tbl_profiles`
--
ALTER TABLE `tbl_profiles`
  ADD CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
