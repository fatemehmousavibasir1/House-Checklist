<?php
		
if(isset($_POST['submit1'])){
      
         $field1 = $_POST['field1'];
         $field2 = $_POST['field2'];
         $field3 = $_POST['field3'];
         $field4 = $_POST['field4'];
         $field5 = $_POST['field5'];
         $field6 = $_POST['field6'];
         $field7 = $_POST['field7'];
         $field8 = $_POST['field8'];
         $field9 = $_POST['field9'];
         $field10 = $_POST['field10'];
         $field11 = $_POST['field11'];
         $field12 = $_POST['field12'];

   
 $arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12);
    $host = "localhost";
    $username1 = "root";
    $password1 = "";
    $dbname = "checklist";


    $con = mysqli_connect($host, $username1, $password1, $dbname);

    // to ensure that the connection is made
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }


 $sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'فرگاز'AND Product_Group_ID=16)";
 $sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
 $sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'فرگاز'AND Product_Group_ID=16";


 $rs2=mysqli_query($con, $sql2);
 if (mysqli_num_rows($rs2) > 0) {

    while($row2 = mysqli_fetch_assoc($rs2)) {


        $loginuser=$row2["User_ID"];
    
    }

  }
  

 $rs3=mysqli_query($con, $sql3);
 
 if (mysqli_num_rows($rs3) > 0) {

    while($row3 = mysqli_fetch_assoc($rs3)) {

        $productid=$row3["Product_ID"];
    }
  }


 $rs1 = mysqli_query($con, $sql1);

  
  if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field10','$field12','$field11',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
  $i=0;
      while($row = mysqli_fetch_assoc($rs1)) {
          $a=$row["new"];

        $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
        $rsdel = mysqli_query($con, $sqldel);
          $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
        mysqli_query($con,$sqlp);

          ++$i;
      }
    }
    $arr = array();
}

if(isset($_POST['submit2'])){
     
        $field1 = $_POST['field1'];
        $field2 = $_POST['field2'];
        $field3 = $_POST['field3'];
        $field4 = $_POST['field4'];
        $field5 = $_POST['field5'];
        $field6 = $_POST['field6'];
        $field7 = $_POST['field7'];
        $field8 = $_POST['field8'];
        $field9 = $_POST['field9'];
        $field10= $_POST['field10']; 
        $field11= $_POST['field11']; 
        $field12= $_POST['field12']; 
        $field13= $_POST['field13']; 
        $field14 = $_POST['field14'];
        $field15 = $_POST['field15'];
  
 $arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13,$field14,$field15);
   $host = "localhost";
   $username1 = "root";
   $password1 = "";
   $dbname = "checklist";

   $con = mysqli_connect($host, $username1, $password1, $dbname);

   // to ensure that the connection is made
   if (!$con)
   {
       die("Connection failed!" . mysqli_connect_error());
   }


 $sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'گاز رومیزی'AND Product_Group_ID=16)";
 $sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
 $sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'گاز رومیزی'AND Product_Group_ID=16";


 $rs2=mysqli_query($con, $sql2);
 if (mysqli_num_rows($rs2) > 0) {

   while($row2 = mysqli_fetch_assoc($rs2)) {

  
       $loginuser=$row2["User_ID"];
   
   }

 }
 

 $rs3=mysqli_query($con, $sql3);

 if (mysqli_num_rows($rs3) > 0) {

   while($row3 = mysqli_fetch_assoc($rs3)) {

       $productid=$row3["Product_ID"];
   }
 }



 $rs1 = mysqli_query($con, $sql1);

 
 if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field13','$field15','$field114',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
  $i=0;
     while($row = mysqli_fetch_assoc($rs1)) {

         $a=$row["new"];

       $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
       $rsdel = mysqli_query($con, $sqldel);
       $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
       mysqli_query($con,$sqlp);
         ++$i;
     }
   }
   $arr = array();
 exit();}

if(isset($_POST['submit3']))
{    
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 


$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10);

  $host = "localhost";
  $username1 = "root";
  $password1 = "";
  $dbname = "checklist";


  $con = mysqli_connect($host, $username1, $password1, $dbname);

  // to ensure that the connection is made
  if (!$con)
  {
      die("Connection failed!" . mysqli_connect_error());
  }


 $sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'ماکروفر'AND Product_Group_ID=16)";
 $sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
 $sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'ماکروفر'AND Product_Group_ID=16";


 $rs2=mysqli_query($con, $sql2);
 if (mysqli_num_rows($rs2) > 0) {

  while($row2 = mysqli_fetch_assoc($rs2)) {


      $loginuser=$row2["User_ID"];
  
  }

 }


 $rs3=mysqli_query($con, $sql3);

 if (mysqli_num_rows($rs3) > 0) {

  while($row3 = mysqli_fetch_assoc($rs3)) {
  
      $productid=$row3["Product_ID"];
  }
 }



 $rs1 = mysqli_query($con, $sql1);


 if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field8','$field10','$field9',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
  $i=0;
    while($row = mysqli_fetch_assoc($rs1)) {

        $a=$row["new"];

      $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
      $rsdel = mysqli_query($con, $sqldel);
      $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
      mysqli_query($con,$sqlp);
        ++$i;
    }
  }
  $arr = array();
 exit();}

