<?php     session_start();
$loginuser_id=$_SESSION['loginuser_id'];

 $_SESSION['loginuser_id']= $loginuser_id;
  ?>

<?php
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";

$con = mysqli_connect($host, $username1, $password1, $dbname);


?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/userstore.css">
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/navigationbar.css"> 
    <link rel="stylesheet"
          href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>فروش </title>

</head>

<body>
  
</body>
<body>

<?php

$servername = "localhost";

$username = "root"; 

$password = ""; 

$dbname = "checklist"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}
if($loginuser_id=="" ){
  
  $sql= "SELECT * FROM logintableuser WHERE ID='1' ";
  $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) > 0) {
      
    while($row6 = mysqli_fetch_assoc($result)) {
  
  
      $loginuser_id=$row6["User_ID"];
    
    }
  
  }
  }
?> 

<nav class="navbar" id="topNav">
    <!-- LOGO -->
    <a href="homepageLogin.php?id="<?php echo $loginuser_id ?>"><div class="logo"><img src="./photo/logo4.png" style="width:35px;margin-left:15px;"></div></a>
    <div class="loginimg"><a href="profile.php"><img src="./photo/person.png"style="width:5%; margin-right:25px;"></a></div>
    <div class="search">
      <form action="search.php" method="GET">
          <input type="text"
                 placeholder="جستجو"dir="rtl"
                 id="search"
                 name="search"   >
          <button>
              <i class="fa fa-search"
                 style="font-size: 18px;">
              </i>
          </button>
      </form>
  </div>
    <!-- NAVIGATION MENU -->
    <ul class="nav-links">

      <!-- USING CHECKBOX HACK -->
      <input type="checkbox" id="checkbox_toggle" />
      <label for="checkbox_toggle" class="hamburger">&#9776;</label>

      <!-- NAVIGATION MENUS -->
      <div class="menu">

        <li><a href="about.php">درباره ما</a></li>

        <li><a href="userstore.php">فروش</a></li>
        <li class="services">
          <a href="./homepageLogin.php?id="<?php echo $loginuser_id ?>">دسته بندی کالا</a>

          <!-- DROPDOWN MENU -->
          
          <ul class="dropdown" >
            <?php
          $sql="SELECT  * FROM `parent group`";
$rs=mysqli_query($conn, $sql);
if (mysqli_num_rows($rs) > 0) {

    while($row2 = mysqli_fetch_assoc($rs)) {
        $counter=$row2["Parent_ID"];
       $name =$row2["Parent_Name"];?>
            <li><a href="list.php?id=<?php echo $counter;?>"style="font-size: 17px;"><?php echo $name;?></a></li>
   
   <?php }
}?>       
          
          
          
          
          </ul>

        </li>

        <li><a href="./homepageLogin.php?id="<?php echo $loginuser_id ?>">خانه</a></li>
      </div>
    </ul>
  </nav> 


    <?php 

include "config.php";

    $sqlstore = "SELECT * FROM `store`";

    $sql = $conn->query($sqlstore);
    if (mysqli_num_rows($sql ) > 0) {

        while($row = mysqli_fetch_assoc($sql)) {
       $sid= $row["Store_ID"];
       $sqllist = "SELECT * FROM `list of stores product` where Store_ID='$sid' ";

       $sql1 = $conn->query($sqllist);
       if (mysqli_num_rows($sql1 ) > 0) {
   
           while($row1 = mysqli_fetch_assoc($sql1)) {   
        
        
         
            ?>
    <form class="form-style-9"  style="background-color: #edeae1;">
            <ul>
              <li>
              <label for="name" style="float: right;font-weight:1000;font-size:40px"><?php   echo $row1["name"];?>   </label> 
 
</li>
            <li>
         <img src="./photo/store.png" style="width:4%; float:left; padding-bottom:3px;padding-right:10px;"><label for="name" style="float: left; font-weight:1000;"> <?php   echo $row["Title"];?></label>
 

         </li>
         <li>
       <img src="./photo/phone.png" style="width:2%; float:left; padding-top:4px;"><label for="name" style="float: left; font-weight:1000;"><?php   echo $row["PhoneS"];?></label>               
       <img src="./photo/brand.png" style="width:3.5%; float:right; padding-top:4px;"><label for="name" style="float: right; font-weight:1000;padding-right:3px;"><?php   echo $row1["brand"];?></label>               
                 </li>
         <li >
       <img src="./photo/website.png" style="width:4%; float:left; padding-top:4px;padding-right:4px;"><label for="name" style="float: left; font-weight:1000;padding-top:5px;"><?php   echo $row["Website"];?></label>               
       <img src="./photo/money.png" style="width:5%; float:right; padding-top:4px;padding-left:2px;"><label for="name" style="float: right; font-weight:1000;padding-top:2px;padding-right:3px;"><?php   echo $row1["Price"];?></label>               
       </li>
         <li>
       <img src="./photo/location.png" style="width:4%; float:left; padding-top:4px;"><label for="name" style="float: left; font-weight:1000;padding-top:5px;padding-left:8px;"><?php   echo $row["Address"];?></label>               
       <img src="./photo/date.png" style="width:4%; float:right; padding-top:4px;"><label for="name" style="float: right; font-weight:1000;padding-top:5px;padding-right:3px;"><?php   echo $row1["Date"];?></label>               
   </li>
      </ul>
      </form>
<?php  
        }
      } 
 ?>
  
<?php    }
  }
?>