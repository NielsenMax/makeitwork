<?php 

include("config.php");

$result=$mysqli->query("select name from empresas where id='".$_GET['idEmp']."';");


while($data = mysqli_fetch_row($result))
{   
    echo "<h1>" . $data[0] ."</h1>";

//     //echo "<tr class=pito>";
//     //echo "<td >$data[0]</td>";
//     //echo "<td>$data[1]</td>";
//     // echo "<td >$data[2]</td>";
//     // echo "<td ><input type='text' id=email'".$data[0]."'></td>";
//     // echo "<td ><input type='button' value='agregar' class='addU' id='".$data[0]."'></td>";
//     // echo "</tr>";
//     echo "<a href='empresa.php?emp=".$data[0]."' >" . $data[2] . "</a>";
}
// echo "</table>";

?>