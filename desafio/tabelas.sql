CREATE TABLE `documento` (
	`numero` INT(11) NOT NULL AUTO_INCREMENT,
	`confirmado` TINYINT(1) NOT NULL DEFAULT '0',
	`total` INT(12) NOT NULL DEFAULT '0',
	PRIMARY KEY (`numero`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;

CREATE TABLE `produto` (
	`id` INT(200) NOT NULL AUTO_INCREMENT,
	`codigo` VARCHAR(30) NOT NULL,
	`descricao` VARCHAR(200) NOT NULL,
	`preco` DOUBLE NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;

CREATE TABLE `item` (
	`id_documento` INT(11) NOT NULL,
	`id_produto` INT(11) NOT NULL,
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `item_x_documento_fk` (`id_documento`),
	INDEX `item_x_produto_fk` (`id_produto`),
	CONSTRAINT `item_x_documento_fk` FOREIGN KEY (`id_documento`) REFERENCES `documento` (`numero`),
	CONSTRAINT `item_x_produto_fk` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
INSERT INTO produto (`id`,`codigo`, `descricao`, `preco`) VALUES (NULL,'21s450' 'producto1', 24243);