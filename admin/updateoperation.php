<?php  
   require_once 'con.php'; 
?>
<?php
if(isset($_POST['update']))
{
// Escape user inputs for security
$id = $_POST['id'];
$brand_name = $_POST['brands'];
$country = $_POST['country'];
$statu = $_POST['statu'];

$fileName = basename($_FILES["image"]["name"]); 
$fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
$image = $_FILES['image']['tmp_name']; 
$imgContent = addslashes(file_get_contents($image)); 

$sql = "UPDATE `brand` SET brands=TRIM('".$brand_name."'),img='".$imgContent."',country=TRIM('".$country."'),statu=TRIM('".$statu."')  WHERE id ='".$id."'";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}

// Close connection
mysqli_close($link);
?>