if(isset($_POST['submit4'])){
      
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 



$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11);

    $host = "localhost";
    $username1 = "root";
    $password1 = "";
    $dbname = "checklist";
    $con = mysqli_connect($host, $username1, $password1, $dbname);

    // to ensure that the connection is made
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }


 $sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'توستر'AND Product_Group_ID=16)";
 $sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
 $sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'توستر'AND Product_Group_ID=16";


 $rs2=mysqli_query($con, $sql2);
 if (mysqli_num_rows($rs2) > 0) {

    while($row2 = mysqli_fetch_assoc($rs2)) {


        $loginuser=$row2["User_ID"];
    
    }

  }
  

 $rs3=mysqli_query($con, $sql3);
 
 if (mysqli_num_rows($rs3) > 0) {

    while($row3 = mysqli_fetch_assoc($rs3)) {

        $productid=$row3["Product_ID"];
    }
  }



 $rs1 = mysqli_query($con, $sql1);

  
  if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field9','$field11','$field10',NULL,NULL,NULL,NULL,NULL)";
   $rsinsert = mysqli_query($con, $sql4);
  $i=0;
      while($row = mysqli_fetch_assoc($rs1)) {

          $a=$row["new"];


        $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
        $rsdel = mysqli_query($con, $sqldel);
        $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
        mysqli_query($con,$sqlp);
         ++$i;
     }
    }
    $arr = array();
 exit();}

if(isset($_POST['submit5'])){
      
        
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 



$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11);
 $host = "localhost";
 $username1 = "root";
 $password1 = "";
 $dbname = "checklist";


 $con = mysqli_connect($host, $username1, $password1, $dbname);

 // to ensure that the connection is made
 if (!$con)
 {
   die("Connection failed!" . mysqli_connect_error());
 }


 $sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'آون توستر'AND Product_Group_ID=16)";
 $sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
 $sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'آون توستر'AND Product_Group_ID=16";


 $rs2=mysqli_query($con, $sql2);
  if (mysqli_num_rows($rs2) > 0) {

 while($row2 = mysqli_fetch_assoc($rs2)) {


   $loginuser=$row2["User_ID"];

 }

 }


 $rs3=mysqli_query($con, $sql3);

 if (mysqli_num_rows($rs3) > 0) {

 while($row3 = mysqli_fetch_assoc($rs3)) {

   $productid=$row3["Product_ID"];
 }
 }



 $rs1 = mysqli_query($con, $sql1);


 if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field9','$field11','$field10',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
  $i=0;
 while($row = mysqli_fetch_assoc($rs1)) {
    
     $a=$row["new"];

   $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
   $rsdel = mysqli_query($con, $sqldel);
   $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
   mysqli_query($con,$sqlp);++$i;
 }
 }
 $arr = array();
 exit();}

if(isset($_POST['submit6'])){
      
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10 = $_POST['field10'];
    $field11 = $_POST['field11'];
    $field12 = $_POST['field12'];


$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12);

    $host = "localhost";
    $username1 = "root";
    $password1 = "";
    $dbname = "checklist";


    $con = mysqli_connect($host, $username1, $password1, $dbname);

    // to ensure that the connection is made
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }


 $sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'ساندویچ ساز'AND Product_Group_ID=16)";
 $sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
 $sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'ساندویچ ساز'AND Product_Group_ID=16";


 $rs2=mysqli_query($con, $sql2);
 if (mysqli_num_rows($rs2) > 0) {

    while($row2 = mysqli_fetch_assoc($rs2)) {

        $loginuser=$row2["User_ID"];
    
    }

  }
  

 $rs3=mysqli_query($con, $sql3);
 
 if (mysqli_num_rows($rs3) > 0) {

    while($row3 = mysqli_fetch_assoc($rs3)) {
 
        $productid=$row3["Product_ID"];
    }
  }



 $rs1 = mysqli_query($con, $sql1);

  
  if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field10','$field12','$field11',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
  $i=0;
      while($row = mysqli_fetch_assoc($rs1)) {
    
          $a=$row["new"];

        $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
        $rsdel = mysqli_query($con, $sqldel);
        $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
        mysqli_query($con,$sqlp); ++$i;
      }
    }
    $arr = array();
 exit();
}
/**.. */
if(isset($_POST['submit7'])){
      
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10 = $_POST['field10'];
    $field11 = $_POST['field11'];
    $field12 = $_POST['field12'];


$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12);

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
   die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'وافل ساز'AND Product_Group_ID=16)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'وافل ساز'AND Product_Group_ID=16";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


   $loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

   $productid=$row3["Product_ID"];
}
}


