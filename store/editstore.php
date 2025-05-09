<?php
include "config.php";
session_start();
$loginuser_id=$_SESSION['loginuser_id'];

 $_SESSION['loginuser_id']= $loginuser_id;

if($loginuser_id=="" ){

$sql= "SELECT * FROM logintablestore WHERE ID='1' ";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {

while($row6 = mysqli_fetch_assoc($result)) {


$loginuser_id=$row6["User_ID"];

}

}

}



if (isset($_POST['update'])) {
    $newid = $_GET['id'];
   $name = $_POST['name'];
   $Parent_ID= $_POST['Parent_ID'];
   $brand = $_POST['brand'];
   $Price = $_POST['Price']; 
   $Date = $_POST['Date']; 
   $sql = "UPDATE `list of stores product` SET `name`='$name',Parent_ID='$Parent_ID',brand='$brand',Price='$Price',`Date`='$Date' WHERE ID='$newid' "; 
   $result = $conn->query($sql); 
  
   header("Location: http://localhost/educativeform/store/mainpage.php?id=" .  $loginuser_id);

} 
if (isset($_POST['back'])) {
    header("Location: http://localhost/educativeform/store/mainpage.php?id=" .  $loginuser_id);
}
?>