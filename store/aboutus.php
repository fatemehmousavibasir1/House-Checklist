<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/navigationbar.css">
    <link rel="stylesheet"
          href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>درباره ما  </title>
   </head>
   <style>
    *{
        font-family:'Bnazanin';
    }
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

<img src="../photo/checklist.jpg" style="width:800px;height:400px;margin-left:300px;margin-top:80px;">
    <p style="direction:rtl;margin-right:300px;margin-left:400px;text-align:justify;margin-top:50px;font-size:18px;font-family:'Bnazanin';line-height:25px;">برنامه ریزی، مهمترین و موثرترین سند برای مدیرانی که در جستجوی حمایت های بیرونی هستند، می باشد. برنامه ریزی می تواند، نقش موثری در کمک به پیشگیری از اشتباهات یا تشخیص فرصت های پنهان داشته باشد. از دیگر مزایای برنامه ریزی می توان به پیش بینی آینده و ساختن آینده اشاره کرد. در سازمان های پیچیده امروزی، بدون برنامه ریزی های دقیق، امکان ادامه زندگی نیست و برنامه ریزی مستلزم آگاهی از فرصت ها و تهدیدهای آتی و پیش بینی شیوه مقابله با آنهاست.</p>
    <p style="direction:rtl;margin-right:300px;margin-left:400px;text-align:justify;font-size:18px;font-family:'Bnazanin';line-height:25px;margin-bottom:100px;">اگر نگاهی کوتاه به زندگی افراد موفق بیندازیم در میابیم که در طول روز کارهای زیادی انجام می‌دهند و به فعالیت‌های روزمره خود به‌خوبی رسیدگی می‌کنند. علت آن است که برای زندگی خود برنامه صحیح و مشخصی دارند چراکه به اهمیت برنامه‌ریزی پی برده ­اند. داشتن برنامه­ ای برای انجام کارها باعث صرفه‌جویی در انرژی و زمان می‌شود و شخص به یک نظام تصمیم‌گیری می‌رسد.</p>

</body>
</html>