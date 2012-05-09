-- phpMyAdmin SQL Dump

CREATE TABLE IF NOT EXISTS `YiiSeo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `content` text NOT NULL,
  `language` varchar(255) DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  `param` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3 ;

