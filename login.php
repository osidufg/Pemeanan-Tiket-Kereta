<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}


// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $password_hash = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // validasi username kosong
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // validasi password kosong
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // validasi
    if(empty($username_err) && empty($password_err)){
        // prepare statement
        $sql = "SELECT id_user, user_username, user_password, user_role FROM tb_user WHERE user_username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // bind parameter
            $stmt->bind_param("s", $param_username);
            
            // deklarasi parameter
            $param_username = $username;
            
            // execute if succeed
            if($stmt->execute()){
                $stmt->store_result();
                
                // cek username lalu password
                if($stmt->num_rows == 1){                    
                    $stmt->bind_result($id, $username, $user_password, $user_role);
                    if($stmt->fetch()){
                        if(password_verify($password, $user_password)){
                            // password benar, start session
                            session_start();
                            
                            // store data login
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            $_SESSION["role"] = $user_role;

                            // Redirect ke homeAdmin jika admin, home biasa kalo user
                            if($_SESSION["role"] === "admin"){
                                header("location: homeAdmin.php");
                            } else {
                                header("location: home.php");
                            }
                        } else{
                            // password error
                            $login_err = "Invalid username or password.";
                        }
                        // if($user_password == $password){
                        //     // password benar, start session
                        //     session_start();
                            
                        //     // store data login
                        //     $_SESSION["loggedin"] = true;
                        //     $_SESSION["id"] = $id;
                        //     $_SESSION["username"] = $username;                            
                        //     $_SESSION["role"] = $user_role;

                        //     // Redirect ke homeAdmin jika admin, home biasa kalo user
                        //     if($_SESSION["role"] === "admin"){
                        //         header("location: homeAdmin.php");
                        //     } else {
                        //         header("location: home.php");
                        //     }
                        // } else{
                        //     // password error
                        //     $login_err = "Invalid username or password.";
                        // }
                    }
                } else{
                    // username error
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "ngebug ges " . $mysqli->error;
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $mysqli->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>booking kereta</title>
        <link rel="stylesheet" href="styleLogin.css" />
    </head>
<body>
    <h1><b>KĀI</b></h1>
    <h2>aplikasi booking kereta</h2>
    <?php 
        if(!empty($login_err)){
            echo '<div class="errLogin">' . $login_err . '</div>';
        }        
    ?>
	
    <form id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div id="loginUsername">
            <!-- <label for="username">username</label> -->
            <input name="username" id = "username" type="text" placeholder="username" value="<?php echo $username; ?>" required/>
        </div>
        <div id="loginPassword">
            <!-- <label for="password" id="passLabel">password</label> -->
            <input name="password" id = "password" type="password" placeholder="password" required/>
        </div>  
        <div id="register">
            <label>Belum punya akun? </label>
            <a href="register.php">Daftar sekarang</a>
        </div>
        <button type="submit" value="Login">login</button>
      </form>
</body>
</html>