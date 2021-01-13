DROP TABLE IF EXISTS `cms_news_comment`;
CREATE TABLE `cms_news_comment` (
  `id` int(11) NOT NULL,
  `newsid` int(11) NOT NULL,
  `author` varchar(25) NOT NULL,
  `commentaire` varchar(600) NOT NULL,
  `thedate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
ALTER TABLE `cms_news_comment`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `cms_news_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;