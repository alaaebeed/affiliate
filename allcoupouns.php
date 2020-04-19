<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>


<body>
<?php

  require_once 'navbar.php'; 
?>
<?php
   require_once 'con.php'; 
   $brands = $_GET['brands'];
   ?> 
    <br>
  <?php
    require_once 'con.php'; 
    $brands = $_GET['brands'];

// Get image data from database 
$result = $link->query("SELECT * FROM `brand` WHERE country='sa' AND statu='active' AND brands='" . $brands. "'  "); 
$result2 = $link->query("SELECT * FROM `brand` WHERE country='sa' AND statu='active' AND brands='" . $brands. "'  "); 

$rows = $result->num_rows;    // Find total rows returned by database
  if($rows > 0){
    $cols = 3;    // Define number of columns
$counter = 1;     // Counter used to identify if we need to start or end a row
$nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns
$container_class = 'container';  // Parent container class name
$row_class = 'row';    // Row class name
$col_class = 'col-sm-12'; // Column class name
$card = 'card mb-4 shadow-sm';?>
<div  class="imgfluid"  style="
width:100%;
height :290px;
width:100%;
background-color:<?php $color = $result2->fetch_assoc(); echo $color['hex']?>;">
</div>
<?php

         while($row = $result->fetch_assoc()){
          if(($counter % $cols) == 1) {    // Check if it's new row
            }
            ?>
           <?php echo '
            <img style="
            margin-left:30%;
            width:300px;
            height:300px;
            margin-top:-150px;"  src="data:img/jpg;charset=utf8;base64,';?>
            
          <?php echo base64_encode($row['img']); ?>" />  

          <?php }}?>         
          
    </div> 
  



<div style="margin-top:-40px;" >
<?php
require_once 'minibrand.php'; 
?>
</div>
<br><br>
<?php

require_once 'con.php'; 
 
// Get image data from database 
$result = $link->query("SELECT  * FROM `copoun` WHERE `brand_name`='" . $brands. "'  AND country='sa' ORDER BY RAND() "); 
  $rows = $result->num_rows;    // Find total rows returned by database
  if($rows > 0){
    $cols = 3;    // Define number of columns
$counter = 1;     // Counter used to identify if we need to start or end a row
$nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns
$container_class = 'container';  // Parent container class name
$row_class = 'row';    // Row class name
$col_class = 'col-md-4'; // Column class name
echo '<div class="'.$container_class.'">';    // Container open

         while($item = $result->fetch_assoc()){
          if(($counter % $cols) == 1) {    // Check if it's new row
            echo '<div class="'.$row_class.'">'; // Start a new row
            }
          echo '<div class="'.$col_class.'"> ';
          echo '<div style=" width:300px;" class="card mb-5 shadow-sm">  ';
          echo '<div class="card-body">  ';
          //echo '<span style="font-weight: bold;" class="card-text">Status &nbsp;&nbsp </span><span class="badge badge-success">'.$item['statu'].'</span> <br>';
          echo '<span style="position: absolute; margin-top:12px; margin-left:-40px; width:100px; height:30px; padding:10px;font-size: 15px; color:white; font-family:Kalam;"class="badge badge-warning ">'?> <?php echo $item['discount']?> %OFF </span>
          <?php
          echo '<p style="height:110px; margin-top:56px;" class="card-text">'.$item['descEn'].'</p> <br><br>';
         echo '<button onClick="Clipboard_CopyTo(this.id)" class="fa fa-scissors  btn btn-outline-dark btn-sm" style="color:margin-top:-10px; padding:6px; margin-left:20px; width:200px;"id='?>"<?php echo $item['code']?>" >
         &nbsp;<?php echo $item['code']?>
          </button>
        <?php  
          //echo '<span style="font-weight: bold;">Valid Till &nbsp; </span>'.$item['expire'].' <br>';
          //echo '<span style="font-weight: bold;">Only left &nbsp;</span>  <span class="badge badge-warning">'.$item['left_num'].'</span> <br> ';
          echo '<br> <br><a class="btn btn-dark  fa fa-tag" style="margin-left:20px;  border: none; width:200px; background-color:'?><?php echo $color['hex'] ?> <?php echo ';" 
           href="'.$item['link'].'" target="_blank">&nbsp;&nbsp;&nbsp;Go to web site&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>';
          echo '</div></div></div>';
          ?>
 
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
<hr>

<script>
function Clipboard_CopyTo(value) {
  var tempInput = document.createElement("input");
  tempInput.value = value;
  document.body.appendChild(tempInput);
  tempInput.select();
  document.execCommand("copy");
  document.body.removeChild(tempInput);
}
</script>

<?php

require_once 'brandblog.php'; 
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
    </html>
