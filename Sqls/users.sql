ALTER TABLE `users` ADD `passcode` VARCHAR(65) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `password`;
ALTER TABLE `users` ADD `theme` VARCHAR(255) NOT NULL DEFAULT 'light' AFTER `rank`;
ALTER TABLE `users` ADD `visible` ENUM('0', '1') NOT NULL DEFAULT '1' AFTER `online`;
ALTER TABLE `users` ADD `premiar` INT(11) NOT NULL DEFAULT '0' AFTER `points`;
ALTER TABLE `users` ADD `home_color` VARCHAR(255) NOT NULL DEFAULT '#7ecaee' AFTER `visible`;
ALTER TABLE `users` ADD `home_image` VARCHAR(555) NOT NULL DEFAULT '' AFTER `home_color`;