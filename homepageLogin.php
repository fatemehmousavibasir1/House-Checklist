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

    <title> صفحه اصلی</title>
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
  <?php       $loginuser_id = $_GET['id'];
  session_start() ;
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


  <div class="slideshow-container">
    <div class="mySlides fade">
    
      <a href="homepageLogin.php?id="<?php echo $loginuser_id ?>"><img src="./photo/back3n.png" style="width:1360px; height:450px;"></a>
    </div>
    <div class="mySlides fade">
 
      <a href="homepageLogin.php?id="<?php echo $loginuser_id ?>"><img src="./photo/back2n.png" style="width:1360px;height:450px;"></a>
    </div>
    <div class="mySlides fade">
   
      <a href="./view.php"><img src="./photo/back1n.png" style="width:1360px;height:450px;"></a>
    </div>
    <a class="prev" onclick="plusSlides(-1)"></a>
    <a class="next" onclick="plusSlides(1)"></a>
  </div>
  <br>
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>
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
        <a  href="list.php?id=<?php echo $count;?>"> <img src="./photo/category/<?php echo $row2["Parent_ID"];?>.png"  style="width:100%;">
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