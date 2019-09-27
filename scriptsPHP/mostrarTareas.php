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
    $resultp=$mysqli->query("select users.username from users inner join userDeTareas on users.id=userDeTareas.idUser where idTarea='".$data[0]."';");
    echo "<div id='modalpart".$data[0]."' class='modal'>";
    echo "<div class='modal-content'>";
    echo "<span id='closep'xd='".$data[0]."'class='close'>&times;</span>";
    while($datap = mysqli_fetch_row($resultp)){
    echo "<p>".$datap[0]."</p>" ;}
    echo ' 
   <div class="flex2" style="display: flex;flex-direction: row;justify-content:center;">
                <input type="button" class="button" style="font-size: 50%;width:40%" id="añadirp2" value="Añadir Participante"> 
                </div>
            
            

               <div  align="center" id="añadirpartd" style="display: none;border-top:thick green;">
               <h2 class="Titulo">Añadir participante</h2>
        <p style="font-size: 50%">Por favor complete los siguientes campos para añadir un participante.</p>
                <input type="text" class="input" idTarea="'.$data[0].'" placeholder="Email del participante" id="namepart">
                <br>
                <input type="button" style="font-size: 50%" class="button" id="añadirpart" value="Añadir"> 
                <div  id="rAñadirPart">
                </div>
            </div>';
          echo'  <script>
            $(document).ready(function(){
            $("#añadirp2").click(function(){
              $("#añadirpartd").show();
              $("#añadirp2").hide();              
             
            });
            $("#añadir3").click(function(){              
              $("#añadirp2").show();
              $("#añadirpartd").hide();
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
    echo " <button  id='foo' class='button' style='font-size:50%;'> Estado ";
    echo "</button>";
    echo "</div>";
    echo "</div>";
  
   
}


?>