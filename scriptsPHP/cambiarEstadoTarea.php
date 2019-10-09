<?php

require_once "../config.php";

header("Content-Type: application/json; charset=UTF-8");

$res=$mysqli->query("select estado from tareas where id=".$_POST['idTarea'].";");
$estado=  mysqli_fetch_row($res);
$estado=$estado[0];
$estado++;
$estado = $estado % 2;
echo $estado;
$res=$mysqli->query("update tareas set estado='".$estado."' where id='".$_POST['idTarea']."';");
if($res){
    
            echo "<p>cambiado con exito con exito!</p>";
}else{
    echo "<p>No se ha podido cambiar :(</p>";
    
}
?>
