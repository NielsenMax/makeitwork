<?php 


include("../config.php");
//mysqli_select_db("samples",$con);
$result=$mysqli->query("select * from empresas where idOwner='".$_GET['idOwner']."';");




while($data = mysqli_fetch_row($result))
{   
    echo "<div class='sombra' >";
    echo "<div class='container'>";
    echo "<a href='empresa.php?emp=".$data[0]."' >" . $data[2] . "</a>";
    echo "</div>";
    echo "<div class='container'>";
    echo " <button  id='foo' class='button' style='font-size:50%;'  onclick="."window.location.href='empresa.php?emp=".$data[0]."' >"."Acceder" ;
    echo "</button>";
    echo "</div>";
    echo "</div>";
}
echo "</table>";

?>