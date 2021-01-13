DROP TABLE IF EXISTS `cms_maintenance`;
CREATE TABLE `cms_maintenance` (
  `id` int(11) UNSIGNED NOT NULL,
  `maintenance` enum('0','1') DEFAULT '0',
  `motivo` longtext NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

INSERT INTO `cms_maintenance` (`id`, `maintenance`, `motivo`, `timestamp`) VALUES (1, '0', 'Time to fix things', 0);

ALTER TABLE `cms_maintenance`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cms_maintenance`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;