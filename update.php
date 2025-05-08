<?php     session_start();
$loginuser_id=$_SESSION['loginuser_id'];

 $_SESSION['loginuser_id']= $loginuser_id;
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

    <title>به روز رسانی</title>

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
$user_id = $_GET['id']; 

$sql6 = "SELECT * FROM `product` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id' )";

$c = $conn->query($sql6);
if (mysqli_num_rows($c) > 0) {

    while($row6 = mysqli_fetch_assoc($c)) {


        $productname=$row6["Product_Name"];

    
    }

  }
    $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
    $sqlcustomerpro = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
    $customerpro = $conn->query($sqlcustomerpro);
    if (mysqli_num_rows($customerpro) > 0) {
        while($row2 = mysqli_fetch_assoc($customerpro)) {
            $proID=$row2["product_ID"];
            $explain=$row2["explain"];
            $essential=$row2["essential"];
            $numbers=$row2["numbers"];
        }
    
      }
 $result = $conn->query($sql); 


$sqlcount="SELECT count(*) AS a FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id)";
$counter=mysqli_query($conn, $sqlcount);

if (mysqli_num_rows($counter) > 0) {

  while($row1 = mysqli_fetch_assoc($counter)) {
  
  
   $count=$row1["a"];
  
  }
  
  }



if($count=='3'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 3; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }
  

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
            <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
 

