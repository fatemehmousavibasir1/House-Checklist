<?php
		if(isset($_POST['back'])){

            header("Location: http://localhost/educativeform/store/mainpage.php");

        }
if(isset($_POST['submit'])){
      
         $name = $_POST['name'];
         $Parent_ID = $_POST['Parent_ID'];
        
         $brand = $_POST['brand'];
         $Price = $_POST['Price'];
         $Date = $_POST['Date'];

 $arr=array($name,$Parent_ID,$brand,$Price,$Date);
    $host = "localhost";
    $username1 = "root";
    $password1 = "";
    $dbname = "checklist";


    $con = mysqli_connect($host, $username1, $password1, $dbname);

    // to ensure that the connection is made
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }

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
  
  $sql3="SELECT * FROM `store` WHERE User_ID=$loginuser_id;";
  $rs3=mysqli_query($con, $sql3);
  if (mysqli_num_rows($rs3) > 0) {
 
     while($row3 = mysqli_fetch_assoc($rs3)) {
         $storeid=$row3["Store_ID"];
     
     }
 
   }




  $sql4="INSERT INTO `list of stores product` VALUES ('','$storeid','$name','$Parent_ID','$brand','$Price','$Date'   )   ";
  $rsinsert = mysqli_query($con, $sql4);
 
 
    $arr = array();
    header("Location: http://localhost/educativeform/store/mainpage.php?id=" .  $loginuser_id);
}
?>
