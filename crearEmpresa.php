<?php

require_once "config.php";

header("Content-Type: application/json; charset=UTF-8");
//$obj = json_decode($_POST["x"], false);


//$mysqli->query("insert into empresas (idOwner, name) values ('".$_POST["idOwner"]."','".$_POST["name"]."')");

$sql = "insert into empresas (idOwner, name) values ('?','?');";

if($stmt = $mysqli->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("is",$_POST["idOwner"], $_POST["name"]);
    $stmt->execute();
    $stmt->close();
}


?>
