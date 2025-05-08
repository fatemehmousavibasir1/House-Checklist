
<?php 


$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";
$conn = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$conn)
{
   die("Connection failed!" . mysqli_connect_error());}

   if (isset($_GET['search'])) {
  
    $safe_value = $_GET['search'];


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
<title>جستجو</title>
<style>





table {

  border-collapse: collapse;
  width: 70%;
  text-align:center;
  font-family:"Bnazanin";
  font-size:30px;
  margin-left: 200px;
  margin-top: 100px;
  margin-bottom: 100px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  text-align:center;
  font-family:"Bnazanin";
  font-size:20px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<body>

<nav class="navbar" id="topNav">
    <!-- LOGO -->
    <a href="./mainhomepage.php"><div class="logo"><img src="./photo/logo4.png" style="width:35px;margin-left:15px;"></div></a>
    <div class="loginimg"><a href="loginSignup.html"><img src="./photo/login.png"style="width:9%; margin-right:25px;"></a></div>
    <div class="search">
      <form action="search1.php" method="GET">
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

        <li><a href="userstore1.php">فروش</a></li>
        <li class="services">
          <a href="./mainhomepage.php">دسته بندی کالا</a>

          <!-- DROPDOWN MENU -->
          
          <ul class="dropdown" >
            <?php
          $sql="SELECT  * FROM `parent group`";
$rs=mysqli_query($conn, $sql);
if (mysqli_num_rows($rs) > 0) {

    while($row2 = mysqli_fetch_assoc($rs)) {
        $counter=$row2["Parent_ID"];
       $name =$row2["Parent_Name"];?>
            <li><a href="listS.php?id=<?php echo $counter;?>"style="font-size: 17px;"><?php echo $name;?></a></li>
   
   <?php }
}?>       
          
          
          
          
          </ul>

        </li>

        <li><a href="./mainhomepage.php">خانه</a></li>
      </div>
    </ul>
  </nav> 


</body>




<table>
  <tr>
    <th></th>
    <th>محصول</th>
    <th>گروه</th>
  </tr>
 


<?php

$result = mysqli_query($conn,"SELECT * FROM product WHERE Product_Name LIKE '%$safe_value%'");
 while ($row = mysqli_fetch_assoc($result)) {
"<div id='link' onClick='addText(\"".$row['Product_Name']."\");'>" . $row['Product_Name'] . "</div>";
$a=$row['Product_Name'];
$b=$row['Product_Group_ID'];

$sql="SELECT  * FROM `product group` WHERE Product_Group_ID= $b ";
$rs=mysqli_query($conn, $sql);
if (mysqli_num_rows($rs) > 0) {

    while($row2 = mysqli_fetch_assoc($rs)) {
    
    
       $ParentGroup=$row2["Parent_ID"];
    
    }
    
    }

$sql1="SELECT  * FROM `parent group` WHERE Parent_ID= $ParentGroup ";
$rs1=mysqli_query($conn, $sql1);
if (mysqli_num_rows($rs1) > 0) {

    while($row3 = mysqli_fetch_assoc($rs1)) {
    
    
       $ParentGroupName=$row3["Parent_Name"];
    
    }
    
    }
    echo '<tr><td><a href="listS.php?id='.$ParentGroup.'">مشاهده</a></td>';
    echo'<td>'.$a.'</td>';
    echo' <td>'.$ParentGroupName.'</td>';
    echo'</tr>';



 }

exit;
 ?>