$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field10','$field12','$field11',NULL,NULL,NULL,NULL,NULL)";
     $rsinsert = mysqli_query($con, $sql4);
  $i=0;
 while($row = mysqli_fetch_assoc($rs1)) {
     $a=$row["new"];

   $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
   $rsdel = mysqli_query($con, $sqldel);
     $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
   mysqli_query($con,$sqlp);
     ++$i;
 }
 }
 $arr = array();
}

if(isset($_POST['submit8'])){

    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10 = $_POST['field10'];
    $field11 = $_POST['field11'];
    $field12 = $_POST['field12'];


$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12);

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";

$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
  die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'هواپز'AND Product_Group_ID=16)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'هواپز'AND Product_Group_ID=16";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


  $loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

  $productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field10','$field12','$field11',NULL,NULL,NULL,NULL,NULL)";
     $rsinsert = mysqli_query($con, $sql4);
  $i=0;
while($row = mysqli_fetch_assoc($rs1)) {

    $a=$row["new"];

  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
  $rsdel = mysqli_query($con, $sqldel);
  $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
  mysqli_query($con,$sqlp);
    ++$i;
}
}
$arr = array();
exit();}
/**/ 
if(isset($_POST['submit9']))
{    
    $field1 = $_POST['field1'];
         $field2 = $_POST['field2'];
         $field3 = $_POST['field3'];
         $field4 = $_POST['field4'];
         $field5 = $_POST['field5'];
         $field6 = $_POST['field6'];
         $field7 = $_POST['field7'];
         $field8 = $_POST['field8'];
         $field9 = $_POST['field9'];
         $field10 = $_POST['field10'];
         $field11 = $_POST['field11'];
         $field12 = $_POST['field12'];

   
 $arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12);

    
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
 die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'بخارپز'AND Product_Group_ID=16)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'بخارپز'AND Product_Group_ID=16";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


 $loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

 $productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field10','$field12','$field11',NULL,NULL,NULL,NULL,NULL)";
   $rsinsert = mysqli_query($con, $sql4);
  $i=0;
while($row = mysqli_fetch_assoc($rs1)) {

   $a=$row["new"];

 $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
 $rsdel = mysqli_query($con, $sqldel);
 $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
 mysqli_query($con,$sqlp);
   ++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit10'])){
 
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10 = $_POST['field10'];
    $field11 = $_POST['field11'];
    $field12 = $_POST['field12'];


$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12);

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";
$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
   die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'آرام پز'AND Product_Group_ID=16)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'آرام پز'AND Product_Group_ID=16";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


   $loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

   $productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field10','$field12','$field11',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
  $i=0;
 while($row = mysqli_fetch_assoc($rs1)) {

     $a=$row["new"];


   $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
   $rsdel = mysqli_query($con, $sqldel);
   $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
   mysqli_query($con,$sqlp);
    ++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit11'])){
 
$  $field1 = $_POST['field1'];
$field2 = $_POST['field2'];
$field3 = $_POST['field3'];
$field4 = $_POST['field4'];
$field5 = $_POST['field5'];
$field6 = $_POST['field6'];
$field7 = $_POST['field7'];
$field8 = $_POST['field8'];
$field9 = $_POST['field9'];
$field10 = $_POST['field10'];
$field11 = $_POST['field11'];
$field12 = $_POST['field12'];


$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12);

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'تخم مرغ پز'AND Product_Group_ID=16)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'تخم مرغ پز'AND Product_Group_ID=16";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field10','$field12','$field11',NULL,NULL,NULL,NULL,NULL)";
     $rsinsert = mysqli_query($con, $sql4);
  $i=0;
while($row = mysqli_fetch_assoc($rs1)) {

$a=$row["new"];

$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit12'])){
 
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10 = $_POST['field10'];
    $field11 = $_POST['field11'];
    $field12 = $_POST['field12'];


$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12);

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
   die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'پلوپز'AND Product_Group_ID=16)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'پلوپز'AND Product_Group_ID=16";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {

   $loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

   $productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field10','$field12','$field11',NULL,NULL,NULL,NULL,NULL)";
     $rsinsert = mysqli_query($con, $sql4);

  $i=0;
 while($row = mysqli_fetch_assoc($rs1)) {

     $a=$row["new"];

   $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
   $rsdel = mysqli_query($con, $sqldel);
   $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
   mysqli_query($con,$sqlp); ++$i;
 }
}
$arr = array();
exit();}



