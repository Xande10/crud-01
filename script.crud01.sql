create table `carro` (
`codigo` int not null,
`nome` varchar(45) DEFAULT NULL,
`valor` double,
`km` double,
`datafabricacao` date,
PRIMARY KEY(`codigo`) 
) 

INSERT INTO `ifc`.`carro` (`codigo`, `nome`, `valor`, `km`, `datafabricacao`) VALUES ('1', 'Fiat Uno', '37000', '150000', '2018-09-23');
INSERT INTO `ifc`.`carro` (`codigo`, `nome`, `valor`, `km`, `datafabricacao`) VALUES ('2', 'Corolla', '110000', '50000', '2020-10-21');
INSERT INTO `ifc`.`carro` (`codigo`, `nome`, `valor`, `km`, `datafabricacao`) VALUES ('3', 'Jeep Renegade', '150000', '65000', '2020-11-29');
INSERT INTO `ifc`.`carro` (`codigo`, `nome`, `valor`, `km`, `datafabricacao`) VALUES ('4', 'Fiat Palio', '13000', '342000', '2000-05-24');
INSERT INTO `ifc`.`carro` (`codigo`, `nome`, `valor`, `km`, `datafabricacao`) VALUES ('5', 'Fox', '21000', '210000', '2009-03-20');

ENGINE=InnoDB DEFAULT CHARSET=UTF8;