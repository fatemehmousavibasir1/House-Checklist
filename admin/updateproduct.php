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
$productid = $_GET['id']; 

    $sql = "SELECT * FROM `product` WHERE `Product_ID`='$productid'";

    $sqlproduct = $conn->query($sql);
    if (mysqli_num_rows($sqlproduct ) > 0) {

        while($row = mysqli_fetch_assoc($sqlproduct)) {
    
    
        
        
            $proID=$row["Product_ID"];
            $proName=$row["Product_Name"];
            ?>


<body>
    <li style="padding-top:40px" ></li>

<form class="form-style-9"action="editproductsubmit.php" method="post" >
  <ul>
   <li>
      <label for="name" style="float: right; font-family:'Bnazanin';">نام محصول  </label> <input type="text" name="name" id="name" style="text-align:right;font-family:'Bnazanin'; font-size:17px;"class="field-style field-split align-right " value="<?php echo $proName; ?>"  />
      <input type="hidden" name="proID" value="<?php echo  $proID; ?>">
      
   </li>

   <li  style="margin-left:30px;">
                <input type="submit" value="بازگشت" name="back" style="font-family: 'Bnazanin'; font-size:17px; ">
   
            <input type="submit" value="ذخیره" name="update" style="font-family: 'Bnazanin'; font-size:17px; ">

          </li>
                                            </ul>
</form>


<div style=" width:100px;padding-top:30px;padding-left:140px;">

<table class="styled-table"style="width:700px;float:center;">

<thead>

    <tr >

    <th style="padding-left:0px;padding-right:620px;" >عملیات</th>

   <th style="padding-left:0px;padding-right:80px;" >نام ویژگی</th>

</tr>

</thead>

<tbody> 
















<?php
            $sqlproperties = "SELECT * FROM `name` WHERE `Product_ID`='$proID'";
            $sqlproper = $conn->query($sqlproperties);

            if (mysqli_num_rows($sqlproper ) > 0) {

                while($row1 = mysqli_fetch_assoc($sqlproper)) {
                    $propertiesID=$row1["Properties_ID"];
                    $sqlpropertiesName = "SELECT * FROM `properties` WHERE `properties_ID`='$propertiesID'";
                    $sqlproperName = $conn->query($sqlpropertiesName);
                    if (mysqli_num_rows($sqlproperName ) > 0) {

                     while($row2 = mysqli_fetch_assoc($sqlproperName)) {
                        $propertiesIDA=$row2["properties_ID"];
                        $propertiesName=$row2["Title"];
?>
          <tr> 
            
          <td style="padding-left:100px;"><a class="btn btn-danger" href="deleteproperties.php?id=<?php echo $propertiesID; ?>"><img  src="../photo/delete1.png"style="width:4% "></a>&nbsp;<a class="btn btn-info" href="updatepropertiesname.php?id=<?php echo $propertiesID; ?>"><img  src="../photo/edit.png"style="width:4% "></a></td>

               <td style="padding-right:60px; font-weight:700;text-align:center; font-size:20px;"><?php echo $propertiesName  ?></td>
                     </tr>
     
<?php

                    
                }
            }
        }
    }






        
        }
    
      }
      ?>

</tr>        

</tbody>

</table>

    </div> 

</body>

</html>


<?php
?>