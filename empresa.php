<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$idDeSesion = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Empresas</title>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="welcome.css">
    <link rel="stylesheet" href="empresas.css">
    <script type="text/javascript" src="empresaajax.js"></script>
    
</head>
<body>
<div class="navbar">
        <div class="dropdown">
            <button id="usern"class="dropbtn"><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content" >
                <a href="resetpssw.php" >Cambie su contraseña</a>
                <a href="logout.php" >Cerrar sesion</a>
                
            </div>
        </div> 
        <div class="dropdown">
            <button class="dropbtn" id="display"><b>Empresas</b>
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content" id="responsecontainer" >
                
            </div>
        </div>
    </div>
    <!--variables-->
    <input type="button" hidden value="<?php echo htmlspecialchars($_SESSION["id"]); ?>" id="idOwner">
    <input type="button" hidden value="<?php echo htmlspecialchars($_GET["emp"]); ?>" id="idEmp">
    <!-- Fin variables -->
    <div id="empName"></div>
    
                <input type="text" id="emailUser">
           
                <input type="button" id="añadir" value="Añadir"> 
            
            <div  id="rAñadir">
            
        </div>
    </div>

    <h3 >Todas las empresas</h3>
  

       <input type="button" id="mostrar" value="Display All Data" /> 
   

<section class="fullcont">
  <!--for demo wrap-->
  <h1>Fixed Table header</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>MAIL</th>

        </tr>
      </thead>
    </table>
  </div>
  <div  class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody id="responsecontainer2">
<div >
</body>
</html>