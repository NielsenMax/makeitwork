<?php 

include("../config.php");

$result=$mysqli->query("select name from proyectos where id='".$_GET['idProy']."';");


while($data = mysqli_fetch_row($result))
{   
    echo "<h1 class='Titulo'style='font-size:50px;text-decoration:underline' >" . $data[0] ."</h1>";

}


?>