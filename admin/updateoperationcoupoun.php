<?php  
require_once 'con.php'; 
if(isset($_POST['update']))
{
// Escape user inputs for security
$id = $_POST['id'];
$country = $_POST['country'];
$statu = $_POST['statu'];
$expire = $_POST['expire'];
$left_num = $_POST['left_num'];
$discount = $_POST['discount'];
$url = $_POST['link'];

$sql = "UPDATE `copoun` SET country=TRIM('".$country."'),statu=TRIM('".$statu."'),expire=TRIM('".$expire."'),
left_num=TRIM('".$left_num."'),discount=TRIM('".$discount."') ,link=TRIM('".$url."')  WHERE id ='".$id."'";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
// Close connection
mysqli_close($link);
?>