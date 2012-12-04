CREATE TABLE IF NOT EXISTS `blog_ads` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `url` char(255) NOT NULL,
  `cid` tinyint(2) NOT NULL,
  `type` tinyint(2) NOT NULL,
  `order` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;