if(isset($_POST['submit13'])){
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 
    $field12= $_POST['field12']; 
    $field13= $_POST['field13']; 


$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13);

    
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
   die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'زودپز'AND Product_Group_ID=16)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'زودپز'AND Product_Group_ID=16";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


   $loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

   $productid=$row3["Product_ID"];
}
}


$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field11','$field13','$field12',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
  $i=0;
 while($row = mysqli_fetch_assoc($rs1)) {
     $a=$row["new"];

   $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
   $rsdel = mysqli_query($con, $sqldel);
     $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
   mysqli_query($con,$sqlp);

     ++$i;
 }
}
$arr = array();
}

if(isset($_POST['submit14'])){

    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 


$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10);
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";

$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
  die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'سرخ کن'AND Product_Group_ID=16)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'سرخ کن'AND Product_Group_ID=16";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


  $loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

  $productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {

    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field8','$field10','$field9',NULL,NULL,NULL,NULL,NULL)";
     $rsinsert = mysqli_query($con, $sql4);
 $i=0;
while($row = mysqli_fetch_assoc($rs1)) {

    $a=$row["new"];

  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
  $rsdel = mysqli_query($con, $sqldel);
  $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
  mysqli_query($con,$sqlp);
    ++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit15']))
{    
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10 = $_POST['field10'];
    $field11 = $_POST['field11'];
    $field12 = $_POST['field12'];
    $field13 = $_POST['field13'];
    $field14 = $_POST['field14'];
    $field15 = $_POST['field15'];
    $field16 = $_POST['field16'];
    $field17 = $_POST['field17'];
    $field18 = $_POST['field18'];
    $field19 = $_POST['field19'];
    $field20 = $_POST['field20'];
    $field21 = $_POST['field21'];















    $arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13,$field14,$field15,$field16,$field17,$field18,$field19,$field20,$field21);

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
 die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'یخچال و فریزر'AND Product_Group_ID=17)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'یخچال و فریزر'AND Product_Group_ID=17";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


 $loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

 $productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field19','$field21','$field20',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);

  $i=0;
while($row = mysqli_fetch_assoc($rs1)) {

   $a=$row["new"];

 $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
 $rsdel = mysqli_query($con, $sqldel);
 $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
 mysqli_query($con,$sqlp);
   ++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit16'])){
 
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10 = $_POST['field10'];
    $field11 = $_POST['field11'];
    $field12 = $_POST['field12'];
    $field13 = $_POST['field13'];
    $field14 = $_POST['field14'];
    $field15 = $_POST['field15'];
    $field16 = $_POST['field16'];
    $field17 = $_POST['field17'];
$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13,$field14,$field15,$field16,$field17);
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";
$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
   die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'یخچال'AND Product_Group_ID=17)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'یخچال' AND Product_Group_ID=17";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


   $loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

 while($row3 = mysqli_fetch_assoc($rs3)) {

   $productid=$row3["Product_ID"];
 }
}



$rs1 = mysqli_query($con, $sql1);
if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field15','$field17','$field16',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
  $i=0;

 while($row = mysqli_fetch_assoc($rs1)) {

     $a=$row["new"];


   $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
   $rsdel = mysqli_query($con, $sqldel);
   $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
   mysqli_query($con,$sqlp);
    ++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit17'])){
      
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10 = $_POST['field10'];
    $field11 = $_POST['field11'];
    $field12 = $_POST['field12'];
    $field13 = $_POST['field13'];
    $field14 = $_POST['field14'];
    $field15 = $_POST['field15'];
    $field16 = $_POST['field16'];
    $field17 = $_POST['field17'];
$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13,$field14,$field15,$field16,$field17);
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
   die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'فریزر'AND Product_Group_ID=17)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'فریزر'AND Product_Group_ID=17";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


   $loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

   $productid=$row3["Product_ID"];
}
}


$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field15','$field17','$field16',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;
 while($row = mysqli_fetch_assoc($rs1)) {
     $a=$row["new"];

   $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
   $rsdel = mysqli_query($con, $sqldel);
     $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
   mysqli_query($con,$sqlp);

     ++$i;
 }
}
$arr = array();
}

