<?php

require_once "../config.php";

header("Content-Type: application/json; charset=UTF-8");

$res=$mysqli->query("insert into userDeTareas (idUser, idTarea) 
                values ('".$_POST["idUser"]."','".$_POST["idTarea"]."');");
if($res){
    
            echo "<p>Añadido con exito!</p>";
}else{
    echo "<p>No se ha podido añadir :(</p>";
    
}
?>
