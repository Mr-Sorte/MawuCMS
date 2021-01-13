DROP TABLE IF EXISTS `cms_news`;
CREATE TABLE `cms_news` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `image` varchar(500) NOT NULL,
  `shortstory` text NOT NULL,
  `longstory` text NOT NULL,
  `author` varchar(200) NOT NULL DEFAULT 'Hotel',
  `livenews` enum('0','1') NOT NULL DEFAULT '0',
  `active_comment` enum('0','1') DEFAULT '0',
  `active_form` enum('0','1') DEFAULT '0',
  `active_badge` enum('0','1') NOT NULL DEFAULT '0',
  `category` enum('gratis','hotel','mobis','promocao','sistema') NOT NULL DEFAULT 'hotel',
  `badge` varchar(550) NOT NULL,
  `date` int(11) NOT NULL DEFAULT '0',
  `gotoclient` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `cms_news`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `cms_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;