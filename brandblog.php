<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<style>
    body{

}
/* .jumbotron{
    background-color: #e7e8eb;
    border-radius: 15px;

} */

.card{
    box-shadow: 1px 1px  grey;


}
.img-thumbnail{
    width: 250px;
    height: 150px;
    border: none;
    
}
</style>


</head>

<?php
   require_once 'con.php'; 
   $brands = $_GET['brands'];
   ?>
  
 
    <br>

  <?php
    require_once 'con.php'; 
    $brands = $_GET['brands'];
?>

<?php

require_once 'con.php'; 
 
// Get image data from database 
$result = $link->query("SELECT  * FROM `articleforbrand` WHERE `brand_name`='" . $brands. "'"); 
  $rows = $result->num_rows;    // Find total rows returned by database
  if($rows > 0){
    $cols = 3;    // Define number of columns
$counter = 1;     // Counter used to identify if we need to start or end a row
$nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns
$container_class = 'container';  // Parent container class name
$row_class = 'row';    // Row class name
$col_class = 'col-md-12'; // Column class name
echo '<div class="'.$container_class.'">';    // Container open

         while($item = $result->fetch_assoc()){
          if(($counter % $cols) == 1) {    // Check if it's new row
            echo '<div class="'.$row_class.'">'; // Start a new row
            }
          echo '<div class="'.$col_class.'"> ';
          echo '<div style=" width:100%;" class="card mb-5 shadow-sm">  ';
          echo '<div class="card-body">  ';
          echo '<p style="font-family:Kalam; margin-left:10px;  border-radius: 25px; font-size: 200%; color:white; background-color:'?>
          <?php 
          $brands = $_GET['brands'];
          $result2 = $link->query("SELECT * FROM `brand` WHERE country='sa' AND statu='active' AND brands='" . $brands. "'  "); 
          $color = $result2->fetch_assoc(); 
          echo $color['hex']?>;">
          
          
          <?php echo '
          &nbsp;&nbsp;&nbsp;'.$item['titleEn'].'</p> <br>';
          echo '<span style="font-weight: bold;">'.$item['articleEn'].'</span> &nbsp';
          echo '</div></div></div><br>';
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
document.querySelector("#copy-button2").addEventListener('click', function() {
	var reference_element = document.querySelector('#to-select-text2');

	var range = document.createRange();  
	range.selectNodeContents(reference_element);

	window.getSelection().addRange(range);

	var success = document.execCommand('copy');
	if(success)
		console.log('Successfully copied to clipboard');
	else
		console.log('Unable to copy to clipboard');

	window.getSelection().removeRange(range);
});
</script>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>