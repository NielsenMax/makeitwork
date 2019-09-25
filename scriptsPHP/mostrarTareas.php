<?php 

include("../config.php");

$result=$mysqli->query("select * from tareas where idProyecto='".$_POST['idProy']."';");


while($data = mysqli_fetch_row($result))
{   
    echo "<h1>" . $data[0] ."</h1>";

}


?>