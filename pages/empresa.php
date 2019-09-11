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
    <link rel="stylesheet" href="../welcome.css">
    <link rel="stylesheet" href="../empresas.css">
    <script type="text/javascript" src="../js/empresaajax.js"></script>
    <script type="text/javascript" src="../js/addProajax.js"></script>
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
        <!--Empresas-->
        <div class="dropdown">
            <button class="dropbtn" style="cursor: pointer;" onclick="window.location.href='empresas.php'" id="display"><b>Empresas</b>
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
    <input type="button" hidden value="<?php echo htmlspecialchars($_GET["emp"]); ?>" id="idEmp">
    <!-- Fin variables -->
<div id="empName">
</div>
            <div style="display: flex; flex-direction: row; justify-content: space-around;">
                <input type="button" class="button" id="añadir2" onclick="AU()" value="Añadir Usuario">
                <input type="button" class="button" id="añadir3" onclick="AP()" value="Añadir Proyecto">
                <input type="button" class="button" id="eliminar2" onclick="EU()" value="Eliminar Usuario">
                <input type="button" class="button" id="eliminar3" onclick="EP()" value="Eliminar Proyecto"> 
            </div>
            
            <div  align="center" id="usuariocreacion" style="display:none;">
                <h2 class="Titulo">Añadir usuario</h2>
                <p>Por favor complete los siguientes campos para añadir un usuario.</p>
                <input type="text" class="input" placeholder="E-mail" id="emailUser">
                <br>
                <input type="button" class="button" id="añadir" value="Añadir"> 
                <div  id="rAñadir">
                </div>
            </div>
            
            <div  align="center" id="proyectocreacion" style="display:none;">
                <h2 class="Titulo">Añadir proyecto</h2>
                <p>Por favor complete los siguientes campos para añadir un proyecto.</p>
                <input type="text" class="input" placeholder="Nombre del proyecto" id="nombrep">
                <br>
                <input type="textarea" class="input" placeholder="Descripcion" id="descr">
                <br>
                <input type="button" class="button" id="añadirproy" value="Añadir"> 
                <div  id="rpAñadir"></div>
            </div> 

            <div  align="center" id="usuarioeliminacion" style="display:none;">
              <h2 class="Titulo">Eliminar usuario</h2>
              <p>Por favor ingrese el e-mail del usuario que desea eliminar.</p>
              <input type="text" class="input" placeholder="E-mail" id="emailUser">
              <br>
              <input type="button" class="button" id="Eliminar" value="Eliminar"> 
              <div  id="rEliminar">
              </div>
            </div>
        
            <div  align="center" id="proyectoeliminacion" style="display:none;">
                <h2 class="Titulo">Eliminar proyecto</h2>
                <p>Por favor ingrese el nombre del proyecto que desea eliminar.</p>
                <input type="text" class="input" placeholder="Nombre del proyecto" id="nombrep">
                <br>
                <input type="button" class="button" id="eliminarproy" value="Eliminar"> 
                <div  id="rpEliminar"></div>
            </div>
    <script>
            $(document).ready(function(){
            $("#añadir2").click(function(){  //añadir usuario
              $("#usuariocreacion").show();
              $("#usuarioeliminacion").hide();
              $("#proyectocreacion").hide();
              $("#proyectoeliminacion").hide();
            });
            $("#añadir3").click(function(){  //añadir proyecto
              $("#proyectocreacion").show();
              $("#usuariocreacion").hide();
              $("#usuarioeliminacion").hide();
              $("#proyectoeliminacion").hide();
            });
            $("#eliminar2").click(function(){ //eliminar usuario
              $("#usuarioeliminacion").show();
              $("#usuariocreacion").hide();
              $("#proyectoeliminacion").hide();
              $("#proyectocreacion").hide();
            });
            $("#eliminar3").click(function(){ //eliminar proyecto
              $("#proyectoeliminacion").show();
              $("#usuariocreacion").hide();
              $("#usuarioeliminacion").hide();
              $("#proyectocreacion").hide();
            });
          });
        function AU() {
          document.getElementById('añadir2').setAttribute("class", "button2")
          document.getElementById('añadir3').setAttribute("class", "button")
          document.getElementById('eliminar2').setAttribute("class", "button")
          document.getElementById('eliminar3').setAttribute("class", "button")
        }
        function AP() {
          document.getElementById('añadir2').setAttribute("class", "button")
          document.getElementById('añadir3').setAttribute("class", "button2")
          document.getElementById('eliminar2').setAttribute("class", "button")
          document.getElementById('eliminar3').setAttribute("class", "button")
        }
        function EU() {
          document.getElementById('añadir2').setAttribute("class", "button")
          document.getElementById('añadir3').setAttribute("class", "button")
          document.getElementById('eliminar2').setAttribute("class", "button2")
          document.getElementById('eliminar3').setAttribute("class", "button")
        }
        function EP() {
          document.getElementById('añadir2').setAttribute("class", "button")
          document.getElementById('añadir3').setAttribute("class", "button")
          document.getElementById('eliminar2').setAttribute("class", "button")
          document.getElementById('eliminar3').setAttribute("class", "button2")
        }
    </script>

 <!--   <h3 >Todas las empresas</h3>
  

       <input type="button" id="mostrar" value="Display All Data" /> 
   

<section class="fullcont">
  for demo wrap-->
  <!--
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
-->