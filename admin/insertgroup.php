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


    <title>افزودن گروه</title>
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



<li style="padding-top:100px"></li>

         <form class="form-style-9" action="updategroups.php" method="post" >
            <ul>
            <li>
               <label for="nameg" style="float: right;">نام گروه </label> <input type="text"style="direction:rtl;" name="nameg" id="nameg" class="field-style field-split align-right "  />
               <div class="card col-md-8">
									      <div class=" col-md-8">
									        <label for="namep" style="float: right;">دسته بندی </label>
									        <div class="">
									          <select name="namep" style="width: 20%; padding: 0.375rem 0.75rem; float: right;   border-color: #ced4da;">
									            <option value=""style="direction: rtl;">دسته محصول را انتخاب کنید </option>
									            <?php $query=mysqli_query($con,"SELECT * From `parent group`");
									            while($row=mysqli_fetch_array($query))
									            { 
									             
                                                   if($namep== $row['Parent_ID']){ ?>
                                                 <option style="direction: rtl; font-family:'Bnazanin';  font-size:17px;"selected value="<?php echo $row['Parent_ID'];?>"><?php echo $row['Parent_Name'];?></option>
	                                                 <?php							             
                                                     }
                                                  else{?>
									              <option style="direction: rtl; font-family:'Bnazanin'; font-size:17px;" value="<?php echo $row['Parent_ID'];?>"><?php echo $row['Parent_Name'];?></option>
									              <?php 
									           }
                                                } ?>
									          </select>
									        </div>
									      </div>
     </div>
         </li>
         <li  style="margin-left:30px;">
                <input type="submit" value="بازگشت" name="back" style="font-family: 'Bnazanin'; font-size:17px; ">
   
            <input type="submit" value="ذخیره" name="update" style="font-family: 'Bnazanin'; font-size:17px; ">

          </li>
            </ul>
            </form>
            
    </div>

</div>
</html>














