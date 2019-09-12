<?php

require_once "../config.php";

header("Content-Type: application/json; charset=UTF-8");

$res=$mysqli->query("insert into tareas (idProyecto, estado, name, descripcion) 
                values ('".$_POST["idProy"]."','1','".$_POST["name"]."','".$_POST["descripcion"]."');");
if($res){
    
            echo "<p>Añadido con exito!</p>";
}else{
    echo "<p>No se ha podido añadir :(</p>";
    
}
?>
