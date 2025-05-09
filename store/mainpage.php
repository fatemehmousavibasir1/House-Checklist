<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/navigationbar.css">
    <link rel="stylesheet"
          href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




    <title>صفحه اصلی</title>
  
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

<a  href="./insrtstore.php?id="<?php echo $loginuser_id ?>""><img src="../photo/plus.png"style ="width:5%;padding-top:55px;float:right;padding-right:40px; margin-right:150px;" alt="افزودن"></a>

      <?php 

include "config.php";

$sql = "SELECT * FROM `list of stores product` where Store_ID=(select Store_ID FROM store where User_ID= $loginuser_id) ";


$result = $conn->query($sql);

?>

<body>

<input type="text" class="myInput" id="myInput" onkeyup="myFunction()" style="direction:rtl; width:500px;margin-top:20px; padding-top:15px; margin-top:45px; margin-left:500px; height:25px;font-size: 16px;padding-bottom:18px; font-family:'Bnazanin'"placeholder=" جستجو"/>
<img src="../photo/search.png" style="width:30px;padding-top:22px;margin-top:10px;">
    <div style=" width:100px;padding-left:140px;">

<table class="styled-table"style="width:700px;float:center;min-height:200px;"id="myTable">

    <thead>

        <tr class="header" >
        <th style=" padding-right:30px;" >عملیات</th>
        <th style="padding-left:80px;padding-right:70px;" >تاریخ</th>
        <th style="padding-left:50px;padding-right:70px;" >قیمت</th>

        <th style="padding-left:0px;padding-right:50px;" >برند</th>
        
        <th style="padding-left:px;padding-right:40px;" >دسته بندی</th>

        <th style="padding-left:10px;padding-right:20px; " >نام محصول</th>
    </tr>

    </thead>

    <tbody> 

        <?php
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td style="padding-left:100px;"><a class="btn btn-danger" href="deletestore.php?id=<?php echo $row['ID']; ?>"><img  src="../photo/delete1.png"style="width:10% "></a>&nbsp;<a class="btn btn-info" href="updatestore.php?id=<?php echo $row['ID']; ?>"><img  src="../photo/edit.png"style="width:10% "></a></td>

                    <td style="padding-left:60px;"><?php echo $row['Date']; ?></td>
                    <td style="padding-left:40px;"><?php echo $row['Price']; ?></td>
                    <td style="text-align:left;padding-left:0px;"><?php echo $row['brand']; ?></td>

                    <td style="text-align:center;padding-right:40px;padding-left:60px;"><?php 
$ParentI=$row['Parent_ID']; 
                    $sql1="SELECT * FROM `parent group` where Parent_ID=$ParentI";

                    $rs2=mysqli_query($conn, $sql1);
                    if ($rs2->num_rows > 0) {
                   
                       while($row2 = $rs2->fetch_assoc()) {
                   
                   
                           $parent=$row2["Parent_Name"];
                    
                       }
                   
                     }
                    
                    
                    
                    echo $parent; ?></td>

<td style="padding-left:40px;font-weight:700;text-align:center"><?php echo $row['name']; ?></td>


                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>
<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>


