
<?php 

include "config.php";
$parentid = $_GET['id']; 

?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bedroom.css">
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/navigationbar.css">
    <link rel="stylesheet"
          href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title> لیست محصولات</title>
   </head>
   <style>
   hr{
      height: 2px;
      background-color: #bfbeb9;
      border: none;
      width: 1150px;
      margin-left: 120px;
  }
  .collapsible {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 1280px;
    height: 150px;
    border: none;
    outline: none;
    font-size: 15px;
  margin-top: 20px;
  margin-left: 35px;
  margin-right: 25px;
  font-family: "Bnazanin";
  font-size: 40px;
  text-align: right;
  padding-right: 210px;
  font-weight: 700;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  background-image: url
  }
  
  /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
  .active, .collapsible:hover {
    background-color: #ccc;
  
  }
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
  
  </style>
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
$i=0;
$mainsql="SELECT * FROM `product group` WHERE Parent_ID= (SELECT  Parent_ID FROM `parent group` WHERE Parent_ID='$parentid' )";
$mainparent=mysqli_query($conn, $mainsql);
 if (mysqli_num_rows($mainparent) > 0) {

    while($row2 = mysqli_fetch_assoc($mainparent)) {

                        
        $groupname=$row2["Group_Name"];
        $roductgroupid=$row2["Product_Group_ID"];
   


?>
    <button type="button"  class="collapsible" style="background-color: #edeae1; position: static; background-image:url(./photo/pages/<?php    echo $roductgroupid.'.png'    ?>);" ><?php   echo  $groupname;   ?></button>
 <div class="content">
   <div class="open-wrap">


  
    <?php  
     $arr=array('f0','f1','f2','f3','f4','f5','f6','f7','f8','f9','f10','f11','f12','f13','f14','f15','f16','f17','f18','f19','f20','f21','f22','f23','f24','f25','f26','f27','f28','f29','f30','f31','f32','f33','f34','f35','f36','f37','f38','f39','f40','f41','f42','f43','f44','f45','f46','f47','f48','f49','f50','f51','f52','f53','f54','f55','f56','f57','f58','f59','f60','f61','f62','f63','f64','f65','f66','f67','f68','f69','f70','f71','f72','f73','f74','f75','f76','f77','f78','f79','f80','f81','f82','f83','f84','f85','f86','f87','f88','f89','f90','f91','f92','f93','f94','f95','f96','f97','f98','f99','f100');
     $arrName=array('field1','field2','field3','field4','field5','field6','field7','field8','field9','field10','field11','field12','field13','field14','field15','field16','field17','field18','field19','field20','field21','field22','field23','field24','field25','field26','field27','field28','field29','field30','field40','field41','field42'); 
       $sql = "SELECT * FROM product WHERE Product_Group_ID=$roductgroupid";
    $arrpID=array();
    $arrpNames=array();
     $customerpro = $conn->query($sql);
   

     if (mysqli_num_rows($customerpro) > 0) {
    ?>

    


      <?php
        while($row2 = mysqli_fetch_assoc($customerpro)) {
            
            $productID=$row2["Product_ID"];
            $productName=$row2["Product_Name"];
     ?>
   

     <?php
   
            $sql1 = "SELECT * FROM `product` WHERE Product_ID= $productID";
            $customer = $conn->query($sql1);
            $sql3= "SELECT count(*) AS a FROM `name` WHERE Product_ID= $productID";
            $count = $conn->query($sql3);
            if (mysqli_num_rows($count) > 0) {

              while($row8 = mysqli_fetch_assoc($count)) {
              
              
               $loginuser=$row8["a"];
              
              }
              
              }





        
            if (mysqli_num_rows($customer) > 0) {
 
              while($row3 = mysqli_fetch_assoc($customer)){

                $sql4 = "SELECT * FROM `name` WHERE Product_ID= $productID";
                 $s=0;
                $pID = $conn->query($sql4);
                if (mysqli_num_rows($pID) > 0) {
                  
                  while($row4 = mysqli_fetch_assoc($pID)){
                   $arrpID[$s]=$row4["Properties_ID"]; 

                   $sql5 = "SELECT * FROM `properties` WHERE properties_ID= $arrpID[$s]";

                   $pName = $conn->query($sql5);
                   
                   if (mysqli_num_rows($pName) > 0) {

                    while($row5 = mysqli_fetch_assoc($pName)) {
                
                         $arrpNames[$s]=$row5["Title"];
                        
                                   
                    }
                
                  }
                   
                      ++$s;

                  }
                }

              }



















             ?>
  
       <input type="checkbox" name="open-btn" id=<?php echo $arr[$i];?> class="open-input">
       <div class="open-contents">
        <label for=<?php echo $arr[$i];?> class="open-label">
        <?php echo $productName;?>

        </label>
        <div class="open-contents__inner">
        <form class="form-style-9" action="submit.php?id=<?php echo  $productID; ?>" method="post">
        <ul>
          
          <?php

if($loginuser=='1'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
</li>


<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='2'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
</li>
<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='3'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />

</li>

<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='4'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>

</li>

<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='5'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>

<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='6'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>
</li>

<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}



if($loginuser=='7'){
  ?>
      <li>
         <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
         <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?> </label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
          <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?> </label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
          <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?> </label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
          <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />
   
</li>
<li>
            <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?> </label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>
  
          <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
</li>
<li>
            <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"style="direction:rtl;" />
                <label for="field41" style="float: right; ">اولویت</label>
                <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
                   <option value=""dir="rtl">انتخاب اولویت</option>
                   <option value="1"dir="rtl">اولویت اول</option>
                   <option value="2"dir="rtl">اولویت دوم</option>
                   <option value="3"dir="rtl">اولویت سوم</option>
                </select>
               <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
            </li>

<li>
    <input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
            </li>


<?php



}               

if($loginuser=='8'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
</li>

<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='9'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>

<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}


if($loginuser=='10'){

  ?>
            <li>
               <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
               <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
                <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
                <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
                <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />
          
 </li>
            <li>
                <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>
 
                <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
                <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
               <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
 </li>
 <li> 
    <label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
      
</li>

<li>
            <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
                <label for="field41" style="float: right; ">اولویت</label>
                <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
                   <option value=""dir="rtl">انتخاب اولویت</option>
                   <option value="1"dir="rtl">اولویت اول</option>
                   <option value="2"dir="rtl">اولویت دوم</option>
                   <option value="3"dir="rtl">اولویت سوم</option>
                </select>
               <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
            </li>

<li>
    <input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
            </li>


<?php
}

if($loginuser=='11'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
      
</li>

<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='12'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field12" style="float: right;"><?php       echo $arrpNames[11];      ?></label> <input type="text" name="field12"    id="field12"    class="field-style field-split align-right " style="direction:rtl;" />
     
</li>

<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='13'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field12" style="float: right;"><?php       echo $arrpNames[11];      ?></label> <input type="text" name="field12"    id="field12"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field13" style="float: right;"><?php       echo $arrpNames[12];      ?></label> <input type="text" name="field13"    id="field13"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>

<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='14'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field12" style="float: right;"><?php       echo $arrpNames[11];      ?></label> <input type="text" name="field12"    id="field12"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field13" style="float: right;"><?php       echo $arrpNames[12];      ?></label> <input type="text" name="field13"    id="field13"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field14"style="float: right;"><?php       echo $arrpNames[13];      ?></label> <input type="text" name="field14"    id="field14"    class="field-style field-split align-right " style="direction:rtl;"/>
   
</li>

<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='15'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field12" style="float: right;"><?php       echo $arrpNames[11];      ?></label> <input type="text" name="field12"    id="field12"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field13" style="float: right;"><?php       echo $arrpNames[12];      ?></label> <input type="text" name="field13"    id="field13"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field14"style="float: right;"><?php       echo $arrpNames[13];      ?></label> <input type="text" name="field14"    id="field14"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field15" style="float: right;"><?php       echo $arrpNames[14];      ?></label> <input type="text" name="field15"    id="field15"    class="field-style field-split align-right " style="direction:rtl;" />
     
</li>

<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='16'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field12" style="float: right;"><?php       echo $arrpNames[11];      ?></label> <input type="text" name="field12"    id="field12"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field13" style="float: right;"><?php       echo $arrpNames[12];      ?></label> <input type="text" name="field13"    id="field13"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field14"style="float: right;"><?php       echo $arrpNames[13];      ?></label> <input type="text" name="field14"    id="field14"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field15" style="float: right;"><?php       echo $arrpNames[14];      ?></label> <input type="text" name="field15"    id="field15"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field16" style="float: right;"><?php       echo $arrpNames[15];      ?></label> <input type="text" name="field16"    id="field16"    class="field-style field-split align-right " style="direction:rtl;" />
    
</li>

<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='17'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field12" style="float: right;"><?php       echo $arrpNames[11];      ?></label> <input type="text" name="field12"    id="field12"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field13" style="float: right;"><?php       echo $arrpNames[12];      ?></label> <input type="text" name="field13"    id="field13"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field14"style="float: right;"><?php       echo $arrpNames[13];      ?></label> <input type="text" name="field14"    id="field14"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field15" style="float: right;"><?php       echo $arrpNames[14];      ?></label> <input type="text" name="field15"    id="field15"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field16" style="float: right;"><?php       echo $arrpNames[15];      ?></label> <input type="text" name="field16"    id="field16"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field17" style="float: right;"><?php       echo $arrpNames[16];      ?></label> <input type="text" name="field17"    id="field17"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>

<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='18'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field12" style="float: right;"><?php       echo $arrpNames[11];      ?></label> <input type="text" name="field12"    id="field12"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field13" style="float: right;"><?php       echo $arrpNames[12];      ?></label> <input type="text" name="field13"    id="field13"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field14"style="float: right;"><?php       echo $arrpNames[13];      ?></label> <input type="text" name="field14"    id="field14"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field15" style="float: right;"><?php       echo $arrpNames[14];      ?></label> <input type="text" name="field15"    id="field15"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field16" style="float: right;"><?php       echo $arrpNames[15];      ?></label> <input type="text" name="field16"    id="field16"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field17" style="float: right;"><?php       echo $arrpNames[16];      ?></label> <input type="text" name="field17"    id="field17"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field18"style="float: right;"><?php       echo $arrpNames[17];      ?></label> <input type="text" name="field18"    id="field18"    class="field-style field-split align-right " style="direction:rtl;"/>
   
</li>
<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='19'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field12" style="float: right;"><?php       echo $arrpNames[11];      ?></label> <input type="text" name="field12"    id="field12"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field13" style="float: right;"><?php       echo $arrpNames[12];      ?></label> <input type="text" name="field13"    id="field13"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field14"style="float: right;"><?php       echo $arrpNames[13];      ?></label> <input type="text" name="field14"    id="field14"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field15" style="float: right;"><?php       echo $arrpNames[14];      ?></label> <input type="text" name="field15"    id="field15"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field16" style="float: right;"><?php       echo $arrpNames[15];      ?></label> <input type="text" name="field16"    id="field16"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field17" style="float: right;"><?php       echo $arrpNames[16];      ?></label> <input type="text" name="field17"    id="field17"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field18"style="float: right;"><?php       echo $arrpNames[17];      ?></label> <input type="text" name="field18"    id="field18"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field19" style="float: right;"><?php       echo $arrpNames[18];      ?></label> <input type="text" name="field19"    id="field19"    class="field-style field-split align-right " style="direction:rtl;" />
   
</li>
<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='20'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field12" style="float: right;"><?php       echo $arrpNames[11];      ?></label> <input type="text" name="field12"    id="field12"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field13" style="float: right;"><?php       echo $arrpNames[12];      ?></label> <input type="text" name="field13"    id="field13"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field14"style="float: right;"><?php       echo $arrpNames[13];      ?></label> <input type="text" name="field14"    id="field14"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field15" style="float: right;"><?php       echo $arrpNames[14];      ?></label> <input type="text" name="field15"    id="field15"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field16" style="float: right;"><?php       echo $arrpNames[15];      ?></label> <input type="text" name="field16"    id="field16"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field17" style="float: right;"><?php       echo $arrpNames[16];      ?></label> <input type="text" name="field17"    id="field17"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field18"style="float: right;"><?php       echo $arrpNames[17];      ?></label> <input type="text" name="field18"    id="field18"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field19" style="float: right;"><?php       echo $arrpNames[18];      ?></label> <input type="text" name="field19"    id="field19"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field20" style="float: right;"><?php       echo $arrpNames[19];      ?></label> <input type="text" name="field20"    id="field20"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='21'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field12" style="float: right;"><?php       echo $arrpNames[11];      ?></label> <input type="text" name="field12"    id="field12"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field13" style="float: right;"><?php       echo $arrpNames[12];      ?></label> <input type="text" name="field13"    id="field13"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field14"style="float: right;"><?php       echo $arrpNames[13];      ?></label> <input type="text" name="field14"    id="field14"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field15" style="float: right;"><?php       echo $arrpNames[14];      ?></label> <input type="text" name="field15"    id="field15"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field16" style="float: right;"><?php       echo $arrpNames[15];      ?></label> <input type="text" name="field16"    id="field16"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field17" style="float: right;"><?php       echo $arrpNames[16];      ?></label> <input type="text" name="field17"    id="field17"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field18"style="float: right;"><?php       echo $arrpNames[17];      ?></label> <input type="text" name="field18"    id="field18"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field19" style="float: right;"><?php       echo $arrpNames[18];      ?></label> <input type="text" name="field19"    id="field19"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field20" style="float: right;"><?php       echo $arrpNames[19];      ?></label> <input type="text" name="field20"    id="field20"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field21" style="float: right;"><?php       echo $arrpNames[20];      ?></label> <input type="text" name="field21"    id="field21"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='22'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field12" style="float: right;"><?php       echo $arrpNames[11];      ?></label> <input type="text" name="field12"    id="field12"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field13" style="float: right;"><?php       echo $arrpNames[12];      ?></label> <input type="text" name="field13"    id="field13"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field14"style="float: right;"><?php       echo $arrpNames[13];      ?></label> <input type="text" name="field14"    id="field14"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field15" style="float: right;"><?php       echo $arrpNames[14];      ?></label> <input type="text" name="field15"    id="field15"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field16" style="float: right;"><?php       echo $arrpNames[15];      ?></label> <input type="text" name="field16"    id="field16"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field17" style="float: right;"><?php       echo $arrpNames[16];      ?></label> <input type="text" name="field17"    id="field17"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field18"style="float: right;"><?php       echo $arrpNames[17];      ?></label> <input type="text" name="field18"    id="field18"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field19" style="float: right;"><?php       echo $arrpNames[18];      ?></label> <input type="text" name="field19"    id="field19"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field20" style="float: right;"><?php       echo $arrpNames[19];      ?></label> <input type="text" name="field20"    id="field20"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field21" style="float: right;"><?php       echo $arrpNames[20];      ?></label> <input type="text" name="field21"    id="field21"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field22"style="float: right;"><?php       echo $arrpNames[21];      ?></label> <input type="text" name="field22"    id="field22"    class="field-style field-split align-right " style="direction:rtl;"/>      
</li>
<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='23'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field12" style="float: right;"><?php       echo $arrpNames[11];      ?></label> <input type="text" name="field12"    id="field12"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field13" style="float: right;"><?php       echo $arrpNames[12];      ?></label> <input type="text" name="field13"    id="field13"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field14"style="float: right;"><?php       echo $arrpNames[13];      ?></label> <input type="text" name="field14"    id="field14"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field15" style="float: right;"><?php       echo $arrpNames[14];      ?></label> <input type="text" name="field15"    id="field15"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field16" style="float: right;"><?php       echo $arrpNames[15];      ?></label> <input type="text" name="field16"    id="field16"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field17" style="float: right;"><?php       echo $arrpNames[16];      ?></label> <input type="text" name="field17"    id="field17"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field18"style="float: right;"><?php       echo $arrpNames[17];      ?></label> <input type="text" name="field18"    id="field18"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field19" style="float: right;"><?php       echo $arrpNames[18];      ?></label> <input type="text" name="field19"    id="field19"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field20" style="float: right;"><?php       echo $arrpNames[19];      ?></label> <input type="text" name="field20"    id="field20"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field21" style="float: right;"><?php       echo $arrpNames[20];      ?></label> <input type="text" name="field21"    id="field21"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field22"style="float: right;"><?php       echo $arrpNames[21];      ?></label> <input type="text" name="field22"    id="field22"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field23" style="float: right;"><?php       echo $arrpNames[22];      ?></label> <input type="text" name="field23"    id="field23"    class="field-style field-split align-right " style="direction:rtl;" />
    
</li>
<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='24'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field12" style="float: right;"><?php       echo $arrpNames[11];      ?></label> <input type="text" name="field12"    id="field12"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field13" style="float: right;"><?php       echo $arrpNames[12];      ?></label> <input type="text" name="field13"    id="field13"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field14"style="float: right;"><?php       echo $arrpNames[13];      ?></label> <input type="text" name="field14"    id="field14"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field15" style="float: right;"><?php       echo $arrpNames[14];      ?></label> <input type="text" name="field15"    id="field15"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field16" style="float: right;"><?php       echo $arrpNames[15];      ?></label> <input type="text" name="field16"    id="field16"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field17" style="float: right;"><?php       echo $arrpNames[16];      ?></label> <input type="text" name="field17"    id="field17"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field18"style="float: right;"><?php       echo $arrpNames[17];      ?></label> <input type="text" name="field18"    id="field18"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field19" style="float: right;"><?php       echo $arrpNames[18];      ?></label> <input type="text" name="field19"    id="field19"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field20" style="float: right;"><?php       echo $arrpNames[19];      ?></label> <input type="text" name="field20"    id="field20"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field21" style="float: right;"><?php       echo $arrpNames[20];      ?></label> <input type="text" name="field21"    id="field21"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field22"style="float: right;"><?php       echo $arrpNames[21];      ?></label> <input type="text" name="field22"    id="field22"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field23" style="float: right;"><?php       echo $arrpNames[22];      ?></label> <input type="text" name="field23"    id="field23"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field24" style="float: right;"><?php       echo $arrpNames[23];      ?></label> <input type="text" name="field24"    id="field24"    class="field-style field-split align-right " style="direction:rtl;" />
    
</li>
<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='25'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field12" style="float: right;"><?php       echo $arrpNames[11];      ?></label> <input type="text" name="field12"    id="field12"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field13" style="float: right;"><?php       echo $arrpNames[12];      ?></label> <input type="text" name="field13"    id="field13"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field14"style="float: right;"><?php       echo $arrpNames[13];      ?></label> <input type="text" name="field14"    id="field14"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field15" style="float: right;"><?php       echo $arrpNames[14];      ?></label> <input type="text" name="field15"    id="field15"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field16" style="float: right;"><?php       echo $arrpNames[15];      ?></label> <input type="text" name="field16"    id="field16"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field17" style="float: right;"><?php       echo $arrpNames[16];      ?></label> <input type="text" name="field17"    id="field17"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field18"style="float: right;"><?php       echo $arrpNames[17];      ?></label> <input type="text" name="field18"    id="field18"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field19" style="float: right;"><?php       echo $arrpNames[18];      ?></label> <input type="text" name="field19"    id="field19"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field20" style="float: right;"><?php       echo $arrpNames[19];      ?></label> <input type="text" name="field20"    id="field20"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field21" style="float: right;"><?php       echo $arrpNames[20];      ?></label> <input type="text" name="field21"    id="field21"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field22"style="float: right;"><?php       echo $arrpNames[21];      ?></label> <input type="text" name="field22"    id="field22"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field23" style="float: right;"><?php       echo $arrpNames[22];      ?></label> <input type="text" name="field23"    id="field23"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field24" style="float: right;"><?php       echo $arrpNames[23];      ?></label> <input type="text" name="field24"    id="field24"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field25" style="float: right;"><?php       echo $arrpNames[24];      ?></label> <input type="text" name="field25"    id="field25"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='26'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field12" style="float: right;"><?php       echo $arrpNames[11];      ?></label> <input type="text" name="field12"    id="field12"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field13" style="float: right;"><?php       echo $arrpNames[12];      ?></label> <input type="text" name="field13"    id="field13"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field14"style="float: right;"><?php       echo $arrpNames[13];      ?></label> <input type="text" name="field14"    id="field14"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field15" style="float: right;"><?php       echo $arrpNames[14];      ?></label> <input type="text" name="field15"    id="field15"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field16" style="float: right;"><?php       echo $arrpNames[15];      ?></label> <input type="text" name="field16"    id="field16"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field17" style="float: right;"><?php       echo $arrpNames[16];      ?></label> <input type="text" name="field17"    id="field17"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field18"style="float: right;"><?php       echo $arrpNames[17];      ?></label> <input type="text" name="field18"    id="field18"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field19" style="float: right;"><?php       echo $arrpNames[18];      ?></label> <input type="text" name="field19"    id="field19"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field20" style="float: right;"><?php       echo $arrpNames[19];      ?></label> <input type="text" name="field20"    id="field20"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field21" style="float: right;"><?php       echo $arrpNames[20];      ?></label> <input type="text" name="field21"    id="field21"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field22"style="float: right;"><?php       echo $arrpNames[21];      ?></label> <input type="text" name="field22"    id="field22"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field23" style="float: right;"><?php       echo $arrpNames[22];      ?></label> <input type="text" name="field23"    id="field23"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field24" style="float: right;"><?php       echo $arrpNames[23];      ?></label> <input type="text" name="field24"    id="field24"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field25" style="float: right;"><?php       echo $arrpNames[24];      ?></label> <input type="text" name="field25"    id="field25"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field26"style="float: right;"><?php       echo $arrpNames[25];      ?></label> <input type="text" name="field26"    id="field26"    class="field-style field-split align-right " style="direction:rtl;"/>    
</li>

















<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='27'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field12" style="float: right;"><?php       echo $arrpNames[11];      ?></label> <input type="text" name="field12"    id="field12"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field13" style="float: right;"><?php       echo $arrpNames[12];      ?></label> <input type="text" name="field13"    id="field13"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field14"style="float: right;"><?php       echo $arrpNames[13];      ?></label> <input type="text" name="field14"    id="field14"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field15" style="float: right;"><?php       echo $arrpNames[14];      ?></label> <input type="text" name="field15"    id="field15"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field16" style="float: right;"><?php       echo $arrpNames[15];      ?></label> <input type="text" name="field16"    id="field16"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field17" style="float: right;"><?php       echo $arrpNames[16];      ?></label> <input type="text" name="field17"    id="field17"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field18"style="float: right;"><?php       echo $arrpNames[17];      ?></label> <input type="text" name="field18"    id="field18"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field19" style="float: right;"><?php       echo $arrpNames[18];      ?></label> <input type="text" name="field19"    id="field19"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field20" style="float: right;"><?php       echo $arrpNames[19];      ?></label> <input type="text" name="field20"    id="field20"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field21" style="float: right;"><?php       echo $arrpNames[20];      ?></label> <input type="text" name="field21"    id="field21"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field22"style="float: right;"><?php       echo $arrpNames[21];      ?></label> <input type="text" name="field22"    id="field22"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field23" style="float: right;"><?php       echo $arrpNames[22];      ?></label> <input type="text" name="field23"    id="field23"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field24" style="float: right;"><?php       echo $arrpNames[23];      ?></label> <input type="text" name="field24"    id="field24"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field25" style="float: right;"><?php       echo $arrpNames[24];      ?></label> <input type="text" name="field25"    id="field25"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field26"style="float: right;"><?php       echo $arrpNames[25];      ?></label> <input type="text" name="field26"    id="field26"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field27" style="float: right;"><?php       echo $arrpNames[26];      ?></label> <input type="text" name="field27"    id="field27"    class="field-style field-split align-right " style="direction:rtl;" />
   
</li>

















<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='28'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field12" style="float: right;"><?php       echo $arrpNames[11];      ?></label> <input type="text" name="field12"    id="field12"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field13" style="float: right;"><?php       echo $arrpNames[12];      ?></label> <input type="text" name="field13"    id="field13"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field14"style="float: right;"><?php       echo $arrpNames[13];      ?></label> <input type="text" name="field14"    id="field14"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field15" style="float: right;"><?php       echo $arrpNames[14];      ?></label> <input type="text" name="field15"    id="field15"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field16" style="float: right;"><?php       echo $arrpNames[15];      ?></label> <input type="text" name="field16"    id="field16"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field17" style="float: right;"><?php       echo $arrpNames[16];      ?></label> <input type="text" name="field17"    id="field17"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field18"style="float: right;"><?php       echo $arrpNames[17];      ?></label> <input type="text" name="field18"    id="field18"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field19" style="float: right;"><?php       echo $arrpNames[18];      ?></label> <input type="text" name="field19"    id="field19"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field20" style="float: right;"><?php       echo $arrpNames[19];      ?></label> <input type="text" name="field20"    id="field20"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field21" style="float: right;"><?php       echo $arrpNames[20];      ?></label> <input type="text" name="field21"    id="field21"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field22"style="float: right;"><?php       echo $arrpNames[21];      ?></label> <input type="text" name="field22"    id="field22"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field23" style="float: right;"><?php       echo $arrpNames[22];      ?></label> <input type="text" name="field23"    id="field23"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field24" style="float: right;"><?php       echo $arrpNames[23];      ?></label> <input type="text" name="field24"    id="field24"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field25" style="float: right;"><?php       echo $arrpNames[24];      ?></label> <input type="text" name="field25"    id="field25"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field26"style="float: right;"><?php       echo $arrpNames[25];      ?></label> <input type="text" name="field26"    id="field26"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field27" style="float: right;"><?php       echo $arrpNames[26];      ?></label> <input type="text" name="field27"    id="field27"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field28" style="float: right;"><?php       echo $arrpNames[27];      ?></label> <input type="text" name="field28"    id="field28"    class="field-style field-split align-right " style="direction:rtl;" />
    
</li>
















<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='29'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field12" style="float: right;"><?php       echo $arrpNames[11];      ?></label> <input type="text" name="field12"    id="field12"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field13" style="float: right;"><?php       echo $arrpNames[12];      ?></label> <input type="text" name="field13"    id="field13"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field14"style="float: right;"><?php       echo $arrpNames[13];      ?></label> <input type="text" name="field14"    id="field14"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field15" style="float: right;"><?php       echo $arrpNames[14];      ?></label> <input type="text" name="field15"    id="field15"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field16" style="float: right;"><?php       echo $arrpNames[15];      ?></label> <input type="text" name="field16"    id="field16"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field17" style="float: right;"><?php       echo $arrpNames[16];      ?></label> <input type="text" name="field17"    id="field17"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field18"style="float: right;"><?php       echo $arrpNames[17];      ?></label> <input type="text" name="field18"    id="field18"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field19" style="float: right;"><?php       echo $arrpNames[18];      ?></label> <input type="text" name="field19"    id="field19"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field20" style="float: right;"><?php       echo $arrpNames[19];      ?></label> <input type="text" name="field20"    id="field20"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field21" style="float: right;"><?php       echo $arrpNames[20];      ?></label> <input type="text" name="field21"    id="field21"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field22"style="float: right;"><?php       echo $arrpNames[21];      ?></label> <input type="text" name="field22"    id="field22"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field23" style="float: right;"><?php       echo $arrpNames[22];      ?></label> <input type="text" name="field23"    id="field23"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field24" style="float: right;"><?php       echo $arrpNames[23];      ?></label> <input type="text" name="field24"    id="field24"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field25" style="float: right;"><?php       echo $arrpNames[24];      ?></label> <input type="text" name="field25"    id="field25"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field26"style="float: right;"><?php       echo $arrpNames[25];      ?></label> <input type="text" name="field26"    id="field26"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field27" style="float: right;"><?php       echo $arrpNames[26];      ?></label> <input type="text" name="field27"    id="field27"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field28" style="float: right;"><?php       echo $arrpNames[27];      ?></label> <input type="text" name="field28"    id="field28"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field29" style="float: right;"><?php       echo $arrpNames[28];      ?></label> <input type="text" name="field29"    id="field29"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>



<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}
if($loginuser=='30'){
  ?>
  <li>
     <label for="field1" style="float: right;"><?php       echo $arrpNames[0];      ?> </label> <input type="text" name="field1"    id="field1"    class="field-style field-split align-right " style="direction:rtl;" />
     <label for="field2"style="float: right;"><?php       echo $arrpNames[1];      ?></label> <input type="text" name="field2"    id="field2"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field3"style="float: right;"><?php       echo $arrpNames[2];      ?></label> <input type="text" name="field3"    id="field3"    class="field-style field-split align-right " style="direction:rtl;" />
      <label for="field4"style="float: right;"><?php       echo $arrpNames[3];      ?></label>  <input type="text" name="field4"    id="field4"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field5" style="float: right;"><?php       echo $arrpNames[4];      ?> </label> <input type="text" name="field5"    id="field5"    class="field-style field-split align-right " style="direction:rtl;" />

</li>
  <li>
      <label for="field6"style="float: right;"><?php       echo $arrpNames[5];      ?></label> <input type="text" name="field6"    id="field6"    class="field-style field-split align-right " style="direction:rtl;"/>

      <label for="field7"style="float: right;"><?php       echo $arrpNames[6];      ?></label> <input type="text" name="field7"    id="field7"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field8"style="float: right;"><?php       echo $arrpNames[7];      ?></label> <input type="text" name="field8"    id="field8"    class="field-style field-split align-right " style="direction:rtl;"/>        
     <label for="field9" style="float: right;"><?php       echo $arrpNames[8];      ?></label> <input type="text" name="field9"    id="field9"    class="field-style field-split align-right " style="direction:rtl;" />
</li>
<li> 
<label for="field10"style="float: right;"><?php       echo $arrpNames[9];      ?></label> <input type="text" name="field10"    id="field10"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field11" style="float: right;"><?php       echo $arrpNames[10];      ?></label> <input type="text" name="field11"    id="field11"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field12" style="float: right;"><?php       echo $arrpNames[11];      ?></label> <input type="text" name="field12"    id="field12"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field13" style="float: right;"><?php       echo $arrpNames[12];      ?></label> <input type="text" name="field13"    id="field13"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field14"style="float: right;"><?php       echo $arrpNames[13];      ?></label> <input type="text" name="field14"    id="field14"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field15" style="float: right;"><?php       echo $arrpNames[14];      ?></label> <input type="text" name="field15"    id="field15"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field16" style="float: right;"><?php       echo $arrpNames[15];      ?></label> <input type="text" name="field16"    id="field16"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field17" style="float: right;"><?php       echo $arrpNames[16];      ?></label> <input type="text" name="field17"    id="field17"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field18"style="float: right;"><?php       echo $arrpNames[17];      ?></label> <input type="text" name="field18"    id="field18"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field19" style="float: right;"><?php       echo $arrpNames[18];      ?></label> <input type="text" name="field19"    id="field19"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field20" style="float: right;"><?php       echo $arrpNames[19];      ?></label> <input type="text" name="field20"    id="field20"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field21" style="float: right;"><?php       echo $arrpNames[20];      ?></label> <input type="text" name="field21"    id="field21"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field22"style="float: right;"><?php       echo $arrpNames[21];      ?></label> <input type="text" name="field22"    id="field22"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field23" style="float: right;"><?php       echo $arrpNames[22];      ?></label> <input type="text" name="field23"    id="field23"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field24" style="float: right;"><?php       echo $arrpNames[23];      ?></label> <input type="text" name="field24"    id="field24"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field25" style="float: right;"><?php       echo $arrpNames[24];      ?></label> <input type="text" name="field25"    id="field25"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field26"style="float: right;"><?php       echo $arrpNames[25];      ?></label> <input type="text" name="field26"    id="field26"    class="field-style field-split align-right " style="direction:rtl;"/>
<label for="field27" style="float: right;"><?php       echo $arrpNames[26];      ?></label> <input type="text" name="field27"    id="field27"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field28" style="float: right;"><?php       echo $arrpNames[27];      ?></label> <input type="text" name="field28"    id="field28"    class="field-style field-split align-right " style="direction:rtl;" />
<label for="field29" style="float: right;"><?php       echo $arrpNames[28];      ?></label> <input type="text" name="field29"    id="field29"    class="field-style field-split align-right " style="direction:rtl;" />
       
</li>
<li> 
<label for="field30"style="float: right;"><?php       echo $arrpNames[29];      ?></label> <input type="text" name="field30"    id="field30"    class="field-style field-split align-right " style="direction:rtl;"/>
</li>

















<li>
  <label for="field40"style="float: right;">تعداد مورد نیاز</label> <input type="number" name="field40"    id="field40"    class="field-style field-split align-right " style="direction:rtl;"/>
      <label for="field41" style="float: right; ">اولویت</label>
      <select  name="field41" id="field41" style="font-size:16px; font-family: 'Bnazanin';float: right;"class=" field-style field-split align-right">
         <option value=""dir="rtl">انتخاب اولویت</option>
         <option value="1"dir="rtl">اولویت اول</option>
         <option value="2"dir="rtl">اولویت دوم</option>
         <option value="3"dir="rtl">اولویت سوم</option>
      </select>
     <label for="field42"style="float: right;">توضیحات</label><input type="text" name="field42" id="field42"    class="field-style field-half align-none align-right" style="direction: rtl; width: 50%;" />
  </li>

<li>
<input type="submit" value="ذخیره" id=<?php echo $productID;    ?>   name=<?php echo $productID;    ?> >
  </li>


<?php
}

              }

                 
            
               ?>

              </ul>
             </form>
       </div>
     </div>

               <?php         
         ++$i;
         }
        }
 
    ?>
    </div>
      </div> 
    <?php }

  }?>
<script src="./javascript/bedroom.js"></script>