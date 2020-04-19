<!doctype html>
<html dir="rtl" lang="ar">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Couponatco</title>
    <style>
    .brand:link, .brand:visited {
  background-color: white;
  color: white;
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
  <body>

  <?php

  include 'navber.php'
?>



<div class="jumbotron">
  <h1 class="display-4 pull-right">كوبوناتكو</h1>
  <br><br><br>
  <p class="lead pull-right">لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت ت ...</p>
  <p class="lead pull-right">
  لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم ت ...</p>
  <br><br>
    <a class="btn btn-primary btn-lg pull-right" href="#" role="button">عرض المزيد</a>
  </p>
  <br><br><br><br>
</div>
<ul class="nav nav-tabs " id="myTab" role="tablist" style="margin-right:10%;">
  <li class="nav-item ">
    <a class="nav-link border border-dark rounded-pill active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">  <img style="width:60px; height:40px;" src="img/flagb.jpg" class="img-fluid img-thumbnail" alt="...">
    <img style="width:60px; height:40px;" src="img/flaga.png" class="img-fluid img-thumbnail" alt="...">
    </a>
  </li>
   &nbsp; &nbsp; &nbsp; &nbsp;
  <li class="nav-item border">
    <a class="nav-link border border-dark rounded-pill" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><img style="width:60px; height:40px;" src="img/flag-c.png" class="img-fluid img-thumbnail" alt="..."></a>
  </li>
  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <br>
  <?php

require_once 'con.php'; 
 
// Get image data from database 
$result = $link->query("SELECT * FROM `brand` WHERE country='sa' AND statu='active' "); 
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
           <?php echo '<div class="'.$card.'">
            <img 
            style="display: block;
            margin-left: auto;
            margin-right: auto;"
            class="card-img-top img-thumbnail d-flex align-items-center" src="data:img/jpg;charset=utf8;base64,';?>
          <?php echo base64_encode($row['img']); ?>" />  
          <?php  $sql2 = "SELECT  * FROM `copoun` WHERE `brand_name`='".$row['brands']."'  AND country='sa' ORDER BY RAND() LIMIT 1"; 
          $result2 = $link->query($sql2); 
          while ($item = $result2->fetch_array()) 
          {
          echo '<div class="card-body">  ';
          echo '<span style="font-weight: bold;" class="card-text pull-right">الحالة &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span class="badge badge-success pull-right">نشط</span> <br>';
          echo '<span style="font-weight: bold;" class="pull-right">الكوبون &nbsp;&nbsp; </span> <span id="to-select-text2" class="password-span pull-right">'.$item['code'].'&nbsp;&nbsp;&nbsp;</span> &nbsp;&nbsp;<button style="margin-top:-4px;"  id="copy-button2" class="btn btn-outline-dark btn-sm pull-right">نسخ</button>  <br><br>'; 
          echo '<span style="font-weight: bold;" class="pull-right">صالح حتى &nbsp; </span><span class="pull-right">'.$item['expire'].'</span> <br>';
          //echo '<span style="font-weight: bold;">Only left &nbsp;</span>  <span class="badge badge-warning">'.$item['left_num'].'</span> <br> ';
          echo '<span style="font-weight: bold;" class="pull-right">الخصم &nbsp;</span><span class="pull-right" > '.$item['discount'].'</span> <br> <br>';
          echo '<a style="margin-left:50px;" class="brand fa fa-tag" href="'.$item['link'].'" target="_blank">&nbsp;&nbsp;&nbsp;الذهاب إلى الموقع&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>';
          echo '<div class="d-flex justify-content-between align-items-center">';
          echo '</div>';
          echo '</div>';

      
          }
          ?>
          <?php echo '</div>'?>         
          
    </div> 

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
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<br>
  <?php

require_once 'con.php'; 
 
// Get image data from database 
$result = $link->query("SELECT * FROM `brand` WHERE country='eg' AND statu='active'"); 
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
           <?php echo '<div class="'.$card.'">
            <img
            style="display: block;
            margin-left: auto;
            margin-right: auto;"
            style="margin-left:40px;" class="card-img-top img-thumbnail" src="data:img/jpg;charset=utf8;base64,';?>
          <?php echo base64_encode($row['img']); ?>" />  
          <?php  $sql2 = "SELECT  * FROM `copoun` WHERE `brand_name`='".$row['brands']."'  AND country='eg' ORDER BY RAND() LIMIT 1"; 
          $result2 = $link->query($sql2); 
          while ($item = $result2->fetch_array()) 
          {
            echo '<div class="card-body">  ';
            echo '<span style="font-weight: bold;" class="card-text pull-right">الحالة &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span class="badge badge-success pull-right">نشط</span> <br>';
            echo '

                  <span style="font-weight: bold;" class="pull-right">الكوبون &nbsp;&nbsp; </span> <span id="to-select-text"" class="password-span pull-right">'.$item['code'].'&nbsp;&nbsp;&nbsp;</span> &nbsp;&nbsp;<button style="margin-top:-4px;"  id="copy-button" class="btn btn-outline-dark btn-sm pull-right">نسخ</button>  <br><br>'; 
            echo '<span style="font-weight: bold;" class="pull-right">صالح حتى &nbsp; </span><span class="pull-right">'.$item['expire'].'</span> <br>';
            //echo '<span style="font-weight: bold;">Only left &nbsp;</span>  <span class="badge badge-warning">'.$item['left_num'].'</span> <br> ';
            echo '<span style="font-weight: bold;" class="pull-right">الخصم &nbsp;</span><span class="pull-right" > '.$item['discount'].'</span> <br> <br>';
            echo '<a style="margin-left:50px;" class="brand fa fa-tag" href="'.$item['link'].'" target="_blank">&nbsp;&nbsp;&nbsp;الذهاب إلى الموقع&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>';
            echo '<div class="d-flex justify-content-between align-items-center">';
            echo '</div>';
            echo '</div>';

      
          }
          ?>
          <?php echo '</div>'?>         
          
    </div> 

<script>
document.querySelector("#copy-button").addEventListener('click', function() {
	var reference_element = document.querySelector('#to-select-text');

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
  
  </div>
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



    <script>




    </script>
 
  </body>
</html>