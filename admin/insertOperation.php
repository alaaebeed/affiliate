
<?php
include_once 'con.php';  
if(isset($_POST['insert']))
{
// Escape user inputs for security
$brand_name = $_POST['brand_name'];
$statu = $_POST['statu'];
$expire = $_POST['expire'];
$code = $_POST['code'];
$left_num = $_POST['left_num'];
$discount = $_POST['discount'];
$url = $_POST['link'];
$country = $_POST['country'];


$sql="INSERT INTO `copoun`(`id`, `brand_name`, `statu`, `expire`, `code`, `left_num`, `discount`, `link`, `country`)
VALUES (null,'$brand_name',TRIM('$statu'),'$expire','$code','$left_num','$discount'
,'$url',TRIM('$country'))";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}

// Close connection
mysqli_close($link);
?>