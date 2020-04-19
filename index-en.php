<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Kalam' rel='stylesheet'>
    <link rel="stylesheet" href="css/animate.css">

<script src="https://use.fontawesome.com/58676139ec.js"></script>

    <script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
    <title>Couponatco</title>
    <style>
    .brand:link, .brand:visited {
  background-color: white;
  color: black;
  padding: 10px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
    border-radius: 12px;
    box-shadow: 1px 1px grey;


}

.brand:hover, .brand:active {
  background-color: #007bff;
  color : white;
}
    </style>
  </head>
  <body data-spy="scroll" data-target=".navbar" data-offset="50">

  <?php

require_once 'navbar.php'; 
?>
<div id="section1">
 <?php
require_once 'slider.php'; 
?>
</div>

<div id="section2">
<?php
require_once 'brand.php'; 
?>
</div>

<div id="section3">
  <?php
require_once 'hotdeals.php'; 
?>
</div>

<div id="section4">
<h1 class="home-title">
  <span  style=" font-family: 'Kalam';font-size: 42px; margin-left:10%;">Coupons</span>
</h1><br>

<nav>
  <div class="nav nav-tabs" style="margin-left:20%; id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
    <img style="width:60px; height:40px;" src="img/flagb.jpg" class="img-fluid img-thumbnail" alt="...">
    <img style="width:60px; height:40px;" src="img/flaga.png" class="img-fluid img-thumbnail" alt="...">
    </a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
    <img style="width:60px; height:40px;" src="img/flag-c.png" class="img-fluid img-thumbnail" alt="...">
    
    </a>
  </div>
</nav>
<br>
<div class="tab-content" id="nav-tabContent">

  <?php
  echo '<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">' ;
  require_once 'sa.php'; 
 ?>

  <?php
  echo '<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">';
  require_once 'eg.php'; 
  echo '</div>'
?>

<div id="section5">

<?php 
  require_once 'blog/main.php'; 

?>
</div>



<div class="push"></div>
  </div>
  <footer class="footer" style="background-color: black; color:white; height:46px;">

  <div class="container">
      <center>
      
        <span class="text-muted"> Copyright details</span>
</center>
      </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  </body>
</html>