<li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
        if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }

          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
          
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>



            <li>
  
    
                            <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
  



}
if($count=='4'){
 
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 4; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
  <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
            </li>
            <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>

            <li>
              <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">

  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
  

}
if($count=='5'){
 


  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 5; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }
  

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
  <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
 </li>
 <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>

            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
  


}
if($count=='6'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 6; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
  <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
  <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
            <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>


            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
  
}
if($count=='7'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 7; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }
  
   
 
  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
  <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
  <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
  <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
      </li>
      <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>
 
      <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
  
}
if($count=='8'){
 
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 8; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
  <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
  <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
  <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
  <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
  <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
            </li>
            <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>
            
            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
  


}
if($count=='9'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 9; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }
 
  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>



            <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>


            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='10'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 10; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }
  
   

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
            </li>
            <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>

  




            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='11'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 11; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
           </li>


           <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>





            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='12'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 12; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }
 
  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
  
             <label for="f11"  style="float: right;"><?php echo $ArrPropertiesName[11]; ?></label>
  
             <input type="text" name="f11"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[11]; ?>">
            </li>

            <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>





            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='13'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 13; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
  
             <label for="f11"  style="float: right;"><?php echo $ArrPropertiesName[11]; ?></label>
  
             <input type="text" name="f11"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[11]; ?>">
            </li>

            <li>
            <label for="f12"  style="float: right;"><?php echo $ArrPropertiesName[12]; ?></label>
  
            <input type="text" name="f12"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[12]; ?>">
  
  
  
   </li>

   <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>





            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='14'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 14; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
  
             <label for="f11"  style="float: right;"><?php echo $ArrPropertiesName[11]; ?></label>
  
             <input type="text" name="f11"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[11]; ?>">
            </li>

            <li>
            <label for="f12"  style="float: right;"><?php echo $ArrPropertiesName[12]; ?></label>
  
            <input type="text" name="f12"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[12]; ?>">
  
  
  
  
            <label for="f13"  style="float: right;"><?php echo $ArrPropertiesName[13]; ?></label>
  
             <input type="text" name="f13"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[13]; ?>">
  
           </li>



           <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>



            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='15'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 15; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
  
             <label for="f11"  style="float: right;"><?php echo $ArrPropertiesName[11]; ?></label>
  
             <input type="text" name="f11"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[11]; ?>">
            </li>

            <li>
            <label for="f12"  style="float: right;"><?php echo $ArrPropertiesName[12]; ?></label>
  
            <input type="text" name="f12"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[12]; ?>">
  
  
  
  
            <label for="f13"  style="float: right;"><?php echo $ArrPropertiesName[13]; ?></label>
  
             <input type="text" name="f13"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[13]; ?>">
  
             <label for="f14"  style="float: right;"><?php echo $ArrPropertiesName[14]; ?></label>
  
             <input type="text" name="f14"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[14]; ?>">
            </li>


            <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>




            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='16'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 16; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
  
             <label for="f11"  style="float: right;"><?php echo $ArrPropertiesName[11]; ?></label>
  
             <input type="text" name="f11"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[11]; ?>">
            </li>

            <li>
            <label for="f12"  style="float: right;"><?php echo $ArrPropertiesName[12]; ?></label>
  
            <input type="text" name="f12"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[12]; ?>">
  
  
  
  
            <label for="f13"  style="float: right;"><?php echo $ArrPropertiesName[13]; ?></label>
  
             <input type="text" name="f13"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[13]; ?>">
  
             <label for="f14"  style="float: right;"><?php echo $ArrPropertiesName[14]; ?></label>
  
             <input type="text" name="f14"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[14]; ?>">
            </li>
            <li>
            <label for="f15"  style="float: right;"><?php echo $ArrPropertiesName[15]; ?></label>
  
            <input type="text" name="f15"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[15]; ?>">
  
  
  
               </li>



               <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>


            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='17'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 17; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }
 
  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
  
             <label for="f11"  style="float: right;"><?php echo $ArrPropertiesName[11]; ?></label>
  
             <input type="text" name="f11"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[11]; ?>">
            </li>

            <li>
            <label for="f12"  style="float: right;"><?php echo $ArrPropertiesName[12]; ?></label>
  
            <input type="text" name="f12"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[12]; ?>">
  
  
  
  
            <label for="f13"  style="float: right;"><?php echo $ArrPropertiesName[13]; ?></label>
  
             <input type="text" name="f13"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[13]; ?>">
  
             <label for="f14"  style="float: right;"><?php echo $ArrPropertiesName[14]; ?></label>
  
             <input type="text" name="f14"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[14]; ?>">
            </li>
            <li>
            <label for="f15"  style="float: right;"><?php echo $ArrPropertiesName[15]; ?></label>
  
            <input type="text" name="f15"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[15]; ?>">
  
  
  
  
            <label for="f16"  style="float: right;"><?php echo $ArrPropertiesName[16]; ?></label>
  
             <input type="text" name="f16"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[16]; ?>">
      </li>
      <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>





            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='18'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 18; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
  
             <label for="f11"  style="float: right;"><?php echo $ArrPropertiesName[11]; ?></label>
  
             <input type="text" name="f11"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[11]; ?>">
            </li>

            <li>
            <label for="f12"  style="float: right;"><?php echo $ArrPropertiesName[12]; ?></label>
  
            <input type="text" name="f12"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[12]; ?>">
  
  
  
  
            <label for="f13"  style="float: right;"><?php echo $ArrPropertiesName[13]; ?></label>
  
             <input type="text" name="f13"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[13]; ?>">
  
             <label for="f14"  style="float: right;"><?php echo $ArrPropertiesName[14]; ?></label>
  
             <input type="text" name="f14"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[14]; ?>">
            </li>
            <li>
            <label for="f15"  style="float: right;"><?php echo $ArrPropertiesName[15]; ?></label>
  
            <input type="text" name="f15"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[15]; ?>">
  
  
  
  
            <label for="f16"  style="float: right;"><?php echo $ArrPropertiesName[16]; ?></label>
  
             <input type="text" name="f16"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[16]; ?>">
  
             <label for="f17"  style="float: right;"><?php echo $ArrPropertiesName[17]; ?></label>
  
             <input type="text" name="f17"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[17]; ?>">
            </li>


            <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>



            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='19'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 19; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
  
             <label for="f11"  style="float: right;"><?php echo $ArrPropertiesName[11]; ?></label>
  
             <input type="text" name="f11"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[11]; ?>">
            </li>

            <li>
            <label for="f12"  style="float: right;"><?php echo $ArrPropertiesName[12]; ?></label>
  
            <input type="text" name="f12"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[12]; ?>">
  
  
  
  
            <label for="f13"  style="float: right;"><?php echo $ArrPropertiesName[13]; ?></label>
  
             <input type="text" name="f13"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[13]; ?>">
  
             <label for="f14"  style="float: right;"><?php echo $ArrPropertiesName[14]; ?></label>
  
             <input type="text" name="f14"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[14]; ?>">
            </li>
            <li>
            <label for="f15"  style="float: right;"><?php echo $ArrPropertiesName[15]; ?></label>
  
            <input type="text" name="f15"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[15]; ?>">
  
  
  
  
            <label for="f16"  style="float: right;"><?php echo $ArrPropertiesName[16]; ?></label>
  
             <input type="text" name="f16"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[16]; ?>">
  
             <label for="f17"  style="float: right;"><?php echo $ArrPropertiesName[17]; ?></label>
  
             <input type="text" name="f17"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[17]; ?>">
            </li>
            <li>
            <label for="f18"  style="float: right;"><?php echo $ArrPropertiesName[18]; ?></label>
  
            <input type="text" name="f18"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[18]; ?>">
        </li>


        <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>




            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='20'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 20; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }
  
  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
  
             <label for="f11"  style="float: right;"><?php echo $ArrPropertiesName[11]; ?></label>
  
             <input type="text" name="f11"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[11]; ?>">
            </li>

            <li>
            <label for="f12"  style="float: right;"><?php echo $ArrPropertiesName[12]; ?></label>
  
            <input type="text" name="f12"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[12]; ?>">
  
  
  
  
            <label for="f13"  style="float: right;"><?php echo $ArrPropertiesName[13]; ?></label>
  
             <input type="text" name="f13"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[13]; ?>">
  
             <label for="f14"  style="float: right;"><?php echo $ArrPropertiesName[14]; ?></label>
  
             <input type="text" name="f14"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[14]; ?>">
            </li>
            <li>
            <label for="f15"  style="float: right;"><?php echo $ArrPropertiesName[15]; ?></label>
  
            <input type="text" name="f15"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[15]; ?>">
  
  
  
  
            <label for="f16"  style="float: right;"><?php echo $ArrPropertiesName[16]; ?></label>
  
             <input type="text" name="f16"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[16]; ?>">
  
             <label for="f17"  style="float: right;"><?php echo $ArrPropertiesName[17]; ?></label>
  
             <input type="text" name="f17"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[17]; ?>">
            </li>
            <li>
            <label for="f18"  style="float: right;"><?php echo $ArrPropertiesName[18]; ?></label>
  
            <input type="text" name="f18"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[18]; ?>">
  
  
  
  
            <label for="f19"  style="float: right;"><?php echo $ArrPropertiesName[19]; ?></label>
  
             <input type="text" name="f19"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[19]; ?>">
           </li>

           <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>



            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='21'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 21; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
  
             <label for="f11"  style="float: right;"><?php echo $ArrPropertiesName[11]; ?></label>
  
             <input type="text" name="f11"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[11]; ?>">
            </li>

            <li>
            <label for="f12"  style="float: right;"><?php echo $ArrPropertiesName[12]; ?></label>
  
            <input type="text" name="f12"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[12]; ?>">
  
  
  
  
            <label for="f13"  style="float: right;"><?php echo $ArrPropertiesName[13]; ?></label>
  
             <input type="text" name="f13"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[13]; ?>">
  
             <label for="f14"  style="float: right;"><?php echo $ArrPropertiesName[14]; ?></label>
  
             <input type="text" name="f14"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[14]; ?>">
            </li>
            <li>
            <label for="f15"  style="float: right;"><?php echo $ArrPropertiesName[15]; ?></label>
  
            <input type="text" name="f15"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[15]; ?>">
  
  
  
  
            <label for="f16"  style="float: right;"><?php echo $ArrPropertiesName[16]; ?></label>
  
             <input type="text" name="f16"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[16]; ?>">
  
             <label for="f17"  style="float: right;"><?php echo $ArrPropertiesName[17]; ?></label>
  
             <input type="text" name="f17"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[17]; ?>">
            </li>
            <li>
            <label for="f18"  style="float: right;"><?php echo $ArrPropertiesName[18]; ?></label>
  
            <input type="text" name="f18"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[18]; ?>">
  
  
  
  
            <label for="f19"  style="float: right;"><?php echo $ArrPropertiesName[19]; ?></label>
  
             <input type="text" name="f19"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[19]; ?>">
  
             <label for="f20"  style="float: right;"><?php echo $ArrPropertiesName[20]; ?></label>
  
             <input type="text" name="f20"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[20]; ?>">
            </li>
 

            <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>


            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='22'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 22; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
  
             <label for="f11"  style="float: right;"><?php echo $ArrPropertiesName[11]; ?></label>
  
             <input type="text" name="f11"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[11]; ?>">
            </li>

            <li>
            <label for="f12"  style="float: right;"><?php echo $ArrPropertiesName[12]; ?></label>
  
            <input type="text" name="f12"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[12]; ?>">
  
  
  
  
            <label for="f13"  style="float: right;"><?php echo $ArrPropertiesName[13]; ?></label>
  
             <input type="text" name="f13"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[13]; ?>">
  
             <label for="f14"  style="float: right;"><?php echo $ArrPropertiesName[14]; ?></label>
  
             <input type="text" name="f14"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[14]; ?>">
            </li>
            <li>
            <label for="f15"  style="float: right;"><?php echo $ArrPropertiesName[15]; ?></label>
  
            <input type="text" name="f15"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[15]; ?>">
  
  
  
  
            <label for="f16"  style="float: right;"><?php echo $ArrPropertiesName[16]; ?></label>
  
             <input type="text" name="f16"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[16]; ?>">
  
             <label for="f17"  style="float: right;"><?php echo $ArrPropertiesName[17]; ?></label>
  
             <input type="text" name="f17"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[17]; ?>">
            </li>
            <li>
            <label for="f18"  style="float: right;"><?php echo $ArrPropertiesName[18]; ?></label>
  
            <input type="text" name="f18"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[18]; ?>">
  
  
  
  
            <label for="f19"  style="float: right;"><?php echo $ArrPropertiesName[19]; ?></label>
  
             <input type="text" name="f19"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[19]; ?>">
  
             <label for="f20"  style="float: right;"><?php echo $ArrPropertiesName[20]; ?></label>
  
             <input type="text" name="f20"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[20]; ?>">
            </li>
            <li>
            <label for="f21"  style="float: right;"><?php echo $ArrPropertiesName[21]; ?></label>
  
            <input type="text" name="f21"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[21]; ?>">
  
           </li>
   

           <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>




            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='23'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 23; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
  
             <label for="f11"  style="float: right;"><?php echo $ArrPropertiesName[11]; ?></label>
  
             <input type="text" name="f11"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[11]; ?>">
            </li>

            <li>
            <label for="f12"  style="float: right;"><?php echo $ArrPropertiesName[12]; ?></label>
  
            <input type="text" name="f12"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[12]; ?>">
  
  
  
  
            <label for="f13"  style="float: right;"><?php echo $ArrPropertiesName[13]; ?></label>
  
             <input type="text" name="f13"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[13]; ?>">
  
             <label for="f14"  style="float: right;"><?php echo $ArrPropertiesName[14]; ?></label>
  
             <input type="text" name="f14"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[14]; ?>">
            </li>
            <li>
            <label for="f15"  style="float: right;"><?php echo $ArrPropertiesName[15]; ?></label>
  
            <input type="text" name="f15"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[15]; ?>">
  
  
  
  
            <label for="f16"  style="float: right;"><?php echo $ArrPropertiesName[16]; ?></label>
  
             <input type="text" name="f16"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[16]; ?>">
  
             <label for="f17"  style="float: right;"><?php echo $ArrPropertiesName[17]; ?></label>
  
             <input type="text" name="f17"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[17]; ?>">
            </li>
            <li>
            <label for="f18"  style="float: right;"><?php echo $ArrPropertiesName[18]; ?></label>
  
            <input type="text" name="f18"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[18]; ?>">
  
  
  
  
            <label for="f19"  style="float: right;"><?php echo $ArrPropertiesName[19]; ?></label>
  
             <input type="text" name="f19"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[19]; ?>">
  
             <label for="f20"  style="float: right;"><?php echo $ArrPropertiesName[20]; ?></label>
  
             <input type="text" name="f20"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[20]; ?>">
            </li>
            <li>
            <label for="f21"  style="float: right;"><?php echo $ArrPropertiesName[21]; ?></label>
  
            <input type="text" name="f21"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[21]; ?>">
  
  
  
  
            <label for="f22"  style="float: right;"><?php echo $ArrPropertiesName[22]; ?></label>
  
             <input type="text" name="f22"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[22]; ?>">
  
           </li>
           <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>






            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='24'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 24; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
  
             <label for="f11"  style="float: right;"><?php echo $ArrPropertiesName[11]; ?></label>
  
             <input type="text" name="f11"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[11]; ?>">
            </li>

            <li>
            <label for="f12"  style="float: right;"><?php echo $ArrPropertiesName[12]; ?></label>
  
            <input type="text" name="f12"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[12]; ?>">
  
  
  
  
            <label for="f13"  style="float: right;"><?php echo $ArrPropertiesName[13]; ?></label>
  
             <input type="text" name="f13"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[13]; ?>">
  
             <label for="f14"  style="float: right;"><?php echo $ArrPropertiesName[14]; ?></label>
  
             <input type="text" name="f14"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[14]; ?>">
            </li>
            <li>
            <label for="f15"  style="float: right;"><?php echo $ArrPropertiesName[15]; ?></label>
  
            <input type="text" name="f15"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[15]; ?>">
  
  
  
  
            <label for="f16"  style="float: right;"><?php echo $ArrPropertiesName[16]; ?></label>
  
             <input type="text" name="f16"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[16]; ?>">
  
             <label for="f17"  style="float: right;"><?php echo $ArrPropertiesName[17]; ?></label>
  
             <input type="text" name="f17"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[17]; ?>">
            </li>
            <li>
            <label for="f18"  style="float: right;"><?php echo $ArrPropertiesName[18]; ?></label>
  
            <input type="text" name="f18"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[18]; ?>">
  
  
  
  
            <label for="f19"  style="float: right;"><?php echo $ArrPropertiesName[19]; ?></label>
  
             <input type="text" name="f19"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[19]; ?>">
  
             <label for="f20"  style="float: right;"><?php echo $ArrPropertiesName[20]; ?></label>
  
             <input type="text" name="f20"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[20]; ?>">
            </li>
            <li>
            <label for="f21"  style="float: right;"><?php echo $ArrPropertiesName[21]; ?></label>
  
            <input type="text" name="f21"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[21]; ?>">
  
  
  
  
            <label for="f22"  style="float: right;"><?php echo $ArrPropertiesName[22]; ?></label>
  
             <input type="text" name="f22"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[22]; ?>">
  
             <label for="f23"  style="float: right;"><?php echo $ArrPropertiesName[23]; ?></label>
  
             <input type="text" name="f23"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[23]; ?>">
            </li>

            <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>





            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='25'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 25; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
  
             <label for="f11"  style="float: right;"><?php echo $ArrPropertiesName[11]; ?></label>
  
             <input type="text" name="f11"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[11]; ?>">
            </li>

            <li>
            <label for="f12"  style="float: right;"><?php echo $ArrPropertiesName[12]; ?></label>
  
            <input type="text" name="f12"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[12]; ?>">
  
  
  
  
            <label for="f13"  style="float: right;"><?php echo $ArrPropertiesName[13]; ?></label>
  
             <input type="text" name="f13"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[13]; ?>">
  
             <label for="f14"  style="float: right;"><?php echo $ArrPropertiesName[14]; ?></label>
  
             <input type="text" name="f14"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[14]; ?>">
            </li>
            <li>
            <label for="f15"  style="float: right;"><?php echo $ArrPropertiesName[15]; ?></label>
  
            <input type="text" name="f15"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[15]; ?>">
  
  
  
  
            <label for="f16"  style="float: right;"><?php echo $ArrPropertiesName[16]; ?></label>
  
             <input type="text" name="f16"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[16]; ?>">
  
             <label for="f17"  style="float: right;"><?php echo $ArrPropertiesName[17]; ?></label>
  
             <input type="text" name="f17"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[17]; ?>">
            </li>
            <li>
            <label for="f18"  style="float: right;"><?php echo $ArrPropertiesName[18]; ?></label>
  
            <input type="text" name="f18"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[18]; ?>">
  
  
  
  
            <label for="f19"  style="float: right;"><?php echo $ArrPropertiesName[19]; ?></label>
  
             <input type="text" name="f19"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[19]; ?>">
  
             <label for="f20"  style="float: right;"><?php echo $ArrPropertiesName[20]; ?></label>
  
             <input type="text" name="f20"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[20]; ?>">
            </li>
            <li>
            <label for="f21"  style="float: right;"><?php echo $ArrPropertiesName[21]; ?></label>
  
            <input type="text" name="f21"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[21]; ?>">
  
  
  
  
            <label for="f22"  style="float: right;"><?php echo $ArrPropertiesName[22]; ?></label>
  
             <input type="text" name="f22"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[22]; ?>">
  
             <label for="f23"  style="float: right;"><?php echo $ArrPropertiesName[23]; ?></label>
  
             <input type="text" name="f23"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[23]; ?>">
            </li>
            <li>
            <label for="f24"  style="float: right;"><?php echo $ArrPropertiesName[24]; ?></label>
  
            <input type="text" name="f24"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[24]; ?>">
  
  
  
            </li>
            <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>






            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='26'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 26; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
  
             <label for="f11"  style="float: right;"><?php echo $ArrPropertiesName[11]; ?></label>
  
             <input type="text" name="f11"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[11]; ?>">
            </li>

            <li>
            <label for="f12"  style="float: right;"><?php echo $ArrPropertiesName[12]; ?></label>
  
            <input type="text" name="f12"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[12]; ?>">
  
  
  
  
            <label for="f13"  style="float: right;"><?php echo $ArrPropertiesName[13]; ?></label>
  
             <input type="text" name="f13"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[13]; ?>">
  
             <label for="f14"  style="float: right;"><?php echo $ArrPropertiesName[14]; ?></label>
  
             <input type="text" name="f14"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[14]; ?>">
            </li>
            <li>
            <label for="f15"  style="float: right;"><?php echo $ArrPropertiesName[15]; ?></label>
  
            <input type="text" name="f15"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[15]; ?>">
  
  
  
  
            <label for="f16"  style="float: right;"><?php echo $ArrPropertiesName[16]; ?></label>
  
             <input type="text" name="f16"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[16]; ?>">
  
             <label for="f17"  style="float: right;"><?php echo $ArrPropertiesName[17]; ?></label>
  
             <input type="text" name="f17"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[17]; ?>">
            </li>
            <li>
            <label for="f18"  style="float: right;"><?php echo $ArrPropertiesName[18]; ?></label>
  
            <input type="text" name="f18"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[18]; ?>">
  
  
  
  
            <label for="f19"  style="float: right;"><?php echo $ArrPropertiesName[19]; ?></label>
  
             <input type="text" name="f19"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[19]; ?>">
  
             <label for="f20"  style="float: right;"><?php echo $ArrPropertiesName[20]; ?></label>
  
             <input type="text" name="f20"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[20]; ?>">
            </li>
            <li>
            <label for="f21"  style="float: right;"><?php echo $ArrPropertiesName[21]; ?></label>
  
            <input type="text" name="f21"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[21]; ?>">
  
  
  
  
            <label for="f22"  style="float: right;"><?php echo $ArrPropertiesName[22]; ?></label>
  
             <input type="text" name="f22"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[22]; ?>">
  
             <label for="f23"  style="float: right;"><?php echo $ArrPropertiesName[23]; ?></label>
  
             <input type="text" name="f23"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[23]; ?>">
            </li>
            <li>
            <label for="f24"  style="float: right;"><?php echo $ArrPropertiesName[24]; ?></label>
  
            <input type="text" name="f24"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[24]; ?>">
  
  
  
  
            <label for="f25"  style="float: right;"><?php echo $ArrPropertiesName[25]; ?></label>
  
             <input type="text" name="f25"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[25]; ?>">
  
          </li>
          

          <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>



            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='27'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 27; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
  
             <label for="f11"  style="float: right;"><?php echo $ArrPropertiesName[11]; ?></label>
  
             <input type="text" name="f11"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[11]; ?>">
            </li>

            <li>
            <label for="f12"  style="float: right;"><?php echo $ArrPropertiesName[12]; ?></label>
  
            <input type="text" name="f12"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[12]; ?>">
  
  
  
  
            <label for="f13"  style="float: right;"><?php echo $ArrPropertiesName[13]; ?></label>
  
             <input type="text" name="f13"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[13]; ?>">
  
             <label for="f14"  style="float: right;"><?php echo $ArrPropertiesName[14]; ?></label>
  
             <input type="text" name="f14"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[14]; ?>">
            </li>
            <li>
            <label for="f15"  style="float: right;"><?php echo $ArrPropertiesName[15]; ?></label>
  
            <input type="text" name="f15"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[15]; ?>">
  
  
  
  
            <label for="f16"  style="float: right;"><?php echo $ArrPropertiesName[16]; ?></label>
  
             <input type="text" name="f16"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[16]; ?>">
  
             <label for="f17"  style="float: right;"><?php echo $ArrPropertiesName[17]; ?></label>
  
             <input type="text" name="f17"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[17]; ?>">
            </li>
            <li>
            <label for="f18"  style="float: right;"><?php echo $ArrPropertiesName[18]; ?></label>
  
            <input type="text" name="f18"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[18]; ?>">
  
  
  
  
            <label for="f19"  style="float: right;"><?php echo $ArrPropertiesName[19]; ?></label>
  
             <input type="text" name="f19"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[19]; ?>">
  
             <label for="f20"  style="float: right;"><?php echo $ArrPropertiesName[20]; ?></label>
  
             <input type="text" name="f20"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[20]; ?>">
            </li>
            <li>
            <label for="f21"  style="float: right;"><?php echo $ArrPropertiesName[21]; ?></label>
  
            <input type="text" name="f21"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[21]; ?>">
  
  
  
  
            <label for="f22"  style="float: right;"><?php echo $ArrPropertiesName[22]; ?></label>
  
             <input type="text" name="f22"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[22]; ?>">
  
             <label for="f23"  style="float: right;"><?php echo $ArrPropertiesName[23]; ?></label>
  
             <input type="text" name="f23"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[23]; ?>">
            </li>
            <li>
            <label for="f24"  style="float: right;"><?php echo $ArrPropertiesName[24]; ?></label>
  
            <input type="text" name="f24"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[24]; ?>">
  
  
  
  
            <label for="f25"  style="float: right;"><?php echo $ArrPropertiesName[25]; ?></label>
  
             <input type="text" name="f25"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[25]; ?>">
  
             <label for="f26"  style="float: right;"><?php echo $ArrPropertiesName[26]; ?></label>
  
             <input type="text" name="f26"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[26]; ?>">
            </li>



            <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>



            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='28'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 28; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
  
             <label for="f11"  style="float: right;"><?php echo $ArrPropertiesName[11]; ?></label>
  
             <input type="text" name="f11"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[11]; ?>">
            </li>

            <li>
            <label for="f12"  style="float: right;"><?php echo $ArrPropertiesName[12]; ?></label>
  
            <input type="text" name="f12"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[12]; ?>">
  
  
  
  
            <label for="f13"  style="float: right;"><?php echo $ArrPropertiesName[13]; ?></label>
  
             <input type="text" name="f13"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[13]; ?>">
  
             <label for="f14"  style="float: right;"><?php echo $ArrPropertiesName[14]; ?></label>
  
             <input type="text" name="f14"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[14]; ?>">
            </li>
            <li>
            <label for="f15"  style="float: right;"><?php echo $ArrPropertiesName[15]; ?></label>
  
            <input type="text" name="f15"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[15]; ?>">
  
  
  
  
            <label for="f16"  style="float: right;"><?php echo $ArrPropertiesName[16]; ?></label>
  
             <input type="text" name="f16"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[16]; ?>">
  
             <label for="f17"  style="float: right;"><?php echo $ArrPropertiesName[17]; ?></label>
  
             <input type="text" name="f17"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[17]; ?>">
            </li>
            <li>
            <label for="f18"  style="float: right;"><?php echo $ArrPropertiesName[18]; ?></label>
  
            <input type="text" name="f18"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[18]; ?>">
  
  
  
  
            <label for="f19"  style="float: right;"><?php echo $ArrPropertiesName[19]; ?></label>
  
             <input type="text" name="f19"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[19]; ?>">
  
             <label for="f20"  style="float: right;"><?php echo $ArrPropertiesName[20]; ?></label>
  
             <input type="text" name="f20"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[20]; ?>">
            </li>
            <li>
            <label for="f21"  style="float: right;"><?php echo $ArrPropertiesName[21]; ?></label>
  
            <input type="text" name="f21"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[21]; ?>">
  
  
  
  
            <label for="f22"  style="float: right;"><?php echo $ArrPropertiesName[22]; ?></label>
  
             <input type="text" name="f22"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[22]; ?>">
  
             <label for="f23"  style="float: right;"><?php echo $ArrPropertiesName[23]; ?></label>
  
             <input type="text" name="f23"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[23]; ?>">
            </li>
            <li>
            <label for="f24"  style="float: right;"><?php echo $ArrPropertiesName[24]; ?></label>
  
            <input type="text" name="f24"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[24]; ?>">
  
  
  
  
            <label for="f25"  style="float: right;"><?php echo $ArrPropertiesName[25]; ?></label>
  
             <input type="text" name="f25"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[25]; ?>">
  
             <label for="f26"  style="float: right;"><?php echo $ArrPropertiesName[26]; ?></label>
  
             <input type="text" name="f26"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[26]; ?>">
            </li>
            <li>
            <label for="f27"  style="float: right;"><?php echo $ArrPropertiesName[27]; ?></label>
  
            <input type="text" name="f27"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[27]; ?>">
  
  
  
  
 </li>




 <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>

            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='29'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 29; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }
  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
  
             <label for="f11"  style="float: right;"><?php echo $ArrPropertiesName[11]; ?></label>
  
             <input type="text" name="f11"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[11]; ?>">
            </li>

            <li>
            <label for="f12"  style="float: right;"><?php echo $ArrPropertiesName[12]; ?></label>
  
            <input type="text" name="f12"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[12]; ?>">
  
  
  
  
            <label for="f13"  style="float: right;"><?php echo $ArrPropertiesName[13]; ?></label>
  
             <input type="text" name="f13"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[13]; ?>">
  
             <label for="f14"  style="float: right;"><?php echo $ArrPropertiesName[14]; ?></label>
  
             <input type="text" name="f14"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[14]; ?>">
            </li>
            <li>
            <label for="f15"  style="float: right;"><?php echo $ArrPropertiesName[15]; ?></label>
  
            <input type="text" name="f15"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[15]; ?>">
  
  
  
  
            <label for="f16"  style="float: right;"><?php echo $ArrPropertiesName[16]; ?></label>
  
             <input type="text" name="f16"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[16]; ?>">
  
             <label for="f17"  style="float: right;"><?php echo $ArrPropertiesName[17]; ?></label>
  
             <input type="text" name="f17"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[17]; ?>">
            </li>
            <li>
            <label for="f18"  style="float: right;"><?php echo $ArrPropertiesName[18]; ?></label>
  
            <input type="text" name="f18"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[18]; ?>">
  
  
  
  
            <label for="f19"  style="float: right;"><?php echo $ArrPropertiesName[19]; ?></label>
  
             <input type="text" name="f19"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[19]; ?>">
  
             <label for="f20"  style="float: right;"><?php echo $ArrPropertiesName[20]; ?></label>
  
             <input type="text" name="f20"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[20]; ?>">
            </li>
            <li>
            <label for="f21"  style="float: right;"><?php echo $ArrPropertiesName[21]; ?></label>
  
            <input type="text" name="f21"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[21]; ?>">
  
  
  
  
            <label for="f22"  style="float: right;"><?php echo $ArrPropertiesName[22]; ?></label>
  
             <input type="text" name="f22"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[22]; ?>">
  
             <label for="f23"  style="float: right;"><?php echo $ArrPropertiesName[23]; ?></label>
  
             <input type="text" name="f23"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[23]; ?>">
            </li>
            <li>
            <label for="f24"  style="float: right;"><?php echo $ArrPropertiesName[24]; ?></label>
  
            <input type="text" name="f24"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[24]; ?>">
  
  
  
  
            <label for="f25"  style="float: right;"><?php echo $ArrPropertiesName[25]; ?></label>
  
             <input type="text" name="f25"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[25]; ?>">
  
             <label for="f26"  style="float: right;"><?php echo $ArrPropertiesName[26]; ?></label>
  
             <input type="text" name="f26"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[26]; ?>">
            </li>
            <li>
            <label for="f27"  style="float: right;"><?php echo $ArrPropertiesName[27]; ?></label>
  
            <input type="text" name="f27"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[27]; ?>">
  
  
  
  
            <label for="f28"  style="float: right;"><?php echo $ArrPropertiesName[28]; ?></label>
  
             <input type="text" name="f28"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[28]; ?>">
 </li>

 <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>




            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
}
if($count=='30'){
  $sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
  $ArrPropertiesName=array();
  $ArrPropertiesValue=array();
  $ArrPropertiesID=array();
  $rssql1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($rssql1) > 0) {
      for ($x = 0; $x <= 30; $x++) {
          while($row = mysqli_fetch_assoc($rssql1)) {        
            $a=$row["Properties_ID"];
            $ArrPropertiesID[]=$row["Properties_ID"];
            $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
            $rsdel = mysqli_query($conn, $sqlname);
            if ($rsdel->num_rows > 0) {
                                        
              while($row2 = $rsdel->fetch_assoc()) {
              $ArrPropertiesName[]=$row2["Title"];
                  
  
              }
          
            }
        }
      }
  
  }
  
  
  //USERID

    $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
    $rs3=mysqli_query($conn, $sql3);
    if ($rs3->num_rows > 0) {
   
       while($row3 = $rs3->fetch_assoc()) {
   
   
          $ArrPropertiesValue[]=$row3["valuep"];
    
       }
   
     }

  if (isset($_GET['id'])) {
  
      $user_id = $_GET['id']; 
  
      $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $sqlcustomerpro = "SELECT Product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
      $customerpro = $conn->query($sqlcustomerpro);
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {  
  
      ?>
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css"> 
          
  
          <form action="productupdate.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="style="float: right;" >
  
            <fieldset>
  
                                    <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
       
  <ul>            
  <li>
              <label for="f0"  style="float: right;"><?php echo $ArrPropertiesName[0]; ?></label>
              
              <input type="text" name="f0"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[0]; ?>">
            
             
              <label for="f1"  style="float: right;"> <?php echo $ArrPropertiesName[1]; ?></label>
           
              <input type="text" name="f1" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[1]; ?>">
  
          
            
              <label for="f2"  style="float: right;">  <?php echo $ArrPropertiesName[2]; ?></label>
              
              <input type="text" name="f2" class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[2]; ?>">
  
             </li>
  <li>
              
              <label for="f3"  style="float: right;"><?php echo $ArrPropertiesName[3]; ?></label>
            
              <input type="text" name="f3"class="field-style field-split align-right " style="direction:rtl;"  value="<?php echo $ArrPropertiesValue[3]; ?>">
  
  
             
              <label for="f4"  style="float: right;"> <?php echo $ArrPropertiesName[4]; ?></label>
              <input type="text" name="f4" class="field-style field-split align-right " style="direction:rtl;"value="<?php echo $ArrPropertiesValue[4]; ?>">
          
              
              <label for="f5"  style="float: right;"><?php echo $ArrPropertiesName[5]; ?></label>
         
            <input type="text" name="f5"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[5]; ?>">
            </li>
  
  <li>
            <label for="f6"  style="float: right;"><?php echo $ArrPropertiesName[6]; ?></label>
  
            <input type="text" name="f6"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[6]; ?>">
  
  
  
  
            <label for="f7"  style="float: right;"><?php echo $ArrPropertiesName[7]; ?></label>
  
             <input type="text" name="f7"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[7]; ?>">
  
             <label for="f8"  style="float: right;"><?php echo $ArrPropertiesName[8]; ?></label>
  
             <input type="text" name="f8"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[8]; ?>">
            </li>
            <li>
            <label for="f9"  style="float: right;"><?php echo $ArrPropertiesName[9]; ?></label>
  
            <input type="text" name="f9"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[9]; ?>">
  
  
  
  
            <label for="f10"  style="float: right;"><?php echo $ArrPropertiesName[10]; ?></label>
  
             <input type="text" name="f10"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[10]; ?>">
  
             <label for="f11"  style="float: right;"><?php echo $ArrPropertiesName[11]; ?></label>
  
             <input type="text" name="f11"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[11]; ?>">
            </li>

            <li>
            <label for="f12"  style="float: right;"><?php echo $ArrPropertiesName[12]; ?></label>
  
            <input type="text" name="f12"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[12]; ?>">
  
  
  
  
            <label for="f13"  style="float: right;"><?php echo $ArrPropertiesName[13]; ?></label>
  
             <input type="text" name="f13"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[13]; ?>">
  
             <label for="f14"  style="float: right;"><?php echo $ArrPropertiesName[14]; ?></label>
  
             <input type="text" name="f14"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[14]; ?>">
            </li>
            <li>
            <label for="f15"  style="float: right;"><?php echo $ArrPropertiesName[15]; ?></label>
  
            <input type="text" name="f15"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[15]; ?>">
  
  
  
  
            <label for="f16"  style="float: right;"><?php echo $ArrPropertiesName[16]; ?></label>
  
             <input type="text" name="f16"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[16]; ?>">
  
             <label for="f17"  style="float: right;"><?php echo $ArrPropertiesName[17]; ?></label>
  
             <input type="text" name="f17"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[17]; ?>">
            </li>
            <li>
            <label for="f18"  style="float: right;"><?php echo $ArrPropertiesName[18]; ?></label>
  
            <input type="text" name="f18"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[18]; ?>">
  
  
  
  
            <label for="f19"  style="float: right;"><?php echo $ArrPropertiesName[19]; ?></label>
  
             <input type="text" name="f19"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[19]; ?>">
  
             <label for="f20"  style="float: right;"><?php echo $ArrPropertiesName[20]; ?></label>
  
             <input type="text" name="f20"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[20]; ?>">
            </li>
            <li>
            <label for="f21"  style="float: right;"><?php echo $ArrPropertiesName[21]; ?></label>
  
            <input type="text" name="f21"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[21]; ?>">
  
  
  
  
            <label for="f22"  style="float: right;"><?php echo $ArrPropertiesName[22]; ?></label>
  
             <input type="text" name="f22"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[22]; ?>">
  
             <label for="f23"  style="float: right;"><?php echo $ArrPropertiesName[23]; ?></label>
  
             <input type="text" name="f23"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[23]; ?>">
            </li>
            <li>
            <label for="f24"  style="float: right;"><?php echo $ArrPropertiesName[24]; ?></label>
  
            <input type="text" name="f24"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[24]; ?>">
  
  
  
  
            <label for="f25"  style="float: right;"><?php echo $ArrPropertiesName[25]; ?></label>
  
             <input type="text" name="f25"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[25]; ?>">
  
             <label for="f26"  style="float: right;"><?php echo $ArrPropertiesName[26]; ?></label>
  
             <input type="text" name="f26"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[26]; ?>">
            </li>
            <li>
            <label for="f27"  style="float: right;"><?php echo $ArrPropertiesName[27]; ?></label>
  
            <input type="text" name="f27"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[27]; ?>">
  
  
  
  
            <label for="f28"  style="float: right;"><?php echo $ArrPropertiesName[28]; ?></label>
  
             <input type="text" name="f28"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[28]; ?>">
  
             <label for="f29"  style="float: right;"><?php echo $ArrPropertiesName[29]; ?></label>
  
             <input type="text" name="f29"class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $ArrPropertiesValue[29]; ?>">
            </li>


            <li>
<label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;" value="<?php echo $numbers ?>"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
          <option value=""dir="rtl">انتخاب اولویت</option>
          <?php
          if($essential=='1'){
            ?>
         <option selected value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
          <?php
          if($essential=='2'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option selected value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
            <?php
          }


?>
           <?php
          if($essential=='3'){
            ?>
         <option  value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option selected value="3"dir="rtl">اولویت سوم</option>
            <?php
          }
      
          if($essential=='0'){
              ?>
           <option  value="1"dir="rtl">اولویت اول</option>
           <option value="2"dir="rtl">اولویت دوم</option>
           <option value="3"dir="rtl">اولویت سوم</option>
              <?php
            }
?>    
 </select>
     <label for="field42"style="float: right;dir=rtl">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;"value="<?php echo $explain; ?>" />
</li>



            <li>
  
    
                                          <input type="submit" value="بازگشت" name="back" style="margin-left:10px;font-size:17px;">  
    
              <input type="submit" value="ذخیره" name="update" style="margin-right:10px;font-size:17px;">
  </li>
            </fieldset>
            </ul>
          </form> 
  
          </body>
  
          </html> 
  
      <?php
  
      } 
  
  }
  
}






























$sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
$ArrPropertiesName=array();
$ArrPropertiesValue=array();
$ArrPropertiesID=array();
$rssql1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($rssql1) > 0) {
    for ($x = 0; $x <= 8; $x++) {
        while($row = mysqli_fetch_assoc($rssql1)) {        
          $a=$row["Properties_ID"];
          $ArrPropertiesID[]=$row["Properties_ID"];
          $sqlname="SELECT Title FROM properties WHERE Properties_ID=$a";
          $rsdel = mysqli_query($conn, $sqlname);
          if ($rsdel->num_rows > 0) {
                                      
            while($row2 = $rsdel->fetch_assoc()) {
            $ArrPropertiesName[]=$row2["Title"];
                

            }
        
          }
      }
    }

}


//USERID

  $sql3="SELECT valuep FROM `value of user product` WHERE User_ID=$loginuser_id AND Product_ID='$proID'";
  $rs3=mysqli_query($conn, $sql3);
  if ($rs3->num_rows > 0) {
 
     while($row3 = $rs3->fetch_assoc()) {
 
 
        $ArrPropertiesValue[]=$row3["valuep"];
  
     }
 
   }

 







?> 
