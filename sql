create table empresas(
    id int NOT NULL PRIMARY KEY unique AUTO_INCREMENT,
    idOwner int not null,
    name varchar(255),
    FOREIGN KEY (idOwner) REFERENCES users(id) 
);