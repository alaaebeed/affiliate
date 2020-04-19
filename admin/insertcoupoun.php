<?php
require_once 'nav.php';
include_once 'con.php';
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<title>Add Record Form</title>
</head>
<body>
<form action="insertOperation.php" method="post">
    <p>

 
 <div class="content-container">

<div class="container-fluid">
<div class="row">
<div class="col-md-2">
</div>
    <div class="col-md-8 ">
  

 <?php
$sql = "SELECT brands FROM `brand`";
$result = mysqli_query($link, $sql);
?>
<br>
<label for="brand_name">brand_name:</label>

<select class="form-control" name='brand_name'>
<?php
while ($row = mysqli_fetch_array($result)) {
echo "<option value='" . $row['brands'] . "'>" . $row['brands'] . "</option>";
}

echo "</select>";
?>
    </p>

    <div class="form-group">
    <label for="exampleFormControlSelect1">status</label>
    <select class="form-control" name="statu"   id="statu">
      <option>active</option>
      <option>expire</option>
    </select>


    <p>
        <label for="expire">expire:</label>
        <input type="text" class="form-control" id="datepicker" name="expire"  required> 
    </p>
    <p>
        <label for="code">code:</label>
        <input  class="form-control" type="text" name="code" id="code" required>
    </p>

    <p>
        <label for="leftNum">leftNum:</label>
        <input  class="form-control"type="text" name="left_num" id="leftNum" required>
    
        <label for="date">Discount:</label>
        <input class="form-control" type="text" name="discount" id="discount" required>
    </p>
    <p>
        <label for="date">Link:</label>
        <input class="form-control" type="text" name="link" id="link" required>
    </p>

    <div class="form-group" required>
    <label for="exampleFormControlSelect1">country</label>
    <select class="form-control" name="country"   id="country">
      <option>sa</option>
      <option>eg</option>
    </select>
  </div>
  
    </p>
    <input type="submit" value="Submit" name="insert">
    <p>
</form>


</div></div></div>






</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><script type="text/javascript">
    $('#datepicker').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    $('#datepicker').datepicker("setDate", new Date());

</script>