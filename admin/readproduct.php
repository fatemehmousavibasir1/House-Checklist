<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../viewprofile.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../viewnavigation.css">
    <link rel="stylesheet" href="./buttom.css">



    <title>محصول </title>
  
</head> 

<style>
      .inputs
{
      -moz-box-shadow: inset 0px 1px 0px 0px #3985B1;
      -webkit-box-shadow: inset 0px 1px 0px 0px #3985B1;
      box-shadow: inset 0px 1px 0px 0px #3985B1;
      background-color: #216288;
      display: inline-block;
      cursor: pointer;
      color: #FFFFFF;
      padding: 8px 18px;
      text-decoration: none;
      font: 12x 'Bnazanin';
      
  }
  .inputs{
      background: linear-gradient(to bottom, #2D77A2 5%, #337DA8 100%);
      background-color: #28739E;
  }
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


   <body>

<div style=" width:100px;padding-top:30px;padding-left:140px;">

<table class="styled-table"style="width:700px;float:center;">

<thead>

    <tr >


   <th style="padding-left:0px;padding-right:80px;" >نام ویژگی</th>

</tr>

</thead>

<tbody> 
<?php 

include "config.php";
$productid = $_GET['id']; 

    $sql = "SELECT * FROM `product` WHERE `Product_ID`='$productid'";

    $sqlproduct = $conn->query($sql);
    if (mysqli_num_rows($sqlproduct ) > 0) {

        while($row = mysqli_fetch_assoc($sqlproduct)) {
    
    
        
        
            $proID=$row["Product_ID"];
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
          <tr>    <td style="padding-right:60px; font-weight:700;text-align:center; font-size:20px;"><?php echo $propertiesName  ?></td>
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
    

    <li  style="margin-left:30px;margin-bottom:30px;">
              <a href="product.php">  <input class="inputs" type="submit" value="بازگشت" name="back" style="font-family: 'Bnazanin'; font-size:17px; "></a>
          </li>

</body>

</html>


<?php
?>