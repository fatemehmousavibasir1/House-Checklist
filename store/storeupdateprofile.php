
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
$sql="SELECT * FROM `user` WHERE user.User_ID=$loginuser_id;";
$rs2=mysqli_query($conn, $sql);
 if (mysqli_num_rows($rs2) > 0) {

    while($row2 = mysqli_fetch_assoc($rs2)) {

         $iduser=$row2["User_ID"];
  

    
    }

  }
if (isset($_POST['update'])) {
         $newname = $_POST['name1'];
         $newusername = $_POST['username1'];
         $newphone = $_POST['phone1'];
         $newemail = $_POST['email1'];
         $newtitle = $_POST['Title1'];
         $newaddress = $_POST['Address1'];
         $newphones = $_POST['PhoneS1'];
         $newwebsite = $_POST['website1'];
}
         $sqlU0 = "UPDATE `user` SET `name`= '$newname', username='$newusername' ,phone=$newphone,email='$newemail' WHERE User_ID=$iduser" ;
         mysqli_query($conn, $sqlU0);

         $sqlU1 = "UPDATE `store` SET `Title`= '$newtitle', `Address`='$newaddress' ,PhoneS=$newphones,Website='$newwebsite' WHERE User_ID=$iduser" ;
         mysqli_query($conn, $sqlU1);

         header("Location: http://localhost/educativeform/store/storeprofile.php");
?>