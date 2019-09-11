create table empresas(
    id int NOT NULL PRIMARY KEY unique AUTO_INCREMENT,
    idOwner int not null,
    name varchar(255),
    FOREIGN KEY (idOwner) REFERENCES users(id) 
);
create table users(
    id int NOT NULL PRIMARY KEY unique AUTO_INCREMENT,
    username varchar(255) not null unique SECONDARY KEY,
    email varchar(255) not null unique SECONDARY KEY,
    password varchar(255) not null  
);
