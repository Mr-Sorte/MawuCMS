DROP TABLE IF EXISTS `cms_hklogs`;
CREATE TABLE `cms_hklogs` (
  `id` int(11) NOT NULL,
  `type` varchar(550) NOT NULL,
  `note` varchar(550) NOT NULL,
  `author_name` varchar(550) NOT NULL,
  `author_id` int(11) NOT NULL,
  `author_rank` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `cms_hklogs`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `cms_hklogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;