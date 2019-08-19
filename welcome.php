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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>-->
    <link rel="stylesheet" href="welcome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="welcomeajax.js"></script>
</head>

<body style="background-image:url(fondo-index.jpg)"> 

<body>
   <div class="navbar">
        <div class="dropdown">
            <button class="dropbtn"><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
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
        <h1 style="">Hola, <i><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></i>.</h1>
        <h1 class="Roboto">Bienvenido a <i>MakeItWork</i>.</h1>
    </div>
    <input type="button" hidden value="<?php echo htmlspecialchars($_SESSION["id"]); ?>" id="idOwner">
    <p>
    </p>
    <form name=”mi_form”>
    <head>
      <title>Title of the document</title>
   </head>
    <body>
      <div class="flex">
        <input type="button" id="foo" class="button" onclick="empresaC()" value="Nueva empresa"/>
        <input type="button" id="foo2" class="button" onclick="empresaM()" value="Ver mis empresas"/>
      </div>
      <script>
        function empresaC() {
          document.getElementById('empresaCreacion').style.display = "";
          document.getElementById('empresaMuestreo').style = "display:none;"
          document.getElementById('foo').setAttribute("class", "button2");
          document.getElementById('foo2').setAttribute("class", "button");
        }
        function empresaM() {
          document.getElementById('empresaMuestreo').style.display = "";
          document.getElementById('empresaCreacion').style = "display:none;"
          document.getElementById('foo2').setAttribute("class", "button2");
          document.getElementById('foo').setAttribute("class", "button");
        }
        </script>
    </body>


    <body>
    <div align="center" id="empresaCreacion" style="display:none;">
        <h2 class="Titulo">Crear una empresa</h2>
        <p>Por favor complete los siguientes campos para crear una nueva empresa.</p>

        <span class="help-block"></span>
        <input type="text" placeholder="Nombre" name="username" class="input">
        <span class="underlineU"></span>

        <br>
                <input type="submit" class="button" value="Crear">
                <input type="reset" class="button" value="Resetear">

    </div>
      </body>
    <body>
    <div align="center" id="empresaMuestreo" style="display:none;">
        <h2 class="Titulo">Mis empresas</h2>
        <p>Estas son las empresas que usted ya creó.</p>
    </div>
      </body>



	<!--<table>
		<tr>
 			<td>Nombre</td>
			<td><input type="text" id="nombre_empresa"></td>
		</tr>
		<tr>
			<td colspan=”2”><input type="button" value="agregar" id="agregarEmpresa"></td>
      <td colspan=”2”><input type="button" value="mostrar mis empresas" id="display"></td>
	</table>-->
</form>

  <!--</table>
  <h3 >Todas las empresas</h3>
  <div id="respAddU" >
  <table  >
   <tr>
       <td> <input type="button" id="display" value="Display All Data" /> </td>
   </tr>
</table>-->
<div id="responsecontainer" >
</body>
</html>