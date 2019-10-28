<?php 

include("config.php");

$result=$mysqli->query("select name from empresas where idOwner='".$_GET['idOwner']."';");

if ($result->num_rows == 0) {

    echo "<h1>" . "No hay empresas." . "</h1>";
}

while($data = mysqli_fetch_row($result))
{   
    echo "<h1>" . $data[0] ."</h1>";

}

?>