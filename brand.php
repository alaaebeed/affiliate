<style>
.group {
  position: relative;
  width: 50%;
}

.img {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  /* width: 250px; */
  opacity: 0;
  transition: .5s ease;
  
}

.group:hover .overlay {
  opacity: 0.7;
  border-radius: 20px;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}
/* title styles */
.home-title span{
    position: relative;
    overflow: hidden;
    display: block;
    line-height: 1.2;
}

.home-title span::after{
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background: white;
    animation: a-ltr-after 2s cubic-bezier(.77,0,.18,1) forwards;
    transform: translateX(-101%);
}

.home-title span::before{
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background: var(--bg-color);
    animation: a-ltr-before 2s cubic-bezier(.77,0,.18,1) forwards;
    transform: translateX(0);
}

.home-title span:nth-of-type(1)::before,
.home-title span:nth-of-type(1)::after{
    animation-delay: 1s;
}

.home-title span:nth-of-type(2)::before,
.home-title span:nth-of-type(2)::after{
    animation-delay: 1.5s;
}

@keyframes a-ltr-after{
    0% {transform: translateX(-100%)}
    100% {transform: translateX(101%)}
}

@keyframes a-ltr-before{
    0% {transform: translateX(0)}
    100% {transform: translateX(200%)}
}
</style>
<br><br>
<h1 class="home-title">
</h1>
<br>
<div class="wow bounceInUp">
<?php

require_once 'con.php'; 
// Get image data from database 
$result = $link->query("SELECT * FROM `brand` WHERE country='sa'"); 
  $rows = $result->num_rows;    // Find total rows returned by database
  if($rows > 0){
    $cols = 6;    // Define number of columns
$counter = 1;     // Counter used to identify if we need to start or end a row
$nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns
$container_class = 'container';  // Parent container class name
$row_class = 'row';    // Row class name
$col_class = 'col-md-4'; // Column class name
//$card = 'card mb-3 shadow-sm';
echo '<div class="'.$container_class.'">';    // Container open
         while($row = $result->fetch_assoc()){
          if(($counter % $cols) == 1) {    // Check if it's new row
            echo '<div  style =""class="'.$row_class.'">'; // Start a new row
            }
            echo '<div class="'.$col_class.'"> ';?>
           <?php echo '<div  style="margin-left:80px;"  class="group ">
            <img style="width:250px; height:100px;" class="card mb-3 shadow-sm card-img-top img-thumbnail img img-thumbnai" src="data:img/jpg;charset=utf8;base64,';?>
          <?php echo base64_encode($row['img']); ?>" />  
          <div style ="background-color: <?php echo $row['hex'] ?>; "   class="overlay">
         <div class="text">
         <a style="text-decoration: none; color:white;"
        <?php echo  'href=allcoupouns.php?brands='.$row["brands"].'>'?>
         <?php echo $row['brands'] ?>
         </a>
         </div>
  </div>
          <?php echo '</div><br>'?>    
                         
    </div> 
<?php
if(($counter % $cols) == 0) { // If it's last column in each row then counter remainder will be zero
  echo '</div>'; //  Close the row
  }
  $counter++;    // Increase the counter
  }
  $result->free();
  if($nbsp > 0) { // Adjustment to add unused column in last row if they exist
  for ($i = 0; $i < $nbsp; $i++) { 
  echo '<div class="'.$col_class.'">&nbsp;</div>'; 
  }
  echo '</div>';  // Close the row
  }
        // echo '</div>';  // Close the container
  }

?>

 </div>