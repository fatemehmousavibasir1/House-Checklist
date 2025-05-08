<?php
		
if(isset($_POST['submit'])){
      
         $name = $_POST['name'];
        
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
    if (isset($_POST['update'])) {
     $name = $_POST['name'];
  }

  $sql4="INSERT INTO `parent group` VALUES ('','$name')   ";
  $rsinsert = mysqli_query($con, $sql4);
  header("Location: http://localhost/educativeform/admin/parent.php");
 

?>
