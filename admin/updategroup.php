
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/navigationbar.css">


    <title>به روز رسانی محصول</title>
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
   $nameg = $_POST['nameg'];
   $namep = $_POST['namep'];
   $sql = "UPDATE `product group` SET `Group_Name`='$nameg',`Parent_ID`='$namep' WHERE Product_Group_ID=$newid "; 
   $result = $conn->query($sql); 
   if ($result == TRUE) {
       echo "Record updated successfully.";
   }else{
       echo "Error:" . $sql . "<br>";
   }
} 
if (isset($_GET['id'])) {
    $newid = $_GET['id']; 
    $sql = "SELECT * FROM  `product group`   WHERE Product_Group_ID=$newid ";
    $result = $conn->query($sql); 
    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $id = $row['Product_Group_ID'];
            $namep = $row['Parent_ID'];
            $nameg = $row['Group_Name'];
           
        } 
    ?>
<li style="padding-top:100px" ></li>

<form class="form-style-9"action="editgroupsubmit.php" method="post" >
  <ul>
   <li>
      <label for="name" style="float: right; font-family:'Bnazanin';">نام گروه </label> <input style="direction:rtl;" type="text" name="nameg" id="nameg" style="text-align:right;font-family:'Bnazanin'; font-size:17px;"class="field-style field-split align-right " value="<?php echo $nameg; ?>"  />
      <input type="hidden" name="user_id" value="<?php echo $id; ?>">
      <div class="card col-md-8">
									      <div class=" col-md-8">
									        <label for="namep" style="float: right;">دسته بندی </label>
									        <div class="">
									          <select name="namep" style="width: 20%; padding: 0.375rem 0.75rem; float: right;   border-color: #ced4da;">
									            <option value=""style="direction: rtl;">دسته محصول را انتخاب کنید </option>
									            <?php $query=mysqli_query($conn,"SELECT * From `parent group`");
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
   

        </body>
        </html> 
    <?php
    } else{ 
        header('Location: view.php');
    } 
}
?> 