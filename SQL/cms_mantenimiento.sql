DROP TABLE IF EXISTS `cms_mantenimiento`;
CREATE TABLE `cms_mantenimiento` (
  `id` int(11) UNSIGNED NOT NULL,
  `mantenimiento` enum('0','1') DEFAULT '0',
  `motivo` longtext NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;
INSERT INTO `cms_mantenimiento` VALUES (1,'0','','');