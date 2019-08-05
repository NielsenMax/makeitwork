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
    <input type="button" hidden value="<?php echo htmlspecialchars($_SESSION["id"]); ?>" id="idOwner">
    <p>
    </p>
    <form name=”mi_form”>
	<table>
		<tr>
 			<td>Nombre</td>
			<td><input type="text" id="nombre_empresa"></td>
		</tr>
		<tr>
			<td colspan=”2”><input type="button" value="agregar" id="agregarEmpresa"></td>
      <td colspan=”2”><input type="button" value="mostrar mis empresas" id="display"></td>
	</table>
</form>
 
  </table>
  <h3 >Todas las empresas</h3>
  <div id="respAddU" >
  <table  >
   <!--<tr>
       <td> <input type="button" id="display" value="Display All Data" /> </td>
   </tr>-->
</table>
<div id="responsecontainer" >
</body>
</html>