if(isset($_POST['submit18'])){

    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10 = $_POST['field10'];
    $field11 = $_POST['field11'];
    $field12 = $_POST['field12'];
    $field13 = $_POST['field13'];
    $field14 = $_POST['field14'];
    $field15 = $_POST['field15'];
    $field16 = $_POST['field16'];
    $field17 = $_POST['field17'];
    $field18 = $_POST['field18'];
    $field19 = $_POST['field19'];
    $field20 = $_POST['field20'];
    $field21 = $_POST['field21'];


    $arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13,$field14,$field15,$field16,$field17,$field18,$field19,$field20,$field21);

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";

$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
  die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'مینی یخچال'AND Product_Group_ID=17)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'مینی یخچال'AND Product_Group_ID=17";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


  $loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

  $productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field19','$field21','$field20',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

    $a=$row["new"];

  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
  $rsdel = mysqli_query($con, $sqldel);
  $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
  mysqli_query($con,$sqlp);
    ++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit19']))
{    
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 
    $field12= $_POST['field12']; 
    $field13= $_POST['field13']; 
    $field14 = $_POST['field14'];
    $field15 = $_POST['field15'];

$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13,$field14,$field15);

    
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
 die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'آبمیوه گیری'AND Product_Group_ID=18)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'آبمیوه گیری'AND Product_Group_ID=18";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


 $loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

 $productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field13','$field15','$field114',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

   $a=$row["new"];

 $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
 $rsdel = mysqli_query($con, $sqldel);
 $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
 mysqli_query($con,$sqlp);
   ++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit20'])){
 
         
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 



$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11);
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";
$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
   die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'قهوه ساز'AND Product_Group_ID=18)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'قهوه ساز'AND Product_Group_ID=18";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


   $loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

   $productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field9','$field11','$field10',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;
 while($row = mysqli_fetch_assoc($rs1)) {

     $a=$row["new"];


   $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
   $rsdel = mysqli_query($con, $sqldel);
   $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
   mysqli_query($con,$sqlp);
    ++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit21'])){
 
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 
    $field12= $_POST['field12']; 
    $field13= $_POST['field13']; 
    $field14 = $_POST['field14'];
    $field15 = $_POST['field15'];

$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13,$field14,$field15);

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'چای ساز'AND Product_Group_ID=18)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'چای ساز'AND Product_Group_ID=18";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field13','$field15','$field114',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

$a=$row["new"];

$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit22'])){
 
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];



$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9);
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
   die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'اسپرسو ساز'AND Product_Group_ID=18)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'اسپرسو ساز'AND Product_Group_ID=18";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {

   $loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

   $productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field7','$field9','$field8',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;
 while($row = mysqli_fetch_assoc($rs1)) {

     $a=$row["new"];

   $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
   $rsdel = mysqli_query($con, $sqldel);
   $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
   mysqli_query($con,$sqlp); ++$i;
 }
}
$arr = array();
exit();
}

if(isset($_POST['submit23'])){
 
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 
    $field12= $_POST['field12']; 
    $field13= $_POST['field13']; 
    $field14= $_POST['field14']; 

$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13,$field14);

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'سماور برقی'AND Product_Group_ID=18)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'سماور برقی'AND Product_Group_ID=18";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}


$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field12','$field14','$field13',NULL,NULL,NULL,NULL,NULL)";
     $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {
$a=$row["new"];

$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);
++$i;
}
}
$arr = array();
}

if(isset($_POST['submit24'])){

    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 
    $field12= $_POST['field12']; 
    $field13= $_POST['field13']; 
    $field14= $_POST['field14']; 

$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13,$field14);

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";

$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'کتری برقی'AND Product_Group_ID=18)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'کتری برقی'AND Product_Group_ID=18";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field12','$field14','$field13',NULL,NULL,NULL,NULL,NULL)";
      $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

$a=$row["new"];

$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);
++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit25']))
{    
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10 = $_POST['field10'];
    $field11 = $_POST['field11'];
    $field12 = $_POST['field12'];
    $field13 = $_POST['field13'];
    $field14 = $_POST['field14'];
    $field15 = $_POST['field15'];
    $field16 = $_POST['field16'];
    $field17 = $_POST['field17'];
$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13,$field14,$field15,$field16,$field17);
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'غذا ساز'AND Product_Group_ID=19)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'غذا ساز'AND Product_Group_ID=19";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field15','$field17','$field16',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

$a=$row["new"];

$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);
++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit26'])){

    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 
    $field12= $_POST['field12']; 
    $field13= $_POST['field13']; 
    $field14 = $_POST['field14'];
    $field15 = $_POST['field15'];

