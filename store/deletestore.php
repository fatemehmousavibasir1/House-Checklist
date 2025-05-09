<?php 

include "config.php"; 

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    session_start();
    $loginuser_id=$_SESSION['loginuser_id'];
    
     $_SESSION['loginuser_id']= $loginuser_id;

if($loginuser_id=="" ){

$sql= "SELECT * FROM logintablestore WHERE ID='1' ";
$result = mysqli_query($con,$sql);
if (mysqli_num_rows($result) > 0) {
   
 while($row6 = mysqli_fetch_assoc($result)) {


   $loginuser_id=$row6["User_ID"];
 
 }

}

}


     $sqlcustomerpro = "DELETE FROM `list of stores product` WHERE `ID`='$id'";
    
     $result = $conn->query($sqlcustomerpro);

     if ($result == TRUE) {

        echo "Record deleted successfully.";

    }else{

        echo "Error:" . $sql . "<br>" ;

    }

} 
header("Location: http://localhost/educativeform/store/mainpage.php?id=" .  $loginuser_id);
?>

