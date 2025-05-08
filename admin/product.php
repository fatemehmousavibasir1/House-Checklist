<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../viewprofile.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/navigationbar.css">




    <title>محصول</title>
  
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



<a  href="./insertproduct.php"><img src="../photo/plus.png"style ="width:5%;padding-top:50px;float:right;padding-right:40px;"></a>

      <?php 

include "config.php";

$sql = "SELECT * FROM `product` ";


$result = $conn->query($sql);

?>

<body>
<input type="text" class="myInput" id="myInput" onkeyup="myFunction()" style="direction:rtl; width:500px;margin-top:20px; padding-top:15px; margin-top:45px; margin-left:500px; height:25px;font-size: 16px;padding-bottom:18px; font-family:'Bnazanin'"placeholder=" جستجو"/>
<img src="../photo/search.png" style="width:30px;padding-top:22px;margin-top:10px;">
  
    <div style=" width:100px;padding-top:100px;padding-left:140px;">

<table class="styled-table"style="width:700px;float:center;" id="myTable">

    <thead>

        <tr class="header" >

        <th style=" padding-right:150px;" >عملیات</th>
       <th style="padding-left:0px;padding-right:80px;" >گروه</th>
        <th style="padding-left:10px;padding-right:65px;" >دسته بندی</th>
         <th style="padding-left:20px;padding-right:65px;" >محصول</th>
 </tr>

    </thead>

    <tbody> 

        <?php
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td style="padding-left:100px;"><a class="btn btn-danger" href="deleteproduct.php?id=<?php echo $row['Product_ID']; ?>"><img  src="../photo/delete1.png"style="width:9% "></a>&nbsp;<a class="btn btn-info" href="updateproduct.php?id=<?php echo $row['Product_ID']; ?>"><img  src="../photo/edit.png"style="width:9% "></a>&nbsp;<a class="btn btn-info" href="readproduct.php?id=<?php echo $row['Product_ID']; ?>"><img  src="../photo/eye.png"style="width:9% "></a></td>

                    
        
                    <td style="text-align:center;padding-right:90px"><?php 
                                       $a =$row['Product_Group_ID'];
                                       $sql1="SELECT * FROM `product group` where Product_Group_ID='$a' ";
             
                                       $rs2=mysqli_query($conn, $sql1);
                                       if ($rs2->num_rows > 0) {
                                      
                                          while($row2 = $rs2->fetch_assoc()) {
                                      
                                      
                                              $loginuser=$row2["Group_Name"];
                                       
                                          }
                                      
                                        }

                                       echo $loginuser; ?></td>


                    <td style="padding-right:40px"><?php 
              $a =$row['Product_ID'];
                    $sql1="SELECT * FROM `parent group` where Parent_ID=(select Parent_ID from `product group` where Product_Group_ID=(select Product_Group_ID FROM product where Product_ID='$a'))";

                    $rs2=mysqli_query($conn, $sql1);
                    if ($rs2->num_rows > 0) {
                   
                       while($row2 = $rs2->fetch_assoc()) {
                   
                   
                           $loginuser=$row2["Parent_Name"];
                    
                       }
                   
                     }
                    
                    
                    
                    echo $loginuser; ?></td>

                    
<td style="padding-right:60px; font-weight:700;text-align:center; font-size:20px;"><?php echo $row['Product_Name']; ?></td>
 




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
    td = tr[i].getElementsByTagName("td")[3];
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

