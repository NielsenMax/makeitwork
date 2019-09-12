<?php 

include("../config.php");

$result=$mysqli->query("select id, name, estado from proyectos where idEmpresa='".$_POST['idEmp']."';");

while($data = mysqli_fetch_row($result))
{       
    // $names=$mysqli->query("select name, estado from proyectos where id='".$data[0]."';");
    // $names = mysqli_fetch_row($names);
    if($data[2]){
        echo "<a href='proyecto.php?proy=".$data[0]."&emp=".$_POST['idEmp'] ."'>" . $data[1] . "</a>";        //Editar para modificar la forma en la que se responda
    }

}


?>