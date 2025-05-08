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
    <link rel="stylesheet" href="./css/bedroom.css">
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/navigationbar.css">
    <link rel="stylesheet"
          href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>محصولات من</title>
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
        
        }
    
      }
          $result = $conn->query($sql); 
$sqlcount="SELECT count(*) FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id)";
$count=mysqli_query($conn, $sqlcount);

$sql1="SELECT Properties_ID FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id )";
$ArrPropertiesName=array();
$ArrPropertiesValue=array();
$ArrPropertiesID=array();
$rssql1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($rssql1) > 0) {

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
          if ($result->num_rows > 0) {  ?>
            <link rel="stylesheet" href="../css/bedroom.css">
            <link rel="stylesheet" href="../css/font.css"> 
           

          
                  <form action="view.php" method="post" class="form-style-9" style="style="float: right;" >
          
                    <fieldset>
          
                      <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
          <ul>            
          <li>

          
<?php
$i=0;

while ($i<count($ArrPropertiesName)) {
print_r("<h4><center>".$ArrPropertiesValue[$i]);
 echo "      :  "; 
 print_r ($ArrPropertiesName[$i]."</center></p>");

    ++$i;
  

  }







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
      echo "<h4><center>".'تعداد مورد نیاز';
      echo "      :  "; 
      print_r ($numbers."</center></p>");
      echo "<h4><center>".'اولویت';
      echo "      :  "; 
      print_r ($essential."</center></p>");
      echo "<h4><center>".$explain;
      echo "      :  "; 
      print_r ('توضیحات'."</center></p>");
               
?>  
        
</li>              

                    <li style="margin-left:30px;">
          
            
                      <input type="submit" value="بازگشت" name="بازگشت" style="font-family: 'Bnazanin'; font-size:17px;">
         
                    </li>
                    </fieldset>
                    </ul>
                  </form> 
          
                  </body>
          
                  </html> 
          
              <?php
          
              } 
          
          }
          
          ?> 

