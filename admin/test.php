<?php
include_once 'con.php';

$sql1    = "SELECT * FROM `brand` WHERE 1";
$result1 = $link->query($sql1);
$item1   = $result1->fetch_all();

$data =print_r($item1);


foreach($item1 as $value) {

  $sql2 = "SELECT `brand_name`, `status`, `expire`, `code`, `left_num` FROM `copoun` WHERE `brand_name`= '".$data."' ORDER BY RAND() LIMIT 1";


if (!$result2 = $link->query($sql2)) {
    die ('There was an error running query[' . $link->error . ']');
} 

$rows = $result2->num_rows;    // Find total rows returned by database
if($rows > 0) {
$cols = 3;    // Define number of columns
$counter = 1;     // Counter used to identify if we need to start or end a row
$nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns
$container_class = 'container';  // Parent container class name
$row_class = 'row';    // Row class name
$col_class = 'col-sm-4'; // Column class name

echo '<div class="'.$container_class.'">';    // Container open
while ($item2 = $result2->fetch_array()) 
{
  if(($counter % $cols) == 1) {    // Check if it's new row
  echo '<div class="'.$row_class.'">'; // Start a new row
}
    // Column with content

echo '<div class="'.$col_class.'"><h5>'.$item2['status'].'</h5><h5>'.$item2['expire'].'</h5><h5>'.$item2['code'].'</h5><h5>'.$item2['left_num'].'</h5></div>';     // Column with content
if(($counter % $cols) == 0) { // If it's last column in each row then counter remainder will be zero
echo '</div> <hr>'; //  Close the row
}
$counter++;    // Increase the counter
}

$result2->free();
if($nbsp > 0) { // Adjustment to add unused column in last row if they exist
for ($i = 0; $i < $nbsp; $i++) { 
echo '<div class="'.$col_class.'">&nbsp;</div>'; 
}
echo '</div>';  // Close the row
}
       echo '</div>';  // Close the container
}

}

<?php 
$brand = $item2['brands'];
$sql1 = "SELECT brands FROM `brand`"; 
$result = $link->query($sql1);
while ($item2 = $result->fetch_array()) 
{
 echo '<h6>'.$item2['brands'].'';
 //echo '<h6>'.$item['code'].'</h6>';
 $sql2 = "SELECT `id`, `brand_name`, `status`, `expire`, `code`, `left_num` FROM `copoun` WHERE `brand_name`='".$item2['brands']."'"; 
 $result2 = $link->query($sql2);
 while ($item = $result2->fetch_array()) 
{
echo ''.$item['code'].'</h6>';
}
}

?>


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Couponatco</title>
  </head>
  <body>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>