$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13,$field14,$field15);

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";
$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'همزن برقی'AND Product_Group_ID=19)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'همزن برقی'AND Product_Group_ID=19";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field13','$field15','$field114',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

$a=$row["new"];


$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);
++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit27'])){

    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 
    $field12= $_POST['field12']; 
    $field13= $_POST['field13']; 


$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13);

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'مخلوط کن'AND Product_Group_ID=19)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'مخلوط کن'AND Product_Group_ID=19";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field11','$field13','$field12',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

$a=$row["new"];

$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit28'])){

    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10 = $_POST['field10'];
    $field11 = $_POST['field11'];
    $field12 = $_POST['field12'];
    $field13 = $_POST['field13'];
    $field14 = $_POST['field14'];
    $field15 = $_POST['field15'];
    $field16 = $_POST['field16'];
    $field17 = $_POST['field17'];
$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13,$field14,$field15,$field16,$field17);
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'خردکن'AND Product_Group_ID=19)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'خردکن'AND Product_Group_ID=19";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {

$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field15','$field17','$field16',NULL,NULL,NULL,NULL,NULL)";
     $rsinsert = mysqli_query($con, $sql4);

$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

$a=$row["new"];

$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp); ++$i;
}
}
$arr = array();
exit();}



if(isset($_POST['submit29'])){
 
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10 = $_POST['field10'];

 $arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10);
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'چرخ گوشت'AND Product_Group_ID=19)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'چرخ گوشت'AND Product_Group_ID=19";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}


$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field8','$field10','$field9',NULL,NULL,NULL,NULL,NULL)";
     $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {
$a=$row["new"];

$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);

++$i;
}
}
$arr = array();
}




if(isset($_POST['submit30'])){
 
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10 = $_POST['field10'];

    
    $arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10);
    $host = "localhost";
    $username1 = "root";
    $password1 = "";
    $dbname = "checklist";
    
    
    $con = mysqli_connect($host, $username1, $password1, $dbname);
    
    // to ensure that the connection is made
    if (!$con)
    {
    die("Connection failed!" . mysqli_connect_error());
    }
    
    
    $sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'آسیاب برقی'AND Product_Group_ID=19)";
    $sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
    $sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'آسیاب برقی'AND Product_Group_ID=19";
    
    
    $rs2=mysqli_query($con, $sql2);
    if (mysqli_num_rows($rs2) > 0) {
    
    while($row2 = mysqli_fetch_assoc($rs2)) {
    
    
    $loginuser=$row2["User_ID"];
    
    }
    
    }
    
    
    $rs3=mysqli_query($con, $sql3);
    
    if (mysqli_num_rows($rs3) > 0) {
    
    while($row3 = mysqli_fetch_assoc($rs3)) {
    
    $productid=$row3["Product_ID"];
    }
    }
    
    
    $rs1 = mysqli_query($con, $sql1);
    
    
    if (mysqli_num_rows($rs1) > 0) {
        $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field8','$field10','$field9',NULL,NULL,NULL,NULL,NULL)";
     $rsinsert = mysqli_query($con, $sql4);
    $i=0;
    while($row = mysqli_fetch_assoc($rs1)) {
    $a=$row["new"];
    
    $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
    $rsdel = mysqli_query($con, $sqldel);
    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
    mysqli_query($con,$sqlp);
    
    ++$i;
    }
    }
    $arr = array();
    }








if(isset($_POST['submit31'])){

    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 
    $field12= $_POST['field12']; 
    $field13= $_POST['field13']; 


$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13);

    
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";

$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'گوشت کوب برقی'AND Product_Group_ID=19)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'گوشت کوب برقی'AND Product_Group_ID=19";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {

    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field11','$field13','$field12',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

$a=$row["new"];

$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);
++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit32']))
{    
    $field1 = $_POST['field1'];
        $field2 = $_POST['field2'];
        $field3 = $_POST['field3'];
        $field4 = $_POST['field4'];
        $field5 = $_POST['field5'];
        $field6 = $_POST['field6'];
        $field7 = $_POST['field7'];
        $field8 = $_POST['field8'];
        $field9 = $_POST['field9'];
        $field10= $_POST['field10']; 
        $field11= $_POST['field11']; 
        $field12= $_POST['field12']; 
        $field13= $_POST['field13']; 
        $field14 = $_POST['field14'];
        $field15 = $_POST['field15'];
  
 $arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13,$field14,$field15);

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'ماشین آشپزخانه'AND Product_Group_ID=19)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'ماشین آشپزخانه'AND Product_Group_ID=19";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field13','$field15','$field114',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);

$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

$a=$row["new"];

$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);
++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit33'])){

    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 
    $field12= $_POST['field12']; 
    $field13= $_POST['field13']; 


