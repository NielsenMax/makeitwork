<?php

require_once "config.php";

header("Content-Type: application/json; charset=UTF-8");
echo $_POST['email'];
echo $_POST["idEmpresa"];
echo "hola";
if($res=$mysqli->query("select id from users where email='".$_POST['email']."';")){
    $idUser=  mysql_fetch_object($res);
    $mysqli->query("insert into usersDeEmpresas (idEmpresa, idUser) values ('".$_POST["idEmpresa"]."','".$idUser->id."')");
    echo "<p>Añadido con exito!</p>";
}else{
    echo "<p>No existe un usuario con ese email</p>";
}



?>
