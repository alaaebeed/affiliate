<?php 
require_once 'con.php'; 
require_once 'nav.php'; 
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
 <?php
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
            $brand = $_POST['brand'];
            $country = $_POST['country'];
            $statu = $_POST['statu'];
            // Insert image content into database 
            $insert = $link->query("INSERT INTO `brand`(`id`, `brands`, `img`, `country`, `statu`) VALUES (null,'$brand','$imgContent','$country','$statu')"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>




<form action="insertbrand.php" method="post" enctype="multipart/form-data"> 
   <p>
        <label for="brand">brand:</label>
        <input type="text" class="form-control" name="brand" id="brand">
    </p>

    <div class="form-group">

    <label>Select Image File:</label>
    <input class="form-control-file" type="file" name="image">

</div>
    <label >Select county</label>
    <select  class="form-control" name="country">
  <option value="sa">sa</option>
  <option value="eg">eg</option>
</select>

<label>Select status</label>
<select class="form-control" name="statu">
  <option value="active">active</option>
  <option value="disable">disable</option>
</select>
<br>

    <input type="submit" name="submit" value="Upload">
</form>

<?php
include_once 'con.php';

  
if(isset($_POST['update']))
{
// Escape user inputs for security
$id = $_POST['id'];
$brand_name = $_POST['brands'];
$country = $_POST['country'];
$statu = $_POST['statu'];
$image = $_FILES['image']['tmp_name']; 
$imgContent = addslashes(file_get_contents($image)); 

$sql = "UPDATE `brand` SET brands=TRIM('".$brand_name."'),country=TRIM('".$country."'),statu=TRIM('".$statu."') , img='".$imgContent."' WHERE id ='".$id."'";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}

// Close connection
mysqli_close($link);
?>

</div></div></div>