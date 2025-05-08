<?php
				
if(isset($_POST['back'])){
  header("Location: http://localhost/educativeform/admin/group.php");

}
if(isset($_POST['update'])){
      
         $name = $_POST['name'];
            $nameg = $_POST['nameg'];
       $namep = $_POST['namep'];
}

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

  $sql4="INSERT INTO `product group` VALUES ('','$nameg',$namep)";
  $rsinsert = mysqli_query($con, $sql4);
 
 
  header("Location: http://localhost/educativeform/admin/group.php");
?>
