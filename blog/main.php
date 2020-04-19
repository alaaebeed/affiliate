<style>
<style>
.imgGroup {
  position: relative;
  width: 50%;
}

.imgEffect {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.imgGroup:hover .imgEffect {
  opacity: 0.3;
}

.imgGroup:hover .middle {
  opacity: 1;
}


</style>

<center>
<h1 class="home-title">
  <span  style=" font-family: 'Kalam';font-size: 42px;">Blog</span>
</h1></center>
<?php

require_once 'con.php'; 
// Get image data from database 
$result = $link->query("SELECT * FROM `blog` "); 
  $rows = $result->num_rows;    // Find total rows returned by database
  if($rows > 0){
    $cols = 6;    // Define number of columns
$counter = 1;     // Counter used to identify if we need to start or end a row
$nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns
$container_class = 'container';  // Parent container class name
$row_class = 'row';    // Row class name
$col_class = 'col-md-6'; // Column class name
//$card = 'card mb-3 shadow-sm';
//echo '<div class="'.$container_class.'">';    // Container open
         while($row = $result->fetch_assoc()){
          if(($counter % $cols) == 1) {    // Check if it's new row
            echo '<div  style ="width:80%;    margin: auto;   padding: 10px;"class="'.$row_class.'">'; // Start a new row
            }
            echo '<div class="'.$col_class.'"> ';?>
           <?php echo '<div class="imgGroup">' ?>
           <?php echo '<div style="" class="card mb-3 shadow-sm ">
           <a href="">
            <img style="height:300px;" class="imgEffect  img-thumbnail img " src="data:img/jpg;charset=utf8;base64,';?>

          <?php echo base64_encode($row['img']); ?>" /> 
          </a>
          <div class="middle">
          </div> 

          <?php echo '<h4 style="margin-left:10px;">'.$row['titleen'].'</h4>' ?>
          <?php echo '<p style="margin:auto; padding: 10px;">'?> <?php echo substr($row['articleen'], 0, 100); ?>
          <br> <br>
          <?php echo ' <a style="font-family:Kalam; width:50%;  margin-left: 100px;   padding: 10px;"  href="" class="btn btn-dark" role="button"> &nbsp;&nbsp;&nbsp;Read More</a>'?>
          
          <?php echo '</div>'?>
          <?php echo '</div><br>'?>    
               <?php echo '</div>'?>
                    

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
         echo '</div>';  // Close the container
  }

?>

 