<?php 

include("config.php");

$result=$mysqli->query("select idProyecto from proyectosDeEmpresas where idEmpresa='".$_GET['idEmp']."';");

while($data = mysqli_fetch_row($result))
{       
    $names=$mysqli->query("select name from proyectos where id='".$data[0]."';");
    $names = mysqli_fetch_row($names);
    echo "<h1>" . $names[0] ."</h1>";        //Editar para modificar la forma en la que se responda
}


?>