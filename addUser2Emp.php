<?php

require_once "config.php";

header("Content-Type: application/json; charset=UTF-8");

$res=$mysqli->query("select id from users where email='".$_POST['email']."';");
$idUser=  mysqli_fetch_row($res);
//echo $idUser[0];
if($idUser){
    $noRep = $mysqli->query("select id from usersDeEmpresas where idEmpresa='".$_POST['idEmp']."' and idUser='".$idUser[0]."';");
    $noRep = mysqli_fetch_row($noRep);
    //echo var_dump($noRep);
    if($noRep != NULL)
    {
        echo "<p>Este usuario ya se encuentra en la empresa</p>";
    }else{
        $res2=$mysqli->query("insert into usersDeEmpresas (idEmpresa, idUser) values ('".$_POST['idEmp']."','".$idUser[0]."');");
        if($res2)
        {
            echo "<p>Añadido con exito!</p>";
        }else{
            echo "<p>No se ha podido añadir al usuario a la empresa:(</p>";
            
        }
    }
}else{
    echo "<p>No existe un usuario con ese email</p>";
}



?>
