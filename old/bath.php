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


 $sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'پادری')";
 $sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
 $sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'پادری'";


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


 $sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'پرده حمام')";
 $sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
 $sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'پرده حمام'";


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


 $sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'استند حمام')";
 $sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
 $sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'استند حمام'";


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



   
 $arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8);
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


 $sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'جا حوله ای')";
 $sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
 $sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'جا حوله ای'";


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
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field6','$field8','$field7',NULL,NULL,NULL,NULL,NULL)";
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


 $sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'چوب رختی')";
 $sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
 $sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'چوب رختی'";


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



   
 $arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8);
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


 $sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'سبد رخت چرک')";
 $sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
 $sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'سبد رخت چرک'";


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
    $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field6','$field8','$field7',NULL,NULL,NULL,NULL,NULL)";
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



$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,,$field11);
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


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'سطل آشغال')";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'سطل آشغال'";


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

if(isset($_POST['submit8'])){

   $field1 = $_POST['field1'];
   $field2 = $_POST['field2'];
   $field3 = $_POST['field3'];
   $field4 = $_POST['field4'];
   $field5 = $_POST['field5'];
   $field6 = $_POST['field6'];
   $field7 = $_POST['field7'];
   $field8 = $_POST['field8'];



$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8);
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


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'گیره لباس')";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'گیره لباس'";


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
  $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field6','$field8','$field7',NULL,NULL,NULL,NULL,NULL)";
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

$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8);
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


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'دمپایی حمام')";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'دمپایی حمام'";


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
  $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field6','$field8','$field7',NULL,NULL,NULL,NULL,NULL)";
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


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'لگن حمام')";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'لگن حمام'";


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

if(isset($_POST['submit11'])){
 
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


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'چهارپایه حمام')";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'چهارپایه حمام'";


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


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'ست سرویس بهداشتی')";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'ست سرویس بهداشتی'";


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


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'حوله دستی')";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'حوله دستی'";


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


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'جا صابونی')";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'جا صابونی'";


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


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'جا صابون جامد')";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'جا صابون جامد'";


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

if(isset($_POST['submit16'])){
 
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];



$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8);
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


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'جا صابون مایع')";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'جا صابون مایع'";


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
  $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field6','$field8','$field7',NULL,NULL,NULL,NULL,NULL)";
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



$arr=array($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8);
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


$sql1="SELECT Properties_ID as new FROM name WHERE Product_ID = (SELECT Product_ID FROM Product WHERE Product_Name = 'جای مسواک و خمیردندان')";
$sql2="SELECT User_ID FROM `user` WHERE user.username=(SELECT lastlogin FROM last_login WHERE last_login.id=1)";
$sql3="SELECT Product_ID FROM Product WHERE Product_Name = 'جای مسواک و خمیردندان'";


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
  $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser,$productid,'$field6','$field8','$field7',NULL,NULL,NULL,NULL,NULL)";
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















?>