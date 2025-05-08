<?php   
  session_start();
$loginuser_id=$_SESSION['loginuser_id'];

 $_SESSION['loginuser_id']= $loginuser_id;
  ?>

<?php
include "config.php";
if($loginuser_id=="" ){
  
  $sql= "SELECT * FROM logintableuser WHERE ID='1' ";
  $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) > 0) {
      
    while($row6 = mysqli_fetch_assoc($result)) {
  
  
      $loginuser_id=$row6["User_ID"];
    
    }
  
  }
  }
if (isset($_POST['update'])) {
         $newname = $_POST['name1'];
         $newusername = $_POST['username1'];
         $newphone = $_POST['phone1'];
         $newemail = $_POST['email1'];
}
         $sqlU0 = "UPDATE `user` SET `name`= '$newname', username='$newusername' ,phone=$newphone,email='$newemail' WHERE User_ID=$loginuser_id" ;
        $rs= mysqli_query($conn, $sqlU0);
         if($rs)
         {
             header("Location: http://localhost/educativeform/profile.php");
     
         }

?>