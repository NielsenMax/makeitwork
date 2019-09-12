<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'poli_uno');
define('DB_PASSWORD', 'poli1');
define('DB_NAME', 'poli_cuatro');
 

$mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

if ($mysqli->connect_error) {
    die('Connection error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
$mysqli->query("
CREATE TABLE if not exists `users` (
    `id` int(11) NOT NULL unique primary key AUTO_INCREMENT,
    `username` varchar(255) DEFAULT NULL,
    `email` varchar(255) DEFAULT NULL unique key,
    `password` varchar(255) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$mysqli->query("
create table if not exists empresas(
    id int NOT NULL PRIMARY KEY unique AUTO_INCREMENT,
    idOwner int not null,
    name varchar(255),
    FOREIGN KEY (idOwner) REFERENCES users(id) 
);");

$mysqli->query("
create table if not exists usersDeEmpresas(
    id int NOT NULL PRIMARY KEY unique AUTO_INCREMENT,
    idEmpresa int not null,
    idUser int not null,
    FOREIGN KEY (idUser) REFERENCES users(id),
    FOREIGN KEY (idEmpresa) REFERENCES empresas(id)
);");
//Para proyectos
//El estado es 1 si esta abierto el proyecto
$mysqli->query("
create table if not exists proyectos(
    id int NOT NULL PRIMARY KEY unique AUTO_INCREMENT,
    idEmpresa int not null,
    estado int not null,
    name varchar(255) not null,
    descripcion varchar(255),
    FOREIGN KEY (idEmpresa) REFERENCES empresas(id)
);");
//Tareas
//El estado es 1 si esta abierto el proyecto
$mysqli->query("
create table if not exists tareas(
    id int NOT NULL PRIMARY KEY unique AUTO_INCREMENT,
    idProyecto int not null,
    estado int not null,
    name varchar(255) not null,
    descripcion varchar(255),
    deadline date,
    FOREIGN KEY (idProyecto) REFERENCES proyectos(id)
);");
$mysqli->query("
create table if not exists userDeTareas(
    id int NOT NULL PRIMARY KEY unique AUTO_INCREMENT,
    idUser int not null,
    idTarea int not null,
    FOREIGN KEY (idUser) REFERENCES users(id),
    FOREIGN KEY (idTarea) REFERENCES tareas(id)
);");
?>