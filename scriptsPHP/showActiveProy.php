<?php 

include("../config.php");

$result=$mysqli->query("select idProyecto from proyectosDeEmpresas where idEmpresa='".$_POST['idEmp']."';");

while($data = mysqli_fetch_row($result))
{       
    $names=$mysqli->query("select name, estado from proyectos where id='".$data[0]."';");
    $names = mysqli_fetch_row($names);
    if($names[1]){
        echo "<a href='proyecto.php?proy=".$data[0]."' >" . $names[0] . "</a>";        //Editar para modificar la forma en la que se responda
    }

}


?>