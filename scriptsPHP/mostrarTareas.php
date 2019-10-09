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
    echo " <button  xd='".$data[0]."' class='button' id='part' style='font-size:50%;'>Participantes" ;
    echo "</button>";
    echo "</div>";
    $resultp=$mysqli->query("select users.username, users.id from users inner join userDeTareas on users.id=userDeTareas.idUser where idTarea='".$data[0]."';");
    echo "<div id='modalpart".$data[0]."' class='modal'>";
    echo "<div class='modal-content'>";
    echo "<span id='closep'xd='".$data[0]."'class='close'>&times;</span>";
    while($datap = mysqli_fetch_row($resultp)){
      echo '<div class="grido" style="display: grid;text-align: center; position:relative; grid-template-columns: 90% 10% ;">';
      //echo '<div class="grido2" style="display: grid;text-align: center; position:relative; grid-template-columns: 70% 30% ;">';
      echo "<p style='margin : 5%;'>".$datap[0]."</p>" ;
      echo "<span style='display: flex;align-items: center;justify-content: center;'id='borrar' idTarea='".$data[0]."' idUser='".$datap[1]."' class='close borrarPart'>&times;</span>";
      echo '</div>';
    }
    echo ' 
      <div class="flex2" style="display: flex;flex-direction: row;justify-content:center;">
        <input type="button" class="button" style="font-size: 50%;width:40%" id="añadirp'.$data[0].'" value="Añadir Participante"> 
      </div>
      <div  align="center" id="añadirpartd'.$data[0].'" style="display: none; ">
        <div style="width:100%;height:5px; background:radial-gradient(ellipse at center, #FFFEFA, #BBBBBB);"></div>
          <h2 class="Titulo">Añadir participante</h2>
          <p style="font-size: 50%">Por favor complete los siguientes campos para añadir un participante.</p>
          <input type="text" class="input" placeholder="Email del participante" id="namepart'.$data[0].'">
          <br>
          <input type="button" style="font-size: 50%" class="button cañadirpart" idTarea="'.$data[0].'" id="añadirpart'.$data[0].'" value="Añadir"> 
          <div  id="rAñadirPart'.$data[0].'">
        </div>
      </div>';
          echo'  <script>
            $(document).ready(function(){
            $("#añadirp'.$data[0].'").click(function(){
              $("#añadirpartd'.$data[0].'").show();
              $("#añadirp'.$data[0].'").hide();              
             
            });
            $("#añadirx'.$data[0].'").click(function(){              
              $("#añadirp'.$data[0].'").show();
              $("#añadirpartd'.$data[0].'").hide();
            });
          });
            </script>';
    echo "</div>";
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
	if($data[2]){
		echo " <button id='foo' class='button estado' idTarea='".$data[0]."' style='font-size:50%; background-color: green;'> Abierto ";
		echo "</button>";
	}else{
		echo " <button id='foo' class='button estado' idTarea='".$data[0]."' style='font-size:50%; background-color: red;'> Cerrado ";
		echo "</button>";
	}
    echo "</div>";
    echo "</div>";
  
   
}


?>