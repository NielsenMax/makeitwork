<?php 
include("config.php");
$result=$mysqli->query("select * from empresas where idOwner='".$_GET['idOwner']."';");

while($data = mysqli_fetch_row($result))
{   
    echo "<a href='empresa.php?emp=".$data[0]."' >" . $data[2] . "</a>";
}
echo "<p style='background-color:#cccccc ' >   Mis Empleos</p>";
$r = $mysqli->query("select * from empresas inner join usersDeEmpresas on empresas.id = usersDeEmpresas.idEmpresa where usersDeEmpresas.idUser =".$_GET['idOwner'].";");
while($data = mysqli_fetch_row($r))
{   
    echo "<a href='empresa.php?emp=".$data[0]."' >" . $data[2] . "</a>";
}
?>