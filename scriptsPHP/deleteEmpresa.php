<?php

require_once "../config.php";

$r=$mysqli->query("select id from empresas where name='".$_POST["emp"]."' and idOwner='".$_POST["idOwner"]."';");
if($data = mysqli_fetch_row($r))
{ 
    // if($mysqli->query("delete from userDeTareas
    // inner join tareas on userDeTareas.idTarea = tareas.id
    // inner join proyectos on areas.idProyecto = proyectos.id 
    // where proyectos.idEmpresa =".$data[0].";")){

    //     if($mysqli->query("delete from tareas 
    //     inner join proyectos on tareas.idProyecto = proyectos.id 
    //     where proyectos.idEmpresa =".$data[0].";")){
        
    //         if($mysqli->query("delete from proyectos
    //         where idEmpresa =".$data[0].";")){

    //             if($mysqli->query("delete from usersDeEmpresas
    //             where idEmpresa =".$data[0].";")){
    //                 $res=$mysqli->query("delete from empresas where id=".$data[0].";");
    //                 if($res){
    //                     echo "<p>Eliminada con exito</p>";
    //                 }else{
    //                     echo "<p>La empresa contiene proyectos activos que deben ser eliminados</p>";
    //                 }
    //             }else{
    //                 echo "<p> No se puedo eliminar los usuarios de la empresa</p>";
    //             }


    //         }else{
    //             echo "<p> No se puedo eliminar los proyectos</p>";
    //         }
    //     }else{
    //         echo "<p> No se puedo eliminar los tareas</p>";
    //     }
    // }else{
    //     echo "<p> No se puedo eliminar los usuarios</p>";
    // }
    $res=$mysqli->query("delete from empresas where id=".$data[0].";");
    if($res){
        echo "<p>Eliminada con exito</p>";
    }else{
        echo "<p>La empresa contiene proyectos activos que deben ser eliminados</p>";
    }
}else{
    echo "<p>No existe una empresa con ese Nombre</p>";
}
    

?>
<!-- $resultp=$mysqli->query("select users.username, users.id from users inner join userDeTareas on users.id=userDeTareas.idUser where idTarea= -->