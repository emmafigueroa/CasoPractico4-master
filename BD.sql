CREATE TABLE especificaciones(  
    Id int NOT NULL primary key AUTO_INCREMENT comment 'Clave Primaria',
    Marca            VARCHAR(50),
    Modelo           VARCHAR(50),
    Sistema_Operativo VARCHAR(20),
    Tamaño          VARCHAR(50)COMMENT 'Especificar en Pulgadas',
    Memoria_interna VARCHAR(4) COMMENT 'Especificar en GB',
    Memoria_RAM     VARCHAR(4) COMMENT 'Espeficicar en GB'
) ENGINE=INNODB default charset utf8 ;