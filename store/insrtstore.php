<?php
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";

$con = mysqli_connect($host, $username1, $password1, $dbname);


?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/navigationbar.css">
    <link rel="stylesheet"
          href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>افزودن </title>
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
<?php 
       session_start();
       $loginuser_id=$_SESSION['loginuser_id'];
       
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

<li style="padding-top:100px"></li>

         <form class="form-style-9" action="updates.php" method="post" style=>
            <ul>
            <li>
               <label for="name" style="float: right;">نام محصول </label> <input type="text" name="name" id="name"style="direction:rtl;" class="field-style field-split align-right "  />
  

									    <div class="card col-md-8">
									      <div class=" col-md-8">
									        <label for="Parent_ID" style="float: right;">دسته بندی </label>
									        <div class="">
									          <select name="Parent_ID" style="width: 20%; padding: 0.375rem 0.75rem; float: right;   border-color: #ced4da;">
									            <option value=""style="direction: rtl;">دسته محصول را انتخاب کنید </option>
									            <?php $query=mysqli_query($con,"SELECT * From `parent group`");
									            while($row=mysqli_fetch_array($query))
									            { 
									              ?>

									              <option style="direction:rtl; font-size:15px;"value="<?php echo $row['Parent_ID'];?>"><?php echo $row['Parent_Name'];?></option>
									              <?php 
									            } ?>
									          </select>
									        </div>
									      </div>
                                            </div>








            
                <label for="brand"style="float: right; padding-right:30px;">برند</label>  <input type="text" name="brand"  id="brand" style="direction:rtl;" class="field-style field-split align-right" />
                <label for="Price"style="float: right;">قیمت</label> <input type="text" name="Price"   id="Price"style="direction:rtl;" class="field-style field-split align-right" />
                <label for="Date"style="float: right;">تاریخ</label> <input type="date" name="Date"   id="Date" class="field-style align-right" />
           
         </li>
         <li  style="margin-left:30px;">
                <input type="submit" value="بازگشت" name="back" style="font-family: 'Bnazanin'; font-size:17px; ">
   
            <input type="submit" value="ذخیره" name="submit" style="font-family: 'Bnazanin'; font-size:17px; ">

          </li>

            </ul>
            </form>
            
    </div>

</div>
</html>














