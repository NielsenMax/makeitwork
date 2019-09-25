<?php 

include("../config.php");

$result=$mysqli->query("select * from tareas where idProyecto='".$_POST['idProy']."';");


while($data = mysqli_fetch_row($result))
{    
    echo "<div class='sombra2' >";
    echo "<div class='container2'>";
    echo "<h1>" . $data[3] ."</h1>";
    echo "</div>";
    echo "<div class='container2'>";
    echo " <button  id='foo' class='button' style='font-size:50%;'>Participantes" ;
    echo "</button>";
    echo "</div>";
    echo "<div class='container2'>";
    echo " <button  xd='".$data[0]."' class='button' id='desc' style='font-size:50%;'>Descripcion" ;
    echo "</button>";
    echo "</div>";
    echo "<div id='modal".$data[0]."' class='modal'>";
    echo "<div class='modal-content'>";
    echo "<span id='close'xd='".$data[0]."'class='close'>&times;</span>";
    echo "<p>".$data[4]."</p>" ;
    echo "</div>";
    echo "</div>";
    echo "<div class='container2'>";
    echo " <button  id='foo' class='button' style='font-size:50%;'> Estado ";
    echo "</button>";
    echo "</div>";
    echo "</div>";
  
   
}


?>