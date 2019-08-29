<?php

require_once "config.php";

header("Content-Type: application/json; charset=UTF-8");

$res=$mysqli->query("insert into proyectos (idEmpresa, estado, name, descripcion) 
                values ('".$_POST["idEmp"]."','1','".$_POST["name"]."','".$_POST["descripcion"]."')");
if($res){
    $r=$mysqli->query("select id from proyectos where idEmpresa='".$_POST["idEmp"]."' and name='".$_POST["name"]."' and estado='1' and descripcion='".$_POST["descripcion"]."';");
    $r = mysqli_fetch_row($r);
    if($r){
        $re=$mysqli->query("insert into proyectosDeEmpresas (idEmpresa, idProyecto) 
        values ('".$_POST["idEmp"]."','".$r[0]."')");
        if($re){
            echo "<p>Añadido con exito!</p>";
        }else{
            echo "<p>No se ha podido añadir :(</p>";
            
        }
    }else{
        echo "<p>No se ha podido añadir :(</p>";
        
    }
}else{
    echo "<p>No se ha podido añadir :(</p>";
    
}
?>
