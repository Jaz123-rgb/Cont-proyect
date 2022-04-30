CREATE TABLE contabilidad (
    id  int not null AUTO_INCREMENT,
    fecha varchar(100) null,
    concept varchar(100) null,
    importe varchar(100) null,
    iva varchar(100) null,
    monTotal varchar(100) null,
    CONSTRAINT pk_prodcuto 
    PRIMARY KEY(id)

);


CREATE TABLE `cont`.`contabilidadin` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `fecha` VARCHAR(100) NOT NULL , 
    `concept` VARCHAR(100) NOT NULL , 
    `importe` VARCHAR(100) NOT NULL , 
    `iva` VARCHAR(100) NOT NULL , 
    `monTotal` VARCHAR(100) NOT NULL , 
    PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;