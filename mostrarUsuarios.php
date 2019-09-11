<?php
/*
require_once "config.php";
header("Content-Type: application/json; charset=UTF-8");
$resp=$mysqli->query("select * from empresas;");
$x= Array(Array());
$c=0;
while($i=$resp->fetch_row()){
    $x[$c]=$i;
    $c++;
}
echo json_encode($x);*/
include("config.php");
//mysqli_select_db("samples",$con);
$resultid=$mysqli->query("select idUser from usersDeEmpresas where idEmpresa='".$_GET['idEmp']."';");


while($res = mysqli_fetch_row($resultid))
{
    $result=$mysqli->query("select * from users where id='".$res[0]."';");
    print_r($result);
    $data = mysqli_fetch_row($result);
    echo"<tr>";
    echo"<th>$data[0]</th>";
    echo"<th>$data[1]</th>";
    echo"<th>$data[2]</th>";
    echo"</tr>";
}
echo "</table>";
?>