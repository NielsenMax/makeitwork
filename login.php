<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese un nombre de usuario.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "La contraseña no es valida.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No se encontro una cuenta asociada a este nombre de usuario.";
                }
            } else{
                echo "Oops! Algo salio mal, Intentelo mas tarde";
            }
        }
        
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
     
    <div class="wrapper">
        <h2 class="Titulo">Inicio de sesion</h2>
        <p class="descripcion">Por favor ingrese sus datos para iniciar sesion.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group" <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>>
                
                <span class="help-block"><?php echo $username_err; ?></span>
                <input type="text" name="username" placeholder="Nombre de Usuario" class="input">
                
                <span class="underlineU"></span>
            </div>  
            <br>  
            <div class="form-group"<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>>
                
                <span class="help-block"><?php echo $password_err; ?></span>
                <input type="password" name="password" placeholder="Contraseña" class="input">
                <span class="underlineP"></span>
            </div>
            <br>
            <div >
                <input type="submit" class="button" value="Login" >
            </div>
            <p class="descripcion">No tienes cuenta? <a href="signup.php">Registrese aqui</a>.</p>
        </form>
    </div>    
</body>
</html>