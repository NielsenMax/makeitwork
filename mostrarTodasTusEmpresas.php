<?php 

include("config.php");

$result=$mysqli->query("select name from empresas where idOwner='".$_GET['idOwner']."';");


while($data = mysqli_fetch_row($result))
{   
    echo "<h1>" . $data[0] ."</h1>";

}


?>