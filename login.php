<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            header("location: home.php");
                        } else {
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    $username_err = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Noto+Serif:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="icon" href="images/favicon.ico" type="image">
</head>
<body>

    <div class="container">
        <img id="logo" src="images/logo2.png" class="d-block mx-auto my-5">
        <h2 style="font-size: 60px;" class="row">Login</h2>
        <p style="font-size: 45px;" class="row">Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group row<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label for="username" style="font-size: 40px;">Username</label>
                <input type="text" name="username" class="form-control" style="height: 70px; font-size: 40px;" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group row<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label for="password" style="font-size: 40px;">Password</label>
                <input type="password" name="password" class="form-control" style="height: 70px; font-size: 40px;">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group row">
                <input type="submit" class="btn btn-primary" value="Login" style="height: 70px; font-size: 40px;">
            </div>
            <p class="row" style="font-size: 40px;">Don't have an account? <a href="register.php">&nbsp;Sign up now</a>.</p>
        </form>
        <br />
        <br />
        <p style="font-size: 32px;" class="row">This site uses Location, JavaScript and Cookies. By signing in, you are consenting to their use.</p>
    </div>    
</body>
</html>