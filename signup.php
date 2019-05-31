<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $email="";
$username_err = $password_err = $confirm_password_err = $email_err=  "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese un nombre de usuario.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "Este nombre de usuario ya esta registrado.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Algo salio mal, Intentelo mas tarde";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Por favor ingrese un email.";
    } else{
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 2){
                    $email_err = "Este email ya esta en uso.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Algo salio mal, Intentelo mas tarde";
            }
        }
         
        // Close statement
        $stmt->close();
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese una contraseña.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "La contraseña debe ser de al menos de 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor ingrese la contraseña otra vez para confirmar.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Las contraseñas no coinciden.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)&& empty($email_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
         
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sss", $param_username, $param_email,$param_password);
            
            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash  
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="singup.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2 class="Titulo">Registro</h2>
        <p>Por favor complete este formulario para crear la cuenta.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                
                <span class="help-block"><?php echo $username_err; ?></span>
                <input type="text" placeholder="Nombre de usuario" name="username" class="input" value="<?php echo $username; ?>">
                <span class="underlineU"></span>
            </div> 
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                
                <span class="help-block"><?php echo $email_err; ?></span>
                <input type="text" placeholder="Email" name="email" class="input" value="<?php echo $email; ?>">
                <span class="underlineU"></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

                <span class="help-block"><?php echo $password_err; ?></span>
                <input type="password" placeholder="Contraseña"name="password" class="input" value="<?php echo $password; ?>">
                <span class="underlineU"></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
                <input type="password"placeholder="Confirme la contraseña" name="confirm_password" class="input" value="<?php echo $confirm_password; ?>">
                <span class="underlineU"></span>
            </div>
            <div class="buttongroup">
                <br>
                <input type="submit" class="button" value="Enviar">
                <input type="reset" class="button" value="Reset">
            </div>
            <p>Ya tienes cuenta? <a href="login.php">Inicie sesion aqui!</a>.</p>
        </form>
    </div>    
</body>
</html>