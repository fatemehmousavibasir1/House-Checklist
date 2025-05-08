<?php
include "config.php";


if (isset($_POST['back'])) {
    header("Location: http://localhost/educativeform/admin/product.php");
}



if (isset($_POST['update'])) {
    $proID = $_POST['proID'];
   $name = $_POST['name'];

   $sql = "UPDATE `product` SET `Product_Name`='$name' WHERE Product_ID=$proID "; 
   $result = $conn->query($sql); 
   if ($result == TRUE) {
    header("Location: http://localhost/educativeform/admin/product.php");
   }else{
       echo "Error:" . $sql . "<br>";
   }
} 
?>