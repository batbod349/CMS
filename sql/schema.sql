CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(255),
  `password` varchar(255)
);

CREATE TABLE `Item` (
  `id` Int PRIMARY KEY AUTO_INCREMENT,
  `Name` varchar(255)
);

CREATE TABLE `Menu_item` (
  `idMenu` int PRIMARY KEY AUTO_INCREMENT,
  `idItem` int
);

CREATE TABLE `Site` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user` int,
  `Titre` varchar(255),
  `logo` blob,
  `Menu` int
);

CREATE TABLE `Page` (
  `Id` int PRIMARY KEY AUTO_INCREMENT,
  `Title` varchar(255),
  `editeur` text,
  `image` blob
);

CREATE TABLE `site_page` (
  `idSite` int,
  `idPage` int
);

ALTER TABLE `Menu_item` ADD FOREIGN KEY (`idItem`) REFERENCES `Item` (`id`);

ALTER TABLE `Site` ADD FOREIGN KEY (`user`) REFERENCES `users` (`id`);

ALTER TABLE `Site` ADD FOREIGN KEY (`Menu`) REFERENCES `Menu_item` (`idMenu`);

ALTER TABLE `site_page` ADD FOREIGN KEY (`idSite`) REFERENCES `Site` (`id`);

ALTER TABLE `site_page` ADD FOREIGN KEY (`idPage`) REFERENCES `Page` (`Id`);