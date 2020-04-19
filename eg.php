<?php
require_once 'con.php'; 
// Get image data from database 
$result = $link->query("SELECT * FROM `brand` WHERE country='eg' AND statu='active' "); 
  $rows = $result->num_rows;    // Find total rows returned by database
  if($rows > 0){
    $cols = 3;    // Define number of columns
$counter = 1;     // Counter used to identify if we need to start or end a row
$nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns
$container_class = 'container';  // Parent container class name
$row_class = 'row';    // Row class name
$col_class = 'col-sm-4'; // Column class name
$card = 'card mb-4 shadow-sm';
echo '<div class="'.$container_class.'">';    // Container open

         while($row = $result->fetch_assoc()){
          if(($counter % $cols) == 1) {    // Check if it's new row
            echo '<div class="'.$row_class.'">'; // Start a new row
            }
            echo '<div class="'.$col_class.'"> ';?>
           <?php echo '<div style="height:440px;"  class="'.$card.'">
            <img style="
            display: block;
            margin-left: auto;
            margin-right: auto;
            " class="card-img-top img-thumbnail" src="data:img/jpg;charset=utf8;base64,';?>
          <?php echo base64_encode($row['img']); ?>" />  
          <?php  $sql2 = "SELECT  * FROM `copoun` WHERE `brand_name`='".$row['brands']."'  AND country='eg' ORDER BY RAND() LIMIT 1"; 
          $result2 = $link->query($sql2); 
          while ($item = $result2->fetch_array()) 
          {
          echo '<div class="card-body">  ';
          echo '<span style="position: absolute; margin-top:-150px; margin-left:-40px; width:80px; height:30px; padding:10px;font-size: 15px; color:white; font-family:Kalam;"class="badge badge-warning ">'?> <?php echo $item['discount']?> %OFF </span>
          <?php

          echo '<p style="height:110px;" class="card-text">'.$item['descEn'].'</p> <br>';
          echo '<button onClick="Clipboard_CopyTo(this.id)" class="fa fa-scissors  btn btn-outline-dark btn-sm" style="color:margin-top:-4px; padding:6px; margin-left:50px; width:200px;"id='?>"<?php echo $item['code']?>" >
         &nbsp;<?php echo $item['code']?>
          </button>
          <?php ; 


          //echo '<span style="font-weight: bold;">Valid Till &nbsp; </span>'.$item['expire'].' <br>';
          //echo '<span style="font-weight: bold;">Only left &nbsp;</span>  <span class="badge badge-warning">'.$item['left_num'].'</span> <br> ';
          //echo '<span style="font-weight: bold;">Discount &nbsp;</span> '.$item['discount'].'<br> <br>';
          echo '<br> <br><a class="btn btn-dark  fa fa-tag" style="margin-left:50px; width:200px;"  href="'.$item['link'].'" target="_blank">&nbsp;&nbsp;&nbsp;Go to web site&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>';
          echo '</div>';
          }
          ?>
          <?php echo '</div>'?>         
          
    </div> 
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


 
