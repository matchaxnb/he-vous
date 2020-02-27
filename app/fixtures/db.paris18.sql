PRAGMA synchronous = OFF;
PRAGMA journal_mode = MEMORY;
BEGIN TRANSACTION;
CREATE TABLE `targeted_demographics` (
  `id` integer NOT NULL PRIMARY KEY AUTOINCREMENT
,  `firstname` varchar(255) DEFAULT NULL
,  `name` varchar(255) DEFAULT NULL
,  `twitter` varchar(255) DEFAULT NULL
);
INSERT INTO `targeted_demographics` VALUES (1,'Anne','Hidalgo','Anne_Hidalgo');
INSERT INTO `targeted_demographics` VALUES (2,'Rachida','Dati','datirachida');
INSERT INTO `targeted_demographics` VALUES (3,'Agnès','Buzyn','AgnesBuzyn');
INSERT INTO `targeted_demographics` VALUES (4,'David','Belliard','David_Belliard');
INSERT INTO `targeted_demographics` VALUES (5,'Danielle','Simonnet','Simonnet2');
INSERT INTO `targeted_demographics` VALUES (6,'Cédric','Villani','VillaniCedric');
INSERT INTO `targeted_demographics` VALUES (7,'Pierre','Liscia','PierreLiscia');
INSERT INTO `targeted_demographics` VALUES (8,'Vikash ','Dhorasoo','vikash_dhorasoo');
INSERT INTO `targeted_demographics` VALUES (9,'Pierre-Yves','Bournazel','pybournazel');
INSERT INTO `targeted_demographics` VALUES (10,'Eric','Lejoindre','EricLejoindre');
END TRANSACTION;
