<?php 

include "config.php"; 

if (isset($_GET['id'])) {

    $id = $_GET['id'];



     $sqlcustomerpro = "DELETE FROM `product group` WHERE `Product_Group_ID`='$id'";
    
     $result = $conn->query($sqlcustomerpro);

     if ($result == TRUE) {

        header("Location: http://localhost/educativeform/admin/group.php");

    }else{

        echo "Error:" . $sql . "<br>";

    }

} 

?>

