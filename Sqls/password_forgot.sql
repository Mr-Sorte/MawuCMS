DROP TABLE IF EXISTS `password_forgot`;
CREATE TABLE `password_forgot` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `linkreset` varchar(64) NOT NULL,
  `mail` varchar(500) NOT NULL,
  `expire` int(11) NOT NULL,
  `ip` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

ALTER TABLE `password_forgot`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `password_forgot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;