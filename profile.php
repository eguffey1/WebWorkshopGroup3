<?php
// Include config file
require_once "config.php";
$sql = "SELECT username, make, model, color FROM users";
$result = $link->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $username = $row["username"];
    $make = $row["make"];
    $model = $row["model"];
    $color = $row["color"];
  }
}
$link->close();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Noto+Serif:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="icon" href="images/favicon.ico" type="image">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
    <title>Curbed</title>
  </head>
  <body>
    <div id="page-container">
    <div id="content-wrap">
     <section id="header">
       <!-- Nav Bar   -->
        <nav class="navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand" ><img id="logo" src="images/logo.png" width="140px" height="63px"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="status.php">Order Number</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="profile.php">Profile<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="promo.php">Promotions</a>
              </li>
            </ul>
          </div>
        </nav>
    </section>

  <!-- Profile -->
  <section id="profile">
    <div id="pro-header">
      <img src="images/profile.png" alt="male avatar icon" width="100px" height="100">
      <h5 id="name">John Doe (does not change for demo)</h5>
      <a href="logout.php"><button class="btn btn-primary">Logout</button></a>
    </div>
    <div id="info">
      <h5>Information</h5>
      <h6 class="h6-info">Username</h6>
      <p><?php echo $username; ?></p>
      <h6 class="h6-info">Email (does not change for demo)</h6>
      <p>johndoe@gmail.com</p>
      <h6 class="h6-info">Phone (does not change for demo)</h6>
      <p>407-123-4567</p>
    </div>
    <div id="car-info">
      <h5>Car Information</h5>
      <h6 class="h6-info">Make</h6>
      <p><?php echo $make; ?></p>
      <h6 class="h6-info">Model</h6>
      <p><?php echo $model; ?></p>
      <h6 class="h6-info">Color</h6>
      <p><?php echo $color; ?></p>
    </div>
  </section>
  </div>
  <!-- Footer -->
  <footer id="footer">
    <div class="social">
    <a target="_blank" href="#" class="icon-social">
      <img src="images/twitter-sign.png">
    </a>
    <a target="_blank" href="#" class="icon-social">
      <img src="images/facebook.png">
    </a>
    <a target="_blank" href="#" class="icon-social">
      <img src="images/instagram-logo.png">
    </a>
    <div>
      <p class="p-foot">DIG4104C</p>
      <p class="p-foot">Created by: Erickson Guffey, Hal Jundzil, Dykota Baker, Lora Abdulhak, Leidy Pulido</p>
      <p class="p-foot"></p>This is not a real website.</p>
    </div>
   </div>
  </footer>
  </div>
  </body>
  <script src="js/geolocation.js"></script>
</html>