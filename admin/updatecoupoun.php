<?php
   require_once 'con.php'; 
   require_once 'nav.php'; 
   $id = $_GET['id'];
   $query = "SELECT * FROM copoun where id='" .$id. "'";
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


    <form  enctype="multipart/form-data" action="updateoperationcoupoun.php" method="post">
  <div class="form-group">
<?php
   if(isset($_GET['id']) && $_GET['id']!='')
   {
if ($result) {
 while ($row = $result->fetch_assoc()) {
   echo '  <label for="exampleInputEmail1">ID</label> ';
   echo '  <input type="text" class="form-control" id="exampleInputEmail1" name="id" aria-describedby="emailHelp" value='.$row["id"].' readonly>';
   echo '  <label for="exampleInputEmail1">ID</label> ';
   echo '  <input type="text" class="form-control" id="datepicker" name="expire" value='.$row["expire"].'>';
   echo '  <label for="exampleInputEmail1">ID</label> ';
   echo '  <input type="text" class="form-control" id="exampleInputEmail1" name="left_num" value='.$row["left_num"].'>';
   echo '  <label for="exampleInputEmail1">ID</label> ';
   echo '  <input type="text" class="form-control" id="exampleInputEmail1" name="discount" value='.$row["discount"].'>';
   echo '  <label for="exampleInputEmail1">ID</label> ';
   echo '  <input type="text" class="form-control" id="exampleInputEmail1" name="link" value='.$row["link"].'> <br>';
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
</div> <br>';
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
<br>
<?php
 }

 $result->free();
} 
   }
?>
    <input type="submit" name="update" value="Upload">


</form>

         


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><script type="text/javascript">
    $('#datepicker').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
</script>