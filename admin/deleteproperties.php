<?php

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$conn = mysqli_connect($host, $username1, $password1, $dbname);
if (isset($_GET['id'])) {
 $idproperties = $_GET['id'];
 $sqldelproper="DELETE FROM `properties` WHERE `properties_ID`='$idproperties' ";
 $sqlproper = $conn->query($sqldelproper);
 if ($sqlproper == TRUE) {

    header("Location: http://localhost/educativeform/admin/product.php");
}else{

    echo "Error:" . $sqldelproper . "<br>";

}
}
