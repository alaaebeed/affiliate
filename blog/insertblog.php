<?php 
require_once 'con.php'; 
 
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
            $titleen = $_POST['titleen'];
            $articleen = $_POST['articleen'];
            $titlear = $_POST['titlear'];
            $articlear = $_POST['articlear'];
            // Insert image content into database 
            $insert = $link->query("INSERT INTO `blog`(`id`, `img`, `titleen`, `articleen`, `titlear`, `articlear`) 
            VALUES (null,'$imgContent','$titleen','$articleen','$titlear','$articlear')"); 
             
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




<form action="insertblog.php" method="post" enctype="multipart/form-data"> 
   
<div class="form-group">

<label>Select Image File:</label>
<input class="form-control-file" type="file" name="image">

</div>

   <p>
        <label for="titleen">English Title:</label>
        <input type="text" class="form-control" name="titleen" id="titleen">
    </p>

    <p>
        <label for="articleen">English Article:</label>
        <input type="text" class="form-control" name="articleen" id="articleen">
    </p>


    <p>
        <label for="titlear">Arabic Title:</label>
        <input type="text" class="form-control" name="titlear" id="titlear">
    </p>

    <p>
        <label for="articleen">Arabic Article:</label>
        <input type="text" class="form-control" name="articlear" id="articlear">
    </p>


<br>

    <input type="submit" name="submit" value="Upload">
</form>

