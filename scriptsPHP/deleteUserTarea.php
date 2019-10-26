
<?php

require_once "../config.php";

header("Content-Type: application/json; charset=UTF-8");

    echo $_POST['idTarea'];
    $r=$mysqli->query("select id from userDeTareas where idUser=".$_POST['idUser']." and idTarea=".$_POST['idTarea'].";");
    if($data = mysqli_fetch_row($r))
    { 
        $res=$mysqli->query("delete from userDeTareas where id=".$data[0].";");
        if($res){
            echo "<p>Eliminada con exito</p>";
        }else{
            echo "<p>No se pudo eliminar</p>";
        }
    }else{
        echo "<p>No hay un usuario con ese nombre en esta tarea</p>";
    }
?>
