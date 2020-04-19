<?php
   require_once 'nav.php'; 
?>
<style>
.main {
    width: 50%;
    margin: 50px auto;
}

/* Bootstrap 4 text input with search icon */

.has-search .form-control {
    padding-left: 2.375rem;
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
}
</style>

<?php
   require_once 'con.php'; 
$query = "SELECT * FROM copoun";
$result = mysqli_query($link, $query);

?>
<div class="content-container">

<div class="container-fluid">
<div class="row">

    <div class="col-md-12 ">
    <div class="input-group">
    <input type="text" id="myInput" class="form-control"  onkeyup="myFunction()" placeholder="Search for names..">
    <div class="input-group-append">
      <button class="btn btn-secondary" type="button">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>
  <br>
  <a href="insertcoupoun.php" class="btn btn-info" role="button">Insert Coupoun</a>
  <br>

 <br>
 <?php
echo '<table class="table table-striped table-dark table-hover" id="myTable"> 
      <tr> 
      <td style="font-weight: bold;"> <font face="Arial">ID</font> </td> 
          <td style="font-weight: bold;"> <font face="Arial">BRAND</font> </td> 
          <td style="font-weight: bold;"> <font face="Arial">status</font> </td> 
        <td style="font-weight: bold;"> <font face="Arial">EXPIRE</font> </td> 
        <td style="font-weight: bold;"> <font face="Arial">code</font> </td> 
        <td style="font-weight: bold;"> <font face="Arial">discount</font> </td> 
      <td style="font-weight: bold;"> <font face="Arial">link</font> </td> 
      <td style="font-weight: bold;"> <font face="Arial">country</font> </td> 
      <td style="font-weight: bold;"> <font face="Arial">ACtion</font> </td> 

      </tr>';

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $field0name = $row["id"];
        $field1name = $row["brand_name"];
        $field2name = $row["statu"];
        $field3name = $row["expire"];
        $field4name = $row["code"];
        $field5name = $row["discount"];
        $field6name = $row["link"];
        $field7name = $row["country"];


 
        echo '<tr> 
                 <td>'.$field0name.'</td> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
                  <td>'.$field6name.'</td> 
                  <td>'.$field7name.'</td> 
                  <td>  <a  class="btn btn-primary" href=updatecoupoun.php?id='.$row["id"].'>Edit</a>|
                  <a  class="btn btn-primary" href=deletecopoun.php?id='.$row["id"].'>Delete</a>
                  
                  </td> 
              </tr>
              

              
              
              ';
    }
    echo'</table>';

    $result->free();
} 
?>
</div></div></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>