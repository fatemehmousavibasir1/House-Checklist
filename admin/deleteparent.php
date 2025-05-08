<?php 

include "config.php"; 

if (isset($_GET['id'])) {

    $id = $_GET['id'];



     $sqlcustomerpro = "DELETE FROM `parent group` WHERE `Parent_ID`='$id'";
    
     $result = $conn->query($sqlcustomerpro);

     if ($result == TRUE) {

        header("Location: http://localhost/educativeform/admin/parent.php");

    }else{

        echo "Error:" . $sql . "<br>";

    }

} 

?>