$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13);

    
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";
$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'کرپ ساز'AND Product_Group_ID=19)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'کرپ ساز' AND Product_Group_ID=19";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);
if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field11','$field13','$field12',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;

while($row = mysqli_fetch_assoc($rs1)) {

$a=$row["new"];


$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);
++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit34'])){
      
      
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 



$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11);
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
   die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'سبزی خردکن'AND Product_Group_ID=19)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'سبزی خردکن'AND Product_Group_ID=19";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


   $loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

   $productid=$row3["Product_ID"];
}
}


$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field9','$field11','$field10',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;
 while($row = mysqli_fetch_assoc($rs1)) {
     $a=$row["new"];

   $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
   $rsdel = mysqli_query($con, $sqldel);
     $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
   mysqli_query($con,$sqlp);

     ++$i;
 }
}
$arr = array();
}

if(isset($_POST['submit35'])){

       
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 



$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11);
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";

$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
  die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'میوه خشک کن'AND Product_Group_ID=19)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'میوه خشک کن'AND Product_Group_ID=19";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


  $loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

  $productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field9','$field11','$field10',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

    $a=$row["new"];

  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
  $rsdel = mysqli_query($con, $sqldel);
  $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
  mysqli_query($con,$sqlp);
    ++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit36']))
{    
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10 = $_POST['field10'];
    $field11 = $_POST['field11'];
    $field12 = $_POST['field12'];
    $field13 = $_POST['field13'];
    $field14 = $_POST['field14'];
    $field15 = $_POST['field15'];
    $field16 = $_POST['field16'];
    $field17 = $_POST['field17'];
$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13,$field14,$field15,$field16,$field17);
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
 die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'کولر گازی'AND Product_Group_ID=20)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'کولر گازی'AND Product_Group_ID=20";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


 $loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

 $productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field15','$field17','$field16',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

   $a=$row["new"];

 $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
 $rsdel = mysqli_query($con, $sqldel);
 $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
 mysqli_query($con,$sqlp);
   ++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit37'])){
 
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10 = $_POST['field10'];
    $field11 = $_POST['field11'];
    $field12 = $_POST['field12'];


$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12);

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";
$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
   die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'پنکه برقی'AND Product_Group_ID=20)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'پنکه برقی'AND Product_Group_ID=20";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


   $loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

   $productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field10','$field12','$field11',NULL,NULL,NULL,NULL,NULL)";
     $rsinsert = mysqli_query($con, $sql4);
$i=0;
 while($row = mysqli_fetch_assoc($rs1)) {

     $a=$row["new"];


   $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
   $rsdel = mysqli_query($con, $sqldel);
   $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
   mysqli_query($con,$sqlp);
    ++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit38'])){
 
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 
    $field12= $_POST['field12']; 
    $field13= $_POST['field13']; 


$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13);

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'بخاری'AND Product_Group_ID=20)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'بخاری'AND Product_Group_ID=20";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field11','$field13','$field12',NULL,NULL,NULL,NULL,NULL)";
   $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

$a=$row["new"];

$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit39'])){
 
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 
    $field12= $_POST['field12']; 
    $field13= $_POST['field13']; 
    $field14 = $_POST['field14'];
    $field15 = $_POST['field15'];

$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13,$field14,$field15);


$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
   die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'آبگرمکن'AND Product_Group_ID=20)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'آبگرمکن'AND Product_Group_ID=20";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {

   $loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

   $productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field13','$field15','$field114',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;
 while($row = mysqli_fetch_assoc($rs1)) {

     $a=$row["new"];

   $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
   $rsdel = mysqli_query($con, $sqldel);
   $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
   mysqli_query($con,$sqlp); ++$i;
 }
}
$arr = array();
exit();
}

if(isset($_POST['submit40'])){
 
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 
    $field12= $_POST['field12']; 
    $field13= $_POST['field13']; 


$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13);

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'دستگاه تصفیه هوا'AND Product_Group_ID=20)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'دستگاه تصفیه هوا'AND Product_Group_ID=20";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}


$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field11','$field13','$field12',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {
$a=$row["new"];

$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);
++$i;
}
}
$arr = array();
}

if(isset($_POST['submit41'])){

      
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 



$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11);
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";

$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'شوفاژ برقی'AND Product_Group_ID=20)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'شوفاژ برقی'AND Product_Group_ID=20";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field9','$field11','$field10',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

$a=$row["new"];

$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);
++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit42']))
{    
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];



$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9);
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'هیتر برقی'AND Product_Group_ID=20)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'هیتر برقی'AND Product_Group_ID=20";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field7','$field9','$field8',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

