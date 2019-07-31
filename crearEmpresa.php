<?php

require_once "config.php";

header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

//$mysqli->query("insert into empresas (idOwner, name) values ('".$obj->id."','".$obj->name."')");

$sql = "insert into empresas (idOwner, name) values ('?','?');";

if($stmt = $mysqli->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("is", $param_idOwner, $param_name);
    
    // Set parameters
    $param_idOwner = $obj->id;
    $param_name = $obj->name;
 
    // Attempt to execute the prepared statement
    if($stmt->execute()){
        // Redirect to login page
        header("location: welcome.php");
    } else{
        echo "Oops! Algo salio mal, Intentelo mas tarde";
    }
}


?>
