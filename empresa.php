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
    <div id="empName">
      </div>
<div class="creaciones" style="display: flex;flex-direction: row;justify-content: space-around;">    

    <!--  USUARIOS  -->
              <div class="flex2" style="display: flex;flex-direction: row;justify-content: space-around;">
                <input type="button" class="button" id="añadir2" value="Añadir Usuario"> 
                </div>
            
            

               <div  align="center" id="usuariocreacion" style="display: none;">
               <h2 class="Titulo">Añadir usuario</h2>
        <p>Por favor complete los siguientes campos para añadir un usuario.</p>
                <input type="text" class="input" value="E-mail"id="emailUser">
                <br>
                <input type="button" class="button" id="añadir" value="Añadir"> 
                <div  id="rAñadir">
                </div>
            </div>
        
      <!--  PROYECTO -->
    
              <div class="flex2" style="display: flex;flex-direction: row;justify-content: space-around;">
                <input type="button" class="button" id="añadir3" value="Añadir Proyecto"> 
                </div>
            
            

               <div  align="center" id="proyectocreacion" style="display: none;">
               <h2 class="Titulo">Añadir proyecto</h2>
        <p>Por favor complete los siguientes campos para añadir un proyecto.</p>
                <input type="text" class="input" value="nombreP"id="nombrep">
                <br>
                <input type="button" class="button" id="añadirproy" value="Añadir"> 
                <div  id="rpAñadir">
                </div>
            </div>
        </div>
</div>
    <script>
            $(document).ready(function(){
            $("#añadir2").click(function(){
              $("#usuariocreacion").show();
              $("#añadir2").hide();
            });
            $("#añadir3").click(function(){
              $("#proyectocreacion").show();
              $("#añadir3").hide();
            });
          });
            </script>

 <!--   <h3 >Todas las empresas</h3>
  

       <input type="button" id="mostrar" value="Display All Data" /> 
   

<section class="fullcont">
  for demo wrap-->
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