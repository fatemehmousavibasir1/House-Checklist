<?php
include "config.php";
$proID = $_GET['id'];


if (isset($_POST['back'])) {
    header("Location: http://localhost/educativeform/admin/product.php");
}

if (isset($_POST['update'])) {
   $name = $_POST['name'];

   $sql = "UPDATE `properties` SET `Title`='$name' WHERE properties_ID=$proID "; 
   $result = $conn->query($sql); 
   if ($result == TRUE) {
    header("Location: http://localhost/educativeform/admin/product.php" );
   }else{
       echo "Error:" . $sql . "<br>";
   }
} 
?>