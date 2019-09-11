<?php 

include("config.php");

$result=$mysqli->query("select name from proyectos where id='".$_GET['idProy']."';");


while($data = mysqli_fetch_row($result))
{   
    echo "<h1>" . $data[0] ."</h1>";

}


?>