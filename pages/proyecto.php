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
    <title>Proyecto</title>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../welcome.css">
    <link rel="stylesheet" href="../empresas.css">
    <script type="text/javascript" src="../js/proyajax.js"></script>
    <script type="text/javascript" src="../js/tareasajax.js"></script>
</head>
<body>
<div class="navbar">
        <div class="dropdown">
            <button id="usern"class="dropbtn" onclick="window.location.href='empresas.php'"><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content" >
                <a href="../resetpssw.php" >Cambie su contraseña</a>
                <a href="../logout.php" >Cerrar sesion</a>
                
            </div>
        </div> 
        <!--Empresas-->
        <div class="dropdown">
            <button class="dropbtn" id="display" onclick="window.location.href='empresas.php'"><b>Empresas</b>
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content" id="responsecontainer" >
                
            </div>
        </div>
        <!--Proyectos-->
        <div class="dropdown">
            <button class="dropbtn" id="displayProy"><b>Proyectos activos</b>
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content" id="activeProy" >
                
            </div>
        </div>

    </div>
    <!--variables-->
    <input type="button" hidden value="<?php echo htmlspecialchars($_SESSION["id"]); ?>" id="idOwner">
    <input type="button" hidden value="<?php echo htmlspecialchars($_GET["proy"]); ?>" id="idProy">
    <input type="button" hidden value="<?php echo htmlspecialchars($_GET["emp"]); ?>" id="idEmp">
    <!-- Fin variables -->
    
    <div id="proyName">
      </div>
<div class="creaciones" style="display: flex;flex-direction: row;justify-content: center;">    

    <!--  USUARIOS  -->
              <div class="flex2" style="display: flex;flex-direction: row;justify-content:center;">
                <input type="button" class="button" id="añadir2" value="Añadir Tarea"> 
                </div>
            
            

               <div  align="center" id="tareacreacion" style="display: none;">
               <h2 class="Titulo">Añadir tarea</h2>
        <p>Por favor complete los siguientes campos para añadir una tarea.</p>
                <input type="text" class="input" placeholder="Nombre de la tarea" id="nameTarea">
                <br>
                <input type="text" class="input" placeholder="Ingrese una descripcion" id="descripcionTarea">
                <br>
                <input type="button" class="button" id="añadirTarea" value="Añadir"> 
                <div  id="rAñadirTarea">
                </div>
            </div>
        
    
</div>
    <script>
            $(document).ready(function(){
            $("#añadir2").click(function(){
              $("#tareacreacion").show();
              $("#añadir2").hide();          
              $("#proyectocreacion").hide();
            });
           
          });
            </script>

 <!--   <h3 >Todas las empresas</h3>
  

       <input type="button" id="mostrar" value="Display All Data" /> 
   

<section class="fullcont">-->
 </div>

    <!--variables-->
          <br>
        <div class="gridcont2" id="tareasmuestreo" >
        <div id="empresasCreadas"></div>
        
    </div>
   
</body>
</html>