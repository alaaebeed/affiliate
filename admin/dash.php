<?php
   require_once 'nav.php'; 
?>

<div class="content-container">

  <div class="container-fluid">
  <div class="row">
      <div class="col-md-5 ">
      <div class="card text-white bg-secondary mb-3 border-0" style="max-width: 18rem;">

  <div class="card-body">
    <h5> Total number of Brands : </h5>

    <?php 
    $sql1 = "SELECT brands FROM `brand`"; 
    $result = $link->query($sql1);
    while ($item2 = $result->fetch_array()) 
{
  echo '<h6>'.$item2['brands'].'</h6>';
}    ?>

  </div>
</div>
      </div>
      <div class="col-md-5">
      <div class="card text-white bg-primary mb-3 border-0" style="max-width: 18rem;">

  <div class="card-body text-light">
  <h5> Coupouns in each Brand : </h5>
 <?php


$sql1 = "SELECT brands FROM `brand`"; 
$result = $link->query($sql1);
while ($item2 = $result->fetch_array()) 
{
 echo '<h6>'.$item2['brands'].'&nbsp;&nbsp;';
 //echo '<h6>'.$item['code'].'</h6>';
 $sql2 = "SELECT  COUNT(code) FROM `copoun` WHERE `brand_name`='".$item2['brands']."'"; 
 $result2 = $link->query($sql2);
 while ($item = $result2->fetch_array()) 
{
echo ''.$item['COUNT(code)'].'</h6>';
}
} ?>
  </div>
</div>      </div>
    </div>
  </div>
  <br>
  <div class="container-fluid">
  <div class="row">
      <div class="col-md-5">
      <div class="card text-white bg-success mb-3 border-0" style="max-width: 18rem;">

  <div class="card-body">
  <h5> Total Number Of Brands : </h5>

  <?php 
    $sql1 = "SELECT COUNT(brands) FROM `brand`"; 
    $result = $link->query($sql1);
    while ($item2 = $result->fetch_array()) 
{
  echo '<h6>'.$item2['COUNT(brands)'].'</h6>';
}    ?>



  </div>
</div>
      </div>
      <div class="col-md-5">
      <div class="card text-white bg-warning mb-3 border-0" style="max-width: 18rem;">

  <div class="card-body">
  <h5> Total Number Of Coupons : </h5>
 <?php 
 $sql1 = "SELECT COUNT(code) FROM `copoun`"; 
 $result = $link->query($sql1);
 while ($item2 = $result->fetch_array()) 
{
echo '<h6>'.$item2['COUNT(code)'].'</h6>';
}    ?>

  </div>
</div>
      </div>
    </div>
  </div>
</div>


</body>
   


   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>