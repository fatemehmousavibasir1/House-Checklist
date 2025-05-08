<?php

$servername = "localhost";

$username = "root"; 

$password = ""; 

$dbname = "checklist"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

?> 
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/HomePage.css">
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/navigationbar.css"> 
    <link rel="stylesheet"
          href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>صفحه اصلی</title>
    <style> 
        .buttons{
          background-color: #8c988c;
          width: 165px;
          border: none;
          color: white;
          padding: 16px 32px;
          text-decoration: none;
          margin: 4px 2px;
          cursor: pointer;
          font-family: "Bnazanin";
          font-size:115%;
          border-radius: 3px;
        }
       
        .row {
    margin-block: 2%;
    display: flex;
    top:20%;
    margin-right: 2%;
    margin-left: 2%;
    
  }
   
  /* Create three equal columns that sits next to each other */
  .column {
    background-color: #c9bfb6;
    flex: 300px;
    padding: 44px;

 
  }

        </style>
</head>

<body>
  
</body>
<body>
<nav class="navbar" id="topNav">
    <!-- LOGO -->
    <a href="./mainhomepage.php"><div class="logo"><img src="./photo/logo4.png" style="width:35px;margin-left:15px;"></div></a>
    <div class="loginimg"><a href="loginSignup.html"><img src="./photo/login.png"style="width:9%; margin-right:25px;"></a></div>
    <div class="search">
      <form action="search1.php" method="GET">
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

        <li><a href="userstore1.php">فروش</a></li>
        <li class="services">
          <a href="./mainhomepage.php">دسته بندی کالا</a>

          <!-- DROPDOWN MENU -->
          
          <ul class="dropdown" >
            <?php
          $sql="SELECT  * FROM `parent group`";
$rs=mysqli_query($conn, $sql);
if (mysqli_num_rows($rs) > 0) {

    while($row2 = mysqli_fetch_assoc($rs)) {
        $counter=$row2["Parent_ID"];
       $name =$row2["Parent_Name"];?>
            <li><a href="listS.php?id=<?php echo $counter;?>"style="font-size: 17px;"><?php echo $name;?></a></li>
   
   <?php }
}?>       
          
          
          
          
          </ul>

        </li>

        <li><a href="./mainhomepage.php">خانه</a></li>
      </div>
    </ul>
  </nav> 

<a href="./loginSignup.html"><img src="./photo/Checklistn.png" style="width:1280px; margin-top:50px;margin-left:50px;">
  <br>

<?php
  $sql="SELECT  * FROM `parent group`";
$rs=mysqli_query($conn, $sql);
$s=1;
if (mysqli_num_rows($rs) > 0) {

    while($row2 = mysqli_fetch_assoc($rs)) {

        $count=$row2["Parent_ID"];
       $name =$row2["Parent_Name"];
        if($s %5=='1'){
        ?>
        
        <div class="row">

<?php
    }
   ?>   <div class="column">
        <a  href="listS.php?id=<?php echo $count;?>"> <img src="./photo/category/<?php echo $row2["Parent_ID"];?>.png"  style="width:100%;">
       <button  class="buttons" role="button"><?php echo $name ;?></button></a>
    </div>    
    <?php
    if($s %5=='0'){
        ?>
        
        </div>

<?php
    }   

++$s;


?>

    <?php
    }
}

?>
 

  <script src="./javascript/homepage.js"></script>
</body>

</html>