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
    <link rel="stylesheet" href="./viewprofile.css">
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/navigationbar.css">
    <link rel="stylesheet"
          href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




    <title>لیست من </title>
  
</head> 

<style>
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
    th{
      
font-size:20px;

    }
    td{

        font-size:18px;   
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

$sql = "SELECT * FROM `list of customer product` where User_ID=$loginuser_id ";


$result = $conn->query($sql);

?>


<body>
<input type="text" class="myInput" id="myInput" onkeyup="myFunction()" style="margin-left:160px;direction:rtl; width:500px;margin-top:20px; padding-top:15px; margin-top:45px; margin-left:400px; height:25px;font-size: 16px;padding-bottom:18px; font-family:'Bnazanin'"placeholder=" جستجو"/>
<img src="./photo/search.png" style="width:30px;padding-top:22px;margin-top:10px;">
 
    <div style="padding-right:150px; width:400px; ">

<table class="styled-table"id="myTable">

    <thead>

        <tr class="header">

        <th style=" padding-right:200px; padding-left:60px;" >عملیات</th>
        <th style="padding-left:40px;padding-right:50px;">توضیحات</th>
        <th style="padding-left:20px;padding-right:50px;">اولویت</th>

        <th style="padding-left:40px;">تعداد مورد نیاز</th>

        <th style="padding-left:40px;padding-right:20px;" >دسته بندی</th> 
               <th style="padding-left:20px;padding-right:30px;" >نام</th>

    </tr>

    </thead>

    <tbody> 

        <?php
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td style="padding-left:15px;"><a class="btn btn-danger" href="delete.php?id=<?php echo $row['Customer_Product_ID']; ?>"><img  src="./photo/delete1.png"style="width:9% "></a>&nbsp;<a class="btn btn-info" href="update.php?id=<?php echo $row['Customer_Product_ID']; ?>"><img  src="./photo/edit.png"style="width:9% "></a>&nbsp;<a class="btn btn-info" href="buy.php?id=<?php echo $row['Customer_Product_ID']; ?>"><img  src="./photo/tick.png"style="width:9% "></a>&nbsp;<a class="btn btn-info" href="read.php?id=<?php echo $row['Customer_Product_ID']; ?>"><img  src="./photo/eye.png"style="width:9% "></a></td>

                    <td style="padding-left:60px;"><?php echo $row['explain']; ?></td>
                    <td style="padding-left:40px;"><?php echo $row['essential']; ?></td>
                    <td style="text-align:left;padding-left:50px;"><?php echo $row['numbers']; ?></td>

                    <td style="padding-left:66px;padding-right:10px"><?php 
                   $a =$row['product_ID'];
                    $sql1="SELECT * FROM `parent group` WHERE Parent_ID= (SELECT Parent_ID FROM `product group` where Product_Group_ID=(select Product_Group_ID FROM product where Product_ID=$a))";

                    $rs2=mysqli_query($conn, $sql1);
                    if ($rs2->num_rows > 0) {
                   
                       while($row2 = $rs2->fetch_assoc()) {
                   
                   
                           $loginuser=$row2["Parent_Name"];
                    
                       }
                   
                     }
                    
                    
                    
                    echo $loginuser; ?></td>

     

<td style="text-align:center;padding-right:60px;padding-left:60px;font-weight:700;"><?php 
                                       $a =$row['product_ID'];
                                       $sql1="SELECT * FROM product where Product_ID=$a";
                   
                                       $rs2=mysqli_query($conn, $sql1);
                                       if ($rs2->num_rows > 0) {
                                      
                                          while($row2 = $rs2->fetch_assoc()) {
                                      
                                      
                                              $loginuser=$row2["Product_Name"];
                                       
                                          }
                                      
                                        }

                                       echo $loginuser; ?></td>


               


                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 
       



   </div><div class="wrap">
      <div class="right-menu"  style="bottom: 500px;">
        <a   href="profile.php"><img src="./photo/person.png"style="width:60% "><i class="fa"style="font-size:25px"></i><span style="font-size:25px">پروفایل</span></a>
        <a class="active" href="view.php"><i class="fa"><img src="./photo/pngwing.png"style="width:60%"></i><span style="font-size:25px">فهرست کالاها</span></a>
        <a  href="mainhomepage.php"><i class="fa"><img src="./photo/login.png"style="width:60%"></i><span style="font-size:25px">خروج</span></a>
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


