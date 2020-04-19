<?php
   require_once 'con.php'; 
   require_once 'nav.php'; 

   $id = $_GET['id'];
   $query = "SELECT * FROM brand where id='" . $id . "'";
   $result = mysqli_query($link, $query);
   ?>
   <div class="content-container">
   
   <div class="container-fluid">
   <div class="row">
   <div class="col-md-2">
   </div>
       <div class="col-md-8 ">
       <div class="input-group">
       <input type="text" id="myInput" class="form-control"  onkeyup="myFunction()" placeholder="Search for names..">
       <div class="input-group-append">
         <button class="btn btn-secondary" type="button">
           <i class="fa fa-search"></i>
         </button>
       </div>
     </div>
    <br>


    <form  enctype="multipart/form-data" action="updateoperation.php" method="post">
  <div class="form-group">
<?php
   if(isset($_GET['id']) && $_GET['id']!='')
   {
if ($result) {
 while ($row = $result->fetch_assoc()) {
   echo '  <label for="exampleInputEmail1">ID</label> ';
   echo '  <input type="text" class="form-control" id="exampleInputEmail1" name="id" aria-describedby="emailHelp" value='.$row["id"].'>';
   echo '  <label for="exampleInputEmail1">ID</label> ';
   echo '  <input type="text" class="form-control" id="exampleInputEmail1" name="brands" value='.$row["brands"].'>';
?>

<br>
<?php echo '<img style="width:100px;"   class="card-img-top img-thumbnail" src="data:img/jpg;charset=utf8;base64,';?>
          <?php echo base64_encode($row['img']); ?>" />  
               
 <label>Select Image File:</label>
    <input type="file" name="image">
  
  <br><br>
<?php
$country = $row["country"];
   echo'
   <div   class="input-group">
  <select name="country" class="custom-select" id="inputGroupSelect04">
    <option selected>'
    ?>
    <?php
    if($country=="sa"){
      echo'sa';
    }else {
      echo 'eg';
    }echo'</option>
    <option value="'?>
    <?php
    $country = $row["country"];
    if($country!="sa"){
      echo'sa';
    } else {
      echo 'eg';
    }?>"</option>
    <?php
    $country = $row["country"];
    if($country!="sa"){
      echo'sa';
    }else{
      echo'eg';
    }
    ?>
    <?php echo'</select>
</div>';?>
<br>
<?php
$statu = $row["statu"];
echo '
<div   class="input-group">
<select name="statu" class="custom-select" id="inputGroupSelect04">
 <option selected>'
 ?>
 <?php 
 if($statu=="active"){
   $statu='active';
   echo $statu;
 } else {
  $statu='disable';
  echo $statu;
 }
 ?>
 <?php echo '</option>
 <option value="'?>
 <?php
$statu = $row["statu"];
if($statu!="active"){
  $statu='active';
  echo $statu;
 } else {
  $statu='disable';
  echo $statu;
 }?>"</option>
 <?php
$statu = $row["statu"];
if($statu!="active"){
   echo'active';
 } else {
   echo'disable';
 }
 ?>
 <?php echo'</select>
</div>';?>
<br>
<?php
 }

 $result->free();
} 
   }
?>
    <input type="submit" name="update" value="Upload">


</form>
