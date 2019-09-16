<?php

require_once "../config.php";

$r=$mysqli->query("select id from users where email='".$_POST["email"]."';");
if($data = mysqli_fetch_row($r)){

    if($mysqli->query("delete from usersDeEmpresas where idUser=".$data[0]." and idEmpresa=".$_POST["emp"].";")){
        echo "<p>Eliminado con exito</p>";
    }else{
        echo "<p>No se ha podido eliminar</p>";
    }
}else{
    echo "<p>No existe un Usuario con ese email en esta empresa</p>";
}


?>