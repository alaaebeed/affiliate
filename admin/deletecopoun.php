<?php
   require_once 'con.php'; 
  // require_once 'nav.php'; 
  if(isset($_GET['id']) && $_GET['id']!='')
    {
   $id = $_GET['id'];
   $query = "DELETE FROM copoun where id='" . $id . "'";
   $result = mysqli_query($link, $query);
    }
   ?>
 





