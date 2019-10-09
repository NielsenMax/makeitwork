<?php 


require_once "../config.php";
//mysqli_select_db("samples",$con);
$result=$mysqli->query("select id, idEmpresa, name  from proyectos where idEmpresa='".$_POST['idEmp']."';");
if($result){

while($data = mysqli_fetch_row($result))
{   
    echo "<div class='sombra' >";
    echo "<div class='container'>";
    echo "<a href='proyecto.php?proy=".$data[0]."&emp=".$data[1]."' >" . $data[2] . "</a>";
    echo "</div>";
    echo "<div class='container'>";
    echo " <button  id='foo' class='button' style='font-size:50%;'  onclick=".'window.location.href="proyecto.php?proy='.$data[0].'&emp='.$data[1].'" >'.Acceder ;
    echo "</button>";
    echo "</div>";
    echo "</div>";
}

}
else
{echo "xd";}
?>