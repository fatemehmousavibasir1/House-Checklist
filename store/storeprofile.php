
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/navigationbar.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet"
          href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>پروفایل </title>
   </head>
   <style>
   hr{
      height: 2px;
      background-color: #bfbeb9;
      border: none;
      width: 1150px;
      margin-left: 120px;
  }</style>

<body>
<?php 
       session_start();
       $loginuser_id=$_SESSION['loginuser_id'];
       
        $_SESSION['loginuser_id']= $loginuser_id;
          ?>
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
  
    $sql= "SELECT * FROM logintablestore WHERE ID='1' ";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        
      while($row6 = mysqli_fetch_assoc($result)) {
    
    
        $loginuser_id=$row6["User_ID"];
      
      }
    
    }
    }
?> 

<nav class="navbar" >
      <!-- LOGO -->
      <a href="mainpage.php?id="<?php echo $loginuser_id ?>"><div class="logo"><img src="../photo/logo4.png" style="width:35px;margin-left:15px;"></div></a>
     <div style=" margin-right: 42%;"><a href="./storeprofile.php" ><img src="../photo/person.png"style="width:8%; float:left; padding-right:10px;"></a></div>
      
      <!-- NAVIGATION MENU -->
      <ul class="nav-links">
  
        <!-- USING CHECKBOX HACK -->
        <input type="checkbox" id="checkbox_toggle" />
        <label for="checkbox_toggle" class="hamburger">&#9776;</label>
  
        <!-- NAVIGATION MENUS -->
        <div class="menu">
  
          <li><a href="./aboutus.php">درباره ما</a></li>


          <li><a href="mainpage.php?id="<?php echo $loginuser_id ?>">خانه</a></li>
        </div>
      </ul>
    </nav> 

    <div class="wrap"  style="padding-top:50px;">
      <div class="right-menu">
        <a class="active"  href="storeprofile.php"><img src="../photo/person.png"style="width:60% "><i class="fa"style="font-size:25px"></i><span style="font-size:25px">پروفایل</span></a>
 <a  href="../mainhomepage.php"><i class="fa"><img src="../photo/login.png"style="width:60%"></i><span style="font-size:25px">خروج</span></a>

      </div>


<?php
    include "config.php";

$sql="SELECT * FROM `user` WHERE User_ID='$loginuser_id'";
$rs2=mysqli_query($conn, $sql);
 if (mysqli_num_rows($rs2) > 0) {

    while($row2 = mysqli_fetch_assoc($rs2)) {

         $iduser=$row2["User_ID"];
        $name=$row2["name"];
        $username=$row2["username"];
        $phone=$row2["phone"];
        $email=$row2["email"];
     

    
    }

  }

  $sql="SELECT * FROM `store` WHERE User_ID=$iduser";
  $rs2=mysqli_query($conn, $sql);
   if (mysqli_num_rows($rs2) > 0) {
  
      while($row2 = mysqli_fetch_assoc($rs2)) {
  
           $Title=$row2["Title"];
          $Address=$row2["Address"];
          $PhoneS=$row2["PhoneS"];
          $Website=$row2["Website"];
    
  
      
      }
  
    }
?>








<div class="container" style="margin-top:30px;">

  <form action="storeupdateprofile.php" method="post">
     <div class="form-row">
        <div class="input-data">
           <input type="text" id="name1" name="name1"dir="rtl" style="font-size:20px;" value="<?php echo $name; ?>">
           <div class="underline"></div>
           <label for="name1"style="padding: 0 0 0 243px;">نام و نام خانوادگی</label>
        </div>
        <div class="input-data">
           <input type="text" id="username1" name="username1" dir="rtl" style="font-size:20px;" value="<?php echo $username; ?>">
           <div class="underline"></div>
           <label for="username1"style="padding: 0 0 0 275px;">نام کاربری</label>
        </div>
     </div>
     <div class="form-row">
        <div class="input-data">
           <input type="phone" id="phone1"name="phone1" dir="rtl" style="font-size:20px;" value="<?php echo $phone; ?>">
           <div class="underline"></div>
           <label for="phone1"style="padding: 0 0 0 260px;">شماره موبایل</label>
        </div>
        <div class="input-data">
           <input type="email" id="email1" name="email1" dir="rtl"style="font-size:20px;" value="<?php echo $email; ?>">
           <div class="underline"></div>
           <label for="email1"style="padding: 0 0 0 290px;">ایمیل</label>
        </div>
     </div>

     <div class="form-row">
        <div class="input-data">
        <input type="text" id="Title1"name="Title1" dir="rtl" style="font-size:20px;" value="<?php echo $Title; ?>">
           <div class="underline"></div>
           <label for="Title1"style="padding: 0 0 0 270px;">نام فروشگاه</label>
          </div>
        <div class="input-data">
           <input type="text" id="Address1" name="Address1" dir="rtl"style="font-size:20px;" value="<?php echo $Address; ?>">
           <div class="underline"></div>
           <label for="Address1"style="padding: 0 0 0 255px;">آدرس فروشگاه</label>
        </div>
     </div>

     <div class="form-row">
        <div class="input-data">
           <input type="text" id="PhoneS1"name="PhoneS1" dir="rtl" style="font-size:20px;" value="<?php echo $PhoneS; ?>">
           <div class="underline"></div>
           <label for="PhoneS1"style="padding: 0 0 0 260px;">تلفن فروشگاه</label>
        </div>
        <div class="input-data">
           <input type="text" id="website1" name="website1" dir="rtl"style="font-size:20px;" value="<?php echo $Website; ?>">
           <div class="underline"></div>
           <label for="website1"style="padding: 0 0 0 290px;">وبسایت</label>
        </div>
     </div>

     
        <div class="form-row submit-btn">
           <div class="input-data">
              <div class="inner"></div>
              <input type="submit" value="ذخیره" id="update" name="update" style="font-size:20px">
              

           </div>
        </div>
  </form>
  </div>
  </div>
  </body>
 
?>