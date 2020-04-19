<div class="wow bounceInUp">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol  class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div style="margin-top:50px;" class="carousel-inner">

<?php

require_once 'con.php'; 
// Get image data from database 
$result = $link->query("SELECT * FROM `slider`"); 
    $counter = 1;
    while($row = $result->fetch_assoc()){
?>
            <div class="carousel-item<?php if($counter <= 1){echo " active"; } ?>">
                <a href="">
                <?php echo'     <img style="width:100%;"   src="data:img/jpg;charset=utf8;base64,';?>
          <?php echo base64_encode($row['img']); ?>" />  
                </a>

            </div>
<?php
    $counter++;
    }
?>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
      
    </div>
</div>
</div>
<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div style="margin-top:50px;" class="carousel-inner">
    <div class="carousel-item active">
  
      <img class="d-block w-100" src="img/23.jpg" alt="First slide">
    </div>
 
    <div class="carousel-item">
      <img class="d-block w-100" src="img/23.jpg" alt="Second slide">
    </div>
   
    <div class="carousel-item">
      <img class="d-block w-100" src="img/23.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<br><br> -->
