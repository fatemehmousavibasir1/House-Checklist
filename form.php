<?php
		
   if(isset($_POST['submit']))
    {
         $name = $_POST['name'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
		$password = $_POST['password'];
        $email = $_POST['email'];
		$role = $_POST['role'];

    }

    // database details
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

    // using sql to create a data entry query
    $sql = "INSERT INTO user (User_ID, username, name, phone,email,password,Role_ID) VALUES ( '', '$username', '$name', '$phone','$email','$password',$role)";
  
    // send query to the database to add values and confirm if successful
    $rs = mysqli_query($con, $sql);
    $sql1 = "SELECT MAX(User_ID) AS a FROM `user`";
    $rs1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows( $rs1) > 0) {
        while($row2 = mysqli_fetch_assoc( $rs1)) {
            $userid=$row2["a"];
    
      }}

     
      session_start() ;
      $_SESSION['loginuser_id']= $userid;


 if($role=="1"){
        header("Location: http://localhost/educativeform/homepageLogin.php?id=" .  $userid);
        $sql= "UPDATE logintableuser SET User_ID='$userid' WHERE ID = '1'";
mysqli_query($con,$sql);
    }
    if($role=="2"){
        header("Location: http://localhost/educativeform/store/mainpage.php?id=" .  $userid);
        $sql= "UPDATE logintablestore SET User_ID='$userid' WHERE ID = '1'";
        mysqli_query($con,$sql);
        $sql1 = "INSERT INTO store VALUES ( '', '$userid', ' ', ' ',' ',' ')";
  

      mysqli_query($con, $sql1);
    }
    if($role=="3"){
        header("Location: http://localhost/educativeform/admin/mainpage.php?id=" .  $userid);
        $sql= "UPDATE logintableadmin SET User_ID='$userid' WHERE ID = '1'";
        mysqli_query($con,$sql);
    }
    
    // close connection
mysqli_close($con);

?>
