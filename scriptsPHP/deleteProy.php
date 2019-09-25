<?php

require_once "../config.php";

$r=$mysqli->query("select id from proyectos where name='".$_POST["name"]."' and idEmpresa=".$_POST["emp"].";");
if($data = mysqli_fetch_row($r)){ 
    if($mysqli->query("DELETE FROM proyectos where id=".$data[0].";")){
        echo "<p>Eliminado con exito</p>";
    }else{
        echo "<p>No se ha podido eliminar</p>";
    }
}else{
    echo "<p>No existe un proyecto con ese nombre en esta empresa</p>";
}



?>