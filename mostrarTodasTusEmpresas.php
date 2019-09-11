<?php 

include("config.php");

$result=$mysqli->query("select name from empresas where idOwner='".$_GET['idOwner']."';");

if ($result->num_rows == 0) {

    echo "<h1>" . "Usted aún no creó ninguna empresa." . "</h1>";
}

while($data = mysqli_fetch_row($result))
{   
    echo "<h1>" . $data[0] ."</h1>";

}

?>