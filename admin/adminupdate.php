
<?php
include "config.php";
$sql="SELECT * FROM `user` WHERE user.User_ID=(SELECT User_ID FROM logintableadmin WHERE ID=1)";
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
}
         $sqlU0 = "UPDATE `user` SET `name`= '$newname', username='$newusername' ,phone=$newphone,email='$newemail' WHERE User_ID=$iduser" ;
        $rs= mysqli_query($conn, $sqlU0);
         if($rs)
         {
             header("Location: http://localhost/educativeform/admin/adminprofile.php");
     
         }

?>