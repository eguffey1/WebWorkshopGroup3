<?php

require_once "config.php";

$username = $password = $confirm_password = $make = $model = $color = "";
$username_err = $password_err = $confirm_password_err = ""; 

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $sql = "SELECT id FROM users WHERE username = ?";
        if($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["username"]);
            if(mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    if(empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    if(empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";     
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }
    if(trim($_POST["make"])) {
        $sql = "SELECT id FROM users WHERE make = ?";       
        if($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_make);
            $param_make = trim($_POST["make"]);
            if(mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                    $make = trim($_POST["make"]);
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    if(trim($_POST["model"])) {
        $sql = "SELECT id FROM users WHERE model = ?";       
        if($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_model);
            $param_model = trim($_POST["model"]);
            if(mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                    $model = trim($_POST["model"]);
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    if(trim($_POST["color"])) {
        $sql = "SELECT id FROM users WHERE color = ?";
        if($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_color);
            $param_color = trim($_POST["color"]);
            if(mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                    $color = trim($_POST["color"]);
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $sql = "INSERT INTO users (username, password, make, model, color) VALUES (?, ?, ?, ?, ?)";
        if($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_password, $param_make, $param_model, $param_color);        
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_make = $make; 
            $param_model = $model; 
            $param_color = $color; 
            if(mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login.php");
            } else {
                echo "Something went wrong. Please try again later.";
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Noto+Serif:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="images/favicon.ico" type="image">
</head>
<body>
    <div class="container">
        <img id="logo" src="images/logo2.png" class="d-block mx-auto my-5">
        <h2 style="font-size: 60px;" class="row">Sign Up</h2>
        <p style="font-size: 45px;" class="row">Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group row<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label for="username" style="font-size: 40px;">Username</label>
                <input type="text" name="username" style="height: 70px; font-size: 40px;" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group row<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label for="password" style="font-size: 40px;">Password</label>
                <input type="password" style="height: 70px; font-size: 40px;" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group row<?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label for="confirm_password" style="font-size: 40px;">Confirm Password</label>
                <input type="password" style="height: 70px; font-size: 40px;" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group row">
                <label for="make" style="font-size: 40px;">Vehicle Make</label>
                <input type="text" style="height: 70px; font-size: 40px;" name="make" class="form-control" value="<?php echo $make; ?>">
            </div> 
            <div class="form-group row">
                <label for="model" style="font-size: 40px;">Vehicle Model</label>
                <input type="text" style="height: 70px; font-size: 40px;" name="model" class="form-control" value="<?php echo $model; ?>">
            </div> 
            <div class="form-group row">
                <label for="color" style="font-size: 40px;">Vehicle Color</label>
                <input type="text" style="height: 70px; font-size: 40px;" name="color" class="form-control" value="<?php echo $color; ?>">
            </div> 
            <div class="form-group row">
                <input type="submit" class="btn btn-primary" value="Submit" style="height: 70px; font-size: 40px;">
                <input type="reset" class="btn btn-secondary" value="Reset" style="height: 70px; font-size: 40px;">
            </div>
            <p style="font-size: 40px;" class="row">Already have an account? <a href="login.php">&nbsp;Login here</a>.</p>
        </form>
    </div>    
</body>
</html>