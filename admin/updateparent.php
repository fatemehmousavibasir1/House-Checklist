
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/navigationbar.css">


    <title>به روزرسانی دسته بندی</title>
   </head>
   <style>
   hr{
      height: 2px;
      background-color: #bfbeb9;
      border: none;
      width: 1150px;
      margin-left: 120px;
      
  }</style>

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

if (isset($_POST['update'])) {
    $newid = $_GET['id'];
   $name = $_POST['name'];

   $sql = "UPDATE `parent group` SET `Parent_Name`='$name' WHERE Parent_ID=$newid "; 
   $result = $conn->query($sql); 
   if ($result == TRUE) {
       echo "Record updated successfully.";
   }else{
       echo "Error:" . $sql . "<br>";
   }
} 
if (isset($_GET['id'])) {
    $newid = $_GET['id']; 
    $sql = "SELECT * FROM  `parent group`   WHERE Parent_ID='$newid'";
    $result = $conn->query($sql); 
    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $id = $row['Parent_ID'];
            $name = $row['Parent_Name'];

           
        } 
    ?>
<li style="padding-top:100px" ></li>

<form class="form-style-9"action="editparentsubmit.php" method="post" >
  <ul>
   <li>
      <label for="name" style="float: right; font-family:'Bnazanin';">نام دسته بندی </label> <input type="text" name="name" id="name" style="text-align:right;font-family:'Bnazanin'; font-size:17px;"class="field-style field-split align-right " value="<?php echo $name; ?>"  />
      <input type="hidden" name="user_id"  value="<?php echo $id; ?>">
   </li>

   <li  style="margin-left:30px;">
                <input type="submit" value="بازگشت" name="back" style="font-family: 'Bnazanin'; font-size:17px; ">
   
            <input type="submit" value="ذخیره" name="update" style="font-family: 'Bnazanin'; font-size:17px; ">

          </li>
                                            </ul>
</form>
   

        </body>
        </html> 
    <?php
    } else{ 
        header('Location: view.php');
    } 
}
?> 