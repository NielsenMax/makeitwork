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
    <script type="text/javascript" src="../js/lobbyempajax.js"></script>
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
        
</div>

    <!--variables-->
    <input type="button" hidden value="<?php echo htmlspecialchars($_SESSION["id"]); ?>" id="idOwner">
    <input type="button" hidden value="<?php echo htmlspecialchars($_GET["emp"]); ?>" id="idEmp">

    <h2 class="Titulo">Mis empresas</h2>
        <div class="gridcont" id="empresamuestreo2" >
        <div id="empresasCreadas"></div>
    </div>
    </form>
</body>
</html>