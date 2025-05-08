<?php
include "config.php";



if (isset($_POST['back'])) {
    header("Location: http://localhost/educativeform/admin/parent.php");
}

if (isset($_POST['update'])) {
    $user_id = $_POST['user_id'];
   $name = $_POST['name'];

   $sql = "UPDATE `parent group` SET `Parent_Name`='$name' WHERE Parent_ID=$user_id "; 
   $result = $conn->query($sql); 
   if ($result == TRUE) {
    header("Location: http://localhost/educativeform/admin/parent.php");
   }else{
       echo "Error:" . $sql . "<br>";
   }
} 
?>