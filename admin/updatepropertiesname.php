
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../viewprofile.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../viewnavigation.css">
    <link rel="stylesheet" href="../css/bedroom.css">





    <title>به روزرسانی محصول</title>
  
</head> 

<style>
    th{
      
font-size:20px;

    }
    td{

        font-size:18px;   
    }
</style>
<body>
<nav class="navbar" >
      <!-- LOGO -->
      <div class="logo"><img src="../photo/logo4.png" style="width:35px;margin-left:15px;"></div>
      <div style=" margin-right: 42%;"><a href="./adminprofile.php" ><img src="../photo/person.png"style="width:8%; float:left; padding-right:10px;"></a></div>
      
      <!-- NAVIGATION MENU -->
      <ul class="nav-links">
  
        <!-- USING CHECKBOX HACK -->
        <input type="checkbox" id="checkbox_toggle" />
        <label for="checkbox_toggle" class="hamburger">&#9776;</label>
  
        <!-- NAVIGATION MENUS -->
        <div class="menu">
  
          <li><a href="./aboutus.php">درباره ما</a></li>


          <li><a href="mainpage.php">خانه</a></li>
        </div>
      </ul>
    </nav> 



<?php
    include "config.php";
$propid = $_GET['id']; 


$sql1 = "SELECT * FROM `properties` WHERE `properties_ID`='$propid'";

$sqlproduct1 = $conn->query($sql1);
if (mysqli_num_rows($sqlproduct1 ) > 0) {

    while($row1 = mysqli_fetch_assoc($sqlproduct1)) {


    
    
        $proName=$row1["Title"];
        
       }}  

?>



<body>
    <li style="padding-top:100px" ></li>

<form class="form-style-9"action="editpropsubmit.php?id=<?php echo $propid ?>" method="post" >
  <ul>
   <li>
      <label for="name" style="float: right; font-family:'Bnazanin';">نام ویژگی  </label> <input type="text" name="name" id="name" style="text-align:right;font-family:'Bnazanin'; font-size:17px;"class="field-style field-split align-right " value="<?php echo $proName; ?>"  />
      
   </li>

   <li  style="margin-left:30px;">
                <input type="submit" value="بازگشت" name="back" style="font-family: 'Bnazanin'; font-size:17px; ">
   
            <input type="submit" value="ذخیره" name="update" style="font-family: 'Bnazanin'; font-size:17px; ">

          </li>                                 </ul>
</form>

