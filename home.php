<?php
require_once "config.php";
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
                <li class="nav-item active">
                  <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="status.php">Order Number</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="promo.php">Promotions</a>
                </li>
              </ul>
            </div>
          </nav>
      </section>

  <!--Orders -->
   <section class="orders">
     <h4>Recent Orders</h4>
     <p>Track your orders</p>
     <div class="res__scroll">
      <div class="row text">
        <div class="col res__scroll--box">
        <a href="status.php"><img src="images/brunch.jpg" alt="" width="150px" height="100px"></a>
            <p class="res-name">Brunch In</p>
            <p class="min">30-40 min</p>
        </div>
        <div class="col res__scroll--box">
          <img src="images/sub.jpg" alt="" width="150px" height="100px">
          <p class="res-name">Subs Marine</p>
          <p class="min">Order Completed</p>
        </div>
      </div>
     </div>
     


   </section>

  <!-- Restaurants -->
    <section id="restaurants">
      <h4>Restaurants near you</h4>
      <div class="res__scroll">
        <div class="row text">
          <div class="col res__scroll--box">
            <a href="restaurant.php"><img src="images/burger.jpg" alt="" width="150px" height="100px"></a>
            <a href="restaurant.php" id="res-item"><p class="res-name">The Big Five</p></a>
            <p class="min">Burgers and Smoothies</p>
          </div>
          <div class="col res__scroll--box">
            <img src="images/italian.jpg" alt="some italian dishes" width="150px" height="100px">
            <p class="res-name">Sapori</p>
            <p class="min">Italian Cuisine</p>
          </div>
          <div class="col res__scroll--box">
            <img src="images/brunch.jpg" alt="asorted plates of food" width="150px" height="100px">
            <p class="res-name">Brunch In</p>
            <p class="min">Lunch and Brunch</p>
          </div>
          <div class="col res__scroll--box">
            <img src="images/fries.jpg" alt="french fries on a basket" width="150px" height="100px">
            <p class="res-name">Fry Kingdom</p>
            <p class="min"> Custom made fries</p>
          </div>
          <div class="col res__scroll--box">
            <img src="images/sub.jpg" alt="a sub sandwish" width="150px" height="100px">
            <p class="res-name">Subs Marine</p>
            <p class="min">Sandwiches</p>
          </div>
          <div class="col res__scroll--box">
            <img src="images/sushi.jpg" alt="sushi on a plate" width="150px" height="100px">
            <p class="res-name">Atomic Sushi</p>
            <p class="min">Japanese</p>
          </div>
          <div class="col res__scroll--box">
            <img src="images/icecream.jpg" alt="ice cream cones" width="150px" height="100px">
            <p class="res-name">Melting Pod</p>
            <p class="min">Ice cream Parlor</p>
          </div>
        </div>
      </div>
      

    </section>

  <!-- Cuisine Restaurants   -->
    <section id="cuisine">
      <h4>Search by Cuisine</h4>
      <div class="res__scroll">
        <div class="row text">
          <div class="col res__scroll--box">
            <a href="restaurant.php"><img src="images/vegan.jpg" alt="" width="150px" height="100px"></a>
            <a href="restaurant.php" id="res-item"><p class="res-name">Vegan</p></a>
          </div>
          <div class="col res__scroll--box">
            <img src="images/italian.jpg" alt="some italian dishes" width="150px" height="100px">
            <p class="res-name">Italian</p>
          </div>
          <div class="col res__scroll--box">
            <img src="images/sushi.jpg" alt="sushi on a plate" width="150px" height="100px">
            <p class="res-name">Japanese</p>
          </div>
        </div>
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