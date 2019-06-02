<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>-->
    <link rel="stylesheet" href="welcome.css">
</head>
<body>
   <div class="navbar">
        <div class="dropdown">
            <button class="dropbtn"><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="resetpssw.php" >Cambie su contraseña</a>
                <a href="logout.php" >Cerrar sesion</a>
            </div>
        </div> 
    </div>

    <!--<div class="navbar">
  <a href="#home">Home</a>
  <a href="#news">News</a>
  <div class="dropdown">
    <button class="dropbtn">Dropdown 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div> 
</div>-->

    <div class="page-header">
        <h1>Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido a MakeItWork.</h1>
    </div>
    <p>
    </p>
</body>
</html>