$a=$row["new"];

$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);
++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit43'])){

    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 
    $field12= $_POST['field12']; 
    $field13= $_POST['field13']; 
    $field14= $_POST['field14']; 

$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13,$field14);

    
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";
$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'پکیج شوفاژ دیواری'AND Product_Group_ID=20)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'پکیج شوفاژ دیواری'AND Product_Group_ID=20";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field12','$field14','$field13',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

$a=$row["new"];


$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);
++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit44'])){

    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10 = $_POST['field10'];

 $arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10);
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'فر توکار'AND Product_Group_ID=21)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'فر توکار'AND Product_Group_ID=21";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field8','$field10','$field9',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

$a=$row["new"];

$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit45'])){

    $field1 = $_POST['field1'];
        $field2 = $_POST['field2'];
        $field3 = $_POST['field3'];
        $field4 = $_POST['field4'];
        $field5 = $_POST['field5'];
        $field6 = $_POST['field6'];
        $field7 = $_POST['field7'];
        $field8 = $_POST['field8'];
        $field9 = $_POST['field9'];
        $field10= $_POST['field10']; 
        $field11= $_POST['field11']; 
        $field12= $_POST['field12']; 
        $field13= $_POST['field13']; 
        $field14 = $_POST['field14'];
        $field15 = $_POST['field15'];
  
 $arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13,$field14,$field15);

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'اجاق گاز صفحه ای'AND Product_Group_ID=21)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'اجاق گاز صفحه ای'AND Product_Group_ID=21";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {

$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
$sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field13','$field15','$field114',NULL,NULL,NULL,NULL,NULL)";
$rsinsert = mysqli_query($con, $sql4);

$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

$a=$row["new"];

$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp); ++$i;
}
}
$arr = array();
exit();}



if(isset($_POST['submit46'])){
 
    $field1 = $_POST['field1'];
         $field2 = $_POST['field2'];
         $field3 = $_POST['field3'];
         $field4 = $_POST['field4'];
         $field5 = $_POST['field5'];
         $field6 = $_POST['field6'];
         $field7 = $_POST['field7'];
         $field8 = $_POST['field8'];
         $field9 = $_POST['field9'];
         $field10 = $_POST['field10'];
         $field11 = $_POST['field11'];
         $field12 = $_POST['field12'];

   
 $arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12);

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'هود'AND Product_Group_ID=21)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'هود'AND Product_Group_ID=21";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}


$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field10','$field12','$field11',NULL,NULL,NULL,NULL,NULL)";
     $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {
$a=$row["new"];

$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);

++$i;
}
}
$arr = array();
}

if(isset($_POST['submit47'])){

    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 
    $field11= $_POST['field11']; 
    $field12= $_POST['field12']; 
    $field13= $_POST['field13']; 


$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13);

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";

$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'چرخ خیاطی'AND Product_Group_ID=22)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'چرخ خیاطی'AND Product_Group_ID=22";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {

    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field11','$field13','$field12',NULL,NULL,NULL,NULL,NULL)";
   $rsinsert = mysqli_query($con, $sql4);
$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

$a=$row["new"];

$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);
++$i;
}
}
$arr = array();
exit();}

if(isset($_POST['submit48']))
{    
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];
    $field9 = $_POST['field9'];
    $field10= $_POST['field10']; 


$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10);
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

// to ensure that the connection is made
if (!$con)
{
die("Connection failed!" . mysqli_connect_error());
}


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'ترازو آشپزخانه'AND Product_Group_ID=22)";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'ترازو آشپزخانه'AND Product_Group_ID=22";


$rs2=mysqli_query($con, $sql2);
if (mysqli_num_rows($rs2) > 0) {

while($row2 = mysqli_fetch_assoc($rs2)) {


$loginuser=$row2["User_ID"];

}

}


$rs3=mysqli_query($con, $sql3);

if (mysqli_num_rows($rs3) > 0) {

while($row3 = mysqli_fetch_assoc($rs3)) {

$productid=$row3["Product_ID"];
}
}



$rs1 = mysqli_query($con, $sql1);


if (mysqli_num_rows($rs1) > 0) {
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field8','$field10','$field9',NULL,NULL,NULL,NULL,NULL)";
    $rsinsert = mysqli_query($con, $sql4);

$i=0;
while($row = mysqli_fetch_assoc($rs1)) {

$a=$row["new"];

$sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser and`value of user product`.Name_ID=$a";
$rsdel = mysqli_query($con, $sqldel);
$sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser,$productid,$a,'$arr[$i]')";
mysqli_query($con,$sqlp);
++$i;
}
}
$arr = array();
exit();}
?>