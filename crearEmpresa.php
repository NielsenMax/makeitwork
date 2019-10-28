<?php

require_once "config.php";

header("Content-Type: application/json; charset=UTF-8");
//$obj = json_decode($_POST["x"], false);

$result = $mysqli->query("select * from empresas where name='".$_POST["name"]."' and idOwner='".$_POST["idOwner"]."';");

if ($result->num_rows == 0) {

    $mysqli->query("insert into empresas (idOwner, name) values ('".$_POST["idOwner"]."','".$_POST["name"]."')");
    echo "<p>Empresa creada con éxito.</p>";
}
else {
    echo "<p>Ya existe una empresa creada con este nombre.</p>";
}

//$sql = "insert into empresas (idOwner, name) values ('?','?');";

// if($stmt = $mysqli->prepare($sql)){
//     // Bind variables to the prepared statement as parameters
//     $stmt->bind_param("is",$_SESSION['id'], $_GET["name"]);
//     if($stmt->execute()){
//         // Redirect to login page
//         echo "Salio bien";
//     } else{
//         echo "Oops! Algo salio mal, Intentelo mas tarde";
//     }
// }
// $stmt->close();


?>
