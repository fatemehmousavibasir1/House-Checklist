

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bedroom.css">
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/navigationbar.css">
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="stylesheet"
          href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>پروفایل</title>
   </head>
   <style>
   hr{
      height: 2px;
      background-color: #bfbeb9;
      border: none;
      width: 1150px;
      margin-left: 120px;
  }
  .collapsible {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 1280px;
    height: 150px;
    border: none;
    outline: none;
    font-size: 15px;
  margin-top: 20px;
  margin-left: 35px;
  margin-right: 25px;
  font-family: "Bnazanin";
  font-size: 40px;
  text-align: right;
  padding-right: 210px;
  font-weight: 700;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  background-image: url
  }
  
  /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
  .active, .collapsible:hover {
    background-color: #ccc;
  
  }
  .search input[type=text]{
    width:300px;
    height:25px;
    border-radius:25px;
    border: none;
    padding-right: 10px;
    font-family: "Bnazanin";
 }
     
 .search{
    float:right;
    margin:1px;
    
 }
     
 .search button{
    background-color: transparent;
    color: #f2f2f2;
    float: right;
    padding: 2px 4px;
    font-size: 13px;
    border: none;
    cursor: pointer;
 }
  
  </style>
<body>


  <?php     session_start();
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



    <div class="wrap">
      <div class="right-menu">
        <a class="active"  href="profile.php"><img src="./photo/person.png"style="width:60% "><i class="fa"style="font-size:25px"></i><span style="font-size:25px">پروفایل</span></a>
        <a  href="view.php"><i class="fa"><img src="./photo/pngwing.png"style="width:60%"></i><span style="font-size:25px">فهرست کالاها</span></a>
        <a  href="mainhomepage.php"><i class="fa"><img src="./photo/login.png"style="width:60%"></i><span style="font-size:25px">خروج</span></a>

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


?>








<div class="container">

  <form action="userupdate.php" method="post">
     <div class="form-row">
        <div class="input-data">
           <input type="text" id="name1" name="name1"dir="rtl" style="font-size:20px;" value="<?php echo $name; ?>">
           <div class="underline"></div>
           <label for="name1"style="padding: 0 0 0 240px;">نام و نام خانوادگی</label>
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