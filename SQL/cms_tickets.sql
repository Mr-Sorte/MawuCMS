DROP TABLE IF EXISTS `cms_tickets`;
CREATE TABLE `cms_tickets` (
  `id` int(11) NOT NULL,
  `category` enum('ajuda','reclamacao','bugs','sugestoes','contato') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'ajuda',
  `ticket` text NOT NULL,
  `date` int(11) NOT NULL DEFAULT '0',
  `author_name` varchar(550) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `cms_tickets`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `cms_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;