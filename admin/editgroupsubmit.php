<?php
include "config.php";



if (isset($_POST['back'])) {
    header("Location: http://localhost/educativeform/admin/group.php");
 
}


if (isset($_POST['update'])) {
    $newid = $_POST['user_id'];
   $nameg = $_POST['nameg'];
   $namep = $_POST['namep'];
   $sql = "UPDATE `product group` SET `Group_Name`='$nameg',`Parent_ID`='$namep' WHERE Product_Group_ID=$newid "; 
   $result = $conn->query($sql); 
   if ($result == TRUE) {
    header("Location: http://localhost/educativeform/admin/group.php");
   }else{
       echo "Error:" . $sql . "<br>";
   }
} 
?>