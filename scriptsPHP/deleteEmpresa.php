<?php

require_once "../config.php";

$r=$mysqli->query("select id from empresas where name='".$_POST["emp"]."' and idOwner='".$_POST["idOwner"]."';");
if($data = mysqli_fetch_row($r))
{ 
    if($mysqli->query("delete from empresas where name='".$_POST["emp"]."' and idOwner='".$_POST["idOwner"]."';")){
        echo "<p>Eliminada con exito</p>";
    }else{
        echo "<p>No se ha podido eliminar</p>";
    }
}else{
    echo "<p>No existe una empresa con ese Nombre</p>";
}


?>